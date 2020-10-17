<?php


namespace Demo\Core\Services;


use Demo\Core\Classes\Beans\TwigEngine;
use Demo\Core\Models\Permission;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\UnauthorizedException;
use October\Rain\Exception\ApplicationException;

class RestQuery
{
    const ENTITY_METHODS = ['create', 'update', 'delete', 'findAll', 'findOne', 'findById'];
    const DATA_METHODS = ['create', 'update'];
    /**@var $queryBuilder Builder */
    protected $queryBuilder;
    protected $json;
    protected $secured = false;
    /**@var string */
    protected $modelClass;

    /**@param string $modelClass model class */
    public function __construct($modelClass, $secured)
    {
        $this->modelClass = $modelClass;
        $this->secured = $secured;
        /*if (is_string($queryBuilder)) {
            $queryBuilder = DB::table($queryBuilder);
        }
        $this->queryBuilder = $queryBuilder;*/
    }

    public static function evalJSON($json)
    {
        if (is_array($json)) {
            $json = json_encode($json);
        }
        $json = TwigEngine::eval($json);
        return json_decode($json, true);
    }

    public function sanitizeJson($json)
    {
        $json = self::evalJSON($json);
        if (!empty($model)) {
            $json['model'] = $model;
        }
        $json['required'] = true;
        return $json;
    }

    /***Parse filter and build query
     * @param Builder $queryBuilder
     * @param array $json
     * @return Builder
     */
    public function parseOuter($queryBuilder, $json)
    {
        if (array_key_exists('limit', $json)) {
            $queryBuilder->limit($json['limit']);
        }
        if (array_key_exists('order', $json) && is_array($json['order'])) {
            foreach ($json['order'] as $orderBy) {
                $orderBy['direction'] = array_key_exists('direction', $orderBy) ? $orderBy['direction'] : 'ASC';
                $field = $orderBy['field'];
                if (array_key_exists('model', $orderBy)) {
                    $modelInstance = new $orderBy['model'];
                    $field = $modelInstance->table . '.' . $field;
                }
                $queryBuilder->orderBy($field, $orderBy['direction']);
            }
        }
    }

    /***Parse filter and build query
     * @param Builder $queryBuilder
     * @param array $json
     * @return Builder
     * @throws \timgws\QBParseException
     */
    public function parseWhere($queryBuilder, $json)
    {
        $sourceModelInstance = new $json['model']();
        $sourceTable = $sourceModelInstance->getTable();
        /** include statement handling */
        if (array_key_exists('include', $json) && is_array($json['include'])) {
            foreach ($json['include'] as $join) {
                $includedModel = new $join['model']();
                $includedTable = $includedModel->getTable();
                $join['alias'] = array_key_exists('alias', $join) ? $join['alias'] : $includedTable;
                $queryBuilder->join(
                    $includedTable,
                    $join['alias'] . '.' . $join['key'],
                    '=',
                    $sourceTable . '.' . $join['targetKey']
                );
                $this->parseWhere($queryBuilder, $join);
            }
        }
        /**attributes handling*/
        if (array_key_exists('attributes', $json) && is_array($json['attributes'])) {
            $queryBuilder->select(array_map(function ($attribute) use ($json) {
                return $json['alias'] . '.' . $attribute;
            }, $json['attributes']));
        }
        /**where handling*/
        if (!empty($json['where'])) {
            $queryFilter = new QueryFilter($queryBuilder, $json['alias'] ?? null, $json['fields'] ?? null);
            $queryFilter->applyFilter($json['where'] ?? [], false);
        }
    }

    /**
     * Returns the Query Builder by parsing and applying the json
     * @param Builder $queryBuilder
     * @param array $json
     * @return Builder
     */
    public function apply($json)
    {
        $model = new $this->modelClass;
        $queryBuilder = DB::table($model->table);
        return $this->parseQuery($queryBuilder, $json);
    }

    /**
     * Returns the Query Builder by parsing and applying the json
     * @param Builder $queryBuilder
     * @param array $json
     * @return Builder
     */
    public function parseQuery($queryBuilder, $json)
    {
        $json = $this->sanitizeJson($json);
        $this->parseWhere($queryBuilder, $json);
        $this->parseOuter($queryBuilder, $json);
        if ($this->secured === true) {
            $sec = new SecuredEntityService($this->modelClass, true);
            $sec->secureQuery($queryBuilder);
        }
        return $queryBuilder;
    }

    /**
     * Returns the Query Builder by parsing and applying the json
     * @param Builder $queryBuilder
     * @param array $json
     * @return Builder
     */
    public static function parse($queryBuilder, $json, $secured = false)
    {
        $restQuery = new RestQuery(null, $secured);
        $json = $restQuery->sanitizeJson($json);
        $restQuery->parseWhere($queryBuilder, $json);
        $restQuery->parseOuter($queryBuilder, $json);
        return $queryBuilder;
    }

    /**
     * Execute the given query and return the results
     * Create, Update, Delete, findAll,findOne
     * @param string $modelClass
     * @param string $method
     * @param array $json
     * @param array $data
     * @return array|mixed
     */
    public static function executeMethod($modelClass, $method, $json, $data = [], $secured = false)
    {
        if (!in_array($method, self::ENTITY_METHODS)) {
            throw new ApplicationException('Invalid entity method ' . $method);
        }
        $restQuery = new RestQuery($modelClass, $secured);
        if (in_array($method, self::DATA_METHODS)) {
            return $restQuery->{$method}($data, $json);
        } else {
            return $restQuery->{$method}($json);
        }
    }

    /**
     * Convert the given json as Query Builder
     * @param $json
     * @return Builder
     */
    public function select($json = [])
    {
        return $this->apply($json);
    }

    public function findAll($json = [])
    {
        return $this->select($json)->get();
    }

    public function findOne($json = [])
    {
        $json['limit'] = 1;
        $result = $this->select($json)->get();
        if ($result->count() > 0) {
            return $result->get(0);
        }
        return null;
    }

    public function findById($id)
    {
        return $this->findOne(['where' => ['id' => $id]]);
    }

    public function create($data = [], $failIfDeniedAny = false)
    {
        if ($this->secured) {
            $sec = new SecuredEntityService($this->modelClass);
            $sec->inset($data, $failIfDeniedAny);
        } else {
            return $this->modelClass::insert($data);
        }
    }

    public function update($data = [], $json = [])
    {
        if (count($data) > 0) {
            return $this->parseQuery($this->modelClass::query(), $json)->update($data);
        }
        return [];
    }

    public function delete($json = [])
    {
        return $this->parseQuery($this->modelClass::query(), $json)->delete();
    }

    /**@Depricated */
    public function evaluatePermissions($modeInstance, $queryBuilder, $json, $permission = 'READ')
    {
        $userSecurityService = UserSecurityService::getInstance();
        $permission = $userSecurityService->getRowLevelPermissions($modeInstance, Permission::READ);
        if (array_key_exists('required', $json) && $json['required'] === true && $permission->count() === 0) {
            throw new UnauthorizedException(' You don\'t have permission on ' . $modeInstance->table);
        }
        if (!$userSecurityService->hasAstrixPermission($permission)) {
            $permissionConditions = $userSecurityService->mergeConditions($permission, false);
            $queryFilter = new QueryFilter($queryBuilder, $json['alias'] ?? $modeInstance->table, $json['fields'] ?? null);
            $queryFilter->applyFilter($permissionConditions);
        }
    }


}

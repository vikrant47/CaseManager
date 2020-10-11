<?php


namespace Demo\Core\Services;


use Demo\Core\Classes\Beans\TwigEngine;
use Demo\Core\Models\Permission;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\UnauthorizedException;

class RestQuery
{
    /**@var $queryBuilder Builder */
    protected $queryBuilder;
    protected $json;
    protected $model;

    public function __construct($queryBuilder, $json, array $fields = null, $model = null)
    {
        if (is_string($queryBuilder)) {
            $queryBuilder = DB::table($queryBuilder);
        }
        $this->queryBuilder = $queryBuilder;
        $this->json = self::evalJSON($json);
        if (!empty($model)) {
            $this->json['model'] = $model;
        }
        $this->json['required'] = true;
    }

    public static function evalJSON($json)
    {
        if (is_array($json)) {
            $json = json_encode($json);
        }
        $json = TwigEngine::eval($json);
        return json_decode($json, true);
    }

    public function apply($evalPermissions = true)
    {
        return $this->parse($this->json, $this->queryBuilder, $evalPermissions);
    }

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

    /***Parse filter and build query
     * @param $json array
     * @param Builder $queryBuilder
     * @return Builder
     * @throws \timgws\QBParseException
     */
    public function parse($json, $queryBuilder, $evalPermissions = true)
    {
        $sourceModelInstance = new $json['model']();
        $sourceTable = $sourceModelInstance->getTable();
        if ($evalPermissions === true) {
            $this->evaluatePermissions($sourceModelInstance, $queryBuilder, $json, Permission::READ);
        }
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
                $this->parse($join, $queryBuilder);
            }
        }
        if (!empty($json['where'])) {
            $queryFilter = new QueryFilter($queryBuilder, $json['alias'] ?? null, $json['fields'] ?? null);
            $queryFilter->applyFilter($json['where'] ?? [], false);
        }
    }
}

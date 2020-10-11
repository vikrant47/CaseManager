<?php


namespace Demo\Core\Services;

use Demo\Core\Models\Permission;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Validation\UnauthorizedException;

/**
 * This service will perform CRUD on model by applying security
 */
class SecuredEntityService
{
    /**@var string $modelClass */
    protected $modelClass;
    protected $userSecurityService;
    protected $useEntityQuery = true;

    /**
     * SecuredEntityService constructor.
     * @param string $modelClass
     */
    public function __construct(string $modelClass, $useEntityQuery = true)
    {
        $this->modelClass = $modelClass;
        $this->useEntityQuery = $useEntityQuery;
        $this->userSecurityService = UserSecurityService::getInstance();
    }

    /**@return Builder */
    public function select($where, $permission = Permission::READ)
    {
        return $this->secureQuery($this->modelClass::where($where));
    }

    /**@return Builder */
    public function secureQuery($query, $operation = Permission::READ)
    {
        $permissions = $this->userSecurityService->getRowLevelPermissions($this->modelClass, $operation);
        if ($permissions->count() === 0) {
            return $query;
        }
        return QueryFilter::apply($query, $this->userSecurityService->mergeConditions($permissions));
    }

    /**
     * Check if user can insert give records
     * @param Collection $data
     * @return Collection Collection of allowed records
     */
    public function filterAllowed($data, $operation)
    {
        $permissions = $this->userSecurityService->getRowLevelPermissions($this->modelClass, $operation);
        if ($permissions->count() === 0) {
            return collect([]);
        }
        $inMemoryFilter = new InMemoryQueryFilter($data);
        $inMemoryFilter->init();
        $query = $inMemoryFilter->createQuery();
        $inMemoryFilter->applyFilter($this->userSecurityService->mergeConditions($permissions));
        $allowed = $query->get();
        $inMemoryFilter->destroy();
        return $allowed;
    }

    /**
     * @param array $data
     * @param bool $failIfDeniedAny
     */
    public function inset(array $data, $failIfDeniedAny = true)
    {
        if (is_array($data)) {
            $data = collect($data);
        }
        $allowed = $this->filterAllowed($data, Permission::CREATE);
        if ($allowed->count() === 0 || ($failIfDeniedAny === true && $data->count() !== $allowed->count())) {
            throw new UnauthorizedException('Not authorized to create the records of type ' . $this->modelClass);
        }
        if ($this->useEntityQuery === true) {
            return $this->modelClass::insert($allowed);
        }
        $model = new $this->modelClass;
        return $model->table::insert($allowed);
    }

    /**
     * Check if user can insert the given model record
     * @param $model
     * @return bool
     */
    public function canInsert($model)
    {
        return $this->filterAllowed(collect([$model]), Permission::CREATE)->count() > 0;
    }

    /**
     * Check if user can update the given model record
     * @param $model
     * @return bool
     */
    public function canUpdate($model, $checkInMemory = false)
    {
        if ($checkInMemory === true) {
            return $this->filterAllowed(collect([$model]), Permission::WRITE)->count() > 0;
        }
        $permissions = $this->userSecurityService->getRowLevelPermissions($this->modelClass, Permission::WRITE);
        if ($permissions->count() === 0) {
            return false;
        }
        return QueryFilter::apply(get_class($model)::where('id', '=', $model->id), $this->userSecurityService->mergeConditions($permissions))->count() > 0;

    }

    /**Check if user can delete the given model record
     * @param $model
     * @return bool
     */
    public function canDelete($model, $checkInMemory = false)
    {
        if ($checkInMemory === true) {
            return $this->filterAllowed(collect([$model]), Permission::DELETE)->count() > 0;
        }
        $permissions = $this->userSecurityService->getRowLevelPermissions($this->modelClass, Permission::DELETE);
        if ($permissions->count() === 0) {
            return false;
        }
        return QueryFilter::apply(get_class($model)::where('id', '=', $model->id), $this->userSecurityService->mergeConditions($permissions))->count() > 0;
    }

    /**Check if user can CRUD the given model record
     * @param $model
     * @return bool
     */
    public function canCRUD($model, $operation, $checkInMemory = false)
    {
        if ($operation === Permission::CREATE) {
            return $this->canInsert($model);
        }
        if ($operation === Permission::WRITE) {
            return $this->canUpdate($model, $checkInMemory);
        }
        if ($operation === Permission::DELETE) {
            return $this->canDelete($model, $checkInMemory);
        }
        return false;
    }
}

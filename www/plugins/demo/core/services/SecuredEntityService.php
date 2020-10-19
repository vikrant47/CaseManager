<?php


namespace Demo\Core\Services;

use Demo\Core\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Validation\UnauthorizedException;
use Event;

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
     * This will save the model by appliying security
     * @param Model $model
     */
    public static function save($model)
    {
        $model->SECURED = true;
        $model->save();
    }

    /**
     * This will save the model by appliying security
     * @param Model $model
     */
    public static function update($model)
    {
        $model->SECURED = true;
        $model->update();
    }

    /**
     * This will save the model by appliying security
     * @param Model $model
     * @throws \Exception
     */
    public static function delete($model)
    {
        $model->SECURED = true;
        $model->delete();
    }

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

    /**
     * This will execute bulk operations with laravel eloquent events
     * @param string $modelClass
     * @param Collection $data
     * @param string $operation
     * @param Builder|null $queryBuilder this should be a model query
     * @throws \ReflectionException
     */
    public static function executeBulkOperations($modelClass, $data, $operation, $queryBuilder = null)
    {
        $eventPrefix = substr($operation, 0, strlen($operation) - 1);
        $eventPrefixCapitalized = ucfirst($eventPrefix);
        $before = 'ing';
        $after = 'ed';
        $reflect = new \ReflectionClass($modelClass);
        $modelClassName = $reflect->getShortName();
        $originalModels = collect([]);
        if ($operation === 'create') {
            $originalData = $data;
            $originalModels = $originalData->map(function ($record) use ($modelClassName) {
                /**@var Model $modelInstance */
                $modelInstance = new $this->modelClass();
                $modelInstance->setRawAttributes($record);
                // $modelInstance->save(); // never execute multiple insert
                return $modelInstance;
            });
        } elseif ($operation === 'update' || $operation === 'delete') {
            $dataQuery = $queryBuilder->newQuery();
            $originalModels = $dataQuery->get();
            if ($operation === 'update') {
                $originalModels->each(function ($modelInstance) use ($data) {
                    foreach ($data as $field => $value) {
                        $modelInstance->{$field} = $value;
                    }
                });
            }
        }

        Event::fire('eloquent.bulk' . $eventPrefixCapitalized . $before . ': ' . $modelClassName, $originalModels);
        foreach ($originalModels as $model) {
            // $model->fireEvent('model.saveInternal');
            if ($operation !== 'update') {
                Event::fire('eloquent.' . $eventPrefix . $before . ': ' . $modelClassName, $model);
            }
        }
        if ($operation === 'create') {
            $updatedModels = $originalModels->map(function ($model) {
                /**@var Model $model */
                return $model->attributesToArray();
            })->toArray();
            $modelClassName::insert($updatedModels);
        } elseif ($operation === 'update') {
            // bulk with update not possible
            $originalModels->each(function ($model) {
                $model->save();
            });
        } else {
            $queryBuilder->delete();
        }

        foreach ($originalModels as $model) {
            // $model->fireEvent('model.saveInternal');
            Event::fire('eloquent.' . $eventPrefix . $after . ': ' . $modelClassName, $model);
        }
        Event::fire('eloquent.bulk' . $eventPrefixCapitalized . $after . ': ' . $modelClassName, $data);
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
     * Steps -
     * Step1 - Collect all model attributes in collection
     * Step2 - Add an index based key in this collection
     * Step 3- Filter this cloned collection of attributes
     * Step 4- Filter matched records in the original data set i.e. $data
     * Step 5 - Return this filtered $data
     * @param Collection<Model|array> $data
     * @return Collection<Model|array> Collection of allowed records
     */
    public function filterAllowed($data, $operation)
    {
        if ($data->count() === 0) {
            return $data;
        }
        $permissions = $this->userSecurityService->getRowLevelPermissions($this->modelClass, $operation);
        if ($permissions->count() === 0) {
            return collect([]);
        }
        if ($this->userSecurityService->hasAstrixPermission($permissions)) {
            return $data;
        }
        // converting entity to attributes with index based identifier
        $attributeCollection = $data->map(function ($attributes, $index) {
            if (!($attributes instanceof Model)) {
                $attributes = $attributes->attributesToArray(); // php array assign as clone not ref
            }
            $attributes['_SECURITY_INDEX'] = $index;
            return $attributes;
        });
        $inMemoryFilter = new InMemoryQueryFilter($attributeCollection);
        $inMemoryFilter->init();
        $query = $inMemoryFilter->createQuery();
        $inMemoryFilter->applyFilter($this->userSecurityService->mergeConditions($permissions));
        $allowed = $query->get();
        $inMemoryFilter->destroy();
        if ($allowed->count() === 0) {
            return $allowed;
        }
        return $allowed->map(function ($matched) use ($data) {
            return $data->get($matched['_SECURITY_INDEX']);
        });
    }

    public function bulkInsert($data, $failIfDeniedAny = true)
    {
        if (is_array($data)) {
            $data = collect($data);
        }
        $allowed = $this->filterAllowed($data, Permission::CREATE);
        if ($allowed->count() === 0 || ($failIfDeniedAny === true && $data->count() !== $allowed->count())) {
            throw new UnauthorizedException('Not authorized to create the records of type ' . $this->modelClass);
        }
        $reflect = new \ReflectionClass($this->modelClass);
        $modelClassName = $reflect->getShortName();
        $allowedModels = $allowed->map(function ($record) use ($modelClassName) {
            /**@var Model $modelInstance */
            $modelInstance = new $this->modelClass();
            $modelInstance->setRawAttributes($record);
            // $modelInstance->save(); // never execute multiple insert
            return $modelInstance;
        });
        Event::fire('eloquent.bulkCreating: ' . $modelClassName, $allowedModels);
        foreach ($allowedModels as $model) {
            // $model->fireEvent('model.saveInternal');
            Event::fire('eloquent.creating: ' . $modelClassName, $model);
        }
        $updatedModels = $allowedModels->map(function ($model) {
            /**@var Model $model */
            return $model->attributesToArray();
        })->toArray();
        $modelClassName::insert($updatedModels);
        foreach ($allowedModels as $model) {
            // $model->fireEvent('model.saveInternal');
            Event::fire('eloquent.created: ' . $modelClassName, $model);
        }
        Event::fire('eloquent.bulkCreated: ' . $modelClassName, $allowedModels);
    }

    /**
     * Bulk update the data
     * @param Builder $queryBuilder - Must be a model query builder
     */
    public function bulkUpdate($queryBuilder, $update, $failIfDeniedAny = true)
    {
        $dataQuery = $queryBuilder->newQuery();
        $models = $dataQuery->get();
        if ($models->count() > 0) {
            $allowed = $this->filterAllowed($models, Permission::WRITE);
            if ($allowed->count() === 0 || ($failIfDeniedAny === true && $models->count() !== $allowed->count())) {
                throw new UnauthorizedException('Not authorized to update the records of type ' . $this->modelClass);
            }
            $allowedModels = $models->filter(function ($model) use ($allowed) {
                return !empty($allowed->first(function ($granted) use ($model) {
                    if ($granted['id'] === $model->id) {
                        $model->_allowed = $granted;
                    }
                }));
            });
            foreach ($allowedModels as $model) {
                foreach ($update as $field => $value) {
                    if (array_key_exists($field, $model->_allowed)) { // filtering allowed fields
                        $model->{$field} = $value;
                    }
                }
                $model->save();
            }
            return $allowedModels;
        }
        return $models;
    }

    /**
     * Bulk delete the data
     * @param Builder $queryBuilder - Must be a model query builder
     */
    public function bulkDelete($queryBuilder, $failIfDeniedAny = true)
    {
        $dataQuery = $queryBuilder->newQuery();
        $models = $dataQuery->get();
        if ($models->count() > 0) {
            $reflect = new \ReflectionClass($this->modelClass);
            $modelClassName = $reflect->getShortName();
            $allowed = $this->filterAllowed($models, Permission::DELETE);
            if ($allowed->count() === 0 || ($failIfDeniedAny === true && $models->count() !== $allowed->count())) {
                throw new UnauthorizedException('Not authorized to delete the records of type ' . $this->modelClass);
            }
            $allowedModels = $models->filter(function ($model) use ($allowed) {
                return !empty($allowed->first(function ($granted) use ($model) {
                    if ($granted['id'] === $model->id) {
                        $model->_allowed = $granted;
                    }
                }));
            });
            Event::fire('eloquent.bulkDeleting: ' . $this->modelClass, $allowedModels);
            foreach ($allowedModels as $model) {
                // $model->fireEvent('model.saveInternal');
                Event::fire('eloquent.deleting: ' . $modelClassName, $model);
            }
            $queryBuilder->delete();
            foreach ($allowedModels as $model) {
                // $model->fireEvent('model.saveInternal');
                Event::fire('eloquent.deleted: ' . $modelClassName, $model);
            }
            Event::fire('eloquent.bulkDeleted: ' . $modelClassName, $allowedModels);
            return $allowedModels;
        }
        return $models;
    }

    /**
     * @param array $record
     * @param bool $failIfDeniedAny
     */
    public function inset(array $record)
    {
        if (is_array($record)) {
            $record = collect($record);
        }
        $allowed = $this->filterAllowed(collect([$record]), Permission::CREATE);
        if ($allowed->count() === 0) {
            throw new UnauthorizedException('Not authorized to create the records of type ' . $this->modelClass);
        }
        /**@var $model Model */
        $model = new $this->modelClass;
        $model->setRawAttributes($record);
        $model->save();
    }

    /**
     * Check if user can insert the given model record
     * @param Collection $models
     * @return bool
     */
    public function canInsert($model)
    {
        return $this->filterAllowed(collect([$model]), Permission::CREATE)->count() > 0;
    }

    /**
     * Check if user can update the given model record
     * @param Model|array $model
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
        if ($this->userSecurityService->hasAstrixPermission($permissions)) {
            return true;
        }
        return QueryFilter::apply($this->modelClass::where('id', '=', $model->id), $this->userSecurityService->mergeConditions($permissions))->count() > 0;

    }

    /**Check if user can delete the given model record
     * @param Model|array $model
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
        if ($this->userSecurityService->hasAstrixPermission($permissions)) {
            return true;
        }
        return QueryFilter::apply(get_class($model)::where('id', '=', $model->id), $this->userSecurityService->mergeConditions($permissions))->count() > 0;
    }

    /**Check if user can CRUD the given model record
     * @param Model|array $model
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

<?php


namespace Demo\Core\Classes\Beans;


use Illuminate\Support\Facades\Cache;


class ApplicationCache extends AbstractCache
{
    use \October\Rain\Support\Traits\Singleton;

    public function __construct()
    {
        parent::__construct(Cache::class);
    }

}
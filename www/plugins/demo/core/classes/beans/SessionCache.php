<?php


namespace Demo\Core\Classes\Beans;


use Illuminate\Support\Facades\Session;
use System\Helpers\Cache;

class SessionCache extends AbstractCache
{
    use \October\Rain\Support\Traits\Singleton;

    public function __construct()
    {
        parent::__construct(Session::class);
    }
}
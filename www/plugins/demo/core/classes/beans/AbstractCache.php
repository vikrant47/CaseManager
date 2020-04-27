<?php


namespace Demo\Core\Classes\Beans;


use Illuminate\Support\Facades\Session;

class AbstractCache
{
    protected $cache;

    public function __construct($cache)
    {
        $this->cache = $cache;
    }

    public function has($key)
    {
        return $this->cache::has($key);
    }

    public function get($key, $data = null)
    {
        if (!$this->cache::has($key) && $data !== null) {
            if (is_callable($data)) {
                $data = $data();
            }
            $this->cache::put($key, $data);
        } else {
            $data = $this->cache::get($key);
        }
        return $data;
    }

    public function put($key, $value)
    {
        return $this->cache::put($key, $value);
    }

    public function push($key, $value)
    {
        return $this->cache::push($key, $value);
    }

    public function pull($key, $default)
    {
        return $this->cache::pull($key, $default);
    }


    public function forget($key)
    {
        return $this->cache::forget($key);
    }

    public function flush()
    {
        return $this->cache::flush();
    }

    public function all()
    {
        return $this->cache::all();
    }

    public function flash($key, $value)
    {
        return $this->cache::flash($key, $value);
    }

    public function reflash()
    {
        return $this->cache::reflash();
    }

    public function keep($keys)
    {
        return $this->cache::keep($keys);
    }
}
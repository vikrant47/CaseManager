<?php


namespace Demo\Core\Classes\Beans;


use Illuminate\Support\Facades\Session;

class SessionCache
{
    public static function has($key)
    {
        return Session::has($key);
    }

    public static function get($key, $data = null)
    {
        if (!Session::has($key) && $data !== null) {
            if (is_callable($data)) {
                $data = $data();
            }
            Session::put($key, $data);
        } else {
            $data = Session::get($key);
        }
        return $data;
    }

    public static function put($key, $value)
    {
        return Session::put($key, $value);
    }

    public static function push($key, $value)
    {
        return Session::push($key, $value);
    }

    public static function pull($key, $default)
    {
        return Session::pull($key, $default);
    }


    public static function forget($key)
    {
        return Session::forget($key);
    }

    public static function flush()
    {
        return Session::flush();
    }

    public static function all()
    {
        return Session::all();
    }

    public static function flash($key, $value)
    {
        return Session::flash($key, $value);
    }

    public static function reflash()
    {
        return Session::reflash();
    }

    public static function keep($keys)
    {
        return Session::keep($keys);
    }
}
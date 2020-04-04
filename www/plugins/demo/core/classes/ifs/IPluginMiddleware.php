<?php namespace Demo\Core\Classes\Ifs;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

interface IPluginMiddleware
{
    /**This will be executed before request execution*/
    public function before(Request $request);

    /**This will be executed after request execution*/
    public function after(Request $request,$response);
}
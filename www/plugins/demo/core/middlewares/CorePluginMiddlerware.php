<?php


namespace Demo\Core\Middlewares;


use Demo\Core\Classes\Ifs\IPluginMiddleware;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CorePluginMiddlerware implements IPluginMiddleware
{

    /**This will be executed before request execution*/
    public function before(Request $request)
    {
        $url = $request->getRequestUri();
        if (starts_with($url, '/backend')) {
            $urlSections = explode('/', $url);
            if (count($urlSections) > 3) {
                $request->attributes->set('CURRENT_PLUGIN', $urlSections[2] . '.' . $urlSections[3]);
            }
        }
    }

    /**This will be executed after request execution*/
    public function after(Request $request, $response)
    {

    }
}
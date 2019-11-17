<?php

use Demo\Core\Classes\Beans\ScriptContext;
use Illuminate\Http\Request;

Route::get('/engine/api/{pluginName}/models/{modelName}', function ($pluginName, $modelName) {
    $pluginId = str_replace(' ', '.', ucwords(str_replace('.', ' ', $pluginName)));
    $pluginConnection = new \Demo\Core\Classes\Helpers\PluginConnection($pluginId);
    $data = $pluginConnection->getModel($modelName)::all();
    if (empty($data)) {
        return response($data, 404);
    }
    return response($data, 200);
});

Route::get('/engine/api/{pluginName}/models/{modelName}/{id}', function ($pluginName, $modelName, $id) {
    $pluginId = str_replace(' ', '.', ucwords(str_replace('.', ' ', $pluginName)));
    $pluginConnection = new \Demo\Core\Classes\Helpers\PluginConnection($pluginId);
    $data = $pluginConnection->getModel($modelName)::find($id);
    if (empty($data)) {
        return response($data, 404);
    }
    return response($data->first(), 200);
});

Route::post('/engine/api/{pluginName}/models/{modelName}/{id}', function ($pluginName, $modelName, $id) {
    $pluginId = str_replace(' ', '.', ucwords(str_replace('.', ' ', $pluginName)));
    $pluginConnection = new \Demo\Core\Classes\Helpers\PluginConnection($pluginId);
    $data = $pluginConnection->getModel($modelName)::find($id);
    if (empty($data)) {
        return response($data, 404);
    }
    return response($data->first(), 200);
});

Route::delete('/engine/api/{pluginName}/models/{modelName}/{id}', function ($pluginName, $modelName, $id) {
    $pluginId = str_replace(' ', '.', ucwords(str_replace('.', ' ', $pluginName)));
    $pluginConnection = new \Demo\Core\Classes\Helpers\PluginConnection($pluginId);
    $data = $pluginConnection->getModel($modelName)::find($id);
    if (empty($data)) {
        return response($data, 404);
    }
    return response($data->first(), 200);
});

Route::match(['get', 'put', 'post', 'delete'], '/engine/inbound-api/{wildcard}', function (Request $request) {
    /**@var $currentRoute  Illuminate\Routing\Route */
    $currentRoute = Route::getCurrentRoute();
    $path = $request->getPathInfo();
    $apis = \Demo\Core\Models\InboundApi::where('method', strtolower($request->method()))->get();
    foreach ($apis as $api) {
        $pattern = str_replace('/', '\\/', preg_replace('/\{(\s*?.*?)*?\}/', '(.*)', $api->url));
        $pathVariables = [];
        if (preg_match('/' . $pattern . '/', $path, $pathVariables)) {
            $context = new ScriptContext();
            $result = $context->execute($api->script, ['request' => $request]);
            return $result;
        }
    }
    return response('', 404);

})->where('wildcard', '.+');;

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

Route::match(['get', 'put', 'post', 'delete'], '/engine/inbound-api/{pluginCode}/{wildcard}', function (Request $request, $pluginCode, $wildcard) {
    $wildcard = '/' . $wildcard;
    /**@var $currentRoute  Illuminate\Routing\Route */
    $plugin = \Demo\Core\Models\PluginVersions::where('code',str_replace(' ','.',ucwords(str_replace('.',' ',$pluginCode))))->first();
    if (empty($plugin)) {
        return response(['message' => 'No matching plugin found with code ' . $pluginCode], 404);
    }
    $currentRoute = Route::getCurrentRoute();
    $apis = \Demo\Core\Models\InboundApi::where([
        'method' => strtolower($request->method()),
        'plugin_id' => $plugin->id,
    ])->get();
    foreach ($apis as $api) {
        $pattern = str_replace('/', '\\/', preg_replace('/\{(\s*?.*?)*?\}/', '(.*)', $api->url));
        $pathVariables = [];
        if (preg_match('/' . $pattern . '/', $wildcard, $pathVariables)) {
            $context = new ScriptContext();
            $result = $context->execute($api->script, ['request' => $request, 'pathVariables' => $pathVariables]);
            return $result;
        }
    }
    return response(['message' => 'No matching path found'], 404);

})->where('wildcard', '.+');;

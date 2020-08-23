<?php

use Backend\Classes\AuthManager;
use Demo\Core\Classes\Beans\ScriptContext;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

Route::match(['get', 'put', 'post', 'delete'], '/tenant/{tenantCode}/{wildcard}', function (Request $request, $tenantCode, $wildcard) {
    // $wildcard = '/' . $wildcard;
    $tenant = \Demo\Tenant\Models\Tenant::where(['code' => $tenantCode, 'active' => true])->first();
    if ($tenantCode !== 'default') {
        if (empty($tenant)) {
            return response('Page not found', 404);
        }
        $tenantService = new \Demo\Tenant\Services\TenantService(null);
        $tenantService->configureConnectionByName($tenantCode);
        $tenantService->setDefaultDatabaseConnection($tenantCode);
    }
    \Backend\Facades\BackendAuth::setUser(\Backend\Models\User::where('id',1)->first());
    $backendController = app()->make(ltrim(\Backend\Classes\BackendController::class, '\\'));
    $request->attributes->set('tenant', $tenant);
    return $backendController->run($wildcard);
})->where('wildcard', '.+')->middleware('web');
Route::get('/backend/engine/api/{pluginName}/models/{modelName}', function ($pluginName, $modelName) {
    $pluginId = str_replace(' ', '.', ucwords(str_replace('.', ' ', $pluginName)));
    $pluginConnection = new \Demo\Core\Classes\Helpers\PluginConnection($pluginId);
    $data = $pluginConnection->getModel($modelName)::all();
    if (empty($data)) {
        return response($data, 404);
    }
    return response($data, 200);
})->middleware('web');

Route::get('/backend/engine/api/{pluginName}/models/{modelName}/{id}', function ($pluginName, $modelName, $id) {
    $pluginId = str_replace(' ', '.', ucwords(str_replace('.', ' ', $pluginName)));
    $pluginConnection = new \Demo\Core\Classes\Helpers\PluginConnection($pluginId);
    $data = $pluginConnection->getModel($modelName)::find($id);
    if (empty($data)) {
        return response($data, 404);
    }
    return response($data->first(), 200);
})->middleware('web');

Route::post('/backend/engine/api/{pluginName}/models/{modelName}/{id}', function ($pluginName, $modelName, $id) {
    $pluginId = str_replace(' ', '.', ucwords(str_replace('.', ' ', $pluginName)));
    $pluginConnection = new \Demo\Core\Classes\Helpers\PluginConnection($pluginId);
    $data = $pluginConnection->getModel($modelName)::find($id);
    if (empty($data)) {
        return response($data, 404);
    }
    return response($data->first(), 200);
})->middleware('web');

Route::delete('/backend/engine/api/{pluginName}/models/{modelName}/{id}', function ($pluginName, $modelName, $id) {
    $pluginId = str_replace(' ', '.', ucwords(str_replace('.', ' ', $pluginName)));
    $pluginConnection = new \Demo\Core\Classes\Helpers\PluginConnection($pluginId);
    $data = $pluginConnection->getModel($modelName)::find($id);
    if (empty($data)) {
        return response($data, 404);
    }
    return response($data->first(), 200);
})->middleware('web');

Route::match(['get', 'put', 'post', 'delete'], '/engine/inbound-api/{pluginCode}/{wildcard}', function (Request $request, $pluginCode, $wildcard) {
    $wildcard = '/' . $wildcard;
    /**@var $currentRoute  Illuminate\Routing\Route */
    $code = str_replace(' ', '.', ucwords(str_replace('-', ' ', $pluginCode)));
    $plugin = \Demo\Core\Models\PluginVersions::where('code', $code)->first();
    if (empty($plugin)) {
        return response(['message' => 'No matching plugin found with code ' . $code], 404);
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

})->where('wildcard', '.+')->middleware('web');

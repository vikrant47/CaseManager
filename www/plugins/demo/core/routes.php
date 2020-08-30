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
    \Backend\Facades\BackendAuth::setUser(\Backend\Models\User::where('id', 1)->first());
    $backendController = app()->make(ltrim(\Backend\Classes\BackendController::class, '\\'));
    $request->attributes->set('tenant', $tenant);
    return $backendController->run($wildcard);
})->where('wildcard', '.+')->middleware('web');

Route::match(['get', 'put', 'post', 'delete'], '/engine/inbound-api/{applicationName}/{wildcard}', function (Request $request, $applicationCode, $wildcard) {
    $wildcard = '/' . $wildcard;
    /**@var $currentRoute  Illuminate\Routing\Route */
    $application = \Demo\Core\Models\EngineApplication::where([
        'active' => true,
        'code' => $applicationCode,
    ])->first(['id']);
    if (empty($application)) {
        return response(['message' => 'No matching application found with code ' . $applicationCode], 404);
    }
    $currentRoute = Route::getCurrentRoute();
    $apis = \Demo\Core\Models\InboundApi::where([
        'method' => strtolower($request->method()),
        'engine_application_id' => $application->id,
    ])->orderBy('sort_order', 'ASC')->get();
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

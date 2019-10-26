<?php

Route::get('/engine/{pluginName}/models/{modelName}/{id}', function ($pluginName, $modelName, $id) {
    $pluginId = str_replace(' ', '.', ucwords(str_replace('.', ' ', $pluginName)));
    $pluginConnection = new \Demo\Core\Classes\Helpers\PluginConnection($pluginId);
    $data = $pluginConnection->getModel($modelName)::find($id);
    if (empty($data)) {
        return response($data, 404);
    }
    return response($data->first(), 200);
});

Route::post('foo/bar', function () {
    return 'Hello World';
});

Route::put('foo/bar', function () {
    //
});

Route::delete('foo/bar', function () {
    //
});
<?php

Route::group(config('translation.route_group_config', []), function ($router) {
    Route::prefix('admin/languages')->group(function ($router) {
        $router->get('/', 'LanguageController@index')->name('index');
        $router->get('/create', 'LanguageController@create')->name('create');
        $router->post('/', 'LanguageController@store')->name('store');
        $router->get('/{language}/translations', 'LanguageTranslationController@index')->name('translations.index');
        $router->get('/{language}/translations/create', 'LanguageTranslationController@create')->name('translations.create');
        $router->post('/{language}/translations', 'LanguageTranslationController@store')->name('translations.store');
    });
    $router->post('/languages/{language}', 'LanguageTranslationController@update')->name('translations.update');
});

<?php

Route::group(config('translation.route_group_config', []), function ($router) {
    $router->get('/', 'LanguageController@index')->name('index');
    $router->get('/create', 'LanguageController@create')->name('create');
    $router->post('/', 'LanguageController@store')->name('store');
    $router->get('/{language}/translations', 'LanguageTranslationController@index')->name('translations.index');
    $router->post('/{language}', 'LanguageTranslationController@update')->name('translations.update');
    $router->get('/{language}/translations/create', 'LanguageTranslationController@create')->name('translations.create');
    $router->post('/{language}/translations', 'LanguageTranslationController@store')->name('translations.store');
    $router->post('/sync-missing-translation-keys', function () {
        dd('dd');
    })->name('translations.sync');
});

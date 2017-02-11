<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'pagemanager'], function (Router $router) {
    $router->get('/', 'PageManagerController@index');

});

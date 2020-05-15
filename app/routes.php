 <?php

    $router->get('', 'PagesController@home');
    $router->get('about', 'PagesController@about');
    $router->get('contact', 'PagesController@contact');

    $router->get('users', 'UsersController@index');
    $router->post('users', 'UsersController@store');

    $router->get('turno', 'TurnoController@index');
    $router->get('turno/create', 'TurnoController@create');
    $router->post('turno/save', 'TurnoController@save');
    $router->get('turno/ficha', 'TurnoController@ficha');
    $router->get('turno/delete', 'TurnoController@delete');

    $router->get('not_found', 'ProjectController@notFound');
    $router->get('internal_error', 'ProjectController@internalError');

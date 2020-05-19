 <?php

    $router->get('', 'PagesController@home');
    $router->get('about', 'PagesController@about');
    $router->get('contact', 'PagesController@contact');

    $router->get('users', 'UsersController@index');
    $router->post('users', 'UsersController@store');

    $router->get('turno', 'TurnoController@index');
    $router->get('create', 'TurnoController@create');
    $router->post('save', 'TurnoController@save');
    $router->get('ficha', 'TurnoController@ficha');
    $router->get('delete', 'TurnoController@delete');
    $router->get('edit', 'TurnoController@update');
   


    $router->get('not_found', 'ProjectController@notFound');
    $router->get('internal_error', 'ProjectController@internalError');

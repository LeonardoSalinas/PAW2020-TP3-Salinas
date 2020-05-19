 <?php

    $router->get('', 'PagesController@home');
   
    
    $router->get('turno', 'TurnoController@index');
    $router->get('create', 'TurnoController@create');
    $router->post('save', 'TurnoController@save');
    $router->get('ficha', 'TurnoController@ficha');
    $router->get('delete', 'TurnoController@delete');
    $router->get('edit', 'TurnoController@update');
   


    $router->get('not_found', 'ProjectController@notFound');
    $router->get('internal_error', 'ProjectController@internalError');

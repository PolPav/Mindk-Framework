<?php
return[

    ['pattern' => '/',
        'class' => 'App\IndexController',
        'action' => 'indexMethod'],


    ['pattern' => '/catalog',
        'class' => 'App\CatalogController',
        'action' => 'catalogMethodGet',
        'params' => 'get_params',
        'method' => 'GET'],

    ['pattern' => '/catalog',
        'class' => 'App\CatalogController',
        'action' => 'catalogMethodPost',
        'params' => 'post_params',
        'method' => 'POST'],

    ['pattern' => '/catalog',
        'class' => 'App\CatalogController',
        'action' => 'catalogMethodPut',
        'params' => 'put_params',
        'method' => 'PUT',],


    ['pattern' => '/basket',
        'class' => 'App\BasketController',
        'action' => 'basketMethod',
        'params' => true],

    ['pattern' => '/delivery',
        'class' => 'App\DeliveryController',
        'action' => 'deliveryMethod'
    ],

    ['pattern' => '/search/id',
        'class' => 'App\SearchController',
        'action' => 'searchMethod',
        'params' => 9],


    ['pattern' => '/contacts',
        'class' => 'App\ContactsController',
        'action' => 'contactsMethod'],
];
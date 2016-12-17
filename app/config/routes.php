<?php
return[

    ['pattern' => '/',
        'class' => 'App\IndexController',
        'action' => 'indexAction',
        'method' => 'GET'],

    ['pattern' => '/catalog',
        'class' => 'App\CatalogController',
        'action' => 'catalogAction',
        'method' => 'GET'],

    ['pattern' => '/category',
        'class' => 'App\CategoryController',
        'action' => 'categoryAction',
        'method' => 'GET'],
    
    ['pattern' => '/login',
        'class' => 'App\LoginController',
        'action' => 'checkUser'],

    ['pattern' => '/basket',
        'class' => 'App\BasketController',
        'action' => 'basketAction'],

    ['pattern' => '/admin',
        'class' => 'App\AdminController',
        'action' => 'adminPanel'],

    ['pattern' => '/admin/add',
        'class' => 'App\AdminController',
        'action' => 'addProductToCatalog'],

    ['pattern' => '/order',
        'class' => 'App\BasketController',
        'action' => 'addOrder'],

    ['pattern' => '/search',
        'class' => 'App\SearchController',
        'action' => 'searchAction']
];
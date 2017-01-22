<?php
return [

  ['service_name' => 'product',
    'class' => 'App\Models\ProductModel',
    'dependency' => 'PolPav\FactoryAdapter'],

    ['service_name' => 'order',
        'class' => 'App\Models\OrderModel',
        'dependency' => 'PolPav\FactoryAdapter'],

    ['service_name' => 'app',
        'class' => 'PolPav\App'],
    
    ['service_name' => 'next',
        'class' => 'App\IndexController',
        'params' => 5 ]
];
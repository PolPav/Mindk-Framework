<?php
return[

    ['pattern' => '',
        'class' => 'shop\app\Index',
        'action' => 'indexMethod'],


    ['pattern' => '/catalog',
        'class' => 'shop\app\Catalog',
        'action' => 'catalogMethodGet',
        'params' => 'get_params',
        'method' => 'GET'],

    ['pattern' => '/catalog',
        'class' => 'shop\app\Catalog',
        'action' => 'catalogMethodPost',
        'params' => 'post_params',
        'method' => 'POST'],

    ['pattern' => '/catalog/name',
        'class' => 'shop\app\Catalog',
        'action' => 'catalogMethodPut',
        'params' => 'put_params',
        'method' => 'PUT'],


    ['pattern' => '/basket',
        'class' => 'shop\app\Basket',
        'action' => 'basketMethod',
        'params' => true],

    ['pattern' => '/delivery',
        'class' => 'shop\app\Delivery',
        'action' => 'deliveryMethod'
    ],

    ['pattern' => '/search',
        'class' => 'shop\app\Search',
        'action' => 'searchMethod',
        'params' => 9],


    ['pattern' => '/contacts',
        'class' => 'shop\app\Contacts',
        'action' => 'contactsMethod'],
];
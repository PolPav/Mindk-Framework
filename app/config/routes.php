<?php
return[

    ['pattern' => '',
        'class' => 'shop\app\Index@indexMethod:param',
        'method' => ''],


    ['pattern' => '/catalog',
        'class' => 'shop\app\Catalog@catalogMethodGet:catalog_get_params',
        'method' => 'GET'],

    ['pattern' => '/catalog',
        'class' => 'shop\app\Catalog@catalogMethodPost:catalog_post_params',
        'method' => 'POST'],


    ['pattern' => '/basket',
        'class' => 'shop\app\Basket@basketMethod:param_basket'],

    ['pattern' => '/delivery',
        'class' => 'shop\app\Delivery@deliveryMethod:'],

    ['pattern' => '/search',
        'class' => 'shop\app\Search@searchMethod:param_search'],


    ['pattern' => '/contacts',
        'class' => 'shop\app\Contacts@contactsMethod:param_contacts'],
];
<?php
return[

    ['pattern' => '',
        'class' => 'shop\app\Index'],


    ['pattern' => 'catalog',
        'class' => 'shop\app\Catalog',
        'method' => 'catalogMethod'],

    ['pattern' => 'basket',
        'class' => 'shop\app\Basket',
        'method' => 'basketMethod'],

    ['pattern' => 'delivery',
        'class' => 'shop\app\Delivery',
        'method' => 'deliveryMethod'],

    ['pattern' => 'search',
        'class' => 'shop\app\Search',
        'method' => 'searchMethod'],


    ['pattern' => 'contacts',
        'class' => 'shop\app\Contacts',
        'method' => 'contactsMethod'],

];
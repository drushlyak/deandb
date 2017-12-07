<?php

return array(
    
    'product/([0-9]+)' => 'product/view/$1', // actionView в ProductController  student/view/$1
    
    'catalog' => 'catalog/index', // actionIndex в CatalogController

    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', // actionCategory в CatalogController   
    'category/([0-9]+)' => 'catalog/category/$1',  // actionCategory в CatalogController catalog/group/$1

    'rating/([0-9]+)' => 'product/rating/$1', // actionRating в ProductController  student/view/$1

    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    'cabinet/edit' => 'cabinet/edit', //личный кабинет
    'cabinet' => 'cabinet/index',

    '' => 'site/index', // actionIndex в SiteController ОБЯЗАТЕЛЬНО В КОНЕЦ!!!!

    
);

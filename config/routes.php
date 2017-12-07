<?php

return array(
    
    'student/([0-9]+)' => 'student/view/$1', // actionView в ProductController  student/view/$1
    
    'catalog' => 'catalog/index', // actionIndex в CatalogController

    'group/([0-9]+)/page-([0-9]+)' => 'catalog/group/$1/$2', // actionGroup в CatalogController
    'group/([0-9]+)' => 'catalog/group/$1',  // actionGroup в CatalogController catalog/group/$1

    'rating/([0-9]+)' => 'student/rating/$1', // actionRating в ProductController  student/view/$1

    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    'cabinet/edit' => 'cabinet/edit', //личный кабинет
    'cabinet' => 'cabinet/index',

    '' => 'site/index', // actionIndex в SiteController ОБЯЗАТЕЛЬНО В КОНЕЦ!!!!

    
);

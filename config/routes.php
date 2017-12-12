<?php

return array(
    
    'student/([0-9]+)' => 'student/view/$1', // actionView в ProductController  student/view/$1
    'student/edit/([0-9]+)' => 'student/edit/$1', // actionView в ProductController  student/view/$1

    'catalog' => 'catalog/index', // actionIndex в CatalogController

    'group/([0-9]+)/page-([0-9]+)' => 'catalog/group/$1/$2', // actionCategory в CatalogController
    'group/([0-9]+)' => 'catalog/group/$1', // actionCategory в CatalogController

    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    'cabinet/edit' => 'cabinet/edit', //личный кабинет
    'cabinet' => 'cabinet/index',
    // Управление студентами:
    'admin/student/create' => 'adminStudent/create',
    'admin/student/update/([0-9]+)' => 'adminStudent/update/$1',
    'admin/student/delete/([0-9]+)' => 'adminStudent/delete/$1',
    'admin/student' => 'adminStudent/index',
    // Управление групами:
    'admin/group/create' => 'adminGroup/create',
    'admin/group/update/([0-9]+)' => 'adminGroup/update/$1',
    'admin/group/delete/([0-9]+)' => 'adminGroup/delete/$1',
    'admin/group' => 'adminGroup/index',
    //Управление оплатами:
    'admin/fee/create' => 'adminFee/create',
    'admin/fee/update/([0-9]+)' => 'adminFee/update/$1',
    'admin/fee/delete/([0-9]+)' => 'adminFee/delete/$1',
    'admin/fee' => 'adminFee/index',
    //управление лекторами:
    'admin/lecturer/create' => 'adminLecturer/create',
    'admin/lecturer/update/([0-9]+)' => 'adminLecturer/update/$1',
    'admin/lecturer/delete/([0-9]+)' => 'adminLecturer/delete/$1',
    'admin/lecturer' => 'adminLecturer/index',

    // Админпанель:
    'admin' => 'admin/index',

    'contacts' => 'site/contact',
    'about' => 'site/about',

    '' => 'site/index', // actionIndex в SiteController ОБЯЗАТЕЛЬНО В КОНЕЦ!!!!

    
);

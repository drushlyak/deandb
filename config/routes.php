<?php

return array(
    
    'student/([0-9]+)' => 'student/view/$1', // actionView
    'student/edit/([0-9]+)' => 'student/edit/$1', // actionView
    'student/search/(.+)' => 'student/search/$1',

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
    //управление преподавателями:
    'admin/lecturer/create' => 'adminLecturer/create',
    'admin/lecturer/update/([0-9]+)' => 'adminLecturer/update/$1',
    'admin/lecturer/delete/([0-9]+)' => 'adminLecturer/delete/$1',
    'admin/lecturer' => 'adminLecturer/index',
	//управление семестрами:
    'admin/semester/create' => 'adminSemester/create',
    'admin/semester/update/([0-9]+)' => 'adminSemester/update/$1',
    'admin/semester/delete/([0-9]+)' => 'adminSemester/delete/$1',
    'admin/semester' => 'adminSemester/index',
    //управление видами учебы:
    'admin/study/create' => 'adminStudy/create',
    'admin/study/update/([0-9]+)' => 'adminStudy/update/$1',
    'admin/study/delete/([0-9]+)' => 'adminStudy/delete/$1',
    'admin/study' => 'adminStudy/index',
    //управление дисциплинами:
    'admin/discipline/create' => 'adminDiscipline/create',
    'admin/discipline/update/([0-9]+)' => 'adminDiscipline/update/$1',
    'admin/discipline/delete/([0-9]+)' => 'adminDiscipline/delete/$1',
    'admin/discipline' => 'adminDiscipline/index',
    //управление оценивание:
    'admin/examination/create' => 'adminExamination/create',
    'admin/examination/update/([0-9]+)' => 'adminExamination/update/$1',
    'admin/examination/delete/([0-9]+)' => 'adminExamination/delete/$1',
    'admin/examination' => 'adminExamination/index',
    //управление пользователями:
    'admin/user/create' => 'adminUser/create',
    'admin/user/update/([0-9]+)' => 'adminUser/update/$1',
    'admin/user/delete/([0-9]+)' => 'adminUser/delete/$1',
    'admin/user' => 'adminUser/index',
    //управление задолженностью:
    'admin/debt/create' => 'adminDebt/create',
    'admin/debt/update/([0-9]+)' => 'adminDebt/update/$1',
    'admin/debt/delete/([0-9]+)' => 'adminDebt/delete/$1',
    'admin/debt' => 'adminDebt/index',
    //управление рейтингом:
    'admin/rating/create' => 'adminRating/create',
    'admin/rating/update/([0-9]+)' => 'adminRating/update/$1',
    'admin/rating/delete/([0-9]+)' => 'adminRating/delete/$1',
    'admin/rating' => 'adminRating/index',
    
    // Админпанель:
    'admin' => 'admin/index',

    'contacts' => 'site/contact',
    'about' => 'site/about',

    '' => 'site/index', // actionIndex в SiteController ОБЯЗАТЕЛЬНО В КОНЕЦ!!!!

    
);

<?php

//include_once ROOT . '/models/Group.php';
//include_once ROOT . '/models/Student.php';

class SiteController
{

    public function actionIndex()
    {
        $groups = array();
        $groups = Group::getGroupsList();

        //$latestProducts = array();
        //$latestProducts = Product::getLatestProducts(6);
        
        require_once(ROOT . '/views/site/index.php');

        return true;
    }

}

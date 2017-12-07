<?php

//include_once ROOT . '/models/Category.php';
//include_once ROOT . '/models/Product.php';

class ProductController  //product меняем на student
{

    public function actionView($productId)
    {

        $categories = array();
        $categories = Category::getCategoriesList(); // категории в навигации в левой части раздела
        
        $product = Product::getProductById($productId);

        require_once(ROOT . '/views/product/view.php');

        return true;
    }

    public function actionRating($productId)
    {

        $categories = array();
        $categories = Category::getCategoriesList(); // категории в навигации в левой части раздела

        $product = Product::getRatingById($productId);

        require_once(ROOT . '/views/product/rating.php');

        return true;
    }

}

<?php

//include_once ROOT . '/models/Category.php';
//include_once ROOT . '/models/Student.php';

class StudentController  //student меняем на student
{

    public function actionView($studentId)
    {

        $categories = array();
        $categories = Category::getCategoriesList(); // категории в навигации в левой части раздела
        
        $product = Student::getStudentById($studentId);

        require_once(ROOT . '/views/student/view.php');

        return true;
    }

    public function actionRating($studentId)
    {

        $categories = array();
        $categories = Category::getCategoriesList(); // категории в навигации в левой части раздела

        $product = Student::getRatingById($studentId);

        require_once(ROOT . '/views/student/rating.php');

        return true;
    }

}

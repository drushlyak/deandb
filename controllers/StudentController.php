<?php

//include_once ROOT . '/models/Group.php';
//include_once ROOT . '/models/Student.php';

class StudentController  //student меняем на student
{

    public function actionView($studentId)
    {

        $groups = array();
        $groups = Group::getGroupsList(); // категории в навигации в левой части раздела

        $student = Student::getStudentById($studentId);

        require_once(ROOT . '/views/student/view.php');

        return true;
    }

    public function actionRating($studentId)
    {

        $groups = array();
        $groups = Group::getGroupsList(); // категории в навигации в левой части раздела

        $student = Student::getRatingById($studentId);

        require_once(ROOT . '/views/student/rating.php');

        return true;
    }

    public function actionEdit($studentId){

        $groups = array();
        $groups = Group::getGroupsList(); // категории в навигации в левой части раздела

        $student = Student::getStudentById($studentId);

        require_once(ROOT . '/views/student/edit.php');

        return true;

    }

}

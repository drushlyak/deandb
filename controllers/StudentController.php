<?php


class StudentController  
{

    public function actionView($studentId)
    {

        $groups = array();
        $groups = Group::getGroupsList(); // категории в навигации в левой части раздела

        $student = Student::getStudentById($studentId);

        $studentRating = Student::getRatingById($studentId);

        require_once(ROOT . '/views/student/view.php');

        return true;
    }

}

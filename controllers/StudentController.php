<?php


class StudentController  
{

    public function actionView($studentId)
    {
            // Проверка доступа
        if (AdminBase::checkStatus()) $adminRole = true;

        $groups = array();
        $groups = Group::getGroupsList(); // категории в навигации в левой части раздела

        $student = Student::getStudentById($studentId);

        $studentRating = Student::getRatingById($studentId);

        require_once(ROOT . '/views/student/view.php');

        return true;
    }



    public function actionSearch($searchText)
    {
        // Обработка формы
        //if (isset($_POST['submit'])) {
        // Если форма отправлена
        // Получаем данные из формы При необходимости можно валидировать значения
        //$searchText = $_POST['searchText'];

        $groups = array();
        $groups = Group::getGroupsList();

        $searchText = urldecode ($searchText);
        // Получаем список
        $studentsList = Student::getResultList($searchText);

        // Подключаем вид
        require_once(ROOT . '/views/student/result.php');
        return true;
    }

}

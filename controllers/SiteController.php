<?php

class SiteController
{

    public function actionIndex()
    {
        $groups = array();
        $groups = Group::getGroupsList();

        $countOfStudents = Student::countOfStudents();

        $countOfGroups = Db::countRowsInTable('groups');

        $countOfLecturers = Db::countRowsInTable('lecturers');

        $countTypesOfStudy = Db::countRowsInTable('types_of_study');

        $countOfDisciplines = Db::countRowsInTable('disciplines');

        $averageRatingOfAll = Student::averageRatingOfAll();

        $lastAccept = Student::lastAccept();
        

        require_once(ROOT . '/views/site/index.php');

        return true;
    }

    public function actionContact() {

        $userEmail = '';
        $userText = '';
        $result = false;

        if (isset($_POST['submit'])) {

            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];

            $errors = false;

            // Валидация полей
            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильный email';
            }

            if ($errors == false) {
                $adminEmail = 'drushlyak@bk.ru';
                $message = "Текст: {$userText}. От {$userEmail}";
                $subject = 'Тема письма';
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }

        }

        require_once(ROOT . '/views/site/contact.php');

        return true;
    }

    /**
     * Action для страницы "О проекте"
     */
    public function actionAbout()
    {
        // Подключаем вид
        require_once(ROOT . '/views/site/about.php');
        return true;
    }
    
    
    


}

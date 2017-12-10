<?php

//include_once ROOT . '/models/Group.php';
//include_once ROOT . '/models/Student.php';

class SiteController
{

    public function actionIndex()
    {
        $groups = array();
        $groups = Group::getGroupsList();
        
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

}

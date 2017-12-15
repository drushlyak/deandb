<?php

/**
 * Контроллер AdminUserController
 * Управление в админпанели
 */
class AdminUserController extends AdminBase
{

    /**
     * Action для страницы "Управление..."
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin('superadmin');

        // Получаем список
        $usersList = User::getUsersListAdmin();

        // Подключаем вид
        require_once(ROOT . '/views/admin_user/index.php');
        return true;
    }

    /**
     * Action для страницы "Добавить ..."
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin('superadmin');

        $usersList = User::getUsersListAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            // Флаг ошибок в форме
            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }

            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }

            if ($errors == false) {
                $result = User::createUser($name, $email, $password,$role);
            }

                // Перенаправляем пользователя на страницу управления
                header("Location: /admin/user");
            }

        require_once(ROOT . '/views/admin_user/create.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать...@
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin('superadmin');

        // Получаем список
        //$usersList = User::getUsersListAdmin();

        // Получаем данные о конкретной категории
        $tableName = "user";
        $user = Db::getRowById($id, $tableName);

        // Обработка формы
        if (isset($_POST['submit'])) {
                // Если форма отправлена
                // Получаем данные из формы
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];

                // Флаг ошибок в форме
                $errors = false;

                if (!User::checkName($name)) {
                    $errors[] = 'Имя не должно быть короче 2-х символов';
                }

                if (!User::checkEmail($email)) {
                    $errors[] = 'Неправильный email';
                }

                if (!User::checkPassword($password)) {
                    $errors[] = 'Пароль не должен быть короче 6-ти символов';
                }

                if (User::checkEmailExists($email)) {
                    $errors[] = 'Такой email уже используется';
                }

                if ($errors == false) {
                    $result = User::createUser($name, $email, $password,$role);
                }

                // Перенаправляем пользователя на страницу управления
                header("Location: /admin/user");
            }

        // Подключаем вид
        require_once(ROOT . '/views/admin_user/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить..."
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin('superadmin');

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем оплату
            $tableName = "user";
            Db::deleteRowById($tableName,$id);

            // Перенаправляем пользователя на страницу управления
            header("Location: /admin/user");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_user/delete.php');
        return true;
    }

}

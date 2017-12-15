<?php

/**
 * Контроллер AdminSemesterController
 * Управление семестрами в админпанели
 */
class AdminSemesterController extends AdminBase
{

    /**
     * Action для страницы "Управление семестрами"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий
        $semestersList = Semester::getSemestersListAdmin();

        // Подключаем вид
        require_once(ROOT . '/views/admin_semester/index.php');
        return true;


    }

    /**
     * Action для страницы "Добавить семестр"
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $semester = $_POST['semester'];
            $information = $_POST['information'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($semester) || empty($semester)) {
                $errors[] = 'Заполните поле';
            }


            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую строку в таблицу
                Semester::createSemester($semester,$information);

                // Перенаправляем пользователя на страницу управлениями
                header("Location: /admin/semester");
            }
        }

        require_once(ROOT . '/views/admin_semester/create.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретной категории
        $tableName = "semesters";
        $semesters = Db::getRowById($id, $tableName);

        // Обработка формы
        if (isset($_POST['submit'])) {

            // Если форма отправлена
            // Получаем данные из формы
            $semester = $_POST['semester'];
            $information = $_POST['information'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($semester) || empty($semester)) {
                $errors[] = 'Заполните поле';
            }

            // Сохраняем изменения
            Semester::updateSemesterById($id, $semester, $information);

            // Перенаправляем пользователя на страницу управления
            header("Location: /admin/semester");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_semester/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить семестр"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем оплату
            $tableName = "semesters";
            Db::deleteRowById($tableName,$id);

            // Перенаправляем пользователя на страницу управления
            header("Location: /admin/semester");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_semester/delete.php');
        return true;
    }

}

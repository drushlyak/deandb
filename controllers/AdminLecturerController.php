<?php

/**
 * Контроллер AdminLecturerController
 * Управление категориями оплат в админпанели
 */
class AdminLecturerController extends AdminBase
{

    /**
     * Action для страницы "Управление преподавателями"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий
        $lecturersList = Lecturer::getLecturersListAdmin();

        // Подключаем вид
        require_once(ROOT . '/views/admin_lecturer/index.php');
        return true;
    }

    /**
     * Action для страницы "Добавить преподавателя"
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $lecturer = $_POST['lecturer'];
            $full_time_job = $_POST['full_time_job'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($lecturer) || empty($lecturer)) {
                $errors[] = 'Заполните поле';
            }


            if ($errors == false) {
                // Если ошибок нет
                // Добавляем нового преподавателя
                Lecturer::createLecturer($lecturer,$full_time_job);

                // Перенаправляем пользователя на страницу управлениями оплатами
                header("Location: /admin/lecturer");
            }
        }

        require_once(ROOT . '/views/admin_lecturer/create.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать преподавателя"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретной категории
        $lecturer = Lecturer::getLecturerById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $lecturer = $_POST['lecturer'];
            $full_time_job = $_POST['full_time_job'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($lecturer) || empty($lecturer)) {
                $errors[] = 'Заполните поле';
            }

            // Сохраняем изменения
            Lecturer::updateLecturerById($id, $lecturer, $full_time_job);

            // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /admin/lecturer");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_lecturer/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить преподавателя"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем оплату
            $tableName = "lecturers";
            Db::deleteRowById($tableName,$id);

            // Перенаправляем пользователя на страницу управлениями оплатами
            header("Location: /admin/lecturer");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_lecturer/delete.php');
        return true;
    }

}

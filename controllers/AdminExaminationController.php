<?php

/**
 * Контроллер AdminExaminationController
 * Управление в админпанели
 */
class AdminExaminationController extends AdminBase
{

    /**
     * Action для страницы "Управление..."
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий
        $examinationsList = Examination::getExaminationsListAdmin();

        // Подключаем вид
        require_once(ROOT . '/views/admin_examination/index.php');
        return true;
    }

    /**
     * Action для страницы "Добавить ..."
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        $lecturersList = Lecturer::getLecturerList();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $type_of_examination = $_POST['type_of_examination'];
            $id_examiner = $_POST['id_examiner'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($type_of_examination) || empty($type_of_examination)) {
                $errors[] = 'Заполните поле';
            }


            if ($errors == false) {
                // Если ошибок нет
                // Добавляем нового преподавателя
                Examination::createExamination($type_of_examination,$id_examiner);

                // Перенаправляем пользователя на страницу управления
                header("Location: /admin/examination");
            }
        }

        require_once(ROOT . '/views/admin_examination/create.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать...@
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретной категории

        // Получаем данные о конкретной категории
        $tableName = "types_of_examination";
        $examination = Db::getRowById($id, $tableName);

        $lecturersList = Lecturer::getLecturerList();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $type_of_examination = $_POST['type_of_examination'];
            $id_examiner = $_POST['id_examiner'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($type_of_examination) || empty($type_of_examination)) {
                $errors[] = 'Заполните поле';
            }

            // Сохраняем изменения
            Examination::updateExaminationById($id, $type_of_examination,$id_examiner);

            // Перенаправляем пользователя на страницу управления
            header("Location: /admin/examination");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_examination/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить..."
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем оплату
            $tableName = "types_of_examination";
            Db::deleteRowById($tableName,$id);

            // Перенаправляем пользователя на страницу управления
            header("Location: /admin/examination");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_examination/delete.php');
        return true;
    }

}

<?php

/**
 * Контроллер AdminStudyController
 * Управление в админпанели видами обучения
 */
class AdminStudyController extends AdminBase
{

    /**
     * Action для страницы "Управление..."
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список
        $studysList = Study::getStudysListAdmin();

        // Подключаем вид
        require_once(ROOT . '/views/admin_study/index.php');
        return true;

    }

    /**
     * Action для страницы "Добавить..."
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $study = $_POST['type_of_study'];
            $accepted = $_POST['accepted'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($study) || empty($study)) {
                $errors[] = 'Заполните поле';
            }


            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую строку в таблицу
                Study::createStudy($study,$accepted);

                // Перенаправляем пользователя на страницу управлениями
                header("Location: /admin/study");
            }
        }

        require_once(ROOT . '/views/admin_study/create.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать..."
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретной категории
        $tableName = "types_of_study";
        $studys = Db::getRowById($id, $tableName);

        // Обработка формы
        if (isset($_POST['submit'])) {

            // Если форма отправлена
            // Получаем данные из формы
            $type_of_study = $_POST['type_of_study'];
            $accepted = $_POST['accepted'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($type_of_study) || empty($type_of_study)) {
                $errors[] = 'Заполните поле';
            }

            // Сохраняем изменения
            Study::updateStudyById($id, $type_of_study, $accepted);

            // Перенаправляем пользователя на страницу управления
            header("Location: /admin/study");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_study/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить ..."
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем оплату
            $tableName = "types_of_study";
            Db::deleteRowById($tableName,$id);

            // Перенаправляем пользователя на страницу управления
            header("Location: /admin/study");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_study/delete.php');
        return true;
    }

}

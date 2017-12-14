<?php

/**
 * Контроллер AdminDisciplineController
 * Управление в админпанели 
 */
class AdminDisciplineController extends AdminBase
{

    /**
     * Action для страницы "Управление..."
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список
        $disciplinesList = Discipline::getDisciplinesListAdmin();

        // Подключаем вид
        require_once(ROOT . '/views/admin_discipline/index.php');
        return true;

    }

    /**
     * Action для страницы "Добавить..."
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        $examinationsList = Examination::getExaminationList();
        $lecturersList = Lecturer::getLecturerList();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name_of_discipline = $_POST['name_of_discipline'];
            $number_of_academic_hours = $_POST['number_of_academic_hours'];
            $type_of_examination = $_POST['type_of_examination'];
            $lecturer_id = $_POST['lecturer_id'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($name_of_discipline) || empty($name_of_discipline)) {
                $errors[] = 'Заполните поле';
            }


            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую строку в таблицу

                Discipline::createDiscipline($name_of_discipline,$number_of_academic_hours,$type_of_examination,$lecturer_id);


                // Перенаправляем пользователя на страницу управлениями
                header("Location: /admin/discipline");
            }
        }

        require_once(ROOT . '/views/admin_discipline/create.php');
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
        $tableName = "disciplines";
        $disciplines = Db::getRowById($id, $tableName);

        $examinationsList = Examination::getExaminationList();
        $lecturersList = Lecturer::getLecturerList();

        // Обработка формы
        if (isset($_POST['submit'])) {

            // Если форма отправлена
            // Получаем данные из формы
            $name_of_discipline = $_POST['name_of_discipline'];
            $number_of_academic_hours = $_POST['number_of_academic_hours'];
            $type_of_examination = $_POST['type_of_examination'];
            $lecturer_id = $_POST['lecturer_id'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($name_of_discipline) || empty($name_of_discipline)) {
                $errors[] = 'Заполните поле';
            }

            // Сохраняем изменения
            Discipline::updateDisciplineById($id,$name_of_discipline,$number_of_academic_hours,$type_of_examination,$lecturer_id);

            // Перенаправляем пользователя на страницу управления
            header("Location: /admin/discipline");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_discipline/update.php');
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
            // Удаляем
            $tableName = "disciplines";
            Db::deleteRowById($tableName,$id);

            // Перенаправляем пользователя на страницу управления
            header("Location: /admin/discipline");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_discipline/delete.php');
        return true;
    }

}

<?php

/**
 * Контроллер AdminDebtController
 * Управление в админпанели
 */
class AdminDebtController extends AdminBase
{

    /**
     * Action для страницы "Управление..."
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий
        $debtsList = Debt::getDebtsListAdmin();

        // Подключаем вид
        require_once(ROOT . '/views/admin_debt/index.php');
        return true;
    }

    /**
     * Action для страницы "Добавить ..."
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        $studentsList = Student::getStudentsList();
        $disciplinesList = Discipline::getDisciplinesList();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $student_id = $_POST['student_id'];
            $discipline_id = $_POST['discipline_id'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($student_id) || empty($student_id)) {
                $errors[] = 'Заполните поле';
            }

            if (Debt::checkRowDebt($student_id,$discipline_id)) {
                $errors[] = 'Запись уже есть в таблице';
            }
            

            if ($errors == false) {
                // Если ошибок нет
                // Добавляем нового преподавателя
                Debt::createDebt($student_id,$discipline_id);

                // Перенаправляем пользователя на страницу управления
                header("Location: /admin/debt");
            }
        }

        require_once(ROOT . '/views/admin_debt/create.php');
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
        $studentsList = Student::getStudentsList();
        $disciplinesList = Discipline::getDisciplinesList();

        // Получаем данные о конкретной категории
        $tableName = "debt";
        $debt = Db::getRowById($id, $tableName);


        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $student_id = $_POST['student_id'];
            $discipline_id = $_POST['discipline_id'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($student_id) || empty($student_id)) {
                $errors[] = 'Заполните поле';
            }

            if (Debt::checkRowDebt($student_id,$discipline_id)) {
                $errors[] = 'Запись уже есть в таблице';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Сохраняем изменения
                Debt::updateDebtById($id, $student_id, $discipline_id);

                // Перенаправляем пользователя на страницу управления
                header("Location: /admin/debt");
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_debt/update.php');
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
            $tableName = "debt";
            Db::deleteRowById($tableName,$id);

            // Перенаправляем пользователя на страницу управления
            header("Location: /admin/debt");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_debt/delete.php');
        return true;
    }

}

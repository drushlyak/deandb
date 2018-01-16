<?php

/**
 * Контроллер AdminRatingController
 * Управление в админпанели
 */
class AdminRatingController extends AdminBase
{

    /**
     * Action для страницы "Управление..."
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список
        $ratingsList = Rating::getRatingsListAdmin();

        // Подключаем вид
        require_once(ROOT . '/views/admin_rating/index.php');
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
        $semestersList = Semester::getSemestersList();


        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $student_id = $_POST['student_id'];
            $discipline_id = $_POST['discipline_id'];
            $semester_id = $_POST['semester_id'];
            $evaluation = $_POST['evaluation'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($student_id) || empty($student_id)) {
                $errors[] = 'Заполните поле';
            }

            if (!isset($evaluation)) {
                $errors[] = 'Заполните поле Оценка';
            }


            if ($evaluation < 0 && $evaluation > 5) {
                $errors[] = 'Оценка должна быть в интервале от 0 до 5';
            }


            if (Rating::checkRowRating($student_id,$discipline_id,$semester_id,$evaluation)) {
                $errors[] = 'Запись уже есть в таблице';
            }
            

            if ($errors == false) {
                // Если ошибок нет
                // Добавляем нового преподавателя
                Rating::createRating($student_id,$discipline_id,$semester_id,$evaluation);

                // Перенаправляем пользователя на страницу управления
                header("Location: /admin/rating");
            }
        }

        require_once(ROOT . '/views/admin_rating/create.php');
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
        $semestersList = Semester::getSemestersList();

        // Получаем данные о конкретной категории
        $tableName = "rating";
        $ratings = Db::getRowById($id, $tableName);


        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $student_id = $_POST['student_id'];
            $discipline_id = $_POST['discipline_id'];
            $semester_id = $_POST['semester_id'];
            $evaluation = $_POST['evaluation'];


            echo $student_id.$discipline_id.$semester_id.$evaluation;

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($student_id) || empty($student_id)) {
                $errors[] = 'Заполните поле';
            }

            if (!isset($evaluation) || empty($evaluation)) {
                $errors[] = 'Заполните поле Оценка';
            }

            if ($evaluation < 0 && $evaluation > 5) {
                $errors[] = 'Оценка должна быть в интервале от 0 до 5';
            }

            if (Rating::checkRowRating($student_id,$discipline_id,$semester_id,$evaluation)) {
                $errors[] = 'Запись уже есть в таблице';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Сохраняем изменения
                Rating::updateRatingById($id, $student_id, $discipline_id, $semester_id, $evaluation);

                // Перенаправляем пользователя на страницу управления
                header("Location: /admin/rating");
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_rating/update.php');
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
            $tableName = "rating";
            Db::deleteRowById($tableName,$id);

            // Перенаправляем пользователя на страницу управления
            header("Location: /admin/rating");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_rating/delete.php');
        return true;
    }

}

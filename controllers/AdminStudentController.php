<?php

/**
 * Контроллер AdminStudentController
 * Управление студентами в админпанели
 */
class AdminStudentController extends AdminBase
{

    /**
     * Action для страницы "Управление студентами"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список товаров
        $studentsList = Student::getStudentsList(); // описать метод

        // Подключаем вид
        require_once(ROOT . '/views/admin_student/index.php');
        return true;
    }

    /**
     * Action для страницы "Добавить студента"
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список групп для выпадающего списка
        $groupsList = Group::getGroupsList();

        // Получаем список источников оплаты для выпадающего списка
        $feesList = Fee::getFeeList();

        // Получаем список видов обучения для выпадающего списка
        $studyList = Study::getStudyList();


        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['surname_of_student'] = $_POST['surname_of_student'];
            $options['student_name'] = $_POST['student_name'];
            $options['student_second_name'] = $_POST['student_second_name'];
            $options['group_number'] = $_POST['group_number'];
            $options['accepted'] = $_POST['accepted'];
            $options['study_fee'] = $_POST['study_fee'];
            $options['residence'] = $_POST['residence'];
            $options['phone_number'] = $_POST['phone_number'];
            $options['type_of_study'] = $_POST['type_of_study'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['surname_of_student']) || empty($options['surname_of_student'])) {
                $errors[] = 'Заполните поле фамилия';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новый товар
                $id = Student::createStudent($options);


                // Если запись добавлена
                if ($id) {
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/students/{$id}.jpg");
                    }
                };

                // Перенаправляем пользователя на страницу управлениями товарами
                header("Location: /admin/student");
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_student/create.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать студента"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список групп для выпадающего списка
        $groupsList = Group::getGroupsList();

        // Получаем список источников оплаты для выпадающего списка
        $feesList = Fee::getFeeList();

        // Получаем список видов обучения для выпадающего списка
        $studyList = Study::getStudyList();

        // Получаем данные о конкретном заказе
        $student = Student::getStudentById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['surname_of_student'] = $_POST['surname_of_student'];
            $options['student_name'] = $_POST['student_name'];
            $options['student_second_name'] = $_POST['student_second_name'];
            $options['group_number'] = $_POST['group_number'];
            $options['accepted'] = $_POST['accepted'];
            $options['expelled'] = $_POST['expelled'];
            $options['study_fee'] = $_POST['study_fee'];
            $options['residence'] = $_POST['residence'];
            $options['phone_number'] = $_POST['phone_number'];
            $options['type_of_study'] = $_POST['type_of_study'];


            // Сохраняем изменения
            if (Student::updateStudentById($id, $options)) {

                 // Если запись сохранена
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {

                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                   move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/students/{$id}.jpg");
                }
            }

            // Перенаправляем пользователя на страницу управлениями студентами
            header("Location: /admin/student");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_student/update.php');
        return true;
    }


    /**
     * Action для страницы "Удалить студента"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем студента
            Student::deleteStudentById($id);

            // Перенаправляем пользователя на страницу управлениями студентами
            header("Location: /admin/student");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_student/delete.php');
        return true;
    }


}

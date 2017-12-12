<?php

/**
 * Контроллер AdminCategoryController
 * Управление категориями товаров в админпанели
 */
class AdminGroupController extends AdminBase
{

    /**
     * Action для страницы "Управление группами"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий
        $groupsList = Group::getGroupsListAdmin();

        // Подключаем вид
        require_once(ROOT . '/views/admin_group/index.php');
        return true;
    }

    /**
     * Action для страницы "Добавить группу"
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $group_code = $_POST['group_code'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($group_code) || empty($group_code)) {
                $errors[] = 'Заполните поле';
            }


            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую группу
                Group::createGroup($group_code);

                // Перенаправляем пользователя на страницу управлениями категориями
                header("Location: /admin/group");
            }
        }

        require_once(ROOT . '/views/admin_group/create.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать группу"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретной категории
        $group = Group::getGroupById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена   
            // Получаем данные из формы
            $group_code = $_POST['group_code'];
            $quantity_of_students = $_POST['quantity_of_students'];

            // Сохраняем изменения
            Group::updateGroupById($id, $group_code, $quantity_of_students);

            // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /admin/group");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_group/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить группу"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем категорию
            $tableName = "groups";
            Db::deleteRowById($tableName,$id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/group");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_group/delete.php');
        return true;
    }

}

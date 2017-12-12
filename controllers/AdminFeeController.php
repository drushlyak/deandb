<?php

/**
 * Контроллер AdminFeeController
 * Управление категориями оплат в админпанели
 */
class AdminFeeController extends AdminBase
{

    /**
     * Action для страницы "Управление оплатами"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий
        $feesList = Fee::getFeesListAdmin();

        // Подключаем вид
        require_once(ROOT . '/views/admin_fee/index.php');
        return true;
    }

    /**
     * Action для страницы "Добавить оплату"
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $kind_of_study_fees = $_POST['kind_of_study_fees'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($kind_of_study_fees) || empty($kind_of_study_fees)) {
                $errors[] = 'Заполните поле';
            }


            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую оплату
                Fee::createFee($kind_of_study_fees);

                // Перенаправляем пользователя на страницу управлениями оплатами
                header("Location: /admin/lector");
            }
        }

        require_once(ROOT . '/views/admin_fee/create.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать оплату"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретной категории
        $fee = Fee::getFeeById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена   
            // Получаем данные из формы
            $kind_of_study_fees = $_POST['kind_of_study_fees'];
            $arrears = $_POST['arrears'];

            // Сохраняем изменения
            Fee::updateFeeById($id, $kind_of_study_fees, $arrears);

            // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /admin/lector");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_fee/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить оплату"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем оплату
            $tableName = "study_fees";
            Db::deleteRowById($tableName,$id);

            // Перенаправляем пользователя на страницу управлениями оплатами
            header("Location: /admin/lector");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_fee/delete.php');
        return true;
    }

}

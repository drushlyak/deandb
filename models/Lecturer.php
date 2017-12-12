<?php

class Lecturer
{

    /**
     * Returns single blog fees with specified id
     * @param integer $id
     */
    public static function getLecturerList()
    {

        $db = Db::getConnection();

        $groupList = array();

        $result = $db->query('SELECT id, lecturer FROM lecturers');

        $i = 0;
        while ($row = $result->fetch()) {
            $lecturerList[$i]['id'] = $row['id'];
            $lecturerList[$i]['lecturer'] = $row['lecturer'];
            $i++;
        }

        return $lecturerList;
    }


    public static function getLecturerById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM lecturers WHERE id = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполняем запрос
        $result->execute();

        // Возвращаем данные
        return $result->fetch();
    }



    /**
     * Возвращает массив оплат для списка в админпанели <br/>
     * @return array <p>Массив оплат</p>
     */
    public static function getLecturersListAdmin()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id, lecturer, full_time_job FROM lecturers');

        // Получение и возврат результатов
        $FeeList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $lecturerList[$i]['id'] = $row['id'];
            $lecturerList[$i]['lecturer'] = $row['lecturer'];
            $lecturerList[$i]['full_time_job'] = $row['full_time_job'];
            $i++;
        }
        return $lecturerList;
    }


    /**
     * Добавляет новую оплату
     * @param string $name <p>Название</p>
     * @return boolean <p>Результат добавления записи в таблицу</p>
     */
    public static function createLecturer($lecturer,$full_time_job)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "INSERT INTO lecturers (lecturer,full_time_job) VALUES (:lecturer,:full_time_job)";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':lecturer', $lecturer, PDO::PARAM_STR);
        $result->bindParam(':full_time_job', $full_time_job, PDO::PARAM_INT);

        return $result->execute();
    }

    public static function updateLecturerById($id, $lecturer, $full_time_job)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE lecturers
            SET 
                lecturer = :lecturer, 
                full_time_job = :full_time_job
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':lecturer', $lecturer, PDO::PARAM_STR);
        $result->bindParam(':full_time_job', $full_time_job, PDO::PARAM_INT);
        return $result->execute();
    }
    
}

<?php

class Semester
{

    /**
     * возвращает список семестров
     */
    public static function getSemesterList()
    {

        $db = Db::getConnection();

        $groupList = array();

        $result = $db->query('SELECT id, semester FROM lecturers');

        $i = 0;
        while ($row = $result->fetch()) {
            $lecturerList[$i]['id'] = $row['id'];
            $lecturerList[$i]['semester'] = $row['semester'];
            $i++;
        }

        return $lecturerList;
    }

        /**
     * Возвращает массив для списка в админпанели <br/>
     * @return array <p>Массив</p>
     */
    public static function getSemestersListAdmin()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id, semester, information FROM semesters');

        // Получение и возврат результатов
        $semesterList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $semesterList[$i]['id'] = $row['id'];
            $semesterList[$i]['semester'] = $row['semester'];
            $semesterList[$i]['information'] = $row['information'];
            $i++;
        }
        return $semesterList;
    }


    /**
     * Добавляет новую строку в таблицу
     */
    public static function createSemester ($semester, $information)
    {
        // Соединение с БД
        $db = Db::getConnection();


        // Текст запроса к БД
        $sql = "INSERT INTO semesters (semester,information) VALUES (:semester,:information)";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':semester', $semester, PDO::PARAM_STR);
        $result->bindParam(':information', $information, PDO::PARAM_INT);

        return $result->execute();
    }

    public static function updateSemesterById($id, $semester, $information)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE semesters
            SET 
                semester = :semester, 
                information = :information
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':semester', $semester, PDO::PARAM_STR);
        $result->bindParam(':information', $information, PDO::PARAM_INT);
        return $result->execute();
    }
    
}

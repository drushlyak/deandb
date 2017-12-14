<?php

class Examination
{

    /**
     * Returns single blog fees with specified id
     * @param integer $id
     */
    public static function getExaminationList()
    {

        $db = Db::getConnection();

        $examinationsList = array();

        $result = $db->query('SELECT id, type_of_examination FROM types_of_examination');

        $i = 0;
        while ($row = $result->fetch()) {
            $examinationsList[$i]['id'] = $row['id'];
            $examinationsList[$i]['type_of_examination'] = $row['type_of_examination'];
            $i++;
        }

        return $examinationsList;
    }


   /* public static function getExaminationById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM types_of_examination WHERE id = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполняем запрос
        $result->execute();

        // Возвращаем данные
        return $result->fetch();
    } */



    /**
     * Возвращает массив оплат для списка в админпанели <br/>
     * @return array <p>Массив оплат</p>
     */
    public static function getExaminationsListAdmin()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT 
            e.id,
            e.type_of_examination,
            e.id_examiner, 
            l.lecturer
            FROM types_of_examination e
            INNER JOIN lecturers l ON  l.id = e.id_examiner 
');

        // Получение и возврат результатов
        $examinationList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $examinationList[$i]['id'] = $row['id'];
            $examinationList[$i]['type_of_examination'] = $row['type_of_examination'];
            $examinationList[$i]['id_examiner'] = $row['id_examiner'];
            $examinationList[$i]['lecturer'] = $row['lecturer'];
            $i++;
        }
        return $examinationList;
    }


    /**
     * Добавляет новую строку
     * @param string $name <p>Название</p>
     * @return boolean <p>Результат добавления записи в таблицу</p>
     */
    public static function createExamination($type_of_examination,$id_examiner)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "INSERT INTO types_of_examination (type_of_examination,id_examiner) VALUES (:type_of_examination,:id_examiner)";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':type_of_examination', $type_of_examination, PDO::PARAM_STR);
        $result->bindParam(':id_examiner', $id_examiner, PDO::PARAM_INT);

        return $result->execute();
    }

    public static function updateExaminationById($id, $type_of_examination,$id_examiner)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE types_of_examination
            SET 
                type_of_examination = :type_of_examination, 
                id_examiner = :id_examiner
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':type_of_examination', $type_of_examination, PDO::PARAM_STR);
        $result->bindParam(':id_examiner', $id_examiner, PDO::PARAM_INT);
        return $result->execute();
    }

    
    
}

<?php

class Study
{

    /**
     * возвращает список семестров
     */
    public static function getStudyList()
    {

        $db = Db::getConnection();

        $studyList = array();

        $result = $db->query('SELECT id, type_of_study FROM types_of_study');

        $i = 0;
        while ($row = $result->fetch()) {
            $studyList[$i]['id'] = $row['id'];
            $studyList[$i]['type_of_study'] = $row['type_of_study'];
            $i++;
        }

        return $studyList;
    }

        /**
     * Возвращает массив для списка в админпанели <br/>
     * @return array <p>Массив</p>
     */
    public static function getStudysListAdmin()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $sql = $db->query('SELECT id, type_of_study,accepted FROM types_of_study');

        // Получение и возврат результатов
        $studyList = array();
        $i = 0;
        while ($row = $sql->fetch()) {
            $studyList[$i]['id'] = $row['id'];
            $studyList[$i]['type_of_study'] = $row['type_of_study'];
            $studyList[$i]['accepted'] = $row['accepted'];
            $i++;
        }
        return $studyList;
    }


    /**
     * Добавляет новую строку в таблицу
     */
    public static function createStudy ($type_of_study, $accepted)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "INSERT INTO types_of_study (type_of_study, accepted) VALUES (:type_of_study, :accepted)";

        echo $sql;

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':type_of_study', $type_of_study, PDO::PARAM_STR);
        $result->bindParam(':accepted', $accepted, PDO::PARAM_STR);

        print_r ($result);
        return $result->execute();
    }

    public static function updateStudyById($id, $type_of_study, $accepted)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE types_of_study
            SET 
                type_of_study = :type_of_study, 
                accepted = :accepted
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':type_of_study', $type_of_study, PDO::PARAM_STR);
        $result->bindParam(':accepted', $accepted, PDO::PARAM_INT);
        return $result->execute();
    }
    
}

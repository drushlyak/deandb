<?php

class Discipline
{

    /**
    * возвращает список
     */

    public static function getDisciplinesList()
    {

        $db = Db::getConnection();

        $disciplineList = array();

        $result = $db->query('SELECT id, name_of_discipline FROM disciplines');

        $i = 0;
        while ($row = $result->fetch()) {
            $disciplineList[$i]['id'] = $row['id'];
            $disciplineList[$i]['name_of_discipline'] = $row['name_of_discipline'];
            $i++;
        }

        return $disciplineList;
    }  

    
    
        /**
     * Возвращает массив для списка в админпанели <br/>
     * @return array <p>Массив</p>
     */
    public static function getDisciplinesListAdmin()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $sql = $db->query('SELECT 
            d.id,
            d.name_of_discipline,
            d.number_of_academic_hours,
            d.type_of_examination,
            d.lecturer_id,
            e.type_of_examination,
            l.lecturer
            FROM disciplines d
            INNER JOIN types_of_examination e ON  e.id = d.type_of_examination
            INNER JOIN lecturers l ON  l.id = d.lecturer_id           
            ');

        // Получение и возврат результатов
        $disciplineList = array();
        $i = 0;
        while ($row = $sql->fetch()) {
            $disciplineList[$i]['id'] = $row['id'];
            $disciplineList[$i]['name_of_discipline'] = $row['name_of_discipline'];
            $disciplineList[$i]['number_of_academic_hours'] = $row['number_of_academic_hours'];
            $disciplineList[$i]['type_of_examination'] = $row['type_of_examination'];
            $disciplineList[$i]['lecturer_id'] = $row['lecturer_id'];
            $disciplineList[$i]['type_of_examination'] = $row['type_of_examination'];
            $disciplineList[$i]['lecturer'] = $row['lecturer'];
            $i++;
        }
        return $disciplineList;
    }


    /**
     * Добавляет новую строку в таблицу
     */
    public static function createDiscipline ($name_of_discipline,$number_of_academic_hours,$type_of_examination,$lecturer_id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "INSERT INTO disciplines (name_of_discipline,number_of_academic_hours,type_of_examination,lecturer_id) VALUES (:name_of_discipline,:number_of_academic_hours,:type_of_examination,:lecturer_id)";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name_of_discipline', $name_of_discipline, PDO::PARAM_STR);
        $result->bindParam(':number_of_academic_hours', $number_of_academic_hours, PDO::PARAM_INT);
        $result->bindParam(':type_of_examination', $type_of_examination, PDO::PARAM_INT);
        $result->bindParam(':lecturer_id', $lecturer_id, PDO::PARAM_INT);

        return $result->execute();
    }

    public static function updateDisciplineById($id,$name_of_discipline,$number_of_academic_hours,$type_of_examination,$lecturer_id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE disciplines
            SET 
                name_of_discipline = :name_of_discipline, 
                number_of_academic_hours = :number_of_academic_hours,
                type_of_examination = :type_of_examination,
                lecturer_id = :lecturer_id
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name_of_discipline', $name_of_discipline, PDO::PARAM_STR);
        $result->bindParam(':number_of_academic_hours', $number_of_academic_hours, PDO::PARAM_INT);
        $result->bindParam(':type_of_examination', $type_of_examination, PDO::PARAM_INT);
        $result->bindParam(':lecturer_id', $lecturer_id, PDO::PARAM_INT);
        return $result->execute();
    }
    
}

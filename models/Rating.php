<?php

class Rating
{

    /**
     * Returns single blog with specified id
     * @param integer $id
     */

    public static function getRatingList()
    {

        $db = Db::getConnection();

        $ratingsList = array();

        $result = $db->query('SELECT id, type_of_rating FROM rating');

        $i = 0;
        while ($row = $result->fetch()) {
            $ratingsList[$i]['id'] = $row['id'];
            $ratingsList[$i]['type_of_rating'] = $row['type_of_rating'];
            $i++;
        }

        return $ratingsList;
    }


   /* public static function getRatingById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM types_of_rating WHERE id = :id';

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
     * Возвращает массив для списка в админпанели <br/>
     * @return array <p>Массив</p>
     */
    public static function getRatingsListAdmin()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT 
            r.id,
            r.student_id,
            r.discipline_id,
            r.semester_id,
            r.evaluation,
            s.id_of_student,
            s.surname_of_student, 
            s.student_name,
            s.student_second_name,
            dp.name_of_discipline,
            sm.semester,
            sm.id sem_id
            FROM rating r
            INNER JOIN students s ON  r.student_id = s.id_of_student 
            INNER JOIN disciplines dp ON  r.discipline_id = dp.id  
            INNER JOIN semesters sm ON  r.semester_id = sm.id  
            ORDER BY s.surname_of_student,dp.name_of_discipline,sm.semester
        ');

        // Получение и возврат результатов
        $ratingList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $ratingList[$i]['id'] = $row['id'];
            $ratingList[$i]['sem_id'] = $row['sem_id'];
            $ratingList[$i]['id_of_student'] = $row['id_of_student'];
            $ratingList[$i]['surname_of_student'] = $row['surname_of_student'];
            $ratingList[$i]['student_name'] = $row['student_name'];
            $ratingList[$i]['student_second_name'] = $row['student_second_name'];
            $ratingList[$i]['name_of_discipline'] = $row['name_of_discipline'];
            $ratingList[$i]['semester'] = $row['semester'];
            $ratingList[$i]['evaluation'] = $row['evaluation'];
            $i++;
        }

        return $ratingList;
    }


    /**
     * Добавляет новую строку
     * @param string $name <p>Название</p>
     * @return boolean <p>Результат добавления записи в таблицу</p>
     */
    public static function createRating($student_id,$discipline_id,$semester_id,$evaluation)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "INSERT INTO rating (student_id,discipline_id,semester_id,evaluation) VALUES (:student_id,:discipline_id,:semester_id,:evaluation)";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':student_id', $student_id, PDO::PARAM_INT);
        $result->bindParam(':discipline_id', $discipline_id, PDO::PARAM_INT);
        $result->bindParam(':semester_id', $semester_id, PDO::PARAM_INT);
        $result->bindParam(':evaluation', $evaluation, PDO::PARAM_INT);

        return $result->execute();
    }

    public static function updateRatingById($id,$student_id,$discipline_id,$semester_id, $evaluation)
    {
        $student_id = intval ($student_id);
        $discipline_id = intval ($discipline_id);
        $semester_id = intval ($semester_id);
        $evaluation  = intval ($evaluation);


        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE rating
            SET 
                student_id = :student_id, 
                discipline_id = :discipline_id,
                semester_id = :semester_id,
                evaluation = :evaluation
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':student_id', $student_id, PDO::PARAM_INT);
        $result->bindParam(':discipline_id', $discipline_id, PDO::PARAM_INT);
        $result->bindParam(':semester_id', $semester_id, PDO::PARAM_INT);
        $result->bindParam(':evaluation', $evaluation, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function checkRowRating($student_id,$discipline_id,$semester_id,$evaluation)
    {
        // Соединение с БД
        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*)
            FROM rating
            WHERE student_id ='.$student_id. ' AND discipline_id = '.$discipline_id.' AND semester_id = '.$semester_id.' AND evaluation = '.$evaluation;

        // Возврат запроса
         $result = $db->query($sql)->fetch(PDO::FETCH_ASSOC);

        if ($result['COUNT(*)']==0) return false;
        else return true;

    }
    
}

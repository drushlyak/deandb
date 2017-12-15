<?php

class Debt
{

    /**
     * Returns single blog fees with specified id
     * @param integer $id
     */

    public static function getDebtList()
    {

        $db = Db::getConnection();

        $debtsList = array();

        $result = $db->query('SELECT id, type_of_debt FROM debt');

        $i = 0;
        while ($row = $result->fetch()) {
            $debtsList[$i]['id'] = $row['id'];
            $debtsList[$i]['type_of_debt'] = $row['type_of_debt'];
            $i++;
        }

        return $debtsList;
    }


   /* public static function getDebtById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM types_of_debt WHERE id = :id';

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
    public static function getDebtsListAdmin()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT 
            d.id,
            s.id_of_student,
            s.surname_of_student, 
            s.student_name,
            s.student_second_name,
            dp.name_of_discipline
            FROM debt d
            INNER JOIN students s ON  d.student_id = s.id_of_student 
            INNER JOIN disciplines dp ON  d.discipline_id = dp.id  
            ORDER BY s.surname_of_student,dp.name_of_discipline
        ');

        // Получение и возврат результатов
        $debtList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $debtList[$i]['id'] = $row['id'];
            $debtList[$i]['id_of_student'] = $row['id_of_student'];
            $debtList[$i]['surname_of_student'] = $row['surname_of_student'];
            $debtList[$i]['student_name'] = $row['student_name'];
            $debtList[$i]['student_second_name'] = $row['student_second_name'];
            $debtList[$i]['name_of_discipline'] = $row['name_of_discipline'];
            $i++;
        }

        return $debtList;
    }


    /**
     * Добавляет новую строку
     * @param string $name <p>Название</p>
     * @return boolean <p>Результат добавления записи в таблицу</p>
     */
    public static function createDebt($student_id,$discipline_id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "INSERT INTO debt (student_id,discipline_id) VALUES (:student_id,:discipline_id)";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':student_id', $student_id, PDO::PARAM_INT);
        $result->bindParam(':discipline_id', $discipline_id, PDO::PARAM_INT);

        return $result->execute();
    }

    public static function updateDebtById($id,$student_id,$discipline_id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE debt
            SET 
                student_id = :student_id, 
                discipline_id = :discipline_id
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':student_id', $student_id, PDO::PARAM_INT);
        $result->bindParam(':discipline_id', $discipline_id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function checkRowDebt($student_id,$discipline_id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*)
            FROM debt
            WHERE student_id ='.$student_id. ' AND discipline_id = '.$discipline_id;



        // Возврат запроса
         $result = $db->query($sql)->fetch(PDO::FETCH_ASSOC);

        if ($result['COUNT(*)']==0) return false;
        else return true;

    }
    
}

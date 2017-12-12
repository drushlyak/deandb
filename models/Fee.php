<?php

class Fee
{

    /**
     * Returns single blog fees with specified id
     * @param integer $id
     */
    public static function getFeeList()
    {

        $db = Db::getConnection();

        $groupList = array();

        $result = $db->query('SELECT id, kind_of_study_fees FROM study_fees');

        $i = 0;
        while ($row = $result->fetch()) {
            $feeList[$i]['id'] = $row['id'];
            $feeList[$i]['kind_of_study_fees'] = $row['kind_of_study_fees'];
            $i++;
        }

        return $feeList;
    }


    public static function getFeeById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM study_fees WHERE id = :id';

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
    public static function getFeesListAdmin()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id, kind_of_study_fees, arrears FROM study_fees');

        // Получение и возврат результатов
        $FeeList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $feeList[$i]['id'] = $row['id'];
            $feeList[$i]['kind_of_study_fees'] = $row['kind_of_study_fees'];
            $feeList[$i]['arrears'] = $row['arrears'];
            $i++;
        }
        return $feeList;
    }


    /**
     * Добавляет новую оплату
     * @param string $name <p>Название</p>
     * @return boolean <p>Результат добавления записи в таблицу</p>
     */
    public static function createFee($kind_of_study_fees)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "INSERT INTO study_fees (kind_of_study_fees) VALUES (:kind_of_study_fees)";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':kind_of_study_fees', $kind_of_study_fees, PDO::PARAM_STR);


        return $result->execute();
    }


    public static function updateFeeById($id, $kind_of_study_fees, $arrears)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE study_fees
            SET 
                kind_of_study_fees = :kind_of_study_fees, 
                arrears = :arrears
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':kind_of_study_fees', $kind_of_study_fees, PDO::PARAM_STR);
        $result->bindParam(':arrears', $arrears, PDO::PARAM_INT);
        return $result->execute();
    }
    
}

<?php

class Group
{

    /**
     * Returns an array of groups
     */
    public static function getGroupsList()
    {

        $db = Db::getConnection();

        $groupList = array();

        $result = $db->query('SELECT id, group_code FROM groups');

        $i = 0;
        while ($row = $result->fetch()) {
            $groupsList[$i]['id'] = $row['id'];
            $groupsList[$i]['group_code'] = $row['group_code'];
            $i++;
        }

        return $groupsList;
    }

    public static function getNameGroupById($id)
    {

        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();

            $result = $db->query('
                SELECT 
                    group_code
                FROM groups
                WHERE id=' . $id
            );
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }
    }


    /**
     * Возвращает массив групп для списка в админпанели <br/>
     * @return array <p>Массив групп</p>
     */
    public static function getGroupsListAdmin()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id, group_code, quantity_of_students FROM groups');

        // Получение и возврат результатов
        $groupList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $groupList[$i]['id'] = $row['id'];
            $groupList[$i]['group_code'] = $row['group_code'];
            $groupList[$i]['quantity_of_students'] = $row['quantity_of_students'];
            $i++;
        }
        return $groupList;
    }

    /**
     * Добавляет новую группу
     * @param string $group_code <p>Название</p>
     * @return boolean <p>Результат добавления записи в таблицу</p>
     */
    public static function createGroup($group_code)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "INSERT INTO groups (group_code) VALUES (:group_code)";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':group_code', $group_code, PDO::PARAM_STR);
        return $result->execute();
    }


    /**
     * Редактирование группы с заданным id
     * @param integer $id <p>id группы</p>
     * @param string $group_code <p>Название</p>
     * @param integer $quantity_of_students <p>Количество студентов</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateGroupById($id, $group_code, $quantity_of_students)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE groups
            SET 
                group_code = :group_code, 
                quantity_of_students = :quantity_of_students
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':group_code', $group_code, PDO::PARAM_STR);
        $result->bindParam(':quantity_of_students', $quantity_of_students, PDO::PARAM_INT);
        return $result->execute();
    }


    /**
     * Возвращает группу с указанным id
     * @param integer $id <p>id группы</p>
     * @return array <p>Массив с информацией о группе</p>
     */
    public static function getGroupById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM groups WHERE id = :id';

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
    
}
<?php

class Study
{

    /**
     * Returns single blog item with specified id
     * @param integer $id
     */
    public static function getStudyList()
    {

        $db = Db::getConnection();

        $groupList = array();

        $result = $db->query('SELECT id, type_of_study FROM types_of_study');

        $i = 0;
        while ($row = $result->fetch()) {
            $studyList[$i]['id'] = $row['id'];
            $studyList[$i]['type_of_study'] = $row['type_of_study'];
            $i++;
        }

        return $studyList;
    }


}

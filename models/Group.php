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
            $groupList[$i]['id'] = $row['id'];
            $groupList[$i]['group_code'] = $row['group_code'];
            $i++;
        }

        return $groupList;
    }

    
}
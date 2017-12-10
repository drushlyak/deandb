<?php

class Fee
{

    /**
     * Returns single blog item with specified id
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


}

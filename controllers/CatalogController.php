<?php


class CatalogController
{

    public function actionIndex()
    {
        
        
        $groups = array();
        $groups = Group::getGroupsList();

        require_once(ROOT . '/views/catalog/index.php');

        return true;
    }
    
    public function actionGroup ($groupId, $page = 1)
    {
        echo $groupId."@@@".$page;

        $groups = array();
        $groups = Group::getGroupsList();

        $group_code = Group::getNameGroupById($groupId);

        $groupStudents = array();
        $groupStudents = Student::getStudentsListByGroup($groupId, $page);

        $total = Student::getTotalStudentsInGroup($groupId);

        echo "===".$total;

        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Student::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/catalog/group.php');

        return true;
    }

}

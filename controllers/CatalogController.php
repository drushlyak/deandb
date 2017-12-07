<?php


class CatalogController
{

    public function actionIndex()
    {
        $groups = array();
        $groups = Group::getGroupsList();

       //$latestProducts = array();
       // $latestProducts = Student::getLatestProducts(12);

        require_once(ROOT . '/views/catalog/index.php');

        return true;
    }
    
    public function actionGroup ($groupId, $page = 1)
    {
        echo $groupId."@@@".$page;

        $groups = array();
        $groups = Group::getGroupsList();

        $groupStudents = array();
        $groupStudents = Student::getStudentsListByGroup($groupId, $page);

        $total = Student::getTotalStudentsInGroup($groupId);

        echo "llll".$total;

        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Student::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/catalog/group.php');

        return true;
    }

}

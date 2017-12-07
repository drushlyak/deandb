<?php

class Product
{

    const SHOW_BY_DEFAULT = 3; //количество отображаемых студентов на странице

    /**
     * Returns an array of products
     */
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);
        $db = Db::getConnection();
        $productsList = array();

        $result = $db->query('SELECT id, name, price, image, is_new FROM product '
                . 'WHERE status = "1"'
                . 'ORDER BY id DESC '                
                . 'LIMIT ' . $count);

        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $productsList;
    }
    
    /**
     * Returns an array of products
     */
    public static function getProductsListByCategory($categoryId = false, $page = 1)
    {
        if ($categoryId) {

            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db = Db::getConnection();
            $products = array();
            $result = $db->query("SELECT id_of_student,surname_of_student,student_name,student_second_name FROM students "
                    ."WHERE group_number = '$categoryId' AND expelled = '0'"
                    ."ORDER BY surname_of_student DESC "
                    ."LIMIT ".self::SHOW_BY_DEFAULT
                    ." OFFSET ".$offset);

            $i = 0;

            while ($row = $result->fetch()) {
                $products[$i]['id_of_student'] = $row['id_of_student'];
                $products[$i]['surname_of_student'] = $row['surname_of_student'];
                $products[$i]['student_name'] = $row['student_name'];
                $products[$i]['student_second_name'] = $row['student_second_name'];
                //$products[$i]['group_number'] = $row['group_number'];
               // $products[$i]['accepted'] = $row['accepted'];
                //$products[$i]['expelled'] = $row['expelled'];
                //$products[$i]['study_fee'] = $row['study_fee'];
                //$products[$i]['residence'] = $row['residence'];
                //$products[$i]['phone_number'] = $row['phone_number'];
                //$products[$i]['type_of_study'] = $row['type_of_study'];
                $i++;
            }

            return $products;       
        }
    }
    
    
    /**
     * Returns product item by id
     * @param integer $id
     */
    public static function getProductById($id)
    {
        $id = intval($id);

        if ($id) {                        
            $db = Db::getConnection();

            $result = $db->query('
                SELECT 
                    s.id_of_student, 
                    s.surname_of_student,
                    s.student_name,
                    s.student_second_name,
                    s.group_number,
                    s.accepted,
                    s.expelled,
                    s.study_fee,
                    s.residence,
                    s.phone_number,
                    s.type_of_study,
                    g.group_code,
                    sf.kind_of_study_fees,
                    ts.type_of_study
                FROM students s 
                INNER JOIN groups g ON  g.id = s.group_number
                INNER JOIN study_fees sf ON  sf.id = s.study_fee
                INNER JOIN types_of_study ts ON  ts.id = s.type_of_study
                WHERE s.id_of_student='. $id
            );
            $result->setFetchMode(PDO::FETCH_ASSOC);
            
            return $result->fetch();
        }
    }

    
    public static function getRatingById($id)
    {
        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();

            $productsList = array();

            $result = $db->query('
                SELECT 
                    s.id_of_student, 
                    s.surname_of_student,
                    s.student_name,
                    s.student_second_name,
                    r.discipline_id,
                    r.semester_id,
                    r.evaluation,
                    d.name_of_discipline
                FROM rating r
                INNER JOIN disciplines d ON  d.id = r.discipline_id
                INNER JOIN students s ON  r.student_id = s.id_of_student
                WHERE r.student_id='. $id. '
                ORDER BY d.name_of_discipline,r.semester_id '
            );
           // $result->setFetchMode(PDO::FETCH_ASSOC);

            $i = 0;
            while ($row = $result->fetch()) {
                $productsList[$i]['surname_of_student'] = $row['surname_of_student'];
                $productsList[$i]['student_name'] = $row['student_name'];
                $productsList[$i]['student_second_name'] = $row['student_second_name'];
                $productsList[$i]['student_second_name'] = $row['student_second_name'];
                $productsList[$i]['discipline_id'] = $row['discipline_id'];
                $productsList[$i]['semester_id'] = $row['semester_id'];
                $productsList[$i]['evaluation'] = $row['evaluation'];
                $productsList[$i]['name_of_discipline'] = $row['name_of_discipline'];
                $i++;
            }

            return $productsList;

        }
    }









    /**        $i = 0;
    while ($row = $result->fetch()) {
    $productsList[$i]['id'] = $row['id'];
    $productsList[$i]['name'] = $row['name'];
    $productsList[$i]['image'] = $row['image'];
    $productsList[$i]['price'] = $row['price'];
    $productsList[$i]['is_new'] = $row['is_new'];
    $i++;
    }
     * Returns an array of recommended products
     */
    public static function getRecommendedProducts()
    {
        $db = Db::getConnection();

        $productsList = array();

        $result = $db->query('SELECT id, name, price, image, is_new FROM product '
                . 'WHERE status = "1" AND is_recommended = "1"'
                . 'ORDER BY id DESC ');

        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $productsList;
    }


    /**
     * Returns total products
     */
    public static function getTotalProductsInCategory($categoryId)
    {
        $db = Db::getConnection();

        $result = $db->query("SELECT count(id_of_student) AS count FROM students "
            . "WHERE group_number = '$categoryId' AND expelled = '0'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }



}
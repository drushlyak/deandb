<?php

class Student
{

    const SHOW_BY_DEFAULT = 3; //количество отображаемых студентов на странице

    
    /**
     * Returns an array of students
     */
    public static function getStudentsListByGroup($groupId = false, $page = 1)
    {
        if ($groupId) {

            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db = Db::getConnection();
            $students = array();
            $result = $db->query("SELECT id_of_student,surname_of_student,student_name,student_second_name FROM students "
                    ."WHERE group_number = ".$groupId." AND (expelled IS NULL OR expelled = 0) "
                    ."ORDER BY surname_of_student DESC "
                    ."LIMIT ".self::SHOW_BY_DEFAULT
                    ." OFFSET ".$offset);

            $i = 0;

            while ($row = $result->fetch()) {
                $students[$i]['id_of_student'] = $row['id_of_student'];
                $students[$i]['surname_of_student'] = $row['surname_of_student'];
                $students[$i]['student_name'] = $row['student_name'];
                $students[$i]['student_second_name'] = $row['student_second_name'];
                //$students[$i]['group_number'] = $row['group_number'];
               // $students[$i]['accepted'] = $row['accepted'];
                //$students[$i]['expelled'] = $row['expelled'];
                //$students[$i]['study_fee'] = $row['study_fee'];
                //$students[$i]['residence'] = $row['residence'];
                //$students[$i]['phone_number'] = $row['phone_number'];
                //$students[$i]['type_of_study'] = $row['type_of_study'];
                $i++;
            }

            return $students;
        }
    }


    public static function getStudentsListByGroupAll($groupId)
    {
        if ($groupId) {

            //$page = intval($page);
            //$offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db = Db::getConnection();
            $students = array();
            $result = $db->query("SELECT id_of_student,surname_of_student,student_name,student_second_name FROM students "
                ."WHERE group_number = ".$groupId." AND (expelled IS NULL OR expelled = 0) "
                ."ORDER BY surname_of_student DESC");

            $i = 0;

            while ($row = $result->fetch()) {
                $students[$i]['id_of_student'] = $row['id_of_student'];
                $students[$i]['surname_of_student'] = $row['surname_of_student'];
                $students[$i]['student_name'] = $row['student_name'];
                $students[$i]['student_second_name'] = $row['student_second_name'];
                //$students[$i]['group_number'] = $row['group_number'];
                // $students[$i]['accepted'] = $row['accepted'];
                //$students[$i]['expelled'] = $row['expelled'];
                //$students[$i]['study_fee'] = $row['study_fee'];
                //$students[$i]['residence'] = $row['residence'];
                //$students[$i]['phone_number'] = $row['phone_number'];
                //$students[$i]['type_of_study'] = $row['type_of_study'];
                $i++;
            }

            return $students;
        }
    }



    /**
     * Returns student item by id
     * @param integer $id
     */
    public static function getStudentById($id)
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

            $studentsList = array();

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
                $studentsList[$i]['id_of_student'] = $row['id_of_student'];
                $studentsList[$i]['surname_of_student'] = $row['surname_of_student'];
                $studentsList[$i]['student_name'] = $row['student_name'];
                $studentsList[$i]['student_second_name'] = $row['student_second_name'];
                $studentsList[$i]['discipline_id'] = $row['discipline_id'];
                $studentsList[$i]['semester_id'] = $row['semester_id'];
                $studentsList[$i]['evaluation'] = $row['evaluation'];
                $studentsList[$i]['name_of_discipline'] = $row['name_of_discipline'];
                $i++;
            }

            return $studentsList;

        }
    }





    /**
     * Returns total products
     */
    public static function getTotalStudentsInGroup($groupId)
    {
        $db = Db::getConnection();

        $result = $db->query("SELECT count(id_of_student) AS count FROM students "
            . "WHERE group_number = '$groupId' AND (expelled IS NULL OR expelled = 0) ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }


    /**
     * Возвращает список студентов
     * @return array <p>Массив со студентами</p>
     */
    public static function getStudentsList()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query('SELECT 
                    s.id_of_student, 
                    s.surname_of_student,
                    s.student_name,
                    s.student_second_name,
                    s.group_number,
                    g.group_code
                FROM students s
                INNER JOIN groups g ON  g.id = s.group_number 
                WHERE (s.expelled IS NULL OR s.expelled = 0)
                ORDER BY s.surname_of_student ASC');
        $studentsList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $studentsList[$i]['id_of_student'] = $row['id_of_student'];
            $studentsList[$i]['surname_of_student'] = $row['surname_of_student'];
            $studentsList[$i]['student_name'] = $row['student_name'];
            $studentsList[$i]['student_second_name'] = $row['student_second_name'];
            $studentsList[$i]['group_code'] = $row['group_code'];
            $i++;
        }
        return $studentsList;
    }


    /**
     * Редактирует студента с заданным id
     * @param integer $id <p>id студента</p>
     * @param array $options <p>Массив с информацей о студенте</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateStudentById($id, $options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE students
            SET 
                surname_of_student = :surname_of_student,
                student_name = :student_name,
                student_second_name = :student_second_name,
                group_number = :group_number,
                accepted = :accepted,
                expelled = :expelled,
                study_fee = :study_fee,
                residence = :residence,
                phone_number = :phone_number,
                type_of_study = :type_of_study
            WHERE id_of_student = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':surname_of_student', $options['surname_of_student'], PDO::PARAM_STR);
        $result->bindParam(':student_name', $options['student_name'], PDO::PARAM_STR);
        $result->bindParam(':student_second_name', $options['student_second_name'], PDO::PARAM_STR);
        $result->bindParam(':group_number', $options['group_number'], PDO::PARAM_INT);
        $result->bindParam(':accepted', $options['accepted'], PDO::PARAM_STR);
        $result->bindParam(':expelled', $options['expelled'], PDO::PARAM_STR);
        $result->bindParam(':study_fee', $options['study_fee'], PDO::PARAM_INT);
        $result->bindParam(':residence', $options['residence'], PDO::PARAM_STR);
        $result->bindParam(':phone_number', $options['phone_number'], PDO::PARAM_STR);
        $result->bindParam(':type_of_study', $options['type_of_study'], PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Возвращает путь к изображению
     * @param integer $id
     * @return string <p>Путь к изображению</p>
     */
    public static function getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с товарами
        $path = '/upload/images/students/';

        // Путь к изображению товара
        $pathToStudentImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToStudentImage)) {
            // Если фото для студента существует
            // Возвращаем путь фото студента
            return $pathToStudentImage;
        }

        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }

    /**
     * Добавляет новый 
     * @param array $options <p>Массив с информацией о товаре</p>
     * @return integer <p>id добавленной в таблицу записи</p>
     */
    public static function createStudent($options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "INSERT INTO students
              (surname_of_student, student_name, student_second_name, group_number, accepted, 
              expelled, study_fee, residence, phone_number, type_of_study)
              VALUES
              (:surname_of_student, :student_name, :student_second_name, :group_number, :accepted, 
              '', :study_fee, :residence, :phone_number, :type_of_study)";
        
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':surname_of_student', $options['surname_of_student'], PDO::PARAM_STR);
        $result->bindParam(':student_name', $options['student_name'], PDO::PARAM_STR);
        $result->bindParam(':student_second_name', $options['student_second_name'], PDO::PARAM_STR);
        $result->bindParam(':group_number', $options['group_number'], PDO::PARAM_INT);
        $result->bindParam(':accepted', $options['accepted'], PDO::PARAM_STR);
        $result->bindParam(':study_fee', $options['study_fee'], PDO::PARAM_INT);
        $result->bindParam(':residence', $options['residence'], PDO::PARAM_STR);
        $result->bindParam(':phone_number', $options['phone_number'], PDO::PARAM_STR);
        $result->bindParam(':type_of_study', $options['type_of_study'], PDO::PARAM_INT);
        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
        
    }


    /**
     * Удаляет студента с указанным id
     * @param integer $id <p>id студента</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteStudentById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "DELETE FROM students WHERE id_of_student = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Подсчитывает количество неотчисленных студентов на текущий момент id
     */
    public static function countOfStudents()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "SELECT id_of_student FROM students WHERE expelled IS NULL OR expelled = 0";

        // Получение и возврат результатов.
        $result = $db->query($sql)->rowCount();
        return ($result);
    }

    /**
     * Вычисляет среднюю оценку всех студентов на текущий момент
     */
    public static function averageRatingOfAll()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "SELECT AVG(evaluation) FROM rating";

        // Получение и возврат результатов.
        $result = $db->query($sql)->fetchAll();
        $result = round ($result[0][0], 2);
        return ($result);
    }

    /**
     * Возвращает массив с данными последнего принятого студента
     */
    public static function lastAccept()
    {
        // Соединение с БД
        $db = Db::getConnection();

        $result = $db->query('
                SELECT 
                    id_of_student, 
                    surname_of_student,
                    student_name,
                    student_second_name,
                    accepted
                FROM students
                 WHERE accepted = (SELECT MAX(accepted) FROM students)'
        );
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetch();

    }

    public static function getResultList($searchText)
    {

        $searchText = '%'.$searchText.'%';

        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
        $sql ="SELECT 
                    s.id_of_student, 
                    s.surname_of_student,
                    s.student_name,
                    s.student_second_name,
                    s.group_number,
                    s.residence,
                    s.phone_number,
                    g.group_code
                FROM students s
                INNER JOIN groups g ON  g.id = s.group_number 
                WHERE  
                    s.surname_of_student LIKE :searchText OR 
                    s.student_name LIKE :searchText OR 
                    s.student_second_name LIKE :searchText OR 
                    s.group_number LIKE :searchText OR 
                    s.residence LIKE :searchText OR 
                    s.phone_number LIKE :searchText 
                ORDER BY s.surname_of_student ASC";

        $result = $db->prepare($sql);
        $result->bindParam(':searchText', $searchText, PDO::PARAM_STR);

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        $studentsList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $studentsList[$i]['id_of_student'] = $row['id_of_student'];
            $studentsList[$i]['surname_of_student'] = $row['surname_of_student'];
            $studentsList[$i]['student_name'] = $row['student_name'];
            $studentsList[$i]['student_second_name'] = $row['student_second_name'];
            $studentsList[$i]['group_number'] = $row['group_number'];
            $studentsList[$i]['residence'] = $row['residence'];
            $studentsList[$i]['phone_number'] = $row['phone_number'];
            $studentsList[$i]['group_code'] = $row['group_code'];
            $i++;
        }
        return $studentsList;
    }


}
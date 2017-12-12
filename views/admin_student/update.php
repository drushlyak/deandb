<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/student">Управление студентами</a></li>
                    <li class="active">Редактировать студента</li>
                </ol>
            </div>


            <h4>Редактировать студента <?php echo $student['surname_of_student'].' '.mb_substr($student['student_name'],0,1).'. '.mb_substr($student['student_second_name'],0,1).'.'?></h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">


                        <p>Фото студента</p>
                        <img src="<?php echo Student::getImage($student['id_of_student']); ?>" width="200" alt="" />
                        <input type="file" name="image" placeholder="" value="<?php //echo $student['image']; ?>">

                        <p>Фамилия</p>
                        <input type="text" name="surname_of_student" placeholder="" value="<?php echo $student['surname_of_student']; ?>">

                        <p>Имя</p>
                        <input type="text" name="student_name" placeholder="" value="<?php echo $student['student_name']; ?>">

                        <p>Отчество</p>
                        <input type="text" name="student_second_name" placeholder="" value="<?php echo $student['student_second_name']; ?>">

                        <p>Номер группы</p>
                        <select name="group_number">
                            <?php if (is_array($groupsList)): ?>
                                <?php foreach ($groupsList as $group): ?>
                                    <option value="<?php echo $group['id']; ?>"
                                        <?php if ($student['group_number'] == $group['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $group['group_code']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>


                        <p>Принят</p>
                        <input type="date" name="accepted" placeholder="" value="<?php echo $student['accepted']; ?>">

                        <p>Отчислен</p>
                        <input type="date" name="expelled" placeholder="" value="<?php echo $student['expelled']; ?>">

                        <p>Место жительства</p>
                        <input type="text" name="residence" placeholder="" value="<?php echo $student['residence']; ?>">

                        <p>Телефон</p>
                        <input type="text" name="phone_number" placeholder="" value="<?php echo $student['phone_number']; ?>">

                        <p>Оплата обучения</p>
                        <select name="study_fee">
                            <?php if (is_array($feesList)): ?>
                                <?php foreach ($feesList as $fee): ?>
                                    <option value="<?php echo $fee['id']; ?>"
                                        <?php if ($student['study_fee'] == $fee['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $fee['kind_of_study_fees']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        

                        <p>Вид обучения</p>
                        <select name="type_of_study">
                            <?php if (is_array($studyList)): ?>
                                <?php foreach ($studyList as $study): ?>
                                    <option value="<?php echo $study['id']; ?>"
                                        <?php if ($student['type_of_study'] == $study['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $study['type_of_study']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <br/><br/>
                        
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                        
                        <br/><br/>
                        
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


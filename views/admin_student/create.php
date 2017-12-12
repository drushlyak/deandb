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


            <h4>Добавление нового студента</h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>




            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">


                        <p>Фото студента</p>
                        <img src="/upload/images/students/no-image.jpg" width="200" alt="" >
                        <input type="file" name="image" placeholder="" value="">

                        <p>Фамилия</p>
                        <input type="text" name="surname_of_student" placeholder="" value="">

                        <p>Имя</p>
                        <input type="text" name="student_name" placeholder="" value="">

                        <p>Отчество</p>
                        <input type="text" name="student_second_name" placeholder="" value="">

                        <p>Номер группы</p>
                        <select name="group_number">
                            <?php if (is_array($groupsList)): ?>
                                <?php foreach ($groupsList as $group): ?>
                                    <option value="<?php echo $group['id']; ?>"
                                        <?php if ($group['id'] == 1) echo ' selected="selected"'; ?>>
                                        <?php echo $group['group_code']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>


                        <p>Принят</p>
                        <input type="date" name="accepted" placeholder="" value="">

                        <p>Место жительства</p>
                        <input type="text" name="residence" placeholder="" value="">

                        <p>Телефон</p>
                        <input type="text" name="phone_number" placeholder="" value="">

                        <p>Оплата обучения</p>
                        <select name="study_fee">
                            <?php if (is_array($feesList)): ?>
                                <?php foreach ($feesList as $fee): ?>
                                    <option value="<?php echo $fee['id']; ?>"
                                        <?php if ($fee['id'] == 1) echo ' selected="selected"'; ?>>
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
                                        <?php if ($study['id'] == 1) echo ' selected="selected"'; ?>>
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


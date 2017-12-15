<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/rating">Управление рейтингом студентов</a></li>
                    <li class="active">Добавить оценку</li>
                </ol>
            </div>


            <h4>Добавить оценку</h4>

            <br/>


                    <?php if (isset($errors) && is_array($errors)): ?>
                        <div class="alert alert-warning">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li> - <?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                        </div>
                    <?php endif; ?>


            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">


                        <p>ФИО студента</p>
                        <select name="student_id">
                            <?php if (is_array($studentsList)): ?>
                                <?php foreach ($studentsList as $student): ?>
                                    <option value="<?php echo $student['id_of_student']; ?>"
                                        <?php if ($student['id_of_student'] == 1) echo ' selected="selected"'; ?>>
                                        <?php echo $student['surname_of_student']." ".$student['student_name']." ".$student['student_second_name'] ; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <p></p>

                        <p>Предмет</p>
                        <select name="discipline_id">
                            <?php if (is_array($disciplinesList)): ?>
                                <?php foreach ($disciplinesList as $discipline): ?>
                                    <option value="<?php echo $discipline['id']; ?>"
                                        <?php if ($discipline['id'] == 1) echo ' selected="selected"'; ?>>
                                        <?php echo $discipline['name_of_discipline'] ; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>


                        <p>Семестр</p>
                        <select name="semester_id">
                            <?php if (is_array($semestersList)): ?>
                                <?php foreach ($semestersList as $semester): ?>
                                    <option value="<?php echo $semester['id']; ?>"
                                        <?php if ($semester['id'] == 1) echo ' selected="selected"'; ?>>
                                        <?php echo $semester['semester'] ; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <p></p>
                        <p>Оценка (от 0 до 5)</p>
                        <input type="number" min="0" max="5" name="evaluation" placeholder="" value="">

                        <br> <br>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>


        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


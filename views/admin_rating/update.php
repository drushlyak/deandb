<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/rating">Управление рейтингом студентов</a></li>
                    <li class="active">Редактировать оценки</li>
                </ol>
            </div>

            <h4>Редактировать оценки студентов</h4>

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
                                        <?php if ($ratings['student_id']  == $student['id_of_student']) echo ' selected'; ?>>
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
                                        <?php if ($discipline['id'] == $ratings['discipline_id']) echo ' selected'; ?>>
                                        <?php echo $discipline['name_of_discipline'] ; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <p></p>
                        <p>Семестр</p>
                        <select name="semester_id">
                            <?php if (is_array($semestersList)): ?>
                                <?php foreach ($semestersList as $semester): ?>
                                    <option  <?php if ($semester['id'] == $ratings['semester_id']) echo ' selected'; ?>
                                        value="<?php echo $semester['id']; ?>" >
                                        <?php echo $semester['semester'] ; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>


                         echo ;
                        <p></p>
                        <p>Оценка (от 0 до 5)</p>
                        <select name="evaluation">
                            <?php for ($n=0;$n<6;$n++) { ?>
                            <option type="number"
                                <?php if ($n == $ratings['evaluation']) echo "selected"; ?>
                             value = "<?php echo $n; ?>"><?php echo $n; ?></option>
                            <?php } ?>
                        </select>


                        <br> <br>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>



        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


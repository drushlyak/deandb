<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/discipline">Управление предметами</a></li>
                    <li class="active">Редактировать предмет</li>
                </ol>
            </div>


            <h4>Редактировать предмет:</h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">

                        <p>Название предмета</p>
                        <input type="text" name="name_of_discipline" placeholder="" value="<?php echo $disciplines['name_of_discipline'] ?>">

                        <p>Количество учебных часов</p>
                        <input type="number" name="number_of_academic_hours" placeholder="" value="<?php echo $disciplines['number_of_academic_hours'] ?>">

                        <p>Выбрать тип экзамена</p>
                        <select name="type_of_examination">
                            <?php if (is_array($examinationsList)): ?>
                                <?php foreach ($examinationsList as $examination): ?>
                                    <option value="<?php echo $examination ['id']; ?>"
                                        <?php if ($examination['id'] == $disciplines['type_of_examination']) echo ' selected="selected"'; ?>>
                                        <?php echo $examination['type_of_examination']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <p></p>
                        <p>Выбрать преподавателя</p>
                        <select name="lecturer_id">
                            <?php if (is_array($lecturersList)): ?>
                                <?php foreach ($lecturersList as $lecturer): ?>
                                    <option value="<?php echo $lecturer['id']; ?>"
                                        <?php if ($lecturer['id'] == $disciplines['lecturer_id']) echo ' selected="selected"'; ?>>
                                        <?php echo $lecturer['lecturer']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <br> <br>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>


        </div>



        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


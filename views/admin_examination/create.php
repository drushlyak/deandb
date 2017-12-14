<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/examination">Управление оцениниваем</a></li>
                    <li class="active">Добавить оценивание</li>
                </ol>
            </div>


            <h4>Добавить оценивание</h4>

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
                    <form action="#" method="post">

                        <p>Тип оценивания</p>
                        <input type="text" name="type_of_examination" placeholder="" value="">

                        <p>Преподаватель</p>
                        <select name="id_examiner">
                            <?php if (is_array($lecturersList)): ?>
                                <?php foreach ($lecturersList as $lecturer): ?>
                                    <option value="<?php echo $lecturer['id']; ?>"
                                        <?php if ($lecturer['id'] == 1) echo ' selected="selected"'; ?>>
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
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


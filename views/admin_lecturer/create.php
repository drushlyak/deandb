<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/lecturer">Управление преподавателями</a></li>
                    <li class="active">Добавить преподавателя</li>
                </ol>
            </div>


            <h4>Добавить преподавателя</h4>

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

                        <p>ФИО преподавателя</p>
                        <input type="text" name="lecturer" placeholder="" value="">

                        <p>Совместитетель, да/нет</p>
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-primary ">
                                <input type="radio" name="full_time_job" value="1"  > Да
                            </label>
                            <label class="btn btn-primary active">
                                <input type="radio" name="full_time_job" value=""  checked> Нет
                            </label>
                        </div>

                        <br> <br>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>


        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


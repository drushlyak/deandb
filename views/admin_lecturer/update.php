<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/lecturer">Управление преподавателями</a></li>
                    <li class="active">Редактировать преподавателя</li>
                </ol>
            </div>


            <h4>Редактировать преподавателя:</h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">

                        <p>ФИО преподавателя</p>
                        <input type="text" name="lecturer" placeholder="" value="<?php echo $lecturer['lecturer'] ?>">

                        <p>Совместитетель, да/нет</p>
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-primary <?php if ($lecturer['full_time_job']== 1) echo "active"?>">
                                <input type="radio" name="full_time_job" value="1" <?php if ($lecturer['full_time_job']== 1) echo "checked"?> > Да
                            </label>
                            <label class="btn btn-primary  <?php if ($lecturer['full_time_job']<>1) echo "active"?>">
                                <input type="radio" name="full_time_job" value=""  <?php if ($lecturer['full_time_job']<>1) echo "checked"?>  > Нет
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


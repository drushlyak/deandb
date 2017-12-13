<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/semester">Управление семестрами</a></li>
                    <li class="active">Редактировать семестр</li>
                </ol>
            </div>


            <h4>Редактировать семестр:</h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">

                        <p>Семестр</p>
                        <input type="text" name="semester" placeholder="" value="<?php echo $semesters['semester'] ?>">

                        <p>Информация о семестре</p>
                        <input type="text" name="information" placeholder="" value="<?php echo $semesters['information'] ?>">

                        <br> <br>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>



        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/study">Управление видами обучения</a></li>
                    <li class="active">Редактировать вид обучения</li>
                </ol>
            </div>


            <h4>Редактировать вид обучения:</h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">

                        <p>Вид обучения</p>
                        <input type="text" name="type_of_study" placeholder="" value="<?php echo $studys['type_of_study'] ?>">

                        <p>Срок действия лицензии</p>
                        <input type="date" name="accepted" placeholder="" value="<?php echo $studys['accepted'] ?>">

                        <br> <br>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>



        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


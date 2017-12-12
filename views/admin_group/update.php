<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/group">Управление группами</a></li>
                    <li class="active">Редактировать группу</li>
                </ol>
            </div>


            <h4>Редактировать группу "<?php echo $group['group_code']; ?>"</h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">

                        <p>Название</p>
                        <input type="text" name="group_code" placeholder="" value="<?php echo $group['group_code']; ?>">

                        <p>Количество студентов</p>
                        <input type="text" name="quantity_of_students" placeholder="" value="<?php echo $group['quantity_of_students']; ?>">

                        <br><br>
                        
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


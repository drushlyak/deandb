<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/fee">Управление оплатами</a></li>
                    <li class="active">Редактировать вид оплаты</li>
                </ol>
            </div>


            <h4>Редактировать оплату "<?php echo $fee['kind_of_study_fees']; ?>"</h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">

                        <p>Вид оплаты</p>
                        <input type="text" name="kind_of_study_fees" placeholder="" value="<?php echo $fee['kind_of_study_fees']; ?>">

                        <p>Задолженность по взаиморасчетам(рублей)</p>
                        <input type="text" name="arrears" placeholder="" value="<?php echo $fee['arrears']; ?>">

                        <br><br>
                        
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


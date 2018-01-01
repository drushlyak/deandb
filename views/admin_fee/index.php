<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление оплатами</li>
                </ol>
            </div>

            <a href="/admin/fee/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить вид оплаты</a>
            <a href="javascript: printTable();" class="btn btn-default back"><i class="fa fa-print"></i> Печать</a>

            <div id="printContent">

            <h4>Список видов оплат</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID оплаты</th>
                    <th>Вид оплаты</th>
                    <th>Задолженность по взаиморасчетам (рублей)</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($feesList as $fee): ?>
                    <tr>
                        <td><?php echo $fee['id']; ?></td>
                        <td><?php echo $fee['kind_of_study_fees']; ?></td>
                        <td><?php echo $fee['arrears']; ?></td>
                        <td><a href="/admin/fee/update/<?php echo $fee['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/fee/delete/<?php echo $fee['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


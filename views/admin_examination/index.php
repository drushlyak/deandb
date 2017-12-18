<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление оцениваем</li>
                </ol>
            </div>

            <a href="/admin/examination/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить оценивание</a>
            <a href="javascript: printTable();" class="btn btn-default back"><i class="fa fa-print"></i> Печать</a>

            <div id="printContent">

                <h4>Список оцениваний</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID</th>
                    <th>Тип оценивания</th>
                    <th>ФИО преподавателя</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($examinationsList as $examination): ?>
                    <tr>
                        <td><?php echo $examination['id']; ?></td>
                        <td><?php echo $examination['type_of_examination']; ?></td>
                        <td><?php echo $examination['lecturer']; ?></td>
                        <td><a href="/admin/examination/update/<?php echo $examination['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/examination/delete/<?php echo $examination['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление предметами</li>
                </ol>
            </div>

            <a href="/admin/discipline/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить предмет</a>

            <a href="javascript: printTable();" class="btn btn-default back"><i class="fa fa-print"></i> Печать</a>

            <div id="printContent">

            <h4>Перечень предметов</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID</th>
                    <th>Название предмета</th>
                    <th>Количество учебных часов</th>
                    <th>Тип экзамена</th>
                    <th>Преподаватель</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($disciplinesList as $discipline): ?>
                    <tr>
                        <td><?php echo $discipline['id']; ?></td>
                        <td><?php echo $discipline['name_of_discipline']; ?></td>
                        <td><?php echo $discipline['number_of_academic_hours']; ?></td>
                        <td><?php echo $discipline['type_of_examination']; ?></td>
                        <td><?php echo $discipline['lecturer']; ?></td>
                        
                        <td><a href="/admin/discipline/update/<?php echo $discipline['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/discipline/delete/<?php echo $discipline['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


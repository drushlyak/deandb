<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление группами</li>
                </ol>
            </div>

            <a href="/admin/group/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить группу</a>
            <a href="javascript: printTable();" class="btn btn-default back"><i class="fa fa-print"></i> Печать</a>

            <div id="printContent">

            <h4>Список групп</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID группы</th>
                    <th>Название группы</th>
                    <th>Количество студентов</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($groupsList as $group): ?>
                    <tr>
                        <td><?php echo $group['id']; ?></td>
                        <td><?php echo $group['group_code']; ?></td>
                        <td><?php echo $group['quantity_of_students']; ?></td>
                        <td><a href="/admin/group/update/<?php echo $group['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/group/delete/<?php echo $group['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


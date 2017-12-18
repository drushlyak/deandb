<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление семестрами</li>
                </ol>
            </div>

            <a href="/admin/semester/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить семестр</a>

            <a href="javascript: printTable();" class="btn btn-default back"><i class="fa fa-print"></i> Печать</a>

            <div id="printContent">

            <h4>Перечень семестров</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID семестра</th>
                    <th>Семестр</th>
                    <th>Информация о семестре</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($semestersList as $semester): ?>
                    <tr>
                        <td><?php echo $semester['id']; ?></td>
                        <td><?php echo $semester['semester']; ?></td>
                        <td><?php echo $semester['information']; ?></td>
                        <td><a href="/admin/semester/update/<?php echo $semester['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/semester/delete/<?php echo $semester['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


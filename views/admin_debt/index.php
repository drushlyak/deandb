<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление задолженностями студентов</li>
                </ol>
            </div>

            <a href="/admin/debt/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить задолженность</a>
            
            <h4>Список задолженностей</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID</th>
                    <th>ФИО студента</th>
                    <th>Задолженность по предмету</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($debtsList as $debt): ?>
                    <tr>
                        <td><?php echo $debt['id']; ?></td>
                        <td><?php echo $debt['surname_of_student']." ".$debt['student_name']." ".$debt['student_second_name']; ?></td>
                        <td><?php echo $debt['name_of_discipline']; ?></td>
                        <td><a href="/admin/debt/update/<?php echo $debt['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/debt/delete/<?php echo $debt['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


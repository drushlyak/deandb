<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление преподавателями</li>
                </ol>
            </div>

            <a href="/admin/lecturer/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить преподавателя</a>
            
            <h4>Список преподавателей</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID преподавателя</th>
                    <th>ФИО</th>
                    <th>Совместитетель, да/нет</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($lecturersList as $lector): ?>
                    <tr>
                        <td><?php echo $lector['id']; ?></td>
                        <td><?php echo $lector['lecturer']; ?></td>
                        <td><?php if ($lector['full_time_job'] == 1 ) echo "Да"; else echo "Нет"; ?></td>
                        <td><a href="/admin/lecturer/update/<?php echo $lector['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/lecturer/delete/<?php echo $lector['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


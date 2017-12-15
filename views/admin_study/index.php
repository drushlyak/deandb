<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление видами обучения</li>
                </ol>
            </div>

            <a href="/admin/study/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить вид обучения</a>
            
            <h4>Перечень видов обучения</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID</th>
                    <th></th>
                    <th>Срок действия лицензии</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($studysList as $study): ?>
                    <tr>
                        <td><?php echo $study['id']; ?></td>
                        <td><?php echo $study['type_of_study']; ?></td>
                        <td><?php echo $study['accepted']; ?></td>
                        <td><a href="/admin/study/update/<?php echo $study['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/study/delete/<?php echo $study['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление рейтингом студентов</li>
                </ol>
            </div>

            <a href="/admin/rating/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить оценки</a>
            
            <h4>Список оценок</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID</th>
                    <th>ФИО студента</th>
                    <th>Предмет</th>
                    <th>Семестр</th>
                    <th>Оценка</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($ratingsList as $rating): ?>
                    <tr>
                        <td><?php echo $rating['id']; ?></td>
                        <td><?php echo $rating['surname_of_student']." ".$rating['student_name']." ".$rating['student_second_name']; ?></td>
                        <td><?php echo $rating['name_of_discipline']; ?></td>
                        <td><?php echo $rating['semester']; ?></td>
                        <td><?php echo $rating['evaluation']; ?></td>
                        <td><a href="/admin/rating/update/<?php echo $rating['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/rating/delete/<?php echo $rating['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


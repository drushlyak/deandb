<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление студентами</li>
                </ol>
            </div>

            <a href="/admin/student/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить студента</a>
            <a href="javascript: printTable();" class="btn btn-default back"><i class="fa fa-print"></i> Печать</a>

            <div id="printContent">

            <h4>Список студентов:</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID студента</th>
                    <th>Фамилия, имя, отчество</th>
                    <th>Группа</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($studentsList as $student): ?>
                    <tr>
                        <td><?php echo $student['id_of_student']; ?></td>
                        <td><?php echo "<a href = \"/student/".$student['id_of_student']."\">".$student['surname_of_student'].' '.$student['student_name'].' '.$student['student_second_name']; ?></a></td>
                        <td><?php echo $student['group_code']; ?></td>
                        <td><a href="/admin/student/update/<?php echo $student['id_of_student']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/student/delete/<?php echo $student['id_of_student']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


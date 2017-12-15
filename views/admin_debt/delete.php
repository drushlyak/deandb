<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/debt">Управление задолженностями студентов</a></li>
                    <li class="active">Удалить задолженность студентов</li>
                </ol>
            </div>


            <h4>Удалить задолженность студента ID#<?php echo $id; ?></h4>


            <p>Вы действительно хотите удалить задолженность студента?</p>

            <form method="post">
                <input type="submit" name="submit" value="Удалить" />
            </form>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


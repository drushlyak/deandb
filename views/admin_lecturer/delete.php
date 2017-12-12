<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/lecturer">Управление преподавателями</a></li>
                    <li class="active">Удалить преподавателя</li>
                </ol>
            </div>


            <h4>Удалить преподавателя ID#<?php echo $id; ?></h4>


            <p>Вы действительно хотите удалить этого преподавателя?</p>

            <form method="post">
                <input type="submit" name="submit" value="Удалить" />
            </form>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


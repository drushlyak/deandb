<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/examination">Управление оцениванием</a></li>
                    <li class="active">Редактировать оценивание</li>
                </ol>
            </div>


            <h4>Редактировать оценивание:</h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">

                        <p>Тип оценивания</p>
                        <input type="text" name="type_of_examination" placeholder="" value="<?php echo $examination['type_of_examination'] ?>">
                        <p></p>
                        <p>Выбрать преподавателя</p>
                        <select name="id_examiner">
                            <?php if (is_array($lecturersList)): ?>
                                <?php foreach ($lecturersList as $lecturer): ?>
                                    <option value="<?php echo $lecturer['id']; ?>"
                                        <?php if ($lecturer['id'] == $examination['id_examiner']) echo ' selected="selected"'; ?>>
                                        <?php echo $lecturer['lecturer']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <br> <br>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>



        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


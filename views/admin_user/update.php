<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <br/>
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/user">Управление пользователями</a></li>
                    <li class="active">Редактировать пользователя</li>
                </ol>
            </div>

            <h4>Редактировать пользователя</h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">

                        <p>Логин</p>
                        <input type="text" name="name" placeholder="" value="<?php echo $user['name'] ?>">

                        <p>Е-мэйл</p>
                        <input type="text" name="email" placeholder="" value="<?php echo $user['email'] ?>">

                        <p>Пароль</p>
                        <input type="text" name="password" placeholder="" value="<?php echo $user['password'] ?>">

                        <p>Права</p>
                        <input type="text" name="role" placeholder="" value="<?php echo $user['role'] ?>">

                        <br> <br>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>



        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


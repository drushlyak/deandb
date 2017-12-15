<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            
            <br/>
            
            <h4>Добрый день, администратор!</h4>
            
            <br/>
            
            <p>Вам доступны такие возможности:</p>
            
            <br/>
            
            <ul>
                <li class="list-group-item"><a href="/admin/student">Управление студентами</a></li>
                <li class="list-group-item"><a href="/admin/group">Управление группами</a></li>
                <li class="list-group-item"><a href="/admin/fee">Управление оплатами</a></li>
                <li class="list-group-item"><a href="/admin/lecturer">Управление преподавателями</a></li>
                <li class="list-group-item"><a href="/admin/semester">Управление семестрами</a></li>
                <li class="list-group-item"><a href="/admin/study">Управление видами обучения</a></li>
                <li class="list-group-item"><a href="/admin/discipline">Управление предметами</a></li>
                <li class="list-group-item"><a href="/admin/examination">Управление оцениванием</a></li>
                <li class="list-group-item"><a href="/admin/debt">Управление задолженностями студентов</a></li>
                <li class="list-group-item"><a href="/admin/rating">Управление рейтингом студентов</a></li>
                <li class="list-group-item"><a href="/admin/user">Управление пользователями</a></li>
            </ul>
            
        </div>

        <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Внимание!</strong> Редактировать пользователей могут только суперадминистраторы.
        </div>

    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


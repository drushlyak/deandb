<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            
            <br/>
            
            <h4>Добрый день, администратор!</h4>
            
            <br/>
            
            <p>Вам доступно управление такими БД:</p>
            
            <br/>


            <div>
                <a href="/admin/student"><button type="button" class="btn btn-info" ">Студенты</button></a>
                <a href="/admin/group"><button type="button" class="btn btn-info" ">Группы</button></a>
            </div>
            <br/>
            <div>
                <a href="/admin/rating"><button type="button" class="btn btn-default" >Успеваемость студентов</button></a>
                <a href="/admin/debt"><button type="button" class="btn btn-default" >Задолженности студентов</button></a>
            </div>
            <br/>
            <div>
                <a href="/admin/lecturer"><button type="button" class="btn btn-default" >Преподаватели</button></a>
                <a href="/admin/discipline"><button type="button" class="btn btn-default">Предметы</button></a>
                <a href="/admin/study"><button type="button" class="btn btn-default" >Виды обучения</button></a>
                <a href="/admin/semester"><button type="button" class="btn btn-default" >Семестры</button></a>
            </div>
            <br/>
            <div>
                <a href="/admin/fee"><button type="button" class="btn btn-default" >Оплаты</button></a>
                <a href="/admin/examination"><button type="button" class="btn btn-default" >Оценивание</button></a>
            </div>
            <br/>
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Внимание!</strong> Редактировать пользователей могут только суперадминистраторы.
                <br/>
            </div>
            <div>
                <a href="/admin/user"><button type="button" class="btn btn-warning" >Пользователи</button></a>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>


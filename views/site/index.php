<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">

                    <h2>Поиск студента</h2>
                    <form>
                        <div class="input-group">
                            <input id="searchingText" type="text" class="form-control">
                                <span class="input-group-btn">
                                    <button onclick="searchTextInDb()" class="btn btn-default" type="button">Поиск!</button>
                                </span>
                        </div>
                    </form>
                    <br/>

                    <h2>Наши группы</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($groups as $groupItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/group/<?php echo $groupItem['id'];?>">
                                            <?php echo $groupItem['group_code'];?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

    <div class="col-sm-9 padding-center">

        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Добро пожаловать!</h2>




            <div class="col-sm-8 padding-center">
            <br/>
            <div id="printContent">
                <h4>Сейчас в нашем ВУЗе...</h4>

                <table class="table-bordered table-striped table">

                    <tr>
                        <td align="center">Количество учащихся студентов, чел.</td>
                        <td align="center"><?php echo $countOfStudents ?></td>
                    </tr>
                    <tr>
                        <td align="center">Количество групп</td>
                        <td align="center"><?php echo $countOfGroups ?></td>
                    </tr>
                    <tr>
                        <td align="center">Преподавательский состав, чел.</td>
                        <td align="center"><?php echo $countOfLecturers ?></td>
                    </tr>
                    <tr>
                        <td align="center">Количество преподаваемых дисциплин</td>
                        <td align="center"><?php echo $countOfDisciplines ?></td>
                    </tr>
                    <tr>
                        <td align="center">Количество форм обучения</td>
                        <td align="center"><?php echo $countTypesOfStudy ?></td>
                    </tr>
                    <tr>
                        <td align="center">Средний балл студентов</td>
                        <td align="center"><?php echo $averageRatingOfAll ?></td>
                    </tr>
                    <tr>
                        <td align="center">Последний принятый студент</td>
                        <td align="center"><?php echo $lastAccept['surname_of_student']." "
                                .mb_substr($lastAccept['student_name'],0,1)."."
                                .mb_substr($lastAccept['student_second_name'],0,1).". / ".$lastAccept['accepted'] ?></td>
                    </tr>
                </table>


                 </div>

                    <p>Для добавления и редактирования информации <a href="/user/login/">авторизируйтесь</a> и зайдите в <a href="/admin/">админпанель</a></p>

                </div><!--features_items-->


            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
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

            <div id="printContent" class="col-sm-9 padding-right">
                <h2 class="title text-center">Карточка студента</h2>
                <div class="product-details"><!--product-details-->
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="view-product">
                                <img   src="<?php echo Student::getImage($student['id_of_student']); ?>"  height="100%" width="100%" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="product-information"><!--/product-information-->
                                <h2><?php echo $student['surname_of_student'].' '.$student['student_name'].' '.$student['student_second_name'];?></h2>

                                <p><b>Группа обучения:</b> <?php echo "<a href=\"/groupall/".$student['group_number']."\">".$student['group_code']."</a>" ;?></p>
                                <p><b>Тип обучения:</b> <?php echo $student['type_of_study'];?></p>
                                <p><b>Оплата обучения:</b> <?php echo $student['kind_of_study_fees'];?></p>
                                <p><b>Поступил(а) на обучение:</b> <?php echo $student['accepted'];?></p>
                                <p><b>Проживает по адресу:</b> <?php echo $student['residence'];?></p>
                                <p><b>Контактный телефон:</b> <?php echo $student['phone_number'];?></p>

                                <!--<?php if (isset($adminRole)):?>
                                <a href="/admin/student/update/<?php echo $student['id_of_student']; ?>" class="btn btn-default cart">
                                    <i class="fa fa-pencil"></i>
                                    Редактирование
                                </a>
                                <?php endif ?> -->

                                <?php if (isset ($studentRating[0])) : ?>
                                <h2>Успеваемость студента за период обучения:</h2>

                                <table>
                                    <tbody>
                                    <tr>
                                        <th>Дисциплина</th>
                                        <th>Семестр</th>
                                        <th>Оценка</th>
                                    </tr>
                                    <?php $i = 0; $averageEvaluation = 0;?>
                                    <?php foreach ($studentRating as $currentDiscipline) {?>
                                        <tr>
                                            <td><?php echo $currentDiscipline['name_of_discipline']; ?> </td>
                                            <td align="center"><?php echo $currentDiscipline['semester_id']; ?></td>
                                            <td align="center"><?php echo $currentDiscipline['evaluation'];
                                                $averageEvaluation = $averageEvaluation + $currentDiscipline['evaluation'];
                                                $i++;
                                                ?></td>
                                        </tr>

                                    <?php }; ?>

                                    </tbody>

                                </table>

                                <?php endif; ?>

                                <a href="javascript: printTable();" class="btn btn-default back"><i class="fa fa-print"></i> Печать</a>

                                <!--<a href="/rating/<?php// echo $student['id_of_student']; ?>" class="btn btn-default cart">
                                    <i class="fa fa-tachometer"></i>
                                    Успеваемость
                                </a> -->
                            </div>
                        </div>
                    </div>
                </div><!--/product-details-->

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
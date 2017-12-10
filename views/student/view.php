<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
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

            <div class="col-sm-9 padding-right">
                <h2 class="title text-center">Карточка студента</h2>
                <div class="product-details"><!--product-details-->
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="<?php echo Student::getImage($student['id_of_student']); ?>" width="200" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <!--<img src="/template/images/product-details/new.jpg" class="newarrival" alt="" /> -->
                                <h2><?php echo $student['surname_of_student'].' '.$student['student_name'].' '.$student['student_second_name'];?></h2>

                                <p><b>Группа обучения:</b> <?php echo $student['group_code'];?></p>
                                <p><b>Тип обучения:</b> <?php echo $student['type_of_study'];?></p>
                                <p><b>Оплата обучения:</b> <?php echo $student['kind_of_study_fees'];?></p>
                                <p><b>Поступил(а) на обучение:</b> <?php echo $student['accepted'];?></p>
                                <p><b>Проживает по адресу:</b> <?php echo $student['residence'];?></p>
                                <p><b>Контактный телефон:</b> <?php echo $student['phone_number'];?></p>

                                <a href="/rating/<?php echo $student['id_of_student']; ?>" class="btn btn-default cart">
                                    <i class="fa fa-tachometer"></i>
                                    Успеваемость
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">                                
                        <div class="col-sm-12">
                            <h5>Дополнительные опции:</h5>

                            <a href="/admin/student/update/<?php echo $student['id_of_student']; ?>" class="btn btn-default cart">
                                <i class="fa fa-pencil"></i>
                                Редактирование
                            </a>

                        </div>
                    </div>
                </div><!--/product-details-->

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
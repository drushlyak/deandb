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
                <h2 class="title text-center">Редактирование карточки студента</h2>
                <div class="product-details"><!--product-details-->
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="/template/images/product-details/1.jpg" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <!--<img src="/template/images/product-details/new.jpg" class="newarrival" alt="" /> -->
                                <h2><?php echo $student['surname_of_student'].' '.mb_substr($student['student_name'],0,1).'. '.mb_substr($student['student_second_name'],0,1).'., группа '.$student['group_code'];?></h2>

                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="inputPassword" class="control-label col-xs-4">Фамилия</label>
                                        <div class="col-xs-8">
                                            <input type="text" class="form-control" id="input_surname_of_student" value="<?php echo $student['surname_of_student']?>" placeholder="<?php echo $student['surname_of_student']?>">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputPassword" class="control-label col-xs-4">Имя</label>
                                        <div class="col-xs-8">
                                            <input type="text" class="form-control" id="input_student_name" value="<?php echo $student['student_name']?>" placeholder="<?php echo $student['student_name']?>">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputPassword" class="control-label col-xs-4">Отчество</label>
                                        <div class="col-xs-8">
                                            <input type="text" class="form-control" id="input_student_second_name" value="<?php echo $student['student_second_name']?>" placeholder="<?php echo $student['student_second_name']?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword" class="control-label col-xs-4">Группа обучения</label>
                                        <div class="col-xs-8">
                                            <select>
                                                <option>Большой - 1</option>
                                                <option selected>Большой - 2</option>
                                                <option>Большой - 3</option>
                                            </select>

                                            <!--<input type="text" class="form-control" id="input_group_code" value="<?php echo $student['group_code']?>" placeholder="<?php echo $student['group_code']?>"> -->
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword" class="control-label col-xs-4">Тип обучения</label>
                                        <div class="col-xs-8">
                                            <input type="text" class="form-control" id="input_type_of_study" value="<?php echo $student['type_of_study']?>" placeholder="<?php echo $student['type_of_study']?>">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputPassword" class="control-label col-xs-4">Оплата обучения</label>
                                        <div class="col-xs-8">
                                            <input type="text" class="form-control" id="input_kind_of_study_fees" value="<?php echo $student['kind_of_study_fees']?>" placeholder="<?php echo $student['kind_of_study_fees']?>">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputPassword" class="control-label col-xs-4">Поступил(а) на обучение</label>
                                        <div class="col-xs-8">
                                            <input type="date" class="form-control" id="input_accepted" value="<?php echo $student['accepted']?>" placeholder="<?php echo $student['accepted']?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword" class="control-label col-xs-4">Отчислен(а)</label>
                                        <div class="col-xs-8">
                                            <input type="date" class="form-control" id="input_expelled" value="<?php echo $student['expelled']?>" placeholder="<?php echo $student['expelled']?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword" class="control-label col-xs-4">Проживает по адресу</label>
                                        <div class="col-xs-8">
                                            <input type="text" class="form-control" id="input_residence" value="<?php echo $student['residence']?>" placeholder="<?php echo $student['residence']?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword" class="control-label col-xs-4">Контактный телефон</label>
                                        <div class="col-xs-8">
                                            <input type="text" class="form-control" id="input_phone_number" value="<?php echo $student['phone_number']?>" placeholder="<?php echo $student['phone_number']?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-offset-2 col-xs-10">
                                            <button type="submit" class="btn btn-primary">Изменить</button>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                    <div class="row">                                
                        <div class="col-sm-12">
                            <h5>Дополнительные опции:</h5>

                            <a href="/rating/<?php echo $student['id_of_student']; ?>" class="btn btn-default cart">
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
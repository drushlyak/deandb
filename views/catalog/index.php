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


            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Учащиеся</h2>
                    <?php foreach ($allStudents as $student): ?>
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img   src="<?php echo Student::getImage($student['id_of_student']); ?>"  height="100%" width="100%" alt="" />
                                            <a href="/student/<?php echo $student['id_of_student'];?>">
                                                <?php echo "<p><b>".$student['surname_of_student']."</b><br>".$student['student_name']." ".$student['student_second_name']."</p>";?>
                                            </a>
                                        <p> Группа  <?php echo $student['group_code'] ?>
                                            </p>
                                        <!--<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a> -->
                                    </div>
                                    <!-- <?php if ($student['is_new']): ?>
                                            <img src="/template/images/home/new.png" class="new" alt="" />
                                        <?php endif; ?> -->
                                </div>
                            </div>
                        </div>

                        <?php endforeach; ?>

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
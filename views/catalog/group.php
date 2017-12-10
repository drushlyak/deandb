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
                                        <a href="/group/<?php echo $groupItem['id'];?>"
                                           class="<?php if ($groupId == $groupItem['id']) echo 'active'; ?>"
                                           >                                                                                    
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
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Группа <?php echo $group_code['group_code']?></h2>
                    <?php foreach ($groupStudents as $student): ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="<?php echo Student::getImage($student['id_of_student']); ?>" width="100" alt="" />
                                       <!-- <h2><?php echo $student['price'];?>$</h2> -->
                                        <p>
                                            <a href="/student/<?php echo $student['id_of_student'];?>">
                                                <?php echo $student['surname_of_student']." ".$student['student_name']." ".$student['student_second_name'];?>
                                            </a>
                                        </p>
                                        <!--<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a> -->
                                    </div>
                                   <!-- <?php if ($student['is_new']): ?>
                                        <img src="/template/images/home/new.png" class="new" alt="" />
                                    <?php endif; ?> -->
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>

                    <!-- Постраничная навигация -->
                    <?php echo $pagination->get(); ?>



                </div><!--features_items-->

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
                        <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Наши группы</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($categories as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?php echo $categoryItem['id'];?>">
                                            <?php echo $categoryItem['group_code'];?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <?php print_r ($product) ?>

            <div class="col-sm-9 padding-right">
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
                                <h2><?php echo $product['surname_of_student'].' '.$product['student_name'].' '.$product['student_second_name'];?></h2>
                                <p><b>Группа обучения:</b> <?php echo $product['group_code'];?></p>
                                <p><b>Тип обучения:</b> <?php echo $product['type_of_study'];?></p>
                                <p><b>Оплата обучения:</b> <?php echo $product['kind_of_study_fees'];?></p>
                                <p><b>Поступил(а) на обучение:</b> <?php echo $product['accepted'];?></p>
                                <p><b>Проживает по адресу:</b> <?php echo $product['residence'];?></p>
                                <p><b>Контактный телефон:</b> <?php echo $product['phone_number'];?></p>
                                <span>


                                    <span>US $<?php echo $product['price'];?></span>
                                    <label>Количество:</label>
                                    <input type="text" value="3" />
                                    <button type="button" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        В корзину
                                    </button>
                                </span>
                                <p><b>Наличие:</b> На складе</p>
                                <p><b>Состояние:</b> Новое</p>
                                <p><b>Производитель:</b> D&amp;G</p>
                            </div><!--/product-information-->
                        </div>
                    </div>
                    <div class="row">                                
                        <div class="col-sm-12">
                            <h5>Описание товара</h5>
                            <?php echo $product['description'];?>
                        </div>
                    </div>
                </div><!--/product-details-->

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
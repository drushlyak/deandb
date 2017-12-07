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

            <?php print_r ($product); ?>

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
                                <h2><?php echo $product[0]['surname_of_student'].' '.$product[0]['student_name'].' '.$product[0]['student_second_name'];?></h2>
                                <table>
                                    <thead>Успеваемость студента за период обучения</thead>

                                    <tbody>
                                        <tr>
                                            <th>Дисциплина</th>
                                            <th>Семестр</th>
                                            <th>Оценка</th>
                                        </tr>
                                        <?php $i = 0; $averageEvaluation = 0;?>
                                        <?php foreach ($product as $currentDiscipline) {?>
                                        <tr>
                                            <td><?php echo $currentDiscipline['name_of_discipline']; ?> </td>
                                            <td><?php echo $currentDiscipline['semester_id']; ?></td>
                                            <td><?php echo $currentDiscipline['evaluation'];
                                                $averageEvaluation = $averageEvaluation + $currentDiscipline['evaluation'];
                                                $i++;
                                                ?></td>
                                        </tr>

                                        <?php }; ?>

                                    </tbody>

                                </table>

                                <?php $averageEvaluation = $averageEvaluation / $i;?>
                                <p><b>Средняя оценка:</b> <?php echo $averageEvaluation;?></p>


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
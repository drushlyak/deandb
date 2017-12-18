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
                    <h2 class="title text-center">Результаты поиска</h2>
                    <div class="product-details"><!--product-details-->
                        <div class="row">
                            <div class="col-sm-12">

                                <table class="table-bordered table-striped table">
                                    <tr>
                                        <th>ID студента</th>
                                        <th>Фамилия, имя, отчество</th>
                                        <th>Группа</th>
                                        <th>Место жительства</th>
                                        <th>Телефон</th>
                                    </tr>
                                    <?php foreach ($studentsList as $student): ?>
                                        <tr>
                                            <td><?php echo $student['id_of_student']; ?></td>
                                            <td><?php echo "<a href = \"/student/".$student['id_of_student']."\">".$student['surname_of_student'].' '.$student['student_name'].' '.$student['student_second_name']; ?></a></td>
                                            <td><a href = "/groupall/<?php echo $student['group_number'] ?>" > <?php echo $student['group_code']; ?></a></td>
                                            <td><?php echo $student['residence']; ?></td>
                                            <td><?php echo $student['phone_number']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>

                            </div>
                        </div>
                    </div><!--/product-details-->

                </div>

                <a href="javascript: printTable();" class="btn btn-default back"><i class="fa fa-print"></i> Печать</a>

            </div>
        </div>
    </section>


<?php include ROOT . '/views/layouts/footer.php'; ?>
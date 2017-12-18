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
                <div id="printContent"  class="features_items"><!--features_items-->
                    <h2 class="title text-center">Группа <?php echo $group_code['group_code']?></h2>
                    <table class="table-bordered table-striped table">
                        <tr>
                            <th>№ п/п</th>
                            <th>Фамилия, имя, отчество</th>
                            <th>ID студента</th>
                        </tr>
                        <?php $i = 1;
                            foreach ($studentsList as $student): ?>
                            <tr>
                                <td><?php echo $i;  ?></td>
                                <td><?php echo "<a href = \"/student/".$student['id_of_student']."\">".$student['surname_of_student'].' '.$student['student_name'].' '.$student['student_second_name']; ?></a></td>
                                <td><?php echo $student['id_of_student']; ?></td>
                            </tr>
                        <?php $i++;
                            endforeach; ?>
                    </table>

                </div><!--features_items-->

                <a href="javascript: printTable();" class="btn btn-default back"><i class="fa fa-print"></i> Печать</a>


                <br/>
                <br/>

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
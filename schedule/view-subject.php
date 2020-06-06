<?php
require_once 'secure.php';
if (!Helper::can('admin') && !Helper::can('manager')) {
    header('Location: 404.php');
    exit();
    }
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
    $subject = (new SubjectMap())->findViewById($id);
    $header = 'Просмотр предметов';
    require_once 'template/header.php';
    ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <section class="content-header">
                    <h1><?= $header; ?></h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fafa-dashboard"></i> Главная</a></li>
                        <li><a href="list-subject.php">Дисциплины</a></li>
                        <li class="active"><?= $header;?></li>
                    </ol>
                </section>
                <div class="box-body">
                    <a class="btn btn-success" href="add-subject.php?id=<?= $id;?>">Изменить</a>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Название</th>
                            <td><?= $subject->name;?></td>
                        </tr>
                        <tr>
                            <th>Отделения</th>
                            <td><?= $subject->otdel;?></td>
                        </tr>
                        <tr>
                            <th>Часы</th>
                            <td><?= $subject->hours;?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
}
require_once 'template/footer.php';
?>
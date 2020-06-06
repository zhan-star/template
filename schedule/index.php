<?php
require_once 'secure.php';
$header = 'Главная: Ваше расписание занятий.';
$Identification = (new UserMap())->identity($_SESSION['id']);
if ($Identification == UserMap::TEACHER) {
$schedules = (new ScheduleMap())->findByTeacherId($_SESSION['id']);
} elseif ($Identification == UserMap::STUDENT) {

} 
//elseif ($Identification == UserMap::ADMIN ||$Identification == UserMap::MANAGER){
//    echo "<h1>Для администратора нету расписания.</h2>";
//}

else {
$schedules = null;
}
require_once 'template/header.php';
?>
<div class="row">
<div class="col-xs-12">
<div>
<div class="box-body"><?php
$header = 'Главная страница - расписание';

$Identification = (new UserMap())->identity($_SESSION['id']);
if ($Identification == UserMap::TEACHER) {
    $schedules = (new ScheduleMap())->findByTeacherId($_SESSION['id']);
} elseif ($Identification == UserMap::STUDENT) {
    $schedules = (new ScheduleMap())->findByStudentId($_SESSION['id']);
} else {
    $schedules = null;
}
require_once 'template/header.php';

?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <section class="box-body">
                    <h3><?=$header;?></h3>
                    <?if (Helper::can('admin') || Helper::can('manager')) {
    echo "<h1>Для администратора нету расписания.</h2>";
}?>
                </section>
                <div class="box-body">
                    <?php if ($Identification == UserMap::TEACHER): ?>
                        <?php if ($schedules) : ?>
                            <table class="table table-bordered table-hover">
                                <?php foreach ($schedules as $day) : ?>
                                    <tr>
                                        <th colspan="3">
                                            <h4 class="center-block"> <?=$day['name'];?> </h4>
                                        </th>
                                    </tr>
                                    <?php if ($day['gruppa']) : ?>
                                    <?php foreach ($day['gruppa'] as $gruppa) : ?>
                                        <tr>
                                            <th colspan="3"><?=$gruppa['name'];?></th>
                                        </tr>
                                        <?php foreach ($gruppa['schedule'] as $schedule ) : ?>
                                            <tr>
                                                <td><?=$schedule['lesson_num'];?></td>
                                                <td><?=$schedule['subject'];?></td>
                                                <td><?=$schedule['classroom'];?></td>
                                            </tr>
                                        <?php endforeach;?>
                                    <?php endforeach;?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="3">Отсутствует расписание на этот день</td>
                                    </tr>
                                <?php endif; ?>
                                <?php endforeach;?>
                            </table>
                        <?php else: ?>
                            <p>Для Вас расписание отутствует</p>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($Identification == UserMap::STUDENT): ?>
                        <?php if ($schedules) : ?>
                            <h3>Группа: <?=$schedules['gruppaName'];?></h3>
                            <table class="table table-bordered table-hover">
                                <?php foreach ($schedules['schedules'] as $day) :?>
                                    <tr>
                                        <th colspan="4">
                                            <h4 class="center-block"><?=$day['name'];?></h4>
                                        </th>
                                    </tr>
                                    <?php if ($day['schedule']) : ?>
                                        <?php foreach ($day['schedule'] as $schedule) : ?>
                                            <tr>
                                                <td><?= $schedule['lesson_num']; ?></td>
                                                <td><?= $schedule['subject']; ?></td>
                                                <td><?= $schedule['classroom']; ?></td>
                                                <td><?= $schedule['fio']; ?></td>
                                            </tr>
                                        <?php endforeach;?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="3">Отсутствует расписание на этот день</td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach;?>
                            </table>
                        <?php else: ?>
                            <p>Нету расписания для вас</p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php
require_once 'template/footer.php';
?>
<?php if ($schedules) : ?>
<table class="table table-bordered table-
hover">
<?php foreach ($schedules as $day) :?>
<tr>
<th colspan="3">
<h4 class="center-block">
<?=$day['name'];?>
</h4>
</th>
</tr>
<?php if ($day['gruppa']) : ?>
<?php foreach ($day['gruppa'] as $gruppa) : ?>
<tr>
<th colspan="3"><?=$gruppa['name'];?></th>
</tr>
<?php foreach
($gruppa['schedule'] as $schedule ) : ?>
<tr>
<td><?=$schedule['lesson_num'];?></td>
<td><?=$schedule['subject'];?></td>
<td><?=$schedule['classroom'];?></td>
</tr>
<?php endforeach;?>
<?php endforeach;?>
<?php else: ?>
<tr>
<td
colspan="3">Отсутствует расписание на этот день</td>
</tr>
<?php endif; ?>
<?php endforeach;?>
</table>
<?php else: ?>
<p>Нету расписания для вас</p>
<?php endif; ?>
</div>
</div>
</div>
</div>
<?php
require_once 'template/footer.php';
?>
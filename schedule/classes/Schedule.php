<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Schedule
 *
 * @author Жан
 */
abstract class Schedule extends Table{
    //put your code here
    public $schedule_id='';
    public $lesson_plan_id='';
    public $day_id='';
    public $lesson_num_id='';
    public $classroom_id='';
    public function validate(){
        return false;
    }
}

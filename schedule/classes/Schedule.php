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
class Schedule extends Table{
    //put your code here
    public $schedule_id='';
    public $lesson_plan_id='';
    public $day_id='';
    public $lesson_num_id='';
    public $classroom_id='';
    public function validate(){
        try {
            if (!empty($this->lesson_plan_id) && !empty($this->day_id) && !empty($this->lesson_num_id) && !empty($this->classroom_id)) {
            return true;
            } else {
            throw new Exception('Не переданы все параметры');
            }
            } catch (Exception $ex) {
            return false;
            }
    }
}

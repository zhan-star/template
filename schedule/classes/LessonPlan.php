<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LessonPlan
 *
 * @author Жан
 */
class LessonPlan extends Table{
    //put your code here
    public $lesson_plan_id = 0;
    public $gruppa_id='';
    public $subject_id='';
    public $user_id='';
    public function validate(){
        try {
            if (!empty($this->gruppa_id) && !empty($this->subject_id) && !empty($this->user_id)) {
            return true;
            } else {
            throw new Exception('Не переданы все параметры');
            }
            } catch (Exception $ex) {
            return false;
            }
        //return false;
    }
}

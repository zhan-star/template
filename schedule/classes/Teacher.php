<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Teacher
 *
 * @author Жан
 */
abstract class Teacher extends Table{
    //put your code here
    public $user_id=0;
    public $otdel_id='';
    public function validate(){
        return false;
    }
}

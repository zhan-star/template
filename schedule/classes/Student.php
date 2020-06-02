<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Student
 *
 * @author Жан
 */
abstract class Student extends Table{
    //put your code here
    public $user_id=0;
    public $gruppa_id='';
    public $num_zach='';
    public function validate(){
        return false;
    }
}

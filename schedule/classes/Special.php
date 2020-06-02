<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Special
 *
 * @author Жан
 */
abstract class Special extends Table{
    //put your code here
    public $special_id=0;
    public $name='';
    public $otdel_id='';
    public $active=1;
    public function validate(){
        return false;
    }
}

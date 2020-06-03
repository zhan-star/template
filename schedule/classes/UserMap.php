<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserMap
 *
 * @author Жан
 */
 class UserMap extends BaseMap{
    public function auth($login, $password){
        $login = $this->db->quote($login);
        $res = $this->db->query("SELECT user.user_id,
        CONCAT(user.lastname,' ', user.firstname, ' ',
        user.patronymic) AS fio, ". "user.pass, role.sys_name, role.name
        FROM user "
        . "INNER JOIN role ON
        user.role_id=role.role_id "
        . "WHERE user.login = $login AND
        user.active = 1");
        $user = $res->fetch(PDO::FETCH_OBJ);
        if ($user) {
        if (password_verify($password, $user->pass))
        {
        return $user;
        }
        }
        return null;
    }
}


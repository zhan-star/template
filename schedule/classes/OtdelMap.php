<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 
 *
 * @author Жан
 */
class OtdelMap extends BaseMap
{
    public function arrOtdels()
    {
        $res = $this->db->query("SELECT otdel_id AS id, name AS value FROM otdel");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function save(Otdel $otdel) {
        if ($otdel->validate()) {
            if ($otdel->otdel_id == 0) {
                return $this->insert($otdel);
            } else {
                return $this->update($otdel);
            }
        }
        return false;
    }
    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT otdel_id, name,active " . "FROM otdel WHERE otdel_id = $id");
            return $res->fetchObject("Otdel");
        }
        return new Otdel();
    }
    private function insert(Otdel $otdel){
        $name = $this->db->quote($otdel->name);
        $active = $this->db->quote($otdel->active);
        if ($this->db->exec("INSERT INTO otdel(name,active)"
                . " VALUES($name,$active)") == 1 ) {
            $otdel->otdel_id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }
    private function update(Otdel $otdel){
        $name = $this->db->quote($otdel->name);
        if ( $this->db->exec("UPDATE otdel SET name = $name,". " active= $otdel->active WHERE otdel_id = ".$otdel->otdel_id) == 1) {
            return true;
        }
        return false;
    }
    public function findViewById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT otdel_id, name, active". " FROM otdel WHERE otdel_id =$id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }
    public function findAll($ofset=0, $limit=30){
        $res = $this->db->query("SELECT otdel_id, name, active". " FROM otdel LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM otdel");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }

    
}
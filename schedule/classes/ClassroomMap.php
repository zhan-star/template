<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClassroomMap
 *
 * @author Жан
 */

class ClassroomMap extends BaseMap
{
    public function findById($id = null)
    {
        if ($id) {
            $res = $this->db->query("SELECT classroom_id,name,active " . "FROM classroom WHERE classroom_id = $id");
            return $res->fetchObject("Classroom");
        }
        return new Otdel();
    }
    public function save(Classroom $classroom)
    {
        if ($classroom->validate()) {
            if ($classroom->classroom_id == 0) {
                return $this->insert($classroom);
            } else {
                return $this->update($classroom);
            }
        }
        return false;
    }
    public function findAll($ofset = 0, $limit = 30)
    {
        $res = $this->db->query("SELECT classroom.classroom_id,classroom.name"
        . " FROM classroom LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    private function insert(Classroom $classroom)
    {
        $name = $this->db->quote($classroom->name);
        $active = $this->db->quote($classroom->active);
        if ($this->db->exec("INSERT INTO classroom(name,active)" . " VALUES($name,$active)") == 1) {
            $classroom->classroom_id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }
    private function update(Classroom $classroom)
    {
        $name = $this->db->quote($classroom->name);
        if ($this->db->exec("UPDATE classroom SET name = $name," . "active= $classroom->active WHERE classroom_id = " . $classroom->classroom_id) == 1) {
            return true;
        }
        return false;
    }
    public function findViewById($id = null)
    {
        if ($id) {
            $res = $this->db->query("SELECT classroom.classroom_id,classroom.name"
                . " FROM classroom WHERE classroom_id = $id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }
    public function count()
    {
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM classroom");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
    
}

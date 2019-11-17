<?php

class registerModel 
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function register($data)
    {
        $this->db->query('INSERT INTO users (role_id , document , password) VALUES (:role , :document , :pass)');
        $this->db->bind(':role' , CLIENT);
        $this->db->bind(':document' , $data['document']);
        $this->db->bind(':pass' , $data['password']);
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function comfim_document($data)
    {
        $this->db->query('SELECT iduser FROM users WHERE document = :document');
        $this->db->bind(':document' , $data['document']);
        return $this->db->row();   
    }
}
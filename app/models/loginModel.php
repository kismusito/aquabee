<?php

class loginModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function getUser($data)
    {
        $this->db->query('SELECT role_id , iduser , document FROM users  WHERE document = :document');
        $this->db->bind(':document' , $data['document']);
        return $this->db->register();
    }

    public function get_pass($data)
    {
        $this->db->query('SELECT password FROM users WHERE document = :document');
        $this->db->bind(':document' , $data['document']);
        return $this->db->register();
    }
}
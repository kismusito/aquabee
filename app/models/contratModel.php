<?php

class contratModel 
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function newContrat($data)
    {
        $this->db->query('INSERT INTO contrats (idcontrat , user_id, description) VALUES (:contrat , :user , :descript)');
        $this->db->bind(':contrat' , $data['contrat']);
        $this->db->bind(':user' , $data['user_id']);
        $this->db->bind(':descript' , $data['description']);
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function newHouseContrat($data)
    {
        $this->db->query('INSERT INTO house_information (contrat_id) VALUES (:contrat)');
        $this->db->bind(':contrat' , $data['contrat']);
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function newCompsumtionContrat($data)
    {
        $this->db->query('INSERT INTO month_to_month_expense (id_contrat) VALUES (:contrat)');
        $this->db->bind(':contrat' , $data['contrat']);
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateHouseInformation($data)
    {
        $this->db->query('UPDATE house_information SET url_model = :model , stratum = :strat , address = :addres , habitants = :habitants WHERE contrat_id = :contrat');
        $this->db->bind(':model' , $data['url_model']);
        $this->db->bind(':strat' , $data['stratum']);
        $this->db->bind(':addres' , $data['address']);
        $this->db->bind(':habitants' , $data['habitants']);
        $this->db->bind(':contrat' , $data['contrat_id']);
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function createConsumption($data)
    {
        $this->db->query('INSERT INTO month_to_month_expense (id_contrat, consumption_report_actual_month, consumption_report_latest_month, month_report) VALUES (:contrat , :actual , :latest , :mont)');
        $this->db->bind(':contrat' , $data['contrat']);
        $this->db->bind(':actual' , $data['actual_consumo']);
        $this->db->bind(':latest' , $data['last_consumo']);
        $this->db->bind(':mont' , $data['month']);
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getConsumoMonth($id)
    {
        $this->db->query('SELECT * FROM month_to_month_expense WHERE idreport = :report');
        $this->db->bind(':report' , $id);
        return $this->db->register();
    }

    public function getPersonsByHouse($contrat)
    {
        $this->db->query('SELECT habitants FROM house_information WHERE contrat_id = :contrat');
        $this->db->bind(':contrat' , $contrat);
        return $this->db->register();
    }
}
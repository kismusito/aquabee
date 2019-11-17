<?php

class users {

    protected $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function getContrats($user_id)
    {
        $this->db->query('SELECT * FROM contrats WHERE user_id = :id');
        $this->db->bind(':id' , $user_id);
        return $this->db->registers();
    }

    public function getContratFunctions($contrat_id)
    {
        $this->db->query('SELECT C.user_id , H.contrat_id , H.url_model , H.stratum , H.address , H.habitants  FROM contrats C
        INNER JOIN house_information H ON H.contrat_id = C.idcontrat
        WHERE C.idcontrat = :id');
        $this->db->bind(':id' , $contrat_id);
        return $this->db->registers();
    }

    public function getLastConsumo($datos)
    {
        $this->db->query('SELECT consumption_report_actual_month FROM month_to_month_expense WHERE id_contrat = :id ORDER BY idreport DESC');
        $this->db->bind(':id' , $datos);
        return $this->db->register();
    }

    public function getConsumo($datos)
    {
        $this->db->query('SELECT * FROM month_to_month_expense WHERE id_contrat = :id ORDER BY idreport ASC');
        $this->db->bind(':id' , $datos);
        return $this->db->registers();
    }

}
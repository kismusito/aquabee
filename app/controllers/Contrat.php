<?php

class Contrat extends Controller
{

    public function __construct()
    {
        $this->contrat = $this->model('contratModel');
    }

    public function index()
    {
        
    }

    public function newContrat()
    {
        $data = [
            'user_id' => trim($_POST['user_id']),
            'contrat' => trim($_POST['contrat_id']),
            'description' => trim($_POST['contrat_description']),
        ];

        if($this->contrat->newContrat($data)) {
            if($this->contrat->newHouseContrat($data)) {
                if($this->contrat->newCompsumtionContrat($data)) {
                    $_SESSION['susscess'] = 'La accion se realizo correctamente';
                    redirect('/home/myContrats');
                }
            }
            
        }
    }

    public function updateHouseInformation()
    {
        $data = [
            'contrat_id' => trim($_POST['contrat_id']),
            'url_model' => trim($_POST['url_model']),
            'address' => trim($_POST['address']),
            'stratum' => trim($_POST['stratum']),
            'habitants' => trim($_POST['habitants'])
        ];

        if($this->contrat->updateHouseInformation($data)) {
            $_SESSION['susscess'] = 'La accion se realizo correctamente';
            redirect('/');
        }
    }

    public function createConsumption()
    {
        $data = [
            'contrat' => trim($_POST['contrat']),
            'last_consumo' => trim($_POST['last_consumo']),
            'actual_consumo' => trim($_POST['actual_consumo']),
            'month' => trim($_POST['month']),
        ];

        if($this->contrat->createConsumption($data)) {
            $_SESSION['susscess'] = 'La accion se realizo correctamente';
            redirect('/');
        }
    }

    public function seeConsump($id , $contrat)
    {
        $titlePage = 'AquaLife - Consumo';
        $habitants = $this->contrat->getPersonsByHouse($contrat);
        if(!is_null($habitants->habitants)) {
            $limitWaste = WASTEBYPERSON * $habitants->habitants;
            $datos_consumo = $this->contrat->getConsumoMonth($id);
            $month_consumo = $datos_consumo->consumption_report_actual_month - $datos_consumo->consumption_report_latest_month;
            $limit = $month_consumo - $limitWaste;
            if($limit >= 1) {
                $color = 1;
            } else {
                $color = 2;
            }
        } else {
            $month_consumo = 'Para saber tu gasto debes poner el numero de habitantes';
            $limitWaste = 0;
            $color = 2;
        }
        
        $this->view('/pages/contrat/verConsumo' , compact('titlePage' , 'month_consumo' , 'limitWaste' , 'color'));
    }

}
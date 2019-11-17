<?php

class Home extends Controller
{

    public function __construct()
    {
        $this->home = $this->model('users');
    }

    public function index()
    {
        if(isset($_SESSION['auth'])) {

            $user_id = $_SESSION['auth']['user_id'];

            if(isset($_SESSION['contrat_id'])) {
                $house_information = $this->home->getContratFunctions($_SESSION['contrat_id']);
                $lastConsumo = $this->home->getLastConsumo($_SESSION['contrat_id']);
                $consumo = $this->home->getConsumo($_SESSION['contrat_id']);
            } else {
                $house_information = null;
                $lastConsumo = 0;
                $consumo = 0;
            }

            $data = [
                'user_contrats' => $this->home->getContrats($user_id),
                'house_information' => $house_information,
                'lastConsumo' => $lastConsumo,
                'consumo' => $consumo
            ];

            $titlePage = 'AquaBee - Client';
            $this->view('pages/client' , compact('titlePage' , 'data' , 'user_id'));
        } else {
            $titlePage = 'AquaBee';
            $this->view('pages/home' , compact('titlePage'));
        }
    }

    public function setContrat($contrat) 
    {
        $_SESSION['contrat_id'] = $contrat;
        redirect('/');
    }

    public function myContrats()
    {
        $user_id = $_SESSION['auth']['user_id'];

        $data = [
            'user_contrats' => $this->home->getContrats($user_id)
        ];

        $titlePage = 'AquaBee - Client';
        $this->view('pages/contrat/contrat_page' , compact('titlePage' , 'data' , 'user_id'));
    }

    public function logout()
    {
        session_destroy();
        $_SESSION[] = [];
        redirect('/');
    }
}
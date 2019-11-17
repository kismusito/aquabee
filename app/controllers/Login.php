<?php

class Login extends Controller
{
    public function __construct()
    {
        $this->login = $this->model('loginModel');
        $this->comfirm = $this->model('registerModel');
    }

    public function index()
    {
        $titlePage = 'Iniciar sesión';
        $this->view('pages/auth/login' , compact('titlePage'));
    }

    public function auth()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'document' => trim($_POST['document']),
                'password' => trim($_POST['pass'])
            ];

            if($this->comfirm->comfim_document($data) > 0) {
                if($this->comfim_password($data)) {
                    $get_user = $this->login->getUser($data);
                    $_SESSION['auth'] = [
                        'user_id' => $get_user->iduser,
                        'role' => $get_user->role_id,
                        'document' => $get_user->document
                    ];
                    redirect('/');
                } else {
                    $_SESSION['error_auth'] = 'El usuario y/o contraseña son incorrectos';
                    redirect('/login');
                }
            } else {
                $_SESSION['error_auth'] = 'El usuario y/o contraseña son incorrectos';
                redirect('/login');
            }

        } else {
            return redirect('/home');
        }
    }

    public function comfim_password($data)
    {
        $get_pass = $this->login->get_pass($data);
        if(password_verify($data['password'] , $get_pass->password)) {
            return true;
        } else {
            return false;
        }
    }
}
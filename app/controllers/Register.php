<?php

class Register extends Controller
{
    public function __construct()
    {
        $this->register = $this->model('registerModel');
    }

    public function index()
    {
        $titlePage = 'Registrarme';
        $this->view('pages/auth/register' , compact('titlePage'));
    }

    public function auth()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $register_data = [
                'document' => trim($_POST['document']),
                'password' => trim(password_hash($_POST['pass'] , PASSWORD_DEFAULT)),
                'password_confirm' => trim($_POST['pass_comfirm'])
            ];

            if($this->register->comfim_document($register_data) > 0) {
                $_SESSION['error_auth'] = 'El usuario ya existe';
                redirect('/register');
            } else {
                if($this->comfim_password($register_data)) {
                    if($this->register->register($register_data)) {
                        $_SESSION['success_auth'] = 'Tu registro se ha guardado correctamente, ahora puedes ingresar';
                        redirect('/login');
                    } else {
                        $_SESSION['error_auth'] = 'Algo salio mal';
                        redirect('/register');
                    }
                } else {
                    $_SESSION['error_auth'] = 'Las contraseñas no coinciden';
                    redirect('/register');
                }
            }
            
        } else {
            return redirect('/home');
        }
    }
    
    public function comfim_password($data)
    {
        if(password_verify($data['password_confirm'] , $data['password'])) {
            return true;
        } else {
            return false;
        }
    }
}
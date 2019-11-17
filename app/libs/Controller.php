<?php

class Controller
{
    public function model($model)
    {
        include_once '../app/models/' . $model . '.php';
        return new $model;
    }

    public function view($view , $params = [])
    {
        if(file_exists('../app/views/' . $view . '.php')) {
            include_once '../app/views/' . $view . '.php';
        } else {
            echo 'The view no exists';
        }
    }
}
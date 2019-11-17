<?php

include 'config/config.php';

include 'helpers/url_helper.php';

spl_autoload_register(function($name){
    require_once 'libs/' . $name . '.php';
});
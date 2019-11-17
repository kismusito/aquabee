<?php

function redirect($url) 
{
    header('location: ' . URL_PROJECT . $url);
}
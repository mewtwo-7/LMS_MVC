<?php

namespace Controller;

session_start();
class ClientPortal
{
    public function get()
    {
        echo \View\Loader::make()->render("templates/clientportal.twig",array("name"=> $_SESSION["name"]));
    }
}
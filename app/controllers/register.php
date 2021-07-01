<?php

namespace Controller;

class Register
{
    public function get()
    {
        echo \View\Loader::make()->render("templates/register.twig");
    }
    
    public function post()
    {
        $Name = $_POST["name"];
        $Email = $_POST["email"];
        $Password = $_POST["password"];
        $Password = password_hash($Password, PASSWORD_BCRYPT);

        \Model\Auth::createUser($Name, $Email, $Password);

        echo \View\Loader::make()->render("templates/register.twig", array(
            "message1" => true,
        ));
        // echo $Name;
        // echo $Email;
        // echo $Password;
        // echo $Name;

    }
}
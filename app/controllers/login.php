<?php

namespace Controller;

session_start();
class Login
{
    public function get()
    {
        echo \View\Loader::make()->render("templates/login.twig");
    }
    
    public function post()
    {
        $Email = $_POST["email"];
        $Password = $_POST["password"];
        $Result = \Model\Auth::verifyLogin($Email, $Password);

        if ($Result['password'] == null || !password_verify($Password, $Result['password'])) {
            echo \View\Loader::make()->render("templates/login.twig", array(
                "message" => true,
            ));
        } 
        else{

            $_SESSION["UserEmail"] = $Email;
            
            $db = \DB::get_instance();

            $data = $db->prepare("SELECT * FROM user WHERE email= ?");
            $data->execute([$Email]);

            $Name = $data->fetch();
            $_SESSION["name"] = $Name["name"];

            if($Email == "admin@gmail.com")
            {
                header("Location:/adminportal");
            }
            else
            {
                header("Location:/clientportal");
            }

            
        }
    }
}
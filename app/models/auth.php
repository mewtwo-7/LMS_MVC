<?php

namespace Model;

session_start();
class Auth
{

    public static function createUser($Name, $Email, $Password)
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("INSERT INTO user (name,email,password) VALUES (?,?,?)");
        $stmt->execute([$Name,$Email,$Password]);
    }


    public static function verifyLogin($Email, $Password)
    {
        $db = \DB::get_instance();

        $Sth = $db->prepare("SELECT * FROM user WHERE email= ?");
        $Sth->execute([$Email]);

        $Result = $Sth->fetch();
        return $Result;
    }
}
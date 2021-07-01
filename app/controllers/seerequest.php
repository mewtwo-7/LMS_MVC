<?php

namespace Controller;

session_start();
class SeeRequest
{
    public function get()
    {
        $request = \Model\Books::seerequest();

        echo \View\Loader::make()->render("templates/seerequest.twig",array("request"=>$request));
    }
    public function post()
    {
        $request = \Model\Books::seerequest();
        $bookname = $_POST["bookname"];
        $req = $_POST["request"];
        \Model\Books::approve($bookname,$req);
        echo \View\Loader::make()->render("templates/seerequest.twig",array("request"=>$request));
    }
}

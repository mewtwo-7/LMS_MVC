<?php

namespace Controller;

session_start();
class ReturnBook
{
    public function get()
    {
        $books = \Model\Books::seebooks($_SESSION["name"]);
        echo \View\Loader::make()->render("templates/returnbook.twig",array("books"=>$books));
    }
    public function post()
    {
        $books = \Model\Books::seebooks($_SESSION["name"]);
        $bookname = $_POST["bookname"];
        \Model\Books::returnbook($bookname);
        echo \View\Loader::make()->render("templates/returnbook.twig",array("books"=>$books));
    }

}

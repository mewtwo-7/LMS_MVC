<?php

namespace Controller;

session_start();
class RequestBook
{
    public function get()
    {
        $books = \Model\Books::findAvailable();
        

        echo \View\Loader::make()->render("templates/requestbook.twig",array("books"=>$books));
    }
    public function post()
    {
        $bookname = $_POST["bookname"];
        $name = $_SESSION["name"];
        $books = \Model\Books::findAvailable();
        $owner = \Model\Books::isavail($bookname);
        if($owner=="Admin")
        {
            \Model\Books::requestBook($name,$bookname);
        echo \View\Loader::make()->render("templates/requestbook.twig",array("message" => true,"books"=>$books));
        }
        else
        {
            echo \View\Loader::make()->render("templates/requestbook.twig",array("message1" => "No such Book is available right now","books"=>$books));
        }
        
    } 
}
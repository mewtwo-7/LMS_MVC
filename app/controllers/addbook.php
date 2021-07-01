<?php

namespace Controller;

class AddBook
{
    public function get()
    {
        $books = \Model\Books::seebook();
        echo \View\Loader::make()->render("templates/addbook.twig",array("books"=>$books));
    }

    public function post()
    {
        $name = $_POST["bookname"];
        $author = $_POST["author"];
        $publisher = $_POST["publisher"];
        $isbn = $_POST["ISBN"];
        $genre = $_POST["Genre"];
        
        \Model\Books::addBook($name,$author,$publisher,$isbn,$genre);
        $books = \Model\Books::seebook();
        echo \View\Loader::make()->render("templates/addbook.twig",array("books"=>$books,"message"=>"Book added successfully"));

    }
}
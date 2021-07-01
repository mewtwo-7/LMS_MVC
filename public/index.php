<?php

require __DIR__."/../vendor/autoload.php";

Toro::serve(array(
    "/" => "\Controller\Home",
    "/login" => "\Controller\Login",
    "/register" => "\Controller\Register",
    "/requestbook" => "\Controller\RequestBook",
    "/returnbook" => "\Controller\ReturnBook",
    "/seerequest" => "\Controller\SeeRequest",
    "/clientportal" => "\Controller\ClientPortal",
    "/adminportal" => "\Controller\AdminPortal",
    "/addbook" => "\Controller\AddBook",
    "/logout" => "\Controller\Logout",
));
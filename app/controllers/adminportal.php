<?php

namespace Controller;

class AdminPortal
{
    public function get()
    {
        echo \View\Loader::make()->render("templates/adminportal.twig");
    }
}
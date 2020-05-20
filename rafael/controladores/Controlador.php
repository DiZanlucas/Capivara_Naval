<?php

abstract class Controller
{
    
    public function view(string $view, $data = [])
    {
      require 'visao/' . $view . '.php';
    }
}

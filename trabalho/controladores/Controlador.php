<?php

/**
* Esta classe é responsável por chamar a view correta
* passando os dados que serão usados.
*/
abstract class Controller
{
    /**
    * Este método é chama uma determinada view (página).
    *
    * @param  string  $view   A view que será chamada (ou requerida)
    * @param  array   $data   São os dados que serão exibido na view
    */
    public function view(string $view, $data = [])
    {
      require 'visao/' . $view . '.php';
    }
}

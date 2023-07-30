<?php

class Controller
{
    function __construct()
    {
    }

    /**
     * Metodo para llamar el modelo en Models
     */
    public function model($model = "")
    {
        require_once("../app/Models/" . $model . ".php");
        return new $model();
    }

    /**
     * Metodo para llamar la vista en la clase (View)
     */
    public function view($view = "", $data = [])
    {
        if (file_exists("../app/Views/" . $view . ".php")) {
            require_once("../app/Views/" . $view . ".php");
        } else {
            die("La vista " . $view . "no existe");
        }
    }
}

<?php


namespace App\Controllers;

/**
 * Class Controller
 * @package App\Controllers
 */
abstract class Controller
{

    /**
     * @param $model
     */
    public function model($model)
    {
        getModel($model);
      // require_once "../models/$model.php";
    }

    /**
     * @param $view
     * @param array $data
     */
    public function view($view, $data = [])
    {
        getView($view, $data);
        //require_once "../../views/pages/$view.php";
        //return view("pages/$view.php", $data);
    }

    /**
     * @param $controller
     */
    public function controller($controller)
    {
        getController($controller);
    }
}
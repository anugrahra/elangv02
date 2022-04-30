<?php
// class utama yang ngatur semua controller di folder controllers
class Controller
{
  public $title = 'ELANG V 2.0';

  public function view($view, $data = [])
  {
    require_once 'app/views/' . $view . '.php';
  }

  public function model($model)
  {
    require_once 'app/models/' . $model . '.php';
    // instansiasi class model
    return new $model;
  }
}

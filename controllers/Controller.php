<?php
class Controller{

    public  $model;
    public $view;
    protected $pageData = array();


    public  function __construct()
    {
        $this->view = new View();
        $this->model = new Model();
    }

    // sanitaizing
    protected function massiv($one){
        $one = trim($one);
        $one_chars = htmlspecialchars($one);
        $one_slashes = addslashes($one_chars);
        return $one_slashes;
    }




}
<?php
class IndexController extends Controller{

    //login form template
    private $pageTpl = '/views/main.tpl.php';

    public function __construct()
    {
        $this->model = new IndexModel();
        $this->view = new View();
    }
    // Page login form
    public function index(){
        $this->pageData['title'] = "Вход в админ панель";

        if(!empty($_POST)) {
            if(!$this->login()) {
                $this->pageData['error'] = "Неправильный логин или пароль";
            }
        }
        $this->view->render("/views/header.php", $this->pageData);
        $this->view->render($this->pageTpl, $this->pageData);
        $this->view->render("/views/footer.php");

    }

   //page to admin cabinet
    public function login(){
        $login  = $_POST['login'];
        $password  = $_POST['password'];
        $checkUser = $this->model->checkUser($login,$password);
        if(!$checkUser) {
            return false;
        }
        else{
            header("Location: cabinet");
        }
    }
}
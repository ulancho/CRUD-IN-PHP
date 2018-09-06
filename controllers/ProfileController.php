<?php

class ProfileController extends Controller
{
    //Page pfofile
    private $pageTpl = "/views/profile.tpl.php";

    public function __construct()
    {
        $this->model = new ProfileModel();
        $this->view = new View();
        if (!$_SESSION['user']) {
            header("Location: /");
        }
    }

    public function index()
    {
        $this->pageData['title'] = "Мой профиль";
        $this->view->render("/views/header.php", $this->pageData);
        $this->view->render("/views/navbar.php", $this->pageData);
        $this->view->render($this->pageTpl);
        $this->view->render("/views/footer.php");
    }

   // update
    public function updateProfile(){

        if (empty($_POST)) {
            $json = array(
                'error' => 'Произошла ошибка,попробуйте заново'
            );
        }
            else{
                $id = $this->massiv($_POST['id']);
                $login = $this->massiv($_POST['login']);
                $name = $this->massiv($_POST['name']);
                $surname = $this->massiv($_POST['surname']);
                $gender =  $this->massiv($_POST['gender']);
                $date = $this->massiv($_POST['birthday']);

               if ($this->model->updateProfile($id,$login,$name,$surname,$gender,$date)){
                   $json = array(
                       'ok' => 'все ок'
                   );
               }
            }

        echo json_encode($json);
        }



}
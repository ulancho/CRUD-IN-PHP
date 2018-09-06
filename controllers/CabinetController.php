<?php

class CabinetController extends Controller
{
    // Main page of admin
    private $pageTpl = "/views/cabinet.tpl.php";

   // start for users - pagination
    private $userPerPage = 3;

    public function __construct()
    {
        $this->model = new CabinetModel();
        $this->view = new View();
        $this->utils = new Utils();
        if (!$_SESSION['user']) {
            header("Location: /");
        }
    }

    public function index()
    {
        error_reporting(0);
        $this->pageData['title'] = "Кабинет Администратора";
//        $this->pageData['usersList'] = $this->model->getUsers();

        $allUsers = count($this->model->getUsers());
        $totalPages = ceil($allUsers / $this->userPerPage);

        $this->makeUserPager($allUsers, $totalPages);
        $pagination = $this->utils->drawPager($allUsers, $this->userPerPage);

        $this->pageData['pagination'] = $pagination;

        if ($_SESSION['error_txt'] and $_SESSION['error_txt'] !== "login") {
            $this->pageData['txt'] = "Произошла ошибка";
        } elseif ($_SESSION['ok']) {
            $this->pageData['txt'] = "Данное действия успешно завершено";
        } elseif ($_SESSION['error_txt'] and $_SESSION['error_txt'] == "login") {
            $this->pageData['txt'] = "Логин занят.Попробуйте заново";
        } else {
            $this->pageData['txt'] = "";
        }
        unset($_SESSION['error_txt']);
        unset($_SESSION['ok']);

        $this->view->render("/views/header.php", $this->pageData);
        $this->view->render("/views/navbar.php", $this->pageData);
        $this->view->render($this->pageTpl, $this->pageData);
        $this->view->render("/views/footer.php");
    }

    // update users
    public function updateUsers()
    {
        if (!empty($_POST) && !empty($_POST['id']) && !empty($_POST['login']) && !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['birthday'])) {
            $id = $this->massiv($_POST['id']);
            $login = $this->massiv($_POST['login']);
            $name = $this->massiv($_POST['name']);
            $surname = $this->massiv($_POST['surname']);
            $gender = $this->massiv($_POST['gender']);
            $date = $this->massiv($_POST['birthday']);

            if ($this->model->updateUsers($id, $login, $name, $surname, $gender, $date)) {
                $json = array(
                    'ok' => 'все ок'
                );
            } else {
                $json = array(
                    'error' => 'Произошла ошибка'
                );
            }

        } else {
            $json = array(
                'error' => 'Произошла ошибка,попробуйте заново'
            );
        }

        echo json_encode($json);
    }

    //delete user by id
    public function deleteUserid()
    {
        if (empty($_POST) && empty($_POST['idUser'])) {
            $_SESSION['error_txt'] = "error";
        } else {
            $id = $this->massiv($_POST['idUser']);
            if ($this->model->deleteUserByid($id)) {
                $_SESSION['ok'] = "ok";
            } else {
                $_SESSION['error_txt'] = "error";
            }
        }
        header("Location: /cabinet");
    }

    //add new user
    public function addUser()
    {
        if (!empty($_POST) && !empty($_POST['login']) && !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['birthday']) && !empty($_POST['gen'])) {
            $login = $this->massiv($_POST['login']);
            $name = $this->massiv($_POST['name']);
            $surname = $this->massiv($_POST['surname']);
            $gender = $this->massiv($_POST['gen']);
            $date = $this->massiv($_POST['birthday']);
            $role = $this->massiv($_POST['role']);
            $pswd = $this->massiv($_POST['paswwd']);
            $pswd = sha1($pswd);

            if ($this->model->checkLogin($login)) {
                if ($this->model->addUser($login, $pswd, $name, $surname, $gender, $date, $role)) {
                    $_SESSION['ok'] = "ok";
                } else {
                    $_SESSION['error_txt'] = "error";
                }
            } else {
                $_SESSION['error_txt'] = "login";
            }
        } else {
            $_SESSION['error_txt'] = "error";
        }

        header("Location: /cabinet");

    }

    // for pagination - make page
    public function makeUserPager($allUsers, $totalPages)
    {
        if (!isset($_GET['page']) || intval($_GET['page']) == 0 || intval($_GET['page']) == 1 || intval($_GET['page']) < 0) {
            $pageNumber = 1;
            $leftLimit = 0;
            $rightLimit = $this->userPerPage;
        } elseif (intval($_GET['page']) > $totalPages || intval($_GET['page']) == $totalPages) {
            $pageNumber = $totalPages;
            $leftLimit = $this->userPerPage * ($pageNumber - 1);
            $rightLimit = $allUsers;
        } else {
            $pageNumber = intval($_GET['page']);
            $leftLimit = $this->userPerPage * ($pageNumber - 1);
            $rightLimit = $this->userPerPage;
        }
        $this->pageData['usersList'] = $this->model->getlimitUsers($leftLimit, $rightLimit);


    }

    // To exit and destroy all session
    public function logout()
    {
        session_destroy();
        header("Location: /");
    }

}
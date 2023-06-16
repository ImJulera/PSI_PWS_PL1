<?php
require_once 'BaseController.php';
require_once './models/Auth.php';

class AuthController extends BaseController
{
    public function index(){
        $this->renderView('login', 'index', [], 'login');
    }

    public function login(){
        if(isset($_POST['username'], $_POST['password'])){
            $auth = new Auth();

            if($auth->checkLogin($_POST['username'], $_POST['password'])){
                $this->redirectToRoute('backoffice', 'index');
            }else{
                $this->redirectToRoute('login', 'index');
            }
        }
    }

    public function logout(){
        $auth = new Auth();
        $auth->logout();
        $this->redirectToRoute('site', 'index');
    }
}
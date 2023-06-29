<?php
require_once './models/User.php';

class UserController extends BaseAuthController
{

    public function index($tipo){
        $this->loginFilterByRole(['admin', 'funcionario']);

        $users = User::find_all_by_role($tipo);

        if($_SESSION['role'] == $tipo){
            $this->redirectToRoute('backoffice', 'index');
        } else{
            $this->renderView('user', 'index', ['users' => $users, 'tipo' => $tipo]);
        }
    }

    public function create($tipo){
        $this->loginFilterByRole(['admin', 'funcionario']);

        $this->renderView('user', 'create', ['tipo' => $tipo]);
    }

    public function store(){

        if($this->getHTTPPostParam('username') != 'null'){
            $user = new User($this->getHTTPPost());

            if($user->is_valid()){
                $user->password = md5($this->getHTTPPostParam('password'));
                $user->save();
                $this->redirectToRoute('user', 'index', ['tipo' => $user->role]);
            } else {
                $this->renderView('user', 'create', ['user' => $user, 'tipo' => $user->role]);
            }
        } else{
            $this->renderView('user', 'create', ['tipo' => $user->role]);
        }
    }

    public function edit($id){
        $this->loginFilterByRole(['admin', 'funcionario', 'cliente']);

        $user = User::find($id);

        $this->renderView('user', 'edit', ['user' => $user]);
    }

    public function update($id){
        $this->loginFilterByRole(['admin', 'funcionario']);

        if($this->getHTTPPost('username') != '' || $_SESSION['id'] == $id){
            $user = User::find($id);
            if($this->getHTTPPostParam('password') != ""){
                $_POST['password'] = md5($this->getHTTPPostParam('password'));
            }

            $user->update_attributes($this->getHTTPPost());

            if($user->is_valid()){
                $user->save();
                $this->redirectToRoute('user', 'index', ['tipo' => $user->role]);
            } else {
                $this->renderView('user', 'edit', ['user' => $user]);
            }
        } else {
            $user = User::find($id);
            $this->renderView('user', 'edit', ['user' => $user]);
        }
    }
}
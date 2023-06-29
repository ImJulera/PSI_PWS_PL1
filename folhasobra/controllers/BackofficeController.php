<?php
require_once './controllers/BaseAuthController.php';

class BackofficeController extends BaseAuthController
{
    public function index(){
        $users = User::count();
        $folhas = Folha::count();

        $this->renderView('backoffice', 'index', ['users' => $users, 'folhas' => $folhas]);
    }
}
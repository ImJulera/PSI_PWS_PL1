<?php
require_once './controllers/BaseAuthController.php';
require_once './models/Folha.php';
require_once './models/Empresa.php';

class FolhaController extends BaseAuthController
{
    public function index(){
        if($_SESSION['role'] == 'cliente'){
            $folhas = Folha::find_all_by_client_id($_SESSION['id']);
        } else{
            $folhas = Folha::all();
        }

        $this->renderView('folha', 'index', ['folhas' => $folhas]);
    }

    public function create(){
        $empresa = Empresa::find(1);
        $this->renderView('folha', 'create', ['empresa' => $empresa]);
    }
}
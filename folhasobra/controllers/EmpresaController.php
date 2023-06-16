<?php
require_once './controllers/BaseAuthController.php';
require_once './models/Empresa.php';

class EmpresaController extends BaseAuthController
{
    public function index(){
        $empresa = Empresa::all();
        $this->renderView('empresa', 'index', ['empresas' => $empresa]);
    }
}
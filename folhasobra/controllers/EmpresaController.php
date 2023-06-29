<?php
require_once './controllers/BaseAuthController.php';
require_once './models/Empresa.php';

class EmpresaController extends BaseAuthController
{
    public function __construct() {
        $this->loginFilterByRole(['admin', 'funcionario']);
    }

    public function index(){
        $empresa = Empresa::all();
        $this->renderView('empresa', 'index', ['empresas' => $empresa]);
    }

    public function edit($idEmpresa){
        $this->loginFilterByRole(['admin']);
        $empresa = Empresa::find($idEmpresa);

        $this->renderView('empresa', 'edit', ['empresa' => $empresa]);
    }

    public function update($idEmpresa){
        $empresa = Empresa::find($idEmpresa);

        $empresa->update_attributes($this->getHTTPPost());
        if($empresa->is_valid()){
            $empresa->save();
            $this->redirectToRoute('empresa', 'index');
        } else {
            $this->renderView('empresa', 'edit', ['empresa' => $empresa]);
        }
    }
}
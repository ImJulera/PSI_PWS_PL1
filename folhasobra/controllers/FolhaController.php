<?php
require_once './controllers/BaseAuthController.php';
require_once './models/Folha.php';
require_once './models/Empresa.php';

class FolhaController extends BaseAuthController
{
    public function index(){
        if($_SESSION['role'] == 'cliente'){
            $folhas = Folha::find_all_by_client_id($_SESSION['id']);
        } elseif ($_SESSION['role'] == 'funcionario'){
            $folhas = Folha::find_all_by_user_id($_SESSION['id']);
        } else{
            $folhas = Folha::all();
        }

        $this->renderView('folha', 'index', ['folhas' => $folhas]);
    }

    public function create(){
        $this->loginFilterByRole(['admin', 'funcionario']);

        $empresa = Empresa::find(1);
        $this->renderView('folha', 'create', ['empresa' => $empresa]);
    }

    public function selectClient(){
        $users = User::find_all_by_role('cliente');
        $this->renderView('folha', 'selectClient', ['users' => $users]);
    }

    public function store($idClient){
        if(!is_null($idClient)){
            $attributes = array('client_id' => $idClient, 'user_id' => $_SESSION['id']);
            $folha = new Folha($attributes);

            if($folha->is_valid()){
                $folha->save();
                $this->redirectToRoute('linhaObra', 'create', ['idFolha' => $folha->id]);
            } else {
                $this->renderView('folha', 'create');
            }
        } else {
            $this->renderView('folha', 'create');
        }
    }

    public function update($idFolha){
        $folha = Folha::find($idFolha);
        $attributesFolha = array('estado' => 'emitida');
        $folha->update_attributes($attributesFolha);
        if($folha->is_valid()){
            $folha->save();
            $this->redirectToRoute('folha', 'show', ['idFolha' => $folha->id]);
        } else{
            $this->redirectToRoute('linhaObra', 'create', ['idFolha' => $folha->id]);
        }
    }

    public function show($idFolha){
        $folha = Folha::find($idFolha);
        $linhasObra = LinhaObra::find_all_by_folha_id($idFolha);
        $empresa = Empresa::find(1);
        $this->renderView('folha', 'show', ['empresa' => $empresa, 'folha' => $folha, 'linhasObra' => $linhasObra]);
    }

    public function print($idFolha){
        $folha = Folha::find($idFolha);
        $linhasObra = LinhaObra::find_all_by_folha_id($idFolha);
        $empresa = Empresa::find(1);
        $this->renderView('folha', 'print', ['empresa' => $empresa, 'folha' => $folha, 'linhasObra' => $linhasObra]);
    }

    public function pay($idFolha){
        $folha = Folha::find($idFolha);
        $linhasObra = LinhaObra::find_all_by_folha_id($idFolha);
        $empresa = Empresa::find(1);


        $attributesFolha = array('estado' => 'paga');
        $folha->update_attributes($attributesFolha);
        if($folha->is_valid()){
            $folha->save();
            $this->renderView('folha', 'show', ['empresa' => $empresa, 'folha' => $folha, 'linhasObra' => $linhasObra]);
        }
    }
}
<?php
require_once './controllers/BaseAuthController.php';

class BackofficeController extends BaseAuthController
{
    public function index(){
        $users = User::count();
        $servicos = Servico::count();
        if($_SESSION['role'] != 'cliente'){
            $folhas = Folha::count();
        } else {
            $folhasClientes = Folha::all();
            $totalFolhasCliente = 0;
            foreach ($folhasClientes as $folhasCliente){
                if($folhasCliente->client_id == $_SESSION['id']){
                    $totalFolhasCliente += 1;
                }
            }
            $folhas = $totalFolhasCliente;
        }

        $clientes = User::all();
        $totalClientes = 0;
        foreach ($clientes as $cliente){
            if($cliente->role == 'cliente'){
                $totalClientes += 1;
            }
        }

        $this->renderView('backoffice', 'index', ['users' => $users, 'folhas' => $folhas, 'clientes' => $totalClientes, 'servicos' => $servicos]);
    }
}
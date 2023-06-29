<?php
require_once './controllers/BaseAuthController.php';
require_once './models/Iva.php';

class IvaController extends BaseAuthController
{
    public function __construct() {
        $this->loginFilterByRole(['admin', 'funcionario']);
    }

    public function index(){
        $ivas = Iva::all();
        $this->renderView('Iva', 'index', ['ivas' => $ivas]);
    }

    public function create(){
        $this->renderView('Iva', 'create');
    }

    public function store(){
        if($_POST['percentagem'] != null){
            $iva = new Iva($this->getHTTPPost());

            if($iva->is_valid()){
                $iva->save();
                $this->redirectToRoute('iva', 'index');
            } else {
                //mostrar vista create passando o modelo como parâmetro
                $this->renderView('iva/create', ['iva' => $iva]);
            }
        }
    }

    public function edit($id){
        $iva = Iva::find($id);

        if(is_null($iva)){

        }else{
            $this->renderView('iva', 'edit', ['iva' => $iva]);
        }
    }

    public function update($id){
        if($_POST['percentagem'] != null){
            $iva = Iva::find($id);

            $iva->update_attributes($this->getHTTPPost());

            if($iva->is_valid()){
                $iva->save();
                $this->redirectToRoute('iva', 'index');
            } else {
                $this->renderView('iva', 'edit', ['iva' =>$iva]);
            }
        }else{
            $iva = Iva::find([$id]);
            $this->renderView('iva', 'edit', ['iva' =>$iva]);
        }
    }
}
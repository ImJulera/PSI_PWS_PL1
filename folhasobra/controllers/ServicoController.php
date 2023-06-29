<?php
require_once './controllers/BaseAuthController.php';
require_once './models/Servico.php';
require_once './models/Iva.php';

class ServicoController extends BaseAuthController
{
    public function __construct() {
        $this->loginFilterByRole(['admin', 'funcionario']);
    }

    public function index(){
        $servicos = Servico::all();
        $this->renderView('servico', 'index', ['servicos' => $servicos]);
    }

    public function create(){
        $ivas = Iva::find_all_by_em_vigor('ativado');
        $this->renderView('servico', 'create', ['ivas' => $ivas]);
    }

    public function store(){
        $ivas = Iva::find_all_by_em_vigor('ativado');

        if($this->getHTTPPostParam('referencia') != " "){
            $servico = new Servico($this->getHTTPPost());
            if($servico->is_valid()){
                $servico->save();
                $this->redirectToRoute('servico', 'index');
            } else{
                $this->renderView('servico', 'create', ['servico' => $servico, 'ivas' => $ivas]);
            }
        } else{
            $this->renderView('servico', 'create', ['ivas' => $ivas]);
        }
    }

    public function edit($id){
        $servico = Servico::find($id);
        $ivas = Iva::find_all_by_em_vigor('ativado');

        $this->renderView('servico', 'edit', ['servico' => $servico, 'ivas' => $ivas]);
    }

    public function update($id){
        $ivas = Iva::all();

        if($this->getHTTPPostParam('referencia') != " "){
            $servico = Servico::find($id);
            $servico->update_attributes($this->getHTTPPost());
            if($servico->is_valid()){
                $servico->save();
                $this->redirectToRoute('servico', 'index');
            }else {
                $this->renderView('servico', 'edit', ['ivas' => $ivas, 'servico' => $servico]);
            }
        } else{
            $this->renderView('servico', 'edit', ['ivas' => $ivas]);
        }
    }

    public function delete($id){
        $servico = Servico::find($id);

        $servico->delete();
        $this->redirectToRoute('servico', 'index');
    }
}
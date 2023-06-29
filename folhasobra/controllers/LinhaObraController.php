<?php
require_once './controllers/BaseAuthController.php';

class LinhaObraController extends BaseAuthController
{
    public function __construct() {
        $this->loginFilterByRole(['admin', 'funcionario']);
    }

    public function create($idFolha, $idServico = null){
        $empresa = Empresa::find(1);
        $folha = Folha::find($idFolha);
        $linhasobra = LinhaObra::find_all_by_folha_id($idFolha);
        $servico = Servico::find_by_id($idServico);
        $this->renderView('linhaObra', 'create', ['empresa' => $empresa, 'folha' => $folha, 'linhasObra' => $linhasobra, 'servico' => $servico]);
    }

    public function selectServico($idFolha){
        $folha = Folha::find($idFolha);
        $procurarServico = $this->getHTTPPostParam('procurarServico');
        $addServico = $this->getHTTPPostParam('addServico');


        //Adicionar serviço por referência
        if($addServico != ''){
            $servicos = Servico::find_by_sql('SELECT * FROM servicos WHERE id in (SELECT servico_id FROM linha_obras WHERE folha_id = '.$idFolha.') and referencia LIKE "%' . $addServico . '%"');
            if(empty($servicos)){
                $servicos = Servico::find_by_referencia($addServico);
                $this->redirectToRoute('linhaObra', 'create', ['idFolha' => $folha->id, 'idServico' => $servicos->id]);
            } else{
                $this->redirectToRoute('linhaObra', 'create', ['idFolha' => $folha->id]);
            }
        }

        //Adicionar pela página dos serviços
        if($procurarServico != ''){
            $servicos = Servico::find_by_sql('SELECT * FROM servicos WHERE id NOT in (SELECT servico_id FROM linha_obras WHERE folha_id = '.$idFolha.') and descricao LIKE "%'.$procurarServico.'%"or referencia LIKE "%'.$procurarServico.'%"');
        } else{
            $servicos = Servico::find_by_sql('SELECT * FROM servicos WHERE id NOT in (SELECT servico_id FROM linha_obras WHERE folha_id = '.$idFolha.')');
        }

        $this->renderView('linhaObra', 'selectServico', ['servicos' => $servicos, 'folha' => $folha]);
    }

    public function store($idFolha, $idServico){
        $_POST['folha_id'] = $idFolha;
        $_POST['servico_id'] = $idServico;

        if($this->getHTTPPostParam('quantidade') != " "){
                $folha = Folha::find($idFolha);

                $linhaObra = new LinhaObra($this->getHTTPPost());

                if($linhaObra->is_valid()){
                    $linhaObra->save();
                    $valor_total = $folha->valor_total + ($linhaObra->quantidade * $linhaObra->valor_unitario);
                    $iva_total = $folha->iva_total + ($linhaObra->quantidade * $linhaObra->valor_iva);
                    $attributesFolha = array('valor_total' => $valor_total, 'iva_total' => $iva_total);
                    $folha->update_attributes($attributesFolha);
                    $folha->save();

                    $this->redirectToRoute('linhaObra', 'create', ['idFolha' => $linhaObra->folha_id]);
                }
        }
    }

    public function edit($idLinhaObra){
        $linhaObraEdit = LinhaObra::find($idLinhaObra);
        $folha = Folha::find($linhaObraEdit->folha_id);
        $empresa = Empresa::find(1);

        $linhasobra = LinhaObra::find_all_by_folha_id($linhaObraEdit->folha_id);
        $this->renderView('linhaObra', 'edit', ['empresa' => $empresa, 'folha' => $folha, 'linhasObra' => $linhasobra, 'linhaObraEdit' => $linhaObraEdit]);
    }

    public function update($idLinhaObra){
        $linhaObraEdit = LinhaObra::find($idLinhaObra);
        $folha = Folha::find($linhaObraEdit->folha_id);
        $empresa = Empresa::find(1);
        $linhasobra = LinhaObra::find_all_by_id($linhaObraEdit->id);

        if($this->getHTTPPostParam('quantidade') != " "){
            //Retirar o valor unitário da linha de obra.
            $valor_total = $folha->valor_total - ($linhaObraEdit->quantidade * $linhaObraEdit->valor_unitario);
            //Retirar o iva total da linha de obra.
            $iva_total = $folha->iva_total - ($linhaObraEdit->quantidade * $linhaObraEdit->valor_iva);
            $attributesFolha = array('valor_total' => $valor_total, 'iva_total' => $iva_total);

            //Atualizar valores da linha obra.
            $linhaObraEdit->update_attributes($this->getHTTPPost());
            if($linhaObraEdit->is_valid()){
                $linhaObraEdit->save();

                //Adicionar o novo valor_total à folha de obra.
                $valor_total = $attributesFolha['valor_total'] + ($linhaObraEdit->quantidade * $linhaObraEdit->valor_unitario);

                //Adicionar o novo iva_total à folha de obra.
                $iva_total = $attributesFolha['iva_total'] + ($linhaObraEdit->quantidade * $linhaObraEdit->valor_iva);

                //Atualizar o array $attributesFolha com os novos valores (valor_total & iva_total).
                $attributesFolha = array('valor_total' => $valor_total, 'iva_total' => $iva_total);

                //Update com os novos valores (valor_total & iva_total) à folha de obra
                $folha->update_attributes($attributesFolha);
                $folha->save();
                $this->redirectToRoute('linhaObra', 'create', ['idFolha' => $linhaObraEdit->folha_id]);
            } else {
                $this->renderView('linhaObra', 'edit', ['empresa' => $empresa, 'folha' => $folha, 'linhasObra' => $linhasobra, 'linhaObraEdit' => $linhaObraEdit]);
            }
        } else{
            $this->renderView('linhaObra', 'edit', ['empresa' => $empresa, 'folha' => $folha, 'linhasObra' => $linhasobra, 'linhaObraEdit' => $linhaObraEdit]);
        }
    }

    public function delete($idLinhaObra){
        $linhaObraDelete = LinhaObra::find($idLinhaObra);
        $folha = Folha::find($linhaObraDelete->folha_id);

        //Alterações na folha de obra (Valor_total & Iva_total visto que estão a ser eliminados linhas de obra).
        $valor_total = $folha->valor_total - ($linhaObraDelete->quantidade * $linhaObraDelete->valor_unitario);
        $iva_total = $folha->iva_total - ($linhaObraDelete->quantidade * $linhaObraDelete->valor_iva);
        $attributesFolha = array('valor_total' => $valor_total, 'iva_total' => $iva_total);
        $folha->update_attributes($attributesFolha);
        $folha->save();

        //Delete da linha de obra
        $linhaObraDelete->delete();
        $this->redirectToRoute('linhaObra', 'create', ['idFolha' => $folha->id]);
    }
}
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Folhas Obra</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">BackOffice</a></li>
                        <li class="breadcrumb-item active">Folhas Obra</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- Main content -->
                    <div class="invoice p-2 mb-2">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h3>
                                    <img src="./public/img/folhaobra_logo_horizontal.png"> <br>Folha Obra, Inc.
                                </h3>
                                <h5>Date: <?= date_format($folha->data,'Y/m/d') ?></h5>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Empresa:
                                <address>
                                    <strong><?= $empresa->designacao_social ?></strong><br>
                                    <?= $empresa->morada ?><br>
                                    <?= $empresa->codigo_postal ?>, <?= $empresa->localidade ?><br>
                                    Telefone: <?= $empresa->telefone ?><br>
                                    Email: <?= $empresa->email ?><br>
                                    Nif: <?= $empresa->nif ?>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                Cliente:
                                <address>
                                    <strong><?= $folha->cliente->username ?></strong><br>
                                    <?= $folha->cliente->morada ?><br>
                                    <?= $folha->cliente->codigo_postal ?>, <?= $folha->cliente->localidade ?><br>
                                    Nif: <?= $folha->cliente->nif ?>
                                </address>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Referência</th>
                                        <th>Servico</th>
                                        <th>Quantidade</th>
                                        <th>Valor Unitario</th>
                                        <th>Valor Iva</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(isset($linhasObra)){
                                        foreach ($linhasObra as $linhaObra) { ?>
                                            <tr>
                                                <td><?=$linhaObra->servico->referencia?></td>
                                                <td><?=$linhaObra->servico->descricao?></td>
                                                <td><?=$linhaObra->quantidade?></td>
                                                <td>€ <?=number_format($linhaObra->valor_unitario,2)?></td>
                                                <td>€ <?=number_format($linhaObra->valor_iva,2)?></td>
                                                <td>€ <?=$linhaObra->quantidade * ($linhaObra->valor_iva + $linhaObra->valor_unitario)?></td>
                                            </tr>
                                        <?php }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                                <p class="text-muted well well-sm shadow-none" style="margin-top: 20%;">
                                    Folha processada por <?= $folha->user->username ?>
                                </p>
                            </div>
                            <!-- /.col -->
                            <div class="col-6">

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td>€ <?=number_format($folha->valor_total,2)?></td>
                                        </tr>
                                        <tr>
                                            <th>IVA (...)</th>
                                            <td>€ <?=number_format($folha->iva_total,2)?></td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td>€ <?=number_format(($folha->iva_total + $folha->valor_total),2)?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                            <!-- this row will not appear when printing-->
                            <div class="row no-print">
                                <div class="col-12">
                                    <?php if($_SESSION['role'] == 'cliente' && $folha->estado == 'emitida'){?>
                                        <a href="" class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="fas fa-print"></i> Pagar</a>
                                    <?php } ?>
                                    <?php if($folha->estado == 'paga') {?>
                                    <a href="./?c=folha&a=print&idFolha=<?=$folha->id?>" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                    <?php } ?>
                                </div>
                            </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
            <a href="./?c=folha&a=index" class="btn btn-primary ">Voltar</a>
        </div><!-- /.container-fluid -->
    </section>
<!-- /.content -->
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="card pl-5 pr-5 pt-3 pb-3 m-0">
                    <p class="heading">Dados do Cartão</p>
                    <form class="card-details ">
                        <div class="form-group mb-0">
                            <p class="text-warning mb-0">Número do Cartão</p>
                            <input type="text" name="card-num" placeholder="1234 5678 9012 3457" size="17" id="cno" minlength="19" maxlength="19">
                            <img src="https://img.icons8.com/color/48/000000/visa.png" class="imgPay" width="64px" height="60px" />
                        </div>

                        <div class="form-group">
                            <p class="text-warning mb-0">Nome do Cartão</p> <input type="text" name="name" placeholder="Name" size="17">
                        </div>
                        <div class="form-group pt-2">
                            <div class="row d-flex">
                                <div class="col-sm-4">
                                    <p class="text-warning mb-0">Data</p>
                                    <input type="text" name="exp" placeholder="MM/YYYY" size="7" id="exp" minlength="7" maxlength="7">
                                </div>
                                <div class="col-sm-3">
                                    <p class="text-warning mb-0">CVV</p>
                                    <input type="password" name="cvv" placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3">
                                </div>
                                <div class="col-sm-5 pt-0">
                                    <a href="./?c=folha&a=pay&idFolha=<?=$folha->id?>" class="btn btn-primary btnPay"><i class="fas fa-arrow-right px-3 py-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
<br><br>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');


    .card{
        border: none;
        max-width: 100%;
        margin: 150px 0 150px;
        padding: 35px;
        padding-bottom: 20px!important;
    }
    .heading{
        color: #C1C1C1;
        font-size: 14px;
        font-weight: 500;
    }
    .imgPay{
        transform: translate(160px,-10px);
    }
    .imgPay:hover{
        cursor: pointer;
    }
    .text-warning{
        font-size: 12px;
        font-weight: 500;
        color: #edb537!important;
    }
    #cno{
        transform: translateY(-10px);
    }
    input{
        border-bottom: 1.5px solid #E8E5D2!important;
        font-weight: bold;
        border-radius: 0;
        border: 0;

    }
    .form-group input:focus{
        border: 0;
        outline: 0;
    }
    .col-sm-5{
        padding-left: 90px;
    }
    .btnPay{
        background: #F3A002!important;
        border: none;
        border-radius: 30px;
    }
    .btnPay:focus{
        box-shadow: none;
    }
</style>
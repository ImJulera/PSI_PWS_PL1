<style>
    @media print {
        body {
            -webkit-filter: grayscale(100%);
            -moz-filter: grayscale(100%);
            -ms-filter: grayscale(100%);
            filter: grayscale(100%);
        }
    }
</style>
<br>

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
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Folha Obra</h1>
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
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
</section>
</div>
<!-- /.content -->
<br><br>
<script>
    window.addEventListener("load", window.print());
</script>
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
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title m-0">Folha Obra</h1>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">

                            <div class="row">
                                <div class="col-12">

                                    <!-- Main content -->
                                    <div class="invoice p-2 mb-2">
                                        <!-- title row -->
                                        <div class="row">
                                            <div class="col-12">
                                                <h3>
                                                    <img src="./public/img/logo.png"> <br>Folhas Obra, Inc.
                                                </h3>
                                                <h5>Date: 2/10/2014</h5>
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
                                                        <th>Produto</th>
                                                        <th>Quantidade</th>
                                                        <th>Valor Unitário</th>
                                                        <th>Valor IVA</th>
                                                        <th>Sub Total</th>
                                                        <th>Ações</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php if(isset($linhasObra)) {
                                                        foreach ($linhasObra as $linhaObra){
                                                            if($linhaObra->id == $linhaObraEdit->id){?>
                                                                <tr>
                                                                    <form action="./?c=linhaObra&a=update&idLinhaObra=<?=$linhaObra->id?>" method="post">
                                                                            <td><?=$linhaObra->servico->descricao?></td>
                                                                            <td><input type="number" value="<?=$linhaObra->quantidade?>" id="quantidade" name="quantidade" min="1"></td>
                                                                            <td><?= $linhaObra->valor_unitario?></td>
                                                                            <td><?= $linhaObra->valor_iva ?></td>
                                                                            <td><?= $linhaObra->quantidade * ($linhaObra->valor_iva + $linhaObra->valor_unitario) ?></td>
                                                                            <td>
                                                                                <button type="submit" class="btn-sm text-decoration-none btn-success" ><i class="fas fa-check"></i></button>
                                                                                <a href="?c=linhaObra&a=create&idFolha=<?=$linhaObra->folha_id?>" class="btn-sm text-decoration-none btn-danger" ><i class="fa fa-times"></i></a>
                                                                            </td>
                                                                    </form>
                                                                </tr>
                                                            <?php } else {?>
                                                            <tr>
                                                                <td><?=$linhaObra->servico->descricao?></td>
                                                                <td><?=$linhaObra->quantidade?></td>
                                                                <td><?=$linhaObra->valor_unitario?></td>
                                                                <td><?=$linhaObra->valor_iva?></td>
                                                                <td><?=$linhaObra->quantidade * ($linhaObra->valor_unitario + $linhaObra->valor_iva)?></td>
                                                                <td></td>
                                                            </tr>
                                                        <?php }
                                                        }
                                                    }   ?>
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
                                                    Folha processada por <?=$_SESSION['username'] ?>
                                                </p>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-6">

                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tr>
                                                            <th style="width:50%">Subtotal:</th>
                                                            <td>€<?= $folha->valor_total ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>IVA (...)</th>
                                                            <td>€<?= $folha->iva_total ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Total:</th>
                                                            <td>€<?= $folha->valor_total + $folha->iva_total ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <!-- this row will not appear when printing
                                        <div class="row no-print">
                                            <div class="col-12">
                                                <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                                <a type="button" class="btn btn-danger float-right">
                                                    Anular
                                                </a>
                                                <a type="button" class="btn btn-success float-right" style="margin-right: 5px;">
                                                    Validar
                                                </a>
                                            </div>
                                        </div>-->
                                    </div>
                                    <!-- /.invoice -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Folhas Obra</h1>
                    <a href="./?c=folha&a=create" class="btn btn-primary float-left mt-3">Criar</a>
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
                            <h1 class="card-title m-0">Folhas Obras</h1>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-responsive-md">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Data</th>
                                    <th>Valor Total</th>
                                    <th>Iva Total</th>
                                    <th>Estado</th>
                                    <th>Cliente</th>
                                    <th>Funcionário</th>
                                    <th>Açoes</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($folhas as $folha) { ?>
                                        <tr>
                                            <td><?= $folha->id?></td>
                                            <td><?= $folha->data?></td>
                                            <td><?= $folha->valor_total?></td>
                                            <td><?= $folha->iva_total?></td>
                                            <td><?= $folha->estado?></td>
                                            <td><?= $folha->cliente->username?></td>
                                            <td><?= $folha->user->username?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
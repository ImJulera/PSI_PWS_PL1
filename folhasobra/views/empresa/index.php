<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Empresas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">BackOffice</a></li>
                        <li class="breadcrumb-item active">Empresa</li>
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
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Designação Social</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>NIF</th>
                                <th>Morada</th>
                                <th>Código Postal</th>
                                <th>Localidade</th>
                                <th>Capital Social</th>
                                <?php if($_SESSION['role'] == 'admin'){ ?>
                                <th>Ações</th>
                                <?php } ?>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($empresas as $empresa){ ?>
                                    <tr>
                                        <td><?= $empresa->id ?></td>
                                        <td><?= $empresa->designacao_social ?></td>
                                        <td><?= $empresa->email ?></td>
                                        <td><?= $empresa->telefone ?></td>
                                        <td><?= $empresa->nif ?></td>
                                        <td><?= $empresa->morada ?></td>
                                        <td><?= $empresa->codigo_postal ?></td>
                                        <td><?= $empresa->localidade ?></td>
                                        <td><?= $empresa->capital_social ?></td>
                                        <?php if($_SESSION['role'] == 'admin'){ ?>
                                        <td>
                                            <a href="?c=empresa&a=edit&idEmpresa=<?=$empresa->id?>" class="btn-sm text-decoration-none btn-warning" ><i class="fa fa-pen"></i></a>
                                        </td>
                                        <?php } ?>
                                    </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>
</section>
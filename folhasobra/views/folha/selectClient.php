<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lista de Clientes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">BackOffice</a></li>
                        <li class="breadcrumb-item active">Selecionar Cliente</li>
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
                            <h1 class="card-title m-0">Selecionar Cliente</h1>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-responsive-md">
                                <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Nif</th>
                                    <th>Morada</th>
                                    <th>Cod. Postal</th>
                                    <th>Localidade</th>
                                    <th>Açoes</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($users as $user) { ?>
                                    <tr>
                                        <td><?=$user->username?></td>
                                        <td><?=$user->email?></td>
                                        <td><?=$user->telefone?></td>
                                        <td><?=$user->nif?></td>
                                        <td><?=$user->morada?></td>
                                        <td><?=$user->codigo_postal?></td>
                                        <td><?=$user->localidade?></td>
                                        <td>
                                            <a href="?c=folha&a=store&idClient=<?=$user->id?>" class="btn-sm text-decoration-none btn-success" ><i class="fa fa-plus"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
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
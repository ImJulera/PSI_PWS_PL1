<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Empresa</h1>
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
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Editar</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="./?c=empresa&a=update&idEmpresa=<?= $empresa->id ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Designação Social:</label>
                                    <input type="text" class="form-control" id="designacao_social" name="designacao_social" value="<?= $empresa->designacao_social?>" placeholder="Designação Social">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email:</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?= $empresa->email?>"placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Telefone:</label>
                                    <input type="text" class="form-control" id="telefone" name="telefone" value="<?= $empresa->telefone?>"placeholder="Telefone">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">NIF:</label>
                                    <input type="text" class="form-control" id="nif" name="nif" value="<?= $empresa->nif?>"placeholder="NIF">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Morada:</label>
                                    <input type="text" class="form-control" id="morada" name="morada" value="<?= $empresa->morada?>"placeholder="Morada">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Código Postal:</label>
                                    <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" value="<?= $empresa->codigo_postal?>"placeholder="Código Postal">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Localidade:</label>
                                    <input type="text" class="form-control" id="localidade" name="localidade" value="<?= $empresa->localidade?>"placeholder="Localidade">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Capital Social:</label>
                                    <input type="text" class="form-control" id="capital_social" name="capital_social" value="<?= $empresa->capital_social?>"placeholder="Capital Social">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Editar</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>


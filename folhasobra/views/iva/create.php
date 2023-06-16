<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Iva</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">BackOffice</a></li>
                        <li class="breadcrumb-item active">Iva</li>
                        <li class="breadcrumb-item active">Criar</li>
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
                            <h3 class="card-title">Adicione um Iva</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="./?c=iva&a=store" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Percentagem</label>
                                    <input type="text" class="form-control" id="percentagem" name="percentagem" placeholder="Percentagem">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Descrição</label>
                                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descricao">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputRounded0">Em vigor</label>
                                    <select class="custom-select form-control rounded-1" id="em_vigor" name="em_vigor">
                                        <option value="ativado">Ativo</option>
                                        <option value="desativado">Desativado</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Criar</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Serviços</h1>
                    <a href="./?c=servico&a=create" class="btn btn-primary float-left mt-3">Criar</a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">BackOffice</a></li>
                        <li class="breadcrumb-item active">Serviços</li>
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
                                    <th>Referéncia</th>
                                    <th>Descrição</th>
                                    <th>Preço</th>
                                    <th>Iva</th>
                                    <th>Opções</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($servicos as $servico){ ?>
                                    <tr>
                                        <td><?= $servico->id ?></td>
                                        <td><?= $servico->referencia ?></td>
                                        <td><?= $servico->descricao ?></td>
                                        <td><?= $servico->preco ?></td>
                                        <td><?= $servico->iva->percentagem ?></td>
                                        <td>
                                            <a href="?c=servico&a=edit&id=<?=$servico->id?>" class="btn-sm text-decoration-none btn-warning" ><i class="fa fa-pen"></i></a>
                                            <a href="?c=servico&a=delete&id=<?=$servico->id?>" class="btn-sm text-decoration-none	btn-danger" ><i class="fa fa-trash"></i></a>
                                        </td>
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
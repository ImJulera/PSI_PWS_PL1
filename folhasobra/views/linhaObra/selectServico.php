<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lista de Serviços</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">BackOffice</a></li>
                        <li class="breadcrumb-item active">Selecionar Serviço</li>
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
                            <h1 class="card-title m-0">Selecionar Serviço</h1>
                            <form action="./?c=linhaObra&a=searchServico&idFolha=<?=$folha->id?>" method="post">
                                <button type="submit" class="btn-sm text-decoration-none float-right btn-secondary" ><i class="fa fa-search"></i></button>
                                <input type="text" class="float-right col-3" id="procurarServico" name="procurarServico" placeholder="Nome/referencia do produto">
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-responsive-md">
                                <thead>
                                <tr>
                                    <th>Referencia</th>
                                    <th>Descrição</th>
                                    <th>Preço</th>
                                    <th>Iva</th>
                                    <th>Açoes</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($servicos as $servico) { ?>
                                    <tr>
                                        <td><?=$servico->referencia?></td>
                                        <td><?=$servico->descricao?></td>
                                        <td><?=$servico->preco?></td>
                                        <td><?=$servico->iva->percentagem?></td>
                                        <td>
                                            <a href="?c=linhaObra&a=create&idFolha=<?=$folha->id?>&idServico=<?=$servico->id?>" class="btn-sm text-decoration-none btn-success" ><i class="fa fa-plus"></i></a>
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
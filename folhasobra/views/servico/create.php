<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Serviço</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">BackOffice</a></li>
                        <li class="breadcrumb-item active">Serviço</li>
                        <li class="breadcrumb-item active">Criar</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h1 class="card-title m-0">Crie um serviço</h1>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="./?c=servico&a=store" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="referencia">Referencia</label>
                                <input type="text" class="form-control" id="referencia" name="referencia" value="<?php if(isset($servico)){echo $servico->referencia; }?>"><?php if(isset($servico->errors)){ echo $servico->errors->on('referencia');} ?>
                            </div>
                            <div class="form-group">
                                <label for="descricao">Descrição</label>
                                <input type="text" class="form-control" id="descricao" name="descricao" value="<?php if(isset($servico)){echo $servico->descricao; }?>"><?php if(isset($servico->errors)){ echo $servico->errors->on('descricao');} ?>
                            </div>
                            <div class="form-group">
                                <label for="preco">Preço</label>
                                <input type="number" step="0.01" class="form-control" id="preco" name="preco" value="<?php if(isset($servico)){echo $servico->preco; }?>"><?php if(isset($servico->errors)){ echo $servico->errors->on('preco');} ?>
                            </div>
                            <div class="form-group">
                                <label >Iva</label>
                                <select class="form-group" id="iva_id" name="iva_id">
                                    <?php if(isset($ivas)){
                                        foreach($ivas as $iva){?>
                                            <option value="<?= $iva->id?>"> <?= $iva->percentagem; ?></option>
                                        <?php }
                                    }?>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Criar</button> <a href="./?c=produto&a=index" class="btn btn-primary float-right">Voltar</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
</div>
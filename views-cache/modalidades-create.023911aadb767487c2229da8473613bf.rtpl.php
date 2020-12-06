<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Modalidades
  </h1>
  <ol class="breadcrumb">
    <li><a href="/professor"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/professor/modalidades">Modalidades</a></li>
    <li class="active"><a href="/professor/modalidades/create">Cadastrar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Nova Modalidade</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/professor/modalidades/create" method="post">
          <div class="box-body">

            <div class="form-group">
              <label for="descmodal">Nome da modalidade</label>
              <input type="text" class="form-control" id="descmodal" name="descmodal" placeholder="Digite o nome da modalidade">
            </div>          

            
          </div>                                     
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Cadastrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
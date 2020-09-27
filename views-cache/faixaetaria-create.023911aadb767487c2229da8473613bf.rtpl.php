<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Faixa Etária
  </h1>
  <ol class="breadcrumb">
    <li><a href="/professor"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/professor/faixaetaria">Faixa Etária</a></li>
    <li class="active"><a href="/professor/faixaetaria/create">Cadastrar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Nova Faixa Etária</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/professor/faixaetaria/create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="initidade">Idade inicial</label>
              <input type="text" class="form-control" id="initidade" name="initidade" placeholder="Informe a idade inicial">
            </div>
            <div class="form-group">
              <label for="fimidade">Idade final</label>
              <input type="text" class="form-control" id="fimidade" name="fimidade" placeholder="Informe a idade final">
            </div>
            <div class="form-group">
              <label for="descrfxetaria">Descrição da Faixa Etária</label>
              <input type="text" class="form-control" id="descrfxetaria" name="descrfxetaria" placeholder="Descreva a faixa etária">
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
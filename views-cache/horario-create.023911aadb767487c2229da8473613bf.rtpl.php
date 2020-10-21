<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Horários
  </h1>
  <ol class="breadcrumb">
    <li><a href="/professor"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/professor/horario">Horários de Aula</a></li>
    <!--<li class="active"><a href="/professor/horario/create">Cadastrar</a></li>-->
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Novo horário</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/professor/horario/create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="horainicio">Hora de início</label>
              <input type="time" class="form-control" id="horainicio" name="horainicio" placeholder="Hora de início da aula">
            </div>
            <div class="form-group">
              <label for="horatermino">Hora de término</label>
              <input type="time" class="form-control" id="horatermino" name="horatermino" placeholder="Hora de término da aula">
            </div>
            <div class="form-group">
              <label for="diasemana">Dias da semana</label>
              <input type="text" class="form-control" id="diasemana" name="diasemana" placeholder="Dias da semana em que aula accontece">
            </div>
            <div class="form-group">
              <label for="periodo">Período</label>
              <input type="text" class="form-control" id="periodo" name="periodo" placeholder="Período em que aula accontece">
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
<!-- /.content-wrapper --
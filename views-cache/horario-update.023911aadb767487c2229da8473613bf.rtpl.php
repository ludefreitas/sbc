<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Editar Horário
  </h1>
  <ol class="breadcrumb">
    <li><a href="/professor"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/professor/horario">Horários</a></li>
    <li class="active"><a href="/professor/horario/create">Criar Novo Horário</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <?php if( $error != '' ){ ?>

          <div class="alert alert-danger" style="margin: 10px 10px 0px 10px">
        <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>

          </div>
        <?php } ?>

        
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
        <form role="form" action="/professor/horario/<?php echo htmlspecialchars( $horario["idhorario"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">          

            <div class="col-md-6">
              <div class="form-group">
                <label for="horainicio">Hora de início</label>
                <input type="time" class="form-control" id="horainicio" name="horainicio" placeholder="Hora de início da aula"value="<?php echo htmlspecialchars( $horario["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>
              <div class="form-group">
                <label for="diasemana">Dias da semana</label>
                <input type="text" class="form-control" id="diasemana" name="diasemana" placeholder="Dias da semana em que aula accontece" value="<?php echo htmlspecialchars( $horario["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div> 
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="horatermino">Hora de término</label>
                <input type="time" class="form-control" id="horatermino" name="horatermino" placeholder="Hora de término da aula"value="<?php echo htmlspecialchars( $horario["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>
              <div class="form-group">
                <label for="periodo">Período</label>
                <input type="text" class="form-control" id="periodo" name="periodo" placeholder="Período em que aula accontece" value="<?php echo htmlspecialchars( $horario["periodo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>  

            </div>
            
            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
            &nbsp&nbsp&nbsp&nbsp
            <a type="button" class="btn btn-danger" href="/professor/horario">Cancelar</a>
            </div>
          </form>
          </div>
        </div>
          <!-- /.box-body -->
          
       
      </div>
    </div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
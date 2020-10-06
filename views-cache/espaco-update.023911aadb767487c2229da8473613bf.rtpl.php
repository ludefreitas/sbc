<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Editar Espaço 
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Novo Espaço </h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/professor/espaco/<?php echo htmlspecialchars( $espaco["idespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" enctype="multipart/form-data">

          <div class="box-body">

            <div class="form-group">
              <label for="nomeespaco">Nome do espaço</label>
              <input type="text" class="form-control" id="nomeespaco" name="nomeespaco" placeholder="Nome da espaco" value="<?php echo htmlspecialchars( $espaco["nomeespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> 
            </div>
            <div class="form-group">
              <label for="descespaco">Descrição do espaço</label>
              <input type="text" class="form-control" id="descespaco" name="descespaco" placeholder="Descreva a espaco" value="<?php echo htmlspecialchars( $espaco["descespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="areaespaco">Área do espaço</label>
              <input type="number" class="form-control" id="areaespaco" name="areaespaco" placeholder="Informe a área do espaço" value="<?php echo htmlspecialchars( $espaco["areaespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="observacao">Observação</label>
              <input type="text" class="form-control" id="observacao" name="observacao" placeholder="Quadra coberta... Acessível... Salão com espelho..." value="<?php echo htmlspecialchars( $espaco["observacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>   
            
            
        </div>          
             
            
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
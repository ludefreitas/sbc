<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Editar Espaço 
  </h1>
  <ol class="breadcrumb">
    <li><a href="/professor"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/professor/espaco">Espaços</a></li>
    <li class="active"><a href="/professor/espaco/create">Criar Novo Espaço</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
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
            <div class="form-group">
                <label for="local">Crec</label>
                <select class="form-control" name="idlocal">
                 
                <?php $counter1=-1;  if( isset($local) && ( is_array($local) || $local instanceof Traversable ) && sizeof($local) ) foreach( $local as $key1 => $value1 ){ $counter1++; ?>

                    <option <?php if( $value1["idlocal"] === $espaco["idlocal"] ){ ?>selected="selected"<?php } ?> value="<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["nomelocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                <?php } ?>

                
                </select>
            </div>  
            
  
            
            
        </div>          
             
            
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
            &nbsp&nbsp&nbsp&nbsp
            <a type="button" class="btn btn-danger" href="/professor/espaco">Cancelar</a>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
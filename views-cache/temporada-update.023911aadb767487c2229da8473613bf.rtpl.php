<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Editar Temporada 
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Temporadda </h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/professor/temporada/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" enctype="multipart/form-data">

          <div class="box-body">

            <div class="form-group">
              <label for="desctemporada"> Descrição da temporadda</label>
              <input type="text" class="form-control" id="desctemporada" name="desctemporada" placeholder="Descreva temporada" value="<?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="dtinicinscricao"> Data de Início das Inscrições</label>
              <input type="date" class="form-control" id="dtinicinscricao" name="dtinicinscricao" value="<?php echo htmlspecialchars( $temporada["dtinicinscricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="dtterminscricao"> Data do Fim das Inscrições</label>
              <input type="date" class="form-control" id="dtterminscricao" name="dtterminscricao" value="<?php echo htmlspecialchars( $temporada["dtterminscricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="dtinicmatricula"> Data de Início das Matrículas</label>
              <input type="date" class="form-control" id="dtinicmatricula" name="dtinicmatricula" value="<?php echo htmlspecialchars( $temporada["dtinicmatricula"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="dttermmatricula"> Data do Fim das Matrículas</label>
              <input type="date" class="form-control" id="dttermmatricula" name="dttermmatricula" value="<?php echo htmlspecialchars( $temporada["dttermmatricula"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>            
            <div class="form-group">
              <label for="idstatustemporada"> Status Temporada</label>
              <select class="form-control" name="idstatustemporada">
                <?php $counter1=-1;  if( isset($statustemporada) && ( is_array($statustemporada) || $statustemporada instanceof Traversable ) && sizeof($statustemporada) ) foreach( $statustemporada as $key1 => $value1 ){ $counter1++; ?>

                <option <?php if( $value1["idstatustemporada"] === $temporada["idstatustemporada"] ){ ?>selected="selected"<?php } ?> value="<?php echo htmlspecialchars( $value1["idstatustemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descstatustemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </option>
                <?php } ?>

              </select>
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
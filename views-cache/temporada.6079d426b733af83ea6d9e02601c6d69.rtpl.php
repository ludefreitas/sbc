<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista com <?php echo htmlspecialchars( $total, ENT_COMPAT, 'UTF-8', FALSE ); ?> temporadas
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
            
            <div class="box-header">
              <a href="/admin/temporada/create" class="btn btn-success">Criar nova temporada</a>
            </div>

                <?php if( $error != '' ){ ?>
                <div class="alert alert-danger" style="margin: 0px 10px 0px 10px">
                    <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
                <?php } ?>

            <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">

            <?php $counter1=-1;  if( isset($temporada) && ( is_array($temporada) || $temporada instanceof Traversable ) && sizeof($temporada) ) foreach( $temporada as $key1 => $value1 ){ $counter1++; ?>
            <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
              <div class="row">

              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                    
                    <a href="/admin/turma-temporada/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> -  <?php echo htmlspecialchars( $value1["descstatustemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
                </h5>
              </div>

              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                    <?php echo formatDateHour($value1["dtinicinscricao"]); ?> -  Início das inscrições
                </h5>
              </div>

              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                    <?php echo formatDateHour($value1["dtterminscricao"]); ?> -  Fim das inscrições
                </h5>
              </div>

              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                    <?php echo formatDateHour($value1["dtinicmatricula"]); ?> - Início das matrículas
                </h5>
              </div>

              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                     <?php echo formatDateHour($value1["dttermmatricula"]); ?> - Fim das matrículas
                </h5>
              </div>


              <div class="col-md-1" style="margin: 2; padding: 2">
                 <a href="/admin/temporada/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                      <a href="/admin/temporada/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir temporada <?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
              </div>

            </div>
          </div>
          <?php } ?>

            
            <!-- /.box-body -->
          </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
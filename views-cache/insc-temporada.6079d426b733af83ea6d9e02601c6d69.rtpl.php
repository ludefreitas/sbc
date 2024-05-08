<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista com <?php echo htmlspecialchars( $total, ENT_COMPAT, 'UTF-8', FALSE ); ?> inscrições para a temporada <?php echo htmlspecialchars( $temporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/admin/insc">Inscrições todas temporadas</a></li><br>
     <li class="active"><a href="/admin/listapessoas-insc-temporada/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>">Imprimir/XLS</a></li>
      <li class="active"><a href="/admin/listapessoas-insc-temporada-pcd/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>">Imprimir/XLS(PCD)</a></li>
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
            
            <div class="box-header">
              <!--<a href="/admin/users/create" class="btn btn-success">Cadastrar Usuário</a>-->

              <div class="box-tools">
                <form action="/admin/insc">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="search" class="form-control pull-right" placeholder="Search" value="<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </form>
              </div>

            </div>

            <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
              <div class="row">
              </div>

            <?php $counter1=-1;  if( isset($insc) && ( is_array($insc) || $insc instanceof Traversable ) && sizeof($insc) ) foreach( $insc as $key1 => $value1 ){ $counter1++; ?>
            <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
              <div class="row">

              <div class="col-md-1" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">
                  <?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </h5>
              </div>

              <div class="col-md-1" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">
                  <?php echo formatDateHour($value1["dtinsc"]); ?>
                </h5>
              </div>

              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                    <?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>                    
                </h5>
              </div>

              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                    <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>     <strong><?php if( $value1["pcd"] == 1 ){ ?>(PCD)<?php } ?></strong></h3></th>                                  
                </h5>
              </div>

              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                    <?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </h5>
              </div>

              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                    <?php echo htmlspecialchars( $value1["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </h5>
              </div>

              <div class="col-md-1" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                    <a class="btn btn-primary" href="/admin/profile/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button">Detalhes</a>
                </h5>
              </div>

            </div>
          </div>
          <?php } ?>

        </div>

            
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
                <li><a href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                <?php } ?>
              </ul>
            </div>
            
            <button type="button" onclick="window.print()" class="btn btn-primary pull-right" style="margin-right: 5px;">
                <i class="fa fa-print"></i> Imprimir
            </button>
            
          </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
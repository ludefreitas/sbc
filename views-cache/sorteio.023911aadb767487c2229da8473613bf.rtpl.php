<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de números do sorteio
  </h1>
  <ol class="breadcrumb">
    <li><a href="/professor"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/professor/turma-temporada/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <?php if( $errorSorteio != '' ){ ?>
          <div class="alert alert-danger" role="alert">
              <?php echo htmlspecialchars( $errorSorteio, ENT_COMPAT, 'UTF-8', FALSE ); ?>
          </div>
        <?php } ?>
            <div class="row">
              <div class="col-md-12">         

                <form method="post" action="/professor/sortear">
                <div>
                  <?php if( $maxIncritosTemporada["maximoInscritos"] > 0 ){ ?>
                    <div class="alert alert-info" style="text-align: center;">
                      Qtde de números para o sorteio: <h3 style="color: black;"><?php echo htmlspecialchars( $maxIncritosTemporada["maximoInscritos"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div> 

                    <?php if( $temporada["idstatustemporada"] == 3 ){ ?>
                    <div style="text-align: center;">

                      <input type="hidden" name="desctemporada" value="<?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" >
                      <input type="hidden" name="idtemporada" value="<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                      <input type="hidden" name="maxIncritosTemporada" value="<?php echo htmlspecialchars( $maxIncritosTemporada["maximoInscritos"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                      
                      <input type="submit" name="sortear" value="Realizar Sorteio" class="btn btn-success btn-lg">
                     
                    </div> 
                    <?php }else{ ?>
                    <div style="text-align: center;">

                      <input type="hidden" name="desctemporada" value="<?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" >
                      <input type="hidden" name="idtemporada" value="<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                      <input type="hidden" name="maxIncritosTemporada" value="<?php echo htmlspecialchars( $maxIncritosTemporada["maximoInscritos"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                      
                      <input type="submit" disabled="true" name="sortear" value="Realizar Sorteio" class="btn btn-success btn-lg">
                     
                    </div>     
                    <?php } ?>

                  <?php }else{ ?>
                    <div class="alert alert-danger" style="text-align: center;">
                      <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </div>
                  <?php } ?>                    
                </div>   
                </form>              
              </div>              
            </div>  

            <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
              
            <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
              <div class="row">

              <div class="col-md-3" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                    Ordem do sorteio
                </h5>
              </div>
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                    Número sorteado
                </h5>
              </div>            

            </div>
          </div>

            <?php $counter1=-1;  if( isset($sorteio) && ( is_array($sorteio) || $sorteio instanceof Traversable ) && sizeof($sorteio) ) foreach( $sorteio as $key1 => $value1 ){ $counter1++; ?>
            <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
              <div class="row">

              <div class="col-md-3" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <?php echo htmlspecialchars( $value1["numerodeordem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </h5>
              </div>

              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <?php echo htmlspecialchars( $value1["numerosortear"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </h5>
              </div>

            </div>
          </div>
          <?php } ?> 

            <!-- /.box-body -->
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
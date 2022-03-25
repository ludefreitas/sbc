<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de números do sorteio
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/admin/turma-temporada/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
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

                <form method="post" action="/admin/sortear">
                <div>
                  <?php if( $maxIncritosTemporada["maximoInscritos"] > 0 ){ ?>
                    <div class="alert alert-info" style="text-align: center;">
                      Quantidade de números para o sorteio: <h3 style="color: black;"><?php echo htmlspecialchars( $maxIncritosTemporada["maximoInscritos"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div> 

                    <?php if( $temporada["idstatustemporada"] == 3 && $iduser == 1 ){ ?>
                    <div style="text-align: center;">

                      <input type="hidden" name="desctemporada" value="<?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" >
                      <input type="hidden" name="idtemporada" value="<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                      <input type="hidden" name="maxIncritosTemporada" value="<?php echo htmlspecialchars( $maxIncritosTemporada["maximoInscritos"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                       <?php if( $sorteio == NULL ){ ?>
                       <!--
                    <input type="submit" name="sortear" value="Realizar Sorteio" class="btn btn-success btn-lg">
                  -->
                      <?php }else{ ?>
                      <span style="font-weight: bold; color: darkgreen; font-size: 24px"> Sorteio realizado com sucesso!!</span>
                      <?php } ?>
                    
                      
                          
                    </div> 
                    <?php }else{ ?>
                    <div style="text-align: center;">

                      <input type="hidden" name="desctemporada" value="<?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" >
                      <input type="hidden" name="idtemporada" value="<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                      <input type="hidden" name="maxIncritosTemporada" value="<?php echo htmlspecialchars( $maxIncritosTemporada["maximoInscritos"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                      <?php if( $sorteio == NULL ){ ?>
                    <!--
                      <input type="submit" disabled="true" name="sortear" value="Realizar Sorteio" class="btn btn-success btn-lg">
                    -->
                      <?php }else{ ?>
                      <span style="font-weight: bold; color: darkgreen; font-size: 24px"> Sorteio realizado com sucesso!!</span>
                      <?php } ?>
                     
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

              <div class="box-body" style="border: solid 1px lightblue; margin: 5px; padding: 5px;">          

                <div class="row">
                 <?php $counter1=-1;  if( isset($sorteio) && ( is_array($sorteio) || $sorteio instanceof Traversable ) && sizeof($sorteio) ) foreach( $sorteio as $key1 => $value1 ){ $counter1++; ?>
                 <div class="col-md-1">              
                   
                  <div  style="text-align: left; margin-left: 0px; margin-bottom: 5px; ">
                
                      <h6>                  
                       <span style="font-size: 21px; font-style: italic; font-weight: bold; color: red;"><?php echo htmlspecialchars( $value1["numerodeordem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>° </span>
                      </h6>
                  </div>

                  <div  style="margin: 0px; padding: 0px; border: solid 2px; text-align: center;  background-color: #cccccc;">
                
                    <h2 style="font-weight: bold; padding: 0px; margin: 0px; width: 100%; height: 100%;">                  
                    <?php echo htmlspecialchars( $value1["numerosortear"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </h2>
                 </div>              
                  
                </div>
                <?php } ?> 
              </div>   

            </div>
         

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
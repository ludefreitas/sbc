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
            <div class="box-body no-padding">
              <table class="table table-striped">
                <thead>                 
                  <tr>
                    <th><h5>Ordem</h5> <h5>do Sorteio</h5></th>
                    <th><h5>Número</h5> <h5>sorteado</h5></th>
                  </tr>
                  <tr>
                    <th style="width: 120px"></th>
                  </tr>                 
                </thead>
                <tbody>
                   <?php $counter1=-1;  if( isset($sorteio) && ( is_array($sorteio) || $sorteio instanceof Traversable ) && sizeof($sorteio) ) foreach( $sorteio as $key1 => $value1 ){ $counter1++; ?>
                  <tr>                    
                    <td><?php echo htmlspecialchars( $value1["numerodeordem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>º</td>
                    <td><?php echo htmlspecialchars( $value1["numerosortear"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  </tr>
                   <?php } ?>
                </tbody>
              </table>
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
<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de números do sorteio
  </h1>
  <ol class="breadcrumb">
    <li><a href="/professor"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/professor/temporada">Temporadas</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
            
            

            <div class="row">
              <div class="col-md-12">

                <div>
                  <?php if( $temporada["maximoInscritos"] > 0 ){ ?>
                    <div class="alert alert-info" style="text-align: center;">
                      Qtde de números para o sorteio: <h3 style="color: black;"><?php echo htmlspecialchars( $temporada["maximoInscritos"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div> 
                    <div style="text-align: center;">
                      <a href="/professor/sorteio" class="btn btn-success btn-lg">Sortear</a>
                    </div>                
                  <?php }else{ ?>
                    <div class="alert alert-danger" style="text-align: center;">
                      <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </div>
                  <?php } ?>                    
                </div>                 
              </div>              
            </div>            
            <div class="box-body no-padding">
              <table class="table table-striped">
                <thead>                 
                  <tr>
                    <th>ordem do sorteio</th>
                    <th>numero da sorte</th>
                    <th style="width: 240px">&nbsp;</th>
                  </tr>
                  <tr>
                    <th style="width: 240px">&nbsp;</th>
                  </tr>                 
                </thead>
                <tbody>
                   <?php $counter1=-1;  if( isset($sorteio) && ( is_array($sorteio) || $sorteio instanceof Traversable ) && sizeof($sorteio) ) foreach( $sorteio as $key1 => $value1 ){ $counter1++; ?>
                  <tr>                    
                    <td><?php echo htmlspecialchars( $value1["numerodeordem"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
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
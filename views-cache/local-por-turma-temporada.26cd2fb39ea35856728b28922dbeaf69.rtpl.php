<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h4>
 Locais de aulas do professor - temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

</h4>
<ol class="breadcrumb">
  <li><a href="/prof"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active"><a style="color: red" href="javascript: history.go(-1)">Voltar</a>
    </li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">

  <?php if( $error != '' ){ ?>
          <div class="alert alert-danger" style="margin: 10px 10px 0px 10px">
      <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
          </div>
      <?php } ?>
  <div class="col-md-12">

      <div class="box box-primary" > 

        <div class="box-header"> 

          <h4>Meus locais de aula</h4>

       </div>

      <div class="box-body" style="border: solid 1px lightblue; margin: 5px;"> 
         <?php $counter1=-1;  if( isset($locais) && ( is_array($locais) || $locais instanceof Traversable ) && sizeof($locais) ) foreach( $locais as $key1 => $value1 ){ $counter1++; ?>                          
          <div class="box-body no-padding col-md-2">            
                         
                <div class="box-body" style="border: solid 1px lightblue; margin: 2px; text-align: center;">

                  <div class="row">

                    <div class="col-md-12" >
                      <span style="">

                      <a href="/prof/turma-temporada/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><strong><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </strong> </a>
                       

                     
                      </span>
                    </div>                     
                   
                  </div>
                    
                </div>
             
          </div>
            <?php } ?>         

        </div>
        <!-- /.box-body --> 
        <?php if( $locaiscoord ){ ?>
          <div class="box-body col-md-12">
                  <table class="table table-striped">
                      <thead>
                          <tr>
                           <th>Turmas da temporada por centro esportivo (coordenador)</th>
                          </tr>
                      </thead>
                      <tbody>

                          <tr>
                          
                          <?php $counter1=-1;  if( isset($locaiscoord) && ( is_array($locaiscoord) || $locaiscoord instanceof Traversable ) && sizeof($locaiscoord) ) foreach( $locaiscoord as $key1 => $value1 ){ $counter1++; ?>
                          <tr>
                          <td>
                              <a href="/prof/turma-temporada-coordenador/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/local/<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class=""></i> <?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
                          </td>
                          </tr>
                          <?php } ?>

                      </tbody>
                  </table>
              </div>
          <?php } ?>

  </div>
</div>
</div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
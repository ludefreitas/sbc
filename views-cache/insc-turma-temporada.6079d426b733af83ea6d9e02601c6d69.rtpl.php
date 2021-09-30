<?php if(!class_exists('Rain\Tpl')){exit;}?>

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
     <?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $turma["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  <?php echo htmlspecialchars( $turma["periodo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $turma["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> -   <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $turma["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/admin/turma-temporada/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Turmas por temporada</a></li>
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
          <?php if( $success != '' ){ ?>
                <div class="alert alert-success" style="margin: 10px 10px 0px 10px">
            <?php echo htmlspecialchars( $success, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
          <?php } ?>
            
            <div class="box-header">
           
            </div>
          <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
              
            <?php $counter1=-1;  if( isset($insc) && ( is_array($insc) || $insc instanceof Traversable ) && sizeof($insc) ) foreach( $insc as $key1 => $value1 ){ $counter1++; ?>
            <div class="box-body" style=" margin: 5px;">
              <div <?php echo colorStatus($value1["idinscstatus"]); ?> style="margin: 5px" class="row">

              <div class="col-md-1" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  Nome: <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </h5>
              </div>

              <div class="col-md-1" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  CPF.: <?php echo htmlspecialchars( $value1["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </h5>
              </div> 

              <div class="col-md-1" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  Data do Nasc.: <?php echo formatDate($value1["dtnasc"]); ?>
                </h5>
              </div>

              <div class="col-md-1" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  Idade: <?php echo calcularIdade($value1["dtnasc"]); ?> anos
                </h5>
              </div>

              <div class="col-md-1" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  Responsável: <?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </h5>
              </div>

               <div class="col-md-1" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  Fone: <?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </h5>
              </div>

               <div class="col-md-1" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  Data Inscr.: <?php echo formatDate($value1["dtinsc"]); ?>
                </h5>
              </div>
              
              <?php if( $value1["idinscstatus"] == 1 ){ ?>
              <div class="col-md-1" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left; color: blue;">                  
                  <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                </h5>
              </div>
              <?php } ?>
              
              <?php if( $value1["idinscstatus"] == 2 ){ ?>
              <div class="col-md-1" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left; color: darkgreen;">                  
                  <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                </h5>
              </div>
              <?php } ?>
              <?php if( $value1["idinscstatus"] == 6 ){ ?>
              <div class="col-md-1" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left; color: darkorange;">                  
                  <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                </h5>
              </div>
              <?php } ?>
              <?php if( $value1["idinscstatus"] == 7 ){ ?>
              <div class="col-md-1" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left; color: darkblue;">                  
                  <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                </h5>
              </div>
              <?php } ?>
              <?php if( $value1["idinscstatus"] == 8 ){ ?>
              <div class="col-md-1" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left; color: orange;">                  
                  Status: <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                </h5>
              </div>
              <?php } ?>
              <?php if( $value1["idinscstatus"] == 9 ){ ?>
              <div class="col-md-1" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left; color: red;">                  
                  <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                </h5>
              </div>
              <?php } ?>            


              <div class="col-md-1" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <?php if( $value1["laudo"] == 1 ){ ?>c/ laudo<?php } ?>  Inscr[<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>] OrSor[<?php echo htmlspecialchars( $value1["numordem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>] NuSor[<?php echo htmlspecialchars( $value1["numsorte"], ENT_COMPAT, 'UTF-8', FALSE ); ?>]
                </h5>
              </div>

              <div class="col-md-1" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/admin/profile/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button">Detalhes</a>
                </h5>
              </div>

              

              <?php if( $value1["idinscstatus"] == 2 ){ ?>
              <div class="col-md-1" style="margin: 2; padding: 2">
                <div>
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusMatriculada" onclick="return confirm('Deseja realmente efetuar a MATRÍCULA do(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> na turma <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-success btn-xs"><i></i> Matricular</a>
                </h5>
                </div>

              <!--
              <div>

                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusDesistente" onclick="return confirm('Deseja realmente marcar como DESISTENTE o(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da turma <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> na temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ? ')" class="btn btn-primary btn-xs"><i></i> Desistente</a>
                </h5>
              </div>
              </div>
            -->

              <?php } ?>

              <!--
              <?php if( $value1["idinscstatus"] == 1 ){ ?>
              
              <div class="col-md-1" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusDesistente" onclick="return confirm('Deseja realmente marcar como DESISTENTE o(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da turma <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> na temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ? ')" class="btn btn-primary btn-xs"><i></i> Desistente</a>
                </h5>
              </div>
            
              <?php } ?>
              -->
              
              <?php if( $value1["idinscstatus"] == 7 ){ ?>
              <div class="col-md-1" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusAguardandoMatricula" onclick="return confirm('Deseja realmente que o(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> fique aguardando matrícula na turma de <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-info btn-xs"><i></i> Aguardar matrícula</a>
                </h5>
              </div>

              <?php } ?>
                                                                                                          

            </div>
          </div>
          <?php } ?>

          </div>           
            <button type="button" onclick="window.print()" class="btn btn-primary pull-right" style="margin-right: 5px;">
                    <i class="fa fa-print"></i> Imprimir
                </button>
            <!-- /.box-body -->

            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
                <li><a href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                <?php } ?>
              </ul>
            </div>

          </div>
    </div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->



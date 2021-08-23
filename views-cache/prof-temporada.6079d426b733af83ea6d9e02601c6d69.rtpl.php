<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista dos professores da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/admin/users">Usuários</a></li>
    <li><a href="/admin/insc/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> Todas inscrições <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </a></li>
    <li><a href="/admin/temporada/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/turma"> Inserir turma <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
            
            <div class="box-header">
              <?php if( $error != '' ){ ?>
                <div class="alert alert-danger" style="margin: 0px 10px 0px 10px">
                    <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
                <?php }else{ ?>
              <!--
              <a href="/admin/users/create" class="btn btn-success">Cadastrar Usuário</a>
            -->
            </div>         

           <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
              
            <?php $counter1=-1;  if( isset($prof) && ( is_array($prof) || $prof instanceof Traversable ) && sizeof($prof) ) foreach( $prof as $key1 => $value1 ){ $counter1++; ?>
            <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
              <div class="row">

              <div class="col-md-1" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </h5>
              </div>

              <div class="col-md-3" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </h5>
              </div>
              

              <div class="col-md-2" style="margin: 2; padding: 2">
                    <a href="/admin/turma-temporada/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/user/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-info btn-xs"><i class=""></i><span style="color: black;">Turmas do professor(a) <br><?php echo htmlspecialchars( $value1["apelidoperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span></a>
              </div>

              <div class="col-md-2" style="margin: 2; padding: 2">
                 <a href="/admin/turmatemporada/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/turma/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class=""></i><span style="color: black;"> Inserir ou remover <br> turma do professor(a)</span></a>                      
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
    <?php } ?>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
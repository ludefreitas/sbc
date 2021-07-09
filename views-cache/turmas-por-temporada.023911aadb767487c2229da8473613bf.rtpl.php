<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
   Turmas relacionadas à Temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $temporada["descstatustemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/professor"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/professor/turma">Turmas</a></li>
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
        <div class="box box-primary">
            
            <div class="box-header">

              <a href="/professor/temporada/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-success">Editar Temporada</a>

               <a href="/professor/temporada/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/turma" class="btn btn-primary">Inserir ou remover turma</a>
             
            </div>
           
            <div class="box-body no-padding">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Descrição da turma</th>                    
                    <th>Modalidade</th>
                    <th>Faixa Etária</th>    
                    <th>Professor</th>                  
                    <th>Crec</th>
                    <th>Espaço</th>
                    <th>Horário  Dia Semana</th>
                    <th>Status</th>
                    <th >Vagas</th>
                    <th>Nº de inscritos</th>
                    
                  </tr>
                </thead>
                <tbody>                  
                  <?php $counter1=-1;  if( isset($turmas) && ( is_array($turmas) || $turmas instanceof Traversable ) && sizeof($turmas) ) foreach( $turmas as $key1 => $value1 ){ $counter1++; ?>
                  <tr>

                  
                    <td><?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?></br><?php echo htmlspecialchars( $value1["periodo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                     <td><?php echo htmlspecialchars( $value1["descmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </br> <?php echo htmlspecialchars( $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> a <?php echo htmlspecialchars( $value1["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> anos</td>
                    <td><?php echo htmlspecialchars( $value1["apelidoperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["nomeespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td> <?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </br> <?php echo htmlspecialchars( $value1["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ás <?php echo htmlspecialchars( $value1["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  </td>
                    <td><?php echo htmlspecialchars( $value1["desstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><a href="/professor/insc-turma-temporada/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["numinscritos"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></td>
                  
                   
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
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
<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Turmas para o(a) estagiário(a) <?php echo htmlspecialchars( $user["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $user["apelidoperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?> para a temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/estagiario-temporada/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Estagiários da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
    <!-- <li><a href="/admin/turma-temporada/"></a></li>
    <li class="active"><a href="/admin/temporada/turma"></a></li>-->
  </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-4">
            <div class="box box-success">
                <div class="box-header with-border">
                <h3 class="box-title">Turmas sem estagiário(a) definido</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>Turma</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter1=-1;  if( isset($turmaNotRelated) && ( is_array($turmaNotRelated) || $turmaNotRelated instanceof Traversable ) && sizeof($turmaNotRelated) ) foreach( $turmaNotRelated as $key1 => $value1 ){ $counter1++; ?>
                            <tr>
                            <td><?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - 
                                <?php echo htmlspecialchars( $value1["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["nomeativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                            </td>
                            <?php if( $value1["idestagiario"] == 1 ){ ?>
                            <td>
                                <a href="/admin/turmatemporada-estagiario/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/turma/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/user/<?php echo htmlspecialchars( $user["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add" class="btn btn-success btn-xs pull-right"><i class="fa fa-arrow-right"></i> Adicionar</a>
                            </td>
                            <?php }else{ ?>
                        <!--
                            <td>
                                <a type="btn" disabled="true" href="/admin/turmatemporada/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/turma/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/user/<?php echo htmlspecialchars( $user["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add" class="btn btn-success btn-xs pull-right"><i class="fa fa-arrow-right"></i> Adicionar</a>
                            </td>
                        -->
                            <?php } ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-danger">
                <div class="box-header with-border">
                <h3 class="box-title">Turmas atribuida ao(a) estagiário(a) <?php echo htmlspecialchars( $user["apelidoperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>Turmas atribuidas ao(a) estagiário(a) <?php echo htmlspecialchars( $user["apelidoperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?> na temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter1=-1;  if( isset($turmaRelated) && ( is_array($turmaRelated) || $turmaRelated instanceof Traversable ) && sizeof($turmaRelated) ) foreach( $turmaRelated as $key1 => $value1 ){ $counter1++; ?>
                            <tr>
                            <td><?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - 
                            <?php echo htmlspecialchars( $value1["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["nomeativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - 
                             <?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>                      
                            <td>
                                <a href="/admin/turmatemporada-estagiario/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/turma/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/user/<?php echo htmlspecialchars( $user["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/remove" class="btn btn-danger btn-xs pull-right"><i class="fa fa-arrow-left"></i> Remover</a>
                            </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>    
        <div class="col-md-4">
            <div class="box box-primary">
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                             <th>Turmas do(a) estagiário(a) <?php echo htmlspecialchars( $user["apelidoperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?> por centro esportivo</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                            <td>
                                <a href="/admin/turmatemporada/<?php echo htmlspecialchars( $user["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/turma/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class=""></i>Todas turmas - Temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
                            </td>
                            <?php $counter1=-1;  if( isset($locais) && ( is_array($locais) || $locais instanceof Traversable ) && sizeof($locais) ) foreach( $locais as $key1 => $value1 ){ $counter1++; ?>
                            <tr>
                            <td>
                                <a href="/admin/turmatemporada-estagiario/<?php echo htmlspecialchars( $user["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/turma/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class=""></i> <?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
                            </td>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>            
    </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Horários do Espaço <?php echo htmlspecialchars( $espaco["nomeespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/professor"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/professor/espaco">Espaço</a></li>
    <li><a href="/professor/espaco/<?php echo htmlspecialchars( $espaco["idespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $espaco["nomeespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
    <li class="active"><a href="/professor/espaco/<?php echo htmlspecialchars( $espaco["idespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/horario">Horário</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                <h3 class="box-title">Todos os Horários</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th style="width: 10px">#</th>
                            <th>Horário</th>
                            <th style="width: 240px">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter1=-1;  if( isset($horarioNotRelated) && ( is_array($horarioNotRelated) || $horarioNotRelated instanceof Traversable ) && sizeof($horarioNotRelated) ) foreach( $horarioNotRelated as $key1 => $value1 ){ $counter1++; ?>
                            <tr>
                            <td><?php echo htmlspecialchars( $value1["idhorario"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ás <?php echo htmlspecialchars( $value1["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td>
                                <a href="/professor/espaco/<?php echo htmlspecialchars( $espaco["idespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/horario/<?php echo htmlspecialchars( $value1["idhorario"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add" class="btn btn-primary btn-xs pull-right"><i class="fa fa-arrow-right"></i> Adicionar</a>
                            </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                <h3 class="box-title">Horários para <?php echo htmlspecialchars( $espaco["nomeespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th style="width: 10px">#</th>
                            <th>Horários da <?php echo htmlspecialchars( $espaco["nomeespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></th>
                            <th style="width: 240px">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter1=-1;  if( isset($horarioRelated) && ( is_array($horarioRelated) || $horarioRelated instanceof Traversable ) && sizeof($horarioRelated) ) foreach( $horarioRelated as $key1 => $value1 ){ $counter1++; ?>
                            <tr>
                            <td><?php echo htmlspecialchars( $value1["idhorario"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ás <?php echo htmlspecialchars( $value1["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td>
                                <a href="/professor/espaco/<?php echo htmlspecialchars( $espaco["idespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/horario/<?php echo htmlspecialchars( $value1["idhorario"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/remove" class="btn btn-primary btn-xs pull-right"><i class="fa fa-arrow-left"></i> Remover</a>
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
<?php if(!class_exists('Rain\Tpl')){exit;}?>

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Temporadas
  </h1>
  <ol class="breadcrumb">
    <li><a href="/professor"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/professor/Temporada">Temporada</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
            
            <div class="box-header">
              <a href="/professor/temporada/create" class="btn btn-success">Criar nova temporada</a>
            </div>

            <div class="box-body no-padding">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Temporada</th>
                    <th>Status Temporada</th>
                    <th>Data Icicio das Inscrição</th>
                    <th>Data Fim das Inscrição</th>
                    <th>Data Icicio das Matrícula</th>
                    <th>Data Fim das Matrícula</th>
                    <th style="width: 240px">&nbsp;</th>
                  </tr>
                </thead>


                <tbody>
                  <?php $counter1=-1;  if( isset($temporada) && ( is_array($temporada) || $temporada instanceof Traversable ) && sizeof($temporada) ) foreach( $temporada as $key1 => $value1 ){ $counter1++; ?>

                  <tr>
                    
                    <td> <a href="/professor/turma-temporada/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></td>
                    <td><a href="/professor/turma-temporada/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></td>
                    <td><?php echo htmlspecialchars( $value1["descstatustemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></td>
                    <td><?php echo formatDateHour($value1["dtinicinscricao"]); ?></a></td>
                    <td><?php echo formatDateHour($value1["dtterminscricao"]); ?></a></td>
                    <td><?php echo formatDateHour($value1["dtinicmatricula"]); ?></a></td>
                    <td><?php echo formatDateHour($value1["dttermmatricula"]); ?></a></td>
                    <td>
                    
                    <a href="/professor/temporada/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/turma" class="btn btn-default btn-xs"><i class="fa fa-edit"></i> Turmas</a>                  
                      <a href="/professor/temporada/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                      <a href="/professor/temporada/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir temporada <?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                    </td>
                  </tr>
                  <?php } ?>

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
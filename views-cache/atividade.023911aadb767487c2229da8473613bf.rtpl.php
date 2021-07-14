<?php if(!class_exists('Rain\Tpl')){exit;}?>

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Atividades
  </h1>
  <ol class="breadcrumb">
    <li><a href="/professor"><i class="fa fa-dashboard"></i> Home</a></li>
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

            
            <div class="box-header">
              <a href="/professor/atividade/create" class="btn btn-success">Cadastrar Atividade</a>

              <div class="box-tools">
                <form action="/professor/atividade">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="search" class="form-control pull-right" placeholder="Search" value="<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </form>
              </div>


            </div>

            <div class="box-body no-padding">
              <table class="table table-striped">
                <thead>
                  <tr>

                    <th>Atividade</th>
                    <th>Descrição</th>
                    <th>Gênero</th>
                    <th>Programa</th>
                    <th>Origem</th>
                    <th>Tipo</th>
                    <th>Faixa Etária</th>

                  </tr>
                </thead>
                <tbody>
                  <?php $counter1=-1;  if( isset($atividade) && ( is_array($atividade) || $atividade instanceof Traversable ) && sizeof($atividade) ) foreach( $atividade as $key1 => $value1 ){ $counter1++; ?>

                  <tr>
                    <td><?php echo htmlspecialchars( $value1["nomeativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["geneativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["prograativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["origativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["tipoativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> a <?php echo htmlspecialchars( $value1["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> anos - <?php echo htmlspecialchars( $value1["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                               
                    <td>
                      <a href="/professor/atividade/<?php echo htmlspecialchars( $value1["idativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                      <a href="/professor/atividade/<?php echo htmlspecialchars( $value1["idativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir a atividade <?php echo htmlspecialchars( $value1["nomeativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                    </td>
                  </tr>
                  <?php } ?>

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>

                <li><a href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                <?php } ?>

              </ul>
            </div>
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
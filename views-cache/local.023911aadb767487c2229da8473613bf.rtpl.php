<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Crecs
  </h1>
  <ol class="breadcrumb">
    <li><a href="/professor"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/professor/local/create">Cadastrar Crec</a></li>
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

            
            <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
              <div class="row">
              <div class="col-md-4" >
                <h5 style="font-weight: bold; text-align: left;">
                  Nome do Centro Esportivo
                </h5>
              </div>
              <div class="col-md-4" >
                <h5 style="font-weight: bold; text-align: left;">
                 Endereço
                </h5>
              </div>
              <div class="col-md-2" >
                <h5 style="font-weight: bold; text-align: left;">
                 Telefone
                </h5>
              </div>
            </div>
            <?php $counter1=-1;  if( isset($local) && ( is_array($local) || $local instanceof Traversable ) && sizeof($local) ) foreach( $local as $key1 => $value1 ){ $counter1++; ?>

            <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
              <div class="row">
              <div class="col-md-4" >
                <h5 style="font-weight: bold; text-align: left;">
                  <?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br> <?php echo htmlspecialchars( $value1["nomelocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                </h5>
              </div>
              <div class="col-md-4" >
                <h5 style="font-weight: bold; text-align: left;">
                  <?php echo htmlspecialchars( $value1["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["complemento"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - Cep: <?php echo htmlspecialchars( $value1["cep"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["estado"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                </h5>
              </div>
              <div class="col-md-2" >
                <h5 style="font-weight: bold; text-align: left;">
                  <?php echo htmlspecialchars( $value1["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                </h5>
              </div>
              <div class="col-md-2" >
                <h6 style="font-weight: bold; text-align: center;">
                  <a href="/professor/local/<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                  <a href="/professor/local/<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir o Crec <?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                </h6>                
              </div>
            </div>

           
            </div>
            <?php } ?>

            
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>

                <li><a href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                <?php } ?>

              </ul>
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
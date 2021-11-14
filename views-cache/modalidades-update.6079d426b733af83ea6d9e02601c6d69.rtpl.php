<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Editar Modalidade
  </h1>
   <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/modalidades">Modalidades</a></li>
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

        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/modalidades/<?php echo htmlspecialchars( $modalidade["idmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
          <div class="box-body">

            

            <div class="form-group">
              <label for="descmodal">Nome da modalidade</label>
              <input type="text" class="form-control" id="descmodal" name="descmodal" placeholder="Digite a descrição da modalidade" value="<?php echo htmlspecialchars( $modalidade["descmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
             &nbsp&nbsp&nbsp&nbsp
            <a type="button" class="btn btn-danger" href="javascript:window.history.go(-1)">Cancelar</a>
          </div>
        </form>
      </div>
    </div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
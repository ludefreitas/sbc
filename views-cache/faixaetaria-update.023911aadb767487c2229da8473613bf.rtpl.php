<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Editar faixa etária <?php echo htmlspecialchars( $faixaetaria["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Faixa Etária  </h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/professor/faixaetaria/<?php echo htmlspecialchars( $faixaetaria["idfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="initidade">Idade inicial</label>
              <input type="text" class="form-control" id="initidade" name="initidade" placeholder="Digite a idade inicial" value="<?php echo htmlspecialchars( $faixaetaria["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="fimidade">Idade Final</label>
              <input type="text" class="form-control" id="fimidade" name="fimidade" placeholder="Digite a idade final" value="<?php echo htmlspecialchars( $faixaetaria["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="descrfxetaria">Descrição da Faixa Etária</label>
              <input type="text" class="form-control" id="descrfxetaria" name="descrfxetaria" placeholder="Descreva a faixa etaria" value="<?php echo htmlspecialchars( $faixaetaria["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
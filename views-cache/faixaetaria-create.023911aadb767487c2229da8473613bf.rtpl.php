<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Criar Nova Faixa Etária
  </h1>
  <ol class="breadcrumb">
    <li><a href="/professor"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/professor/faixaetaria">Faixas Etária</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <?php if( $error != '' ){ ?>

          <div class="alert alert-danger" style="margin: 10px 10px 0px 10px">
        <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>

          </div>
        <?php } ?>

        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/professor/faixaetaria/create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="initidade">Idade inicial</label>
              <input type="number" class="form-control" id="initidade" name="initidade" placeholder="Informe a idade inicial" value="<?php echo htmlspecialchars( $createFaixaetariaValues["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="fimidade">Idade final</label>
              <input type="number" class="form-control" id="fimidade" name="fimidade" placeholder="Informe a idade final" value="<?php echo htmlspecialchars( $createFaixaetariaValues["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="descrfxetaria">Descrição da Faixa Etária</label>
              <input type="text" class="form-control" id="descrfxetaria" name="descrfxetaria" placeholder="Descreva a faixa etária" value="<?php echo htmlspecialchars( $createFaixaetariaValues["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Cadastrar</button>
            &nbsp&nbsp&nbsp&nbsp
            <a type="button" class="btn btn-danger" href="/professor/faixaetaria">Cancelar</a>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
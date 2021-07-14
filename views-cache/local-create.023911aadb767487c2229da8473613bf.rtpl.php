<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Criar Novo Crec´s
  </h1>
  <ol class="breadcrumb">
    <li><a href="/professor"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/professor/local">Crec´s</a></li>
    <!--<li class="active"><a href="/professor/local/create">Cadastrar</a></li>-->
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
        <form role="form" action="/professor/local/create" method="post">
          <div class="box-body">
            <div class="box-header">
              <label for="apelidolocal">Apelido do Crec</label>
              <input type="text" class="form-control" id="apelidolocal" name="apelidolocal" placeholder="Informe o apelido do Crec" value="<?php echo htmlspecialchars( $createLocalValues["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="box-header">
              <label for="nomelocal">Nome do Crec</label>
              <input type="text" class="form-control" id="nomelocal" name="nomelocal" placeholder="Informe o nome oficial do Crec" value="<?php echo htmlspecialchars( $createLocalValues["nomelocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="box-header">
              <label for="cep">Cep</label>
              <input type="number" class="form-control" id="cep" name="cep" placeholder="Informe o Cep de onde está localizado o Crec" value="<?php echo htmlspecialchars( $createLocalValues["cep"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="box-header">
              <label for="rua">Rua</label>
              <input type="text" class="form-control" id="rua" name="rua" placeholder="Informe o nome da rua ou avenida" value="<?php echo htmlspecialchars( $createLocalValues["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="box-header">
              <label for="numero">Número</label>
              <input type="text" class="form-control" id="numero" name="numero" placeholder="Informe o número" value="<?php echo htmlspecialchars( $createLocalValues["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="box-header">
              <label for="complemento">Complemento</label>
              <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Informe o complemento, se houver" value="<?php echo htmlspecialchars( $createLocalValues["complemento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="box-header">
              <label for="bairro">Bairro</label>
              <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Informe o nome do Bairro" value="<?php echo htmlspecialchars( $createLocalValues["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="box-header">
              <label for="cidade">Cidade</label>
              <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Informe o nome da cidade" value="<?php echo htmlspecialchars( $createLocalValues["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="box-header">
              <label for="estado">Estado</label>
              <input type="text" class="form-control" id="estado" name="estado" placeholder="Informe o nome do Estado" value="<?php echo htmlspecialchars( $createLocalValues["estado"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="box-header">
              <label for="telefone">Telefone</label>
              <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Informe o númeor do telefone do local" value="<?php echo htmlspecialchars( $createLocalValues["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>           
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Cadastrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
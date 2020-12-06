<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Crec´s
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Crec</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/professor/local/<?php echo htmlspecialchars( $local["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
          <div class="box-body">
          	<div class="form-group">
              <label for="apelidolocal">Apelido do Crec</label>
              <input type="text" class="form-control" id="apelidolocal" name="apelidolocal" placeholder="Informe o apelido do Crec" value="<?php echo htmlspecialchars( $local["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="form-group">
              <label for="nomelocal">Nome do Crec</label>
              <input type="text" class="form-control" id="nomelocal" name="nomelocal" placeholder="Informe o nome oficial do Crec" value="<?php echo htmlspecialchars( $local["nomelocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="cep">Cep</label>
              <input type="number" class="form-control" id="cep" name="cep" placeholder="Informe o Cep de onde está localizado o Crec" value="<?php echo htmlspecialchars( $local["cep"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="rua">Rua</label>
              <input type="text" class="form-control" id="rua" name="rua" placeholder="Informe o nome da rua ou avenida" value="<?php echo htmlspecialchars( $local["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="numero">Número</label>
              <input type="text" class="form-control" id="numero" name="numero" placeholder="Informe o número" value="<?php echo htmlspecialchars( $local["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="complemento">Complemento</label>
              <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Informe o complemento, se houver" value="<?php echo htmlspecialchars( $local["complemento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="bairro">Bairro</label>
              <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Informe o nome do Bairro" value="<?php echo htmlspecialchars( $local["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="cidade">Cidade</label>
              <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Informe o nome da cidade" value="<?php echo htmlspecialchars( $local["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="estado">Estado</label>
              <input type="text" class="form-control" id="estado" name="estado" placeholder="Informe o nome do Estado" value="<?php echo htmlspecialchars( $local["estado"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="telefone">Telefone</label>
              <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Informe o númeor do telefone do local" value="<?php echo htmlspecialchars( $local["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
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





			
            

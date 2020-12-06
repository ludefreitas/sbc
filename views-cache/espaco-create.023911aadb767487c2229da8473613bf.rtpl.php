<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Espaços
  </h1>
  <ol class="breadcrumb">
    <li><a href="/professor"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/professor/espaco">Novo Espaço</a></li>
    <!--<li class="active"><a href="/professor/espaco/create">Cadastrar</a></li>-->
  </ol>
</section>

<!-- Main content -->

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Novo Espaço</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start --><form role="form" action="/professor/espaco/create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="nomeespaco">Nome do espaço</label>
              <input type="text" class="form-control" id="nomeespaco" name="nomeespaco" placeholder="Nome da espaco">
            </div>
            <div class="form-group">
              <label for="descespaco">Descrição do espaço</label>
              <input type="text" class="form-control" id="descespaco" name="descespaco" placeholder="Descreva a espaco">
            </div>
            <div class="form-group">
              <label for="areaespaco">Área do espaço</label>
              <input type="number" class="form-control" id="areaespaco" name="areaespaco" placeholder="Informe a área do espaço">
            </div>
            <div class="form-group">
              <label for="observacao">Observação</label>
              <input type="text" class="form-control" id="observacao" name="observacao" placeholder="Observação: quadra coberta... sala com espelho... acessível...">
            </div>
            <div class="form-group">
              <label for="idlocal">CREC</label>
              <select class="form-control" name="idlocal"> 
                 <option selected="selected">Selecione CREC</option>
                  <?php $counter1=-1;  if( isset($local) && ( is_array($local) || $local instanceof Traversable ) && sizeof($local) ) foreach( $local as $key1 => $value1 ){ $counter1++; ?>
                 <option  value="<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <?php } ?>
              </select>
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
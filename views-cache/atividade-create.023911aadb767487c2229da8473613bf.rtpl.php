<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Atividades
  </h1>
  <ol class="breadcrumb">
    <li><a href="/professor"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/professor/atividade">Atividade</a></li>
    <!--<li class="active"><a href="/professor/atividade/create">Cadastrar</a></li>-->
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Nova Atividade</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->                    
        <form role="form" action="/professor/atividade/create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="nomeativ">Atividade</label>
              <input type="text" class="form-control" id="nomeativ" name="nomeativ" placeholder="Nome da atividade">
            </div>
            <div class="form-group">
              <label for="descativ">Descrição</label>
              <input type="text" class="form-control" id="descativ" name="descativ" placeholder="Descreva a atividade">
            </div>
            <div class="form-group">
              <label for="geneativ">Gênero</label>
              <input type="text" class="form-control" id="geneativ" name="geneativ" placeholder="Informe o gênero da atividade">
            </div>
            <div class="form-group">
              <label for="prograativ">Programa</label>
              <input type="text" class="form-control" id="prograativ" name="prograativ" placeholder="Informe qual é o programa">
            </div>
            <div class="form-group">
              <label for="origativ">Origem</label>
              <input type="text" class="form-control" id="origativ" name="origativ" placeholder="Informe a origem da atividade">
            </div>            
            <div class="form-group">
              <label for="tipoativ">Tipo</label>
              <input type="text" class="form-control" id="tipoativ" name="tipoativ" placeholder="Informe qual o tipo da atividade">
            </div>
            <div class="form-group">
                        <label for="atividade">Faixa Etária</label>
                        <select class="form-control" name="idfxetaria">                          

                            <?php $counter1=-1;  if( isset($faixaetaria) && ( is_array($faixaetaria) || $faixaetaria instanceof Traversable ) && sizeof($faixaetaria) ) foreach( $faixaetaria as $key1 => $value1 ){ $counter1++; ?>
                            <option <?php if( $value1["idfxetaria"] ){ ?>selected="selected"<?php } ?> value="<?php echo htmlspecialchars( $value1["idfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> a <?php echo htmlspecialchars( $value1["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> anos - <?php echo htmlspecialchars( $value1["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
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
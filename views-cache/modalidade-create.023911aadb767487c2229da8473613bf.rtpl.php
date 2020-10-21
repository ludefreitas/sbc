<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Modalidades
  </h1>
  <ol class="breadcrumb">
    <li><a href="/professor"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/professor/modalidade">Modalidade</a></li>
    <!--<li class="active"><a href="/professor/modalidade/create">Cadastrar</a></li>-->
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Nova Modalidades</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->                    
        <form role="form" action="/professor/modalidade/create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="nomemodal">Modalidade</label>
              <input type="text" class="form-control" id="nomemodal" name="nomemodal" placeholder="Nome da modalidade">
            </div>
            <div class="form-group">
              <label for="descmodal">Descrição</label>
              <input type="text" class="form-control" id="descmodal" name="descmodal" placeholder="Descreva a modalidade">
            </div>
            <div class="form-group">
              <label for="genemodal">Gênero</label>
              <input type="text" class="form-control" id="genemodal" name="genemodal" placeholder="Informe o gênero da modalidade">
            </div>
            <div class="form-group">
              <label for="programodal">Programa</label>
              <input type="text" class="form-control" id="programodal" name="programodal" placeholder="Informe qual é o programa">
            </div>
            <div class="form-group">
              <label for="origmodal">Origem</label>
              <input type="text" class="form-control" id="origmodal" name="origmodal" placeholder="Informe a origem da modalidade">
            </div>            
            <div class="form-group">
              <label for="tipomodal">Tipo</label>
              <input type="text" class="form-control" id="tipomodal" name="tipomodal" placeholder="Informe qual o tipo da modalidade">
            </div>
            <div class="form-group">
                        <label for="modalidade">Faixa Etária</label>
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
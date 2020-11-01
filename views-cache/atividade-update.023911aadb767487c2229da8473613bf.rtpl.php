<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Editar Atividade 
  </h1>
  <ol class="breadcrumb">
    <li><a href="/professor"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/professor/atividade">Voltar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Atividade </h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/professor/atividade/<?php echo htmlspecialchars( $atividade["idativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" enctype="multipart/form-data">

          <div class="box-body">

            <div class="form-group">
              <label for="nomeativ">Nome</label>
              <input type="text" class="form-control" id="nomeativ" name="nomeativ" placeholder="Digite o nome da atividade" value="<?php echo htmlspecialchars( $atividade["nomeativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="form-group">
              <label for="descativ">Descrição</label>
              <input type="text" class="form-control" id="descativ" name="descativ" placeholder="Descreva a atividade" value="<?php echo htmlspecialchars( $atividade["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="form-group">
              <label for="geneativ">Gênero</label>
              <input type="text" class="form-control" id="geneativ" name="geneativ" placeholder="Informe o gênero da atividade" value="<?php echo htmlspecialchars( $atividade["geneativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="form-group">
              <label for="prograativ">Programa</label>
              <input type="text" class="form-control" id="prograativ" name="prograativ" placeholder="Informe qual é o programa" value="<?php echo htmlspecialchars( $atividade["prograativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="form-group">
              <label for="origativ">Origem</label>
              <input type="text" class="form-control" id="origativ" name="origativ" placeholder="Informe a origem da atividade" value="<?php echo htmlspecialchars( $atividade["origativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="form-group">
              <label for="tipoativ">Tipo</label>
              <input type="text" class="form-control" id="tipoativ" name="tipoativ" placeholder="Informe qual o tipo da atividade" value="<?php echo htmlspecialchars( $atividade["tipoativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
                <label for="atividade">Faixa Etária</label>
                <select class="form-control" name="idfxetaria">
                 
                <?php $counter1=-1;  if( isset($faixaetaria) && ( is_array($faixaetaria) || $faixaetaria instanceof Traversable ) && sizeof($faixaetaria) ) foreach( $faixaetaria as $key1 => $value1 ){ $counter1++; ?>
                    <option <?php if( $value1["idfxetaria"] === $atividade["idfxetaria"] ){ ?>selected="selected"<?php } ?> value="<?php echo htmlspecialchars( $value1["idfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> a <?php echo htmlspecialchars( $value1["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> anos - <?php echo htmlspecialchars( $value1["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                <?php } ?>
                
                </select>
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
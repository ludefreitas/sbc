<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Editar Modalidade 
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Modalidade </h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/professor/modalidade/<?php echo htmlspecialchars( $modalidade["idmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" enctype="multipart/form-data">

          <div class="box-body">

            <div class="form-group">
              <label for="nomemodal">Nome</label>
              <input type="text" class="form-control" id="nomemodal" name="nomemodal" placeholder="Digite o nome da Modalidade" value="<?php echo htmlspecialchars( $modalidade["nomemodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="form-group">
              <label for="descmodal">Descrição</label>
              <input type="text" class="form-control" id="descmodal" name="descmodal" placeholder="Descreva a modalidade" value="<?php echo htmlspecialchars( $modalidade["descmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="form-group">
              <label for="genemodal">Gênero</label>
              <input type="text" class="form-control" id="genemodal" name="genemodal" placeholder="Informe o gênero da modalidade" value="<?php echo htmlspecialchars( $modalidade["genemodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="form-group">
              <label for="programodal">Programa</label>
              <input type="text" class="form-control" id="programodal" name="programodal" placeholder="Informe qual é o programa" value="<?php echo htmlspecialchars( $modalidade["programodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="form-group">
              <label for="origmodal">Origem</label>
              <input type="text" class="form-control" id="origmodal" name="origmodal" placeholder="Informe a origem da modalidade" value="<?php echo htmlspecialchars( $modalidade["origmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="form-group">
              <label for="tipomodal">Tipo</label>
              <input type="text" class="form-control" id="tipomodal" name="tipomodal" placeholder="Informe qual o tipo da modalidade" value="<?php echo htmlspecialchars( $modalidade["tipomodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
                <label for="modalidade">Faixa Etária</label>
                <select class="form-control" name="idfxetaria">
                  <!--
                <?php $counter1=-1;  if( isset($faixaetaria) && ( is_array($faixaetaria) || $faixaetaria instanceof Traversable ) && sizeof($faixaetaria) ) foreach( $faixaetaria as $key1 => $value1 ){ $counter1++; ?>
                    <option <?php if( $value1["idfxetaria"] === $modalidade["idfxetaria"] ){ ?>selected="selected"<?php } ?>

                    value="<?php echo htmlspecialchars( $value1["idfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> a <?php echo htmlspecialchars( $value1["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> anos - <?php echo htmlspecialchars( $value1["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                <?php } ?> 
                  -->
                <?php $counter1=-1;  if( isset($faixaetaria) && ( is_array($faixaetaria) || $faixaetaria instanceof Traversable ) && sizeof($faixaetaria) ) foreach( $faixaetaria as $key1 => $value1 ){ $counter1++; ?>
                    <option <?php if( $value1["idfxetaria"] === $modalidade["idfxetaria"] ){ ?>selected="selected"<?php } ?> value="<?php echo htmlspecialchars( $value1["idfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> a <?php echo htmlspecialchars( $value1["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> anos - <?php echo htmlspecialchars( $value1["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                <?php } ?>
                <!--                    
                  <?php $counter1=-1;  if( isset($faixaetaria) && ( is_array($faixaetaria) || $faixaetaria instanceof Traversable ) && sizeof($faixaetaria) ) foreach( $faixaetaria as $key1 => $value1 ){ $counter1++; ?>
                  <option <?php if( $value1["idfxetaria"] ){ ?>selected="selected"<?php } ?> value="<?php echo htmlspecialchars( $value1["idfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> a <?php echo htmlspecialchars( $value1["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> anos - <?php echo htmlspecialchars( $value1["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                   <?php } ?>
                 -->
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
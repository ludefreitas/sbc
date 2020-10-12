<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Editar Turma 
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Espaço </h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/professor/turma/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" enctype="multipart/form-data">

          <div class="box-body">    
            <div class="form-group">
              <label for="descturma">Descrição da turma</label>
              <input type="text" class="form-control" id="descturma" name="descturma" placeholder="Descreva a turma"value="<?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="turma">Modalidade</label>
                <select class="form-control" name="idmodal">     
                  <?php $counter1=-1;  if( isset($modalidade) && ( is_array($modalidade) || $modalidade instanceof Traversable ) && sizeof($modalidade) ) foreach( $modalidade as $key1 => $value1 ){ $counter1++; ?>
                  <option <?php if( $value1["idmodal"] === $turma["idmodal"] ){ ?>selected="selected"<?php } ?> value="<?php echo htmlspecialchars( $value1["idmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nomemodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> a <?php echo htmlspecialchars( $value1["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> anos</option>
                  <?php } ?>                            
                </select>
            </div>            
            <div class="form-group">
              <label for="modalidade">Professor</label>
                <select class="form-control" name="iduser">     
                  <?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>
                  <option <?php if( $value1["iduser"] === $turma["iduser"] ){ ?>selected="selected"<?php } ?> value="<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <?php } ?>                            
                </select>
            </div>
            <div class="form-group">
              <label for="turma">Espaço - Crec</label>
                <select class="form-control" name="idespaco">     
                  <?php $counter1=-1;  if( isset($espaco) && ( is_array($espaco) || $espaco instanceof Traversable ) && sizeof($espaco) ) foreach( $espaco as $key1 => $value1 ){ $counter1++; ?>
                  <option <?php if( $value1["idespaco"] === $turma["idespaco"] ){ ?>selected="selected"<?php } ?> value="<?php echo htmlspecialchars( $value1["idespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nomeespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $value1["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <?php } ?>                            
                </select>
            </div>

            <div class="form-group">
              <label for="turma">Status</label>
                <select class="form-control" name="idturmastatus"> 

                  <?php $counter1=-1;  if( isset($turmastatus) && ( is_array($turmastatus) || $turmastatus instanceof Traversable ) && sizeof($turmastatus) ) foreach( $turmastatus as $key1 => $value1 ){ $counter1++; ?>
                  <option <?php if( $value1["idturmastatus"] === $turma["idturmastatus"] ){ ?>selected="selected"<?php } ?> value="<?php echo htmlspecialchars( $value1["idturmastatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["desstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <?php } ?>                            
                </select>
            </div>

            
           <div class="form-group">
              <label for="turma">Vagas</label>
              <input type="number" class="form-control" id="vagas" name="vagas" placeholder="Informe a quantidade de vagas" value="<?php echo htmlspecialchars( $turma["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="form-group">
              <label for="turma">Nº inicial de inscritos</label>
              <input type="number" class="form-control" id="numinscritos" name="numinscritos" placeholder="informe a quantidade inicial de inscritos" value="<?php echo htmlspecialchars( $turma["numinscritos"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
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
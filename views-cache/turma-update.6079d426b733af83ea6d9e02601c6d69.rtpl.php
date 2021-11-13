<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Editar Turma <?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/turma">Turmas</a></li>
    <li class="active"><a href="/admin/turma/create">Criar Turma</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        <?php if( $error != '' ){ ?>

            <div class="alert alert-danger" style="margin: 10px 10px 0px 10px">
        <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>

            </div>
        <?php } ?>

        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/turma/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" enctype="multipart/form-data">

          <div class="box-body"> 

           <div class="row">

            <div class="col-md-6">

              <div class="form-group">
                <label for="descturma">Descrição da turma</label>
                <input type="text" class="form-control" id="descturma" name="descturma" placeholder="Descreva a turma"value="<?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>

              <div class="form-group">
              <label for="turma">Modalidade</label>
                <select class="form-control" name="idmodal">     
                  <?php $counter1=-1;  if( isset($modalidade) && ( is_array($modalidade) || $modalidade instanceof Traversable ) && sizeof($modalidade) ) foreach( $modalidade as $key1 => $value1 ){ $counter1++; ?>

                  <option <?php if( $value1["idmodal"] === $turma["idmodal"] ){ ?>selected="selected"<?php } ?> value="<?php echo htmlspecialchars( $value1["idmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <?php } ?>                            
                </select>
            </div>  

            <div class="form-group">
              <label for="turma">Espaço - Crec</label>
                <select class="form-control" name="idespaco">     
                  <?php $counter1=-1;  if( isset($espaco) && ( is_array($espaco) || $espaco instanceof Traversable ) && sizeof($espaco) ) foreach( $espaco as $key1 => $value1 ){ $counter1++; ?>

                  <option <?php if( $value1["idespaco"] === $turma["idespaco"] ){ ?>selected="selected"<?php } ?> value="<?php echo htmlspecialchars( $value1["idespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nomeespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <?php } ?>                            
                </select>
            </div>          
              
            </div>

            <div class="col-md-6">

              <div class="form-group">
              <label for="turma">Atividade</label>
                <select class="form-control" name="idativ">     
                  <?php $counter1=-1;  if( isset($atividade) && ( is_array($atividade) || $atividade instanceof Traversable ) && sizeof($atividade) ) foreach( $atividade as $key1 => $value1 ){ $counter1++; ?>

                  <option <?php if( $value1["idativ"] === $turma["idativ"] ){ ?>selected="selected"<?php } ?> value="<?php echo htmlspecialchars( $value1["idativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nomeativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> a <?php echo htmlspecialchars( $value1["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> anos<?php echo htmlspecialchars( $value1["prograativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["origativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <?php } ?>                            
                </select>
            </div>            
            

            <div class="form-group">
              <label for="turma">Dia Semana - Horário</label>
                <select class="form-control" name="idhorario">     
                  <?php $counter1=-1;  if( isset($horario) && ( is_array($horario) || $horario instanceof Traversable ) && sizeof($horario) ) foreach( $horario as $key1 => $value1 ){ $counter1++; ?>

                  <option <?php if( $value1["idhorario"] === $turma["idhorario"] ){ ?>selected="selected"<?php } ?> value="<?php echo htmlspecialchars( $value1["idhorario"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $value1["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <?php } ?>                            
                </select>
            </div>

            
           <div class="form-group">
              <label for="turma">Vagas</label>
              <input type="number" class="form-control" id="vagas" name="vagas" placeholder="Informe a quantidade de vagas" value="<?php echo htmlspecialchars( $turma["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox" name="token" value="1" <?php if( $turma["token"] == 1 ){ ?>checked<?php } ?>> Tem token ?
              </label>
            </div>
              
            </div>
             
           </div>
            
        </div>                  
            
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
            &nbsp&nbsp&nbsp&nbsp
            <a type="button" class="btn btn-danger" href="javascript:window.history.go(-1)">Cancelar</a>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
document.querySelector('#file').addEventListener('change', function(){
  
  var file = new FileReader();

  file.onload = function() {
    
    document.querySelector('#image-preview').src = file.result;

  }

  file.readAsDataURL(this.files[0]);

});
</script>
<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Trumas
  </h1>
  <ol class="breadcrumb">
    <li><a href="/professor"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/professor/turma">Turma</a></li>
    <!--<li class="active"><a href="/professor/turma/create">Cadastrar</a></li>-->
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Nova Turma</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start --><form role="form" action="/professor/turma/create" method="post">
          <div class="box-body">

            <div class="form-group">
              <label for="descturma">Descrição da turma</label>
              <input type="text" class="form-control" id="descturma" name="descturma" placeholder="Descreva a turma">
            </div>
            <div class="form-group">
              <label for="temporada">Temporada</label>
              <input type="text" class="form-control" id="temporada" name="temporada" placeholder="Informe qual a temporada da turma">
            </div>
            
            <div class="form-group">
              <label for="turma">Professor</label>
                <select class="form-control" name="iduser">     
                  <?php $counter1=-1;  if( isset($user) && ( is_array($user) || $user instanceof Traversable ) && sizeof($user) ) foreach( $user as $key1 => $value1 ){ $counter1++; ?>
                  <option <?php if( $value1["iduser"] ){ ?>selected="selected"<?php } ?> value="<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <?php } ?>                            
                </select>
            </div>
            <div class="form-group">
              <label for="turma">Modalidade</label>
                <select class="form-control" name="idmodal">     
                  <?php $counter1=-1;  if( isset($modalidade) && ( is_array($modalidade) || $modalidade instanceof Traversable ) && sizeof($modalidade) ) foreach( $modalidade as $key1 => $value1 ){ $counter1++; ?>
                  <option <?php if( $value1["idmodal"] ){ ?>selected="selected"<?php } ?> value="<?php echo htmlspecialchars( $value1["idmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nomemodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <?php } ?>                            
                </select>
            </div>
            <div class="form-group">
              <label for="turma">Espaço - Crec</label>
                <select class="form-control" name="idespaco">     
                  <?php $counter1=-1;  if( isset($espaco) && ( is_array($espaco) || $espaco instanceof Traversable ) && sizeof($espaco) ) foreach( $espaco as $key1 => $value1 ){ $counter1++; ?>
                  <option <?php if( $value1["idespaco"] ){ ?>selected="selected"<?php } ?> value="<?php echo htmlspecialchars( $value1["idespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["nomeespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <?php } ?>                            
                </select>
            </div>
            <div class="form-group">
              <label for="turma">Status</label>
                <select class="form-control" name="idturmastatus">     
                  <?php $counter1=-1;  if( isset($turmastatus) && ( is_array($turmastatus) || $turmastatus instanceof Traversable ) && sizeof($turmastatus) ) foreach( $turmastatus as $key1 => $value1 ){ $counter1++; ?>
                  <option <?php if( $value1["idturmastatus"] ){ ?>selected="selected"<?php } ?> value="<?php echo htmlspecialchars( $value1["idturmastatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["desstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <?php } ?>                            
                </select>
            </div><div class="form-group">
              <label for="turma">Vagas</label>
              <input type="number" class="form-control" id="vagas" name="vagas" placeholder="Informe a quantidade de vagas">
            </div>
            <div class="form-group">
              <label for="turma">Nº inicial de inscritos</label>
              <input type="number" class="form-control" id="numinicialinscritos" name="numinicialinscritos" placeholder="informe a quantidade inicial de inscritos">
            </div>
            <div class="form-group">
              <label for="turma">Início das inscrições</label>
              <input type="date" class="form-control" id="dtinicinscricao" name="dtinicinscricao" placeholder="Informe a data do início das inscrições">
            </div>
            <div class="form-group">
              <label for="turma">Fim das inscrições</label>
              <input type="date" class="form-control" id="dtterminscricao" name="dtterminscricao" placeholder="Informe a data do término das inscrições">
            </div>
            <div class="form-group">
              <label for="turma">Início das matrículas</label>
              <input type="date" class="form-control" id="dtinicmatricula" name="dtinicmatricula" placeholder="Informe a data do início das matrículas">
            </div>
            <div class="form-group">
              <label for="turma">Fim das matrículas</label>
              <input type="date" class="form-control" id="dttermmatricula" name="dttermmatricula" placeholder="Informe a data do término das matrículas">
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
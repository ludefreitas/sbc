<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Cadastrar Nova Turma
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/turma">Turmas</a></li>
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
        <form role="form" action="/admin/turma/create" method="post">
          <div class="box-body">

            <div class="row">

              <div class="col-md-6">

                <div class="box-header">
                  <label for="descturma">Descrição da turma</label>
                   <input type="text" class="form-control" id="descturma" name="descturma" placeholder="Descreva a turma" value="<?php echo htmlspecialchars( $createTurmaValues["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>    

                <div class="box-header">
                  <label for="turma">Modalidade</label>
                  <select class="form-control" name="idmodal">
                  <option value="<?php echo htmlspecialchars( $createTurmaValues["idmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Selecione a modalidade</option>           
                  <?php $counter1=-1;  if( isset($modalidade) && ( is_array($modalidade) || $modalidade instanceof Traversable ) && sizeof($modalidade) ) foreach( $modalidade as $key1 => $value1 ){ $counter1++; ?>

                  <option value="<?php echo htmlspecialchars( $value1["idmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" ><?php echo htmlspecialchars( $value1["descmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </option>
                  <?php } ?>                            
                  </select>
                </div>  

                <div class="box-header">
                  <label for="turma">Espaço - Crec</label>
                  <select class="form-control" name="idespaco">
                  <option value="<?php echo htmlspecialchars( $createTurmaValues["idespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Selecione o Crec, o espaço e os horários</option>    
                  <?php $counter1=-1;  if( isset($espaco) && ( is_array($espaco) || $espaco instanceof Traversable ) && sizeof($espaco) ) foreach( $espaco as $key1 => $value1 ){ $counter1++; ?>

                  <option value="<?php echo htmlspecialchars( $value1["idespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["nomeespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <?php } ?>                            
                  </select>
                </div>   
                
            
                  
                 <div class="box-header">
                  <label for="turma">Atividade</label>
                  <select class="form-control" name="idativ">
                  <option value="<?php echo htmlspecialchars( $createTurmaValues["idativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Selecione a atividade e faixa etária</option>           
                  <?php $counter1=-1;  if( isset($atividade) && ( is_array($atividade) || $atividade instanceof Traversable ) && sizeof($atividade) ) foreach( $atividade as $key1 => $value1 ){ $counter1++; ?>

                  <option value="<?php echo htmlspecialchars( $value1["idativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nomeativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - 
                  <?php echo htmlspecialchars( $value1["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  - <?php echo htmlspecialchars( $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> a <?php echo htmlspecialchars( $value1["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> anos - <?php echo htmlspecialchars( $value1["prograativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["origativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <?php } ?>                            
                  </select>
                </div> 



                <div class="box-header">
                  <label for="turma">Dia Semana - Horário</label>
                  <select class="form-control" name="idhorario">
                  <option value="<?php echo htmlspecialchars( $createTurmaValues["idhorario"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Selecione o dia e o horários</option>    
                  <?php $counter1=-1;  if( isset($horario) && ( is_array($horario) || $horario instanceof Traversable ) && sizeof($horario) ) foreach( $horario as $key1 => $value1 ){ $counter1++; ?>

                  <option value="<?php echo htmlspecialchars( $value1["idhorario"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $value1["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </option>
                  <?php } ?>                            
                  </select>
                </div>  

                </div>

              <div class="col-md-6">

                <div class="box-header">
                  <label for="turma">Vagas público geral</label>
                  <input type="number" class="form-control" id="vagas" name="vagas" placeholder="Informe a quantidade de vagas público geral" value="<?php echo htmlspecialchars( $createTurmaValues["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>   

                <div class="box-header">
                  <label for="turma">Vagas público laudo</label>
                  <input type="number" class="form-control" id="vagaslaudo" name="vagaslaudo" placeholder="Informe a quantidade de vagas público com laudo" value="<?php echo htmlspecialchars( $createTurmaValues["vagaslaudo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>   

                <div class="box-header">
                  <label for="turma">Vagas PCD</label>
                  <input type="number" class="form-control" id="vagaspcd" name="vagaspcd" placeholder="Informe a quantidade de vagas público PCD " value="<?php echo htmlspecialchars( $createTurmaValues["vagaspcd"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>   

                <div class="box-header">
                  <label for="turma">Vagas vulnerabilidade social</label>
                  <input type="number" class="form-control" id="vagaspvs" name="vagaspvs" placeholder="Informe a quantidade de vagas público vulnerabilidade social" value="<?php echo htmlspecialchars( $createTurmaValues["vagaspvs"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>   
                
                <div class="">
                  <label>
                   &nbsp;&nbsp; <input type="checkbox" name="token" value="1"> Tem token ?
                  </label>
                </div>  
                
              </div>

            </div>
            
          </div>
          <div class="col-md-12">

             <div class="form-group">
              <label for="obs">Observação</label>
               <textarea type="text" class="form-control" id="obs" name="obs" placeholder="Observação" value=""></textarea> 
            </div>
            
          </div>
          <div class="box-footer">
            &nbsp;&nbsp;<button type="submit" class="btn btn-success">Cadastrar</button>
            &nbsp;&nbsp;&nbsp;&nbsp;
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
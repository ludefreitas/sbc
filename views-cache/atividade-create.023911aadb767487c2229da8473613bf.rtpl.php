<?php if(!class_exists('Rain\Tpl')){exit;}?>  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Criar Nova Atividade
    </h1>
    <ol class="breadcrumb">
      <li><a href="/professor"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="/professor/atividade">Atividades</a></li>
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

          <div class="box-body">                 
          <form role="form" action="/professor/atividade/create" method="post">

            <div class="col-md-6">

              <div class="box-header">
                <label for="nomeativ">Atividade</label>
                <input type="text" class="form-control" id="nomeativ" name="nomeativ" placeholder="Nome da atividade" value="<?php echo htmlspecialchars( $createAtivValues["nomeativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div> 

              <div class="box-header">
                <label for="descativ">Descrição</label>
                <input type="text" class="form-control" id="descativ" name="descativ" placeholder="Descreva a atividade" value="<?php echo htmlspecialchars( $createAtivValues["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>

              <div class="box-header">
                <label for="prograativ">Programa</label>
                <input type="text" class="form-control" id="prograativ" name="prograativ" placeholder="Informe qual é o programa" value="<?php echo htmlspecialchars( $createAtivValues["prograativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>    

               <div class="box-header">
                <label for="tipoativ">Tipo</label>
                <input type="text" class="form-control" id="tipoativ" name="tipoativ" placeholder="Informe qual o tipo da atividade (Terrestre ou Aquática)" value="<?php echo htmlspecialchars( $createAtivValues["tipoativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>                 

            </div>

            <div class="col-md-6"> 

              <div class="box-header">
                <label for="origativ">Origem</label>
                <input type="text" class="form-control" id="origativ" name="origativ" placeholder="Informe a origem da atividade" value="<?php echo htmlspecialchars( $createAtivValues["origativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>  

              <div class="box-header">
                <label for="geneativ">Gênero</label>
                <input type="text" class="form-control" id="geneativ" name="geneativ" placeholder="Informe o gênero da atividade" value="<?php echo htmlspecialchars( $createAtivValues["geneativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>            

              <div class="box-header">
                <label for="atividade">Faixa Etária</label>
                  <select class="form-control" name="idfxetaria">  
                  <option selected="selected" value="">Selecione</option>                   
                   <?php $counter1=-1;  if( isset($faixaetaria) && ( is_array($faixaetaria) || $faixaetaria instanceof Traversable ) && sizeof($faixaetaria) ) foreach( $faixaetaria as $key1 => $value1 ){ $counter1++; ?>

                    <option <?php if( $value1["idfxetaria"] ){ ?> <?php } ?> value="<?php echo htmlspecialchars( $value1["idfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> a <?php echo htmlspecialchars( $value1["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> anos - <?php echo htmlspecialchars( $value1["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                   <?php } ?>                            
                  </select>
              </div> 

                <div class="box-footer">
                  <button type="submit" class="btn btn-success">Cadastrar</button>
                    &nbsp&nbsp&nbsp&nbsp
                  <a type="button" class="btn btn-danger" href="/professor/atividade">Cancelar</a>              
                </div>        

            </div>          
            
          </form>
        </div>
         <!-- /.box-body -->
        </div>
    	</div>
    </div>

  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
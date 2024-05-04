<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Editar Atividade 
  </h1>
  <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="/admin/atividade">Atividades</a></li>
      <li><a href="/admin/atividade/create">Criar Nova Atividade</a></li>
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
        <form role="form" action="/admin/atividade/<?php echo htmlspecialchars( $atividade["idativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" enctype="multipart/form-data">

          <div class="box-body">

            <div class="row">

              <div class="col-md-6">

                <div class="form-group">
                  <label for="nomeativ">Nome</label>
                  <input type="text" class="form-control" id="nomeativ" name="nomeativ" placeholder="Digite o nome da atividade" value="<?php echo htmlspecialchars( $atividade["nomeativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label for="descativ">Descrição</label>
                  <input type="text" class="form-control" id="descativ" name="descativ" placeholder="Descreva a atividade" value="<?php echo htmlspecialchars( $atividade["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                    <label for="prograativ">Programa</label>
                    <select class="form-control" name="prograativ" id="prograativ">  
         
                        <option selected="selected" value="<?php echo htmlspecialchars( $atividade["prograativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $atividade["prograativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option> 
                        <option value="Hora do Treino">Hora do Treino</option>
                        <option value="Corpo em Ação">Corpo em Ação</option>
                        <option value="GR São Bernardo">GR São Bernardo</option>
                        <option value="Campeões da vida">Campeões da vida</option>
                                            
                    </select>
                </div>

                <div class="form-group">
                    <label for="tipoativ">Tipo</label>
                    <select class="form-control" name="tipoativ" id="tipoativ">  
                  
                        <option selected="selected" value="<?php echo htmlspecialchars( $atividade["tipoativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $atividade["tipoativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>  
                        <option value="Aquática">Aquática</option>
                        <option value="Terrestre">Terrestre</option>
                                            
                    </select>
                </div>
                
              </div>

              <div class="col-md-6">

                <div class="form-group">
                    <label for="origativ">Origem</label>
                    <select class="form-control" name="origativ" id="origativ">  
                    
                        <option selected="selected" value="<?php echo htmlspecialchars( $atividade["origativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $atividade["origativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>  
                        <option value="SESP">SESP</option>
                        <option value="PELC">PELC</option>
                        <option value="Voluntário">Voluntário</option>
                        <option value="Convênio Esportes">Convênio Esportes</option>
                                            
                  </select>
                </div>

                <div class="form-group">
                    <label for="geneativ">Gênero</label>
                    <select class="form-control" name="geneativ" id="geneativ">  

                        <option selected="selected" value="<?php echo htmlspecialchars( $atividade["geneativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $atividade["geneativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>   
                        <option value="Feminino">Feminino</option>
                        <option value="Masculino">Masculino</option>
                        <option value="">Ambos</option>
                                            
                    </select>
                </div>

                <div class="form-group">
                  <label for="atividade">Faixa Etária</label>
                  <select class="form-control" name="idfxetaria">                 
                  <?php $counter1=-1;  if( isset($faixaetaria) && ( is_array($faixaetaria) || $faixaetaria instanceof Traversable ) && sizeof($faixaetaria) ) foreach( $faixaetaria as $key1 => $value1 ){ $counter1++; ?>

                    <option <?php if( $value1["idfxetaria"] === $atividade["idfxetaria"] ){ ?>selected="selected"<?php } ?> value="<?php echo htmlspecialchars( $value1["idfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> a <?php echo htmlspecialchars( $value1["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> anos - <?php echo htmlspecialchars( $value1["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <?php } ?>                
                  </select>
                </div> 

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Salvar</button>
                  &nbsp&nbsp&nbsp&nbsp
            <a type="button" class="btn btn-danger" href="javascript:window.history.go(-1)">Cancelar</a>
                </div>  
                
              </div>

          </div>

        </div> 
        </form>                      
          <!-- /.box-body -->
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php if(!class_exists('Rain\Tpl')){exit;}?>

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista com <?php echo htmlspecialchars( $total, ENT_COMPAT, 'UTF-8', FALSE ); ?> turmas
  </h1>
  <ol class="breadcrumb">
    <li><a href="/professor"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/professor/turma"> Turmas</a></li>
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

            
            <div class="box-header">

              <a href="/professor/turma/create" class="btn btn-success">Cadastrar Turma</a>

              <div class="box-tools">
                <form action="/professor/turma">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="search" class="form-control pull-right" placeholder="Search" value="<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </form>
              </div>

            </div>

            <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
              
            <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
              <div class="row">

              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">
                 Descrição da turma</br>período
                </h5>
              </div>                  
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                    Faixa etária
                </h5>
              </div>
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                    Local
                </h5>
              </div>

              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                    Horário
                </h5>
              </div>

              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                     Status
                </h5>
              </div>

              <div class="col-md-1" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                    Vagas
                </h5>
              </div>          

            </div>
          </div>

            <?php $counter1=-1;  if( isset($turma) && ( is_array($turma) || $turma instanceof Traversable ) && sizeof($turma) ) foreach( $turma as $key1 => $value1 ){ $counter1++; ?>

            <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
              <div class="row">

              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">
                 <?php echo htmlspecialchars( $value1["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?></br><?php echo htmlspecialchars( $value1["periodo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                </h5>
              </div>                  

              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                    <td><?php echo htmlspecialchars( $value1["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </br> <?php echo htmlspecialchars( $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> a <?php echo htmlspecialchars( $value1["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> anos</td>
                </h5>
              </div>
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                    <?php echo htmlspecialchars( $value1["nomeespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                </h5>
              </div>

              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                    <?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </br> <?php echo htmlspecialchars( $value1["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ás <?php echo htmlspecialchars( $value1["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                </h5>
              </div>

              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                     <td><?php echo htmlspecialchars( $value1["desstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                </h5>
              </div>

              <div class="col-md-1" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                    <td><?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                </h5>
              </div>

              <div class="col-md-1" style="margin: 2; padding: 2">
                <a href="/professor/turma/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                <br><br>
                      <a href="/professor/turma/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir a turma de <?php echo htmlspecialchars( $value1["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $value1["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ás <?php echo htmlspecialchars( $value1["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["periodo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
              </div>

            </div>
          </div>
          <?php } ?>



            
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>

                <li><a href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                <?php } ?>

              </ul>
            </div>

            <!-- /.box-body -->

            <button type="button" onclick="window.print()" class="btn btn-primary pull-right" style="margin-right: 5px;">
                <i class="fa fa-print"></i> Imprimir
            </button>

          </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
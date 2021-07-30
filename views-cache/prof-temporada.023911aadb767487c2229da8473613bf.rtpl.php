<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista dos professores da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/professor"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/professor/users">Usuários</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
            
            <div class="box-header">
              <?php if( $error != '' ){ ?>
                <div class="alert alert-danger" style="margin: 0px 10px 0px 10px">
                    <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
                <?php }else{ ?>
              <!--
              <a href="/professor/users/create" class="btn btn-success">Cadastrar Usuário</a>
            -->
            
            <div class="box-tools">
                <form action="/professor/prof">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <!--<input type="text" name="search" class="form-control pull-right" placeholder="Search" value="">
                    <div class="input-group-btn">
                     -->
                     <!--
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    -->
                    </div>
                  </div>
                </form>
              </div>

              </div>

            <div class="box-body no-padding">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nome</th>
                    
                    <th></th>
                     <th></th>
                  </tr>
                </thead>
                <tbody>

                  <?php $counter1=-1;  if( isset($prof) && ( is_array($prof) || $prof instanceof Traversable ) && sizeof($prof) ) foreach( $prof as $key1 => $value1 ){ $counter1++; ?>
                  <tr>
                    <td><?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    
                    <td>                     

                     <a href="/professor/turma-temporada/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/user/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-success btn-xs"><i class=""></i>Turmas do professor(a) <br><?php echo htmlspecialchars( $value1["apelidoperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
                    </td>

                    <td>
                      
                      <a href="/professor/turmatemporada/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/turma/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-info btn-xs"><i class=""></i> Inserir ou remover <br> turma do professor(a)</a>                      
                    </td>
                    
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>           

            <!-- /.box-body -->
            <button type="button" onclick="window.print()" class="btn btn-primary pull-right" style="margin-right: 5px;">
                <i class="fa fa-print"></i> Imprimir
            </button>
          </div>           
    </div>
  </div>
    <?php } ?>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista com <?php echo htmlspecialchars( $total, ENT_COMPAT, 'UTF-8', FALSE ); ?> estagiários
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
            
            <div class="box-header">
              <!--
              <a href="/admin/users/create" class="btn btn-success">Cadastrar Usuário</a>
            -->
            
            <div class="box-tools">
                <form action="/admin/prof">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="search" class="form-control pull-right" placeholder="Search" value="">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </form>
              </div>

              </div>
              <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
              <div class="row">
              </div>

            <?php $counter1=-1;  if( isset($estagiarios) && ( is_array($estagiarios) || $estagiarios instanceof Traversable ) && sizeof($estagiarios) ) foreach( $estagiarios as $key1 => $value1 ){ $counter1++; ?>
            <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
              <div class="row">
              <div class="col-md-10" >
                <h5 style="text-align: left;">
                  <strong><?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
                  &nbsp; <?php echo htmlspecialchars( $value1["deslogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                  <strong>Tel.: <?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
                  &nbsp;status: <?php if( $value1["statususer"] == 1 ){ ?>Ativo<?php }else{ ?>Inativo<?php } ?>
                  <?php if( $value1["isestagiario"] == 1 ){ ?>
                  <strong>&nbsp;Estagiário</strong>
                  <?php } ?>
                  <?php if( $value1["isprof"] == 1 ){ ?>
                  <strong>Professor</strong>
                  <?php } ?>
                  <?php if( $value1["inadmin"] == 1 ){ ?>
                  <strong>&nbsp;Admin</strong>
                  <?php } ?>
                </h5>
              </div>  
              
              
              <div class="col-md-2" >
                  <a href="/admin/users/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-success"></i>Admin / Prof</a>
              </div>
            </div>           
            </div>
            <?php } ?>
            
              </div>
          </div>
            </div>
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
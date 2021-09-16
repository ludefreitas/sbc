<?php if(!class_exists('Rain\Tpl')){exit;}?><style>
@media print {
    .header-area,
    .site-branding-area,
    .sticky-wrapper,
    .footer-top-area,
    .footer-bottom-area,
    .single-product-area .col-md-3,
    .button.alt,
    .product-big-title-area {
        display:none!important;
    }
    .single-product-area .col-md-9 {
        width: 100%!important;
    }
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista com <?php echo htmlspecialchars( $total, ENT_COMPAT, 'UTF-8', FALSE ); ?> alunos
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/admin/pessoas">Alunos</a></li>
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

              <div class="box-tools">
                <form action="/admin/pessoas">
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
              <div class="row">
              </div>

            <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
              <div class="row">
              <div class="col-md-3" >
                <h5 style="font-weight: bold; text-align: left;">
                  Nome do aluno     
                </h5>
              </div>

              <div class="col-md-2" >
                <h5 style="font-weight: bold; text-align: left;">
                 Data Nasc.
                </h5>
              </div>

              <div class="col-md-1" >
                <h5 style="font-weight: bold; text-align: left;">
                 Idade
                </h5>
              </div>
              <div class="col-md-2" >
                <h5 style="font-weight: bold; text-align: left;">
                 Nome do responsável
                </h5>
              </div>
              <div class="col-md-1" >
                <h5 style="font-weight: bold; text-align: left;">
                  Status
                </h5>
              </div>
              <div class="col-md-1" >
                <h5 style="font-weight: bold; text-align: left;">
                </h5>
              </div>
            </div>           
            </div>
           
            <?php $counter1=-1;  if( isset($pessoas) && ( is_array($pessoas) || $pessoas instanceof Traversable ) && sizeof($pessoas) ) foreach( $pessoas as $key1 => $value1 ){ $counter1++; ?>
            <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
              <div class="row">
              <div class="col-md-3" >
                <h5 style="font-weight: bold; text-align: left;">
                  <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>                    
                    
                </h5>
              </div>
              <div class="col-md-2" >
                <h5 style="font-weight: bold; text-align: left;">
                 <?php echo formatDate($value1["dtnasc"]); ?>
                </h5>
              </div>
              <div class="col-md-1" >
                <h5 style="font-weight: bold; text-align: left;">
                  <?php echo calcularIdade($value1["dtnasc"]); ?>
                </h5>
              </div>
              <div class="col-md-2" >
                <h5 style="font-weight: bold; text-align: left;">
                  <td><?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                </h5>
              </div>
              <div class="col-md-1" >
                <h5 style="font-weight: bold; text-align: left;">
                  <?php if( $value1["statuspessoa"] == 1 ){ ?>Ativo<?php }else{ ?>Inativo<?php } ?>
                </h5>
              </div>
              <div class="col-md-1" >
                <h5 style="font-weight: bold; text-align: left;">
                  <?php if( $value1["pcd"] == 1 ){ ?>PCD<?php } ?>
                </h5>
              </div>
              <div class="col-md-2" >
                   <a href="/admin/insc/pessoa/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Consulta inscrições</a>
              </div>
            </div>           
            </div>
            <?php } ?>
            
              </div>
          </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
                <li><a href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                <?php } ?>
              </ul>
            </div>
            
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
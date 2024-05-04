<?php if(!class_exists('Rain\Tpl')){exit;}?><script type="text/javascript">

      function VerificaInscricaoModalidade(nomepess){

        let nome = nomepess;

        let checkbox = document.getElementById("checkbox");
        const isChecked = checkbox.checked;
        if (isChecked) {
          alert('Existem uma ou mais inscrições válidas para o(a) '+nome+' nesta modalidade em outro Centro Esportivo. Clique em "Todas inscrições de '+nomepess+'" para ver mais detalhes.')
        } 
      }   

</script>

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h5>
     Seleciona as inscrições, da qual você queira remover da temporada <?php echo htmlspecialchars( $desctemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?> e clique em enviar.<br>
     
  </h5>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a style="color: red" href="javascript: history.go(-1)">Voltar</a>
    </li>
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
           
            </div> 
           
      
          
           <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">

          <?php $counter1=-1;  if( isset($insc) && ( is_array($insc) || $insc instanceof Traversable ) && sizeof($insc) ) foreach( $insc as $key1 => $value1 ){ $counter1++; ?>
            <?php if( ($value1["idinscstatus"] != 8) AND ($value1["idinscstatus"] != 9) ){ ?>
            <div class="box-body" style=" margin: 5px;">
              <div <?php echo colorStatus($value1["idinscstatus"]); ?> style="margin: 5px" class="row">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-12" style="margin: 2; padding: 2">
                    <h5 style="text-align: left;">

                     
                      

                      

                      <span style="font-weight: bold;">Insc.: <?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - </span>
                      
                      (<?php echo htmlspecialchars( $value1["idcart"], ENT_COMPAT, 'UTF-8', FALSE ); ?>) -

                      <span style="font-weight: bold;">Data insc.: <?php echo formatDate($value1["dtinsc"]); ?></span>
                      

                      <br>
                      <span style="font-weight: bold;">  Turma: <span style="color: orange;"> [<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>] </span> <?php echo htmlspecialchars( $value1["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  </span>
                       - <?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  
                      <br>
                      
                     

                      <span style="font-weight: bold; text-align: left; color: darkblue;">  
                        <?php if( $value1["inscpcd"] == 1 ){ ?> PCD &nbsp;&nbsp;<?php } ?>  
                      </span>        

                      <span style="font-weight: bold; text-align: left; color: darkgreen;">                  
                        <?php if( $value1["laudo"] == 1 ){ ?>LAUDO  &nbsp;&nbsp;<?php } ?>
                       </span>
                   

                    <?php if( $value1["idinscstatus"] == 1 ){ ?>              
                    <span style="font-weight: bold; text-align: left; color: blue;">                  
                      <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    </span>             
                    <?php } ?>

                  
              
                    <?php if( $value1["idinscstatus"] == 2 ){ ?>
              
                    <span style="font-weight: bold; text-align: left; color: darkgreen;">                  
                      <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    </span>
             
                    <?php } ?>
               

                      <?php if( $value1["idinscstatus"] == 3 ){ ?>
                      
                        <span style="font-weight: bold; text-align: left; color: green;">                  
                          <span>*<?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>*</span>
                        </span>
                      
                      <?php } ?>

                      <?php if( $value1["idinscstatus"] == 6 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: darkorange;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>


                      <?php if( $value1["idinscstatus"] == 7 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: darkblue;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>

                      
                      <?php if( $value1["idinscstatus"] == 8 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: orange;">                  
                          Status: <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>
                      
                      <?php if( $value1["idinscstatus"] == 9 ){ ?>
                      
                        <span style="font-weight: bold; text-align: left; color: red;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      
                      <?php } ?> 

                      
                       </h5>
                      <a href="/admin/insc/delete/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idcart"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn-sm btn-danger">Excluir</a> 
                  </div>
                </div>
              </div>
            </div>
          </div>

          <?php } ?>

          <?php }else{ ?>

          <div class="box-body" style=" margin: 5px;">
            <span style="color: darkgreen; font-weight: bold;"> NÃO HÁ INSCRIÇÕES VAZIAS </span>
          </div>
           
          <?php } ?>
          
          
          
          </div>     
         
            <!-- /.box-body -->

            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
                <li><a href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                <?php } ?>
              </ul>
            </div>

          </div>
    </div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->




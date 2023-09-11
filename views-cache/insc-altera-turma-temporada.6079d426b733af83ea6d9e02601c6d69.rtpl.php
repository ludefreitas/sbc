<?php if(!class_exists('Rain\Tpl')){exit;}?><script type="text/javascript">

      function requisitarPaginaEndereco(url){

        let ajax = new XMLHttpRequest();
        let idurl = url.substr(53);              
        ajax.open('GET', 'url');
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          if(result){              
                alert(result)
          }else{
            alert('Endereço não encontrado!')
          }
        });
      }   

</script>

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h5>
     Seleciona as inscrições, a turma e a temporada de destino.<br>
     [<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>]  - <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $turma["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $turma["periodo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $turma["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
  </h5>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/admin/turma-temporada/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Turmas por temporada</a></li>
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
          <?php if( $success != '' ){ ?>
                <div class="alert alert-success" style="margin: 10px 10px 0px 10px">
            <?php echo htmlspecialchars( $success, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
          <?php } ?>
            
            <div class="box-header">
           
            </div> 
           
      <form action="/admin/insc/altera/turma" method="post">
          
           <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">

          <?php $counter1=-1;  if( isset($inscTodas) && ( is_array($inscTodas) || $inscTodas instanceof Traversable ) && sizeof($inscTodas) ) foreach( $inscTodas as $key1 => $value1 ){ $counter1++; ?>
            <?php if( ($value1["idinscstatus"] != 8) AND ($value1["idinscstatus"] != 9) ){ ?>
            <div class="box-body" style=" margin: 5px;">
              <div <?php echo colorStatus($value1["idinscstatus"]); ?> style="margin: 5px" class="row">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-12" style="margin: 2; padding: 2">
                    <h5 style="text-align: left;">


                      <input type="checkbox" name="listaInsc[]" value="<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">  &nbsp;&nbsp;&nbsp;

                      <?php echo htmlspecialchars( $value1["numordem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>º -
                      <strong>[<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>] - <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
                      &nbsp;<?php echo formatCpf($value1["numcpf"]); ?>&nbsp;
                      <strong><?php echo calcularIdade($value1["dtnasc"]); ?> anos</strong>
                      &nbsp;Nascim.: <?php echo formatDate($value1["dtnasc"]); ?>&nbsp;
                       <strong>Dt Insc.: <?php echo formatDate($value1["dtinsc"]); ?></strong>
                      &nbsp;Dt Matric.: <?php echo formatDate($value1["dtmatric"]); ?>&nbsp;
                    
                        &nbsp;&nbsp;&nbsp;

                      <span style="font-weight: bold; text-align: left; color: brown;">                  
                        <?php if( $value1["vulnsocial"] == 1 ){ ?> (Vuln. Social) &nbsp;&nbsp;<?php } ?>
                      </span>                
                      
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
                  </div>
                </div>
              </div>
            </div>
          </div>

          <?php } ?>
           
          <?php } ?>
          <label>
          Turma de destino: &nbsp;&nbsp;
          <input type="text" name="idturmadestino" style="width: 40px">
          Temporada/Ano: &nbsp;&nbsp;
          <input type="text" name="desctemporadadestino" style="width: 40px" placeholder=""><br>
          <input type="radio" name="tipomove" value="copiar" style="width: 20px">Copiar &nbsp;&nbsp;
          <input type="radio" name="tipomove" value="substituir" style="width: 20px">Substituir<br>
          Motivo da troca: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" name="observacao" style="width:320px"><br><br>           
          <input hidden type="text" name="idtemporada" value="<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="width:320px">        
          
          <input class="btn btn-success" type="submit" name="altera">
          </label>
             </form>
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




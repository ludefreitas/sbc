<?php if(!class_exists('Rain\Tpl')){exit;}?>
 <div class="container" style="margin-top: 0px;"> <!-- container 1 -->
            <div class="row"> <!-- row 2 -->
              <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 0px 0px 0px 0px;">

<div class="container" style="margin: 0px 0px 0px 0px; ">

  

  <?php if( $error != '' ){ ?>
    <div class="alert alert-danger">
      <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
    </div>
  <?php } ?>
  </div>
  
 <hr style="background-color: #0f71b3;">

  <div class="container"> <!-- container 3 -->
    <div class="row"> <!-- row 4 --> 

      <div class="col-md-12">
      <?php $counter1=-1;  if( isset($evento) && ( is_array($evento) || $evento instanceof Traversable ) && sizeof($evento) ) foreach( $evento as $key1 => $value1 ){ $counter1++; ?>

            <?php if( $value1["imagem_evento"] ){ ?>
            
            <div class="row">              
              <div class="col-md-12" style="text-align: center; margin: 10px 0px 10px 0px;">
                <a href="" class="">
                  
                  <img src="<?php echo htmlspecialchars( $value1["imagem_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="Perdendo Medo" height="724" width="1024">
                  
                </a>                 
              </div>
            </div>
            <?php } ?>

            <div class="row">

              

              <?php if( $value1["pdf_regras_evento"] != '' ){ ?>
                <?php if( $value1["tem_insc"] == 1 ){ ?>
                  <div class="col-md-3">
                      
                  </div>

                  <div class="col-md-6" style="text-align-last: center; margin: 0px 0px 0px 0px;">
                    <a class="btn" href="" style="color: white; background-color: red;">
                      Clique aqui <br> para fazer sua inscrição !!!
                    </a>                 
                  </div> 

                  <div class="col-md-3" style="text-align-last: center; margin: 0px 0px 0px 0px;">
                    <a class="btn" href="<?php echo htmlspecialchars( $value1["pdf_regras_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: white; background-color: green;">
                      Regras<br> do evento
                    </a>                 
                  </div> 

                <?php } ?>
              <?php }else{ ?>
                <?php if( $value1["tem_insc"] == 1 ){ ?>
                <div class="col-md-2" style="text-align-last: center; margin: 0px 0px 0px 0px;">
                  <a class="btn" href="" style="color: white; background-color: red;">
                    Clique aqui <br> para fazer sua inscrição !!!
                  </a>                 
                </div> 
                <?php } ?>
              <?php } ?>

              
             
            </div>  

      
      <?php } ?> 
      </div>    
            
    </div> <!-- row 4 -->
  </div> <!-- container 3 -->

<hr style="background-color: #0f71b3;">
  
  <span style="font-size 12px;"> Dúvidas, sugestões e reclamações: </span>
           <strong style="font-size 16px; color: darkorange">contato@cursosesportivossbc.com</strong> 

<hr style="background-color: #0f71b3;">
  
  </div> <!-- final da index -->

  
                </div>
                

              </div>


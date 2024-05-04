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
        <?php $counter1=-1;  if( isset($eventos) && ( is_array($eventos) || $eventos instanceof Traversable ) && sizeof($eventos) ) foreach( $eventos as $key1 => $value1 ){ $counter1++; ?>

            <?php if( $value1["divulgar_evento"] == 1 ){ ?>

            <div class="col-md-12 btn" style="text-align-last: left; background-color: #0f71b3; ; border: 5px white; margin: 0px 5px 5px 5px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
                <a href="/evento/<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">                          
                <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 18px; font-style: normal; margin: 10px 5px 10px 0px; ">  
                    <?php echo htmlspecialchars( $value1["desc_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - 
                    <br>Data: <?php echo formatDate($value1["dia_inicio_evento"]); ?> às <?php echo htmlspecialchars( $value1["hora_inicio_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?> 
                    <br>Local: <?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>      
                </div>
                </a>
            </div>  
            <?php } ?>

        <?php }else{ ?> 
            <div class="col-md-12 btn" style="text-align-last: left; background-color: lightcoral ; border: 5px white; margin: 0px 5px 5px 5px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
                <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 18px; font-style: normal; margin: 10px 5px 10px 0px; ">  
                    Não há heventos programados!
                    <br>
                    Aguardem, em breve teremos novidades!             
                </div>   
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


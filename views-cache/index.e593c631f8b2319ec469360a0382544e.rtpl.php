<?php if(!class_exists('Rain\Tpl')){exit;}?>
 <div class="container" style="margin-top: 0px;"> <!-- container 1 -->
            <div class="row"> <!-- row 2 -->
              <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 0px 0px 0px 0px;">

<div class="container" style="margin: 0px 0px 0px 0px; ">
<?php if( $profileMsg != '' ){ ?>
    <div class="alert alert-success">
      <?php echo htmlspecialchars( $profileMsg, ENT_COMPAT, 'UTF-8', FALSE ); ?>
    </div>
  <?php } ?>
  

  <?php if( $error != '' ){ ?>
    <div class="alert alert-danger">
      <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
    </div>
  <?php } ?>
  </div>
  
 <hr style="background-color: #0f71b3;">

  <div class="container"> <!-- container 3 -->
    <div class="row"> <!-- row 4 --> 

      <?php $counter1=-1;  if( isset($locais) && ( is_array($locais) || $locais instanceof Traversable ) && sizeof($locais) ) foreach( $locais as $key1 => $value1 ){ $counter1++; ?>
            
          <?php if( $value1["idlocal"] == 3 ){ ?>          

            <div class="row">              
              <div class="col-md-12" style="text-align: center; margin: 10px 0px 10px 0px;">
                <a href="/cursos/modalidades/local/<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="">
                  <img src="/../res/site/img/projeto_perdendo_medo5.jpg" title="Perdendo Medo" height="724" width="1024">
                  
                </a>                 
              </div>
            </div>
            <div class="row">

              <div class="col-md-4" style="text-align: center; margin: 0px 0px 0px 0px;">
                
              </div> 

              <div class="col-md-4" style="text-align-last: center; margin: 0px 0px 0px 0px;">
                <a class="btn" href="/cursos/modalidades/local/<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: white; background-color: #0f71b3">
                  Clique aqui para fazer sua inscrição !!!
                </a>                 
              </div> 

              <div class="col-md-4" style="text-align: center; margin: 0px 0px 0px 0px;">

              </div>
            </div>            

          <?php } ?>


      <?php } ?>   

     
            
    </div> <!-- row 4 -->
  </div> <!-- container 3 -->

<hr style="background-color: #0f71b3;">

  <span style="font-size 12px;"> Dúvidas, sugestões e reclamações: </span>
           <strong style="font-size 16px; color: darkorange">contato@cursosesportivossbc.com</strong> 

<hr style="background-color: #0f71b3;">
  
  </div> <!-- final da index -->

  
                </div>
                

              </div>


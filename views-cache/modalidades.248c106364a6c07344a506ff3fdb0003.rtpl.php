<?php if(!class_exists('Rain\Tpl')){exit;}?>
 <div class="container"> <!-- container 1 -->
            <div class="row"> <!-- row 2 -->
              <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 5px 0px 0px 0px;">

<div class="container" style="margin: 0px 0px 0px 0px; ">
  <div class="row">   

    <?php if( $error != '' ){ ?>
    <div class="alert alert-danger">
      <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
    </div>
  
 <?php }else{ ?>

  <div class="col-md-12" style="color: black; text-align-last: center; font-size: 20px;">

      <div>
         ETAPA <span style="font-weight: bold;">2</span> de <span style="font-weight: bold;">5</span> 
      </div>


    </div>


  <div class="col-md-12" style="text-align-last: left; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; border-radius: 15px;"> 

    <?php if( checkLogin(false) ){ ?>        
            
          <span style="color: black; font-weight: bold;">  <?php echo getUserName(); ?> </span>!<br>
          Selecione abaixo uma MODALIDADE para praticar, escolha a turma e faça a sua inscrição ou a inscrição de seu dependente.

    <?php }else{ ?>      
           
      
            <a href="/user-create">             
                     CADASTRE-SE               
            </a> 
             <span> ou faça o  </span>           
            <a href="/login" >                
                 LOGIN 
            </a>
            e selecione abaixo uma MODALIDADE para praticar, escolha a turma e faça a sua inscrição ou a inscrição de seu dependente.
          
      <?php } ?>

  </div>
 <?php } ?>

  </div>
</div>
<hr style="background-color: orange;">

<?php $counter1=-1;  if( isset($modalidades) && ( is_array($modalidades) || $modalidades instanceof Traversable ) && sizeof($modalidades) ) foreach( $modalidades as $key1 => $value1 ){ $counter1++; ?>
  <div class="container"> <!-- container 3 -->
    <div class="row"> <!-- row 4 -->
      
      <!-- <div class="col-md-4" col-sm-1 style="text-align-last: left; background-color: white; margin: 5px 0px 5px 0px; padding-right: 0px">                            

                    <img class="img-responsive" style="width: 282px; height: 179px" id="image-preview" src="" alt="Foto">                                   
      </div> -->                             
      
      <div class="col-md-12" style="text-align-last: left; line-height: 20px;  font-size: 20px; font-style: normal; margin: 5px 0px 5px 0px; padding: 0px 0px 0px 0px">

        <div class="container">
          <div class="row alert-warning">
            <div class="col-md-6" style="margin: 10px 0px 5px 0px; ">
              <?php if( $value1["idmodal"] != 17 ){ ?>
              <a style="color: #0f71b3; text-decoration: none; font-weight: bold;" href="/modalidade/<?php echo htmlspecialchars( $value1["idmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                <?php echo htmlspecialchars( $value1["descmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
              </a>
              <?php }else{ ?>
              <a style="color: #0f71b3; text-decoration: none; font-weight: bold;" href="/judo">
                Judô<br>
              </a>
              <?php } ?>
            </div>
            <div class="col-md-6" style="text-align-last: center; margin: 5px 0px 5px 0px; color: white; padding: 0px 0px 0px 0px">
              <?php if( $value1["idmodal"] != 17 ){ ?>
              <a class="card card-just-text" style="background-color: #cc5d1e; color: white; padding: 5px 0px 5px 0px;  text-decoration: none" href="/modalidade/<?php echo htmlspecialchars( $value1["idmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" text-decoration="none">Cursos dísponíveis
              </a>
              <?php }else{ ?>
              <a class="card card-just-text" style="background-color: #cc5d1e; color: white; padding: 5px 0px 5px 0px;  text-decoration: none" href="/judo" text-decoration="none">Cursos dísponíveis
              </a>
              <?php } ?>
              
            </div>
          </div>
        </div>
      </div>                        
    </div> <!-- row 4 -->
  </div> <!-- container 3 -->
<?php } ?>
<hr style="background-color: orange;">
<div class="row" style="margin: -5px -5px -5px -5px; padding-top: 20px; ">    
<div class="col-md-12" style="text-align-last: left; background-color: #0f71b3; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
    <a href="/locais">                          
      <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 14px; font-style: normal; margin: 10px 5px 10px 0px; ">                                               
          Cursos por Centro Esportivo
      </div>
    </a>
  </div>

 </div>
 <hr style="background-color: orange;">

</div> <!-- final da index -->



<?php if(!class_exists('Rain\Tpl')){exit;}?>
 <div class="container"> <!-- container 1 -->
            <div class="row"> <!-- row 2 -->
              <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 15px 0px 0px 0px;">

<div class="container" style="margin: 0px 0px 0px 0px; ">
  <div class="row">   


    <?php if( $error != '' ){ ?>
    <div class="alert alert-danger">
      <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
    </div>
  
    <?php }else{ ?>
  
  <div class="col-md-12" style="text-align-last: left; background-color:#0f71b3; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;"> 
    <a href="/locais">           
      <div style="text-align-last: center; font-weight: bold; line-height: 30px; color: white; font-size: 14sx; font-style: normal; margin: 10px 5px 10px 5px; ">                                               
          Selecione abaixo um CREC / LOCAL, escolha a atividade e faça sua inscrição.
      </div>
    </a>
  </div> 
  <?php } ?>

  </div>
</div>
<hr style="background-color: orange;">

<div class="container"> <!-- container 3 -->
    <div class="row" style="te"> <!-- row 4 -->   
     
      <?php $counter1=-1;  if( isset($locais) && ( is_array($locais) || $locais instanceof Traversable ) && sizeof($locais) ) foreach( $locais as $key1 => $value1 ){ $counter1++; ?>
            
                   
                      
                    <h5>                 
                    
                    <a  href="/modalidades/local/<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn" style="background-color: #0f71b3; color: white; font-weight: bold; justify-content: flex-end; margin: 5px; padding-top: 20px; padding-bottom: 20px; font-size: 18px; width: 150px; text-align: center;" ><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></h5>

      <?php } ?>
      
            
    </div> <!-- row 4 -->
  </div> <!-- container 3 -->

<hr style="background-color: orange;">

<div class="row" style="margin: -5px -5px -5px -5px; padding-top: 20px; ">    
  <div class="col-md-12" style="text-align-last: left; background-color: #cc5d1e; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;"> 
    <a href="/modalidades">           
      <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 14px; font-style: normal; margin: 10px 5px 10px 5px; ">                                               
          Turmas por modalidades
      </div>
    </a>
  </div> 
  <hr style="background-color: orange;">
</div> <!-- final da index -->
<hr style="background-color: orange;">



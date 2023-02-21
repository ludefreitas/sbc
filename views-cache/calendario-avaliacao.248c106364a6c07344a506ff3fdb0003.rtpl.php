<?php if(!class_exists('Rain\Tpl')){exit;}?><script type="text/javascript">

</script>

 <div class="container" style="margin-top: 0px;"> <!-- container 1 -->
            <div class="row"> <!-- row 2 -->
              <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 0px 0px 0px 0px;">

<div class="container" style="margin: 0px 0px 0px 0px; ">
<?php if( $error != '' ){ ?>
    <div class="alert alert-success">
      <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
    </div>
  <?php } ?>
  
  </div>


  <div class="row" style="margin: -5px -5px -5px -5px; ">   
  <div class="col-md-12" style="border: 5px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif;">     
       <div style="text-align: justify; line-height: 20px; color: blue; font-size: 14px; font-style: italic; margin: 0px 5px 0px 5px; ">     
            <?php if( checkLogin(false) ){ ?>  
                <span style="color: blue; font-weight: bold;">Olá </span>
                <span style="color: black; font-weight: bold;">  <?php echo getUserName(); ?>, </span>
                <span style="color: blue; font-weight: bold;">seja bem vindo!</span> <br><br>
            <?php }else{ ?>
                Olá! seja bem vindo! <br><br>
            <?php } ?>
        </div>
  </div> 

  </div>
 
  <hr style="background-color: #0f71b3;">
  <div class="row" style="margin: -5px -5px -5px -5px; ">   
  <div class="col-md-12" style="border: 5px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif;"> 
    
      <div style="text-align-last: center; font-weight: bold; line-height: 15px; color: #0f71b3; font-size: 10px; font-style: italic; margin: 0px 5px 0px 5px; ">                                               
          CLIQUE EM UM DOS BOTÕES ABAIXO PARA SELECIONAR UMA DATA E AGENDE SUA AVALIAÇÃO DA NATAÇÃO
      </div>
   
  </div> 

  </div>
  <hr style="background-color: #0f71b3;">
  
  <!--
  
  <div class="container">
    <div class="row"> 
     
      <?php $counter1=-1;  if( isset($locais) && ( is_array($locais) || $locais instanceof Traversable ) && sizeof($locais) ) foreach( $locais as $key1 => $value1 ){ $counter1++; ?>
            
                   
                      
                    <h5>                 
                    
                    <a  href="/modalidades/local/<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn" style="background-color: #0f71b3; color: white; font-weight: bold; justify-content: flex-end; margin: 5px; padding-top: 20px; padding-bottom: 20px; font-size: 18px; width: 180px; text-align: center;" ><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></h5>

      <?php } ?>
      
            
    </div> 
  </div> 
  
  -->


<!--

  <div class="container"> 
    <div class="row">
     
      <?php $counter1=-1;  if( isset($locais) && ( is_array($locais) || $locais instanceof Traversable ) && sizeof($locais) ) foreach( $locais as $key1 => $value1 ){ $counter1++; ?>
            
                   
                      
                    <h5>                 
                    
                    <a  href="/modalidades/local/<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn" style="background-color: #0f71b3; color: white; font-weight: bold; justify-content: flex-end; margin: 5px; padding-top: 20px; padding-bottom: 20px; font-size: 18px; width: 150px; text-align: center;" ><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></h5>

      <?php } ?>
      
            
    </div> 
  </div> 
-->



  <div class="container"> 
    <div class="row">    
            
                   
         <div class="col-md-5 btn" style="text-align-last: left; background-color: #0f71b3; border: 5px white; margin: 0px 5px 5px 5px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
            <a href="/locais">                          
                <div style="text-align-last: center; font-weight: 200; line-height: 30px; color: white; font-size: 24px; font-style: normal; margin: 10px 5px 10px 0px; ">                                               
                          02 <br> Março <br> Quinta-feira
                  </div>
            </a>
        </div>
                  
        <div class="col-md-5 btn" style="text-align-last: left; background-color: #cc5d1e; border: 5px white; margin: 0px 5px 5px 5px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;"> 
            <a href="/modalidades">           
                  <div style="text-align-last: center; font-weight: 200; line-height: 30px; color: white; font-size: 24px; font-style: normal; margin: 10px 5px 10px 5px; ">                                               
                          03 <br> Março <br> Sexta-feira
                  </div>
            </a>
        </div>   
                                    
        <div class="col-md-5 btn" style="text-align-last: left; background-color: #15a03f; border: 5px white; margin: 0px 5px 5px 5px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
            <a href="/calendariobaetao/3">                          
              <div style="text-align-last: center; font-weight: 200; line-height: 30px; color: white; font-size: 20px; font-style: normal; margin: 10px 5px 10px 0px; ">                          
                         30 <br> Março <br> Quinta-feira
                          
              </div>
            </a>
        </div> 
        <div class="col-md-5 btn" style="text-align-last: left; background-color: #909090; border: 5px white; margin: 0px 5px 5px 5px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
            <a href="/calendariopauliceia/21">                          
              <div style="text-align-last: center; font-weight: 200; line-height: 30px; color: white; font-size: 20px; font-style: normal; margin: 10px 5px 10px 0px; ">                          
                         31 <br> Março <br> Sexta-feira
              </div>
            </a>
        </div> 
        <div class="col-md-5 btn" style="text-align-last: left; background-color: #0f71b3; border: 5px white; margin: 0px 5px 5px 5px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
            <a href="/locais">                          
                <div style="text-align-last: center; font-weight: 200; line-height: 30px; color: white; font-size: 24px; font-style: normal; margin: 10px 5px 10px 0px; ">                                               
                          27 <br> Abril <br> Quinta-feira
                  </div>
            </a>
        </div>
                  
        <div class="col-md-5 btn" style="text-align-last: left; background-color: #cc5d1e; border: 5px white; margin: 0px 5px 5px 5px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;"> 
            <a href="/modalidades">           
                  <div style="text-align-last: center; font-weight: 200; line-height: 30px; color: white; font-size: 24px; font-style: normal; margin: 10px 5px 10px 5px; ">                                               
                          28 <br> Abril <br> Sexta-feira
                  </div>
            </a>
        </div>   
                                    
        <div class="col-md-5 btn" style="text-align-last: left; background-color: #15a03f; border: 5px white; margin: 0px 5px 5px 5px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
            <a href="/calendariobaetao/3">                          
              <div style="text-align-last: center; font-weight: 200; line-height: 30px; color: white; font-size: 20px; font-style: normal; margin: 10px 5px 10px 0px; ">                          
                         01 <br> Junho <br> Quinta-feira
                          
              </div>
            </a>
        </div> 
        <div class="col-md-5 btn" style="text-align-last: left; background-color: #909090; border: 5px white; margin: 0px 5px 5px 5px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
            <a href="/calendariopauliceia/21">                          
              <div style="text-align-last: center; font-weight: 200; line-height: 30px; color: white; font-size: 20px; font-style: normal; margin: 10px 5px 10px 0px; ">                          
                         01 <br> Junho <br> Sexta-feira
              </div>
            </a>
        </div>

        
    </div> 
  </div> 

<hr style="background-color: #0f71b3;">


  </div> <!-- final da index -->

         </div>

              </div>


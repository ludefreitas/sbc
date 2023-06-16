<?php if(!class_exists('Rain\Tpl')){exit;}?><script type="text/javascript">


</script>
 <div class="container"> <!-- container 1 -->
            <div class="row"> <!-- row 2 -->
              <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 0px 0px 0px 0px;">

<div class="container" style="margin: 0px 0px 0px 0px; ">
  <div class="row">   


    <?php if( $error != '' ){ ?>
    <div class="alert alert-danger">
      <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
    </div>
  
    <?php }else{ ?>
    
    <div class="col-md-12" style="color: black; text-align-last: center; font-size: 20px;">

        <div>
             ETAPA <span style="font-weight: bold;">1</span> de <span style="font-weight: bold;">5</span> 
         </div>

    </div>
  
  <div class="col-md-12" style="text-align-last: left; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; border-radius: 15px;"> 

    <div class="col-md-12">
        <?php if( checkLogin(false) ){ ?>        
                                                           
                  <span style="color: black; font-weight: bold;">  <?php echo getUserName(); ?></span>! <br>                   
                                                           
                  Nesta etapa selecione abaixo o CREC/LOCAL, escolha a atividade e faça sua inscrição ou a inscrição de seu dependente.

        <?php }else{ ?>
      
              
                <a href="/user-create">             
                     CADASTRE-SE               
                </a> 
                 <span> ou faça o  </span>           
                <a href="/login" >                
                     LOGIN 
                </a>
                e nesta etapa selecione abaixo um CREC / LOCAL, escolha a atividade e faça sua inscrição ou a inscrição de seu dependente.
      <?php } ?>

  </div> 
  <?php } ?>

  </div>
</div>
<hr style="background-color: orange;">


    <div class="row" style="te"> <!-- row 4 -->   
     
      <?php $counter1=-1;  if( isset($locais) && ( is_array($locais) || $locais instanceof Traversable ) && sizeof($locais) ) foreach( $locais as $key1 => $value1 ){ $counter1++; ?>
            
                   
                      
                    <h5>                 
                    
                    <a  href="/modalidades/local/<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn" style="background-color: #0f71b3; color: white; font-weight: bold; justify-content: flex-end; margin: 5px; padding-top: 20px; padding-bottom: 20px; font-size: 18px; width: 150px; text-align: center;" ><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></h5>

      <?php } ?>
      
            
    </div> <!-- row 4 -->
  

<hr style="background-color: orange;">

<div class="row" style="margin: -5px -5px -5px -5px; padding-top: 20px; ">    
  <div class="col-md-12" style="text-align-last: left; background-color: #cc5d1e; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;"> 
    <a href="/modalidades">           
      <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 14px; font-style: normal; margin: 10px 5px 10px 5px; ">                                               
          Cursos por modalidade
      </div>
    </a>
  </div> 
  <hr style="background-color: orange;">
</div> <!-- final da index -->
<hr style="background-color: orange;">



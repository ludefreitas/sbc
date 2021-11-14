<?php if(!class_exists('Rain\Tpl')){exit;}?>
 <div class="container"> <!-- container 1 -->
            <div class="row"> <!-- row 2 -->
              <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 15px 0px 50px 0px;">

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
          Selecione aqui um CREC / LOCAL, escolha a atividade e faça sua inscrição.
      </div>
    </a>
  </div> 
  <?php } ?>

  </div>
</div>
<hr style="background-color: orange;">

<?php $counter1=-1;  if( isset($locais) && ( is_array($locais) || $locais instanceof Traversable ) && sizeof($locais) ) foreach( $locais as $key1 => $value1 ){ $counter1++; ?>
<a href="/modalidades/local/<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="text-decoration: none">
  <div class="container"> <!-- container 3 -->
    <div class="row"> <!-- row 4 -->
      
           <!-- <div class="col-md-4" col-sm-1 style="text-align-last: left; background-color: white; margin: 5px 0px 5px 0px; padding-right: 0px">
              

                    <img class="img-responsive" style="width: 282px; height: 179px" id="image-preview" src="" alt="Foto">

                 
            </div> -->                             
      
            <div class="col-md-12" style="text-align-last: left; line-height: 20px;  font-size: 20px; font-style: normal; margin: 5px 0px 0px 0px">

                   
                      <h5 style="color: #000000">
                        <span style="font-weight: bold">
                          <?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> -
                        </span> 
                          <?php echo htmlspecialchars( $value1["nomelocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - 
                          Endereço: <?php echo htmlspecialchars( $value1["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - 
                          <?php echo htmlspecialchars( $value1["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - 
                          Cep: <?php echo htmlspecialchars( $value1["cep"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - 
                          Telefone: <?php echo htmlspecialchars( $value1["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                      </h5>

                    <a href="/modalidades/local/<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn" style="background-color: #0f71b3; color: white; width: 100%; text-align-last: center;" >Cursos dísponíveis</a>                                   

            </div>                        
    </div> <!-- row 4 -->
  </div> <!-- container 3 -->
</a>
<hr style="background-color: orange;">
<?php } ?>
<div class="row" style="margin: -5px -5px -5px -5px; padding-top: 20px; ">    
  <div class="col-md-12" style="text-align-last: left; background-color: #cc5d1e; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;"> 
    <a href="/modalidades">           
      <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 14px; font-style: normal; margin: 10px 5px 10px 5px; ">                                               
          Turmas por modalidades
      </div>
    </a>
  </div> 
</div> <!-- final da index -->



<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
  <div class="row" style="">
    <div class="col-md-4 alert" style="text-align-last: center; background-color: #ce2c3e; border: solid 5px; border-color: white;  border-radius: 25px;  padding-left: 0px ">
       <a class="btn" href="/locais" style="color: white; font-weight: bold;">Turmas por LOCAL (Crec)
       </a>
    </div>
    <div class="col-md-4 alert" style="text-align-last: center; background-color: #cc5d1e; border: solid 5px; border-color: white; border-radius: 25px;  padding-left: 0px">
       <a class="btn" href="/modalidades" style="color: white; font-weight: bold" >Turmas por MODALIDADE
       </a>
    </div>
    <div class="col-md-4 alert" style="text-align-last: center; background-color: #15a03f; border: solid 5px; border-color: white; border-radius: 25px;  padding-left: 0px;">
       <a class="btn" href="/" style="color: white; font-weight: bold; ">Todas turmas
       </a>
    </div>  
  </div>
</div>

<?php $counter1=-1;  if( isset($turma) && ( is_array($turma) || $turma instanceof Traversable ) && sizeof($turma) ) foreach( $turma as $key1 => $value1 ){ $counter1++; ?>

    <div class="container"> <!-- container 3 -->
      <div class="row"> <!-- row 4 -->        
        <div class="col-md-4 col-sm-12" style="text-align-last: left; background-color: white; margin: 5px 0px 5px 0px; padding-right: 0px"><a href="/turma/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">           
            <img class="img-responsive" style="width: 282px; height: 179px" id="image-preview" src="<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Photo"></a>            
        </div> 
        <div class="col-md-8"style="text-align-last: left; line-height: 20px;  font-size: 14px; font-style: normal; margin: 5px 0px 20px 0px"><a href="/turma/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="text-decoration: none">
          <h5 style="color: #000000"> 
            <span style="font-weight: bold;">
              <?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>; 
            </span><br>
              Local da aula: <?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;<br>
              <?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> das <?php echo htmlspecialchars( $value1["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $value1["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
              Professor(a): <?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br>
              Turma <?php echo htmlspecialchars( $value1["desstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
          </h5></a>
          
            <a class="btn btn-info" style="background-color: #cc5d1e" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/turma/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Inscrever-se</a>
          
        </div>
      </div> <!-- row 4 -->
    </div> <!-- container 3 -->

<?php }else{ ?>
<div class="container"> <!-- container 3 -->
    <div class="row"> <!-- row 4 -->                        
        <div class="col-md-12"style="text-align-last: left; background-color: white; margin: 5px 0px 5px 0px; padding-right: 0px">
                <h2>Temporada  <br> não iniciada ): </h2>                               
                <h1>Lo_| _Aguarde  </h1>
                <h1>Em breve \o/ </h1>                              
                <h1>Novidades :) </h1>
          </div> 
    </div> <!-- row 4 -->
  </div> <!-- container 3 -->                             
  <?php } ?>

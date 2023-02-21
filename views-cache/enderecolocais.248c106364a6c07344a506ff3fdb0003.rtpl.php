<?php if(!class_exists('Rain\Tpl')){exit;}?>
     <div class="container"> <!-- container 1 -->
                <div class="row"> <!-- row 2 -->
                  <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 5px 0px 0px 0px;">

    <div class="container">
        <div class="row" style="padding-bottom: 5px">
        
            <div class="col-md-12">
                     <div>
                         <label>
                            <p>Endereço dos nossos Centros Esportivos.</p>
                        </label>
                     </div>                 

                    <?php $counter1=-1;  if( isset($locais) && ( is_array($locais) || $locais instanceof Traversable ) && sizeof($locais) ) foreach( $locais as $key1 => $value1 ){ $counter1++; ?>

                    <div style="color: blue; text-align: left;">
                        <label style="color: darkblue;">
                            <span style="font-weight: bold;">
                               <?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
                            </span>
                            <?php echo htmlspecialchars( $value1["nomelocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
                            Endereço: <?php echo htmlspecialchars( $value1["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?> – <?php echo htmlspecialchars( $value1["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>.<br>
                            Telefone: <?php echo htmlspecialchars( $value1["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                        </label> 
                    </div>  

                    <?php } ?>

                    <div style="color: blue; text-align: left;">
                        <label>
                            <p>
                            <a href="/" style="">  Voltar ao início </a>
                            </p>
                        </label> 
                    </div> 
            </div>
        </div>
    </div>
    

        </div>    
    </div>     

   

    </div> <!-- final da index -->    

    <hr style="color: orange;">           



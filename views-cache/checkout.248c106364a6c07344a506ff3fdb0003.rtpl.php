<?php if(!class_exists('Rain\Tpl')){exit;}?>
  <div class="container"> <!-- container 1 -->
            <div class="row"> <!-- row 2 -->
              <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 15px 0px 50px 0px;">
  
    <form action="/checkout" class="checkout" method="post" name="checkout">
        <div id="container">
            <div class="row">
                <div class="col-md-12">

                    <?php if( $error != '' ){ ?>
                    <div class="alert alert-danger">
                    <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </div>
                    <?php } ?>                    

                     <h3 id="order_review_heading" style="margin-top:30px;">Detalhes da Inscrição</h3>
                
                      
                    <div class="row">
                        <div class="col-md-12 alert alert-primary" style="text-align-last: left; ">
                           <h5 style="font-weight: bold; padding-top: 10px">Nome do aluno: <?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> -  <?php echo calcularIdade($pessoa["dtnasc"]); ?> anos </h5>
                         
                        </div>
                    </div>                    

                    <?php $counter1=-1;  if( isset($turma) && ( is_array($turma) || $turma instanceof Traversable ) && sizeof($turma) ) foreach( $turma as $key1 => $value1 ){ $counter1++; ?>
                    <div class="row" style="padding-top: 0px">
                        <div class="col-md-3" style="padding-top: 10px">
                           <strong>Turma / Temporada: </strong>
                       </div>
                       <div class="col-md-9 alert alert-success">
                            <strong><?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $value1["periodo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  (<?php echo htmlspecialchars( $value1["numinscritos"], ENT_COMPAT, 'UTF-8', FALSE ); ?> inscritos para <?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas)</strong><hr>
                            
                            <?php echo htmlspecialchars( $value1["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?> de <?php echo htmlspecialchars( $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> a <?php echo htmlspecialchars( $value1["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> anos,
                            com o professor <?php echo htmlspecialchars( $value1["apelidoperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, 
                            no <?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - Nº <?php echo htmlspecialchars( $value1["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - bairro <?php echo htmlspecialchars( $value1["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                            <input type="hidden" name="idtemporada" value="<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            <input type="hidden" name="idturma" value="<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                        </div>
                        <?php if( $value1["idstatustemporada"] == 5 ){ ?>
                        <div class="col-md-3" style="padding-top: 10px">
                            <strong>Inscrição com Laudo?</strong>
                        </div>
                        <div class="col-md-9 alert alert-success">
                            <div class="checkbox">
                                <label>
                                <input type="radio" name="laudo" value="1"> Sim
                                </label>
                                &nbsp;&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="laudo" value="0"> Não
                                </label>
                            </div>
                        </div> 
                        <?php } ?>       
            
                    </div>
                    <div class="row" style="padding-top: 0px;">
                        <div class="col-md-12 alert-primary" style="text-align-last: left; padding-top: 10px; padding-bottom: 10px;">
                            Ao clicar no botão <strong>FINALIZAR</strong> você está ciente...<br>
                             - Que inscreve o(a) <strong><?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong> na turma de <strong> <?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>;<br>
                             - Que esta inscrição NÃO GARANTE vaga na respectiva turma<br>
                             - Que leu e concorda com os <a href="#">Termos de Uso e  Responsabilidade</a>; <br>
                             - Que está ciente que a INSCRIÇÃO, para o respectivo curso esportivo, está sujeito a <strong>SORTEIO</strong>, caso a quantidade de inscritos supere o número de vagas;<br>
                             - Que deverá confirmar a matrícula, se sorteado,<strong> PRESENCIALMENTE, </strong>a partir do dia <strong><?php echo formatDate($value1["dtinicmatricula"]); ?></strong> ao <strong><?php echo formatDate($value1["dttermmatricula"]); ?></strong>, no horário da aula.<br>

                            <div class="col-md-12" style="text-align-last: center; padding-top: 10px;">
                                <input type="radio" name="ciente"><label style="color: red;">&nbsp; Estou ciente</label>
                                <input type="submit" data-value="Place order" value="Finalizar" id="place_order" name="insc" class="button alt" >                     
                            </div>                             
                        </div>

                    </div>                  
                    <?php }else{ ?> 
                        
                    <div class="row" style="padding-top: 0px">                   
                       <div class="col-md-12 alert alert-danger" style="text-align-last: center; padding: 15px">
                           <strong>Não há turma para confirmar</strong>
                       </div>
                    </div>
                    <?php } ?>

                    <?php $counter1=-1;  if( isset($turma) && ( is_array($turma) || $turma instanceof Traversable ) && sizeof($turma) ) foreach( $turma as $key1 => $value1 ){ $counter1++; ?>
                    <?php }else{ ?>
                    <div class="row" style="padding-top: 0px">                   
                        <div class="col-md-12 alert alert-success" style="text-align-last: center; padding: 15px">
                            <strong class="product-name"><a href="/cart">Encontrar uma turma</a></strong>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    
</form>
</div> <!-- final da index -->






                                                        
                   
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
                            <input type="hidden" name="token" value="<?php echo htmlspecialchars( $token, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                        </div>                    
                        

                        <div class="col-md-12 alert alert-success" style="padding-bottom: 1px;">
                           
                            <div class="checkbox">
                                <strong>Esta inscrição é para pessoa com laudo médico ?<br> (Indicação Médica com CID)
                            </strong><br>
                                <label>
                                <input type="radio" name="laudo" value="1"> &nbsp;Sim
                                </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="laudo" value="0"> &nbsp;Não
                                </label>
                            </div>
                        </div> 

    <! ------- ALTERAR COLOCANDO ESTAS LINHAS -------------------------------->

                        <div class="col-md-12 alert alert-success" style="padding-bottom: 1px;">
                           
                            <div class="checkbox">
                                <strong>Esta inscrição é para Pessoa Com Deficiência?
                            </strong><br>
                                <label>
                                <input type="radio" name="inscpcd" value="1"> &nbsp;Sim
                                </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="inscpcd" value="0"> &nbsp;Não
                                </label>
                            </div>
                        </div>   
    <! ------- ATÉ AQUI ---------------------------------------->


                         <div class="col-md-12 alert alert-warning" style="padding-bottom: 1px; text-align-last: center;">
                            <input type="radio" name="edital" required="required">&nbsp;&nbsp; Li e concordo com os termos do processo de inscrições para os cursos esportivos<strong> 2022 </strong>coforme <a href="https://www.saobernardo.sp.gov.br/documents/1136654/1245027/Edital+NM/42aa453e-2d70-8651-96e5-41d2d779d24c"><br>Resolução SESP Nº 004 de 28 de outubro de 2021</a>

                        </div> 
                        <!--
                        <div class="col-md-12 alert alert-success" style="padding-bottom: 1px; text-align-last: left;">
                           
                            <p style="color: #000000">Declaro para os devidos fins a veracidade das informações que informei para me  inscrever ou inscrever o(a) <?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> na turma de <?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, como também que estou APTO e o(a) <?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> encontra-se APTO(A) PARA A PRÁTICA DE ATIVIDADES FÍSICAS, isentando os professores e a Secretaria de Esportes e Lazer de São Bernardo do Campo de qualquer responsabilidade. Declaro ainda estar ciente do Artigo 5º da lei 10.848/2001 que tornou obrigatório a apresentação de ATESTADO MÉDICO para a prática de atividade física e me comprometo em apresentar o atestado médico no prazo máximo de 03 meses após a matrícula. Declaro também que AUTORIZO divulgação da minha imagem ou da imagem da <?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> quando registrada em momentos de aula e/ou eventos para fins de arquivos ou divulgação institucional </p>
                              <p style="color: #000000"><input type="radio" name="saude" required="required"/>&nbsp;&nbsp;Concordo</p> 

                        </div>  
                        -->                                         
            
                    </div>
                   
                    
                    <div class="row" style="padding-top: 0px;">
                        <div class="col-md-12 alert-primary" style="text-align-last: left; padding-top: 10px; padding-bottom: 10px;">
                            Ao clicar no botão <strong>FINALIZAR</strong> você está ciente que...<br>
                             - inscreve o(a) <strong><?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong> na turma de <strong> <?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>;<br>
                             - a inscrição <strong>NÃO GARANTE</strong> vaga na respectiva turma<br>
                                                          - a INSCRIÇÃO para o respectivo curso esportivo está sujeito a <strong>SORTEIO</strong>, caso a quantidade de inscritos supere o número de vagas;<br>
                             - deverá confirmar a matrícula, se sorteado,<strong> PRESENCIALMENTE, </strong>a partir do dia <strong><?php echo formatDate($value1["dtinicmatricula"]); ?></strong> ao <strong><?php echo formatDate($value1["dttermmatricula"]); ?></strong>, no horário da aula.<br>                           
                        </div>
                    </div>  

                    <div class="row" style="padding-top: 10px;">
                        
                       <div class="col-md-6 alert alert-success" style="text-align-last: center;">
                            <input type="radio" name="ciente" required="required"><label style="color: red; padding-top: 10px;">&nbsp; Estou ciente</label>
                        </div>
                        <div class="col-md-6 alert alert-success" style="text-align-last: center;">
                             <input type="submit" data-value="Place order" value="Finalizar" id="place_order" name="insc" class="button alt" >                     
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






                                                        
                   
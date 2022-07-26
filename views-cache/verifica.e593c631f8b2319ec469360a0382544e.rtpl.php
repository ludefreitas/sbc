<?php if(!class_exists('Rain\Tpl')){exit;}?>
    <script type="text/javascript">



        function enormal(){ 

           //document.getElementById('enormal').hidden = false
           document.getElementById('temlaudo').hidden = true
           document.getElementById('deficiente').hidden = true
           document.getElementById('vulneravel').hidden = true            
        
        }  
        
        function comlaudo(){ 

            document.getElementById('temlaudo').hidden = false    
           //document.getElementById('enormal').hidden = true           
           document.getElementById('deficiente').hidden = true
           document.getElementById('vulneravel').hidden = true            
        
        }  

        function semlaudo(){             
        
           document.getElementById('temlaudo').hidden = true
        
        }  

        function comdeficiencia(){             
        
           document.getElementById('deficiente').hidden = false
           document.getElementById('vulneravel').hidden = true            
             document.getElementById('temlaudo').hidden = true
             //document.getElementById('enormal').hidden = true           
        
        }  

        function semdeficiencia(){             
        
           document.getElementById('deficiente').hidden = true
        
        }  

        function comvulnerabilidade(){             
        
           document.getElementById('vulneravel').hidden = false
            document.getElementById('deficiente').hidden = true
             document.getElementById('temlaudo').hidden = true
             //document.getElementById('enormal').hidden = true           

        
        }  

        function semvulnerabilidade(){             
        
           document.getElementById('vulneravel').hidden = true
        
        }  
    </script>


  <div class="container"> <!-- container 1 -->
            <div class="row"> <!-- row 2 -->
              <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 0px 0px 0px 0px;">
  
    <form action="/cursos/verifica" class="/cursos/verifica" method="post" name="/cursos/verifica">
        <div id="container">
            <div class="row">
                <div class="col-md-12">

                    <?php if( $error != '' ){ ?>
                    <div class="alert alert-danger">
                    <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </div>
                    <?php } ?> 
                 
                    <div class="col-md-12" style="margin-top: 0px; margin-bottom: 0px; color: darkblue; text-align: center; font-size: 18px;">       
                        Confirme abaixo os detalhes da inscrição e clique no botão <strong style="color: red;"> FINALIZAR </strong>
                    </div>                
                      
                    <div class="row" style="padding-bottom: 5px; margin-bottom: 0px">
                        <div class="col-md-12 alert-primary" style="text-align-last: center; margin-bottom: 0px; padding-top: 5px; padding-bottom: 0px;">
                           <h5 style="font-weight: bold;">Aluno: <?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> -  <?php echo calcularIdade($pessoa["dtnasc"]); ?> anos </h5>                         
                        </div>
                    </div>                    

                    <?php $counter1=-1;  if( isset($turma) && ( is_array($turma) || $turma instanceof Traversable ) && sizeof($turma) ) foreach( $turma as $key1 => $value1 ){ $counter1++; ?>
                    <div class="row" style="margin-top: 0px; margin-bottom: 0px;">
                        <div class="col-md-12 alert alert-success" style="text-align: justify; padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px;">
                            <strong>[<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>] - <?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> -</strong> Temporada <strong><?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> -</strong><?php echo htmlspecialchars( $value1["periodo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  das <strong><?php echo htmlspecialchars( $value1["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $value1["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </strong>de <?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, para  <?php echo htmlspecialchars( $value1["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?> de <?php echo htmlspecialchars( $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> a <?php echo htmlspecialchars( $value1["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> anos, 
                            no <strong><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong> - <?php echo htmlspecialchars( $value1["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - Nº <?php echo htmlspecialchars( $value1["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - bairro <?php echo htmlspecialchars( $value1["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <span style="color: red;">(<?php echo htmlspecialchars( $value1["numinscritos"], ENT_COMPAT, 'UTF-8', FALSE ); ?> inscritos para <?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas)</span>
                            <input type="hidden" name="idtemporada" value="<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            <input type="hidden" name="idturma" value="<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            <input type="hidden" name="idlocal" value="<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            <input type="hidden" name="initidade" value="<?php echo htmlspecialchars( $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                             <input type="hidden" name="idmodal" value="<?php echo htmlspecialchars( $value1["idmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            <input type="hidden" name="token" value="<?php echo htmlspecialchars( $token, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                        </div> 

                        <div class="col-md-12 alert alert-info" style="padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px;">

                        <div class="checkbox">

                                <strong style="font-style: italic;"> Selecione uma das opções abaixo:
                            </strong><br><br>

                                <input type="radio" name="tipoinsc" id="tipoinsc" value="2" onclick="enormal()"> &nbsp; Esta é uma inscrição para <strong>PÚBLICO em GERAL.</strong>
                            <br><br>                             

                                <input type="radio" name="tipoinsc" id="tipoinsc" value="3" onclick="comlaudo()"> &nbsp; Esta inscrição é para pessoa com <strong>LAUDO MÉDICO.</strong><br> (Indicação Médica com CID)
                            <br>

                            <div id="temlaudo" hidden="true">
                                    <input type="text" name="temlaudo" id="temlaudo" placeholder="Informe o CID da doença" style="width: 300px">
                                    <br>
                                    <span style="color: red; font-size: 12px; font-style: italic;">* Ao clicar nesta opção de inscrição com laudo médico, você deverá informar no campo acima o CID da doença e apresentar, <strong>OBRIGATÓRIAMENTE</strong> ao professor, a solicitação médica com o respectivo CID, para efetuar a matrícula.</span><br>
                                </div><br>  
                            <input type="radio" name="tipoinsc" id="tipoinsc" value="4" onclick="comdeficiencia()"> &nbsp; Esta inscrição é para <strong>PESSOA COM DEFICIÊNCIA.</strong>
                            <br>
                            <div id="deficiente" hidden="true">
                                    <input type="text" name="deficiente" id="deficiente" placeholder="Informe o CID da deficiência" style="width: 300px">
                                    <br>
                                    <span style="color: red; font-size: 12px; font-style: italic;">* Ao clicar nesta opção de inscrição para Pessoa Com Deficiência você deverá informar no campo acima o <strong>CID</strong> da doença, igual ao que você informou nos dados de saúde do(a) <?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>!</span><br>
                                </div><br>
                            <input type="radio" name="tipoinsc" id="tipoinsc" value="5" onclick="comvulnerabilidade()"> &nbsp; Esta inscrição é para pessoa em <strong>VULNERABILIDADE SOCIAL.</strong>
                            <br>
                            <div id="vulneravel" hidden="true">                                    
                                    <span style="color: red; font-size: 12px; font-style: italic;">* Ao clicar nesta opção de inscrição para pessoa em vulnerabilidade social (pessoa participante de programas sociais do governo), você deve ter cadastrado o <?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> informando o número de inscrição no Cadùnico/NIS e apresentar, <strong>OBRIGATÓRIAMENTE,</strong> ao professor para fazer a matrícula.</span><br>
                                </div><br>       
                        </div>
                        </div>                                       
                        
                         <div class="col-md-12 alert alert-warning" style="padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px;">
                            <input type="radio" name="edital" required="required">&nbsp;&nbsp; Li e concordo com o termo abaixo:<strong><span style="font-size: 10px"> <br>Este projeto é destinado para pessoas que tem <span style="font-weight: bold;">MEDO / PÂNICO</span> de entrar na água;<br>
                             Nas duas semanas de aula serão desenvolvidas atividades que estimulem a pessoa a entrar na piscina sem medo, permanecer e vivenciar momentos lúdicos semelhantes à natação;<br>
                            Se você já sabe nadar, deve aguardar as inscrições para o curso anual de natação.</span>

                        </div> 
                       
            
                    </div>
                   
                    
                    <div class="row" style="padding-top: 0px;">
                        <div class="col-md-12 alert-primary" style="text-align-last: left; padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px; font-size: 12px;">
                            Ao clicar no botão <strong>FINALIZAR</strong> você está ciente que...<br>
                             - inscreve o(a) <strong><?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong> na turma de <strong> <?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>;<br>                            

                             - deverá comparecer no local, no primeiro dia e horário de aula, com <strong>SUNGA</strong> ou <strong>MAIÔ</strong> e <strong>TOUCA DE NATAÇÃO.</strong><br> 

                             <?php if( calcularIdade($pessoa["dtnasc"]) < 18 ){ ?>                             

                              E declara a precisão das infromações prestadas neste site, assim como que o(a) menor se encontra APTO(A) a prática de ATIVIDADES FÍSICAS, isentando o professor e a Secretaria de Esportes e Lazer do Município de São Bernardo do Campo de qualquer responsabilidade. Declaro ainda estar Ciente do Art. 5º da Lei 10.848/2001 que trata da obrigatoriedade da apresentação de ATESTADO MÉDICO. Declara ainda que autoriza a divulgação de eventuais imagens registradas em momentos de aula para arquivo e divulgação institucional<br>

                             <?php }else{ ?>

                              E declara a precisão das infromações prestadas neste site, assim como que se encontra APTO(A) a prática de ATIVIDADES FÍSICAS, isentando o professor e a Secretaria de Esportes e Lazer do Município de São Bernardo do Campo de qualquer responsabilidade. Declaro ainda estar Ciente do Art. 5º da Lei 10.848/2001 que trata da obrigatoriedade da apresentação de ATESTADO MÉDICO. Declara ainda que autoriza a divulgação de eventuais imagens registradas em momentos de aula para arquivo e divulgação institucional<br>  

                             <?php } ?>                           

                            
                        </div>
                    </div>  

                    <div class="row" style="padding-top: 0px;">
                        
                       <div class="col-md-6 alert alert-success" style="text-align-last: center; padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px;">
                            <input type="radio" name="ciente" required="required"><label style="color: red; padding-top: 10px;">&nbsp; Estou ciente</label>
                        </div>
                        <div class="col-md-6 alert alert-success" style="text-align-last: center; padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px;">
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






                                                        
                   
<?php if(!class_exists('Rain\Tpl')){exit;}?>
    <script type="text/javascript">

    //alert('Estamos no período de rematrícula. ESTA INSCRIÇÃO NÃO GARANTE VAGA')
    
        function alertTokenVunerabilidade(){

            alert(" “Vulnerabilidade social é o conceito que caracteriza a condição dos grupos de indivíduos que estão à margem da sociedade, ou seja, pessoas ou famílias que estão em processo de exclusão social, principalmente por fatores socioeconômicos. (…) As pessoas que são consideradas “vulneráveis sociais” são aquelas que estão perdendo sua representatividade na sociedade, e geralmente dependem de auxílios de terceiros para garantirem a sua sobrevivência” ")
        }
    
        function alertTokenCreebaPcd(){

            alert("Conforme Resolução SESP Nº 004 de 28/10/2021 Art.7º, Os interessados em participar das turmas de inclusão para Pessoas com Deficiência (PCD) e/ou laudo médico, deverão comparecer pessoalmente (interessado ou representante legal) no Centro Esportivo do curso de interesse.")
        }

        function enormal(){ 
           document.getElementById('geral').hidden = false
           document.getElementById('temlaudo').hidden = true
           document.getElementById('deficiente').hidden = true
           document.getElementById('vulneravel').hidden = true 
        } 
        
        function comlaudo(){ 
            document.getElementById('temlaudo').hidden = false    
           document.getElementById('geral').hidden = true           
           document.getElementById('deficiente').hidden = true
           document.getElementById('vulneravel').hidden = true   
        } 
        
        function comdeficiencia(){  
           document.getElementById('deficiente').hidden = false
           document.getElementById('vulneravel').hidden = true            
             document.getElementById('temlaudo').hidden = true
             document.getElementById('geral').hidden = true 
        }  

        function comvulnerabilidade(){
           document.getElementById('vulneravel').hidden = false
            document.getElementById('deficiente').hidden = true
             document.getElementById('temlaudo').hidden = true
             document.getElementById('geral').hidden = true 
        }  
        
    </script>


  <div class="container"> <!-- container 1 -->
            <div class="row"> <!-- row 2 -->
              <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 0px 0px 0px 0px;">
  
    <form action="/checkout" class="checkout" method="post" name="checkout">
        <div id="container">
            <div class="row">
                <div class="col-md-12">
                    
                    <div class="col-md-12" style="color: black; text-align-last: center; font-size: 20px;">

                      <div>
                        ETAPA <span style="font-weight: bold;">5</span> de <span style="font-weight: bold;">5</span> 
                      </div>

                    </div>

                    <?php if( $error != '' ){ ?>
                    <div class="alert alert-danger">
                    <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </div>
                    <?php } ?> 
                    
                    <div class="col-md-12" style="text-align-last: left; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; border-radius: 15px;"> 

                    <?php if( checkLogin(false) ){ ?> 

                           <span style="color: black; font-weight: bold;">  <?php echo getUserName(); ?> </span><br>           
                                                                       
                          nesta etapa confirme abaixo os detalhes da inscrição, marcando as opções de inscrição, concordando com os termos, marcando que está ciente e clique no botão <strong style="color: red;"> FINALIZAR</strong>.
                          

                    <?php }else{ ?>      
                           
                      
                            <a href="/user-create">             
                                     CADASTRE-SE               
                            </a> 
                             <span> ou faça o  </span>           
                            <a href="/login" >                
                                 LOGIN 
                            </a>
                            e nesta confirme abaixo os detalhes da inscrição e clique no botão <strong style="color: red;"> FINALIZAR </strong>
                          
                      <?php } ?>

                    </div>
                    
                    <!--
                    <div class="col-md-12" style="margin-top: 0px; margin-bottom: 0px; color: darkblue; text-align: center; font-size: 18px;">       
                        Confirme abaixo os detalhes da inscrição e clique no botão <strong style="color: red;"> FINALIZAR </strong>
                    </div>   
                    -->
                      
                    <div class="row" style="padding-bottom: 5px; margin-bottom: 0px">
                        <div class="col-md-12 alert-primary" style="text-align-last: center; margin-bottom: 0px; padding-top: 5px; padding-bottom: 0px;">
                           <h5 style="font-weight: bold;">Aluno: <?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> -  <?php echo calcularIdade($pessoa["dtnasc"]); ?> anos </h5>                         
                        </div>
                    </div>                    

                    <?php $counter1=-1;  if( isset($turma) && ( is_array($turma) || $turma instanceof Traversable ) && sizeof($turma) ) foreach( $turma as $key1 => $value1 ){ $counter1++; ?>
                    <div class="row" style="margin-top: 0px; margin-bottom: 0px;">
                        <div class="col-md-12 alert alert-success" style="text-align: justify; padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px;">
                            <strong>[<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>] - <?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> -</strong> Temporada <strong><?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> -</strong><?php echo htmlspecialchars( $value1["periodo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  das <strong><?php echo htmlspecialchars( $value1["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $value1["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </strong>de <?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, para  <?php echo htmlspecialchars( $value1["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?> de <?php echo htmlspecialchars( $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> a <?php echo htmlspecialchars( $value1["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> anos,
                            no <strong><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong> - <?php echo htmlspecialchars( $value1["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - Nº <?php echo htmlspecialchars( $value1["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - bairro <?php echo htmlspecialchars( $value1["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <span style="color: red;"> - <?php echo htmlspecialchars( $value1["numinscritos"], ENT_COMPAT, 'UTF-8', FALSE ); ?> inscritos 
                            
                            para <?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas geral, <?php echo htmlspecialchars( $value1["vagaslaudo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas pessoas com laudo, <?php echo htmlspecialchars( $value1["vagaspcd"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas pcd`s e <?php echo htmlspecialchars( $value1["vagaspvs"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas vuln. social.
                            
                            </span>
                            <input type="hidden" name="idtemporada" value="<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            <input type="hidden" name="idturma" value="<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            <input type="hidden" name="idlocal" value="<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            <input type="hidden" name="initidade" value="<?php echo htmlspecialchars( $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                             <input type="hidden" name="idmodal" value="<?php echo htmlspecialchars( $value1["idmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                             <input type="hidden" name="origativ" value="<?php echo htmlspecialchars( $value1["origativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            <input type="hidden" name="token" value="<?php echo htmlspecialchars( $token, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            <input type="hidden" name="tokencpf" value="<?php echo htmlspecialchars( $tokencpf, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                        </div> 

                        <div class="col-md-12 alert alert-info" style="padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px;">

                        <div class="checkbox">

                                <strong style="font-style: italic;"> Selecione uma das opções abaixo:
                            </strong><br><br>

                        <!--

                        <?php if( $tokencpf == 0 ){ ?>   
                            <input type="radio" name="tipoinsc" id="tipoinsc" value="2" onclick="enormal()" style="height: 20px; width: 20px;"> 
                            &nbsp; Esta é uma inscrição para <strong>PÚBLICO em GERAL.</strong> 
                            <span style="font-size: 12px; color: red">(<?php echo htmlspecialchars( $inscGeral, ENT_COMPAT, 'UTF-8', FALSE ); ?> insc. para <?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas)</span>   <br>
                        <?php }else{ ?>           
                           <?php if( $inscGeral >= $vagasGeral ){ ?>                                
                                 <?php if( $numinscListaEsperaPublicoGeral >= $vagasListaEsperaGeral ){ ?>
                                      <input disabled="true" type="radio" name="tipoinsc" id="tipoinsc" value="2" onclick="enormal()" style="height: 20px; width: 20px;"> 
                                      &nbsp; Esta é uma inscrição para <strong>PÚBLICO em GERAL.</strong> 
                                      <span style="font-size: 12px; color: red">(Não há mais vagas disponíveis para este público)(**)</span>  <br>
                                <?php }else{ ?>                                            
                                    <input type="radio" name="tipoinsc" id="tipoinsc" value="2" onclick="enormal()" style="height: 20px; width: 20px;"> 
                                    &nbsp; Esta é uma inscrição para <strong>PÚBLICO em GERAL.</strong> 
                                    <span style="font-size: 12px; color: red"><?php echo htmlspecialchars( $vagasListaEsperaGeral - $numinscListaEsperaPublicoGeral, ENT_COMPAT, 'UTF-8', FALSE ); ?> de 
                                    <?php echo htmlspecialchars( $vagasListaEsperaGeral, ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas p/ lista de espera p/ público geral (*)</span><br>
                                    
                                <?php } ?>                                
                            <?php }else{ ?>  
                                <?php if( $numinscListaEsperaPublicoGeral >= $vagasListaEsperaGeral ){ ?>
                                      <input disabled="true" type="radio" name="tipoinsc" id="tipoinsc" value="2" onclick="enormal()" style="height: 20px; width: 20px;"> 
                                      &nbsp; Esta é uma inscrição para <strong>PÚBLICO em GERAL.</strong> 
                                      <span style="font-size: 12px; color: red">(Não há mais vagas disponíveis para este público)#</span>  <br>
                                <?php }else{ ?>
                                    <?php if( $value1["idturmastatus"] != 3 ){ ?>
                                        <input type="radio" name="tipoinsc" id="tipoinsc" value="2" onclick="enormal()" style="height: 20px; width: 20px;"> 
                                        &nbsp; Esta é uma inscrição para <strong>PÚBLICO em GERAL.</strong> 
                                        <span style="font-size: 12px; color: red">(<?php echo htmlspecialchars( $inscGeral, ENT_COMPAT, 'UTF-8', FALSE ); ?> insc. para <?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas)##</span>     
                                        <br>
                                    <?php }else{ ?>
                                        <input type="radio" name="tipoinsc" id="tipoinsc" value="2" onclick="enormal()" style="height: 20px; width: 20px;"> 
                                        &nbsp; Esta é uma inscrição para <strong>PÚBLICO em GERAL.</strong> 
                                        <span style="font-size: 12px; color: red"><?php echo htmlspecialchars( $vagasListaEsperaGeral - $numinscListaEsperaPublicoGeral, ENT_COMPAT, 'UTF-8', FALSE ); ?> de 
                                        <?php echo htmlspecialchars( $vagasListaEsperaGeral, ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas p/ lista de espera p/ público geral (##)</span><br>
                                    <?php } ?>
                                <?php } ?>                                
                            <?php } ?>        
                        <?php } ?>

                        -->
                            <?php echo vagasPublicoGeral($value1["idturma"], $value1["idtemporada"], $value1["idmodal"], $value1["idturmastatus"], $tokencpf); ?>
                            <div id="geral" hidden="true">    
                             <?php if( $inscGeral >= $vagasGeral ){ ?>                             
                                <div class="col-md-12 alert alert-danger" style="padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px; text-align: justify;">
                                    <!--
                                    <input type="radio" name="espera" required="required" style="height: 20px; width: 20px;">&nbsp; Estou ciente que esta inscrição não garante vaga e que estou numa lista de espera no Grupo do Público em Geral, aguardando ser comunicado de uma eventual vaga. Confirmo ainda que tenho cadastrado e atualizado, neste site, meu número de telefone celular com whatsapp para receber o comunicado.
                                    -->
                                    Ao clicar nesta opção de inscrição você está ciente que esta não garante vaga e que você está numa lista de espera do Grupo do Público em Geral, aguardando ser comunicado de uma eventual vaga. Você confirma ainda que tem cadastrado e atualizado, neste site, seu número de telefone celular com whatsapp para receber o comunicado.
                                </div> 
                            <?php }else{ ?>

                            <?php if( $value1["idturmastatus"] == 3 ){ ?>
                                <div class="col-md-12 alert alert-danger" style="padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px; text-align: justify;">
                                Lembre-se: As aulas já começaram, ou estão prestes a começar, seu nome irá para uma lista de espera. Assim que a vaga estiver diponível, entraremos em contato.
                                </div>                                
                            <?php }else{ ?>                                

                                <div class="col-md-12 alert alert-danger" style="padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px; text-align: justify;">
                                    Lembre-se: Caso não tenha vaga disponível, seu nome irá para uma lista de espera. Assim que a vaga estiver disponível, aguarde, entraremos em contato. Caso contrario, sua inscrição está aguardando matricula, e se as aulas já começaram, compareça no local da atividade que você escolheu, no dia e horário da aula para fazer a matrícula.
                                </div>   
                            <?php } ?>                             
                                

                            <?php } ?>
                            </div>                           
                            <br> 

                        <!--
                        <?php if( $tokencpf == 0 ){ ?>   
                                <input type="radio" name="tipoinsc" id="tipoinsc" value="3" onclick="comlaudo()" style="height: 20px; width: 20px;">
                                &nbsp; Esta inscrição é para pessoa com <strong>LAUDO MÉDICO.</strong><br> (Indicação Médica com CID) 
                                <span style="font-size: 12px; color: red">(<?php echo htmlspecialchars( $inscPlm, ENT_COMPAT, 'UTF-8', FALSE ); ?> insc. para <?php echo htmlspecialchars( $value1["vagaslaudo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas)</span>  <br>
                        <?php }else{ ?>
                         
                            <?php if( $inscPlm >= $vagasPlm ){ ?>
                                
                                <?php if( $numinscListaEsperaPublicoLaudo >= $vagasListaEsperaPlm ){ ?>
                                    <input disabled="true" type="radio" name="tipoinsc" id="tipoinsc" value="3" onclick="comlaudo()" style="height: 20px; width: 20px;">
                                    &nbsp; Esta inscrição é para pessoa com <strong>LAUDO MÉDICO.</strong><br> (Indicação Médica com CID) 
                                    <span style="font-size: 12px; color: red">(Não há mais vagas disponíveis para este público)(**) </span>   <br>                                       
                                <?php }else{ ?>
                                    <input type="radio" name="tipoinsc" id="tipoinsc" value="3" onclick="comlaudo()" style="height: 20px; width: 20px;">
                                    &nbsp; Esta inscrição é para pessoa com <strong>LAUDO MÉDICO.</strong><br> (Indicação Médica com CID) 
                                    <span style="font-size: 12px; color: red"> <?php echo htmlspecialchars( $vagasListaEsperaPlm - $numinscListaEsperaPublicoLaudo, ENT_COMPAT, 'UTF-8', FALSE ); ?> de 
                                        <?php echo htmlspecialchars( $vagasListaEsperaPlm, ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas para lista de espera p/ pessoas com laudo médico</span> <br>                      
                                <?php } ?>
                            <?php }else{ ?>

                                <?php if( $numinscListaEsperaPublicoLaudo >= $vagasListaEsperaPlm ){ ?>
                                    <input disabled="true" type="radio" name="tipoinsc" id="tipoinsc" value="3" onclick="comlaudo()" style="height: 20px; width: 20px;">
                                    &nbsp; Esta inscrição é para pessoa com <strong>LAUDO MÉDICO.</strong><br> (Indicação Médica com CID) 
                                    <span style="font-size: 12px; color: red">(Não há mais vagas disponíveis para este público) #</span>   <br>                                       
                                <?php }else{ ?>
                                    <?php if( $value1["idturmastatus"] != 3 ){ ?>
                                        <input type="radio" name="tipoinsc" id="tipoinsc" value="3" onclick="comlaudo()" style="height: 20px; width: 20px;">
                                        &nbsp; Esta inscrição é para pessoa com <strong>LAUDO MÉDICO.</strong><br> (Indicação Médica com CID) 
                                        <span style="font-size: 12px; color: red">(<?php echo htmlspecialchars( $inscPlm, ENT_COMPAT, 'UTF-8', FALSE ); ?> insc. para <?php echo htmlspecialchars( $value1["vagaslaudo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas)## </span>    <br>
                                    <?php }else{ ?>
                                        <input type="radio" name="tipoinsc" id="tipoinsc" value="3" onclick="comlaudo()" style="height: 20px; width: 20px;">
                                        &nbsp; Esta inscrição é para pessoa com <strong>LAUDO MÉDICO.</strong><br> (Indicação Médica com CID) 
                                        <span style="font-size: 12px; color: red"> <?php echo htmlspecialchars( $vagasListaEsperaPlm - $numinscListaEsperaPublicoLaudo, ENT_COMPAT, 'UTF-8', FALSE ); ?> de 
                                        <?php echo htmlspecialchars( $vagasListaEsperaPlm, ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas para lista de espera p/ pessoas com laudo médico</span> <br>                      
                                    <?php } ?>                                                                 
                                <?php } ?>
                            <?php } ?>                            
                        <?php } ?>
                        -->
                            <?php echo vagasPublicoLaudo($value1["idturma"], $value1["idtemporada"], $value1["idmodal"], $value1["idturmastatus"], $tokencpf); ?>
                            <div id="temlaudo" hidden="true"> 
                                <input type="text" name="temlaudo" id="temlaudo" placeholder="Informe o CID da doença" style="width: 300px">
                                    <br>
                                <span style="color: red; font-size: 12px; font-style: italic;">* Ao clicar nesta opção de inscrição com laudo médico, você deverá informar no campo acima o CID da doença e apresentar, <strong>OBRIGATÓRIAMENTE</strong> ao professor, a solicitação médica com o respectivo CID, para efetuar a matrícula.</span><br>
                                <?php if( $inscPlm >= $vagasPlm ){ ?>
                                    <div class="col-md-12 alert alert-danger" style="padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px; text-align: justify;">
                                        <!--
                                        <input type="radio" name="espera" required="required" style="height: 20px; width: 20px;">&nbsp; Estou ciente que esta inscrição não garante vaga e que estou numa lista de espera do Grupo de Pessoas Com Laudo Médico, aguardando ser comunicado de uma eventual vaga. Confirmo ainda que tenho cadastrado e atualizado, neste site, meu número de telefone celular com whatsapp para receber o comunicado.
                                        -->
                                        Ao clicar nesta opção de inscrição você está ciente que esta não garante vaga e que você está numa lista de espera do Grupo de Pessoas Com Laudo Médico, aguardando ser comunicado de uma eventual vaga. Você confirma ainda que tem cadastrado e atualizado, neste site, seu número de telefone celular com whatsapp para receber o comunicado.
                                    </div> 
                                <?php }else{ ?>
                                    <?php if( $value1["idturmastatus"] == 3 ){ ?>
                                        <div class="col-md-12 alert alert-danger" style="padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px; text-align: justify;">
                                        Lembre-se: As aulas já começaram, ou estão prestes a começar, seu nome irá para uma lista de espera. Assim que a vaga estiver diponível, entraremos em contato.

                                        </div>                                
                                    <?php }else{ ?>                                

                                        <div class="col-md-12 alert alert-danger" style="padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px; text-align: justify;">
                                        Lembre-se: Caso não tenha vaga disponível, seu nome irá para uma lista de espera. Assim que a vaga estiver disponível, aguarde, entraremos em contato. Caso contrario, sua inscrição está aguardando matricula, e se as aulas já começaram, compareça no local da atividade que você escolheu, no dia e horário da aula para fazer a matrícula.

                                        </div>   
                                     <?php } ?>                             

                                <?php } ?>
                            </div>                            
                            <br>  
                        <!--
                            <?php if( $tokencpf == 0 ){ ?>   
                                <input type="radio" name="tipoinsc" id="tipoinsc" value="4" onclick="comdeficiencia()" style="height: 20px; width: 20px;">
                                &nbsp; Esta inscrição é para <strong>PESSOA COM DEFICIÊNCIA.</strong> 
                                <span style="font-size: 12px; color: red">(<?php echo htmlspecialchars( $inscPcd, ENT_COMPAT, 'UTF-8', FALSE ); ?> insc. para <?php echo htmlspecialchars( $value1["vagaspcd"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas)</span>
                                    <br>
                            <?php }else{ ?>
                             
                                    <?php if( $inscPcd >= $vagasPcd ){ ?>
                                
                                    <?php if( $numinscListaEsperaPublicoPcd >= $vagasListaEsperaPcd ){ ?>
                                        <input disabled="true" type="radio" name="tipoinsc" id="tipoinsc" value="4" onclick="comdeficiencia()" style="height: 20px; width: 20px;">
                                        &nbsp; Esta inscrição é para <strong>PESSOA COM DEFICIÊNCIA.</strong> 
                                        <span style="font-size: 12px; color: red">(Não há mais vagas disponíveis para este público)*</span>                                
                                        <br>
                                    <?php }else{ ?>
                                        <input disabled="true" type="radio" name="tipoinsc" id="tipoinsc" value="4" onclick="comdeficiencia()" style="height: 20px; width: 20px;">
                                        &nbsp; Esta inscrição é para <strong>PESSOA COM DEFICIÊNCIA.</strong> 
                                        <br>           
                                        <span style="font-size: 12px; color: red"><?php echo htmlspecialchars( $vagasListaEsperaPcd - $numinscListaEsperaPublicoPcd, ENT_COMPAT, 'UTF-8', FALSE ); ?> de 
                                        <?php echo htmlspecialchars( $vagasListaEsperaPcd, ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas para lista de espera para PCD`s
                                        </span>  
                                        <br>
                                        <span style="color: darkblue;" onmousemove="alertTokenCreebaPcd()" >
                                        <strong>Necessário token</strong>&nbsp;             
                                        </span>
                                            <a href="#" onmousemove="alertTokenCreebaPcd()"><i class="fa fa-info-circle" style="font-size: 24px;"></i></a>
                                        <br>                                    
                                            
                                    <?php } ?>
                                <?php }else{ ?>
                                
                                    <?php if( $numinscListaEsperaPublicoPcd >= $vagasListaEsperaPcd ){ ?>
                                        <input disabled="true" type="radio" name="tipoinsc" id="tipoinsc" value="4" onclick="comdeficiencia()" style="height: 20px; width: 20px;">
                                        &nbsp; Esta inscrição é para <strong>PESSOA COM DEFICIÊNCIA.</strong> 
                                        <span style="font-size: 12px; color: red">(Não há mais vagas disponíveis para este público)#</span>                                
                                        <br>
                                    <?php }else{ ?>
                                        <?php if( $value1["idturmastatus"] != 3 ){ ?>
                                            <input disabled="true" type="radio" name="tipoinsc" id="tipoinsc" value="4" onclick="comdeficiencia()" style="height: 20px; width: 20px;">
                                            &nbsp; Esta inscrição é para <strong>PESSOA COM DEFICIÊNCIA.</strong> 
                                            <span style="font-size: 12px; color: red">(<?php echo htmlspecialchars( $inscPcd, ENT_COMPAT, 'UTF-8', FALSE ); ?> insc. para <?php echo htmlspecialchars( $value1["vagaspcd"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas)##</span>
                                            <br>
                                            <span style="color: darkblue;" onmousemove="alertTokenCreebaPcd()" >
                                            <strong>Necessário token</strong>&nbsp;             
                                            </span>
                                                <a href="#" onmousemove="alertTokenCreebaPcd()"><i class="fa fa-info-circle" style="font-size: 24px;"></i></a>
                                            <br>                                    
                                        <?php }else{ ?>
                                            <input disabled="true" type="radio" name="tipoinsc" id="tipoinsc" value="4" onclick="comdeficiencia()" style="height: 20px; width: 20px;">
                                            &nbsp; Esta inscrição é para <strong>PESSOA COM DEFICIÊNCIA.</strong> 
                                            <br>           
                                            <span style="font-size: 12px; color: red"><?php echo htmlspecialchars( $vagasListaEsperaPcd - $numinscListaEsperaPublicoPcd, ENT_COMPAT, 'UTF-8', FALSE ); ?> de 
                                            <?php echo htmlspecialchars( $vagasListaEsperaPcd, ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas para lista de espera para PCD`s (##)
                                            </span>  
                                            <br>
                                            <span style="color: darkblue;" onmousemove="alertTokenCreebaPcd()" >
                                            <strong>Necessário token</strong>&nbsp;             
                                            </span>
                                                <a href="#" onmousemove="alertTokenCreebaPcd()"><i class="fa fa-info-circle" style="font-size: 24px;"></i></a>
                                            <br>
                                         <?php } ?>                     
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        -->
                            <?php echo vagasPublicoPcd($value1["idturma"], $value1["idtemporada"], $value1["idmodal"], $value1["idturmastatus"], $tokencpf); ?> 

                            <div id="deficiente" hidden="true">
                                <input type="text" name="deficiente" id="deficiente" placeholder="Informe o CID da deficiência" style="width: 300px">
                                    <br>
                                <span style="color: red; font-size: 12px; font-style: italic;">* Ao clicar nesta opção de inscrição para Pessoa Com Deficiência você deverá informar no campo acima o <strong>CID</strong> da doença, igual ao que você informou nos dados de saúde do(a) <?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>!</span><br>
                                <?php if( $inscPcd >= $vagasPcd ){ ?>
                                    <div class="col-md-12 alert alert-danger" style="padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px; text-align: justify;">
                                        <!--
                                        <input type="radio" name="espera" required="required">&nbsp;&nbsp; Estou ciente que esta inscrição não garante vaga e que estou numa lista de espera do Grupo de Pessoas Com Deficiência, aguardando ser comunicado de uma eventual vaga. Confirmo que tenho cadastrado e atualizado, neste site, meu número de telefone celular com whatsapp para receber o comunicado.
                                        -->
                                        Ao clicar nesta opção de inscrição você está ciente que esta não garante vaga e que você está numa lista de espera do Grupo de Pessoas Com Deficiência, aguardando ser comunicado de uma eventual vaga. Você confirma ainda que tem cadastrado e atualizado, neste site, seu número de telefone celular com whatsapp para receber o comunicado.
                                    </div> 
                                <?php }else{ ?>
                                    <?php if( $value1["idturmastatus"] == 3 ){ ?>
                                        <div class="col-md-12 alert alert-danger" style="padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px; text-align: justify;">
                                        Lembre-se: As aulas já começaram, ou estão prestes a começar, seu nome irá para uma lista de espera. Assim que a vaga estiver diponível, entraremos em contato.

                                        </div>                                
                                    <?php }else{ ?>                                

                                        <div class="col-md-12 alert alert-danger" style="padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px; text-align: justify;">
                                        Lembre-se: Caso não tenha vaga disponível, seu nome irá para uma lista de espera. Assim que a vaga estiver disponível, aguarde, entraremos em contato. Caso contrario, sua inscrição está aguardando matricula, e se as aulas já começaram, compareça no local da atividade que você escolheu, no dia e horário da aula para fazer a matrícula.

                                        </div>   
                                     <?php } ?>                             

                                <?php } ?>
                                </div>                                
                                <br>
                        <!--        
                            <?php if( $tokencpf == 0 ){ ?>   
                                <input type="radio" name="tipoinsc" id="tipoinsc" value="5" onclick="comvulnerabilidade()" style="height: 20px; width: 20px;">
                                &nbsp; Esta inscrição é para pessoa em <strong>VULNERABILIDADE SOCIAL.</strong> 

                                <a href="#" onmousemove="alertTokenVunerabilidade()"><i class="fa fa-info-circle" style="font-size: 18px;"></i></a>

                                <span style="font-size: 12px; color: red">(<?php echo htmlspecialchars( $inscPvs, ENT_COMPAT, 'UTF-8', FALSE ); ?> insc. para <?php echo htmlspecialchars( $value1["vagaspvs"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas)</span>
                                    <br>
                            <?php }else{ ?>
                            
                                <?php if( $inscPvs >= $vagasPvs ){ ?>
                                
                                    <?php if( $numinscListaEsperaPublicoPvs >= $vagasListaEsperaPvs ){ ?>
                                      <input disabled="true" type="radio" name="tipoinsc" id="tipoinsc" value="5" onclick="comvulnerabilidade()" style="height: 20px; width: 20px;">
                                        &nbsp; Esta inscrição é para pessoa em <strong>VULNERABILIDADE SOCIAL.</strong>

                                        <a href="#" onmousemove="alertTokenVunerabilidade()"><i class="fa fa-info-circle" style="font-size: 18px;"></i></a>

                                        <br>
                                        <span style="font-size: 12px; color: red">(Não há vagas disponíveis para este público)*</span>
                                        <br>
                                    <?php }else{ ?>
                                        <input type="radio" name="tipoinsc" id="tipoinsc" value="5" onclick="comvulnerabilidade()" style="height: 20px; width: 20px;">
                                        &nbsp; Esta inscrição é para pessoa em <strong>VULNERABILIDADE SOCIAL.</strong> 

                                        <a href="#" onmousemove="alertTokenVunerabilidade()"><i class="fa fa-info-circle" style="font-size: 18px;"></i></a>

                                        <br>
                                         <span style="font-size: 12px; color: red"><?php echo htmlspecialchars( $vagasListaEsperaPvs - $numinscListaEsperaPublicoPvs, ENT_COMPAT, 'UTF-8', FALSE ); ?> de 
                                            <?php echo htmlspecialchars( $vagasListaEsperaPvs, ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas para lista de espera para pessoas em Vuln. social</span>
                                            <br>
                                    <?php } ?>
                                <?php }else{ ?>
                                    <?php if( $numinscListaEsperaPublicoPvs >= $vagasListaEsperaPvs ){ ?>
                                        <input disabled="true" type="radio" name="tipoinsc" id="tipoinsc" value="5" onclick="comvulnerabilidade()" style="height: 20px; width: 20px;">
                                        &nbsp; Esta inscrição é para pessoa em <strong>VULNERABILIDADE SOCIAL.</strong>

                                        <a href="#" onmousemove="alertTokenVunerabilidade()"><i class="fa fa-info-circle" style="font-size: 18px;"></i></a>

                                        <span style="font-size: 12px; color: red">(Não há vagas disponíveis para este público)#</span>
                                        <br>
                                    <?php }else{ ?>
                                        <?php if( $value1["idturmastatus"] != 3 ){ ?>
                                            <input type="radio" name="tipoinsc" id="tipoinsc" value="5" onclick="comvulnerabilidade()" style="height: 20px; width: 20px;">
                                            &nbsp; Esta inscrição é para pessoa em <strong>VULNERABILIDADE SOCIAL.</strong>

                                            <a href="#" onmousemove="alertTokenVunerabilidade()"><i class="fa fa-info-circle" style="font-size: 18px;"></i></a>
                                            <span style="font-size: 12px; color: red">(<?php echo htmlspecialchars( $inscPvs, ENT_COMPAT, 'UTF-8', FALSE ); ?> insc. para <?php echo htmlspecialchars( $value1["vagaspvs"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas)##</span> 
                                            <br>
                                        <?php }else{ ?>
                                            <input type="radio" name="tipoinsc" id="tipoinsc" value="5" onclick="comvulnerabilidade()" style="height: 20px; width: 20px;">
                                        &nbsp; Esta inscrição é para pessoa em <strong>VULNERABILIDADE SOCIAL.</strong> 

                                        <a href="#" onmousemove="alertTokenVunerabilidade()"><i class="fa fa-info-circle" style="font-size: 18px;"></i></a>

                                        <br>
                                         <span style="font-size: 12px; color: red"><?php echo htmlspecialchars( $vagasListaEsperaPvs - $numinscListaEsperaPublicoPvs, ENT_COMPAT, 'UTF-8', FALSE ); ?> de 
                                            <?php echo htmlspecialchars( $vagasListaEsperaPvs, ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas para lista de espera para pessoas em Vuln. social (##)</span>
                                            <br>
                                         <?php } ?>                     
                                       
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        -->

                            <?php echo vagasPublicoPvs($value1["idturma"], $value1["idtemporada"], $value1["idmodal"], $value1["idturmastatus"], $tokencpf); ?> 
                            <div id="vulneravel" hidden="true"> 
                                <span style="color: red; font-size: 12px; font-style: italic;">* Ao clicar nesta opção de inscrição para pessoa em vulnerabilidade social (pessoa participante de programas sociais do governo), você deve ter cadastrado o <?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> informando o número de inscrição no Cadùnico/NIS e apresentar, <strong>OBRIGATÓRIAMENTE,</strong> ao professor para fazer a matrícula.</span><br>
                                <?php if( $inscPvs >= $vagasPvs ){ ?>
                                    <div class="col-md-12 alert alert-danger" style="padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px; text-align: justify;">
                                        <!--
                                        <input type="radio" name="espera" required="required" style="height: 20px; width: 20px;"> Estou ciente que esta inscrição não garante vaga e que estou numa lista de espera do Grupo de Pessoas em Vulnerabilidade Social, aguardando ser comunicado de uma eventual vaga. Confirmo que tenho cadastrado e atualizado, neste site, meu número de telefone celular com whatsapp para receber o comunicado.
                                        -->
                                        Ao clicar nesta opção de inscrição você está ciente que esta não garante vaga e que você está numa lista de espera do Grupo de Pessoas em Vulnerabilidade Social, aguardando ser comunicado de uma eventual vaga. Você confirma ainda que tem cadastrado e atualizado, neste site, seu número de telefone celular com whatsapp para receber o comunicado.
                                    </div> 
                                <?php }else{ ?>
                                    <?php if( $value1["idturmastatus"] == 3 ){ ?>
                                        <div class="col-md-12 alert alert-danger" style="padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px; text-align: justify;">
                                        Lembre-se: As aulas já começaram, ou estão prestes a começar, seu nome irá para uma lista de espera. Assim que a vaga estiver diponível, entraremos em contato.

                                        </div>                                
                                    <?php }else{ ?>                                

                                        <div class="col-md-12 alert alert-danger" style="padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px; text-align: justify;">
                                        Lembre-se: Caso não tenha vaga disponível, seu nome irá para uma lista de espera. Assim que a vaga estiver disponível, aguarde, entraremos em contato. Caso contrario, sua inscrição está aguardando matricula, e se as aulas já começaram, compareça no local da atividade que você escolheu, no dia e horário da aula para fazer a matrícula.

                                        </div>   
                                     <?php } ?>                             

                                <?php } ?>
                            </div>                            
                            <br>
                            
                        </div>
                        </div>                                       
                        <!--
                        <div class="col-md-12 alert alert-success" style="padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px;">
                           
                            <div class="checkbox">
                                <strong>Esta inscrição normal (ampla concorrência) ?
                            </strong><br>
                                <label>
                                <input type="radio" name="normal" id="normal"value="1" onclick="normal()"> &nbsp;Sim
                                </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="normal" id="normal" value="0" onclick="naonormal()"> &nbsp;Não
                                </label><br>                  

                                
                            </div>
                        </div>

                        <div class="col-md-12 alert alert-success" style="padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px;">
                           
                            <div class="checkbox">
                                <strong>Esta inscrição é para pessoa com laudo médico ?<br> (Indicação Médica com CID)
                            </strong><br>
                                
                                <label>
                                <input enable="false" disabled="true" type="radio" name="laudo" id="laudo"value="1" onclick="comlaudo()"> &nbsp;Sim
                                </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="laudo" id="laudo" value="0" onclick="semlaudo()"> &nbsp;Não
                                </label><br>
                            

                                <div id="temlaudo" hidden="true">
                                    <input type="text" name="temlaudo" id="temlaudo" placeholder="Informe o CID da doença" style="width: 300px">
                                    <br>
                                    <span style="color: red; font-size: 12px; font-style: italic;">* Ao clicar na opção <strong>SIM</strong> de inscrição com laudo médico, você deverá informar no campo acima o CID da doença e apresentar, <strong>OBRIGATÓRIAMENTE</strong> ao professor, a solicitação médica, com o respectivo CID, para efetuar a matrícula.</span><br>
                                </div>

                                
                            </div>
                        </div> 
                        -->

    
                        <!--
                        <div class="col-md-12 alert alert-success" style="padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px;">
                           
                            <div class="checkbox">
                                <strong>Esta inscrição é para Pessoa Com Deficiência?
                            </strong><br>
                                <label>
                                <input type="radio" name="inscpcd" value="1" onclick="comdeficiencia()"> &nbsp;Sim
                                </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="inscpcd" value="0" onclick="semdeficiencia()"> &nbsp;Não
                                </label>
                                <div id="deficiente" hidden="true">
                                    <input type="text" name="deficiente" id="deficiente" placeholder="Informe o CID da deficiência" style="width: 300px">
                                    <br>
                                    <span style="color: red; font-size: 12px; font-style: italic;">* Ao clicar na opção <strong>SIM</strong> de inscrição para Pessoa Com Deficiência você deverá informar no campo acima o <strong>CID</strong> da doença, igual ao que você informou nos dados de saúde do(a) <?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>!</span><br>
                                </div>
                            </div>
                        </div> 
                        --> 
   
                        <!--
                        <div class="col-md-12 alert alert-success" style="padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px;">
                           
                            <div class="checkbox">
                                <strong>Esta inscrição é para pessoa em Vulnerabilidade Social?
                            </strong><br>
                                <label>
                                <input type="radio" name="inscvuln" value="1" onclick="comvulnerabilidade()"> &nbsp;Sim
                                </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="inscvuln" value="0" onclick="semvulnerabilidade()"> &nbsp;Não
                                </label>
                                <div id="vulneravel" hidden="true">                                    
                                    <span style="color: red; font-size: 12px; font-style: italic;">* Ao clicar na opção <strong>SIM</strong> de inscrição para pessoa em vulnerabilidade social (participante de programas sociais do governo), você deve ter cadastrado o <?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> informando o número de inscrição no Cadùnico/NIS e apresentar, <strong>OBRIGATÓRIAMENTE,</strong> ao professor para fazer a matrícula.</span><br>
                                </div>
                            </div>
                        </div>  
                        --> 

                         <div class="col-md-12 alert alert-warning" style="padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px; text-align-last: justify;">
                            <input type="radio" name="edital" required="required" style="height: 20px; width: 20px;"> Li e concordo com os termos do processo de inscrições para os cursos esportivos<strong> 2023 </strong>conforme <a href="https://www.saobernardo.sp.gov.br/documents/1136654/1572881/Edital+2023/c44ca253-7614-6823-1231-9d88c36efab4" target="_blank"><br>Resolução SESP Nº 003/2022</a>

                        </div> 
                       
            
                    </div>
                   
                    
                    <div class="row" style="padding-top: 0px;">
                        <div class="col-md-12 alert-primary" style="text-align-last: left; padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px; font-size: 12px;">
                            Ao clicar no botão <strong>FINALIZAR</strong> você está ciente que...<br>
                             - inscreve o(a) <strong><?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong> na turma de <strong> <?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>;<br>
                             - a inscrição <strong>NÃO GARANTE</strong> vaga na respectiva turma<br>

                             <?php if( $value1["idstatustemporada"] == 4 ){ ?>

                             - a INSCRIÇÃO para o respectivo curso esportivo está sujeito a <strong>SORTEIO</strong>, caso a quantidade de inscritos supere o número de vagas;<br>
                              - deverá confirmar a matrícula, se sorteado,<strong> PRESENCIALMENTE, </strong>a partir do dia <strong><?php echo formatDate($value1["dtinicmatricula"]); ?></strong> ao <strong><?php echo formatDate($value1["dttermmatricula"]); ?></strong>, no horário da aula.<br>                            


                             <?php } ?>

                             - deverá confirmar a matrícula, <strong> PRESENCIALMENTE, </strong>caso tenha vaga disponível, no dia e horário da aula.<br>  

                             <?php if( calcularIdade($pessoa["dtnasc"]) < 18 ){ ?>                             

                              E declara a precisão das infromações prestadas neste site, assim como que o(a) menor se encontra APTO(A) a prática de ATIVIDADES FÍSICAS, isentando o professor e a Secretaria de Esportes e Lazer do Município de São Bernardo do Campo de qualquer responsabilidade. Declaro ainda estar Ciente do Art. 5º da Lei 10.848/2001 que trata da obrigatoriedade da apresentação de ATESTADO MÉDICO. Declara ainda que autoriza a divulgação de eventuais imagens registradas em momentos de aula para arquivo e divulgação institucional<br>

                             <?php }else{ ?>

                              E declara a precisão das infromações prestadas neste site, assim como que se encontra APTO(A) a prática de ATIVIDADES FÍSICAS, isentando o professor e a Secretaria de Esportes e Lazer do Município de São Bernardo do Campo de qualquer responsabilidade. Declaro ainda estar Ciente do Art. 5º da Lei 10.848/2001 que trata da obrigatoriedade da apresentação de ATESTADO MÉDICO. Declara ainda que autoriza a divulgação de eventuais imagens registradas em momentos de aula para arquivo e divulgação institucional<br>  

                             <?php } ?>                           

                            
                        </div>
                    </div>  

                    <div class="row" style="padding-top: 0px;">
                        
                       <div class="col-md-6 alert alert-success" style="text-align-last: center; padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px;">
                            <input type="radio" name="ciente" required="required" style="height: 20px; width: 20px;"><label style="color: red; padding-top: 10px;">&nbsp; Estou ciente</label>
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






                                                        
                   
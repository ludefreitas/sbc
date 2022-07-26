<?php if(!class_exists('Rain\Tpl')){exit;}?>
     <div class="container"> <!-- container 1 -->
                <div class="row"> <!-- row 2 -->
                  <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 5px 0px 50px 0px;">

    <div class="container">
        <div class="row" style="padding-bottom: 5px">
            <div class="col-md-12">
                    
                <?php if( $error != '' ){ ?>
                <div class="alert alert-danger">
                <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
                <?php } ?>
            </div>            


        
            <div class="col-md-12">   
                
                <form action="/horaagendada" method="post"> 
                	<div style="color: blue; text-align: left;">
                		<label>
                    		DADOS PARA O AGENDAMENTO DA NATAÇÃO ESPONTÂNEA
                        </label> 
                    </div>
                    <div style="text-align: center; color: blue; font-weight: bold;">
                        <label>
                        	Nome: <?php echo htmlspecialchars( $nomepess, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                        </label>                        
                    </div>
                    <div style="color: blue; text-align: center; font-weight: bold;">
                        <label>                        	
                        Data: <?php echo formatDate($dataPost); ?>
                         </label> 
                         <br>
                         <label>                            
                        <?php echo htmlspecialchars( $nomeDiaSemana, ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $horarioinicial, ENT_COMPAT, 'UTF-8', FALSE ); ?> ás <?php echo htmlspecialchars( $horariofinal, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                         </label> 
                        
                        
                    </div>


                        <input type="text" name="dataPost" value="<?php echo htmlspecialchars( $dataPost, ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="display: none;">               
                        <input type="text" name="idpess" value="<?php echo htmlspecialchars( $idpess, ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="display: none;"> 
                        <input type="text" name="ispresente" value="<?php echo htmlspecialchars( $ispresente, ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="display: none;">
                        <input type="text" name="idlocal" value="<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="display: none;"> 
                         <input type="text" name="nomediasemana" value="<?php echo htmlspecialchars( $nomeDiaSemana, ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="display: none;"> 
                         <input type="text" name="horarioinicial" value="<?php echo htmlspecialchars( $horarioinicial, ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="display: none;"> 
                         <input type="text" name="idhoradiasemana" value="<?php echo htmlspecialchars( $idhoradiasemana, ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="display: none;"> 
                         <input type="text" name="horariofinal" value="<?php echo htmlspecialchars( $horariofinal, ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="display: none;"> 
                         <input type="text" name="dataSemSemana" value="<?php echo htmlspecialchars( $dataSemSemana, ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="display: none;"> 

                       
                                               
                    <div style="color: blue;">
                        <label>
                        Confirme seus dados, a data escolhida, o horário e clique no botão "ENVIAR".
                        </label> 
                    </div>

                    <div class="row" style="padding-top: 0px;">
                        <div class="col-md-12 alert-primary" style="text-align-last: left; padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px; font-size: 12px;">

                            Ao clicar no botão <strong>ENVIAR</strong> você <strong>declara</strong> a precisão das infromações prestadas neste site, assim como que <strong>se encontra APTO(A)</strong> a prática de ATIVIDADES FÍSICAS, isentando o professor e a Secretaria de Esportes e Lazer do Município de São Bernardo do Campo de qualquer responsabilidade. Declaro ainda estar Ciente do Art. 5º da Lei 10.848/2001 que trata da obrigatoriedade da apresentação de <strong>ATESTADO MÉDICO.</strong> Declara ainda que autoriza a divulgação de eventuais imagens registradas em momentos de aula espontânea para arquivo e divulgação institucional<br>  

                        </div>
                    </div>  
                                                          	                                           	                       
                    
            </div>
        </div>
    </div>
    <div class="container">
            <div class="row" style="padding-bottom: 10px;">
                <div class="col-md-12" style="margin-top: 10px; text-align-last: center">
                    <input style="width: 100%; float: right; background-color: #15a03f;" type="submit" class="btn">
                </div> 
                <div class="col-md-12" style="margin-top: 10px; text-align-last: center">

                        <a class="btn" style="width: 100%; float: right; background-color: #ce2c3e;  text-decoration: none; color: white;" href="javascript:window.history.go(-1)" text-decoration="none">Voltar
                        </a>
                       
                </div>                  
            </div>
    </div>
    </form>

        </div>    
    </div>     

   

    </div> <!-- final da index -->               



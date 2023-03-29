<?php if(!class_exists('Rain\Tpl')){exit;}?>
    <script type="text/javascript">
      
    </script>

  <div class="container"> <!-- container 1 -->
            <div class="row"> <!-- row 2 -->
              <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 0px 0px 0px 0px;">
  
    <form action="/par-q/enviar" class="enviar" method="post" name="enviar">
        <div id="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="col-md-12" style="color: black; text-align-last: center; font-size: 20px; margin-top: 15px;">

                      <div>
                         <font face="Verdana" size="5">Cursos Esportivos SBC</font><br>
                         Questionário de Prontidão para Atividade Física <span style="font-weight: bold;">(PAR-Q)</span> 

                      </div>

                    </div>                      
                    
                    <div class="row" style="margin-top: 0px; margin-bottom: 0px;">

                        <tbody>
                            <tr>
                                <td width="520" height="226" valign="top">                                    
                                    <div align="center">
                                        <center>
                                            <table border="0" width="472" cellspacing="0" bgcolor="#4B6491">
                                                <tbody>
                                                    <tr>
                                                        <td width="873">
                                                            <div align="center">
                                                                <center>
                                                                    <table border="0" width="472" bgcolor="#C8E1FF" cellspacing="0" cellpadding="5">
                                                                <tbody style="text-align: justify;">
                                                                    <tr>
                                                                        <td>
                                                                           
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="col-md-12" style="text-align-last: left; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; border-radius: 15px;"> 

                                                                                <?php if( checkLogin(false) ){ ?> 

                                                                                       <span style="color: black; font-weight: bold;">Olá!  <?php echo getUserName(); ?> </span><br><br>
                                                                                       Por favor, leia atentamente as questões abaixo e assinale “SIM” ou “NÃO” em relação a saúde do(a) <strong><?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>, assinale também que está ciente e clique no botão "Enviar Questionário".

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
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="100%">
                        
                        
                        
                        <form method="POST" action="par-q/enviar" >
                          <div>
                              <input hidden="hidden" type="text" name="nomepess" id="nomepess" value="<?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                              <input hidden="hidden" type="text" name="idpess" id="idpess" value="<?php echo htmlspecialchars( $pessoa["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                          </div>
                         
                          <div align=""><center><table border="0" width="87%" cellspacing="0" cellpadding="0">
                            <tbody style="text-align: justify;"><tr>
                              <td width="100%"><small><small><font face="Verdana"><strong>1</strong> - Alguma vez um
                              médico lhe disse que você possui um problema do coração e lhe recomendou que só
                              fizesse atividade física sob supervisão médica?</font></small></small></td>
                            </tr>
                            <tr>
                              <td width="100%"><div align="center"><center><p><strong><font face="Verdana" color="#0000FF"><small><small>

                                <input type="radio" name="C1" value="1" required="required"> Sim
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                              <input type="radio" name="C1" value="0" required="required"> Não

                                </small></small></font></strong></p></center></div></td>
                            </tr>

                            <tr align="">
                              <td width="100%"><small><small><font face="Verdana"><strong>2</strong> - Você sente dor
                              no peito, causada pela prática de atividade física?</font></small></small></td>
                            </tr>
                            <tr align="center">
                              <td width="100%"><div align="center"><center><p><strong><font face="Verdana" color="#0000FF"><small><small>

                                 <input type="radio" name="C2" value="1" required="required"> Sim
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                              <input type="radio" name="C2" value="0" required="required"> Não

                               </small></small></font></strong></p></center></div></td>
                            </tr>
                            <tr align="">
                              <td width="100%"><small><small><font face="Verdana"><strong>3</strong> - Você sentiu dor
                              no peito no último mês?</font></small></small></td>
                            </tr>
                            <tr align="center">
                              <td width="100%"><div align="center"><center><p><strong><font face="Verdana" color="#0000FF"><small><small>

                                <input type="radio" name="C3" value="1" required="required"> Sim
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                              <input type="radio" name="C3" value="0" required="required"> Não

                              </small></small></font></strong></p></center></div></td>
                            </tr>
                            <tr align="">
                              <td width="100%"><small><small><font face="Verdana"><strong>4</strong> - Você tende a
                              perder a consciência ou cair, como resultado de tonteira ou desmaio?</font></small></small></td>
                            </tr>
                            <tr align="center">
                              <td width="100%"><div align="center"><center><p><strong><font face="Verdana" color="#0000FF"><small><small>

                                <input type="radio" name="C4" value="1" required="required"> Sim
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                              <input type="radio" name="C4" value="0" required="required"> Não

                              </small></small></font></strong></p></center></div></td>
                            </tr>
                            <tr align="">
                              <td width="100%"><small><small><font face="Verdana"><strong>5</strong> - Você tem algum
                              problema ósseo ou muscular que poderia ser agravado com a prática de atividade física?</font></small></small></td>
                            </tr>
                            <tr align="center">
                              <td width="100%"><div align="center"><center><p><strong><font face="Verdana" color="#0000FF"><small><small>

                                <input type="radio" name="C5" value="1" required="required"> Sim
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                              <input type="radio" name="C5" value="0" required="required"> Não

                                </small></small></font></strong></p></center></div></td>
                            </tr>
                            <tr align="">
                              <td width="100%"><small><small><font face="Verdana"><strong>6</strong> - Algum médico já
                              lhe recomendou o uso de medicamentos para a sua pressão arterial, para circulação ou
                              coração?</font></small></small></td>
                            </tr>
                            <tr align="center">
                              <td width="100%"><div align="center"><center><p><strong><font face="Verdana" color="#0000FF"><small><small>

                                <input type="radio" name="C6" value="1" required="required"> Sim
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                              <input type="radio" name="C6" value="0" required="required"> Não

                                </small></small></font></strong></p></center></div></td>
                            </tr>
                            <tr align="">
                              <td width="100%"><small><small><font face="Verdana"><strong>7</strong> - Você tem
                              consciência, através da sua própria experiência ou aconselhamento médico, de alguma
                              outra razão física que impeça sua prática de atividade física sem supervisão
                              médica?</font></small></small></td>
                            </tr>
                            <tr align="center">
                              <td width="100%"><div align="center"><center><p><strong><font face="Verdana" color="#0000FF"><small><small>

                                <input type="radio" name="C7" value="1" required="required"> Sim
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                              <input type="radio" name="C7" value="0" required="required"> Não

                                </small></small></font></strong></p></center></div></td>
                            </tr>
                          </tbody></table>
                          </center>
                      </div>
                        
                        <tr>
                            <td>
                                <p style="text-align: justify;"><small><small><font face="Verdana">
                                    <input type="radio" name="ciente" required="required">
                                    <?php if( calcularIdade($pessoa["dtnasc"]) < 18 ){ ?>                             
                                     Estou ciente de que é recomendável conversar com um médico sobre a saúde do <?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> antes de aumentar seu nível atual de atividade física, por ter respondido “SIM” a uma ou mais perguntas do “Questionário de Prontidão para Atividade Física” (PAR-Q). Assumo plena responsabilidade por qualquer atividade física praticada pelo meu dependente, o menor <?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, sem o atendimento a essa recomendação. 
                                     <?php }else{ ?>
                                     Estou ciente de que é recomendável conversar com um médico antes de aumentar meu nível atual de atividade física, ou do meu dependente, se for o caso, por ter respondido “SIM” a uma ou mais perguntas do “Questionário de Prontidão para Atividade Física” (PAR-Q). Assumo plena responsabilidade por qualquer atividade física praticada, por mim ou por meu dependente, sem o atendimento a essa recomendação. 
                                     <?php } ?>
                                    </font></small></small>
                                </p>
                            </td>
                        </tr>
                    </tbody></table>
                    </center></div></td>
                  </tr>
                </tbody></table>
                </center></div><div align="center"><center><table border="0" width="475" cellspacing="0" cellpadding="0">
                  <tbody><tr>
                    <td width="100%" valign="top"><img src="../images/subtitfinal475limpo.GIF" width="475" height="11"></td>
                  </tr>
                </tbody></table>
                </center></div></td>
              </tr>
            </tbody>

                        </div>                                 
                        
                         
            
                    </div>

                    <div class="row" style="padding-top: 0px;">

                       
                        <div class="col-md-6 alert alert-success" style="text-align-last: center; padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px;">
                             <input type="submit" data-value="Place order" value="Enviar questionário" id="place_order" name="par-q" class="button alt" >                     
                        </div>   

                         <a href="javascript:window.history.go(-1)">
                        <div class="col-md-6 btn btn-success" style="text-align-last: center; padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px;">
                            
                                 Voltar 
                        </div>   
                        </a>                                                               
            
                    </div>    
                
                    

                    
                </div>
            </div>
        </div>
    
</form>
</div> <!-- final da index -->






                                                        
                   
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
                         Questionário de Prontidão para Atividade Física <span style="font-weight: bold;">(PAR-q)</span> 

                      </div>

                    </div>                      
                    <?php $counter1=-1;  if( isset($saude) && ( is_array($saude) || $saude instanceof Traversable ) && sizeof($saude) ) foreach( $saude as $key1 => $value1 ){ $counter1++; ?>
                    <div class="row" style="margin-top: 0px; margin-bottom: 0px;">

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

                                                                                

                                                                                       
                                                                                       Respostas do Questionário de Prontidão para Atividade Física do(a) <strong><?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>.

                                                                                
                                                        

                                                                                </div>                     
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="100%">
                        
                        
                        
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
                              <td width="100%"><div style="margin-bottom: 5px"><center><p><strong><font face="Verdana" color="#0000FF"><small><small>
                            <?php if( $value1["questaoum"] == 1 ){ ?>
                                 <span style="font-style: italic; font-weight: bold; font-size: 14px; color: red;">- Sim </span> <br>
                            <?php }else{ ?>
                                 <span style="font-style: italic; font-weight: bold; font-size: 14px">- Não </span> <br>
                            <?php } ?>                           

                                </small></small></font></strong></p></center></div></td>
                            </tr>

                            <tr align="">
                              <td width="100%"><small><small><font face="Verdana"><strong>2</strong> - Você sente dor
                              no peito, causada pela prática de atividade física?</font></small></small></td>
                            </tr>
                            <tr align="center">
                              <td width="100%"><div style="margin-bottom: 5px"><center><p><strong><font face="Verdana" color="#0000FF"><small><small>
                            <?php if( $value1["questaodois"] == 1 ){ ?>
                                 <span style="font-style: italic; font-weight: bold; font-size: 14px; color: red;">- Sim </span> <br>
                            <?php }else{ ?>
                                 <span style="font-style: italic; font-weight: bold; font-size: 14px">- Não </span> <br>
                            <?php } ?>                                                      

                               </small></small></font></strong></p></center></div></td>
                            </tr>
                            <tr align="">
                              <td width="100%"><small><small><font face="Verdana"><strong>3</strong> - Você sentiu dor
                              no peito no último mês?</font></small></small></td>
                            </tr>
                            <tr align="center">
                              <td width="100%"><div style="margin-bottom: 5px"><center><p><strong><font face="Verdana" color="#0000FF"><small><small>
                            <?php if( $value1["questaotres"] == 1 ){ ?>
                                 <span style="font-style: italic; font-weight: bold; font-size: 14px; color: red;">- Sim </span> <br>
                            <?php }else{ ?>
                                 <span style="font-style: italic; font-weight: bold; font-size: 14px">- Não </span> <br>
                            <?php } ?>                           
                               

                              </small></small></font></strong></p></center></div></td>
                            </tr>
                            <tr align="">
                              <td width="100%"><small><small><font face="Verdana"><strong>4</strong> - Você tende a
                              perder a consciência ou cair, como resultado de tonteira ou desmaio?</font></small></small></td>
                            </tr>
                            <tr align="center">
                              <td width="100%"><div style="margin-bottom: 5px"><center><p><strong><font face="Verdana" color="#0000FF"><small><small>
                            <?php if( $value1["questaoquatro"] == 1 ){ ?>
                                 <span style="font-style: italic; font-weight: bold; font-size: 14px; color: red;">- Sim </span> <br>
                            <?php }else{ ?>
                                 <span style="font-style: italic; font-weight: bold; font-size: 14px">- Não </span> <br>
                            <?php } ?>                           

                              </small></small></font></strong></p></center></div></td>
                            </tr>
                            <tr align="">
                              <td width="100%"><small><small><font face="Verdana"><strong>5</strong> - Você tem algum
                              problema ósseo ou muscular que poderia ser agravado com a prática de atividade física?</font></small></small></td>
                            </tr>
                            <tr align="center">
                              <td width="100%"><div style="margin-bottom: 5px"><center><p><strong><font face="Verdana" color="#0000FF"><small><small>
                            <?php if( $value1["questaocinco"] == 1 ){ ?>
                                 <span style="font-style: italic; font-weight: bold; font-size: 14px; color: red;">- Sim </span> <br>
                            <?php }else{ ?>
                                 <span style="font-style: italic; font-weight: bold; font-size: 14px">- Não </span> <br>
                            <?php } ?>                           

                                </small></small></font></strong></p></center></div></td>
                            </tr>
                            <tr align="">
                              <td width="100%"><small><small><font face="Verdana"><strong>6</strong> - Algum médico já
                              lhe recomendou o uso de medicamentos para a sua pressão arterial, para circulação ou
                              coração?</font></small></small></td>
                            </tr>
                            <tr align="center">
                              <td width="100%"><div style="margin-bottom: 5px"><center><p><strong><font face="Verdana" color="#0000FF"><small><small>
                            <?php if( $value1["questaoseis"] == 1 ){ ?>
                                 <span style="font-style: italic; font-weight: bold; font-size: 14px; color: red;">- Sim </span> <br>
                            <?php }else{ ?>
                                 <span style="font-style: italic; font-weight: bold; font-size: 14px;">- Não </span> <br>
                            <?php } ?>                           

                                </small></small></font></strong></p></center></div></td>
                            </tr>
                            <tr align="">
                              <td width="100%"><small><small><font face="Verdana"><strong>7</strong> - Você tem
                              consciência, através da sua própria experiência ou aconselhamento médico, de alguma
                              outra razão física que impeça sua prática de atividade física sem supervisão
                              médica?</font></small></small></td>
                            </tr>
                            <tr align="center">
                              <td width="100%"><div style="margin-bottom: 5px"><center><p><strong><font face="Verdana" color="#0000FF"><small><small>
                            <?php if( $value1["questaosete"] == 1 ){ ?>
                                 <span style="font-style: italic; font-weight: bold; font-size: 14px; color: red;">- Sim </span> <br>
                            <?php }else{ ?>
                                 <span style="font-style: italic; font-weight: bold; font-size: 14px">- Não </span> <br>
                            <?php } ?>                           

                                </small></small></font></strong></p></center></div></td>
                            </tr>
                          </tbody></table>
                          </center>
                      </div>                        
                        
                        <tr>
                            <td style="text-align: center; font-weight: bold;">
                                <p style="text-align: justify;"><small><small><font face="Verdana">
                                    
                                    <?php if( calcularIdade($pessoa["dtnasc"]) < 18 ){ ?>                             
                                     O responsável pelo menor está ciente de que é recomendável conversar com um médico sobre a saúde do <?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> antes de aumentar seu nível atual de atividade física, por ter respondido “SIM” a uma ou mais perguntas do “Questionário de Prontidão para Atividade Física” (PAR-Q). O ressponsável assumiu plena responsabilidade por qualquer atividade física praticada pelo seu dependente, o menor <?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, sem o atendimento a essa recomendação. 
                                     <?php }else{ ?>
                                     A pessoa acima citada está ciente de que é recomendável conversar com um médico antes de aumentar seu nível atual de atividade física, ou do seu dependente, se for o caso, por ter respondido “SIM” a uma ou mais perguntas do “Questionário de Prontidão para Atividade Física” (PAR-Q). Assumiu plena responsabilidade por qualquer atividade física praticada, por ele ou por seu dependente, sem o atendimento a essa recomendação. 
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
                </center></div>

                        </div>  

                <?php }else{ ?> 

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
                                                                            <br>
                                                                           Questionário não preenchido!!!

                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </center>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </center>
                            </div>


                 <?php } ?>



                        
                         
            
                    </div>

                    <div class="row" style="padding-top: 0px;">

                        <a href="javascript:window.history.go(-1)">
                        <div class="col-md-6 btn btn-success" style="text-align-last: center; padding-top: 5px; margin-top: 5px; margin-bottom: 5px; padding-bottom: 5px;">
                            
                                 Voltar 
                        </div>   
                        </a>                                          
            
                    </div>    
                
                    

                    
                </div>
            </div>
        </div>
    

</div> <!-- final da index -->






                                                        
                   
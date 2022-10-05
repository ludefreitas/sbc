<?php if(!class_exists('Rain\Tpl')){exit;}?>

              
                <?php $counter1=-1;  if( isset($insc) && ( is_array($insc) || $insc instanceof Traversable ) && sizeof($insc) ) foreach( $insc as $key1 => $value1 ){ $counter1++; ?>
                <div class="col-md-12">
                  <div class="row">                     
                    <div class="col-md-12" style="border: 1px solid black;">                        
                      <div class="row">  
                        <div class="col-md-12" style="margin: 5 0 5 0; text-align: center; font-weight: bold;">

                          <?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  - 

                          <?php if( $value1["statuspresenca"] == 1 ){ ?>
                          <span style="color: green;">( <i class="fa fa-check"></i> )</span> 
                          <?php } ?>
                          <?php if( $value1["statuspresenca"] == 0 ){ ?>
                           <span style="color: red;">( X )</span>
                          <?php } ?>
                          <?php if( $value1["statuspresenca"] == 2 ){ ?>
                          <span style="color: blue;">( J )</span>
                          <?php } ?>
                          <?php if( $value1["statuspresenca"] == 4 ){ ?>
                          ( - )
                          <?php } ?>
                          <br>
                          
                          <?php if( $value1["idinscstatus"] == 9 ){ ?>
                          <span style="color: red;">CANCELADA</span>
                          <?php }else{ ?>
                            <?php if( $value1["idinscstatus"] == 8 ){ ?>
                                <span style="color: red;">DESISTENTE</span>
                            <?php }else{ ?>
                              <?php if( $value1["statuspresenca"] != 1 ){ ?>
                              <input hidden class="idtemporada" id="idtemporada" type="text" name="idtemporada" value="<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                              <input hidden class="idturma" id="idturma" type="text" name="idturma" value="<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                              <input hidden class="data" id="data" type="text" name="data" value="<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                              <input hidden class="idinsc" id="idinsc" type="text" name="idinsc" value="<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                  <!--
                                  <a class="presente" id="presente" href="/prof/insc-turma-temporada-presente/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: green;">Presente?</i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                -->

                                <a class="presente" id="presente" href="#" onclick="requisitarPagina('/prof/insc-turma-temporada-presente/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')" style="color: green;">Presente?</i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                               
                              <?php } ?>                         
                          
                              <?php if( $value1["statuspresenca"] != 0 ){ ?>
                              <input hidden class="idtemporada" id="idtemporada" type="text" name="idtemporada" value="<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                              <input hidden class="idturma" id="idturma" type="text" name="idturma" value="<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                              <input hidden class="data" id="data" type="text" name="data" value="<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                              <input hidden class="idinsc" id="idinsc" type="text" name="idinsc" value="<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                
                                <!--
                                  <a class="ausente" id="ausente" href="/prof/insc-turma-temporada-ausente/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><span style="font-weight: bold; margin: 0 3 0 3; color: red;">Ausente?</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                -->
                                 <a class="ausente" id="ausente" href="#" onclick="requisitarPagina('/prof/insc-turma-temporada-presente/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')" style="color: red;">Ausente?</i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                

                                  
                                  

                              <?php } ?>

                              <?php if( $value1["statuspresenca"] != 2 ){ ?>

                              <input hidden class="idtemporada" id="idtemporada" type="text" name="idtemporada" value="<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                              <input hidden class="idturma" id="idturma" type="text" name="idturma" value="<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                              <input hidden class="data" id="data" type="text" name="data" value="<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                              <input hidden class="idinsc" id="idinsc" type="text" name="idinsc" value="<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                <!--
                                  <a class="justificar" id="justificar" href="/prof/insc-turma-temporada-justificar/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><span style="font-weight: bold; margin: 5 3 5 3; color: blue;"> Justificar? </span></a>&nbsp;&nbsp;&nbsp;&nbsp; 
                                -->
                                <a class="justificar" id="justificar" href="#" onclick="requisitarPagina('/prof/insc-turma-temporada-presente/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')" style="color: blue;"> Justificar?</i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                
                              <?php } ?>
                            <?php } ?>
                         <?php } ?> 

                        </div>
                      </div>      
                    </div>
                  </div>                  

                </div>

                <?php }else{ ?>
                <div class="col-md-12" style="font-weight: bold; color: red; font-size: 22px; text-align: center; ">
                  Não há pessoas matriculadas 
                </div>
                <?php } ?>  

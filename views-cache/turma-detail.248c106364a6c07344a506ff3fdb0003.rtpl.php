<?php if(!class_exists('Rain\Tpl')){exit;}?>
          
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="turma-bit-title text-center">
                                <h2><?php echo htmlspecialchars( $turma["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
                            </div>
                        </div>
                    </div>
                </div>

               
                    <div class="container"> <!-- container 3 -->
                      <div class="row"> <!-- row 4 -->
                        
                              <div class="col-md-12" col-sm-1 style="text-align-last: left; background-color: white; margin: 5px 0px 5px 0px; padding-right: 0px">
                                <table>
                                  <tr>
                                    <td>

                                      <img class="img-responsive" style="width: 282px; height: 179px" id="image-preview" src="<?php echo htmlspecialchars( $turma["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Photo">

                                   </td>
                                  </tr>
                                   
                                  </tr>
                                    <tr>
                                    <td>
                                        <h5 style="color: #000000"> <span style="font-weight: bold;">
                                        </span><?php echo htmlspecialchars( $turma["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> do Programa <?php echo htmlspecialchars( $turma["prograativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, para <?php echo htmlspecialchars( $turma["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?> de <?php echo htmlspecialchars( $turma["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> a <?php echo htmlspecialchars( $turma["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> anos,  <?php echo htmlspecialchars( $turma["geneativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> no período da <?php echo htmlspecialchars( $turma["periodo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> das <?php echo htmlspecialchars( $turma["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $turma["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, na <?php echo htmlspecialchars( $turma["descespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?> do Crec <?php echo htmlspecialchars( $turma["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, com o(a) professor(a) <?php echo htmlspecialchars( $turma["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - Temporada <?php echo htmlspecialchars( $turma["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?></</h5>

                                    </td>
                                 
                                </table>
                                <table>
                                <tr>

                                   <td> 

                                     <form action="/cart/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add" class="cart"> 
                                            <button class="btn btn-success btn-sm" style="width: 282px; text-align-last: center" type="submit">Increver-se</button>
                                        </form>                          
                                       
                                   </td>
                               </tr>
                               </table>
                              </div>                              
                        
                             
                      </div> <!-- row 4 -->
                    </div> <!-- container 3 -->
                    <?php if( $turma["idstatustemporada"] != 4 ){ ?>
                <div class="container"> <!-- container 3 -->
                    <div class="row"> <!-- row 4 -->                        
                        <div class="col-md-8" col-sm-1 style="text-align-last: left; background-color: white; margin: 5px 0px 5px 0px; padding-right: 0px">
                                <h2>Não há temporada iniciada ): </h2>                               
                                <h1>Lo_| _Aguarde  </h1>
                                <h1>Em breve \o/ </h1>                              
                                <h1>Novidades :) </h1>
                          </div> 
                    </div> <!-- row 4 -->
                  </div> <!-- container 3 -->                             
                  <?php } ?>


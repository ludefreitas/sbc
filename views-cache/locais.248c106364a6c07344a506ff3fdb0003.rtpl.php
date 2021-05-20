<?php if(!class_exists('Rain\Tpl')){exit;}?>
                <?php $counter1=-1;  if( isset($locais) && ( is_array($locais) || $locais instanceof Traversable ) && sizeof($locais) ) foreach( $locais as $key1 => $value1 ){ $counter1++; ?>
                <a href="/local/<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    <div class="container"> <!-- container 3 -->
                      <div class="row"> <!-- row 4 -->
                        
                             <!-- <div class="col-md-4" col-sm-1 style="text-align-last: left; background-color: white; margin: 5px 0px 5px 0px; padding-right: 0px">
                                <table>
                                  <tr>
                                   <td>

                                      <img class="img-responsive" style="width: 282px; height: 179px" id="image-preview" src="" alt="Foto">

                                   </td>
                                  </tr>
                                </table>
                              </div> -->                             
                        
                              <div class="col-md-12"style="text-align-last: left; line-height: 20px;  font-size: 20px; font-style: normal; margin: 5px 0px 20px 0px">

                                <table>
                                  <tr>
                                    <td>
                                     
                                        <h5 style="color: #000000"><span style="font-weight: bold"><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span><br>
                                        <?php echo htmlspecialchars( $value1["nomelocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
                                        Endereço: <?php echo htmlspecialchars( $value1["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, 
                                        <?php echo htmlspecialchars( $value1["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - 
                                        <?php echo htmlspecialchars( $value1["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
                                        Cep: <?php echo htmlspecialchars( $value1["cep"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
                                        Telefone: <?php echo htmlspecialchars( $value1["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br></h5>

                                      <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/local/<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" text-decoration="underline overline wavy blue">Cursos dísponíveis</a>
                                    </td>   
                                  </tr>
                                </table>

                              </div>                        
                      </div> <!-- row 4 -->
                    </div> <!-- container 3 -->
                </a>
                <?php } ?>



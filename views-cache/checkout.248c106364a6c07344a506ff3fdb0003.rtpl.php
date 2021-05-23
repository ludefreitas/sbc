<?php if(!class_exists('Rain\Tpl')){exit;}?>

    
   
    <form action="/checkout" class="checkout" method="post" name="checkout">
        <div id="customer_details" class="col2-set">
            <div class="row">
                <div class="col-md-12">

                    <?php if( $error != '' ){ ?>
                    <div class="alert alert-danger">
                    <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </div>
                    <?php } ?>
                
                        <div class="clear">
                        
                        </div>

                    <h3 id="order_review_heading" style="margin-top:30px;">Detalhes da Inscrição</h3>

                    <div id="order_review" style="position: relative;">

                        <table class="shop_table">
                            <thead>
                                <tr>
                                    <th colspan="5" class="product-name" style="text-align-last: center">
                                        Nome do aluno <strong class="product-name"> -  <?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
                                    </th>
                                
                                </tr>
                                <tr style="text-align-last: center">
                                    <?php $counter1=-1;  if( isset($turma) && ( is_array($turma) || $turma instanceof Traversable ) && sizeof($turma) ) foreach( $turma as $key1 => $value1 ){ $counter1++; ?>
                                    <td colspan="5" class="product-name"><strong class="product-name">Turma</strong>
                                    </td>
                                    <?php }else{ ?>
                                    <td colspan="5" class="product-name"><strong class="product-name">Não há turma para confirmar</strong>
                                    </td>
                                    <?php } ?>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php $counter1=-1;  if( isset($turma) && ( is_array($turma) || $turma instanceof Traversable ) && sizeof($turma) ) foreach( $turma as $key1 => $value1 ){ $counter1++; ?>
                            <tr class="cart_item">
                                <td class="product-name">
                                    <?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br> <?php echo htmlspecialchars( $value1["periodo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                                    <input hidden="" type="text" id="idtemporada" name="idtemporada" class="input-text" value="<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></input>

                                    <input hidden="" 
                                    type="text" id="idturma" name="idturma" class="input-text" value="<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></input>

                                </td>                                           

                                <td class="product-name">
                                    <?php echo htmlspecialchars( $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> a <?php echo htmlspecialchars( $value1["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br> <?php echo htmlspecialchars( $value1["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                </td> 

                                <td class="product-name">
                                    <span class="amount">Professor(a) <br><?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?> 
                                </td> 

                                <td class="product-name">
                                    <?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br> <?php echo htmlspecialchars( $value1["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, Nº <?php echo htmlspecialchars( $value1["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br>
                                </td>
                            </tr>
                            <tr class="order-total" style="text-align-last: center">
                                    <th colspan="5" ><input type="submit" data-value="Place order" value="Finalizar" id="place_order" name="insc" class="button alt" ></th>
                            </tr>
                            <?php } ?>

                            </tbody>                                        
                            
                            <tfoot>
                                
                                
                                <?php $counter1=-1;  if( isset($turma) && ( is_array($turma) || $turma instanceof Traversable ) && sizeof($turma) ) foreach( $turma as $key1 => $value1 ){ $counter1++; ?>
                                <?php }else{ ?>
                                <tr class="order-total" >
                                    <td colspan="5" class="product-name"><strong class="product-name"><a href="/cart">Encontrar uma turma</a></strong>
                                    </td>
                                </tr>
                                <?php } ?>
                                
                                    
                                
                            </tfoot>
                            
                        </table>

                    </div>
                </div>


            </div>
        </div>
    
</form>





                                                        
                   
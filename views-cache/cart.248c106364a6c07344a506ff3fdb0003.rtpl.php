<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Inscrições a Confirmar</h2>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Page title area -->

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            
            <div class="col-md-12">
                <div class="product-content-right">
                    <div class="woocommerce">

                        <form action="/checkout">
                            
                            <?php if( $error != '' ){ ?>
                            <div class="alert alert-danger" role="alert">
                            <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                            </div>
                            <?php } ?>

                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                    <tr>
                                        <th class="product-remove">Excluir<br>Inscrição</th>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Turma</th>
                                         <th class="product-quantity">Local</th>
                                         <th class="product-quantity">Horário </th>
                                        <th class="product-price">Faixa Etária</th>
                                       
                                        <th class="product-subtotal">Professor(a)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $counter1=-1;  if( isset($turma) && ( is_array($turma) || $turma instanceof Traversable ) && sizeof($turma) ) foreach( $turma as $key1 => $value1 ){ $counter1++; ?>
                                    <tr class="cart_item">
                                        <td class="product-remove">
                                            <a title="Remove this item" class="remove" href="/cart/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/remove">X</a> 
                                        </td>

                                        <td class="product-thumbnail">
                                            <a href="/turma/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></a>
                                        </td>                                       
                                        

                                        <td class="product-name">
                                            <a href="/turma/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br> <br> <?php echo htmlspecialchars( $value1["periodo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a> 
                                        </td>

                                        <td class="product-name">
                                            <span class="amount"> <?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br> <?php echo htmlspecialchars( $value1["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, Nº <?php echo htmlspecialchars( $value1["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br> <?php echo htmlspecialchars( $value1["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span> 
                                        </td>
                                        <td class="product-name">
                                            <span class="amount"> <?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br><?php echo htmlspecialchars( $value1["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $value1["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span> 
                                        </td>


                                        <td class="product-name">
                                            <span class="amount"><?php echo htmlspecialchars( $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> a <?php echo htmlspecialchars( $value1["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br> <?php echo htmlspecialchars( $value1["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span> 
                                        </td>

                                        
                                        

                                        <td class="product-name">
                                            <span class="amount"><?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span> 
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                            <div class="cart-collaterals">

                                <div class="cross-sells">

                                    <h2>Selecione a Pessoa</h2>
                                    
                                    <div class="coupon">
                                        <label>Pessoa</label>
                                        <input type="text" placeholder="00000-000" value="<?php echo htmlspecialchars( $cart["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="nomepess" class="input-text" name="idpess">

                                        <h1>Criar Classe Pessoa para Fazer Inscrição </h1>
                                        <input type="submit" formmethod="post" formaction="/cart/" value="increver" class="button">
                                    </div>

                                </div>
                                
                                 </div>

                            <div class="pull-right">
                                <input type="submit" value="Finalizar Inscrição" name="proceed" class="checkout-button button alt wc-forward">
                            </div>

                        </form>

                    </div>                        
                </div>                    
            </div>
        </div>
    </div>
</div>





                                                                            
                                       
<?php if(!class_exists('Rain\Tpl')){exit;}?>

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
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
                                      <?php $counter1=-1;  if( isset($turma) && ( is_array($turma) || $turma instanceof Traversable ) && sizeof($turma) ) foreach( $turma as $key1 => $value1 ){ $counter1++; ?>

                                    <tr>
                                        <th class="product-remove">Remover</th>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Turma</th>
                                         <th class="product-quantity">Local</th>
                                         <th class="product-quantity">Horário </th>
                                        <th class="product-price">Faixa Etária</th>                          
                                        <th class="product-subtotal">Professor(a)</th>
                                    </tr>
                                    <?php } ?>

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
                                    <?php }else{ ?>

                                    <tr>
                                          <td colspan="7" class="product-name">
                                            <span class="amount">Não há uma turma para fazer inscrição !!! </span><br><a href="/"> >>> Selecione uma turma <<< </a> 
                                        </td>
                                    </tr>
                                    <?php } ?>

                                </tbody>
                            </table>

                            <div class="cart-collaterals">

                                <div class="cross-sells">

                                    <h2>Selecione a Pessoa</h2>
                                    
                                    <div class="coupon">

                                        <?php if( $msgError != '' ){ ?>

                                        <div class="alert alert-danger alert-dismissible" style="margin:10px">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <p><?php echo htmlspecialchars( $msgError, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                        </div>
                                        <?php } ?>

                                        <?php if( $msgSuccess != '' ){ ?>

                                        <div class="alert alert-success alert-dismissible" style="margin:10px">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <p><?php echo htmlspecialchars( $msgSuccess, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                        </div>
                                        <?php } ?>

                                        <!-- form start -->
                                        <?php $counter1=-1;  if( isset($pessoa) && ( is_array($pessoa) || $pessoa instanceof Traversable ) && sizeof($pessoa) ) foreach( $pessoa as $key1 => $value1 ){ $counter1++; ?>

                                        <!--<form role="form" action="/cart/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/insert" method="get">-->
                                             <?php } ?>

                                            <div class="box-body">
                                                <!--
                                                <?php $counter1=-1;  if( isset($pessoa) && ( is_array($pessoa) || $pessoa instanceof Traversable ) && sizeof($pessoa) ) foreach( $pessoa as $key1 => $value1 ){ $counter1++; ?>

                                                <div class="form-group">

                                                    <input type="button" class="btn btn-primary" name="idpess" value='<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo calcularIdade($value1["dtnasc"]); ?> anos, <?php echo htmlspecialchars( $value1["sexo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'>
                                                </div>
                                                <?php }else{ ?>

                                                        <label>Não há pessoas cadastradas</label>
                                                <?php } ?>

                                                <div class="form-group">
                                                -->
                                                                                          
                                                    <select class="form-control" name="idpess">
                                                         <option selected="selected" value="idpess=0">selecione uma pessoa</option>
                                                        <?php $counter1=-1;  if( isset($pessoa) && ( is_array($pessoa) || $pessoa instanceof Traversable ) && sizeof($pessoa) ) foreach( $pessoa as $key1 => $value1 ){ $counter1++; ?>

                                                         <option <?php if( $value1["iduser"] === $user["iduser"] ){ ?><?php } ?> value="<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo calcularIdade($value1["dtnasc"]); ?> anos, <?php echo htmlspecialchars( $value1["sexo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                                                        <?php }else{ ?>

                                                        <option value="0">Não há pessoas cadastradas</option>
                                                         <?php } ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <!-- /.box-body -->
                                            <div class="box-footer">
                                            
                                               
                                            </div>
                                           
                                       <!-- </form> -->


                                        <div>&nbsp;</div>
                                        <a href="/pessoa-create">Cadastrar uma nova pessoa</a>
                                        
                                        <div class="pull-right">

                                            <input type="submit" value="Confirmar Inscrição" id="pessoa" class="button alt" formaction="/cart" formmethod="post">
                                            
                                         </div>
                                    </div>

                                </div>
                                
                            </div>                           

                        </form>

                    </div>                        
                </div>                    
            </div>
        </div>
    </div>
</div>





                                                                            
                                       
<?php if(!class_exists('Rain\Tpl')){exit;}?>

<div class="product-big-title-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="product-bit-title text-center">
					<h2>Pagamento</h2>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="single-product-area">
	<div class="zigzag-bottom"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="product-content-right">
					<form action="/checkout" class="checkout" method="post" name="checkout">
						<div id="customer_details" class="col2-set">
							<div class="row">
								<div class="col-md-12">

									<?php if( $error != '' ){ ?>

									<div class="alert alert-danger">
										<?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>

									</div>
									<?php } ?>


									

									<div class="woocommerce-billing-fields">



										<h3>Confirme a Inscrição</h3>

								                <label for="pessoa">Confirme quem irá fazer esta aula</label>
								                <select class="form-control" name="idpess">
								                 
								                <?php $counter1=-1;  if( isset($pessoa) && ( is_array($pessoa) || $pessoa instanceof Traversable ) && sizeof($pessoa) ) foreach( $pessoa as $key1 => $value1 ){ $counter1++; ?>

								                    <option <?php if( $value1["idpess"] === $espaco["idpess"] ){ ?>selected="selected"<?php } ?> value="<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["dtnasc"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $value1["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
								                <?php } ?>

								                
								                </select>
											<div class="row">
											
										</div>									
                                        
										
										<div class="clear"></div>
										<h3 id="order_review_heading" style="margin-top:30px;">Detalhes da Inscrição</h3>
										<label for="horario">Confirme a turma</label>
										<div id="order_review" style="position: relative;">
											<table class="shop_table">
												<thead>
													<tr>
														<th class="product-name"><strong class="product-name">Turma</strong></th>
														</th>
													</tr>
												</thead>
												<tbody>
                                                    
													<tr class="cart_item">
														<td class="product-name">
														</td>											
                                                    </tr>
                                                   
												</tbody>
												<tfoot>
													<tr class="product-name">
														<th>Crec</th>
														
													</tr>
													<tr class="product-name">
														<th>Dia da Semana / Horário</th>
														
													</tr>
													<tr class="product-name">
														<th>Professor</th>
														
													</tr>
												</tfoot>
											</table>
											
											
											<div id="payment">
												<div class="form-row place-order">
													<input type="submit" data-value="Place order" value="Continuar" id="place_order" name="woocommerce_checkout_place_order" class="button alt">
												</div>
												<div class="clear"></div>
											</div>
										</div>
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
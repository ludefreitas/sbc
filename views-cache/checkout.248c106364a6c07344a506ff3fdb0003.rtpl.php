<?php if(!class_exists('Rain\Tpl')){exit;}?>

<div class="product-big-title-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="product-bit-title text-center">
					<h2>Finalizar Inscrição</h2>
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

									
										<!--
											<div class="woocommerce-billing-fields">



												<h3>Confirme a Inscrição</h3>

											<label for="pessoa">Nome da pessoa que irá fazer esta aula</label>
								            <input type="text" value="<?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $pessoa["dtnasc"], ENT_COMPAT, 'UTF-8', FALSE ); ?> -  <?php echo htmlspecialchars( $pessoa["sexo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> " placeholder="<?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, {function='calcularIdade($pessoa.dtnasc)'} anos, <?php echo htmlspecialchars( $pessoa["sexo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="idpess" name="idpess" class="input-text ">						         

								            
											
											</div>								
                                        
										
											<div class="clear">
											
											</div>
										-->
										<h3 id="order_review_heading" style="margin-top:30px;">Detalhes da Inscrição</h3>
										<div id="order_review" style="position: relative;">
											<table class="shop_table">
												<thead>
													<tr>
														<th colspan="5" class="product-name">
															<strong class="product-name">Nome do aluno: <?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
														</th>
													
													</tr>
													<tr>
														<td colspan="5" class="product-name"><strong class="product-name">Turma</strong>
														</td>
														
													</tr>
												</thead>
												<tbody>
												<?php $counter1=-1;  if( isset($turma) && ( is_array($turma) || $turma instanceof Traversable ) && sizeof($turma) ) foreach( $turma as $key1 => $value1 ){ $counter1++; ?>

												<tr class="cart_item">
													<td class="product-name">
													 	<?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br> <?php echo htmlspecialchars( $value1["periodo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

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
                                             	<?php } ?>

                                             	</tbody>                                        
												
												<tfoot>
													<tr class="order-total">
														<th colspan="5" ><input type="submit" data-value="Place order" value="Confirmar Inscrição" id="place_order" name="woocommerce_checkout_place_order" class="button alt"></th>
													</tr>
												</tfoot>
												
											</table>

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
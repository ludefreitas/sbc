<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="slider-area">
        	<!-- Slider -->
			<!--<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
					<li><img src="res/site/img/natacao.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								Natação <span class="primary"><strong>Treinamento</strong></span>
							</h2>
							<h4 class="caption subtitle">Baetinha</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Increver-se</a>
						</div>
					</li>
					<li><img src="res/site/img/voleibol.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								 Voleibol <span class="primary"><strong>Adulto</strong></span>
							</h2>
							<h4 class="caption subtitle">Jerusalém</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Increver-se</a>
						</div>
					</li>
					
					<li><img src="res/site/img/hidroginastica.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								Hidroginástica <span class="primary"><strong>Idoso</strong></span>
							</h2>
							<h4 class="caption subtitle">Baetão</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Increver-se</a>
						</div>
					</li>
					<li><img src="res/site/img/natacao.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								 Natação <span class="primary"><strong>Iniciação</strong></span>
							</h2>
							<h4 class="caption subtitle">Creeba</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Increver-se</a>
						</div>
					</li>
					<li><img src="res/site/img/voleibol.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								 Voleibol <span class="primary"><strong>Adolescente</strong></span>
							</h2>
							<h4 class="caption subtitle">Taboão</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Increver-se</a>
						</div>
					</li>
					<li><img src="res/site/img/hidroginastica.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								Hidroginástica <span class="primary"><strong>Funcional</strong></span>
							</h2>
							<h4 class="caption subtitle">Baetinha</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Increver-se</a>
						</div>
					</li>
				</ul>
			</div>
        -->
			<!-- ./Slider -->

    </div> <!-- End slider area -->
    <!--
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <p>Hora do Treino</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <p>Corpo em Ação</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <p>Pelc</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <p>Campeões da Vida</p>
                    </div>
                </div>
            </div>
        </div>
    </div>  End promo area -->
    
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Crecs <br> Centros Esportivos, Recreativos e Culturais</h2>
                        <div class="product-carousel">
                            <?php $counter1=-1;  if( isset($locais) && ( is_array($locais) || $locais instanceof Traversable ) && sizeof($locais) ) foreach( $locais as $key1 => $value1 ){ $counter1++; ?>
                            
                            <div class="single-product">
                                <div class="product-upper">
                             <!-- <img src="/res/site/img/orquideas.jpg" alt=""> -->
                                              

                             </div>
                             <div class="product-upper">
                             <h2><a href="/local/<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><span><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span> <br><?php echo htmlspecialchars( $value1["nomelocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?> das <?php echo htmlspecialchars( $value1["complemento"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $value1["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></h2>                        

                             </div>                       
                                
                                <div class="product-option-shop">
                                <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/local/<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Cursos Diponíveis</a>
                            </div>                       
                            </div>
                            <?php } ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
    
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">                            
                            <img src="res/site/img/horatreino.png" alt="">
                            <img src="res/site/img/corpoacao.png" alt="">
                            <img src="res/site/img/pelc.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->
    
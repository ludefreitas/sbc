<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2><?php echo htmlspecialchars( $espaco["nomeespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            
            <div class="col-md-3 col-sm-6">
                <div class="single-shop-product">
                    <div class="product-upper">
                    </div>
                    <h2><a href=""><?php echo htmlspecialchars( $espaco["descespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></h2>
                    <div class="product-carousel-price">
                        <ins><?php echo htmlspecialchars( $espaco["observacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></ins>
                    </div>  
                </div>
            </div>
            
            
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="product-pagination text-center">
                    <nav>
                        <ul class="pagination">
                        <li>
                            <a href="#" aria-label="Previous">
                            <span aria-hidden="true">«</span>
                            </a>
                        </li>
                        <li><a href="#">1</a></li>                        
                        <li>
                            <a href="#" aria-label="Next">
                            <span aria-hidden="true">»</span>
                            </a>
                        </li>
                        </ul>
                    </nav>                        
                </div>
            </div>
        </div>
    </div>
</div>
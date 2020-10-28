<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2> <?php echo htmlspecialchars( $local["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3653.942486586681!2d-46.559485385380924!3d-23.678014671794863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce43ab9d337473%3A0xfa781f4cb20f6822!2sAv.%20Kennedy%2C%201155%20-%20Jardim%20do%20Mar%2C%20S%C3%A3o%20Bernardo%20do%20Campo%20-%20SP%2C%2009726-263!5e0!3m2!1spt-BR!2sbr!4v1603810364835!5m2!1spt-BR!2sbr" width="310" height="170" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></h2><h4><?php echo htmlspecialchars( $local["nomelocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>
                    
                </div>
            </div>
            
            </div>
        </div>
    </div>
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            
             <?php $counter1=-1;  if( isset($turma) && ( is_array($turma) || $turma instanceof Traversable ) && sizeof($turma) ) foreach( $turma as $key1 => $value1 ){ $counter1++; ?>
            <div class="col-md-3 col-sm-6">
                <div class="single-shop-product">
                    <div class="product-upper">
                            <img class="img-responsive" id="image-preview" src="<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Photo">
                    </div>
                    <h2><a href="/turma/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                         <?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> do Programa <?php echo htmlspecialchars( $value1["prograativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - para <?php echo htmlspecialchars( $value1["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?> de <?php echo htmlspecialchars( $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> a <?php echo htmlspecialchars( $value1["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> anos - <?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> das <?php echo htmlspecialchars( $value1["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $value1["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                       
                    </a></h2>             
                    
                    <div class="product-option-shop">
                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/turma/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Inscrever-se</a>
                    </div>                       
                </div>
            </div> 
            <?php } ?>      

        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="product-pagination text-center">
                    <nav>
                        <ul class="pagination">
                        <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
                        <li><a href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                        <?php } ?>
                        </ul>
                    </nav>                        
                </div>
            </div>
        </div>
    </div>
</div>
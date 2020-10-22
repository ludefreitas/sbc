<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="atividade-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="atividade-bit-title text-center">
                    <h2><?php echo htmlspecialchars( $atividade["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="single-atividade-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="atividade-content-right">
                    <div class="atividade-breadcroumb">
                        <a href="/">Home</a>
                        <a href=""><?php echo htmlspecialchars( $atividade["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
                    </div>
                    
                    <div class="row">
                       

                        <div class="col-sm-6">
                            <div class="atividade-images">
                                <div class="atividade-main-img">
                                    <img src="<?php echo htmlspecialchars( $atividade["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                </div>
                            </div>
                        </div>
                
                        <div class="col-sm-6">
                            <div class="atividade-inner">                
                                
                                <form action="/cart/<?php echo htmlspecialchars( $atividade["idativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add" class="cart">
                                    <button class="add_to_cart_button" type="submit">Increver-se</button>
                                </form>   
                                 
                                <div class="atividade-inner-atividade">
                                    <p>Locais <?php $counter1=-1;  if( isset($local) && ( is_array($local) || $local instanceof Traversable ) && sizeof($local) ) foreach( $local as $key1 => $value1 ){ $counter1++; ?> <a href="/local/<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a><?php } ?>.
                                </div> 
                                
                                <div role="tabpanel">
                                    <ul class="atividade-tab" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Descrição</a></li>
                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Avaliações</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                                            <h2>Descrição da Atividade</h2>

                                            <h2><?php echo htmlspecialchars( $atividade["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> do Programa <?php echo htmlspecialchars( $atividade["prograativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - para <?php echo htmlspecialchars( $atividade["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?> de <?php echo htmlspecialchars( $atividade["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> a <?php echo htmlspecialchars( $atividade["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> anos - <?php echo htmlspecialchars( $atividade["geneativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>

                                            
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="profile">
                                            <h2>Reviews</h2>
                                            <div class="submit-review">
                                                <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                <div class="rating-chooser">
                                                    <p>Your rating</p>

                                                    <div class="rating-wrap-post">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                <p><input type="submit" value="Submit"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>                    
            </div>
        </div>
    </div>
</div>
<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="turma-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="turma-bit-title text-center">
                    <h2><?php echo htmlspecialchars( $turma["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="single-turma-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="turma-content-right">
                    <div class="turma-breadcroumb">
                        <a href="/">Home</a>  /
                        <a href=""><?php echo htmlspecialchars( $turma["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
                    </div>
                    
                    <div class="row">
                       

                        <div class="col-sm-6">
                            <div class="turma-images">
                                <div class="turma-main-img">
                                    <img src="<?php echo htmlspecialchars( $turma["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                </div>
                            </div>
                        </div>
                
                        <div class="col-sm-6">
                            <div class="turma-inner">                
                                
                                <form action="#" class="cart">
                                    <button class="add_to_cart_button" type="submit">Increver-se</button>
                                </form>   
                                 
                                <div class="turma-inner-turma">
                                    <p>Locais <?php $counter1=-1;  if( isset($local) && ( is_array($local) || $local instanceof Traversable ) && sizeof($local) ) foreach( $local as $key1 => $value1 ){ $counter1++; ?> <a href="/local/<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a><?php } ?>.
                                </div> 
                                
                                <div role="tabpanel">
                                    <ul class="turma-tab" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Descrição</a></li>
                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Avaliações</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home">

                                            <h2><?php echo htmlspecialchars( $turma["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> do Programa <?php echo htmlspecialchars( $turma["prograativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - para <?php echo htmlspecialchars( $turma["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?> de <?php echo htmlspecialchars( $turma["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> a <?php echo htmlspecialchars( $turma["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> anos - <?php echo htmlspecialchars( $turma["geneativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> no período da <?php echo htmlspecialchars( $turma["periodo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> das <?php echo htmlspecialchars( $turma["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $turma["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?> na <?php echo htmlspecialchars( $turma["descespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?> do Crec <?php echo htmlspecialchars( $turma["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> com o(a) professor(a) <?php echo htmlspecialchars( $turma["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </h2>

                                            
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
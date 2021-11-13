<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">                
            <div class="col-md-3" style="margin: 10px 0px 0px 0px;">
                <?php require $this->checkTemplate("user-profile-menu");?>
            </div>
            <div class="col-md-8 alert alert-info" style="margin: 10px 15px 10px 15px;">
                <div class="cart-collaterals">
                    <h5>Alterar Senha</h5>
                </div>

                <?php if( $changePassError != '' ){ ?>
                <div class="alert alert-danger">
                    <?php echo htmlspecialchars( $changePassError, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
                <?php } ?>

                <?php if( $changePassSuccess != '' ){ ?>
                <div class="alert alert-success">
                    <?php echo htmlspecialchars( $changePassSuccess, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
                <?php } ?>
                
                <form action="/user-change-password" method="post">
                    <div class="form-group">
                    <label for="current_pass">Senha Atual</label>
                    <input type="password" class="form-control" id="current_pass" name="current_pass">
                    </div>
                    <hr>
                    <div class="form-group">
                    <label for="new_pass">Nova Senha</label>
                    <input type="password" class="form-control" id="new_pass" name="new_pass">
                    </div>
                    <div class="form-group">
                    <label for="new_pass_confirm">Confirme a Nova Senha</label>
                    <input type="password" class="form-control" id="new_pass_confirm" name="new_pass_confirm">
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>

            </div>
        </div>
    </div>
</div>
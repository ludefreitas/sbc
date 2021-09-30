<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div>
    <div class="container">
        <div class="row">                
            <div class="col-md-3" style="margin: 15px -5px 0px 0px">
                <?php require $this->checkTemplate("user-profile-menu");?>
            </div>
            <div class="col-md-9 alert alert-info"  style="margin: 10px 15px 10px 15px;">
                <div class="cart-collaterals">
                    <h5>Alterar Email / Telefone</h5>
                </div>
                <?php if( $profileMsg != '' ){ ?>
                <div class="alert alert-success">
                    <?php echo htmlspecialchars( $profileMsg, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
                <?php } ?>
                <?php if( $profileError != '' ){ ?>
                <div class="alert alert-danger">
                    <?php echo htmlspecialchars( $profileError, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
                <?php } ?>                
                <form method="post" action="/user/profile">
                    <div class="form-group">
                    <label for="desperson" style="font-weight: bold; margin: 5px">Nome completo</label>
                    <input type="text" class="form-control" id="desperson" name="desperson" placeholder="Digite o nome aqui" value="<?php echo htmlspecialchars( $user["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" minlength="14">
                    </div>
                    <div class="form-group">
                    <label for="desemail" style="font-weight: bold; margin: 5px">E-mail</label>
                    <input type="email" class="form-control" id="desemail" name="desemail" placeholder="Digite o e-mail aqui" value="<?php echo htmlspecialchars( $user["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <div class="form-group">
                    <label for="nrphone" style="font-weight: bold; margin: 5px">Telefone</label>
                        <input type="text" name="nrphone" id="nrphone" pattern="\([0-9]{2}\)[\s][0-9]{5}-[0-9]{5,4}" class="form-control" value="<?php echo htmlspecialchars( $user["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" />
                            <script type="text/javascript">$("#nrphone").mask("(00) 00000-0009");</script>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
            
        </div>
    </div>
</div>
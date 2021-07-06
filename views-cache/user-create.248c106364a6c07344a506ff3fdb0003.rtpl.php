<?php if(!class_exists('Rain\Tpl')){exit;}?>
         <div class="container"> <!-- container 1 -->
                    <div class="row"> <!-- row 2 -->
                      <div class="col-md-12" style="text-align-last: left; background-color: white; margin: 15px 0px 50px 0px;">
                  

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    
                    <?php if( $error != '' ){ ?>
                    <div class="alert alert-danger">
                    <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </div>
                    <?php } ?>
                </div>

        </div>
       </div>
            <div class="container">
            <div class="row">
                
                <div class="col-md-6">
                    <?php if( $errorRegister != '' ){ ?>
                    <div class="alert alert-danger">
                    <?php echo htmlspecialchars( $errorRegister, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </div>
                    <?php } ?>

                    <?php if( $errorRegisterSendmail != '' ){ ?>
                    <div class="alert alert-danger">
                    <?php echo htmlspecialchars( $errorRegisterSendmail, ENT_COMPAT, 'UTF-8', FALSE ); ?> <a href="/forgot">Clique aqui para recuperar senha!</a>
                    </div>
                    <?php } ?>

                    <form id="" action="/register" class="register" method="post">
                        <h2>Criar conta</h2>
                        <p >
                            <label style="font-size: 12px; margin: 0px">Nome Completo *</label>
                            <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars( $registerValues["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        </p>
                        <p >
                            <label style="font-size: 12px; margin: 0px">Telefone *</label>
                            <input type="text" id="phone" name="phone" class="form-control" value="<?php echo htmlspecialchars( $registerValues["phone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        </p>
                        <p >
                            <label style="font-size: 12px; margin: 0px">Email *</label>
                            <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars( $registerValues["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        </p>
                        <p >
                            <label style="font-size: 12px; margin: 0px">Confirme o Email</label>
                            <input type="email" id="emailconfirme" name="emailconfirme" class="form-control" value="<?php echo htmlspecialchars( $registerValues["emailconfirme"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        </p>
                        <p >                            
                            <label style="font-size: 12px; margin: 0px">Senha *</label>
                            <input type="password" id="senha" name="password" class="form-control">
                        </p>
                        <p >                            
                            <label style="font-size: 12px; margin: 0px">Confirme a senha</label>
                            <input type="password" id="senhaconfirme" name="password" class="form-control">
                        </p>
                        <div class="clear"></div>
                        <p class="form-row">
                            <input type="submit" value="Criar Conta" name="login" class="button">
                        </p>
                        <div class="clear"></div>
                    </form>               
                </div>
            </div>
        </div>
        </div> <!-- final da index -->

                             



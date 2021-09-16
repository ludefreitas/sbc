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

                        <?php if( $profileMsg != '' ){ ?>
                        <div class="alert alert-success">
                        <?php echo htmlspecialchars( $profileMsg, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                        </div>
                        <?php } ?>

                    </div>
            </div>
           </div>
                <div class="container">
                <div class="row">
                    <div class="col-md-6">                    
                            
                        <form action="/login" id="register-form-wrap" class="login" method="post">
                            <h3>Acessar / Login</h3>
                            <p>Não tem conta?&nbsp;&nbsp; <a href="/user-create">Cadastre-se!</a>   </p>                  
                            <p class="form-row form-row-first">
                                <label for="login">
                                    E-mail <span class="required">*</span>
                                </label>
                            <input type="text" id="login" name="login" class="input-text">
                            </p>
                            <p class="form-row form-row-last">
                                <label for="senha">
                                    Senha <span class="required">*</span>
                                </label>
                                <input type="password" id="senha" name="password" class="input-text">
                            </p>
                            <div class="clear"></div>
                            <p class="form-row">
                                <input type="submit" value="Entrar" class="button">                              
                            </p>

                            <p class="form-row">
                                <label class="inline" for="rememberme"><input type="checkbox" value="forever" id="rememberme" name="rememberme"> Manter conectado </label>
                            </p>
                            <p class="lost_password">
                                <a href="admin/forgot">Esqueceu a senha?</a>
                            </p>
                            <div class="clear"></div>
                        </form>  

                    </div>
                    
                </div>
            </div>
            </div> <!-- final da index -->

                                 



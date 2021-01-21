<?php if(!class_exists('Rain\Tpl')){exit;}?> 
<div class="product-big-title-area">
    <div class="container">
        
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Cadastrar Nova Pessoa</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="single-product-area">

    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row"> 

              <div class="col-md-6">
                <div class="alert alert-info">
            <a class="btn btn-success" href="/user/pessoas" role="button">Meus dependentes</a>
        </div>

                
                <?php if( $errorRegister != '' ){ ?>

                <div class="alert alert-danger">
                    <?php echo htmlspecialchars( $errorRegister, ENT_COMPAT, 'UTF-8', FALSE ); ?>

                </div>
                <?php } ?>


                <form id="register-form-wrap" action="/registerpessoa" class="register" method="post">
                    <h2>Cadastrar Nova Pessoa</h2>
                    <p class="form-row form-row-first">
                        <label for="nomepess">Nome Completo <span class="required">*</span>
                        </label>
                        <input type="text" id="nomepess" name="nomepess" class="input-text" value="<?php echo htmlspecialchars( $registerValues["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </p>
                    <p class="form-row form-row-first">
                        <label for="dtnasc">Data do Nascimento <span class="required">*</span>
                        </label>
                        <input type="date" id="dtnasc" name="dtnasc" class="input-text" value="<?php echo htmlspecialchars( $registerValues["dtnasc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </p>
                    <p class="form-row form-row-first">
                        <label for="sexo">Sexo
                        </label>
                        <select class="form-control" name="sexo">
                            <option selected="" value="">Selecione</option>                      
                             
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                            <option value="Não Declarado">Não Declarado</option>
                            
                        </select>                        
                    </p>

                    <p class="form-row form-row-first">
                        <label for="numcpf">Número do CPF<span class="required">*</span>
                        </label>
                        <input type="number" id="numcpf" name="numcpf" class="input-text" value="<?php echo htmlspecialchars( $registerValues["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </p>

                    <p class="form-row form-row-first">
                        <label for="numrg">Número do RG<span class="required">*</span>
                        </label>
                        <input type="text" id="numrg" name="numrg" class="input-text" value="<?php echo htmlspecialchars( $registerValues["numrg"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </p>

                    <p class="form-row form-row-first">
                        <label for="numsus">Número do Cartão do SUS<span class="required">*</span>
                        </label>
                        <input type="number" id="numsus" name="numsus" class="input-text" value="<?php echo htmlspecialchars( $registerValues["numsus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </p>

                     <label for="vulnsocial">Vulnerabilidade Social?
                        </label>
                        <select class="form-control" name="vulnsocial">
                            <option selected="" value="">Seclecione</option>     
                            
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                            
                        </select>    

                        <p class="form-row form-row-first">
                        <label for="cadunico">Número do CadÚnico<span class="required"></span>
                        </label>
                        <input type="text" id="cadunico" name="cadunico" class="input-text" value="<?php echo htmlspecialchars( $registerValues["cadunico"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        </p>   

                        <p class="form-row form-row-first">
                        <label for="nomemae">Nome da Mãe<span class="required">*</span>
                        </label>
                        <input type="text" id="nomemae" name="nomemae" class="input-text" value="<?php echo htmlspecialchars( $registerValues["nomemae"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        </p>     

                        <p class="form-row form-row-first">
                        <label for="cpfmae">CPF da Mãe<span class="required">*</span>
                        </label>
                        <input type="number" id="cpfmae" name="cpfmae" class="input-text" value="<?php echo htmlspecialchars( $registerValues["cpfmae"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        </p>         

                        <p class="form-row form-row-first">
                        <label for="nomepai">Nome da Pai<span class="required">*</span>
                        </label>
                        <input type="text" id="nomepai" name="nomepai" class="input-text" value="<?php echo htmlspecialchars( $registerValues["nomepai"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        </p>     

                        <p class="form-row form-row-first">
                        <label for="cpfpai">CPF da Pai<span class="required">*</span>
                        </label>
                        <input type="number" id="cpfpai" name="cpfpai" class="input-text" value="<?php echo htmlspecialchars( $registerValues["cpfpai"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        </p>                                                                 

                    
                    <div class="clear"></div>

                    <p class="form-row">
                        <input type="submit" value="Cadastrar" name="registerPessoa" class="button">
                    </p>

                    <p class="form-row">
                        <input type="submit" value="Cancelar" name="login" class="button">
                    </p>

                    <div class="clear"></div>
                </form>               
            </div>
        </div>
    </div>
</div>
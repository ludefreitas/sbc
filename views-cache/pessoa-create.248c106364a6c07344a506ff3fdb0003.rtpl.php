<?php if(!class_exists('Rain\Tpl')){exit;}?>

 <div class="container"> <!-- container 1 -->
            <div class="row"> <!-- row 2 -->
              <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 15px 0px 50px 0px;">

<div class="container">
    <div class="row" style="padding-bottom: 5px">
    
        <div class="col-md-12">

            <div class="alert alert-success" style="text-align-last: center;">
                <a class="btn btn-success" href="/user/pessoas" role="button">Meus dependentes</a>
            </div>

    
            <?php if( $errorRegister != '' ){ ?>
            <div class="alert alert-danger">
             <?php echo htmlspecialchars( $errorRegister, ENT_COMPAT, 'UTF-8', FALSE ); ?>
            </div>
            <?php } ?>

            <form id="register-form-wrap" action="/registerpessoa" class="register" method="post">
                <h3>Preencha os campos abaixo para cadastrar uma nova pessoa</h3>
                
                <label for="nomepess">
                    Nome Completo 
                    <span class="required">
                    *
                    </span>
                </label>
                <input style="width: 100%; float: right;" type="text" id="nomepess" name="nomepess" class="input-text" value="<?php echo htmlspecialchars( $registerpessoaValues["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Informe o nome completo">                
                <label for="dtnasc">
                    <br>Data do Nascimento
                    <span class="required">
                        *
                    </span>
                </label>
                <input style="width: 100%; float: right;" type="date" id="dtnasc" name="dtnasc" class="input-text" value="<?php echo htmlspecialchars( $registerpessoaValues["dtnasc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">               
                
                <label for="sexo"><br>
                    <br>Sexo
                </label>
                <select style="width: 100%; float: right;" class="form-control" name="sexo">
                    <option selected="" value="">Selecione</option>                            
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Não Declarado">Não Declarado</option>                            
                </select>     

                <label for="numcpf">
                    <br><br>Número do CPF 
                    <span class="required">
                        *
                    </span>
                </label>
                <input style="width: 100%; float: right;" type="number" id="numcpf" name="numcpf" class="input-text" value="<?php echo htmlspecialchars( $registerpessoaValues["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
               

                <label for="numrg">
                    <br><br>Número do RG 
                    <span class="required">
                        *
                    </span>
                </label>
                <input style="width: 100%; float: right;" type="text" id="numrg" name="numrg" class="input-text" value="<?php echo htmlspecialchars( $registerpessoaValues["numrg"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                <label for="numsus">
                    <br><br>Número do Cartão do SUS 
                    <span class="required">
                        *
                    </span>
                </label>
                <input style="width: 100%; float: right;" type="number" id="numsus" name="numsus" class="input-text" value="<?php echo htmlspecialchars( $registerpessoaValues["numsus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                

                
                <label for="vulnsocial">
                    <br><br>Vulnerabilidade Social?
                </label>
                <select style="width: 100%; float: right;" class="form-control" name="vulnsocial">
                    <option selected="" value="">Seclecione</option>                            
                    <option value="1">Sim</option>
                    <option value="0">Não</option>                                   
                </select>                 
                
                <label for="cadunico">
                    <br><br>Número do CadÚnico
                    <span class="required">
                        *
                    </span>
                </label>
                <input style="width: 100%; float: right;" type="number" id="cadunico" name="cadunico" class="input-text" value="<?php echo htmlspecialchars( $registerpessoaValues["cadunico"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                
                <label for="nomemae">
                    <br><br>Nome da Mãe
                    <span class="required">
                        *
                    </span>
                </label>
                <input style="width: 100%; float: right;" type="text" id="nomemae" name="nomemae" class="input-text" value="<?php echo htmlspecialchars( $registerpessoaValues["nomemae"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">                
                
                <label for="cpfmae">
                    <br><br>CPF da Mãe
                    <span class="required">
                        *
                    </span>
                </label>
                <input style="width: 100%; float: right;" type="number" id="cpfmae" name="cpfmae" class="input-text" value="<?php echo htmlspecialchars( $registerpessoaValues["cpfmae"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                
                <label for="nomepai">
                    <br><br>Nome da Pai
                    <span class="required">
                        *
                    </span>
                </label>
                <input style="width: 100%; float: right;" type="text" id="nomepai" name="nomepai" class="input-text" value="<?php echo htmlspecialchars( $registerpessoaValues["nomepai"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                
                <label for="cpfpai">
                    CPF da Pai
                    <span class="required">
                        *
                    </span>
                </label>
                <input style="width: 100%; float: right;" type="number" id="cpfpai" name="cpfpai" class="input-text" value="<?php echo htmlspecialchars( $registerpessoaValues["cpfpai"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">           
            </div>  
        </div>
        <div class="row" style="padding-bottom: 10px;">
            <div class="col-md-12">
                <input style="width: 100%; float: right; background-color: #15a03f;" type="submit" value="Cadastrar" name="registerPessoa" class="btn">
            </div>                   
        </div>
            </form>               
        <div class="row">
            <div class="col-md-12" style="text-align: center">

                    <a class="btn" data-quantity="1" style="width: 100%; float: right; background-color: #ce2c3e;  text-decoration: none; color: white;" href="/" text-decoration="none">CANCELAR
                    </a>
                    <!-- <input style="width: 100%; float: right; background-color: #ce2c3e;" type="submit" value="Cancelar" name="login" class="button"> -->
               
            </div>
        </div>   
</div>     
</div> <!-- final da index -->               



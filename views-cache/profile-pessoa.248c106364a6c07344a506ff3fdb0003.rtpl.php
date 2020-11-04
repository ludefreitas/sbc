<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2><?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">                
            <div class="col-md-3">
                <div class="list-group" id="menu">
                <a href="/profile/pessoa" class="list-group-item list-group-item-action">Editar Dados</a>
                </a>
                <a href="/user/pessoas" class="list-group-item list-group-item-action">Todos Dependentes</a>
                <a href="/" class="list-group-item list-group-item-action">Voltar</a>
            </div>
            </div>
            <div class="col-md-9">
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
                <form role="form" action="/profile/pessoa" method="post" >

                    <div class="form-group">
                    <label for="desperson">Nome completo</label>
                    <input type="text" class="form-control" id="desperson" name="desperson" placeholder="Digite o nome aqui" value="<?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <div class="form-group">
                    <label for="dtnasc">Data do Nascimento <span class="required">*</span>
                        </label>
                        <input type="date" id="dtnasc" name="dtnasc" class="input-text" value="<?php echo htmlspecialchars( $pessoa["dtnasc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <div class="form-group">
                    <label for="sexo">Sexo
                        </label>
                        <select class="form-control" name="sexo">
                            <option selected="">Selecione</option>                      
                            
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                            <option value="Não Declarado">Não Declarado</option>
                            
                        </select>                        

                    </div>
                     <div class="form-group">
                     <label for="numcpf">Número do CPF<span class="required">*</span>
                        </label>
                        <input type="number" id="numcpf" name="numcpf" class="input-text" value="<?php echo htmlspecialchars( $pessoa["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <div class="form-group">
                     <label for="numrg">Número do RG<span class="required">*</span>
                        </label>
                        <input type="text" id="numrg" name="numrg" class="input-text" value="<?php echo htmlspecialchars( $pessoa["numrg"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <div class="form-group">
                     <label for="numsus">Número do Cartão do SUS<span class="required">*</span>
                        </label>
                        <input type="number" id="numsus" name="numsus" class="input-text" value="<?php echo htmlspecialchars( $pessoa["numsus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <div class="form-group">
                     <label for="vulnsocial">Vulnerabilidade Social?
                        </label>
                        <select class="form-control" name="vulnsocial">
                            <option selected="">Seclecione</option>     
                            
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                            
                        </select>   
                    </div>
                    <div class="form-group">
                     <label for="cadunico">Número do CadÚnico<span class="required"></span>
                        </label>
                        <input type="number" id="cadunico" name="cadunico" class="input-text" value="<?php echo htmlspecialchars( $pessoa["cadunico"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    
                    <div class="form-group">
                     <label for="nomemae">Nome da Mãe<span class="required">*</span>
                        </label>
                        <input type="text" id="nomemae" name="nomemae" class="input-text" value="<?php echo htmlspecialchars( $pessoa["nomemae"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <div class="form-group">
                     <label for="cpfmae">CPF da Mãe<span class="required">*</span>
                        </label>
                        <input type="number" id="cpfmae" name="cpfmae" class="input-text" value="<?php echo htmlspecialchars( $pessoa["cpfmae"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <div class="form-group">
                     <label for="nomepai">Nome da Pai<span class="required">*</span>
                        </label>
                        <input type="text" id="nomepai" name="nomepai" class="input-text" value="<?php echo htmlspecialchars( $pessoa["nomepai"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <div class="form-group">
                     <label for="cpfpai">CPF da Pai<span class="required">*</span>
                        </label>
                        <input type="number" id="cpfpai" name="cpfpai" class="input-text" value="<?php echo htmlspecialchars( $pessoa["cpfpai"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>

                    <button type="submit"  class="btn btn-primary">Salvar</button>                    

                </form>
            </div>
        </div>
    </div>
</div>
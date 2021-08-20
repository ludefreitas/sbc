<?php if(!class_exists('Rain\Tpl')){exit;}?>
<script>

    function quantosAnos(nascimento, hoje) {

        var diferencaAnos = hoje.getFullYear() - nascimento.getFullYear();
        if ( new Date(hoje.getFullYear(), hoje.getMonth(), hoje.getDate()) < 
         new Date(hoje.getFullYear(), nascimento.getMonth(), nascimento.getDate()) )
        diferencaAnos--;
        return diferencaAnos;
    }       

    function menorDeIdade(){     

        let hoje = new Date()

        let dtnasc = new Date(document.getElementById('dtnasc').value)

        let idadeAnos = quantosAnos(dtnasc, hoje)

        if(idadeAnos < 0){
            alert('Data inválida! Idade não pode ser menor que 0.')
            document.getElementById('dtnasc').value = 0
        }

        if (idadeAnos > 18){
            document.getElementById('maeEpai').hidden = true
        }else{
            document.getElementById('maeEpai').hidden = false
        }
    }
    
</script>

     <div class="container"> <!-- container 1 -->
                <div class="row"> <!-- row 2 -->
                  <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 15px 0px 50px 0px;">

    <div class="container">
        <div class="row" style="padding-bottom: 5px">
        
            <div class="col-md-12">

                <div class="alert alert-success" style="text-align-last: center;">
                    <span style="font-weight: bold;">ATUALIZAR PESSOA/DEPENDENTE</span style="font-weight: bold;">
                </div>

        
                

                <?php if( $error != '' ){ ?>
                <div class="alert alert-danger" style="text-align-last: center;">
                    <span style="font-weight: bold;"><?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></span style="font-weight: bold;">
                </div>                
                <?php } ?>

                <form id="register-form-wrap" action="/updatepessoa/<?php echo htmlspecialchars( $pessoa["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="register" method="post">
                    
                    
                    <label for="nomepess">
                        Nome Completo 
                        <span class="required">
                        *
                        </span>
                    </label>
                    <input style="width: 100%; float: right;" type="text" id="nomepess" name="nomepess" class="input-text" value="<?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Informe o nome completo">

                    <label for="dtnasc">
                        <br>Data do Nascimento
                        <span class="required">
                            *
                        </span>
                    </label>
                    <input onblur="menorDeIdade()" style="width: 100%; float: right;" type="date" id="dtnasc" name="dtnasc" class="input-text" value="<?php echo htmlspecialchars( $pessoa["dtnasc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">               
                    
                    <label for="sexo"><br>
                        <br>Sexo
                    </label>
                    
                    <select style="width: 100%; float: right;" class="form-control" name="sexo">
                        <option selected="" value="<?php echo htmlspecialchars( $pessoa["sexo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $pessoa["sexo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option> 
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
                    <input disabled="" style="width: 100%; float: right;" type="number" id="numcpf" name="numcpf" class="input-text" value="<?php echo htmlspecialchars( $pessoa["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                   

                    <label for="numrg">
                        <br><br>Número do RG 
                        <span class="required">
                            *
                        </span>
                    </label>
                    <input style="width: 100%; float: right;" type="text" id="numrg" name="numrg" class="input-text" value="<?php echo htmlspecialchars( $pessoa["numrg"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                    <label for="numsus">
                        <br><br>Número do Cartão do SUS 
                        <span class="required">
                            *
                        </span>
                    </label>
                    <input style="width: 100%; float: right;" type="number" id="numsus" name="numsus" class="input-text" value="<?php echo htmlspecialchars( $pessoa["numsus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    


                    
                    <label for="vulnsocial">
                        <br><br>Vulnerabilidade Social?
                    </label>
                    <select id="vulnsocial" style="width: 100%; float: right;" class="form-control" name="vulnsocial">
                        <option selected="" value="<?php echo htmlspecialchars( $pessoa["vulnsocial"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Selecione</option>                    
                        <option value="0">Não</option>                         
                        <option value="1">Sim</option>    
                       
                        
                    </select>                 
                    
                    <div id="divCadunico">
                    <label for="cadunico">
                        <br><br>Número do CadÚnico
                        <span class="required">
                            *
                        </span>
                    </label>
                    <input style="width: 100%; float: right;" type="number" id="cadunico" name="cadunico" class="input-text" value="<?php echo htmlspecialchars( $pessoa["cadunico"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>

                    <div id="maeEpai">
                    <label for="nomemae">
                        <br><br>Nome da Mãe
                        <span class="required">
                            <span style="font-size: 12px; font-weight: bold">* (Necessário preencher este campo se a pessoa, a cadastrar, for menor de idade)</span>
                        </span>
                    </label>
                    <input style="width: 100%; float: right;" type="text" id="nomemae" name="nomemae" class="input-text" value="<?php echo htmlspecialchars( $pessoa["nomemae"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">                
                    
                    <label for="cpfmae">
                        <br><br>CPF da Mãe
                        <span class="required">
                            *
                        </span>
                    </label>
                    <input style="width: 100%; float: right;" type="number" id="cpfmae" name="cpfmae" class="input-text" value="<?php echo htmlspecialchars( $pessoa["cpfmae"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    
                    <label for="nomepai">
                        <br><br>Nome da Pai
                        <span class="required">
                            <span style="font-size: 12px; font-weight: bold">* (Necessário preencher este campo se a pessoa, a cadasttrar, for menor de idade)</span>
                        </span>
                    </label>
                    <input style="width: 100%; float: right;" type="text" id="nomepai" name="nomepai" class="input-text" value="<?php echo htmlspecialchars( $pessoa["nomepai"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    
                    <label for="cpfpai">
                        CPF da Pai
                        <span class="required">
                            *
                        </span>
                    </label>
                    <input style="width: 100%; float: right;" type="number" id="cpfpai" name="cpfpai" class="input-text" value="<?php echo htmlspecialchars( $pessoa["cpfpai"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">  
                    </div>         
                </div>  
            </div>
            <div class="row" style="padding-bottom: 10px;">
                <div class="col-md-12">
                    <input style="width: 100%; float: right; background-color: #15a03f;" type="submit" value="Atualizar" name="registerPessoa" class="btn">
                </div>                   
            </div>
                </form>               
            <div class="row">
                <div class="col-md-12" style="text-align: center">

                        <a class="btn" data-quantity="1" style="width: 100%; float: right; background-color: #ce2c3e;  text-decoration: none; color: white;" href="/user/pessoas" text-decoration="none">CANCELAR
                        </a>
                        <!-- <input style="width: 100%; float: right; background-color: #ce2c3e;" type="submit" value="Cancelar" name="login" class="button"> -->
                   
                </div>
            </div>   
    </div>     

    <script>

</script>

    </div> <!-- final da index -->               



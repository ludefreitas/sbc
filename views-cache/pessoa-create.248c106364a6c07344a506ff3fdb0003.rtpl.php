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

    function vulnerabilidade(){

        let vulnsocial = document.getElementById('vulnsocial').value

        if(vulnsocial == 0){
            document.getElementById('divCadunico').hidden = true
        }else{
           document.getElementById('divCadunico').hidden = false
        }
    }  

    function getDadosEnderecoPorCep(cep){

        let url = 'https://viacep.com.br/ws/'+cep+'/json/unicode/'

        let xmlHttp = new XMLHttpRequest()
        xmlHttp.open('GET', url)

        xmlHttp.onreadystatechange = () => {
            if(xmlHttp.readyState == 4 && xmlHttp.status == 200){

                let dadosJSONText = xmlHttp.responseText

                let dadosJSONObj = JSON.parse(dadosJSONText)

                document.getElementById('rua').value = dadosJSONObj.logradouro
                document.getElementById('bairro').value = dadosJSONObj.bairro
                document.getElementById('cidade').value = dadosJSONObj.localidade
                document.getElementById('uf').value = dadosJSONObj.uf                                      
            }
            
        }
        xmlHttp.send()        
    }
</script>

     <div class="container"> <!-- container 1 -->
                <div class="row"> <!-- row 2 -->
                  <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 5px 0px 50px 0px;">

    <div class="container">
        <div class="row" style="padding-bottom: 5px">
        
            <div class="col-md-12">
                
                <?php if( $errorRegister != '' ){ ?>
                <div class="alert alert-danger" style="text-align-last: center;">
                    <span style="font-weight: bold;"><?php echo htmlspecialchars( $errorRegister, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                </div>               
                <?php } ?>

                <?php if( $success != '' ){ ?>
                <div class="alert alert-success">
                 <h4><?php echo htmlspecialchars( $success, ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>
                </div>
                <?php }else{ ?>
                <div class="alert alert-success" style="text-align-last: center;">
                    <span style="font-weight: bold;">Inserir uma nova pessoa</span>
                </div>                
                <?php } ?>

                <form id="register-form-wrap" action="/registerpessoa" class="register" method="post">
                    
                    <label for="nomepess">
                        Nome Completo                        
                    </label>
                    <input style="width: 100%; float: right;" type="text" id="nomepess" name="nomepess" class="input-text" value="<?php echo htmlspecialchars( $registerpessoaValues["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Informe o nome completo" required="required" minlength="14">                
                    <label for="dtnasc">
                        <br>Data do Nascimento
                    </label>
                    <input onblur="menorDeIdade()" style="width: 100%; float: right;" type="date" id="dtnasc" name="dtnasc" class="input-text" value="<?php echo htmlspecialchars( $registerpessoaValues["dtnasc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required="required">               
                    
                    <label for="sexo"><br>
                        <br>Sexo
                    </label>
                    <select style="width: 100%; float: right;" class="form-control" name="sexo" required="required">
                        
                        <?php if( $registerpessoaValues["sexo"] === '' ){ ?>
                        <option selected="" value="">Selecione</option> 
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Não Declarado">Não Declarado</option>                            
                        <?php } ?>
                        <?php if( $registerpessoaValues["sexo"] === 'Feminino' ){ ?>
                        <option selected="" value="Feminino">Feminino</option> 
                        <option value="Masculino">Masculino</option>
                        <option value="Não Declarado">Não Declarado</option>                             
                        <?php } ?>                      
                        <?php if( $registerpessoaValues["sexo"] === 'Masculino' ){ ?>
                        <option selected="" value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Não Declarado">Não Declarado</option>                            
                        <?php } ?>                       
                        
                    </select>     

                    <label for="numcpf">
                        <br><br>Número do CPF                         
                    </label>
                    <input style="width: 100%; float: right;" type="text" maxlength="14" id="numcpf" name="numcpf" class="input-text" value="<?php echo htmlspecialchars( $registerpessoaValues["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}" required="required">
                    <script type="text/javascript">$("#numcpf").mask("000.000.000-00");</script>
                   
                 <!--
                    <label for="numrg">
                        <br><br>Número do RG                         
                    </label>
                    <input style="width: 100%; float: right;" type="text" id="numrg" name="numrg" class="input-text" value="{}" pattern="[0-9]{2}.[0-9]{3}.[0-9]{3}-[0-9]{1}" required="required">
                    <script type="text/javascript">$("#numrg").mask("00.000.000-0");</script>
                -->

                    <label for="numsus">
                        <br><br>Número do Cartão do SUS 
                    </label>
                    <input style="width: 100%; float: right;" type="text" id="numsus" name="numsus" class="input-text" value="<?php echo htmlspecialchars( $registerpessoaValues["numsus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}.[0-9]{3}.[0-9]{3}" required="required">
                    <script type="text/javascript">$("#numsus").mask("000.000.000.000.000");</script>

                    <label for="vulnsocial">
                        <br><br>Vulnerabilidade Social?
                    </label>
                    <select onchange="vulnerabilidade()" id="vulnsocial" style="width: 100%; float: right;" class="form-control" name="vulnsocial" required="required">
                        <?php if( $registerpessoaValues["vulnsocial"] === '' ){ ?>
                        <option selected="" value="">Seclecione</option>                            
                        <option value="1">Sim</option>
                        <option value="0">Não</option>  
                        <?php } ?>   
                        <?php if( $registerpessoaValues["vulnsocial"] === '1' ){ ?>
                        <option sected="" value="1">Sim</option>
                        <option value="0">Não</option>  
                        <?php } ?>  
                        <?php if( $registerpessoaValues["vulnsocial"] === '0' ){ ?>
                        <option sected="" value="0">Não</option>
                        <option value="1">Sim</option>  
                        <?php } ?>                                                                                                      
                    </select>  

                     <div id="divCadunico" hidden="true">
                    <label for="cadunico">
                        <br><br>Número do CadÚnico / NIS                       
                    </label>
                    <input style="width: 100%; float: right;" type="text" id="cadunico" name="cadunico" class="input-text" value="<?php echo htmlspecialchars( $registerpessoaValues["cadunico"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" pattern="[0-9]{3}.[0-9]{5}.[0-9]{2}-[0-9]{1}">
                    <script type="text/javascript">$("#cadunico").mask("000.00000.00-0");</script>
                    </div>  
                    <span style="color: red; font-size: 10px; font-style: italic;"> * Atenção! Para efetuar uma inscrição, nos nossos cursos esportivos, para pessoa em vulnerabilidade social (pessoa participante de programas sociais do governo), você deve selecionar acima a opção 'SIM' e informar, <strong>OBRIGATÓRIAMENTE,</strong> o número de inscrição no Cadùnico/NIS.</span>                     

                    <label for="pcd">
                        <br><br>PCD?
                    </label>
                    <select id="pcd" style="width: 100%; float: right;" class="form-control" name="pcd" required="required">
                        <?php if( $registerpessoaValues["pcd"] === '' ){ ?>
                        <option selected="" value="">Seclecione</option>                            
                        <option value="1">Sim</option>
                        <option value="0">Não</option>  
                        <?php } ?>   
                        <?php if( $registerpessoaValues["pcd"] === '1' ){ ?>
                        <option sected="" value="1">Sim</option>
                        <option value="0">Não</option>  
                        <?php } ?>  
                        <?php if( $registerpessoaValues["pcd"] === '0' ){ ?>
                        <option sected="" value="0">Não</option>
                        <option value="1">Sim</option>  
                        <?php } ?>                                                                              
                    </select>       

                    <div id="maeEpai">

                        <label for="nomemae">
                            <br><br>Nome da Mãe
                            <span class="required">
                                <span style="font-size: 12px; font-weight: bold">* (Necessário preencher este campo se a pessoa, a cadastrar, for menor de idade)</span>
                            </span>
                        </label>
                        <input style="width: 100%; float: right;" type="text" id="nomemae" name="nomemae" class="input-text" value="<?php echo htmlspecialchars( $registerpessoaValues["nomemae"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" minlength="14">                
                        
                        <label for="cpfmae">
                            <br><br>CPF da Mãe                            
                        </label>
                        <input style="width: 100%; float: right;" type="text" maxlength="14" id="cpfmae" name="cpfmae" class="input-text" value="<?php echo htmlspecialchars( $registerpessoaValues["cpfmae"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}">
                    <script type="text/javascript">$("#cpfmae").mask("000.000.000-00");</script>
                        
                        <label for="nomepai">
                            <br><br>Nome do Pai
                            <span class="required">
                                <span style="font-size: 12px; font-weight: bold">* (Necessário preencher este campo se a pessoa, a cadastrar, for menor de idade)</span>
                            </span>
                        </label>
                        <input style="width: 100%; float: right;" type="text" id="nomepai" name="nomepai" class="input-text" value="<?php echo htmlspecialchars( $registerpessoaValues["nomepai"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" minlength="14">                
                        
                        <label for="cpfpai">
                            <br><br>CPF do Pai
                        </label>
                        <input style="width: 100%; float: right;" type="text" maxlength="14" id="cpfpai" name="cpfpai" class="input-text" value="<?php echo htmlspecialchars( $registerpessoaValues["cpfpai"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}">
                    <script type="text/javascript">$("#cpfpai").mask("000.000.000-00");</script>

                    </div>         

                    <label for="endereco">
                        <span style="font-weight: bold;">
                        <br><br><br>Endereço / Telefones
                        </span>                        
                    </label>                            

                    <label for="cep">
                        CEP
                    </label>
                    <input style="width: 100%; float: right;" type="text" id="cep" maxlength="8" name="cep" class="input-text" pattern="[0-9]{5}-[0-9]{3}" value="<?php echo htmlspecialchars( $registerpessoaValues["cep"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onblur="getDadosEnderecoPorCep(this.value)" required="required">
                    <script type="text/javascript">$("#cep").mask("00000-000");</script>                   

                    <label for="rua">
                        <br><br>Rua / Avenida
                    </label>
                    <input style="width: 100%; float: right;" type="text" id="rua" name="rua" class="input-text" value="<?php echo htmlspecialchars( $registerpessoaValues["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required="required">

                    <label for="numero">
                        <br><br>Número                        
                    </label>
                    <input style="width: 100%; float: right;" type="text" id="numero" name="numero" class="input-text" value="<?php echo htmlspecialchars( $registerpessoaValues["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required="required">

                    <label for="complemento">
                        <br><br>Complemento
                    </label>
                    <input style="width: 100%; float: right;" type="text" id="complemento" name="complemento" class="input-text" value="<?php echo htmlspecialchars( $registerpessoaValues["complemento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                    <label for="bairro">
                        <br><br>Bairro
                    </label>
                    <input style="width: 100%; float: right;" type="text" id="bairro" name="bairro" class="input-text" value="<?php echo htmlspecialchars( $registerpessoaValues["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required="required">

                    <label for="cidade">
                        <br><br>Cidade
                    </label>
                    <input style="width: 100%; float: right;" type="text" id="cidade" name="cidade" class="input-text" value="<?php echo htmlspecialchars( $registerpessoaValues["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required="required">

                    <label for="estado">
                        <br><br>Estado 
                    </label>
                    <input style="width: 100%; float: right;" type="text" id="uf" name="estado" class="input-text" value="<?php echo htmlspecialchars( $registerpessoaValues["estado"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required="required"> 

                    <label for="telres">
                        <br><br>Telefone Residencial/Celular
                    </label>
                     <input style="width: 100%; float: right;" type="text" id="telres" name="telres" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" class="input-text" value="<?php echo htmlspecialchars( $registerpessoaValues["telres"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required="required">
                     <script type="text/javascript">$("#telres").mask("(00) 0000-00009");</script>   

                    <label for="contato">
                        <br><br>Nome de uma pessoa para contato em caso de emergência
                    </label>
                    
                    <input style="width: 100%; float: right;" type="text" class="input-text" id="contato" value="<?php echo htmlspecialchars( $registerpessoaValues["contato"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="contato" placeholder="" required="required" minlength="7">

                    <label for="telemer">
                        <br><br>Telefone da pessoa para contato em caso emergência
                    </label>
                     <input style="width: 100%; float: right;" type="text" id="telemer" name="telemer" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" class="input-text" value="<?php echo htmlspecialchars( $registerpessoaValues["telemer"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required="required">
                     <script type="text/javascript">$("#telemer").mask("(00) 0000-00009");</script>
            
            <div class="row" style="padding-bottom: 10px;">
                <div class="col-md-12" style="margin-top: 10px; text-align-last: center">
                    <input style="width: 100%; float: right; background-color: #15a03f;" type="submit" value="Cadastrar" name="registerPessoa" class="btn">
                </div> 
                <div class="col-md-12" style="margin-top: 10px; text-align-last: center">

                        <a class="btn" data-quantity="1" style="width: 100%; float: right; background-color: #ce2c3e;  text-decoration: none; color: white;" href="javascript:window.history.go(-1)" text-decoration="none">CANCELAR
                        </a>
                        <!-- <input style="width: 100%; float: right; background-color: #ce2c3e;" type="submit" value="Cancelar" name="login" class="button"> -->                   
                </div>                  
            </div>
                </form>               
            
            </div>
            </div>    
    </div>     

    <script>

</script>

    </div> <!-- final da index -->               



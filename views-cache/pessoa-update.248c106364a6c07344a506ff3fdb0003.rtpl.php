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
                    <input readonly="" style="width: 100%; float: right;" type="text" id="numcpf" name="numcpf" class="input-text" value="<?php echo htmlspecialchars( $pessoa["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}">
                    <script type="text/javascript">$("#numcpf").mask("000.000.000-00");</script>
                   

                    <label for="numrg">
                        <br><br>Número do RG 
                        <span class="required">
                            *
                        </span>
                    </label>
                    <input style="width: 100%; float: right;" type="text" id="numrg" name="numrg" class="input-text" value="<?php echo htmlspecialchars( $pessoa["numrg"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" pattern="[0-9]{2}.[0-9]{3}.[0-9]{3}-[0-9]{1}">
                    <script type="text/javascript">$("#numrg").mask("00.000.000-0");</script>

                    <label for="numsus">
                        <br><br>Número do Cartão do SUS 
                        <span class="required">
                            *
                        </span>
                    </label>
                    <input style="width: 100%; float: right;" type="text" id="numsus" name="numsus" class="input-text" value="<?php echo htmlspecialchars( $pessoa["numsus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}.[0-9]{3}.[0-9]{3}">
                    <script type="text/javascript">$("#numsus").mask("000.000.000.000.000");</script>
                    
                    <label for="vulnsocial">
                        <br><br>Vulnerabilidade Social?
                    </label>
                    <select id="vulnsocial" style="width: 100%; float: right;" class="form-control" name="vulnsocial">
                        <option selected="" value="<?php echo htmlspecialchars( $pessoa["vulnsocial"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Selecione</option>                    
                        <option value="0">Não</option>                         
                        <option value="1">Sim</option>    
                       
                        
                    </select> 
                    <label for="pcd">
                        <br><br>PCD?
                    </label>
                    <select id="pcd" style="width: 100%; float: right;" class="form-control" name="pcd">
                        <option selected="" value="<?php echo htmlspecialchars( $pessoa["pcd"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Selecione</option>                    
                        <option value="0">Não</option>                         
                        <option value="1">Sim</option>    
                       
                        
                    </select>                                 
                    
                    <div id="divCadunico">
                    <label for="cadunico">
                        <br><br>Número do CadÚnico / NIS
                        <span class="required">
                            *
                        </span>
                    </label>
                    <input style="width: 100%; float: right;" type="text" id="cadunico" name="cadunico" class="input-text" value="<?php echo htmlspecialchars( $pessoa["cadunico"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" pattern="[0-9]{3}.[0-9]{5}.[0-9]{2}-[0-9]{1}">
                    <script type="text/javascript">$("#cadunico").mask("000.00000.00-0");</script>
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
                    <input style="width: 100%; float: right;" type="text" id="cpfmae" name="cpfmae" class="input-text" value="<?php echo htmlspecialchars( $pessoa["cpfmae"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}">
                    <script type="text/javascript">$("#cpfmae").mask("000.000.000-00");</script>
                    
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
                    <input style="width: 100%; float: right;" type="text" id="cpfpai" name="cpfpai" class="input-text" value="<?php echo htmlspecialchars( $pessoa["cpfpai"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}">
                    <script type="text/javascript">$("#cpfpai").mask("000.000.000-00");</script>

                    <label for="cep">
                        CEP
                        <span class="required">
                                
                        </span>
                    </label>
                    <input style="width: 100%; float: right;" type="text" class="form-control" id="cep" value="<?php echo htmlspecialchars( $endereco["cep"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="cep" placeholder="" onblur="getDadosEnderecoPorCep(this.value)" />
                     <script type="text/javascript">$("#cep").mask("00000-000");</script>                  
                    

                     <label for="rua">
                        Rua / Avenida
                        <span class="required">
                                
                        </span>
                    </label>
                   
                    <input style="width: 100%; float: right;" type="text" class="form-control" value="<?php echo htmlspecialchars( $endereco["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="rua" placeholder="" id="rua" />
               

                    <label for="numero">
                        Número
                        <span class="required">
                                
                        </span>
                    </label>
                    
                    <input style="width: 100%; float: right;" type="text" class="form-control" value="<?php echo htmlspecialchars( $endereco["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="numero" placeholder="" id="numero" />

                    <label for="complemento">
                        Complemento
                        <span class="required">
                                
                        </span>
                    </label>                    
                    <input style="width: 100%; float: right;" type="text" class="form-control" value="<?php echo htmlspecialchars( $endereco["complemento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="complemento" placeholder="" id="complemento" />
               

                <label for="bairro">
                        Bairro
                        <span class="required">
                                
                        </span>
                    </label>                    
                    <input style="width: 100%; float: right;" type="text" class="form-control" value="<?php echo htmlspecialchars( $endereco["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="bairro" placeholder="" id="bairro" />

                

                <label for="cidade">
                        Cidade
                        <span class="required">
                                
                        </span>
                    </label>                    
                    <input style="width: 100%; float: right;" type="text" class="form-control" value="<?php echo htmlspecialchars( $endereco["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="cidade" placeholder=""  id="cidade" />
                
                
                    <label for="estado">
                        Estado
                        <span class="required">
                                
                        </span>
                    </label>                    
                    <input style="width: 100%; float: right;" type="text" class="form-control" value="<?php echo htmlspecialchars( $endereco["estado"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="estado" placeholder=""  id="uf" />
               

                <label for="telres">
                        Telefone Residencial/Celular
                        <span class="required">
                                
                        </span>
                </label>
                    <input style="width: 100%; float: right;" type="text" name="telres" id="telres" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" class="form-control" value="<?php echo htmlspecialchars( $endereco["telres"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" />
                     <script type="text/javascript">$("#telres").mask("(00) 0000-00009");</script>         
                
                 <label for="contato">
                        Nome de pessoa para contato em caso de emergência
                        <span class="required">
                                
                        </span>    
                </label>                
                    <input style="width: 100%; float: right;" type="text" class="form-control" value="<?php echo htmlspecialchars( $endereco["contato"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="contato" placeholder=""  id="contato" />
                 <label for="contato">
                        Telefone da pessoa de contato em caso emergência
                        <span class="required">
                                
                        </span>                    
                   </label> 
                    <input style="width: 100%; float: right;" type="text" name="telemer" id="telemer" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" class="form-control" value="<?php echo htmlspecialchars( $endereco["telemer"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" />         
                    <script type="text/javascript">$("#telemer").mask("(00) 0000-00009");</script>         
                </div> 

            <div class="row" style="padding-bottom: 10px;">
                <div class="col-md-12">
                    <input style="width: 100%; float: right; background-color: #15a03f;" type="submit" value="Atualizar" name="registerPessoa" class="btn">
                </div>
                <div class="col-md-12" style="text-align: center">

                        <a class="btn" data-quantity="1" style="width: 100%; float: right; background-color: #ce2c3e;  text-decoration: none; color: white;" href="/user/pessoas" text-decoration="none">CANCELAR
                        </a>                       
                   
                </div>                   
           </div>
                </form>               
           
             </div>     
    </div>     

    </div> <!-- final da index -->               



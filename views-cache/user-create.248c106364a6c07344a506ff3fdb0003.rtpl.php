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
                
                <div class="col-md-7">                    

                    <?php if( $errorRegisterSendmail != '' ){ ?>
                    <div class="alert alert-danger">
                    <?php echo htmlspecialchars( $errorRegisterSendmail, ENT_COMPAT, 'UTF-8', FALSE ); ?> <a href="admin/forgot">Caso seja realmente seu, CLIQUE aqui para recuperar senha!</a>
                    </div>
                    <?php } ?>
                    <?php if( $errorRegister != '' ){ ?>
                    <div class="alert alert-danger" style="text-align-last: center;">
                        <span style="font-weight: bold;"><?php echo htmlspecialchars( $errorRegister, ENT_COMPAT, 'UTF-8', FALSE ); ?></span style="font-weight: bold;">
                    </div>               
                    <?php } ?>

                    <?php if( $success != '' ){ ?>
                        <div class="alert alert-success">
                            <h4><?php echo htmlspecialchars( $success, ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>
                        </div>               
                    <?php } ?>

                    <form id="" action="/register" class="register" method="post">
                        <h4>Criar conta</h4>
                        <p >
                            <label style="font-size: 12px; margin: 0px">Nome Completo</label>
                            <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars( $registerValues["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required="required">
                        </p>
                        <p >
                            <label style="font-size: 12px; margin: 0px">Telefone Celular</label>

                            <input type="text" name="phone" id="phone" pattern="\([0-9]{2}\)[\s][0-9]{5}-[0-9]{5,4}" class="form-control" value="<?php echo htmlspecialchars( $registerValues["phone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required="required" />
                            <script type="text/javascript">$("#phone").mask("(00) 00000-0009");</script>
                        </p>
                        <p >
                            <label style="font-size: 12px; margin: 0px">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars( $registerValues["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required="required">
                        </p>
                        <p >
                            <label style="font-size: 12px; margin: 0px">Confirme o Email</label>
                            <input type="email" id="emailconfirme" name="emailconfirme" class="form-control" value="<?php echo htmlspecialchars( $registerValues["emailconfirme"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required="required">
                        </p>
                        <p >                            
                            <label style="font-size: 12px; margin: 0px">Senha</label>
                            <input type="password" id="senha" name="password" class="form-control" required="required">
                        </p>
                        <p>                            
                            <label style="font-size: 12px; margin: 0px">Confirme a senha</label>
                            <input type="password" id="senhaconfirme" name="passwordrepeat" class="form-control" required="required">
                        </p>
                        
                   <!-- </form>    -->  

                   <p>
                    <label style="font-size: 12px; margin: 0px">
                        <span style="font-size: 16px; font-weight: bold"><br>Dados Pessoais</span>
                    </label> 
                    </p>                         

                    <p>
                        <label style="font-size: 12px; margin: 0px">Data do Nascimento *</label>
                        <input onblur="menorDeIdade()" type="date" id="dtnasc" name="dtnasc" class="form-control" value="<?php echo htmlspecialchars( $registerpessoaValues["dtnasc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required="required">
                    </p> 

                    <p>
                        <label style="font-size: 12px; margin: 0px">Sexo</label>
                    
                    <select  class="form-control" name="sexo" required="required">                    
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
                    </p>  

                    <p>
                        <label style="font-size: 12px; margin: 0px">Número do CPF</label>
                         <input style="width: 100%; float: right;" type="text" maxlength="14" id="numcpf" name="numcpf" class="form-control" value="<?php echo htmlspecialchars( $registerpessoaValues["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}" required="required">
                        <script type="text/javascript">$("#numcpf").mask("000.000.000-00");</script>
                    </p>  
                <!--
                    <p>
                        <label style="font-size: 12px; margin: 0px">Número do RG *</label>
                         <input style="width: 100%; float: right;" type="text" id="numrg" name="numrg" class="form-control" value="" pattern="[0-9]{2}.[0-9]{3}.[0-9]{3}-[0-9]{1}">
                    <script type="text/javascript">$("#numrg").mask("00.000.000-0");</script>
                    </p>
                -->
                    <p>
                        <label style="font-size: 12px; margin: 0px"><br>Número do Cartão do SUS</label>
                         <input style="width: 100%; float: right;" type="text" id="numsus" name="numsus" class="form-control" value="<?php echo htmlspecialchars( $registerpessoaValues["numsus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}.[0-9]{3}.[0-9]{3}" required="required">
                    <script type="text/javascript">$("#numsus").mask("000.000.000.000.000");</script>
                    </p> 

                    <p style="margin-bottom: 10px">
                        <label style="font-size: 12px; margin: 0px"><br>Vulnerabilidade Social?</label>
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
                    </p>  

                    <p id="divCadunico" hidden="true">
                        <label style="font-size: 12px; margin: 0px"><br>Número do CadÚnico / NIS</label>
                         <input style="width: 100%; float: right;" type="text" id="cadunico" name="cadunico" class="form-control" value="<?php echo htmlspecialchars( $registerpessoaValues["cadunico"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" pattern="[0-9]{3}.[0-9]{5}.[0-9]{2}-[0-9]{1}">
                    <script type="text/javascript">$("#cadunico").mask("000.00000.00-0");</script>
                    </p> 

                    <p>
                    <label style="font-size: 12px; margin: 0px"><br>PCD?</label>
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
                    </p>                      

                    <div id="maeEpai">

                        <p>
                            <label style="font-size: 12px; margin: 0px">
                                <br>Nome da Mãe
                                <span><br>* (Necessário preencher este campo se a pessoa, a cadastrar, for menor de idade)</span>
                            </label>
                            <input style="width: 100%; float: right;" type="text" id="nomemae" name="nomemae" class="form-control" value="<?php echo htmlspecialchars( $registerpessoaValues["nomemae"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        </p>    

                        <p>
                            <label style="font-size: 12px; margin: 0px">
                                <br> CPF da Mãe                                
                            </label>
                            <input style="width: 100%; float: right;" type="text" maxlength="14" id="cpfmae" name="cpfmae" class="form-control" value="<?php echo htmlspecialchars( $registerpessoaValues["cpfmae"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}">
                            <script type="text/javascript">$("#cpfmae").mask("000.000.000-00");</script>
                        </p> 

                         <p>
                            <label style="font-size: 12px; margin: 0px">
                                <br>Nome do Pai
                                <span><br>* (Necessário preencher este campo se a pessoa, a cadastrar, for menor de idade)</span>
                            </label>
                            <input style="width: 100%; float: right;" type="text" id="nomepai" name="nomepai" class="form-control" value="<?php echo htmlspecialchars( $registerpessoaValues["nomepai"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">                
                        </p>                          
                        
                        <p>
                            <label style="font-size: 12px; margin: 0px">
                                <br>CPF do Pai                                
                            </label>
                            <input style="width: 100%; float: right;" type="text" maxlength="14" id="cpfpai" name="cpfpai" class="form-control" value="<?php echo htmlspecialchars( $registerpessoaValues["cpfpai"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}">
                        <script type="text/javascript">$("#cpfpai").mask("000.000.000-00");</script>
                        </p> 
                    </div>         

                    <p>
                    <label style="font-size: 12px; margin: 0px">
                        <span style="font-size: 16px; font-weight: bold"><br>Endereço / Telefones</span>
                    </label>     
                    </p>
                    <p>               
                        <label style="font-size: 12px; margin: 0px">CEP</label>
                        <input style="width: 100%; float: right;" type="text" id="cep" maxlength="8" name="cep" class="form-control" pattern="[0-9]{5}-[0-9]{3}" value="<?php echo htmlspecialchars( $registerpessoaValues["cep"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onblur="getDadosEnderecoPorCep(this.value)" required="required">
                        <script type="text/javascript">$("#cep").mask("00000-000");</script>                   
                    </p>
                    <p>
                    <label style="font-size: 12px; margin: 0px">
                        <br>Rua / Avenida
                        
                    </label>
                    <input style="width: 100%; float: right;" type="text" id="rua" name="rua" class="form-control" value="<?php echo htmlspecialchars( $registerpessoaValues["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required="required">
                    </p>
                    <p>

                    <label style="font-size: 12px; margin: 0px">
                        <br>Número
                        
                    </label>
                    <input style="width: 100%; float: right;" type="text" id="numero" name="numero" class="form-control" value="<?php echo htmlspecialchars( $registerpessoaValues["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required="required">

                    </p>
                    <p>
                    <label style="font-size: 12px; margin: 0px">
                        <br>Complemento
                    </label>
                    <input style="width: 100%; float: right;" type="text" id="complemento" name="complemento" class="form-control" value="<?php echo htmlspecialchars( $registerpessoaValues["complemento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                    </p>
                    <p>
                    <label style="font-size: 12px; margin: 0px">
                        <br>Bairro                        
                    </label>
                    <input style="width: 100%; float: right;" type="text" id="bairro" name="bairro" class="form-control" value="<?php echo htmlspecialchars( $registerpessoaValues["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required="required">
                    </p>
                    <p>
                    <label style="font-size: 12px; margin: 0px">
                        <br>Cidade                        
                    </label>
                    <input style="width: 100%; float: right;" type="text" id="cidade" name="cidade" class="form-control" value="<?php echo htmlspecialchars( $registerpessoaValues["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required="required">
                    </p>
                    <p>
                    <label style="font-size: 12px; margin: 0px">
                        <br>Estado                        
                    </label>
                    <input style="width: 100%; float: right;" type="text" id="uf" name="estado" class="form-control" value="<?php echo htmlspecialchars( $registerpessoaValues["estado"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required="required"> 
                    </p>
                    <p>
                    <label style="font-size: 12px; margin: 0px">
                        <br>Telefone Residencial/Celular
                    </label>
                     <input style="width: 100%; float: right;" type="text" id="telres" name="telres" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" class="form-control" value="<?php echo htmlspecialchars( $registerpessoaValues["telres"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" / required="required">
                     <script type="text/javascript">$("#telres").mask("(00) 0000-00009");</script>   
                     </p>
                    <p>
                    <label style="font-size: 12px; margin: 0px">
                        <br>Nome de uma pessoa para contato em caso de emergência
                    </label>                    
                    <input style="width: 100%; float: right;" type="text" class="form-control" id="contato" value="<?php echo htmlspecialchars( $registerpessoaValues["contato"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="contato" placeholder="" required="required" />
                    </p>
                    <p>
                    <label style="font-size: 12px; margin: 0px">
                        <br>Telefone da pessoa para contato em caso emergência
                    </label>
                     <input style="width: 100%; float: right;" type="text" id="telemer" name="telemer" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" class="form-control" value="<?php echo htmlspecialchars( $registerpessoaValues["telemer"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required="required" />
                     <script type="text/javascript">$("#telemer").mask("(00) 0000-00009");</script> 
                 </p>
                </div> 
                <div class="col-md-7" style="margin-top: 10px; text-align-last: center">
                    <input style="width: 100%; float: right; background-color: #15a03f;" type="submit" value="Cadastrar" name="register" class="btn">
                </div>                                 
            </form> 
            
            </div>
            
        </div>        
        </div> <!-- final da index -->

                             



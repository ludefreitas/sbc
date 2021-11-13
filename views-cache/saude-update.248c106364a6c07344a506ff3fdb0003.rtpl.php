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

    function getDadosCodigoDoenca(cid){

         //let url = 'https://cid.api.mokasoft.org/cid10/'+cid+''

        let xmlHttp = new XMLHttpRequest()
        xmlHttp.open('GET', url)

        xmlHttp.onreadystatechange = () => {
            if(xmlHttp.readyState == 4 && xmlHttp.status == 200){

                let dadosJSONText = xmlHttp.responseText

                let dadosJSONObj = JSON.parse(dadosJSONText)

                document.getElementById('dadosDoenca').value = dadosJSONObj.nome                                                               
            }
            
        }

        xmlHttp.send()        
    }  
    
</script>

     <div class="container"> <!-- container 1 -->
                <div class="row"> <!-- row 2 -->
                  <div class="col-md-12" style="text-align-last: left; background-color: white; margin: 15px 0px 0px 0px;">

    <div class="container">
        <div class="row" style="padding-bottom: 5px">

            <div class="col-md-3" style="margin: 0px -5px 5px 0px">
                <?php require $this->checkTemplate("user-profile-menu");?>
            </div>
        
            <div class="col-md-9">

                <div class="alert alert-success" style="text-align-last: center;">
                    <span style="font-weight: bold;">Atualiza Dados de Saúde</span style="font-weight: bold;">
                </div>       
                

                <?php if( $error != '' ){ ?>
                <div class="alert alert-danger" style="text-align-last: center;">
                    <span style="font-weight: bold;"><?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></span style="font-weight: bold;">
                </div>                
                <?php } ?>

                <form id="register-form-wrap" action="/updatesaude/<?php echo htmlspecialchars( $pessoa["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="register" method="post">
                       
                    <label for="nomepess">
                        Nome Completo                         
                    </label>
                    <input style="width: 100%; float: right;" type="text" id="nomepess" name="nomepess" class="input-text" value="<?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Informe o nome completo" required="required" minlength="14" disabled="disabled">

               

                    <label for="pcd">
                        <br><br>PCD?
                    </label>
                    <select id="pcd" style="width: 100%; float: right;" class="form-control" name="pcd" required="required">
                        <option selected="" value="<?php echo htmlspecialchars( $pessoa["pcd"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Selecione</option>                    
                        <option value="0">Não</option>                         
                        <option value="1">Sim</option> 
                    </select>

                     <label for="tipodeficiencia"><br>
                        <br>TIPO DEFICIÊNCIA 
                    </label>

                    <p>                        
                        <input type="checkbox" name="deficiencia" value="1"> Auditiva                        
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="deficiencia" value="2"> Visual
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="deficiencia" value="3"> Física
                    </p>

                    <p>               
                        <input type="checkbox" name="deficiencia" value="4"> Intelectual
                        &nbsp;&nbsp;<input type="checkbox" name="deficiencia" value="5"> Psicosocial
                        &nbsp;&nbsp;<input type="checkbox" name="deficiencia" value="6"> Múltipla
                    </p>

                    <p>               
                        <label>CID (Código Internacional de Doença)</label>
                        <input style="width: 100%; float: right;" type="text" id="cid" maxlength="8" name="cid" class="form-control" value="<?php echo htmlspecialchars( $registerpessoaValues["cid"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onblur="getDadosCodigoDoenca(this.value)">
                        <script type="text/javascript">$("#cid").mask("A00.000");</script>   
                    </p>
                    
                    <p>
                    <label>
                        <br>Descrição do CID
                        
                    </label>
                    <input style="width: 100%; float: right;" type="text" id="dadosDoenca" name="dadosDoenca" class="form-control" value="<?php echo htmlspecialchars( $registerpessoaValues["dadosDoenca"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </p>      


                      <div class="row" style="padding-bottom: 10px;">
                <div class="col-md-12">
                    <input style="width: 100%; float: right; background-color: #15a03f;" type="submit" value="Atualizar" name="updatepessoa" class="btn">
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



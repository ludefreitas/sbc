<?php if(!class_exists('Rain\Tpl')){exit;}?>
<script>
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

<div class="container">
    <div class="row">

        <div class="col-md-8">

            <h2>Endereço / Telefones</h2>
            
            <?php if( $error != '' ){ ?>
            <div class="alert alert-danger">
            <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
            </div>
            <?php } ?>           
                
                <form action="/endereco" class="" method="post">
                <p class="form-row form-row-first">
                    <label style="font-size: 12px; margin: 0px">CEP</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $enderecoValues["cep"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="cep" placeholder="" onblur="getDadosEnderecoPorCep(this.value)" />
                </p>

                <p class="form-row form-row-first">
                    <label style="font-size: 12px; margin: 0px">Rua / Avenida</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $enderecoValues["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="rua" placeholder="" id="rua" />
                </p>

                <p class="form-row form-row-first">
                    <label style="font-size: 12px; margin: 0px">Número</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $enderecoValues["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="numero" placeholder="" id="numero" />
                </p>

                <p class="form-row form-row-first">
                    <label style="font-size: 12px; margin: 0px">Complemento</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $enderecoValues["complemento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="complemento" placeholder="" id="complemento" />
                </p>
                    

            
                <p class="form-row form-row-first">
                    <label style="font-size: 12px; margin: 0px">Bairro</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $enderecoValues["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="bairro" placeholder=""  id="bairro" />
                </p>

                <p class="form-row form-row-first">
                    <label style="font-size: 12px; margin: 0px">Cidade</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $enderecoValues["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="cidade" placeholder=""  id="cidade" />
                
                </p>
                <p class="form-row form-row-first">
                    <label style="font-size: 12px; margin: 0px">Estado</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $enderecoValues["estado"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="estado" placeholder=""  id="uf" />
                </p>

                <p class="form-row form-row-first">
                    <label style="font-size: 12px; margin: 0px">Telefone Residencial</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $enderecoValues["telres"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="telres" placeholder=""  id="telres" />
                </p>
                <p class="form-row form-row-first">
                    <label style="font-size: 12px; margin: 0px">Telefone Emergencia</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $enderecoValues["telemer"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="telemer" placeholder=""  id="telemer" />
                </p>
                <p class="form-row form-row-first">
                    <label style="font-size: 12px; margin: 0px">Nome de pessoa para contato</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $enderecoValues["contato"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="contato" placeholder=""  id="contato" />
                </p>
            
                <div class="clear"></div>
                <p class="form-row">
                    <input type="submit" value="Confirmar endereço" name="" class="button">
                </p>
                <div class="clear"></div>
            </form>               
        </div>
    </div>
</div>

                     



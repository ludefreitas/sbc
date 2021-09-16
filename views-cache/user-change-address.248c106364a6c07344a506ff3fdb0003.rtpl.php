<?php if(!class_exists('Rain\Tpl')){exit;}?><script>
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
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">                
            <div class="col-md-3">
                <?php require $this->checkTemplate("user-profile-menu");?>
            </div>
            <div class="col-md-9">
            <div class="cart-collaterals">
                    <h2>Atualizar Endereço </h2>
            </div>

                <?php if( $changeAddressError != '' ){ ?>
                <div class="alert alert-danger">
                    <?php echo htmlspecialchars( $changeAddressError, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
                <?php } ?>

                <?php if( $changeAddressSuccess != '' ){ ?>
                <div class="alert alert-success">
                    <?php echo htmlspecialchars( $changeAddressSuccess, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
                <?php } ?>
                <form action="/endereco/update" class="" method="post">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="form-row form-row-first">
                    <label style="font-size: 12px; margin: 0px">CEP</label>
                    <input type="number" class="form-control" value="<?php echo htmlspecialchars( $endereco["cep"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="cep" placeholder="" onblur="getDadosEnderecoPorCep(this.value)" />
                    </p>

                    <p class="form-row form-row-first">
                    <label style="font-size: 12px; margin: 0px">Rua / Avenida</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $endereco["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="rua" placeholder="" id="rua" />
                </p>

                <p class="form-row form-row-first">
                    <label style="font-size: 12px; margin: 0px">Número</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $endereco["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="numero" placeholder="" id="numero" />
                </p>

                <p class="form-row form-row-first">
                    <label style="font-size: 12px; margin: 0px">Complemento</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $endereco["complemento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="complemento" placeholder="" id="complemento" />
                </p>

                <p class="form-row form-row-first">
                    <label style="font-size: 12px; margin: 0px">Bairro</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $endereco["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="bairro" placeholder=""  id="bairro" />
                </p>

                </div>

                <div class="col-md-6">
                <p class="form-row form-row-first">
                    <label style="font-size: 12px; margin: 0px">Cidade</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $endereco["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="cidade" placeholder=""  id="cidade" />
                
                </p>
                <p class="form-row form-row-first">
                    <label style="font-size: 12px; margin: 0px">Estado</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $endereco["estado"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="estado" placeholder=""  id="uf" />
                </p>

                <p class="form-row form-row-first">
                    <label style="font-size: 12px; margin: 0px">Telefone Residencial/Celular</label>

                    <input type="text" name="telres" id="telres" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" class="form-control" value="<?php echo htmlspecialchars( $endereco["telres"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" />
                     <script type="text/javascript">$("#telres").mask("(00) 0000-00009");</script>         
                </p>
                <p class="form-row form-row-first">
                    <label style="font-size: 12px; margin: 0px">Nome de pessoa para contato em caso de emergência</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $endereco["contato"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="contato" placeholder=""  id="contato" />
                </p>
                <p class="form-row form-row-first">
                    <label style="font-size: 12px; margin: 0px">Telefone da pessoa de contato em caso emergência</label>
                    <input type="text" name="telemer" id="telemer" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" class="form-control" value="<?php echo htmlspecialchars( $endereco["telemer"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" />         
                    <script type="text/javascript">$("#telemer").mask("(00) 0000-00009");</script>         
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
    </div>
</div>
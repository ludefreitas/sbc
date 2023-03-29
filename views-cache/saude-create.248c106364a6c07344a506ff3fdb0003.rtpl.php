<?php if(!class_exists('Rain\Tpl')){exit;}?>
<script>


    function pcd(){

        let ispcd = document.getElementById('ispcd').value

        if(ispcd == 0){
            document.getElementById('paraPcd').hidden = true
            document.getElementById('naoPcd').hidden = false
        }else{
           document.getElementById('paraPcd').hidden = false
           document.getElementById('naoPcd').hidden = true
        }
    }

    
</script>

     <div class="container"> <!-- container 1 -->
                <div class="row"> <!-- row 2 -->
                    <div class="col-md-3" style="margin: 15px 0px 0px 0px">
                <?php require $this->checkTemplate("user-profile-menu");?>
            </div>
                  <div class="col-md-9" style="text-align-last: left; background-color: white; margin: 15px 0px 0px 0px;">

    <div class="container">
        <div class="row" style="padding-bottom: 5px">
        
            <div class="col-md-12">
                <?php if( $errorRegister != '' ){ ?>
                <div class="alert alert-danger" style="text-align-last: center;">
                    <span style="font-weight: bold;"><?php echo htmlspecialchars( $errorRegister, ENT_COMPAT, 'UTF-8', FALSE ); ?></span style="font-weight: bold;">
                </div>               
                <?php } ?>

                <?php if( $errorSaude != '' ){ ?>
                <div class="alert alert-danger">
                 <h5><?php echo htmlspecialchars( $errorSaude, ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>
                </div>
                <?php } ?>

                <?php if( $success != '' ){ ?>
                <div class="alert alert-success">
                 <h4><?php echo htmlspecialchars( $success, ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>
                </div>
                <?php }else{ ?>

                <div class="alert alert-success" style="text-align-last: center;">
                    <span style="font-weight: bold;">Atualizar Dados de Saúde</span>
                    <BR><label
                     style="width: 100%; float: right;" type="text" id="nomepess" name="nomepess" class="input-text" > <?php echo htmlspecialchars( $nomepess, ENT_COMPAT, 'UTF-8', FALSE ); ?>   </label>                
                </div>                
                <?php } ?>

                    <!--
                   <form id="register-form-wrap" action="/buscacid/<?php echo htmlspecialchars( $idpess, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $nomepess, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="register" method="post" style="padding-bottom: 0px; margin-bottom: 0px;">

                    <div class="row">
                        <div class="col-md-8 col-sm-6">
                            <input style="width: 100%; float: right;" type="text" maxlength="5" id="cid" name="cid" class="form-control" pattern="[A-Z]{1}[0-9]{2}.[0-9]{1}" value=""/ placeholder="Código do CID para fazer a busca (Ex.: A10.0)"> 
                            <script type="text/javascript">$("#cid").mask("A00.0");</script>

                        </div>
                        <?php if( $codigo != '' && $doenca != '' ){ ?>
                        <div class="col-md-4 col-sm-4" style="text-align-last: center;">
                        <label>
                        <strong><span style="color: darkblue;">[ &nbsp;<?php echo htmlspecialchars( $codigo, ENT_COMPAT, 'UTF-8', FALSE ); ?> </span></strong>     
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <strong><span style="color: darkblue;"> <?php echo htmlspecialchars( $doenca, ENT_COMPAT, 'UTF-8', FALSE ); ?> &nbsp;]</span></strong></label>          
                        </div>             
                            <div class="col-md-4 col-sm-4" style="text-align-last: center;">
                                <input type="submit" class="btn btn-success" name="busca" value="Nova busca / Alterar CID" />  
                            </div>

                        <?php }else{ ?>
                            <div class="col-md-4 col-sm-4" style="text-align-last: center;">
                                <input type="submit" class="btn btn-success" name="busca" value="Busca CID" />  
                            </div>
                        <?php } ?>
                    </div>
                         
                   </form>  
                   -->    
                    
                     <form id="register-form-wrap" action="/registersaude" class="register" method="post" style="padding-top: 20px;">

                    <label for="tipodeficiencia">
                            <span style="color: darkblue; font-style: italic; font-size: 14px;"> O(A) <?php echo htmlspecialchars( $nomepess, ENT_COMPAT, 'UTF-8', FALSE ); ?> é PCD?</span>
                            <span style="color: black; font-style: italic; font-size: 12px;"> Selecione abaixo 'SIM' ou 'NÃO'</span>
                        </label>            

                    <div style="width: 100%; float: right;">
                        <select onchange="pcd()" id="ispcd" style="width: 100%; float: right;" class="form-control" name="ispcd" required="required">
                            <option selected="" value="">Seclecione</option>                        
                            <option value="1">Sim</option>
                            <option value="0">Não</option>  
                        </select>
                    </div>     

                    <br>             

                    <div id="paraPcd" hidden="true">   

                        <label for="tipodeficiencia">
                            <br><h6><span style="color: darkblue; font-style: italic;">Informe abaixo o CID </span></h6>
                        </label>            
                            
                    
                        <input style="width: 100%; float: right;" type="text" id="codigo" name="codigo" class="form-control" pattern="[A-Z]{1}[0-9]{2}.[0-9]{1}"  value="" placeholder="Código do CID (Ex.: A10.0)">
                        <script type="text/javascript">$("#codigo").mask("A00.0");</script>
                           

                        <label for="tipodeficiencia">
                            <br><span style="color: darkblue; font-style: italic;">Marque abaixo o tipo de deficiência </span>
                        </label>

                        <p>                        
                            <input type="checkbox" name="auditiva" value="1"> 
                            Auditiva                        
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="visual" value="1"> 
                            Visual
                        </p>
                        <p>                         
                            <input type="checkbox" name="fisica" value="1" re>
                             Física  
                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;            
                            <input type="checkbox" name="intelectual" value="1"> 
                            Intelectual 
                            &nbsp;&nbsp;&nbsp;&nbsp;           
                            <input type="checkbox" name="autismo" value="1"> 
                            Autismo                      
                        </p> 
                        <p>  
                            <input type="checkbox" name="tea" value="1"> 
                            TEA (Transtorno do Espectro Autista)
                        </p> 
                    </div>

                    <label for="">
                            <br>
                           <a href="/par-q/<?php echo htmlspecialchars( $idpess, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><span style="color: darkblue; font-weight: bold;"> >> Clique aqui </a></span>  e responda o Questionário de Prontidão P/ Atividade Física - <span style="color: darkblue; font-weight: bold;">(PAR-Q) </span> 
                            
                        </label> 
                        <?php if( $countParq > 0 ){ ?>
                        <label style="text-align-last: right;">
                            <br>
                           <a href="/par-q/pessoa/<?php echo htmlspecialchars( $idpess, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><span style="color: darkblue; text-align: right;"> Meu PAR-Q </span> </a>                            
                        </label>  
                        <?php } ?>                     

                    <input hidden="hidden" type="text" id="idpess" name="idpess" class="input-text" value="<?php echo htmlspecialchars( $idpess, ENT_COMPAT, 'UTF-8', FALSE ); ?>"> 
                   <input hidden="hidden" type="text" id="nomepess" name="nomepess" class="input-text" value="<?php echo htmlspecialchars( $nomepess, ENT_COMPAT, 'UTF-8', FALSE ); ?>"> 

                <div id="naoPcd">

                     <input hidden="hidden" type="text" id="codigo" name="codigo" class="input-text" value="''"> 
                    
                </div>
                   

             <div class="row" style="padding-bottom: 10px;">
                <div class="col-md-12" style="margin-top: 10px; text-align-last: center">
                    <input style="width: 100%; float: right; background-color: #15a03f;" type="submit" value="Atualizar" name="registersaude" class="btn">
                </div> 
                <div class="col-md-12" style="margin-top: 10px; text-align-last: center">

                        <a class="btn" data-quantity="1" style="width: 100%; float: right; background-color: #ce2c3e;  text-decoration: none; color: white;" href="javascript:window.history.go(-1)" text-decoration="none">
                            CANCELAR
                        </a>
                       
                </div>                  
            </div>
                </form>               
            
            </div>
            </div>    
    </div>     

    <script>

</script>

    </div> <!-- final da index -->               



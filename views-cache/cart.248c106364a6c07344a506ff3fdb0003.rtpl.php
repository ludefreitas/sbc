<?php if(!class_exists('Rain\Tpl')){exit;}?><style type="text/css">
 
#popup{
    position: fixed;
    top: 0; 
    bottom: 0;
    left: 0; 
    right: 0;
    margin: auto;
    width: 300px;
    height: 216px;
    padding: 0px; 
    background-color: lightgray;
  }

  #popupimage{
    position: fixed;
    top: 0; 
    bottom: 0;
    left: 0; 
    right: 0;
    margin: auto;
    width: 300px;
    height: 180px;
    padding: 0px;
    border: solid 1px #4c4d4f;
    background: #ccc;    
  }
</style>

<script type="text/javascript">

    function voltar() {
        history.back();
    }

     function imageNone() {

    document.getElementById('popup').hidden = true 
    
    }

    function encerradas(){

        alert('As inscrições para a temporada de 2023 estão encerradas!\n\nAs inscrições para a temporada de 2024 tem a previsão de iniciar em 15 de janeiro de 2024.\n\nTodo o processo de inscrição será realizado pelo site:\n\nhttps://cursosesportivossbc.com\n\nImportante:\n\nDe 15/01 a 14/02, cada pessoa só poderá escolher 1(uma) modalidade.\n\nDe 15/02 a 14/03, será permitida a inscrição em uma segunda modalidade.\n\nA partir de 15/03 será permitida a inscrição em uma terceira modalidade.')
        
    }
  
    function alertToken(){


      alert("Conforme Resolução SESP Nº 006 de 15/12/2023 Art.2º §2º, os interessados em participar das turmas de inclusão para Pessoas com Deficiência (PCD) e/ou laudo médico do CREEBA, deverão comparecer pessoalmente (interessado ou representante legal) no CREEBA")
    }
$(document).ready(function(){

    $('#link').on('change', function () {
        var url = $(this).val(); 
        if (url === 'pessoa-create') { 
            window.open(url, '_self');
        }
        return false;
    });
});
</script>

 <div class="container"> <!-- container 1 -->
            <div class="row"> <!-- row 2 -->
              <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 0px 0px 50px 0px;">


<form action="/checkout">
    
    <div class="col-md-12" style="color: black; text-align-last: center; font-size: 20px;">

      <div>
         ETAPA <span style="font-weight: bold;">4</span> de <span style="font-weight: bold;">5</span> 
      </div>

    </div>

    <?php if( $error != '' ){ ?>
    <div class="alert alert-danger" role="alert">
    <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
    </div>
    <?php } ?>

    <div class="container">
        <?php $counter1=-1;  if( isset($turma) && ( is_array($turma) || $turma instanceof Traversable ) && sizeof($turma) ) foreach( $turma as $key1 => $value1 ){ $counter1++; ?>
        <!--<div class="row alert alert-primary">
            <div class="col-md-12">
                Turma selecionada! Selecione agora, logo abaixo, a pessoa que irá participar desta turma.
            </div>
        </div>
      -->
       <?php if( $error != '' ){ ?>
        <?php if( $value1["idstatustemporada"] == 2 OR $value1["idstatustemporada"] == 3 OR $value1["idstatustemporada"] == 6 ){ ?>
            <div class="alert alert-danger" style="text-align-last: center;">
                <a style="color: darkblue; text-align-last: center;" href="https://www.saobernardo.sp.gov.br/documents/1136654/1807257/Inscri%C3%A7%C3%B5es+2024/0812eb93-95c5-b325-ea0a-60b5ca9c4c28">Resolução SESP Nº 006 de 15 de dezembro de 2023. </a>
             </div>
        <?php } ?>   
    <?php } ?>
    
    <div class="col-md-12" style="text-align-last: left; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; border-radius: 15px;"> 

    <?php if( checkLogin(false) ){ ?> 

           <span style="color: black; font-weight: bold;">  <?php echo getUserName(); ?> </span><br>           
                                                       
          nesta etapa, já com a turma <strong><?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong> selecionada, selecione a pessoa que irá fazer a aula e clique no botão <strong style="color: red;"> CONFIRMAR INSCRIÇÃO</strong>.
          

    <?php }else{ ?>      
           
      
            <a href="/user-create">             
                     CADASTRE-SE               
            </a> 
             <span> ou faça o  </span>           
            <a href="/login" >                
                 LOGIN 
            </a>
            e nesta etapa, já com a turma <strong> <?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong> selecionada, selecione a pessoa que irá fazer a aula e clique no botão <strong style="color: red;"> CONFIRMAR INSCRIÇÃO</strong>.
          
      <?php } ?>

    </div>
    
    <!--
    <div class="col-md-12" style="margin-top: 0px; margin-bottom: 0px; color: darkblue; text-align: center; font-size: 18px;">       
        Selecione a pessoa que irá fazer a aula e clique no botão <strong style="color: red;"> CONFIRMAR INSCRIÇÃO </strong>
    </div> 
    -->
         
        <div class="row alert alert-primary"> 
           <!-- 
           <div class="col-md-3">
                <a href="/turma/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></a>
            </div>
            -->                      

            <div class="col-md-6">
               TURMA: <span style="color: #cc5d1e;"><?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["periodo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span> / <?php echo htmlspecialchars( $value1["origativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> 
               <span class="amount"> 
                  LOCAL: <?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, Nº <?php echo htmlspecialchars( $value1["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?> / 
               </span> 
               <span class="amount">
                  HORÁRIO: <?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $value1["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?> /
               </span> 
               <span class="amount">
                 <?php if( $value1["fimidade"] == 99 ){ ?> 
               Para nascidos somente até <?php echo htmlspecialchars( $anoAtual - $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br>
              <?php }else{ ?>
              Para nascidos somente entre: <?php echo htmlspecialchars( $anoAtual - $value1["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> à <?php echo htmlspecialchars( $anoAtual - $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
              <?php } ?>
              
              <?php if( $value1["obs"] ){ ?>
              OBSERVAÇÃO: <strong><?php echo htmlspecialchars( $value1["obs"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong><br>
              <?php } ?>
              </span> 
              
              <!--
                <span class="amount">
                   <br> <span style="color: red; font-weight: bold;">Se esta não é a turma que você quer fazer a inscrição clique aqui <a title="Remove this item" class="remove" href="/cart/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/remove"> <i class="fa fa-arrow-right" style="color: green;"></i> <i class="fa fa-trash" style="color: green;"></i> <i class="fa fa-arrow-left" style="color: green;"></i></span><p style="color: green;">(Selecionar uma outra turma)</p></a>
               </span>
              -->


               <span class="amount">
                   <br> <span style="color: red; font-weight: bold;">Se esta não é a turma que você quer fazer a inscrição clique aqui <a title="Remove this item" class="remove" onclick="voltar()" href="#void"> <i class="fa fa-arrow-right" style="color: green;"></i> <i class="fa fa-trash" style="color: green;"></i> <i class="fa fa-arrow-left" style="color: green;"></i><p style="color: green;">(Selecionar uma outra turma)</p></a>
               </span>  

               <input type="text" name="idturma" hidden="" value="<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
               <input type="text" name="idtemporada" hidden="" value="<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">  
               <input type="text" name="initidade" hidden="" value="<?php echo htmlspecialchars( $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
               <input type="text" name="fimidade" hidden="" value="<?php echo htmlspecialchars( $value1["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">  
               <input type="text" name="idlocal" hidden="" value="<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">                      
               <input type="text" name="apelidolocal" hidden="" value="<?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">    
               <input type="text" name="sexo" hidden="" value="<?php echo htmlspecialchars( $value1["geneativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
               <input type="text" name="tipoativ" hidden="" value="<?php echo htmlspecialchars( $value1["tipoativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
               <input type="text" name="idmodal" hidden="" value="<?php echo htmlspecialchars( $value1["idmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
               <input type="text" name="vagas" hidden="" value="<?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
               <input type="text" name="temtoken" hidden="" value="<?php echo htmlspecialchars( $temtoken, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
               <input type="text" name="idcart" hidden value="<?php echo htmlspecialchars( $idcartcart, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
               <input type="text" name="dessessionid" hidden value="<?php echo htmlspecialchars( $sessionidcart, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
               <input type="text" name="idpess" hidden value="<?php echo htmlspecialchars( $idpesscart, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            
            <div class="col-md-6">
                <div class="">
                    <div class="">

                        <h5>SELECIONE A PESSOA</h5>
                    
                        <div class="">

                            <?php if( $msgError != '' ){ ?>
                            <div class="alert alert-danger alert-dismissible" style="margin:10px">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p><?php echo htmlspecialchars( $msgError, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                            </div>
                            <?php } ?>
                            <?php if( $msgSuccess != '' ){ ?>
                            <div class="alert alert-success alert-dismissible" style="margin:10px">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p><?php echo htmlspecialchars( $msgSuccess, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                            </div>
                            <?php } ?>
                            <!-- form start -->    
                            <!--                       
                            <div class="box-body">                                                               
                                <select class="form-control" name="idpess" id="link"  onchange="changeFunc(value);">
                                    <option selected="selected" value="0">
                                        Selecione uma pessoa
                                    </option>

                                    <?php if( $pessoa ){ ?>
                                    <option value="pessoa-create">
                                        CADASTRAR UMA NOVA PESSOA
                                    </option>
                                    <?php } ?>                                    
                                    <?php $counter2=-1;  if( isset($pessoa) && ( is_array($pessoa) || $pessoa instanceof Traversable ) && sizeof($pessoa) ) foreach( $pessoa as $key2 => $value2 ){ $counter2++; ?>   
                                    <option <?php if( $value2["iduser"] === $user["iduser"] ){ ?><?php } ?> value="<?php echo htmlspecialchars( $value2["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value2["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>; <?php echo calcularIdade($value2["dtnasc"]); ?> anos
                                    </option>

                                    <?php }else{ ?>
                                    <option value="0">
                                        Não há pessoas cadastradas
                                    </option>
                                    <option value="pessoa-create">
                                        CADASTRAR UMA NOVA PESSOA
                                    </option>
                                    <?php } ?>
                                </select>
                                 </div>
                                -->

                                <div class="box-body">

                                <?php $idturma = $value1["idturma"]; ?>
                                    <?php $counter2=-1;  if( isset($pessoa) && ( is_array($pessoa) || $pessoa instanceof Traversable ) && sizeof($pessoa) ) foreach( $pessoa as $key2 => $value2 ){ $counter2++; ?>
                                    <p>
                                    <input type="radio" name="idpess" value="<?php echo htmlspecialchars( $value2["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="height: 20px; width: 20px;"> <?php echo htmlspecialchars( $value2["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>; <?php echo calcularIdade($value2["dtnasc"]); ?> anos
                                        <br>
                                        <?php echo temTokenPorTurmaCpf($idturma, $value2["numcpf"]); ?>
                                        
                                    </p>                                
                                    <?php }else{ ?>
                                    <p>
                                         Não há pessoas inseridas
                                    </p>                                   
                                       
                                    <?php } ?>
                                    
                                    <p>
                                       <a href="/pessoa-create">  INSERIR UMA NOVA PESSOA </a>
                                    </p>
                                </div>
                                
                            </div>
                            <!-- /.box-body -->
                        <div class="box-footer">                                           
                               
                        </div>
                           
                       <!-- </form> -->

                      
                        <div>&nbsp;</div>
                        <input type="submit" value="Confirmar Inscrição" id="pessoa" class="button alt" formaction="/cart" formmethod="post">
                    </div>
                </div> 
            </div>
             
        </div>
  <!--
  <div id="popup" style="text-align-last: center; border-radius: 15px"> 
            <div style="text-align-last: right; font-weight: bold; " onclick="imageNone()"> x &nbsp;&nbsp;
            </div>  
            
            <div style="background-color: orange; text-align: justify; border-radius: 15px 15px 15px 15px; padding: 10px; font-size: 13px; font-weight: bold;">
                <span style="color: red;"> ATENÇÃO! </span><br>
                    LEMBRAMOS que: O início das aulas e a matrícula para ESTA TURMA e para as outras TURMAS do PELC irão acontecer simultaneamente a partir do dia<span style="color: blue;" > 4 de MARÇO</span>, no dia e no horário da aula. (Para as incrições com status <span style="color: green;" >"Aguardando Matrícula"</span>).
            </div> 
    </div>
   -->
         
        <?php }else{ ?>
        <div class="row">
            <div class="col-md-12 alert alert-info" style="text-align-last: center; font-weight: bold">
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Clique em uma das opções abaixo para selecionar uma turma</span>                            
            </div>
            
        </div>

  <div class="row" style="">
    <div class="col-md-6 alert" style="text-align-last: center; background-color: #0f71b3; border: solid 5px; border-color: white;  border-radius: 25px;  padding-left: 0px ">
       <a class="btn" href="/locais" style="color: white; font-weight: bold;">Turmas por LOCAL (Crec)
       </a>
    </div>
    <div class="col-md-6 alert" style="text-align-last: center; background-color: #cc5d1e; border: solid 5px; border-color: white; border-radius: 25px;  padding-left: 0px">
       <a class="btn" href="/modalidades" style="color: white; font-weight: bold" >Turmas por MODALIDADE
       </a>
    </div>
    
  </div>
  <?php } ?>
</div>                             
                         
</form>
 </div> <!-- final da index -->
 
 
 



                                                                
                           
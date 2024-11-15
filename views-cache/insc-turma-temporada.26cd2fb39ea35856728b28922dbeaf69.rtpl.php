<?php if(!class_exists('Rain\Tpl')){exit;}?><script type="text/javascript">

    $(document).ready(function(){
            $('#data').mask('00-00-0000');
        });

    $(document).ready(function(){
            $('#dataderma').mask('00-00-0000');
        });

    function popupAtestado(idpess) {

            //alert(idpess)

            let url = '/prof/saude/dadosatestado/'+idpess

            let ajax = new XMLHttpRequest();
            ajax.open('GET', 'url');        
        
            $.ajax({
            url: url,
            method: 'GET'  
            }).done(function(result){

                document.getElementById('textConteudoAtestado').innerHTML = result

                document.getElementById('conteudoAtestadoId').value = idpess
                
                document.getElementById('divPopupAtestado').hidden = false

            });

        } 

    function popupAtestadoDerma(idpess, iduser) {

            //alert(idpess)

            let url = '/prof/saude/dadosatestadoderma/'+idpess

            let ajax = new XMLHttpRequest();
            ajax.open('GET', 'url');        
        
            $.ajax({
            url: url,
            method: 'GET'  
            }).done(function(result){

                document.getElementById('textConteudoAtestadoDerma').innerHTML = result

                document.getElementById('conteudoAtestadoDermaId').value = idpess
                
                document.getElementById('divPopupAtestadoDerma').hidden = false

            });

        }  

    function fecharPopupAtestado() {

            document.getElementById('divPopupAtestado').hidden = true 
            
            document.getElementById('conteudoAtestadoId').value = ''
            document.getElementById('data').value = ''
            document.getElementById('observ').value = ''
        }

    function fecharPopupAtestadoDerma() {

            document.getElementById('divPopupAtestadoDerma').hidden = true 
            
            document.getElementById('conteudoAtestadoDermaId').value = ''
            document.getElementById('dataderma').value = ''
            document.getElementById('observderma').value = ''
        }

    function AtualizaAtestadoClinico() {

            let idpess = document.getElementById('conteudoAtestadoId').value
            let data = document.getElementById('data').value
            let observ = document.getElementById('observ').value
            let iduser = document.getElementById('iduser').value

            if(idpess == '' || data == '' || observ == ''){
                alert('Preencha todos os dados')
                return
            }

            var traco1 = data.substr(2,1)
            var traco2 = data.substr(5,1)
            var dia = data.substr(0,2);
            var mes = data.substr(3,2);
            var ano = data.substr(6,4); 
                 
            if((traco1 != '-') || (traco2 != '-') || (ano.length < 4)){
                alert('Formato da data inválida');
            }else{

                if((dia > 31) || (dia == 0) || (mes > 12) || (mes == 0)){

                    alert('data inválida!')
                    
                }else{

                    let url = '/prof/saude/atulizaatestado/'+idpess+'/'+data+'/'+observ+'/'+iduser

                    let ajax = new XMLHttpRequest();
                    ajax.open('GET', 'url');        
                    
                    $.ajax({
                    url: url,
                    method: 'GET'  
                    }).done(function(result){

                        document.getElementById('divPopupAtestado').hidden = true

                        document.getElementById('conteudoAtestadoId').value = ''
                        document.getElementById('data').value = ''
                        document.getElementById('observ').value = ''

                        alert( result );

                    });
                }
            }

        }

        function AtualizaAtestadoDerma() {

            let idpess = document.getElementById('conteudoAtestadoDermaId').value
            let data = document.getElementById('dataderma').value
            let observ = document.getElementById('observderma').value
            let iduser = document.getElementById('iduserderma').value


            if(idpess == '' || data == '' || observ == ''){
                alert('Preencha todos os dados')
                return
            }

            let url = '/prof/saude/atulizaatestadoderma/'+idpess+'/'+data+'/'+observ+'/'+iduser

            let ajax = new XMLHttpRequest();
            ajax.open('GET', 'url');        
        
            $.ajax({
            url: url,
            method: 'GET'  
            }).done(function(result){

                document.getElementById('divPopupAtestadoDerma').hidden = true
                
                document.getElementById('conteudoAtestadoDermaId').value = ''
                document.getElementById('dataderma').value = ''
                document.getElementById('observderma').value = ''
                
                alert( result );

            });
            
        }

      function dadosAtestado(idpess){

        let url = '/prof/saude/dadosatestado/'+idpess

        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url');        
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          if (window.confirm(' '+ result + 'Para atualizar atestado CLÍNICO clique em "OK"'))
          {
              adicionarArtestado(idpess)
          };

        });
      }

      function adicionarArtestado(idpess){
        
        let confirmaAtestado = confirm('Deseja realmente atualizar atestado CLÍNICO?')

        if(confirmaAtestado == true)
        {                      
            var data = prompt("Informe a data da emissão do Atestado CLÍNICO. Ex.: dd-mm-aaaa");     


            if (data == null || data == "") {

                alert("As informaçãoes do atestado CLÍNICO não foram atualizadas! Informe a data e faça alguma observação")
            } else {

                 var traco1 = data.substr(2,1)
                 var traco2 = data.substr(5,1)
                 var dia = data.substr(0,2);
                 var mes = data.substr(3,2);
                 var ano = data.substr(6,4); 
                 
                 if((traco1 != '-') || (traco2 != '-') || (ano.length < 4)){
                    alert('Formato da data inválida');
                 }else{

                    if((dia > 31) || (dia == 0) || (mes > 12) || (mes == 0)){

                    alert('data inválida!')
                    
                    }else{

                        //alert('Data validada!!! ' + dia + ' ' + mes + ' ' + ano)

                        
                        var observ = prompt("Digite uma observação");
                        if (observ == null || observ == "") {
                                lert("As informaçãoes do atestado CLÍNICO não foram atualizadas! Informe a data e faça alguma observação.");
                        } else {

                            let url = '/prof/saude/atulizaatestado/'+idpess+'/'+data+'/'+observ+''

                            atualizarAtestado(url) 
                        }           
                    }                           
                }
            }        
        } 
         //let url = '/prof/saude/dadosatestado/'+idpess

        //dadosAtestado(url)  
    }
      /*
      function dadosAtestado(url){

        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url');        
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          alert(result)

        });
      }
      */

      function atualizarAtestado(url){

        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url');        
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          alert(result)

        });
      }

      function atualizarAtestadoDerma(url){

        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url');        
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          alert(result)

        });
      }

      function dadosAtestadoDerma(idpess){

        let url = '/prof/saude/dadosatestadoderma/'+idpess

        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url');        
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          if (window.confirm(' '+ result + 'Para atualizar atestado DERMATOLÓGICO clique em "OK"'))
          {
              adicionarArtestadoDerma(idpess)
          };

        });
      }

      function adicionarArtestadoDerma(idpess){
        
        let confirmaAtestado = confirm('Deseja realmente atualizar atestado DERMATOLÓGICO?')

        if(confirmaAtestado == true)
        {                      
            var data = prompt("Informe a data da emissão do Atestado DERMATOLÓGICO. Ex.: dd-mm-aaaa");     


            if (data == null || data == "") {

                alert("As informaçãoes do atestado DERMATOLÓGICO não foram atualizadas! Informe a data e faça alguma observação")
            } else {

                 var traco1 = data.substr(2,1)
                 var traco2 = data.substr(5,1)
                 var dia = data.substr(0,2);
                 var mes = data.substr(3,2);
                 var ano = data.substr(6,4); 
                 
                 if((traco1 != '-') || (traco2 != '-') || (ano.length < 4)){
                    alert('Formato da data inválida');
                 }else{

                    if((dia > 31) || (dia == 0) || (mes > 12) || (mes == 0)){

                    alert('data inválida!')
                    
                    }else{

                        //alert('Data validada!!! ' + dia + ' ' + mes + ' ' + ano)

                        
                        var observ = prompt("Digite uma observação");
                        if (observ == null || observ == "") {
                                lert("As informaçãoes do atestado DERMATOLÓGICO não foram atualizadas! Informe a data e faça alguma observação.");
                        } else {

                            let url = '/prof/saude/atulizaatestadoderma/'+idpess+'/'+data+'/'+observ+''

                            atualizarAtestadoDerma(url) 
                        }           
                    }                           
                }
            }        
        } 
         //let url = '/prof/saude/dadosatestado/'+idpess

        //dadosAtestado(url)  
    }

      function requisitarPaginaEndereco(url){

        let ajax = new XMLHttpRequest();
        let idurl = url.substr(53);              
        ajax.open('GET', 'url');
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          if(result){              
                alert(result)
          }else{
            alert('Endereço não encontrado!')
          }
        });
      } 

      function alterarStatusSuspender(idinsc, idturma, idpess){

        let ajax = new XMLHttpRequest();

        let url = '/prof/insc/'+idinsc+'/'+idturma+'/'+idpess+'/statusSuspender'              
        ajax.open('GET', 'url');
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          if(result){  

            alert(result)            
            
            
          }else{
            alert('Não foi possível suspender matricula')
          }
        });
      }  

      function alterarStatusRematricular(idinsc, idturma, idpess){

        let ajax = new XMLHttpRequest();

        let url = '/prof/insc/'+idinsc+'/'+idturma+'/'+idpess+'/statusRematricular'              
        ajax.open('GET', 'url');
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          if(result){  

            alert(result)            
            
            
          }else{
            alert('Não foi possível suspender matricula')
          }
        });
      }     

</script>

<style type="text/css">
    
    #divPopupAtestado{
        position: fixed;
        top: 0; 
        bottom: 0;
        left: 0; 
        right: 0;
        margin: auto;
        width: 50%;
        min-height: 200px;
        max-height: 350px;
        padding: 5px; 
        background-color: rgba(255, 165, 0, 1);
    }  

    #divPopupAtestadoDerma{
        position: fixed;
        top: 0; 
        bottom: 0;
        left: 0; 
        right: 0;
        margin: auto;
        width: 50%;
        min-height: 200px;
        max-height: 350px;
        padding: 5px; 
        background-color: rgba(255, 165, 0, 1);
    }  

</style>

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h4>
     [<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>]  - <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $turma["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $turma["periodo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $turma["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
  </h4>
  <ol class="breadcrumb">
    <li><a href="/prof"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/prof/turma-temporada/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Turmas por temporada</a></li>
    <li class="active"><a style="color: red" href="javascript: history.go(-1)">Voltar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-12">
        <div class="box box-primary">

          <?php if( $error != '' ){ ?>
                <div class="alert alert-danger" style="margin: 10px 10px 0px 10px">
            <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
          <?php } ?>
          <?php if( $success != '' ){ ?>
                <div class="alert alert-success" style="margin: 10px 10px 0px 10px">
            <?php echo htmlspecialchars( $success, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
          <?php } ?>
            
            <div class="box-header">
           
            </div>
          <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
            <div class="box-body" style="text-align: center;">
                <span style="color: orangered; font-weight: bold">PVS - Lista de pessoas em vulnerabilidade social - <?php echo htmlspecialchars( $turma["vagaspvs"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas
                </span>
          </div>
              
            <?php $counter1=-1;  if( isset($inscPvs) && ( is_array($inscPvs) || $inscPvs instanceof Traversable ) && sizeof($inscPvs) ) foreach( $inscPvs as $key1 => $value1 ){ $counter1++; ?>
            <?php if( ($value1["idinscstatus"] != 8) && ($value1["idinscstatus"] != 9) && ($value1["idinscstatus"] != 5) && ($value1["idinscstatus"] != 10) ){ ?>
            <div class="box-body" style=" margin: 5px;">
              <div <?php echo colorStatus($value1["idinscstatus"]); ?> style="margin: 5px" class="row">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-6" style="margin: 1; padding: 1">
                    <h5 style="text-align: left;">

                      <?php echo htmlspecialchars( $value1["numsorte"], ENT_COMPAT, 'UTF-8', FALSE ); ?>º -
                      <strong>[<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>] - <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
                      <?php if( UserIsAdmin() ){ ?>
                      &nbsp;<?php echo htmlspecialchars( $value1["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;
                      <?php }else{ ?>
                      &nbsp;<?php echo formatCpf($value1["numcpf"]); ?>&nbsp;
                      <?php } ?>                      
                      <strong><?php echo calcularIdade($value1["dtnasc"]); ?> anos</strong>
                      &nbsp;Nascim.: <?php echo formatDate($value1["dtnasc"]); ?>&nbsp;
                      <strong>CadUnico: <?php if( $value1["cadunico"] ){ ?> <?php echo htmlspecialchars( $value1["cadunico"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php }else{ ?> 0 <?php } ?> </strong>&nbsp;

                      <?php if( existeParq($value1["idpess"]) ){ ?>

                        <?php if( repostaSimParq($value1["idpess"]) ){ ?>

                        <strong><a style="font-weight: bold; color: green;" href="/prof/par-q/pessoa/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> <i style="color: orange;" class="fa fa-exclamation-triangle"></i> PAR-Q <i style="color: orange;" class="fa fa-exclamation-triangle"> </i></a> </strong>

                        <?php }else{ ?>

                        <strong><a style="font-weight: bold; color: green;" href="/prof/par-q/pessoa/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> PAR-Q </a> </strong>

                        <?php } ?>


                      <?php }else{ ?>

                      <strong><a style="font-weight: bold; color: red;" onclick="alert('Não existe Par-q para este aluno')"> PAR-Q </a> </strong>

                      <?php } ?>   
                      
                      <br><br>
                      <span style="color: black; font-weight: bold">Atestado:  </span>

                        <span style="color: darkred; font-weight: bold">  
                            <?php echo getAtestadoClinicoProfExiste($value1["numcpf"], 1); ?>
                        </span>
                        &nbsp;
                        <!--
                        <a style="color: orange; text-align-last: right;" onclick="dadosAtestado(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">     <?php echo getAtestadoIconeByNumCpf($value1["numcpf"]); ?></a>   
                        &nbsp;&nbsp;
                    -->

                        <a style="color: orange; text-align-last: right;" onclick="popupAtestado(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">       
                            <?php echo getAtestadoIconeByNumCpf($value1["numcpf"]); ?></a>  
                        &nbsp;&nbsp;

                        <span style="color: darkred;">  
                            <?php echo getAtestadoDermaProfExiste($value1["numcpf"], 2); ?>
                        </span>
                        &nbsp;   
                        <!--
                        <a style="color: orange; text-align-last: right;" onclick="dadosAtestadoDerma(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">
                            <?php echo getAtestadoDermaIconeByNumCpf($value1["numcpf"]); ?></a>
                        &nbsp; &nbsp; 
                    -->                     

                        <a style="color: orange; text-align-last: right;" onclick="popupAtestadoDerma(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">
                            <?php echo getAtestadoDermaIconeByNumCpf($value1["numcpf"]); ?></a>
                        &nbsp; &nbsp;                      

                    </h5>
                  </div>

                  <div class="col-md-6" style="margin: 1; padding: 1">
                    <h5 style="text-align: left;">               
                        <strong>Resp: </strong><?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                      &nbsp;
                       <a href="https://wa.me/+55<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá <?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>!" target="_blank" onclick="return confirm('Você será direcionado para o whatsapp do aluno ou responsável. Digite sua mensagem e no app clique em enviar msg.')"><i class="fa fa-whatsapp" style="color: darkgreen; font-weight: bold;"></i><span style="color: black;"> <?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;</span></a>
                       
                        &nbsp;&nbsp;&nbsp;&nbsp;

                       <a style="font-weight: bold;" onclick="requisitarPaginaEndereco('/prof/insc-turma-temporada-endereco/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')"><i class="fas fa-map-marker-alt"></i> Endereço </a> 

                        &nbsp;&nbsp;&nbsp;&nbsp;
                       
                      <strong>Dt Insc.: </strong><?php echo formatDate($value1["dtinsc"]); ?>
                      &nbsp;<strong>Dt Matric.: </strong><?php echo formatDate($value1["dtmatric"]); ?>&nbsp;
                      
                    </h5>
                  </div>                   
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">                  

                  <div class="col-md-6" style="margin: 1; padding: 1">
                    <h5 style="text-align: left;">  

                      <span style="font-weight: bold; text-align: left; color: brown;">                  
                        <?php if( $value1["inscpvs"] == 1 ){ ?> (Vuln. Social) &nbsp;&nbsp;<?php } ?>
                      </span> 
                      
                      <span style="font-weight: bold; text-align: left; color: darkblue;">  
                        <?php if( $value1["inscpcd"] == 1 ){ ?> PCD &nbsp;&nbsp;<?php } ?>  
                      </span> 

                      <span style="font-weight: bold; text-align: left; color: darkgreen; font-weight: bold;">                  
                        <?php if( $value1["laudo"] == 1 ){ ?>LAUDO  &nbsp;&nbsp;<?php } ?>
                       </span>
                   
                  

                    <?php if( $value1["idinscstatus"] == 1 ){ ?>              
                    <span style="font-weight: bold; text-align: left; color: blue;">                  
                      <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    </span>             
                    <?php } ?>

                  
              
                    <?php if( $value1["idinscstatus"] == 2 ){ ?>
              
                    <span style="font-weight: bold; text-align: left; color: darkgreen;">                  
                      <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    </span>
             
                    <?php } ?>
               

                      <?php if( $value1["idinscstatus"] == 3 ){ ?>
                      
                        <span style="font-weight: bold; text-align: left; color: green;">                  
                          <span>*<?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>*</span>
                        </span>
                      
                      <?php } ?>

                      <?php if( $value1["idinscstatus"] == 6 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: darkorange;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>


                      <?php if( $value1["idinscstatus"] == 7 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: darkblue;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>

                      
                      <?php if( $value1["idinscstatus"] == 8 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: orange;">                  
                          Status: <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>
                      
                      <?php if( $value1["idinscstatus"] == 9 ){ ?>
                      
                        <span style="font-weight: bold; text-align: left; color: red;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      
                      <?php } ?> 
                       </h5>               
                    </div>


              <div class="col-md-2" style="margin: 1; padding: 1">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/prof/profile/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button">Detalhes</a>
                </h5>
              </div>   

              <?php if( $value1["idinscstatus"] == 1 ){ ?>
                <div class="col-md-2" style="margin: 1; padding: 1">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a class="btn btn-danger btn-xs" href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusDesistente" role="button" onclick="return confirm('Deseja realmente informar como desistente o(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da inscrição <?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?')">Marcar como desistente</a>
                </h5>
                </div>
                <div class="col-md-2" style="margin: 1; padding: 1">
                    <h5 style="font-weight: bold; text-align: left;">                  
                        <a class="btn btn-default btn-xs" role="button" onclick="alterarStatusSuspender(<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">
                            Suspender matrícula 
                        </a>        
                    </h5>
                </div> 
              <?php } ?>                    

              <?php if( $value1["idinscstatus"] == 2 ){ ?>
                <div class="col-md-2" style="margin: 1; padding: 1">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusMatriculada" onclick="return confirm('Deseja realmente efetuar a MATRÍCULA do(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> na turma <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-success btn-xs"><i></i> Matricular</a>
                </h5>
                </div>
                <?php if( $numMatriculados >= $vagas ){ ?>
                  <div class="col-md-2" style="margin: 2; padding: 2">
                  <h5 style="font-weight: bold; text-align: left;">  
      
                    <a href="/prof/turma/create/token/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-info btn-xs"><i></i> Gerar token</a>
                   
                  </h5>
                  </div>
                <?php } ?>
              <?php } ?>

              <?php if( $value1["idinscstatus"] == 3 ){ ?>

              <!--
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">            
                  <a href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/enviarEmailASorteado" onclick="return confirm('Deseja realmente enviar email para que o(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> fique sabendo que foi sorteado na turma de <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-info btn-xs"><i></i> Avisar Sorteado </a>
                </h5>
              </div>
            -->
              <div class="col-md-2" style="margin: 1; padding: 1">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusMatriculada" onclick="return confirm('Deseja realmente efetuar a MATRÍCULA do(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> na turma <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-success btn-xs"><i></i> Matricular</a>
                </h5>
                </div>
                

              <?php } ?>
              
              <?php if( $value1["idinscstatus"] == 7 ){ ?>
             
              <div class="col-md-2" style="margin: 1; padding: 1">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="https://wa.me/+55<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá,%20informamos%20que%20temos%20uma%20vaga%20disponível%20para%20o(a)%20<?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20na%20turma%20de%20<?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20das%20<?php echo htmlspecialchars( $turma["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20às%20<?php echo htmlspecialchars( $turma["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20no%20<?php echo htmlspecialchars( $turma["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20Nº%20<?php echo htmlspecialchars( $turma["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>,%20da%20qual%20você%20fez%20inscrição.%20Se%20você%20ainda%20tem%20interesse%20na%20vaga,%20responda%20SIM%20nas%20próximas%2024%20horas,%20que%20vamos%20passar%20mais%20informações.%20Se%20você%20não%20tiver%20interesse%20ou%20não%20responder,%20vamos%20chamar%20o%20próximo%20inscrito%20da%20lista%20de%20espera%20e%20você%20terá%20que%20fazer%20uma%20nova%20inscrição%20para%20esta%20turma." target="_blank" onclick="return confirm('Você será direcionado para o whatsapp com a mensagem referente a vaga disponível já preenchida. No app clique em enviar msg.')" class="btn btn-success btn-xs"><i></i>Informar vaga pelo WhatsApp</a>
              
              </h5>
              </div>
                <div class="col-md-2" style="margin: 1; padding: 1">
              <h5>
               
                  <a href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusAguardandoMatricula" onclick="return confirm('Você já informou, por telefone ou whatsapp, o(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> sobre a vaga disponível para a turma de <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>? Se sim, clique em OK, se não imformou, clique em cancelar e informe o aluno sobre a vaga.')" class="btn btn-warning btn-xs"><i></i> Marcar aguardandado matrícula</a>
                </h5>
              </div>

              
               <?php } ?>
                  
                </div>
              </div>
              
            </div>
          </div>
          <?php } ?>
           
          <?php } ?>
          </div>  

          <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
            <div class="box-body" style="text-align: center;">
                <span style="color: orangered; font-weight: bold">PCD - Lista de pessoas com deficiência - <?php echo htmlspecialchars( $turma["vagaspcd"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas
                </span>
          </div>
              
            <?php $counter1=-1;  if( isset($inscPcd) && ( is_array($inscPcd) || $inscPcd instanceof Traversable ) && sizeof($inscPcd) ) foreach( $inscPcd as $key1 => $value1 ){ $counter1++; ?>
            <?php if( ($value1["idinscstatus"] != 8) && ($value1["idinscstatus"] != 9) && ($value1["idinscstatus"] != 5) && ($value1["idinscstatus"] != 10) ){ ?>
            <div class="box-body" style=" margin: 5px;">
              <div <?php echo colorStatus($value1["idinscstatus"]); ?> style="margin: 5px" class="row">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-6" style="margin: 1; padding: 1">
                    <h5 style="text-align: left;">
                      <?php echo htmlspecialchars( $value1["numsorte"], ENT_COMPAT, 'UTF-8', FALSE ); ?>º -
                      <strong>[<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>] - <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
                      <?php if( UserIsAdmin() ){ ?>
                      &nbsp;<?php echo htmlspecialchars( $value1["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;
                      <?php }else{ ?>
                      &nbsp;<?php echo formatCpf($value1["numcpf"]); ?>&nbsp;
                      <?php } ?>                      
                      <strong><?php echo calcularIdade($value1["dtnasc"]); ?> anos</strong>
                      &nbsp;Nascim.: <?php echo formatDate($value1["dtnasc"]); ?>&nbsp;
                      <strong>CadUnico: <?php if( $value1["cadunico"] ){ ?> <?php echo htmlspecialchars( $value1["cadunico"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php }else{ ?> 0 <?php } ?> </strong>&nbsp;
                      
                      <?php if( existeParq($value1["idpess"]) ){ ?>

                        <?php if( repostaSimParq($value1["idpess"]) ){ ?>

                        <strong><a style="font-weight: bold; color: green;" href="/prof/par-q/pessoa/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> <i style="color: orange;" class="fa fa-exclamation-triangle"></i> PAR-Q <i style="color: orange;" class="fa fa-exclamation-triangle"> </i></a> </strong>

                        <?php }else{ ?>

                        <strong><a style="font-weight: bold; color: green;" href="/prof/par-q/pessoa/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> PAR-Q </a> </strong>

                        <?php } ?>


                      <?php }else{ ?>

                      <strong><a style="font-weight: bold; color: red;" onclick="alert('Não existe Par-q para este aluno')"> PAR-Q </a> </strong>

                      <?php } ?>   
                      
                      <br><br>
                      <span style="color: black; font-weight: bold">Atestado:  </span>
                      
                      <span style="color: darkred; font-weight: bold">  
                            <?php echo getAtestadoClinicoProfExiste($value1["numcpf"], 1); ?>
                        </span>
                        &nbsp;
                        <!--
                        <a style="color: orange; text-align-last: right;" onclick="dadosAtestado(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">     <?php echo getAtestadoIconeByNumCpf($value1["numcpf"]); ?></a>   
                        &nbsp;&nbsp;
                    -->

                        <a style="color: orange; text-align-last: right;" onclick="popupAtestado(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">       
                            <?php echo getAtestadoIconeByNumCpf($value1["numcpf"]); ?></a>  
                        &nbsp;&nbsp;

                        <span style="color: darkred;">  
                            <?php echo getAtestadoDermaProfExiste($value1["numcpf"], 2); ?>
                        </span>
                        &nbsp;   
                        <!--
                        <a style="color: orange; text-align-last: right;" onclick="dadosAtestadoDerma(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">
                            <?php echo getAtestadoDermaIconeByNumCpf($value1["numcpf"]); ?></a>
                        &nbsp; &nbsp; 
                    -->                     

                        <a style="color: orange; text-align-last: right;" onclick="popupAtestadoDerma(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">
                            <?php echo getAtestadoDermaIconeByNumCpf($value1["numcpf"]); ?></a>
                        &nbsp; &nbsp;
                      
                    </h5>
                  </div>

                  <div class="col-md-6" style="margin: 1; padding: 1">
                    <h5 style="text-align: left;">               
                        <strong>Resp: </strong><?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                      &nbsp;
                       <a href="https://wa.me/+55<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá <?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>!" target="_blank" onclick="return confirm('Você será direcionado para o whatsapp do aluno ou responsável. Digite sua mensagem e no app clique em enviar msg.')"><i class="fa fa-whatsapp" style="color: darkgreen; font-weight: bold;"></i><span style="color: black;"> <?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;</span></a>
                       
                        &nbsp;&nbsp;&nbsp;&nbsp;

                       <a style="font-weight: bold;" onclick="requisitarPaginaEndereco('/prof/insc-turma-temporada-endereco/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')"><i class="fas fa-map-marker-alt"></i> Endereço </a>         

                        &nbsp;&nbsp;&nbsp;&nbsp;
                       
                      <strong>Dt Insc.: </strong><?php echo formatDate($value1["dtinsc"]); ?>
                      &nbsp;<strong>Dt Matric.: </strong><?php echo formatDate($value1["dtmatric"]); ?>&nbsp;
                    </h5>
                  </div>                   
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">                  

                  <div class="col-md-6" style="margin: 1; padding: 1">
                    <h5 style="text-align: left;">  

                      <span style="font-weight: bold; text-align: left; color: brown;">                  
                        <?php if( $value1["inscpvs"] == 1 ){ ?> (Vuln. Social) &nbsp;&nbsp;<?php } ?>
                      </span>               
                      
                      <span style="font-weight: bold; text-align: left; color: darkblue;">  
                        <?php if( $value1["inscpcd"] == 1 ){ ?> PCD &nbsp;&nbsp;<?php } ?>  
                      </span>                            
                    
                      
                      <span style="font-weight: bold; text-align: left; color: darkgreen; font-weight: bold;">                  
                        <?php if( $value1["laudo"] == 1 ){ ?>LAUDO  &nbsp;&nbsp;<?php } ?>
                       </span>
                   
                  

                    <?php if( $value1["idinscstatus"] == 1 ){ ?>              
                    <span style="font-weight: bold; text-align: left; color: blue;">                  
                      <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    </span>             
                    <?php } ?>

                  
              
                    <?php if( $value1["idinscstatus"] == 2 ){ ?>
              
                    <span style="font-weight: bold; text-align: left; color: darkgreen;">                  
                      <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    </span>
             
                    <?php } ?>
               

                      <?php if( $value1["idinscstatus"] == 3 ){ ?>
                      
                        <span style="font-weight: bold; text-align: left; color: green;">                  
                          <span>*<?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>*</span>
                        </span>
                      
                      <?php } ?>

                      <?php if( $value1["idinscstatus"] == 6 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: darkorange;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>


                      <?php if( $value1["idinscstatus"] == 7 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: darkblue;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>

                      
                      <?php if( $value1["idinscstatus"] == 8 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: orange;">                  
                          Status: <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>
                      
                      <?php if( $value1["idinscstatus"] == 9 ){ ?>
                      
                        <span style="font-weight: bold; text-align: left; color: red;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      
                      <?php } ?> 
                       </h5>               
                    </div>


              <div class="col-md-2" style="margin: 1; padding: 1">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/prof/profile/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button">Detalhes</a>
                </h5>
              </div>    

              <?php if( $value1["idinscstatus"] == 1 ){ ?>
                <div class="col-md-2" style="margin: 1; padding: 1">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a class="btn btn-danger btn-xs" href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusDesistente" role="button" onclick="return confirm('Deseja realmente informar como desistente o(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da inscrição <?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?')">Marcar como desistente</a>
                </h5>
                </div>
                <div class="col-md-2" style="margin: 1; padding: 1">
                    <h5 style="font-weight: bold; text-align: left;">                  
                        <a class="btn btn-default btn-xs" role="button" onclick="alterarStatusSuspender(<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">
                            Suspender matrícula 
                        </a>        
                    </h5>
                </div> 
              <?php } ?>                   

              <?php if( $value1["idinscstatus"] == 2 ){ ?>
                <div class="col-md-2" style="margin: 1; padding: 1">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusMatriculada" onclick="return confirm('Deseja realmente efetuar a MATRÍCULA do(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> na turma <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-success btn-xs"><i></i> Matricular</a>
                </h5>
                </div>
                <?php if( $numMatriculados >= $vagas ){ ?>
                  <div class="col-md-2" style="margin: 2; padding: 2">
                  <h5 style="font-weight: bold; text-align: left;">  
      
                    <a href="/prof/turma/create/token/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-info btn-xs"><i></i> Gerar token</a>
                   
                  </h5>
                  </div>
                <?php } ?>
              <?php } ?>

              <?php if( $value1["idinscstatus"] == 3 ){ ?>

              <!--
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">            
                  <a href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/enviarEmailASorteado" onclick="return confirm('Deseja realmente enviar email para que o(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> fique sabendo que foi sorteado na turma de <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-info btn-xs"><i></i> Avisar Sorteado </a>
                </h5>
              </div>
            -->
              <div class="col-md-2" style="margin: 1; padding: 1">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusMatriculada" onclick="return confirm('Deseja realmente efetuar a MATRÍCULA do(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> na turma <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-success btn-xs"><i></i> Matricular</a>
                </h5>
                </div>
                

              <?php } ?>
              
              <?php if( $value1["idinscstatus"] == 7 ){ ?>
             
              <div class="col-md-2" style="margin: 1; padding: 1">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="https://wa.me/+55<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá,%20informamos%20que%20temos%20uma%20vaga%20disponível%20para%20o(a)%20<?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20na%20turma%20de%20<?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20das%20<?php echo htmlspecialchars( $turma["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20às%20<?php echo htmlspecialchars( $turma["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20no%20<?php echo htmlspecialchars( $turma["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20Nº%20<?php echo htmlspecialchars( $turma["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>,%20da%20qual%20você%20fez%20inscrição.%20Se%20você%20ainda%20tem%20interesse%20na%20vaga,%20responda%20SIM%20nas%20próximas%2024%20horas,%20que%20vamos%20passar%20mais%20informações.%20Se%20você%20não%20tiver%20interesse%20ou%20não%20responder,%20vamos%20chamar%20o%20próximo%20inscrito%20da%20lista%20de%20espera%20e%20você%20terá%20que%20fazer%20uma%20nova%20inscrição%20para%20esta%20turma." target="_blank" onclick="return confirm('Você será direcionado para o whatsapp com a mensagem referente a vaga disponível já preenchida. No app clique em enviar msg.')" class="btn btn-success btn-xs"><i></i>Informar vaga pelo WhatsApp</a>
              
              
              </h5>
              </div>
                <div class="col-md-2" style="margin: 1; padding: 1">
              <h5>
              
               
                  <a href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusAguardandoMatricula" onclick="return confirm('Você já informou, por telefone ou whatsapp, o(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> sobre a vaga disponível para a turma de <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>? Se sim, clique em OK, se não imformou, clique em cancelar e informe o aluno sobre a vaga.')" class="btn btn-warning btn-xs"><i></i> Marcar aguardandado matrícula</a>
                </h5>
              </div>

              
               <?php } ?>
                  
                </div>
              </div>
              
            </div>
          </div>
          
          <?php } ?>
           
          <?php } ?>
          </div>    
  


          <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
            <div class="box-body" style="text-align: center;">
              <span style="color: orangered; font-weight: bold">PLM - Lista de pessoas com laudo - <?php echo htmlspecialchars( $turma["vagaslaudo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas
              </span>
            </div>
              
            <?php $counter1=-1;  if( isset($inscPlm) && ( is_array($inscPlm) || $inscPlm instanceof Traversable ) && sizeof($inscPlm) ) foreach( $inscPlm as $key1 => $value1 ){ $counter1++; ?>
            <?php if( ($value1["idinscstatus"] != 8) && ($value1["idinscstatus"] != 9) && ($value1["idinscstatus"] != 5) && ($value1["idinscstatus"] != 10) ){ ?>
            <div class="box-body" style=" margin: 5px;">
              <div <?php echo colorStatus($value1["idinscstatus"]); ?> style="margin: 5px" class="row">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-6" style="margin: 1; padding: 1">
                    <h5 style="text-align: left;">
                      <?php echo htmlspecialchars( $value1["numsorte"], ENT_COMPAT, 'UTF-8', FALSE ); ?>º -
                      <strong>[<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>] - <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
                      <?php if( UserIsAdmin() ){ ?>
                      &nbsp;<?php echo htmlspecialchars( $value1["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;
                      <?php }else{ ?>
                      &nbsp;<?php echo formatCpf($value1["numcpf"]); ?>&nbsp;
                      <?php } ?>                      
                      <strong><?php echo calcularIdade($value1["dtnasc"]); ?> anos</strong>
                      &nbsp;Nascim.: <?php echo formatDate($value1["dtnasc"]); ?>&nbsp;
                      <strong>CadUnico: <?php if( $value1["cadunico"] ){ ?> <?php echo htmlspecialchars( $value1["cadunico"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php }else{ ?> 0 <?php } ?> </strong>&nbsp;

                      <?php if( existeParq($value1["idpess"]) ){ ?>

                        <?php if( repostaSimParq($value1["idpess"]) ){ ?>

                        <strong><a style="font-weight: bold; color: green;" href="/prof/par-q/pessoa/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> <i style="color: orange;" class="fa fa-exclamation-triangle"></i> PAR-Q <i style="color: orange;" class="fa fa-exclamation-triangle"> </i></a> </strong>

                        <?php }else{ ?>

                        <strong><a style="font-weight: bold; color: green;" href="/prof/par-q/pessoa/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> PAR-Q </a> </strong>

                        <?php } ?>


                      <?php }else{ ?>

                      <strong><a style="font-weight: bold; color: red;" onclick="alert('Não existe Par-q para este aluno')"> PAR-Q </a> </strong>

                      <?php } ?>   
                      
                      <br><br>
                      <span style="color: black; font-weight: bold">Atestado:  </span>

                      <span style="color: darkred; font-weight: bold">  
                            <?php echo getAtestadoClinicoProfExiste($value1["numcpf"], 1); ?>
                        </span>
                        &nbsp;
                        <!--
                        <a style="color: orange; text-align-last: right;" onclick="dadosAtestado(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">     <?php echo getAtestadoIconeByNumCpf($value1["numcpf"]); ?></a>   
                        &nbsp;&nbsp;
                    -->

                        <a style="color: orange; text-align-last: right;" onclick="popupAtestado(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">       
                            <?php echo getAtestadoIconeByNumCpf($value1["numcpf"]); ?></a>  
                        &nbsp;&nbsp;

                        <span style="color: darkred;">  
                            <?php echo getAtestadoDermaProfExiste($value1["numcpf"], 2); ?>
                        </span>
                        &nbsp;   
                        <!--
                        <a style="color: orange; text-align-last: right;" onclick="dadosAtestadoDerma(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">
                            <?php echo getAtestadoDermaIconeByNumCpf($value1["numcpf"]); ?></a>
                        &nbsp; &nbsp; 
                    -->                     

                        <a style="color: orange; text-align-last: right;" onclick="popupAtestadoDerma(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">
                            <?php echo getAtestadoDermaIconeByNumCpf($value1["numcpf"]); ?></a>
                        &nbsp; &nbsp;
                      
                    </h5>
                  </div>

                  <div class="col-md-6" style="margin: 1; padding: 1">
                    <h5 style="text-align: left;">               
                        <strong>Resp: </strong><?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                      &nbsp;
                       <a href="https://wa.me/+55<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá <?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>!" target="_blank" onclick="return confirm('Você será direcionado para o whatsapp do aluno ou responsável. Digite sua mensagem e no app clique em enviar msg.')"><i class="fa fa-whatsapp" style="color: darkgreen; font-weight: bold;"></i><span style="color: black;"> <?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;</span></a>
                       
                        &nbsp;&nbsp;&nbsp;&nbsp;

                       <a style="font-weight: bold;" onclick="requisitarPaginaEndereco('/prof/insc-turma-temporada-endereco/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')"><i class="fas fa-map-marker-alt"></i> Endereço </a>         

                        &nbsp;&nbsp;&nbsp;&nbsp;
                       
                      <strong>Dt Insc.: </strong><?php echo formatDate($value1["dtinsc"]); ?>
                      &nbsp;<strong>Dt Matric.: </strong><?php echo formatDate($value1["dtmatric"]); ?>&nbsp;
                    </h5>
                  </div>                   
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">                  

                  <div class="col-md-6" style="margin: 1; padding: 1">
                    <h5 style="text-align: left;">  

                      <span style="font-weight: bold; text-align: left; color: brown;">                  
                        <?php if( $value1["inscpvs"] == 1 ){ ?> (Vuln. Social) &nbsp;&nbsp;<?php } ?>
                      </span>               
                      
                      <span style="font-weight: bold; text-align: left; color: darkblue;">  
                        <?php if( $value1["inscpcd"] == 1 ){ ?> PCD &nbsp;&nbsp;<?php } ?>  
                      </span>                            
                    
                      
                      <span style="font-weight: bold; text-align: left; color: darkgreen;">                  
                        <?php if( $value1["laudo"] == 1 ){ ?>LAUDO  &nbsp;&nbsp;<?php } ?>
                       </span>
                   
                  

                    <?php if( $value1["idinscstatus"] == 1 ){ ?>              
                    <span style="font-weight: bold; text-align: left; color: blue;">                  
                      <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    </span>             
                    <?php } ?>

                  
              
                    <?php if( $value1["idinscstatus"] == 2 ){ ?>
              
                    <span style="font-weight: bold; text-align: left; color: darkgreen;">                  
                      <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    </span>
             
                    <?php } ?>
               

                      <?php if( $value1["idinscstatus"] == 3 ){ ?>
                      
                        <span style="font-weight: bold; text-align: left; color: green;">                  
                          <span>*<?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>*</span>
                        </span>
                      
                      <?php } ?>

                      <?php if( $value1["idinscstatus"] == 6 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: darkorange;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>


                      <?php if( $value1["idinscstatus"] == 7 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: darkblue;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>

                      
                      <?php if( $value1["idinscstatus"] == 8 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: orange;">                  
                          Status: <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>
                      
                      <?php if( $value1["idinscstatus"] == 9 ){ ?>
                      
                        <span style="font-weight: bold; text-align: left; color: red;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      
                      <?php } ?> 
                       </h5>               
                    </div>


              <div class="col-md-2" style="margin: 1; padding: 1">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/prof/profile/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button">Detalhes</a>
                </h5>
              </div>     

              <?php if( $value1["idinscstatus"] == 1 ){ ?>
                <div class="col-md-2" style="margin: 1; padding: 1">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a class="btn btn-danger btn-xs" href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusDesistente" role="button" onclick="return confirm('Deseja realmente informar como desistente o(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da inscrição <?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?')">Marcar como desistente</a>
                </h5>
                </div>
                <div class="col-md-2" style="margin: 1; padding: 1">
                    <h5 style="font-weight: bold; text-align: left;">                  
                        <a class="btn btn-default btn-xs" role="button" onclick="alterarStatusSuspender(<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">
                            Suspender matrícula 
                        </a>        
                    </h5>
                </div> 
              <?php } ?>                  

              <?php if( $value1["idinscstatus"] == 2 ){ ?>
                <div class="col-md-2" style="margin: 1; padding: 1">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusMatriculada" onclick="return confirm('Deseja realmente efetuar a MATRÍCULA do(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> na turma <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-success btn-xs"><i></i> Matricular</a>
                </h5>
                </div>
                <?php if( $numMatriculados >= $vagas ){ ?>
                  <div class="col-md-2" style="margin: 2; padding: 2">
                  <h5 style="font-weight: bold; text-align: left;">  
      
                    <a href="/prof/turma/create/token/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-info btn-xs"><i></i> Gerar token</a>
                   
                  </h5>
                  </div>
                <?php } ?>
              <?php } ?>

              <?php if( $value1["idinscstatus"] == 3 ){ ?>

              <!--
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">            
                  <a href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/enviarEmailASorteado" onclick="return confirm('Deseja realmente enviar email para que o(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> fique sabendo que foi sorteado na turma de <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-info btn-xs"><i></i> Avisar Sorteado </a>
                </h5>
              </div>
            -->
              <div class="col-md-2" style="margin: 1; padding: 1">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusMatriculada" onclick="return confirm('Deseja realmente efetuar a MATRÍCULA do(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> na turma <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-success btn-xs"><i></i> Matricular</a>
                </h5>
                </div>
                

              <?php } ?>
              
              <?php if( $value1["idinscstatus"] == 7 ){ ?>
             
              <div class="col-md-2" style="margin: 1; padding: 1">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="https://wa.me/+55<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá,%20informamos%20que%20temos%20uma%20vaga%20disponível%20para%20o(a)%20<?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20na%20turma%20de%20<?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20das%20<?php echo htmlspecialchars( $turma["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20às%20<?php echo htmlspecialchars( $turma["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20no%20<?php echo htmlspecialchars( $turma["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20Nº%20<?php echo htmlspecialchars( $turma["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>,%20da%20qual%20você%20fez%20inscrição.%20Se%20você%20ainda%20tem%20interesse%20na%20vaga,%20responda%20SIM%20nas%20próximas%2024%20horas,%20que%20vamos%20passar%20mais%20informações.%20Se%20você%20não%20tiver%20interesse%20ou%20não%20responder,%20vamos%20chamar%20o%20próximo%20inscrito%20da%20lista%20de%20espera%20e%20você%20terá%20que%20fazer%20uma%20nova%20inscrição%20para%20esta%20turma." target="_blank" onclick="return confirm('Você será direcionado para o whatsapp com a mensagem referente a vaga disponível já preenchida. No app clique em enviar msg.')" class="btn btn-success btn-xs"><i></i>Informar vaga pelo WhatsApp</a>
              
              
              </h5>
              </div>
                <div class="col-md-2" style="margin: 1; padding: 1">
              <h5>
              
               
                  <a href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusAguardandoMatricula" onclick="return confirm('Você já informou, por telefone ou whatsapp, o(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> sobre a vaga disponível para a turma de <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>? Se sim, clique em OK, se não imformou, clique em cancelar e informe o aluno sobre a vaga.')" class="btn btn-warning btn-xs"><i></i> Marcar aguardandado matrícula</a>
                </h5>
              </div>

              
               <?php } ?>
                  
                </div>
              </div>
              
            </div>
          </div>
          
          <?php } ?>
           
          <?php } ?>
          </div>  

          <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
            <div class="box-body" style="text-align: center;">
              <span style="color: orangered; font-weight: bold">Lista GERAL de pessoas - <?php echo htmlspecialchars( $turma["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas
              </span>
            </div>
              
            <?php $counter1=-1;  if( isset($insc) && ( is_array($insc) || $insc instanceof Traversable ) && sizeof($insc) ) foreach( $insc as $key1 => $value1 ){ $counter1++; ?>
            <?php if( ($value1["idinscstatus"] != 8) && ($value1["idinscstatus"] != 9) && ($value1["idinscstatus"] != 5) && ($value1["idinscstatus"] != 10) ){ ?>
            <div class="box-body" style=" margin: 5px;">
              <div <?php echo colorStatus($value1["idinscstatus"]); ?> style="margin: 5px" class="row">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-6" style="margin: 1; padding: 1">
                    <h5 style="text-align: left;">
                      <?php echo htmlspecialchars( $value1["numsorte"], ENT_COMPAT, 'UTF-8', FALSE ); ?>º - <?php echo htmlspecialchars( $value1["idinscstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?> 
                      <strong>[<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>] - <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
                      <?php if( UserIsAdmin() ){ ?>
                      &nbsp;<?php echo htmlspecialchars( $value1["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;
                      <?php }else{ ?>
                      &nbsp;<?php echo formatCpf($value1["numcpf"]); ?>&nbsp;
                      <?php } ?>                      
                      <strong><?php echo calcularIdade($value1["dtnasc"]); ?> anos</strong>
                      &nbsp;Nascim.: <?php echo formatDate($value1["dtnasc"]); ?>&nbsp;
                      <strong>CadUnico: <?php if( $value1["cadunico"] ){ ?> <?php echo htmlspecialchars( $value1["cadunico"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php }else{ ?> 0 <?php } ?> </strong>&nbsp;

                      <?php if( existeParq($value1["idpess"]) ){ ?>

                        <?php if( repostaSimParq($value1["idpess"]) ){ ?>

                        <strong><a style="font-weight: bold; color: green;" href="/prof/par-q/pessoa/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> <i style="color: orange;" class="fa fa-exclamation-triangle"></i> PAR-Q <i style="color: orange;" class="fa fa-exclamation-triangle"> </i></a> </strong>

                        <?php }else{ ?>

                        <strong><a style="font-weight: bold; color: green;" href="/prof/par-q/pessoa/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> PAR-Q </a> </strong>

                        <?php } ?>


                      <?php }else{ ?>

                      <strong><a style="font-weight: bold; color: red;" onclick="alert('Não existe Par-q para este aluno')"> PAR-Q </a> </strong>

                      <?php } ?>   
                      
                      <br><br>
                      <span style="color: black; font-weight: bold">Atestado:  </span>

                      <span style="color: darkred; font-weight: bold">  
                            <?php echo getAtestadoClinicoProfExiste($value1["numcpf"], 1); ?>
                        </span>
                        &nbsp;
                        <!--
                        <a style="color: orange; text-align-last: right;" onclick="dadosAtestado(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">     <?php echo getAtestadoIconeByNumCpf($value1["numcpf"]); ?></a>   
                        &nbsp;&nbsp;
                    -->

                        <a style="color: orange; text-align-last: right;" onclick="popupAtestado(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">       
                            <?php echo getAtestadoIconeByNumCpf($value1["numcpf"]); ?></a>  
                        &nbsp;&nbsp;

                        <span style="color: darkred;">  
                            <?php echo getAtestadoDermaProfExiste($value1["numcpf"], 2); ?>
                        </span>
                        &nbsp;   
                        <!--
                        <a style="color: orange; text-align-last: right;" onclick="dadosAtestadoDerma(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">
                            <?php echo getAtestadoDermaIconeByNumCpf($value1["numcpf"]); ?></a>
                        &nbsp; &nbsp; 
                    -->                     

                        <a style="color: orange; text-align-last: right;" onclick="popupAtestadoDerma(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">
                            <?php echo getAtestadoDermaIconeByNumCpf($value1["numcpf"]); ?></a>
                        &nbsp; &nbsp;

                    </h5>
                  </div>

                  <div class="col-md-6" style="margin: 1; padding: 1">
                    <h5 style="text-align: left;">               
                       <strong>Resp: </strong><?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                      &nbsp;
                       <a href="https://wa.me/+55<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá <?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>!" target="_blank" onclick="return confirm('Você será direcionado para o whatsapp do aluno ou responsável. Digite sua mensagem e no app clique em enviar msg.')"><i class="fa fa-whatsapp" style="color: darkgreen; font-weight: bold;"></i><span style="color: black;"> <?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;</span></a>
                       
                        &nbsp;&nbsp;&nbsp;&nbsp;

                       <a style="font-weight: bold;" onclick="requisitarPaginaEndereco('/prof/insc-turma-temporada-endereco/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')"><i class="fas fa-map-marker-alt"></i> Endereço </a>         

                        &nbsp;&nbsp;&nbsp;&nbsp;
                      
                       
                      <strong>Dt Insc.: </strong><?php echo formatDate($value1["dtinsc"]); ?>
                      &nbsp;<strong>Dt Matric.: </strong><?php echo formatDate($value1["dtmatric"]); ?>&nbsp;
                    </h5>
                  </div>                   
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">                  

                  <div class="col-md-6" style="margin: 1; padding: 1">
                    <h5 style="text-align: left;"> 

                      <span style="font-weight: bold; text-align: left; color: brown;">                  
                        <?php if( $value1["inscpvs"] == 1 ){ ?> (Vuln. Social) &nbsp;&nbsp;<?php } ?>
                      </span>                
                      
                      <span style="font-weight: bold; text-align: left; color: darkblue;">  
                        <?php if( $value1["inscpcd"] == 1 ){ ?> PCD &nbsp;&nbsp;<?php } ?>  
                      </span>        
                      
                      <span style="font-weight: bold; text-align: left; color: darkgreen;">                  
                        <?php if( $value1["laudo"] == 1 ){ ?>LAUDO  &nbsp;&nbsp;<?php } ?>
                       </span>
                   
                  

                    <?php if( $value1["idinscstatus"] == 1 ){ ?>              
                    <span style="font-weight: bold; text-align: left; color: blue;">                  
                      <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    </span>             
                    <?php } ?>

                  
              
                    <?php if( $value1["idinscstatus"] == 2 ){ ?>
              
                    <span style="font-weight: bold; text-align: left; color: darkgreen;">                  
                      <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    </span>
             
                    <?php } ?>
               

                      <?php if( $value1["idinscstatus"] == 3 ){ ?>
                      
                        <span style="font-weight: bold; text-align: left; color: green;">                  
                          <span>*<?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>*</span>
                        </span>
                      
                      <?php } ?>

                      <?php if( $value1["idinscstatus"] == 6 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: darkorange;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>


                      <?php if( $value1["idinscstatus"] == 7 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: darkblue;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>

                      
                      <?php if( $value1["idinscstatus"] == 8 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: orange;">                  
                          Status: <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>
                      
                      <?php if( $value1["idinscstatus"] == 9 ){ ?>
                      
                        <span style="font-weight: bold; text-align: left; color: red;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      
                      <?php } ?> 
                       </h5>               
                    </div>


              <div class="col-md-2" style="margin: 1; padding: 1">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/prof/profile/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button">Detalhes</a>
                </h5>
              </div>  

              <?php if( $value1["idinscstatus"] == 1 ){ ?>
                <div class="col-md-2" style="margin: 1; padding: 1">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a class="btn btn-danger btn-xs" href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusDesistente" role="button" onclick="return confirm('Deseja realmente informar como desistente o(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da inscrição <?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?')">Marcar como  desistente</a>
                </h5>
                </div>
              <?php } ?>                     

              <?php if( $value1["idinscstatus"] == 2 ){ ?>
                <div class="col-md-2" style="margin: 1; padding: 1">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusMatriculada" onclick="return confirm('Deseja realmente efetuar a MATRÍCULA do(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> na turma <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-success btn-xs"><i></i> Matricular</a>
                </h5>
                </div>
                <?php if( $numMatriculados >= $vagas ){ ?>
                  <div class="col-md-2" style="margin: 2; padding: 2">
                  <h5 style="font-weight: bold; text-align: left;">  
      
                    <a href="/prof/turma/create/token/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-info btn-xs"><i></i> Gerar token</a>
                   
                  </h5>
                  </div>
                <?php } ?>
              <?php } ?>

              <?php if( $value1["idinscstatus"] == 3 ){ ?>

              <!--
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">            
                  <a href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/enviarEmailASorteado" onclick="return confirm('Deseja realmente enviar email para que o(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> fique sabendo que foi sorteado na turma de <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-info btn-xs"><i></i> Avisar Sorteado </a>
                </h5>
              </div>
            --> <div class="col-md-2" style="margin: 1; padding: 1">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusMatriculada" onclick="return confirm('Deseja realmente efetuar a MATRÍCULA do(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> na turma <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-success btn-xs"><i></i> Matricular</a>
                </h5>
                </div>
                

              <?php } ?>
              
              <?php if( $value1["idinscstatus"] == 7 ){ ?>
             
              <div class="col-md-2" style="margin: 1; padding: 1">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="https://wa.me/+55<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá,%20informamos%20que%20temos%20uma%20vaga%20disponível%20para%20o(a)%20<?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20na%20turma%20de%20<?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20das%20<?php echo htmlspecialchars( $turma["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20às%20<?php echo htmlspecialchars( $turma["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20no%20<?php echo htmlspecialchars( $turma["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20Nº%20<?php echo htmlspecialchars( $turma["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>,%20da%20qual%20você%20fez%20inscrição.%20Se%20você%20ainda%20tem%20interesse%20na%20vaga,%20responda%20SIM%20nas%20próximas%2024%20horas,%20que%20vamos%20passar%20mais%20informações.%20Se%20você%20não%20tiver%20interesse%20ou%20não%20responder,%20vamos%20chamar%20o%20próximo%20inscrito%20da%20lista%20de%20espera%20e%20você%20terá%20que%20fazer%20uma%20nova%20inscrição%20para%20esta%20turma." target="_blank" onclick="return confirm('Você será direcionado para o whatsapp com a mensagem referente a vaga disponível já preenchida. No app clique em enviar msg.')" class="btn btn-success btn-xs"><i></i>Informar vaga pelo WhatsApp</a>
              
              
              </h5>
              </div>
                <div class="col-md-2" style="margin: 1; padding: 1">
              <h5>
              
               
                  <a href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusAguardandoMatricula" onclick="return confirm('Você já informou, por telefone ou whatsapp, o(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> sobre a vaga disponível para a turma de <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>? Se sim, clique em OK, se não imformou, clique em cancelar e informe o aluno sobre a vaga.')" class="btn btn-warning btn-xs"><i></i> Marcar aguardandado matrícula</a>
                </h5>
              </div>

              
               <?php } ?>
                  
                </div>
              </div>
              
            </div>
          </div>
          <?php } ?>
           
          <?php } ?>
          </div> 

        <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
            
        <?php $counter1=-1;  if( isset($inscTodas) && ( is_array($inscTodas) || $inscTodas instanceof Traversable ) && sizeof($inscTodas) ) foreach( $inscTodas as $key1 => $value1 ){ $counter1++; ?>
            <?php if( ($value1["idinscstatus"] == 5) ){ ?>

            <div class="box-body" style=" margin: 5px;">              
                <div class="row">
                    <div class="col-md-12">
                        <h5 style="text-align: left;">
                            <?php echo htmlspecialchars( $value1["numsorte"], ENT_COMPAT, 'UTF-8', FALSE ); ?>º -
                            <strong>[<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>] - <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
                            &nbsp;<?php echo formatCpf($value1["numcpf"]); ?>&nbsp;
                            <strong><?php echo calcularIdade($value1["dtnasc"]); ?> anos</strong>
                            &nbsp;Nascim.: <?php echo formatDate($value1["dtnasc"]); ?>&nbsp;&nbsp;                       
                            <strong>Resp: <?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>&nbsp;
                            <a href="https://wa.me/+55<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá!" target="_blank" onclick="return confirm('Você será direcionado para o whatsapp do aluno ou responsável. Digite sua mensagem e no app clique em enviar msg.')">
                                    <i class="fa fa-whatsapp" style="color: green;"></i>
                                    <span style="color: black;"> <?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;</span>
                            </a>&nbsp;&nbsp;

                            <a style="font-weight: bold;" onclick="requisitarPaginaEndereco('/prof/insc-turma-temporada-endereco/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')"><i class="fas fa-map-marker-alt"></i> 
                                Endereço 
                            </a>&nbsp;&nbsp;

                            <strong>Dt Insc.: <?php echo formatDate($value1["dtinsc"]); ?></strong>
                            &nbsp;Dt Matric.: <?php echo formatDate($value1["dtmatric"]); ?>&nbsp;
                   
                            
                            <span style="font-weight: bold; text-align: left; color: brown;">                  
                                <?php if( $value1["inscpvs"] == 1 ){ ?> (Vuln. Social) &nbsp;&nbsp;<?php } ?>
                            </span>                
                      
                            <span style="font-weight: bold; text-align: left; color: darkblue;">  
                                <?php if( $value1["inscpcd"] == 1 ){ ?> PCD &nbsp;&nbsp;<?php } ?>  
                            </span>        
                      
                            <span style="font-weight: bold; text-align: left; color: darkgreen;">                  
                                <?php if( $value1["laudo"] == 1 ){ ?>LAUDO  &nbsp;&nbsp;<?php } ?>
                            </span> 
                            <br>
                            <?php if( $value1["idinscstatus"] == 5 ){ ?>                      
                                <span style="font-weight: bold; text-align: left; color: green;">                  
                                *<?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>*
                                </span> 
                                &nbsp;&nbsp;
                          
                            <?php } ?>                    
                        
                            <a href="/prof/profile/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button">
                                Detalhes
                            </a>
                            &nbsp;&nbsp;

                            <span style="line-height: 10px; height: 20px; color: darkblue; font-weight: bold;"> 
                                <a onclick="alterarStatusRematricular(<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">
                                    Rematricular 
                                </a>        
                            </span> &nbsp;&nbsp;
                        
                            <span style="line-height: 10px; height: 20px; color: red; right: 0;">       
                                <a href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusSuspensaDesistente" role="button" onclick="return confirm('Deseja realmente informar como desistente o(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da inscrição <?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?')" style="color: red;"> 
                                    Excluir 
                                </a>  
                            </span>
                        </h5>                               
                    </div>
                </div>              
            </div>
            <?php } ?>           
        <?php } ?>
          </div> 

            <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
            <div class="box-body" style="text-align: center; background-color: #C8A2C8
;">
              <span style="color: black; font-weight: bold">Excluídas
              </span>
            </div>
          
           <?php $counter1=-1;  if( isset($inscTodas) && ( is_array($inscTodas) || $inscTodas instanceof Traversable ) && sizeof($inscTodas) ) foreach( $inscTodas as $key1 => $value1 ){ $counter1++; ?>
            <?php if( ($value1["idinscstatus"] == 10) ){ ?>

            <div <?php echo colorStatus($value1["idinscstatus"]); ?> style="margin: 5px" class="row">
                <div class="row">
                    <div class="col-md-12">
                        <h5 style="text-align: left;">
                            <?php echo htmlspecialchars( $value1["numsorte"], ENT_COMPAT, 'UTF-8', FALSE ); ?>º -
                            <strong>[<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>] - <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
                            &nbsp;<?php echo formatCpf($value1["numcpf"]); ?>&nbsp;
                            <strong><?php echo calcularIdade($value1["dtnasc"]); ?> anos</strong>
                            &nbsp;Nascim.: <?php echo formatDate($value1["dtnasc"]); ?>&nbsp;&nbsp;                       
                            <strong>Resp: <?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>&nbsp;
                            <a href="https://wa.me/+55<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá!" target="_blank" onclick="return confirm('Você será direcionado para o whatsapp do aluno ou responsável. Digite sua mensagem e no app clique em enviar msg.')">
                                    <i class="fa fa-whatsapp" style="color: green;"></i>
                                    <span style="color: black;"> <?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;</span>
                            </a>&nbsp;&nbsp;

                            <a style="font-weight: bold;" onclick="requisitarPaginaEndereco('/prof/insc-turma-temporada-endereco/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')"><i class="fas fa-map-marker-alt"></i> 
                                Endereço 
                            </a>&nbsp;&nbsp;

                            <strong>Dt Insc.: <?php echo formatDate($value1["dtinsc"]); ?></strong>
                            &nbsp;Dt Matric.: <?php echo formatDate($value1["dtmatric"]); ?>&nbsp;<strong>Dt Exclusão.: <?php echo formatDate($value1["dtexclusao"]); ?></strong>
                   
                            
                            <span style="font-weight: bold; text-align: left; color: brown;">                  
                                <?php if( $value1["inscpvs"] == 1 ){ ?> (Vuln. Social) &nbsp;&nbsp;<?php } ?>
                            </span>                
                      
                            <span style="font-weight: bold; text-align: left; color: darkblue;">  
                                <?php if( $value1["inscpcd"] == 1 ){ ?> PCD &nbsp;&nbsp;<?php } ?>  
                            </span>        
                      
                            <span style="font-weight: bold; text-align: left; color: darkgreen;">                  
                                <?php if( $value1["laudo"] == 1 ){ ?>LAUDO  &nbsp;&nbsp;<?php } ?>
                            </span> 
                            <br>
                            <?php if( $value1["idinscstatus"] == 10 ){ ?>                      
                                <span style="font-weight: bold; text-align: left; color: red;">                  
                                Inscrição <?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                </span> 
                                &nbsp;&nbsp;
                          
                            <?php } ?>                    
                        
                            <a href="/prof/profile/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button">
                                Detalhes
                            </a>
                            &nbsp;&nbsp;

                            <span style="line-height: 10px; height: 20px; color: darkgreen; font-weight: bold;"> 
                                <a style="color: green;" onclick="alterarStatusRematricular(<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">
                                    Rematricular 
                                </a>        
                            </span> &nbsp;&nbsp;

                            
                        
                            
                        </h5>                               
                    </div>
                </div>              
            </div>
            <?php } ?>
           
          <?php } ?>
          </div>      

          <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
            <div class="box-body" style="text-align: center; background-color: orangered;">
              <span style="color: black; font-weight: bold">Canceladas
              </span>
            </div>
          
           <?php $counter1=-1;  if( isset($inscTodas) && ( is_array($inscTodas) || $inscTodas instanceof Traversable ) && sizeof($inscTodas) ) foreach( $inscTodas as $key1 => $value1 ){ $counter1++; ?>
            <?php if( ($value1["idinscstatus"] == 9) ){ ?>
            <div class="box-body" style=" margin: 5px;">
              <div <?php echo colorStatus($value1["idinscstatus"]); ?> style="margin: 5px" class="row">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-6" style="margin: 2; padding: 2">
                    <h5 style="text-align: left;">
                      <?php echo htmlspecialchars( $value1["numsorte"], ENT_COMPAT, 'UTF-8', FALSE ); ?>º -
                      <strong>[<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>] - <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
                      &nbsp;<?php echo formatCpf($value1["numcpf"]); ?>&nbsp;
                      <strong><?php echo calcularIdade($value1["dtnasc"]); ?> anos</strong>
                      &nbsp;Nascim.: <?php echo formatDate($value1["dtnasc"]); ?>&nbsp;
                      <strong>CadUnico: <?php if( $value1["cadunico"] ){ ?> <?php echo htmlspecialchars( $value1["cadunico"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php }else{ ?> 0 <?php } ?> </strong>&nbsp;

                      <?php if( existeParq($value1["idpess"]) ){ ?>

                        <?php if( repostaSimParq($value1["idpess"]) ){ ?>

                        <strong><a style="font-weight: bold; color: green;" href="/prof/par-q/pessoa/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> <i style="color: orange;" class="fa fa-exclamation-triangle"></i> PAR-Q <i style="color: orange;" class="fa fa-exclamation-triangle"> </i></a> </strong>

                        <?php }else{ ?>

                        <strong><a style="font-weight: bold; color: green;" href="/prof/par-q/pessoa/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> PAR-Q </a> </strong>

                        <?php } ?>


                      <?php }else{ ?>

                      <strong><a style="font-weight: bold; color: red;" onclick="alert('Não existe Par-q para este aluno')"> PAR-Q </a> </strong>

                      <?php } ?>   
                      
                      <br><br>
                      <span style="color: black; font-weight: bold">Atestado:  </span>

                      <span style="color: darkred; font-weight: bold">  
                            <?php echo getAtestadoClinicoProfExiste($value1["numcpf"], 1); ?>
                        </span>
                        &nbsp;
                        <!--
                        <a style="color: orange; text-align-last: right;" onclick="dadosAtestado(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">     <?php echo getAtestadoIconeByNumCpf($value1["numcpf"]); ?></a>   
                        &nbsp;&nbsp;
                    -->

                        <a style="color: orange; text-align-last: right;" onclick="popupAtestado(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">       
                            <?php echo getAtestadoIconeByNumCpf($value1["numcpf"]); ?></a>  
                        &nbsp;&nbsp;

                        <span style="color: darkred;">  
                            <?php echo getAtestadoDermaProfExiste($value1["numcpf"], 2); ?>
                        </span>
                        &nbsp;   
                        <!--
                        <a style="color: orange; text-align-last: right;" onclick="dadosAtestadoDerma(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">
                            <?php echo getAtestadoDermaIconeByNumCpf($value1["numcpf"]); ?></a>
                        &nbsp; &nbsp; 
                    -->                     

                        <a style="color: orange; text-align-last: right;" onclick="popupAtestadoDerma(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">
                            <?php echo getAtestadoDermaIconeByNumCpf($value1["numcpf"]); ?></a>
                        &nbsp; &nbsp;
                      
                      </h5>
                  </div>

                  <div class="col-md-6" style="margin: 2; padding: 2">
                    <h5 style="text-align: left;">               
                       <strong>Resp: <?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
                      &nbsp;
                       <a href="https://wa.me/+55<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá!" target="_blank" onclick="return confirm('Você será direcionado para o whatsapp do aluno ou responsável. Digite sua mensagem e no app clique em enviar msg.')"><i class="fa fa-whatsapp" style="color: green;"></i><span style="color: black;"> <?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;</span></a>                       

                       &nbsp;&nbsp;&nbsp;&nbsp;

                       <a style="font-weight: bold;" onclick="requisitarPaginaEndereco('/prof/insc-turma-temporada-endereco/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')"><i class="fas fa-map-marker-alt"></i> Endereço </a>         

                        &nbsp;&nbsp;&nbsp;&nbsp;

                      <strong>Dt Insc.: <?php echo formatDate($value1["dtinsc"]); ?></strong>
                      &nbsp;Dt Matric.: <?php echo formatDate($value1["dtmatric"]); ?>&nbsp;
                    </h5>
                  </div>                   
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">                  

                  <div class="col-md-6" style="margin: 2; padding: 2">
                    <h5 style="text-align: left;"> 

                      <span style="font-weight: bold; text-align: left; color: brown;">                  
                        <?php if( $value1["inscpvs"] == 1 ){ ?> (Vuln. Social) &nbsp;&nbsp;<?php } ?>
                      </span>                
                      
                      <span style="font-weight: bold; text-align: left; color: darkblue;">  
                        <?php if( $value1["inscpcd"] == 1 ){ ?> PCD &nbsp;&nbsp;<?php } ?>  
                      </span>        
                      
                      <span style="font-weight: bold; text-align: left; color: darkgreen;">                  
                        <?php if( $value1["laudo"] == 1 ){ ?>LAUDO  &nbsp;&nbsp;<?php } ?>
                       </span>
                   
                  

                    <?php if( $value1["idinscstatus"] == 1 ){ ?>              
                    <span style="font-weight: bold; text-align: left; color: blue;">                  
                      <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    </span>             
                    <?php } ?>

                  
              
                    <?php if( $value1["idinscstatus"] == 2 ){ ?>
              
                    <span style="font-weight: bold; text-align: left; color: darkgreen;">                  
                      <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    </span>
             
                    <?php } ?>
               

                      <?php if( $value1["idinscstatus"] == 3 ){ ?>
                      
                        <span style="font-weight: bold; text-align: left; color: green;">                  
                          <span>*<?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>*</span>
                        </span>
                      
                      <?php } ?>

                      <?php if( $value1["idinscstatus"] == 6 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: darkorange;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>


                      <?php if( $value1["idinscstatus"] == 7 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: darkblue;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>

                      
                      <?php if( $value1["idinscstatus"] == 8 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: orange;">                  
                          Status: <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>
                      
                      <?php if( $value1["idinscstatus"] == 9 ){ ?>
                      
                        <span style="font-weight: bold; text-align: left; color: red;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      
                      <?php } ?> 
                       </h5>               
                    </div>


              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/prof/profile/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button">Detalhes</a>
                </h5>
              </div> 

              <?php if( $value1["idinscstatus"] == 1 ){ ?>
                <div class="col-md-2" style="margin: 2; padding: 2">
                    <h5 style="font-weight: bold; text-align: left;">                  
                        <a class="btn btn-danger btn-xs" href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusDesistente" role="button" onclick="return confirm('Deseja realmente informar como desistente o <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da inscrição <?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?')">Marcar como desistente</a>
                    </h5>
                </div>
                <div class="col-md-2" style="margin: 1; padding: 1">
                    <h5 style="font-weight: bold; text-align: left;">                  
                        <a class="btn btn-default btn-xs" role="button" onclick="alterarStatusSuspender(<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">
                            Suspender matrícula 
                        </a>        
                    </h5>
                </div> 
              <?php } ?>                      

              <?php if( $value1["idinscstatus"] == 2 ){ ?>
                <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusMatriculada" onclick="return confirm('Deseja realmente efetuar a MATRÍCULA do(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> na turma <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-success btn-xs"><i></i> Matricular</a>
                </h5>
                </div>
                <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">   

                  <a href="/prof/turma/create/token/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-info btn-xs"><i></i> Gerar token</a>

                </h5>
                </div>
              <?php } ?>

              <?php if( $value1["idinscstatus"] == 3 ){ ?>
            <!--
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">            
                  <a href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/enviarEmailASorteado" onclick="return confirm('Deseja realmente enviar email para que o(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> fique sabendo que foi sorteado na turma de <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-info btn-xs"><i></i> Avisar Sorteado </a>
                </h5>
              </div>
            -->
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusMatriculada" onclick="return confirm('Deseja realmente efetuar a MATRÍCULA do(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> na turma <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-success btn-xs"><i></i> Matricular</a>
                </h5>
                </div>
                

              <?php } ?>
              
              <?php if( $value1["idinscstatus"] == 7 ){ ?>

              <div class="col-md-2" style="margin: 1; padding: 1">
                <h5 style="font-weight: bold; text-align: left;">                  
                 <a href="https://wa.me/+55<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá,%20informamos%20que%20temos%20uma%20vaga%20disponível%20para%20o(a)%20<?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20na%20turma%20de%20<?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20das%20<?php echo htmlspecialchars( $turma["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20às%20<?php echo htmlspecialchars( $turma["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20no%20<?php echo htmlspecialchars( $turma["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20Nº%20<?php echo htmlspecialchars( $turma["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>,%20da%20qual%20você%20fez%20inscrição.%20Se%20você%20ainda%20tem%20interesse%20na%20vaga,%20responda%20SIM%20nas%20próximas%2024%20horas,%20que%20vamos%20passar%20mais%20informações.%20Se%20você%20não%20tiver%20interesse%20ou%20não%20responder,%20vamos%20chamar%20o%20próximo%20inscrito%20da%20lista%20de%20espera%20e%20você%20terá%20que%20fazer%20uma%20nova%20inscrição%20para%20esta%20turma." target="_blank" onclick="return confirm('Você será direcionado para o whatsapp com a mensagem referente a vaga disponível já preenchida. No app clique em enviar msg.')" class="btn btn-success btn-xs"><i></i>Informar vaga pelo WhatsApp</a>
              
              
              </div>
                <div class="col-md-2" style="margin: 1; padding: 1">
              
               
                  <a href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusAguardandoMatricula" onclick="return confirm('Você já informou, por telefone ou whatsapp, o(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> sobre a vaga disponível para a turma de <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>? Se sim, clique em OK, se não imformou, clique em cancelar e informe o aluno sobre a vaga.')" class="btn btn-warning btn-xs"><i></i> Marcar aguardandado matrícula</a>
                </h5>
              </div>

            <!--
               <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusSorteada" class="btn btn-danger btn-xs"><i></i> Sorteada ?</a>
                </h5>
              </div>
            -->
              <!--
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusSorteada" onclick="return confirm('Deseja realmente que a inscrição <?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  do(da) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> seja confirmada como Sorteada na turma de <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-danger btn-xs"><i></i> Sorteada ?</a>
                </h5>
              </div>
            -->
               <?php } ?>
                  
                </div>
              </div>
              
            </div>
          </div>

          <?php } ?>
           
          <?php } ?>
          </div>      

          <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
            <div class="box-body" style="text-align: center; background-color: darkorange;">
              <span style="color: black; font-weight: bold">Desistentes
              </span>
            </div>

          <?php $counter1=-1;  if( isset($inscTodas) && ( is_array($inscTodas) || $inscTodas instanceof Traversable ) && sizeof($inscTodas) ) foreach( $inscTodas as $key1 => $value1 ){ $counter1++; ?>
            <?php if( ($value1["idinscstatus"] == 8) ){ ?>
            <div class="box-body" style=" margin: 5px;">
              <div <?php echo colorStatus($value1["idinscstatus"]); ?> style="margin: 5px" class="row">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-6" style="margin: 2; padding: 2">
                    <h5 style="text-align: left;">
                      <?php echo htmlspecialchars( $value1["numsorte"], ENT_COMPAT, 'UTF-8', FALSE ); ?>º -
                      <strong>[<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>] - <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
                      &nbsp;<?php echo formatCpf($value1["numcpf"]); ?>&nbsp;
                      <strong><?php echo calcularIdade($value1["dtnasc"]); ?> anos</strong>
                      &nbsp;Nascim.: <?php echo formatDate($value1["dtnasc"]); ?>&nbsp;
                      <strong>CadUnico: <?php if( $value1["cadunico"] ){ ?> <?php echo htmlspecialchars( $value1["cadunico"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php }else{ ?> 0 <?php } ?> </strong>&nbsp;

                      <?php if( existeParq($value1["idpess"]) ){ ?>

                        <?php if( repostaSimParq($value1["idpess"]) ){ ?>

                        <strong><a style="font-weight: bold; color: green;" href="/prof/par-q/pessoa/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> <i style="color: orange;" class="fa fa-exclamation-triangle"></i> PAR-Q <i style="color: orange;" class="fa fa-exclamation-triangle"> </i></a> </strong>

                        <?php }else{ ?>

                        <strong><a style="font-weight: bold; color: green;" href="/prof/par-q/pessoa/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> PAR-Q </a> </strong>

                        <?php } ?>


                      <?php }else{ ?>

                      <strong><a style="font-weight: bold; color: red;" onclick="alert('Não existe Par-q para este aluno')"> PAR-Q </a> </strong>

                      <?php } ?>   
                      
                      <br><br>
                      <span style="color: black; font-weight: bold">Atestado:  </span>

                      <span style="color: darkred; font-weight: bold">  
                            <?php echo getAtestadoClinicoProfExiste($value1["numcpf"], 1); ?>
                        </span>
                        &nbsp;
                        <!--
                        <a style="color: orange; text-align-last: right;" onclick="dadosAtestado(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">     <?php echo getAtestadoIconeByNumCpf($value1["numcpf"]); ?></a>   
                        &nbsp;&nbsp;
                    -->

                        <a style="color: orange; text-align-last: right;" onclick="popupAtestado(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">       
                            <?php echo getAtestadoIconeByNumCpf($value1["numcpf"]); ?></a>  
                        &nbsp;&nbsp;

                        <span style="color: darkred;">  
                            <?php echo getAtestadoDermaProfExiste($value1["numcpf"], 2); ?>
                        </span>
                        &nbsp;   
                        <!--
                        <a style="color: orange; text-align-last: right;" onclick="dadosAtestadoDerma(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">
                            <?php echo getAtestadoDermaIconeByNumCpf($value1["numcpf"]); ?></a>
                        &nbsp; &nbsp; 
                    -->                     

                        <a style="color: orange; text-align-last: right;" onclick="popupAtestadoDerma(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">
                            <?php echo getAtestadoDermaIconeByNumCpf($value1["numcpf"]); ?></a>
                        &nbsp; &nbsp;

                    </h5>
                  </div>

                  <div class="col-md-6" style="margin: 2; padding: 2">
                    <h5 style="text-align: left;">               
                       <strong>Resp: <?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
                      &nbsp;
                       <a href="https://wa.me/+55<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá!" target="_blank" onclick="return confirm('Você será direcionado para o whatsapp do aluno ou responsável. Digite sua mensagem e no app clique em enviar msg.')"><i class="fa fa-whatsapp" style="color: green;"></i><span style="color: black;"> <?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;</span></a>                       

                       &nbsp;&nbsp;&nbsp;&nbsp;

                       <a style="font-weight: bold;" onclick="requisitarPaginaEndereco('/prof/insc-turma-temporada-endereco/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')"><i class="fas fa-map-marker-alt"></i> Endereço </a>         

                        &nbsp;&nbsp;&nbsp;&nbsp;

                      <strong>Dt Insc.: <?php echo formatDate($value1["dtinsc"]); ?></strong>
                      &nbsp;Dt Matric.: <?php echo formatDate($value1["dtmatric"]); ?>&nbsp;
                      <strong>Dt Desist.: <?php echo formatDate($value1["dtdesist"]); ?></strong>
                    </h5>
                  </div>                   
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">                  

                  <div class="col-md-6" style="margin: 2; padding: 2">
                    <h5 style="text-align: left;"> 

                      <span style="font-weight: bold; text-align: left; color: brown;">                  
                        <?php if( $value1["inscpvs"] == 1 ){ ?> (Vuln. Social) &nbsp;&nbsp;<?php } ?>
                      </span>                
                      
                      <span style="font-weight: bold; text-align: left; color: darkblue;">  
                        <?php if( $value1["inscpcd"] == 1 ){ ?> PCD &nbsp;&nbsp;<?php } ?>  
                      </span>        
                      
                      <span style="font-weight: bold; text-align: left; color: darkgreen;">                  
                        <?php if( $value1["laudo"] == 1 ){ ?>LAUDO  &nbsp;&nbsp;<?php } ?>
                       </span>
                   
                  

                    <?php if( $value1["idinscstatus"] == 1 ){ ?>              
                    <span style="font-weight: bold; text-align: left; color: blue;">                  
                      <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    </span>             
                    <?php } ?>

                  
              
                    <?php if( $value1["idinscstatus"] == 2 ){ ?>
              
                    <span style="font-weight: bold; text-align: left; color: darkgreen;">                  
                      <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    </span>
             
                    <?php } ?>
               

                      <?php if( $value1["idinscstatus"] == 3 ){ ?>
                      
                        <span style="font-weight: bold; text-align: left; color: green;">                  
                          <span>*<?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>*</span>
                        </span>
                      
                      <?php } ?>

                      <?php if( $value1["idinscstatus"] == 6 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: darkorange;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>


                      <?php if( $value1["idinscstatus"] == 7 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: darkblue;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>

                      
                      <?php if( $value1["idinscstatus"] == 8 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: orange;">                  
                          Status: <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>
                      
                      <?php if( $value1["idinscstatus"] == 9 ){ ?>
                      
                        <span style="font-weight: bold; text-align: left; color: red;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      
                      <?php } ?> 
                       </h5>               
                    </div>


              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/prof/profile/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button">Detalhes</a>
                </h5>
              </div> 

              <?php if( $value1["idinscstatus"] == 1 ){ ?>
                <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a class="btn btn-danger btn-xs" href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusDesistente" role="button" onclick="return confirm('Deseja realmente informar como desistente o <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da inscrição <?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?')">Marcar como desistente</a>
                </h5>
                </div>
                <div class="col-md-2" style="margin: 1; padding: 1">
                    <h5 style="font-weight: bold; text-align: left;">                  
                        <a class="btn btn-default btn-xs" role="button" onclick="alterarStatusSuspender(<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">
                            Suspender matrícula 
                        </a>        
                    </h5>
                </div> 
              <?php } ?>                      

              <?php if( $value1["idinscstatus"] == 2 ){ ?>
                <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusMatriculada" onclick="return confirm('Deseja realmente efetuar a MATRÍCULA do(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> na turma <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-success btn-xs"><i></i> Matricular</a>
                </h5>
                </div>
                <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">   

                  <a href="/prof/turma/create/token/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-info btn-xs"><i></i> Gerar token</a>

                </h5>
                </div>
              <?php } ?>

              <?php if( $value1["idinscstatus"] == 3 ){ ?>
            <!--
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">            
                  <a href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/enviarEmailASorteado" onclick="return confirm('Deseja realmente enviar email para que o(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> fique sabendo que foi sorteado na turma de <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-info btn-xs"><i></i> Avisar Sorteado </a>
                </h5>
              </div>
            -->
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusMatriculada" onclick="return confirm('Deseja realmente efetuar a MATRÍCULA do(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> na turma <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-success btn-xs"><i></i> Matricular</a>
                </h5>
                </div>
                

              <?php } ?>
              
              <?php if( $value1["idinscstatus"] == 7 ){ ?>

              <div class="col-md-2" style="margin: 1; padding: 1">
                <h5 style="font-weight: bold; text-align: left;">                  
                 <a href="https://wa.me/+55<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá,%20informamos%20que%20temos%20uma%20vaga%20disponível%20para%20o(a)%20<?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20na%20turma%20de%20<?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20das%20<?php echo htmlspecialchars( $turma["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20às%20<?php echo htmlspecialchars( $turma["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20no%20<?php echo htmlspecialchars( $turma["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20Nº%20<?php echo htmlspecialchars( $turma["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>,%20da%20qual%20você%20fez%20inscrição.%20Se%20você%20ainda%20tem%20interesse%20na%20vaga,%20responda%20SIM%20nas%20próximas%2024%20horas,%20que%20vamos%20passar%20mais%20informações.%20Se%20você%20não%20tiver%20interesse%20ou%20não%20responder,%20vamos%20chamar%20o%20próximo%20inscrito%20da%20lista%20de%20espera%20e%20você%20terá%20que%20fazer%20uma%20nova%20inscrição%20para%20esta%20turma." target="_blank" onclick="return confirm('Você será direcionado para o whatsapp com a mensagem referente a vaga disponível já preenchida. No app clique em enviar msg.')" class="btn btn-success btn-xs"><i></i>Informar vaga pelo WhatsApp</a>
              
              
              </div>
                <div class="col-md-2" style="margin: 1; padding: 1">
              
               
                  <a href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusAguardandoMatricula" onclick="return confirm('Você já informou, por telefone ou whatsapp, o(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> sobre a vaga disponível para a turma de <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>? Se sim, clique em OK, se não imformou, clique em cancelar e informe o aluno sobre a vaga.')" class="btn btn-warning btn-xs"><i></i> Marcar aguardandado matrícula</a>
                </h5>
              </div>

            <!--
               <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusSorteada" class="btn btn-danger btn-xs"><i></i> Sorteada ?</a>
                </h5>
              </div>
            -->
              <!--
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/prof/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusSorteada" onclick="return confirm('Deseja realmente que a inscrição <?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  do(da) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> seja confirmada como Sorteada na turma de <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-danger btn-xs"><i></i> Sorteada ?</a>
                </h5>
              </div>
            -->
               <?php } ?>
                  
                </div>
              </div>
              
            </div>
          </div>

          <?php } ?>
           
          <?php } ?>
          </div>     
         
       

         
       

         
            <button type="button" onclick="window.print()" class="btn btn-primary pull-right" style="margin-right: 5px;">
                    <i class="fa fa-print"></i> Imprimir
                </button>
            <!-- /.box-body -->

            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
                <li><a href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                <?php } ?>
              </ul>
            </div>

          </div>
    </div>
  </div>
  <div hidden id="divPopupAtestado" style="text-align-last: center; border-radius: 15px 15px 15px 15px"> 

                <div style="background-color: lightblue; text-align: center; padding: 0px; font-size: 13px; font-weight: bold; border-radius: 15px 15px 0px 0px; width: 100%;">
                    <div style="text-align-last: right; font-weight: bold; color: red; " onclick="fecharPopupAtestado()"> ( x ) &nbsp;&nbsp;
                    </div>  
                </div>

                <div style="background-color: lightblue; text-align: justify; padding: 5px; font-size: 12px; font-weight: bold; border-radius: 0px 0px 0px 0px  ; width: 100%;">
                    <p id="textConteudoAtestado"></p>
                </div> 

                <div style="text-align: center; padding: 5; width: 100%;">
                    <form id="formAtestado" method="get" style="height: 100%;"> 
                        <label style="font-weight: bold; font-size: 10px">Preencha os dados abaixo para atualizar o atestado clínico</label>
                        <br>
                        <input hidden id="conteudoAtestadoId" name="idpess" type="text" required>
                        <input hidden id="iduser" name="iduser" type="text" value='<?php echo getUserId(); ?>' required>
                        <input id="data" name="data" type="text" required="required" style="height: 30px; margin-bottom: 2px; width: 90%" placeholder="Somente números 00-00-0000">
                        <br> 
                        <input id="observ" type="text" name="observ" required="required" style="height: 30px; margin-bottom: 2px; margin-top: 2px; width: 90%" placeholder="Observação:" >
                        <br> 
                        
                        <span class="btn btn-success"  name="enviar" style="margin-top: 2px; width: 44%; font-size: 60%" onclick="AtualizaAtestadoClinico()"> Atualizar </span>
                    
                        <span class="btn btn-danger" style="margin-top: 2px; width: 44%; font-size: 60%" onclick="fecharPopupAtestado()" > Cancelar</span>
                    
                        
                    </form>        
                </div>                
            </div>
            <div hidden id="divPopupAtestadoDerma" style="text-align-last: center; border-radius: 15px 15px 15px 15px"> 
                <div style="background-color: lightblue; text-align: center; padding: 0px; font-size: 13px; font-weight: bold; border-radius: 15px 15px 0px 0px; width: 100%;">
                    <div style="text-align-last: right; font-weight: bold; color: red; " onclick="fecharPopupAtestadoDerma()"> ( x ) &nbsp;&nbsp;
                    </div>  
                </div>
                <div style="background-color: lightblue; text-align: justify; padding: 5px; font-size: 12px; font-weight: bold; border-radius: 0px 0px 0px 0px  ; width: 100%;">
                    <p id="textConteudoAtestadoDerma"></p>
                </div> 
                <div style="text-align: center; padding: 5; width: 100%;">
                    <form id="formAtestadoDerma" method="get" style="height: 100%;"> 
                        <label style="font-weight: bold; font-size: 10px">Preencha os dados abaixo para atualizar o atestado dermatológico</label>
                        <input hidden id="conteudoAtestadoDermaId" name="idpess" type="text" required>
                        <input hidden id="iduserderma" name="iduserderma" type="text" value='<?php echo getUserId(); ?>' required>
                        <input id="dataderma" name="data" type="text" required="required" style="height: 30px; margin-bottom: 2px; width: 90%" placeholder="Somente números 00-00-0000">
                        <br> 
                        <input id="observderma" type="text" name="observderma" required="required" style="height: 30px; margin-bottom: 2px; margin-top: 2px; width: 90%;" placeholder="Observação:">
                        <br> 
                        
                        <span class="btn btn-success"  name="enviar" style="margin-top: 2px; width: 44%; font-size: 60%" onclick="AtualizaAtestadoDerma()"> Atualizar </span>
                        
                        <span class="btn btn-danger" style="margin-top: 2px; width: 44%; font-size: 60%" onclick="fecharPopupAtestadoDerma()"> Cancelar</span>
                    
                         
                    </form>          
                </div>           
            </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->




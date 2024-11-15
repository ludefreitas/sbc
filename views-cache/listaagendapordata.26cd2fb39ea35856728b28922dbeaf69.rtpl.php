<?php if(!class_exists('Rain\Tpl')){exit;}?>

<head>
    <!-- Required meta tags -->   
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="/../res/site/css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <title>Cursos Esportivos SBC</title>
    <link rel="icon" type="image/jpg" href="/../res/site/img/corpoacao.png" />
    
    <script type="text/javascript">

      /*
      alert('O PAR-q declarado pelo aluno já está disponível. Clique na palavra "PAR-q" para verificar as respostas do aluno e atente-se ao ícone de alerta que aparece logo ao lado da palavra, se existir. " ')
      */
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

                    let url = '/prof/saude/atulizaatestado/'+idpess+'/'+data+'/'+observ+'/'+iduser+''

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

            let url = '/prof/saude/atulizaatestadoderma/'+idpess+'/'+data+'/'+observ+'/'+iduser+''

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

        $(document).ready(function(){
            $('#data').mask('00-00-0000');
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

        function fecharPopupAtestado() {

            document.getElementById('divPopupAtestado').hidden = true 
            
            document.getElementById('conteudoAtestadoId').value = ''
            document.getElementById('data').value = ''
            document.getElementById('observ').value = ''
        }

        $(document).ready(function(){
            $('#dataderma').mask('00-00-0000');
        });

        function popupAtestadoDerma(idpess) {

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

        function fecharPopupAtestadoDerma() {

            document.getElementById('divPopupAtestadoDerma').hidden = true 
            
            document.getElementById('conteudoAtestadoDermaId').value = ''
            document.getElementById('dataderma').value = ''
            document.getElementById('observderma').value = ''
        }
      
      function dadosAtestado(idpess){

        let url = '/prof/saude/dadosatestado/'+idpess

        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url');        
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          if (window.confirm(' '+ result + 'Para atulizar atestado CLÍNICO clique em "OK"'))
          {
              adicionarAtestado(idpess)
          };

        });
      }
      
      function adicionarAtestado(idpess){
        
        //let confirmaAtestado = confirm('Já existe um atestado válido até:'+"\n"+'Deseja adicionar atestado? ')
        let confirmaAtestado = confirm('Deseja adicionar atestado CLÍNICO? ')

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
                        
                        var observ = prompt("Digite uma observação");
                        if (observ == null || observ == "") {
                                lert("As informaçãoes do atestado CLÍNICO não foram atualizadas! Informe a data e faça alguma observação");
                        } else {

                            let url = '/prof/saude/atulizaatestado/'+idpess+'/'+data+'/'+observ+''

                            atualizarAtestado(url) 

                        }     
                    }                           
                }
            }        
        }  
    }
     
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
      
      function dadosAtestadoDerma(idpess){

        let url = '/prof/saude/dadosatestadoderma/'+idpess

        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url');        
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          if (window.confirm(' '+ result + 'Para atulizar atestado DERMATOLÓGICO clique em "OK"'))
          {
              adicionarAtestadoDerma(idpess)
          };

        });
      }
      
      function adicionarAtestadoDerma(idpess){
        
        //let confirmaAtestado = confirm('Já existe um atestado válido até:'+"\n"+'Deseja adicionar atestado? ')
        let confirmaAtestado = confirm('Deseja adicionar atestado DERMATOLÓGICO dermatológico? ')

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
                        
                        var observ = prompt("Digite uma observação");
                        if (observ == null || observ == "") {
                                lert("As informaçãoes do atestado não foram atualizadas! Informe a data e faça alguma observação");
                        } else {

                            let url = '/prof/saude/atulizaatestadoderma/'+idpess+'/'+data+'/'+observ+''

                            atualizarAtestadoDerma(url) 

                        }     
                    }                           
                }
            }        
        }  
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
    </script>

    <style type="text/css">
      body {
          margin: 10px;
          padding: 20px;
      }

       #div1 {
          display: flex;
      }

      table {
          padding: 30px;
          border: 1px solid #000;
          flex-shrink:0;
         
      }
      tr:nth-child(even){
          background: lightgray;
      }
      
            #divcenterAtestado{
              
          }

          #divPopupAtestado{
            position: absolute;
            align-items: center; 
            justify-content: center; 
            top: 50%; 
            left: 50%; 
            top: 0; 
            bottom: 0;
            left: 0; 
            right: 0;
            margin-left: 150px;
            width: 80%;
            min-height: 200px;
            max-height: 350px;
            padding: 5px; 
            background-color: rgba(255, 165, 0, 1);
        }  

        #divPopupAtestadoDerma{
            position: absolute;
            align-items: center; 
            justify-content: center; 
            top: 50%; 
            left: 50%; 
            top: 0; 
            bottom: 0;
            left: 0; 
            right: 0;
            margin-left: 150px;
            width: 80%;
            min-height: 200px;
            max-height: 350px;
            padding: 5px; 
            background-color: rgba(255, 165, 0, 1);
        }  

    </style>
   

</head>


<div id="div1">  
    <a href="javascript:window.history.go(-1)">
        <i class="fa fa-arrow-left"></i> 
            Voltar
    </a> 
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
                        <input hidden id="iduser" name="iduser" type="text" value="<?php echo htmlspecialchars( $iduser, ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
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
                        <input hidden id="iduserderma" name="iduserderma" type="text" value="<?php echo htmlspecialchars( $iduser, ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                        <input id="dataderma" name="data" type="text" required="required" style="height: 30px; margin-bottom: 2px; width: 90%" placeholder="Somente números 00-00-0000">
                        <br> 
                        <input id="observderma" type="text" name="observderma" required="required" style="height: 30px; margin-bottom: 2px; margin-top: 2px; width: 90%;" placeholder="Observação:">
                        <br> 
                        
                        <span class="btn btn-success"  name="enviar" style="margin-top: 2px; width: 44%; font-size: 60%" onclick="AtualizaAtestadoDerma()"> Atualizar </span>
                        
                        <span class="btn btn-danger" style="margin-top: 2px; width: 44%; font-size: 60%" onclick="fecharPopupAtestadoDerma()"> Cancelar</span>
                    
                         
                    </form>          
                </div>           
            </div>

<!-- _________________________________GERAL________________________________ -->

<div id="div1">      
      <table>

          <?php if( $error != '' ){ ?>
          <tr>
            <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px; color: green;" colspan="12">
            <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
          </th>
          </tr>
          <?php } ?>

          <tr>
            <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;" colspan="12">
              Cursos esportivos SBC
            <h5 style="margin: 0 0 0 0">LISTA DA AGENDA DE NATAÇÃO ESPONTÂNEA (  <?php echo htmlspecialchars( $apelidolocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>  )
            <br>
            <?php echo formatDate($data); ?> <?php echo htmlspecialchars( $nomediadasemana, ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>
            </th>
          </tr>
          

          <tr>            
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Horário</th>
               <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">ID</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Nome</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Atestado <br>Clínico</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Atestado <br>Dermato</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">PAR-q</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Email</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Whats/Fone</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">CPF</th>
             

              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">DT Agendam.</th>

              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Compareceu?</th>
               <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Marcar <br>Presença</th>

              </tr>

              
          <?php $counter1=-1;  if( isset($agenda) && ( is_array($agenda) || $agenda instanceof Traversable ) && sizeof($agenda) ) foreach( $agenda as $key1 => $value1 ){ $counter1++; ?>
          
          <tr style="padding: 5px">
              <td style="text-align: center; border: solid 1px; padding: 5px;">
                <?php echo htmlspecialchars( $value1["horainicial"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $value1["horafinal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </td> 
              <td style="text-align: left; border: solid 1px; color: darkblue; padding: 5px;">
                <?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </td>
              <td style="text-align: left; border: solid 1px; color: darkblue; padding: 5px;">
                <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </td>
              <td style="text-align: left; border: solid 1px; color: darkblue; padding: 5px;">
                <span style="color: darkred; font-weight:">  
                  <?php echo getAtestadoClinicoProfExiste($value1["numcpf"], 1); ?>
                </span>
                &nbsp;
                <!--
                <a style="color: orange; text-align-last: right;" onclick="dadosAtestado(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"><?php echo getAtestadoIconeByNumCpf($value1["numcpf"]); ?></a>
            -->

                <a style="color: orange; text-align-last: right;" onclick="popupAtestado(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"><?php echo getAtestadoIconeByNumCpf($value1["numcpf"], $value1["idpess"]); ?>
                         </a>   

                          <br>                                                                   
              </td>              
              <td style="text-align: left; border: solid 1px; color: darkblue; padding: 5px;">
                <span style="color: darkred;">  
                <?php echo getAtestadoDermaProfExiste($value1["numcpf"], 2); ?>
               </span>
                &nbsp;
                <!--
                <a style="color: orange; text-align-last: right;" onclick="dadosAtestadoDerma(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"><?php echo getAtestadoDermaIconeByNumCpf($value1["numcpf"]); ?></a>
            -->

                <a style="color: orange; text-align-last: right;" onclick="popupAtestadoDerma(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"><?php echo getAtestadoDermaIconeByNumCpf($value1["numcpf"]); ?></a>
                          <br>                                                                   
              </td>
              <td style="text-align: left; border: solid 1px; color: darkblue; padding: 5px;">
                <?php if( existeParq($value1["idpess"]) ){ ?>
                  <?php if( repostaSimParq($value1["idpess"]) ){ ?>
                    <a style="font-weight: bold; color: green;" href="/prof/par-q/pessoa/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">  PAR-q <i style="color: orange;" class="fa fa-exclamation-triangle"> </i></a> 
                  <?php }else{ ?>
                    <a style="font-weight: bold; color: green;" href="/prof/par-q/pessoa/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> PAR-q </a> 
                  <?php } ?>
                <?php }else{ ?>
                  <a style="font-weight: bold; color: red;" onclick="alert('Não existe Par-q para este aluno')"> PAR-q </a> 
                <?php } ?>
              </td>
              <td style="text-align: left; border: solid 1px; color: darkblue; padding: 5px;">
                <?php echo htmlspecialchars( $value1["deslogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </td>
              <td style="text-align: left; border: solid 1px; color: darkblue; padding: 5px;">
                
                <a href="https://wa.me/+55<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá%20<?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>,%20tudo%20bem?!" target="_blank" onclick="return confirm('Você será direcionado para o whatsapp com a msg de saudação')"><i></i><?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
              </td>
              <td style="text-align: center; border: solid 1px; padding: 5px;">
                <?php echo formatCpf($value1["numcpf"]); ?>
              </td>
              <td style="text-align: center; border: solid 1px; padding: 5px;">
                <?php echo formatDateHour($value1["dtagenda"]); ?>
              </td>
              <?php if( $value1["ispresente"] == 0 ){ ?>
                <td style="text-align: center; border: solid 1px; padding: 5px;"> 
                  <span style="color: red"> X </span>
              <?php }else{ ?>
                <td style="text-align: center; border: solid 1px;  padding: 5px;">     
                  <span style="color: green;"><i class="fa fa-check"></i></span>
              <?php } ?>           
              </td>

              <td style="text-align: center; border: solid 1px; padding: 5px;">
                <?php if( $data > $value1["dia"] OR $value1["ispresente"] == 1 ){ ?>

                <?php }else{ ?>
                <a href="/prof/agendamarcarpresenca/<?php echo htmlspecialchars( $value1["idagen"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-success">
                <i class="fa fa-check"></i>
                </a>

                <?php } ?>
              </td>
              
              
          </tr>
          <?php }else{ ?>
          <tr style="font-weight: bold; color: red; font-size: 22px; text-align: center; padding: 10px;">
            <td colspan="12" style="padding: 10px">
              Não há horário agendado para natação espontânea nesta data !
            </td>
          </tr>
          <?php } ?>
          
      </table> 

</div>  


<div style="text-align-last: right;">
      <table style="border: none; text-align:">
        <tr>
          <td>
             <button type="button" onclick="window.print()" class="btn btn-primary pull-right" style="margin-right: 5px; margin-top: 5px">
                    <i class="fa fa-print"></i> Imprimir
              </button>
          </td>
        </tr>
      </table>

</div>






      
           
            
           
           
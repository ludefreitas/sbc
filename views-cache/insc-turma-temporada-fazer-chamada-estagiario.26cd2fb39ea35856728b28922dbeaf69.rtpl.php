<?php if(!class_exists('Rain\Tpl')){exit;}?>
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



                if (window.confirm(' '+ result + 'Para atualizar atestado CLÍNICO clique em "OK"'))
                {

                window.location.href = "/prof/saude/atualizaatestadoform/"+idpess+""
                //adicionarArtestado(idpess)

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
               window.location.href = "/prof/saude/atualizaatestadodermaform/"+idpess+""
              //adicionarArtestadoDerma(idpess)
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
      
      function requisitarPaginaPresente(url){

        let ajax = new XMLHttpRequest();
        idurl = url.substr(51);                
        ajax.open('GET', 'url');        
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          if(result){            
            //document.getElementById('spanpresente'+idurl).hidden = false
            //document.getElementById('spanausente'+idurl).hidden = true
            //document.getElementById('spanjustificar'+idurl).hidden = true
            //document.getElementById('spantraco'+idurl).hidden = true
          }else{
            alert('Não foi possível marcar presença')
          }

        });
      }

      function requisitarPaginaAusente(url){

        let ajax = new XMLHttpRequest();
        let idurl = url.substr(50);          
        ajax.open('GET', 'url');

        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          if(result){            
            //document.getElementById('spanausente'+idurl ).hidden = false  
            //document.getElementById('spanpresente'+idurl ).hidden = true
            //document.getElementById('spanjustificar'+idurl ).hidden = true
            //document.getElementById('spantraco'+idurl ).hidden = true
          }else{
            alert('Não foi possível marcar presença')
          }
        });
      }

      function requisitarPaginaJustificar(url){

        let ajax = new XMLHttpRequest();
        let idurl = url.substr(53);              
        ajax.open('GET', 'url');
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          if(result){              
            
            //document.getElementById('spanjustificar'+idurl ).hidden = false       
            //document.getElementById('spanausente'+idurl ).hidden = true  
            //document.getElementById('spanpresente'+idurl ).hidden = true
            //document.getElementById('spantraco'+idurl ).hidden = true
          }else{
            alert('Não foi possível marcar presença')
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

    function openDivMatrSusp(){
              
        document.getElementById('matrSusp').hidden = false  
        document.getElementById('btnMatrSuspOpen').hidden = true
        document.getElementById('btnMatrSuspClose').hidden = false      
    }

    function closeDivMatrSusp(){
              
        document.getElementById('matrSusp').hidden = true  
        document.getElementById('btnMatrSuspOpen').hidden = false
        document.getElementById('btnMatrSuspClose').hidden = true      
    }  

    function openDivExclFalta(){
              
        document.getElementById('exclFalta').hidden = false  
        document.getElementById('btnExclFaltaOpen').hidden = true
        document.getElementById('btnExclFaltaClose').hidden = false      
    }

    function closeDivExclFalta(){
              
        document.getElementById('exclFalta').hidden = true  
        document.getElementById('btnExclFaltaOpen').hidden = false
        document.getElementById('btnExclFaltaClose').hidden = true      
    }

    </script>

    <style type="text/css">

      table {          
          
          font-size: 8px; /* diminua um pouco a fonte na hora da impressão */
          border: 1px solid #000;
          flex-shrink:0;
          page-break-inside: avoid; 
      }
      tr:nth-child(even){
          background: lightgray;
      }    

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

    #divSupDir {
        
    }

    </style>
</head>
            <hr>

            <div class="container">

              <div style="text-align-last: left; margin-right: 25px; margin-top: 10px; margin-bottom: 15px;">
                <div id="div1">  
                    <a href="javascript:window.history.go(-1)">
                       <i class="fa fa-arrow-left"></i> 
                        Voltar
                    </a> 
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="/prof-estagiario">
                        <i class="fa fa-home"></i> 
                            Início
                    </a>  
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div style="text-align-last: center;">        
                    <span style="font-weight: bold;"><?php echo htmlspecialchars( $turma["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> &nbsp;  - </span> &nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars( $turma["nomelocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>                   
                  </div>                  
                </div>                
              </div>

             <div class="row" style="margin-right: 0px; font-size: 14px">
                <div class="col-md-12">
                  <div class="row">

                     <div class="col-md-6" style="border: 1px solid black; text-align: center; " >
                      <div class="row">
                          <div class="col-md-12" style="background-color: #ccc; font-weight: bold; ">
                            Curso
                          </div>                          
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                          </div>                          
                        </div>                       
                      </div>

                      <div class="col-md-6" style="border: 1px solid black; text-align: center; " >
                      <div class="row">
                          <div class="col-md-12" style="background-color: #ccc; font-weight: bold;">
                           Dia da Semana / horário
                          </div>                          
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <?php echo htmlspecialchars( $turma["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  das <?php echo htmlspecialchars( $turma["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $turma["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  
                          </div>                          
                        </div>                       
                      </div>                      
                    </div>
                </div>
              </div>

              <div class="row" style="margin-right: 0px; font-size: 14px">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12" style="border: 1px solid black; margin: 0; padding: 0; text-align: center; font-weight: bold; background-color: #ccc;" >
                          <div class="col-md-12">

                             <?php echo FormatDate($data); ?> - <?php echo htmlspecialchars( $nomediasemana, ENT_COMPAT, 'UTF-8', FALSE ); ?>

                          </div>   
                    </div>
                  </div>                
                </div>
              </div>

              <div class="row" style="margin-right: 0px; font-size: 14px">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12" style="border: 1px solid black; margin: 0; padding: 0; text-align: center; font-weight: bold;" >
                          <div class="col-md-12">
                             NOME DO ALUNO
                          </div>   
                    </div>
                  </div>                
                </div>
              </div>

              <div class="row" style="margin-right: 0px; font-size: 14px">
                <?php $counter1=-1;  if( isset($insc) && ( is_array($insc) || $insc instanceof Traversable ) && sizeof($insc) ) foreach( $insc as $key1 => $value1 ){ $counter1++; ?>
                <?php echo getAtestadoColorDivCpf($value1["numcpf"]); ?>
                  <div class="row">                     
                    <div class="col-md-12" style="border: 1px solid black;">                        
                      <div class="row" style="position: relative;">  
                        <div class="col-md-12" style="margin: 5 0 5 0; text-align: left; font-weight: bold;">

                          <?php if( !isset($value1["statuspresenca"]) ){ ?>

                                <?php $value1["statuspresenca"] = 4; ?>

                           <?php }else{ ?>

                                <?php $value1["statuspresenca"] = $value1["statuspresenca"]; ?>

                          <?php } ?>

                          <?php if( $value1["statuspresenca"] == 1 ){ ?>
                          <span hidden id="spantraco<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="">( - )</span>
                          <span id="spanpresente<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">( <i class="fa fa-check" style="color: green;"></i> )</span>
                          <span hidden id="spanausente<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: red;">( X )</span>    
                          <span hidden id="spanjustificar<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: blue;">( J )</span>    

                          <?php } ?>

                          <?php if( $value1["statuspresenca"] == 0 ){ ?>
                          <span hidden id="spantraco<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="">( - )</span>
                          <span hidden id="spanpresente<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: green;">( <i class="fa fa-check"></i> )</span>
                          <span id="spanausente<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">(<span style="color: red;"> X </span>)</span>    
                          <span hidden id="spanjustificar<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">(<span style="color: blue;"> J </span>)</span>                     
                          
                          <?php } ?>

                          <?php if( $value1["statuspresenca"] == 2 ){ ?>
                          <span hidden id="spantraco<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="">( - )</span>
                          <span hidden id="spanpresente<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: green;">( <i class="fa fa-check"></i> )</span>
                          <span hidden id="spanausente<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: red;">( X )</span>    
                          <span id="spanjustificar<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">(<span style="color: blue;"> J </span>)</span>                     

                          <?php } ?>

                          <?php if( $value1["statuspresenca"] == 4 ){ ?>
                          <span id="spantraco<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="">( - )</span>
                          <span hidden id="spanpresente<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: green;">( <i class="fa fa-check"></i> )</span>
                          <span hidden id="spanausente<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: red;">( X )</span>    
                          <span hidden id="spanjustificar<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: blue;">( J )</span>                  
                          
                          <?php } ?>                       
                        

                          <!--
                           &nbsp;&nbsp;<?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> &nbsp;&nbsp; 
                           - &nbsp;
                         <a style="color: orange; text-align-last: right;" onclick="adicionarArtestado(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"><?php echo getAtestadoIcone($value1["idpess"]); ?></a>
                          <br><br>
                          -->
                           <?php if( $value1["data_mes_dia"] == $value1["mes_dia_niver"] ){ ?>
                                 &nbsp;&nbsp; 
                                <span style="font-weight: bold; color: blue;">
                               * <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, faz aniversário hoje; <?php echo htmlspecialchars( $value1["data_mes_dia"], ENT_COMPAT, 'UTF-8', FALSE ); ?> &nbsp;&nbsp; 
                                </span>
                                <?php }else{ ?>

                                &nbsp;
                               &nbsp;&nbsp;<?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> &nbsp;&nbsp; 
                                &nbsp;
                                <?php } ?>
                         <!--
                         <a style="color: orange; text-align-last: right;" onclick="dadosAtestado(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"><?php echo getAtestadoIcone($value1["idpess"]); ?></a>
                         -->

                         <br>
                          &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;

                        &nbsp;<span style="color: darkred; font-weight:">  
                        <?php echo getAtestadoClinicoProfExiste($value1["numcpf"], 1); ?>
                        </span>
                        &nbsp;

                       
                         <a style="color: orange; text-align-last: right;" onclick="popupAtestado(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"><?php echo getAtestadoIconeByNumCpf($value1["numcpf"]); ?></a>  


                          <!-- 
                         <a href="/prof/saude/atualizaatestadoform/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: orange; text-align-last: right;"><?php echo getAtestadoIconeByNumCpf($value1["numcpf"]); ?></a>

                         <a style="color: orange; text-align-last: right;" onclick="dadosAtestado(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"><?php echo getAtestadoIconeByNumCpf($value1["numcpf"]); ?>
                         </a> 

                         --> 
                         

                         &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                         <span style="color: darkred;">  
                         <?php echo getAtestadoDermaProfExiste($value1["numcpf"], 2); ?>
                          </span>

                        &nbsp; 
                        
                         <a style="color: orange; text-align-last: right;" onclick="popupAtestadoDerma(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"><?php echo getAtestadoDermaIconeByNumCpf($value1["numcpf"]); ?></a>
                         

                         <!--
                         <a href="/prof/saude/atualizaatestadodermaform/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: orange; text-align-last: right;"><?php echo getAtestadoDermaIconeByNumCpf($value1["numcpf"]); ?></a>
                                   
                          <a style="color: orange; text-align-last: right;" onclick="dadosAtestadoDerma(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"><?php echo getAtestadoDermaIconeByNumCpf($value1["numcpf"]); ?></a>

                          -->

                          <br>
                                 
                                  
                        <?php if( $value1["idinscstatus"] == 9 ){ ?>
                          <span style="color: red;">CANCELADA</span>
                          <?php }else{ ?>
                            <?php if( $value1["idinscstatus"] == 8 ){ ?>
                                <span style="color: red;">DESISTENTE</span>
                            <?php }else{ ?>
                             
                                     &nbsp;&nbsp;<input type="checkbox" id="<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onchange="requisitarPaginaPresente('/prof/insc-turma-temporada-presente/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')" name=""><label style="color: green;">Presente</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <!--
                                   <a class="presente" id="<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" href="#" onclick="requisitarPaginaPresente('/prof/insc-turma-temporada-presente/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')" style="color: green;">Presente?</i></a>&nbsp;&nbsp;&nbsp;&nbsp;                                 

                                  
                                  <a href="/prof/insc-turma-temporada-presente/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: green;">Presente?</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                -->
                                    <input type="checkbox" id="<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onchange="requisitarPaginaAusente('/prof/insc-turma-temporada-ausente/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')" name=""> <label style="color: red;">Ausente</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                  <!--
                                  <a class="ausente" id="<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" href="#" onclick="requisitarPaginaAusente('/prof/insc-turma-temporada-ausente/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')" style="color: red;">Ausente?</i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                
                                  <a href="/prof/insc-turma-temporada-ausente/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><span style="font-weight: bold; margin: 0 3 0 3; color: red;">Ausente?</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                -->

                                <input type="checkbox" id="<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onchange="requisitarPaginaJustificar('/prof/insc-turma-temporada-justificar/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')" name=""><label style="color: blue;">Justificar</label>
                              
                                <!--
                                  <a class="justificar" id="<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" href="#" onclick="requisitarPaginaJustificar('/prof/insc-turma-temporada-justificar/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')" style="color: blue;">Justificar?</i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                
                                  <a href="/prof/insc-turma-temporada-justificar/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><span style="font-weight: bold; margin: 5 3 5 3; color: blue;"> Justificar? </span></a>&nbsp;&nbsp;&nbsp;&nbsp; 
                                -->
                              
                            <?php } ?>
                         <?php } ?>  

                        
                        </div>

                        <?php if( $value1["idinscstatus"] == 1 ){ ?>
                        <div id="divSupDir" class="btn" style="height: 30px; position: absolute; bottom: 0; right: 0; width: 70px; font-size: 9px; font-weight: bold;"> 
                            <span style="line-height: 10px;"> 
                            <!--    <a onclick="alterarStatusSuspender(<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">                                    Suspender <br> matrícula 
                               </a>  -->      
                            </span>
                        </div> 
                        <?php } ?>       
                      </div>      
                    </div>
                  </div>                  

                </div>

                <?php }else{ ?>
                <div class="col-md-12" style="font-weight: bold; color: red; font-size: 22px; text-align: center; ">
                  Não há pessoas matriculadas 
                </div>
                <?php } ?>

                <div id="btnMatrSuspOpen" class="container btn btn" style="border: black 1px solid;" onclick="openDivMatrSusp()">
                        <div class="row">
                            <div class="col-md-12">
                            <span style="font-weight: bold;"> Matrículas Suspensas <br> <i class="fa fa-caret-down"> </i> </span>
                            </div>
                        </div>
                </div>
                <div hidden id="btnMatrSuspClose" class="container btn btn" style="border: black 1px solid;" onclick="closeDivMatrSusp()">
                        <div class="row">
                            <div class="col-md-12">
                            <span style="font-weight: bold;"> Matrículas Suspensas <br> <i class="fa fa-caret-up"> </i></span>
                            </div>
                        </div>
                </div>

                <div class="container" hidden id="matrSusp">
                    <div class="row">
                <?php $counter1=-1;  if( isset($inscMatrSusp) && ( is_array($inscMatrSusp) || $inscMatrSusp instanceof Traversable ) && sizeof($inscMatrSusp) ) foreach( $inscMatrSusp as $key1 => $value1 ){ $counter1++; ?>
                <?php echo getAtestadoColorDivCpf($value1["numcpf"]); ?>

                  <div class="row">                     
                    <div class="col-md-12" style="border: 1px solid black;">                        
                      <div class="row" style="position: relative;">  
                        <div class="col-md-7" style="margin: 5 0 5 0; text-align: left; font-weight: bold;">

                              <?php if( !isset($value1["statuspresenca"]) ){ ?>

                                <?php $value1["statuspresenca"] = 4; ?>

                              <?php }else{ ?>

                                <?php $value1["statuspresenca"] = $value1["statuspresenca"]; ?>

                              <?php } ?>

                              <?php if( $value1["statuspresenca"] == 1 ){ ?>
                              <span hidden id="spantraco<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="">( - )</span>
                              <span id="spanpresente<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">( <i class="fa fa-check" style="color: green;"></i> )</span>
                              <span hidden id="spanausente<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: red;">( X )</span>    
                              <span hidden id="spanjustificar<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: blue;">( J )</span>    

                              <?php } ?>

                              <?php if( $value1["statuspresenca"] == 0 ){ ?>
                              <span hidden id="spantraco<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="">( - )</span>
                              <span hidden id="spanpresente<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: green;">( <i class="fa fa-check"></i> )</span>
                              <span id="spanausente<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">(<span style="color: red;"> X </span>)</span>    
                              <span hidden id="spanjustificar<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">(<span style="color: blue;"> J </span>)</span>                     
                              
                              <?php } ?>

                              <?php if( $value1["statuspresenca"] == 2 ){ ?>
                              <span hidden id="spantraco<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="">( - )</span>
                              <span hidden id="spanpresente<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: green;">( <i class="fa fa-check"></i> )</span>
                              <span hidden id="spanausente<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: red;">( X )</span>    
                              <span id="spanjustificar<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">(<span style="color: blue;"> J </span>)</span>                     

                              <?php } ?>

                              <?php if( $value1["statuspresenca"] == 4 ){ ?>
                              <span id="spantraco<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="">( - )</span>
                              <span hidden id="spanpresente<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: green;">( <i class="fa fa-check"></i> )</span>
                              <span hidden id="spanausente<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: red;">( X )</span>    
                              <span hidden id="spanjustificar<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: blue;">( J )</span>                  
                              
                              <?php } ?>                       
                            
                               &nbsp;&nbsp;<?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> &nbsp;&nbsp; 
                                &nbsp;


                        </div>

                        <?php if( $value1["idinscstatus"] == 5 ){ ?>
                            <div id="divSupDir" class="btn" style="height: 30px; position: absolute; bottom: 0; right: 0; width: 115px; font-size: 9px; font-weight: bold;"> 

                                        <span style="line-height: 10px; height: 20px; color: blue;"> 
                                          <!--  <a>
                                                <br>
                                                Rematricular 
                                            </a>  -->      
                                        </span> &nbsp;&nbsp; 

                                        <span style="line-height: 10px; height: 20px; color: red; right: 0;">       
                                         <!--   <a> Excluir &nbsp;&nbsp;&nbsp;&nbsp;
                                            </a>  -->
                                        </span>

                            </div> 
                        <?php } ?>

                      </div>      
                    </div>
                  </div>                  
                </div>

                <?php }else{ ?>
                <div class="col-md-12" style="border: 1px solid black;">                        
                      <div class="row" style="position: relative;">  
                        <div class="col-md-12" style="margin: 5 0 5 0; text-align: left; font-weight: bold; text-align: center; color: red;">
                                Não há matrículas suspensas 
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

        <div id="btnExclFaltaOpen" class="container btn btn" style="border: black 1px solid;" onclick="openDivExclFalta()">
                        <div class="row">
                            <div class="col-md-12">
                            <span style="font-weight: bold;"> Matrículas excluídas por falta <br> <i class="fa fa-caret-down"> </i></span>
                            </div>
                        </div>
                </div>
                <div hidden id="btnExclFaltaClose" class="container btn btn" style="border: black 1px solid;" onclick="closeDivExclFalta()">
                        <div class="row">
                            <div class="col-md-12">
                            <span style="font-weight: bold;"> Matrículas excluídas por falta <br> <i class="fa fa-caret-up"> </i></span>
                            </div>
                        </div>
                </div>

                <div hidden id="exclFalta" class="container">
                    <div class="row">

                <?php $counter1=-1;  if( isset($inscExclFalta) && ( is_array($inscExclFalta) || $inscExclFalta instanceof Traversable ) && sizeof($inscExclFalta) ) foreach( $inscExclFalta as $key1 => $value1 ){ $counter1++; ?>
                <?php echo getAtestadoColorDivCpf($value1["numcpf"]); ?>

                  <div class="row">                     
                    <div class="col-md-12" style="border: 1px solid black;">                        
                      <div class="row" style="position: relative;">  
                        <div class="col-md-7" style="margin: 5 0 5 0; text-align: left; font-weight: bold;">
                    
                               <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> &nbsp;&nbsp;<br><span style="color:red; font-size: 12px;">(Excluida por falta)</span>
                        </div>

                        <?php if( $value1["idinscstatus"] == 10 ){ ?>
                            <div id="divSupDir" class="btn" style="height: 30px; position: absolute; bottom: 0; right: 0; width: 115px; font-size: 9px; font-weight: bold;"> 

                                        <span style="line-height: 10px; height: 20px; color: blue;"> 
                                        <!--
                                            <a onclick="alterarStatusRematricular(<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">
                                                <br>
                                                Rematricular 
                                            </a>        
                                            -->
                                        </span> &nbsp;&nbsp; 

                            </div> 
                        <?php } ?>

                      </div>      
                    </div>
                  </div>                  
                </div>

                <?php }else{ ?>
                <div class="col-md-12" style="border: 1px solid black;">                        
                      <div class="row" style="position: relative;">  
                        <div class="col-md-12" style="margin: 5 0 5 0; text-align: left; font-weight: bold; text-align: center; color: red;">
                                Não há matrículas excluídas 
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            </div>

               <div class="col-md-12 btn btn-success" style="font-weight: bold; font-size: 16x; text-align: center; margin-top: 10px;">
                  <a style="color: white;" href="/estagiario/insc-turma-temporada-fazer-chamada/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $diasemana, ENT_COMPAT, 'UTF-8', FALSE ); ?>">Atualizar lista</a>
                </div>


                <div class="col-md-12 btn btn-info" style="font-weight: bold; font-size: 16x; text-align: center; ">
                  <a style="color: white;" href="/estagiario/insc-turma-temporada-mes-chamada-atualizada/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $mes, ENT_COMPAT, 'UTF-8', FALSE ); ?>">Lista de chamada do mês de <?php echo htmlspecialchars( $nomemes, ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
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
                        <input  id="iduser" name="iduser" type="text" value="<?php echo htmlspecialchars( $iduser, ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
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
                        <input  id="iduserderma" name="iduserderma" type="text" value="<?php echo htmlspecialchars( $iduser, ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                        <input id="dataderma" name="data" type="text" required="required" style="height: 30px; margin-bottom: 2px; width: 90%" placeholder="Somente números 00-00-0000">
                        <br> 
                        <input id="observderma" type="text" name="observderma" required="required" style="height: 30px; margin-bottom: 2px; margin-top: 2px; width: 90%;" placeholder="Observação:">
                        <br> 
                        
                        <span class="btn btn-success"  name="enviar" style="margin-top: 2px; width: 44%; font-size: 60%" onclick="AtualizaAtestadoDerma()"> Atualizar </span>
                        
                        <span class="btn btn-danger" style="margin-top: 2px; width: 44%; font-size: 60%" onclick="fecharPopupAtestadoDerma()"> Cancelar</span>
                    
                         
                    </form>          
                </div>           
            </div>
            

<hr>


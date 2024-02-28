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
    </style>
   

</head>


<div id="div1">  
    <a href="javascript:window.history.go(-1)">
        <i class="fa fa-arrow-left"></i> 
            Voltar
    </a> 
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
                <a style="color: orange; text-align-last: right;" onclick="dadosAtestado(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"><?php echo getAtestadoIconeByNumCpf($value1["numcpf"]); ?></a>
                          <br>                                                                   
              </td>
              
              <td style="text-align: left; border: solid 1px; color: darkblue; padding: 5px;">
                <span style="color: darkred;">  
                <?php echo getAtestadoDermaProfExiste($value1["numcpf"], 2); ?>
               </span>
                &nbsp;
                <a style="color: orange; text-align-last: right;" onclick="dadosAtestadoDerma(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"><?php echo getAtestadoDermaIconeByNumCpf($value1["numcpf"]); ?></a>
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
                <a href="/prof/agendamarcarpresenca/<?php echo htmlspecialchars( $value1["idagen"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-success">
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




      
           
            
           
           
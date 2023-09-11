<?php if(!class_exists('Rain\Tpl')){exit;}?><head>
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
    
    function dadosAtestado(idpess){
        
        let url = '/admin/saude/dadosatestado/'+idpess

        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url');        
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          if (window.confirm(' '+ result + 'Para atualizar atestado clique em "OK"'))
          {
              adicionarArtestado(idpess)
          };

        });
      }
    
    function adicionarArtestado(idpess){

        //let confirmaAtestado = confirm('Já existe um atestado válido até:'+"\n"+'Deseja adicionar atestado? ')
        let confirmaAtestado = confirm('Deseja realmente atualizar atestado? ')

        if(confirmaAtestado == true)
        {                      
            var data = prompt("Informe a data da emissão do Atestado. Ex.: dd-mm-aaaa");     

            if (data == null || data == "") {

                alert("As informaçãoes do atestado não foram atualizadas! Informe a data e faça alguma observação")
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
                                lert("As informaçãoes do atestado não foram atualizadas! Informe a data e faça alguma observação");
                        } else {

                            let url = '/admin/saude/atulizaatestado/'+idpess+'/'+data+'/'+observ+''

                            atualizarAtestado(url) 
                        }           
                    }                           
                }
            }        
        }  
        //let url = '/admin/saude/dadosatestado/'+idpess

        //dadosAtestado(url)  
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

    </style>
</head>




            <hr>

            <div class="container">

              <div style="text-align-last: left; margin-right: 25px; margin-top: -25px; margin-bottom: 15px;">
                <div id="div1">  
                    <a href="javascript:window.history.go(-1)">
                       <i class="fa fa-arrow-left"></i> 
                        Voltar
                    </a> 
                </div>
              </div>
              <div style="text-align-last: right; margin-right: 25px; margin-top: -25px; margin-bottom: 15px;">
                <div id="div2">  
                    <a href="/admin">
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

                             <?php echo FormatDate($data); ?> - Dia Semana

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
                <div class="col-md-12">
                  <div class="row">                     
                    <div class="col-md-12" style="border: 1px solid black;">                        
                      <div class="row">  
                        <div class="col-md-12" style="margin: 5 0 5 0; text-align: left; font-weight: bold;">

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
                           &nbsp;&nbsp;<?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> &nbsp;
                            - &nbsp;
                         <a style="color: orange; text-align-last: right;" onclick="adicionarArtestado(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"><?php echo getAtestadoIcone($value1["idpess"]); ?></a>
                          <br><br>
                          -->
                          &nbsp;&nbsp;<?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> &nbsp;
                            - &nbsp;
                        <!--    
                         <a style="color: orange; text-align-last: right;" onclick="dadosAtestado(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"><?php echo getAtestadoIcone($value1["idpess"]); ?></a>
                         -->
                         <a style="color: orange; text-align-last: right;" onclick="dadosAtestado(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"><?php echo getAtestadoIconeByNumCpf($value1["numcpf"]); ?></a>                     
                          <br><br>
                                                      
                                  
                        <?php if( $value1["idinscstatus"] == 9 ){ ?>
                          <span style="color: red;">CANCELADA</span>
                          <?php }else{ ?>
                            <?php if( $value1["idinscstatus"] == 8 ){ ?>
                                <span style="color: red;">DESISTENTE</span>
                            <?php }else{ ?>
                             
                                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onchange="requisitarPaginaPresente('/admin/insc-turma-temporada-presente/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')" name=""><label style="color: green;">Presente</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <!--
                                   <a class="presente" id="<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" href="#" onclick="requisitarPaginaPresente('/admin/insc-turma-temporada-presente/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')" style="color: green;">Presente?</i></a>&nbsp;&nbsp;&nbsp;&nbsp;                                 

                                  
                                  <a href="/admin/insc-turma-temporada-presente/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: green;">Presente?</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                -->
                                    <input type="checkbox" id="<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onchange="requisitarPaginaAusente('/admin/insc-turma-temporada-ausente/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')" name=""> <label style="color: red;">Ausente</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                  <!--
                                  <a class="ausente" id="<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" href="#" onclick="requisitarPaginaAusente('/admin/insc-turma-temporada-ausente/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')" style="color: red;">Ausente?</i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                
                                  <a href="/admin/insc-turma-temporada-ausente/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><span style="font-weight: bold; margin: 0 3 0 3; color: red;">Ausente?</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                -->

                                <input type="checkbox" id="<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onchange="requisitarPaginaJustificar('/admin/insc-turma-temporada-justificar/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')" name=""><label style="color: blue;">Justificar</label>
                              
                                <!--
                                  <a class="justificar" id="<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" href="#" onclick="requisitarPaginaJustificar('/admin/insc-turma-temporada-justificar/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')" style="color: blue;">Justificar?</i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                
                                  <a href="/admin/insc-turma-temporada-justificar/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><span style="font-weight: bold; margin: 5 3 5 3; color: blue;"> Justificar? </span></a>&nbsp;&nbsp;&nbsp;&nbsp; 
                                -->
                              
                            <?php } ?>
                         <?php } ?>  

                        </div>
                      </div>      
                    </div>
                  </div>                  

                </div>

                <?php }else{ ?>
                <div class="col-md-12" style="font-weight: bold; color: red; font-size: 22px; text-align: center; ">
                  Não há pessoas matriculadas 
                </div>
                <?php } ?>
                <div class="col-md-12 btn btn-info" style="font-weight: bold; font-size: 16px; text-align: center; ">
                  <a style="color: white;" href="/prof/insc-turma-temporada-mes-chamada-atualizada/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $mes, ENT_COMPAT, 'UTF-8', FALSE ); ?>">Lista de chamada do mês de <?php echo htmlspecialchars( $nomemes, ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
                </div>
                
                </div>              
             
                  
                </div>
                
              </div>
            

<hr>


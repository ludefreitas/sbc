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
      
      $(document).ready(function(){

        $('#presente').on("click", function(){

          let idtemporada = $("#idtemporada").val();
          let idturma = $("#idturma").val();
          let data = $("#data").val();
          let idinsc = $("#idinsc").val();

          // '/prof/insc-turma-temporada-presente/'+idtemporada+'/'+idturma+'/'+data+'/'+idinsc

          $.post('/prof/insc-turma-temporada-presente/'+idtemporada+'/'+idturma+'/'+data+'/'+idinsc);

          alert('/prof/insc-turma-temporada-presente/'+idtemporada+'/'+idturma+'/'+data+'/'+idinsc);

          // Criar inputs escondidos

          // Criar arquivo statuspresenca.php e statusausente.php 
          // ou fazer um if no arquivo para atualizar sem refresh

        });

        $('#ausente').on("click", function(){

          let idtemporada = $("#idtemporada").val();
          let idturma = $("#idturma").val();
          let data = $("#data").val();
          let idinsc = $("#idinsc").val();

          // '/prof/insc-turma-temporada-ausente/'+idtemporada+'/'+idturma+'/'+data+'/'+idinsc

          $.post('/prof/insc-turma-temporada-ausente/'+idtemporada+'/'+idturma+'/'+data+'/'+idinsc);

          alert('/prof/insc-turma-temporada-ausente/'+idtemporada+'/'+idturma+'/'+data+'/'+idinsc);

        });

        $('#justificar').on("click", function(){

           let idtemporada = $("#idtemporada").val();
          let idturma = $("#idturma").val();
          let data = $("#data").val();
          let idinsc = $("#idinsc").val();

          // '/prof/insc-turma-temporada-justificar/'+idtemporada+'/'+idturma+'/'+data+'/'+idinsc

          $.post('/prof/insc-turma-temporada-justificar/'+idtemporada+'/'+idturma+'/'+data+'/'+idinsc);

          alert('/prof/insc-turma-temporada-justificar/'+idtemporada+'/'+idturma+'/'+data+'/'+idinsc);



        });

      });

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

<tbody>
            <hr>

            <div class="container">

              <div style="text-align-last: right; margin-right: 25px; margin-top: -25px; margin-bottom: 15px;">
                <a href="/prof/calendario-lista-presenca/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                  <i class="fa fa-arrow-left"></i> 
                    Voltar
                </a> 
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
                        <div class="col-md-12" style="margin: 5 0 5 0; text-align: center; font-weight: bold;">

                          <?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  - 

                          <?php if( $value1["statuspresenca"] == 1 ){ ?>
                          <span style="color: green;">( <i class="fa fa-check"></i> )</span> 
                          <?php } ?>
                          <?php if( $value1["statuspresenca"] == 0 ){ ?>
                           <span style="color: red;">( X )</span>
                          <?php } ?>
                          <?php if( $value1["statuspresenca"] == 2 ){ ?>
                          <span style="color: blue;">( J )</span>
                          <?php } ?>
                          <?php if( $value1["statuspresenca"] == 4 ){ ?>
                          ( - )
                          <?php } ?>
                          <br>
                          
                          <?php if( $value1["idinscstatus"] == 9 ){ ?>
                          <span style="color: red;">CANCELADA</span>
                          <?php }else{ ?>
                            <?php if( $value1["idinscstatus"] == 8 ){ ?>
                                <span style="color: red;">DESISTENTE</span>
                            <?php }else{ ?>
                              <?php if( $value1["statuspresenca"] != 1 ){ ?>
                              <input hidden class="idtemporada" id="idtemporada" type="text" name="idtemporada" value="<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                              <input hidden class="idturma" id="idturma" type="text" name="idturma" value="<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                              <input hidden class="data" id="data" type="text" name="data" value="<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                              <input hidden class="idinsc" id="idinsc" type="text" name="idinsc" value="<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                                <!--
                                  <a class="presente" id="presente" href="/prof/insc-turma-temporada-presente/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: green;">Presente?</i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                -->
                                  <button class="presente" id="presente" style="color: green;">Presente?</i></button>&nbsp;&nbsp;&nbsp;&nbsp;
                              <?php } ?>                         
                          
                              <?php if( $value1["statuspresenca"] != 0 ){ ?>
                              <input hidden class="idtemporada" id="idtemporada" type="text" name="idtemporada" value="<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                              <input hidden class="idturma" id="idturma" type="text" name="idturma" value="<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                              <input hidden class="data" id="data" type="text" name="data" value="<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                              <input hidden class="idinsc" id="idinsc" type="text" name="idinsc" value="<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                  <!--
                                  <a class="ausente" id="ausente" href="/prof/insc-turma-temporada-ausente/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><span style="font-weight: bold; margin: 0 3 0 3; color: red;">Ausente?</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                  -->
                                  <button class="ausente" id="ausente"><span style="font-weight: bold; margin: 0 3 0 3; color: red;">Ausente?</span></button>&nbsp;&nbsp;&nbsp;&nbsp;

                              <?php } ?>

                              <?php if( $value1["statuspresenca"] != 2 ){ ?>

                              <input hidden class="idtemporada" id="idtemporada" type="text" name="idtemporada" value="<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                              <input hidden class="idturma" id="idturma" type="text" name="idturma" value="<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                              <input hidden class="data" id="data" type="text" name="data" value="<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                              <input hidden class="idinsc" id="idinsc" type="text" name="idinsc" value="<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                  <!--
                                  <a class="justificar" id="justificar" href="/prof/insc-turma-temporada-justificar/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><span style="font-weight: bold; margin: 5 3 5 3; color: blue;"> Justificar? </span></a>&nbsp;&nbsp;&nbsp;&nbsp; 
                                -->

                                  <button class="justificar" id="justificar"><span style="font-weight: bold; margin: 5 3 5 3; color: blue;"> Justificar? </span></button>&nbsp;&nbsp;&nbsp;&nbsp; 
                              <?php } ?>
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
                </div> 

                
              
             
                  
                </div>
                
              </div>
            </tbody>

<hr>

<thead>
<div class="container">

  <div class="row">

    <div class="col-md-3" style="text-align-last: center;">
      <div style="margin: 5px 10px 5px 10px; width: 100%">
        <img src="/../res/site/img/sbc.png" title="SecretariaDeEsportes" width="80">
         
      </div>
      
    </div>

    <div class="col-md-9">

      <div style="margin: 5px 10px 5px 10px; width: 100%">
        <br><br>
        <div style="text-align-last: center; font-weight: bold;">
        <h4>
          SECRETARIA DE ESPORTES    
        </h4>
       </div>
       <div style="text-align-last: left;">
        <span style="text-align: left;">
        Centro Esportivo: <span style="font-weight: bold;"><?php echo htmlspecialchars( $turma["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> &nbsp;  - </span> &nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars( $turma["nomelocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
        </span>
       </div>
      </div>

    </div>    
  </div>
  
</div>       
</thead>    
<tbody>


           
            <div class="container">

             <div class="row" style="margin-right: 0px; font-size: 14px">
                <div class="col-md-12">
                  <div class="row">

                     <div class="col-md-3" style="border: 1px solid black; text-align: center; " >
                      <div class="row">
                          <div class="col-md-12" style="background-color: #ccc; font-weight: bold; ">
                            Curso
                          </div>                          
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                          </div>                          
                        </div>
                       
                      </div>
                      
                      <div class="col-md-7" style="border: 1px solid black; text-align: center; " >
                      <div class="row">
                          <div class="col-md-12" style="background-color: #ccc; font-weight: bold; ">
                            Dia da Semana / horário
                          </div>                          
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <?php echo htmlspecialchars( $turma["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  das <?php echo htmlspecialchars( $turma["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $turma["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  
                          </div>                          
                        </div>
                       
                      </div>
                      <div class="col-md-2" style="border: 1px solid black; text-align: center; " >
                      <div class="row">
                          <div class="col-md-12" style="background-color: #ccc; font-weight: bold;">
                            Turma
                          </div>                          
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                          </div>                          
                        </div>
                       
                      </div>

                    </div>
                </div>
              </div>


              <div class="row" style="margin-right: 0px; font-size: 14px">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12" style="border: 1px solid black; margin: 0; padding: 0; text-align: center; font-weight: bold;" >
                   <table class="col-md-12">

                      <thead>   

                        <tr>
                          
                          <th colspan="12" style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;"><?php echo htmlspecialchars( $nomemes, ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $desctemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?> </th>
                        </tr>
                        <tr>
                          <th style="border: solid 1px; text-align: left; font-weight: bold; padding: 5px;">Nome do aluno </th>
                          <?php $counter1=-1;  if( isset($dias_do_mes) && ( is_array($dias_do_mes) || $dias_do_mes instanceof Traversable ) && sizeof($dias_do_mes) ) foreach( $dias_do_mes as $key1 => $value1 ){ $counter1++; ?>
                            <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;"><?php echo htmlspecialchars( $value1["dias"], ENT_COMPAT, 'UTF-8', FALSE ); ?></th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $counter1=-1;  if( isset($insc) && ( is_array($insc) || $insc instanceof Traversable ) && sizeof($insc) ) foreach( $insc as $key1 => $value1 ){ $counter1++; ?>

                        <?php $INSC = $value1["idinsc"]; ?>
                        <tr>
                            <td style="border: solid 1px; text-align: left; font-weight: bold; padding: 2px;"><?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </td>

                            <?php $counter2=-1;  if( isset($dias_do_mes) && ( is_array($dias_do_mes) || $dias_do_mes instanceof Traversable ) && sizeof($dias_do_mes) ) foreach( $dias_do_mes as $key2 => $value2 ){ $counter2++; ?>       
                            <td style="border: solid 1px; text-align: center; font-weight: bold; padding: 2px;">
                              <?php echo statusPresenca($value2["dias"], $mes, $INSC, $turma["idturma"], $idtemporada); ?>

                                </td>
                            <?php } ?>

                        </tr>
                        <?php } ?>
                      </tbody>                                   
                      
                    </table>  
                    </div>
                  </div>
                </div>
              </div>

              <div class="row" style="margin-right: 0px; font-size: 14px;">

                <div class="col-md-6" style="text-align: left;">       
                  <button type="button" onclick="window.print()" class="btn btn-primary pull-right" style="margin-right: 0px; margin-top: 5px">
                    <i class="fa fa-print"></i> Imprimir
                  </button> 
                </div> 

                <div class="col-md-6" style="text-align: right;">       
                  <div style="margin-right: 0px; margin-top: 0 px; margin-bottom: 0px;">
                    <a href="/prof/calendario-lista-presenca/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                  <i class="fa fa-arrow-left"></i> 
                    Voltar
                </a> 
                  </div>
                </div>                      
                  
              </div>
                
              </div>
            </tbody>
         
        
    



         
        
    



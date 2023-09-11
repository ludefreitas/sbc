<?php if(!class_exists('Rain\Tpl')){exit;}?><script type="text/javascript">


</script>

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
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="/admin">
                        <i class="fa fa-home"></i> 
                            Início
                    </a>  
                </div>
              </div>

              
                  
                </div>
                
              </div>
            


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
   

                        <tr>
                          
                          <th colspan="12" style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;"><?php echo htmlspecialchars( $nomemes, ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $desctemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?> </th>
                        </tr>
                        <tr>
                          <th style="border: solid 1px; text-align: left; font-weight: bold; padding: 5px;">Nome do aluno </th>
                          <?php $counter1=-1;  if( isset($dias_do_mes) && ( is_array($dias_do_mes) || $dias_do_mes instanceof Traversable ) && sizeof($dias_do_mes) ) foreach( $dias_do_mes as $key1 => $value1 ){ $counter1++; ?>
                            <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;"><?php echo htmlspecialchars( $value1["dias"], ENT_COMPAT, 'UTF-8', FALSE ); ?></th>
                          <?php } ?>
                        </tr>
                      
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
                                                         
                      
                    </table> 

                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  
                </div>
              </div>

              <div class="row" style="margin-right: 0px; font-size: 14px;">

                <div class="col-md-8" style="text-align: left;">

                    Lista chamada mês: &nbsp;&nbsp;&nbsp;
         <a href="/admin/insc-turma-temporada-mes-chamada-atualizada/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/01">01</a>&nbsp;&nbsp;&nbsp;
         <a href="/admin/insc-turma-temporada-mes-chamada-atualizada/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/02">02</a>&nbsp;&nbsp;&nbsp;
         <a href="/admin/insc-turma-temporada-mes-chamada-atualizada/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/03">03</a>&nbsp;&nbsp;&nbsp;
         <a href="/admin/insc-turma-temporada-mes-chamada-atualizada/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/04">04</a>&nbsp;&nbsp;&nbsp;
         <a href="/admin/insc-turma-temporada-mes-chamada-atualizada/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/05">05</a>&nbsp;&nbsp;&nbsp;
         <a href="/admin/insc-turma-temporada-mes-chamada-atualizada/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/06">06</a>&nbsp;&nbsp;&nbsp;
         <a href="/admin/insc-turma-temporada-mes-chamada-atualizada/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/07">07</a>&nbsp;&nbsp;&nbsp;
         <a href="/admin/insc-turma-temporada-mes-chamada-atualizada/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/08">08</a>&nbsp;&nbsp;&nbsp;
         <a href="/admin/insc-turma-temporada-mes-chamada-atualizada/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/09">09</a>&nbsp;&nbsp;&nbsp;
         <a href="/admin/insc-turma-temporada-mes-chamada-atualizada/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/10">10</a>&nbsp;&nbsp;&nbsp;
         <a href="/admin/insc-turma-temporada-mes-chamada-atualizada/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/11">11</a>&nbsp;&nbsp;&nbsp;
         <a href="/admin/insc-turma-temporada-mes-chamada-atualizada/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/12">12</a>&nbsp;&nbsp;&nbsp;
                  
                </div> 

                <div class="col-md-2" style="text-align: left;">       
                  <button type="button" onclick="window.print()" class="btn btn-primary pull-right" style="margin-right: 0px; margin-top: 5px">
                    <i class="fa fa-print"></i> Imprimir
                  </button> 
                </div> 

                <div class="col-md-2" style="text-align: right;">       
                  <div style="margin-right: 0px; margin-top: 5px; margin-bottom: 0px;">
                    <a class="btn btn-warning" href="/admin/calendario-lista-presenca/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                  <i class="fa fa-arrow-left"></i> 
                    Voltar
                </a> 
                  </div>
                </div>                      
                  
              </div>
                
              </div>
            
         
        
    



         
        
    



<?php if(!class_exists('Rain\Tpl')){exit;}?>
<php $x = 1; ?&gt;

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
      
      function alertTokenVunerabilidade(){

            alert("Pessoa em situação de vulnerabilidade social, é a pessoa que participa de programas sociais do governo, como por exemplo o Bolsa Família e que tem o cadastro no CadUnico/NIS com o respectivo número de inscrição. ")
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
            border: 1px solid #000;
            flex-shrink:0;
        }
    </style>


   



<hr>
<div id="div1" style="text-align: center;">
  <h4>
    Cursos Esportivos SBC
    <br>
    <span style="font-weight: bold">LISTA DE ESPERA</span>
    <br> <span style="font-weight: bold"><?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span> <?php echo htmlspecialchars( $turma["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  das <span style="font-weight: bold"><?php echo htmlspecialchars( $turma["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $turma["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  </span>
    <span style="font-weight: bold"> <?php echo htmlspecialchars( $turma["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  <br>
    Vagas Totais: <?php echo htmlspecialchars( $turma["vagas"]+$turma["vagaslaudo"]+$turma["vagaspcd"]+$turma["vagaspvs"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>      
  </h4>
</div>
<div id="div1">  
    <a href="javascript:window.history.go(-1)">
        <i class="fa fa-arrow-left"></i> 
            Voltar
    </a> 
</div>
<hr>


          <?php if( $error != '' ){ ?>
                <div id="div1" class="alert alert-danger" style="margin: 10px 10px 0px 10px">
            <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
          <?php } ?>
          <?php if( $success != '' ){ ?>
                <div id="div1" class="alert alert-success" style="margin: 10px 10px 0px 10px">
            <?php echo htmlspecialchars( $success, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
          <?php } ?>  

<!----------------------------------------PLM-------------------------------------------->


    

    <div id="div1">

      <table style="margin-bottom: 10px;">
          
          <tr rowspan="2">
            <th class="class1" style="border: solid 1px; text-align: center; font-weight: bold;">
              >>>
            </th>    
          </tr>
          <tr rowspan="2">
            <th class="class1" style="border: solid 1px; text-align: center;  background-color: yellow; font-size: 12px; font-weight: bold;">
              <br>ORDEM
            </th>    
          </tr>
          <?php $counter1=-1;  if( isset($inscCountPlm) && ( is_array($inscCountPlm) || $inscCountPlm instanceof Traversable ) && sizeof($inscCountPlm) ) foreach( $inscCountPlm as $key1 => $value1 ){ $counter1++; ?>
          
          

                  <tr style="background: linear-gradient(to bottom, rgba(96, 96, 192, 0.4), transparent);">
                      
                  <tr>
                  
              <td class="class1" style="text-align: center; border: solid 1px;">
              <?php echo htmlspecialchars( $value1["numordem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
            </td>
          </tr>
          <?php }else{ ?>
          <tr style="font-weight: bold; color: red; font-size: 22px; text-align: center; ">
            <td>       
            0
            </td>
          </tr>
          <?php } ?>        
      </table>
      <table>
          <tr>
              <td colspan="5" style="border: solid 1px; text-align: center;">
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 Lista de ESPERA de pessoas com laudo (indicação médica)
                 &nbsp;&nbsp;&nbsp;
              </td>
              
          </tr>

          <tr>
              <th style="border: solid 1px; text-align: center; font-size: 12px; font-weight: bold;">Numero de<br> sorteio</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold;">Nome</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold;">Lista</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold;">CPF</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold;">STATUS</th>
          </tr>
          <?php $counter1=-1;  if( isset($inscPlm) && ( is_array($inscPlm) || $inscPlm instanceof Traversable ) && sizeof($inscPlm) ) foreach( $inscPlm as $key1 => $value1 ){ $counter1++; ?>
          <?php if( getUserId() == $value1["iduser"] ){ ?>

                  <tr style="background: linear-gradient(to bottom, rgba(96, 96, 192, 0.4), transparent);">
                      <?php }else{ ?>
                  <tr>
                  <?php } ?>
              <td style="border: solid 1px; text-align: center;"><?php echo htmlspecialchars( $value1["numsorte"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
              <td style="border: solid 1px; text-align: left;"><?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
              <td style="text-align: center; border: solid 1px;"><?php if( $value1["inscpcd"] == 0 AND $value1["laudo"] == 0 AND $value1["vulnsocial"] == 0 ){ ?>
                            Geral
                        <?php }else{ ?>
                            <?php if( $value1["inscpcd"] == 1 AND ($value1["laudo"] == 0 OR $value1["laudo"] ==1 OR $value1["vulnsocial"] == 0 OR $value1["vulnsocial"] == 1) ){ ?>
                                PCD
                            <?php } ?>

                            <?php if( $value1["laudo"] == 1 AND $value1["inscpcd"] == 0 AND $value1["vulnsocial"] == 0 ){ ?>
                               PLM
                            <?php } ?>

                            <?php if( $value1["vulnsocial"] == 1 AND ($value1["laudo"] == 0 OR $value1["laudo"] == 1) AND $value1["inscpcd"] == 0 ){ ?>
                                PVS
                            <?php } ?>

                        <?php } ?>
              </td>
              <td style="text-align: center; border: solid 1px;"><?php echo formatCpf($value1["numcpf"]); ?></td>
              <td style="text-align: center; border: solid 1px; color: blue; font-weight: bold;">
                <?php if( $value1["idinscstatus"] == 3 ){ ?>
                  Matricular
                <?php } ?>
                <?php if( $value1["idinscstatus"] == 7 ){ ?>
                  Espera
                <?php } ?>
              </td>
              
          </tr>
          <?php }else{ ?>
          <tr style="font-weight: bold; color: red; font-size: 22px; text-align: center; ">
            <td colspan="5">
              Não há Lista de ESPERA para este grupo de pessoas!
            </td>
          </tr>
          <?php } ?>
          
      </table> 

</div>


<!----------------------------------------PCD-------------------------------------------->

    
    <div id="div1">

      <table style="margin-bottom: 10px;">
          
          <tr rowspan="2">
            <th class="class1" style="border: solid 1px; text-align: center; font-weight: bold;">
              >>>
            </th>    
          </tr>
          <tr rowspan="2">
            <th class="class1" style="border: solid 1px; text-align: center;  background-color: yellow; font-size: 12px; font-weight: bold;">
              <br>ORDEM
            </th>    
          </tr>
          <?php $counter1=-1;  if( isset($inscCountPcd) && ( is_array($inscCountPcd) || $inscCountPcd instanceof Traversable ) && sizeof($inscCountPcd) ) foreach( $inscCountPcd as $key1 => $value1 ){ $counter1++; ?>
          
          <tr>
              <td class="class1" style="text-align: center; border: solid 1px;">
              <?php echo htmlspecialchars( $value1["numordem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
            </td>
          </tr>
          <?php }else{ ?>
          <tr style="font-weight: bold; color: red; font-size: 22px; text-align: center; ">
            <td>     
            0
            </td>
          </tr>
          <?php } ?>        
      </table>


      <table id="table1">
        <tr>
              <td colspan="5" style="border: solid 1px; text-align: center;">
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 Lista de ESPERA de pessoas com deficiência
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </td>
              
          </tr>
          <tr>
              <th style="border: solid 1px; text-align: center; font-size: 12px; font-weight: bold;">Numero de<br> sorteio</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold;">Nome</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold;">Lista</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold;">CPF</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold;">STATUS</th>
          </tr>
          <?php $counter1=-1;  if( isset($inscPcd) && ( is_array($inscPcd) || $inscPcd instanceof Traversable ) && sizeof($inscPcd) ) foreach( $inscPcd as $key1 => $value1 ){ $counter1++; ?>
          <?php if( getUserId() == $value1["iduser"] ){ ?>

            <tr style="background: linear-gradient(to bottom, rgba(96, 96, 192, 0.4), transparent);">
                      <?php }else{ ?>
            <tr>
          <?php } ?>
              <td style="border: solid 1px; text-align: center;"><?php echo htmlspecialchars( $value1["numsorte"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
              <td style="border: solid 1px; text-align: left;"><?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
              <td style="text-align: center; border: solid 1px;"><?php if( $value1["inscpcd"] == 0 AND $value1["laudo"] == 0 AND $value1["vulnsocial"] == 0 ){ ?>
                            Geral
                        <?php }else{ ?>
                            <?php if( $value1["inscpcd"] == 1 AND ($value1["laudo"] == 0 OR $value1["laudo"] ==1 OR $value1["vulnsocial"] == 0 OR $value1["vulnsocial"] == 1) ){ ?>
                                PCD
                            <?php } ?>

                            <?php if( $value1["laudo"] == 1 AND $value1["inscpcd"] == 0 AND $value1["vulnsocial"] == 0 ){ ?>
                               PLM
                            <?php } ?>

                            <?php if( $value1["vulnsocial"] == 1 AND ($value1["laudo"] == 0 OR $value1["laudo"] == 1) AND $value1["inscpcd"] == 0 ){ ?>
                                PVS
                            <?php } ?>

                        <?php } ?>
              </td>
              <td style="text-align: center; border: solid 1px;"><?php echo formatCpf($value1["numcpf"]); ?></td>
              <td style="text-align: center; border: solid 1px; color: blue; font-weight: bold;">
                <?php if( $value1["idinscstatus"] == 3 ){ ?>
                  Matricular
                <?php } ?>
                <?php if( $value1["idinscstatus"] == 7 ){ ?>
                  Espera
                <?php } ?>
              </td>
              
          </tr>
          <?php }else{ ?>
          <tr style="font-weight: bold; color: red; font-size: 22px; text-align: center; ">
            <td colspan="5">
              Não há Lista de ESPERA para este grupo de pessoas!
            </td>
          </tr>
          <?php } ?>
          
      </table> 

</div>


<!----------------------------------------PVS-------------------------------------------->


<div id="div1">

      <table style="margin-bottom: 10px;">
          
          <tr rowspan="2">
            <th class="class1" style="border: solid 1px; text-align: center; font-weight: bold;">
              >>>
            </th>    
          </tr>
          <tr rowspan="2">
            <th class="class1" style="border: solid 1px; text-align: center;  background-color: yellow; font-size: 12px; font-weight: bold;">
              <br>ORDEM
            </th>    
          </tr>
          <?php $counter1=-1;  if( isset($inscCountPvs) && ( is_array($inscCountPvs) || $inscCountPvs instanceof Traversable ) && sizeof($inscCountPvs) ) foreach( $inscCountPvs as $key1 => $value1 ){ $counter1++; ?>
          
          <tr>
              <td class="class1" style="text-align: center; border: solid 1px;">
              <?php echo htmlspecialchars( $value1["numordem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
            </td>
          </tr>
          <?php }else{ ?>
          <tr style="font-weight: bold; color: red; font-size: 22px; text-align: center; ">
            <td>
              0
            </td>
          </tr>
          <?php } ?>        
      </table>


      <table id="table1">
        <tr>
              <td colspan="5" style="border: solid 1px; text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 Lista de ESPERA de pessoas em vulnerabilidade social 

                 <a href="#" onmousemove="alertTokenVunerabilidade()"><i class="fa fa-info-circle" style="font-size: 18px;"></i></a>

                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </td>
              
          </tr>
          <tr>
              <th style="border: solid 1px; text-align: center; font-size: 12px; font-weight: bold;">Numero de<br> sorteio</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold;">Nome</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold;">Lista</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold;">CPF</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold;">STATUS</th>
          </tr>
          <?php $counter1=-1;  if( isset($inscPvs) && ( is_array($inscPvs) || $inscPvs instanceof Traversable ) && sizeof($inscPvs) ) foreach( $inscPvs as $key1 => $value1 ){ $counter1++; ?>
          <?php if( getUserId() == $value1["iduser"] ){ ?>

            <tr style="background: linear-gradient(to bottom, rgba(96, 96, 192, 0.4), transparent);">
                      <?php }else{ ?>
            <tr>
          <?php } ?>
              <td style="border: solid 1px; text-align: center;"><?php echo htmlspecialchars( $value1["numsorte"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
              <td style="border: solid 1px; text-align: left;"><?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
              <td style="text-align: center; border: solid 1px;"><?php if( $value1["inscpcd"] == 0 AND $value1["laudo"] == 0 AND $value1["vulnsocial"] == 0 ){ ?>
                            Geral
                        <?php }else{ ?>
                            <?php if( $value1["inscpcd"] == 1 AND ($value1["laudo"] == 0 OR $value1["laudo"] ==1 OR $value1["vulnsocial"] == 0 OR $value1["vulnsocial"] == 1) ){ ?>
                                PCD
                            <?php } ?>

                            <?php if( $value1["laudo"] == 1 AND $value1["inscpcd"] == 0 AND $value1["vulnsocial"] == 0 ){ ?>
                               PLM
                            <?php } ?>

                            <?php if( $value1["vulnsocial"] == 1 AND ($value1["laudo"] == 0 OR $value1["laudo"] == 1) AND $value1["inscpcd"] == 0 ){ ?>
                                PVS
                            <?php } ?>

                        <?php } ?>
              </td>
              <td style="text-align: center; border: solid 1px;"><?php echo formatCpf($value1["numcpf"]); ?></td>
              <td style="text-align: center; border: solid 1px; color: blue; font-weight: bold;">
                <?php if( $value1["idinscstatus"] == 3 ){ ?>
                  Matricular
                <?php } ?>
                <?php if( $value1["idinscstatus"] == 7 ){ ?>
                  Espera
                <?php } ?>
              </td>
              
          </tr>
          <?php }else{ ?>
          <tr style="font-weight: bold; color: red; font-size: 22px; text-align: center; ">
            <td colspan="5">
              Não há Lista de ESPERA para este grupo de pessoas!
            </td>
          </tr>
          <?php } ?>
          
      </table> 

</div>
<!----------------------------------------GERAL-------------------------------------------->


<div id="div1">

      <table style="margin-bottom: 10px;">
          
          <tr rowspan="2">
            <th class="class1" style="border: solid 1px; text-align: center; font-weight: bold;">
              >>>
            </th>    
          </tr>
          <tr rowspan="2">
            <th class="class1" style="border: solid 1px; text-align: center;  background-color: yellow; font-size: 12px; font-weight: bold;">
             <br>ORDEM
            </th>    
          </tr>
          <?php $counter1=-1;  if( isset($inscCountAmp) && ( is_array($inscCountAmp) || $inscCountAmp instanceof Traversable ) && sizeof($inscCountAmp) ) foreach( $inscCountAmp as $key1 => $value1 ){ $counter1++; ?>
          
          <tr>
              <td class="class1" style="text-align: center; border: solid 1px;">
              <?php echo htmlspecialchars( $value1["numordem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
            </td>
          </tr>
          <?php }else{ ?>
          <tr style="font-weight: bold; color: red; font-size: 22px; text-align: center; ">
            <td>   
            0
            </td>
          </tr>
          <?php } ?>        
      </table>


      <table id="table1">
        <tr>
              <td colspan="5" style="border: solid 1px; text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 Lista de ESPERA de pessoas ampla concorrência (GERAL)
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </td>
              
          </tr>
          <tr>
              <th style="border: solid 1px; text-align: center; font-size: 12px; font-weight: bold;">Numero de<br> sorteio</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold;">Nome</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold;">Lista</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold;">CPF</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold;">STATUS</th>
          </tr>
          <?php $counter1=-1;  if( isset($inscAmp) && ( is_array($inscAmp) || $inscAmp instanceof Traversable ) && sizeof($inscAmp) ) foreach( $inscAmp as $key1 => $value1 ){ $counter1++; ?>
          <?php if( getUserId() == $value1["iduser"] ){ ?>

            <tr style="background: linear-gradient(to bottom, rgba(96, 96, 192, 0.4), transparent);">
                      <?php }else{ ?>
            <tr>
          <?php } ?>
              <td style="border: solid 1px; text-align: center;"><?php echo htmlspecialchars( $value1["numsorte"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
              <td style="border: solid 1px; text-align: left;"><?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
              <td style="text-align: center; border: solid 1px;"><?php if( $value1["inscpcd"] == 0 AND $value1["laudo"] == 0 AND $value1["vulnsocial"] == 0 ){ ?>
                            Geral
                        <?php }else{ ?>
                            <?php if( $value1["inscpcd"] == 1 AND ($value1["laudo"] == 0 OR $value1["laudo"] ==1 OR $value1["vulnsocial"] == 0 OR $value1["vulnsocial"] == 1) ){ ?>
                                PCD
                            <?php } ?>

                            <?php if( $value1["laudo"] == 1 AND $value1["inscpcd"] == 0 AND $value1["vulnsocial"] == 0 ){ ?>
                               PLM
                            <?php } ?>

                            <?php if( $value1["vulnsocial"] == 1 AND ($value1["laudo"] == 0 OR $value1["laudo"] == 1) AND $value1["inscpcd"] == 0 ){ ?>
                                PVS
                            <?php } ?>

                        <?php } ?>
              </td>
              <td style="text-align: center; border: solid 1px;"><?php echo formatCpf($value1["numcpf"]); ?></td>
              <td style="text-align: center; border: solid 1px; color: blue; font-weight: bold;">
                <?php if( $value1["idinscstatus"] == 3 ){ ?>
                  Matricular
                <?php } ?>
                <?php if( $value1["idinscstatus"] == 7 ){ ?>
                  Espera
                <?php } ?>
              </td>
              
          </tr>
          <?php }else{ ?>
          <tr style="font-weight: bold; color: red; font-size: 22px; text-align: center; ">
            <td colspan="5">
              Não há Lista de ESPERA para este grupo de pessoas!
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




      
           
            
           
           
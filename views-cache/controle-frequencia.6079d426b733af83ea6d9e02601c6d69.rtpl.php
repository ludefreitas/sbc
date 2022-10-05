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

    <style type="text/css">
     
    @media print{

    @page{
        size: landscape;
    }

    #image-example{
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
    }

}
      /*
      @page land {
        size: landscape;
      }
        #landscape {
        page: land;
      }
      */

      body {
          margin: 10px;
          padding: 20px;
      }

       #div1 {
          display: flex;
      }

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
<div id="div1" style="text-align-last: center;">
  <h4>
    Cursos Esportivos SBC
    <br>
    <span style="font-weight: bold">CONTROLE DE FREQUÊNCIA TEMPORADA <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>
    <br> 
    <span style="font-weight: bold">   </span>
  </h4>
</div>
<div id="div1">  
    <a href="javascript:window.history.go(-1)">
        <i class="fa fa-arrow-left"></i> 
            Voltar
    </a> 
</div>
<hr>

<div id="div1">
      
      <table>        

          <?php if( $error != '' ){ ?>
          <tr>
            <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px; color: green;" colspan="8"><?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></th>
          </tr>
          <?php } ?>

          <thead>   

          <tr>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">ID</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">LOCAL</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">ESPAÇO</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">PROFESSOR</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">PROGRAMA</th>
        
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">MODALIDADE</th>

              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">DIAS</th>

              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">PERÍODO</th>

              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">HORÁRIO</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">IDADE</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">ORIGEM</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">VAGAS</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">MATR.</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">INSCR.</th> 
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">JAN</th>  
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">FEV</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">MAR</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">ABR</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">MAI</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">JUN</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">JUL</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">AGO</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">SET</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">OUT</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">NOV</th>
              </tr>
          </thead>
          <tbody>
          <?php $counter1=-1;  if( isset($turmas) && ( is_array($turmas) || $turmas instanceof Traversable ) && sizeof($turmas) ) foreach( $turmas as $key1 => $value1 ){ $counter1++; ?>
          <tr style="padding: 5px"> 
              <td style="text-align: center; border: solid 1px; padding: 5px;">
               <?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </td>                                      
              <td style="text-align: center; border: solid 1px; padding: 5px;">
               <?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </td>                         
              <td style="text-align: center; border: solid 1px; color: darkblue; padding: 5px;">
               <?php echo htmlspecialchars( $value1["descespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </td>
              <td style="text-align: center; border: solid 1px; padding: 5px;">
                <?php if( $value1["idperson"] == 7 ){ ?>
                SBC
                <?php }else{ ?>
               <?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
               <?php } ?>
              </td>              
              <td style="text-align: center; border: solid 1px; color: darkblue; padding: 5px;">
               <?php echo htmlspecialchars( $value1["prograativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </td>
              <td style="text-align: center; border: solid 1px; padding: 5px;">
               <?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </td>
              <td style="text-align: center; border: solid 1px; color: darkblue; padding: 5px;">
               <?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </td>
              <td style="text-align: center; border: solid 1px; padding: 5px;">
               <?php echo htmlspecialchars( $value1["periodo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </td> 
              <td style="text-align: center; border: solid 1px; color: darkblue; padding: 5px;">
               <?php echo htmlspecialchars( $value1["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $value1["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </td>
              <td style="text-align: center; border: solid 1px; padding: 5px;">
               <?php echo htmlspecialchars( $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> à <?php echo htmlspecialchars( $value1["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </td>              
              <td style="text-align: center; border: solid 1px; color: darkblue; padding: 5px;">
               <?php echo htmlspecialchars( $value1["origativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </td>
              <td style="text-align: center; border: solid 1px; padding: 5px;">
               <?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </td>
              <td style="text-align: center; border: solid 1px; padding: 5px;">
               <?php echo htmlspecialchars( $value1["nummatriculados"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </td>  
              <td style="text-align: center; border: solid 1px; color: darkblue; padding: 5px;">
               <?php echo ControleFrequenciaAnoAnt($value1["idturma"], $value1["idtemporada"], $value1["desctemporada"]); ?>
              </td> 
              <td style="text-align: center; border: solid 1px; padding: 5px;">                
                <?php echo ControleFrequenciaJan($value1["idturma"], $value1["idtemporada"], $value1["desctemporada"]); ?>     
              </td>             
              <td style="text-align: center; border: solid 1px; padding: 5px;">                
                <?php echo ControleFrequenciaFev($value1["idturma"], $value1["idtemporada"], $value1["desctemporada"]); ?>     
              </td>
              <td style="text-align: center; border: solid 1px; padding: 5px;">                
                <?php echo ControleFrequenciaMar($value1["idturma"], $value1["idtemporada"], $value1["desctemporada"]); ?>     
              </td>      
              <td style="text-align: center; border: solid 1px; padding: 5px;">                
                <?php echo ControleFrequenciaAbr($value1["idturma"], $value1["idtemporada"], $value1["desctemporada"]); ?>     
              </td> 
              <td style="text-align: center; border: solid 1px; padding: 5px;">                
                <?php echo ControleFrequenciaMai($value1["idturma"], $value1["idtemporada"], $value1["desctemporada"]); ?>     
              </td>     
              <td style="text-align: center; border: solid 1px; padding: 5px;">                
                <?php echo ControleFrequenciaJun($value1["idturma"], $value1["idtemporada"], $value1["desctemporada"]); ?>     
              </td>   
              <td style="text-align: center; border: solid 1px; padding: 5px;">                
                <?php echo ControleFrequenciaJul($value1["idturma"], $value1["idtemporada"], $value1["desctemporada"]); ?>     
              </td>    
              <td style="text-align: center; border: solid 1px; padding: 5px;">                
                <?php echo ControleFrequenciaAgo($value1["idturma"], $value1["idtemporada"], $value1["desctemporada"]); ?>     
              </td> 
              <td style="text-align: center; border: solid 1px; padding: 5px;">                
                <?php echo ControleFrequenciaSet($value1["idturma"], $value1["idtemporada"], $value1["desctemporada"]); ?>     
              </td> 
              <td style="text-align: center; border: solid 1px; padding: 5px;">                
                <?php echo ControleFrequenciaOut($value1["idturma"], $value1["idtemporada"], $value1["desctemporada"]); ?>     
              </td>   
              <td style="text-align: center; border: solid 1px; padding: 5px;">                
                <?php echo ControleFrequenciaNov($value1["idturma"], $value1["idtemporada"], $value1["desctemporada"]); ?>     
              </td>                                                                                     
          </tr>
          </tbody>
          <?php }else{ ?>
          <tr style="font-weight: bold; color: red; font-size: 22px; text-align: center; padding: 10px;">
            <td colspan="26" style="padding: 10px">
              Não há turmas relacionadas a esta temporada!
            </td>
          </tr>
          </tbody>
          <?php } ?>
          <tfoot>
            
          </tfoot>
          
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




      
           
            
           
           
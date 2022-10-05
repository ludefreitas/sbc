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

<!----------------------------------------GERAL-------------------------------------------->

<div id="div1">      
      <table>

          <?php if( $error != '' ){ ?>
          <tr>
            <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px; color: green;" colspan="7">
            <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
          </th>
          </tr>
          <?php } ?>

          <tr>
            <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px; " colspan="6"; >
              Cursos esportivos SBC
            <h5 style="margin: 0 0 0 0";>LISTA DA AGENDA DE NATAÇÃO ESPONTÂNEA (  <?php echo htmlspecialchars( $apelidolocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>  )
            <br>
            <?php echo formatDate($data); ?> <?php echo htmlspecialchars( $nomediadasemana, ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>
            </th>
          </tr>
          

          <tr>            
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Horário</th>

              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Nome</th>

              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Email</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Whats/Fone</th>

              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">CPF</th>
             

              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">DT Agendam.</th>

              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Compareceu?</th>
               <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Marcar <br>Presença</th>

              </tr>

              </tr>
          <?php $counter1=-1;  if( isset($agenda) && ( is_array($agenda) || $agenda instanceof Traversable ) && sizeof($agenda) ) foreach( $agenda as $key1 => $value1 ){ $counter1++; ?>
          
          <tr style="padding: 5px">
              <td style="text-align: center; border: solid 1px; padding: 5px;">
                <?php echo htmlspecialchars( $value1["horainicial"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $value1["horafinal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </td>              
              <td style="text-align: left; border: solid 1px; color: darkblue; padding: 5px;">
                <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
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
                <a href="/agendamarcarpresenca/<?php echo htmlspecialchars( $value1["idagen"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-success">
                <i class="fa fa-check"></i>
                </a>

                <?php } ?>
              </td>
              
              
          </tr>
          <?php }else{ ?>
          <tr style="font-weight: bold; color: red; font-size: 22px; text-align: center; padding: 10px;">
            <td colspan="7" style="padding: 10px">
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




      
           
            
           
           
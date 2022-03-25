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
</head>


<hr>


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
           
            
           
            <div class="container">
               <a href="javascript:window.history.go(-1)">
        <i class="fa fa-arrow-left"></i> 
            Voltar
    </a> 
              <div class="row" style="margin-right: 5px;">
                <div class="col-md-12">
                   <table style="width: 100%;">
                <thead style="font-weight: bold; font-style: italic; text-align: left;">
                  <tr style="background-color: #f8cbac">
                    <td style="font-weight: bold; text-align: center; font-size: 20px; padding-top: 10px; padding-bottom: 10px" colspan="8" >
                    INSCRIÇÕES REALIZADAS (Válidas) - <?php echo htmlspecialchars( $local["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </td>
                  </tr>
                  <tr style="font-size: 16px; background-color: #fff2cd;">
                    <td style="border: 1px solid;">
                      DATA E HORA
                      <span style="font-size: 10px;">(DD/MM/AAAA hh:mm:ss)</span>
                    </td>
                    <td style="border: 1px solid; text-align: center;">
                      NOME DO INTERESSADO
                    </td>
                    <td style="border: 1px solid; text-align: center;">
                      CPF
                    </td>
                    <td style="border: 1px solid; text-align: center;">
                      MODALIDADE
                    </td>
                     <td style="border: 1px solid; text-align: center;">
                      PERÍODO
                    </td>
                    <td style="border: 1px solid; text-align: center;">
                      DIAS
                    </td>
                    <td style="border: 1px solid; text-align: center;">
                      HORÁRIO
                    </td>
                    <td style="border: 1px solid; text-align: center; background-color: #00FF00;">
                      STATUS
                    </td>
                  </tr>
                  
                </thead>
                <tbody style="border: 1px solid lightblue;" >
                  <?php $counter1=-1;  if( isset($insc) && ( is_array($insc) || $insc instanceof Traversable ) && sizeof($insc) ) foreach( $insc as $key1 => $value1 ){ $counter1++; ?>
                      <?php if( getUserId() == $value1["iduser"] ){ ?>
                  <tr style="border: 1px solid lightblue; background: linear-gradient(to bottom, rgba(96, 96, 192, 0.4), transparent);">
                      <?php }else{ ?>
                  <tr style="border: 1px solid lightblue;">
                      <?php } ?>
                    <td style="width: 15%; font-weight: bold;">
                      <?php echo formatDateHour($value1["dtinsc"]); ?>
                    </td>
                    <td style="width: 25%; border: text-align: left;">
                      <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </td>
                    <td style="width: 15%; text-align: left; font-weight: bold;">
                      <?php echo formatCpf($value1["numcpf"]); ?>
                    </td>
                    <td style="width: 10%; text-align: left; font-weight: bold; text-align: center;">
                      <?php echo htmlspecialchars( $value1["descmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </td>
                    <td style="width: 10%; text-align: left; font-weight: bold; text-align: center;">
                      <?php echo htmlspecialchars( $value1["periodo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </td>
                    <td style="width: 10%; text-align: left; font-weight: bold; text-align: center;">
                      <?php if( $value1["diasemana"] == 'Segunda e Quarta' ){ ?>
                      2ª e 4ª
                      <?php } ?> 
                      <?php if( $value1["diasemana"] == 'Terça e Quinta' ){ ?>
                      3ª e 5ª
                      <?php } ?>  
                      <?php if( $value1["diasemana"] == 'Quarta e Sexta' ){ ?>
                      4ª e 6ª
                      <?php } ?> 

                      <?php if( $value1["diasemana"] == 'Segunda' ){ ?>
                      2ª
                      <?php } ?> 
                      <?php if( $value1["diasemana"] == 'Terça' ){ ?>
                      3ª
                      <?php } ?>                                                                               
                      <?php if( $value1["diasemana"] == 'Quarta' ){ ?>
                      4ª
                      <?php } ?>                                                                                 <?php if( $value1["diasemana"] == 'Quinta' ){ ?>
                      5ª
                      <?php } ?> 
                      <?php if( $value1["diasemana"] == 'Sexta' ){ ?>
                      6ª
                      <?php } ?>                                                               
                    </td>
                    <td style="width: 10%; text-align: left; font-weight: bold; text-align: center;">
                      <?php echo htmlspecialchars( $value1["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $value1["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </td>
                    <td style="width: 5%; text-align: center; font-weight: bold;">
                      OK
                    </td>
                  </tr>
                  <?php }else{ ?>

                  <tr style="font-weight: bold; color: red; font-size: 22px; text-align: center; ">
                    <td colspan="8">
                      Não há inscrições válidas para este Centro Esportivo!
                    </td>
                  </tr>

                  <?php } ?>

                  
                </tbody>
              </table>
               <button type="button" onclick="window.print()" class="btn btn-primary pull-right" style="margin-right: 5px; margin-top: 5px">
                    <i class="fa fa-print"></i> Imprimir
                </button>
             
                  
                </div>
                
              </div>
          </div>
        
    



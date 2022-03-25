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
<div style="text-align-last: center; margin: 5px 10px 5px 10px; width: 100%">
  <h4>
    Cursos Esportivos SBC
    <br>
   <!--  <span style="font-weight: bold">LISTA DE INSCRIÇÕES COM NÚMEROS PARA SORTEIO</span> -->
     <span style="font-weight: bold"><?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span> <?php echo htmlspecialchars( $turma["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  das <span style="font-weight: bold"><?php echo htmlspecialchars( $turma["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $turma["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  </span>
    <span style="font-weight: bold"> <?php echo htmlspecialchars( $turma["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  <br>
    <?php echo htmlspecialchars( $turma["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas</span>      
  </h4>
</div>
<div style="text-align-last: right; margin-right: 25px; margin-top: -25px; margin-bottom: -15px;">  
    <a href="javascript:window.history.go(-1)">
        <i class="fa fa-arrow-left"></i> 
            Voltar
    </a> 
</div>
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
              <div class="row" style="margin-right: 5px;">
                <div class="col-md-12">
                   <table style="width: 100%;">

                <thead style="font-weight: bold; font-style: italic; text-align: left;">
                 
                  
                </thead>

                <thead style="font-weight: bold; font-style: italic; text-align: left;">
                  <tr style="text-align: center; border: 1px solid lightcoral; font-weight: bold; background: linear-gradient(to bottom, rgba(96, 96, 96, 0.8), transparent); height: 35px;">
                    <td colspan="5">LISTA DE INSCRIÇÕES COM NÚMEROS PARA SORTEIO</td>
                  </tr>
                  
                </thead>
                  <thead style="font-weight: bold; font-style: italic; text-align: left;">
                  <tr>
                    <td style="border: 1px solid; text-align: center;">
                      Número para sorteio
                    </td>
                    <td style="border: 1px solid; text-align: center;">
                      Data e hora da inscrição
                    </td>
                    <td style="border: 1px solid;">
                      Nome
                    </td>
                    <td style="border: 1px solid; text-align: center;">
                      Lista
                    </td>
                    <td style="border: 1px solid; text-align: center;">
                      CPF
                    </td>
                  </tr>                  
                </thead>

                 <tbody style="border: 1px solid lightblue;" >
                  
                  <?php $counter1=-1;  if( isset($insc) && ( is_array($insc) || $insc instanceof Traversable ) && sizeof($insc) ) foreach( $insc as $key1 => $value1 ){ $counter1++; ?>
                      <?php if( getUserId() == $value1["iduser"] ){ ?>

                  <tr style="background: linear-gradient(to bottom, rgba(96, 96, 192, 0.4), transparent);">
                      <?php }else{ ?>
                  <tr>
                      <?php } ?>
                    <td style="width: 10%; text-align: center; color: blue; font-weight: bold">
                      <?php echo htmlspecialchars( $value1["numsorte"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </td>
                    <td style="width: 10%; font-weight: bold; text-align: center;">
                      <?php echo formatDateHour($value1["dtinsc"]); ?>
                    </td>
                    <td style="width: 40%; text-align: left;">
                      <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </td>
                    
                    <td style="width: 10%; color: green; text-align: center; font-weight: bold;">
                      <?php if( $value1["inscpcd"] == 0 AND $value1["laudo"] == 0 AND $value1["vulnsocial"] == 0 ){ ?>
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
                    <td style="width: 30%; text-align: center; font-weight: bold;">
                      <?php echo formatCpf($value1["numcpf"]); ?>
                    </td>
                  </tr>
                  <?php }else{ ?>

                  <tr style="font-weight: bold; color: red; font-size: 22px; text-align: center; ">
                    <td colspan="5">
                      Não há inscrições para sorteio neste grupo de pessoas!
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
        
    



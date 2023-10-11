<?php if(!class_exists('Rain\Tpl')){exit;}?><head>
    <!-- Required meta tags -->   
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />

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
     
      #image-example{
          position: absolute;
          top: 0;
          bottom: 0;
          left: 0;
          right: 0;
          margin: auto;
      }

      footer {
          visibility: hidden;
      }
      header {
          visibility: hidden;
      }
       
    }

    .div-center {
      padding: 20px;
      margin: 10px;
      border: solid 1px rgb(219, 219, 219);
    }


      body {
          margin: 10px;
          padding: 20px;
      }

       #div1 {
          display: flex;
      }    

      table{          
          
          font-size: 10px; 
          border: 1px solid #000;
          flex-shrink:0;
          page-break-inside: avoid; 
      }
      tr:nth-child(even){
          background: lightgray;
      }
      

    </style>

</head>

<header>
<div id="div1">  
    <a href="javascript:window.history.go(-1)">
        <i class="fa fa-arrow-left"></i> 
            Voltar
    </a> 
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="/prof">
        <i class="fa fa-home"></i> 
            Início
    </a>  
</div>
</header>


<div id="div1">

  <div class="div-center rounded">
   
        
      <table class="table table-bordered" id="table">
        
        <thead>
        <tr>
          <th colspan="7" style="border: solid 1px; text-align: left; font-weight: bold; padding: 5px;">  <h4 style="margin: 0 0 0 0">Lista de autorização para: <?php echo htmlspecialchars( $texto, ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>
            <h5 style="margin: 0 0 0 0"> Local: <?php echo htmlspecialchars( $destino, ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>
            <?php if( $diaUnico ){ ?>
            <h5 style="margin: 0 0 0 0"> Data: <?php echo htmlspecialchars( $datainicio, ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>
            <?php }else{ ?>
            <h6 style="margin: 0 0 0 0"> Data: <?php echo htmlspecialchars( $datainicio, ENT_COMPAT, 'UTF-8', FALSE ); ?> à <?php echo htmlspecialchars( $datatermino, ENT_COMPAT, 'UTF-8', FALSE ); ?></h6>
            <?php } ?>
          </th>
              <!--
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Nome</th>

              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">DT NASC</th>

              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Email</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Whats/Fone</th>

              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Responsável</th>
              
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Assinatura do responsável</th>

            -->
             
              
        </thead>
        <?php $counter1=-1;  if( isset($listapessoas) && ( is_array($listapessoas) || $listapessoas instanceof Traversable ) && sizeof($listapessoas) ) foreach( $listapessoas as $key1 => $value1 ){ $counter1++; ?>
        <tbody>
          <tr style="padding: 5px"> 
              <td style="text-align: center; border: solid 1px; padding: 5px; height: 30px;">
                <?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </td>              
              <td style="text-align: left; border: solid 1px; color: darkblue; padding: 5px; height: 30px;">
                <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </td>
              <td style="text-align: left; border: solid 1px; color: darkblue; padding: 5px; height: 30px;">
                <?php echo formatDate($value1["dtnasc"]); ?>
              </td>
              <td style="text-align: left; border: solid 1px; color: darkblue; padding: 5px; height: 30px;">
                <?php echo htmlspecialchars( $value1["deslogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </td>
              <td style="text-align: left; border: solid 1px; color: darkblue; padding: 5px; height: 30px;">                
                <?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </td>
              <td style="text-align: center; border: solid 1px; padding: 5px; height: 30px;">
                <?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </td>

              <td style="text-align: left; border: solid 1px; padding: 5px; height: 30px; vertical-align: bottom;">
                 _________________________________________________________
              </td> 
             
          </tr>
          
          </tbody>
          <?php }else{ ?>
          <tr style="font-weight: bold; color: red; font-size: 22px; text-align: center; padding: 10px;">
            <td colspan="26" style="padding: 10px">
              Não há turmas relacionadas a este local!
            </td>
          </tr>
          </tbody>
          <?php } ?>
          <tfoot>
          <tr style="font-weight: bold; font-size: 8px; text-align: center; padding: 10px;">
            <td colspan="7" style="padding: 10px">
              Ao assinar esta lista, eu autorizo o(a) menor, do qual seu nome também consta nesta lista, e que está sob minha responsabilidade, a participar do <?php echo htmlspecialchars( $texto, ENT_COMPAT, 'UTF-8', FALSE ); ?> em <?php echo htmlspecialchars( $destino, ENT_COMPAT, 'UTF-8', FALSE ); ?>, 
            <?php if( $diaUnico ){ ?>
             que acontecerá no dia <?php echo htmlspecialchars( $datainicio, ENT_COMPAT, 'UTF-8', FALSE ); ?>
            <?php }else{ ?>
             do dia <?php echo htmlspecialchars( $datainicio, ENT_COMPAT, 'UTF-8', FALSE ); ?> ao <?php echo htmlspecialchars( $datatermino, ENT_COMPAT, 'UTF-8', FALSE ); ?>
            <?php } ?>. E declaro ainda estar ciente das regras que regulam este evento para a participação do menor, das quais já fui informado(a) pelo professor responsável.
            </td>
          </tr>
          </tfoot>
        
      </table>

    </div>


</div>
<footer>
      
      <button onclick="window.print()" class="btn btn-primary" style="">
                    <i class="fa fa-print"></i> Imprimir
              </button>
</footer>






      
           
            
           
           
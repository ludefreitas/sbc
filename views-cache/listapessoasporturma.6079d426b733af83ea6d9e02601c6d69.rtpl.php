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

    .div-center {
      padding: 20px;
      margin: 10px;
      border: solid 1px rgb(219, 219, 219);
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
          
          font-size: 8px; 
          border: 1px solid #000;
          flex-shrink:0;
          page-break-inside: avoid; 
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
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="/prof">
        <i class="fa fa-home"></i> 
            Início
    </a>  
</div>
<hr>

</div>

<hr>

<div id="div1">

  <div class="div-center rounded">
    <h5 style="margin: 0 0 0 0";>Lista de alunos <br> Turma: [<?php echo htmlspecialchars( $idturma, ENT_COMPAT, 'UTF-8', FALSE ); ?>] - <?php echo htmlspecialchars( $descturma, ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>
    <h5 id="title" hidden><?php echo htmlspecialchars( $descturma, ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>  
        
      <table class="table table-bordered" id="table">
        
        <thead>
          <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">ID</th>

              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Nome</th>

              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">DT NASC</th>

              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Email</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Whats/Fone</th>

              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Responsável</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Insc. status</th>

              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">CPF</th>
             
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Endereço</th>

              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Contato</th>

              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Tel. Emergência</th>
              </tr>
        </thead>
        <?php $counter1=-1;  if( isset($listapessoas) && ( is_array($listapessoas) || $listapessoas instanceof Traversable ) && sizeof($listapessoas) ) foreach( $listapessoas as $key1 => $value1 ){ $counter1++; ?>
        <tbody>
          <tr style="padding: 5px"> 
              <td style="text-align: center; border: solid 1px; padding: 5px;">
                <?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </td>              
              <td style="text-align: left; border: solid 1px; color: darkblue; padding: 5px;">
                <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </td>
              <td style="text-align: left; border: solid 1px; color: darkblue; padding: 5px;">
                <?php echo formatDate($value1["dtnasc"]); ?>
              </td>
              <td style="text-align: left; border: solid 1px; color: darkblue; padding: 5px;">
                <?php echo htmlspecialchars( $value1["deslogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </td>
              <td style="text-align: left; border: solid 1px; color: darkblue; padding: 5px;">
                
                <a href="https://wa.me/+55<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá%20<?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>,%20tudo%20bem?!" target="_blank" onclick="return confirm('Você será direcionado para o whatsapp com a msg de saudação')"><i></i><?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
              </td>
              <td style="text-align: center; border: solid 1px; padding: 5px;">
                <?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </td>
              <td style="text-align: center; border: solid 1px; padding: 5px;">                
                <?php if( $value1["idinscstatus"] == 1 ){ ?>
                  <span style="color: black;"> Matriculada </span>
                <?php } ?>                
                <?php if( $value1["idinscstatus"] == 2 ){ ?>
                  <span style="color: darkgreen;"> Aguard. Matrícula </span>
                <?php } ?>
                <?php if( $value1["idinscstatus"] == 7 ){ ?>
                  <span style="color: darkblue;"> Lista Espera </span>
                <?php } ?>                
                <?php if( $value1["idinscstatus"] == 9 ){ ?>
                  <span style="color: red;"> Cancelada </span>
                <?php } ?>                
              </td>
              <td style="text-align: center; border: solid 1px; padding: 5px;">
                <?php echo formatCpf($value1["numcpf"]); ?>
              </td>
              <td style="text-align: left; border: solid 1px; padding: 5px;">
                 <?php echo htmlspecialchars( $value1["cep"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["complemento"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </td> 
              <td style="text-align: center; border: solid 1px; padding: 5px;">
                <?php echo htmlspecialchars( $value1["contato"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </td>
              <td style="text-align: center; border: solid 1px; padding: 5px;">
                <?php echo htmlspecialchars( $value1["telemer"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
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
        </tbody>
      </table>

      <button
        class="btn btn-primary"
        id="export-button"
        onclick="exportTableToXLS()"
      >
        Exportar para XLS
      </button>

      <button onclick="window.print()" class="btn btn-primary" style="">
                    <i class="fa fa-print"></i> Imprimir
              </button>
    </div>

</div>

<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <script type="text/javascript">
      
      function exportTableToXLS() {

        const table = document.getElementById("table");
        const tableRows = table.getElementsByTagName("tr");
        const columnCount = tableRows[0].children.length;

        const worksheet = XLSX.utils.table_to_sheet(table);

        const workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(
          workbook,
          worksheet,
          document.getElementById("title").textContent
        );

        const fileName = document.getElementById("title").textContent+".xlsx";

        XLSX.writeFile(workbook, fileName);
      }


    </script>





      
           
            
           
           
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

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="/../res/site/css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <title>Cursos Esportivos SBC</title>
    <link rel="icon" type="image/jpg" href="/../res/site/img/corpoacao.png" />

    <script type="text/javascript">
      function exportTableToXML() {
        const table = document.getElementById("table");
        const xmlSerializer = new XMLSerializer();
        const tableRows = table.getElementsByTagName("tr");
        const columnCount = tableRows[0].children.length;

        let xml = '<?php echo '<?xml  version="1.0" encoding="UTF-8" ?>'; ?>\n';
        xml += "<table>\n";

        for (let i = 1; i < tableRows.length; i++) {
          xml += "  <row>\n";
          for (let j = 0; j < columnCount; j++) {
            const columnName = tableRows[0].children[j].textContent;
            const cellContent = tableRows[i].children[j].textContent;
            xml += `    <${columnName}>${cellContent}</${columnName}>\n`;
          }
          xml += "  </row>\n";
        }

        xml += "</table>";

        const blob = new Blob([xml], { type: "application/xml" });
        const url = URL.createObjectURL(blob);
        const link = document.createElement("a");
        link.href = url;
        const h3Element = document.getElementById("title_table");
        const h3Value = h3Element.textContent;
        link.download = h3Value + ".xml";
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
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
      <table class="table table-bordered" id="table">
          <tr>
            <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px; " colspan="10"; >
              Cursos esportivos SBC
            <h5 style="margin: 0 0 0 0"; id="title_table">Lista de alunos <br> Turma: [<?php echo htmlspecialchars( $idturma, ENT_COMPAT, 'UTF-8', FALSE ); ?>] - <?php echo htmlspecialchars( $descturma, ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>
            </th>
          </tr>     

          <tr>            
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">ID</th>

              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Nome</th>

              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Email</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Whats/Fone</th>

              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Responsável</th>
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Status</th>

              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">CPF</th>
             
              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Endereço</th>

              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Contato</th>

              <th style="border: solid 1px; text-align: center; font-weight: bold; padding: 5px;">Tel. Emergência</th>

              </tr>

              </tr>
          <?php $counter1=-1;  if( isset($listapessoas) && ( is_array($listapessoas) || $listapessoas instanceof Traversable ) && sizeof($listapessoas) ) foreach( $listapessoas as $key1 => $value1 ){ $counter1++; ?>
          
          <tr style="padding: 5px">
              <td style="text-align: center; border: solid 1px; padding: 5px;">
                <?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
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
                <?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </td>
              <td style="text-align: center; border: solid 1px; padding: 5px;">                
                <?php if( $value1["statuspessoa"] == 1 ){ ?>
                  <span style="color: darkblue;"> Ativo </span>
                <?php }else{ ?>
                  <span style="color: red;"> Inativo </span>
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
          <?php }else{ ?>
          <tr style="font-weight: bold; color: red; font-size: 22px; text-align: center; padding: 10px;">
            <td colspan="10" style="padding: 10px">
              Não há horário agendado para natação espontânea nesta data !
            </td>
          </tr>
          <?php } ?>
          
      </table> 

</div>


<div style="text-align-last: right;">

        <tr>
          <td>
             <button type="button" onclick="window.print()" class="btn btn-primary pull-right" style="margin-right: 5px; margin-top: 5px">
                    <i class="fa fa-print"></i> Imprimir
              </button> &nbsp; &nbsp;
              <button class="btn btn-primary pull-right" onclick="exportTableToXML()" style="margin-right: 5px; margin-top: 5px">
        Exportar Tabela para XML
      </button>
          </td>
        </tr>

</div>



      
           
            
           
           
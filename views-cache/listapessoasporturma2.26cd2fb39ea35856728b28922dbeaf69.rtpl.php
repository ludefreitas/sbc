<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
    <title>Exportar Tabela para XML</title>
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

        const blob = new Blob([xml], { type: "application/xls" });
        const url = URL.createObjectURL(blob);
        const link = document.createElement("a");
        link.href = url;
        const h3Element = document.getElementById("title_table");
        const h3Value = h3Element.textContent;
        link.download = h3Value + ".xls";
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
      }
    </script>

    <style type="text/css">
      body {
          margin: 5px;
          padding: 10px;
      }

      .div-center {
        width: 500px;
        padding: 20px;
        margin: 10px;
        border: solid 1px rgb(219, 219, 219);
      }

      table {
          padding: 10px;
          border: 1px solid #000;
          flex-shrink:0;
         
      }
      tr:nth-child(even){
          background: lightgray;
      }
    </style>
    
  </head>
  <body>
    <div class="div-center rounded">
      <h3 id="title_table">Lista de alunos <br> Turma: [<?php echo htmlspecialchars( $idturma, ENT_COMPAT, 'UTF-8', FALSE ); ?>] - <?php echo htmlspecialchars( $descturma, ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
      <table class="table table-bordered" id="table">
        <thead>
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
        </thead>
        <tbody>
          <?php $counter1=-1;  if( isset($listapessoas) && ( is_array($listapessoas) || $listapessoas instanceof Traversable ) && sizeof($listapessoas) ) foreach( $listapessoas as $key1 => $value1 ){ $counter1++; ?>
          <tr>
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
          <tr>
            <td colspan="10" style="padding: 10px">
              Não há horário agendado para natação espontânea nesta data !
            </td>
          </tr>
          <?php } ?>

        </tbody>
      </table>
      <button class="btn btn-primary" onclick="exportTableToXML()">
        Exportar Tabela para XML
      </button>
    </div>
    <script src="script.js"></script>
  </body>
</html>

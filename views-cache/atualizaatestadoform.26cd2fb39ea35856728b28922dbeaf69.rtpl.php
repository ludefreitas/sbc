<?php if(!class_exists('Rain\Tpl')){exit;}?>
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

        $(document).ready(function(){
            $('#data').mask('00-00-0000');
        });

        
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

    #divPopupAtestado{
        position: fixed;
        top: 0; 
        bottom: 0;
        left: 0; 
        right: 0;
        margin: auto;
        width: 50%;
        height: 200px;
        padding: 5px; 
        background-color: rgba(255, 165, 0, 1);
    }  

    #divPopupAtestadoDerma{
        position: fixed;
        top: 0; 
        bottom: 0;
        left: 0; 
        right: 0;
        margin: auto;
        width: 50%;
        height: 200px;
        padding: 5px; 
        background-color: rgba(255, 165, 0, 1);
    }  

    </style>
</head>

            <div class="container">

              <div style="text-align-last: left; margin-right: 25px; margin-top: 10px; margin-bottom: 15px;">
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
              </div>

              <div id="divPopupAtestado" style="text-align-last: center; border-radius: 15px 15px 15px 15px"> 

                <div style="text-align: center; padding: 5; width: 100%;">
                    <form id="formAtestado" method="post" style="height: 100%; margin-top: 20px" action="/prof/saude/atulizaatestado"> 
                        <label style="font-weight: bold; font-size: 10px">Preencha os dados abaixo para atualizar o atestado clínico</label>
                        <br>
                        <input hidden id="conteudoAtestadoId" name="idpess" type="text" value="<?php echo htmlspecialchars( $idpess, ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                        <input hidden id="iduser" name="iduser" type="text" value="{function='getUserId()'}" required>
                        <input id="data" name="data" type="text" required="required" style="height: 30px; margin-bottom: 2px; width: 90%" placeholder="Só números 00-00-0000">
                        <br> 
                        <input id="observ" type="text" name="observ" required="required" style="height: 30px; margin-bottom: 2px; margin-top: 2px; width: 90%" placeholder="Observação:" >
                        <br> 

                        <button class="btn btn-success"  name="enviar" style="margin-top: 2px; width: 44%; font-size: 60%" onclick="submit('formAtestado')"> Atualizar </button>
                       
                        <!--
                        <span class="btn btn-success"  name="enviar" style="margin-top: 2px; width: 44%; font-size: 60%" onclick="AtualizaAtestadoClinico()"> Atualizar </span>
                    -->
                    
                        <span class="btn btn-danger" style="margin-top: 2px; width: 44%; font-size: 60%" onclick="history.back()" > Cancelar</span>
                    
                        
                    </form>        
                </div>                
            </div>
            
            

<hr>


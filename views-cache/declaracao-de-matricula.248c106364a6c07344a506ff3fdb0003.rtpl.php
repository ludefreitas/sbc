<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> <title>Declaração</title>

    <script type="text/javascript">
        alert("Confira os dados da declaração a seguir, clique no botão imprimir, imprima e leve na próxima aula para o professor assinar.");
    </script>

    <style type="text/css">

        #img {
            grid-area: cabecalho;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-bottom: 10px;          
        }
        #secretaria {
            grid-area: cabecalho;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-bottom: 10px;          
        }

         #prefeitura {
            grid-area: cabecalho;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-bottom: 10px;          
        }

        #texto {
            grid-area: cabecalho;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-bottom: 10px;          
        }

        @media print{
            footer {
                visibility: hidden;
            }
        }
        
    </style>
</head>
<body>
<div style="padding-top: 20px;" class="container">  
    <div>
        <div class="row" style="margin-top: 50px"> 
            <div id="img" class="col-md-12"> 
                <img class="logo-sbc-chamada" src="http://cursosesportivossbc.com/res/site/img/sbc.png">            
            </div>            
        </div>

        <div class="row"> 
            <div id="prefeitura" style="text-align: center;" class="col-md-12">  
                <h6 class="">PREFEITURA DO MUNICÍPIO DE SÃO BERNARDO DO CAMPO</h6>
            </div>            
        </div>

        <div class="row"> 
            <div id="secretaria" style="text-align: center; color: gray;" class="col-md-12">  
                <h5 class="">Secretaria de Esporte e Lazer -  SESP</h5>
            </div>            
        </div>

        

        <div class="row" style="margin-top: 50px;"> 
            <div id="data" style="text-align: right;" class="col-md-12">  
                <h6>São Bernardo do Campo <?php echo htmlspecialchars( $diahoje, ENT_COMPAT, 'UTF-8', FALSE ); ?> de <?php echo htmlspecialchars( $nomemes, ENT_COMPAT, 'UTF-8', FALSE ); ?> de <?php echo htmlspecialchars( $anoatual, ENT_COMPAT, 'UTF-8', FALSE ); ?></h6>
            </div>            
        </div>

         <div class="row" style="margin-top: 50px;"> 
            <div id="tipo" style="text-align: center;" class="col-md-12">  
                <h3 class="">DECLARAÇÃO ALUNO</h3>
            </div>            
        </div>

        <div class="row" style="margin-top: 50px; padding-bottom: 50px;"> 
            <div id="texto" style="text-align: justify;" class="col-md-12">  
                <h7 class="">
                     Declaro para devidos fins que <span style="font-weight: bold;"><?php echo htmlspecialchars( $insc["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>,  </span> portador do CPF: <span style="font-weight: bold;"> <?php echo htmlspecialchars( $insc["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>   está matriculado nos cursos da Secretaria de Esportes e Lazer do município de São Bernardo do Campo, nas seguintes condições:
                </h7>
            </div>            
        </div>

        <div class="row" style="margin-top: 0px; padding-bottom: 50px;"> 
            <div id="curso" style="text-align: left;" class="col-md-12">  
                <h7 class="">
                    <span style="font-weight: bold;"> Curso: </span> <?php echo htmlspecialchars( $insc["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $insc["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    <br>
                    <span style="font-weight: bold;"> Local: </span> <?php echo htmlspecialchars( $insc["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $insc["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, nº <?php echo htmlspecialchars( $insc["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $insc["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>                  
                    <br>
                    <span style="font-weight: bold;"> Dias da semana:  </span> <?php echo htmlspecialchars( $insc["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> 
                    <br>
                    <span style="font-weight: bold;"> Horário:  </span>     <?php echo htmlspecialchars( $insc["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $insc["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>                  
                    <br>
                    <span style="font-weight: bold;"> Obs: </span>
                    Confirmar a frequência mensalmente com o professor(a) <?php echo htmlspecialchars( $apelidoperson, ENT_COMPAT, 'UTF-8', FALSE ); ?> no telefone <?php echo htmlspecialchars( $telefoneperson, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </h7>
            </div>            
        </div>

         <div class="row" style="margin-top: 50px; padding-bottom: 50px;"> 
            <div id="rodape" style="text-align: justify;" class="col-md-12">  
                <h7 class="">
                     Sendo o que se apresenta para o momento, subscrevemo-nos.                </h7>
            </div>            
        </div>
        <div class="row" style="margin-top: 50px; padding-bottom: 50px;"> 
            <div id="rodape" style="text-align: justify;" class="col-md-12">  
                <h7 class="">
                     Atenciosamente,
            </div>            
        </div>

        <div class="row" style="margin-top: 50px; padding-bottom: 50px;"> 
            <div id="rodape" style="text-align: center;" class="col-md-12">  
                <h7 class="">
                     _______________________________________________________________________
            </div>            
        </div>

        <div class="row"> 
            <div id="rodape" style="text-align: center; color: gray; margin-top: 250px; font-size: 12px" class="col-md-12">  
                <span>Avenida Kennedy nº 1155 - Bairro Anchieta - São Bernardo do Campo - SP</span>
                <br>
                <span>CEP 09726-263 &nbsp;&nbsp;&nbsp; telefone: 4126-5600 &nbsp;&nbsp;&nbsp;</span>
                <br>
                 <span>www.saobernardo.sp.gov.br &nbsp;&nbsp;&nbsp; sesp@saobernardo.sp.gov.br &nbsp;&nbsp;&nbsp;</span>
            </div>            
        </div>

        
        
    
                
    
</div>
</body>
<footer>
 <button type="button" onclick="window.print()" class="btn btn-primary pull-right" style="margin-right: 5px; margin-top: 5px">
                    <i class="fa fa-print"></i> Imprimir
        </button>
        
        <a class="btn btn-info"  href="javascript:window.history.go(-1)" style="margin-right: 5px; margin-top: 5px">
        <i class="fa fa-arrow-left"></i> 
            Voltar
        </a> 
</footer>
       
<style>
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    }
    table{
        width: 100%;
    }
    .logo-sbc-chamada{
        float: left;
        border: transparent thin solid;
        padding: 5px;
        margin: 0px 10px 10px 0;
        max-width: 60px;
    }
    .h1-chamada{
        font-size: 18px;
    }
</style>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>
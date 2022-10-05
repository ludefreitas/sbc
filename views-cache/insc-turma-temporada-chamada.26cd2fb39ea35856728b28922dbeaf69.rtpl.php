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
<div style="text-align-last: right; margin-right: 25px; margin-top: -25px; margin-bottom: -15px;">  
    <a href="javascript:window.history.go(-1)">
        <i class="fa fa-arrow-left"></i> 
            Voltar
    </a> 
</div>
<thead>
<div class="container">

  <div class="row">

    <div class="col-md-3" style="text-align-last: center;">
      <div style="margin: 5px 10px 5px 10px; width: 100%">
        <img src="/../res/site/img/sbc.png" title="SecretariaDeEsportes" width="80">
         
      </div>
      
    </div>

    <div class="col-md-9">

      <div style="margin: 5px 10px 5px 10px; width: 100%">
        <br><br>
        <div style="text-align-last: center; font-weight: bold;">
        <h4>
          SECRETARIA DE ESPORTES    
        </h4>
       </div>
       <div style="text-align-last: left;">
        <span style="text-align: left;">
        Centro Esportivo: <span style="font-weight: bold;"><?php echo htmlspecialchars( $turma["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> &nbsp;  - </span> &nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars( $turma["nomelocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
        </span>
       </div>
      </div>

    </div>    
  </div>
  
</div>       
</thead>    
<tbody>


           
            <div class="container">

             <div class="row" style="margin-right: 0px; font-size: 14px">
                <div class="col-md-12">
                  <div class="row">

                     <div class="col-md-2" style="border: 1px solid black; text-align: center; " >
                      <div class="row">
                          <div class="col-md-12" style="background-color: #ccc; font-weight: bold; ">
                            Curso
                          </div>                          
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                          </div>                          
                        </div>
                       
                      </div>

                      <div class="col-md-2" style="border: 1px solid black; text-align: center; " >
                      <div class="row">
                          <div class="col-md-12" style="background-color: #ccc; font-weight: bold;">
                            Professor / Instrutor
                          </div>                          
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            
                          </div>                          
                        </div>
                       
                      </div>
                      <div class="col-md-7" style="border: 1px solid black; text-align: center; " >
                      <div class="row">
                          <div class="col-md-12" style="background-color: #ccc; font-weight: bold; ">
                            Dia da Semana / horário
                          </div>                          
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <?php echo htmlspecialchars( $turma["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  das <?php echo htmlspecialchars( $turma["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $turma["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  
                          </div>                          
                        </div>
                       
                      </div>
                      <div class="col-md-1" style="border: 1px solid black; text-align: center; " >
                      <div class="row">
                          <div class="col-md-12" style="background-color: #ccc; font-weight: bold;">
                            Turma
                          </div>                          
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                          </div>                          
                        </div>
                       
                      </div>

                    </div>
                </div>
              </div>


              <div class="row" style="margin-right: 0px; font-size: 14px">
                <div class="col-md-12">
                  <div class="row">

                    <div class="col-md-4" style="border: 1px solid black; margin: 0; padding: 0; text-align: center; font-weight: bold;" >
                      <div class="row">
                          <div class="col-md-12" style="color: white;">
                            .
                          </div>                          
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                             NOME DO ALUNO
                          </div>                          
                        </div>
                       
                    </div>

                    <div class="col-md-4" style="border: 1px solid black; color: white; margin: 0; padding: 0">

                        <div class="row" style="border: 1px solid black; margin: 0; padding: 0">
                          <div class="col-md-12">
                            .
                          </div>                          
                        </div>

                        <div class="row" style="margin: 0; padding: 0">
                          
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; ">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; ">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; ">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; ">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; ">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; ">
                            .
                          </div>
                        </div> 

                    </div>

                    <div class="col-md-4" style="border: 1px solid black; color: white; margin: 0; padding: 0" >

                      <div class="row" style="border: 1px solid black; margin: 0; padding: 0">
                          <div class="col-md-12">
                            .
                          </div>                          
                        </div>

                        <div class="row" style="margin: 0; padding: 0">
                          
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; ">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; ">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; ">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; ">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; ">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; ">
                            .
                          </div>
                        </div>
                        
                    </div>
                  
                    
                  </div>                
                </div>
              </div>

              <div class="row" style="margin-right: 0px; font-size: 14px">
                <?php $counter1=-1;  if( isset($insc) && ( is_array($insc) || $insc instanceof Traversable ) && sizeof($insc) ) foreach( $insc as $key1 => $value1 ){ $counter1++; ?>
                <div class="col-md-12">

                  <div class="row"> 
                    
                    <div class="col-md-4" style="border: 1px solid black;">
                        
                      <div class="row">
                        
                        <div class="col-md-12">
                          <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> 
                            
                        </div>
                      </div>      
                    </div>

                    <div class="col-md-4">

                        <div class="row">
                          
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; background-color: #ccc;">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; background-color: #ccc;">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; background-color: #ccc;">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; background-color: #ccc;">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; background-color: #ccc;">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; background-color: #ccc;">
                            .
                          </div>
                        </div> 

                      </div>

                   <div class="col-md-4">

                        <div class="row" >
                          
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; background-color: #ccc;">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; background-color: #ccc;">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; background-color: #ccc;">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; background-color: #ccc;">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; background-color: #ccc;">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; background-color: #ccc;">
                            .
                          </div>
                        </div>   
                      </div>


                  </div>                  

                </div>

                <?php }else{ ?>
                <div class="col-md-12" style="font-weight: bold; color: red; font-size: 22px; text-align: center; ">
                  Não há pessoas matriculadas 
                </div>
                <?php } ?>

                <div class="col-md-12">

                  <div class="row"> 
                    
                    <div class="col-md-4" style="border: 1px solid black;">
                        
                     <div class="row">
                        <div class="col-md-1">
                         
                        </div>
                        <div class="col-md-10">
                          
                        </div>
                      </div>
                      
                     </div>

                    <div class="col-md-4">

                        <div class="row">
                          
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; background-color: #ccc;">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; background-color: #ccc;">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; background-color: #ccc;">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; background-color: #ccc;">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; background-color: #ccc;">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; background-color: #ccc;">
                            .
                          </div>
                        </div> 

                      </div>

                   <div class="col-md-4">

                        <div class="row" >
                          
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; background-color: #ccc;">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; background-color: #ccc;">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; background-color: #ccc;">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; background-color: #ccc;">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; background-color: #ccc;">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: white; margin: 0; padding: 0">
                            .
                          </div>
                          <div class="col-md-1" style="border: 1px solid black; color: #ccc; margin: 0; padding: 0; background-color: #ccc;">
                            .
                          </div>
                        </div>   
                      </div>


                  </div>                  

                </div> 

                
       
               <button type="button" onclick="window.print()" class="btn btn-primary pull-right" style="margin-right: 5px; margin-top: 5px">
                    <i class="fa fa-print"></i> Imprimir
                </button>
             
                  
                </div>
                
              </div>
            </tbody>
         
        
    



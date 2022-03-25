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
<br>
<br>
<br>
<div style="text-align-last: right; margin-right: 25px; margin-top: -25px; margin-bottom: -15px;">  
    <a href="javascript:window.history.go(-1)">
        <i class="fa fa-arrow-left"></i> 
            Voltar
    </a> 
</div>
<div style="text-align-last: center; margin: 5px 10px 5px 10px; width: 100%">
  <h4>
    Cursos Esportivos SBC    
  </h4>
</div>

<hr>
            <div class="container">
              <div class="row" style="border: solid 2px; font-size: 18px; margin-right: 5px;">

                <div class="col-md-12">
                  <?php echo htmlspecialchars( $turma["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br>
                  <span style="font-weight: bold">
                    [<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>]  <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>   &nbsp; &nbsp; 
                  </span>
                     <?php echo htmlspecialchars( $turma["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  das <?php echo htmlspecialchars( $turma["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $turma["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  
                </div>                            

              </div>
            </div>
           
            
           
            <div class="container">
              <div class="row" style="margin-right: 5px; font-size: 14px">
                <?php $counter1=-1;  if( isset($insc) && ( is_array($insc) || $insc instanceof Traversable ) && sizeof($insc) ) foreach( $insc as $key1 => $value1 ){ $counter1++; ?>
                <div class="col-md-8" style="border: 1px solid black;">

                  <div class="row"> 

                    <div class="col-md-8">
                      <span style="font-weight: bold">
                        Nome: 
                      </span>
                        <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> &nbsp;                  
                    </div>                    
                    <div class="col-md-4">
                        <?php echo formatDate($value1["dtnasc"]); ?> 
                      <span style="font-weight: bold">
                        <?php echo calcularIdade($value1["dtnasc"]); ?> anos
                      </span>
                    </div>         

                  </div> 

                  <div class="row"> 

                    <div class="col-md-2">
                      <span style="font-weight: bold;">
                        Atestado:_______
                      </span>
                    </div>

                    <div class="col-md-2" style="text-align: center; font-weight: bold;">
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
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        CPF:
                      </span> <?php echo formatCpf($value1["numcpf"]); ?>
                    </div>  
                                  
                    <div class="col-md-4">
                        <span style="font-weight: bold;">
                        SUS:
                      </span> <?php echo htmlspecialchars( $value1["cadunico"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </div>

                  </div>     

                  <div class="row"> 

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        CEP:
                      </span> <?php echo htmlspecialchars( $value1["cep"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </div>

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Bairro:
                      </span> <?php echo htmlspecialchars( $value1["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Cel:
                      </span> <?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </div>  

                  </div>  

                  <div class="row">

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Emergência:
                      </span>
                    </div>

                    <div class="col-md-4">
                      <?php echo htmlspecialchars( $value1["contato"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Tel:
                      </span>
                      <?php echo htmlspecialchars( $value1["telemer"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </div>  
                    
                  </div>   

                </div>

                <div class="col-md-4" style="border: 1px solid black;">
                  <div class="row">

                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-6">
                           <span style="font-weight: bold;">
                          OBS:</span>
                        </div>
                        <div class="col-md-6" style="text-align: right; font-weight: bold;">
                           <span>
                          <?php if( $value1["idinscstatus"] == 3 ){ ?>Matricular<?php } ?></span>
                        </div> 
                      </div>                     
                    </div>
                    
                    <div class="col-md-12">
                      <br><br>
                      <span style="font-weight: bold">___/___/___ Ass.:</span>
                    </div>
                  </div>                  
                </div>
                <?php }else{ ?>
                <div class="col-md-12" style="font-weight: bold; color: red; font-size: 22px; text-align: center; ">
                  Não há inscrições para efetuar matrícula
                </div>
                <?php } ?> 

                <div class="col-md-8" style="border: 1px solid black;">

                  <div class="row"> 

                    <div class="col-md-8">
                      <span style="font-weight: bold">
                        Nome: 
                      </span>
                         &nbsp;                  
                    </div>                    
                    <div class="col-md-4">
                        
                      <span style="font-weight: bold">
                        
                      </span>
                    </div>         

                  </div> 

                  <div class="row"> 

                    <div class="col-md-2">
                      <span style="font-weight: bold;">
                        Atestado:_______
                      </span>
                    </div>

                    <div class="col-md-2" style="text-align: center; font-weight: bold;">
                      
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        CPF:
                      </span> 
                    </div>  
                                  
                    <div class="col-md-4">
                        <span style="font-weight: bold;">
                        SUS:
                      </span> 
                    </div>

                  </div>     

                  <div class="row"> 

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        CEP:
                      </span> 
                    </div>

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Bairro:
                      </span> 
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Cel:
                      </span> 
                    </div>  

                  </div>  

                  <div class="row">

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Emergência:
                      </span>
                    </div>

                    <div class="col-md-4">
                      
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Tel:
                      </span>
                    </div>  
                    
                  </div>   

                </div>

                <div class="col-md-4" style="border: 1px solid black;">
                  <div class="row">

                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-6">
                           <span style="font-weight: bold;">
                          OBS:</span>
                        </div>
                        <div class="col-md-6" style="text-align: right; font-weight: bold;">
                           <span>
                           </span>
                        </div> 
                      </div>                     
                    </div>
                    
                    <div class="col-md-12">
                      <br><br>
                      <span style="font-weight: bold">___/___/___ Ass.:</span>
                    </div>
                  </div>                  
                </div>   
                <div class="col-md-8" style="border: 1px solid black;">

                  <div class="row"> 

                    <div class="col-md-8">
                      <span style="font-weight: bold">
                        Nome: 
                      </span>
                         &nbsp;                  
                    </div>                    
                    <div class="col-md-4">
                        
                      <span style="font-weight: bold">
                        
                      </span>
                    </div>         

                  </div> 

                  <div class="row"> 

                    <div class="col-md-2">
                      <span style="font-weight: bold;">
                        Atestado:_______
                      </span>
                    </div>

                    <div class="col-md-2" style="text-align: center; font-weight: bold;">
                      
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        CPF:
                      </span> 
                    </div>  
                                  
                    <div class="col-md-4">
                        <span style="font-weight: bold;">
                        SUS:
                      </span> 
                    </div>

                  </div>     

                  <div class="row"> 

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        CEP:
                      </span> 
                    </div>

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Bairro:
                      </span> 
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Cel:
                      </span> 
                    </div>  

                  </div>  

                  <div class="row">

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Emergência:
                      </span>
                    </div>

                    <div class="col-md-4">
                      
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Tel:
                      </span>
                    </div>  
                    
                  </div>   

                </div>

                <div class="col-md-4" style="border: 1px solid black;">
                  <div class="row">

                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-6">
                           <span style="font-weight: bold;">
                          OBS:</span>
                        </div>
                        <div class="col-md-6" style="text-align: right; font-weight: bold;">
                           <span>
                           </span>
                        </div> 
                      </div>                     
                    </div>
                    
                    <div class="col-md-12">
                      <br><br>
                      <span style="font-weight: bold">___/___/___ Ass.:</span>
                    </div>
                  </div>                  
                </div>

                <div class="col-md-8" style="border: 1px solid black;">

                  <div class="row"> 

                    <div class="col-md-8">
                      <span style="font-weight: bold">
                        Nome: 
                      </span>
                         &nbsp;                  
                    </div>                    
                    <div class="col-md-4">
                        
                      <span style="font-weight: bold">
                        
                      </span>
                    </div>         

                  </div> 

                  <div class="row"> 

                    <div class="col-md-2">
                      <span style="font-weight: bold;">
                        Atestado:_______
                      </span>
                    </div>

                    <div class="col-md-2" style="text-align: center; font-weight: bold;">
                      
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        CPF:
                      </span> 
                    </div>  
                                  
                    <div class="col-md-4">
                        <span style="font-weight: bold;">
                        SUS:
                      </span> 
                    </div>

                  </div>     

                  <div class="row"> 

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        CEP:
                      </span> 
                    </div>

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Bairro:
                      </span> 
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Cel:
                      </span> 
                    </div>  

                  </div>  

                  <div class="row">

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Emergência:
                      </span>
                    </div>

                    <div class="col-md-4">
                      
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Tel:
                      </span>
                    </div>  
                    
                  </div>   

                </div>

                <div class="col-md-4" style="border: 1px solid black;">
                  <div class="row">

                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-6">
                           <span style="font-weight: bold;">
                          OBS:</span>
                        </div>
                        <div class="col-md-6" style="text-align: right; font-weight: bold;">
                           <span>
                           </span>
                        </div> 
                      </div>                     
                    </div>
                    
                    <div class="col-md-12">
                      <br><br>
                      <span style="font-weight: bold">___/___/___ Ass.:</span>
                    </div>
                  </div>                  
                </div>

                <div class="col-md-8" style="border: 1px solid black;">

                  <div class="row"> 

                    <div class="col-md-8">
                      <span style="font-weight: bold">
                        Nome: 
                      </span>
                         &nbsp;                  
                    </div>                    
                    <div class="col-md-4">
                        
                      <span style="font-weight: bold">
                        
                      </span>
                    </div>         

                  </div> 

                  <div class="row"> 

                    <div class="col-md-2">
                      <span style="font-weight: bold;">
                        Atestado:_______
                      </span>
                    </div>

                    <div class="col-md-2" style="text-align: center; font-weight: bold;">
                      
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        CPF:
                      </span> 
                    </div>  
                                  
                    <div class="col-md-4">
                        <span style="font-weight: bold;">
                        SUS:
                      </span> 
                    </div>

                  </div>     

                  <div class="row"> 

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        CEP:
                      </span> 
                    </div>

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Bairro:
                      </span> 
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Cel:
                      </span> 
                    </div>  

                  </div>  

                  <div class="row">

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Emergência:
                      </span>
                    </div>

                    <div class="col-md-4">
                      
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Tel:
                      </span>
                    </div>  
                    
                  </div>   

                </div>

                <div class="col-md-4" style="border: 1px solid black;">
                  <div class="row">

                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-6">
                           <span style="font-weight: bold;">
                          OBS:</span>
                        </div>
                        <div class="col-md-6" style="text-align: right; font-weight: bold;">
                           <span>
                           </span>
                        </div> 
                      </div>                     
                    </div>
                    
                    <div class="col-md-12">
                      <br><br>
                      <span style="font-weight: bold">___/___/___ Ass.:</span>
                    </div>
                  </div>                  
                </div>

                <div class="col-md-8" style="border: 1px solid black;">

                  <div class="row"> 

                    <div class="col-md-8">
                      <span style="font-weight: bold">
                        Nome: 
                      </span>
                         &nbsp;                  
                    </div>                    
                    <div class="col-md-4">
                        
                      <span style="font-weight: bold">
                        
                      </span>
                    </div>         

                  </div> 

                  <div class="row"> 

                    <div class="col-md-2">
                      <span style="font-weight: bold;">
                        Atestado:_______
                      </span>
                    </div>

                    <div class="col-md-2" style="text-align: center; font-weight: bold;">
                      
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        CPF:
                      </span> 
                    </div>  
                                  
                    <div class="col-md-4">
                        <span style="font-weight: bold;">
                        SUS:
                      </span> 
                    </div>

                  </div>     

                  <div class="row"> 

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        CEP:
                      </span> 
                    </div>

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Bairro:
                      </span> 
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Cel:
                      </span> 
                    </div>  

                  </div>  

                  <div class="row">

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Emergência:
                      </span>
                    </div>

                    <div class="col-md-4">
                      
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Tel:
                      </span>
                    </div>  
                    
                  </div>   

                </div>

                <div class="col-md-4" style="border: 1px solid black;">
                  <div class="row">

                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-6">
                           <span style="font-weight: bold;">
                          OBS:</span>
                        </div>
                        <div class="col-md-6" style="text-align: right; font-weight: bold;">
                           <span>
                           </span>
                        </div> 
                      </div>                     
                    </div>
                    
                    <div class="col-md-12">
                      <br><br>
                      <span style="font-weight: bold">___/___/___ Ass.:</span>
                    </div>
                  </div>                  
                </div>

                <div class="col-md-8" style="border: 1px solid black;">

                  <div class="row"> 

                    <div class="col-md-8">
                      <span style="font-weight: bold">
                        Nome: 
                      </span>
                         &nbsp;                  
                    </div>                    
                    <div class="col-md-4">
                        
                      <span style="font-weight: bold">
                        
                      </span>
                    </div>         

                  </div> 

                  <div class="row"> 

                    <div class="col-md-2">
                      <span style="font-weight: bold;">
                        Atestado:_______
                      </span>
                    </div>

                    <div class="col-md-2" style="text-align: center; font-weight: bold;">
                      
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        CPF:
                      </span> 
                    </div>  
                                  
                    <div class="col-md-4">
                        <span style="font-weight: bold;">
                        SUS:
                      </span> 
                    </div>

                  </div>     

                  <div class="row"> 

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        CEP:
                      </span> 
                    </div>

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Bairro:
                      </span> 
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Cel:
                      </span> 
                    </div>  

                  </div>  

                  <div class="row">

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Emergência:
                      </span>
                    </div>

                    <div class="col-md-4">
                      
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Tel:
                      </span>
                    </div>  
                    
                  </div>   

                </div>

                <div class="col-md-4" style="border: 1px solid black;">
                  <div class="row">

                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-6">
                           <span style="font-weight: bold;">
                          OBS:</span>
                        </div>
                        <div class="col-md-6" style="text-align: right; font-weight: bold;">
                           <span>
                           </span>
                        </div> 
                      </div>                     
                    </div>
                    
                    <div class="col-md-12">
                      <br><br>
                      <span style="font-weight: bold">___/___/___ Ass.:</span>
                    </div>
                  </div>                  
                </div>

                <div class="col-md-8" style="border: 1px solid black;">

                  <div class="row"> 

                    <div class="col-md-8">
                      <span style="font-weight: bold">
                        Nome: 
                      </span>
                         &nbsp;                  
                    </div>                    
                    <div class="col-md-4">
                        
                      <span style="font-weight: bold">
                        
                      </span>
                    </div>         

                  </div> 

                  <div class="row"> 

                    <div class="col-md-2">
                      <span style="font-weight: bold;">
                        Atestado:_______
                      </span>
                    </div>

                    <div class="col-md-2" style="text-align: center; font-weight: bold;">
                      
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        CPF:
                      </span> 
                    </div>  
                                  
                    <div class="col-md-4">
                        <span style="font-weight: bold;">
                        SUS:
                      </span> 
                    </div>

                  </div>     

                  <div class="row"> 

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        CEP:
                      </span> 
                    </div>

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Bairro:
                      </span> 
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Cel:
                      </span> 
                    </div>  

                  </div>  

                  <div class="row">

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Emergência:
                      </span>
                    </div>

                    <div class="col-md-4">
                      
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Tel:
                      </span>
                    </div>  
                    
                  </div>   

                </div>

                <div class="col-md-4" style="border: 1px solid black;">
                  <div class="row">

                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-6">
                           <span style="font-weight: bold;">
                          OBS:</span>
                        </div>
                        <div class="col-md-6" style="text-align: right; font-weight: bold;">
                           <span>
                           </span>
                        </div> 
                      </div>                     
                    </div>
                    
                    <div class="col-md-12">
                      <br><br>
                      <span style="font-weight: bold">___/___/___ Ass.:</span>
                    </div>
                  </div>                  
                </div>

                <div class="col-md-8" style="border: 1px solid black;">

                  <div class="row"> 

                    <div class="col-md-8">
                      <span style="font-weight: bold">
                        Nome: 
                      </span>
                         &nbsp;                  
                    </div>                    
                    <div class="col-md-4">
                        
                      <span style="font-weight: bold">
                        
                      </span>
                    </div>         

                  </div> 

                  <div class="row"> 

                    <div class="col-md-2">
                      <span style="font-weight: bold;">
                        Atestado:_______
                      </span>
                    </div>

                    <div class="col-md-2" style="text-align: center; font-weight: bold;">
                      
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        CPF:
                      </span> 
                    </div>  
                                  
                    <div class="col-md-4">
                        <span style="font-weight: bold;">
                        SUS:
                      </span> 
                    </div>

                  </div>     

                  <div class="row"> 

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        CEP:
                      </span> 
                    </div>

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Bairro:
                      </span> 
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Cel:
                      </span> 
                    </div>  

                  </div>  

                  <div class="row">

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Emergência:
                      </span>
                    </div>

                    <div class="col-md-4">
                      
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Tel:
                      </span>
                    </div>  
                    
                  </div>   

                </div>

                <div class="col-md-4" style="border: 1px solid black;">
                  <div class="row">

                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-6">
                           <span style="font-weight: bold;">
                          OBS:</span>
                        </div>
                        <div class="col-md-6" style="text-align: right; font-weight: bold;">
                           <span>
                           </span>
                        </div> 
                      </div>                     
                    </div>
                    
                    <div class="col-md-12">
                      <br><br>
                      <span style="font-weight: bold">___/___/___ Ass.:</span>
                    </div>
                  </div>                  
                </div>

                <div class="col-md-8" style="border: 1px solid black;">

                  <div class="row"> 

                    <div class="col-md-8">
                      <span style="font-weight: bold">
                        Nome: 
                      </span>
                         &nbsp;                  
                    </div>                    
                    <div class="col-md-4">
                        
                      <span style="font-weight: bold">
                        
                      </span>
                    </div>         

                  </div> 

                  <div class="row"> 

                    <div class="col-md-2">
                      <span style="font-weight: bold;">
                        Atestado:_______
                      </span>
                    </div>

                    <div class="col-md-2" style="text-align: center; font-weight: bold;">
                      
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        CPF:
                      </span> 
                    </div>  
                                  
                    <div class="col-md-4">
                        <span style="font-weight: bold;">
                        SUS:
                      </span> 
                    </div>

                  </div>     

                  <div class="row"> 

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        CEP:
                      </span> 
                    </div>

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Bairro:
                      </span> 
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Cel:
                      </span> 
                    </div>  

                  </div>  

                  <div class="row">

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Emergência:
                      </span>
                    </div>

                    <div class="col-md-4">
                      
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Tel:
                      </span>
                    </div>  
                    
                  </div>   

                </div>

                <div class="col-md-4" style="border: 1px solid black;">
                  <div class="row">

                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-6">
                           <span style="font-weight: bold;">
                          OBS:</span>
                        </div>
                        <div class="col-md-6" style="text-align: right; font-weight: bold;">
                           <span>
                           </span>
                        </div> 
                      </div>                     
                    </div>
                    
                    <div class="col-md-12">
                      <br><br>
                      <span style="font-weight: bold">___/___/___ Ass.:</span>
                    </div>
                  </div>                  
                </div>

                <div class="col-md-8" style="border: 1px solid black;">

                  <div class="row"> 

                    <div class="col-md-8">
                      <span style="font-weight: bold">
                        Nome: 
                      </span>
                         &nbsp;                  
                    </div>                    
                    <div class="col-md-4">
                        
                      <span style="font-weight: bold">
                        
                      </span>
                    </div>         

                  </div> 

                  <div class="row"> 

                    <div class="col-md-2">
                      <span style="font-weight: bold;">
                        Atestado:_______
                      </span>
                    </div>

                    <div class="col-md-2" style="text-align: center; font-weight: bold;">
                      
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        CPF:
                      </span> 
                    </div>  
                                  
                    <div class="col-md-4">
                        <span style="font-weight: bold;">
                        SUS:
                      </span> 
                    </div>

                  </div>     

                  <div class="row"> 

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        CEP:
                      </span> 
                    </div>

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Bairro:
                      </span> 
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Cel:
                      </span> 
                    </div>  

                  </div>  

                  <div class="row">

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Emergência:
                      </span>
                    </div>

                    <div class="col-md-4">
                      
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Tel:
                      </span>
                    </div>  
                    
                  </div>   

                </div>

                <div class="col-md-4" style="border: 1px solid black;">
                  <div class="row">

                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-6">
                           <span style="font-weight: bold;">
                          OBS:</span>
                        </div>
                        <div class="col-md-6" style="text-align: right; font-weight: bold;">
                           <span>
                           </span>
                        </div> 
                      </div>                     
                    </div>
                    
                    <div class="col-md-12">
                      <br><br>
                      <span style="font-weight: bold">___/___/___ Ass.:</span>
                    </div>
                  </div>                  
                </div>

                <div class="col-md-8" style="border: 1px solid black;">

                  <div class="row"> 

                    <div class="col-md-8">
                      <span style="font-weight: bold">
                        Nome: 
                      </span>
                         &nbsp;                  
                    </div>                    
                    <div class="col-md-4">
                        
                      <span style="font-weight: bold">
                        
                      </span>
                    </div>         

                  </div> 

                  <div class="row"> 

                    <div class="col-md-2">
                      <span style="font-weight: bold;">
                        Atestado:_______
                      </span>
                    </div>

                    <div class="col-md-2" style="text-align: center; font-weight: bold;">
                      
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        CPF:
                      </span> 
                    </div>  
                                  
                    <div class="col-md-4">
                        <span style="font-weight: bold;">
                        SUS:
                      </span> 
                    </div>

                  </div>     

                  <div class="row"> 

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        CEP:
                      </span> 
                    </div>

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Bairro:
                      </span> 
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Cel:
                      </span> 
                    </div>  

                  </div>  

                  <div class="row">

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Emergência:
                      </span>
                    </div>

                    <div class="col-md-4">
                      
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Tel:
                      </span>
                    </div>  
                    
                  </div>   

                </div>

                <div class="col-md-4" style="border: 1px solid black;">
                  <div class="row">

                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-6">
                           <span style="font-weight: bold;">
                          OBS:</span>
                        </div>
                        <div class="col-md-6" style="text-align: right; font-weight: bold;">
                           <span>
                           </span>
                        </div> 
                      </div>                     
                    </div>
                    
                    <div class="col-md-12">
                      <br><br>
                      <span style="font-weight: bold">___/___/___ Ass.:</span>
                    </div>
                  </div>                  
                </div>

                <div class="col-md-8" style="border: 1px solid black;">

                  <div class="row"> 

                    <div class="col-md-8">
                      <span style="font-weight: bold">
                        Nome: 
                      </span>
                         &nbsp;                  
                    </div>                    
                    <div class="col-md-4">
                        
                      <span style="font-weight: bold">
                        
                      </span>
                    </div>         

                  </div> 

                  <div class="row"> 

                    <div class="col-md-2">
                      <span style="font-weight: bold;">
                        Atestado:_______
                      </span>
                    </div>

                    <div class="col-md-2" style="text-align: center; font-weight: bold;">
                      
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        CPF:
                      </span> 
                    </div>  
                                  
                    <div class="col-md-4">
                        <span style="font-weight: bold;">
                        SUS:
                      </span> 
                    </div>

                  </div>     

                  <div class="row"> 

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        CEP:
                      </span> 
                    </div>

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Bairro:
                      </span> 
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Cel:
                      </span> 
                    </div>  

                  </div>  

                  <div class="row">

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Emergência:
                      </span>
                    </div>

                    <div class="col-md-4">
                      
                    </div>  

                    <div class="col-md-4">
                      <span style="font-weight: bold;">
                        Tel:
                      </span>
                    </div>  
                    
                  </div>   

                </div>

                <div class="col-md-4" style="border: 1px solid black;">
                  <div class="row">

                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-6">
                           <span style="font-weight: bold;">
                          OBS:</span>
                        </div>
                        <div class="col-md-6" style="text-align: right; font-weight: bold;">
                           <span>
                           </span>
                        </div> 
                      </div>                     
                    </div>
                    
                    <div class="col-md-12">
                      <br><br>
                      <span style="font-weight: bold">___/___/___ Ass.:</span>
                    </div>
                  </div>                  
                </div>

               
               <button type="button" onclick="window.print()" class="btn btn-primary pull-right" style="margin-right: 5px; margin-top: 5px">
                    <i class="fa fa-print"></i> Imprimir
                </button>
             
                  
                </div>
                
              </div>
          </div>
        
    



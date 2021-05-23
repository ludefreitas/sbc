<?php if(!class_exists('Rain\Tpl')){exit;}?><!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="/../res/site/css/style.css">

    <title>Cursos Esportivos SBC</title>
  </head>
  <body>

    <header>

        <nav class="navbar navbar-expand-sm navbar-dark " style="background-color: #0f71b3"> 
            <div class="container">
                <!-- Logo -->
                <a href="/" class="navbar-brand">
                    <img src="/../res/site/icon/ico-home.png" title="CursosEsportivosSBC" width="30">
                </a>
                <!-- botão para expandir itens em navegação em tela pequena -->
                <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="nav-principal">
                    <ul class="navbar-nav ml-auto" style="text-align: center;">                        
                                                    
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                              <span class="text-white" style="font-weight: bold">
                                Início
                              </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" mr-4 href="#">
                              <span class="text-white" style="font-weight: bold">
                                Cursos Esportivos
                              </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a style="" class="nav-link" href="#">
                              <span class="text-white" style="font-weight: bold">
                                Esportes
                              </span>
                            </a>
                        </li>                        
                    </ul>                    
                </div>

            </div>            
        </nav> 

    </header> 

    <section id="home">  

          <div class="container">
            <div class="row">

              <div class="col-md-2" style="text-align: center; margin: 50px 0px 15px 0px;">
                <a href="/" class="">
                  <img src="/../res/site/img/corpoacao.png" title="CorpoEmAcao" width="150">
                </a> 
              </div>

              <div class="col-md-2" style="text-align: left; margin: 0px 0px 0px 0px;">
                <a href="/" class="">
                 
                </a> 
              </div>

               <div class="col-md-8 text-dark" col-sm-1 style="text-align: center; margin: 80px 0px 0px 0px;  ">

                <nav class="navbar navbar-expand-sm navbar-dark " style="background-color: #fff"> 
                <div class="container">
                <!-- Logo -->
                <!--<a href="/" class="navbar-brand">
                    <img src="res/site/icon/ico-home.png" title="CursosEsportivosSBC" width="30">
                </a>-->
                <!-- botão para expandir itens em navegação em tela pequena -->
                <button class="navbar-toggler" style="margin: 0 auto; background-color: #cc5d1e;" data-toggle="collapse" data-target="#nav-secundario" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="nav-secundario">
                    <ul class="navbar-nav ml-auto" style="text-align: center;">                        
                        
                        <?php if( checkLogin(false) ){ ?>
                        <li class="nav-item">
                            <a href="/profile" class="nav-link">
                              <i class="fa fa-user"></i>
                              <span class="text-dark" style="font-weight: bold">
                               <?php echo getUserName(); ?>
                              </span>
                            </a>
                        </li>
                        <li class="nav-item">  
                            <a href="/profile/insc" class="nav-link">
                              <span class="text-dark" style="font-weight: bold"> 
                                Inscrições
                                confirmadas 
                              </span> 
                            </a> 
                        </li>  
                        <li class="nav-item">
                            <a href="/cart" class="nav-link">
                              <span class="text-dark" style="font-weight: bold"> 
                                Inscrições
                                a confirmar 
                              </span>
                            </a> 
                        </li>       
                        <li class="nav-item">
                          <a href="/user/pessoas" class="nav-link" >
                            <i class="fa fa-heart" ></i>
                            <span class="text-dark" style="font-weight: bold">
                              Minha
                              Família
                            </span>
                          </a>
                        </li>     
                        <li class="nav-item">
                            <a href="/logout" class="nav-link">
                              <i class="fa fa-close"></i>
                              <span class="text-dark" style="font-weight: bold"> 
                                Sair
                              </span>
                            </a>
                        </li>
                              
                        <?php }else{ ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                              <span class="text-dark" style="font-weight: bold">
                                Início
                              </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" mr-4 href="#">
                              <span class="text-dark" style="font-weight: bold">
                                Cursos Esportivos
                              </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a style="" class="nav-link" href="#">
                              <span class="text-dark" style="font-weight: bold">
                                Esportes
                              </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-light" href="/login" class="nav-link">
                              <i class="fa fa-lock"></i>
                               <span class="text-dark" style="font-weight: bold"> 
                                 Entrar
                               </span>
                            </a>
                        </li>          
                        <?php } ?>                         
                    </ul>                    
                </div>

            </div>            
        </nav> 

              </div>

            </div>
          </div>    

          <div class="container" id="nav3">
            <div class="row">

              <div class="col-md-4" col-sm-1 style="text-align: center; margin: 50px 0px 15px 0px;">
                  <span style="font-size: 30px; ">Cursos Esportivos SBC</span>
              </div>

              <div class="col-md-4" style="text-align: center; margin: 50px 0px 15px 0px;">
                <input type="text" name="" placeholder="Pesquisa" style="text-align-last: center;">
                <button type="submit" class="btn btn-default btn-sm">
                  <i class="fa fa-search"></i>
                </button>                                              
              </div>

              <div class="col-md-4" style="text-align: center; margin: 50px 0px 15px 0;">

                            <a class="" style="padding: 10px;" href="#" >Esportes</a>/
                            <a class="" style="padding: 10px;" href="#">Início</a>/
                            <a class="" style="padding: 10px;" mr-4 href="#">Cursos Esportivos</a>

              </div>

            </div>
          </div>  

          <div class="container"> <!-- container 1 -->
            <div class="row"> <!-- row 2 -->

              <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 15px 0px 50px 0px;">

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <title>C Esportivos SBC</title>
    <link rel="icon" type="image/jpg" href="/../res/site/img/corpoacao.png" />
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
                    <div class="navbar-nav ml-auto" style="text-align: center;">                        
                                                    
                        <div class="nav-item">
                            <a class="nav-link" href="/">
                              <span class="text-white"  style="font-weight: bold;">
                                Início
                              </span>
                            </a>
                        </div>                        
                        <?php if( checkLogin(false) ){ ?>
                        <div class="nav-item">
                            <a href="/user/profile" class="nav-link">
                              <span class="text-white" style="font-weight: bold">
                               <?php echo getUserName(); ?>
                              </span>
                            </a>
                        </div>
                        <?php echo getUserIsProf(); ?>
                        <?php echo getUserIsAdmin(); ?>
                        <div class="nav-item">
                            <a href="/cart" class="nav-link">
                              <span class="text-white" style="font-weight: bold">
                                Inscrições a confirmar  
                              </span>
                            </a> 
                        </div>                    


                        <div class="nav-item" >
                            <a style="" class="nav-link" href="/logout" >
                              <span class="text-white" style="font-weight: bold">
                                 Sair
                              </span>
                            </a>
                        </div> 

                        <?php }else{ ?>
                        <div class="nav-item" >
                            <a style="" class="nav-link" href="/login" >
                              <span class="text-white" style="font-weight: bold">
                                 Entrar 
                              </span>
                            </a>
                        </div> 
                        <div class="nav-item" >
                            <a style="" class="nav-link" href="/user-create" >
                              <span class="text-white" style="font-weight: bold">
                                 Cadastre-se 
                              </span>
                            </a>
                        </div> 
                        <?php } ?>                                              
                    </div>                    
                </div>

            </div>            
        </nav> 

    </header> 

    <section id="home">  

          <div class="container">
            <div class="row">

                <div class="col-md-8" style="text-align: center; margin: 10px 0px 10px 0px;">
                <a href="/" class="">
                  <img src="/../res/site/img/horatreino.png" title="HoraTreino" height="50" width="120">
                </a> 
                <a href="/" class="">
                  <img src="/../res/site/img/campeoesvida.png" title="CampeoesDaVida" height="50" width="120">
                </a>                
                <a href="/" class="">
                  <img src="/../res/site/img/corpoacao.png" title="CorpoEmAcao" height="50" width="120">
                </a>                                  
              </div>
                         

               <div class="col-md-4" style="text-align: center; margin: 50px 0px 15px 0px;">
                 <form action="/">
                <input type="text" name="search" placeholder="Pesquisa" style="text-align-last: center;">
                <button type="submit" class="btn btn-default btn-sm">
                  <i class="fa fa-search"></i>
                </button>
                </form>                                              
              </div>

            </div>
          </div>    

         
          <hr>

         

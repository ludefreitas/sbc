<?php if(!class_exists('Rain\Tpl')){exit;}?>

<script type="text/javascript">

    function hidden(){
    
        let paginaatual = document.referrer

        if(paginaatual != "http://www.cursosesportivos.com.br/login"){

            document.getElementById('divFormEntrar').hidden = false;

        }else{

            document.getElementById('divFormEntrar').hidden = true;

        }
    }

</script>

<!doctype html>
<html lang="pt-br">
  <head>
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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <title>Cursos Esportivos SBC</title>
    <link rel="icon" 
      type="image/jpg" 
      href="/../res/site/img/corpoacao.png" />
</head>
  
  <body>

    <header>

        <nav class="navbar navbar-expand-sm navbar-dark " style="background-color: #0f71b3"> 
            <div class="container">
                <!-- Logo -->
                <a href="/" class="navbar-brand">
                    <img src="/../res/site/icon/ico-home.png" title="CursosEsportivosSBC" width="30">
                </a>

                 <?php if( !checkLogin(false) ){ ?>
                 <div id="divFormEntrar" style="border: solid 2px solid red; font-size: 10px;">
                      
                    <form id="myform" action="/login" method="post">

                        <span style="color: white; font-weight: bold;">Entrar:   </span><br>

                        <input type="text" id="login" name="login" placeholder="E-mail" style="width: 100px; height: 5px; border-radius: 5px;">
                           
                        <input type="password" id="password" name="password" placeholder="Senha" style="width: 100px; height: 5px; border-radius: 5px;">
                            &nbsp;&nbsp;
                            
                        <span style="color: white; font-weight: bold; font-size: 14px;">Ir
                        <i onclick="document.getElementById('myform').submit()" class="fa fa-arrow-right" style="color: white; font-weight: bold;"></i></span><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="/forgot/site">
                            <span style="color: darkorange; font-weight: bold;">(Recuperar senha)  </span><br>
                        </a>     
                    </form>
                                        
                 </div> 
                 <?php } ?>   


                <!-- botão para expandir itens em navegação em tela pequena -->
                <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal" aria-expanded="false" onclick="loginvisivel()">
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
                        <div class="nav-item">
                            <a href="/user/profile" class="nav-link">
                              <span class="text-white" style="font-weight: bold">
                               Inscrições<br>
                               Meus dados
                              </span>
                            </a>
                        </div>
                        <?php if( UserIsProf() ){ ?>
                            <?php echo getUserIsProf(); ?>
                        <?php }else{ ?> 
                            <?php if( UserIsEstagiario() ){ ?> 
                                <?php echo getUserIsEstagiario(); ?>                  
                            <?php } ?>
                        <?php } ?>
                         <?php echo getUserIsAudi(); ?>
                        <?php echo getUserIsAdmin(); ?>
                        <!--
                        <div class="nav-item">
                            <a href="/cart" class="nav-link">
                              <span class="text-white" style="font-weight: bold">
                                Inscrições a confirmar  
                              </span>
                            </a> 
                        </div> 
                    -->
                        <div class="nav-item">
                            <a href="/pessoa-create" class="nav-link">
                              <span class="text-white" style="font-weight: bold">
                                Inserir uma pessoa  
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

                <div class="col-md-6" style="text-align: center; margin: 0px 0px 0px 0px;">

                 <a href="/" class="">
                  <img src="/../res/site/img/cursosesportivos.jpg" title="Cursos Esportivos SBC" width="40%">
                </a> 

                <!--
                <a href="/" class="">
                  <img src="/../res/site/img/horatreino.png" title="HoraTreino" height="50" width="120">
                </a> 
                
                <a href="/" class="">
                  <img src="/../res/site/img/corpoacao.png" title="CorpoEmAcao" height="50" width="120">
                </a> 

                <a href="/" class="">
                  <img src="/../res/site/img/campeoesvida.png" title="CampeoesDaVida" height="50" width="120">
                </a>     
                -->            
                                              
              </div>
                
              <!--             

               <div class="col-md-6" style="text-align: center; margin: 5px 0px 5px 0px;">
                 <form action="/busca">
                <input type="text" name="search" placeholder="Pesquisa" style="text-align-last: center;">
                <button type="submit" class="btn btn-default btn-sm">
                  <i class="fa fa-search"></i>
                </button>
                </form>                                              
              </div>
              
              -->

            </div>
          </div>    
       
         
          <hr>

         

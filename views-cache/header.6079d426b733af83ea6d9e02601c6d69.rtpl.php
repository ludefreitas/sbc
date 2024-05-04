<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Cursos Esportivos | SBC</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/res/admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/res/admin/dist/css/AdminLTE.min.css">
  <!-- adminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="/res/admin/dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Cursos</b>EsportivosSBC</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Você tem 4 mensagens</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="/res/admin/dist/img/boxed-bg.jpg" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Equipe de suporte
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">Todas mensagens</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Você tem 10 notificações</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 05 membros online agora
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">Ver todos</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Você tem 9 tarefas</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Progresso
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">Todas tarefas</a>
              </li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="/res/admin/dist/img/boxed-bg.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo htmlspecialchars( $user["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="/res/admin/dist/img/boxed-bg.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo getUserId(); ?> - <?php echo getUserName(); ?> - Web Developer
                  <small>Membro desde Set. 2020</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Seguidores</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Meus alunos</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Minhas Turmas</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="/" class="btn btn-default btn-flat">Site</a>
                </div>
                <div class="pull-right">
                  <a href="/logout" class="btn btn-default btn-flat">Sair</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/res/admin/dist/img/boxed-bg.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo getUserName(); ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <!--
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <?php if( UserIsAdmin() ){ ?>

      <ul class="sidebar-menu">
        <!-- <li class="header">LISTAR / CRIAR / EDITAR </li> -->
        <!-- Optionally, you can add icons to the links -->
        <li class="treeview">
          <a href="#"><i class="fa fa-users"></i> <span>Usuários</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/users"><i class="fa fa-users"></i>Todos Usuários</a></li>
            
            <?php if( getUserId() == 7 OR getUserId() == 1 OR getUserId() == 156 ){ ?>


            <li><a href="/admin/admins"><i class="fa fa-users"></i>Administradores</a></li>            
            <li><a href="/admin/prof"><i class="fa fa-users"></i>Professores</a></li>
            <li><a href="/admin/estagiarios"><i class="fa fa-users"></i>Estagiários</a></li>
            
            <?php } ?>

            <li><a href="/admin/users-cliente"><i class="fa fa-users"></i>Clientes</a></li>
            <li><a href="/admin/pessoas"><i class="fa fa-users"></i>Alunos</a></li>          
          </ul>
        </li> 
         <li>
          <a href="/admin/temporada"><i class="fa fa-calendar"></i><span>Temporadas</span></a>
        </li> 
        
        <li class="treeview">
          <a href="/admin"><i class="fa fa-th-list"></i> <span>TURMAS por temporada</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php require $this->checkTemplate("turma-temporada-menu");?>

          </ul>
        </li> 
        <li class="treeview">
          <a href="/admin"><i class="fa fa-clipboard"></i>  <span>Chamadas<span style="color: red; font-size: 10px">(Novo)</span> </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php require $this->checkTemplate("turma-temporada-menu-hoje");?>

          </ul>
        </li> 
        
        <li class="treeview">
          <a href="/admin"><i class="fa fa-check"></i> <span>Controle de Frequência</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php require $this->checkTemplate("controle-frequencia-menu");?>

          </ul>
          <!--
          <ul class="treeview-menu">
            <li>
              <a href="/admin/controle-frequencia/4"><i class="fa fa-link"></i> <span> Contr. Freq. 2021</span>
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            </li>
          </ul>
        -->

        </li>

        <li class="treeview">
          <a href="/admin"><i class="fa fa-trophy"></i>  <span>Eventos<span style="color: red; font-size: 10px">(Novo)</span> </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        
          <ul class="treeview-menu">
            <li class="treeview">                 
              <a href="/admin/evento/create">
                <i class="fa fa-pencil"></i> 
                  Criar Evento
              </a> 
            </li>
            <?php require $this->checkTemplate("evento-menu");?>

          </ul>
        </li> 


        <li class="treeview">
          <a href="/admin"><i class="fa fa-graduation-cap"></i> <span>PROFESSOR</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php require $this->checkTemplate("professor-temporada-menu");?>

          </ul>
        </li>  
        
        <li class="treeview">
          <a href="/admin"><i class="fa fa-link"></i> <span>Estagiário</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php require $this->checkTemplate("estagiario-temporada-menu");?>

          </ul>
        </li> 
        
        <li class="treeview">
          <a href="/admin"><i class="fa fa-link"></i> <span>SORTEIO</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php require $this->checkTemplate("sorteio-temporada-menu");?>

          </ul>
        </li>                       

        <li class="treeview">
          <a href="/admin/insc"><i class="fa fa-link"></i> <span>Inscrições</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php require $this->checkTemplate("insc-temporada-menu");?>

          </ul>
        </li> 
        <?php if( getUserId() == 7 OR getUserId() == 1 ){ ?>

        <li class="treeview">
          <a href="/admin/insc"><i class="fa fa-link"></i> <span>Inscrições vazio</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php require $this->checkTemplate("insc-temporada-vazio-menu");?>

          </ul>
        </li> 
        <?php } ?>

        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Natação Espontânea</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         
          <ul class="treeview-menu">
           <li class="treeview">
                    <a href="/admin/mensagem/agenda/create/3">
                        <i class="fa fa-link"></i> 
                        Editar Agenda Baetão
                      </a>                      

                        <ul class="treeview-menu">
                              <li class="treeview">
                              
                          <a href="/admin/mensagem/agenda/create/3">
                              <i class="fa fa-link"></i> 
                              Fechar agenda
                            </a>                      
                        </li>
                        <li class="treeview">
                        
                          <a href="/admin/agenda/hora-dia-semana/3">                          
                              <i class="fa fa-link"></i> 
                              Editar horários de natação
                            </a>                          
                        </li>
                            </ul>                     
                  </li><li class="treeview">
                    <a href="/admin/mensagem/agenda/create/21">
                        <i class="fa fa-link"></i> 
                        Editar Agenda Paulicéia
                      </a>                      

                        <ul class="treeview-menu">
                              <li class="treeview">
                              
                          <a href="/admin/mensagem/agenda/create/21">
                              <i class="fa fa-link"></i> 
                              Fechar agenda
                            </a>                      
                        </li>
                        <li class="treeview">
                        
                          <a href="/admin/agenda/hora-dia-semana/21">                          
                              <i class="fa fa-link"></i> 
                              Editar horários de natação
                            </a>                          
                        </li>
                            </ul>                     
                  </li>
          </ul>
        </li>  
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Avaliação Natação</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview">
                      <a href="/admin/calendarioagenda-avaliacao/3">
                        <i class="fa fa-link"></i> 
                        Agenda Baetão
                      </a>                      
                  </li> 
                  <li class="treeview">
                      <a href="/admin/calendarioagenda-avaliacao/21">
                        <i class="fa fa-link"></i> 
                        Agenda Paulicéia
                      </a>                      
                  </li>            
          </ul>
        </li>  
        <?php if( getUserId() == 7 OR getUserId() == 1 OR getUserId() == 156 OR getUserId() == 19046 ){ ?>

        <li>
          <a href="/admin/turma"><i class="fa fa-link"></i> <span>Todas Turmas</span></a>
        </li>                        
        
        <li>
          <a href="/admin/atividade"><i class="fa fa-link"></i> <span>Atividades</span></a>
        </li>
        <li>
          <a href="/admin/modalidades"><i class="fa fa-link"></i> <span>Modalidades</span></a>
        </li>
        <li>
          <a href="/admin/local"><i class="fa fa-link"></i> <span>Crecs</span></a>
        </li>
        <li>
          <a href="/admin/espaco"><i class="fa fa-link"></i> <span>Espaços</span></a>
        </li>  
        <li>
          <a href="/admin/faixaetaria"><i class="fa fa-link"></i> <span>Faixa Etária</span></a>
        </li>
        <li>
          <a href="/admin/horario"><i class="fa fa-link"></i> <span>Horários</span></a>
        </li>
        <?php } ?>

      </ul>
      <?php }else{ ?>

      
         <ul class="sidebar-menu">
      
            <li class="treeview">
                    <a href="#"><i class="fa fa-users"></i> <span>Usuários</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/users-audi"><i class="fa fa-users"></i>Todos Usuários</a></li>
                        <li><a href="/admin/pessoas-audi"><i class="fa fa-users"></i>Alunos</a></li>          
                    </ul>
                </li> 

            <li class="treeview">
              <a href="/admin"><i class="fa fa-link"></i> <span>TURMAS por temporada</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <?php require $this->checkTemplate("turma-temporada-menu-audi");?>

              </ul>
            </li>

            <li class="treeview">
              <a href="/admin"><i class="fa fa-link"></i> <span>Controle de Frequência</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <?php require $this->checkTemplate("controle-frequencia-menu-audi");?>

              </ul>
            </li>
            <li>
              <a href="/admin/local-audi"><i class="fa fa-link"></i> <span>Crecs</span></a>
            </li>
            <li>
                <a href="/admin/temporada-audi"><i class="fa fa-link"></i><span>Temporadas</span></a>
            </li>     

        </ul>
      <?php } ?>

      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

<!-- jQuery 2.2.3 -->
<script src="/res/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/res/admin/https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="/res/admin/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="/res/admin/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="/res/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/res/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/res/admin/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="/res/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/res/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/res/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/res/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/res/admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/res/admin/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/res/admin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/res/admin/dist/js/demo.js"></script>
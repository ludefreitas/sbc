<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administração dos Cursos Esportivos SBC <br>
      </h1>     
      <h3>
        Olá! <?php echo htmlspecialchars( $user["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, seja Bem vindo!
      </h3>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container">
        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;">Usuário Online: <?php echo htmlspecialchars( $useronline, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
          
        </div> 
        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;">Usuário Visitante: <?php echo htmlspecialchars( $visitante, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
          
        </div>     
        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;">Todos Usuários: <?php echo htmlspecialchars( $totalUsuarios, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
          
        </div> 
        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;">Todos Alunos: <?php echo htmlspecialchars( $totalAlunos, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
          
        </div>    
        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;">Todos Professores: <?php echo htmlspecialchars( $totalProfessores, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
          
        </div>         
        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;">Todas Inscrições: <?php echo htmlspecialchars( $totalInscricoes, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
          
        </div> 
        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;">Alunos matriculados: <?php echo htmlspecialchars( $matriculadosTemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
          
        </div>                      
                  
      </div>

    </section>
    <!-- /.content -->
  </div>
 
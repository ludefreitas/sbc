<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cursos Esportivos SBC <br>
      </h1>
      <h3>
        Olá! <?php echo htmlspecialchars( $user["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, seja bem vindo!
      </h3>
      <ol class="breadcrumb">
        <li><a href="/admin-audi"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container">

        <div class="row">
            Dados das temporadas: &nbsp;&nbsp;
            <?php $counter1=-1;  if( isset($temporada) && ( is_array($temporada) || $temporada instanceof Traversable ) && sizeof($temporada) ) foreach( $temporada as $key1 => $value1 ){ $counter1++; ?>
                <a href="/admin/dadostemporada/<?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> <?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a> &nbsp;&nbsp;
            <?php } ?>
            <br><br>
        </div>

        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Usuários</div>          
        </div>  

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;">Usuários Visitante: <?php echo htmlspecialchars( $visitante, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
          <div class="col-md-3" style="border: solid 1px black;">
              <span style="color: green;">Usuários &nbsp;&nbsp;&nbsp;&nbsp;Online: </span> <?php echo htmlspecialchars( $useronline, ENT_COMPAT, 'UTF-8', FALSE ); ?>
          </div>         
          
        </div> 

        <div class="row">
           <div class="col-md-3" style="border: solid 1px black;">Todos Usuários: <?php echo htmlspecialchars( $totalUsuarios, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">Todos &nbsp;&nbsp;&nbsp;&nbsp;Alunos</span>: <?php echo htmlspecialchars( $totalAlunos, ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
          
        </div> 
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Chamadas de hoje</div>
          
        </div>       
        
        <div class="row">
          <div class="col-md-2" style="border: solid 1px black;">
             Presentes: <?php echo NumAlunosPresentesPorData(); ?>
          </div>
          <div class="col-md-2" style="border: solid 1px black;">
             Ausentes: <?php echo NumAlunosAusentesPorData(); ?>
          </div>
           <div class="col-md-2" style="border: solid 1px black;"> 
           Justificados <?php echo NumAlunosJustificadosPorData(); ?>
           </div>
          
        </div>
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: black;">

          </div>          
        </div>   
        
                
        
                  
      </div>

    </section>
    <!-- /.content -->
  </div>
 
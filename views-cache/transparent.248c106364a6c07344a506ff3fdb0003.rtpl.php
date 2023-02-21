<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Página da transparência dos Cursos Esportivos SBC <br>
      </h1>
      <h3>
        <?php if( checkLogin(false) ){ ?>  

       Olá <span style="color: black; font-weight: bold;">  <?php echo getUserName(); ?>, </span>seja bem vindo! <br><br>
        <?php }else{ ?>

        Olá! seja bem vindo! <br>

        <?php } ?>
      </h3>
      <ol class="">
        <a href="/"><i class="fa fa-dashboard"></i>Página inicial</a>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container">

        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Usuários</div>          
        </div>  

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;">&nbsp;Usuários Visitante: <?php echo usuariosVisitantes(); ?></div>
          <div class="col-md-3" style="border: solid 1px black;">
              <span style="color: green;">&nbsp;Usuários &nbsp;&nbsp;&nbsp;&nbsp;Online: </span> <?php echo usuariosOnline(); ?>
          </div>         
          
        </div> 

        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Nas aulas</div>          
        </div>  
        
        <div class="row">
          <div class="col-md-2" style="border: solid 1px black;">
             &nbsp;Presentes: <?php echo NumAlunosPresentesPorData(); ?>
          </div>
          <div class="col-md-2" style="border: solid 1px black;">
             &nbsp;Ausentes: <?php echo NumAlunosAusentesPorData(); ?>
          </div>
           <div class="col-md-2" style="border: solid 1px black;"> 
           &nbsp;Justificados <?php echo NumAlunosJustificadosPorData(); ?>
           </div>
          
        </div>
       
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Vagas / Inscrições / Matriculados 2022</div>
          
        </div>       
        
        <div class="row">
          <div class="col-md-2" style="border: solid 1px black;">
             &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByDescTemporada(2022); ?>
          </div>
          <div class="col-md-2" style="border: solid 1px black;">
             <span style="color: green;">&nbsp;Inscrições</span>: <?php echo todosInscricoesValidas(2022); ?>            
          </div>
           <div class="col-md-2" style="border: solid 1px black;">&nbsp;Matriculados: <?php echo MatriculadosDesctemporada(2022); ?></div>
          
        </div> 
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Vagas / Inscrições / Matriculados 2023</div>
          
        </div>       
        
        
        <div class="row">
          
          <div class="col-md-2" style="border: solid 1px black;">         
          &nbsp;V a g a s :&nbsp; <?php echo pegaSomaVagasByDescTemporada(2023); ?>
          </div>
          
        <div class="col-md-2" style="border: solid 1px black;">
          <span style="color: green;">&nbsp;Inscrições</span>: <?php echo todosInscricoesValidas(2023); ?>
          </div>
           <div class="col-md-2" style="border: solid 1px black;">&nbsp;Matriculados: 0</div>
          
        </div>         

        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Hidroginástica 2023</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s :&nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2023, 6); ?></div>

          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2023, 6); ?></div>
          
        </div>    

        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Natação 2023</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2023, 14); ?></div>
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2023, 14); ?></div>
          
        </div>  
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Ginástica 2023</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2023, 5); ?></div>

          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2023, 5); ?></div>
          
        </div>  

        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Pilates 2023</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2023, 24); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2023, 24); ?></div>
          
        </div> 

        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Alongamento 2023</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp;<?php echo pegaSomaVagasByTurmaIdmodal(2023, 23); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2023, 23); ?></div>
          
        </div>           
                  
      </div>

    </section>
    <!-- /.content -->
  </div>
 
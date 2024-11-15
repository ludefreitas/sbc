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
           <div class="col-md-2" style="border: solid 1px black;">&nbsp;Matriculados: <?php echo MatriculadosDesctemporada(2022, 4); ?></div>
          
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
           <div class="col-md-2" style="border: solid 1px black;">&nbsp;Matriculados: <?php echo MatriculadosDesctemporada(2023, 5); ?></div>
          
        </div>   
        
         <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Vagas / Inscrições / Matriculados 2023</div>
          
        </div>       
        
        
        <div class="row">
          
          <div class="col-md-2" style="border: solid 1px black;">         
          &nbsp;V a g a s :&nbsp; <?php echo pegaSomaVagasByDescTemporada(2024); ?>
          </div>
          
        <div class="col-md-2" style="border: solid 1px black;">
          <span style="color: green;">&nbsp;Inscrições</span>: <?php echo todosInscricoesValidas(2024); ?>
          </div>
           <div class="col-md-2" style="border: solid 1px black;">&nbsp;Matriculados: <?php echo MatriculadosDesctemporada(2024, 6); ?></div>
          
        </div>         


        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Hidroginástica 2024</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s :&nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2024, 6); ?></div>

          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2024, 6); ?></div>
          
        </div>    

        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Natação 2024</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2024, 14); ?></div>
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2024, 14); ?></div>
          
        </div> 

        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Natação Iniciante 2024</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2024, 56); ?></div>
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2024, 14); ?></div>
          
        </div> 

        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Natação Intermediário 2024</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2024, 57); ?></div>
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2024, 14); ?></div>
          
        </div>  

        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Natação Avançado 2024</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2024, 59); ?></div>
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2024, 14); ?></div>
          
        </div>   
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Ginástica 2024</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2024, 5); ?></div>

          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2024, 5); ?></div>
          
        </div>  

        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Pilates 2024</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2024, 24); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2024, 24); ?></div>
          
        </div> 

        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Alongamento 2024</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2024, 23); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2024, 23); ?></div>
          
        </div> 
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Futsal 2024</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2024, 4); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2024, 4); ?></div>
          
        </div>   
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Voleibol 2024</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2024, 7); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2024, 7); ?></div>
          
        </div>  
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Oficina 2024</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2024, 16); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2024, 16); ?></div>
          
        </div> 
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Dança 2024</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2024, 2); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2024, 2); ?></div>
          
        </div> 
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Yoga 2024</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2024, 20); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2024, 20); ?></div>
          
        </div>  
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Aiki Do 2024</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2024, 32); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2024, 32); ?></div>
          
        </div> 
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Tai Chi Chuan 2024</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2024, 31); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2024, 31); ?></div>
          
        </div> 
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Basquetebol 2024</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2024, 10); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2024, 10); ?></div>
          
        </div> 
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Canto 2024</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2024, 22); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2024, 22); ?></div>
          
        </div>  
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Chi Kung 2024</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2024, 29); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2024, 29); ?></div>
          
        </div> 
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Chi Kung ou Meditação 2024</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2024, 34); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2024, 34); ?></div>
          
        </div> 
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Musculação / Academia 2024</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2024, 26); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2024, 26); ?></div>
          
        </div>           
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Pilates ou Yoga 2024</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2024, 33); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2024, 33); ?></div>
          
        </div>   
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Poliesportivo 2024</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2024, 28); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2024, 28); ?></div>
          
        </div>        
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Recreação e Lazer 2024</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2024, 21); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2024, 21); ?></div>
          
        </div>   
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Yoga / Chi Kung / Meditalção 2024</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2024, 36); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2024, 36); ?></div>
          
        </div>
    
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Yoga ou Meditação 2024</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2024, 35); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2024, 35); ?></div>
          
        </div>           
        
        
                  
      </div>

    </section>
    <!-- /.content -->
  </div>
 
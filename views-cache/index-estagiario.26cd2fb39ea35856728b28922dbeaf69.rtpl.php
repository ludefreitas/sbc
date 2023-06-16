<?php if(!class_exists('Rain\Tpl')){exit;}?>

<script type="text/javascript">

       /*
       alert('Agora você já pode adicionar o atestado clínico (NÃO dermatológico) do seu aluno, ao fazer a chamada, informando a data de emissão do atestado e fazer uma breve observação. Nesta observação você pode informar uma doença (se houver) , CID (se houver) , uma condição especial (se houver)...')
        */


</script>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Área do Estagiário Cursos Esportivos SBC <br>
      </h1>
      <h3>
        Olá Estagiário(a) <?php echo htmlspecialchars( $user["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, seja bem vindo!
      </h3>
      <ol class="breadcrumb">
        <li><a href="/prof-estagiario"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
    <div class="container">

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
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Vagas / Inscrições / Matriculados 2022</div>
          
        </div>       
        
        <div class="row">
          <div class="col-md-2" style="border: solid 1px black;">
             &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByDescTemporada(2022); ?>

          </div>
          <div class="col-md-2" style="border: solid 1px black;">
             <span style="color: green;">Inscrições</span>: <?php echo todosInscricoesValidas(2022); ?>            
          </div>
           <div class="col-md-2" style="border: solid 1px black;"> matriculados: <?php echo MatriculadosDesctemporada(2022); ?></div>
          
        </div> 
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Vagas / Inscrições / Matriculados 2023</div>
          
        </div>       
        
        
        <div class="row">
          
          <div class="col-md-2" style="border: solid 1px black;">         
          &nbsp;V a g a s :&nbsp; <?php echo pegaSomaVagasByDescTemporada(2023); ?>

          </div>
          
        <div class="col-md-2" style="border: solid 1px black;">
          <span style="color: green;">Inscrições</span>: <?php echo todosInscricoesValidas(2023); ?>

          </div>
           <div class="col-md-2" style="border: solid 1px black;"> matriculados: <?php echo MatriculadosDesctemporada(2023); ?></div>
          
        </div>         

        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Hidroginástica 2023</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s :&nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2023, 6); ?></div>

          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2023, 6); ?></div>
          
        </div>    

        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Natação 2023</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2023, 14); ?></div>
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2023, 14); ?></div>
          
        </div>  
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Ginástica 2023</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2023, 5); ?></div>

          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2023, 5); ?></div>
          
        </div>  

        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Pilates 2023</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2023, 24); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2023, 24); ?></div>
          
        </div> 

        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Alongamento 2023</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2023, 23); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2023, 23); ?></div>
          
        </div>
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Futsal 2023</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2023, 4); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2023, 4); ?></div>
          
        </div>   
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Voleibol 2023</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2023, 7); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2023, 7); ?></div>
          
        </div>  
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Oficina 2023</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2023, 16); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2023, 16); ?></div>
          
        </div> 
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Dança 2023</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2023, 2); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2023, 2); ?></div>
          
        </div> 
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Yoga 2023</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2023, 20); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2023, 20); ?></div>
          
        </div>  
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Aiki Do 2023</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2023, 32); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2023, 32); ?></div>
          
        </div> 
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Tai Chi Chuan 2023</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2023, 31); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2023, 31); ?></div>
          
        </div> 
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Basquete 2023</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2023, 51); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2023, 51); ?></div>
          
        </div> 
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Canto 2023</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2023, 22); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2023, 22); ?></div>
          
        </div>  
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Chi Kung 2023</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2023, 29); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2023, 29); ?></div>
          
        </div> 
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Chi Kung ou Meditação 2023</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2023, 34); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2023, 34); ?></div>
          
        </div> 
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Musculação / Academia 2023</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2023, 26); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2023, 26); ?></div>
          
        </div>           
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Pilates ou Yoga 2023</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2023, 33); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2023, 33); ?></div>
          
        </div>   
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Poliesportivo 2023</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2023, 28); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2023, 28); ?></div>
          
        </div>        
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Recreação e Lazer 2023</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2023, 21); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2023, 21); ?></div>
          
        </div>   
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Yoga / Chi Kung / Meditalção 2023</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2023, 36); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2023, 36); ?></div>
          
        </div>
    
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Yoga ou Meditação 2023</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2023, 35); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2023, 35); ?></div>
          
        </div>
                  
    </div>

    </section>
    <!-- /.content -->
  </div>
 
<?php if(!class_exists('Rain\Tpl')){exit;}?>


<script type="text/javascript">

alert("Agora você já pode adicionar o atestado do seu aluno, ao fazer a chamada, informando a data de emissão do atestado e fazer uma breve observção. Nesta observação você pode informar uma doença (se houver) , CID (se houver) , uma condição especial (se houver)...")

</script>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Área do Porfessor Cursos Esportivos SBC </br>
      </h1>
      <h3>
        Olá Professor(a) <?php echo htmlspecialchars( $user["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, seja Bem vindo!
      </h3>
      <ol class="breadcrumb">
        <li><a href="/prof"><i class="fa fa-dashboard"></i> Level</a></li>
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

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2023, 19); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2023, 5); ?></div>
          
        </div> 

        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Alongamento 2023</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(2023, 18); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">Inscrições</span>: <?php echo pegaInscTemporadaModalidade(2023, 18); ?></div>
          
        </div>           
                  
      </div>
    </div>

    </section>
    <!-- /.content -->
  </div>
 
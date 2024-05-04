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
        <?php if( UserIsAdmin() ){ ?> 
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <?php }else{ ?>
            <li><a href="/admin-audi"><i class="fa fa-dashboard"></i> Home</a></li>
        <?php } ?>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container">
        <div class="row">
            <div class="col-md-6">
                Dados das temporadas: &nbsp;&nbsp;
                <?php $counter1=-1;  if( isset($temporada) && ( is_array($temporada) || $temporada instanceof Traversable ) && sizeof($temporada) ) foreach( $temporada as $key1 => $value1 ){ $counter1++; ?>

                    <a href="/admin/dadostemporada/<?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> <?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a> &nbsp;&nbsp;

                <?php } ?>
            </div>
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
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;"><?php echo htmlspecialchars( $desctemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?> - Dados atualizados </div>          
        </div> 
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: black;">

          </div>          
        </div>   
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Vagas / Inscrições / Matriculados</div>
          
        </div>       
        
        
        <div class="row">
          
          <div class="col-md-2" style="border: solid 1px black;">         
          &nbsp;V a g a s :&nbsp; <?php echo pegaSomaVagasByDescTemporada(($desctemporada)); ?>
          </div>
          
        <div class="col-md-2" style="border: solid 1px black;">
          <span style="color: green;">Inscrições</span>: <?php echo todosInscricoesValidas(($desctemporada)); ?>
          </div>
           <div class="col-md-2" style="border: solid 1px black;"> matriculados: <?php echo MatriculadosDesctemporada(($desctemporada)); ?></div>
          
        </div>         

        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Hidroginástica </div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s :&nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(($desctemporada), 6); ?></div>

          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">Inscrições</span>: <?php echo pegaInscTemporadaModalidade(($desctemporada), 6); ?></div>
          
        </div>    

        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Natação </div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(($desctemporada), 14); ?></div>
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">Inscrições</span>: <?php echo pegaInscTemporadaModalidade(($desctemporada), 14); ?></div>
          
        </div>  

        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Natação Avançado </div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(($desctemporada), 59); ?></div>
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">Inscrições</span>: <?php echo pegaInscTemporadaModalidade(($desctemporada), 59); ?></div>
          
        </div>   

        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Natação Inclusiva </div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(($desctemporada), 58); ?></div>
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">Inscrições</span>: <?php echo pegaInscTemporadaModalidade(($desctemporada), 58); ?></div>
          
        </div>  

        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Natação Iniciante</div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(($desctemporada), 56); ?></div>
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">Inscrições</span>: <?php echo pegaInscTemporadaModalidade(($desctemporada), 56); ?></div>
          
        </div> 

        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Natação Intermediário </div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(($desctemporada), 57); ?></div>
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">Inscrições</span>: <?php echo pegaInscTemporadaModalidade(($desctemporada), 57); ?></div>
          
        </div> 

        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Natação Perca o Medo de Nadar </div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(($desctemporada), 60); ?></div>
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">Inscrições</span>: <?php echo pegaInscTemporadaModalidade(($desctemporada), 60); ?></div>
          
        </div>
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Ginástica </div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(($desctemporada), 5); ?></div>

          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">Inscrições</span>: <?php echo pegaInscTemporadaModalidade(($desctemporada), 5); ?></div>
          
        </div>  

        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Pilates </div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(($desctemporada), 24); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">Inscrições</span>: <?php echo pegaInscTemporadaModalidade(($desctemporada), 24); ?></div>
          
        </div> 
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Alongamento </div>
          
        </div>           
        
        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(($desctemporada), 23); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(($desctemporada), 23); ?></div>
          
        </div> 
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Futsal </div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(($desctemporada), 4); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(($desctemporada), 4); ?></div>
          
        </div>   
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Voleibol </div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(($desctemporada), 7); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(($desctemporada), 7); ?></div>
          
        </div>  
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Oficina </div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(($desctemporada), 16); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(($desctemporada), 16); ?></div>
          
        </div> 
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Dança </div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(($desctemporada), 2); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(($desctemporada), 2); ?></div>
          
        </div> 
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Yoga </div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(($desctemporada), 20); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(($desctemporada), 20); ?></div>
          
        </div>  
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Aiki Do </div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(($desctemporada), 32); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(($desctemporada), 32); ?></div>
          
        </div> 
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Tai Chi Chuan </div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(($desctemporada), 31); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(($desctemporada), 31); ?></div>
          
        </div> 
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Basquete </div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(($desctemporada), 51); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(($desctemporada), 51); ?></div>
          
        </div> 
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Canto </div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(($desctemporada), 22); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(($desctemporada), 22); ?></div>
          
        </div>  
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Chi Kung </div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(($desctemporada), 29); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(($desctemporada), 29); ?></div>
          
        </div> 
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Chi Kung ou Meditação </div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(($desctemporada), 34); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(($desctemporada), 34); ?></div>
          
        </div> 
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Musculação / Academia </div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(($desctemporada), 26); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(($desctemporada), 26); ?></div>
          
        </div>           
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Pilates ou Yoga </div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(($desctemporada), 33); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(($desctemporada), 33); ?></div>
          
        </div>   
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Poliesportivo </div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(($desctemporada), 28); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(($desctemporada), 28); ?></div>
          
        </div>        
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Recreação e Lazer </div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(($desctemporada), 21); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(($desctemporada), 21); ?></div>
          
        </div>   
        
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Yoga / Chi Kung / Meditalção </div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(($desctemporada), 36); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(($desctemporada), 36); ?></div>
          
        </div>
    
        <div class="row">
          <div class="col-md-6" style="border: solid 1px black; text-align: center; font-weight: bold; background-color: #ccc;">Yoga ou Meditação </div>
          
        </div>           

        <div class="row">

          <div class="col-md-3" style="border: solid 1px black;"> &nbsp;V a g a s : &nbsp; <?php echo pegaSomaVagasByTurmaIdmodal(($desctemporada), 35); ?></div>
          
          <div class="col-md-3" style="border: solid 1px black;"><span style="color: green;">&nbsp;Inscrições</span>: <?php echo pegaInscTemporadaModalidade(($desctemporada), 35); ?></div>
          
        </div>
        
        
                  
      </div>

    </section>
    <!-- /.content -->
  </div>
 
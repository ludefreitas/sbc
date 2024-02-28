<?php if(!class_exists('Rain\Tpl')){exit;}?>
<script type="text/javascript">


    function avaliacao(){
        
        confirm('As turmas de natação intermediário, avançado e aperfeiçoamento são dedicadas aos alunos egressoas das turmas de iniciante do ano passado, ou aquelas pessoas que já sabem nadar o básico e pretendem aperfeiçoar o nado. Para ingressar em uma dessas turmas, você deve realizar o agendamento de uma avaliação junto a nossa equipe de professores para verificar em qual turma você pode ingressar.')
    }
    
    function GR(){

        alert('Incrições para as vagas remanescentes de Ginástica Rítimica (GR) estarão disponíveis no site a partir de 07/02/2023.')
    }
    
    /*
    function GrGa(){
        alert('Novas inscrições para as turmas de Ginástica Artística (GA) do Redenção e da Arena Caixa estarão disponíveis a partir de 15 de janeiro de 2024.\n\nLembramos da obrigatoriedade de se apresentar o Atestado Médido no início das aulas.\n\nA não entrega do Atestado Médico implica no CANCELAMENTO da Inscrição e/ou Matrícula!! ')
    }
    */

</script>
 <div class="container"> <!-- container 1 -->
            <div class="row"> <!-- row 2 -->
              <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 0px 0px 0px 0px;">

<div class="container" style="margin: 0px 0px 0px 0px; ">
  <div class="row">  
  
  <div class="col-md-12" style="color: black; text-align-last: center; font-size: 20px;">

      <div>
         ETAPA <span style="font-weight: bold;">2</span> de <span style="font-weight: bold;">5</span> 
      </div>


    </div>

    <?php if( $error != '' ){ ?>
    <div class="alert alert-danger">
      <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
    </div>
  
 <?php }else{ ?>

  <div class="col-md-12" style="text-align-last: left; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; border-radius: 15px;"> 

    <?php if( checkLogin(false) ){ ?> 
    
         <span style="color: black; font-weight: bold;">  <?php echo getUserName(); ?> </span>!<br>
            
                                                       
          Nesta etapa, selecione abaixo uma MODALIDADE para praticar a aula no <span style="font-weight: bold; font-size: 20px; color: orange;"><?php echo htmlspecialchars( $apelidolocal, ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>, escolha a turma e faça a sua inscrição ou a inscrição de seu dependente.

    <?php }else{ ?>      
           
      
            <a href="/user-create">             
                     CADASTRE-SE               
            </a> 
             <span> ou faça o  </span>           
            <a href="/login" >                
                 LOGIN 
            </a>
            e nesta etapa selecione abaixo uma MODALIDADE para praticar a aula no <span style="font-weight: bold; font-size: 20px; color: orange;"><?php echo htmlspecialchars( $apelidolocal, ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>, escolha a turma e faça a sua inscrição ou a inscrição de seu dependente.
          
      <?php } ?>

  </div>
 <?php } ?>

  </div>
</div>
<hr style="background-color: orange;">

<?php $counter1=-1;  if( isset($modalidades) && ( is_array($modalidades) || $modalidades instanceof Traversable ) && sizeof($modalidades) ) foreach( $modalidades as $key1 => $value1 ){ $counter1++; ?>
<a href="/modalidade/<?php echo htmlspecialchars( $value1["idmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
  <div class="container"> <!-- container 3 -->
    <div class="row"> <!-- row 4 -->
      
      <!-- <div class="col-md-4" col-sm-1 style="text-align-last: left; background-color: white; margin: 5px 0px 5px 0px; padding-right: 0px">                            

                    <img class="img-responsive" style="width: 282px; height: 179px" id="image-preview" src="" alt="Foto">                                   
      </div> -->                             
      
      <div class="col-md-12" style="text-align-last: left; line-height: 20px;  font-size: 20px; font-style: normal; margin: 5px 0px 5px 0px; padding: 0px 0px 0px 0px">

        <div class="container">
          <div class="row alert-warning">
            <div class="col-md-6" style="margin: 10px 0px 5px 0px; ">
              
              
              
                
                    <a style="color: #0f71b3; text-decoration: none; font-weight: bold;" href="/modalidade/<?php echo htmlspecialchars( $value1["idmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                  <?php echo htmlspecialchars( $value1["descmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
                  <?php if( $value1["idmodal"] == 19 ){ ?>
                        <span style="font-size: 14px; font-weight: bold;"> ( Yoga, Chi Kung e Dança circular )</span>                        

                    <?php } ?>
                    </a>

              
              
              
            </div>
            <div class="col-md-6" style="text-align-last: center; margin: 5px 0px 5px 0px; color: white; padding: 0px 0px 0px 0px">
                
              
              
             <a class="card card-just-text" style="background-color: #cc5d1e; color: white; padding: 5px 0px 5px 0px;  text-decoration: none" href="/modalidade/<?php echo htmlspecialchars( $value1["idmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>" text-decoration="none">Cursos dísponíveis
              </a>
              
              
              
            </div>
          </div>
        </div>
      </div>                        
    </div> <!-- row 4 -->
  </div> <!-- container 3 -->
</a>
<?php } ?>
<hr style="background-color: orange;">
<div class="row" style="margin: -5px -5px -5px -5px; padding-top: 20px; ">    
<div class="col-md-12" style="text-align-last: left; background-color: #0f71b3; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
    <a href="/locais">                          
      <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 14px; font-style: normal; margin: 10px 5px 10px 0px; ">                                               
          Cursos por Centro Esportivo
      </div>
    </a>
  </div>
 </div>
 <hr style="background-color: orange;">
</div> <!-- final da index -->


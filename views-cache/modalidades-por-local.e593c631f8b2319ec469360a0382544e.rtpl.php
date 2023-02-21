<?php if(!class_exists('Rain\Tpl')){exit;}?>
 <div class="container"> <!-- container 1 -->
            <div class="row"> <!-- row 2 -->
              <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 15px 0px 0px 0px;">

<div class="container" style="margin: 0px 0px 0px 0px; ">
  <div class="row">   

    <?php if( $error != '' ){ ?>
    <div class="alert alert-danger">
      <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
    </div>
  
 <?php }else{ ?>
 
  <div class="row" style="margin: -5px -5px -5px -5px; "> 
  
  <div class="col-md-12" style="color: black; text-align-last: center; font-size: 20px;">
      
      <hr style="background-color: orange;">

      <div>
         ETAPA <span style="font-weight: bold;">1</span> de <span style="font-weight: bold;">4</span> 
      </div>
<hr style="background-color: orange;">

    </div>

    
    <div class="col-md-12" style="text-align-last: left; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; border-radius: 15px;"> 

    <?php if( checkLogin(false) ){ ?> 

           Olá <span style="color: black; font-weight: bold;">  <?php echo getUserName(); ?>, </span>seja bem vindo! <br><br>           
                                                       
          Nesta etapa, veja a lista de turmas e clique no botão 'Selecione, clicando....' e escolha a turma e faça a sua inscrição ou a inscrição de seu dependente.

    <?php }else{ ?>      
           
      
            <a href="/cursos/user-create">             
                     CADASTRE-SE               
            </a> 
             <span> ou faça o  </span>           
            <a href="/cursos/login" >                
                 LOGIN 
            </a>
             Nesta etapa, veja a lista de turmas e clique no botão 'Selecione, clicando....' e escolha a turma e faça a sua inscrição ou a inscrição de seu dependente.
          
      <?php } ?>

  </div>

  <div class="col-md-12" style="border: 5px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif;"> 

     <hr style="background-color: orange;">

      <div style="text-align-last: center; font-weight: bold; line-height: 30px; color: red; font-size: 14px; font-style: italic; margin: 0px 5px 0px 5px; ">
          Projeto Perca o Medo de Nadar
      </div>
<!--
      <div style="text-align: justify; line-height: 30px; color: blue; font-size: 14px; font-style: italic; margin: 0px 5px 0px 5px; "> 

           <h6>- Este projeto é destinado para pessoas que tem <span style="font-weight: bold;">MEDO / PÂNICO</span> de entrar na água;<br>
            - Nas duas semanas de aula serão desenvolvidas atividades que estimulem a pessoa a entrar na piscina sem medo, permanecer e vivenciar momentos lúdicos semelhantes à natação;<br>
            - Se você já sabe nadar, deve aguardar as inscrições para o curso anual de natação.</h6>

           <h6 style="font-weight: bold; font-size: 12px">-> INSCRIÇÕES:  08 a 15 de julho/2022 </h6>

           <h6 style="font-weight: bold; font-size: 12px">-> PERÍODO DAS AULAS: 18 a 29 de julho/2022 </h6>

           <h6 style="font-weight: bold; font-size: 12px">-> FAIXA ETÁRIA: acima de 16 anoss </h6>

           <h6 style="font-weight: bold; font-size: 12px">-> LOCAL: Centro Esportivo Baetão</h6>
           <h6 style="font-weight: bold; font-size: 12px">-> DIAS:  de Segunda à Sexta </h6>

           <h6>

            <span style="font-weight: bold; bold; font-size: 10px">HORÁRIOS: </span><br>
            <span style="font-weight: bold; font-size: 10px">
                Turma 264 -</span> 08:00 ás 09:00&nbsp;&nbsp;|&nbsp;&nbsp;
            <span style="font-weight: bold; font-size: 10px">
                Turma 265 -</span> 09:00 ás 10:00<br>

            <span style="font-weight: bold; font-size: 10px">
                Turma 447 -</span> 10:00 ás 11:00&nbsp;&nbsp;|&nbsp;&nbsp;
            <span style="font-weight: bold; font-size: 10px">
                Turma 448 -</span> 13:00 ás 14:00<br>


            <span style="font-weight: bold; font-size: 10px">
                Turma 266 -</span> 14:00 ás 15:00&nbsp;&nbsp;|&nbsp;&nbsp;
            <span style="font-weight: bold; font-size: 10px">
                Turma 267 -</span> 15:00 ás 16:00<br>   

             <span style="font-weight: bold; font-size: 10px">
                Turma 449 -</span> 16:00 ás 17:00&nbsp;&nbsp;|&nbsp;&nbsp;

            </h6>       
      </div>
-->
<!--
<div style="text-align: justify; line-height: 30px; color: blue; font-size: 14px; font-style: italic; margin: 0px 5px 0px 5px; "> 

           <h6>- Este projeto é destinado para pessoas que tem <span style="font-weight: bold;">MEDO / PÂNICO</span> de entrar na água e nunca tiveram a oportunidade de entrar em uma piscina;<br>
            - Nas duas semanas de aula serão desenvolvidas atividades que estimulem a pessoa a entrar na piscina sem medo, permanecer e vivenciar momentos lúdicos semelhantes à natação;<br>
            - Se você já sabe nadar, deve aguardar as inscrições para o curso anual de natação.</h6>

           <h6 style="font-weight: bold; font-size: 12px">-> INSCRIÇÕES:  16 à 19 de agosto/2022 </h6>

           <h6 style="font-weight: bold; font-size: 12px">-> PERÍODO DAS AULAS: 23 de agosto à 02 de setembro/2022 </h6>

           <h6 style="font-weight: bold; font-size: 12px">-> FAIXA ETÁRIA: acima de 16 anoss </h6>

           <h6 style="font-weight: bold; font-size: 12px">-> LOCAL: Centro Esportivo Baetão</h6>
           <h6 style="font-weight: bold; font-size: 12px">-> DIAS:  de Terça à Sexta-feira </h6>

           <h6>

            <span style="font-weight: bold; bold; font-size: 10px">HORÁRIOS: </span><br>
            <span style="font-weight: bold; font-size: 10px">
                Turma 452  -</span> 13:30 ás 14:15&nbsp;&nbsp;
            

            

            </h6>       
      </div>
      -->
      
     
    
      <div style="text-align: justify; line-height: 30px; color: blue; font-size: 14px; font-style: italic; margin: 0px 5px 0px 5px; "> 

           <h6> <span style="font-weight: bold;">ATENÇÃO </span><br> <br>

            Todas as vagas para o <span style="font-weight: bold;">Projeto Perca o Medo de Nadar </span> foram preenchidas.<br>
            Continue acompanhando nossas redes sociais que em breve teremos uma nova edição desse projeto.<br><br>

            Agradecemos a compreensão!<br>           

            </h6>       
      </div>
    
      <!--
     <div style="text-align: justify; line-height: 30px; color: blue; font-size: 14px; font-style: italic; margin: 0px 5px 0px 5px; "> 

           <h6>- Este projeto é destinado para pessoas que tem <span style="font-weight: bold;">MEDO / PÂNICO</span> de entrar na água;<br>
            - Nas duas semanas de aula serão desenvolvidas atividades que estimulem a pessoa a entrar na piscina sem medo, permanecer e vivenciar momentos lúdicos semelhantes à natação;<br>
            - Se você já sabe nadar, deve aguardar as inscrições para o curso anual de natação.</h6>

           <h6 style="font-weight: bold; font-size: 12px">-> INSCRIÇÕES:  23 à 27 de setembro/2022 </h6>

           <h6 style="font-weight: bold; font-size: 12px">-> PERÍODO DAS AULAS: 18 à 28 de outubro/2022 </h6>

           <h6 style="font-weight: bold; font-size: 12px">-> FAIXA ETÁRIA: acima de 16 anos </h6>

           <h6 style="font-weight: bold; font-size: 12px">-> LOCAL: Centro Esportivo Baetão</h6>
           <h6 style="font-weight: bold; font-size: 12px">-> DIAS:  de Terça à Sexta </h6>

           <h6>

            <span style="font-weight: bold; bold; font-size: 10px">HORÁRIOS: </span><br>
            <span style="font-weight: bold; font-size: 10px">
                Turma 455  -</span> 13:30 ás 14:10&nbsp;&nbsp;           

            </h6>       
      </div>
    
    --> 
   
  </div> 
    
  </div>

 <?php } ?>

  </div>
</div>

<?php $counter1=-1;  if( isset($modalidades) && ( is_array($modalidades) || $modalidades instanceof Traversable ) && sizeof($modalidades) ) foreach( $modalidades as $key1 => $value1 ){ $counter1++; ?>
<?php if( $value1["idmodal"] == 14 ){ ?>

<a href="/cursos/modalidade/<?php echo htmlspecialchars( $value1["idmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
  <div class="container"> 
    <div class="row"> 
      
      <div class="col-md-12" style="text-align-last: left; line-height: 20px;  font-size: 20px; font-style: normal; margin: 5px 0px 5px 0px; padding: 0px 0px 0px 0px">

        <div class="container">
          <div class="row">            
            <div class="col-md-12" style="text-align-last: center; margin: 5px 0px 5px 0px; color: white; padding: 0px 0px 0px 0px">
          
              <div class="card card-just-text" style="background-color: #cc5d1e; color: white; padding: 5px 0px 5px 0px;  text-decoration: none" href="/cursos/modalidade/<?php echo htmlspecialchars( $value1["idmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>" text-decoration="none">Selecione, clicando aqui, a turma para se inscrever!
              </div>
            
            
            </div>
          </div>
        </div>
      </div>                        
    </div> 
  </div> 
</a>

<?php }else{ ?>

<?php } ?>
<?php } ?>
<hr style="background-color: orange;">

</div> <!-- final da index -->



<?php if(!class_exists('Rain\Tpl')){exit;}?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">

$( window ).unload(function() {
      alert("hello!")
});

/*
  window.onbeforeunload = function(){alert("Deseja mesmo sair do site?")};
  
  alert('Estamos no período de rematrícula. Qualquer inscrição feita aqui está sujeita a disponibilidade de vagas, respeitando a lista de espera que está com o professor da turma. Então, caso você faça inscrição, neste período, a mesma NÃO GARANTE VAGA')
*/

</script>


 <div class="container" style="margin-top: 0px;"> <!-- container 1 -->
            <div class="row"> <!-- row 2 -->
              <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 0px 0px 0px 0px;">

<div class="container" style="margin: 0px 0px 0px 0px; ">
<?php if( $profileMsg != '' ){ ?>
    <div class="alert alert-success">
      <?php echo htmlspecialchars( $profileMsg, ENT_COMPAT, 'UTF-8', FALSE ); ?>
    </div>
  <?php } ?>
  

  <?php if( $error != '' ){ ?>
    <div class="alert alert-danger">
      <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
    </div>
  <?php } ?>
  </div>
  <a style="color: darkblue; text-align-last: center; font-size: 14px" href="https://www.saobernardo.sp.gov.br/documents/1136654/1245027/Edital+NM/42aa453e-2d70-8651-96e5-41d2d779d24c">Resolução SESP Nº 004 de 28 de outubro de 2021. </a>
  <hr>
  
  <span style="font-size 12px;"> Dúvidas, sugestões e reclamações: </span>
           <strong style="font-size 16px; color: darkorange">contato@cursosesportivossbc.com.br</strong> 

<hr style="background-color: #0f71b3;">
  <div class="row" style="margin: -5px -5px -5px -5px; ">   
  <div class="col-md-12" style="border: 5px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif;"> 

      <div style="text-align-last: center; font-weight: bold; line-height: 30px; color: red; font-size: 14px; font-style: italic; margin: 0px 5px 0px 5px; ">
          Inscrições para a temporada 2022 encerradas.
      </div>
    <!--
      <div style="text-align: justify; line-height: 30px; color: blue; font-size: 14px; font-style: italic; margin: 0px 5px 0px 5px; ">          
          Já está disponível a lista com o resultado final após o sorteio eletrônico. Os inscritos foram reordenados de acordo com a sequência numérica sorteada.
          Selecione abaixo o local, a modalidade e logo em seguida clique no link da respectiva turma para acessá-la.
      </div>
    -->
      <div style="text-align: justify; line-height: 30px; color: blue; font-size: 14px; font-style: italic; margin: 0px 5px 0px 5px; ">         
        Estamos no período de rematricula. As vagas disponíveis são para pessoas já matriculadas e que já fazem aulas em alguma turma de nossos cursos esportivos. Então, quem se inscrever em alguma turma e que NÃO está matriculado e NÃO faz parte de nenhuma turma, irá se inscrever para uma lista de espera, respeitando uma lista de espera já existente com os professores e também a ordem de inscrições feitas a partir de agora.
      </div>
   
  </div> 

  </div>
 
  <hr style="background-color: #0f71b3;">
  <div class="row" style="margin: -5px -5px -5px -5px; ">   
  <div class="col-md-12" style="border: 5px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif;"> 
    
      <div style="text-align-last: center; font-weight: bold; line-height: 30px; color: #0f71b3; font-size: 14sx; font-style: italic; margin: 0px 5px 0px 5px; ">                                               
          SELECIONE ABAIXO UM LOCAL
      </div>
   
  </div> 

  </div>
  <hr style="background-color: #0f71b3;">


  <div class="container"> <!-- container 3 -->
    <div class="row"> <!-- row 4 -->   
     
      <?php $counter1=-1;  if( isset($locais) && ( is_array($locais) || $locais instanceof Traversable ) && sizeof($locais) ) foreach( $locais as $key1 => $value1 ){ $counter1++; ?>
            
                   
                      
                    <h5>                 
                    
                    <a  href="/modalidades/local/<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn" style="background-color: #0f71b3; color: white; font-weight: bold; justify-content: flex-end; margin: 5px; padding-top: 20px; padding-bottom: 20px; font-size: 18px; width: 150px; text-align: center;" ><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></h5>

      <?php } ?>
      
            
    </div> <!-- row 4 -->
  </div> <!-- container 3 -->

<hr style="background-color: #0f71b3;">


<div class="row" style="margin: -5px -5px -5px -5px; ">   
  <div class="col-md-6" style="text-align-last: left; background-color: #0f71b3; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
    <a href="/locais">                          
      <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 14sx; font-style: normal; margin: 10px 5px 10px 0px; ">                                               
          Turmas por local
      </div>
    </a>
  </div>
  
  <div class="col-md-6" style="text-align-last: left; background-color: #cc5d1e; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;"> 
    <a href="/modalidades">           
      <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 14sx; font-style: normal; margin: 10px 5px 10px 5px; ">                                               
          Turmas por modalidades
      </div>
    </a>
  </div> 
<!--
  <div class="col-md-4" style="text-align-last: left; background-color: #909090; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">
    <a href="/">    
      <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 14px; font-style: normal; margin: 10px 5px 10px 5px;  ">                                               
          Todas turmas
      </div>
    </a>
  </div>

-->
  </div>

  <div class="row" style="margin: -5px -5px -5px -5px; ">   
    <div class="col-md-12" style="text-align-last: left; background-color: green; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
      <a href="/locaisnatacao">                          
        <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 14sx; font-style: normal; margin: 10px 5px 10px 0px; ">                          
            Agendar Natação Espontânea
        </div>
      </a>
    </div>
  </div>
  <div class="row" style="margin: -5px -5px -5px -5px; ">   
    <div class="col-md-12" style="text-align-last: left; background-color: lightcoral; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
      <a href="#">                          
        <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 14sx; font-style: normal; margin: 10px 5px 10px 0px; ">                          
            Cursos Especiais (NATAÇÃO)
        </div>
      </a>
    </div>
  </div>
  <hr style="background-color: #0f71b3;">
  
  </div> <!-- final da index -->

  <!--
              <div class="col-md-4" style="text-align-last: center; background-color: white; margin: 0px 0px 15px 0px ">

                <div class="container">
                  <div class="row estruturaAcessos">

                     <div class="col-md-12" col-sm-1 style="text-align-last: left; background-color: #0f71b3; margin: 15px 0px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center;">
                      <div style="text-align-last: center; font-weight: 900; font-size: 60px; color: white; margin: 5px;">
                          <i class="fas fa-walking"></i>
                      </div>
                      <div style="text-align-last: center; font-weight: 600; line-height: 20px; color: white; font-size: 14px; font-style: normal; margin: 5px; ">
                         Eventos Esportivos
                      </div>
                    </div>     

                     <div class="col-md-12" col-sm-1 style="text-align-last: left; background-color: #909090; margin: 15px 0px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center;">
                      <div style="text-align-last: center; font-weight: 900; font-size: 60px; color: white; margin: 5px;">
                         <i class="fas fa-swimmer"></i>
                      </div>
                      <div style="text-align-last: center; font-weight: 600; line-height: 20px; color: white; font-size: 14px; font-style: normal; margin: 5px; ">

                         Cursos Esportivos

                      </div>
                    </div> 
                    <a href="/modalidades">    
                    <div class="col-md-12" col-sm-1 style="text-align-last: left; background-color: #cc5d1e; margin: 15px 0px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center;">
                      <div style="text-align-last: center; font-weight: 900; font-size: 60px; color: white; margin: 5px;">
                         <i class="fas fa-trophy"></i>
                      </div>
                      <div style="text-align-last: center; font-weight: 600; line-height: 20px; color: white; font-size: 14px; font-style: normal; margin: 5px; ">
                                               
                         Modalidades
                      </div></a>
                    </div> 

                    <div class="col-md-12" col-sm-1 style="text-align-last: left; background-color: #15a03f; margin: 15px 0px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center;">
                      <div style="text-align-last: center; font-weight: 900; font-size: 60px; color: white; margin: 5px;">
                         <i class="fas fa-futbol"></i>
                      </div>
                      <div style="text-align-last: center; font-weight: 600; line-height: 20px; color: white; font-size: 14px; font-style: normal; margin: 5px; ">
                                               
                         Campos de Futebol
                      </div>
                    </div> 
                    <a href="/locais">        
                    <div class="col-md-12" col-sm-1 style="text-align-last: left; background-color: #ce2c3e; margin: 15px 0px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center;">
                      <div style="text-align-last: center; font-weight: 900; font-size: 60px; color: white; margin: 5px;">
                      
                         <i class="fas fa-warehouse"></i>
                      </div>
                      <div style="text-align-last: center; font-weight: 600; line-height: 20px; color: white; font-size: 14px; font-style: normal; margin: 5px; ">
                                               
                         Crec's
                      </div>
                      </a>
                    </div>     
                    <div class="col-md-12" col-sm-1 style="text-align-last: left; background-color: #0f71b3; margin: 15px 0px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center;">
                      <div style="text-align-last: center; font-weight: 900; font-size: 60px; color: white; margin: 5px;">
                      
                         <i class="fas fa-bicycle"></i>
                      </div>
                      <div style="text-align-last: center; font-weight: 600; line-height: 20px; color: white; font-size: 14px; font-style: normal; margin: 5px; ">
                                               
                         Lazer
                      </div>
                    </div>     
                    <div class="col-md-12" col-sm-1 style="text-align-last: left; background-color: #909090; margin: 15px 0px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center;">
                      <div style="text-align-last: center; font-weight: 900; font-size: 60px; color: white; margin: 5px;">
                      
                         <i class="fas fa-handshake"></i>
                      </div>
                      <div style="text-align-last: center; font-weight: 600; line-height: 20px; color: white; font-size: 14px; font-style: normal; margin: 5px; ">
                                               
                         Parceiros
                      </div>
                    </div>     
                    <div class="col-md-12" col-sm-1 style="text-align-last: left; background-color: #cc5d1e; margin: 15px 0px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center;">
                      <div style="text-align-last: center; font-weight: 900; font-size: 60px; color: white; margin: 5px;">
                      
                         <i class="fas fa-user-plus"></i>
                      </div>
                      <div style="text-align-last: center; font-weight: 600; line-height: 20px; color: white; font-size: 14px; font-family: 'Open Sans'; f ">                         
                         Melhor Idade
                      </div>
                    </div>     
                    <div class="col-md-12" col-sm-1 style="text-align-last: left; background-color: #15a03f; margin: 15px 0px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center;">
                      <div style="text-align-last: center; font-weight: 900; font-size: 60px; color: white; margin: 5px;">
                      
                         <i class="fas fa-map-marker-alt"></i>
                      </div>
                      <div style="text-align-last: center; font-weight: 600; line-height: 20px; color: white; font-size: 14px; font-style: normal; margin: 5px; ">
                                               
                         Mapas
                      </div>
                    </div>         
                    
                    
                  </div> -->
                </div>
                

              </div>


<?php if(!class_exists('Rain\Tpl')){exit;}?>
 <div class="container" style="margin-top: 0px;"> <!-- container 1 -->
            <div class="row"> <!-- row 2 -->
              <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 0px 0px 50px 0px;">

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
        Você já pode inscever-se em nossos cursos para a temporada 2022. Faça a sua inscrição para as turmas com vagas disponíveis e compareça ao centro esportivo no dia e horário da aula para fazer sua matrícula. Já para as turmas que não têm vagas disponíveis faça a sua inscrição para a lista de espera e aguarde, quando houver uma vaga disponível, informaremos você por email.
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





<?php $counter1=-1;  if( isset($turma) && ( is_array($turma) || $turma instanceof Traversable ) && sizeof($turma) ) foreach( $turma as $key1 => $value1 ){ $counter1++; ?>
<!--
    <div class="container">
-->
     <!-- container 3 -->
<!--
      <div class="row"> 
-->
        <!-- row 4 -->        
        <!--
        <div class="col-md-4 col-sm-12" style="text-align-last: left; background-color: white; margin: 5px 0px 5px 0px; padding-right: 0px"><a href="/turma/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">           
            <img class="img-responsive" style="width: 282px; height: 179px" id="image-preview" src="<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Photo"></a>            
        </div>
        --> 
<!--
        <div class="col-md-12"style="text-align-last: left; line-height: 20px;  font-size: 14px; font-style: normal; margin: 5px 0px 20px 0px">
-->
          <!--
          <a href="/turma/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="text-decoration: none">  
          -->
<!--
          <a href="/cart/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add" style="text-decoration: none">     
          <h5 style="color: #000000"> 
            <span style="font-weight: bold;">
                <?php echo htmlspecialchars( $value1["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>               
            </span><br>
            <span style="color: darkgreen; font-size: 16px">
                [<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>] - <?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
            </span><br>
             
              <?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> das <?php echo htmlspecialchars( $value1["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $value1["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br>  
               Local da aula: <strong><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong><br>             
              Temporada: <?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - Prof.: <?php echo htmlspecialchars( $value1["apelidoperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br>

              <?php if( $value1["fimidade"] == 99 ){ ?> 
               Para nascidos até <?php echo htmlspecialchars( $anoAtual - $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br>
              <?php }else{ ?>
              Para nascidos entre: <?php echo htmlspecialchars( $anoAtual - $value1["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> e <?php echo htmlspecialchars( $anoAtual - $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
              <?php } ?>

              <?php if( $value1["idstatustemporada"] == 4 ){ ?> 
               <span style="color: red;">
                <?php echo htmlspecialchars( $value1["descstatustemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </span> <br> 
               <span style="font-weight: bold;">
              <?php echo htmlspecialchars( $value1["numinscritos"], ENT_COMPAT, 'UTF-8', FALSE ); ?> inscritos para <?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas  
              </span>                         
              <?php } ?>

              <?php if( $value1["idstatustemporada"] == 6 ){ ?> 
               <span style="color: red;">
                <?php echo htmlspecialchars( $value1["descstatustemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>. 
              </span><br>
                <span style="color: black;">Novas inscrições a partir de <?php echo formatDate($value1["dttermmatricula"]); ?>.</span>
              <?php } ?>
              

              <?php if( $value1["numinscritos"] > $value1["vagas"] && $value1["idstatustemporada"] == 4 ){ ?> <br>              
               <span style="color: orange;">
                Para esta turma terá sorteio de vagas
              </span>              
              <?php } ?>

              <?php if( $value1["idstatustemporada"] == 5 ){ ?>
                <?php if( $value1["numinscritos"] < $value1["vagas"] && $value1["idstatustemporada"] == 5 ){ ?> 

                   <?php if( $value1["nummatriculados"] < $value1["vagas"] && $value1["idstatustemporada"] == 5 ){ ?> 
                      <span style="color: darkgreen;">
                        <strong>Há vagas disponíveis</strong>
                      </span>
                   <?php } ?>

                <?php }else{ ?>
                
                   <span style="color: darkred;">
                    <strong>Não há vagas disponíveis.</strong><br>
                  </span>
                    <span>
                    Faça sua inscrição para a lista de espera<br>
                  </span>
                   <span>
                    Lista de espera com <?php echo htmlspecialchars( $value1["numinscritos"] - $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> pessoas<br>
                  </span>
                 
                <?php } ?>
              <?php } ?>
              
            
          </h5>
        </a>

        <?php if( $value1["idstatustemporada"] == 6 ){ ?> 
        
        <?php }else{ ?>
          <a class="btn btn-info" style="background-color: #cc5d1e"  href="/cart/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add">Inscrever-se</a>  
        <?php } ?>           
          
        </div>
      </div>
-->

       <!-- row 4 -->
<!--
    </div> 
-->
    <!-- container 3 -->


  <?php } ?>


<?php $counter1=-1;  if( isset($locais) && ( is_array($locais) || $locais instanceof Traversable ) && sizeof($locais) ) foreach( $locais as $key1 => $value1 ){ $counter1++; ?>

<a href="/modalidades/local/<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="text-decoration: none">
  <div class="container"> <!-- container 3 -->
    <div class="row"> <!-- row 4 -->
      
           <!-- <div class="col-md-4" col-sm-1 style="text-align-last: left; background-color: white; margin: 5px 0px 5px 0px; padding-right: 0px">
              

                    <img class="img-responsive" style="width: 282px; height: 179px" id="image-preview" src="" alt="Foto">

                 
            </div> -->                             
      
            <div class="col-md-12" style="text-align: justify; line-height: 20px;  font-size: 20px; font-style: normal; margin: 5px 0px 0px 0px">

                   
                      <h5 style=""><span style="font-weight: bold; color: #000000"><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> -</span> 
                        <span style="color: #000000">
                      <?php echo htmlspecialchars( $value1["nomelocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> 
                      Endereço: <?php echo htmlspecialchars( $value1["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, 
                      <?php echo htmlspecialchars( $value1["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  
                      <?php echo htmlspecialchars( $value1["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?> 
                      Cep: <?php echo htmlspecialchars( $value1["cep"], ENT_COMPAT, 'UTF-8', FALSE ); ?> 
                      Telefone: <?php echo htmlspecialchars( $value1["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                      

                    </span>
                    <h5>

                   <!-- <a href="/local/<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn" style="background-color: #0f71b3; color: white; font-weight: bold;" >Cursos dísponíveis</a>  -->
                   
                    
                    <a href="/modalidades/local/<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn" style="background-color: #0f71b3; color: white; font-weight: bold; justify-content: flex-end; display: flex;" >Cursos / Modalidades dísponíveis</a></h5>


            </div>                        
    </div> <!-- row 4 -->
  </div> <!-- container 3 -->
</a>
<hr style="background-color: #0f71b3;">
<?php } ?>

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
  
  </div> <!-- final da index -->


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
                    
                    
                  </div>
                </div>

              </div>


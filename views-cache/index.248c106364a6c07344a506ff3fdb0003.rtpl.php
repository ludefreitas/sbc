<?php if(!class_exists('Rain\Tpl')){exit;}?>
 <div class="container"> <!-- container 1 -->
            <div class="row"> <!-- row 2 -->
              <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 15px 0px 50px 0px;">

<div class="container" style="margin: 0px px 0px 0px; ">
  <div class="row" style="margin: -5px -20px 0px -5px; ">

   
  <div class="col-md-4" style="text-align-last: left; background-color: #ce2c3e; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
    <a href="/locais">                          
      <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 14px; font-style: normal; margin: 10px 5px 10px 0px; ">                                               
          Turmas por local
      </div>
    </a>
  </div>

  
  <div class="col-md-4" style="text-align-last: left; background-color: #cc5d1e; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;"> 
    <a href="/modalidades">           
      <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 14px; font-style: normal; margin: 10px 5px 10px 5px; ">                                               
          Turmas por modalidades
      </div>
    </a>
  </div> 

  <div class="col-md-4" style="text-align-last: left; background-color: #15a03f; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">
    <a href="/">    
      <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 14px; font-style: normal; margin: 10px 5px 0px 5px;  ">                                               
          Todas turmas
      </div>
    </a>
  </div>   


  </div>
</div>

<?php $counter1=-1;  if( isset($turma) && ( is_array($turma) || $turma instanceof Traversable ) && sizeof($turma) ) foreach( $turma as $key1 => $value1 ){ $counter1++; ?>

    <div class="container"> <!-- container 3 -->
      <div class="row"> <!-- row 4 -->        
        <!--
        <div class="col-md-4 col-sm-12" style="text-align-last: left; background-color: white; margin: 5px 0px 5px 0px; padding-right: 0px"><a href="/turma/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">           
            <img class="img-responsive" style="width: 282px; height: 179px" id="image-preview" src="<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Photo"></a>            
        </div>
        --> 
        <div class="col-md-12"style="text-align-last: left; line-height: 20px;  font-size: 14px; font-style: normal; margin: 5px 0px 20px 0px">

          <a href="/turma/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="text-decoration: none">         
          <h5 style="color: #000000"> 
            <span style="font-weight: bold;">
              <?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> 
            </span><br>
              Local da aula: <?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
              <?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> das <?php echo htmlspecialchars( $value1["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $value1["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - 
              Professor(a): <?php echo htmlspecialchars( $value1["apelidoperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br>
              Turma <?php echo htmlspecialchars( $value1["desstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - Temporada: <?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br>
              Idade: <?php echo htmlspecialchars( $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> a <?php echo htmlspecialchars( $value1["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> anos <br>
              <?php if( $value1["idstatustemporada"] == 4 ){ ?> 
               <span style="color: red;">
                Inscrições iniciadas
              </span> <br>            
              <?php } ?>
               <span style="font-weight: bold;">
              <?php echo htmlspecialchars( $value1["numinscritos"], ENT_COMPAT, 'UTF-8', FALSE ); ?> inscritos para <?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas 
              

              <?php if( $value1["numinscritos"] > $value1["vagas"] && $value1["idstatustemporada"] == 4 ){ ?> <br>
               <span style="color: orange;">
                Para esta turma terá sorteio de vagas
              </span>              
              <?php } ?>
            </span> 
          </h5>
        </a>
          
        <a class="btn btn-info" style="background-color: #cc5d1e"  href="/turma/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Detalhes da turma</a>
          
        </div>
      </div> <!-- row 4 -->
    </div> <!-- container 3 -->

<?php }else{ ?>
<div class="container"> <!-- container 3 -->
    <div class="row"> <!-- row 4 -->                        
        <div class="col-md-12"style="text-align-last: left; background-color: white; margin: 5px 0px 5px 0px; padding-right: 0px">
                <h2>Temporada  <br> não iniciada ): </h2>                               
                <h1>LoL Aguarde  </h1>
                <h1>Em breve \o/ </h1>                              
                <h1>Novidades :) </h1>
          </div> 
    </div> <!-- row 4 -->
  </div> <!-- container 3 -->                             
  <?php } ?>
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


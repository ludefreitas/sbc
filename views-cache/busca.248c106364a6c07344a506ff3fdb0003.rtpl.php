<?php if(!class_exists('Rain\Tpl')){exit;}?>
 <div class="container"> <!-- container 1 -->
            <div class="row"> <!-- row 2 -->
              <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 15px 0px 50px 0px;">

<div class="container" style="margin: 0px px 0px 0px; ">
<?php if( $profileMsg != '' ){ ?>
    <div class="alert alert-success">
      <?php echo htmlspecialchars( $profileMsg, ENT_COMPAT, 'UTF-8', FALSE ); ?>
    </div>
  <?php } ?>
  

  <?php if( $error != '' ){ ?>
    <div class="alert alert-info" style="margin: -5px -15px -5px -15px;">
      <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
    </div>
  <?php } ?>
  </div>
<hr style="background-color: green;">
  <div class="row" style="margin: -5px -5px -5px -5px; ">   
  <div class="col-md-8" style="border: 5px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif;"> 
    
      <div style="text-align-last: center; font-weight: bold; line-height: 30px; color: green; font-size: 14sx; font-style: italic; margin: 0px 5px 0px 5px; ">                                               
          SELECIONE ABAIXO A TURMA
      </div>
   
  </div> 

  </div>
 <hr style="background-color: green;">
<?php $counter1=-1;  if( isset($turma) && ( is_array($turma) || $turma instanceof Traversable ) && sizeof($turma) ) foreach( $turma as $key1 => $value1 ){ $counter1++; ?>
    <div class="container">

     <!-- container 3 -->

      <div class="row"> 

        <!-- row 4 -->        
        

        <div class="col-md-12"style="text-align-last: left; line-height: 20px;  font-size: 14px; font-style: normal; margin: 0px 0px 0px 0px">
          <!--
          <a href="/turma/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="text-decoration: none">  
          -->

          <a href="/cart/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add" style="text-decoration: none">     
          <h5 style="color: #000000"> 
            <span style="font-weight: bold;">
                <?php echo htmlspecialchars( $value1["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>               
            </span><br>
            <span style="color: darkgreen; font-size: 16px">
                [<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>] - <?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
            </span><br>
             
              <?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> das <?php echo htmlspecialchars( $value1["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $value1["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br>  
               Local da aula: <strong> *<?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>*</strong><br>             
              Temporada: <?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br>

               <?php if( $value1["fimidade"] == 99 ){ ?> 
               Para nascidos até<strong> <?php echo htmlspecialchars( $anoAtual - $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong> <br>
              <?php }else{ ?>
              Para nascidos entre:<strong> <?php echo htmlspecialchars( $anoAtual - $value1["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> à <?php echo htmlspecialchars( $anoAtual - $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong><br>
              <?php } ?>

              <?php if( $value1["idstatustemporada"] == 2 ){ ?> 
               <span style="font-weight: bold;">
              <?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas<br>                          
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
              <?php if( $value1["token"] == 1 ){ ?> 
                      <span style="color: darkblue;">
                        <strong>Necessário token</strong>
                      </span>
              <?php } ?>
            
          </h5>
        </a>

        <?php if( $value1["idstatustemporada"] == 6 ){ ?> 
        
        <?php }else{ ?>
          <a class="btn btn-info" style="background-color: #cc5d1e"  href="/cart/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add">Inscrever-se</a>  
        <?php } ?>           
          
        </div>
      </div>

       <!-- row 4 -->

    </div> 
    <!-- container 3 -->

<hr style="background-color: green;">

  <?php } ?>

<div class="row" style="margin: -5px -5px -5px -5px; ">   
  <div class="col-md-4" style="text-align-last: left; background-color: #0f71b3; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
    <a href="/locais">                          
      <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 14px; font-style: normal; margin: 10px 5px 10px 0px; ">                                               
           Cursos por <br> Centro Esportivo
      </div>
    </a>
  </div>
  
  <div class="col-md-4" style="text-align-last: left; background-color: #cc5d1e; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;"> 
    <a href="/modalidades">           
      <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 14px; font-style: normal; margin: 10px 5px 10px 5px; ">                                               
          Cursos por<br> modalidade
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
  
  </div> <!-- final da index -->


                    </div>

              </div>


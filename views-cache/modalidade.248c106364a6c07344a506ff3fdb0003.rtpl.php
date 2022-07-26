<?php if(!class_exists('Rain\Tpl')){exit;}?>
<script type="text/javascript">
  
    function alertToken(){


      alert("Conforme Resolução SESP Nº 004 de 28/10/2021 Art.7º, Os interessados em participar das turmas de inclusão para Pessoas com Deficiência (PCD) e/ou laudo médico do CREEBA, deverão comparecer pessoalmente (interessado ou representante legal) no Centro Esportivo do Jardim Lavínia, sito à Av. Capitão Casa - 1.500, no horário das 08:30 às 11:30 e das 13:30 às 16:30, nos dias úteis de terça a sexta-feira até o dia 03/12/2021.")
    }

</script>
  <div class="container"> <!-- container 1 -->
            <div class="row"> <!-- row 2 -->
              <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 15px 0px 0px 0px;">

<div class="container" style="margin: 0px px 0px 0px; ">

  
<div class="container">

   <div class="row" style="margin: -5px -5px -5px -5px; ">   
  <div class="col-md-12" style="text-align-last: left; background-color: #cc5d1e; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
   
      <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 14px; font-style: normal; margin: 10px 5px 10px 0px; ">                                               
         <span style="font-weight: bold; font-size: 20px;"><?php echo htmlspecialchars( $modalidade["descmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
      </div>
   
  </div>
</div> 

</div>      

  <?php $counter1=-1;  if( isset($turma) && ( is_array($turma) || $turma instanceof Traversable ) && sizeof($turma) ) foreach( $turma as $key1 => $value1 ){ $counter1++; ?>

  <div class="container"> <!-- container 3 -->
    <div class="row"> <!-- row 4 --> 
    
      <div class="col-md-12"style="text-align-last: left; line-height: 20px;  font-size: 14px; font-style: normal; margin: 5px 0px 20px 0px">

         <!--
          <a href="/turma/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="text-decoration: none">  
          -->
          <a href="/cart/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add" style="text-decoration: none">     
        <h5 style="color: #000000"> 
            <span style="font-weight: bold;">
              <?php if( $value1["idstatustemporada"] == 3 ){ ?> 
              [ <span style="font-weight: bold; font-size: 14px; color: darkorange;">
              <?php echo htmlspecialchars( $value1["descstatustemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  </span>]
              <?php } ?>            
              <?php echo htmlspecialchars( $value1["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>   
            </span><br>
            <span style="color: darkgreen; font-size: 16px">
                [<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>] - <?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
            </span><br>
             
              <?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> das <?php echo htmlspecialchars( $value1["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $value1["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br>  
               Local da aula: <strong><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong><br>             
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
              <?php } ?>

              <?php if( $value1["idstatustemporada"] == 6 ){ ?> 
               <span style="color: red;">
                <?php echo htmlspecialchars( $value1["descstatustemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>. <br>
                <span style="color: black;">Novas inscrições a partir de <?php echo formatDate($value1["dttermmatricula"]); ?>.</span>
              <?php } ?>
              

              <?php if( $value1["numinscritos"] > $value1["vagas"] && $value1["idstatustemporada"] == 4 ){ ?> <br>
              </span> 
               <span style="color: orange;">
                Para esta turma terá sorteio de vagas<br>
              </span>              
              <?php } ?>

              <?php if( $value1["idstatustemporada"] == 5 ){ ?>
                <?php if( $value1["numinscritos"] < $value1["vagas"] && $value1["idstatustemporada"] == 5 ){ ?> 

                   <?php if( $value1["nummatriculados"] < $value1["vagas"] && $value1["idstatustemporada"] == 5 ){ ?> 

                   

                       <?php if( ($value1["idlocal"] == 5) OR ($value1["idlocal"] == 21) ){ ?>

                        <span style="color: darkgreen;">
                        <strong>Há vagas disponíveis</strong><br>
                      </span>

                      <?php }else{ ?>

                       <span style="color: darkgreen;">
                        <strong>Clique para fazer sua rematrícula</strong><br>
                      </span>

                      <?php } ?>

                   <?php } ?>

                <?php }else{ ?>
                
                   <span style="color: darkred;">
                    <strong>Não há vagas disponíveis.</strong><br>
                  </span>
                    <span>
                    Faça sua inscrição para a lista de espera<br>
                  </span>
                    <h6 style="color: blue; font-weight: bold">              
                     <a href="/insc-turma-temporada-listaespera/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/user/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: orangered;">Acesse a lista de espera, clicando aqui.  </a>
                    </h6>
                <?php } ?>
              <?php } ?>                
            
          </h5>

        </a>

        <?php if( $value1["token"] == 1 ){ ?> 
          <h5><span style="color: darkblue;" >
            <strong>Necessário token</strong>&nbsp;             
          </span>
          <a href="#" onmousemove="alertToken()"><i class="fa fa-info-circle" style="font-size: 24px;"></i></h5></a>
        <?php } ?> 
          
        <?php if( $value1["idstatustemporada"] == 6 ){ ?> 
        
        <?php }else{ ?>
          <?php if( $value1["idstatustemporada"] == 3 ){ ?> 

            <!--
            <h6 style="color: blue; font-weight: bold">
              Consulte as inscrições válidas para esta turma, 
              <a href="/insc-turma-temporada-valida/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/user/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" >clicando aqui. </a>
            </h6>
          -->

            <h6 style="color: blue; font-weight: bold">
              Acesse lista com o resultado final após o sorteio para esta turma,
             <a href="/insc-turma-temporada-classificadas/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/user/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: orangered;">clicando aqui.  </a>
            </h6>
            
            

          <?php }else{ ?>

          <a class="btn btn-info" style="background-color: #cc5d1e"  href="/cart/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add">Inscrever-se</a>  
          <?php } ?>
        <?php } ?>           

           
      </div>
    </div> <!-- row 4 -->
  </div> <!-- container 3 -->


  <?php } ?>

  <?php if( $error != '' ){ ?>
   
<div class="container" >
  <div class="row">
    <div class="col-md-12 alert alert-info" style="font-size: 20px; text-align-last: center ">
       <span style="font-size: 20px; font-weight: bold;"> 
       <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
     </span>
    </div>     
  </div>
</div>
 <?php } ?>

  <div class="row" style="margin: -5px 10px -5px 10px; ">   
  
  <div class="col-md-6" style="text-align-last: left; background-color: #cc5d1e; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;"> 
    <a href="/modalidades">           
      <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 14px; font-style: normal; margin: 10px 5px 10px 5px; ">                                               
          Turmas por modalidades
      </div>
    </a>
  </div> 
  <div class="col-md-6" style="text-align-last: left; background-color: #0f71b3; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
    <a href="/locais">                          
      <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 14px; font-style: normal; margin: 10px 5px 10px 0px; ">                                               
          Turmas por local
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
  </div>
-->
</div>

   <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                  <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
                  <li><a href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                  <?php } ?>
                </ul>
              </div>
              </div> <!-- final da index -->


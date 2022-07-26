<?php if(!class_exists('Rain\Tpl')){exit;}?>
<script type="text/javascript">

</script>
  <div class="container"> <!-- container 1 -->
            <div class="row"> <!-- row 2 -->
              <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 15px 0px 0px 0px;">

<div class="container" style="margin: 0px px 0px 0px; ">

<hr style="background-color: orange;">
  <?php $counter1=-1;  if( isset($turma) && ( is_array($turma) || $turma instanceof Traversable ) && sizeof($turma) ) foreach( $turma as $key1 => $value1 ){ $counter1++; ?>
  <?php if( ($value1["idturma"] == 15) OR ($value1["idturma"] == 16) OR ($value1["idturma"] == 17) OR ($value1["idturma"] == 18) ){ ?>
  <div class="container"> <!-- container 3 -->
    <div class="row"> <!-- row 4 --> 
    
      <div class="col-md-12"style="text-align-last: left; line-height: 20px;  font-size: 14px; font-style: normal; margin: 5px 0px 20px 0px">


          <a href="/cursos/cart/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add" style="text-decoration: none">     
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

               <?php if( $value1["fimidade"] == 99 ){ ?> 
               Para maiores de 16 anos <br>
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

                        <span style="color: darkgreen;">
                        <strong>Há vagas disponíveis</strong><br>
                      </span>


                   <?php } ?>

                <?php }else{ ?>
                
                   <span style="color: darkred;">
                    <strong>Não há vagas disponíveis.</strong><br>
                  </span>
                    <span>
                <!--
                    Faça sua inscrição para a lista de espera<br>
                
                  </span>
                    <h6 style="color: blue; font-weight: bold">              
                     <a href="/cursos/insc-turma-temporada-listaespera/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/user/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: orangered;">Acesse a lista de espera, clicando aqui.  </a>
                    </h6>
                -->
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

            <h6 style="color: blue; font-weight: bold">
              Acesse lista com o resultado final após o sorteio para esta turma,
             <a href="/cursos/insc-turma-temporada-classificadas/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/user/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: orangered;">clicando aqui.  </a>
            </h6>

          <?php }else{ ?>

          <a class="btn btn-info" style="background-color: #cc5d1e"  href="/cursos/cart/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add">Inscrever-se</a>  

          <?php } ?>

        <?php } ?>  
           
      </div>
    </div> <!-- row 4 -->
  </div> <!-- container 3 -->
  <?php } ?>
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

   <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                  <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
                  <li><a href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                  <?php } ?>
                </ul>
              </div>
              </div> <!-- final da index -->

<hr style="background-color: #0f71b3;">
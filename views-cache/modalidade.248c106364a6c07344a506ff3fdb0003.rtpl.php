<?php if(!class_exists('Rain\Tpl')){exit;}?><script type="text/javascript">


    function getVagas(url){

        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url');
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          if(result){              
                alert(result)
          }else{
            alert('Dados não disponíveis!')
          }
        });
      } 

      function getVagasListaEspera(url){

        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url');
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          if(result){              
                alert(result)
          }else{
            alert('Dados não disponíveis!')
          }
        });
      }     

    /*
    alert('As aulas de Ginástica Artística (GA) e Ginástica Rítimica (GR) começam a partir de 13/02/2023.')
    */

    function encerradas(){

        alert('As inscrições para o ano de 2022 estão encerradas! Para o ano de 2023 as inscrições começam a partir de 01/11/2022')
    }

  
   function alertTokenCreeba(){

      alert("Conforme Resolução SESP Nº 004 de 28/10/2021 Art.7º, Os interessados em participar das turmas de inclusão para Pessoas com Deficiência (PCD) e/ou laudo médico do CREEBA, deverão comparecer pessoalmente (interessado ou representante legal) no CREEBA")
    }
    
    function alertTokenBaetao(){

      alert("Para fazer a inscrição nas turmas de natação intermediário, avançado e aperfeiçoamento para o ano de 2023 é necessário ser egresso das turmas do ano de 2022 e ter autorização fornecida pelo professor.")
    }
    
    function alertTokenPauliceia(){

      alert("Para fazer a inscrição nas turmas de natação intermediário, avançado e aperfeiçoamento para o ano de 2023 é necessário ser egresso das turmas do ano de 2022 e ter autorização fornecida pelo professor.")
    }

</script>
  <div class="container" style="margin-top: 0px;"> <!-- container 1 -->
            <div class="row"> <!-- row 2 -->
              <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 0px 0px 0px 0px;">

<div class="container" style="margin: 0px px 0px 0px; ">
    
    <div class="col-md-12" style="color: black; text-align-last: center; font-size: 20px;">

      <div>
         ETAPA <span style="font-weight: bold;">3</span> de <span style="font-weight: bold;">5</span> 
      </div>

    </div>
   
   <div class="col-md-12" style="text-align-last: left; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; border-radius: 15px;"> 
   
    <?php if( $modalidade["idmodal"] == 38 ){ ?>
        Para fazer a inscrição e matrícula na modalidade Karatê, você deve entrar em contato com o Sensei Guto através Whatsapp abaixo.
    <?php }else{ ?>
    
        <?php if( $modalidade["idmodal"] == 39 ){ ?>
            Para fazer a inscrição na modalidade Judô, Clique no link abaixo.
        
        <?php }else{ ?>
        
        <?php if( $modalidade["idmodal"] == 46 ){ ?>
            Para fazer a inscrição na modalidade Zumba, Clique no link abaixo.
        
        <?php }else{ ?>

        <?php if( checkLogin(false) ){ ?> 
    
               <span style="color: black; font-weight: bold;">  <?php echo getUserName(); ?></span>!<br>           
                                                           
              Nesta etapa, selecione abaixo uma turma para praticar a aula de <span style="font-weight: bold; font-size: 20px; color: orange;"><?php echo htmlspecialchars( $modalidade["descmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span> e faça a sua inscrição ou a inscrição de seu dependente.
    
        <?php }else{ ?>      
               
          
                <a href="/user-create">             
                         CADASTRE-SE               
                </a> 
                 <span> ou faça o  </span>           
                <a href="/login" >                
                     LOGIN 
                </a>
                e nesta etapa selecione abaixo uma turma para praticar a aula de <span style="font-weight: bold; font-size: 20px; color: orange;"><?php echo htmlspecialchars( $modalidade["descmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>, faça a sua inscrição ou a inscrição de seu dependente.
              
          <?php } ?>
         <?php } ?>
         <?php } ?>
    <?php } ?>

    </div>
    
    <?php if( $modalidade["idmodal"] == 10 ){ ?>
      <div class="container" >
            <div class="row">
                <div class="col-md-12 alert alert-info" style="font-size: 20px; text-align: justify ">
                    <span style="font-size: 20px; font-weight: bold;">
                        
                         Novas turmas de Basquete serão disponibilizadas neste site a partir do dia 07 de fevereiro.
                         
                    </span>
                 </div>     
             </div>
        </div>
  <?php } ?>
    
    <?php if( $modalidade["idmodal"] == 25 ){ ?>
        <div class="container" >
            <div class="row">
                <div class="col-md-12 alert alert-info" style="font-size: 20px; text-align: justify ">
                    <span style="font-size: 20px; font-weight: bold;">

                        Novas inscrições! <br>
                        Leiam atentamente as observações de cada turma.<br>
                        <span style="color: red;">Sujeito a alterações de acordo com divisão das turmas.</span>
                        
                        
                    </span>
                 </div>     
             </div>
        </div>
    <?php } ?>
    
    <?php if( $modalidade["idmodal"] == 44 ){ ?>
        <div class="container" >
            <div class="row">
                <div class="col-md-12 alert alert-info" style="font-size: 20px; text-align: justify ">
                    <span style="font-size: 20px; font-weight: bold;">
                        
                         Novas inscrições! <br>
                        Leiam atentamente as observações de cada turma.<br>
                        <span style="color: red;">Sujeito a alterações de acordo com divisão das turmas.</span>
                        
                    </span>
                 </div>     
             </div>
        </div>
    <?php } ?>


   
   <!--
   
  <div class="col-md-12" style="text-align-last: left; background-color: #cc5d1e; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
   
      <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 14px; font-style: normal; margin: 10px 5px 10px 0px; ">                                               
         <span style="font-weight: bold; font-size: 20px;"><?php echo htmlspecialchars( $modalidade["descmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>
      </div>
   
  </div>
  -->

<hr style="background-color: #0f71b3;">

  <?php $counter1=-1;  if( isset($turma) && ( is_array($turma) || $turma instanceof Traversable ) && sizeof($turma) ) foreach( $turma as $key1 => $value1 ){ $counter1++; ?>
  
  <?php if( $value1["idturma"] == 264 OR $value1["idturma"] == 265 OR $value1["idturma"] == 266 OR $value1["idturma"] == 267 OR ($value1["idturma"] == 452) OR ($value1["idturma"] == 449) OR ($value1["idturma"] == 447) OR ($value1["idturma"] == 448) OR ($value1["idturma"] == 455) ){ ?>
  
  <?php }else{ ?>

  <div class="container"> <!-- container 3 -->
    <div class="row"> <!-- row 4 --> 


    
      <div class="col-md-12" style="text-align-last: left; line-height: 20px;  font-size: 14px; font-style: normal; margin: 5px 0px 20px 0px">

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
                <?php echo htmlspecialchars( $value1["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>    
            </span><br>
            <span style="color: darkgreen; font-size: 16px">
                [<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>] - <?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
            </span><br>
             
              <?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> das <?php echo htmlspecialchars( $value1["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $value1["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br>  
               Local da aula: <?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>             
             

               <?php if( $value1["fimidade"] == 99 ){ ?> 
               Para adultos nascidos até <?php echo htmlspecialchars( $anoAtual - $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br> 
              <?php }else{ ?>
              Para nascidos entre: <?php echo htmlspecialchars( $anoAtual - $value1["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> e <?php echo htmlspecialchars( $anoAtual - $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
              <?php } ?>
              
             <?php if( $value1["obs"] ){ ?>
              OBSERVAÇÃO: <strong><?php echo htmlspecialchars( $value1["obs"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong><br>
              <?php } ?>
              

                               <?php if( $value1["idstatustemporada"] == 2 ){ ?> 
               <span style="font-weight: bold;">
              <?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas<br>
              <?php } ?>          

              <?php if( $value1["idstatustemporada"] == 4 ){ ?> 
               <span style="color: red;">
                <?php echo htmlspecialchars( $value1["descstatustemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </span> <br> 
               
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
                      
                      <?php if( ($value1["idturma"] == 264) OR ($value1["idturma"] == 265) OR ($value1["idturma"] == 266) OR ($value1["idturma"] == 267) OR ($value1["idturma"] == 447) OR ($value1["idturma"] == 448) OR ($value1["idturma"] == 449) OR ($value1["idturma"] == 455) ){ ?>
                      
                        <span style="color: darkgreen;">
                        <strong>Clique para fazer sua inscrição</strong><br>
                      </span>
                      
                      <?php }else{ ?>
                      
                        <span style="color: green; font-size: 14px;">
                        <?php echo htmlspecialchars( $value1["numinscritos"], ENT_COMPAT, 'UTF-8', FALSE ); ?> inscritos para <?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas   
                        
                      </span><br>
                       
                      <?php } ?>
                      
                   <?php } ?>

                <?php }else{ ?>
                <!--
                   <span style="color: darkred;">
                           
                    <strong>Não há vagas disponíveis.</strong><br>
                  </span>
                    <span>
                    Faça sua inscrição para a lista de espera<br>
                  </span>

                   <h6 style="color: blue; font-weight: bold">   
                   
                     <a href="/insc-turma-temporada-listaespera/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/user/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: orangered;">Consulte a lista de espera</a>
                    </h6>
                <hr style="background-color: blue;">
            -->
                    
                <?php } ?>
              <?php } ?>
            
          </h5>
          
        </a>
        <?php if( $value1["token"] == 1 ){ ?> 
           
          <?php if( $value1["idlocal"] == 5 ){ ?>

              <h5><span style="color: darkblue;" >
                <strong>Necessário token</strong>&nbsp;             
              </span>
              <a href="#" onmousemove="alertTokenCreeba()"><i class="fa fa-info-circle" style="font-size: 24px;"></i></h5></a>
            <?php } ?>

            <?php if( $value1["idlocal"] == 3 ){ ?>

              <h5><span style="color: darkblue;" >
                <strong>Necessário token</strong>&nbsp;             
              </span>
              <a href="#" onmousemove="alertTokenBaetao()"><i class="fa fa-info-circle" style="font-size: 24px;"></i></h5></a>
            <?php } ?>
            
            <?php if( $value1["idlocal"] == 21 ){ ?>

              <h5><span style="color: darkblue;" >
                <strong>Necessário token</strong>&nbsp;             
              </span>
              <a href="#" onmousemove="alertTokenBaetao()"><i class="fa fa-info-circle" style="font-size: 24px;"></i></h5></a>
            <?php } ?>
            
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


            <br>

              <a class="btn btn-info" style="background-color: #cc5d1e"  href="/cart/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add">Inscrever-se</a>  

              <a class="btn btn-success" style="font-weight: bold; color: white;" onclick="getVagas('/vagas-turma/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')"> Vagas </a> 
              <br> <br>
            <h6 style="color: blue; font-weight: bold">  
                     <a href="/insc-turma-temporada-listaespera/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/user/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: orangered;">Consulte a lista de espera, clicando aqui.  </a>
                    </h6>
                <hr style="background-color: blue;">

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
           
    <?php if( $modalidade["idmodal"] == 38 ){ ?>

       &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;FAÇA SUA INSCRIÇÃO E MATRICULA PELO WHATSAPP<br> (<a href="https://wa.me/+5511991000907?text=Olá!" target="_blank" onclick="return confirm('Você será direcionado para o whatsapp do Sensei Guto. Digite sua mensagem e no app clique em enviar msg.')"><i class="fa fa-whatsapp" style="color: darkgreen; font-weight: bold;"></i><span style="color: black;"> 99100 0907&nbsp;</span></a>)

    <?php }else{ ?>

      <?php if( $modalidade["idmodal"] == 39 ){ ?>

          Faça a sua inscrição para o <br> JUDÔ <br> <a href="/judo"><span style="color: red;"> &nbsp;clique aqui</span></a>

      <?php }else{ ?>
      
      <?php if( $modalidade["idmodal"] == 46 ){ ?>

          Ainda não começaram as inscrições para a ZUMBA. O link para a inscrição irá aparecer aqui a partir da segunda quinzena de fevereiro de 2023. Aguardem!!!

      <?php }else{ ?>
      
            

        <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
          
            

    <?php } ?>  
      
     <?php } ?>

    <?php } ?>
                   
     </span>
    </div>     
  </div>
</div>
 <?php } ?>

  <div class="row" style="margin: -5px 10px -5px 10px; ">   
  <div class="col-md-6" style="text-align-last: left; background-color: #cc5d1e; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;"> 
    <a href="/modalidades">           
      <div style="text-align-last: center; font-weight: bold; line-height: 30px; color: white; font-size: 14sx; font-style: normal; margin: 10px 5px 10px 5px; ">                                               
          Cursos por modalidade
      </div>
    </a>
  </div> 
  <div class="col-md-6" style="text-align-last: left; background-color: #0f71b3; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
    <a href="/locais">                          
      <div style="text-align-last: center; font-weight: bold; line-height: 30px; color: white; font-size: 14sx; font-style: normal; margin: 10px 5px 10px 0px; ">                                               
          Cursos por Centro Esportivo
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


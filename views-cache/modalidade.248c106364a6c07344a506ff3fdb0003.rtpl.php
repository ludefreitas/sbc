<?php if(!class_exists('Rain\Tpl')){exit;}?><style type="text/css">
    #alert-box{
   display:block;
   position:fixed;
   width:200px;
   padding:5px 20px 20px;
   background:#ddd;
   border:1px solid #999;
   text-align:center;
   transform:translate(-50%,-50%);
   top:50%;
   left:50%;
   z-index:99999;
   -webkit-box-shadow: 0px 0px 33px -6px rgba(0,0,0,0.59);
   -moz-box-shadow: 0px 0px 33px -6px rgba(0,0,0,0.59);
   box-shadow: 0px 0px 33px -6px rgba(0,0,0,0.59);
}

#popup{
    position: fixed;
    top: 0; 
    bottom: 0;
    left: 0; 
    right: 0;
    margin: auto;
    width: 300px;
    height: 216px;
    padding: 0px; 
    background-color: lightgray;
  }

  #popupimage{
    position: fixed;
    top: 0; 
    bottom: 0;
    left: 0; 
    right: 0;
    margin: auto;
    width: 300px;
    height: 180px;
    padding: 0px;
    border: solid 1px #4c4d4f;
    background: #ccc;    
  }
</style>

<script type="text/javascript">

    function imageNone() {

    document.getElementById('popup').hidden = true 
    
    }

    function alertTokenVulnerabilidade(idlocal){

        let local = idlocal

        let msg_alerta = '<div id="alert-box">'
        +'<h5>O que é Vulnerabilidade Social?</h5>'
        +'<p>“Vulnerabilidade social é o conceito que caracteriza a condição dos grupos de indivíduos que estão à margem da sociedade, ou seja, pessoas ou famílias que estão em processo de exclusão social, principalmente por fatores socioeconômicos. (…) As pessoas que são consideradas “vulneráveis sociais” são aquelas que estão perdendo sua representatividade na sociedade, e geralmente dependem de auxílios de terceiros para garantirem a sua sobrevivência” </p>'
        +'<a href="javascript:history.go(0)" style="padding:5px 10px;" type="button" value="OK"  >Voltar</a>'

        +'</div>';

    document.write(msg_alerta);

    }       
    /*
    function encerradas(){

        alert('As inscrições para a temporada de 2024 tem a previsão de iniciar em 15 de janeiro de 2024, a parir das 10:00h para as turmas de natação e hidroginástica e a partir das 16:00h para as demais modalidades.\n\nTodo o processo de inscrição será realizado pelo site:\n\nhttps://cursosesportivossbc.com\n\nImportante:\n\nDe 15/01 a 14/02, cada pessoa só poderá escolher 1(uma) modalidade\n\nDe 15/02 a 14/03, será permitida a inscrição em uma segunda modalidade\n\nA partir de 15/03 será permitida a inscrição em uma terceira modalidade')
        
    }
    */

    /*
    let msg_alerta = '<div id="alert-box">'
        +'<h5>O que é Vulnerabilidade Social?</h5>'
        +'<p>Pessoa em situação de VULNERABILIDADE SOCIAL, é a pessoa que participa de programas sociais do governo, como por exemplo o "Bolsa Família" e que tem o cadastro no CadUnico/NIS com o respectivo número de inscrição.</p>'
        +'<input style="padding:5px 10px;" type="button" value="OK" onclick="sair()" />'
        +'</div>';

    document.write(msg_alerta);

    function sair(){

        document.getElementById('alert-box').hidden = true
    }

    */
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


    function GR(){

        alert('Incrições para as vagas remanescentes de Ginástica Rítimica (GR) estarão disponíveis no site a partir de 07/02/2023.')
    }
    
    
    /*
    
    function alertTokenVunerabilidade(){

        alert("O que é Vulnerabilidade Social?\n\nPessoa em situação de VULNERABILIDADE SOCIAL, é a pessoa que participa de programas sociais do governo, como por exemplo o Bolsa Família e que tem o cadastro no CadUnico/NIS com o respectivo número de inscrição. ")
    }
    */

    function encerradas(){

        alert('As inscrições para a temporada de 2024 tem a previsão de iniciar em 15 de janeiro de 2024, a parir das 10:00h para as turmas de natação e hidroginástica e a partir das 16:00h para as demais modalidades.\n\nTodo o processo de inscrição será realizado pelo site:\n\nhttps://cursosesportivossbc.com\n\nImportante:\n\nDe 15/01 a 14/02, cada pessoa só poderá escolher 1(uma) modalidade\n\nDe 15/02 a 14/03, será permitida a inscrição em uma segunda modalidade\n\nA partir de 15/03 será permitida a inscrição em uma terceira modalidade')
        return
        
    }


  
   function alertTokenCreeba(){

      alert("Conforme Resolução SESP Nº 006 de 15/12/2023 Art.2º §2º, os interessados em participar das turmas de inclusão para Pessoas com Deficiência (PCD) e/ou laudo médico do CREEBA, deverão comparecer pessoalmente (interessado ou representante legal) no CREEBA")
    }
    
    function alertTokenBaetao(){

      alert("Para fazer a inscrição nas turmas de natação intermediário, avançado e aperfeiçoamento para o ano de 2024 é necessário ser egresso das turmas do ano de 2023 e ter autorização fornecida pelo professor.")
    }
    
    function alertTokenPauliceia(){

      alert("Para fazer a inscrição nas turmas de natação intermediário, avançado e aperfeiçoamento para o ano de 2024 é necessário ser egresso das turmas do ano de 2023 e ter autorização fornecida pelo professor.")
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
   
   
   
   <?php if( $modalidade["idmodal"] == 55 ){ ?>
            Para fazer a inscrição e matrícula na modalidade Xadrez, você deve entrar em contato com o profº Rodrigo Scimini através Whatsapp abaixo.
        <?php }else{ ?>
   
        <?php if( $modalidade["idmodal"] == 38 ){ ?>
            Para fazer a inscrição e matrícula na modalidade Karatê, você deve entrar em contato com o Sensei Guto através Whatsapp abaixo.
        <?php }else{ ?>
        
            <?php if( $modalidade["idmodal"] == 39 ){ ?>
                Para fazer a inscrição na modalidade Judô, Clique no link abaixo.
            
            <?php }else{ ?>
            
                <?php if( $modalidade["idmodal"] == 61 ){ ?>
                        Para maiores informações sobre o <span style="font-weight: bold; font-size: 20px; color: orange;"><?php echo htmlspecialchars( $modalidade["descmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>, que desenvolve esportes e aulas de libras para surdos, entre em contato pelo Whatsapp clicando no link abaixo.
                
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
          <!-- <a href="/cart/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add" style="text-decoration: none"> 
          -->
             
        <h5 style="color: #000000"> 
            <span style="font-weight: bold;">
                <?php if( $value1["idstatustemporada"] == 3 ){ ?> 
              [ <span style="font-weight: bold; font-size: 14px; color: darkorange;">
              <?php echo htmlspecialchars( $value1["descstatustemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  </span>]
              <?php } ?>            
                <?php echo htmlspecialchars( $value1["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  
                <?php if( $modalidade["idmodal"] == 19 ){ ?>
                <span style="font-size: 14px; font-weight: bold; color: green;"> - ( Yoga, Chi Kung e Dança Circular )</span>
                <?php } ?>
                <br>
            
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
              

                   
                        
              
             
              <!--
              <?php if( $value1["idstatustemporada"] == 4 ){ ?> 
               <span style="color: red;">
                <?php echo htmlspecialchars( $value1["descstatustemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </span> <br> 
               <span style="font-weight: bold;">
              <?php echo htmlspecialchars( $value1["numinscritos"], ENT_COMPAT, 'UTF-8', FALSE ); ?> inscritos para <?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas                          
              <?php } ?>
              -->
             

              <?php if( $value1["idstatustemporada"] == 6 ){ ?> 
              
                     

                         <span style="color: red;">
                         <?php echo htmlspecialchars( $value1["descstatustemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>. <br>
                        <span style="color: black;">Novas inscrições a partir de <?php echo formatDate($value1["dttermmatricula"]); ?>.</span>
                        
                   
              <?php } ?>
              
              <!--
              <?php if( $value1["numinscritos"] > $value1["vagas"] && $value1["idstatustemporada"] == 4 ){ ?> <br>
              </span> 
               <span style="color: orange;">
                Para esta turma terá sorteio de vagas<br>
              </span>              
              <?php } ?>
              -->

              <?php if( $value1["idstatustemporada"] == 5 ){ ?>
              
                <?php if( $value1["numinscritos"] < $value1["vagas"] && $value1["idstatustemporada"] == 5 ){ ?> 

                   <?php if( $value1["nummatriculados"] < $value1["vagas"] && $value1["idstatustemporada"] == 5 ){ ?> 
                      
                      <?php if( ($value1["idturma"] == 264) OR ($value1["idturma"] == 265) OR ($value1["idturma"] == 266) OR ($value1["idturma"] == 267) OR ($value1["idturma"] == 447) OR ($value1["idturma"] == 448) OR ($value1["idturma"] == 449) OR ($value1["idturma"] == 455) ){ ?>
                      
                        <span style="color: darkgreen;">
                        <strong>Clique para fazer sua inscrição</strong><br>
                      </span>
                      
                      <?php }else{ ?>
                      <!--
                        <span style="color: green; font-size: 14px;">
                        <?php echo htmlspecialchars( $value1["numinscritos"], ENT_COMPAT, 'UTF-8', FALSE ); ?> inscritos para <?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas   
                        
                      </span><br>
                      -->
                       
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
                     <a href="/insc-turma-temporada-listaespera/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/user/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: orangered;">Consulte a lista de espera, clicando aqui.  </a>
                    </h6>
                    -->
                <?php } ?>
              <?php } ?>
            
          </h5>
          
          
        <!-- </a> -->
        <?php if( $value1["token"] == 1 ){ ?> 
           
          <?php if( $value1["idlocal"] == 5 ){ ?>

              <h5><span style="color: darkblue;" >
                <strong>Necessário token</strong>&nbsp;             
              </span>
              <a href="#" onmousemove="alertTokenCreeba()"><i class="fa fa-info-circle" style="font-size: 24px;"></i></a></h5>
            <?php } ?>

            <?php if( $value1["idlocal"] == 3 ){ ?>

              <h5><span style="color: darkblue;" >
                <strong>Necessário token</strong>&nbsp;             
              </span>
              <a href="#" onmousemove="alertTokenBaetao()"><i class="fa fa-info-circle" style="font-size: 24px;"></i></a></h5>
            <?php } ?>
            
            <?php if( $value1["idlocal"] == 21 ){ ?>

              <h5><span style="color: darkblue;" >
                <strong>Necessário token</strong>&nbsp;             
              </span>
              <a href="#" onmousemove="alertTokenBaetao()"><i class="fa fa-info-circle" style="font-size: 24px;"></i></a></h5>
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
                
          
                <?php if( $value1["idstatustemporada"] == 2 ){ ?> 
                
                        <a class="btn btn-info" style="background-color: #cc5d1e; color: white;"  onclick="encerradas()">Inscrever-se</a>
                
                <?php } ?>
                
                <?php if( $value1["idstatustemporada"] == 3 ){ ?> 
                    
                
                        <a class="btn btn-info" style="background-color: #cc5d1e; color: white;"  onclick="encerradas()">Inscrever-se</a>
                    
                
                <?php } ?>
                
                <?php if( $value1["idstatustemporada"] == 4 ){ ?> 
                    
                
                    <a class="btn btn-info" style="background-color: #cc5d1e; color: white;"  href="/cart/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add">Inscrever-se</a>
                    
               
              <?php } ?>
              
              <?php if( $value1["idstatustemporada"] == 5 ){ ?> 
                    <a class="btn btn-info" style="background-color: #cc5d1e; color: white;"  href="/cart/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add">Inscrever-se</a>
                
               
              <?php } ?>
                
             

                
            
            
                
              <a class="btn btn-success" style="font-weight: bold; color: white;" onclick="getVagas('/vagas-turma/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idturmastatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')"> Vagas </a> 
              &nbsp;&nbsp;
              <a href="#" onclick="alertTokenVulnerabilidade(<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"><i class="fa fa-info-circle" style="font-size: 18px;"></i></a>
              
            <br> 
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
           
    <?php if( $modalidade["idmodal"] == 55 ){ ?>
    
           &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;FAÇA SUA INSCRIÇÃO E MATRICULA PELO WHATSAPP<br> (<a href="https://wa.me/+5511944583463?text=Olá!" target="_blank" onclick="return confirm('Você será direcionado para o whatsapp do profº Rodrigo Scimini. Digite sua mensagem e no app clique em enviar msg.')"><i class="fa fa-whatsapp" style="color: darkgreen; font-weight: bold;"></i><span style="color: black;"> 94458 3463&nbsp;</span></a>)
    
        <?php }else{ ?>
           
        <?php if( $modalidade["idmodal"] == 38 ){ ?>
    
           &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;FAÇA SUA INSCRIÇÃO E MATRICULA PELO WHATSAPP<br> (<a href="https://wa.me/+5511991000907?text=Olá!" target="_blank" onclick="return confirm('Você será direcionado para o whatsapp do Sensei Guto. Digite sua mensagem e no app clique em enviar msg.')"><i class="fa fa-whatsapp" style="color: darkgreen; font-weight: bold;"></i><span style="color: black;"> 99100 0907&nbsp;</span></a>)
    
        <?php }else{ ?>
        
            <?php if( $modalidade["idmodal"] == 61 ){ ?>
    
               &nbsp; OBTENHA MAIS INFORMAÇÕES SOBRE O PROJETO SINAIS<br> <a href="https://wa.me/+5511912672403?text=Olá!" target="_blank" onclick="return confirm('Você será direcionado para o whatsapp, onde irá conversar com um dos nossos atendentes. Digite sua mensagem, e no app clique em enviar msg.')"> Clique aqui <br>
                   <i class="fa fa-whatsapp" style="color: darkgreen; font-weight: bold;"></i>&nbsp;<span style="color: black;">
                  
                   
                   (11) 91267 2403
    
               &nbsp;</span></a>
    
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
  <div id="popup" style="text-align-last: center; border-radius: 15px"> 
            <div style="text-align-last: right; font-weight: bold; " onclick="imageNone()"> x &nbsp;&nbsp;
            </div>  
            
            <div style="background-color: lightgreen; text-align: justify; border-radius: 15px 15px 15px 15px; padding: 10px; font-size: 13px; font-weight: bold;">
                <span style="color: red;"> ATENÇÃO! </span><br>
                    LEMBRAMOS que: se você já fez uma inscrição, sua PRIMEIRA OPÇÃO, para a temporada 2024 e está matriculado(a), ou está aguardando matrícula, ou ainda está na lista de espera, você deve aguardar até o dia 15/02 para fazer uma nova inscrição, sua SEGUNDA OPÇÃO, para as vagas remanescentes. 
            </div> 
    </div>
 -->
  
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


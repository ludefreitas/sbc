<?php if(!class_exists('Rain\Tpl')){exit;}?><script type="text/javascript">

      function dadosAtestado(idpess){

        let url = '/admin/saude/dadosatestado/'+idpess

        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url');        
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          if (window.confirm(' '+ result + 'Para atualizar atestado CLÍNICO clique em "OK"'))
          {
              adicionarArtestado(idpess)
          };

        });
      }

      function adicionarArtestado(idpess){
        
        let confirmaAtestado = confirm('Deseja realmente atualizar atestado CLÍNICO?')

        if(confirmaAtestado == true)
        {                      
            var data = prompt("Informe a data da emissão do Atestado CLÍNICO. Ex.: dd-mm-aaaa");     


            if (data == null || data == "") {

                alert("As informaçãoes do atestado CLÍNICO não foram atualizadas! Informe a data e faça alguma observação")
            } else {

                 var traco1 = data.substr(2,1)
                 var traco2 = data.substr(5,1)
                 var dia = data.substr(0,2);
                 var mes = data.substr(3,2);
                 var ano = data.substr(6,4); 
                 
                 if((traco1 != '-') || (traco2 != '-') || (ano.length < 4)){
                    alert('Formato da data inválida');
                 }else{

                    if((dia > 31) || (dia == 0) || (mes > 12) || (mes == 0)){

                    alert('data inválida!')
                    
                    }else{

                        //alert('Data validada!!! ' + dia + ' ' + mes + ' ' + ano)

                        
                        var observ = prompt("Digite uma observação");
                        if (observ == null || observ == "") {
                                lert("As informaçãoes do atestado CLÍNICO não foram atualizadas! Informe a data e faça alguma observação.");
                        } else {

                            let url = '/admin/saude/atulizaatestado/'+idpess+'/'+data+'/'+observ+''

                            atualizarAtestado(url) 
                        }           
                    }                           
                }
            }        
        } 
         //let url = '/admin/saude/dadosatestado/'+idpess

        //dadosAtestado(url)  
    }
      /*
      function dadosAtestado(url){

        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url');        
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          alert(result)

        });
      }
      */

      function atualizarAtestado(url){

        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url');        
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          alert(result)

        });
      }

      function atualizarAtestadoDerma(url){

        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url');        
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          alert(result)

        });
      }

      function dadosAtestadoDerma(idpess){

        let url = '/admin/saude/dadosatestadoderma/'+idpess

        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url');        
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          if (window.confirm(' '+ result + 'Para atualizar atestado DERMATOLÓGICO clique em "OK"'))
          {
              adicionarArtestadoDerma(idpess)
          };

        });
      }

      function adicionarArtestadoDerma(idpess){
        
        let confirmaAtestado = confirm('Deseja realmente atualizar atestado DERMATOLÓGICO?')

        if(confirmaAtestado == true)
        {                      
            var data = prompt("Informe a data da emissão do Atestado DERMATOLÓGICO. Ex.: dd-mm-aaaa");     


            if (data == null || data == "") {

                alert("As informaçãoes do atestado DERMATOLÓGICO não foram atualizadas! Informe a data e faça alguma observação")
            } else {

                 var traco1 = data.substr(2,1)
                 var traco2 = data.substr(5,1)
                 var dia = data.substr(0,2);
                 var mes = data.substr(3,2);
                 var ano = data.substr(6,4); 
                 
                 if((traco1 != '-') || (traco2 != '-') || (ano.length < 4)){
                    alert('Formato da data inválida');
                 }else{

                    if((dia > 31) || (dia == 0) || (mes > 12) || (mes == 0)){

                    alert('data inválida!')
                    
                    }else{

                        //alert('Data validada!!! ' + dia + ' ' + mes + ' ' + ano)

                        
                        var observ = prompt("Digite uma observação");
                        if (observ == null || observ == "") {
                                lert("As informaçãoes do atestado DERMATOLÓGICO não foram atualizadas! Informe a data e faça alguma observação.");
                        } else {

                            let url = '/admin/saude/atulizaatestadoderma/'+idpess+'/'+data+'/'+observ+''

                            atualizarAtestadoDerma(url) 
                        }           
                    }                           
                }
            }        
        } 
         //let url = '/admin/saude/dadosatestado/'+idpess

        //dadosAtestado(url)  
    }

      function requisitarPaginaEndereco(url){

        let ajax = new XMLHttpRequest();
        let idurl = url.substr(53);              
        ajax.open('GET', 'url');
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          if(result){              
                alert(result)
          }else{
            alert('Endereço não encontrado!')
          }
        });
      }   

      function openDiv(id_categoria_evento){

        let idcategoria = id_categoria_evento;
              
            document.getElementById('idcategoria'+idcategoria ).hidden = false  
            document.getElementById('btnCategoriaClose'+idcategoria ).hidden = false
            document.getElementById('btnCategoriaOpen'+idcategoria ).hidden = true      
      }

      function closeDiv(id_categoria_evento){

        let idcategoria = id_categoria_evento;

            document.getElementById('idcategoria'+idcategoria ).hidden = true  
            document.getElementById('btnCategoriaOpen'+idcategoria ).hidden = false  
            document.getElementById('btnCategoriaClose'+idcategoria ).hidden = true 
          
      }

</script>


<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
     [<?php echo htmlspecialchars( $evento["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>]  <?php echo htmlspecialchars( $evento["desc_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $evento["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> -   <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
  </h1>
  <ol class="breadcrumb">

    <li><a href="/admin/evento/create"><i class="fa fa-pencil"></i> Criar evento</a></li>
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/admin/eventos-por-temporada/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Eventos temporada atual</a></li>
    <li class="active"><a style="color: red" href="javascript: history.go(-1)">Voltar</a>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-12">
        <div class="box box-primary">

          <?php if( $error != '' ){ ?>
                <div class="alert alert-danger" style="margin: 10px 10px 0px 10px">
            <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
          <?php } ?>
          <?php if( $success != '' ){ ?>
                <div class="alert alert-success" style="margin: 10px 10px 0px 10px">
            <?php echo htmlspecialchars( $success, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
          <?php } ?>
            
            <div class="box-header">
           
            </div>

          <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
           

        <?php $counter1=-1;  if( isset($categorias) && ( is_array($categorias) || $categorias instanceof Traversable ) && sizeof($categorias) ) foreach( $categorias as $key1 => $value1 ){ $counter1++; ?>            

                <?php $idcategoria_evento = $value1["idcategoria_evento"]; ?>

                    <div  id="btnCategoriaOpen<?php echo htmlspecialchars( $idcategoria_evento, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        <div style="text-align: center; border-radius: 5px; margin: 5px; height: 30px" class="btn-primary col-md-12" onclick="openDiv(<?php echo htmlspecialchars( $idcategoria_evento, ENT_COMPAT, 'UTF-8', FALSE ); ?>)" ><?php echo htmlspecialchars( $value1["desc_categoria_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                        <i class="fa fa-caret-down"></i></div> 
                    </div>

                    <div  id="btnCategoriaClose<?php echo htmlspecialchars( $idcategoria_evento, ENT_COMPAT, 'UTF-8', FALSE ); ?>" hidden>
                        <div style="text-align: center; border-radius: 5px; margin: 5px; height: 30px" class="btn-primary col-md-12" onclick="closeDiv(<?php echo htmlspecialchars( $idcategoria_evento, ENT_COMPAT, 'UTF-8', FALSE ); ?>)" ><?php echo htmlspecialchars( $value1["desc_categoria_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                     <i class="fa fa-caret-up"> </i></div> 
                    </div>

                <div id="idcategoria<?php echo htmlspecialchars( $idcategoria_evento, ENT_COMPAT, 'UTF-8', FALSE ); ?>" hidden >

                <?php $idadeinicial = $value1["idade_inicial"]; ?>
                <?php $idadefinal = $value1["idade_final"]; ?>

              
            <?php $counter2=-1;  if( isset($insc_eventoTodas) && ( is_array($insc_eventoTodas) || $insc_eventoTodas instanceof Traversable ) && sizeof($insc_eventoTodas) ) foreach( $insc_eventoTodas as $key2 => $value2 ){ $counter2++; ?>

            <?php if( $value2["idade_pessoa_no_evento"] >= $idadeinicial && $value2["idade_pessoa_no_evento"] <= $idadefinal  ){ ?>            
            
            <div style="text-align: center; border: solid 1px lightblue;">
              <div <?php echo colorStatus($value2["idstatus_insc_evento"]); ?> style="margin: 5px">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-6" style="margin: 2; padding: 2">
                    <h5 style="text-align: left;">
                      <?php echo htmlspecialchars( $value2["numordem_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>º -
                      <strong>[<?php echo htmlspecialchars( $value2["idinsc_evento_indiv"], ENT_COMPAT, 'UTF-8', FALSE ); ?>] - <?php echo htmlspecialchars( $value2["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
                      <?php if( UserIsAdmin() ){ ?>
                      &nbsp;<?php echo htmlspecialchars( $value2["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;
                      <?php }else{ ?>
                      &nbsp;<?php echo formatCpf($value2["numcpf"]); ?>&nbsp;
                      <?php } ?>                      
                      <strong><?php echo calcularIdade($value2["dtnasc"]); ?> anos - </strong> 
                      &nbsp;idade declarada: [<?php echo htmlspecialchars( $value2["idade_pessoa_no_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>]&nbsp; 
                      <strong>Nascim.: <?php echo formatDate($value2["dtnasc"]); ?><strong>

                      <?php if( existeParq($value2["idpess"]) ){ ?>

                        <?php if( repostaSimParq($value2["idpess"]) ){ ?>

                        <strong><a style="font-weight: bold; color: green;" href="/admin/par-q/pessoa/<?php echo htmlspecialchars( $value2["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> <i style="color: orange;" class="fa fa-exclamation-triangle"> </i> PAR-Q <i style="color: orange;" class="fa fa-exclamation-triangle"> </i></a> </strong>

                        <?php }else{ ?>

                        <strong><a style="font-weight: bold; color: green;" href="/admin/par-q/pessoa/<?php echo htmlspecialchars( $value2["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> PAR-Q </a> </strong>

                        <?php } ?>


                      <?php }else{ ?>

                      <strong><a style="font-weight: bold; color: red;" onclick="alert('Não existe Par-q para este aluno')"> PAR-Q </a> </strong>

                      <?php } ?>   

                       <br><br>
                      <span style="color: black; font-weight: bold">Atestado:  </span>
                      <span style="color: darkred; font-weight: bold">  
                        <?php echo getAtestadoClinicoProfExiste($value2["numcpf"], 1); ?>
                        </span>
                        &nbsp;
                         <a style="color: orange; text-align-last: right;" onclick="dadosAtestado(<?php echo htmlspecialchars( $value2["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"><?php echo getAtestadoIconeByNumCpf($value2["numcpf"]); ?></a>   
                         
                          &nbsp;&nbsp;
                         <span style="color: darkred;">  
                         <?php echo getAtestadoDermaProfExiste($value2["numcpf"], 2); ?>
                          </span>
                        &nbsp;                          
                         <a style="color: orange; text-align-last: right;" onclick="dadosAtestadoDerma(<?php echo htmlspecialchars( $value2["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"><?php echo getAtestadoDermaIconeByNumCpf($value2["numcpf"]); ?></a>
                          &nbsp; &nbsp;

                    </h5>
                  </div>

                  <div class="col-md-6" style="margin: 2; padding: 2">
                    <h5 style="text-align: left;">               
                       <strong>Resp: </strong><?php echo htmlspecialchars( $value2["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                       &nbsp;
                       <a href="https://wa.me/+55<?php echo htmlspecialchars( $value2["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá <?php echo htmlspecialchars( $value2["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>!" target="_blank" onclick="return confirm('Você será direcionado para o whatsapp do aluno ou responsável. Digite sua mensagem e no app clique em enviar msg.')"><i class="fa fa-whatsapp" style="color: darkgreen; font-weight: bold;"></i><span style="color: black;"> <?php echo htmlspecialchars( $value2["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;</span></a>
                       
                       &nbsp;&nbsp;&nbsp;&nbsp;

                       <a style="font-weight: bold;" onclick="requisitarPaginaEndereco('/prof/insc-evento-temporada-endereco/<?php echo htmlspecialchars( $value2["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')"><i class="fas fa-map-marker-alt"></i> Endereço </a>         

                        &nbsp;&nbsp;&nbsp;&nbsp;
                       
                      <strong>Dt Insc.: </strong><?php echo formatDate($value2["dt_insc_evento"]); ?>
                      &nbsp;<strong>Dt Exclusão.: </strong><?php echo formatDate($value2["dt_exclusao_insc_evento"]); ?>&nbsp;
                    </h5>
                  </div>                   
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">                  

                  <div class="col-md-6" style="margin: 2; padding: 2">
                    <h5 style="text-align: left;">  

                      <span style="font-weight: bold; text-align: left; color: brown;">                  
                        <?php if( $value2["insc_evento_pvs"] == 1 ){ ?> (Vuln. Social) &nbsp;&nbsp;<?php } ?>
                      </span> 
                      
                      <span style="font-weight: bold; text-align: left; color: darkblue;">  
                        <?php if( $value2["insc_evento_pcd"] == 1 ){ ?> PCD &nbsp;&nbsp;<?php } ?>  
                      </span> 

                      <span style="font-weight: bold; text-align: left; color: darkgreen; font-weight: bold;">                  
                        <?php if( $value2["insc_evento_laudo"] == 1 ){ ?>LAUDO  &nbsp;&nbsp;<?php } ?>
                       </span>
                   
                  

                    <?php if( $value2["idstatus_insc_evento"] == 1 ){ ?>              
                    <span style="font-weight: bold; text-align: left; color: blue;">                  
                      <span><?php echo htmlspecialchars( $value2["descstatus_insc_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    </span>             
                    <?php } ?>

                  
              
                    <?php if( $value2["idstatus_insc_evento"] == 2 ){ ?>
              
                    <span style="font-weight: bold; text-align: left; color: darkgreen;">                  
                      <span><?php echo htmlspecialchars( $value2["descstatus_insc_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    </span>
             
                    <?php } ?>
               

                      <?php if( $value2["idstatus_insc_evento"] == 3 ){ ?>
                      
                        <span style="font-weight: bold; text-align: left; color: green;">                  
                          <span>*<?php echo htmlspecialchars( $value2["descstatus_insc_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>*</span>
                        </span>
                      
                      <?php } ?>

                      <?php if( $value2["idstatus_insc_evento"] == 6 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: darkorange;">                  
                          <span><?php echo htmlspecialchars( $value2["descstatus_insc_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>


                      <?php if( $value2["idstatus_insc_evento"] == 7 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: darkblue;">                  
                          <span><?php echo htmlspecialchars( $value2["descstatus_insc_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>

                      
                      <?php if( $value2["idstatus_insc_evento"] == 8 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: orange;">                  
                          Status: <span><?php echo htmlspecialchars( $value2["descstatus_insc_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>
                      
                      <?php if( $value2["idstatus_insc_evento"] == 9 ){ ?>
                      
                        <span style="font-weight: bold; text-align: left; color: red;">                  
                          <span><?php echo htmlspecialchars( $value2["descstatus_insc_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      
                      <?php } ?> 
                       </h5>               
                    </div>


              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/admin/profile/insc_evento/<?php echo htmlspecialchars( $value2["idinsc_evento_indiv"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value2["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $evento["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button">Detalhes</a>
                </h5>
              </div> 


              
              <?php if( $value2["idstatus_insc_evento"] == 1 ){ ?>
                <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a class="btn btn-danger btn-xs" href="/admin/insc_evento/<?php echo htmlspecialchars( $value2["idinsc_evento_indiv"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value2["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value2["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusDesistente" role="button" onclick="return confirm('Deseja realmente informar como desistente o <?php echo htmlspecialchars( $value2["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da inscrição <?php echo htmlspecialchars( $value2["idinsc_evento_indiv"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?')">Marcar como desistente</a>
                </h5>
                </div>
              <?php } ?>         

              <?php if( $value2["idstatus_insc_evento"] == 2 ){ ?>
                <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/admin/insc_evento/<?php echo htmlspecialchars( $value2["idinsc_evento_indiv"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $evento["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusMatriculada" onclick="return confirm('Deseja realmente efetuar a MATRÍCULA do(a) <?php echo htmlspecialchars( $value2["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> na evento <?php echo htmlspecialchars( $evento["desc_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-success btn-xs"><i></i> Matricular</a>
                </h5>
                </div>
                
              <?php } ?>

              <?php if( $value2["idstatus_insc_evento"] == 3 ){ ?>
            <!--
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">            
                  <a href="/admin/insc_evento/<?php echo htmlspecialchars( $value2["idinsc_evento_indiv"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $evento["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/enviarEmailASorteado" onclick="return confirm('Deseja realmente enviar email para que o(a) <?php echo htmlspecialchars( $value2["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> fique sabendo que foi sorteado na evento de <?php echo htmlspecialchars( $evento["desc_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-info btn-xs"><i></i> Avisar Sorteado </a>
                </h5>
              </div>
            -->
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/admin/insc_evento/<?php echo htmlspecialchars( $value2["idinsc_evento_indiv_evento_indiv"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $evento["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusMatriculada" onclick="return confirm('Deseja realmente efetuar a MATRÍCULA do(a) <?php echo htmlspecialchars( $value2["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> na evento <?php echo htmlspecialchars( $evento["desc_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-success btn-xs"><i></i> Matricular</a>
                </h5>
                </div>
                

              <?php } ?>
              
              <?php if( $value2["idstatus_insc_evento"] == 7 ){ ?>
              <div class="col-md-2" style="margin: 1; padding: 1">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="https://wa.me/+55<?php echo htmlspecialchars( $value2["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá,%20informamos%20que%20temos%20uma%20vaga%20disponível%20para%20o(a)%20<?php echo htmlspecialchars( $value2["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20na%20evento%20de%20<?php echo htmlspecialchars( $evento["desc_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $evento["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20das%20<?php echo htmlspecialchars( $evento["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20às%20<?php echo htmlspecialchars( $evento["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20no%20<?php echo htmlspecialchars( $evento["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $evento["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20Nº%20<?php echo htmlspecialchars( $evento["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $evento["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>,%20da%20qual%20você%20fez%20inscrição.%20Se%20você%20ainda%20tem%20interesse%20na%20vaga,%20responda%20SIM%20nas%20próximas%2024%20horas,%20que%20vamos%20passar%20mais%20informações.%20Se%20você%20não%20tiver%20interesse%20ou%20não%20responder,%20vamos%20chamar%20o%20próximo%20inscrito%20da%20lista%20de%20espera%20e%20você%20terá%20que%20fazer%20uma%20nova%20inscrição%20para%20esta%20evento." target="_blank" onclick="return confirm('Você será direcionado para o whatsapp com a mensagem referente a vaga disponível já preenchida. No app clique em enviar msg.')" class="btn btn-success btn-xs"><i></i>Informar vaga pelo WhatsApp</a>
              
              
              </h5>
              </div>
                <div class="col-md-2" style="margin: 1; padding: 1">
              <h5>
              
               
                  <a href="/admin/insc_evento/<?php echo htmlspecialchars( $value2["idinsc_evento_indiv"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $evento["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusAguardandoMatricula" onclick="return confirm('Você já informou, por telefone ou whatsapp, o(a) <?php echo htmlspecialchars( $value2["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> sobre a vaga disponível para a evento de <?php echo htmlspecialchars( $evento["desc_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>? Se sim, clique em OK, se não imformou, clique em cancelar e informe o aluno sobre a vaga.')" class="btn btn-warning btn-xs"><i></i> Marcar aguardandado matrícula</a>
                </h5>
              </div>
              <!--
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/admin/insc_evento/<?php echo htmlspecialchars( $value2["idinsc_evento_indiv"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $evento["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusSorteada" class="btn btn-danger btn-xs"><i></i> Sorteada ?</a>
                </h5>
              </div>
              -->
               
              <!--
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/admin/insc_evento/<?php echo htmlspecialchars( $value2["idinsc_evento_indiv"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $evento["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusSorteada" onclick="return confirm('Deseja realmente que a inscrição <?php echo htmlspecialchars( $value2["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  do(da) <?php echo htmlspecialchars( $value2["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> seja confirmada como Sorteada na evento de <?php echo htmlspecialchars( $evento["desc_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-danger btn-xs"><i></i> Sorteada ?</a>
                </h5>
              </div>
            -->
            
            
               <?php } ?>
                  
                </div>
              </div>
              
            </div>
          </div>

          <?php }else{ ?>
            <div style="text-align: center; color: red; border: solid 1px lightblue;">Não há inscrições para a categoria de <?php echo htmlspecialchars( $idadeinicial, ENT_COMPAT, 'UTF-8', FALSE ); ?> a <?php echo htmlspecialchars( $idadefinal, ENT_COMPAT, 'UTF-8', FALSE ); ?> anos</div>
          <?php } ?>
          
           
          <?php } ?>

          

          </div>  
          <?php } ?>

          
                         

          </div>
    </div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->




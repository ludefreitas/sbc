<?php if(!class_exists('Rain\Tpl')){exit;}?>
<script type="text/javascript">

  function atualizaStatus(idturma, desctemporada, idtemporada){

        let status = prompt('Para atualizar o status da turma '+ idturma +' para a temporada '+ desctemporada +' selecionada, digite (n) para:\n 2 - Inscrições não iniciadas\n 3 - Inscrições abertas\n 4 - Inscrições suspensas\n 5 - Inscrições encerradas\n 6 - Turma não iniciada');  
        
        if(status != 2 && status != 3 && status != 4 && status != 5 && status != 6){
          alert("Valor inválido!!!")
          return
        }   
        
        let url = "/prof/atualiza/turmatemporada/"+idturma+"/"+idtemporada+"/"+desctemporada+"/"+status        

        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url'); 
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){         
            if(result){   
            
                let texto = '- '+result
                let idlink = 'idlinkstatus'+idturma
    
                if(status != null){
                  document.getElementById(idlink).innerHTML = texto   
                }         
                            
                if(status == 2){ document.getElementById(idlink).style.color = 'orange'; }
                if(status == 3){ document.getElementById(idlink).style.color = 'darkgreen'; }
                if(status == 4){ document.getElementById(idlink).style.color = "red"; }
                if(status == 5){ document.getElementById(idlink).style.color = 'darkred'; }
                if(status == 6){ document.getElementById(idlink).style.color = 'blue'; }  

          } 

        });
      }
  

  function openDiv(idmodalidade){

        let idmodal = idmodalidade;
              
            document.getElementById('idmodal'+idmodal ).hidden = false  
            document.getElementById('btnModalClose'+idmodal ).hidden = false
            document.getElementById('btnModalOpen'+idmodal ).hidden = true      
  }

  function closeDiv(idmodalidade){

        let idmodal = idmodalidade;

            document.getElementById('idmodal'+idmodal ).hidden = true  
            document.getElementById('btnModalOpen'+idmodal ).hidden = false  
            document.getElementById('btnModalClose'+idmodal ).hidden = true 
          
  }

  $(document).ready(function(){
            $('#data').mask('00-00-0000');
        });

  function popupData(turma, temporada, tipodata) {

            let idturma = turma
            let idtemporada = temporada
            let iddata = tipodata

            document.getElementById('divPopupData').hidden = false 
            document.getElementById('idturma').value = idturma
            document.getElementById('idtemporada').value = idtemporada
            document.getElementById('iddata').value = iddata 

            if(iddata == 1){
                document.getElementById('NomeTipoData').innerHTML = "início das inscrições" 
            }
            if(iddata == 2){
                document.getElementById('NomeTipoData').innerHTML = "fim das inscrições" 
            }
            if(iddata == 3){
                document.getElementById('NomeTipoData').innerHTML = "início das matrículas" 
            }
            if(iddata == 4){
                document.getElementById('NomeTipoData').innerHTML = "fim das matrículas" 
            }
            if(iddata == 5){
                document.getElementById('NomeTipoData').innerHTML = "início das aulas" 
            }
            if(iddata == 6){
                document.getElementById('NomeTipoData').innerHTML = "fim das aulas" 
            }

            

        }

        function AtualizaData(){

            let turma = document.getElementById('idturma').value
            let temporada = document.getElementById('idtemporada').value
            let data = document.getElementById('data').value
            let time = document.getElementById('time').value
            let iddata = document.getElementById('iddata').value



            let hora = time.substr(0,2)
            let minuto = time.substr(3,2)
            let ano = data.substr(0,4);
            let mes = data.substr(5,2);
            let dia = data.substr(8,2); 

            if((dia == '') || (mes == '') || (ano == '') || (hora == '') || (minuto == '')){

                alert('Preencha todos os dados')
            }

            let novadataView = dia+'/'+mes+'/'+ano+' '+hora+':'+minuto
            let novadata = ano+'-'+mes+'-'+dia+' '+hora+':'+minuto

            let url = '/prof/turmatemporada/datas-inicio-fim/'+turma+'/'+temporada+'/'+iddata+'/'+novadata

            let ajax = new XMLHttpRequest();
            ajax.open('GET', 'url');        
            
            $.ajax({
              url: url,
              method: 'GET'  
            }).done(function(result){

              if (!result)
              {
                  alert('Não foi possível atualizar data!')
              };

            });


            document.getElementById('idSpanTipo'+turma+'-'+iddata).innerHTML = novadataView

            document.getElementById('divPopupData').hidden = true 

        }

        function fecharPopupData() {

          document.getElementById('divPopupData').hidden = true;
        }

    function expandir(idturma){

        let iddaturma = idturma;

            document.getElementById('lermais'+iddaturma).hidden = true 
            document.getElementById('lermenos'+iddaturma).hidden = false 
            document.getElementById('escondido1'+iddaturma ).hidden = false  
            document.getElementById('escondido2'+iddaturma ).hidden = false
            document.getElementById('escondido3'+iddaturma ).hidden = false  
          
        }

    function recolher(idturma){

        let iddaturma = idturma;

            document.getElementById('lermais'+iddaturma).hidden = false 
            document.getElementById('lermenos'+iddaturma).hidden = true 
            document.getElementById('escondido1'+iddaturma ).hidden = true  
            document.getElementById('escondido2'+iddaturma ).hidden = true 
            document.getElementById('escondido3'+iddaturma ).hidden = true  
          
    }

    function expandirSpan(idturma){

        let iddaturma = idturma;

            document.getElementById('opcoes'+iddaturma).hidden = false 
            document.getElementById('lerMaisSpan'+iddaturma).hidden = true 
            document.getElementById('lerMenosSpan'+iddaturma).hidden = false 
          
        }

    function recolherSpan(idturma){

        let iddaturma = idturma;

            document.getElementById('opcoes'+iddaturma).hidden = true 
            document.getElementById('lerMaisSpan'+iddaturma).hidden = false
            document.getElementById('lerMenosSpan'+iddaturma).hidden = true  
          
    }


</script>

<style type="text/css">
    
    #divPopupData{
        position: fixed;
        top: 0; 
        bottom: 0;
        left: 0; 
        right: 0;
        margin: auto;
        width: 50%;
        min-height: 100px;
        max-height: 150px;
        padding: 5px; 
        background-color: rgba(255, 165, 0, 1);
    }  

    

</style>

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h4>
 Turmas relacionadas à Temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $temporada["descstatustemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> 

</h4>
<ol class="breadcrumb">
  <li><a href="/prof"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active"><a style="color: red" href="javascript: history.go(-1)">Voltar</a>
    </li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">

  <?php if( $error != '' ){ ?>
          <div class="alert alert-danger" style="margin: 10px 10px 0px 10px">
      <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
          </div>
      <?php } ?>
  <div class="col-md-12">

      <div class="box box-primary"> 

        <div class="box-header"> 


          <h3><?php echo htmlspecialchars( $localdaaula, ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>

       </div>
      </div>
      <div class="box-body" style="border: solid 1px lightblue; margin: 5px;"> 
          <div class="box-body no-padding col-md-12">

            <div class="row">
            <div class="col-md-12">



            <?php $counter1=-1;  if( isset($modalidades) && ( is_array($modalidades) || $modalidades instanceof Traversable ) && sizeof($modalidades) ) foreach( $modalidades as $key1 => $value1 ){ $counter1++; ?>

            

            <?php $idmodalidade = $value1["idmodal"]; ?>


                <div  id="btnModalOpen<?php echo htmlspecialchars( $idmodalidade, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                <div style="text-align: center; border-radius: 5px; margin: 5px;" class="btn-primary col-md-12" onclick="openDiv(<?php echo htmlspecialchars( $idmodalidade, ENT_COMPAT, 'UTF-8', FALSE ); ?>)" ><?php echo htmlspecialchars( $value1["descmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <i class="fa fa-caret-down"> </i></div> 
                </div>

                <div  id="btnModalClose<?php echo htmlspecialchars( $idmodalidade, ENT_COMPAT, 'UTF-8', FALSE ); ?>" hidden>
                <div style="text-align: center; border-radius: 5px; margin: 5px;" class="btn-primary col-md-12" onclick="closeDiv(<?php echo htmlspecialchars( $idmodalidade, ENT_COMPAT, 'UTF-8', FALSE ); ?>)" ><?php echo htmlspecialchars( $value1["descmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <i class="fa fa-caret-up"> </i></div> 
                </div>

                <div id="idmodal<?php echo htmlspecialchars( $idmodalidade, ENT_COMPAT, 'UTF-8', FALSE ); ?>" hidden >
                  
                <div style="text-align: right;">  
                    <a href="/prof/controle-frequencia-por-modalidade-local/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $idmodalidade, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: red; font-weight: bold;"> 
                        Controle de frequência da modalidade
                    </a>
                </div>

                <?php $counter2=-1;  if( isset($turmas) && ( is_array($turmas) || $turmas instanceof Traversable ) && sizeof($turmas) ) foreach( $turmas as $key2 => $value2 ){ $counter2++; ?>
                
                <?php if( $idmodalidade == $value2["idmodal"] ){ ?>
                <div  class="box-body" style="border: solid 1px lightblue; margin: 2px;">

                  <div class="row">

                    <div class="col-md-8" >
                      <span style="text-align: left;">
                       
                      <strong><?php echo htmlspecialchars( $value2["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </strong> 

                        <?php if( $value2["idturmastatus"] == 2 ){ ?>
                          <span>
                            <a id="idlinkstatus<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: orange; font-weight: bold; text-align-last: right;" onclick="atualizaStatus(<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value2["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">- Inscrições não iniciadas</a>
                          </span>

                          <?php } ?>
                          
                          <?php if( $value2["idturmastatus"] == 3 ){ ?>
                          <span>
                            <a id="idlinkstatus<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: darkgreen; font-weight: bold; text-align-last: right;" onclick="atualizaStatus(<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value2["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">- Inscrições abertas</a>
                          </span>

                          <?php } ?>

                          <?php if( $value2["idturmastatus"] == 4 ){ ?>
                          <span>
                            <a id="idlinkstatus<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: red; font-weight: bold; text-align-last: right;" onclick="atualizaStatus(<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value2["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"> - Inscrições suspensas</a>
                          </span>
                          <?php } ?>
                          
                          <?php if( $value2["idturmastatus"] == 5 ){ ?>
                          <span>
                            <a id="idlinkstatus<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: darkred; font-weight: bold; text-align-last: right;" onclick="atualizaStatus(<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value2["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"> - Inscrições encerradas</a>
                          </span>
                          <?php } ?>

                          <?php if( $value2["idturmastatus"] == 6 ){ ?>
                          <span>
                            <a id="idlinkstatus<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: blue; font-weight: bold; text-align-last: right;" onclick="atualizaStatus(<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value2["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"> - Turma não iniciada</a>
                          </span>
                          <?php } ?>



                       - <?php echo htmlspecialchars( $value2["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $value2["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ás <?php echo htmlspecialchars( $value2["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - 
                       <strong><?php echo htmlspecialchars( $value2["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  <?php echo htmlspecialchars( $value2["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> a <?php echo htmlspecialchars( $value2["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> anos -</strong>   <?php echo htmlspecialchars( $value2["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value2["nomeespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp; <span id="lermais<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: darkblue; font-weight: bold;" onclick="expandir(<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">Mais...</span> 

                       <div id="escondido1<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" hidden>

                       <strong> Vagas: (<?php echo htmlspecialchars( $value2["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> Geral)&nbsp; - &nbsp;(<?php echo htmlspecialchars( $value2["vagaslaudo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> Laudo)&nbsp; - &nbsp;(<?php echo htmlspecialchars( $value2["vagaspcd"], ENT_COMPAT, 'UTF-8', FALSE ); ?> PCD)&nbsp; - &nbsp;(<?php echo htmlspecialchars( $value2["vagaspvs"], ENT_COMPAT, 'UTF-8', FALSE ); ?> PVS)</strong>
                       <br>

                         Início inscrições:

                         <?php if( $value2["data_insc_inicial"] == null ){ ?> 
                         <span id="idSpanTipo<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-1">
                                ___/___/___ 00:00:00
                         </span>

                         &nbsp; <a onclick="popupData(<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, 1)"> [alterar] </a><br>
                         <?php }else{ ?>
                         <span id="idSpanTipo<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-1">
                            <?php echo formatDateHour($value2["data_insc_inicial"]); ?> 
                         </span>

                         &nbsp; <a onclick="popupData(<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, 1)"> [alterar] </a><br>
                         <?php } ?>   

                         Fim inscrições: 

                         <?php if( $value2["data_insc_final"] == null ){ ?> 
                         <span id="idSpanTipo<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-2">
                                ___/___/___ 00:00:00
                         </span>

                         &nbsp; <a onclick="popupData(<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, 2)"> [alterar] </a><br>
                         <?php }else{ ?>
                         <span id="idSpanTipo<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-2">
                            <?php echo formatDateHour($value2["data_insc_final"]); ?> 
                         </span>

                         &nbsp; <a onclick="popupData(<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, 2)"> [alterar] </a><br>
                         <?php } ?>   

                         Inicio matrículas: 

                         <?php if( $value2["data_matr_inicial"] == null ){ ?> 
                         <span id="idSpanTipo<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-3">
                                ___/___/___ 00:00:00
                         </span>

                         &nbsp; <a onclick="popupData(<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, 3)"> [alterar] </a><br>
                         <?php }else{ ?>
                         <span id="idSpanTipo<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-3">
                            <?php echo formatDateHour($value2["data_matr_inicial"]); ?> 
                         </span>

                         &nbsp; <a onclick="popupData(<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, 3)"> [alterar] </a><br>
                         <?php } ?>

                         Fim matrículas: 

                         <?php if( $value2["data_matr_final"] == null ){ ?> 
                         <span id="idSpanTipo<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-4">
                                ___/___/___ 00:00:00
                         </span>

                         &nbsp; <a onclick="popupData(<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, 4)"> [alterar] </a><br>
                         <?php }else{ ?>
                         <span id="idSpanTipo<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-4">
                            <?php echo formatDateHour($value2["data_matr_final"]); ?> 
                         </span>

                         &nbsp; <a onclick="popupData(<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, 4)"> [alterar] </a><br>
                         <?php } ?>


                         Início das aulas: 

                         <?php if( $value2["data_aula_inicial"] == null ){ ?> 
                         <span id="idSpanTipo<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-5">
                                ___/___/___ 00:00:00
                         </span>

                         &nbsp; <a onclick="popupData(<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, 5)"> [alterar] </a><br>
                         <?php }else{ ?>
                         <span id="idSpanTipo<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-5">
                            <?php echo formatDateHour($value2["data_aula_inicial"]); ?> 
                         </span>

                         &nbsp; <a onclick="popupData(<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, 5)"> [alterar] </a><br>
                         <?php } ?>

                         
                         Fim das aulas: 

                         <?php if( $value2["data_aula_final"] == null ){ ?> 
                         <span id="idSpanTipo<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-6">
                                ___/___/___ 00:00:00
                         </span>

                         &nbsp; <a onclick="popupData(<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, 6)"> [alterar] </a><br>
                         <?php }else{ ?>
                         <span id="idSpanTipo<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-6">
                            <?php echo formatDateHour($value2["data_aula_final"]); ?> 
                         </span>

                         &nbsp; <a onclick="popupData(<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, 6)"> [alterar] </a><br>
                         <?php } ?>

                         <strong> Obsevação: </strong><?php echo htmlspecialchars( $value2["obs"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br>

                            </div>
                         <span id="lermenos<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: red; font-weight: bold;" hidden onclick="recolher(<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">...Menos</span>

                      </span>
                    </div>          

                    <div class="col-md-4">
                      <h5 style="font-weight: bold; text-align: left; color: green;">
                           <strong style="color: orange;">[<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>]</strong> &nbsp;&nbsp; 
                        
                        <a href="/prof/calendario-lista-presenca/<?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: orangered;">
                          &nbsp;Fazer Chamada   &nbsp; &nbsp;
                         </a> &nbsp; 

                         <span id="lerMaisSpan<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: darkblue; font-weight: bold;" onclick="expandirSpan(<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">Mais...</span>
                         <br>
                         
                         <a href="/prof/insc-turma-temporada/<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/user/<?php echo htmlspecialchars( $value2["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> 
                          &nbsp; Consultar <?php echo htmlspecialchars( $value2["numinscritos"], ENT_COMPAT, 'UTF-8', FALSE ); ?> inscritos &nbsp; &nbsp;
                         </a> &nbsp; 

                        <span id="opcoes<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" hidden>

                         <a href="/prof/insc-turma-temporada-chamada/<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/user/<?php echo htmlspecialchars( $value2["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: green;"> 
                          &nbsp; Imprimir lista chamada (<?php echo htmlspecialchars( $value2["nummatriculados"], ENT_COMPAT, 'UTF-8', FALSE ); ?>) &nbsp; 
                         </a> &nbsp; 
                         
                         <a href="/prof/listapessoasporturma/<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: black;">
                          &nbsp; Lista com endereços   &nbsp; 
                          </a> &nbsp;  


                          <?php if( $value2["token"] == 1 ){ ?>
                          <a href="/prof/token/<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: darkblue;">
                           &nbsp;&nbsp;
                          <span style="color: darkorange;">
                               NECESSÁRIO 
                               <i class="fa fa-info-circle" style="font-size: 14px;"></i> &nbsp; &nbsp;
                          </span>  Tokens &nbsp; &nbsp;
                          </a> &nbsp;
                          <?php }else{ ?>
                        
                          <a href="/prof/token/<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: darkblue;">
                           &nbsp; Tokens &nbsp; &nbsp; 
                          </a> &nbsp;
                          <?php } ?>

                          <a href="/prof/insc-altera-turma-temporada/<?php echo htmlspecialchars( $value2["idmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/user/<?php echo htmlspecialchars( $value2["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> 
                          &nbsp; Mover inscritos &nbsp;
                         </a> &nbsp; 
                         
                        <a href="/prof/crialispersonalizadaautorizacao/<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: purple;">
                                 &nbsp; Criar uma Lista &nbsp; &nbsp;
                            </a>   &nbsp; &nbsp;

                            <span hidden id="lerMenosSpan<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: red; font-weight: bold;" onclick="recolherSpan(<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">...Menos</span>  

                            <br>

                        </span>

                                                    
                      </h5>
                       
                    </div>                    
                    <!--
                    <div class="col-md-2">
                      <h5 style="font-weight: bold; text-align: left; color: darkgreen;">
                        <?php echo htmlspecialchars( $value2["nummatriculados"], ENT_COMPAT, 'UTF-8', FALSE ); ?> matriculados                        
                      </h5>
                    </div>
                    -->
                  </div>
                    
                </div>
                <?php }else{ ?>

                <?php } ?>


                
                <?php } ?>
                 </div>
               
          <?php } ?>
          </div>
          </div>
            <!--
            <button type="button" onclick="window.print()" class="btn btn-primary pull-right" style="margin-right: 5px;">
                  <i class="fa fa-print"></i> Imprimir
              </button>
            -->
          
          
          <!-- /.box-body --> 
          

          

        </div>

  </div>
</div>
</div>
</div>
</div>

<div hidden id="divPopupData" style="text-align-last: center; border-radius: 15px 15px 15px 15px"> 


                <div style="text-align: center; padding: 0px; font-size: 20px; font-weight: bold; border-radius: 15px 15px 15px 15px; width: 100%;">
                    <div style="text-align-last: right; font-weight: bold; color: red; " onclick="fecharPopupData()"> ( x ) &nbsp;&nbsp;
                    </div>  
                </div>               

                <div style="text-align: center; padding: 5; width: 100%;">
                    <form id="formAtestado" method="get" style="height: 100%;"> 
                        <label style="font-weight: bold; font-size: 14px">

                            Informe a data e o horário do 
                            <span id='NomeTipoData'></span>

                        </label>
                        <br>
                        <input hidden id="idturma" name="idturma" type="text" required>
                        <input hidden id="idtemporada" name="idtemporada" type="text" required>
                        <input hidden id="iddata" name="iddata" type="text" required>


                        <input id="data" type="date" name="data" style="width: 59%">
                        <input id="time" type="time" name="time" style="width: 29%">

                        <br> 
                        
                        <span class="btn btn-success"  name="enviar" style="margin-top: 2px; width: 44%; font-size: 60%" onclick="AtualizaData()"> Atualizar </span>
                    
                        <span class="btn btn-danger" style="margin-top: 2px; width: 44%; font-size: 60%" onclick="fecharPopupData()" > Cancelar</span>
                    
                        
                    </form>        
                </div> 
                
            </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
  

  


</script>
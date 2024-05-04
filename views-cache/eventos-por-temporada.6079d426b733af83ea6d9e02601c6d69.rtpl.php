<?php if(!class_exists('Rain\Tpl')){exit;}?>
<script type="text/javascript">
  
  function atualizaStatus(id_evento, desctemporada, idtemporada){

        let status = prompt('Para atualizar o status do evento '+ id_evento +' para a temporada '+ desctemporada +' selecionada, digite:\n 1 - para Evento Iniciado\n 2 - para Evento Encerrado\n 3 - para Evento Confirmado\n 4 - para Evento Adiado\n 5 - para Evento Suspenso');   
        
        let url = "/admin/atualiza/evento/"+id_evento+"/"+idtemporada+"/"+desctemporada+"/"+status        

        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url'); 
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){ 
                
           // alert(result)  

          if(result){

            let texto = '- '+result
                let idlink = 'idlinkstatus'+id_evento
    
                if(status != null){
                  document.getElementById(idlink).innerHTML = texto   
                }         
                            
                if(status == 1){ document.getElementById(idlink).style.color = 'orange'; }
                if(status == 2){ document.getElementById(idlink).style.color = 'darkgreen'; }
                if(status == 3){ document.getElementById(idlink).style.color = "red"; }
                if(status == 4){ document.getElementById(idlink).style.color = 'blue'; }
                if(status == 5){ document.getElementById(idlink).style.color = 'darkred'; }   
          }     

        });
      }

      function expandir(id_evento){

        let iddoevento = id_evento;

            document.getElementById('lermais'+iddoevento).hidden = true 
            document.getElementById('lermenos'+iddoevento).hidden = false 
            document.getElementById('escondido1'+iddoevento ).hidden = false  
            document.getElementById('escondido2'+iddoevento ).hidden = false
            document.getElementById('escondido3'+iddoevento ).hidden = false  
          
    }

    function recolher(id_evento){

        let iddoevento = id_evento;

            document.getElementById('lermais'+iddoevento).hidden = false 
            document.getElementById('lermenos'+iddoevento).hidden = true 
            document.getElementById('escondido1'+iddoevento ).hidden = true  
            document.getElementById('escondido2'+iddoevento ).hidden = true 
            document.getElementById('escondido3'+iddoevento ).hidden = true  
          
    }

</script>

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
 Eventos da Temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>   

</h1>
<ol class="breadcrumb">
  <li><a href="/admin/evento/create"><i class="fa fa-pencil"></i> Criar evento</a></li>
  <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
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

        
      <div class="box-body" style="border: solid 1px lightblue; margin: 5px;"> 
      <div class="box-body col-md-2">
          <?php $counter1=-1;  if( isset($locais) && ( is_array($locais) || $locais instanceof Traversable ) && sizeof($locais) ) foreach( $locais as $key1 => $value1 ){ $counter1++; ?>
                  <a href="/admin/eventos-por-temporada/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/local/<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class=""></i><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;
          <?php } ?>
          <br><br>
          <?php $counter1=-1;  if( isset($modalidades) && ( is_array($modalidades) || $modalidades instanceof Traversable ) && sizeof($modalidades) ) foreach( $modalidades as $key1 => $value1 ){ $counter1++; ?>
                  <a href="/admin/turma-temporada/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/modalidade/<?php echo htmlspecialchars( $value1["idmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class=""></i><?php echo htmlspecialchars( $value1["descmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;
          <?php } ?>
          <a style="font-weight: bold" href="/admin/eventos-por-temporada/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class=""></i>TODOS OS LOCAIS</a>&nbsp;&nbsp;&nbsp;&nbsp;
              
              </div> 
          <div class="box-body no-padding col-md-10">
        <div class="box-header">   

          <?php if( $local == null ){ ?>

          <h3>Todos locais</h3>

          <?php }else{ ?>

          <h3><?php echo htmlspecialchars( $local["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>

          <?php } ?>       
       </div>
            
                <?php $counter1=-1;  if( isset($eventos) && ( is_array($eventos) || $eventos instanceof Traversable ) && sizeof($eventos) ) foreach( $eventos as $key1 => $value1 ){ $counter1++; ?>
                <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
        

                  <div class="row">

                    <div class="col-md-6" >
                      <span style="text-align: left;">
                          
                           <strong><?php echo htmlspecialchars( $value1["desc_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong> 
                          
                          <?php if( $value1["idstatus_evento"] == 1 ){ ?>
                          <span>
                            <a id="idlinkstatus<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: orange; font-weight: bold; text-align-last: right;" onclick="atualizaStatus(<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">- Iniciado</a>
                          </span>

                          <?php } ?>
                       
                          <?php if( $value1["idstatus_evento"] == 2 ){ ?>
                          <span>
                            <a id="idlinkstatus<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: darkgreen; font-weight: bold; text-align-last: right;" onclick="atualizaStatus(<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">- Encerrado</a>
                          </span>

                          <?php } ?>

                          <?php if( $value1["idstatus_evento"] == 3 ){ ?>
                          <span>
                            <a id="idlinkstatus<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: red; font-weight: bold; text-align-last: right;" onclick="atualizaStatus(<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"> - Confirmado</a>
                          </span>
                          <?php } ?>

                          <?php if( $value1["idstatus_evento"] == 4 ){ ?>
                          <span>
                            <a id="idlinkstatus<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: blue; font-weight: bold; text-align-last: right;" onclick="atualizaStatus(<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"> - Adiado</a>
                          </span>
                          <?php } ?>    

                          <?php if( $value1["idstatus_evento"] == 5 ){ ?>
                          <span>
                            <a id="idlinkstatus<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: darkred; font-weight: bold; text-align-last: right;" onclick="atualizaStatus(<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"> - Suspenso</a>
                          </span>
                          <?php } ?>    

                          <?php if( $value1["divulgar_evento"] == 1 ){ ?>
                          <span>
                            <a id="idlinkstatus<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: darkred; font-weight: bold; text-align-last: right;" onclick="atualizaDivulgacao(<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"> - Evento em divulgação</a>
                          </span>
                          <?php }else{ ?>
                          <span>
                            <a id="idlinkstatus<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: darkred; font-weight: bold; text-align-last: right;" onclick="atualizaDivulgacao(<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"> - Evento ainda não divulgado</a>
                          </span>
                          <?php } ?>    
                          
                          <?php if( $value1["dia_inicio_evento"] != $value1["dia_final_evento"] ){ ?>
                            - Data do evento: <?php echo formatDate($value1["dia_inicio_evento"]); ?>
                          
                          <?php }else{ ?>
                            - Data do evento: <?php echo formatDate($value1["dia_inicio_evento"]); ?> a <?php echo formatDate($value1["dia_final_evento"]); ?>
                        
                          <?php } ?>

                          <?php if( $value1["dia_inicio_evento"] != $value1["dia_final_evento"] ){ ?>
                            - Data do evento: <?php echo formatDate($value1["dia_inicio_evento"]); ?>
                          
                          <?php }else{ ?>
                            - Data do evento: <?php echo formatDate($value1["dia_inicio_evento"]); ?> a <?php echo formatDate($value1["dia_final_evento"]); ?>
                        
                          <?php } ?>

                          <strong>- a partir das <?php echo htmlspecialchars( $value1["hora_inicio_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ás <?php echo htmlspecialchars( $value1["hora_termino_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </strong>
                          -  <?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["nomeespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - 
                          <strong>Professor: <?php if( $value1["idperson"] == 1 ){ ?> Admin Master <?php }else{ ?> <?php echo htmlspecialchars( $value1["apelidoperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php } ?></strong>
                          - Assistente: <?php echo getUserNameById($value1["iduser2"]); ?>

                          <strong> - Informações: <?php echo htmlspecialchars( $value1["telef_inform_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>

                          <div id="escondido1<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" hidden>
                          
                          <strong>Programa: </strong><?php echo htmlspecialchars( $value1["programa_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp; 
                          - <strong>Origem: </strong><?php echo htmlspecialchars( $value1["origem_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp; 

                          <?php if( $value1["so_alunos"] == 1 ){ ?>
                          - &nbsp;Somente para alunos matriculados&nbsp; 
                          <?php }else{ ?>
                          - &nbsp;Aberto à toda população&nbsp; 
                          <?php } ?>

                          <?php if( $value1["tem_insc"] == 1 ){ ?>
                          - &nbsp;É necessário fazer inscrição&nbsp; 
                          <?php }else{ ?>
                          - &nbsp;Evento aberto, não é necessário fazer inscrição&nbsp; 
                          <?php } ?>

                          <?php if( $value1["tem_categoria"] == 1 ){ ?>
                          - &nbsp;

                            <a href="admin/categoria/create/<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                Disputa dividida por categorias (Criar)
                            </a>

                          &nbsp; 
                          <?php }else{ ?>
                          - &nbsp;Não há categorias&nbsp; 
                          <?php } ?>

                          <?php if( $value1["tem_premiacao"] == 1 ){ ?>
                          - &nbsp;Tem premiação&nbsp; 
                          <?php }else{ ?>
                          - &nbsp;Não haverá premiação&nbsp; 
                          <?php } ?>


                          </div>

                      </span>
                    </div>      
                   <div class="col-md-6">

                      <h5 style="font-weight: bold; text-align: left; color: green;">
                         <strong style="color: orange;">[<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>]</strong> &nbsp;&nbsp;
                         
                         <a href="/admin/insc-evento-temporada/<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/user/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> 
                         | &nbsp; Consultar  inscritos &nbsp; |
                         </a> &nbsp; 

                         <a href="/admin/insc-evento-temporada-chamada/<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/user/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: green;"> 
                         &nbsp; Imprimir lista chamada  &nbsp; 
                         </a> &nbsp; 
                         
                         <a href="/admin/calendario-lista-presenca/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: orangered;">
                         | &nbsp; Fazer Chamada &nbsp; |
                         </a> &nbsp;  
                         
                         <a href="/admin/listapessoasporevento/<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: black;">
                          &nbsp; Lista com endereços &nbsp; 
                         </a> &nbsp;  
                        

                        <?php if( $value1["token"] == 1 ){ ?>
                          <a href="/admin/token/evento/<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: darkorange;"> 
                          | &nbsp; 
                          <span style="color: darkorange;">
                               NECESSÁRIO 
                               <i class="fa fa-info-circle" style="font-size: 14px;"></i> &nbsp;
                          </span>  Tokens &nbsp; |
                          </a> &nbsp;
                          <?php }else{ ?>
                        
                          <a href="/admin/token/evento/<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: darkblue;"> 
                          | &nbsp;  Tokens  &nbsp; | 
                          </a> &nbsp;
                          <?php } ?>

                           <a href="/admin/insc-altera-evento-temporada/<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/user/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> 
                         &nbsp; Mover inscritos &nbsp;
                         </a> &nbsp; 

                         <a href="/admin/crialispersonalizadaautorizacao/<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: purple;">
                          | &nbsp; Criar uma Lista &nbsp; |
                          </a> &nbsp;

                          <a href="/admin/atualizarcategoria/<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: darkred;">
                          &nbsp; Criar/Atualizar Categoria&nbsp;
                          </a> &nbsp;
                         <br>

                         <span id="lermais<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: darkblue;" onclick="expandir(<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">Ler mais...</span> 

                          <span id="escondido2<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" hidden>
                      
                      
                      <span style="color: black;" id="escondido3<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" hidden>
                         Observação: <span style="font-weight: normal;"> <?php echo htmlspecialchars( $value1["obs_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span>
                      </span>

                       <br>
                      </span>
                     
                      
                     
                            <span id="lermenos<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: darkblue; font-weight: bold;" hidden onclick="recolher(<?php echo htmlspecialchars( $value1["id_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">Ler menos...</span>
                         
                      </h5>
                    </div>                    
                    
                  </div>
                </div>
                
                <?php } ?>
            <!--
            <button type="button" onclick="window.print()" class="btn btn-primary pull-right" style="margin-right: 5px;">
                  <i class="fa fa-print"></i> Imprimir
              </button>
            -->
          </div>
          
          
          <!-- /.box-body -->


           
            

          <div class="box-footer clearfix">
            <ul class="pagination pagination-sm no-margin pull-right">
              <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
              <li><a href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
              <?php } ?>
            </ul>
          </div>

        </div>

  </div>
</div>
</div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
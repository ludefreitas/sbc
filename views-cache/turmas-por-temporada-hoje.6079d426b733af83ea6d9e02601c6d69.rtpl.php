<?php if(!class_exists('Rain\Tpl')){exit;}?>
<script type="text/javascript">

  function getDadosTurmaTemporada(idturma, idtemporada){
  
        let url = "/admin/dados/turmatemporada/"+idturma+"/"+idtemporada

        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url'); 
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){         
            
            if(result){   
            
              alert(result);

          } 

        });
        
      }
 
  function atualizaStatus(idturma, desctemporada, idtemporada){

        let status = prompt('Para atualizar o status da turma '+ idturma +' para a temporada '+ desctemporada +' selecionada, digite:\n 2 - para inscrições não iniciadas\n 3 - para inscrições abertas\n 4 - para inscrições suspensas\n 5 - para inscrições encerradas\n 6 - para turma não iniciada');  
        
        if(status != 2 && status != 3 && status != 4 && status != 5 && status != 6){
          alert("Valor inválido!!!")
          return
        }   
        
        let url = "/admin/atualiza/turmatemporada/"+idturma+"/"+idtemporada+"/"+desctemporada+"/"+status        

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

</script>

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
 Turmas relacionadas à Temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $temporada["descstatustemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>   

</h1>
<ol class="breadcrumb">
  <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="/admin/insc/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> Todas inscrições <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </a></li>
  <li><a href="/admin/temporada/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/turma"> Inserir turma <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
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
      <div class="box-body" style="border: solid 1px lightblue; margin: 5px; padding-bottom: 0; "> 
        <form action="/admin/turma-temporada-hoje/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="GET">
            Escolha outra data: <br>
            <input class="form-group" type="text" name="data" placeholder="DD-MM-AAAA"> 
            <input type="submit" name="Enviar">  
        </form>
      </div>
      <div class="box-body" style="border: solid 1px lightblue; margin: 5px;"> 
      <div class="box-body col-md-2">

          <a href="/admin/turma-temporada-hoje/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class=""></i>TODOS OS LOCAIS</a>&nbsp;&nbsp;&nbsp;&nbsp;<br>
          <?php $counter1=-1;  if( isset($locais) && ( is_array($locais) || $locais instanceof Traversable ) && sizeof($locais) ) foreach( $locais as $key1 => $value1 ){ $counter1++; ?>
                  <a href="/admin/turma-temporada-hoje/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/local/<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class=""></i><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;
          <?php } ?>
          
            
      </div> 
          <div class="box-body no-padding col-md-10">

              <div class="box-header">

          <?php if( $local == null ){ ?>

          <h3>Todos locais</h3>

          <?php }else{ ?>

          <h3><?php echo htmlspecialchars( $local["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>

          <?php } ?>       
       </div>             

                <?php $counter1=-1;  if( isset($modalidades) && ( is_array($modalidades) || $modalidades instanceof Traversable ) && sizeof($modalidades) ) foreach( $modalidades as $key1 => $value1 ){ $counter1++; ?>            

                <?php $idmodalidade = $value1["idmodal"]; ?>

                 <div  id="btnModalOpen<?php echo htmlspecialchars( $idmodalidade, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                <div style="text-align: center; border-radius: 5px; margin: 5px; height: 30px" class="btn-primary col-md-12" onclick="openDiv(<?php echo htmlspecialchars( $idmodalidade, ENT_COMPAT, 'UTF-8', FALSE ); ?>)" ><?php echo htmlspecialchars( $value1["descmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <i class="fa fa-caret-down"></i></div> 
                </div>

                <div  id="btnModalClose<?php echo htmlspecialchars( $idmodalidade, ENT_COMPAT, 'UTF-8', FALSE ); ?>" hidden>
                <div style="text-align: center; border-radius: 5px; margin: 5px; height: 30px" class="btn-primary col-md-12" onclick="closeDiv(<?php echo htmlspecialchars( $idmodalidade, ENT_COMPAT, 'UTF-8', FALSE ); ?>)" ><?php echo htmlspecialchars( $value1["descmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <i class="fa fa-caret-up"> </i></div> 
                </div>
            
                <div id="idmodal<?php echo htmlspecialchars( $idmodalidade, ENT_COMPAT, 'UTF-8', FALSE ); ?>" hidden >                 
                
                <?php $counter2=-1;  if( isset($turmas) && ( is_array($turmas) || $turmas instanceof Traversable ) && sizeof($turmas) ) foreach( $turmas as $key2 => $value2 ){ $counter2++; ?>
                 <?php if( $idmodalidade == $value2["idmodal"] ){ ?>
                 
                <?php if( numeroNaListaDePresençaByIdturmaData($value2["idturma"], $ano, $mes, $dia) == 0 ){ ?>
                    <div  class="box-body col-md-1" style="border: solid 1px lightblue; margin: 5px; background-color: lightgray; font-size: 7px;  display: inline-block; ">
                <?php }else{ ?>
                    <div  class="box-body col-md-1" style="border: solid 1px lightblue; margin: 5px; background-color: lightgreen; font-size: 7px;  display: inline-block; ">
                <?php } ?>     

                    <span style="text-align: left;">
                          <strong style="color: orange;">[<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>]</strong> &nbsp;&nbsp;
                          <strong> <?php echo htmlspecialchars( $value2["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </strong> 
                         
                             
                          <strong>- <?php echo htmlspecialchars( $value2["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                          <?php echo htmlspecialchars( $value2["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ás <?php echo htmlspecialchars( $value2["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?> -  
                            <?php echo htmlspecialchars( $value2["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  - Professor: <?php if( $value2["idperson"] == 1 ){ ?> Admin Master <?php }else{ ?> <?php echo htmlspecialchars( $value2["apelidoperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php } ?></strong>&nbsp; 
                          
                           
                        
                    </div>   
                    <?php }else{ ?>

                <?php } ?>   
                
                <?php } ?>
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
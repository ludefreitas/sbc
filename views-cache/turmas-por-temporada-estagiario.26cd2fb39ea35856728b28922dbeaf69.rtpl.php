<?php if(!class_exists('Rain\Tpl')){exit;}?>
<script type="text/javascript">
  

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


</script>

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h4>
 Turmas relacionadas à Temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $temporada["descstatustemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  

</h4>
<ol class="breadcrumb">
  <li><a href="/prof-estagiario"><i class="fa fa-dashboard"></i> Home</a></li>
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

       </div>
      </div>
      <div class="box-body" style="border: solid 1px lightblue; margin: 5px;"> 
          <div class="box-body no-padding col-md-12">

            <div class="row">
            <div class="col-md-12">

            <?php $counter1=-1;  if( isset($modalidades) && ( is_array($modalidades) || $modalidades instanceof Traversable ) && sizeof($modalidades) ) foreach( $modalidades as $key1 => $value1 ){ $counter1++; ?>       

            <?php $idmodalidade = $value1["idmodal"]; ?>


                <div  id="btnModalOpen<?php echo htmlspecialchars( $idmodalidade, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                <div style="text-align: center; border-radius: 5px; margin: 5px; height: 30px;" class="btn-primary col-md-12" onclick="openDiv(<?php echo htmlspecialchars( $idmodalidade, ENT_COMPAT, 'UTF-8', FALSE ); ?>)" ><?php echo htmlspecialchars( $value1["descmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <i class="fa fa-caret-down"></i></div> 
                </div>

                <div  id="btnModalClose<?php echo htmlspecialchars( $idmodalidade, ENT_COMPAT, 'UTF-8', FALSE ); ?>" hidden>
                <div style="text-align: center; border-radius: 5px; margin: 5px; height: 30px;" class="btn-primary col-md-12" onclick="closeDiv(<?php echo htmlspecialchars( $idmodalidade, ENT_COMPAT, 'UTF-8', FALSE ); ?>)" ><?php echo htmlspecialchars( $value1["descmodal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <i class="fa fa-caret-up"></i></div> 
                </div>


                <div id="idmodal<?php echo htmlspecialchars( $idmodalidade, ENT_COMPAT, 'UTF-8', FALSE ); ?>" hidden >
                <?php $counter2=-1;  if( isset($turmas) && ( is_array($turmas) || $turmas instanceof Traversable ) && sizeof($turmas) ) foreach( $turmas as $key2 => $value2 ){ $counter2++; ?>
                
                <?php if( $idmodalidade == $value2["idmodal"] ){ ?>
                <div  class="box-body" style="border: solid 1px lightblue; margin: 2px;">

                  <div class="row">

                    <div class="col-md-8" >
                      <span style="text-align: left;">
                       
                      <strong><?php echo htmlspecialchars( $value2["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </strong> 

                        <?php if( $value2["idturmastatus"] == 2 ){ ?>
                          <span style="color: orange; font-weight: bold;">- Inscrições não iniciadas</span>                  
                        <?php } ?>
                       
                        <?php if( $value2["idturmastatus"] == 3 ){ ?>
                          <span style="color: darkgreen; font-weight: bold;">- Inscrições abertas</span>
                         
                        <?php } ?>

                        <?php if( $value2["idturmastatus"] == 4 ){ ?>
                          <span style="color: red; font-weight: bold;"> - Inscrições suspensas</span>
                          
                        <?php } ?>

                        <?php if( $value2["idturmastatus"] == 6 ){ ?>
                          <span style="color: blue; font-weight: bold;"> - Turma não iniciada</span>
                          
                        <?php } ?>

                       <?php echo htmlspecialchars( $value2["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $value2["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ás <?php echo htmlspecialchars( $value2["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - 
                       <strong><?php echo htmlspecialchars( $value2["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  <?php echo htmlspecialchars( $value2["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> a <?php echo htmlspecialchars( $value2["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> anos -</strong>   <?php echo htmlspecialchars( $value2["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value2["nomeespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp; <strong> Vagas: (<?php echo htmlspecialchars( $value2["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> Geral)&nbsp; - &nbsp;(<?php echo htmlspecialchars( $value2["vagaslaudo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> Laudo)&nbsp; - &nbsp;(<?php echo htmlspecialchars( $value2["vagaspcd"], ENT_COMPAT, 'UTF-8', FALSE ); ?> PCD)&nbsp; - &nbsp;(<?php echo htmlspecialchars( $value2["vagaspvs"], ENT_COMPAT, 'UTF-8', FALSE ); ?> PVS)</strong>
                       - <strong> Obsevação: </strong><?php echo htmlspecialchars( $value2["obs"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  
                      </span>
                    </div>                      

                    <div class="col-md-4">
                      <h4 style="font-weight: bold; text-align: left; color: green;">
                           <strong style="color: orange;">[<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>]</strong> &nbsp;&nbsp; 
                        
                        <a href="/estagiario/insc-turma-temporada/<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/user/<?php echo htmlspecialchars( $value2["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> 
                         | &nbsp; Consultar <?php echo htmlspecialchars( $value2["numinscritos"], ENT_COMPAT, 'UTF-8', FALSE ); ?> inscritos &nbsp; |
                         </a> &nbsp; 

                         <a href="/estagiario/insc-turma-temporada-chamada/<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/user/<?php echo htmlspecialchars( $value2["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: green;"> 
                          &nbsp; Imprimir lista chamada (<?php echo htmlspecialchars( $value2["nummatriculados"], ENT_COMPAT, 'UTF-8', FALSE ); ?>) &nbsp; 
                         </a> &nbsp; 
                         
                         <a href="/estagiario/calendario-lista-presenca/<?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: orangered;">
                         | &nbsp;Fazer Chamada   &nbsp; |
                         </a> &nbsp;  
                         
                         <a href="/estagiario/listapessoasporturma/<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: black;">
                          &nbsp; Lista com endereços   &nbsp; 
                         </a> &nbsp;  
                         
                         <!--
                         <a href="/insc-turma-temporada-classificadas/<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/user/<?php echo htmlspecialchars( $value2["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: orangered;">
                         | &nbsp; Classificação </a>  &nbsp; 
                         -->
                         <!--
                         &nbsp;  
                         &nbsp; <a href="/estagiario/insc-turma-temporada-matricular/<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/user/<?php echo htmlspecialchars( $value2["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: darkblue;">
                         | Lista/Matricular </a>  &nbsp;     
                         -->
                      <!--  | &nbsp; <a href="/insc-turma-temporada-para-sorteio/<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value2["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/user/<?php echo htmlspecialchars( $value2["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: orangered;">  Sorteio |</a>  &nbsp;  
                      -->


                        
                          
                        
                      </h4>
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

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
  

  


</script>
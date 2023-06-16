<?php if(!class_exists('Rain\Tpl')){exit;}?>
<script type="text/javascript">
  
  function atualizaStatus(idturma, desctemporada, idtemporada){

        let status = prompt('Para atualizar o status da turma '+ idturma +' para a temporada '+ desctemporada +'  selecionada, digite:\n 3 - para inscrições abertas\n 4 - para inscrições suspensas\n 6 - para turma não iniciada');   
        
        let url = "/admin/atualiza/turmatemporada/"+idturma+"/"+idtemporada+"/"+desctemporada+"/"+status        

        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url'); 
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){         
            alert(result)        

        });
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

        
      <div class="box-body" style="border: solid 1px lightblue; margin: 5px;"> 
      <div class="box-body col-md-2">
          <?php $counter1=-1;  if( isset($locais) && ( is_array($locais) || $locais instanceof Traversable ) && sizeof($locais) ) foreach( $locais as $key1 => $value1 ){ $counter1++; ?>
                  <a href="/admin/turma-temporada/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/local/<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class=""></i><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;
          <?php } ?>
              <!--    <table class="table table-striped">
                      <thead>
                          <tr>
                           <th>Turmas da temporada por centro esportivo</th>
                          </tr>
                      </thead>
                      <tbody>

                          <tr>
                          <td>
                              <a href="/admin/turma-temporada/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class=""></i>Todas turmas - Temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
                          </td>
                          <?php $counter1=-1;  if( isset($locais) && ( is_array($locais) || $locais instanceof Traversable ) && sizeof($locais) ) foreach( $locais as $key1 => $value1 ){ $counter1++; ?>
                          <tr>
                          <td>
                              <a href="/admin/turma-temporada/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/local/<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class=""></i> <?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
                          </td>
                          </tr>
                          <?php } ?>

                      </tbody>
                  </table>
                -->
              </div> 
          <div class="box-body no-padding col-md-10">
              <div class="box-header">   

          <?php if( $local == null ){ ?>

          <h3>Todos locais</h3>

          <?php }else{ ?>

          <h3><?php echo htmlspecialchars( $local["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>

          <?php } ?>       
       </div>
            
                <?php $counter1=-1;  if( isset($turmas) && ( is_array($turmas) || $turmas instanceof Traversable ) && sizeof($turmas) ) foreach( $turmas as $key1 => $value1 ){ $counter1++; ?>
                <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
        

                  <div class="row">

                    <div class="col-md-6" >
                      <span style="text-align: left;">
                          
                          <strong><?php echo htmlspecialchars( $value1["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </strong> 
                         
                          <?php if( $value1["idturmastatus"] == 2 ){ ?>
                          <span>
                            <a style="color: orange; font-weight: bold; text-align-last: right;" onclick="atualizaStatus(<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">- Inscrições não iniciadas</a>
                          </span>

                          <?php } ?>
                          
                          <?php if( $value1["idturmastatus"] == 3 ){ ?>
                          <span>
                            <a style="color: darkgreen; font-weight: bold; text-align-last: right;" onclick="atualizaStatus(<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">- Inscrições abertas</a>
                          </span>

                          <?php } ?>

                          <?php if( $value1["idturmastatus"] == 4 ){ ?>
                          <span>
                            <a style="color: red; font-weight: bold; text-align-last: right;" onclick="atualizaStatus(<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"> - Inscrições suspensas</a>
                          </span>
                          <?php } ?>

                          <?php if( $value1["idturmastatus"] == 6 ){ ?>
                          <span>
                            <a style="color: blue; font-weight: bold; text-align-last: right;" onclick="atualizaStatus(<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"> - Turma não iniciada</a>
                          </span>
                          <?php } ?> 
                          
                          - <?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                          <?php echo htmlspecialchars( $value1["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ás <?php echo htmlspecialchars( $value1["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?> -  
                          <strong><?php echo htmlspecialchars( $value1["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  <?php echo htmlspecialchars( $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> a <?php echo htmlspecialchars( $value1["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> anos</strong>
                          -  <?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["nomeespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <strong>Professor: <?php if( $value1["idperson"] == 1 ){ ?> Admin Master <?php }else{ ?> <?php echo htmlspecialchars( $value1["apelidoperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php } ?></strong>&nbsp; Vagas: (<?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> Geral)&nbsp; - &nbsp;(<?php echo htmlspecialchars( $value1["vagaslaudo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> Laudo)&nbsp; - &nbsp;(<?php echo htmlspecialchars( $value1["vagaspcd"], ENT_COMPAT, 'UTF-8', FALSE ); ?> PCD)&nbsp; - &nbsp;(<?php echo htmlspecialchars( $value1["vagaspvs"], ENT_COMPAT, 'UTF-8', FALSE ); ?> PVS)
                      </span>
                    </div>      
                   <div class="col-md-6">
                      <h5 style="font-weight: bold; text-align: left; color: green;">
                           <strong style="color: orange;">[<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>]</strong> 
                        
                         <a href="/admin/insc-turma-temporada/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/user/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> 
                         | &nbsp; Consultar <?php echo htmlspecialchars( $value1["numinscritos"], ENT_COMPAT, 'UTF-8', FALSE ); ?> inscritos &nbsp;
                         </a> &nbsp; 

                         <a href="/admin/insc-turma-temporada-chamada/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/user/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: green;"> 
                         | &nbsp; Imprimir lista chamada (<?php echo htmlspecialchars( $value1["nummatriculados"], ENT_COMPAT, 'UTF-8', FALSE ); ?>) &nbsp; 
                         </a> &nbsp; 
                         
                         <a href="/admin/calendario-lista-presenca/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: orangered;">
                         | &nbsp;Fazer Chamada </a>  &nbsp; 
                         &nbsp;  
                         
                         <a href="/admin/listapessoasporturma/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: black;">
                         | &nbsp; Lista com endereços </a>  &nbsp; 
                         &nbsp;  
                         
                         <!--
                         <a href="/insc-turma-temporada-classificadas/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/user/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: orangered;">
                         | &nbsp; Classificação </a>  &nbsp; 
                         &nbsp;  
                         -->
                         
                         <!--
                         &nbsp; <a href="/admin/insc-turma-temporada-matricular/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/user/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: darkblue;">
                         | Lista/Matricular </a>  &nbsp;   
                         -->
                         
                      <!--  | &nbsp; <a href="/insc-turma-temporada-para-sorteio/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/user/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: orangered;">  Sorteio |</a>  &nbsp;  
                      -->
                        
                          <a href="/admin/token/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: darkblue;"><i ></i> | Tokens</a>
                        
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
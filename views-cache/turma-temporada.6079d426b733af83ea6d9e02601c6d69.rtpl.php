<?php if(!class_exists('Rain\Tpl')){exit;}?><script type="text/javascript">

    function adicionar(idturma, idtemporada){ 

        let url = "/admin/temporada/"+idtemporada+"/turma/"+idturma+"/add";
        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url'); 
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){         
            
            if(result){   

            let divturmaAdiciona = 'divTurmaAdicionar'+idturma
            document.getElementById(divturmaAdiciona).hidden = true             
            
          }else{                
            alert("Não foi possivel adicionar a turma!\nTente novamente ou atualize a página!");
          }    
        });        
    }

    function remover(idturma, idtemporada){ 
        let url = "/admin/temporada/"+idtemporada+"/turma/"+idturma+"/remove";
        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url'); 
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){             
            if(result){   
            let divturmaRemove = 'divTurmaRemover'+idturma
            document.getElementById(divturmaRemove).hidden = true                
          }else{                
            alert("Não foi possivel remover a turma!\nTente novamente ou atualize a página!");
          }    

        });
        
    }
    
    function openDiv(idlocalidade){

        let idlocal = idlocalidade;
              
            document.getElementById('idlocal'+idlocal ).hidden = false  
            document.getElementById('btnLocalClose'+idlocal ).hidden = false
            document.getElementById('btnLocalOpen'+idlocal ).hidden = true      
      }

      function closeDiv(idlocalidade){

        let idlocal = idlocalidade;

            document.getElementById('idlocal'+idlocal ).hidden = true  
            document.getElementById('btnLocalOpen'+idlocal ).hidden = false  
            document.getElementById('btnLocalClose'+idlocal ).hidden = true 
          
      }

      function openDivRed(idlocalidade){

        let idlocal = idlocalidade;
              
            document.getElementById('idlocalRed'+idlocal ).hidden = false  
            document.getElementById('btnLocalRedClose'+idlocal ).hidden = false
            document.getElementById('btnLocalRedOpen'+idlocal ).hidden = true      
      }

      function closeDivRed(idlocalidade){

        let idlocal = idlocalidade;

            document.getElementById('idlocalRed'+idlocal ).hidden = true  
            document.getElementById('btnLocalRedOpen'+idlocal ).hidden = false  
            document.getElementById('btnLocalRedClose'+idlocal ).hidden = true 
          
      }

</script>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Turmas para a temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $temporada["descstatustemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/temporada">Temporadas</a></li>
    <li><a href="/admin/turma-temporada/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
    <li class="active"><a href="/admin/temporada/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/turma">Turmas</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
         <?php if( $msgError != '' ){ ?>
                <div class="alert alert-danger" style="margin: 0px 10px 0px 10px">
                    <?php echo htmlspecialchars( $msgError, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
                <?php } ?>
        <div class="col-md-6">
            <div class="box box-primary">
               
                <div class="box-header with-border">
                <h3 class="box-title">Todas as turmas</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    
                        <?php $counter1=-1;  if( isset($locais) && ( is_array($locais) || $locais instanceof Traversable ) && sizeof($locais) ) foreach( $locais as $key1 => $value1 ){ $counter1++; ?>            

                        <?php $idlocal = $value1["idlocal"]; ?>
                            
                            <div  id="btnLocalOpen<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            <div style="text-align: center; border-radius: 5px; margin: 5px; height: 30px" class="btn-primary col-md-12" onclick="openDiv(<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>)" ><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <i class="fa fa-caret-down"></i></div> 
                            </div>

                            <div  id="btnLocalClose<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>" hidden>
                            <div style="text-align: center; border-radius: 5px; margin: 5px; height: 30px" class="btn-primary col-md-12" onclick="closeDiv(<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>)" ><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <i class="fa fa-caret-up"> </i></div> 
                            </div>                        

                            
                            <div id="idlocal<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>" hidden>
                                <table class="table table-striped">
                                    
                                    <tbody>
                                        <?php $counter2=-1;  if( isset($turmaNotRelated) && ( is_array($turmaNotRelated) || $turmaNotRelated instanceof Traversable ) && sizeof($turmaNotRelated) ) foreach( $turmaNotRelated as $key2 => $value2 ){ $counter2++; ?>

                                        
                                            <div>
                                                <?php if( $idlocal == $value2["idlocal"] ){ ?>
                                                                                
                                                <tr id="divTurmaAdicionar<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                                <td><?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                                <td><?php echo htmlspecialchars( $value2["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value2["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value2["nomeativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - 
                                                 <?php echo htmlspecialchars( $value2["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value2["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value2["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value2["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value2["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value2["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br> vagas: [<?php echo htmlspecialchars( $value2["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> GERAL] [<?php echo htmlspecialchars( $value2["vagaslaudo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> LAUDO] [<?php echo htmlspecialchars( $value2["vagaspcd"], ENT_COMPAT, 'UTF-8', FALSE ); ?> PCD] [<?php echo htmlspecialchars( $value2["vagaspvs"], ENT_COMPAT, 'UTF-8', FALSE ); ?> PVS] </td>
                                                <td>
                                                                                                       
                                                    <button onclick="adicionar(<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)" class="btn btn-primary btn-xs pull-right">Adicionar <i class="fa fa-arrow-right"></i> </button>
                                                    
                                                </td>
                                                </tr>

                                
                                            <?php }else{ ?>

                                            <?php } ?>
                                        </div>
                                        

                                         <?php } ?>                           
                                    </tbody>
                                </table>
                            </div >
                        <?php } ?>
                    </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                <h3 class="box-title">Turmas para <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <?php $counter1=-1;  if( isset($locais) && ( is_array($locais) || $locais instanceof Traversable ) && sizeof($locais) ) foreach( $locais as $key1 => $value1 ){ $counter1++; ?>            

                    <?php $idlocal = $value1["idlocal"]; ?>

                        <div  id="btnLocalRedOpen<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            <div style="text-align: center; border-radius: 5px; margin: 5px; height: 30px" class="btn-danger col-md-12" onclick="openDivRed(<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>)" ><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <i class="fa fa-caret-down"></i></div> 
                            </div>

                            <div  id="btnLocalRedClose<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>" hidden>
                            <div style="text-align: center; border-radius: 5px; margin: 5px; height: 30px" class="btn-danger col-md-12" onclick="closeDivRed(<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>)" ><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <i class="fa fa-caret-up"> </i></div> 
                            </div>                        
                                                   
                        <div id="idlocalRed<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>" hidden>

                        <table class="table table-striped">
                           
                            <tbody>
                                <?php $counter2=-1;  if( isset($turmaRelated) && ( is_array($turmaRelated) || $turmaRelated instanceof Traversable ) && sizeof($turmaRelated) ) foreach( $turmaRelated as $key2 => $value2 ){ $counter2++; ?>

                                <?php if( $idlocal == $value2["idlocal"] ){ ?>

                                    <tr id="divTurmaRemover<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                    <td><?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                    <td><?php echo htmlspecialchars( $value2["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value2["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value2["nomeativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - 
                                     <?php echo htmlspecialchars( $value2["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value2["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value2["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value2["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value2["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value2["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br> vagas: [<?php echo htmlspecialchars( $value2["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> GERAL] [<?php echo htmlspecialchars( $value2["vagaslaudo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> LAUDO] [<?php echo htmlspecialchars( $value2["vagaspcd"], ENT_COMPAT, 'UTF-8', FALSE ); ?> PCD] [<?php echo htmlspecialchars( $value2["vagaspvs"], ENT_COMPAT, 'UTF-8', FALSE ); ?> PVS]  </td>
                                    <td>
                                        <button onclick="remover(<?php echo htmlspecialchars( $value2["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)" class="btn btn-danger btn-xs pull-right"><i class="fa fa-arrow-left"></i> Remover </button>
                                    </td>
                                    </tr>
                                    <?php }else{ ?>

                                    <?php } ?>

                                    <?php } ?> 
                                 </tbody>
                            </table>
                        </div >                          
                    <?php } ?>
                       
            </div>
        </div>        
    </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


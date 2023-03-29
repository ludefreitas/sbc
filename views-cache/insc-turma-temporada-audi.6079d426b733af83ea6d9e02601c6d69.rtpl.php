<?php if(!class_exists('Rain\Tpl')){exit;}?><script type="text/javascript">

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

</script>


<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
     [<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>]  <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $turma["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  <?php echo htmlspecialchars( $turma["periodo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $turma["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> -   <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    
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
            <div class="box-body" style="text-align: center;">
                <span style="color: orangered; font-weight: bold">PVS - Lista de pessoas em vulnerabilidade social - <?php echo htmlspecialchars( $turma["vagaspvs"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas
                </span>
          </div>
              
            <?php $counter1=-1;  if( isset($inscPvs) && ( is_array($inscPvs) || $inscPvs instanceof Traversable ) && sizeof($inscPvs) ) foreach( $inscPvs as $key1 => $value1 ){ $counter1++; ?>
             <?php if( ($value1["idinscstatus"] != 8) && ($value1["idinscstatus"] != 9) ){ ?>
            <div class="box-body" style=" margin: 5px;">
              <div <?php echo colorStatus($value1["idinscstatus"]); ?> style="margin: 5px" class="row">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-6" style="margin: 2; padding: 2">
                    <h5 style="text-align: left;">
                      <?php echo htmlspecialchars( $value1["numordem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>º -
                      <strong>[<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>] - <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
                      <?php if( UserIsAdmin() ){ ?>
                      &nbsp;<?php echo htmlspecialchars( $value1["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;
                      <?php }else{ ?>
                      &nbsp;<?php echo formatCpf($value1["numcpf"]); ?>&nbsp;
                      <?php } ?>                      
                      <strong><?php echo calcularIdade($value1["dtnasc"]); ?> anos</strong>
                      &nbsp;Nascim.: <?php echo formatDate($value1["dtnasc"]); ?>&nbsp;
                    </h5>
                  </div>

                  <div class="col-md-6" style="margin: 2; padding: 2">
                    <h5 style="text-align: left;">               
                       <strong>Resp: </strong><?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                       &nbsp;
                       <a href="https://wa.me/+55<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá <?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>!" target="_blank" onclick="return confirm('Você será direcionado para o whatsapp do aluno ou responsável. Digite sua mensagem e no app clique em enviar msg.')"><i class="fa fa-whatsapp" style="color: darkgreen; font-weight: bold;"></i><span style="color: black;"> <?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;</span></a>
                       
                       &nbsp;&nbsp;&nbsp;&nbsp;

                       <a style="font-weight: bold;" onclick="requisitarPaginaEndereco('/prof/insc-turma-temporada-endereco/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')"><i class="fas fa-map-marker-alt"></i> Endereço </a>         

                        &nbsp;&nbsp;&nbsp;&nbsp;
                       
                       &nbsp; <strong>Contato: </strong><?php echo htmlspecialchars( $value1["contato"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;
                      <strong>Dt Insc.: </strong><?php echo formatDate($value1["dtinsc"]); ?>
                      &nbsp;<strong>Dt Matric.: </strong><?php echo formatDate($value1["dtmatric"]); ?>&nbsp;
                    </h5>
                  </div>                   
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">                  

                  <div class="col-md-6" style="margin: 2; padding: 2">
                    <h5 style="text-align: left;">  

                      <span style="font-weight: bold; text-align: left; color: brown;">                  
                        <?php if( $value1["vulnsocial"] == 1 ){ ?> (Vuln. Social) &nbsp;&nbsp;<?php } ?>
                      </span> 
                      
                      <span style="font-weight: bold; text-align: left; color: darkblue;">  
                        <?php if( $value1["inscpcd"] == 1 ){ ?> PCD &nbsp;&nbsp;<?php } ?>  
                      </span> 

                      <span style="font-weight: bold; text-align: left; color: darkgreen; font-weight: bold;">                  
                        <?php if( $value1["laudo"] == 1 ){ ?>LAUDO  &nbsp;&nbsp;<?php } ?>
                       </span>
                   
                  

                    <?php if( $value1["idinscstatus"] == 1 ){ ?>              
                    <span style="font-weight: bold; text-align: left; color: blue;">                  
                      <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    </span>             
                    <?php } ?>

                  
              
                    <?php if( $value1["idinscstatus"] == 2 ){ ?>
              
                    <span style="font-weight: bold; text-align: left; color: darkgreen;">                  
                      <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    </span>
             
                    <?php } ?>
               

                      <?php if( $value1["idinscstatus"] == 3 ){ ?>
                      
                        <span style="font-weight: bold; text-align: left; color: green;">                  
                          <span>*<?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>*</span>
                        </span>
                      
                      <?php } ?>

                      <?php if( $value1["idinscstatus"] == 6 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: darkorange;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>


                      <?php if( $value1["idinscstatus"] == 7 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: darkblue;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>

                      
                      <?php if( $value1["idinscstatus"] == 8 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: orange;">                  
                          Status: <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>
                      
                      <?php if( $value1["idinscstatus"] == 9 ){ ?>
                      
                        <span style="font-weight: bold; text-align: left; color: red;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      
                      <?php } ?> 
                       </h5>               
                    </div>


              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/admin/profile/insc-audi/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button">Detalhes</a>
                </h5>
              </div> 


              
              

              

                </div>
              </div>
              
            </div>
          </div>
          
          <?php } ?>
           
          <?php } ?>
          </div>  

          <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
            <div class="box-body" style="text-align: center;">
                <span style="color: orangered; font-weight: bold">PCD - Lista de pessoas com deficiência - <?php echo htmlspecialchars( $turma["vagaspcd"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas
                </span>
          </div>
              
            <?php $counter1=-1;  if( isset($inscPcd) && ( is_array($inscPcd) || $inscPcd instanceof Traversable ) && sizeof($inscPcd) ) foreach( $inscPcd as $key1 => $value1 ){ $counter1++; ?>
             <?php if( ($value1["idinscstatus"] != 8) && ($value1["idinscstatus"] != 9) ){ ?>
            <div class="box-body" style=" margin: 5px;">
              <div <?php echo colorStatus($value1["idinscstatus"]); ?> style="margin: 5px" class="row">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-6" style="margin: 2; padding: 2">
                    <h5 style="text-align: left;">
                      <?php echo htmlspecialchars( $value1["numordem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>º -
                      <strong>[<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>] - <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
                      <?php if( UserIsAdmin() ){ ?>
                      &nbsp;<?php echo htmlspecialchars( $value1["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;
                      <?php }else{ ?>
                      &nbsp;<?php echo formatCpf($value1["numcpf"]); ?>&nbsp;
                      <?php } ?>                      
                      <strong><?php echo calcularIdade($value1["dtnasc"]); ?> anos</strong>
                      &nbsp;Nascim.: <?php echo formatDate($value1["dtnasc"]); ?>&nbsp;
                    </h5>
                  </div>

                  <div class="col-md-6" style="margin: 2; padding: 2">
                    <h5 style="text-align: left;">               
                       <strong>Resp: </strong><?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                       &nbsp;
                       <a href="https://wa.me/+55<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá <?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>!" target="_blank" onclick="return confirm('Você será direcionado para o whatsapp do aluno ou responsável. Digite sua mensagem e no app clique em enviar msg.')"><i class="fa fa-whatsapp" style="color: darkgreen; font-weight: bold;"></i><span style="color: black;"> <?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;</span></a>
                       
                       &nbsp;&nbsp;&nbsp;&nbsp;

                       <a style="font-weight: bold;" onclick="requisitarPaginaEndereco('/prof/insc-turma-temporada-endereco/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')"><i class="fas fa-map-marker-alt"></i> Endereço </a>         

                        &nbsp;&nbsp;&nbsp;&nbsp;
                       
                      <strong>Dt Insc.: </strong><?php echo formatDate($value1["dtinsc"]); ?>
                      &nbsp;<strong>Dt Matric.: </strong><?php echo formatDate($value1["dtmatric"]); ?>&nbsp;
                    </h5>
                  </div>                   
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">                  

                  <div class="col-md-6" style="margin: 2; padding: 2">
                    <h5 style="text-align: left;">  

                      <span style="font-weight: bold; text-align: left; color: brown;">                  
                        <?php if( $value1["vulnsocial"] == 1 ){ ?> (Vuln. Social) &nbsp;&nbsp;<?php } ?>
                      </span>               
                      
                      <span style="font-weight: bold; text-align: left; color: darkblue;">  
                        <?php if( $value1["inscpcd"] == 1 ){ ?> PCD &nbsp;&nbsp;<?php } ?>  
                      </span>                            
                    
                      
                      <span style="font-weight: bold; text-align: left; color: darkgreen; font-weight: bold;">                  
                        <?php if( $value1["laudo"] == 1 ){ ?>LAUDO  &nbsp;&nbsp;<?php } ?>
                       </span>
                   
                  

                    <?php if( $value1["idinscstatus"] == 1 ){ ?>              
                    <span style="font-weight: bold; text-align: left; color: blue;">                  
                      <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    </span>             
                    <?php } ?>

                  
              
                    <?php if( $value1["idinscstatus"] == 2 ){ ?>
              
                    <span style="font-weight: bold; text-align: left; color: darkgreen;">                  
                      <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    </span>
             
                    <?php } ?>
               

                      <?php if( $value1["idinscstatus"] == 3 ){ ?>
                      
                        <span style="font-weight: bold; text-align: left; color: green;">                  
                          <span>*<?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>*</span>
                        </span>
                      
                      <?php } ?>

                      <?php if( $value1["idinscstatus"] == 6 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: darkorange;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>


                      <?php if( $value1["idinscstatus"] == 7 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: darkblue;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>

                      
                      <?php if( $value1["idinscstatus"] == 8 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: orange;">                  
                          Status: <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>
                      
                      <?php if( $value1["idinscstatus"] == 9 ){ ?>
                      
                        <span style="font-weight: bold; text-align: left; color: red;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      
                      <?php } ?> 
                       </h5>               
                    </div>


              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/admin/profile/insc-audi/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button">Detalhes</a>
                </h5>
              </div>    

               
                </div>
              </div>
              
            </div>
          </div>
          
          <?php } ?>
           
          <?php } ?>
          </div>    
  


          <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
            <div class="box-body" style="text-align: center;">
              <span style="color: orangered; font-weight: bold">PLM - Lista de pessoas com laudo - <?php echo htmlspecialchars( $turma["vagaslaudo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas
              </span>
            </div>
              
            <?php $counter1=-1;  if( isset($inscPlm) && ( is_array($inscPlm) || $inscPlm instanceof Traversable ) && sizeof($inscPlm) ) foreach( $inscPlm as $key1 => $value1 ){ $counter1++; ?>
             <?php if( ($value1["idinscstatus"] != 8) && ($value1["idinscstatus"] != 9) ){ ?>
            <div class="box-body" style=" margin: 5px;">
              <div <?php echo colorStatus($value1["idinscstatus"]); ?> style="margin: 5px" class="row">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-6" style="margin: 2; padding: 2">
                    <h5 style="text-align: left;">
                      <?php echo htmlspecialchars( $value1["numordem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>º -
                      <strong>[<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>] - <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
                      <?php if( UserIsAdmin() ){ ?>
                      &nbsp;<?php echo htmlspecialchars( $value1["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;
                      <?php }else{ ?>
                      &nbsp;<?php echo formatCpf($value1["numcpf"]); ?>&nbsp;
                      <?php } ?>                      
                      <strong><?php echo calcularIdade($value1["dtnasc"]); ?> anos</strong>
                      &nbsp;Nascim.: <?php echo formatDate($value1["dtnasc"]); ?>&nbsp;
                    </h5>
                  </div>

                  <div class="col-md-6" style="margin: 2; padding: 2">
                    <h5 style="text-align: left;">               
                       <strong>Resp: </strong><?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                        &nbsp;
                       <a href="https://wa.me/+55<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá <?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>!" target="_blank" onclick="return confirm('Você será direcionado para o whatsapp do aluno ou responsável. Digite sua mensagem e no app clique em enviar msg.')"><i class="fa fa-whatsapp" style="color: darkgreen; font-weight: bold;"></i><span style="color: black;"> <?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;</span></a>
                       
                       &nbsp;&nbsp;&nbsp;&nbsp;

                       <a style="font-weight: bold;" onclick="requisitarPaginaEndereco('/prof/insc-turma-temporada-endereco/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')"><i class="fas fa-map-marker-alt"></i> Endereço </a>         

                        &nbsp;&nbsp;&nbsp;&nbsp;
                      
                      <strong>Dt Insc.: </strong><?php echo formatDate($value1["dtinsc"]); ?>
                      &nbsp;<strong>Dt Matric.: </strong><?php echo formatDate($value1["dtmatric"]); ?>&nbsp;
                    </h5>
                  </div>                   
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">                  

                  <div class="col-md-6" style="margin: 2; padding: 2">
                    <h5 style="text-align: left;">  

                      <span style="font-weight: bold; text-align: left; color: brown;">                  
                        <?php if( $value1["vulnsocial"] == 1 ){ ?> (Vuln. Social) &nbsp;&nbsp;<?php } ?>
                      </span>               
                      
                      <span style="font-weight: bold; text-align: left; color: darkblue;">  
                        <?php if( $value1["inscpcd"] == 1 ){ ?> PCD &nbsp;&nbsp;<?php } ?>  
                      </span>                            
                    
                      
                      <span style="font-weight: bold; text-align: left; color: darkgreen;">                  
                        <?php if( $value1["laudo"] == 1 ){ ?>LAUDO  &nbsp;&nbsp;<?php } ?>
                       </span>
                   
                  

                    <?php if( $value1["idinscstatus"] == 1 ){ ?>              
                    <span style="font-weight: bold; text-align: left; color: blue;">                  
                      <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    </span>             
                    <?php } ?>

                  
              
                    <?php if( $value1["idinscstatus"] == 2 ){ ?>
              
                    <span style="font-weight: bold; text-align: left; color: darkgreen;">                  
                      <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    </span>
             
                    <?php } ?>
               

                      <?php if( $value1["idinscstatus"] == 3 ){ ?>
                      
                        <span style="font-weight: bold; text-align: left; color: green;">                  
                          <span>*<?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>*</span>
                        </span>
                      
                      <?php } ?>

                      <?php if( $value1["idinscstatus"] == 6 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: darkorange;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>


                      <?php if( $value1["idinscstatus"] == 7 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: darkblue;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>

                      
                      <?php if( $value1["idinscstatus"] == 8 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: orange;">                  
                          Status: <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>
                      
                      <?php if( $value1["idinscstatus"] == 9 ){ ?>
                      
                        <span style="font-weight: bold; text-align: left; color: red;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      
                      <?php } ?> 
                       </h5>               
                    </div>


              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/admin/profile/insc-audi/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button">Detalhes</a>
                </h5>
              </div>       

              
                </div>
              </div>
              
            </div>
          </div>
          <?php } ?>
           
          <?php } ?>
          </div>  

          <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
            <div class="box-body" style="text-align: center;">
              <span style="color: orangered; font-weight: bold">Lista GERAL de pessoas - <?php echo htmlspecialchars( $turma["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas
              </span>
            </div>
              
            <?php $counter1=-1;  if( isset($insc) && ( is_array($insc) || $insc instanceof Traversable ) && sizeof($insc) ) foreach( $insc as $key1 => $value1 ){ $counter1++; ?>
             <?php if( ($value1["idinscstatus"] != 8) && ($value1["idinscstatus"] != 9) ){ ?>
            <div class="box-body" style=" margin: 5px;">
              <div <?php echo colorStatus($value1["idinscstatus"]); ?> style="margin: 5px" class="row">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-6" style="margin: 2; padding: 2">
                    <h5 style="text-align: left;">
                      <?php echo htmlspecialchars( $value1["numordem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>º -
                      <strong>[<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>] - <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
                      <?php if( UserIsAdmin() ){ ?>
                      &nbsp;<?php echo htmlspecialchars( $value1["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;
                      <?php }else{ ?>
                      &nbsp;<?php echo formatCpf($value1["numcpf"]); ?>&nbsp;
                      <?php } ?>                      
                      <strong><?php echo calcularIdade($value1["dtnasc"]); ?> anos</strong>
                      &nbsp;Nascim.: <?php echo formatDate($value1["dtnasc"]); ?>&nbsp;
                    </h5>
                  </div>

                  <div class="col-md-6" style="margin: 2; padding: 2">
                    <h5 style="text-align: left;">               
                       <strong>Resp: </strong><?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                       &nbsp;
                       <a href="https://wa.me/+55<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá <?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>!" target="_blank" onclick="return confirm('Você será direcionado para o whatsapp do aluno ou responsável. Digite sua mensagem e no app clique em enviar msg.')"><i class="fa fa-whatsapp" style="color: darkgreen; font-weight: bold;"></i><span style="color: black;"> <?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;</span></a>
                       
                       &nbsp;&nbsp;&nbsp;&nbsp;

                       <a style="font-weight: bold;" onclick="requisitarPaginaEndereco('/prof/insc-turma-temporada-endereco/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')"><i class="fas fa-map-marker-alt"></i> Endereço </a>         

                        &nbsp;&nbsp;&nbsp;&nbsp;
                        
                      <strong>Dt Insc.: </strong><?php echo formatDate($value1["dtinsc"]); ?>
                      &nbsp;<strong>Dt Matric.: </strong><?php echo formatDate($value1["dtmatric"]); ?>&nbsp;
                    </h5>
                  </div>                   
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">                  

                  <div class="col-md-6" style="margin: 2; padding: 2">
                    <h5 style="text-align: left;"> 

                      <span style="font-weight: bold; text-align: left; color: brown;">                  
                        <?php if( $value1["vulnsocial"] == 1 ){ ?> (Vuln. Social) &nbsp;&nbsp;<?php } ?>
                      </span>                
                      
                      <span style="font-weight: bold; text-align: left; color: darkblue;">  
                        <?php if( $value1["inscpcd"] == 1 ){ ?> PCD &nbsp;&nbsp;<?php } ?>  
                      </span>        
                      
                      <span style="font-weight: bold; text-align: left; color: darkgreen;">                  
                        <?php if( $value1["laudo"] == 1 ){ ?>LAUDO  &nbsp;&nbsp;<?php } ?>
                       </span>
                   
                  

                    <?php if( $value1["idinscstatus"] == 1 ){ ?>              
                    <span style="font-weight: bold; text-align: left; color: blue;">                  
                      <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    </span>             
                    <?php } ?>

                  
              
                    <?php if( $value1["idinscstatus"] == 2 ){ ?>
              
                    <span style="font-weight: bold; text-align: left; color: darkgreen;">                  
                      <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    </span>
             
                    <?php } ?>
               

                      <?php if( $value1["idinscstatus"] == 3 ){ ?>
                      
                        <span style="font-weight: bold; text-align: left; color: green;">                  
                          <span>*<?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>*</span>
                        </span>
                      
                      <?php } ?>

                      <?php if( $value1["idinscstatus"] == 6 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: darkorange;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>


                      <?php if( $value1["idinscstatus"] == 7 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: darkblue;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>

                      
                      <?php if( $value1["idinscstatus"] == 8 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: orange;">                  
                          Status: <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>
                      
                      <?php if( $value1["idinscstatus"] == 9 ){ ?>
                      
                        <span style="font-weight: bold; text-align: left; color: red;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      
                      <?php } ?> 
                       </h5>               
                    </div>


              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/admin/profile/insc-audi/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button">Detalhes</a>
                </h5>
              </div> 

                  
                </div>
              </div>
              
            </div>
          </div>
          <?php } ?>
           
          <?php } ?>
          </div>      
          
          <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
            <div class="box-body" style="text-align: center; background-color: orangered;">
              <span style="color: black; font-weight: bold">Canceladas
              </span>
            </div>

          <?php $counter1=-1;  if( isset($inscTodas) && ( is_array($inscTodas) || $inscTodas instanceof Traversable ) && sizeof($inscTodas) ) foreach( $inscTodas as $key1 => $value1 ){ $counter1++; ?>
            <?php if( ($value1["idinscstatus"] == 9) ){ ?>
            <div class="box-body" style=" margin: 5px;">
              <div <?php echo colorStatus($value1["idinscstatus"]); ?> style="margin: 5px" class="row">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-6" style="margin: 2; padding: 2">
                    <h5 style="text-align: left;">
                      <?php echo htmlspecialchars( $value1["numordem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>º -
                      <strong>[<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>] - <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
                      &nbsp;<?php echo formatCpf($value1["numcpf"]); ?>&nbsp;
                      <strong><?php echo calcularIdade($value1["dtnasc"]); ?> anos</strong>
                      &nbsp;Nascim.: <?php echo formatDate($value1["dtnasc"]); ?>&nbsp;
                    </h5>
                  </div>

                  <div class="col-md-6" style="margin: 2; padding: 2">
                    <h5 style="text-align: left;">               
                       <strong>Resp: <?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
                      &nbsp;
                       <a href="https://wa.me/+55<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá!" target="_blank" onclick="return confirm('Você será direcionado para o whatsapp do aluno ou responsável. Digite sua mensagem e no app clique em enviar msg.')"><i class="fa fa-whatsapp" style="color: green;"></i><span style="color: black;"> <?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;</span></a>                       

                       &nbsp;&nbsp;&nbsp;&nbsp;

                       <a style="font-weight: bold;" onclick="requisitarPaginaEndereco('/prof/insc-turma-temporada-endereco/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')"><i class="fas fa-map-marker-alt"></i> Endereço </a>         

                        &nbsp;&nbsp;&nbsp;&nbsp;

                      <strong>Dt Insc.: <?php echo formatDate($value1["dtinsc"]); ?></strong>
                      &nbsp;Dt Matric.: <?php echo formatDate($value1["dtmatric"]); ?>&nbsp;
                    </h5>
                  </div>                   
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">                  

                  <div class="col-md-6" style="margin: 2; padding: 2">
                    <h5 style="text-align: left;"> 

                      <span style="font-weight: bold; text-align: left; color: brown;">                  
                        <?php if( $value1["vulnsocial"] == 1 ){ ?> (Vuln. Social) &nbsp;&nbsp;<?php } ?>
                      </span>                
                      
                      <span style="font-weight: bold; text-align: left; color: darkblue;">  
                        <?php if( $value1["inscpcd"] == 1 ){ ?> PCD &nbsp;&nbsp;<?php } ?>  
                      </span>        
                      
                      <span style="font-weight: bold; text-align: left; color: darkgreen;">                  
                        <?php if( $value1["laudo"] == 1 ){ ?>LAUDO  &nbsp;&nbsp;<?php } ?>
                       </span>
                   
                  

                    <?php if( $value1["idinscstatus"] == 1 ){ ?>              
                    <span style="font-weight: bold; text-align: left; color: blue;">                  
                      <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    </span>             
                    <?php } ?>

                  
              
                    <?php if( $value1["idinscstatus"] == 2 ){ ?>
              
                    <span style="font-weight: bold; text-align: left; color: darkgreen;">                  
                      <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    </span>
             
                    <?php } ?>
               

                      <?php if( $value1["idinscstatus"] == 3 ){ ?>
                      
                        <span style="font-weight: bold; text-align: left; color: green;">                  
                          <span>*<?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>*</span>
                        </span>
                      
                      <?php } ?>

                      <?php if( $value1["idinscstatus"] == 6 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: darkorange;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>


                      <?php if( $value1["idinscstatus"] == 7 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: darkblue;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>

                      
                      <?php if( $value1["idinscstatus"] == 8 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: orange;">                  
                          Status: <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>
                      
                      <?php if( $value1["idinscstatus"] == 9 ){ ?>
                      
                        <span style="font-weight: bold; text-align: left; color: red;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      
                      <?php } ?> 
                       </h5>               
                    </div>


              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/admin/profile/insc-audi/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button">Detalhes</a>
                </h5>
              </div> 

                  
                </div>
              </div>
              
            </div>
          </div>

          <?php } ?>
           
          <?php } ?>
          </div>      

          <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
            <div class="box-body" style="text-align: center; background-color: darkorange;">
              <span style="color: black; font-weight: bold">Desistentes
              </span>
            </div>

          <?php $counter1=-1;  if( isset($inscTodas) && ( is_array($inscTodas) || $inscTodas instanceof Traversable ) && sizeof($inscTodas) ) foreach( $inscTodas as $key1 => $value1 ){ $counter1++; ?>
            <?php if( ($value1["idinscstatus"] == 8) ){ ?>
            <div class="box-body" style=" margin: 5px;">
              <div <?php echo colorStatus($value1["idinscstatus"]); ?> style="margin: 5px" class="row">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-6" style="margin: 2; padding: 2">
                    <h5 style="text-align: left;">
                      <?php echo htmlspecialchars( $value1["numordem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>º -
                      <strong>[<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>] - <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
                      &nbsp;<?php echo formatCpf($value1["numcpf"]); ?>&nbsp;
                      <strong><?php echo calcularIdade($value1["dtnasc"]); ?> anos</strong>
                      &nbsp;Nascim.: <?php echo formatDate($value1["dtnasc"]); ?>&nbsp;
                    </h5>
                  </div>

                  <div class="col-md-6" style="margin: 2; padding: 2">
                    <h5 style="text-align: left;">               
                       <strong>Resp: <?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
                      &nbsp;
                       <a href="https://wa.me/+55<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá!" target="_blank" onclick="return confirm('Você será direcionado para o whatsapp do aluno ou responsável. Digite sua mensagem e no app clique em enviar msg.')"><i class="fa fa-whatsapp" style="color: green;"></i><span style="color: black;"> <?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;</span></a>                       

                       &nbsp;&nbsp;&nbsp;&nbsp;

                       <a style="font-weight: bold;" onclick="requisitarPaginaEndereco('/prof/insc-turma-temporada-endereco/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')"><i class="fas fa-map-marker-alt"></i> Endereço </a>         

                        &nbsp;&nbsp;&nbsp;&nbsp;

                      <strong>Dt Insc.: <?php echo formatDate($value1["dtinsc"]); ?></strong>
                      &nbsp;Dt Matric.: <?php echo formatDate($value1["dtmatric"]); ?>&nbsp;
                    </h5>
                  </div>                   
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">                  

                  <div class="col-md-6" style="margin: 2; padding: 2">
                    <h5 style="text-align: left;"> 

                      <span style="font-weight: bold; text-align: left; color: brown;">                  
                        <?php if( $value1["vulnsocial"] == 1 ){ ?> (Vuln. Social) &nbsp;&nbsp;<?php } ?>
                      </span>                
                      
                      <span style="font-weight: bold; text-align: left; color: darkblue;">  
                        <?php if( $value1["inscpcd"] == 1 ){ ?> PCD &nbsp;&nbsp;<?php } ?>  
                      </span>        
                      
                      <span style="font-weight: bold; text-align: left; color: darkgreen;">                  
                        <?php if( $value1["laudo"] == 1 ){ ?>LAUDO  &nbsp;&nbsp;<?php } ?>
                       </span>
                   
                  

                    <?php if( $value1["idinscstatus"] == 1 ){ ?>              
                    <span style="font-weight: bold; text-align: left; color: blue;">                  
                      <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    </span>             
                    <?php } ?>

                  
              
                    <?php if( $value1["idinscstatus"] == 2 ){ ?>
              
                    <span style="font-weight: bold; text-align: left; color: darkgreen;">                  
                      <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                    </span>
             
                    <?php } ?>
               

                      <?php if( $value1["idinscstatus"] == 3 ){ ?>
                      
                        <span style="font-weight: bold; text-align: left; color: green;">                  
                          <span>*<?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>*</span>
                        </span>
                      
                      <?php } ?>

                      <?php if( $value1["idinscstatus"] == 6 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: darkorange;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>


                      <?php if( $value1["idinscstatus"] == 7 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: darkblue;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>

                      
                      <?php if( $value1["idinscstatus"] == 8 ){ ?>
                        <span style="font-weight: bold; text-align: left; color: orange;">                  
                          Status: <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      <?php } ?>
                      
                      <?php if( $value1["idinscstatus"] == 9 ){ ?>
                      
                        <span style="font-weight: bold; text-align: left; color: red;">                  
                          <span><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                        </span>
                      
                      <?php } ?> 
                       </h5>               
                    </div>


              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/admin/profile/insc-audi/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button">Detalhes</a>
                </h5>
              </div> 

            
                </div>
              </div>
              
            </div>
          </div>

          <?php } ?>
           
          <?php } ?>
          </div>
         
       

         
            <button type="button" onclick="window.print()" class="btn btn-primary pull-right" style="margin-right: 5px;">
                    <i class="fa fa-print"></i> Imprimir
                </button>
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

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->




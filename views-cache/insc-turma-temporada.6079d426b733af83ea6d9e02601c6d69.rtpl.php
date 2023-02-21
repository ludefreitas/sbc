<?php if(!class_exists('Rain\Tpl')){exit;}?>

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
     [<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>]  <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $turma["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  <?php echo htmlspecialchars( $turma["periodo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $turma["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> -   <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $turma["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/admin/turma-temporada/<?php echo htmlspecialchars( $temporada["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Turmas por temporada</a></li>
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
                <span style="color: orangered; font-weight: bold">PVS - Lista de pessoas em vulnerabilidade social - <?php echo htmlspecialchars( $turma["vagas"] * 0.1, ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas
                </span>
          </div>
              
            <?php $counter1=-1;  if( isset($inscPvs) && ( is_array($inscPvs) || $inscPvs instanceof Traversable ) && sizeof($inscPvs) ) foreach( $inscPvs as $key1 => $value1 ){ $counter1++; ?>
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
                       <strong>Resp: </strong><?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                      &nbsp;
                       <a href="https://wa.me/+55<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá!" target="_blank" onclick="return confirm('Você será direcionado para o whatsapp do aluno ou responsável. Digite sua mensagem e no app clique em enviar msg.')"><i class="fa fa-whatsapp" style="color: green;"></i><span style="color: black;"> <?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;</span></a>

                       &nbsp; <strong>Contato: </strong>&nbsp;
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
                  <a href="/admin/profile/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button">Detalhes</a>
                </h5>
              </div> 


              
              <?php if( $value1["idinscstatus"] == 1 ){ ?>
                <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a class="btn btn-danger btn-xs" href="/admin/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusDesistente" role="button" onclick="return confirm('Deseja realmente informar como desistente o <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da inscrição <?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?')">Marcar como desistente</a>
                </h5>
                </div>
              <?php } ?>         

              <?php if( $value1["idinscstatus"] == 2 ){ ?>
                <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/admin/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusMatriculada" onclick="return confirm('Deseja realmente efetuar a MATRÍCULA do(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> na turma <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-success btn-xs"><i></i> Matricular</a>
                </h5>
                </div>
                <?php if( $numMatriculados >= $vagas ){ ?>
                  <div class="col-md-2" style="margin: 2; padding: 2">
                  <h5 style="font-weight: bold; text-align: left;">  
      
                    <a href="/admin/turma/create/token/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-info btn-xs"><i></i> Gerar token</a>
                   
                  </h5>
                  </div>
                <?php } ?>
              <?php } ?>

              <?php if( $value1["idinscstatus"] == 3 ){ ?>
            <!--
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">            
                  <a href="/admin/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/enviarEmailASorteado" onclick="return confirm('Deseja realmente enviar email para que o(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> fique sabendo que foi sorteado na turma de <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-info btn-xs"><i></i> Avisar Sorteado </a>
                </h5>
              </div>
            -->
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/admin/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusMatriculada" onclick="return confirm('Deseja realmente efetuar a MATRÍCULA do(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> na turma <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-success btn-xs"><i></i> Matricular</a>
                </h5>
                </div>
                

              <?php } ?>
              
              <?php if( $value1["idinscstatus"] == 7 ){ ?>

              <div class="col-md-2" style="margin: 1; padding: 1">
                <h5 style="font-weight: bold; text-align: left;">                  
                 <a href="https://wa.me/+55<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá,%20informamos%20que%20temos%20uma%20vaga%20disponível%20para%20o(a)%20<?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20na%20turma%20de%20<?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20das%20<?php echo htmlspecialchars( $turma["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20às%20<?php echo htmlspecialchars( $turma["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20no%20<?php echo htmlspecialchars( $turma["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20Nº%20<?php echo htmlspecialchars( $turma["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>,%20da%20qual%20você%20fez%20inscrição.%20Se%20você%20ainda%20tem%20interesse%20na%20vaga,%20responda%20SIM%20nas%20próximas%2024%20horas,%20que%20vamos%20passar%20mais%20informações.%20Se%20você%20não%20tiver%20interesse%20ou%20não%20responder,%20vamos%20chamar%20o%20próximo%20inscrito%20da%20lista%20de%20espera%20e%20você%20terá%20que%20fazer%20uma%20nova%20inscrição%20para%20esta%20turma." target="_blank" onclick="return confirm('Você será direcionado para o whatsapp com a mensagem referente a vaga disponível já preenchida. No app clique em enviar msg.')" class="btn btn-success btn-xs"><i></i>Informar vaga pelo WhatsApp</a>
              
              
              </div>
                <div class="col-md-2" style="margin: 1; padding: 1">
              
               
                  <a href="/admin/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusAguardandoMatricula" onclick="return confirm('Você já informou, por telefone ou whatsapp, o(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> sobre a vaga disponível para a turma de <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>? Se sim, clique em OK, se não imformou, clique em cancelar e informe o aluno sobre a vaga.')" class="btn btn-warning btn-xs"><i></i> Marcar aguardandado matrícula</a>
                </h5>
              </div>               <?php } ?>
                  
                </div>
              </div>
              
            </div>
          </div>
           
          <?php } ?>
          </div>  

          <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
            <div class="box-body" style="text-align: center;">
                <span style="color: orangered; font-weight: bold">PCD - Lista de pessoas com deficiência - <?php echo htmlspecialchars( $turma["vagas"] * 0.1, ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas
                </span>
          </div>
              
            <?php $counter1=-1;  if( isset($inscPcd) && ( is_array($inscPcd) || $inscPcd instanceof Traversable ) && sizeof($inscPcd) ) foreach( $inscPcd as $key1 => $value1 ){ $counter1++; ?>
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
                       <a href="https://wa.me/+55<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá!" target="_blank" onclick="return confirm('Você será direcionado para o whatsapp do aluno ou responsável. Digite sua mensagem e no app clique em enviar msg.')"><i class="fa fa-whatsapp" style="color: darkgreen; font-weight: bold;"></i><span style="color: black;"> <?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;</span></a>

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
                  <a href="/admin/profile/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button">Detalhes</a>
                </h5>
              </div>    

              <?php if( $value1["idinscstatus"] == 1 ){ ?>
                <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a class="btn btn-danger btn-xs" href="/admin/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusDesistente" role="button" onclick="return confirm('Deseja realmente informar como desistente o <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da inscrição <?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?')"> Marcar como desistente</a>
                </h5>
                </div>
              <?php } ?>                   

              <?php if( $value1["idinscstatus"] == 2 ){ ?>
                <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/admin/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusMatriculada" onclick="return confirm('Deseja realmente efetuar a MATRÍCULA do(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> na turma <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-success btn-xs"><i></i> Matricular</a>
                </h5>
                </div>
                <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">  

                  <a href="/admin/turma/create/token/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-info btn-xs"><i></i> Gerar token</a>

                </h5>
                </div>
              <?php } ?>

              <?php if( $value1["idinscstatus"] == 3 ){ ?>
            <!--
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">            
                  <a href="/admin/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/enviarEmailASorteado" onclick="return confirm('Deseja realmente enviar email para que o(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> fique sabendo que foi sorteado na turma de <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-info btn-xs"><i></i> Avisar Sorteado </a>
                </h5>
              </div>
            -->
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/admin/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusMatriculada" onclick="return confirm('Deseja realmente efetuar a MATRÍCULA do(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> na turma <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-success btn-xs"><i></i> Matricular</a>
                </h5>
                </div>
                

              <?php } ?>
              
              <?php if( $value1["idinscstatus"] == 7 ){ ?>

              <div class="col-md-2" style="margin: 1; padding: 1">
                <h5 style="font-weight: bold; text-align: left; color: darkgreen;">                  
                  <a href="https://wa.me/+55<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá,%20informamos%20que%20temos%20uma%20vaga%20disponível%20para%20o(a)%20<?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20na%20turma%20de%20<?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20das%20<?php echo htmlspecialchars( $turma["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20às%20<?php echo htmlspecialchars( $turma["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20no%20<?php echo htmlspecialchars( $turma["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20Nº%20<?php echo htmlspecialchars( $turma["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>,%20da%20qual%20você%20fez%20inscrição.%20Se%20você%20ainda%20tem%20interesse%20na%20vaga,%20responda%20SIM%20nas%20próximas%2024%20horas,%20que%20vamos%20passar%20mais%20informações.%20Se%20você%20não%20tiver%20interesse%20ou%20não%20responder,%20vamos%20chamar%20o%20próximo%20inscrito%20da%20lista%20de%20espera%20e%20você%20terá%20que%20fazer%20uma%20nova%20inscrição%20para%20esta%20turma." target="_blank" onclick="return confirm('Você será direcionado para o whatsapp com a mensagem referente a vaga disponível já preenchida. No app clique em enviar msg.')" class="btn btn-success btn-xs"><i></i>Informar vaga pelo WhatsApp</a>
              
              
              </div>
                <div class="col-md-2" style="margin: 1; padding: 1">
              
               
                  <a href="/admin/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusAguardandoMatricula" onclick="return confirm('Você já informou, por telefone ou whatsapp, o(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> sobre a vaga disponível para a turma de <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>? Se sim, clique em OK, se não imformou, clique em cancelar e informe o aluno sobre a vaga.')" class="btn btn-warning btn-xs"><i></i> Marcar aguardandado matrícula</a>
                </h5>
              </div>

              <!--
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/admin/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusSorteada" class="btn btn-danger btn-xs"><i></i> Sorteada ?</a>
                </h5>
              </div>
            -->
              <!--
               <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/admin/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusSorteada" class="btn btn-danger btn-xs"><i></i> Sorteada ?</a>
                </h5>
              </div>
            -->
              <!--
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/admin/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusSorteada" onclick="return confirm('Deseja realmente que a inscrição <?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  do(da) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> seja confirmada como Sorteada na turma de <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-danger btn-xs"><i></i> Sorteada ?</a>
                </h5>
              </div>
            -->
          
               <?php } ?>
                  
                </div>
              </div>
              
            </div>
          </div>
           
          <?php } ?>
          </div>    
  


          <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
            <div class="box-body" style="text-align: center;">
              <span style="color: orangered; font-weight: bold">PLM - Lista de pessoas com laudo - <?php echo htmlspecialchars( $turma["vagas"] * 0.1, ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas
              </span>
            </div>
              
            <?php $counter1=-1;  if( isset($inscPlm) && ( is_array($inscPlm) || $inscPlm instanceof Traversable ) && sizeof($inscPlm) ) foreach( $inscPlm as $key1 => $value1 ){ $counter1++; ?>
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
                  <a href="/admin/profile/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button">Detalhes</a>
                </h5>
              </div>       

              <?php if( $value1["idinscstatus"] == 1 ){ ?>
                <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a class="btn btn-danger btn-xs" href="/admin/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusDesistente" role="button" onclick="return confirm('Deseja realmente informar como desistente o <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da inscrição <?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?')">Marcar como desistente</a>
                </h5>
                </div>
              <?php } ?>                

              <?php if( $value1["idinscstatus"] == 2 ){ ?>
                <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/admin/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusMatriculada" onclick="return confirm('Deseja realmente efetuar a MATRÍCULA do(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> na turma <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-success btn-xs"><i></i> Matricular</a>
                </h5>
                </div>
                <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/admin/turma/create/token/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-info btn-xs"><i></i> Gerar token</a>
                </h5>
                </div>
              <?php } ?>

              <?php if( $value1["idinscstatus"] == 3 ){ ?>
            <!--
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">            
                  <a href="/admin/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/enviarEmailASorteado" onclick="return confirm('Deseja realmente enviar email para que o(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> fique sabendo que foi sorteado na turma de <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-info btn-xs"><i></i> Avisar Sorteado </a>
                </h5>
              </div>
            -->
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/admin/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusMatriculada" onclick="return confirm('Deseja realmente efetuar a MATRÍCULA do(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> na turma <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-success btn-xs"><i></i> Matricular</a>
                </h5>
                </div>
                

              <?php } ?>
              
              <?php if( $value1["idinscstatus"] == 7 ){ ?>
              
              <div class="col-md-2" style="margin: 1; padding: 1">
                <h5 style="font-weight: bold; text-align: left;">                  
                 <a href="https://wa.me/+55<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá,%20informamos%20que%20temos%20uma%20vaga%20disponível%20para%20o(a)%20<?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20na%20turma%20de%20<?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20das%20<?php echo htmlspecialchars( $turma["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20às%20<?php echo htmlspecialchars( $turma["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20no%20<?php echo htmlspecialchars( $turma["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20Nº%20<?php echo htmlspecialchars( $turma["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>,%20da%20qual%20você%20fez%20inscrição.%20Se%20você%20ainda%20tem%20interesse%20na%20vaga,%20responda%20SIM%20nas%20próximas%2024%20horas,%20que%20vamos%20passar%20mais%20informações.%20Se%20você%20não%20tiver%20interesse%20ou%20não%20responder,%20vamos%20chamar%20o%20próximo%20inscrito%20da%20lista%20de%20espera%20e%20você%20terá%20que%20fazer%20uma%20nova%20inscrição%20para%20esta%20turma." target="_blank" onclick="return confirm('Você será direcionado para o whatsapp com a mensagem referente a vaga disponível já preenchida. No app clique em enviar msg.')" class="btn btn-success btn-xs"><i></i>Informar vaga pelo WhatsApp</a>
              
              
               </div>
                <div class="col-md-2" style="margin: 1; padding: 1">
              
               
                  <a href="/admin/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusAguardandoMatricula" onclick="return confirm('Você já informou, por telefone ou whatsapp, o(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> sobre a vaga disponível para a turma de <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>? Se sim, clique em OK, se não imformou, clique em cancelar e informe o aluno sobre a vaga.')" class="btn btn-warning btn-xs"><i></i> Marcar aguardandado matrícula</a>
                </h5>
              </div>

              <!--
               <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/admin/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusSorteada" class="btn btn-danger btn-xs"><i></i> Sorteada ?</a>
                </h5>
              </div>
            -->
              <!--
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/admin/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusSorteada" onclick="return confirm('Deseja realmente que a inscrição <?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  do(da) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> seja confirmada como Sorteada na turma de <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-danger btn-xs"><i></i> Sorteada ?</a>
                </h5>
              </div>
            -->
               <?php } ?>
                  
                </div>
              </div>
              
            </div>
          </div>
           
          <?php } ?>
          </div>  

          <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
            <div class="box-body" style="text-align: center;">
              <span style="color: orangered; font-weight: bold">Lista GERAL de pessoas - <?php echo htmlspecialchars( $turma["vagas"] * 0.7, ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas
              </span>
            </div>
              
            <?php $counter1=-1;  if( isset($insc) && ( is_array($insc) || $insc instanceof Traversable ) && sizeof($insc) ) foreach( $insc as $key1 => $value1 ){ $counter1++; ?>
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
                  <a href="/admin/profile/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button">Detalhes</a>
                </h5>
              </div> 

              <?php if( $value1["idinscstatus"] == 1 ){ ?>
                <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a class="btn btn-danger btn-xs" href="/admin/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusDesistente" role="button" onclick="return confirm('Deseja realmente informar como desistente o <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da inscrição <?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?')">Marcar como desistente</a>
                </h5>
                </div>
              <?php } ?>                      

              <?php if( $value1["idinscstatus"] == 2 ){ ?>
                <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/admin/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusMatriculada" onclick="return confirm('Deseja realmente efetuar a MATRÍCULA do(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> na turma <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-success btn-xs"><i></i> Matricular</a>
                </h5>
                </div>
                <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">   

                  <a href="/admin/turma/create/token/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-info btn-xs"><i></i> Gerar token</a>

                </h5>
                </div>
              <?php } ?>

              <?php if( $value1["idinscstatus"] == 3 ){ ?>
            <!--
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">            
                  <a href="/admin/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/enviarEmailASorteado" onclick="return confirm('Deseja realmente enviar email para que o(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> fique sabendo que foi sorteado na turma de <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-info btn-xs"><i></i> Avisar Sorteado </a>
                </h5>
              </div>
            -->
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/admin/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusMatriculada" onclick="return confirm('Deseja realmente efetuar a MATRÍCULA do(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> na turma <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-success btn-xs"><i></i> Matricular</a>
                </h5>
                </div>
                

              <?php } ?>
              
              <?php if( $value1["idinscstatus"] == 7 ){ ?>

              <div class="col-md-2" style="margin: 1; padding: 1">
                <h5 style="font-weight: bold; text-align: left;">                  
                 <a href="https://wa.me/+55<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?text=Olá,%20informamos%20que%20temos%20uma%20vaga%20disponível%20para%20o(a)%20<?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20na%20turma%20de%20<?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20das%20<?php echo htmlspecialchars( $turma["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20às%20<?php echo htmlspecialchars( $turma["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20no%20<?php echo htmlspecialchars( $turma["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20Nº%20<?php echo htmlspecialchars( $turma["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%20-%20<?php echo htmlspecialchars( $turma["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>,%20da%20qual%20você%20fez%20inscrição.%20Se%20você%20ainda%20tem%20interesse%20na%20vaga,%20responda%20SIM%20nas%20próximas%2024%20horas,%20que%20vamos%20passar%20mais%20informações.%20Se%20você%20não%20tiver%20interesse%20ou%20não%20responder,%20vamos%20chamar%20o%20próximo%20inscrito%20da%20lista%20de%20espera%20e%20você%20terá%20que%20fazer%20uma%20nova%20inscrição%20para%20esta%20turma." target="_blank" onclick="return confirm('Você será direcionado para o whatsapp com a mensagem referente a vaga disponível já preenchida. No app clique em enviar msg.')" class="btn btn-success btn-xs"><i></i>Informar vaga pelo WhatsApp</a>
              
              
              </div>
                <div class="col-md-2" style="margin: 1; padding: 1">
              
               
                  <a href="/admin/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusAguardandoMatricula" onclick="return confirm('Você já informou, por telefone ou whatsapp, o(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> sobre a vaga disponível para a turma de <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>? Se sim, clique em OK, se não imformou, clique em cancelar e informe o aluno sobre a vaga.')" class="btn btn-warning btn-xs"><i></i> Marcar aguardandado matrícula</a>
                </h5>
              </div>

            <!--
               <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/admin/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusSorteada" class="btn btn-danger btn-xs"><i></i> Sorteada ?</a>
                </h5>
              </div>
            -->
              <!--
              <div class="col-md-2" style="margin: 2; padding: 2">
                <h5 style="font-weight: bold; text-align: left;">                  
                  <a href="/admin/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $iduserprof["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusSorteada" onclick="return confirm('Deseja realmente que a inscrição <?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  do(da) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> seja confirmada como Sorteada na turma de <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da temporada <?php echo htmlspecialchars( $temporada["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?')" class="btn btn-danger btn-xs"><i></i> Sorteada ?</a>
                </h5>
              </div>
            -->
               <?php } ?>
                  
                </div>
              </div>
              
            </div>
          </div>
           
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




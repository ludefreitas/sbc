<?php if(!class_exists('Rain\Tpl')){exit;}?><script type="text/javascript">
    function openDivToken(){
      
        document.getElementById('divtoken').hidden = false  
        
    }

    function closeDivToken(){
      
        document.getElementById('divtoken').hidden = true  
        
    }

</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Criar Novo Evento
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a style="color: red" href="javascript: history.go(-1)">Voltar</a>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">

        <?php if( $error != '' ){ ?>
            <div class="alert alert-danger" style="margin: 10px 10px 0px 10px">
        <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
            </div>
        <?php } ?>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/evento/create" method="post">
          <div class="box-body">

            <div class="row">

              <div class="col-md-6">

                <div class="box-header">
                  <label for="desc_evento">Descrição do evento</label>
                   <input type="text" class="form-control" id="desc_evento" name="desc_evento" placeholder="Descreva o evento" value="<?php echo htmlspecialchars( $createEventoValues["desc_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>    


                <div class="box-header">
                  <label for="turma">Espaço - Crec</label>
                  <select class="form-control" name="idespaco">
                  <option value="<?php echo htmlspecialchars( $createEventoValues["idespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Selecione o Crec, o espaço e os horários</option>    
                  <?php $counter1=-1;  if( isset($espaco) && ( is_array($espaco) || $espaco instanceof Traversable ) && sizeof($espaco) ) foreach( $espaco as $key1 => $value1 ){ $counter1++; ?>
                  <option value="<?php echo htmlspecialchars( $value1["idespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["nomeespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <?php } ?>                            
                  </select>
                </div>   

                <div class="box-header">
                  <label for="temporada">Temporada</label>
                  <select class="form-control" name="idtemporada">
                  <option value="<?php echo htmlspecialchars( $createEventoValues["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Selecione a temporada</option>    
                  <?php $counter1=-1;  if( isset($temporada) && ( is_array($temporada) || $temporada instanceof Traversable ) && sizeof($temporada) ) foreach( $temporada as $key1 => $value1 ){ $counter1++; ?>
                  <option value="<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <?php } ?>                            
                  </select>
                </div>   

                <div class="box-header">
                  <label for="profestagiario">Responsável</label>
                  <select class="form-control" name="iduser">
                  <option value="<?php echo htmlspecialchars( $createEventoValues["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Selecione o responsável pelo Evento</option>    
                  <?php $counter1=-1;  if( isset($profestagiario) && ( is_array($profestagiario) || $profestagiario instanceof Traversable ) && sizeof($profestagiario) ) foreach( $profestagiario as $key1 => $value1 ){ $counter1++; ?>
                  <option value="<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <?php } ?>                            
                  </select>
                </div>   


                <div class="box-header">
                  <label for="statusEvento">Status Evento</label>
                  <select class="form-control" name="idstatus_evento">
                  <option value="<?php echo htmlspecialchars( $createEventoValues["idstatus_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Selecione o Statsu do Evento</option>    
                  <?php $counter1=-1;  if( isset($eventoStatsu) && ( is_array($eventoStatsu) || $eventoStatsu instanceof Traversable ) && sizeof($eventoStatsu) ) foreach( $eventoStatsu as $key1 => $value1 ){ $counter1++; ?>
                  <option value="<?php echo htmlspecialchars( $value1["idstatus_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descstatus_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <?php } ?>                            
                  </select>
                </div>  

              <div class="box-header">
                <label for="tipo_evento">Tipo</label>
                <select class="form-control" name="tipo_evento" id="tipo_evento">  
                  <?php if( $createEventoValues["tipo_evento"] ){ ?>
                  <option selected="selected" value="<?php echo htmlspecialchars( $createEventoValues["tipo_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $createEventoValues["tipo_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>  
                  <?php }else{ ?>
                  <option selected="selected" value="">Selecione</option>  
                  <?php } ?>                 
                   
                    <option value="Aquática">Aquática</option>
                    <option value="Terrestre">Terrestre</option>
                                            
                </select>
                
              </div>                 

              <div class="box-header">
                <label for="programa_evento">Programa</label>
                <select class="form-control" name="programa_evento" id="programa_evento">  
                  <?php if( $createEventoValues["programa_evento"] ){ ?>
                  <option selected="selected" value="<?php echo htmlspecialchars( $createEventoValues["programa_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $createEventoValues["programa_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>  
                  <?php }else{ ?>
                  <option selected="selected" value="">Selecione</option>  
                  <?php } ?>              

                    <option value="Hora do Treino">Hora do Treino</option>
                    <option value="Corpo em Ação">Corpo em Ação</option>
                    <option value="GR São Bernardo">GR São Bernardo</option>
                    <option value="Campeões da vida">Campeões da vida</option>
                                            
                </select>
              </div> 

              </div>

              <div class="col-md-6">   

              <div class="box-header">
                <label for="origem_evento">Origem</label>
                <select class="form-control" name="origem_evento" id="origem_evento">  
                  <?php if( $createEventoValues["origem_evento"] ){ ?>
                  <option selected="selected" value="<?php echo htmlspecialchars( $createEventoValues["origem_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $createEventoValues["origem_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>  
                  <?php }else{ ?>
                  <option selected="selected" value="">Selecione</option>  
                  <?php } ?>                 
                   
                    <option value="SESP">SESP</option>
                    <option value="PELC">PELC</option>
                    <option value="Voluntário">Voluntário</option>
                    <option value="Convênio Esportes">Convênio Esportes</option>
                                            
                  </select>
              </div> 

                  <div class="box-header">
                    <label for="dt_inicio_divulgacao_evento"> Data de Início das Inscrições</label>
                    <input type="datetime-local" class="form-control" id="dt_inicio_divulgacao_evento" name="dt_inicio_divulgacao_evento" value="<?php echo htmlspecialchars( $createEventoValues["dt_inicio_divulgacao_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                  </div>

                  <div class="box-header">
                    <label for="dt_final_divulgacao_evento"> Data de Início das Matrículas</label>
                    <input type="datetime-local" class="form-control" id="dt_final_divulgacao_evento" name="dt_final_divulgacao_evento" value="<?php echo htmlspecialchars( $createEventoValues["dt_final_divulgacao_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                  </div>

                  <div class="box-header">
                    <label for="dt_comeco_insc_evento"> Data do Fim das Inscrições</label>
                    <input type="datetime-local" class="form-control" id="dt_comeco_insc_evento" name="dt_comeco_insc_evento" value="<?php echo htmlspecialchars( $createEventoValues["dt_comeco_insc_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                  </div>

                  <div class="box-header">
                    <label for="dt_termino_insc_evento"> Data do Fim das Matrículas</label>
                    <input type="datetime-local" class="form-control" id="dt_termino_insc_evento" name="dt_termino_insc_evento" value="<?php echo htmlspecialchars( $createEventoValues["dt_termino_insc_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                  </div>    

                <div id="">
                 <label>
                   &nbsp;&nbsp; <input onchange="openDivToken()" oncuechange="closeDivToken()" type="checkbox" name="tem_insc" value="1"> Evento com inscrição prévia ?
                  </label>
                </div>  
                
                <div id="divtoken" hidden>
                  <label>
                   &nbsp;&nbsp; <input type="checkbox" name="token" value="1"> Tem token ?
                  </label>
                </div>  

                <div id="">
                  <label>
                   &nbsp;&nbsp; <input type="checkbox" name="tem_regras" value="1"> Tem regras ?
                  </label>
                </div>  

                <div id="">
                  <label>
                   &nbsp;&nbsp; <input type="checkbox" name="tem_categoria" value="1"> Dividido por categoria ?
                  </label>
                </div>  

                <div id="">
                  <label>
                   &nbsp;&nbsp; <input type="checkbox" name="tem_imagem" value="1"> Terá premiação ?
                  </label>
                </div>  

                <div id="">
                  <label>
                   &nbsp;&nbsp; <input type="checkbox" name="divulgar_evento" value="1"> Divulgar evento ?
                  </label>
                </div>  

                <div id="">
                  <label>
                   &nbsp;&nbsp; <input type="checkbox" name="tem_imagem" value="1"> Colocar imagem para divulgar evento ?
                  </label>
                </div>  

               
                
              </div>

            </div>
            
          </div>
          <div class="col-md-12">

             <div class="form-group">
              <label for="obs_evento">Observação</label>
               <textarea type="text" class="form-control" id="obs_evento" name="obs_evento" placeholder="Observação" value=""></textarea> 
            </div>
            
          </div>
          <div class="box-footer">
            &nbsp;&nbsp;<button type="submit" class="btn btn-success">Cadastrar</button>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a type="button" class="btn btn-danger" href="javascript:window.history.go(-1)">Cancelar</a>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
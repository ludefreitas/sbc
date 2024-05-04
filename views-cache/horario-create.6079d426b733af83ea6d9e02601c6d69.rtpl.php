<?php if(!class_exists('Rain\Tpl')){exit;}?>  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Criar Novo Horário
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="/admin/horario">Horários de Aula</a></li>
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
          
            <div class="box-body">
              <form role="form" action="/admin/horario/create" method="post">

                  <div class="col-md-6">
                    <div class="box-header">
                      <label for="horainicio">Hora de início</label>
                      <input type="time" class="form-control" id="horainicio" name="horainicio" placeholder="Hora de início da aula" value="<?php echo htmlspecialchars( $createHorarioValues["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <div class="box-header">
                      <label for="diasemana">Dias da semana</label>
                      

                            <select class="form-control" name="diasemana" id="diasemana">  
                            <?php if( $createHorarioValues["diasemana"] ){ ?>

                            <option selected="selected" value="<?php echo htmlspecialchars( $createHorarioValues["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $createHorarioValues["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>  
                            <?php }else{ ?>

                            <option selected="selected" value="">Selecione</option>  
                            <?php } ?>                 
                            <option value="Segunda">Segunda</option>
                            <option value="Segunda e Quarta">Segunda e Quarta</option>
                            <option value="Segunda e Quinta">Segunda e Quinta</option>
                            <option value="Segunda e Sexta">Segunda e Sexta</option>
                            <option value="Segunda a Quinta">Segunda a Quinta</option>
                            <option value="Segunda a Sexta">Segunda a Sexta</option>

                            <option value="Terça">Terça</option>
                            <option value="Terça e Quinta">Terça e Quinta</option>
                            <option value="Terça e Sexta">Terça e Sexta</option>
                            <option value="Terça a Quinta">Terça a Quinta</option>
                            <option value="Terça a Sexta">Terça a Sexta</option>

                            <option value="Quarta">Quarta</option>
                            <option value="Quarta e Sexta">Quarta e Sexta</option>
                            <option value="Quarta a Sexta">Quarta a Sexta</option>

                            <option value="Quinta">Quinta</option>

                            <option value="Sexta">Sexta</option>

                            <option value="Sábado">Sábado</option>
                            
                            
                                                       
                        </select>

                     </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-header">
                      <label for="horatermino">Hora de término</label>
                      <input type="time" class="form-control" id="horatermino" name="horatermino" placeholder="Hora de término da aula" value="<?php echo htmlspecialchars( $createHorarioValues["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <div class="box-header">
                      <label for="periodo">Período</label>

                        <select class="form-control" name="periodo" id="periodo">  
                            <?php if( $createHorarioValues["periodo"] ){ ?>

                            <option selected="selected" value="<?php echo htmlspecialchars( $createHorarioValues["periodo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $createHorarioValues["periodo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>  
                            <?php }else{ ?>

                            <option selected="selected" value="">Selecione</option>  
                            <?php } ?>                 
                            <option value="Manhã">Manhã</option>
                            <option value="Tarde">Tarde</option>
                            <option value="Noite">Noite</option>
                                                       
                        </select>

                    </div>                  


                  </div>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-success">Cadastrar</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;
            <a type="button" class="btn btn-danger" href="javascript:window.history.go(-1)">Cancelar</a>

              </form>
            </div>
            <!-- /.box-body -->        
        </div>
        </div>
    </div>

  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper --
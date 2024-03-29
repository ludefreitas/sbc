<?php if(!class_exists('Rain\Tpl')){exit;}?>    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Criar Nova Temporada
        </h1>
        <ol class="breadcrumb">
          <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="/admin/temporada">Temporadas</a></li>
          <!--<li class="active"><a href="/admin/espaco/create">Cadastrar</a></li>-->
        </ol>
      </section>

      <!-- Main content -->

      <div class="row">
      	<div class="col-md-12">
      		<div class="box box-success">
            <?php if( $error != '' ){ ?>

            <div class="alert alert-danger" style="margin: 0px 10px 0px 10px">
              <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>

            </div>
            <?php } ?>

            <!-- /.box-header -->
            <!-- form start -->

            <div class="box-body">
              <form role="form" action="/admin/temporada/create" method="post">
                <div class="row">
                  <div class="col-md-4">

                    <div class="box-header">
                      <label for="desctemporada"> Descrição da temporada</label>
                      <input type="text" class="form-control" id="desctemporada" name="desctemporada" placeholder="Descreva temporada" value="<?php echo htmlspecialchars( $createTemporadaValues["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>

                    <div class="box-header">
                      <label for="idstatustemporada" value="<?php echo htmlspecialchars( $createTemporadaValues["idstatustemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> Status Temporada</label>
                      <select class="form-control" name="idstatustemporada">
                      <option selected="selected" value="">Selecione o Status da Temporada</option>                          
                      <?php $counter1=-1;  if( isset($statustemporada) && ( is_array($statustemporada) || $statustemporada instanceof Traversable ) && sizeof($statustemporada) ) foreach( $statustemporada as $key1 => $value1 ){ $counter1++; ?>

                      <option value="<?php echo htmlspecialchars( $value1["idstatustemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["idstatustemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["descstatustemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </option>
                      <?php } ?>

                      </select>
                    </div>

                </div>

                <div class="col-md-4">

                  <div class="box-header">
                    <label for="dtinicinscricao"> Data de Início das Inscrições</label>
                    <input type="datetime-local" class="form-control" id="dtinicinscricao" name="dtinicinscricao" value="<?php echo htmlspecialchars( $createTemporadaValues["dtinicinscricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                  </div>

                  <div class="box-header">
                    <label for="dtinicmatricula"> Data de Início das Matrículas</label>
                    <input type="datetime-local" class="form-control" id="dtinicmatricula" name="dtinicmatricula" value="<?php echo htmlspecialchars( $createTemporadaValues["dtinicmatricula"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                  </div>
                  
                </div>

                <div class="col-md-4">

                  <div class="box-header">
                    <label for="dtterminscricao"> Data do Fim das Inscrições</label>
                    <input type="datetime-local" class="form-control" id="dtterminscricao" name="dtterminscricao" value="<?php echo htmlspecialchars( $createTemporadaValues["dtterminscricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                  </div>

                  <div class="box-header">
                    <label for="dttermmatricula"> Data do Fim das Matrículas</label>
                    <input type="datetime-local" class="form-control" id="dttermmatricula" name="dttermmatricula" value="<?php echo htmlspecialchars( $createTemporadaValues["dttermmatricula"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                  </div>            
                  
                </div>

              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-success">Cadastrar</button>
                &nbsp&nbsp&nbsp&nbsp
                <a type="button" class="btn btn-danger" href="javascript:window.history.go(-1)">Cancelar</a>
              </div>

              <!-- /.box-body -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
<!-- /.content -->
</div>
    <!-- /.content-wrapper -->
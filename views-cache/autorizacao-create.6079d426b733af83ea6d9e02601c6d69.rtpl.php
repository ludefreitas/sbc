<?php if(!class_exists('Rain\Tpl')){exit;}?>    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h3>
          Cria Lista de Autorização
        </h3>
        <ol class="breadcrumb">
          <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
          
        </ol>
      </section>
      <section>

      <!-- Main content -->

      <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            
            <!-- /.box-header -->
            <!-- form start -->

            <div class="box-body">
              <form role="form" action="/admin/listapessoasporturmapersonalizada/<?php echo htmlspecialchars( $idturma, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
                <div class="row">
                  <div class="col-md-12">

                    <div class="box-header">
                      <label for="textoAutorizacao"> Descreva a autorização</label>
                      <input type="text" class="form-control" id="textoAutorizacao" name="textoAutorizacao" placeholder="Autorização para ...." value="<?php echo htmlspecialchars( $createlistaAutorizacaoValues["textoAutorizacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>

                    <div class="box-header">
                      <label for="destino"> Informe o local do evento</label>
                      <input type="text" class="form-control" id="destino" name="destino" placeholder="Informe o loca do evento" value="<?php echo htmlspecialchars( $createlistaAutorizacaoValues["destino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>

                </div>
                </div>
                <div class="row">

                <div class="col-md-4">

                  <div class="box-header">
                    <label for="dataInicio"> Data de início do evento</label>
                    <input type="date" class="form-control" id="dataInicio" name="dataInicio" value="<?php echo htmlspecialchars( $createlistaAutorizacaoValues["dataInicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                  </div>

                  <div class="box-header">
                    <label for="dataTermino"> Data de término do evento</label>
                    <input type="date" class="form-control" id="dataTermino" name="dataTermino" value="<?php echo htmlspecialchars( $createlistaAutorizacaoValues["dataTermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                  </div>
                  
                </div>

              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-success">Criar</button>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <a type="button" class="btn btn-danger" href="javascript:window.history.go(-1)">Cancelar</a>
              </div>

              <!-- /.box-body -->
            </form>
          </div>
        </div>
      </div>
    </div>

</section>
<!-- /.content -->
</div>
    <!-- /.content-wrapper -->
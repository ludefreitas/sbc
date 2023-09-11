<?php if(!class_exists('Rain\Tpl')){exit;}?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script type="text/javascript">

   function excluirElemento(id){

    document.getElementById('teste' + id).remove();

    let url = '/admin/mensagem/agenda/excluir/' + id;

        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url');        
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

              alert(result);
          
        });
      
   }        
  
</script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h4>
   Criar horário de natação espontânea para o 
   <?php if( $idlocal == 3 ){ ?> BAETÃO <?php } ?>
   <?php if( $idlocal == 21 ){ ?> PAULICÉIA <?php } ?>
  </h4>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
  </ol>
</section>

<!-- Main content -->

  <div class="row">
    <div class="col-md-12">
      <div class="box box-success">
        <?php if( $error != '' ){ ?>
          <div class="alert alert-danger" style="margin: 10px 10px 0px 10px">
        <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
          </div>
        <?php } ?>
        <!-- /.box-header -->
        <!-- form start --><form role="form" action="/admin/horario-dia-semana/create" method="post">
          <div class="box-body">
            <div class="box-header">
              <div class="row">
                <div class="col-md-6">

                  <label for="idlocal">Confirme o local da natação</label>
                  <select class="form-control" name="idlocal">  
                  <?php if( $idlocal == 3 ){ ?>                   
                  <option selected value="3">Baetão</option>
                  <?php }else{ ?>
                  <option selected value="3">Baetão</option>
                  <?php } ?>
                  <?php if( $idlocal == 21 ){ ?>                   
                  <option selected value="21">Paulicéia</option>                  
                  <?php }else{ ?>
                  <option value="21">Paulicéia</option>                  
                  <?php } ?>
                  </select>

                  <label for="diasemana">selecione o dia da semana</label>
                  <select class="form-control" name="diasemana">  
                  <option selected="selected" value="">Selecione</option>                    
                  <option value="0">Domingo</option>
                  <option value="1">Segunda-feira</option>
                  <option value="2">Terça-feira</option>
                  <option value="3">Quarta-feira</option>
                  <option value="4">Quinta-feira</option>
                  <option value="5">Sexta-feira</option>
                  <option value="6">Sábado</option>
                  </select>

                  
                </div>
                <div class="col-md-6">

                  <label for="horainicial">Hora inicial</label>
                  <input type="time" class="form-control" id="horainicial" name="horainicial" value="<?php echo htmlspecialchars( $createHorarioSemanaValues["horainicial"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                  <label for="horafinal">Hora final</label>
                  <input type="time" class="form-control" id="horafinal" name="horafinal" value="<?php echo htmlspecialchars( $createHorarioSemanaValues["horafinal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                </div>
                <div class="col-md-6">

                  <label for="vagas">Vagas</label>
                  <input type="number" class="form-control" id="vagas" name="vagas" value="<?php echo htmlspecialchars( $createHorarioSemanaValues["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Cadastrar</button>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a type="button" class="btn btn-danger" href="javascript:window.history.go(-1)">Cancelar</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a type="button" class="btn btn-primary" href="/admin/agenda/hora-dia-semana/<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>">Editar horário <?php if( $idlocal == 3 ){ ?> Baetão <?php } ?> <?php if( $idlocal == 21 ){ ?> Paulicèia <?php } ?></a>
          </div>
        </form>

      </div>

    </div>

  </div>    

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
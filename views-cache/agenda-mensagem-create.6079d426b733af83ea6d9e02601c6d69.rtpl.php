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
   Criar período de pausa na natação espontânea 
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
        <!-- form start --><form role="form" action="/admin/mensagem/agenda/create" method="post">
          <div class="box-body">
            
            <div class="box-header">
              <label for="descmsg">
                Descreva a mensagem para o período sem natação no
                <?php if( $idlocal == 3 ){ ?> BAETÃO <?php } ?>
                <?php if( $idlocal == 21 ){ ?> PAULICÉIA <?php } ?>
              </label>
              <input type="text" class="form-control" id="descmsg" name="descmsg" placeholder="Mensagem" value="<?php echo htmlspecialchars( $createMsgAgendaValues["descmsg"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="box-header">
              <div class="row">
                <div class="col-md-6">
                  <label for="datainicial">Data de ínicio</label>
                  <input type="date" class="form-control" id="datainicial" name="datainicial" value="<?php echo htmlspecialchars( $createMsgAgendaValues["datainicial"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
                <div class="col-md-6">
                  <label for="datafinal">Data de término</label>
                  <input type="date" class="form-control" id="datafinal" name="datafinal" value="<?php echo htmlspecialchars( $createMsgAgendaValues["datafinal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
              </div>
              <input hidden type="text" name="idlocal" value="<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Cadastrar</button>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a type="button" class="btn btn-danger" href="javascript:window.history.go(-1)">Cancelar</a>
          </div>
        </form>

      </div>

    </div>

  </div>



  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary" style="margin: 10px;">        
          
      </div>
      <div class="table-responsive">
        <table class="table-sm table-striped" style="margin: 10px;">
            <thead>
                <tr style="border: solid 1px; padding: 1px">
                  <th scope="col"></th>
                  <th style="border: solid 1px; padding: 1px">Data início</th>
                  <th scope="col"></th>
                  <th style="border: solid 1px; padding: 1px">Data Final</th>
                  <th scope="col"></th>
                  <th style="border: solid 1px; padding: 1px">Local</th>
                  <th scope="col"></th>
                  <th style="border: solid 1px; padding: 1px">Responsável</th>
                  <th scope="col"></th>
                  <th style="border: solid 1px; padding: 1px">Mensagem</th>
                  <th scope="col"></th>
                  <th style="border: solid 1px; padding: 1px">Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php $counter1=-1;  if( isset($todasMsgs) && ( is_array($todasMsgs) || $todasMsgs instanceof Traversable ) && sizeof($todasMsgs) ) foreach( $todasMsgs as $key1 => $value1 ){ $counter1++; ?>
                <tr id="teste<?php echo htmlspecialchars( $value1["idagendamsg"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="border: solid 2px black; padding: 5px" >
                    <th scope="row"></th>
                    <td style="padding: 5px"><?php echo formatDate($value1["dtinitmsg"]); ?> </td>
                    <th scope="row"></th>
                    <td style="padding: 5px"><?php echo formatDate($value1["dtfimmsg"]); ?> </td>
                    <th scope="row"></th>
                    <td style="padding: 5px"><?php echo getApelidoLocalById($value1["idlocal"]); ?> </td>
                    <th scope="row"></th>
                    <td style="padding: 5px"><?php echo getUserNameById($value1["iduser"]); ?> </td>
                     <th scope="row"></th>
                    <td style="padding: 5px"><?php echo htmlspecialchars( $value1["msgtexto"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </td>
                    <th scope="row"></th>

                    <td style="padding: 5px; text-align: center;">

                      <a onclick="excluirElemento(<?php echo htmlspecialchars( $value1["idagendamsg"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">
                          <i class="fa fa-trash" style="color: red; padding: 5px"></i> 
                      </a>     

                    </td>
                      
                   
                </tr>
                 <?php }else{ ?>
                 <th colspan="12" scope="row"></th>
                <tr style="font-weight: bold; color: red; font-size: 16px; text-align: center; padding: 5px;">
                  <td colspan="12">
                    Não há períodos sem natação espontânea cadastrada!
                  </td>
                </tr>
          <?php } ?>
                
              </tbody>
        </table>
    </div>
    </div>
</div>

  

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
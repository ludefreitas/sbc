<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tokens da turma: <?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> -  <?php echo htmlspecialchars( $turma["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $turma["periodo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $turma["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $turma["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ás <?php echo htmlspecialchars( $turma["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?> 
  </h1>
  <ol class="breadcrumb">
    <li><a href="/prof"><i class="fa fa-dashboard"></i> Home</a></li>
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


         <form method="post" action="/prof/turma/create/token">

            <div class="box-header">
             <!-- <a href="/prof/turma/create/token/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-success">Gerar token</a> -->

             

            <input hidden type="text" name="idturma" value="<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"/>
            <input hidden type="text" name="iduser" value="<?php echo htmlspecialchars( $turma["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"/>
            <input hidden type="text" name="idtemporada" value="<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>"/>
            <!--<input type="text" name="numcpf" placeholder="Digite o CPF, se necessário">-->
            <input style="width: 170px; float: left;" type="text" maxlength="14" id="numcpf" name="numcpf" class="input-text" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}"  placeholder="000.000.000-00"/>
                    <script type="text/javascript">$("#numcpf").mask("000.000.000-00");</script>
            </div>
            <div class="box-header">
            <input class="btn btn-success" type="submit" name="" value="Gerar Token">

            </div>



        </form>

             <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
            <div class="row" style="margin: 5px;">
              <?php $counter1=-1;  if( isset($tokens) && ( is_array($tokens) || $tokens instanceof Traversable ) && sizeof($tokens) ) foreach( $tokens as $key1 => $value1 ){ $counter1++; ?>
                <div class="col-md-2" style="border: solid 1px; text-align: center;">

                    <?php if( $value1["isused"] == 0 ){ ?>
                    <span style="font-weight: bold; color: darkblue;">                  
                        <?php echo htmlspecialchars( $value1["token"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span> <br>
                        <?php if( $value1["numcpf"] ){ ?>
                            <?php echo htmlspecialchars( $value1["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                        <?php }else{ ?>
                            NULL
                        <?php } ?>
               
                    <?php }else{ ?>
                    <span style="font-weight: bold; color: red;">                  
                        <s><?php echo htmlspecialchars( $value1["token"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </s><i class="fa fa-check" style="color: green;"></i>
                    </span><br>

                        <?php if( $value1["numcpf"] ){ ?>
                            <?php echo htmlspecialchars( $value1["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                        <?php }else{ ?>
                            NULL
                        <?php } ?>               
                    <?php } ?>
            </div>               
          <?php } ?>           
            <!-- /.box-body -->
        </div>
    </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
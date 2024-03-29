<?php if(!class_exists('Rain\Tpl')){exit;}?>

 <div class="container"> <!-- container 1 -->
            <div class="row"> <!-- row 2 -->
              <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 15px 0px 50px 0px;">

<?php if( $error != '' ){ ?>
  <div class="alert alert-danger" role="alert">
      <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
  </div>
<?php }else{ ?>


<div class="container">
  <div class="row">
      <div class="col-md-12">
          <div class="turma-bit-title text-center">
              <h2><?php echo htmlspecialchars( $turma["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
          </div>
      </div>
  </div>
</div>

<div class="container"> <!-- container 3 -->
    <div class="row" style="padding: 5px"> <!-- row 4 -->
      <!--
      <div class="col-md-4">
          <img class="img-responsive" style="width: 282px; height: 179px" id="image-preview" src="<?php echo htmlspecialchars( $turma["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Photo">

        </div>
      -->
        <div class="col-md-12">
          
          <div class="row">
            <div class="col-md-12">
               <h5 style="color: #000000"> <span style="font-weight: bold;">
            </span><?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $turma["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> do Programa <?php echo htmlspecialchars( $turma["prograativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, para <?php echo htmlspecialchars( $turma["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?> de <?php echo htmlspecialchars( $turma["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> a <?php echo htmlspecialchars( $turma["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> anos,  <?php echo htmlspecialchars( $turma["geneativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> no período da <?php echo htmlspecialchars( $turma["periodo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> das <?php echo htmlspecialchars( $turma["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $turma["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, na <?php echo htmlspecialchars( $turma["descespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?> do Crec <?php echo htmlspecialchars( $turma["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, com o(a) professor(a) <?php echo htmlspecialchars( $turma["apelidoperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - Temporada <?php echo htmlspecialchars( $turma["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br>
            Inicio das aulas: </</h5>
            </div>
          </div>
          <?php if( $turma["idstatustemporada"] == 6 ){ ?>

          <div class="row">
            <div class="col-md-12">
             <h5 style="color: green; font-weight: bold;"> Aguarde terminar período de matrículas para fazer novas inscrições.</h3>
            </div>
          </div> 

          <?php }else{ ?>
          <div class="row">
            <div class="col-md-12">
              <form action="/cart/<?php echo htmlspecialchars( $turma["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $turma["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add"> 
              <button class="btn btn-success" style="text-align-last: center; background-color: #15a03f" type="submit">Fazer inscrição para esta turma</button>
           </form>                          
            </div>
          </div> 
          <?php } ?>         
        </div>
    </div><!-- row 4 --> 
</div> <!-- container 3 -->           
<?php } ?>
</div> <!-- final da index -->


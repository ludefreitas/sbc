<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
  <div class="row">
    <div class="col-md-12" style="font-size: 20px; text-align-last: center ">
       <span style="font-size: 20px;">Crec: </span><span style="font-weight: bold"><?php echo htmlspecialchars( $local["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span><hr>
    </div>     
  </div>
</div>      
      <?php $counter1=-1;  if( isset($turma) && ( is_array($turma) || $turma instanceof Traversable ) && sizeof($turma) ) foreach( $turma as $key1 => $value1 ){ $counter1++; ?>
<a href="/turma/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="text-decoration: none">
  <div class="container">  <!-- container 3 -->
    <div class="row"> <!-- row 4 -->   
      <div class="col-md-12 alert">
          <div class="row">
              <div class="col-md-4" col-sm-1 style="text-align-last: left;  margin: 5px 0px 5px 0px; padding-right: 0px">  
                <img class="img-responsive" style="width: 100%; height: 100%" id="image-preview" src="<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Photo">
              </div> 
              <div class="col-md-8" style="text-align-last: left; line-height: 20px;  font-size: 14px; font-style: normal; margin: 5px 0px 5px 0px">
              <div class="row">
                <div class="col-md-12">
                  <h5 style="color: #000000"> <span style="font-weight: bold; ">
                   <?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;</span><br>
                    Local da aula: <?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;<br>
                   <?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> das <?php echo htmlspecialchars( $value1["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $value1["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
                    Professor(a): <?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br>
                    Turma <?php echo htmlspecialchars( $value1["desstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>   </h5> 
                </div>
              </div> 
              </div>                         
          </div> 
          <div class="product-option-shop"  style="text-align-last: center;">
              <a class="btn btn-info btn-lg card card-just-text"  style="background-color: #cc5d1e; text-align: right;" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/turma/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Inscrever-se</a>
          </div>      
      </div>                                          
    </div> <!-- row 4 -->
  </div> <!-- container 3 -->
</a>
 <?php }else{ ?>
<div class="container" >
  <div class="row">
    <div class="col-md-12 alert-danger" style="font-size: 20px; text-align-last: center ">
       <span style="font-size: 20px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nenhuma turma encontrada para este Centro Esportivo..</span>
    </div>     
  </div>
  <div class="row" style="padding: 10px">
    <div class="col-md-12" style="font-size: 20px; text-align-last: center ">
       <a class="btn btn-success" href="/" >Encontre uma atividade aqui!</a>
    </div>     
  </div>
</div>
  
  <?php } ?>     


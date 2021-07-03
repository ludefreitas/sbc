<?php if(!class_exists('Rain\Tpl')){exit;}?>            <div class="container">
                <div class="row alert-primary">
                    <div class="col-md-12" style="padding-top: 10px; padding-bottom: 10px">
                        <strong> Minhas inscrições</strong>
                    </div>
                </div>
                 <?php $counter1=-1;  if( isset($insc) && ( is_array($insc) || $insc instanceof Traversable ) && sizeof($insc) ) foreach( $insc as $key1 => $value1 ){ $counter1++; ?>
                <div class="row alert-info">
                    <div class="col-md-12">
                        <hr>
                        <strong>NÚMERO PARA O SORTEIO: </strong><span style="color: red; font-size: 20px"><?php echo htmlspecialchars( $value1["numsorte"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span><br>
                        <strong>NOME DO ALUNO: </strong> <span><?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span><br>
                        <strong>TURMA: </strong><?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
                        <strong>Temporada: </strong><?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
                        
                        <strong>STATUS :</strong><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-primary" href="/profile/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button">Detalhes</a>
                        <hr>
                    </div>
                </div>
                <?php }else{ ?>
                <div class="row alert-danger">
                    <div class="col-md-12" style="padding-top: 10px; padding-bottom: 0px">
                       <hr> Nenhuma inscrição foi encontrada.<hr>
                    </div>
                </div>
            
           
            <?php } ?>
            </div>  
            


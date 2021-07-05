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
                        <strong>NÚMERO INSCRIÇÃO: </strong><span><?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span><br>
                        <strong>NOME DO ALUNO: </strong> <span><?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span><br>
                        <strong>TURMA: </strong><?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
                        <strong>Temporada: </strong><?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>

                        <div class="row">
                            <div class="col-md-6" <?php echo colorStatus($value1["idinscstatus"]); ?>>
                                <strong>STATUS: </strong><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                            </div>

                            
                            <div class="col-md-6">
                                <a class="btn btn-primary" href="/profile/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button">Detalhes</a>

                            <?php if( ($value1["idinscstatus"]) === '2' ){ ?>

                            
                            <a href="/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusCancelada" onclick="return confirm('Deseja realmente excluir PERMANENTEMENTE a inscrição <?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?> do(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da turma <?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>? Lembramos que se você clicar em OK a inscrição e a matricula se existir, serão definitivamente canceladas.')" class="btn btn-success btn-xs"><i></i> Matricular</a>
                            <?php } ?>

                            <?php if( ($value1["idinscstatus"]) !== '7' ){ ?>

                            <a href="/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/statusCancelada" onclick="return confirm('Deseja realmente excluir PERMANENTEMENTE a inscrição <?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?> do(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> da turma <?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>? Lembramos que se você clicar em OK a inscrição e a matricula se existir, serão definitivamente canceladas.')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                            <?php } ?>                      
                            
                            </div>
                        </div>        

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
            


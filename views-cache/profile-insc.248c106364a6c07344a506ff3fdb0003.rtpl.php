<?php if(!class_exists('Rain\Tpl')){exit;}?>
          
                <table class="table" style="width: 100%; margin: 15px;">
                    <thead>
                        <tr>
                            <!--<th>#</th>-->
                            <th>NÚMERO <br>DA SORTE</th>
                           <!-- <th>IDTURMA</th> -->
                            <th>Turma</th>
                            <th>Nome do Aluno</th>
                            <!-- <th>Idade</th> -->
                            <th>Status</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter1=-1;  if( isset($insc) && ( is_array($insc) || $insc instanceof Traversable ) && sizeof($insc) ) foreach( $insc as $key1 => $value1 ){ $counter1++; ?>
                        <tr>
                            <!--<th scope="row"><?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?></th>-->
                            <th scope="row"><?php echo htmlspecialchars( $value1["numsorte"], ENT_COMPAT, 'UTF-8', FALSE ); ?></th>                            
                            <!--<th scope="row"><?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?></th>-->
                            <th scope="row"><?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?></th>
                            <td><?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                           <!-- td><?php echo calcularIdade($value1["dtnasc"]); ?></td> -->                  
                            <td><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>                            
                            <td>
                                <a class="btn btn-primary" href="/profile/insc/<?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button">Detalhes</a>
                            </td>
                            
                        </tr>
                        
                    </tbody>
                    <?php }else{ ?>
                        <div class="alert alert-info">
                            Nenhuma inscrição foi encontrada.
                        </div>
                        <?php } ?>
                </table>


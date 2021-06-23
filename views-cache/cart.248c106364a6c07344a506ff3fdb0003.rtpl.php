<?php if(!class_exists('Rain\Tpl')){exit;}?>
<form action="/checkout">

    <?php if( $error != '' ){ ?>
    <div class="alert alert-danger" role="alert">
    <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
    </div>
    <?php } ?>

    <div class="container">
        <?php $counter1=-1;  if( isset($turma) && ( is_array($turma) || $turma instanceof Traversable ) && sizeof($turma) ) foreach( $turma as $key1 => $value1 ){ $counter1++; ?>
        <!--<div class="row alert alert-primary">
            <div class="col-md-12">
                Turma selecionada! Selecione agora, logo abaixo, a pessoa que irá participar desta turma.
            </div>
        </div>
      -->
         
        <div class="row alert alert-primary"> 
            <div class="col-md-3">
                <a href="/turma/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></a>
              </div>                      

            <div class="col-md-9">
               TURMA: <a href="/turma/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descativ"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["periodo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> / </a> 
               <span class="amount"> 
                  LOCAL: <?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, Nº <?php echo htmlspecialchars( $value1["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?> / 
               </span> 
               <span class="amount">
                  HORÁRIO: <?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $value1["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?> / 
               </span> 
               <span class="amount">
                  FAIXA ETÁRIA: <?php echo htmlspecialchars( $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> a <?php echo htmlspecialchars( $value1["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["descrfxetaria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </span> 
               <span class="amount">
                  PROFESSOR: <?php echo htmlspecialchars( $value1["apelidoperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - 
               </span> 
                <span class="amount">
                   <br> <br><a title="Remove this item" class="remove" href="/cart/<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/remove"> REMOVER <p style="color: green">(Remover esta, selecionar outra turma)</p></a>
               </span>  

               <input type="text" name="idturma" hidden="" value="<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
               <input type="text" name="idtemporada" hidden="" value="<?php echo htmlspecialchars( $value1["idtemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">  
               <input type="text" name="initidade" hidden="" value="<?php echo htmlspecialchars( $value1["initidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
               <input type="text" name="fimidade" hidden="" value="<?php echo htmlspecialchars( $value1["fimidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">            
            </div>
             
        </div>
         <div class="row alert alert-primary">
            <div class="col-md-12">
                <div class="">
                    <div class="">

                        <h3>Selecione a Pessoa</h3>
                    
                        <div class="">

                            <?php if( $msgError != '' ){ ?>
                            <div class="alert alert-danger alert-dismissible" style="margin:10px">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p><?php echo htmlspecialchars( $msgError, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                            </div>
                            <?php } ?>
                            <?php if( $msgSuccess != '' ){ ?>
                            <div class="alert alert-success alert-dismissible" style="margin:10px">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p><?php echo htmlspecialchars( $msgSuccess, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                            </div>
                            <?php } ?>
                            <!-- form start -->                           
                            <div class="box-body">                                                               
                                <select class="form-control" name="idpess">
                                    <option selected="selected" value="idpess=0">
                                        Selecione uma pessoa
                                    </option>
                                    <?php $counter2=-1;  if( isset($pessoa) && ( is_array($pessoa) || $pessoa instanceof Traversable ) && sizeof($pessoa) ) foreach( $pessoa as $key2 => $value2 ){ $counter2++; ?>
                                    <option <?php if( $value2["iduser"] === $user["iduser"] ){ ?><?php } ?> value="<?php echo htmlspecialchars( $value2["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value2["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value2["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>; <?php echo calcularIdade($value2["dtnasc"]); ?> anos; <?php echo htmlspecialchars( $value2["sexo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                    </option>

                                    <?php }else{ ?>
                                    <option value="0">
                                        Não há pessoas cadastradas
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                            <!-- /.box-body -->
                        <div class="box-footer">                                           
                               
                        </div>
                           
                       <!-- </form> -->


                        <div>&nbsp;</div>
                        <a href="/pessoa-create">Cadastrar uma nova pessoa</a>
                        <div>&nbsp;</div>
                        <input type="submit" value="Confirmar Inscrição" id="pessoa" class="button alt" formaction="/cart" formmethod="post">
                    </div>
                </div> 
            </div>
        </div>
        <?php }else{ ?>
        <div class="row">
            <div class="col-md-12 alert alert-info" style="text-align-last: center; font-weight: bold">
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Selecione abaixo uma turma</span>                            
            </div>
            
        </div>

  <div class="row" style="">
    <div class="col-md-4 alert" style="text-align-last: center; background-color: #ce2c3e; border: solid 5px; border-color: white;  border-radius: 25px;  padding-left: 0px ">
       <a class="btn" href="/locais" style="color: white; font-weight: bold;">Turmas por LOCAL (Crec)
       </a>
    </div>
    <div class="col-md-4 alert" style="text-align-last: center; background-color: #cc5d1e; border: solid 5px; border-color: white; border-radius: 25px;  padding-left: 0px">
       <a class="btn" href="/modalidades" style="color: white; font-weight: bold" >Turmas por MODALIDADE
       </a>
    </div>
    <div class="col-md-4 alert" style="text-align-last: center; background-color: #15a03f; border: solid 5px; border-color: white; border-radius: 25px;  padding-left: 0px;">
       <a class="btn" href="/" style="color: white; font-weight: bold; ">Todas turmas
       </a>
    </div>  
  </div>
  <?php } ?>
</div>                             
                         
</form>
 
            
                        
                




                                                                
                           
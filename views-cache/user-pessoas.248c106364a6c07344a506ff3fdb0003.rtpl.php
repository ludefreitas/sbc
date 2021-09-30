<?php if(!class_exists('Rain\Tpl')){exit;}?> <div class="container"> <!-- container 1 -->
            <div class="row"> <!-- row 2 -->
            <div class="col-md-3" style="margin: 15px 0px 0px 0px">
                <?php require $this->checkTemplate("user-profile-menu");?>
            </div>
              <div class="col-md-9" style="text-align-last: left; background-color: white; margin: 15px 0px 50px 0px;">


    <?php if( $errorRegister != '' ){ ?>
    <div class="alert alert-danger">
    <?php echo htmlspecialchars( $errorRegister, ENT_COMPAT, 'UTF-8', FALSE ); ?>
    </div>
    <?php } ?>
    

    

     <div class="container">
                    
        <?php $counter1=-1;  if( isset($pessoas) && ( is_array($pessoas) || $pessoas instanceof Traversable ) && sizeof($pessoas) ) foreach( $pessoas as $key1 => $value1 ){ $counter1++; ?>      
        <div class="row alert alert-primary">
            <div class="col-md-12" >
                <span style="text-align: center;">
                <strong><?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </strong>&nbsp; <strong> <?php if( $value1["pcd"] == 1 ){ ?>(PCD)<?php } ?></strong>
                <div class="row alert alert-primary"> 
                &nbsp;<strong><?php echo calcularIdade($value1["dtnasc"]); ?>&nbsp; </strong>anos 
                &nbsp;<strong>Data Nasc:</strong><?php echo formatDate($value1["dtnasc"]); ?>
                &nbsp;<strong>Sexo: </strong><?php echo htmlspecialchars( $value1["sexo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                &nbsp;<strong>CPF: </strong><?php echo htmlspecialchars( $value1["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>                
                &nbsp;<strong>SUS: </strong><?php echo htmlspecialchars( $value1["numsus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>   
                &nbsp;<strong>Vuln. Social: </strong> <?php if( $value1["vulnsocial"] == 1 ){ ?>Sim<?php }else{ ?>Não<?php } ?>
                <?php if( $value1["vulnsocial"] == 1 ){ ?>                
                &nbsp;<strong>CadUnico: </strong><?php echo htmlspecialchars( $value1["cadunico"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                <?php } ?>

                <?php if( $value1["nomemae"] != '' ){ ?>
                &nbsp;<strong>Nome da Mãe: </strong><?php echo htmlspecialchars( $value1["nomemae"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                &nbsp;<strong>CPF da mãe: </strong><?php echo htmlspecialchars( $value1["cpfmae"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                <?php } ?>                

                <?php if( $value1["nomepai"] != '' ){ ?>
                &nbsp;<strong>Nome do pai: </strong><?php echo htmlspecialchars( $value1["nomepai"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                &nbsp;<strong>CPF do pai: </strong><?php echo htmlspecialchars( $value1["cpfpai"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                <?php } ?>
                
                &nbsp;<strong>Incluido: </strong><?php echo formatDateHour($value1["dtinclusao"]); ?>
                &nbsp;<strong>Alterado: </strong><?php echo formatDateHour($value1["dtalteracao"]); ?>
                </span>
                </div>
                <div class="row alert alert-primary">
                    <div class="col-md-6 btn-primary" style="padding: 5px; text-align-last: center;">
                        <form action="post" name="idpess">
                            <a class="btn btn-primary" href="/user/pessoa/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button">EDITAR</a>
                        </form>
                    </div>
                    <div class="col-md-6 btn-danger" style="padding: 5px; text-align-last: center;">
                        <form action="post" name="idpess">
                            <a class="btn btn-danger"  href="/user/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/status" role="button" onclick="return confirm('DESEJA realmente EXCLUIR o cadastro do(a) <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?')">EXCLUIR</a>
                        </form>
                    </div>
                </div> 

            </div>
        </div>

        <?php }else{ ?>
        <div class="row alert alert-danger">
            <div class="col-md-6">
                Nenhuma pessoa encontrada.
            </div>
        </div>      
        <?php } ?> 

    </div>

    <div class="alert alert-info" style="text-align-last: center;">
        <a class="btn btn-primary card-just-text" href="/pessoa-create" role="button" >CADASTRAR NOVA PESSOA OU DEPENDENTE</a>
    </div>

    </div> <!-- final da index -->

    
                    

               

                

            
    

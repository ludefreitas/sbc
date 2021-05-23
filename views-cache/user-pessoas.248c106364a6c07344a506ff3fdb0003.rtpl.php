<?php if(!class_exists('Rain\Tpl')){exit;}?>

    <?php if( $errorRegister != '' ){ ?>
    <div class="alert alert-danger">
    <?php echo htmlspecialchars( $errorRegister, ENT_COMPAT, 'UTF-8', FALSE ); ?>
    </div>
    <?php } ?>

    <div class="alert alert-info" style="text-align-last: center;">
        <a class="btn btn-primary card-just-text" href="/pessoa-create" role="button" >Cadastrar uma pessoa ou dependente</a>
    </div>

     <div class="container">
                    
        <?php $counter1=-1;  if( isset($pessoas) && ( is_array($pessoas) || $pessoas instanceof Traversable ) && sizeof($pessoas) ) foreach( $pessoas as $key1 => $value1 ){ $counter1++; ?>      
        <div class="row alert alert-primary">
            <div class="col-md-12">
                <span style="text-align: center;">
                    <?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> 
                <hr> 
                <strong>Idade: </strong> <?php echo calcularIdade($value1["dtnasc"]); ?>
                - <strong>Data Nasc: </strong><?php echo formatDate($value1["dtnasc"]); ?>
                - <strong>Sexo: </strong><?php echo htmlspecialchars( $value1["sexo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                <br><strong>CPF: </strong><?php echo htmlspecialchars( $value1["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                - <strong>RG: </strong><?php echo htmlspecialchars( $value1["numrg"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                - <strong>SUS: </strong><?php echo htmlspecialchars( $value1["numsus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>   
                <br><strong>Vuln. Social: </strong> <?php echo htmlspecialchars( $value1["vulnsocial"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                - <strong>CadUnico: </strong><?php echo htmlspecialchars( $value1["cadunico"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                <br><strong>Nome da Mãe: </strong><?php echo htmlspecialchars( $value1["nomemae"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                - <strong>CPF da mãe: </strong><?php echo htmlspecialchars( $value1["cpfmae"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                <br><strong>Nome do pai: </strong><?php echo htmlspecialchars( $value1["nomepai"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                - <strong>CPF do pai: </strong><?php echo htmlspecialchars( $value1["cpfpai"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </span>
                <hr>
                <div class="row">
                    <div class="col-md-6 alert-success" style="padding: 5px; text-align-last: center;">
                        <form action="post" name="idpess">
                            <a class="btn btn-success" href="#" role="button">Editar</a>
                        </form>
                    </div>
                    <div class="col-md-6 alert-success" style="padding: 5px; text-align-last: center;">
                        <form action="post" name="idpess">
                            <a class="btn btn-danger"  href="/user/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/status" role="button">Excluir</a>
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

    
                    

               

                

            
    

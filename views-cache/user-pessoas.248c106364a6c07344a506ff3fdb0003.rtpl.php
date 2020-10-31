<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Meus Dependentes</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-product-area">
    <?php $counter1=-1;  if( isset($pessoas) && ( is_array($pessoas) || $pessoas instanceof Traversable ) && sizeof($pessoas) ) foreach( $pessoas as $key1 => $value1 ){ $counter1++; ?>         

    <div class="container">

        <div class="row">

            
            <div class="">
                
                <div class="cart-collaterals">
                    <h2><?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
                </div>

                <table class="table">
                    <thead>
                        <tr>                            
                            <th>Idade</th>
                            <th>Data Nasc</th>
                            <th>Sexo</th>
                            <th>CPF</th>
                            <th>RG</th>
                            <th>SUS</th>
                            <th>Vuln. Social</th>
                             <th>CadUnico</th>  
                            <th>Nome da Mãe</th>
                            <th>CPF da mãe</th>
                            <th>Nome da pai</th>
                            <th>CPF da pai</th>  
                            <td style="width:222px;">
                                <a class="btn btn-primary" href="#" role="button">Editar</a>
                            </td>                                                      
                        </tr>
                    </thead>
                    
                    <tbody>                       
                        <tr>
                            <td><?php echo htmlspecialchars( $value1["dtnasc"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["dtnasc"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["sexo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["numcpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["numrg"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["numsus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["vulnsocial"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["cadunico"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["nomemae"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["cpfmae"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["nomepai"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["cpfpai"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                             <td style="width:222px;">
                                <form action="post" name="idpess">
                                <a class="btn btn-danger"  href="/user/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/status" role="button">Excluir</a>
                                </form>
                            </td>                            
                        </tr>                             
                        <tr>
                           
                        
                        </tr>                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php }else{ ?>
<div class="alert alert-info">
 Nenhuma pessoa encontrada.

</div>
<div class="alert alert">
 <a class="btn btn-success" href="/pessoa-create" role="button">Cadastrar pessoa</a>
 
</div>
<?php } ?>
</div>

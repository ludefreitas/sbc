<?php if(!class_exists('Rain\Tpl')){exit;}?>
<script>
    /*
    function quantosAnos(nascimento, hoje) {

        var diferencaAnos = hoje.getFullYear() - nascimento.getFullYear();
        if ( new Date(hoje.getFullYear(), hoje.getMonth(), hoje.getDate()) < 
         new Date(hoje.getFullYear(), nascimento.getMonth(), nascimento.getDate()) )
        diferencaAnos--;
        return diferencaAnos;
    }  

    function menorDeIdade(){     

        let hoje = new Date()

        let dataagenda = new Date(document.getElementById('dataagenda').value)

        let idadeAnos = quantosAnos(dataagenda, hoje)

        if(idadeAnos < 0){
            alert('Data inválida!')
            document.getElementById('dataagenda').value = 0
        }
    } 
    */    
    
</script>

     <div class="container"> <!-- container 1 -->
                <div class="row"> <!-- row 2 -->
                  <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 5px 0px 50px 0px;">

    <div class="container">
        <div class="row" style="padding-bottom: 5px">
            <div class="col-md-12">
                    
                <?php if( $error != '' ){ ?>
                <div class="alert alert-danger">
                <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
                <?php } ?>
            </div>

            <div class="col-md-12">
                Selecione uma pessoa e uma data disponível para agendar a natação espontânea
            </div>


        
            <div class="col-md-12">   
                
                <form action="/agendarhorario" method="post"> 

                        <input type="text" name="idlocal" value="<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="display: none;"> 
                         <input type="text" name="ispresente" value="0" style="display: none;"> 

                        <label style="color: blue;">
                        <br>Selecione uma pessoa<br>


                        </label>
                        
                        <?php $counter1=-1;  if( isset($pessoa) && ( is_array($pessoa) || $pessoa instanceof Traversable ) && sizeof($pessoa) ) foreach( $pessoa as $key1 => $value1 ){ $counter1++; ?>
                        <p>
                        <input type="radio" name="idpess" value="<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> 
                        <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>; <?php echo calcularIdade($value1["dtnasc"]); ?> anos;                  
                        </p>                                
                        <?php }else{ ?>
                        <p>
                             Não há pessoas inseridas
                        </p>                                   
                           
                        <?php } ?>
                        
                        <p>
                           <a href="/pessoa-create">  INSERIR UMA NOVA PESSOA </a>
                        </p>
         
                    
                    <label for="dataagenda" style="color: blue;">
                        

                    </label>
                    <input style="width: 100%; float: right;" type="date" id="dataagenda" name="dataagenda" class="input-text" value="" required="required">                
                
            </div>
        </div>
    </div>
    <div class="container">
            <div class="row" style="padding-bottom: 10px;">
                <div class="col-md-12" style="margin-top: 10px; text-align-last: center">
                    <input style="width: 100%; float: right; background-color: #15a03f;" type="submit" class="btn">
                </div> 
                <div class="col-md-12" style="margin-top: 10px; text-align-last: center">

                        <a class="btn" style="width: 100%; float: right; background-color: #ce2c3e;  text-decoration: none; color: white;" href="javascript:window.history.go(-1)" text-decoration="none">CANCELAR
                        </a>
                       
                </div>                  
            </div>
    </div>
    </form>

        </div>    
    </div>     

   

    </div> <!-- final da index -->               



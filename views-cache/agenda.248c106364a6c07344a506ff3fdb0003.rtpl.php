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

                <?php if( $idlocal == 3 ){ ?>
                <div class="alert alert-info" style="font-size: 12px">
                Agora você já pode agendar dois horário seguidos de 30 minutos para praticar a natação espontânea no Baetão, aos sábados, se o horário estiver diponível. Aproveite!!
                </div>
                <?php } ?>
            </div>

            <div class="col-md-12" style="font-weight: bold; color: darkgreen;">
                Selecione um horário e uma pessoa, <br>  
                logo em seguida clique no botão "Enviar"<br>
            </div>


        
            <div class="col-md-12">   
                
                <form action="/hora-agenda" method="post"> 

                        <input type="text" name="idlocal" value="<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="display: none;"> 
                         <input type="text" name="ispresente" value="0" style="display: none;"> 
                          <input type="text" name="titulo" value="raia" style="display: none;"> 
                          <input type="text" name="dataSemSemana" value="<?php echo htmlspecialchars( $dataSemSemana, ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="display: none;">
                          <input type="text" name="data" value="<?php echo htmlspecialchars( $data, ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="display: none;">
                   
                         

                         <label style="color: blue;"><br>SELECIONE UM HORÁRIO para: </label>
                         <span style="font-weight: bold;"><?php echo htmlspecialchars( $nomediadasemana, ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $dataformatada, ENT_COMPAT, 'UTF-8', FALSE ); ?></span><br>
                        
                        <?php $counter1=-1;  if( isset($horariosDiaSemana) && ( is_array($horariosDiaSemana) || $horariosDiaSemana instanceof Traversable ) && sizeof($horariosDiaSemana) ) foreach( $horariosDiaSemana as $key1 => $value1 ){ $counter1++; ?>

                        

                        <input type="radio" name="idhoradiasemana" value="<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                        <?php echo htmlspecialchars( $value1["horamarcadainicial"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ás <?php echo htmlspecialchars( $value1["horamarcadafinal"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>

                        <input type="text" name="horamarcadainicial" value="<?php echo htmlspecialchars( $value1["horamarcadainicial"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="display: none;">
                        <input type="text" name="horamarcadafinal" value="<?php echo htmlspecialchars( $value1["horamarcadafinal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="display: none">

                        <?php } ?>   
                        <br>

                        <label style="color: blue;">
                            SELECIONE UMA PESSOA<br>
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
                
            </div>
        </div>
    </div>
    <div class="container">
            <div class="row" style="padding-bottom: 10px;">
                <div class="col-md-12" style="margin-top: 10px; text-align-last: center">
                    <input onclick="alert('Lembramos que ao fazer seu agendamento, você está ciente da necessidade de se apresentar em nossas piscinas, no dia agendado para nadar, com sunga (para os homens) maiô (para as mulheres) e touca de natação')" style="width: 100%; float: right; background-color: #15a03f;" type="submit" class="btn">
                </div> 
                <div class="col-md-12" style="margin-top: 10px; text-align-last: center">

                        <a class="btn" style="width: 100%; float: right; background-color: #ce2c3e;  text-decoration: none; color: white;" href="javascript:window.history.go(-1)" text-decoration="none">CANCELAR/VOLTAR
                        </a>
                       
                </div>                  
            </div>
    </div>
    </form>

        </div>    
    </div>     

   

    </div> <!-- final da index -->               



<?php if(!class_exists('Rain\Tpl')){exit;}?>
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
                
                <form action="/horaagendada" method="post"> 
                	<div style="color: blue; text-align: center;">
                		<label>
                    		DADOS PARA O AGENDAMENTO
                        </label> 
                    </div>
                    <div style="text-align: center;">
                        <label>
                        	Nome: <?php echo htmlspecialchars( $nomepess, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                        </label>                        
                    </div>
                    <div style="color: blue; text-align: center; font-weight: bold;">
                        <label>                        	
                        Data: <?php echo formatDate($dataPost); ?> - <?php echo htmlspecialchars( $nomeDiaSemana, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                         </label> 
                    </div>

                        <input type="text" name="dataPost" value="<?php echo htmlspecialchars( $dataPost, ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="display: none;">                
                        <input type="text" name="idpess" value="<?php echo htmlspecialchars( $idpess, ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="display: none;"> 
                        <input type="text" name="ispresente" value="<?php echo htmlspecialchars( $ispresente, ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="display: none;">
                        <input type="text" name="idlocal" value="<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="display: none;"> 
                                               
                    <div style="color: blue;">
                        <label>
                        Confirme seus dados, a data escolhida e selecione abaixo um horário ou dois horários diferentes e subsequentes e depois clique no botão "ENVIAR".
                        </label> 
                    </div>
                    <div style="margin-bottom: -10px; font-weight: bold; ">
                    	<?php $counter1=-1;  if( isset($hora700) && ( is_array($hora700) || $hora700 instanceof Traversable ) && sizeof($hora700) ) foreach( $hora700 as $key1 => $value1 ){ $counter1++; ?>
                    	<input type="radio" name="7:00"> <label>7:00</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    	<?php } ?>               	                   	                                           	                       
                    </div>
                    <hr> 

                    <div style="margin-bottom: -10px; font-weight: bold; ">
                    	<?php $counter1=-1;  if( isset($hora730) && ( is_array($hora730) || $hora730 instanceof Traversable ) && sizeof($hora730) ) foreach( $hora730 as $key1 => $value1 ){ $counter1++; ?>
                    	<input type="radio" name="7:30"> <label>7:30</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    	<?php } ?>               	                   	                                           	                       
                    </div>
                    <hr>                                           

                     <div style="margin-bottom: -10px; font-weight: bold; ">
                    	<?php $counter1=-1;  if( isset($hora800) && ( is_array($hora800) || $hora800 instanceof Traversable ) && sizeof($hora800) ) foreach( $hora800 as $key1 => $value1 ){ $counter1++; ?>
                    	<input type="radio" name="8:00"> <label>8:00 </label>&nbsp;&nbsp;&nbsp;&nbsp;
                    	<?php } ?>                     	
                    </div>
                    <hr> 

                    <div style="margin-bottom: -10px; font-weight: bold; ">
                    	<?php $counter1=-1;  if( isset($hora830) && ( is_array($hora830) || $hora830 instanceof Traversable ) && sizeof($hora830) ) foreach( $hora830 as $key1 => $value1 ){ $counter1++; ?>
                    	<input type="radio" name="8:30"> <label>8:30</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    	<?php } ?>               	                   	                                           	                       
                    </div>
                    <hr>                       

                     <div style="margin-bottom: -10px; font-weight: bold; ">
                    	<?php $counter1=-1;  if( isset($hora900) && ( is_array($hora900) || $hora900 instanceof Traversable ) && sizeof($hora900) ) foreach( $hora900 as $key1 => $value1 ){ $counter1++; ?>
                    	<input type="radio" name="9:00"> <label>9:00</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    	<?php } ?> 
                    	
                    </div>
                    <hr>

                    <div style="margin-bottom: -10px; font-weight: bold; ">
                    	<?php $counter1=-1;  if( isset($hora930) && ( is_array($hora930) || $hora930 instanceof Traversable ) && sizeof($hora930) ) foreach( $hora930 as $key1 => $value1 ){ $counter1++; ?>
                    	<input type="radio" name="9:30"> <label>9:30</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    	<?php } ?> 
                    	
                    </div>
                    <hr>  

                    <div style="margin-bottom: -10px; font-weight: bold; ">
                    	<?php $counter1=-1;  if( isset($hora1000) && ( is_array($hora1000) || $hora1000 instanceof Traversable ) && sizeof($hora1000) ) foreach( $hora1000 as $key1 => $value1 ){ $counter1++; ?>
                    	<input type="radio" name="10:00"> <label>10:00</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    	<?php } ?> 
                    	
                    </div>
                    <hr>

                    <div style="margin-bottom: -10px; font-weight: bold; ">
                    	<?php $counter1=-1;  if( isset($hora1030) && ( is_array($hora1030) || $hora1030 instanceof Traversable ) && sizeof($hora1030) ) foreach( $hora1030 as $key1 => $value1 ){ $counter1++; ?>
                    	<input type="radio" name="10:30"> <label>10:30</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    	<?php } ?> 
                    	
                    </div>
                    <hr>                    	                                           	                                         	                                           	                       
                    
            </div>
        </div>
    </div>
    <div class="container">
            <div class="row" style="padding-bottom: 10px;">
                <div class="col-md-12" style="margin-top: 10px; text-align-last: center">
                    <input style="width: 100%; float: right; background-color: #15a03f;" type="submit" class="btn">
                </div> 
                <div class="col-md-12" style="margin-top: 10px; text-align-last: center">

                        <a class="btn" style="width: 100%; float: right; background-color: #ce2c3e;  text-decoration: none; color: white;" href="javascript:window.history.go(-1)" text-decoration="none">Voltar
                        </a>
                       
                </div>                  
            </div>
    </div>
    </form>

        </div>    
    </div>     

   

    </div> <!-- final da index -->               



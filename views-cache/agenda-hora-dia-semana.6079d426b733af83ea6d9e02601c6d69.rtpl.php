<?php if(!class_exists('Rain\Tpl')){exit;}?>
<script type="text/javascript">


</script>

   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script type="text/javascript">

    function desabilitar(valor) { 

        let id = valor;

        desabilitarHorarioPhp(id)

       document.getElementById(id).style.color = '#ccc';
      
    }

    function habilitar(valor) { 

        let id = valor;

        habilitarHorarioPhp(id)

       document.getElementById(id).style.color = 'black';
      
    }

    function atualizarVagas(idhoradiasemana, horarioinicial, horariofinal, diasemana){
        
        let confirmaNumeroDeVagas = confirm('Deseja realmente atualizar a quantidade de vgas para o horário das ' + horarioinicial + ' às ' + horariofinal + ' de ' + diasemana + '?')

        if(confirmaNumeroDeVagas == true)
        {                      
            var data = prompt("Informe a quantidade de vagas a ser atualizada.");   

            data = parseInt(data);

            if (data == null || data == "") {

                alert("As quantidade de vagas não foi atualizada! Informe a quantidade de vagas para o horário selelcionado");
            } else {

                if(!Number.isInteger(data)){
                    
                    alert('Formato de dado inválido!');
                }else{
                    
                    atualizarVagasPhp(idhoradiasemana, data);
                }                      
            }        
        }
    }

    function habilitarHorarioPhp(idhoradiasemana){

        let url = '/admin/agenda/atulizastatushorariodisponivel/'+idhoradiasemana;

        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url');        
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          //alert(result)

        });
    }

    function desabilitarHorarioPhp(idhoradiasemana){

        let url = '/admin/agenda/atulizastatushorarioindisponivel/'+idhoradiasemana;

        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url');        
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          //alert(result)

        });
    }

    function atualizarVagasPhp(idhoradiasemana, data){

        let url = '/admin/agenda/atulizavagas/'+idhoradiasemana+'/'+data;

        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url');        
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          let vagas = result.substr(32,3)
          //alert(result)

          let texto = vagas + ' vagas'

          let idlink = 'idlinkvagas'+idhoradiasemana

          document.getElementById(idlink).innerHTML = texto

        });
    }

   
</script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h4>
   Lista de dias da semana e horários do 
   <?php if( $idlocal == 3 ){ ?> BAETÃO <?php } ?>
   <?php if( $idlocal == 21 ){ ?> PAULICÉIA <?php } ?>
  </h4>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
  </ol>
</section>

<!-- Main content -->

  <div class="row">
    <div class="col-md-12">

      <div class="box box-success">
        <?php if( $error != '' ){ ?>
          <div class="alert alert-danger" style="margin: 10px 10px 0px 10px">
        <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
          </div>
        <?php } ?>
        <!-- /.box-header -->
          <div class="box-body">
        
              <label for="descmsg">
              Crie, edite ou altere os horários da agenda da natação espontânea do 
                <?php if( $idlocal == 3 ){ ?> BAETÃO <?php } ?>
                <?php if( $idlocal == 21 ){ ?> PAULICÉIA <?php } ?>
                <br>
                <span style="font-size: 10px" >- Para atualizar a quantidade de vagas, clique em "vagas". <br>
                - Para deixar o horário disponível para agendamento clique em habilitar ou clique em desabilitar para deixá-lo indisponível.</span>
              </label>
              
            </div>
             <div class="container">
                
                <div class="row" style="margin: 5px;" >                    
                
                <div class="col-md-6" style="font-size: 12px;"> 
                <label style="color: red; font-weight: bold;">Domingo</label><br><br>
                <?php $counter1=-1;  if( isset($horariosDiaSemanaDomingo) && ( is_array($horariosDiaSemanaDomingo) || $horariosDiaSemanaDomingo instanceof Traversable ) && sizeof($horariosDiaSemanaDomingo) ) foreach( $horariosDiaSemanaDomingo as $key1 => $value1 ){ $counter1++; ?>  

                        <!-- if abaixo somente para excluir um horário específico -->
                        <?php if( $value1["idhoradiasemana"] != 71 ){ ?>
                
                                <span <?php if( $value1["statushora"] == 1 ){ ?> style='color: black;' <?php }else{ ?> style='color: #ccc;'<?php } ?> id='<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>' name='1'>
                                <?php echo htmlspecialchars( $value1["horamarcadainicial"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ás <?php echo htmlspecialchars( $value1["horamarcadafinal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - 
                                <a style="color: darkblue;" id="idlinkvagas<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="atualizarVagas(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, '<?php echo htmlspecialchars( $value1["horamarcadainicial"], ENT_COMPAT, 'UTF-8', FALSE ); ?>', '<?php echo htmlspecialchars( $value1["horamarcadafinal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>', '<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')">
                                <?php if( $value1["vagas"] < 10 ){ ?>
                                0<?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas
                                <?php }else{ ?>
                                <?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas
                                <?php } ?>
                                </a>

                                </span>&nbsp;&nbsp;&nbsp;&nbsp;                          
                               
                            <?php if( $value1["statushora"] == 1 ){ ?>
                            <input onclick="habilitar(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)" checked type="radio" name="<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">&nbsp;&nbsp;Habilitar&nbsp;&nbsp;&nbsp;&nbsp;
                            <input onclick="desabilitar(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)" type="radio" name="<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">&nbsp;&nbsp;Desabilitar   
                            <?php } ?> 

                            <?php if( $value1["statushora"] == 0 ){ ?>
                            <input onclick="habilitar(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)" type="radio" name="<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">&nbsp;&nbsp;Habilitar&nbsp;&nbsp;&nbsp;&nbsp;
                            <input onclick="desabilitar(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"  checked type="radio" name="<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">&nbsp;&nbsp;Desabilitar                            
                            <?php } ?> 
                            <br>
                        <?php } ?>

               
                <?php } ?> 
                    </div>                  

                <div class="col-md-6" style="font-size: 12px;"> 
                <label style="color: blue; font-weight: bold; margin-top: 10px;">Segunda</label><br>
                <?php $counter1=-1;  if( isset($horariosDiaSemanaSegunda) && ( is_array($horariosDiaSemanaSegunda) || $horariosDiaSemanaSegunda instanceof Traversable ) && sizeof($horariosDiaSemanaSegunda) ) foreach( $horariosDiaSemanaSegunda as $key1 => $value1 ){ $counter1++; ?>          
                
                                <span <?php if( $value1["statushora"] == 1 ){ ?> style='color: black;' <?php }else{ ?> style='color: #ccc;'<?php } ?> id='<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>' name='1'>
                                <?php echo htmlspecialchars( $value1["horamarcadainicial"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ás <?php echo htmlspecialchars( $value1["horamarcadafinal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - 
                                <a id="idlinkvagas<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="atualizarVagas(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, '<?php echo htmlspecialchars( $value1["horamarcadainicial"], ENT_COMPAT, 'UTF-8', FALSE ); ?>', '<?php echo htmlspecialchars( $value1["horamarcadafinal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>', '<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')">
                                <?php if( $value1["vagas"] < 10 ){ ?>
                                0<?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas
                                <?php }else{ ?>
                                <?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas
                                <?php } ?>
                                </a>
                                </span>&nbsp;&nbsp;&nbsp;&nbsp;                          
                               

                            <?php if( $value1["statushora"] == 1 ){ ?>
                            <input onclick="habilitar(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)" checked type="radio" name="<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">&nbsp;&nbsp;Habilitar&nbsp;&nbsp;&nbsp;&nbsp;
                            <input onclick="desabilitar(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)" type="radio" name="<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">&nbsp;&nbsp;Desabilitar   
                            <?php } ?> 

                            <?php if( $value1["statushora"] == 0 ){ ?>
                            <input onclick="habilitar(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)" type="radio" name="<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">&nbsp;&nbsp;Habilitar&nbsp;&nbsp;&nbsp;&nbsp;
                            <input onclick="desabilitar(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)" checked type="radio" name="<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">&nbsp;&nbsp;Desabilitar                            
                            <?php } ?> 
                            <br>

               
                <?php } ?> 
                 </div> 
             </div>
                 <hr>

                <div class="row" style="margin: 5px;" >   
                <div class="col-md-6" style="font-size: 12px; ">                  
                <label style="color: blue; font-weight: bold;">Terça-feira</label><br>
                    <?php $counter1=-1;  if( isset($horariosDiaSemanaTerca) && ( is_array($horariosDiaSemanaTerca) || $horariosDiaSemanaTerca instanceof Traversable ) && sizeof($horariosDiaSemanaTerca) ) foreach( $horariosDiaSemanaTerca as $key1 => $value1 ){ $counter1++; ?>          
                        
                                <span <?php if( $value1["statushora"] == 1 ){ ?> style='color: black;' <?php }else{ ?> style='color: #ccc;'<?php } ?> id='<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>' name='1'>
                                <?php echo htmlspecialchars( $value1["horamarcadainicial"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ás <?php echo htmlspecialchars( $value1["horamarcadafinal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - 
                                <a id="idlinkvagas<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="atualizarVagas(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, '<?php echo htmlspecialchars( $value1["horamarcadainicial"], ENT_COMPAT, 'UTF-8', FALSE ); ?>', '<?php echo htmlspecialchars( $value1["horamarcadafinal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>', '<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')">
                                <?php if( $value1["vagas"] < 10 ){ ?>
                                0<?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas
                                <?php }else{ ?>
                                <?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas
                                <?php } ?>
                                </a>
                                </span>&nbsp;&nbsp;&nbsp;&nbsp;                          
                               

                            <?php if( $value1["statushora"] == 1 ){ ?>
                            <input onclick="habilitar(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)" checked type="radio" name="<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">&nbsp;&nbsp;Habilitar&nbsp;&nbsp;&nbsp;&nbsp;
                            <input onclick="desabilitar(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)" type="radio" name="<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">&nbsp;&nbsp;Desabilitar   
                            <?php } ?> 

                            <?php if( $value1["statushora"] == 0 ){ ?>
                            <input onclick="habilitar(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)" type="radio" name="<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">&nbsp;&nbsp;Habilitar&nbsp;&nbsp;&nbsp;&nbsp;
                            <input onclick="desabilitar(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"  checked type="radio" name="<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">&nbsp;&nbsp;Desabilitar                            
                            <?php } ?> 
                            <br>

                    <?php } ?>               
                </div>

                <div class="col-md-6" style="font-size: 12px; "> 
                <label style="color: blue; font-weight: bold; margin-top: 10px;">Quarta-feira</label><br>
                <?php $counter1=-1;  if( isset($horariosDiaSemanaQuarta) && ( is_array($horariosDiaSemanaQuarta) || $horariosDiaSemanaQuarta instanceof Traversable ) && sizeof($horariosDiaSemanaQuarta) ) foreach( $horariosDiaSemanaQuarta as $key1 => $value1 ){ $counter1++; ?>          
                
                                <span <?php if( $value1["statushora"] == 1 ){ ?> style='color: black;' <?php }else{ ?> style='color: #ccc;'<?php } ?> id='<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>' name='1'>
                                <?php echo htmlspecialchars( $value1["horamarcadainicial"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ás <?php echo htmlspecialchars( $value1["horamarcadafinal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - 
                                <a id="idlinkvagas<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="atualizarVagas(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, '<?php echo htmlspecialchars( $value1["horamarcadainicial"], ENT_COMPAT, 'UTF-8', FALSE ); ?>', '<?php echo htmlspecialchars( $value1["horamarcadafinal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>', '<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')">
                                <?php if( $value1["vagas"] < 10 ){ ?>
                                0<?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas
                                <?php }else{ ?>
                                <?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas
                                <?php } ?>
                                </a>
                                </span>&nbsp;&nbsp;&nbsp;&nbsp;                          
                               

                            <?php if( $value1["statushora"] == 1 ){ ?>
                            <input onclick="habilitar(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)" checked type="radio" name="<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">&nbsp;&nbsp;Habilitar&nbsp;&nbsp;&nbsp;&nbsp;
                            <input onclick="desabilitar(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)" type="radio" name="<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">&nbsp;&nbsp;Desabilitar   
                            <?php } ?> 

                            <?php if( $value1["statushora"] == 0 ){ ?>
                            <input onclick="habilitar(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)" type="radio" name="<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">&nbsp;&nbsp;Habilitar&nbsp;&nbsp;&nbsp;&nbsp;
                            <input onclick="desabilitar(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)" checked type="radio" name="<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">&nbsp;&nbsp;Desabilitar                            
                            <?php } ?> 
                            <br>
               
                <?php } ?> 
                 </div>
               </div>
               <hr>
                 <div class="row" style="margin: 5px;" > 
                 <div class="col-md-6" style="font-size: 12px; ">           
                <label style="color: blue; font-weight: bold;">Quinta-feira</label><br>
                <?php $counter1=-1;  if( isset($horariosDiaSemanaQuinta) && ( is_array($horariosDiaSemanaQuinta) || $horariosDiaSemanaQuinta instanceof Traversable ) && sizeof($horariosDiaSemanaQuinta) ) foreach( $horariosDiaSemanaQuinta as $key1 => $value1 ){ $counter1++; ?>          
                
                        
                                <span <?php if( $value1["statushora"] == 1 ){ ?> style='color: black;' <?php }else{ ?> style='color: #ccc;'<?php } ?> id='<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>' name='1'>
                                <?php echo htmlspecialchars( $value1["horamarcadainicial"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ás <?php echo htmlspecialchars( $value1["horamarcadafinal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - 
                                <a id="idlinkvagas<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="atualizarVagas(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, '<?php echo htmlspecialchars( $value1["horamarcadainicial"], ENT_COMPAT, 'UTF-8', FALSE ); ?>', '<?php echo htmlspecialchars( $value1["horamarcadafinal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>', '<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')">
                                <?php if( $value1["vagas"] < 10 ){ ?>
                                0<?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas
                                <?php }else{ ?>
                                <?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas
                                <?php } ?>
                                </a>
                                </span>&nbsp;&nbsp;&nbsp;&nbsp;                          
                               

                            <?php if( $value1["statushora"] == 1 ){ ?>
                            <input onclick="habilitar(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)" checked type="radio" name="<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">&nbsp;&nbsp;Habilitar&nbsp;&nbsp;&nbsp;&nbsp;
                            <input onclick="desabilitar(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)" type="radio" name="<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">&nbsp;&nbsp;Desabilitar   
                            <?php } ?> 

                            <?php if( $value1["statushora"] == 0 ){ ?>
                            <input onclick="habilitar(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)" type="radio" name="<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">&nbsp;&nbsp;Habilitar&nbsp;&nbsp;&nbsp;&nbsp;
                            <input onclick="desabilitar(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)" checked type="radio" name="<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">&nbsp;&nbsp;Desabilitar                            
                            <?php } ?> 
                            <br>

               
                <?php } ?> 
                 </div>

                <div class="col-md-6" style="font-size: 12px; "> 
                <label style="color: blue; font-weight: bold; margin-top: 10px;">Sexta-feira</label><br>
                    <?php $counter1=-1;  if( isset($horariosDiaSemanaSexta) && ( is_array($horariosDiaSemanaSexta) || $horariosDiaSemanaSexta instanceof Traversable ) && sizeof($horariosDiaSemanaSexta) ) foreach( $horariosDiaSemanaSexta as $key1 => $value1 ){ $counter1++; ?> 

                                <span <?php if( $value1["statushora"] == 1 ){ ?> style='color: black;' <?php }else{ ?> style='color: #ccc;'<?php } ?> id='<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>' name='1'>
                                <?php echo htmlspecialchars( $value1["horamarcadainicial"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ás <?php echo htmlspecialchars( $value1["horamarcadafinal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - 
                                <a id="idlinkvagas<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="atualizarVagas(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, '<?php echo htmlspecialchars( $value1["horamarcadainicial"], ENT_COMPAT, 'UTF-8', FALSE ); ?>', '<?php echo htmlspecialchars( $value1["horamarcadafinal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>', '<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')">
                                <?php if( $value1["vagas"] < 10 ){ ?>
                                0<?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas
                                <?php }else{ ?>
                                <?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas
                                <?php } ?>
                                </a>
                                </span>&nbsp;&nbsp;&nbsp;&nbsp;                          
                               

                            <?php if( $value1["statushora"] == 1 ){ ?>
                            <input onclick="habilitar(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)" checked type="radio" name="<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">&nbsp;&nbsp;Habilitar&nbsp;&nbsp;&nbsp;&nbsp;
                            <input onclick="desabilitar(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)" type="radio" name="<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">&nbsp;&nbsp;Desabilitar   
                            <?php } ?> 

                            <?php if( $value1["statushora"] == 0 ){ ?>
                            <input onclick="habilitar(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)" type="radio" name="<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">&nbsp;&nbsp;Habilitar&nbsp;&nbsp;&nbsp;&nbsp;
                            <input onclick="desabilitar(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"  checked type="radio" name="<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">&nbsp;&nbsp;Desabilitar                            
                            <?php } ?> 
                            <br>
                    <?php } ?> 
                </div>
            </div>
            <hr>
                <div class="row" style="margin: 5px;" > 
                <div class="col-md-6" style="font-size: 12px; ">                     
                <label style="color: red; font-weight: bold;">Sábado</label><br>
                <?php $counter1=-1;  if( isset($horariosDiaSemanaSabado) && ( is_array($horariosDiaSemanaSabado) || $horariosDiaSemanaSabado instanceof Traversable ) && sizeof($horariosDiaSemanaSabado) ) foreach( $horariosDiaSemanaSabado as $key1 => $value1 ){ $counter1++; ?>          
                
                                <span <?php if( $value1["statushora"] == 1 ){ ?> style='color: black;' <?php }else{ ?> style='color: #ccc;'<?php } ?> id='<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>' name='1'>
                                <?php echo htmlspecialchars( $value1["horamarcadainicial"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ás <?php echo htmlspecialchars( $value1["horamarcadafinal"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - 
                                <a id="idlinkvagas<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="atualizarVagas(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, '<?php echo htmlspecialchars( $value1["horamarcadainicial"], ENT_COMPAT, 'UTF-8', FALSE ); ?>', '<?php echo htmlspecialchars( $value1["horamarcadafinal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>', '<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')">
                                <?php if( $value1["vagas"] < 10 ){ ?>
                                0<?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas
                                <?php }else{ ?>
                                <?php echo htmlspecialchars( $value1["vagas"], ENT_COMPAT, 'UTF-8', FALSE ); ?> vagas
                                <?php } ?>
                                </a>
                                </span>&nbsp;&nbsp;&nbsp;&nbsp;                          
                               

                            <?php if( $value1["statushora"] == 1 ){ ?>
                            <input onclick="habilitar(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)" checked type="radio" name="<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">&nbsp;&nbsp;Habilitar&nbsp;&nbsp;&nbsp;&nbsp;
                            <input onclick="desabilitar(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)" type="radio" name="<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">&nbsp;&nbsp;Desabilitar   
                            <?php } ?> 

                            <?php if( $value1["statushora"] == 0 ){ ?>
                            <input onclick="habilitar(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)" type="radio" name="<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">&nbsp;&nbsp;Habilitar&nbsp;&nbsp;&nbsp;&nbsp;
                            <input onclick="desabilitar(<?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)" checked type="radio" name="<?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["idhoradiasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">&nbsp;&nbsp;Desabilitar                            
                            <?php } ?> 
                            <br>
               
                <?php } ?> 
                 </div>               

                </div>
              
          </div>
          <!-- /.box-body -->
           

            <div class="col-md-6" style="margin-top: 10px; text-align-last: center">

            <a class="btn" style="width: 100%; float: right; background-color: darkorange;  text-decoration: none; color: white;" href="/admin/agenda/horario-dia-semana/create/<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>" text-decoration="none">Criar horário
                        </a>
            </div>



      </div>

    </div>

  </div>



 

  

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
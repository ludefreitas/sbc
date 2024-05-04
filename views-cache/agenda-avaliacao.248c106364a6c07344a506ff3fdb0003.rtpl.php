<?php if(!class_exists('Rain\Tpl')){exit;}?>
<script>

    
    /*
    alert('Novas datas para participar da avaliação da natação, a partir de março de 2024, aguardem!');
    history.back()
    */
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
                  <div class="col-md-8" style="text-align-last: center; background-color: white; margin: 5px 0px 50px 0px;">

    <div class="container">
        <div class="row" style="padding-bottom: 5px">
            <div class="col-md-12">
                    
                <?php if( $error != '' ){ ?>
                <div class="alert alert-danger">
                <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
                <?php } ?>
            </div>
            
            <div style="text-align: justify; line-height: 20px; color: blue; font-size: 14px; font-style: italic; margin: 0px 5px 0px 5px; ">     
       <?php if( checkLogin(false) ){ ?>  

       <span style="color: blue; font-weight: bold;">Olá </span>
       <span style="color: black; font-weight: bold;">  <?php echo getUserName(); ?>, </span>
       <span style="color: blue; font-weight: bold;">seja bem vindo!</span> <br><br>
        <?php }else{ ?>

        Olá! seja bem vindo! <br><br>

        <?php } ?>

        As vagas das turmas de natação intermediário ou avançado são destinadas aos alunos egressos das turmas de iniciação em 2023.
        <br><br>

        Se você já sabe nadar e não fez parte das aulas em 2023, você tem duas opções:
        <br><br>   

        1. Agendar um horário para nadar sozinho sob a supervisão do salva vidas - <a href="/locaisnatacao">natação espontâneo</a>
        <br><br>   

        2. agendar um teste (avaliação) para ingressar nas turmas de aperfeiçoamento nas datas abaixo:
        <br><br>   
<hr style="background-color: #0f71b3;">

           </div>

            <div class="col-md-12" style="font-weight: bold; color: darkgreen;">
                Selecione um horário, uma pessoa (que irá participar da avaliação) e <br>  
                logo em seguida clique no botão "Enviar"<br>
                
            </div>


        
            <div class="col-md-12">   
                <hr style="background-color: #0f71b3;">

                <form action="/hora-agenda-avaliacao" method="post"> 

                        <input type="text" name="idlocal" value="<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="display: none;"> 
                         <input type="text" name="ispresente" value="0" style="display: none;"> 
                          <input type="text" name="titulo" value="avaliacao" style="display: none;"> 
                          
                          <?php if( $idlocal == 3 ){ ?>
                         <label style="color: blue;">Local da avaliação - Baetão<br>Avenida Armando Ítalo Setti, 901 - Baeta Neves - SBC </label>
                         <br>   
                         
                         <!--
                         <span style="font-weight: bold;">02/03/2023 - quinta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-03-02-10:00-10:30-vagas20">
                         &nbsp;10:00 às 10:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-03-02-10:30-11:00-vagas20">
                         &nbsp;10:30 às 11:00 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-03-02-16:00-16:30-vagas20">
                         &nbsp;16:00 às 16:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-03-02-16:30-17:00-vagas20">
                         &nbsp;16:30 às 17:00 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-03-02-19:30-20:00-vagas20">
                         &nbsp;19:30 às 20:00 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-03-02-20:00-20:30-vagas20">
                         &nbsp;20:00 às 20:30 <br>
                         
                         <br>
                         

                         <span style="font-weight: bold;">03/03/2023 - sexta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2023-03-03-10:00-10:30-vagas20">
                         &nbsp;10:00 às 10:30 <br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2023-03-03-10:30-11:00-vagas20">
                         &nbsp;10:30 às 11:00 <br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2023-03-03-16:00-16:30-vagas20">
                         &nbsp;16:00 às 16:30 <br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2023-03-03-16:30-17:00-vagas20">
                         &nbsp;16:30 às 17:00 <br>
                         
                         
                         
                         <br>
                         
                         <span style="font-weight: bold;">30/03/2023 - quinta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-03-30-10:00-10:30-vagas20">
                         &nbsp;10:00 às 10:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-03-30-10:30-11:00-vagas20">
                         &nbsp;10:30 às 11:00 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-03-30-16:00-16:30-vagas20">
                         &nbsp;16:00 às 16:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-03-30-16:30-17:00-vagas20">
                         &nbsp;16:30 às 17:00 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-03-30-19:30-20:00-vagas20">
                         &nbsp;19:30 às 20:00 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-03-30-20:00-20:30-vagas20">
                         &nbsp;20:00 às 20:30 <br>
                         
                         <br>

                         <span style="font-weight: bold;">31/03/2023 - sexta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2023-03-31-10:00-10:30-vagas20">
                         &nbsp;10:00 às 10:30 <br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2023-03-31-10:30-11:00-vagas20">
                         &nbsp;10:30 às 11:00 <br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2023-03-31-16:00-16:30-vagas20">
                         &nbsp;16:00 às 16:30 <br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2023-03-31-16:30-17:00-vagas20">
                         &nbsp;16:30 às 17:00 <br>
                         
                         <br>

                         <span style="font-weight: bold;">27/04/2023 - quinta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-04-27-10:00-10:30-vagas20">
                         &nbsp;10:00 às 10:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-04-27-10:30-11:00-vagas20">
                         &nbsp;10:30 às 11:00 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-04-27-16:00-16:30-vagas20">
                         &nbsp;16:00 às 16:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-04-27-16:30-17:00-vagas20">
                         &nbsp;16:30 às 17:00 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-04-27-18:00-18:30-vagas20">
                         &nbsp;18:00 às 18:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-04-27-18:30-19:00-vagas20">
                         &nbsp;18:30 às 19:00 <br>
                        -->
                         <!--
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-04-27-19:30-20:00-vagas20">
                         &nbsp;19:30 às 20:00 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-04-27-20:00-20:30-vagas20">
                         &nbsp;20:00 às 20:30 <br>
                         
                         <br>
                         
                         -->
                         
                         <!--

                         <span style="font-weight: bold;">28/04/2023 - sexta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2023-04-28-10:00-10:30-vagas20">
                         &nbsp;10:00 às 10:30 <br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2023-04-28-10:30-11:00-vagas20">
                         &nbsp;10:30 às 11:00 <br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2023-04-28-16:00-16:30-vagas20">
                         &nbsp;16:00 às 16:30 <br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2023-04-28-16:30-17:00-vagas20">
                         &nbsp;16:30 às 17:00 <br>
                         
                         
                         <br>
                         
                         -->

                         <!--
                         <span style="font-weight: bold;">01/06/2023 - quinta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-06-01-10:00-10:30-vagas20">
                         &nbsp;10:00 às 10:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-06-01-10:30-11:00-vagas20">
                         &nbsp;10:30 às 11:00 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-06-01-16:00-16:30-vagas20">
                         &nbsp;16:00 às 16:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-06-01-16:30-17:00-vagas20">
                         &nbsp;16:30 às 17:00 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-06-01-18:00-18:30-vagas20">
                         &nbsp;18:00 às 18:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-06-01-18:30-19:00-vagas20">
                         &nbsp;18:30 às 19:00 <br>
                     -->
                         <!--
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-06-01-19:30-20:00-vagas20">
                         &nbsp;19:30 às 20:00 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-06-01-20:00-20:30-vagas20">
                         &nbsp;20:00 às 20:30 <br>
                         -->
                         <!--
                         <br>

                         <span style="font-weight: bold;">02/06/2023 - sexta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2023-06-02-10:00-10:30-vagas20">
                         &nbsp;10:00 às 10:30 <br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2023-06-02-10:30-11:00-vagas20">
                         &nbsp;10:30 às 11:00 <br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2023-06-02-16:00-16:30-vagas20">
                         &nbsp;16:00 às 16:30 <br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2023-06-02-16:30-17:00-vagas20">
                         &nbsp;16:30 às 17:00 <br>
                         
                         
                         <br>
                     -->

                    <!--
                        <span style="font-weight: bold;">09/08/2023 - quarta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Quarta-2023-08-09-10:00-10:30-vagas20">
                         &nbsp;10:00 às 10:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quarta-2023-08-09-10:30-11:00-vagas20">
                         &nbsp;10:30 às 11:00 <br>
                         <input type="radio" name="datahoramarcada" value="Quarta-2023-08-09-16:00-16:30-vagas20">
                         &nbsp;16:00 às 16:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quarta-2023-08-09-16:30-17:00-vagas20">
                         &nbsp;16:30 às 17:00 <br>
                         <input type="radio" name="datahoramarcada" value="Quarta-2023-08-09-18:00-18:30-vagas20">
                         &nbsp;18:00 às 18:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quarta-2023-08-09-18:30-19:00-vagas20">
                         &nbsp;18:30 às 19:00 <br>
                    -->
                         <!--
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-08-09-19:30-20:00-vagas20">
                         &nbsp;19:30 às 20:00 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-08-09-20:00-20:30-vagas20">
                         &nbsp;20:00 às 20:30 <br>
                         -->
                    <!--
                         <br>

                         <span style="font-weight: bold;">10/08/2023 - quinta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-08-10-10:00-10:30-vagas20">
                         &nbsp;10:00 às 10:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-08-10-10:30-11:00-vagas20">
                         &nbsp;10:30 às 11:00 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-08-10-16:00-16:30-vagas20">
                         &nbsp;16:00 às 16:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-08-10-16:30-17:00-vagas20">
                         &nbsp;16:30 às 17:00 <br>
                         
                    -->

                    <!--  
                         <br>

                         <span style="font-weight: bold;">04/10/2023 - quarta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Quarta-2023-10-04-10:00-10:30-vagas20">
                         &nbsp;10:00 às 10:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quarta-2023-10-04-10:30-11:00-vagas20">
                         &nbsp;10:30 às 11:00 <br>
                         <input type="radio" name="datahoramarcada" value="Quarta-2023-10-04-16:00-16:30-vagas20">
                         &nbsp;16:00 às 16:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quarta-2023-10-04-16:30-17:00-vagas20">
                         &nbsp;16:30 às 17:00 <br>
                         <input type="radio" name="datahoramarcada" value="Quarta-2023-10-04-18:00-18:30-vagas20">
                         &nbsp;18:00 às 18:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quarta-2023-10-04-18:30-19:00-vagas20">
                         &nbsp;18:30 às 19:00 <br>
                    -->
                         <!--
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-10-04-19:30-20:00-vagas20">
                         &nbsp;19:30 às 20:00 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-10-04-20:00-20:30-vagas20">
                         &nbsp;20:00 às 20:30 <br>
                         -->
                         
                    <!--
                         <br>

                         <span style="font-weight: bold;">05/10/2023 - quinta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-10-05-10:00-10:30-vagas20">
                    -->
                    <!-- Sexta--2023-10-05-10:00-10:30-vagas20"> -->

                    <!--
                         &nbsp;10:00 às 10:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-10-05-10:30-11:00-vagas20">
                    -->

                    <!-- Sexta--2023-10-05-10:30-11:00-vagas20"> -->

                    <!--
                         &nbsp;10:30 às 11:00 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-10-05-16:00-16:30-vagas20">
                    -->

                    <!-- Sexta--2023-10-05-16:00-16:30-vagas20"> -->

                    <!--
                         &nbsp;16:00 às 16:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-10-05-16:30-17:00-vagas20">
                    -->

                    <!-- Sexta--2023-10-05-16:30-17:00-vagas20"> -->

                    <!--
                         &nbsp;16:30 às 17:00 <br>                       
                         
                         <br>
                    -->
                         <span style="font-weight: bold;">04/04/2024 - Quinta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2024-04-04-10:00-10:30-vagas20">
                         &nbsp;10:00 às 10:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2024-04-04-10:30-11:00-vagas20">
                         &nbsp;10:30 às 11:00 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2024-04-04-16:00-16:30-vagas20">
                         &nbsp;16:00 às 16:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2024-04-04-16:30-17:00-vagas20">
                         &nbsp;16:30 às 17:00 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2024-04-04-18:00-18:30-vagas20">
                         &nbsp;18:00 às 18:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2024-04-04-18:30-19:00-vagas20">
                         &nbsp;18:30 às 19:00 <br>

                         <br>

                         <span style="font-weight: bold;">05/04/2024 - Sexta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2024-04-05-10:00-10:30-vagas20">
                         &nbsp;10:00 às 10:30 <br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2024-04-05-10:30-11:00-vagas20">
                         &nbsp;10:30 às 11:00 <br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2024-04-05-16:00-16:30-vagas20">
                         &nbsp;16:00 às 16:30 <br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2024-04-05-16:30-17:00-vagas20">
                         &nbsp;16:30 às 17:00 <br>
                    
                         <br>

                         <span style="font-weight: bold;">20/06/2024 - Quinta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2024-06-20-10:00-10:30-vagas20">
                         &nbsp;10:00 às 10:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2024-06-20-10:30-11:00-vagas20">
                         &nbsp;10:30 às 11:00 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2024-06-20-16:00-16:30-vagas20">
                         &nbsp;16:00 às 16:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2024-06-20-16:30-17:00-vagas20">
                         &nbsp;16:30 às 17:00 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2024-06-20-18:00-18:30-vagas20">
                         &nbsp;18:00 às 18:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2024-06-20-18:30-19:00-vagas20">
                         &nbsp;18:30 às 19:00 <br>

                         <br>

                         <span style="font-weight: bold;">21/06/2024 - Sexta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2024-06-21-10:00-10:30-vagas20">
                         &nbsp;10:00 às 10:30 <br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2024-06-21-10:30-11:00-vagas20">
                         &nbsp;10:30 às 11:00 <br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2024-06-21-16:00-16:30-vagas20">
                         &nbsp;16:00 às 16:30 <br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2024-06-21-16:30-17:00-vagas20">
                         &nbsp;16:30 às 17:00 <br>
                    
                         <br>
                        
                         
                         <?php } ?>                      

                         <?php if( $idlocal == 21 ){ ?>
                         <label style="color: blue;">Local da avaliação - Paulicéia <br>Rua Francisco Alves, 460 - Paulicéia - SBC </label>
                         <br>  
                         
                         <!--
                         <span style="font-weight: bold;">02/03/2023 - quinta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-03-02-09:00-09:30-vagas12">
                         &nbsp;09:00 às 09:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-03-02-18:30-19:00-vagas12">
                         &nbsp;18:30 às 19:00 <br>

                         <br>
                         -->
                         
                         <!--
                         
                         <span style="font-weight: bold;">03/03/2023 - sexta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2023-03-03-09:00-09:30-vagas20">
                         &nbsp;09:00 às 09:30 <br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2023-03-03-18:30-19:00-vagas20">
                         &nbsp;18:30 às 19:00 <br>

                         <br>
                         
                         -->
                         
                         <!--
                         <span style="font-weight: bold;">30/03/2023 - quinta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-03-30-09:00-09:30-vagas12">
                         &nbsp;09:00 às 09:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-03-30-18:30-19:00-vagas12">
                         &nbsp;18:30 às 19:00 <br>
                         
                         <br>
                         -->
                         
                         <!--
                         <span style="font-weight: bold;">31/03/2023 - sexta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2023-03-31-09:00-09:30-vagas12">
                         &nbsp;09:00 às 09:30 <br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2023-03-31-18:30-19:00-vagas12">
                          &nbsp;18:30 às 19:00 <br>

                         <br>
                         
                         -->
                         
                         <!--
                         <span style="font-weight: bold;">27/04/2023 - quinta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-04-27-09:00-09:30-vagas12">
                         &nbsp;09:00 às 09:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-04-27-18:30-19:00-vagas12">
                         &nbsp;18:30 às 19:00 <br>
                         
                         <br>
                         
                         -->
                         
                         <!--

                         <span style="font-weight: bold;">28/04/2023 - sexta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2023-04-28-09:00-09:30-vagas12">
                         &nbsp;09:00 às 09:30 <br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2023-04-28-18:30-19:00-vagas12">
                         &nbsp;18:30 às 19:00 <br>

                         <br>
                         
                         -->
                         <!--
                         <span style="font-weight: bold;">01/06/2023 - quinta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-06-01-09:00-09:30-vagas12">
                         &nbsp;09:00 às 09:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-06-01-18:30-19:00-vagas12">
                         &nbsp;18:30 às 19:00 <br>
                         
                         <br>

                         <span style="font-weight: bold;">02/06/2023 - sexta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2023-06-02-09:00-09:30-vagas12">
                         &nbsp;09:00 às 09:30 <br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2023-06-02-18:30-19:00-vagas12">
                         &nbsp;18:30 às 19:00 <br>

                         <br>
                     -->

                     <!--

                        <span style="font-weight: bold;">09/08/2023 - quarta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Quarta-2023-08-09-09:00-09:30-vagas12">
                         &nbsp;09:00 às 09:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quarta-2023-08-09-18:30-19:00-vagas12">
                         &nbsp;18:30 às 19:00 <br>
                         
                         <br>

                         <span style="font-weight: bold;">10/08/2023 - quinta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-08-10-09:00-09:30-vagas12">
                         &nbsp;09:00 às 09:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-08-10-18:30-19:00-vagas12">
                         &nbsp;18:30 às 19:00 <br>

                         <br>

                         <span style="font-weight: bold;">04/10/2023 - quarta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Quarta-2023-10-04-09:00-09:30-vagas12">
                         &nbsp;09:00 às 09:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quarta-2023-10-04-18:30-19:00-vagas12">
                         &nbsp;18:30 às 19:00 <br>
                         
                         <br>

                         <span style="font-weight: bold;">05/10/2023 - quinta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-10-05-09:00-09:30-vagas12">
                         &nbsp;09:00 às 09:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2023-10-05-18:30-19:00-vagas12">
                         &nbsp;18:30 às 19:00 <br>

                         <br>
                       
                       -->

                        <span style="font-weight: bold;">04/04/2024 - Quinta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2024-04-04-09:00-09:30-vagas12">
                         &nbsp;09:00 às 09:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2024-04-04-18:30-19:00-vagas12">
                         &nbsp;18:30 às 19:00 <br>
                         
                         <br>

                         <span style="font-weight: bold;">05/04/2024 - Sexta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2024-04-05-09:00-09:30-vagas12">
                         &nbsp;09:00 às 09:30 <br>


                         <br>

                         <span style="font-weight: bold;">20/06/2024 - Quinta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2024-06-20-09:00-09:30-vagas12">
                         &nbsp;09:00 às 09:30 <br>
                         <input type="radio" name="datahoramarcada" value="Quinta-2024-06-20-18:30-19:00-vagas12">
                         &nbsp;18:30 às 19:00 <br>
                         
                         <br>

                         <span style="font-weight: bold;">21/06/2024 - Sexta-feira </span><br>
                         <input type="radio" name="datahoramarcada" value="Sexta--2024-06-21-09:00-09:30-vagas12">
                         &nbsp;09:00 às 09:30 <br>
                         

                         <br>
                         
                         
                         <?php } ?>                      
                        

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
                    <input onclick="alert('Lembramos que ao fazer seu agendamento, você está ciente da necessidade de se apresentar em nossas piscinas, no dia agendado para a avaliação, com sunga (para os homens) maiô (para as mulheres) e touca de natação')" style="width: 100%; float: right; background-color: #15a03f;" type="submit" class="btn">
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



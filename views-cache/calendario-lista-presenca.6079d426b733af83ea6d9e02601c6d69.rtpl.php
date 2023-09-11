<?php if(!class_exists('Rain\Tpl')){exit;}?> <link href="/../res/site/js/fullcalendar/main.css" rel="stylesheet" />

    <script src="/../res/site/js/fullcalendar/main.min.js"></script> 

<script>
     
      /*
      (function(win,doc){

        'use strict';

        let calendarEl=doc.querySelector('.calendar');
        let calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();

      })(window,document);

      */

        document.addEventListener('DOMContentLoaded', function() {
        let calendarEl = document.getElementById('calendar');
        let calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          headerToolbar: {
            start: 'prev,next',
            center: 'title',
            end: 'dayGridMonth'
          },
          locale: 'pt-br',
          buttonText:{
            today: 'hoje',
            month: 'mês',
            week: 'semana',
            day: 'dia'
          },

          dateClick: function(info) {

            let idtemporada = document.getElementById('idtemporada').value;          
            let idturma = document.getElementById('idturma').value;          
            let primeirodiasemana = document.getElementById('primeirodiasemana').value;          
            let segundodiasemana = document.getElementById('segundodiasemana').value;          
            let terceirodiasemana = document.getElementById('terceirodiasemana').value;          
            let quartodiasemana = document.getElementById('quartodiasemana').value;          
            let quintodiasemana = document.getElementById('quintodiasemana').value;          
            let unicodiasemana = document.getElementById('unicodiasemana').value;    

            let datasemanas = new Date(info.dateStr);
            let data = info.dateStr;

            function dataAtualFormatada(){
              let data = new Date(),
              dia  = data.getDate().toString().padStart(2, '0'),
              mes  = (data.getMonth()+1).toString().padStart(2, '0'),
              ano  = data.getFullYear();
              //return `${dia}/${mes}/${ano}`;
              return `${ano}-${mes}-${dia}`;
            }

            let hoje = dataAtualFormatada();

            let strDiaSemana = datasemanas.getDay();  
            
            if(hoje < data){

                alert('Data escolhida não pode ser posterior ao dia de hoje!');                  
                return;

            }                     

            if((strDiaSemana == primeirodiasemana ) || (strDiaSemana == segundodiasemana ) || (strDiaSemana == terceirodiasemana ) || (strDiaSemana == quartodiasemana ) || (strDiaSemana == quintodiasemana )){
             
            }else{

              if(strDiaSemana == unicodiasemana ){
                
              }else{
                alert("Esta data não é um dia da semana válido para esta turma");
                exit();
              }
            }            

            window.location.href=`http://www.cursosesportivos.com.br/admin/insc-turma-temporada-fazer-chamada/` + idtemporada + '/' + idturma + '/' + info.dateStr;          
          
          },

          eventClick: function(info) {

            window.location.href=`http://www.cursosesportivos.com.br/admin/turma/${info.event.id}`
            /*
            alert('Event: ' + info.event.title);
            alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
            alert('View: ' + info.view.type);
            // change the border color just for fun
            info.el.style.backgroundColor = 'green';
            */
          },

         //hiddenDays: [0, 1, 2, 3, 4],

          slotMinTime: '07:00:00',

          slotMaxTime: '21:00:00',

        });
        calendar.render();
      });

      
            

    </script>   
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h4>
        Olá Admin <?php echo htmlspecialchars( $user["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>!
      </h4>
      <h5>
         Selecione a data e o dia da semana para atualizar a lista de presença da turma: <br> [<?php echo htmlspecialchars( $idturma, ENT_COMPAT, 'UTF-8', FALSE ); ?>] - <?php echo htmlspecialchars( $descturma, ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php if( $dia2 == '' ){ ?> <?php echo htmlspecialchars( $dia1, ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php }else{ ?> <?php echo htmlspecialchars( $dia1, ENT_COMPAT, 'UTF-8', FALSE ); ?> e <?php echo htmlspecialchars( $dia2, ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php } ?>
         Lista chamada mês: &nbsp;&nbsp;&nbsp;
         <a href="/admin/insc-turma-temporada-mes-chamada-atualizada/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $idturma, ENT_COMPAT, 'UTF-8', FALSE ); ?>/01">01</a>&nbsp;&nbsp;&nbsp;
         <a href="/admin/insc-turma-temporada-mes-chamada-atualizada/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $idturma, ENT_COMPAT, 'UTF-8', FALSE ); ?>/02">02</a>&nbsp;&nbsp;&nbsp;
         <a href="/admin/insc-turma-temporada-mes-chamada-atualizada/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $idturma, ENT_COMPAT, 'UTF-8', FALSE ); ?>/03">03</a>&nbsp;&nbsp;&nbsp;
         <a href="/admin/insc-turma-temporada-mes-chamada-atualizada/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $idturma, ENT_COMPAT, 'UTF-8', FALSE ); ?>/04">04</a>&nbsp;&nbsp;&nbsp;
         <a href="/admin/insc-turma-temporada-mes-chamada-atualizada/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $idturma, ENT_COMPAT, 'UTF-8', FALSE ); ?>/05">05</a>&nbsp;&nbsp;&nbsp;
         <a href="/admin/insc-turma-temporada-mes-chamada-atualizada/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $idturma, ENT_COMPAT, 'UTF-8', FALSE ); ?>/06">06</a>&nbsp;&nbsp;&nbsp;
         <a href="/admin/insc-turma-temporada-mes-chamada-atualizada/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $idturma, ENT_COMPAT, 'UTF-8', FALSE ); ?>/07">07</a>&nbsp;&nbsp;&nbsp;
         <a href="/admin/insc-turma-temporada-mes-chamada-atualizada/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $idturma, ENT_COMPAT, 'UTF-8', FALSE ); ?>/08">08</a>&nbsp;&nbsp;&nbsp;
         <a href="/admin/insc-turma-temporada-mes-chamada-atualizada/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $idturma, ENT_COMPAT, 'UTF-8', FALSE ); ?>/09">09</a>&nbsp;&nbsp;&nbsp;
         <a href="/admin/insc-turma-temporada-mes-chamada-atualizada/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $idturma, ENT_COMPAT, 'UTF-8', FALSE ); ?>/10">10</a>&nbsp;&nbsp;&nbsp;
         <a href="/admin/insc-turma-temporada-mes-chamada-atualizada/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $idturma, ENT_COMPAT, 'UTF-8', FALSE ); ?>/11">11</a>&nbsp;&nbsp;&nbsp;
         <a href="/admin/insc-turma-temporada-mes-chamada-atualizada/<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $idturma, ENT_COMPAT, 'UTF-8', FALSE ); ?>/12">12</a>&nbsp;&nbsp;&nbsp;
      </h5>
     
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
        <li class="active"><a style="color: red" href="javascript: history.go(-1)">Voltar</a>
    </li>
      </ol>
    </section>

     <div id='calendar' class="calendar" style="padding: 30px; font-family: Arial, sans-serif;"></div>
     <input type="text" name="idturma" id="idturma" value="<?php echo htmlspecialchars( $idturma, ENT_COMPAT, 'UTF-8', FALSE ); ?>" hidden="true">
     <input type="text" name="idtemporada" id="idtemporada" value="<?php echo htmlspecialchars( $idtemporada, ENT_COMPAT, 'UTF-8', FALSE ); ?>" hidden="true">
     <input type="text" name="primeirodiasemana" id="primeirodiasemana" value="<?php echo htmlspecialchars( $primeirodiasemana, ENT_COMPAT, 'UTF-8', FALSE ); ?>" hidden="true">
     <input type="text" name="segundodiasemana" id="segundodiasemana" value="<?php echo htmlspecialchars( $segundodiasemana, ENT_COMPAT, 'UTF-8', FALSE ); ?>" hidden="true">
     <input type="text" name="terceirodiasemana" id="terceirodiasemana" value="<?php echo htmlspecialchars( $terceirodiasemana, ENT_COMPAT, 'UTF-8', FALSE ); ?>" hidden="true">
     <input type="text" name="quartodiasemana" id="quartodiasemana" value="<?php echo htmlspecialchars( $quartodiasemana, ENT_COMPAT, 'UTF-8', FALSE ); ?>" hidden="true">
     <input type="text" name="quintodiasemana" id="quintodiasemana" value="<?php echo htmlspecialchars( $quintodiasemana, ENT_COMPAT, 'UTF-8', FALSE ); ?>" hidden="true">
     <input type="text" name="unicodiasemana" id="unicodiasemana" value="<?php echo htmlspecialchars( $unicodiasemana, ENT_COMPAT, 'UTF-8', FALSE ); ?>" hidden="true">

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->

    </section>
    <!-- /.content -->
  </div>
 
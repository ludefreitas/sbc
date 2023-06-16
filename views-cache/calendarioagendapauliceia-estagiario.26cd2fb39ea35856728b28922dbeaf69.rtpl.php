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

            let local = document.getElementById('local').value;          


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

             window.location.href=`http://www.cursosesportivos.com.br/estagiario/listaagendapordata/` + local + '/' + info.dateStr;          
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
       <h3>
        Olá Estagiário(a) <?php echo htmlspecialchars( $user["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>!
      </h3>
      <h1>
          Consulta Agenda de Natação Espontânea Crec Pauliceia
      </h1>
     
      <ol class="breadcrumb">
        <li><a href="/prof-estagiario"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

     <div id='calendar' class="calendar" style="padding: 30px; font-family: Arial, sans-serif;"></div>
     <input type="text" name="local" id="local" value="<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>" hidden="true">

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->

    </section>
    <!-- /.content -->
  </div>
 
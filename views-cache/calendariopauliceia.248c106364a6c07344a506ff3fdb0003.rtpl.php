<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>

  <head>
    <meta charset="utf-8" />    

    <link rel="stylesheet" type="text/css" href="/../res/site/css/style.css">
     <link href="/../res/site/js/fullcalendar/main.css" rel="stylesheet" />

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

            if(data == '2022-04-15'){
                  alert('A data escolhida é um feriado, não haverá natação espontânea');                  
                  return;
            }

            if(data == '2022-04-22'){
                  alert('A data escolhida é emenda de feriado, não haverá natação espontânea');             
                  return;
            }

            if(data == '2022-06-17'){
                  alert('A data escolhida é emenda de feriado, não haverá natação espontânea');             
                  return;
            }

            if(data == '2022-12-02'){
                  alert('Na data escolhida não haverá natação espontânea');             
                  return;
            }

            Date.prototype.addDias = function(dias){
              this.setDate(this.getDate() + dias)
            };

            let hojeMaisUmaSemana = new Date();

            hojeMaisUmaSemana.addDias(7);

            function maisUmaSemanaFormatada(){
              let dataMaisUmaSemana = new Date(hojeMaisUmaSemana),
              dia  = dataMaisUmaSemana.getDate().toString().padStart(2, '0'),
              mes  = (dataMaisUmaSemana.getMonth()+1).toString().padStart(2, '0'),
              ano  = dataMaisUmaSemana.getFullYear();
              //return `${dia}/${mes}/${ano}`;
              return `${ano}-${mes}-${dia}`;
            }

            let hojeMaisUmaSemanaFormatada = maisUmaSemanaFormatada();               

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

           if(local == 21 && (strDiaSemana == 0 || strDiaSemana == 2 || strDiaSemana == 4)){

                if(hojeMaisUmaSemanaFormatada <= data){    

                 alert('A agenda para esta data ainda não está aberta!');                  
                  return;

                }

                if(hoje > data){

                  alert('Data escolhida não pode ser anterior ao dia de hoje!');                  
                  return;

                }else{
              
                   window.location.href=`http://www.cursosesportivos.com.br/agenda/` + local + '/' + info.dateStr;
                }           
               
            }else{
                
                alert('A natação espontânea no Paulicéia acontece às segundas, quartas e  sextas-feiras. Escolha uma data nestes dias da semana para agendar sua natação!');
                return;               
             }           

            
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

        // hiddenDays: [0, 1, 2, 3, 4, 6],

          slotMinTime: '07:00:00',

          slotMaxTime: '21:00:00',

        });
        calendar.render();
      });

      
            

    </script>
  </head>
  
    <?php if( $error != '' ){ ?>
    <div class="alert alert-danger">
    <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
    </div>
    <?php } ?>
    
    <div id='calendar' class="calendar"></div>

     <input type="text" name="local" id="local" value="<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>" hidden="true">

    
  

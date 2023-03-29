<?php if(!class_exists('Rain\Tpl')){exit;}?>    <!DOCTYPE html>

      <head>
        <meta charset="utf-8" />    

        <link rel="stylesheet" type="text/css" href="/../res/site/css/style.css">
         <link href="/../res/site/js/fullcalendar/main.css" rel="stylesheet" />

         
        <script src="/../res/site/js/fullcalendar/main.min.js"></script>    
        <script>

            alert('Fique atento! Temos mais horários e mais vagas para a natação espontânea no Baetão e a agenda semanal abrirá sempre aos domingos.')

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

                if(data >= '2022-07-09' && data <= '2022-07-31'){
                      alert('No período de 09/07 e 31/07/2022 não haverá natação espontânea nas nossas piscinas.');             
                      return;
                }

                if(data == '2022-09-28'){
                      alert('Agenda da natação espontânea para este dia está fechada');             
                      return;
                }

                if(data == '2022-09-29'){
                      alert('Agenda da natação espontânea para este dia está fechada');             
                      return;
                }
                

                if(data == '2022-09-30'){
                      alert('Agenda da natação espontânea para este dia está fechada');             
                      return;
                }

                if(data >= '2023-02-17' && data <= '2023-02-22'){
                      alert('No período de 17/02 e 22/02/2023 é carnaval, não haverá natação espontânea nas nossas piscinas.');             
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
                
                if(hojeMaisUmaSemanaFormatada <= data){    

                  alert('A agenda para esta data ainda não está aberta!');                  
                  return;

                }            

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

                let hora = datasemanas.getHours();

                function diaSemanaEmQueFoiEscolhidoFormatado(){
                  let data = new Date(),
                  dia  = (data.getDay());
                  return `${dia}`;
                }
                
                let diaSemanaDaEscolha = diaSemanaEmQueFoiEscolhidoFormatado();

                if(hoje > data){

                    alert('Data escolhida não pode ser anterior ao dia de hoje!');                  
                      return;

                }                  

                if(diaSemanaDaEscolha == 6 && (strDiaSemana == 0 || strDiaSemana == 1 || strDiaSemana == 2 || strDiaSemana == 3 || strDiaSemana == 4) ){

                  alert('A agenda para a natação espontânea no baetão para a semana abrirá sempre aos domingo! ');
                  return;

                }

                if(diaSemanaDaEscolha == 5 && (strDiaSemana == 0 || strDiaSemana == 1 || strDiaSemana == 2 || strDiaSemana == 3) ){

                  alert('A agenda para a natação espontânea no baetão para a semana abrirá sempre aos domingo! ');
                  return;

                }

                if(diaSemanaDaEscolha == 4 && (strDiaSemana == 0 || strDiaSemana == 1 || strDiaSemana == 2) ){

                  alert('A agenda para a natação espontânea no baetão para a semana abrirá sempre aos domingo! ');
                  return;

                }

                if(diaSemanaDaEscolha == 3 && (strDiaSemana == 0 || strDiaSemana == 1) ){

                  alert('A agenda para a natação espontânea no baetão para a semana abrirá sempre aos domingo! ');
                  return;

                }

                if(diaSemanaDaEscolha == 2 && (strDiaSemana == 0) ){

                  alert('A agenda para a natação espontânea no baetão para a semana abrirá sempre aos domingo! ');
                  return;

                }

                
                if( local == 3 && strDiaSemana == 5 && hora >= 12 && diaSemanaDaEscolha == 5 ) {

                  alert('A agenda para este sábado está fechada');
                  return;

                }  
                

                if( local == 3 && diaSemanaDaEscolha == 6 && strDiaSemana == 5 ) {

                  alert('A agenda para este sábado está fechada');
                  return;

                }         

                if(local == 3 && strDiaSemana == 6){

                     alert('Aos domingos não tem natação espontânea no Baetão. A natação espontânea na segunda-feira começará em março. Escolha outros dias da semana para agendar sua natação!');
                    return;                        
                   
                }else{                
                  
                    window.location.href=`http://www.cursosesportivos.com.br/agenda/` + local + '/' + info.dateStr;

                 }    

                 alert('Informamos que a partir de 01/06/2022 o munícipe, interessado em participar da natação espontânea, deverá apresentar, no momento de acessar a piscina, o atestado dermatológico. A não apresentação do atestado impede o munícipe de acessar a piscina ');       
                       /*
                alert('Clicked on: ' + info.dateStr + ' - ' + local);
                alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
                alert('Current view: ' + info.view.type);
                // change the day's background color just for fun
                info.dayEl.style.backgroundColor = 'red';
                */
              
              },

               /*
               events: '/../res/site/js/events.json',
               */

               //events: '/../res/site/js/agenda.json',

              /*
              events: [
                { // this object will be "parsed" into an Event Object
                  title: 'natação', // a property!
                  start: '2022-01-06', // a property!
                  end: '2022-02-07' // a property! ** see important note below about 'end' **
                 }
              ]
              */

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
      </head>
      
                    <?php if( $error != '' ){ ?>
                    <div class="alert alert-danger">
                    <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </div>
                    <?php } ?>
        
        <div id='calendar' class="calendar" style="padding: 30px; font-family: Arial, sans-serif;"></div>

         <input type="text" name="local" id="local" value="<?php echo htmlspecialchars( $idlocal, ENT_COMPAT, 'UTF-8', FALSE ); ?>" hidden="true">
         

        
      

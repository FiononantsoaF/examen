<!DOCTYPE html>
<html>
<head>
  <!-- <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css' rel='stylesheet' /> -->
  <script src='../assets/js/index.global.min.js'></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');

      function convertDecimalTimeTo24H(time) {
        var hours = Math.floor(time);
        var minutes = Math.round((time - hours) * 60);
        return String(hours).padStart(2, '0') + ':' + String(minutes).padStart(2, '0') + ':00';
      }
      
      fetch('data.php')
        .then(response => response.json())
        .then(data => {
          var events = data.map(item => {
            return {
              title: item.event , // Vous pouvez personnaliser le titre
              start: item.jour + 'T' + convertDecimalTimeTo24H(item.heure)
            };
          });

          var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
              left: 'prevYear,prev,next,nextYear today',
              center: 'title',
              right: 'dayGridMonth,dayGridWeek,dayGridDay'
            },
            initialDate: '2024-07-01',
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: events
          });

          calendar.render();
        });
    });
  </script>
  <style>
    #calendar {
      max-width: 1100px;
      margin: 0 auto;
    }
  </style>
</head>
<body>
  <div class="contenu">
    <h3>Calendrier de Réparation</h3>
    <hr>
    <div id='calendar'></div>
  </div>
</body>
</html>

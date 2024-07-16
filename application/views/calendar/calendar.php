<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calendrier de Reparation</title>
    <script src="<?php echo base_url('assets/js/index.global.min.js'); ?>"></script>
</head>
<body>
    <div class="contenu">
        <h3>Calendrier de Reparation</h3>
        <hr>
        <div id='calendar'></div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prevYear,prev,next,nextYear today',
                    center: 'title',
                    right: 'dayGridMonth,dayGridWeek,dayGridDay'
                },
                initialDate: '2024-04-12',
                navLinks: true, 
                editable: true,
                dayMaxEvents: true,
                events: {
                    url: '<?php echo base_url('Rendezvous_Controller/get_all'); ?>',
                    method: 'POST',
                    extraParams: {
                    },
                    failure: function() {
                        alert('Erreur lors du chargement des événements');
                    },
                    color: 'yellow',
                    textColor: 'black'
                }
            });

            calendar.render();
        });
    </script>
</body>
</html>

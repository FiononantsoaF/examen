<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calendrier de Réparation</title>
    <script src='<?php echo base_url("assets/js/index.global.min.js"); ?>'></script>
</head>
<body>
    <div class="contenu">
        <h3>Calendrier de Réparation</h3>
        <hr>
        <div id='calendar'></div>
    </div>
    <script>
        function convertDecimalTimeTo24H(time) {
            var hours = Math.floor(time);
            var minutes = Math.round((time - hours) * 60);
            return String(hours).padStart(2, '0') + ':' + String(minutes).padStart(2, '0') + ':00';
        }

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            fetch('<?php echo site_url('Rendezvous_Controller/get_all'); ?>')
                .then(response => response.json())
                .then(data => {
                    var events = data.map(item => {
                        return {
                            title: item.client_matricule + ":" + item.service_nom,
                            start: item.date_debut,
                            end: item.date_fin 
                        };
                    });

                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        headerToolbar: {
                            left: 'prevYear,prev,next,nextYear today',
                            center: 'title',
                            right: 'dayGridMonth,dayGridWeek,dayGridDay'
                        },
                        initialDate: '2024-07-01',
                        navLinks: true,
                        editable: true,
                        dayMaxEvents: true,
                        events: events
                    });

                    calendar.render();
                })
                .catch(error => {
                    console.error('Erreur lors du chargement des événements:', error);
                    alert('Erreur lors du chargement des événements');
                });
        });
    </script>
    <style>
        #calendar {
            max-width: 1100px;
            margin: 0 auto;
        }
    </style>
</body>
</html>

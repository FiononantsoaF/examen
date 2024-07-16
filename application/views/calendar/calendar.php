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

    <div id="modalForm" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form id="repairForm">
                <h3>Formulaire de Service</h3>
                <label for="date_debut">Date Début:</label>
                <input type="text" id="date_debut" name="date_debut" readonly><br><br>

                <label for="matricule">Matricule Voiture:</label>
                <input type="text" id="matricule" name="matricule"><br><br>

                <label for="service">Service:</label>
                <input type="text" id="service" name="service"><br><br>

                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom"><br><br>

                <button type="button" onclick="submitForm()">Soumettre</button>
            </form>
        </div>
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
                        events: events,
                        dateClick: function(info) {
                            document.getElementById('date_debut').value = info.dateStr;
                            document.getElementById('modalForm').style.display = "block";
                        }
                    });

                    calendar.render();
                })
                .catch(error => {
                    console.error('Erreur lors du chargement des événements:', error);
                    alert('Erreur lors du chargement des événements');
                });
        });

        function submitForm() {
            var form = document.getElementById('repairForm');
            var formData = new FormData(form);
            fetch('<?php echo site_url('Rendezvous_Controller/save_form'); ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert('Formulaire soumis avec succès');
                document.getElementById('modalForm').style.display = "none";
                location.reload();
            })
            .catch(error => {
                console.error('Erreur lors de la soumission du formulaire:', error);
                alert('Erreur lors de la soumission du formulaire');
            });
        }

        var modal = document.getElementById('modalForm');
        var span = document.getElementsByClassName("close")[0];
        span.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <style>
        #calendar {
            max-width: 1100px;
            margin: 0 auto;
        }
        /* Style du modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</body>
</html>

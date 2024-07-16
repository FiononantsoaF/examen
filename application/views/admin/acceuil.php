<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body>
    <div class="entete">
        <ul class="content_link">
            <li role="presentation"><a href="#">Service</a></li>
            <li role="presentation"><a href="<?php  echo site_url("Rendezvous_Controller/calendar") ;?>">Calendrier</a></li>
            <li role="presentation"><a href="#">Devis</a></li>
            <li role="presentation"><a href="#"></a></li>
            <li role="presentation"><a href="<?php  echo site_url("Admin_Controller/dashboard") ;?>">Dashboard</a></li>
        </ul>
    </div>
<script src="<?php echo base_url('assets/js/index.global.min.js'); ?>"></script>
<script src='https://cdn.jsdelivr.net/npm/chart.js'></script>
  <script>
      document.addEventListener('DOMContentLoaded', function() {
          var diagrammeEl = document.getElementById('diagramme');
          var totalPaye = <?php echo isset($total[0]['total_paye']) ? json_encode($total[0]['total_paye']) : 'null'; ?>;
        var totalNonPaye = <?php echo isset($total[0]['total_non_paye']) ? json_encode($total[0]['total_non_paye']) : 'null'; ?>;

        console.log('Total Payé:', totalPaye);
        console.log('Total Non Payé:', totalNonPaye);
          var ctx = diagrammeEl.getContext('2d');
          var myChart = new Chart(ctx, {
              type: 'pie',
              data: {
                  labels: ['Paye', 'Non Paye'],
                  datasets: [{
                      label: '',
                      data: [totalPaye, totalNonPaye],
                      backgroundColor: [
                          'rgba(52,52,52 , 0.2)',
                          'rgba(175, 175, 175, 0.2)',
                      ],
                      borderColor: [
                          'rgba(52,52,52,1)',
                          'rgba(175, 175, 175, 1)',
                      ],
                      borderWidth: 0.5
                  }]
              },
              options: {
                  responsive: true,
                  plugins: {
                      legend: {
                          position: 'top',
                      },
                      title: {
                          display: true,
                          text: 'Diagramme Circulaire'
                      }
                  }
              }
          });
      });
  </script>
  <style>
      #diagramme {
          max-width: 600px;
          margin: 20px auto;
      }
  </style>
  </head>
  <div class="contenu">
    <?php $total = 0; ?>
    <p>Chiffre d'affaire par Type :</p>

    <?php if (!empty($chiffres)): ?>
        <?php foreach ($chiffres as $chiffre): ?>
            <a href="#">
                <div class="contenu" style="width: 250px; margin-top: 0px;margin-right: 0px;">
                    <h3>
                        <?php echo htmlspecialchars($chiffre['voiture_nom']); ?> : 
                        <?php $total += $chiffre['total_service_prix']; ?>
                        <?php echo number_format($chiffre['total_service_prix'], 0, ',', ' '); ?> Ar
                    </h3>
                </div>
            </a>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucun chiffre d'affaire disponible.</p>
    <?php endif; ?>
</div>
<div class="contenu">
      <h3>Page d'Acceuil</h3>
      <table class="table">
          <tr>
              <td border="solid 1px grey">
                  <h1><?php echo number_format($total, 0, ',', ' '); ?></h1>
                  <p>De chiffre d'affaire</p>
              </td>
              <td>
                  <div id='calendar'>
                      <canvas id='diagramme'></canvas>
                  </div>
              </td>
          </tr>
      </table>
  </div>

  <div class="contenu_fill">
    <h3>Nombre de voiture Traite par jour</h3>
    <table class="table table-striped">
        <tr>
            <th>Jours</th>
            <th>4</th>
            <th></th>
        </tr>
        <tr>
            <td>--</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>--</td>
            <td></td>
            <td></td>
        </tr>
    </table>
  </div>
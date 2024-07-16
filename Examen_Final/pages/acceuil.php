  <script src='../assets/js/index.global.min.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
      document.addEventListener('DOMContentLoaded', function() {
          var diagrammeEl = document.getElementById('diagramme');


          // Affichage du diagramme circulaire
          var ctx = diagrammeEl.getContext('2d');
          var myChart = new Chart(ctx, {
              type: 'pie',
              data: {
                  labels: ['Paye', 'Non Paye'],
                  datasets: [{
                      label: '# of Votes',
                      data: [12, 19],
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
      <h3>Page d'Acceuil</h3>
      <table class="table">
          <tr>
              <td border="solid 1px grey">
                  <h1>10 000 000 Ar</h1>
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
  <div class="contenu">
      <p>Chiffre d'affaire par Type : </p>

      <a href="#">
          <div class="contenu" style="width: 250px; margin-top: 0px;margin-right: 0px;">
              <h3>4x4 : 300 000 Ar</h3>
          </div>
      </a>
      <a href="#">
          <div class="contenu" style="width: 250px; margin-top: 0px;margin-right: 0px;">
              <h3>4x4 : 300 000 Ar</h3>
          </div>
      </a>
      <a href="#">
          <div class="contenu" style="width: 250px; margin-top: 0px;margin-right: 0px;">
              <h3>4x4 : 300 000 Ar</h3>
          </div>
      </a>
      <a href="#">
          <div class="contenu" style="width: 250px; margin-top: 0px;margin-right: 0px;">
              <h3>4x4 : 300 000 Ar</h3>
          </div>
      </a>
      <a href="#">
          <div class="contenu" style="width: 250px; margin-top: 0px;margin-right: 0px;">
              <h3>4x4 : 300 000 Ar</h3>
          </div>
      </a>
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
document.addEventListener('DOMContentLoaded', function() {
    // Fonction pour charger une page
    function loadPage(page) {
        fetch(`${page}.html`)
            .then(response => response.text())
            .then(html => {
                document.getElementById('content').innerHTML = html;
            })
            .catch(error => {
                console.error('Erreur de chargement:', error);
                document.getElementById('content').innerHTML = '<p>Erreur de chargement du contenu.</p>';
            });
    }

    // Ajouter des écouteurs d'événements aux liens
    document.querySelectorAll('nav a').forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const page = this.getAttribute('data-page');
            loadPage(page);
        });
    });

    // Charger la page d'accueil par défaut
    loadPage('welcome');
});



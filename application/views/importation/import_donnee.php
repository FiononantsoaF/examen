<div class="contenu">
    <h3>Importation des Donnees</h3>
    <form action="<?php echo site_url("Csv_Controller/get_content")?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <p>Service</p>
            <input type="file" name="service" id="" class="input" placeholder="Importer le fichier">
        </div>
        <div class="form-group">
            <p>Travaux</p>
            <input type="file" name="travaux" id="" class="input" placeholder="Importer le fichier">
        </div>
        <div class="form-group">
            <input type="submit" name="" id="" value="Visualiser" class="bouton_2">
        </div>
    </form>
</div>
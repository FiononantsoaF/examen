<div class="contenu">
    <h3>Modification du service : <?php echo $service['nom']; ?></h3>
    <form id="update-service-form" data-id="<?php echo $service['id']; ?>">
        <div class="form-group">
            <p>Type</p>
            <input type="text" class="input" name="nom" value="<?php echo $service['nom']; ?>">
        </div>
        <div class="form-group">
            <p>Durée (h)</p>
            <input type="time" class="input" name="duree" value="<?php echo $service['duree']; ?>">
        </div>
        <div class="form-group">
            <p>Prix (Ar)</p>
            <input type="number" class="input" name="prix" value="<?php echo $service['prix']; ?>">
        </div>
        <input type="submit" value="Modifier" class="bouton_2">
    </form>
</div>

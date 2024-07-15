<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <script src="<?php echo base_url('assets/js/boostrap.js'); ?>"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">

                <div class="form_login">
                    <div class="left">
                    <?php echo form_open('Client_Controller/enregistrer'); ?>
                            <h3>Se Connecter</h3>
                            <div class="form-group">
                                <p>Matricule</p>
                                <p><input type="text" class="input" name="matricule" placeholder="Entrez votre numero Matricule" required></p>
                            </div>
                            <div class="form-group">
                                <p>Type de vehicule</p>
                                <select name="type_car" id="type_car" class="form-control">
                                    <?php foreach ($vehicule_types as $type): ?>
                                        <option value="<?php echo (int)$type['id']; ?>"><?php echo ucfirst($type['nom']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="bouton_1">Se connecter</button>
                            <a href="<?php echo site_url('Admin_Controller/index'); ?>" class="lien">En tant qu'employe</a>

                        <?php echo form_close(); ?>
                    </div>
                    <div class="right">
                        <center>
                            <h1 class="white">Bienvenue</h1>
                            <p class="white">Dans notre Garage</p>
                        </center>
                    </div>

                </div>
                <div class="col-md-1">
                </div>
            </div>
            <?php if(!empty($error)) {
                echo $error;
            }  ?>

</html>
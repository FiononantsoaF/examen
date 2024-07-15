<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">

                <div class="form_login">
                    <div class="left">
                    <?php echo form_open('Admin_Controller/authentification'); ?>
                            <h3>Se Connecter</h3>
                            <div class="form-group">
                                <p>Nom</p>
                                <p><input type="text" class="input" name="nom" placeholder="Entrez votre Nom" required></p>
                            </div>
                            <div class="form-group">
                                <p>Mot de passe </p>
                                <input type="password" class="input"  name="mdp" placeholder="Votre mot de passe">
                            </div>
                            <button type="submit" class="bouton_1">Se connecter</button>

                    <?php echo form_close(); ?>
                    </div>
                    <div class="right">
                        <center>
                            <h1 class="white">Bienvenue</h1>
                            <p class="white">Page des Employes</p>
                        </center>
                    </div>

                </div>
                <div class="col-md-1">
                </div>
            </div>

</body>

</html>
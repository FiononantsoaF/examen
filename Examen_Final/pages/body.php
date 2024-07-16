<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/hafa.css">
    <link rel="shortcut icon" href="../assets/img/Logo.jpg" type="image/x-icon">
</head>

<body>
    <div class="entete">
        <ul class="content_link">
            <li role="presentation"><a href="#">Prise de rendez-vous</a></li>
            <li role="presentation"><a href="#">Disabled link</a></li>
            <li role="presentation"><a href="#">Disabled link</a></li>
        </ul>
    </div>


        <?php 
            include 'liste_devis.php';
        ?>
    

</body>

<footer>
    <div class="all_foot">
        <p class="white">
            Fy
        </p>
        <a href="#">Se deconnecter</a>
    </div>
</footer>

</html>
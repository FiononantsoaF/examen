<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/hafa.css">
    <link rel="shortcut icon" href="../assets/img/Logo.jpg" type="image/x-icon">
    <script src="../assets/js/index.global.min.js"></script>
</head>

<body>
    <div class="entete">
        <ul class="content_link">
            <li role="presentation"><a href="#">Lien hafa</a></li>
            <li role="presentation"><a href="#">Calendrier de Reparation</a></li>
            <li role="presentation"><a href="#">Historique</a></li>
        </ul>
        <div class="reinitialise_div">
            <table>
                <tr>
                    <td>
                        <a href="#" >
                            <input type="submit" value="Importer" class="bouton_safe">
                        </a>
                    </td>
                    <td>
                        <a href="#" >
                            <input type="submit" value="Reinitialiser" class="bouton_rouge">
                        </a>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="every_thing">
	
        <?php
        include 'acceuil.php';
        ?>


    </div>

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
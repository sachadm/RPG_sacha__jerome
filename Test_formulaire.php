<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST form</title>
    <link rel="stylesheet" href="style.css">
    <script defer src="script.js"></script>
</head>

<body>

    <div class="container">
        <div class="crea_perso">
            <form action="page_de_traitement.php" method="post" enctype="multipart/form-data">
                <div class="choix_portrait">
                    <label for="choisirImage">Choisir une image :</label>
                    <input type="file" id="choisirImage" name="image">
                </div>
                <input type="submit" value="Soumettre">
            </form>
        </div>
    </div>
    
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>creation de personnage</title>
    <link rel="stylesheet" href="style_crea_perso.css">
    <script defer src="scriptincrement.js"></script>
</head>

<body>
    <div class="container">
        <div class="crea_perso">
            <form action="page_de_traitement.php" method="post" enctype="multipart/form-data" class="formulaire_crea">
            <div class="input_name">
                <label for="nom">Entrez votre nom :</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div class="choix_portrait">
                <label for="choisirImage">Choisir une image :</label>
                <input type="file" id="choisirImage" name="image">
            </div>
            <!-- point à attribuer -->
            <div class="Point_count">
                <div>Points : </div>
                <div class="remaining_point">30</div>
            </div>
            <!-- Fin point à attribuer -->
            <!-- Statistique du personnage -->
            <div class="PV line">
                <div class="info_stat_crea"><strong class="stat_name_crea">PV</strong> : Ceci représente votre maximum de point de vie</div>
                <div class=incr>
                    <button onclick="increment('countingPV')" type="button" class="btn_stat">+</button>
                    <h2 id="countingPV">1</h2>
                    <input type="hidden" name="countingPV" value="1">
                    <button onclick="decrement('countingPV')"type="button" class="btn_stat">-</button>
                </div>
            </div>
            <div class="Mana line">
                <div class="info_stat_crea"><strong class="stat_name_crea">Mana</strong> : Ceci représente votre puissance magique</div>
                <div class=incr>
                    <button onclick="increment('countingMana')"type="button" class="btn_stat">+</button>
                    <h2 id="countingMana">1</h2>
                    <input type="hidden" name="countingMana" value="1">
                    <button onclick="decrement('countingMana')"type="button" class="btn_stat">-</button>
                </div>
            </div>
            <div class="ATK line">
                <div class="info_stat_crea"><strong class="stat_name_crea">ATK</strong> : Ceci représente la force de vos attaques physique</div>
                <div class=incr>
                    <button onclick="increment('countingATK')"type="button" class="btn_stat">+</button>
                    <h2 id="countingATK">1</h2>
                    <input type="hidden" name="countingATK" value="1">
                    <button onclick="decrement('countingATK')"type="button" class="btn_stat">-</button>
                </div>
            </div>
            <div class="Init line">
                <div class="info_stat_crea"><strong class="stat_name_crea">Initiative</strong> : Désigne la vitesse de réaction des personnages dans un moment d'action </div>
                <div class=incr>
                    <button onclick="increment('countingInit')"type="button" class="btn_stat">+</button>
                    <h2 id="countingInit">1</h2>
                    <input type="hidden" name="countingInit" value="1">
                    <button onclick="decrement('countingInit')"type="button" class="btn_stat">-</button>
                </div>
            </div>
            <div class="DEF line">
                <div class="info_stat_crea"><strong class="stat_name_crea">Défense</strong> : Ceci représente votre capacité a vous défendre</div>
                <div class=incr>
                    <button onclick="increment('countingDEF')"type="button" class="btn_stat">+</button>
                    <h2 id="countingDEF">1</h2>
                    <input type="hidden" name="countingDEF" value="1">
                    <button onclick="decrement('countingDEF')"type="button" class="btn_stat">-</button>
                </div>
            </div>
            <!-- Fin statistique du personnage -->
            <button type="submit" class="create_cara_btn">créer</button>
            </form>
        </div>
    </div>
</body>

</html>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles_JDR.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=albert-sans:300|carter-one:400|delicious-handrawn:400" rel="stylesheet" />
    <script defer src="./script_JDR.js"></script>
    <title>Dungeon Wyrmwood</title>
</head>
<body>
    <div class="game-container">
<!-- ///////////////////// Zone LEFT CARD ////////////////// -->
        <div class="leftCardZone">
        <div class="playerSlotCard1">
        <div class="top_card_zone"></div>
        <div class="card">
            <div class="icons">
                <div class="icon_attack"></div>
                <div class="icon_defense"></div>
            </div>
            <div class="icons">
                <div class="icon_armor"></div>
                <div class="icon_mana"></div>
            </div>
            <div class="labels">
                <div class="label_attack"></div>
                <div class="label_defense"></div>
            </div>
            <div class="labels">
                <div class="label_armor"></div>
                <div class="label_mana"></div>
            </div>
            <div class="picture"></div>
            <div class="scroll_name"><h3 class="name"></h3></div>
            <span class="HP_zone">❤️</span>
            <div class="lvl_zone">
                <p class="card_lvl"><span class="star"></span></p>
                <p class="card_init"></p>
            </div>
            <div class="equipement">
                <div class="equipement_buttons">
                    <button id="btnEquipement" class="equipped_items">Équipement</button>
                    <button id="btnInventaire" class="inventory">Inventaire</button>
                </div>
                <div id="equipementText" class="equipement_text_player">
                    <span class="attack_equipement">Sabre du prince Ito : 5</span>
                    <span class="defense_equipement">Dague de parade crantée : 4</span>
                    <span class="Armor_equipement">Tunique du vent de l'ouest : 2</span>
                </div>
                <div id="inventoryZone" class="inventory_zone_player">
                    <!-- Contenu de l'inventaire ici -->
                    <div class="potion_line"><span class="potion"></span>Potions de soin x 2</div>
                    <!-- <p>Objet 2</p> -->
                    <!-- <p>Objet 3</p> -->
                </div>
            </div>
            <div class="bottom_card_zone">
                <span class="XP_zone"></span>
                <span class="PO_zone"></span>
            </div>
        </div>
    </div>
        </div>
<!-- ///////////////////// Zone WINDOW ////////////////// -->
        <div class="gameWindow">
            <div class="illustrationWindow"></div>
            <div class="messageWindow"></div>
            <div class="buttons_zone">
                <button class="red_button">
                    <div class="image-wrapper-red"></div>
                    <span class="btn">Attaque</span>
                </button>
                <button class="blue_button">
                    <div class="image-wrapper-blue"></div>
                    <span class="btn">Sortilège</span>
                </button>
                <button class="gray_button">
                    <div class="image-wrapper-gray"></div>
                    <span class="btn">s'enfuir</span>
                </button>
            </div>
        </div>
<!-- ///////////////////// Zone RIGHT CARD ////////////////// -->
        <div class="rightCardZone">
        <div class="enemySlotCard">
        <div class="top_card_enemy"></div>
        <div class="card">
            <div class="icons">
                <div class="icon_attack"></div>
                <div class="icon_defense"></div>
            </div>
            <div class="icons">
                <div class="icon_armor"></div>
                <div class="icon_mana"></div>
            </div>
            <div class="labels">
                <div class="label_attack">8</div>
                <div class="label_defense">5</div>
            </div>
            <div class="labels">
                <div class="label_armor">2</div>
                <div class="label_mana">2</div>
            </div>
            <div class="picture_enemy"></div>
            <div class="scroll_name_enemy"><h3 class="name">John Warden</h3></div>
            <span class="HP_zone">❤️11/11PV</span>
            <div class="lvl_zone">
                <p class="card_lvl">Niveau : 1</p>
                <p class="card_init">Initiative : 5</p>
            </div>
            <div class="equipement">
                <div class="equipement_buttons">
                    <button id="btnEquipementEnemy" class="equipped_items">Équipement</button>
                    <button id="btnInventaireEnemy" class="inventory">Inventaire</button>
                </div>
                <div id="equipementTextEnemy" class="equipement_text_enemy">
                    <span class="attack_equipement">Hache lourde : 6</span>
                    <span class="defense_equipement">Bouclier fendu : 3</span>
                    <span class="Armor_equipement">Armure de l'ours gris : 2</span>
                </div>
                <div id="inventoryZoneEnemy" class="inventory_zone_enemy">
                    <!-- Contenu de l'inventaire ennemi ici -->
                    <span>Objet 1</span>
                    <span>Objet 2</span>
                    <span>Objet 3</span>
                </div>
            </div>
            <div class="bottom_card_enemy">
                <span class="XP_zone">0/50 XP</span>
                <span class="PO_zone">20 po</span>
            </div>
        </div>
    </div>
        </div>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles_JDR.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=albert-sans:300|carter-one:400|delicious-handrawn:400" rel="stylesheet" />
    <script src="./script.js"></script>
    <title>Dungeon breaker</title>
</head>
<body>
    <div class="game-container">
        <div class="leftCardZone">
            <div class="playerSlotCard1">
                <div class="top_card_zone">
                </div>
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
                        <div class="label_attack">7</div>
                        <div class="label_defense">7</div>
                    </div>
                    <div class="labels">
                        <div class="label_armor">2</div>
                        <div class="label_mana">2</div>
                    </div>
                    <div class="picture"></div>
                    <div class="scroll_name"><h3 class="name">Ling Yao</h3></div>
                    <span class="HP_zone">❤️9/9PV</span>
                    <div class="lvl_zone">
                        <p class="card_text">Niveau : 1</p>
                        <p class="card_text">Initiative : 6</p>
                    </div>
                    <div class="equipement">
                        <span class="attack_equipement">Sabre du prince Ito : 5</span>
                        <span class="defense_equipement">Dague de parade crantée : 4</span>
                        <span class="Armor_equipement">Tunique du vent de l'ouest : 2</span>
                    </div>
                    <div class="bottom_card_zone">
                        <span class="XP_zone">0/50 XP</span>
                        <span class="PO_zone">20 po</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="gameWindow">
            <div class="illustrationWindow"></div>
            <div class="separator"></div>
            <div class="messageWindow"></div>
            <div class="buttons_zone">
                <button class="button_left">
                    <span class="btn_attack"></span>
                    <span>Attaque</span>
                </button>
                <button class="button_middle">
                    <div class="btn_sort"></div>
                    <span>Sortilège</span>
                </button>
                <button class="button_right">
                    <div class="btn_escape"></div>
                    <span>s'enfuir</span>
                </button>
            </div>
        </div>
        <div class="rightCardZone">
            <div class="enemySlotCard1">
                <div class="card"></div>
            </div>
        </div>
    </div>
</body>
</html>
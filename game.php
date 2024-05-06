<?php
session_start();
require_once ('connection.php');

// Vérifier si l'utilisateur est connecté, sinon le rediriger vers la page de connexion
if (!isset($_SESSION['idusers'])) {
    header("Location: login.php");
    exit;
}

// Récupérer les informations de l'utilisateur à partir de la session (optionnel)
// Vous pouvez utiliser ces informations pour personnaliser l'affichage de la page d'accueil
$idusers = $_SESSION['idusers'];

// Exemple : récupérer le nom de l'utilisateur à partir de la base de données
$statement = $pdo->prepare("SELECT username FROM users WHERE idusers = :idusers");
$statement->execute(['idusers' => $idusers]);
$user = $statement->fetch(PDO::FETCH_ASSOC);

$user_name = $user['username'];
echo $idusers;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./IMAGES/epees.png">
    <link rel="stylesheet" href="./styles_board_game.css">
    <link rel="stylesheet" href="./modal.css">
    <script defer src="./script_card_buttons.js"></script>
    <script defer src="./script_modal.js"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=bigelow-rules:400|chelsea-market:400|finger-paint:400|new-rocker:400"
        rel="stylesheet" />
    <link rel="stylesheet" href="style_crea_perso.css">
    <script defer src="scriptincrement.js"></script>
    <title>Evermist Dungeons</title>
</head>

<body>
    <span class="welcome">
        <p>Bienvenue sur Evermist Dungeons, <?php echo $user_name; ?></span> !</p>
    <p><a href="#">Nouveau personnage</a></p>
    <p><a href="#">Choix du personnage</a></p>
    <p><a href="logout.php">Se déconnecter</a></p>
    <p><a href="delete_account.php">Supprimer mon compte</a></p>
    </span>
    <div class="game_board">
        <div class="card_zone">
            <div class="card_player">
                <div class="top_card_zone"></div>
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
                <div class="scroll_name">
                    <h3 class="name"></h3>
                </div>
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
        <div class="container">
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
        <div class="events-zone">
            <div class="top-event-card">

            </div>
            <div class="bottom-event-card">

            </div>
        </div>
    </div>
    <div id="modal" class="modal">
        <div class="modal-content">
            <div class="creacharac">
                <div class="crea_perso">
                    <form action="create_push_newcharacter.php" method="post" enctype="multipart/form-data"
                        class="formulaire_crea">
                        <div class="input_name">
                            <label for="nom">Entrez votre nom :</label>
                            <input type="text" id="nom" name="nom" required autocomplete="off">
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
                            <div class="info_stat_crea"><strong class="stat_name_crea">PV</strong> : Ceci représente
                                votre maximum de point de vie</div>
                            <div class=incr>
                                <button onclick="increment('countingPV')" type="button" class="btn_stat">+</button>
                                <h2 id="countingPV">1</h2>
                                <input type="hidden" name="countingPV" value="1">
                                <button onclick="decrement('countingPV')" type="button" class="btn_stat">-</button>
                            </div>
                        </div>
                        <div class="Mana line">
                            <div class="info_stat_crea"><strong class="stat_name_crea">Mana</strong> : Ceci représente
                                votre puissance magique</div>
                            <div class=incr>
                                <button onclick="increment('countingMana')" type="button" class="btn_stat">+</button>
                                <h2 id="countingMana">1</h2>
                                <input type="hidden" name="countingMana" value="1">
                                <button onclick="decrement('countingMana')" type="button" class="btn_stat">-</button>
                            </div>
                        </div>
                        <div class="ATK line">
                            <div class="info_stat_crea"><strong class="stat_name_crea">ATK</strong> : Ceci représente la
                                force de vos attaques physique</div>
                            <div class=incr>
                                <button onclick="increment('countingATK')" type="button" class="btn_stat">+</button>
                                <h2 id="countingATK">1</h2>
                                <input type="hidden" name="countingATK" value="1">
                                <button onclick="decrement('countingATK')" type="button" class="btn_stat">-</button>
                            </div>
                        </div>
                        <div class="Init line">
                            <div class="info_stat_crea"><strong class="stat_name_crea">Initiative</strong> : Désigne la
                                vitesse de réaction des personnages dans un moment d'action </div>
                            <div class=incr>
                                <button onclick="increment('countingInit')" type="button" class="btn_stat">+</button>
                                <h2 id="countingInit">1</h2>
                                <input type="hidden" name="countingInit" value="1">
                                <button onclick="decrement('countingInit')" type="button" class="btn_stat">-</button>
                            </div>
                        </div>
                        <div class="DEF line">
                            <div class="info_stat_crea"><strong class="stat_name_crea">Défense</strong> : Ceci
                                représente votre capacité a vous défendre</div>
                            <div class=incr>
                                <button onclick="increment('countingDEF')" type="button" class="btn_stat">+</button>
                                <h2 id="countingDEF">1</h2>
                                <input type="hidden" name="countingDEF" value="1">
                                <button onclick="decrement('countingDEF')" type="button" class="btn_stat">-</button>
                            </div>
                        </div>
                        <!-- Fin statistique du personnage -->
                        <button type="submit" class="create_cara_btn">créer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
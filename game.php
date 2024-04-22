<?php
session_start();
require_once ('connection.php');

// Vérifier si l'utilisateur est connecté, sinon le rediriger vers la page de connexion
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Récupérer les informations de l'utilisateur à partir de la session (optionnel)
// Vous pouvez utiliser ces informations pour personnaliser l'affichage de la page d'accueil
$user_id = $_SESSION['user_id'];

// Exemple : récupérer le nom de l'utilisateur à partir de la base de données
$statement = $pdo->prepare("SELECT user_name FROM users WHERE id = :user_id");
$statement->execute(['user_id' => $user_id]);
$user = $statement->fetch(PDO::FETCH_ASSOC);
$user_name = $user['user_name'];
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
    <title>Evermist Dungeons</title>
</head>

<body>
    <span class="welcome">
        <p>Bienvenue sur Evermist Dungeons, <?php echo $user_name; ?>
    </span> !</p>
    <div class="nav">
        <p><a href="#">Nouveau personnage</a></p>
        <p><a href="#">Choix du personnage</a></p>
        <p><a href="logout.php">Se déconnecter</a></p>
        <p><a href="delete_account.php">Supprimer mon compte</a></p>
    </div>
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
            <!-- Contenu de votre modale ici -->
        </div>
    </div>
</body>

</html>
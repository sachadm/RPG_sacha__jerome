-- -----------------------------------------------------
-- Table `users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `user_name_UNIQUE` (`user_name` ASC) VISIBLE,
  UNIQUE INDEX `password_UNIQUE` (`password` ASC) VISIBLE)

-- -----------------------------------------------------
-- Table `characters`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `characters` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `character_name` VARCHAR(45) NOT NULL,
  `character_portrait` VARCHAR(45) NOT NULL,
  `attack` INT UNSIGNED NOT NULL,
  `defense` INT UNSIGNED NOT NULL,
  `initiative` INT UNSIGNED NOT NULL,
  `hp` INT UNSIGNED NOT NULL,
  `hp_max` INT UNSIGNED NOT NULL,
  `experience` INT UNSIGNED NOT NULL,
  `gold` INT UNSIGNED NOT NULL,
  `pm` INT UNSIGNED NOT NULL,
  `pm_max` INT UNSIGNED NOT NULL,
  `level` INT UNSIGNED NOT NULL,
  `XP` INT UNSIGNED NOT NULL,
  `users_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`, `users_id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `character_name_UNIQUE` (`character_name` ASC) VISIBLE,
  INDEX `fk_characters_users_idx` (`users_id` ASC) VISIBLE,
  CONSTRAINT `fk_characters_users`
    FOREIGN KEY (`users_id`)
    REFERENCES `users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)

-- -----------------------------------------------------
-- Table `equipement`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `equipement` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `equipement_name` VARCHAR(45) NOT NULL,
  `attack` INT UNSIGNED NOT NULL,
  `defense` INT UNSIGNED NOT NULL,
  `value` INT UNSIGNED NOT NULL,
  `type` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `equipement_name_UNIQUE` (`equipement_name` ASC) VISIBLE)

-- -----------------------------------------------------
-- Table `merchant`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `merchant` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `merchant_name` VARCHAR(45) NOT NULL,
  `gold` INT UNSIGNED NOT NULL,
  `inventory` VARCHAR(45) NOT NULL,
  `stock` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `merchant_name_UNIQUE` (`merchant_name` ASC) VISIBLE)

-- -----------------------------------------------------
-- Table `items`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `items` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_name` VARCHAR(45) NOT NULL,
  `power` INT UNSIGNED NOT NULL,
  `value` INT UNSIGNED NOT NULL,
  `type` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `item_name_UNIQUE` (`item_name` ASC) VISIBLE)

-- -----------------------------------------------------
-- Table `merchant_has_items`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `merchant_has_items` (
  `merchant_id` INT UNSIGNED NOT NULL,
  `items_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`merchant_id`, `items_id`),
  INDEX `fk_merchant_has_items_items1_idx` (`items_id` ASC) VISIBLE,
  INDEX `fk_merchant_has_items_merchant1_idx` (`merchant_id` ASC) VISIBLE,
  CONSTRAINT `fk_merchant_has_items_merchant1`
    FOREIGN KEY (`merchant_id`)
    REFERENCES `merchant` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_merchant_has_items_items1`
    FOREIGN KEY (`items_id`)
    REFERENCES `items` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)

-- -----------------------------------------------------
-- Table `merchant_has_equipement`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `merchant_has_equipement` (
  `merchant_id` INT UNSIGNED NOT NULL,
  `equipement_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`merchant_id`, `equipement_id`),
  INDEX `fk_merchant_has_equipement_equipement1_idx` (`equipement_id` ASC) VISIBLE,
  INDEX `fk_merchant_has_equipement_merchant1_idx` (`merchant_id` ASC) VISIBLE,
  CONSTRAINT `fk_merchant_has_equipement_merchant1`
    FOREIGN KEY (`merchant_id`)
    REFERENCES `merchant` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_merchant_has_equipement_equipement1`
    FOREIGN KEY (`equipement_id`)
    REFERENCES `equipement` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)

-- -----------------------------------------------------
-- Table `characters_has_items`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `characters_has_items` (
  `characters_id` INT NOT NULL,
  `characters_users_id` INT UNSIGNED NOT NULL,
  `items_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`characters_id`, `characters_users_id`, `items_id`),
  INDEX `fk_characters_has_items_items1_idx` (`items_id` ASC) VISIBLE,
  INDEX `fk_characters_has_items_characters1_idx` (`characters_id` ASC, `characters_users_id` ASC) VISIBLE,
  CONSTRAINT `fk_characters_has_items_characters1`
    FOREIGN KEY (`characters_id` , `characters_users_id`)
    REFERENCES `characters` (`id` , `users_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_characters_has_items_items1`
    FOREIGN KEY (`items_id`)
    REFERENCES `items` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)

-- -----------------------------------------------------
-- Table `characters_has_equipement`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `characters_has_equipement` (
  `characters_id` INT NOT NULL,
  `characters_users_id` INT UNSIGNED NOT NULL,
  `equipement_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`characters_id`, `characters_users_id`, `equipement_id`),
  INDEX `fk_characters_has_equipement_equipement1_idx` (`equipement_id` ASC) VISIBLE,
  INDEX `fk_characters_has_equipement_characters1_idx` (`characters_id` ASC, `characters_users_id` ASC) VISIBLE,
  CONSTRAINT `fk_characters_has_equipement_characters1`
    FOREIGN KEY (`characters_id` , `characters_users_id`)
    REFERENCES `characters` (`id` , `users_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_characters_has_equipement_equipement1`
    FOREIGN KEY (`equipement_id`)
    REFERENCES `equipement` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)

-- -----------------------------------------------------
-- INSERT INTO EQUIPEMENTS
-- -----------------------------------------------------
INSERT INTO `equipement` (`equipement_name`, `attack`, `defense`, `value`, `type`) VALUES
('Épée ébréchée', 8, 0, 60, 'Arme'),
('Targe en bois cloutée', 2, 6, 50, 'Bouclier'),
('Arc de Barberonce', 12, 0, 70, 'Arme'),
('Arbalète de Port-Bannon', 15, 0, 80, 'Arme'),
('Vieux marteau rouillé', 6, 0, 45, 'Arme'),
('Lance robuste de Corbel', 10, 0, 65, 'Arme'),
('Lame courte de Rigfill', 9, 3, 70, 'Arme'),
('Dague de fortune', 6, 1, 45, 'Arme'),
('Cimeterre ébréché', 7, 1, 55, 'Arme'),
('Épée antique usée', 7, 0, 55, 'Arme'),
('Ecu de Fort Brooks', 0, 12, 60, 'Bouclier'),
('Arc de chasse', 10, 0, 65, 'Arme'),
('Hache de Fourberage', 13, 3, 70, 'Arme'),
('Marteau de forgeron', 12, 0, 65, 'Arme'),
('Lance de bois', 8, 0, 55, 'Arme'),
('Lame ternie de Sinréa', 8, 3, 60, 'Arme'),
('Dague rouillée', 5, 1, 40, 'Arme'),
('Rapière tordue', 6, 0, 50, 'Arme'),
('Épée Lune d''argent', 8, 4, 60, 'Arme'),
('Bouclier de Corbel', 0, 10, 50, 'Bouclier'),
('Arc de chasseur', 12, 0, 70, 'Arme'),
('Hache de Cornebouc', 15, 0, 80, 'Arme'),
('Marteau de guerre', 14, 0, 75, 'Arme'),
('Lance brisée', 10, 0, 65, 'Arme'),
('Lame rouillée', 9, 3, 70, 'Arme'),
('Dague de poche', 6, 1, 45, 'Arme'),
('Katana éffilé', 8, 0, 65, 'Arme'),
('Épée émoussée', 7, 0, 55, 'Arme'),
('Pavois des anciens', 0, 13, 90, 'Bouclier'),
('Arc de chêne cuivré', 10, 0, 68, 'Arme'),
('Hache de bûcheron', 9, 0, 70, 'Arme'),
('Marteau de Fort Brooks', 12, 0, 95, 'Arme'),
('Lance de Perceroc', 8, 0, 65, 'Arme'),
('Sabre de Mornedune', 14, 5, 140, 'Arme'),
('Dague de Glyphgarde', 5, 1, 90, 'Arme'),
('Écu de Faërun', 0, 13, 70, 'Bouclier'),
('Pavois de Sylvandor', 0, 9, 65, 'Bouclier'),
('Écu de Solstice', 0, 15, 120, 'Bouclier'),
('Dague de parade de Morneronce', 0, 15, 120, 'Bouclier'),
('Bouclier de Terrador', 2, 11, 85, 'Bouclier'),
('Rapière de Corbel', 10, 0, 100, 'Arme');

-- -----------------------------------------------------
-- INSERT INTO ITEMS
-- -----------------------------------------------------
INSERT INTO `items` (`item_name`, `power`, `value`, `type`) VALUES
('Potion de soin mineure', 5, 50, 'Potion'),
('Potion de mana mineure', 10, 50, 'Potion'),
('Potion de force mineure', 5, 40, 'Potion'),
('Potion de soin', 10, 90, 'Potion'),
('Rune de guérison', 10, 100, 'Rune'),
('Rune de protection', 8, 100, 'Rune'),
('Rune de rapidité', 10, 80, 'Rune'),
('Rune de feu mineure', 10, 80, 'Rune'),
('Crochet de voleur', 0, 60, 'Objet de voyage'),
('Pelle légère', 0, 40, 'Objet de voyage'),
('Lanterne magique', 0, 50, 'Objet de voyage'),
('Grappin d''exploration', 0, 70, 'Objet de voyage'),
('Gourde d''eau fraîche', 0, 30, 'Objet de voyage'),
('Cape du rôdeur', 2, 60, 'Objet de voyage'),
('Sac de voyage robuste', 2, 80, 'Objet de voyage'),
('Corde d''escalade robuste', 0, 50, 'Objet de voyage'),
('Vieille carte au trésor', 0, 100, 'Objet de voyage'),
('Flasque de poison', 2, 70, 'Objet de voyage'),
('Brigandine d''Orfeuille', 8, 85, 'Armure'),
('Haubert de Sinréa', 14, 150, 'Armure'),
('Cuirasse de Fort Brooks', 9, 100, 'Armure'),
('Tunique du vent de l''ouest', 4, 60, 'Armure'),
('Manteau de l''ours gris', 5, 65, 'Armure'),
('Plastron de maille', 8, 80, 'Armure'),
('Tunique de cuir boulli', 6, 70, 'Armure'),
('Plastron de cuir riveté', 9, 120, 'Armure'),
('Armure de cuir renforcée', 10, 110, 'Armure');

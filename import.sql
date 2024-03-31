CREATE TABLE `orders` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `hash` VARCHAR(255) NOT NULL,
  `total` FLOAT NOT NULL,
  `address_id` INT(11) NOT NULL,
  `paid` TINYINT(1) NOT NULL,
  `customer_id` INT(11) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `orders_products` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `order_id` INT(11) NOT NULL,
  `product_id` INT(11) NOT NULL,
  `quantity` INT(11) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `payments` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `order_id` INT(11) NOT NULL,
  `success` TINYINT(1) NOT NULL,
  `transaction_id` VARCHAR(255) DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `products` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) DEFAULT NULL,
  `weight` INT(11) DEFAULT NULL,
  `material` VARCHAR(50) DEFAULT NULL,
  `content` VARCHAR(500) DEFAULT NULL,
  `stock` INT(11) NOT NULL,
  `price` DECIMAL(10,2) DEFAULT NULL,
  `img` VARCHAR(255) DEFAULT NULL,
  `views` INT(11) DEFAULT 0,
  PRIMARY KEY (`id`)
);

CREATE TABLE `users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  `verify_status` INT(2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
);

INSERT INTO `products` (`id`, `name`, `weight`, `material`, `content`, `stock`, `price`, `img`, `views`) VALUES
(5, 'hert', 204, 'stof', '- Nederlandse handleiding - Linnen Canvas, 40 x 50 CM met voorbedrukte nummers - Verf in hersluitbare potjes, voorzien van nummers - Voorbeeld - Penselen (3x) - Haakjes om je meesterwerk mee op te hangen', 10, 9.95, 'hert.jpg', 0),
(6, 'ballet', 242, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 10, 9.95, 'ballet.jpg', 1),
(8, 'Boeddha - Water', 245, 'stof', 'innen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 10, 9.95, 'boedha.jpg', 1),
(9, 'Paarden', 198, 'stof', 'Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 10, 9.95, 'paarden.jpg', 1),
(10, 'Beauty and the beast', 229, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 10, 9.95, 'beuty and the beast.jpg', 2),
(11, 'Leeuw - Zonnebril', 290, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 10, 9.95, 'leeuw-zonnebril.jpg', 0),
(12, 'kat-vis', 175, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 10, 9.95, 'kat-vis.jpg', 1),
(13, 'toekan', 0, 'stof', 'Nederlandse Handleiding - Linnen Canvas, 40 x 50 CM met voorbedrukte nummers - Verf in hersluitbare potjes, voorzien van nummers - Voorbeeld - Penselen (3x) - Haakjes om je meesterwerk mee op te hangen', 10, 9.95, 'toekan.jpg', 0),
(14, 'anime-girl', 0, 'stof', 'Nederlandse Handleiding - Linnen Canvas, 40 x 50 CM met voorbedrukte nummers - Verf in hersluitbare potjes, voorzien van nummers - Voorbeeld - Penselen (3x) - Haakjes om je meesterwerk mee op te hangen', 10, 9.95, 'anime-girl.jpg', 0),
(15, 'zee', 214, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 10, 9.95, 'zee.jpg', 0),
(16, 'olifant', 214, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 10, 9.95, 'olifant.jpg', 0),
(17, 'kinderen-papa', 289, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 10, 9.95, 'zoon.jpg', 0),
(18, 'zwaan', 224, 'stof', 'Nederlandse Handleiding - Linnen Canvas, 40 x 50 CM met voorbedrukte nummers - Verf in hersluitbare potjes, voorzien van nummers - Voorbeeld - Penselen (3x) - Haakjes om je meesterwerk mee op te hangen', 10, 9.95, 'zwaan.jpg', 0),
(19, 'cello', 245, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 10, 9.95, 'cello.jpg', 0),
(20, 'eenhoorn', 245, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 10, 9.95, 'eenhoorn.jpg', 0),
(21, 'zebra', 245, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 10, 9.95, 'zebra.jpg', 0),
(22, 'god', 214, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 10, 9.95, 'god.jpg', 0);

INSERT INTO `users` (`id`, `username`, `email`, `password`, `token`, `verify_status`) VALUES
(1, 'test_user', 'rockymaikel@gmail.com', 'password123', '', 0),
(10, '123', 'lomppower@gmail.com', '123', '663cf3b4e6e777edec8a1d6ea7c0417f', 1),
(11, 'deanus', 'deandynamite69@gmail.com', '!Persona5', '2b55f14dcd9eb7035ee6540eb3a6a9cf', 0),
(12, 'chelsea', 'droomland23@hotmail.com', 'pwpw5035', 'dc91d4510a2b2483b5ca3ad32e0aef9b', 0),
(13, 'Onomis', 'onomis2@outlook.com', '8jaar', '655588a92ddccf48f1cd01bcfada9fd1', 0),
(14, 'gormeituxss', 'dillonsingh@hotmail.com', '123', 'e46e9d6cf6ef95fe1e9767bea95803b5', 0),
(15, 'blastissue', 'felix.huel6@gmail.com', 'Felix', 'cd57329c7702799b3a1b5547d4a0352d', 0);

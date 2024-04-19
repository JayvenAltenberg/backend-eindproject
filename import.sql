DROP DATABASE IF EXISTS `2.0_products`;

CREATE DATABASE `2.0_products`;

USE `2.0_products`;

-- Create the 'products' table
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

-- Insert data into the 'products' table
INSERT INTO `products` (`id`, `name`, `weight`, `material`, `content`, `stock`, `price`, `img`, `views`) VALUES
(5, 'hert', 204, 'stof', '- Nederlandse handleiding - Linnen Canvas, 40 x 50 CM met voorbedrukte nummers - Verf in hersluitbare potjes, voorzien van nummers - Voorbeeld - Penselen (3x) - Haakjes om je meesterwerk mee op te hangen', 10, 9.95, 'hert.jpg', 2),
(6, 'ballet', 242, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 10, 9.95, 'ballet.jpg', 47),
(8, 'Boeddha - Water', 245, 'stof', 'innen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 10, 9.95, 'boedha.jpg', 32),
(9, 'Paarden', 198, 'stof', 'Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 10, 9.95, 'paarden.jpg', 5),
(10, 'Beauty and the beast', 229, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 10, 9.95, 'beuty and the beast.jpg', 22),
(11, 'Leeuw - Zonnebril', 290, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 10, 9.95, 'leeuw-zonnebril.jpg', 3),
(12, 'kat-vis', 175, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 10, 9.95, 'kat-vis.jpg', 2),
(13, 'toekan', 0, 'stof', 'Nederlandse Handleiding - Linnen Canvas, 40 x 50 CM met voorbedrukte nummers - Verf in hersluitbare potjes, voorzien van nummers - Voorbeeld - Penselen (3x) - Haakjes om je meesterwerk mee op te hangen', 10, 9.95, 'toekan.jpg', 0),
(14, 'anime-girl', 0, 'stof', 'Nederlandse Handleiding - Linnen Canvas, 40 x 50 CM met voorbedrukte nummers - Verf in hersluitbare potjes, voorzien van nummers - Voorbeeld - Penselen (3x) - Haakjes om je meesterwerk mee op te hangen', 10, 9.95, 'anime-girl.jpg', 0),
(15, 'zee', 214, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 10, 9.95, 'zee.jpg', 0),
(16, 'olifant', 214, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 10, 9.95, 'olifant.jpg', 0),
(17, 'kinderen-papa', 289, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 10, 9.95, 'zoon.jpg', 0),
(18, 'zwaan', 224, 'stof', 'Nederlandse Handleiding - Linnen Canvas, 40 x 50 CM met voorbedrukte nummers - Verf in hersluitbare potjes, voorzien van nummers - Voorbeeld - Penselen (3x) - Haakjes om je meesterwerk mee op te hangen', 10, 9.95, 'zwaan.jpg', 1),
(19, 'cello', 245, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 10, 9.95, 'cello.jpg', 0),
(20, 'eenhoorn', 245, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 10, 9.95, 'eenhoorn.jpg', 0),
(21, 'zebra', 245, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 10, 9.95, 'zebra.jpg', 0),
(22, 'god', 214, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 10, 9.95, 'god.jpg', 0);

-- Create the 'admin' table
CREATE TABLE `admin` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
);

-- Insert data into the 'admin' table
INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', 'admin');

-- Create the 'contact' table
CREATE TABLE `contact` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `message` INT(11) NOT NULL,
  PRIMARY KEY (`id`)
);

-- Create the 'coupon' table
CREATE TABLE `coupon` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `code` VARCHAR(255) NOT NULL,
  `discount` INT(11) NOT NULL,
  `used` INT(2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
);

-- Insert data into the 'coupon' table
INSERT INTO `coupon` (`id`, `code`, `discount`, `used`) VALUES
(1, 'TakemiBetter', 5, 0),
(2, 'ec72128ced7551c7c5d13df430580dfb', 5, 0),
(3, '70881759620a7a7943107d9605bbcd20', 5, 0),
(4, 'b827081e442a986437a6be5dae7baeb9', 5, 0);


-- Create the 'users' table
CREATE TABLE `users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  `verify_status` INT(2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
);

-- Insert data into the 'users' table
INSERT INTO `users` (`id`, `username`, `email`, `token`, `verify_status`) VALUES
(10, '123', 'lomppower@gmail.com', '663cf3b4e6e777edec8a1d6ea7c0417f', 1),
(11, 'deanus', 'deandynamite69@gmail.com', '2b55f14dcd9eb7035ee6540eb3a6a9cf', 0);



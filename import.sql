CREATE DATABASE IF NOT EXISTS `2.0_products`;

USE `2.0_products`;

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `material` varchar(50) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
);



INSERT INTO `products` (`id`, `name`, `weight`, `material`, `content`, `price`, `img`) VALUES
(5, 'hert', 204, 'stof', '- Nederlandse handleiding - Linnen Canvas, 40 x 50 CM met voorbedrukte nummers - Verf in hersluitbare potjes, voorzien van nummers - Voorbeeld - Penselen (3x) - Haakjes om je meesterwerk mee op te hangen', 9.95, 'hert.jpg'),
(6, 'ballet', 242, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 9.95, 'ballet.jpg'),
(8, 'Boeddha - Water', 245, 'stof', 'innen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 9.95, 'boedha.jpg'),
(9, 'Paarden', 198, 'stof', 'Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 9.95, 'paarden.jpg'),
(10, 'Beauty and the beast', 229, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 9.95, 'beuty and the beast.jpg'),
(11, 'Leeuw - Zonnebril', 290, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 9.95, 'leeuw-zonnebril.jpg'),
(12, 'kat-vis', 175, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 9.95, 'kat-vis.jpg'),
(13, 'toekan', 0, 'stof', 'Nederlandse Handleiding - Linnen Canvas, 40 x 50 CM met voorbedrukte nummers - Verf in hersluitbare potjes, voorzien van nummers - Voorbeeld - Penselen (3x) - Haakjes om je meesterwerk mee op te hangen', 9.95, 'toekan.jpg'),
(14, 'anime-girl', 0, 'stof', 'Nederlandse Handleiding - Linnen Canvas, 40 x 50 CM met voorbedrukte nummers - Verf in hersluitbare potjes, voorzien van nummers - Voorbeeld - Penselen (3x) - Haakjes om je meesterwerk mee op te hangen', 9.95, 'anime-girl.jpg'),
(15, 'zee', 214, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 9.95, 'zee.jpg'),
(16, 'olifant', 214, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 9.95, 'olifant.jpg'),
(17, 'kinderen-papa', 289, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 9.95, 'zoon.jpg'),
(18, 'zwaan', 224, 'stof', 'Nederlandse Handleiding - Linnen Canvas, 40 x 50 CM met voorbedrukte nummers - Verf in hersluitbare potjes, voorzien van nummers - Voorbeeld - Penselen (3x) - Haakjes om je meesterwerk mee op te hangen', 9.95, 'zwaan.jpg'),
(19, 'cello', 245, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 9.95, 'cello.jpg'),
(20, 'eenhoorn', 245, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 9.95, 'eenhoorn.jpg'),
(21, 'zebra', 245, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 9.95, 'zebra.jpg'),
(22, 'god', 214, 'stof', ' Linnen opbergzak • Linnen canvas, 50 x 40 CM met voorbedrukte nummers • Acrylverf in genummerde potjes, voldoende voor het hele schilderij • Nederlandse en Engelse handleiding • Penselen • Haakjes om je meesterwerk mee op te hangen (Let op, zonder frame) • Voorbeeld in kleur', 9.95, 'god.jpg');


ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;
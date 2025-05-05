-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.11.11-MariaDB-0+deb12u1 - Debian 12
-- SE du serveur:                debian-linux-gnu
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour eloquencia
CREATE DATABASE IF NOT EXISTS `eloquencia` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `eloquencia`;

-- Listage de la structure de table eloquencia. admins
CREATE TABLE IF NOT EXISTS `admins` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) NOT NULL,
  `password` char(64) NOT NULL,
  `cookie` int(11) DEFAULT NULL,
  `reset` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table eloquencia.admins : ~2 rows (environ)
DELETE FROM `admins`;
INSERT INTO `admins` (`ID`, `email`, `password`, `cookie`, `reset`) VALUES
	(1, 'contact@ethanduault.fr', 'hash_du_mot_de_passe', NULL, 4635972);

-- Listage de la structure de table eloquencia. applications
CREATE TABLE IF NOT EXISTS `applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table eloquencia.applications : ~12 rows (environ)
DELETE FROM `applications`;
INSERT INTO `applications` (`id`, `name`, `email`, `job`, `message`, `created_at`) VALUES
	(1, 'John', 'telzcols@do-not-respond.me', 'Choisir...', 'tlFJ KMBoEJ yVeJB RXm', '2025-02-28 10:03:12');

-- Listage de la structure de table eloquencia. contact
CREATE TABLE IF NOT EXISTS `contact` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table eloquencia.contact : ~18 rows (environ)
DELETE FROM `contact`;

-- Listage de la structure de table eloquencia. discounts
CREATE TABLE IF NOT EXISTS `discounts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `proof` longblob NOT NULL,
  `state` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table eloquencia.discounts : ~0 rows (environ)
DELETE FROM `discounts`;

-- Listage de la structure de table eloquencia. discounts_codes
CREATE TABLE IF NOT EXISTS `discounts_codes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table eloquencia.discounts_codes : ~20 rows (environ)
DELETE FROM `discounts_codes`;
INSERT INTO `discounts_codes` (`ID`, `code`, `email`) VALUES
	(20, 'Z8Y2ZZGKZ5', NULL);

-- Listage de la structure de table eloquencia. events
CREATE TABLE IF NOT EXISTS `events` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `activity` varchar(255) NOT NULL,
  `members` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`members`)),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table eloquencia.events : ~2 rows (environ)
DELETE FROM `events`;
INSERT INTO `events` (`ID`, `activity`, `members`) VALUES
	(1, 'Atelier 1', '["1"]'),
	(2, 'Activité 1', '["10","2","12","12","12"]');

-- Listage de la structure de table eloquencia. lessons
CREATE TABLE IF NOT EXISTS `lessons` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `summary` varchar(1024) NOT NULL,
  `content` text NOT NULL,
  `chapter` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `lessons_lessons_chapters_ID_fk` (`chapter`),
  CONSTRAINT `lessons_lessons_chapters_ID_fk` FOREIGN KEY (`chapter`) REFERENCES `lessons_chapters` (`ID`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table eloquencia.lessons : ~3 rows (environ)
DELETE FROM `lessons`;
INSERT INTO `lessons` (`ID`, `title`, `summary`, `content`, `chapter`) VALUES
	(1, 'La posture et la respiration', 'Cette première leçon vous permet de poser les bases pour utiliser votre voix de manière efficace et sans effort.', '&lt;p&gt;&lt;strong&gt;Introduction :&lt;/strong&gt;\r\nPour une prise de parole efficace, il est essentiel d&#039;avoir une bonne posture et une respiration maîtrisée. Une posture correcte permet à la voix de s&#039;exprimer librement, sans tension ni effort excessif. La respiration, quant à elle, est le moteur de la voix. Elle permet de soutenir le son, de moduler le volume et d’éviter l’essoufflement. Ce cours vous apprendra à utiliser votre corps comme un instrument pour une voix puissante et sans fatigue.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Pourquoi la posture est-elle si importante ?&lt;/strong&gt;\r\nVotre corps est l&#039;instrument qui porte votre voix. Si votre posture est fermée ou déséquilibrée, cela peut bloquer votre respiration, créer des tensions, ou limiter la projection de votre voix. Pour permettre à l’air de circuler librement et aux muscles de travailler efficacement, il est primordial de se tenir droit, avec un axe vertical bien aligné.&lt;/p&gt;&lt;hr&gt;&lt;h3&gt;&lt;strong&gt;Étape 1 : Se placer dans une bonne posture&lt;/strong&gt;&lt;/h3&gt;&lt;ol&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Commencez par vous adosser à un mur&lt;/strong&gt; :&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Placez-vous debout contre un mur, les talons légèrement éloignés (environ 10 cm). Assurez-vous que votre tête, vos épaules, votre dos et vos fesses touchent le mur.&lt;/li&gt;&lt;li&gt;Essayez d’aplanir l&#039;arrière de votre tronc contre le mur en effaçant la cambrure du bas de votre dos. Gardez votre menton parallèle au sol, sans projeter la tête vers l’avant.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Détendez vos épaules et votre visage&lt;/strong&gt; :&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Vérifiez que vos épaules ne sont pas crispées, elles doivent rester bien détendues. Relâchez également les muscles de votre visage. Une voix détendue est une voix puissante.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Respirez naturellement&lt;/strong&gt; :&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Respirez calmement dans cette position, sans forcer. Sentez l’air passer librement dans votre gorge et votre ventre se gonfler à chaque inspiration. Vous devriez sentir que votre ventre s’active naturellement.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;/ol&gt;&lt;p&gt;&lt;strong&gt;Astuce&lt;/strong&gt; : Imaginez que votre colonne vertébrale est un fil qui vous tire vers le haut, tandis que le reste de votre corps est bien ancré au sol. Cela vous aide à rester droit sans raideur.&lt;/p&gt;&lt;hr&gt;&lt;h3&gt;&lt;strong&gt;Étape 2 : La respiration diaphragmatique&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;La respiration diaphragmatique est essentielle pour bien soutenir la voix. Elle permet de prendre des inspirations profondes et de mieux contrôler le souffle, ce qui est fondamental lors d’un discours. Respirer seulement avec la poitrine entraîne une fatigue rapide et ne permet pas une projection vocale efficace.&lt;/p&gt;&lt;ol&gt;&lt;li&gt;&lt;strong&gt;Restez dans la posture contre le mur&lt;/strong&gt; :&lt;ul&gt;&lt;li&gt;Inspirez profondément en sentant l’air remplir votre ventre. Vos épaules ne doivent pas bouger. Votre abdomen devrait légèrement se gonfler à chaque inspiration.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;li&gt;&lt;strong&gt;Expirez lentement&lt;/strong&gt; :&lt;ul&gt;&lt;li&gt;Expirez doucement par la bouche, en gardant la gorge ouverte et détendue. Votre ventre doit se dégonfler progressivement.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;/ol&gt;&lt;p&gt;&lt;strong&gt;Exercice de respiration (à répéter plusieurs fois)&lt;/strong&gt; :&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Inspirez lentement pendant 4 secondes (gonflez le ventre).&lt;/li&gt;&lt;li&gt;Maintenez l’air pendant 2 secondes.&lt;/li&gt;&lt;li&gt;Expirez lentement pendant 6 secondes.&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;Cet exercice vous permettra de renforcer votre capacité à contrôler votre respiration et de mieux soutenir votre voix pendant un discours.&lt;/p&gt;&lt;hr&gt;&lt;h3&gt;&lt;strong&gt;Étape 3 : Retrouver la posture sans l’aide du mur&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;Une fois que vous avez bien pris conscience de votre posture et de votre respiration contre le mur, essayez de retrouver les mêmes sensations sans cet appui.&lt;/p&gt;&lt;ol&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Redressez-vous, loin du mur&lt;/strong&gt; :&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Debout, placez vos pieds écartés à la largeur des hanches. Légèrement basculez le bassin vers l&#039;avant pour maintenir une courbure naturelle dans le bas du dos.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Gardez la tête droite&lt;/strong&gt; :&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Imaginez un fil invisible qui tire votre tête vers le haut, ce qui aide à maintenir votre colonne vertébrale allongée sans forcer.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Respirez comme auparavant&lt;/strong&gt; :&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Continuez à pratiquer la respiration diaphragmatique tout en vérifiant que vos épaules sont relâchées et que votre ventre s’active.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;/ol&gt;&lt;hr&gt;&lt;h3&gt;&lt;strong&gt;Conclusion :&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;Une bonne posture combinée à une respiration diaphragmatique permet non seulement d’améliorer la qualité de votre voix, mais aussi de prévenir les fatigues vocales. Plus vous adoptez ces habitudes, plus vous serez capable de parler longtemps et avec puissance, sans forcer. Prenez le temps de pratiquer ces exercices régulièrement pour ancrer ces techniques dans votre corps.&lt;/p&gt;&lt;hr&gt;&lt;h3&gt;&lt;strong&gt;Exercice pratique : La posture et la respiration&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;&lt;strong&gt;Durée&lt;/strong&gt; : 5-7 minutes&lt;br&gt;&lt;strong&gt;Parties du corps concernées&lt;/strong&gt; : Tronc, dos, bassin, tête, gorge, ventre&lt;/p&gt;&lt;ol&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Posture contre un mur&lt;/strong&gt; : 2-3 minutes&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Placez-vous contre un mur, aplatissez votre tronc, détendez vos épaules et respirez calmement en sentant votre ventre s&#039;activer.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Respiration diaphragmatique&lt;/strong&gt; : 2 minutes&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Inspirez pendant 4 secondes, retenez votre souffle 2 secondes, puis expirez en 6 secondes. Répétez plusieurs fois.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Retrouver la posture sans le mur&lt;/strong&gt; : 2 minutes&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Éloignez-vous du mur et essayez de maintenir la même posture tout en continuant à respirer profondément.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;/ol&gt;', 1),
	(2, 'L’échauffement vocal', 'L’échauffement vocal est indispensable avant toute prise de parole pour éviter les fatigues vocales, détendre les muscles de la gorge et préparer les cordes vocales à produire un son clair et puissant. Tout comme on échauffe ses muscles avant une activité physique, on doit échauffer sa voix avant de parler en public.', '&lt;h3&gt;&lt;strong&gt;Pourquoi l’échauffement vocal est-il crucial ?&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;Un bon échauffement vocal permet :&lt;/p&gt;&lt;ul&gt;&lt;li&gt;De détendre les muscles de la gorge et de la mâchoire.&lt;/li&gt;&lt;li&gt;D&#039;améliorer la projection et la clarté de la voix.&lt;/li&gt;&lt;li&gt;De renforcer l’endurance vocale et d’éviter les blessures (tensions, extinctions de voix).&lt;/li&gt;&lt;li&gt;D’élargir la tessiture de votre voix pour mieux moduler l&#039;intonation et le volume.&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;Tout comme un instrument de musique, votre voix doit être accordée et préparée avant d’être utilisée intensivement.&lt;/p&gt;&lt;hr&gt;&lt;h3&gt;&lt;strong&gt;Étape 1 : Détendre les muscles de la gorge et du visage&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;Pour libérer votre voix, il est essentiel de détendre les muscles qui entourent vos cordes vocales.&lt;/p&gt;&lt;ol&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Relâcher la mâchoire :&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Ouvrez la bouche le plus grand possible, puis relâchez complètement la mâchoire. Répétez ce mouvement 5 fois.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Étirement du cou :&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Inclinez doucement votre tête vers la droite, puis vers la gauche, en maintenant chaque position pendant 5 secondes. Ensuite, basculez la tête vers l’avant (le menton vers la poitrine) et maintenez 5 secondes.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Exercice du bâillement :&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Simulez un bâillement en ouvrant grand la bouche, tout en respirant profondément. Cet exercice détend naturellement les muscles de la gorge.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Exercice du sourire :&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Souriez aussi largement que possible, puis relâchez. Cet exercice aide à détendre les muscles du visage et améliore l’articulation.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;/ol&gt;&lt;hr&gt;&lt;h3&gt;&lt;strong&gt;Étape 2 : Échauffer les cordes vocales&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;Maintenant que les muscles autour de votre voix sont détendus, il est temps de travailler directement sur vos cordes vocales.&lt;/p&gt;&lt;ol&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Humming (le bourdonnement) :&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Fermez doucement la bouche et commencez à émettre un son « Mmmm » avec une intensité modérée. Essayez de faire vibrer vos lèvres et votre nez. Montez et descendez la gamme vocale lentement, en explorant différentes hauteurs de notes. Cela réchauffe vos cordes vocales en douceur.&lt;/li&gt;&lt;li&gt;&lt;strong&gt;Astuce&lt;/strong&gt; : Imaginez que le son est produit à partir de votre visage, pas seulement de votre gorge.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Vibrations des lèvres (« Brrr ») :&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Faites vibrer vos lèvres en soufflant de l’air à travers, comme si vous faisiez un bruit de moteur (« Brrr »). Ajoutez des sons et changez progressivement de tonalité. Cet exercice détend les cordes vocales tout en stimulant la résonance dans votre voix.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Voyelles longues (A-E-I-O-U) :&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Prononcez chaque voyelle (A, E, I, O, U) de manière continue et prolongée, en variant le volume et la tonalité. Commencez doucement, puis augmentez progressivement l’intensité sans forcer. Cet exercice permet d’explorer la puissance vocale tout en renforçant la stabilité de la voix.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;/ol&gt;&lt;hr&gt;&lt;h3&gt;&lt;strong&gt;Étape 3 : Travailler la résonance et la projection&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;Une fois que votre voix est échauffée, il est important de travailler sur la résonance (comment le son vibre dans votre corps) et sur la projection (comment le son remplit un espace sans effort).&lt;/p&gt;&lt;ol&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Résonance dans la poitrine :&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Prononcez un son grave, comme un « Ohhh », et sentez la vibration dans votre poitrine. Essayez de maintenir cette résonance tout en montant et descendant dans la gamme vocale. Cela aide à développer une voix plus pleine et riche.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Projection sans effort :&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Choisissez une phrase simple et prononcez-la avec un volume modéré, en imaginant que vous devez atteindre la personne au fond de la salle. Assurez-vous que votre voix reste soutenue par une bonne respiration diaphragmatique. L’objectif est de projeter sans crier ni forcer.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;/ol&gt;&lt;hr&gt;&lt;h3&gt;&lt;strong&gt;Conclusion :&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;L’échauffement vocal est une étape cruciale pour toute prise de parole, qu’elle soit longue ou courte. Il prépare votre voix à fonctionner de manière optimale, réduit les risques de fatigue vocale et améliore la qualité du son que vous produisez. Pratiquer ces exercices régulièrement vous aidera à développer une voix plus puissante, plus endurante et plus expressive.&lt;/p&gt;&lt;hr&gt;&lt;h3&gt;&lt;strong&gt;Exercice pratique : L’échauffement vocal&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;&lt;strong&gt;Durée&lt;/strong&gt; : 5-7 minutes&lt;br&gt;&lt;strong&gt;Parties du corps concernées&lt;/strong&gt; : Corde vocale, diaphragme, lèvres, gorge, visage&lt;/p&gt;&lt;ol&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Détente musculaire&lt;/strong&gt; : 2 minutes&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Relâchez la mâchoire, le cou et simulez des bâillements pour détendre la gorge et les muscles du visage.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Échauffement des cordes vocales&lt;/strong&gt; : 3 minutes&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Faites des bourdonnements (« Mmmm »), des vibrations de lèvres (« Brrr ») et travaillez les voyelles longues (A-E-I-O-U) en variant le volume et la tonalité.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Résonance et projection&lt;/strong&gt; : 2 minutes&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Travaillez la résonance dans votre poitrine et pratiquez la projection de votre voix en prononçant des phrases simples à volume modéré.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;/ol&gt;', 1),
	(3, 'Le rythme et l&#039;intonation', 'Après avoir maîtrisé la posture et l&#039;échauffement vocal, il est temps de travailler sur deux éléments qui font toute la différence dans un discours : le rythme et l&#039;intonation. Ces deux aspects sont indispensables pour rendre vos prises de parole plus dynamiques, naturelles et engageantes.', '&lt;h3&gt;&lt;strong&gt;Pourquoi le rythme et l’intonation sont-ils essentiels ?&lt;/strong&gt;&lt;/h3&gt;&lt;ul&gt;&lt;li&gt;&lt;strong&gt;Le rythme&lt;/strong&gt; permet de structurer votre discours, de mettre en lumière les idées importantes, et d’éviter la monotonie. Des pauses bien placées permettent à votre auditoire de réfléchir et d’assimiler ce que vous venez de dire.&lt;/li&gt;&lt;li&gt;&lt;strong&gt;L’intonation&lt;/strong&gt; donne de la vie à vos mots. Une intonation variée aide à transmettre vos émotions, à rendre votre discours plus expressif et engageant. Elle donne également des indices sur les moments où vous posez une question, où vous concluez une idée ou quand une information est importante.&lt;/li&gt;&lt;/ul&gt;&lt;hr&gt;&lt;h3&gt;&lt;strong&gt;Étape 1 : Travailler le rythme&lt;/strong&gt;&lt;/h3&gt;&lt;ol&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Varier la vitesse de parole :&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Lisez un extrait de texte à voix haute, d&#039;abord à un rythme constant. Ensuite, relisez-le en alternant des moments plus lents sur les passages importants, et des moments plus rapides sur les idées secondaires.&lt;/li&gt;&lt;li&gt;Cet exercice vous aide à mieux comprendre comment le rythme permet d&#039;attirer l’attention sur certaines parties du discours et de créer un contraste.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Utiliser les pauses stratégiquement :&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Marquez des pauses à des endroits clés de votre discours. Par exemple, après une phrase importante, prenez une respiration. Cette pause va souligner le message que vous venez de transmettre.&lt;/li&gt;&lt;li&gt;Les pauses ne doivent pas être trop longues pour ne pas perdre votre auditoire, mais suffisamment marquées pour créer de l’impact. Utilisez-les pour rythmer votre discours.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Accentuer les transitions :&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Variez votre rythme quand vous passez d’une idée à une autre. Ralentissez lorsque vous introduisez un point clé, et accélérez sur des idées plus légères ou répétitives pour maintenir l’intérêt de l’auditoire.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;/ol&gt;&lt;hr&gt;&lt;h3&gt;&lt;strong&gt;Étape 2 : Jouer avec l’intonation&lt;/strong&gt;&lt;/h3&gt;&lt;ol&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Monter et descendre la voix :&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Choisissez une phrase simple et lisez-la de manière monotone. Ensuite, relisez-la en variant l&#039;intonation. Montez la voix sur les mots importants ou pour exprimer une question, et descendez-la pour marquer une affirmation ou une conclusion.&lt;/li&gt;&lt;li&gt;Par exemple : « Ce projet &lt;strong&gt;sera un succès&lt;/strong&gt; si nous nous investissons tous. » Remarquez comment la montée sur « sera un succès » attire l’attention.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Faire passer des émotions :&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Lisez une même phrase avec différentes émotions : enthousiasme, tristesse, colère, amusement. Notez comment votre voix monte et descend en fonction de l’émotion que vous exprimez.&lt;/li&gt;&lt;li&gt;En entraînant votre voix à varier selon l’émotion, vous apprendrez à captiver votre auditoire et à rendre vos discours plus vivants.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Poser des questions et affirmer :&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Une manière simple de pratiquer l’intonation est d’alterner entre poser des questions et faire des affirmations. Montez légèrement la voix en fin de phrase pour les questions, et baissez-la pour les affirmations.&lt;/li&gt;&lt;li&gt;Par exemple : « Nous avons des défis à relever &lt;strong&gt;?&lt;/strong&gt; » (intonation montante) et « Nous allons y arriver. » (intonation descendante).&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;/ol&gt;&lt;hr&gt;&lt;h3&gt;&lt;strong&gt;Étape 3 : Combiner rythme et intonation&lt;/strong&gt;&lt;/h3&gt;&lt;ol&gt;&lt;li&gt;&lt;strong&gt;Lisez un texte en combinant rythme et intonation :&lt;/strong&gt;&lt;ul&gt;&lt;li&gt;Prenez un extrait de discours ou un texte que vous aimez et lisez-le en appliquant les variations de rythme et d’intonation. Alternez entre des moments lents et rapides, et variez la hauteur de votre voix pour donner plus de relief à votre discours.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;li&gt;&lt;strong&gt;Entraînez-vous à parler sans monotonie :&lt;/strong&gt;&lt;ul&gt;&lt;li&gt;Même sur des phrases simples, évitez de parler d’une voix monocorde. Ajoutez des variations dans votre intonation et rythme pour rendre chaque mot plus significatif et pour tenir l’attention de votre auditoire.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;/ol&gt;&lt;hr&gt;&lt;h3&gt;&lt;strong&gt;Conclusion :&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;Le rythme et l’intonation sont les piliers qui soutiennent un discours captivant. Un bon orateur sait les manipuler avec précision pour tenir en haleine son auditoire, souligner les idées importantes et communiquer ses émotions. En les maîtrisant, vous transformerez une prise de parole ordinaire en un moment fort, capable de marquer les esprits et de transmettre votre message avec plus d’impact.&lt;/p&gt;&lt;hr&gt;&lt;h3&gt;&lt;strong&gt;Exercice pratique : Le rythme et l’intonation&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;&lt;strong&gt;Durée&lt;/strong&gt; : 5-7 minutes&lt;br&gt;&lt;strong&gt;Parties du corps concernées&lt;/strong&gt; : Corde vocale, diaphragme, gorge&lt;/p&gt;&lt;ol&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Travail sur le rythme&lt;/strong&gt; : 2-3 minutes&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Lisez un extrait de texte en alternant les rythmes : ralentissez sur les moments clés, accélérez sur les passages secondaires. Marquez des pauses pour souligner certaines idées.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Travail sur l’intonation&lt;/strong&gt; : 2-3 minutes&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Prenez une phrase et lisez-la en modulant votre voix en fonction de différentes émotions (joie, tristesse, colère, enthousiasme). Faites des montées et descentes de voix pour marquer les affirmations et les questions.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;strong&gt;Combiner rythme et intonation&lt;/strong&gt; : 2-3 minutes&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Lisez un texte en combinant les techniques de variation de rythme et d&#039;intonation pour donner vie à votre discours.&lt;/li&gt;&lt;/ul&gt;&lt;/li&gt;&lt;/ol&gt;', 1);

-- Listage de la structure de table eloquencia. lessons_chapters
CREATE TABLE IF NOT EXISTS `lessons_chapters` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table eloquencia.lessons_chapters : ~2 rows (environ)
DELETE FROM `lessons_chapters`;
INSERT INTO `lessons_chapters` (`ID`, `name`, `description`) VALUES
	(1, 'Chapitre 1', 'La voix est l’un des outils les plus puissants dans l’art de l’éloquence. Ce chapitre explore comment maîtriser, renforcer et varier l&#039;usage de sa voix pour captiver un auditoire. La gestion de la respiration, la posture, l’intonation, le rythme et la projection sont des aspects essentiels pour assurer une bonne prise de parole. Les cinq leçons de ce chapitre couvriront différentes techniques pour développer une voix puissante, expressive et durable, tout en évitant les fatigues vocales.'),
	(2, 'Chapitre 2', 'Bientôt disponible');

-- Listage de la structure de table eloquencia. members
CREATE TABLE IF NOT EXISTS `members` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Numéro de l''adhérent',
  `name` varchar(60) NOT NULL COMMENT 'Nom de l''adhérent',
  `firstname` varchar(60) NOT NULL COMMENT 'Prénom de l''adhérent',
  `email` varchar(255) NOT NULL COMMENT 'Email de l''adhérent',
  `registrationToken` int(6) DEFAULT NULL COMMENT 'Jeton de confirmation de l''inscription',
  `password` char(64) DEFAULT NULL COMMENT 'hash sha256 du mdp',
  `newsletter` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Abonnement à la newsletter',
  `registrationDate` datetime NOT NULL COMMENT 'Début de la période d''adhésion',
  `expirationDate` datetime NOT NULL COMMENT 'Fin de la période d''adhésion',
  `subscriptionHistory` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'Historique des adhésions' CHECK (json_valid(`subscriptionHistory`)),
  `reset` int(11) DEFAULT NULL COMMENT 'jeton de réinitialisation du mdp
  ',
  `lessons_history` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'historique des leçons consultées',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table eloquencia.members : ~17 rows (environ)
DELETE FROM `members`;
INSERT INTO `members` (`ID`, `name`, `firstname`, `email`, `registrationToken`, `password`, `newsletter`, `registrationDate`, `expirationDate`, `subscriptionHistory`, `reset`, `lessons_history`) VALUES
	(17, 'nomdefamille', 'prenom', 'mail@icloud.com', 267340, NULL, 0, '2025-03-08 17:52:13', '2026-03-08 17:52:13', NULL, NULL, NULL);

-- Listage de la structure de table eloquencia. settings
CREATE TABLE IF NOT EXISTS `settings` (
  `name` varchar(20) NOT NULL,
  `value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`value`)),
  `state` tinyint(1) NOT NULL DEFAULT 1,
  UNIQUE KEY `index` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table eloquencia.settings : ~0 rows (environ)
DELETE FROM `settings`;
INSERT INTO `settings` (`name`, `value`, `state`) VALUES
	('announcement_lms', '{"title":"Bienvenue sur Eloqu\\u00e9ncia","content":"Le &lt;b&gt;chapitre 1&lt;\\/b&gt; est en cours de finalisation ! &lt;br&gt;Si vous connaissez des personnes comp\\u00e9tentes en \\u00e9loquence, &lt;br&gt;vous pouvez nous envoyer leurs coordonn\\u00e9es \\u00e0 l&#039;adresse &lt;a rel=&quot;noopener&quot;&gt;contact@eloquencia.org&lt;\\/a&gt;&lt;br&gt;Merci !&quot;&lt;hr&gt;&lt;br&gt;"}', 1);

-- Listage de la structure de table eloquencia. tokens
CREATE TABLE IF NOT EXISTS `tokens` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(32) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expiration` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Listage des données de la table eloquencia.tokens : ~24 rows (environ)
DELETE FROM `tokens`;
INSERT INTO `tokens` (`ID`, `token`, `user_id`, `expiration`) VALUES
	(3, '7368645', 1, '2025-09-07 18:37:49');

-- Listage de la structure de table eloquencia. tokens_admin
CREATE TABLE IF NOT EXISTS `tokens_admin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(32) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `expiration` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table eloquencia.tokens_admin : ~24 rows (environ)
DELETE FROM `tokens_admin`;
INSERT INTO `tokens_admin` (`ID`, `token`, `user_id`, `expiration`) VALUES
	(1, '4372547', 2, '2024-09-09 09:57:21'),
	(28, '6400862', 1, '2025-04-29 11:33:55');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

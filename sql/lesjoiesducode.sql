-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 22 Octobre 2015 à 18:21
-- Version du serveur :  5.6.26
-- Version de PHP :  5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `lesjoiesducode`
--
CREATE DATABASE IF NOT EXISTS `lesjoiesducode` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lesjoiesducode`;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL,
  `author` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `author`, `content`, `creation_date`) VALUES
(1, 'Claire', 'Aujourd''hui, mon fils de 3 ans m''a réveillée soudainement en pleine nuit en pleurant. Paniquée, j''ai couru jusqu''à sa chambre. La raison de ce hurlement ? "Mais moi je veux pas de sourciiiiiiiils !" JDC', '2015-10-07 00:00:00'),
(2, 'Bobby', 'Aujourd''hui, j''annonce à ma fille de 11 ans qu''il neige. Sa réponse : "Tu l''as su par Facebook ?" Euh non, on a aussi des fenêtres chez nous. JDC', '2015-08-17 00:00:00'),
(3, 'John', 'Aujourd''hui, je suis stagiaire au sein d''un cabinet d''avocats. Un avocat m''annonce que pour les 50 ans du cabinet ils font une photo groupée et qu''ils comptent sur ma présence. "Avec plaisir !" - "Mais pour prendre la photo, hein." JDC', '2015-09-30 00:00:00'),
(12, 'FarmGirlintheTrain', 'Aujourd''hui, alors que j''étais en train de faire une crise d''asthme dans le train après avoir couru pour ne pas le rater, une dame vient me voir et me dit : "Excusez-moi mais pourriez-vous faire moins de bruit ? J''ai l''impression d''être dans une ferme." VDM', '2015-10-19 22:15:27'),
(13, 'Tricot-pique', 'Aujourd''hui, ma belle-mère a tricoté une combinaison en laine pour notre bébé. Voulant faire bonne figure et avant qu''elle ne soit trop petite, je l''ai mise à bébé pour le prendre en photo. Elle y avait laissé deux épingles. VDM', '2015-10-19 21:52:49'),
(14, 'pasdebol', 'Aujourd''hui, je reçois deux courriers de la part des deux personnes avec qui je suis en contact pour monter un projet. La première m''apprend qu''elle a changé de boîte. L''autre qu''il part en mission en mer pour plusieurs mois, et ne lira pas ses e-mails durant cette période. VDM', '2015-10-19 19:41:06'),
(15, 'Anonyme', 'Aujourd''hui, ma copine et moi tombons sur son ex par hasard dans la rue, l''ex dont elle était absolument amoureuse. C''est émue qu''elle nous présente l''un à l''autre : "Voici mon ex." C''est moi qu''elle pointait du doigt. VDM', '2015-10-19 11:44:05'),
(16, 'Tiii', 'Aujourd''hui, mon frère cherche quelque chose dans la maison depuis une demi-heure. Qu''a-t-il perdu ? Ses clés ? Un stylo ? Un livre ? Non non, son matelas. Il a perdu son matelas dans la maison. VDM', '2015-10-18 20:22:38'),
(17, 'Anonyme', 'Aujourd''hui, avec une dizaine d''amis, nous louons un appartement pour les vacances. Une fois arrivés, nous nous sommes vite rendus compte d''un détail intéressant non mentionné dans l''annonce : il n''y a pas de salle de bain, mais une douche en plein milieu de la cuisine. VDM', '2015-10-18 18:57:57'),
(18, 'Siriabruti', 'Aujourd''hui, ma mere découvre Siri sur son iPhone. Depuis une demi-heure j''entends de sa chambre : "Jonathan est-il gentil ?", "Jonathan est-il un abruti ?" Jonathan, c''est moi. VDM', '2015-10-18 17:41:45'),
(19, 'JeVeuxDormir', 'Aujourd''hui, je fais Nancy-Marseille en train. Après deux heures de voyage et m''être enfin endormie, une dame m''a réveillée pour savoir si elle pouvait s''asseoir à côté de moi. Le wagon était vide. VDM', '2015-10-18 17:29:40'),
(20, 'lisachat', 'Aujourd''hui, myope et sans lunettes, j''ai surveillé pendant 15 minutes un enfant qui n''était pas le mien. Je m''en suis rendu compte quand la chair de ma chair a dégringolé d''une branche d''arbre 5 mètres plus loin. VDM', '2015-10-18 16:01:11'),
(21, 'Anonyme', 'Aujourd''hui, je trouve enfin les sacs pour mon vieil aspirateur et comme ils sont rares, j''achète le stock, pensant prévoir pour les années à venir. Mon aspirateur est mort aujourd''hui. VDM', '2015-10-18 08:10:40'),
(22, 'Casic', 'Aujourd''hui, je suis remplaçante en maternelle. Tout se passe bien, jusqu''à ce que je demande à un petit garçon ce qu''il a dans la main. "Ben mon caca maîtresse". VDM', '2015-10-18 04:16:04'),
(23, 'esclavagiste', 'Aujourd''hui, je me suis fait huer, traiter d''esclavagiste et taguer la voiture par des employés et syndicalistes en colère. Je n''étais que le réparateur de la machine à café. VDM', '2015-10-18 01:57:17'),
(24, 'Anonyme', 'Aujourd''hui, j''envoie un selfie à mon potentiel petit ami avec la tenue que je porterai pour notre premier rendez-vous. Je n''avais pas vu qu''il y avait mon énorme sextoy en arrière plan. Lui, si. VDM', '2015-10-17 23:25:53'),
(25, 'Fio', 'Aujourd''hui, et depuis l''installation de ma nouvelle cuisine, il y a un espace entre ma gazinière et mon plan de travail. Ce midi, j''ai déposé un oeuf sur le plan, celui-ci a roulé tout doucement et a fini par tomber dans le trou. Impossible de le récupérer sans tout démonter. VDM', '2015-10-17 23:25:37'),
(26, 'Anonyme', 'Aujourd''hui, je suis allée au lavomatique. Après avoir verrouillé la porte de la machine à laver, une erreur apparait. Je ne peux pas récupérer mon linge et mes jetons. Le gérant est en vacances et rentre mardi. On est samedi. VDM', '2015-10-17 21:38:26'),
(27, 'Supervol', 'Aujourd''hui, mes voisins ont comme photo de profil la poubelle d''extérieur pour les déchets recyclables qu''ils m''ont volée l''année dernière. Drôle de prise d''otage. VDM', '2015-10-17 16:11:51'),
(28, 'Soliianow', 'Aujourd''hui, et depuis quelques temps, j''habite en Espagne. En attendant le tram, je suis au soleil, il fait chaud, je décide donc de me mettre à l''ombre... Sous MON ombre et ceci pendant une dizaine de secondes avant de comprendre que c''était difficilement réalisable. VDM', '2015-10-17 14:07:58'),
(29, 'Anonyme', 'Aujourd''hui, mon directeur d''hôtel a fait installer des caméras de surveillance sur le parking. Nous n''avions jamais eu de cas de vol jusqu''à cette nuit, où on voit très bien le voleur sur les caméras, en train d''exploser les vitres d''une voiture à coups de batte de baseball. La mienne. VDM', '2015-10-17 05:46:08'),
(30, 'Ironshoes', 'Aujourd''hui, je me suis cassé un pied au travail lorsqu''un carton particulièrement lourd est tombé dessus. Accident bête, d''autant plus que l''objet du crime était rempli de chaussures de sécurité fabriquées par notre entreprise. VDM', '2015-10-17 02:47:15'),
(31, 'Très français', 'Aujourd''hui, étant professeur de français, je corrige des rédactions. Dans une, j''ai pu trouver des ":)" ou encore des "*-*" en fin de phrase. VDM', '2015-10-17 00:02:16'),
(32, 'Cassambre', 'Aujourd''hui, je tombe sur la lampe à luminothérapie de ma soeur et décide de la tester en ce jour de grisaille. Au bout de 2 heures, je ne la trouve pas très efficace. Mon père passe, s''arrête, et me demande ce que je fais avec la lampe à lumière noire anti-insecte. Je me demande aussi. VDM', '2015-10-16 21:50:36'),
(33, 'Anonyme', 'Aujourd''hui, je suis ouvrier dans le bâtiment, et je travaille en hauteur dans une cour de collège. J''ai reçu un tonnerre d''applaudissements des élèves lorsque j''ai remonté mon pantalon. VDM', '2015-10-16 16:51:37'),
(34, 'Badawada', 'Aujourd''hui, je comprends enfin d''où vient cette forte odeur de cigarette devant la porte de mon appartement : mon voisin bizarre fume devant notre porte quand il me pense absente depuis que mon père lui a dit que j''étais asthmatique. VDM', '2015-10-16 12:45:43'),
(35, 'Shimshi', 'Aujourd''hui, première nuit avec mon copain. Malgré le fait qu''il m''ait prévenue qu''il faisait un peu de bruit en dormant, j''ai été très surprise. En effet : il ne parle pas en dormant, il miaule. VDM', '2015-10-16 11:39:40'),
(36, 'Morticia', 'Aujourd''hui, je vais dormir pour la première fois chez ma nouvelle petite-amie gothique. Les bougeoirs en forme de squelette et les posters sanglants passent encore, mais la collection de véritables têtes réduites a fini d''assécher toute l''attirance que j''avais pour elle. VDM', '2015-10-16 01:17:43'),
(37, 'anonyme', 'Aujourd''hui, la fille de mes rêves me fait enfin sa déclaration : "Tu es vraiment l''homme parfait : drôle, charmant, intelligent… tu as tout pour toi, je t''apprécie énormément. Dommage que tu sois noir." VDM', '2015-10-15 23:16:18'),
(38, 'Anonyme', 'Aujourd''hui, je suis le capitaine d''un bateau destiné à des excursions touristiques sur la Manche. Une dame est venue solliciter mon intervention afin de diminuer le volume des vagues, car "ça tangue trop et je suis malade." VDM', '2015-10-15 23:06:43'),
(39, 'Bhcjcc', 'Aujourd''hui, j''accueille des clients au restaurant. Ils m''annoncent qu''au lieu de 5 personnes, ils ne seront que 4, car je cite : "L''autre est morte." VDM', '2015-10-15 21:37:33'),
(40, 'cretindechat', 'Aujourd''hui, mon lit se trouve sous un Velux. Pendant mon sommeil, sentant une pression sur ma tête, je me réveille. Mon chat était debout, ses pattes arrières sur mon front, en train de regarder par la fenêtre. Mon chat me prend pour un escabeau. VDM', '2015-10-15 19:35:36'),
(41, 'VMCM09', 'Aujourd''hui, en cours de sociologie, nous écoutons notre prof citer une phrase qu''il juge en parfaite adéquation avec le cours. Une citation de Marx ou de Durkheim ? Non, non, une réplique de Jurassic Park. VDM', '2015-10-15 19:23:58'),
(42, 'Daelith', 'Aujourd''hui, j''accepte enfin d''accompagner un copain, qui me le demande depuis plusieurs semaines, à une soirée où je ne connais personne. Après une heure de route, je l''attends sur place, timide, dans un coin. Il n''est jamais venu. VDM', '2015-10-15 18:55:59'),
(43, 'Anonyme', 'Aujourd''hui, prof au lycée, je donne par inadvertance un coup de coude dans le store blanc du vidéoprojecteur, qui remonte brusquement, percute l''horloge au dessus du tableau, qui me tombe sur la tête. Le tout devant mes élèves. VDM', '2015-10-15 18:48:28'),
(44, 'dash2en1', 'Aujourd''hui, lorsque j''arrive à la maison mon copain m''annonce fièrement qu''il a pensé à mettre en route la machine à laver. Lessive, adoucissant, lingette anti-décoloration, c''est un sans faute. Il a juste oublié de fixer le tuyau d''évacuation dans la baignoire, et la salle de bain est inondée. VDM', '2015-10-15 12:54:24'),
(45, 'Varvouille', 'Aujourd''hui, je pars de la maison assez fatiguée. En arrivant devant le parking de mon travail, j''entends une petite voix me dire : "Mais maman, c''est pas là l''école." J''ai oublié de déposer ma fille. VDM', '2015-10-15 09:23:54'),
(46, 'Anonyme', 'Aujourd''hui, une amie m''annonce un décès dans sa famille. Je suis tellement douée pour réconforter les gens que la seule phrase qui m''est venue c''est : "De toute façon, on va tous y passer un jour." VDM', '2015-10-14 22:24:23');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` char(60) NOT NULL,
  `newsletter` tinyint(1) DEFAULT '0',
  `created_date` datetime NOT NULL,
  `modified_date` datetime DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `gender`, `email`, `password`, `newsletter`, `created_date`, `modified_date`) VALUES
(6, 'John', 'Doe', 'male', 'nibblerz@gmail.com', '$2y$10$l1J0p1oN.kKhguaQKTiGNeb2rxMhCxRddArC.edOIE8sVeCcQBwmm', 1, '2015-10-22 15:30:45', '0000-00-00 00:00:00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 25 avr. 2024 à 12:53
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `m2i_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `id_categories` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_categories0_FK` (`id_categories`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `id_categories`) VALUES
(1, 'Surf', 'surf', NULL),
(2, 'Longboard', 'longboard', 1),
(3, 'Shortboard', 'shortboard', 1),
(4, 'Voyage', 'voyage', NULL),
(5, 'Bali', 'bali', 4);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `id_users` int NOT NULL,
  `id_posts` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_users0_FK` (`id_users`),
  KEY `comments_posts1_FK` (`id_posts`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `content`, `createdAt`, `id_users`, `id_posts`) VALUES
(1, 'Un super commentaire 1', '2024-03-01 00:00:00', 2, 1),
(2, 'Un super commentaire 2', '2024-03-02 00:00:00', 2, 3),
(3, 'Un super commentaire 3', '2024-03-03 00:00:00', 2, 1),
(4, 'Un super commentaire 4', '2024-03-04 00:00:00', 2, 2),
(5, 'Un super commentaire 5', '2024-03-05 00:00:00', 2, 2),
(6, 'Un super commentaire 6', '2024-03-06 00:00:00', 2, 1),
(7, 'Un super commentaire 7', '2024-03-07 00:00:00', 2, 3),
(8, 'Un super commentaire 8', '2024-03-08 00:00:00', 2, 1),
(9, 'Un super commentaire 9', '2024-03-09 00:00:00', 2, 1),
(10, 'Un super commentaire 9', '2024-03-09 00:00:00', 2, 4),
(11, 'Un super commentaire 10', '2024-03-10 00:00:00', 2, 2),
(12, 'Super article', '2024-03-28 15:45:27', 1, 7),
(13, 'Très bel article !!!', '2024-03-29 16:34:17', 1, 7);

-- --------------------------------------------------------

--
-- Structure de la table `define`
--

DROP TABLE IF EXISTS `define`;
CREATE TABLE IF NOT EXISTS `define` (
  `id` int NOT NULL,
  `id_tags` int NOT NULL,
  PRIMARY KEY (`id`,`id_tags`),
  KEY `define_tags1_FK` (`id_tags`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `define`
--

INSERT INTO `define` (`id`, `id_tags`) VALUES
(2, 1),
(3, 1),
(1, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `image` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `id_users` int NOT NULL,
  `id_categories` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_AK` (`slug`),
  KEY `posts_users0_FK` (`id_users`),
  KEY `posts_categories1_FK` (`id_categories`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `createdAt`, `updatedAt`, `image`, `active`, `id_users`, `id_categories`) VALUES
(1, '10 bonnes raisons de surfer en Guadeloupe', '10-bonnes-raisons-de-surfer-en-guadeloupe', 'Et oui! La meilleure des raisons est probablement celle-ci! Surfer en short et torse nu! Fini le quart d’heure à batailler pour enfiler sa combinaison, les épaules qui chauffent à la rame, et les manoeuvres difficiles. Bien qu’aujourd’hui les combinaisons soient hyper stretch, on est tellement plus libre à poil! Les locaux mettent des top Néoprène l\'hiver à cause des Alyzées un peu frais, mais les habitués au froid se ferons un plaisir de surfer torse nu! cependant, n\'oubliez surtout pas votre protection solaire! Une bonne crème solaire minérale pour protéger les coraux et un bon lycra manche longue seront vos alliés durant votre séjour au soleil!', '2024-01-10 00:00:00', '2024-02-08 00:00:00', 'https://surfexcellence.com/wp-content/uploads/2022/05/IMG_0311-2048x1365.jpeg', 1, 1, 4),
(2, 'Comment entretenir sa planche de surf?', 'comment-entretenir-sa-planche-de-surf', 'Comment entretenir sa planche de surf est la première chose à laquelle tout surfeur pense lorsqu\'il achète un beau jour sa planche de surf. On sait tous qu’une planche de surf est sacrée pour un surfeur. On en prendra donc grand soin, à tel point que ce bout de résine finira par dormir sur votre lit!!! Alors voici nos conseils pour savoir comment entretenir sa planche de surf. La première chose à laquelle on pense lorsqu’on obtient sa board, c’est de ne pas l’esquinter, de la garder la plus neuve possible. On a tous envie de garder notre petit bijou intact, et voire même d’en tirer le meilleur prix lors de la revente. Ce que l’on craint le plus c’est d’y faire un trou qui pourrait laisser y entrer de l’eau. Un « PET » dans le jargon du surf.', '2024-01-12 00:00:00', '2024-01-12 00:00:00', 'https://surfexcellence.com/wp-content/uploads/2021/09/BEACH_ACTIVITIES.jpeg', 0, 1, 1),
(3, 'Comment choisir et acheter sa première planche de surf ?', 'comment-choisir-et-acheter-sa-premiere-planche-de-surf', 'Tout d’abord, demandez l’avis de votre moniteur de surf (et non celui de votre pote de surf!!!). Qui vous donnera des types de planches adaptées à votre niveau de surf. Surtout n’hésitez pas à essayer un modèle de planche que vous pouvez louer ou emprunter à un pote avant de faire votre achat ! C’est pourquoi nous vous conseillons de penser à acheter une planche de surf à partir du moment où vous vous sentez à l’aise sur une planche en dur (planche de surf en résine époxy ou polyester). « Ne pas mettre la charrue avant les bœufs ! ». Tout surfeur va en général trop vite en besogne lorsqu’il est question d’acheter sa première planche de surf. Et oui ! Or, trop souvent, nous voyons des pratiquants avoir des difficultés à progresser du fait de leur planche trop petite, donc trop instable, qui ne glisse pas assez vite et qui est, en plus, difficile à la rame !', '2024-02-08 00:00:00', '2024-02-08 00:00:00', 'https://surfexcellence.com/wp-content/uploads/2021/08/Formats-de-planches-de-surf.jpg', 1, 1, 1),
(4, 'Teahupoo : Pétition contre la Tour en aluminium pour les JO de Paris 2024', 'teahupoo-petition-contre-la-tour-en-aluminium-pour-les-jo-de-paris-2024', 'Elle fait partie du paysage et de l’écosystème de la vague mythique de Teahupoo à Tahiti : la fameuse tour en bois qui permet aux juges d’avoir une vue imprenable sur le spot pour apprécier les exploits des surfeurs. Oui mais voilà : pour l’épreuve de surf des Jeux Olympiques de Paris 2024, c’est une tour beaucoup plus sophistiquée et potentiellement néfaste pour l’environnement marin et la célèbre vague qui est requise par l’organisation. Les surfeurs locaux et la communauté surf internationale lancent une mobilisation contre cet équipement nuisible à son environnement. Vous pouvez signer la pétition ici. Pour remettre les choses dans leur contexte, la tour traditionnelle en bois était assemblée chaque année dans le lagon juste avant les dates de l’épreuve du Tahiti Pro et démontée juste après, avec à peu près la même structure totalement éco-conçue depuis une vingtaine d’années. L’organisation des Jeux Olympiques de Paris 2024 a fixé un cahier des charges beaucoup plus exigeant pour cette tour de jugement qui est censée accueillir plus de monde dans des conditions de sécurité et de confort maximal avec… de l’électricité, de l’eau pour les toilettes et un système d’évacuation, des câbles pour Internet à haut débit et même la climatisation dans la salle des juges ! On sait que le mieux est parfois l’ennemi du bien mais là on se demande si l’organisation n’est pas tombée sur la tête en confondant cette merveille de la nature qu’est Teahupoo avec le quartier de la Défense à Paris… Cette tour en aluminium serait supportée par des plots en béton avec des câbles et des canalisations sous-marines, tous susceptibles d’altérer le récif, de déséquilibrer la vie marine et d’altérer voire de faire disparaître la vague de Teahupoo. Le coût pharaonique de la structure a également été pointé du doigt : 527 millions de francs pacifiques soit plus de 4,4 millions d’euros. Une forte mobilisation a été lancée par les locaux de Tahiti ce week-end et une pétition qui a déjà obtenu des dizaines de milliers de signatures circule sur les réseaux sociaux. C’est le surfeur local Matahi Drollet qui a pris la parole dans une vidéo très partagée sur son compte Instagram pour bien expliquer les enjeux. Matahi Drollet évoque les risques de stress sur la vie marine et le risque potentiel de propagation de la ciguatera avec des conséquences directes sur la vie et la santé de la population qui vit et se nourrit du poisson. Matahi Drollet en appelle directement à l’organisation des JO pour une prise de conscience de l’enjeu environnemental et l’arrêt de ce projet disproportionné impactant négativement l’écosystème.', '2024-02-09 00:00:00', '2024-02-09 00:00:00', 'https://blog.surf-prevention.com/wp-content/uploads/2023/10/teahupoo-tour-reef.jpg', 1, 1, 1),
(5, 'Mikala Jones : la Cause de son Accident de Surf tragique', 'mikala-jones-la-cause-de-son-accident-de-surf-tragique', 'La communauté du surf est une nouvelle fois endeuillée suite à la mort tragique et prématurée de l’un de ses free surfeurs les plus appréciés, Mikala Jones, 44 ans, mort des suites d’un terrible accident de surf aux Mentawai. Les images de Mikala Jones avaient fait le tour du monde car c’était l’un des tous meilleurs pour filmer l’intérieur des tubes qu’il surfait avec sa GoPro et offrir des angles de vue inédits. Il était également apprécié pour sa gentillesse et son humilité. Les détails de l’accident sont incomplets mais on en sait suffisamment aujourd’hui pour déterminer la cause de son décès. Mikala Jones et sa famille séjournaient au Awera Resort dans le North Sipora (Mentawai). Alors qu’il surfait le dimanche 9 juillet 2023 aux alentours de 9 heures 15 du matin, il aurait subi un accident de surf contre sa planche occasionnant une blessure profonde au niveau de son aine gauche. La blessure profonde faisait environ 10 centimètres de long et aurait touché l’artère fémorale, l’une des plus grosses artères de l’organisme dont la perforation peut être rapidement fatale. C’est malheureusement ce qui est arrivé à Mikala Jones qui aurait fait un choc hémorragique des suites des pertes importantes de sang. La cause probable de cette plaie profonde est une dérive de sa planche de surf. Les responsables du Awera Resort ont immédiatement contacté le Mentawai Hospital qui a envoyé une équipe pour récupérer Mikala Jones à Tuapejat Pier où il avait été transporté par bateau. Malheureusement, sa mort a été prononcée à l’hôpital.', '2024-02-10 00:00:00', '2024-02-10 00:00:00', 'https://blog.surf-prevention.com/wp-content/uploads/2023/07/mikala-jones.jpg', 1, 1, 1),
(6, 'Le Surf : Une Drogue ou un Traitement des Addictions ?', 'le-surf-une-drogue-ou-un-traitement-des-addictions', 'Un grand débat sur le surf et les addictions auquel j’ai eu l’honneur de participer s’est tenu le Mardi 1er Octobre 2019 à l’espace Bellevue à Biarritz en ouverture du grand congrès ATHS suivie de la projection du film d’Andy Irons. Débat à revoir en intégralité ici : Le débat est intitulé : « Surf : une drogue, un chemin vers la drogue, un traitement de la drogue ? » et sera illustré par le film Kissed by God, documentaire sur la vie du triple champion du monde de surf, Andy Irons, décédé en 2010, des suites de ses addictions et victime collatérale de la crise des opiacés (+ 70 000 morts / an aux USA). Le débat réunira des surfeurs et des spécialistes des addictions (certains étant surfeurs eux-mêmes). Outre la dimension pédagogique d’un tel débat, il permettra la mise en lumière, sous l’angle des addictions, d’une réalité largement passée sous silence depuis l’avènement de l’industrie du surf. Animateur : – Franck Lacaze, ex-surfeur pro, journaliste, commentateur du circuit mondial de surf à la TV (RMC Sport), ex-rédacteur en chef de Surf Trip Magazine. Intervenants dans le débat : Marc Auriacombe : Professeur de médecine, spécialité psychiatrie & addiction à l’Université de Bordeaux et de Philadelphie, directeur de l’unité de recherche USR 3413 au CNRS. Joel Darrigues : Surfeur (témoignage personnel sur les conséquences de son addiction aux substances psychotropes). Gautier Garanx : surfeur de gros, Biggest Wave Award 2014 (19 m à Belharra ) et coach de surf. Augustin Voisin : Addictologue et surfeur. Guillaume Barucq : Docteur en médecine générale et surfeur, rédacteur du blog surf prévention. Gibus de Soultrait: journaliste, directeur de Surfer’s Journal France, co-fondateur magazine SurfSession, enseignant master de glisse (Université Bordeaux II) et surfeur. Nota Bene : Débat et film en accès libre au public, traduction simultanée anglais, espagnol et diffusé en direct sur Youtube. Le débat aura lieu sous forme de table ronde. Pour des raisons d’organisation, le film « Kissed by God » sera diffusé à 20h après le débat, et dans la même salle (30 minutes d’entracte sont prévues)', '2024-02-11 00:00:00', '2024-02-11 00:00:00', 'https://blog.surf-prevention.com/wp-content/uploads/2019/10/andy-irons-kissed-by-god.jpg', 1, 1, 1),
(7, 'Ambassadeur /photographe & maintenant responsable de Surfcamp !', 'ambassadeur-photographe-maintenant-responsable-de-surfcamp', 'Il y a vingt-cinq ans que je prenais mes premières mousses. Entre coupés d’une pause, voici des années que je navigue avec l’océan. Inspiré par des types comme Lost in the Swell ou Damien Castera j’ai toujours pris un chemin plus solitaire. Plus silencieux. Fan inconditionnelle de Hugo Verlomme; j’ai un faible pour Corentin de Chatelperron et de ce qu’il fait avec le nomade des mers. Enfin disons plutôt ce qu’ils font parce qu’il n’est pas seul.\r\n\r\nIl est cinq heures du matin. J’ouvre ma boite mail pour y découvrir le message de Rémi, patron du Sossego surfcamp. J’ai vingt ans et me voilà partie pour partir au Brésil comme moniteur de surf. À la suite de ça c’est enchainé des années de trips à travers le monde. C’est l’amitié qui me permettra de rencontrer Matthieu, aujourd’hui CEO de 360°surf. Je suis alors en Indonésie. Une belle aventure commence alors avec cette jeune agence. Petit à petit je deviens photographe, reporter et rédacteur d’article puis ambassadeur de la marque. J’ai continué à sillonner le monde à la recherche de vague parfaite. Si le surf guide mes voyages, c’est l’aventure qui marque ma personnalité. Il ne fut pas rare que je quitte la côte pour les montagnes. Il ne fut pas rare que je ne trouve pas de vagues. On ne sait donc plus où aller et l’aventure démarre. Année après année c’est dans une âme d’aventurier que je me sens le mieux. Devenu moniteur et préparateur mental dans le surf ce n’est finalement qu’une petite partie de ma vie. Je n’y consacre pas tout mon temps. Cela m’a permis d’aller découvrir des spots à travers plus de 40 destinations. Cela m’a permis de vivre d’autres expériences.\r\n\r\nLe vrai voyage, c’est d’y aller. Une fois arrivé, le voyage est fini. Aujourd’hui les gens commencent par la fin.\r\nHugo Verlomme\r\n\r\nAujourd’hui le contexte m’a permis de ne plus imaginer de long voyage à l’autre bout du monde. D’abord parce que j’essaie d’associer la notion de durabilité avec le surf. Si je ne refuse pas de prendre l’avion, je pense qu’il était temps pour moi de diminuer mes heures de vol. La durabilité c’est la configuration de la société qui lui permet d’assurer sa pérennité, ça me tient à coeur. C’est comme ça que je me suis retrouvé en Galice. J’y avais fait plusieurs trips il y a de longues années. J’y suis revenu avec ce goût particulier d’un souvenir inoubliable. En effet, la Galice dispose d’innombrables plages sauvages, des réserves naturelles et de parcs naturels, sans parler de la côte et ses vagues, qui sont un héritage  et servent de ressources pour d’activités sportives, socio-économiques et culturelles. Ces ressources doivent à tout prix d’être préservées à travers un tourisme durable.\r\n\r\nJ’ai donc décidé d’y poser mes valises quelques mois par ans pour diriger une équipe d’aventurier(e)s au sein de la toute nouvelle Surf-House de Villarube. ', '2024-03-28 15:25:48', '2024-03-28 15:25:48', 'https://www.360-surf.com/wp-content/uploads/2022/04/480A4478-scaled.jpg', 1, 1, 4),
(8, 'Ils ont surfé Teahupoo avec un casque', 'ils-ont-surf-teahupoo-avec-un-casque', 'Surf Prevention milite depuis le début pour la prévention des traumatismes crâniens en surf qui sont une cause majeure de blessures et de noyade accidentelle chez les surfeurs.\r\n\r\nEn plus de tout faire pour éviter de se cogner la tête contre le fond, le port du casque peut s’avérer indispensable dans certaines situations.\r\n\r\nLe casque reste le meilleur moyen à notre disposition pour protéger notre tête, mais encore trop peu de surfeurs en portent, y compris sur des spots de reef aussi dangereux que Teahupoo. Une prise de conscience semble néanmoins se faire jour chez de plus en plus de riders. Et l’accident de Benjamin Sanchis est encore venu rappeler qu’un choc de la tête contre le reef peut entraîner une perte de connaissance avec risque de noyade.\r\n\r\nPendant la très grosse houle qui a frappé Tahiti en début de semaine, il est intéressant de remarquer que plusieurs surfeurs arboraient un casque. C’était le cas pour Garrett McNamara et son neveu Landon McNamara qui en portent régulièrement, pour Keala Kennelly victime d’un grave traumatisme facial lors de sa dernière venue à Teahupoo et même pour le surfeur hard-core Nathan Fletcher, comme on peut le voir sur ces photos prises par Tim McKenna.', '2024-04-02 08:27:45', '2024-04-02 08:27:45', 'https://blog.surf-prevention.com/wp-content/uploads/2013/05/landon-mcnamara-e1368998553610.jpg', 1, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug` varchar(30) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`) VALUES
(1, 'Matériel', 'materiel'),
(2, 'Voyage', 'voyage'),
(3, 'Sécurité', 'securite'),
(4, 'Entrainement', 'entrainement');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `lastName` varchar(90) COLLATE utf8mb3_unicode_ci NOT NULL,
  `firstName` varchar(90) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(140) COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_AK` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `lastName`, `firstName`, `email`, `phone`, `password`, `role`) VALUES
(1, 'Doe', 'John', 'user@mail.com', '1234567890', '$2y$10$/3R/kmUgO2twGlfIaiQFiOLei4gzF.59fTXes1zU87efX4wfzurU6', 'ROLE_USER'),
(2, 'Dupont', 'Pierre', 'moderateur@mail.com', '1234567890', '$2y$10$EkSIEMBex6.lSmRWbzCeRODwRhBEKAXL0BnLIxHUTecQd8bIks0sW', 'ROLE_MODER'),
(3, 'Giraud', 'Philippe', 'admin@mail.com', '1234567890', '$2y$10$4lcQorRRI2pC.QU3Qwj/zeq8hSQMyad6MRCTiEsTxIj8SX4t30AbC', 'ROLE_ADMIN');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_categories0_FK` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id`);

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_posts1_FK` FOREIGN KEY (`id_posts`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_users0_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `define`
--
ALTER TABLE `define`
  ADD CONSTRAINT `define_posts0_FK` FOREIGN KEY (`id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `define_tags1_FK` FOREIGN KEY (`id_tags`) REFERENCES `tags` (`id`);

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_categories1_FK` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `posts_users0_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

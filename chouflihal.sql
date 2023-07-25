-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2023 at 08:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chouflihal`
--

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

CREATE TABLE `avis` (
  `idA` int(50) NOT NULL,
  `rating` int(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `review` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `avis`
--

INSERT INTO `avis` (`idA`, `rating`, `name`, `location`, `title`, `review`, `id`) VALUES
(1, 5, 'syrina', 'TUNISIA', 'J ADORE', 'benna ala benna WZYDHA BENNA', 26);

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(5) NOT NULL,
  `expire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `codes`
--

INSERT INTO `codes` (`id`, `email`, `code`, `expire`) VALUES
(1, 'salim.mahdi@esprit.tn', '66976', 1683149675),
(2, 'salim.mahdi@esprit.tn', '19542', 1683149727),
(3, 'salim.mahdi@esprit.tn', '89258', 1683150020),
(4, 'salim.mahdi@esprit.tn', '31003', 1683150022),
(5, 'salim.mahdi@esprit.tn', '62040', 1683150074),
(6, 'salim.mahdi@esprit.tn', '45743', 1683150075),
(7, 'salim.mahdi@esprit.tn', '72364', 1683150076),
(8, 'salim.mahdi@esprit.tn', '75454', 1683150078),
(9, 'malek.miri@esprit.tn', '99952', 1683150621),
(10, 'malek.miri@esprit.tn', '26108', 1683150622),
(11, 'malek.miri@esprit.tn', '45173', 1683150623),
(12, 'salim.mahdi@esprit.tn', '41371', 1683150649),
(13, 'salim.mahdi@esprit.tn', '69498', 1683150750),
(14, 'skander.landolsi@esprit.tn', '37795', 1683150870),
(15, 'skander.landolsi@esprit.tn', '48102', 1683150871),
(16, 'salim.mahdi@esprit.tn', '92512', 1683151182),
(17, 'salim.mahdi@esprit.tn', '44771', 1683151344),
(18, 'salim.mahdi@esprit.tn', '80482', 1683151421),
(19, 'salim.mahdi@esprit.tn', '40757', 1683151899),
(20, 'salim.mahdi@esprit.tn', '19657', 1683151993),
(21, 'salim.mahdi@esprit.tn', '36955', 1683152023),
(22, 'salim.mahdi@esprit.tn', '99554', 1683152075),
(23, 'salim.mahdi@esprit.tn', '17745', 1683152682),
(24, 'malek.miri@esprit.tn', '60410', 1683157317),
(25, 'malek.miri@esprit.tn', '69620', 1683157320),
(26, 'nasri.youssef@esprit.tn', '54958', 1683157513),
(27, 'mohamed.elhammi@esprit.tn', '72694', 1683194923),
(28, 'gasmirania363@gmail.com', '39262', 1683478558),
(29, 'gasmirania363@gmail.com', '16264', 1683478829),
(30, 'gasmirania363@gmail.com', '18429', 1683478932);

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `IdCommande` int(20) NOT NULL,
  `IdUser` int(20) NOT NULL,
  `DateCommande` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`IdCommande`, `IdUser`, `DateCommande`) VALUES
(2, 77, '2023-05-23'),
(111, 326, '2023-04-26'),
(784, 1111, '2023-05-03'),
(1414, 111, '2023-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `Id_organisateur` int(11) NOT NULL,
  `nom_event` varchar(30) NOT NULL,
  `date_event` date NOT NULL,
  `type_event` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `Id_organisateur`, `nom_event`, `date_event`, `type_event`) VALUES
(1, 3, 'conference', '2023-04-06', 'conference.jpg'),
(2, 0, 'aa', '2023-05-24', 'aaaaaa'),
(3, 0, 'Conference', '2023-05-10', 'confernce.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `livraison`
--

CREATE TABLE `livraison` (
  `IdCommande` int(20) NOT NULL,
  `IdLivreur` int(20) NOT NULL,
  `Destinataire` varchar(20) NOT NULL,
  `DateLivraison` datetime NOT NULL,
  `Adresse` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `livraison`
--

INSERT INTO `livraison` (`IdCommande`, `IdLivreur`, `Destinataire`, `DateLivraison`, `Adresse`) VALUES
(111, 2, 'Malek', '2023-06-09 00:00:00', 'Sfax');

-- --------------------------------------------------------

--
-- Table structure for table `organisateur`
--

CREATE TABLE `organisateur` (
  `Id_organisateur` int(11) NOT NULL,
  `Nom_organisateur` varchar(30) NOT NULL,
  `num_organisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organisateur`
--

INSERT INTO `organisateur` (`Id_organisateur`, `Nom_organisateur`, `num_organisateur`) VALUES
(1, 'AMIN', 21);

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `id_panier` int(11) NOT NULL,
  `prix_panier` double NOT NULL,
  `quantite` int(11) NOT NULL,
  `produits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `prix`, `image`, `description`) VALUES
(26, 'atomic habits', 24, 'Atomic_habits.jpg', 'QSDFGHJKL'),
(27, 'the mountain is you', 34, 'Atomic_habits.jpg', 'SDFGHJKL'),
(31, 'the mountain is you', 55, 'Atomic_habits.jpg', 'LLLLLLL'),
(33, 'the mountain is you', 33, 'Atomic_habits.jpg', 'SDFGHJ'),
(34, 'aprÃ¨s description', 22, 'Atomic_habits.jpg', 'SDFGHJKL');

-- --------------------------------------------------------

--
-- Table structure for table `reclamations`
--

CREATE TABLE `reclamations` (
  `idReclamation` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dateReclamation` date NOT NULL DEFAULT current_timestamp(),
  `objet` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'en attente'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reclamations`
--

INSERT INTO `reclamations` (`idReclamation`, `nom`, `email`, `dateReclamation`, `objet`, `description`, `status`) VALUES
(6, 'problÃ¨me ', 'gluop@gmail.com', '2023-04-12', 'problÃ¨me comerciale', 'problemcom1', 'traitÃ©'),
(8, 'chahed', 'chahedloumi6@gmail.com', '2023-04-13', 'chahed', '', 'traitÃ©'),
(10, 'problÃ¨me technique', '', '2023-04-13', 'tahe', 'aaaa', 'traitÃ©'),
(11, 'ahmed', 'ahmed@gmail.tn', '2023-04-13', 'probleme commercial', 'essai', 'traitÃ©'),
(12, 'ilef', 'ilef.loumi@yahoo.fr', '2023-04-13', 'probleme technique', '', 'traitÃ©'),
(13, 'waed', 'waed.loumi@esprit.tn', '2023-04-13', 'Rende-vous annulÃ©', 'Essai', 'traitÃ©'),
(14, 'waed', 'waed.loumi@esprit.tn', '2023-04-13', 'Rende-vous annulÃ©', 'Essai', 'en attente'),
(15, 'chahed', 'chahed.loumi@esprit.tn', '2023-04-13', 'problÃ¨me technique', 'essai', 'traitÃ©'),
(16, 'tahe', 'tahe@yahoo.fr', '2023-04-16', 'Rendez-vous annulÃ©', '', 'traitÃ©'),
(17, 'chahed', 'chahed@gmail.com', '2023-04-17', 'problÃ¨me technique', '', 'traitÃ©'),
(18, 'ahmed', 'll@gmail.com', '2023-04-18', 'problÃ¨me technique', 'essai', 'traitÃ©'),
(19, '', 'waed@esprit.tn', '2023-04-22', '', 'essai1', 'traitÃ©'),
(20, 'waed', 'waed@gmail.com', '2023-05-01', 'Rendez-vous annulÃ©', '\r\nJe veux annuler mon rendez-vous de ce samedi à 1', 'traitÃ©'),
(21, 'tahe', 'tahe@gmail.com', '2023-05-01', 'Rendez-vous annulÃ©', '\r\nJe veux annuler mon rendez-vous de ce samedi Ã  ', 'traitÃ©'),
(22, 'ayoub', 'ayoub66@yahoo.fr', '2023-05-01', 'probleme technique', 'Erreurs de paiement', 'traitÃ©'),
(23, 'sadika', 'benfadhelsadika@gmail.com', '2023-05-01', 'problÃ¨me technique', 'Je ne peux pas payer par carte bancaire.', 'en attente'),
(24, 'syrine', 'syrine@esprit.tn', '2023-05-01', 'probleme technique', 'Je ne peux pas payer par carte bancaire.', 'en attente'),
(25, 'syrine', 'syrine@esprit.tn', '2023-05-01', 'probleme technique', 'Je ne peux pas payer par carte bancaire.', 'traitÃ©'),
(26, 'ayoub', 'ayoubzgaya66@gmail.fr', '2023-05-01', 'problÃ¨me technique', 'je ne peut pas ajouter des produits Ã  mon panier ', 'traitÃ©'),
(29, 'ahmed', 'chahedloumi6@gmail.com', '2023-05-03', 'problÃ¨me technique', 'test', 'traitÃ©'),
(30, 'ahmed', 'ahmed6@gmail.com', '2023-05-08', 'problÃ¨me technique', 'je ne peut pas connecter a mon compte', 'en attente'),
(31, 'tassnym', 'tassnym66@hotmail.com', '2023-05-08', 'problÃ¨me technique', 'Je veut prendre un rendez-vous avec Mme lakhdher , mais apparemment ce n\'est pas possible', 'traitÃ©'),
(33, 'ahmed', 'ahmed@gmail.com', '2023-05-09', 'problÃ¨me technique', 'Je ne peut pas utiliser l\'option chat', 'en attente');

-- --------------------------------------------------------

--
-- Table structure for table `reponses`
--

CREATE TABLE `reponses` (
  `idReponse` int(11) NOT NULL,
  `idReclamation` int(11) NOT NULL,
  `dateReponse` date NOT NULL DEFAULT current_timestamp(),
  `descriptionR` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reponses`
--

INSERT INTO `reponses` (`idReponse`, `idReclamation`, `dateReponse`, `descriptionR`) VALUES
(3, 6, '2023-04-27', 'test'),
(8, 12, '2023-04-27', 'essai3'),
(10, 15, '2023-04-28', 'essai'),
(12, 18, '2023-04-28', 'essai'),
(13, 19, '2023-04-28', 'essai'),
(14, 19, '2023-04-28', 'essai'),
(18, 15, '2023-04-28', 'ProblÃ¨me technique resolu'),
(20, 19, '2023-04-28', 'essai'),
(21, 19, '2023-05-01', 'voulez vous changer le rendez-'),
(22, 19, '2023-05-01', 'voulez vous changer le rendez-vous a quel date exacte madame?'),
(25, 11, '2023-05-01', 'Nous sommes dÃ©solÃ©s pour l\'inconvÃ©nient. Nous travaillons sur une solution rapide.'),
(26, 15, '2023-05-01', 'Nous sommes dÃ©solÃ©s que vous ayez rencontrÃ© un problÃ¨me technique. Pouvez-vous nous donner plus '),
(27, 17, '2023-05-01', 'ProblÃ¨me technique resolu'),
(54, 18, '2023-05-01', 'ProblÃ¨me technique resolu'),
(55, 16, '2023-05-01', 'bien notÃ©'),
(61, 10, '2023-05-01', 'Y a-t-il encore un problÃ¨me ?'),
(63, 26, '2023-05-01', 'VÃ©rifiez que les informations de votre carte bancaire sont correctes et que la date d\'expiration n\''),
(64, 20, '2023-05-01', 'test'),
(65, 25, '2023-05-01', 'ProblÃ¨me technique resolu'),
(66, 21, '2023-05-03', 'Y a-t-il encore un problÃ¨me ?'),
(67, 21, '2023-05-03', 'Y a-t-il encore un problÃ¨me ?'),
(68, 22, '2023-05-04', 'test'),
(69, 29, '2023-05-04', 'ProblÃ¨me technique resolu'),
(70, 12, '2023-05-04', 'esaai'),
(73, 13, '2023-05-08', 'Pouvez vous nous gÃ©nÃ©rer plus d\'informations (la date et l\'horaire spÃ©cifique du rendez-vous )?'),
(74, 13, '2023-05-08', 'Y a-t-il encore un problÃ¨me ?');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `Id_rdv` int(11) NOT NULL,
  `id_srv` int(11) NOT NULL,
  `dateR` date NOT NULL,
  `dStart` time NOT NULL,
  `dEnd` time NOT NULL,
  `duree` int(11) NOT NULL,
  `mStatus` enum('Emergency','Normal') NOT NULL,
  `rStatus` enum('Confirm','Cancel','Report') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id_role` int(11) NOT NULL,
  `name_role` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id_role`, `name_role`) VALUES
(1, 'client'),
(2, 'admin'),
(3, 'event');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id_srv` int(11) NOT NULL,
  `type` enum('Basic','Standard','Premium','Platinum') NOT NULL,
  `mode` enum('Virtual','Physical') NOT NULL,
  `freq` int(11) NOT NULL,
  `couts` float NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id_srv`, `type`, `mode`, `freq`, `couts`, `description`) VALUES
(12, 'Standard', 'Virtual', 7, 200, 'new');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `last_name_user` varchar(20) NOT NULL,
  `first_name_user` varchar(20) NOT NULL,
  `phone_user` varchar(10) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `password_user` varchar(50) NOT NULL,
  `role_user` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `last_name_user`, `first_name_user`, `phone_user`, `email_user`, `password_user`, `role_user`) VALUES
(49, 'med', 'elhammi', '52414585', 'mohamed.elhammi@esprit.tn', '123', 1),
(50, 'mahdi', 'salouma', '25980858', 'salim.mahdi@esprit.tn', '12345', 2),
(51, 'malek', 'miri', '54331435', 'malek.miri@esprit.tn', '123', 2),
(57, 'hedi', 'lahmar', '2552263', 'lhedi02@gmail.com', '123', 1),
(59, 'bob', 'hg', '521524', 'salimmahdi660@gmail.com', '123', 1),
(60, 'bobo', 'bob', '452645', 'waelboumeftah@gmail.com', '1234', 1),
(68, 'rania', 'gasmi', '54331435', 'gasmirania363@gmail.com', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `date`) VALUES
(1, 'email@gmail.com', 'password', '2021-07-10 19:40:06'),
(2, 'mary@yahoo.com', 'cool', '2021-07-10 19:40:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`idA`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`),
  ADD KEY `expire` (`expire`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`IdCommande`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`IdLivreur`),
  ADD KEY `ytest` (`IdCommande`);

--
-- Indexes for table `organisateur`
--
ALTER TABLE `organisateur`
  ADD PRIMARY KEY (`Id_organisateur`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id_panier`),
  ADD KEY `pr` (`produits`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reclamations`
--
ALTER TABLE `reclamations`
  ADD PRIMARY KEY (`idReclamation`);

--
-- Indexes for table `reponses`
--
ALTER TABLE `reponses`
  ADD PRIMARY KEY (`idReponse`),
  ADD KEY `idReclamation` (`idReclamation`) USING BTREE,
  ADD KEY `idReclamation_2` (`idReclamation`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`Id_rdv`),
  ADD KEY `id_srv` (`id_srv`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_srv`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_role_role_user` (`role_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avis`
--
ALTER TABLE `avis`
  MODIFY `idA` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `reclamations`
--
ALTER TABLE `reclamations`
  MODIFY `idReclamation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `reponses`
--
ALTER TABLE `reponses`
  MODIFY `idReponse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `Id_rdv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id_srv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `id` FOREIGN KEY (`id`) REFERENCES `produit` (`id`);

--
-- Constraints for table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `ytest` FOREIGN KEY (`IdCommande`) REFERENCES `commande` (`IdCommande`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `pr` FOREIGN KEY (`produits`) REFERENCES `produit` (`id`);

--
-- Constraints for table `reponses`
--
ALTER TABLE `reponses`
  ADD CONSTRAINT `reponses_ibfk_1` FOREIGN KEY (`idReclamation`) REFERENCES `reclamations` (`idReclamation`) ON DELETE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `id_srv` FOREIGN KEY (`id_srv`) REFERENCES `services` (`id_srv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_role_role_user` FOREIGN KEY (`role_user`) REFERENCES `role_user` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

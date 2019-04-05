-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Mrz 2018 um 17:56
-- Server-Version: 10.1.28-MariaDB
-- PHP-Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `mydeliveryservice`
--
CREATE DATABASE IF NOT EXISTS `mydeliveryservice` DEFAULT CHARACTER SET utf8 COLLATE utf8_german2_ci;
USE `mydeliveryservice`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestellungen`
--

DROP TABLE IF EXISTS `bestellungen`;
CREATE TABLE `bestellungen` (
  `id` int(11) NOT NULL,
  `createtAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `bemerkung` varchar(150) DEFAULT NULL,
  `timeOrdered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timeReady` timestamp NULL DEFAULT NULL,
  `timeDelivered` timestamp NULL DEFAULT NULL,
  `paymentMethodsID` int(11) DEFAULT NULL,
  `kundenID` int(11) NOT NULL,
  `rabatte_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `bestellungen`
--

INSERT INTO `bestellungen` (`id`, `createtAt`, `updatedAt`, `bemerkung`, `timeOrdered`, `timeReady`, `timeDelivered`, `paymentMethodsID`, `kundenID`, `rabatte_id`) VALUES
(1, '2018-01-07 13:27:31', '2018-02-28 02:27:24', 'Bitte lange klingeln!', '2018-01-07 13:27:31', NULL, NULL, 1, 1, NULL),
(2, '2018-01-07 13:29:57', '2018-02-28 02:27:24', 'Danke für Rabatt.', '2018-01-07 13:29:57', NULL, NULL, 2, 2, 1),
(20, '2018-02-26 20:14:35', '2018-02-28 02:27:24', NULL, '2018-02-26 20:14:35', NULL, NULL, NULL, 7, NULL),
(40, '2018-02-27 17:02:36', '2018-02-28 02:36:56', 'huhu', '2018-02-27 17:02:36', '2018-02-28 02:36:56', NULL, 1, 12, NULL),
(41, '2018-02-28 10:29:17', '2018-02-28 14:30:43', 'hey', '2018-02-28 10:29:17', '2018-02-28 14:30:43', NULL, 2, 12, NULL),
(42, '2018-02-28 21:07:40', '2018-02-28 21:09:09', 'Schnell, schnell!', '2018-02-28 21:07:40', '2018-02-28 21:09:09', NULL, 2, 15, NULL),
(43, '2018-02-28 21:16:17', '2018-02-28 21:16:46', '', '2018-02-28 21:16:17', '2018-02-28 21:16:46', NULL, 1, 16, NULL),
(44, '2018-02-28 21:18:04', '2018-02-28 21:18:17', '', '2018-02-28 21:18:04', '2018-02-28 21:18:17', NULL, 1, 16, NULL),
(45, '2018-02-28 21:18:50', '2018-02-28 21:18:56', '', '2018-02-28 21:18:50', '2018-02-28 21:18:56', NULL, 1, 16, NULL),
(46, '2018-03-01 16:50:36', NULL, NULL, '2018-03-01 16:50:36', NULL, NULL, NULL, 3, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorie`
--

DROP TABLE IF EXISTS `kategorie`;
CREATE TABLE `kategorie` (
  `id` int(11) NOT NULL,
  `createtAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `bezeichnung` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `kategorie`
--

INSERT INTO `kategorie` (`id`, `createtAt`, `updatedAt`, `bezeichnung`) VALUES
(1, '2018-01-06 23:53:53', NULL, 'Pizza'),
(2, '2018-01-06 23:53:53', NULL, 'Burger'),
(3, '2018-01-06 23:53:53', NULL, 'Salat'),
(4, '2018-01-06 23:53:53', NULL, 'Pasta'),
(6, '2018-01-06 23:54:33', NULL, 'Burritos'),
(7, '2018-03-05 14:21:28', '2018-03-08 16:22:59', 'Getränke');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunden`
--

DROP TABLE IF EXISTS `kunden`;
CREATE TABLE `kunden` (
  `id` int(11) NOT NULL,
  `createtAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `vorname` varchar(32) NOT NULL,
  `nachname` varchar(32) NOT NULL,
  `plz` char(5) NOT NULL,
  `ort` varchar(100) NOT NULL,
  `strasseHnr` varchar(100) NOT NULL,
  `etage` varchar(3) DEFAULT NULL,
  `geschlecht` enum('m','w','o') NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rufnummer` varchar(13) NOT NULL,
  `firma` varchar(32) DEFAULT NULL,
  `paymentMethods_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `kunden`
--

INSERT INTO `kunden` (`id`, `createtAt`, `updatedAt`, `vorname`, `nachname`, `plz`, `ort`, `strasseHnr`, `etage`, `geschlecht`, `email`, `password`, `rufnummer`, `firma`, `paymentMethods_id`) VALUES
(1, '2018-01-07 11:40:37', '2018-03-05 15:06:14', 'Henry', 'Maske', '10115', 'Btown', 'Berliner Ring 24', '8', 'm', 'henry@maske.de', '$2y$10$qCgb4MKzbMKAqUU2LOFBQ.wGoAD6yBElFA7V7EPwK.QGCViJjx4mu', '03451234566', NULL, NULL),
(2, '2018-01-07 13:29:25', '2018-03-05 15:09:16', 'Bernd', 'Albatros', '32469', 'Petershagen', 'Am Bahnhof 4', '1', 'm', 'Bernd.Alba@gmx.de', '$2y$10$qCgb4MKzbMKAqUU2LOFBQ.wGoAD6yBElFA7V7EPwK.QGCViJjx4mu', '01234445', NULL, NULL),
(3, '2018-02-21 18:36:44', '2018-03-05 15:09:16', 'Tim', 'Tester', '99084', 'Erfurt', 'Leipziger Strasse 11', '1', 'm', 'test@mail.de', '$2y$10$qCgb4MKzbMKAqUU2LOFBQ.wGoAD6yBElFA7V7EPwK.QGCViJjx4mu', '015712345', NULL, NULL),
(5, '2018-02-22 02:32:49', NULL, 'Luzius', 'Kölling', '99084', 'Erfurt', 'Spittelgartenstraße 8', '1', 'm', 'marek@gmx.net', '$2y$10$NawvHT6awsIOoi1CZ6OWje5M.5R1NbwyIcE7eDsUmzimPvX1prRAC', '014712345', 'Kölling', NULL),
(6, '2018-02-24 18:10:10', NULL, 'Frau', 'Bert', '55566', 'Hierundjetzt', 'Dort 9', '11', 'w', 'herr@bert.de', '$2y$10$dQ5tQCsR27ijV0OkVbsx2eDkJeUCrlNfnnfppVG/hUsLVk4dAWVhq', '0502312345', 'Sesamstraße', NULL),
(7, '2018-02-24 18:27:02', '2018-03-05 15:09:16', 'Luzius', 'Kölling', '99089', 'Erfurt', 'Spittelgartenstraße 3', '2', 'w', 'lks2@hotmail.de', '$2y$10$i05/6N8TwdGyxPWx0af9Ueoe6371jbBrGwwqXH.SGtFYfVP7RWVuK', '036154321', '', NULL),
(8, '2018-02-24 18:35:07', NULL, 'Hans', 'Dampf', '12345', 'Erfurt', 'Am Talknoten 5', '4', 'm', 'hans@dampf.de', '$2y$10$QjVEdmyz8aKKT1eCM0Bf2ePhdqT6Sy6/YhoiXMVojUF/.3xQDA1Ie', '0151234555', '', NULL),
(9, '2018-02-25 12:55:22', NULL, 'Super', 'Doggo', '66666', 'Gotham', 'Firstave 1', '12', 'o', 'supermail@provider.de', '$2y$10$ilMJ.jZOsxXBLxml4liSk.hoB81vkoXtaBbkyNnnnevKPwYj/gGte', '043212345', '', NULL),
(11, '2018-02-25 13:10:46', NULL, 'Passwort', 'asd', '12345', 'Erfurt', 'Unit 4', '2', 'o', 'another@one.de', '$2y$10$RP9DLIRDvTGduXiAqv4oHu71aPoHeHfZSSsLj.NXnYcmW8Bv/EUo.', '0156215168', NULL, NULL),
(12, '2018-02-27 17:02:12', NULL, 'Jo', 'Veel', '99092', 'bubu', 'bubu 7', '1', 'm', 'jo@veel.com', '$2y$10$5jhVXOvg8.ciCq6l/S9skeM2nxaAdDqIyBk2zJoz3rng.2LuNnwvG', '013745678', 'bubu', NULL),
(15, '2018-02-28 21:07:07', '2018-03-05 15:09:16', 'Peter', 'Mailer', '99084', 'Erfurt', 'Lustige Strasse 25', '', 'm', 'peter@dermailer.de', '$2y$10$kL3PQfoJdFUfTBi6319rJuJhbb9P3FP9V5lZzb69hoWvxS5g07nfy', '062812647', '', NULL),
(16, '2018-02-28 21:15:50', '2018-03-05 15:09:16', 'Dolly', 'Mail', '12456', 'Erfurt', 'Strasse 10', '', 'w', 'das@istkeinemail.de', '$2y$10$TVKMFwdYFy0W..wWFs6dA.PEYY.CVizJvya5d9KsPb0ou/DVPH0R2', '12345', '', NULL),
(17, '2018-02-28 21:27:35', NULL, 'Hank', 'Tank', '55555', 'Gotham', 'Tankton Drive', '', 'm', 'another@tone.de', '$2y$10$9Vq4nEdzxRxz9Axi40hPEuf5PdVT1V7OeG9mMUITSaLQt3FOS7dmS', '54321', '', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `paymentmethods`
--

DROP TABLE IF EXISTS `paymentmethods`;
CREATE TABLE `paymentmethods` (
  `id` int(11) NOT NULL,
  `createtAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `bezeichnung` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `paymentmethods`
--

INSERT INTO `paymentmethods` (`id`, `createtAt`, `updatedAt`, `bezeichnung`) VALUES
(1, '2018-01-07 11:34:47', NULL, 'Paypal'),
(2, '2018-01-07 11:34:47', NULL, 'Sofortüberweisung'),
(3, '2018-01-07 11:34:47', NULL, 'Kreditkarte');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `produkte`
--

DROP TABLE IF EXISTS `produkte`;
CREATE TABLE `produkte` (
  `id` int(11) NOT NULL,
  `createtAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `bezeichnung` varchar(40) NOT NULL,
  `beschreibung` varchar(150) DEFAULT NULL,
  `preisKlein` decimal(4,2) DEFAULT NULL,
  `preisNormal` decimal(4,2) NOT NULL,
  `preisGroß` decimal(4,2) DEFAULT NULL,
  `bild` varchar(45) DEFAULT NULL,
  `kategorieID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `produkte`
--

INSERT INTO `produkte` (`id`, `createtAt`, `updatedAt`, `bezeichnung`, `beschreibung`, `preisKlein`, `preisNormal`, `preisGroß`, `bild`, `kategorieID`) VALUES
(2, '2018-01-06 23:55:39', NULL, 'Salami', 'Der Klassiker, einfach und gut. Mit Salami, Käse und Tomatensauce.', '5.00', '10.00', '15.00', 'salamipizza.png', 1),
(3, '2018-01-07 12:23:07', NULL, 'Quarterpounder mit Käse', 'Hamburger! Der Grundstein eines jeden nahrhaften Frühstücks!', NULL, '8.00', '12.00', 'quarterpounderKaese.png', 2),
(4, '2018-01-07 13:32:23', NULL, 'Caesar', 'Caesar\'s Salat mit Romana Salat, Parmesan, Sardellen, Ei und Knoblauch.', '4.50', '7.00', NULL, 'saladCeasar.png', 3),
(5, '2018-02-05 19:54:55', NULL, 'Macho', 'Burrito, burrito, burrito!!!', NULL, '8.00', '10.00', 'burritoMacho.png', 6),
(6, '2018-02-05 19:54:55', NULL, 'Lasagne', 'Quadratisch, praktisch, gut.', NULL, '7.50', '9.00', 'lasagne.png', 4),
(7, '2018-02-07 22:53:31', NULL, 'Tonno', 'Pizza Tonno mit Tonno.', '7.50', '9.00', '11.50', 'thunpizza.png', 1),
(8, '2018-02-07 22:53:31', NULL, 'Feta', 'Pizza Feta mit Schafskäse.', '8.00', '9.00', '10.00', 'fetapizza.png', 1),
(9, '2018-02-07 22:54:21', NULL, 'Nizza', 'Pizza Nizza iz da.', '8.90', '11.50', '13.00', 'nizzapizza.png', 1),
(10, '2018-02-28 16:25:18', '2018-02-28 16:29:51', 'Formaggi', 'Käse, Käse!', '9.00', '11.50', '14.00', 'formaggipizza.png', 1),
(11, '2018-02-28 16:25:18', '2018-02-28 16:28:49', 'Gyros', 'Ja das kann man angeblich machen.', '9.00', '13.00', '16.00', 'gyrospizza.png', 1),
(12, '2018-02-28 16:26:46', '2018-02-28 16:28:59', 'Spinacci', 'Spinat ist grün und gut.', '7.70', '10.50', '13.00', 'spinatpizza.png', 1),
(13, '2018-02-28 16:26:46', '2018-02-28 16:29:05', 'Seeseite', 'Meersefürchte und so...', '8.00', '13.00', '16.00', 'seepizza.png', 1),
(14, '2018-03-05 14:27:21', NULL, 'Coca Cola', 'Flasche inklusive Pfand.\r\nKlein: 500 ml.\r\nGroß: 1l.\r\n', '1.50', '3.00', NULL, 'cola1lgetraenk.png', 7),
(15, '2018-03-05 14:27:21', NULL, 'Beck\'s Pils', 'Inklusive Pfand, alc. 4,9% vol, 500ml.', NULL, '2.50', NULL, 'becksgetraenk.png', 7),
(16, '2018-03-05 14:27:21', NULL, 'Chianti Rotwein', 'DOCG Torre Borgese, alc. 12,5 % vol, 750 ml.', NULL, '7.00', NULL, 'chiantigetraenk.png', 7);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rabatte`
--

DROP TABLE IF EXISTS `rabatte`;
CREATE TABLE `rabatte` (
  `id` int(11) NOT NULL,
  `createtAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `bezeichnung` varchar(16) NOT NULL,
  `minWert` decimal(4,2) DEFAULT NULL,
  `typ` enum('%','€') NOT NULL,
  `wert` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `rabatte`
--

INSERT INTO `rabatte` (`id`, `createtAt`, `updatedAt`, `bezeichnung`, `minWert`, `typ`, `wert`) VALUES
(1, '2018-01-07 11:37:31', NULL, 'Nachlass20proz', '8.00', '%', '20.00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `securitytokens`
--

DROP TABLE IF EXISTS `securitytokens`;
CREATE TABLE `securitytokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `userId` int(11) NOT NULL,
  `identifier` varchar(255) COLLATE utf8_german2_ci NOT NULL,
  `securitytoken` varchar(255) COLLATE utf8_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `securitytokens`
--

INSERT INTO `securitytokens` (`id`, `createdAt`, `updatedAt`, `userId`, `identifier`, `securitytoken`) VALUES
(13, '2018-02-27 19:46:09', NULL, 12, '86f8e9e07cd5cf111deda0d7a2a48544', '366267cf61fd4407836961a05c01e18f1ce5608f');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `createtAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `tagwerteID` int(11) NOT NULL,
  `produkteID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tags`
--

INSERT INTO `tags` (`id`, `createtAt`, `updatedAt`, `tagwerteID`, `produkteID`) VALUES
(1, '2018-01-07 13:35:17', NULL, 10, 4),
(2, '2018-01-07 13:35:17', NULL, 5, 4),
(3, '2018-01-07 13:35:17', NULL, 3, 2),
(4, '2018-01-07 13:35:17', NULL, 6, 2),
(5, '2018-01-07 13:35:17', NULL, 7, 3),
(6, '2018-01-07 13:35:17', NULL, 3, 3),
(7, '2018-03-09 16:50:14', NULL, 11, 14),
(8, '2018-03-09 16:50:36', NULL, 10, 7),
(9, '2018-03-09 16:50:54', NULL, 10, 13),
(10, '2018-03-09 16:52:24', NULL, 1, 14),
(11, '2018-03-09 16:54:35', NULL, 2, 12),
(12, '2018-03-09 16:54:50', NULL, 2, 8);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tagwerte`
--

DROP TABLE IF EXISTS `tagwerte`;
CREATE TABLE `tagwerte` (
  `id` int(11) NOT NULL,
  `createtAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `bezeichnung` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tagwerte`
--

INSERT INTO `tagwerte` (`id`, `createtAt`, `updatedAt`, `bezeichnung`) VALUES
(1, '2018-01-07 13:33:56', NULL, 'vegan'),
(2, '2018-01-07 13:33:56', NULL, 'vegetarisch'),
(3, '2018-01-07 13:33:56', NULL, 'fleisch'),
(4, '2018-01-07 13:33:56', NULL, 'scharf'),
(5, '2018-01-07 13:33:56', NULL, 'salat'),
(6, '2018-01-07 13:33:56', NULL, 'pizza'),
(7, '2018-01-07 13:33:56', NULL, 'burger'),
(8, '2018-01-07 13:33:56', NULL, 'burrito'),
(9, '2018-01-07 13:33:56', NULL, 'pasta'),
(10, '2018-01-07 13:33:56', NULL, 'fisch'),
(11, '2018-03-09 16:48:55', NULL, 'alkoholfrei');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `warenkorb`
--

DROP TABLE IF EXISTS `warenkorb`;
CREATE TABLE `warenkorb` (
  `id` int(11) NOT NULL,
  `createtAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `grösse` enum('s','m','l','') DEFAULT NULL,
  `bestellungenID` int(11) NOT NULL,
  `produkteID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `warenkorb`
--

INSERT INTO `warenkorb` (`id`, `createtAt`, `updatedAt`, `grösse`, `bestellungenID`, `produkteID`) VALUES
(1, '2018-01-07 13:37:56', NULL, 'l', 1, 2),
(2, '2018-01-07 13:37:56', NULL, 'm', 2, 3),
(4, '2018-02-26 20:15:41', NULL, 'm', 20, 5),
(5, '2018-02-26 20:22:12', NULL, 'l', 20, 6),
(6, '2018-02-26 20:25:40', NULL, 'm', 20, 7),
(75, '2018-02-28 14:25:09', NULL, 's', 41, 7),
(79, '2018-02-28 21:08:40', NULL, 's', 42, 4),
(82, '2018-02-28 21:18:13', NULL, 'm', 44, 5),
(83, '2018-02-28 21:18:50', NULL, 'm', 45, 6),
(85, '2018-03-07 23:11:14', NULL, 'm', 46, 5),
(86, '2018-03-07 23:11:20', NULL, 'm', 46, 4),
(87, '2018-03-07 23:11:20', NULL, 'm', 46, 4),
(88, '2018-03-07 23:11:28', NULL, 'm', 46, 16);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `warenkorbzusaetze`
--

DROP TABLE IF EXISTS `warenkorbzusaetze`;
CREATE TABLE `warenkorbzusaetze` (
  `id` int(11) NOT NULL,
  `createtAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `warenkorbID` int(11) NOT NULL,
  `zusatzOptionenID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `warenkorbzusaetze`
--

INSERT INTO `warenkorbzusaetze` (`id`, `createtAt`, `updatedAt`, `warenkorbID`, `zusatzOptionenID`) VALUES
(1, '2018-01-07 13:41:41', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zusatzoptionen`
--

DROP TABLE IF EXISTS `zusatzoptionen`;
CREATE TABLE `zusatzoptionen` (
  `id` int(11) NOT NULL,
  `createtAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `bezeichnung` varchar(128) NOT NULL,
  `beschreibung` varchar(100) DEFAULT NULL,
  `preis` decimal(4,2) NOT NULL,
  `kategorieID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `zusatzoptionen`
--

INSERT INTO `zusatzoptionen` (`id`, `createtAt`, `updatedAt`, `bezeichnung`, `beschreibung`, `preis`, `kategorieID`) VALUES
(1, '2018-01-07 13:39:54', NULL, 'Käse', 'Extra viel Käse.', '1.00', 1),
(2, '2018-01-07 13:40:09', NULL, 'Peperoni', NULL, '1.50', 2);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bestellungen`
--
ALTER TABLE `bestellungen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bestellungen_paymentMethods1_idx` (`paymentMethodsID`),
  ADD KEY `fk_bestellungen_kunden1_idx` (`kundenID`),
  ADD KEY `fk_bestellungen_rabatte1_idx` (`rabatte_id`);

--
-- Indizes für die Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bezeichnung_UNIQUE` (`bezeichnung`);

--
-- Indizes für die Tabelle `kunden`
--
ALTER TABLE `kunden`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kunden_paymentMethods_idx` (`paymentMethods_id`);

--
-- Indizes für die Tabelle `paymentmethods`
--
ALTER TABLE `paymentmethods`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `produkte`
--
ALTER TABLE `produkte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produkte_kategorie1_idx` (`kategorieID`);

--
-- Indizes für die Tabelle `rabatte`
--
ALTER TABLE `rabatte`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bezeichnung_UNIQUE` (`bezeichnung`);

--
-- Indizes für die Tabelle `securitytokens`
--
ALTER TABLE `securitytokens`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tags_tagwerte1_idx` (`tagwerteID`),
  ADD KEY `fk_tags_produkte1_idx` (`produkteID`);

--
-- Indizes für die Tabelle `tagwerte`
--
ALTER TABLE `tagwerte`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `warenkorb`
--
ALTER TABLE `warenkorb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_warenkorb_bestellungen1_idx` (`bestellungenID`),
  ADD KEY `fk_warenkorb_produkte1_idx` (`produkteID`);

--
-- Indizes für die Tabelle `warenkorbzusaetze`
--
ALTER TABLE `warenkorbzusaetze`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_warenkorbZusaetze_warenkorb1_idx` (`warenkorbID`),
  ADD KEY `fk_warenkorbZusaetze_zusatzOptionen1_idx` (`zusatzOptionenID`);

--
-- Indizes für die Tabelle `zusatzoptionen`
--
ALTER TABLE `zusatzoptionen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bezeichnung_UNIQUE` (`bezeichnung`),
  ADD KEY `fk_zusatzOptionen_kategorie1_idx` (`kategorieID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bestellungen`
--
ALTER TABLE `bestellungen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT für Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `kunden`
--
ALTER TABLE `kunden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT für Tabelle `paymentmethods`
--
ALTER TABLE `paymentmethods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `produkte`
--
ALTER TABLE `produkte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT für Tabelle `rabatte`
--
ALTER TABLE `rabatte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `securitytokens`
--
ALTER TABLE `securitytokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT für Tabelle `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `tagwerte`
--
ALTER TABLE `tagwerte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `warenkorb`
--
ALTER TABLE `warenkorb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT für Tabelle `warenkorbzusaetze`
--
ALTER TABLE `warenkorbzusaetze`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `zusatzoptionen`
--
ALTER TABLE `zusatzoptionen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `bestellungen`
--
ALTER TABLE `bestellungen`
  ADD CONSTRAINT `fk_bestellungen_kunden1` FOREIGN KEY (`kundenID`) REFERENCES `kunden` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bestellungen_paymentMethods1` FOREIGN KEY (`paymentMethodsID`) REFERENCES `paymentmethods` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bestellungen_rabatte1` FOREIGN KEY (`rabatte_id`) REFERENCES `rabatte` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `kunden`
--
ALTER TABLE `kunden`
  ADD CONSTRAINT `fk_kunden_paymentMethods` FOREIGN KEY (`paymentMethods_id`) REFERENCES `paymentmethods` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `produkte`
--
ALTER TABLE `produkte`
  ADD CONSTRAINT `fk_produkte_kategorie1` FOREIGN KEY (`kategorieID`) REFERENCES `kategorie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `fk_tags_produkte1` FOREIGN KEY (`produkteID`) REFERENCES `produkte` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tags_tagwerte1` FOREIGN KEY (`tagwerteID`) REFERENCES `tagwerte` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `warenkorb`
--
ALTER TABLE `warenkorb`
  ADD CONSTRAINT `fk_warenkorb_bestellungen1` FOREIGN KEY (`bestellungenID`) REFERENCES `bestellungen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_warenkorb_produkte1` FOREIGN KEY (`produkteID`) REFERENCES `produkte` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `warenkorbzusaetze`
--
ALTER TABLE `warenkorbzusaetze`
  ADD CONSTRAINT `fk_warenkorbZusaetze_warenkorb1` FOREIGN KEY (`warenkorbID`) REFERENCES `warenkorb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_warenkorbZusaetze_zusatzOptionen1` FOREIGN KEY (`zusatzOptionenID`) REFERENCES `zusatzoptionen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `zusatzoptionen`
--
ALTER TABLE `zusatzoptionen`
  ADD CONSTRAINT `fk_zusatzOptionen_kategorie1` FOREIGN KEY (`kategorieID`) REFERENCES `kategorie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

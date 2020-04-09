-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Dic 30, 2019 alle 11:05
-- Versione del server: 10.4.8-MariaDB
-- Versione PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `IbentoDB`
--
CREATE DATABASE IF NOT EXISTS `IbentoDB` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `IbentoDB`;

-- --------------------------------------------------------

--
-- Struttura della tabella `Admin`
--

CREATE TABLE `Admin` (
  `id` int(2) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nome` char(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cognome` char(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `Biglietto`
--

CREATE TABLE `Biglietto` (
  `id` int(6) NOT NULL,
  `id_evento` int(6) NOT NULL,
  `id_utente` int(6) NOT NULL,
  `data_acquisto` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `quantita` int(6) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `Carrello`
--

CREATE TABLE `Carrello` (
  `id_utente` int(6) NOT NULL,
  `id_evento` int(6) NOT NULL,
  `quantita` int(6) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `Categoria`
--

CREATE TABLE `Categoria` (
  `id` int(6) NOT NULL,
  `nome` char(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `immagine` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `Evento`
--

CREATE TABLE `Evento` (
  `id` int(6) NOT NULL,
  `titolo` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `id_categoria` int(6) NOT NULL,
  `data_inserimento` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `data_inizio` date NOT NULL,
  `ora_inizio` time NOT NULL,
  `data_fine` date NOT NULL,
  `ora_fine` time NOT NULL,
  `luogo` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `immagine` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `descrizione` text CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `id_organizzatore` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `biglietti_totali` int(5) NOT NULL,
  `biglietti_venduti` int(5) NOT NULL DEFAULT 0,
  `prezzo_biglietto` float NOT NULL DEFAULT 0,
  `utenti_interessati` int(5) NOT NULL DEFAULT 0,
  `acquisto_durante_evento` tinyint(1) NOT NULL DEFAULT 0,
  `max_biglietti_ciascuno` int(6) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `Interesse`
--

CREATE TABLE `Interesse` (
  `id_evento` int(6) NOT NULL,
  `id_utente` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `Organizzatore`
--

CREATE TABLE `Organizzatore` (
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `partitaIVA` int(11) NOT NULL,
  `ragioneSociale` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `descrizione` text CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `accettato` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `Utente`
--

CREATE TABLE `Utente` (
  `id` int(6) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nome` char(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cognome` char(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `immagine` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabella contenente le informazioni riguardanti gli Utenti';

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Biglietto`
--
ALTER TABLE `Biglietto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_evento` (`id_evento`),
  ADD KEY `id_utente` (`id_utente`);

--
-- Indici per le tabelle `Carrello`
--
ALTER TABLE `Carrello`
  ADD PRIMARY KEY (`id_utente`,`id_evento`),
  ADD KEY `FKeventoc` (`id_evento`);

--
-- Indici per le tabelle `Categoria`
--
ALTER TABLE `Categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `Evento`
--
ALTER TABLE `Evento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_organizzatore` (`id_organizzatore`);

--
-- Indici per le tabelle `Interesse`
--
ALTER TABLE `Interesse`
  ADD PRIMARY KEY (`id_evento`,`id_utente`),
  ADD KEY `FKutentei` (`id_utente`);

--
-- Indici per le tabelle `Organizzatore`
--
ALTER TABLE `Organizzatore`
  ADD PRIMARY KEY (`username`);

--
-- Indici per le tabelle `Utente`
--
ALTER TABLE `Utente`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `Admin`
  ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `Biglietto`
--
ALTER TABLE `Biglietto`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `Categoria`
--
ALTER TABLE `Categoria`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `Evento`
--
ALTER TABLE `Evento`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `Utente`
--
ALTER TABLE `Utente`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `Biglietto`
--
ALTER TABLE `Biglietto`
  ADD CONSTRAINT `FKevento` FOREIGN KEY (`id_evento`) REFERENCES `Evento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FKutente` FOREIGN KEY (`id_utente`) REFERENCES `Utente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `Carrello`
--
ALTER TABLE `Carrello`
  ADD CONSTRAINT `FKeventoc` FOREIGN KEY (`id_evento`) REFERENCES `Evento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FKutentec` FOREIGN KEY (`id_utente`) REFERENCES `Utente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `Evento`
--
ALTER TABLE `Evento`
  ADD CONSTRAINT `FKcategoria` FOREIGN KEY (`id_categoria`) REFERENCES `Categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FKorganizzatore` FOREIGN KEY (`id_organizzatore`) REFERENCES `Organizzatore` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `Interesse`
--
ALTER TABLE `Interesse`
  ADD CONSTRAINT `FKeventoi` FOREIGN KEY (`id_evento`) REFERENCES `Evento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FKutentei` FOREIGN KEY (`id_utente`) REFERENCES `Utente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;



COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

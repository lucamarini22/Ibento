-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Gen 01, 2020 alle 14:52
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

--
-- Dump dei dati per la tabella `Admin`
--

INSERT INTO `Admin` (`id`, `email`, `password`, `nome`, `cognome`) VALUES
(1, 'simone.mattioli@ibento.com', '$2y$10$xo/gtsyHnU3u9YtSREEz3OXCyhmFpnlFGQuN5K2BoY228I8tIplaO', 'Simone', 'Mattioli'),
(2, 'matteo.lucchi@ibento.com', '$2y$10$xo/gtsyHnU3u9YtSREEz3OXCyhmFpnlFGQuN5K2BoY228I8tIplaO', 'Matteo', 'Lucchi'),
(3, 'luca.marini@ibento.com', '$2y$10$xo/gtsyHnU3u9YtSREEz3OXCyhmFpnlFGQuN5K2BoY228I8tIplaO', 'Luca', 'Marini');

--
-- Dump dei dati per la tabella `Organizzatore`
--

INSERT INTO `Organizzatore` (`username`, `password`, `email`, `partitaIVA`, `ragioneSociale`, `descrizione`, `accettato`) VALUES
('Bromagna', '$2y$10$xo/gtsyHnU3u9YtSREEz3OXCyhmFpnlFGQuN5K2BoY228I8tIplaO', 'bromagnaeventi@gmail.com', 1678654356, 'Bromagna 2007 - Organizzatori Eventi Gastronomici', "Bromagna dal 2007 è il più grande organizzatore di eventi gastronomici dell\'Emilia Romagna.", 0),
('EventMaster', '$2y$10$xo/gtsyHnU3u9YtSREEz3OXCyhmFpnlFGQuN5K2BoY228I8tIplaO', 'eventmaster@gmail.com', 1234567898, 'Event Master - Organizzazione Eventi', "EventMaster è un\'organizzazione che dà alla luce i migliori eventi del momento.", 0);

--
-- Dump dei dati per la tabella `Utente`
--

INSERT INTO `Utente` (`id`, `password`, `email`, `nome`, `cognome`, `immagine`) VALUES
(1, '$2y$10$xo/gtsyHnU3u9YtSREEz3OXCyhmFpnlFGQuN5K2BoY228I8tIplaO', 'marcodomenichini1988@gmail.com', 'Marco', 'Domenichini', 'https://scontent-mxp1-1.xx.fbcdn.net/v/t31.0-8/p720x720/22829120_389729641445222_5915410337785200803_o.jpg?_nc_cat=101&_nc_oc=AQmtvjzzun_LBw_KYjGrZnFU6T2_MIM9IeNl8DvJ9uhIeNigFj2tLg0Ric7nrVHxJj4&_nc_ht=scontent-mxp1-1.xx&oh=4eb2049f6d8f78930b1f9cfc8830af87&oe=5EA1F8A6'),
(2, '$2y$10$xo/gtsyHnU3u9YtSREEz3OXCyhmFpnlFGQuN5K2BoY228I8tIplaO', 'annananni97@libero.it', 'Anna', 'Nanni', 'https://upload.wikimedia.org/wikipedia/commons/2/24/Francesca_Chillemi_%2819786354208%29_%28cropped%29.jpg'),
(3, '$2y$10$xo/gtsyHnU3u9YtSREEz3OXCyhmFpnlFGQuN5K2BoY228I8tIplaO', 'luciapostiglione91@alice.it', 'Lucia', 'Postiglione', 'https://i.ytimg.com/vi/EVYBPpFvWPU/hqdefault.jpg'),
(4, '$2y$10$xo/gtsyHnU3u9YtSREEz3OXCyhmFpnlFGQuN5K2BoY228I8tIplaO', 'andrefosco99@gmail.com', 'Andrea', 'DeFoscolo', 'https://www.pianetamilan.it/wp-content/uploads/sites/23/2016/06/Mattia-De-Sciglio.jpg'),
(5, '$2y$10$xo/gtsyHnU3u9YtSREEz3OXCyhmFpnlFGQuN5K2BoY228I8tIplaO', 'luigialberto@gmail.com', 'Luigi', 'Alberto', '');

--
--
-- Dump dei dati per la tabella `Categoria`
--

INSERT INTO `Categoria` (`id`, `nome`, `immagine`) VALUES
(1, 'Gastronomia', 'fas fa-utensils'),
(2, 'Motori', 'fas fa-motorcycle'),
(3, 'Sport', 'far fa-futbol'),
(4, 'Svago', 'fas fa-gamepad'),
(5, 'Musica', 'fas fa-music'),
(6, 'Cinema', 'fas fa-film'),
(7, 'Fitness', 'fas fa-dumbbell');


--
-- Dump dei dati per la tabella `Evento`
--

INSERT INTO `Evento` (`id`, `titolo`, `id_categoria`, `data_inserimento`, `data_inizio`, `ora_inizio`, `data_fine`, `ora_fine`, `luogo`, `immagine`, `descrizione`, `id_organizzatore`, `biglietti_totali`, `biglietti_venduti`, `prezzo_biglietto`, `utenti_interessati`, `acquisto_durante_evento`, `max_biglietti_ciascuno`) VALUES
(1, 'Sagra Salsiccia', 1, '2019-12-22 14:35:53.000000', '2020-03-20', '08:00:00', '0020-03-30', '20:00:00', 'Cesena - Centro', './upload/event9.jpg', 'Torna la sagra della Salsiccia di Cesena', 'Bromagna', 10000, 2, 0, 1, 0, 2),
(2, 'Sgommando20', 2, '2019-12-22 14:39:02.000000', '2020-02-10', '12:00:00', '2020-02-12', '21:00:00', 'Cesena - Pievesestina', './upload/event2.jpg', 'Raduno per Bikers e amanti delle Lowrider', 'EventMaster', 1000, 3, 10, 0, 0, 2),
(3, 'SPIV vs Forlì', 3, '2019-12-22 14:41:18.000000', '2020-01-30', '10:00:00', '2020-01-30', '11:30:00', 'Forlimpopoli', './upload/xxx.jpeg', 'Match imperdibile!', 'EventMaster', 3000, 0, 0, 4, 0, 2);


-- Dump dei dati per la tabella `Biglietto`
--

INSERT INTO `Biglietto` (`id`, `id_evento`, `id_utente`, `data_acquisto`, `quantita`) VALUES
(1, 1, 3, '2019-12-24 15:31:51.488790', 1),
(2, 1, 3, '2019-12-24 15:31:51.488790', 1),
(3, 2, 4, '2019-12-24 15:31:51.488790', 1),
(4, 2, 2, '2019-12-24 15:31:51.488790', 1),
(5, 2, 2, '2019-12-24 15:31:51.488790', 1);


--
-- Dump dei dati per la tabella `Interesse`
--

INSERT INTO `Interesse` (`id_evento`, `id_utente`) VALUES
(1, 1),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 5);

COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 05, 2023 alle 10:54
-- Versione del server: 10.4.18-MariaDB
-- Versione PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ticket`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `anomalia`
--

CREATE TABLE `anomalia` (
  `id_anomalia` int(11) NOT NULL,
  `descrizione` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `anomalia`
--

INSERT INTO `anomalia` (`id_anomalia`, `descrizione`) VALUES
(1, 'telecamera frontale non funzionante');

-- --------------------------------------------------------

--
-- Struttura della tabella `apparecchio`
--

CREATE TABLE `apparecchio` (
  `id_app` int(11) NOT NULL,
  `descrizione` varchar(500) NOT NULL,
  `tipo` varchar(25) NOT NULL,
  `marca` varchar(12) NOT NULL,
  `Modello` varchar(25) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `apparecchio`
--

INSERT INTO `apparecchio` (`id_app`, `descrizione`, `tipo`, `marca`, `Modello`, `id_cliente`) VALUES
(1, 'telefono pazzo', 'telefono cellulare', 'xiaomi', 'redme note', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nomeUtente` varchar(15) NOT NULL,
  `nome` varchar(12) NOT NULL,
  `cognome` varchar(12) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `indirizzo` varchar(50) NOT NULL,
  `telefono` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nomeUtente`, `nome`, `cognome`, `password`, `email`, `indirizzo`, `telefono`) VALUES
(1, 'Atzeni', 'Matteo', 'Atzeni', 'password', 'matzeni@chilesotti.it', 'via valdellette', '0445 535550');

-- --------------------------------------------------------

--
-- Struttura della tabella `pda`
--

CREATE TABLE `pda` (
  `id_pda` int(11) NOT NULL,
  `denominazione` varchar(50) NOT NULL,
  `indirizzo` varchar(50) NOT NULL,
  `citta` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `web` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `pda`
--

INSERT INTO `pda` (`id_pda`, `denominazione`, `indirizzo`, `citta`, `telefono`, `email`, `web`) VALUES
(1, 'pazza, davvero sgravata', 'via valdellette 48', 'lugo di vicenza', '3333333333', 'ldallacosta@chilesotti.it', 'no fra, web pazzo');

-- --------------------------------------------------------

--
-- Struttura della tabella `tecnico`
--

CREATE TABLE `tecnico` (
  `id_tecnico` int(11) NOT NULL,
  `nome` varchar(15) NOT NULL,
  `cognome` varchar(15) NOT NULL,
  `qualifica` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `id_pda` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `tecnico`
--

INSERT INTO `tecnico` (`id_tecnico`, `nome`, `cognome`, `qualifica`, `email`, `id_pda`, `username`, `password`) VALUES
(2, 'Lorenzo', 'Dalla Costa', 'sgravata', 'ldallacosta@chilesotti.it', 1, 'Lorenzo', 'password');

-- --------------------------------------------------------

--
-- Struttura della tabella `ticket`
--

CREATE TABLE `ticket` (
  `id_ticket` int(11) NOT NULL,
  `stato` int(11) NOT NULL COMMENT '0(in attesa),1(in lavoro),2(chiuso)',
  `tempoStimato` int(11) DEFAULT NULL,
  `dataInizio` datetime NOT NULL,
  `dataFine` datetime NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_app` int(11) NOT NULL,
  `id_anomalia` int(11) NOT NULL,
  `id_tecnico` int(11) DEFAULT NULL,
  `id_pda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ticket`
--

INSERT INTO `ticket` (`id_ticket`, `stato`, `tempoStimato`, `dataInizio`, `dataFine`, `id_cliente`, `id_app`, `id_anomalia`, `id_tecnico`, `id_pda`) VALUES
(3, 0, 0, '2023-06-05 10:08:03', '2023-06-05 10:08:03', 1, 1, 1, 2, 1),
(4, 0, NULL, '2023-06-05 10:10:44', '2023-06-05 10:10:44', 1, 1, 1, NULL, 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `anomalia`
--
ALTER TABLE `anomalia`
  ADD PRIMARY KEY (`id_anomalia`);

--
-- Indici per le tabelle `apparecchio`
--
ALTER TABLE `apparecchio`
  ADD PRIMARY KEY (`id_app`),
  ADD UNIQUE KEY `id_cliente` (`id_cliente`);

--
-- Indici per le tabelle `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indici per le tabelle `pda`
--
ALTER TABLE `pda`
  ADD PRIMARY KEY (`id_pda`);

--
-- Indici per le tabelle `tecnico`
--
ALTER TABLE `tecnico`
  ADD PRIMARY KEY (`id_tecnico`),
  ADD UNIQUE KEY `id_pda` (`id_pda`);

--
-- Indici per le tabelle `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id_ticket`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_app` (`id_app`),
  ADD KEY `id_anomalia` (`id_anomalia`),
  ADD KEY `id_tecnico` (`id_tecnico`),
  ADD KEY `id_pda` (`id_pda`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `anomalia`
--
ALTER TABLE `anomalia`
  MODIFY `id_anomalia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `apparecchio`
--
ALTER TABLE `apparecchio`
  MODIFY `id_app` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `pda`
--
ALTER TABLE `pda`
  MODIFY `id_pda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `tecnico`
--
ALTER TABLE `tecnico`
  MODIFY `id_tecnico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `apparecchio`
--
ALTER TABLE `apparecchio`
  ADD CONSTRAINT `apparecchio_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `tecnico`
--
ALTER TABLE `tecnico`
  ADD CONSTRAINT `tecnico_ibfk_1` FOREIGN KEY (`id_pda`) REFERENCES `pda` (`id_pda`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `id_anomalia` FOREIGN KEY (`id_anomalia`) REFERENCES `anomalia` (`id_anomalia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_app` FOREIGN KEY (`id_app`) REFERENCES `apparecchio` (`id_app`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_pda` FOREIGN KEY (`id_pda`) REFERENCES `pda` (`id_pda`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_tecnico` FOREIGN KEY (`id_tecnico`) REFERENCES `tecnico` (`id_tecnico`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

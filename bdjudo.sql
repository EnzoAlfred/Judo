-- MariaDB dump 10.19  Distrib 10.5.19-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: bdjudo
-- ------------------------------------------------------
-- Server version	10.5.19-MariaDB-0+deb11u2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Acheter`
--

DROP TABLE IF EXISTS `Acheter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Acheter` (
  `idProduit` tinyint(2) NOT NULL,
  `idAdherent` tinyint(2) NOT NULL,
  PRIMARY KEY (`idProduit`,`idAdherent`),
  KEY `idAdherent` (`idAdherent`),
  CONSTRAINT `Acheter_ibfk_1` FOREIGN KEY (`idProduit`) REFERENCES `Produit` (`idP`),
  CONSTRAINT `Acheter_ibfk_2` FOREIGN KEY (`idAdherent`) REFERENCES `Adherent` (`idA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Acheter`
--

LOCK TABLES `Acheter` WRITE;
/*!40000 ALTER TABLE `Acheter` DISABLE KEYS */;
INSERT INTO `Acheter` VALUES (1,2),(1,3),(1,7),(2,2),(2,7),(2,8),(3,7),(4,3),(4,9);
/*!40000 ALTER TABLE `Acheter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Adherent`
--

DROP TABLE IF EXISTS `Adherent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Adherent` (
  `idA` tinyint(2) NOT NULL,
  `prenomA` varchar(25) NOT NULL,
  `nomA` varchar(25) NOT NULL,
  `niveau` varchar(15) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `mail` varchar(70) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`idA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Adherent`
--

LOCK TABLES `Adherent` WRITE;
/*!40000 ALTER TABLE `Adherent` DISABLE KEYS */;
INSERT INTO `Adherent` VALUES (1,'Enzo','ALFRED','Intermédiaire','ab4f63f9ac65152575886860dde480a1','enzo.alfred@orencash.fr','Administrateur'),(2,'Mathyss','VOTTE','débutant','fb8ab027299fc4547c8c0e393d6221a2','mat.vot@gmail.com','Adherent'),(3,'Calysta','RICARD','Pro','425180718af9ec294ea5ee3bcf94a868','cal.card@hotmail.fr','Adherent'),(5,'t','t','Pro','f71dbe52628a3f83a77ab494817525c6','t@t.fr','Adherent'),(7,'Philipe','DURANT','Intermédiaire','aa36dc6e81e2ac7ad03e12fedcb6a2c0','phi.dur@gmail.com','Adherent'),(8,'aa','aa','Intermédiaire','849f2c0141f1f9096850c0ac7c6cba3b','a@a.fr','Adherent'),(9,'Khaled','ES','Pro','6140035bef2d67ae1f049b35a78eb1dd','t.t@t.fr','Adherent');
/*!40000 ALTER TABLE `Adherent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Appartenance`
--

DROP TABLE IF EXISTS `Appartenance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Appartenance` (
  `idArticle` tinyint(2) NOT NULL,
  `idCategorie` tinyint(3) NOT NULL,
  PRIMARY KEY (`idArticle`,`idCategorie`),
  KEY `idCategorie` (`idCategorie`),
  CONSTRAINT `Appartenance_ibfk_1` FOREIGN KEY (`idArticle`) REFERENCES `Article` (`idAr`),
  CONSTRAINT `Appartenance_ibfk_2` FOREIGN KEY (`idCategorie`) REFERENCES `Categorie` (`idCat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Appartenance`
--

LOCK TABLES `Appartenance` WRITE;
/*!40000 ALTER TABLE `Appartenance` DISABLE KEYS */;
INSERT INTO `Appartenance` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(9,2);
/*!40000 ALTER TABLE `Appartenance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Article`
--

DROP TABLE IF EXISTS `Article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Article` (
  `idAr` tinyint(2) NOT NULL,
  `lArticle` varchar(70) NOT NULL,
  `titre` varchar(50) NOT NULL,
  PRIMARY KEY (`idAr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Article`
--

LOCK TABLES `Article` WRITE;
/*!40000 ALTER TABLE `Article` DISABLE KEYS */;
INSERT INTO `Article` VALUES (1,'Vues/Articles/resultat-2014.html','résultat 2014'),(2,'Vues/Articles/resultat-2015.html','résultat 2015'),(3,'Vues/Articles/resultat-2016.html','résultat 2016'),(4,'Vues/Articles/resultat-2017.html','résultat 2017'),(5,'Vues/Articles/resultat-2018.html','résultat 2018'),(6,'Vues/Articles/resultat-2019.html','résultat 2019'),(7,'Vues/Articles/resultat-2020.html','résultat 2020'),(8,'Vues/Articles/resultat-2022.html','résultat 2022'),(9,'Vues/Articles/resultat-2023.html','résultat 2023');
/*!40000 ALTER TABLE `Article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Categorie`
--

DROP TABLE IF EXISTS `Categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Categorie` (
  `idCat` tinyint(3) NOT NULL,
  `libelle` varchar(70) NOT NULL,
  PRIMARY KEY (`idCat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Categorie`
--

LOCK TABLES `Categorie` WRITE;
/*!40000 ALTER TABLE `Categorie` DISABLE KEYS */;
INSERT INTO `Categorie` VALUES (1,'resultat'),(2,'resultats 2023');
/*!40000 ALTER TABLE `Categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Contact`
--

DROP TABLE IF EXISTS `Contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Contact` (
  `idC` smallint(4) NOT NULL,
  `messC` varchar(1500) NOT NULL,
  `idAdherent` tinyint(2) NOT NULL,
  PRIMARY KEY (`idC`),
  KEY `idAdherent` (`idAdherent`),
  CONSTRAINT `Contact_ibfk_1` FOREIGN KEY (`idAdherent`) REFERENCES `Adherent` (`idA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Contact`
--

LOCK TABLES `Contact` WRITE;
/*!40000 ALTER TABLE `Contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `Contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Horaire`
--

DROP TABLE IF EXISTS `Horaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Horaire` (
  `idH` tinyint(2) NOT NULL,
  `heureDeb` varchar(5) NOT NULL,
  `heureFin` varchar(5) NOT NULL,
  `jour` varchar(8) NOT NULL,
  PRIMARY KEY (`idH`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Horaire`
--

LOCK TABLES `Horaire` WRITE;
/*!40000 ALTER TABLE `Horaire` DISABLE KEYS */;
INSERT INTO `Horaire` VALUES (1,'19:00','21:00','Lundi'),(2,'19:30','21:30','Mercredi'),(3,'18:00','20:00','Vendredi');
/*!40000 ALTER TABLE `Horaire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Participe`
--

DROP TABLE IF EXISTS `Participe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Participe` (
  `idHoraire` tinyint(2) NOT NULL,
  `idAdherent` tinyint(2) NOT NULL,
  PRIMARY KEY (`idHoraire`,`idAdherent`),
  KEY `idAdherent` (`idAdherent`),
  CONSTRAINT `Participe_ibfk_1` FOREIGN KEY (`idHoraire`) REFERENCES `Horaire` (`idH`),
  CONSTRAINT `Participe_ibfk_2` FOREIGN KEY (`idAdherent`) REFERENCES `Adherent` (`idA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Participe`
--

LOCK TABLES `Participe` WRITE;
/*!40000 ALTER TABLE `Participe` DISABLE KEYS */;
INSERT INTO `Participe` VALUES (1,3),(2,3),(3,3),(3,7);
/*!40000 ALTER TABLE `Participe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Produit`
--

DROP TABLE IF EXISTS `Produit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Produit` (
  `idP` tinyint(2) NOT NULL,
  `nomP` varchar(70) NOT NULL,
  `prixP` tinyint(3) NOT NULL,
  `img` varchar(50) NOT NULL,
  `descrP` varchar(1500) NOT NULL,
  PRIMARY KEY (`idP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Produit`
--

LOCK TABLES `Produit` WRITE;
/*!40000 ALTER TABLE `Produit` DISABLE KEYS */;
INSERT INTO `Produit` VALUES (1,'Les arts martiaux pour les nul',18,'images/judo_nul.jpg','Avec ce livre vous aurait toute les bases sur le judo et le code moral'),(2,'Une ceinture blanche',6,'images/ceinture_blanche.jfif','Une ceinture blanche pour les meilleurs des débutants'),(3,'Une ceinture verte',12,'images/ceinture_verte.jfif','Une ceinture verte pour les meilleurs des intermédiaires'),(4,'Une ceinture noire',16,'images/ceinture_noire.jfif','Une ceinture noire pour les meilleurs des pro'),(5,'Test',1,'images/e5ae2ff57c405402c9370720d7210032.jpg','c\'est');
/*!40000 ALTER TABLE `Produit` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-21 11:18:26

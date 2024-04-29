CREATE DATABASE  IF NOT EXISTS `dr_agenda` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `dr_agenda`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: dr_agenda
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `pacientes` int(11) NOT NULL AUTO_INCREMENT,
  `nome_completo` varchar(80) NOT NULL,
  `data_nasc` date NOT NULL,
  `email` varchar(110) NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `nome_mae` varchar(80) NOT NULL,
  `CPF` varchar(15) NOT NULL,
  `numero_cel` varchar(20) NOT NULL,
  `numero_tel` varchar(20) NOT NULL,
  `CEP` varchar(10) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `municipio` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `numero` int(11) NOT NULL,
  `usuario` varchar(6) NOT NULL,
  `senha` varchar(16) NOT NULL,
  `confirm_senha` varchar(16) NOT NULL,
  PRIMARY KEY (`pacientes`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'Hugo Daniel Ferrete dos Santos','2000-07-13','test@gmail.com','Masculino','Rosangela  Ferrete dos Santos','191.761.947-28','(21) 9 7652-7831','(21) 2528-7475','25080030','Parque Paulicéia','Duque de Caxias','RJ','Rua Pernambuco',173,'HD-TI2','Hugo9143','Hugo9143');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicos`
--

DROP TABLE IF EXISTS `medicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medicos` (
  `doutor` int(11) NOT NULL AUTO_INCREMENT,
  `nome_completo_medic` varchar(80) NOT NULL,
  `data_nasc_medic` date NOT NULL,
  `email_medic` varchar(110) NOT NULL,
  `especializacao` varchar(50) NOT NULL,
  `sexo_medic` varchar(15) NOT NULL,
  `nome_mae_medic` varchar(80) NOT NULL,
  `CPF_medic` varchar(15) NOT NULL,
  `numero_cel_medic` varchar(15) NOT NULL,
  `numero_tel_medic` varchar(15) NOT NULL,
  `CRM` varchar(6) NOT NULL,
  `CEP_medic` varchar(10) NOT NULL,
  `bairro_medic` varchar(45) NOT NULL,
  `municipio_medic` varchar(45) NOT NULL,
  `estado_medic` varchar(45) NOT NULL,
  `endereco_medic` varchar(45) NOT NULL,
  `numero_medic` int(11) NOT NULL,
  `usuario_medic` varchar(6) NOT NULL,
  `senha_medic` varchar(16) NOT NULL,
  `confirm_senha_medic` varchar(16) NOT NULL,
  PRIMARY KEY (`doutor`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicos`
--

LOCK TABLES `medicos` WRITE;
/*!40000 ALTER TABLE `medicos` DISABLE KEYS */;
INSERT INTO `medicos` VALUES (1,'Hugo Daniel Ferrete dos Santos','2000-07-13','medic@gmail.com','Cardiologista','Masculino','Rosangela Ferreira dos Santos','19176194228','21976527831','2125287478','130720','25080030','Parque Paulicéia','Duque de Caxias','Rio de Janeiro','Rua Pernambuco',173,'MED-TI','Hugo9143','Hugo9143');
/*!40000 ALTER TABLE `medicos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-29 13:24:09

CREATE DATABASE  IF NOT EXISTS `dr_agenda` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `dr_agenda`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: dr_agenda
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.21-MariaDB

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
  `nome_completo` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_nasc` date NOT NULL,
<<<<<<< Updated upstream
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
  `data_criacao_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `ultimo_login` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`pacientes`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
=======
  `email` varchar(110) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome_mae` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CPF` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_cel` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_tel` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CEP` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipio` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `usuario` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm_senha` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_autenticacao` int(11) DEFAULT NULL,
  `data_codigo` int(11) DEFAULT NULL,
  `data_criacao_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `ultimo_login` timestamp NULL DEFAULT NULL,
  `tipo_usuario` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`pacientes`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
>>>>>>> Stashed changes
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
<<<<<<< Updated upstream
INSERT INTO `clientes` VALUES (83,'Annibal Gulias Moreira','2000-09-16','emailquefizerampramim@gmail.com','Masculino','Ana Carolina Santos','211.045.357-50','(21) 9 6415-4537','(21) 3181-5519','21021060','Penha','Rio de Janeiro','RJ','Rua Santa Camila Pia',168,'annibs','12345678','12345678','2024-06-05 15:00:25',NULL),(84,'Rodrigo da Silva','2000-01-01','aaaa@gmail.com','Masculino','Carolina da Silva','695.041.440-47','(21) 9 6415-4537','(21) 3181-5519','55008570','São Francisco','Caruaru','PE','Rua Heráclito Ramos',100,'Rodriz','12345678','12345678','2024-06-05 15:00:25','2024-06-05 15:15:50'),(85,'Hugo Daniel Ferrete dos Santos','2000-07-13','test@cliente.com','Masculino','Rosangela Ferrete de Souza','191.761.947-28','(21) 9 7652-7831','(21) 2525-4454','25080030','Parque Paulicéia','Duque de Caxias','RJ','Rua Pernambuco',173,'HD-TI2','Hugo9143','Hugo9143','2024-06-07 02:41:31','2024-06-07 02:42:16');
=======
INSERT INTO `clientes` VALUES (1,'Hugo Daniel Ferrete dos Santos','2000-07-13','testlogin@gmail.com','Masculino','Rosangela Ferreira dos Santos','19176194228','21976527831','2125287478','25080030','Parque Paulicéia','Duque de Caxias','Rio de Janeiro','Rua Pernambuco',173,'HD-TI2','Hugo9143','Hugo9143',NULL,NULL,'2024-06-08 20:59:30',NULL,NULL),(59,'Lucas Roberto Lopes Da Silva','2004-06-25','lucas@email.com','Masculino','Patricia dos Santos','574.201.260-89','(21) 9 9961','(21) 9999-','21041180','Manguinhos','Rio de Janeiro','RJ','Rua Diogo de Vasconcelos',40,'llopes','12345678','12345678',NULL,NULL,'2024-06-08 20:59:30',NULL,NULL),(60,'Maria Oliveira ','1966-03-25','mo@gmail.com','Masculino','Maria do Céu Oliveira','148.320.020-58','(21) 9 9995','(21) 2222-','21021030','Penha','Rio de Janeiro','RJ','Rua Macapuri',40,'Mojcol','12345678','12345678',NULL,NULL,'2024-06-08 20:59:30',NULL,NULL),(61,'João Roberto Souza','1986-12-25','jrs@gmail.com','Masculino','Judite de Souza','873.043.260-00','(21) 9 6565','(21) 2230-','21021480','Olaria','Rio de Janeiro','RJ','Rua André Azevedo',87,'jrsjs1','12345678','12345678',NULL,NULL,'2024-06-08 20:59:30',NULL,NULL),(64,'Big Big Santos','1993-03-21','big@gmail.com','Masculino','Big big mae  da silva','575.085.790-54','(21) 3 2983','(21) 3213-','21021490','Olaria','Rio de Janeiro','RJ','Rua Angélica Mota',2139,'bigbig','12345678','12345678',NULL,NULL,'2024-06-08 20:59:30','2024-06-08 22:25:23',NULL),(65,'kaua ddadasdasda','2004-12-14','afsdaf@gmail.com','Masculino','fsdfdsfsefefsdfews','811.012.297-30','(21) 9 6465','(21) 4587-','22765845','Anil','Rio de Janeiro','RJ','Rua Henrique',35,'kaaaaa','12345678','12345678',NULL,NULL,'2024-06-08 20:59:30','2024-06-09 03:22:12',NULL);
>>>>>>> Stashed changes
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `tentativas` int(11) DEFAULT 0,
  `ultima_tentativa` datetime DEFAULT NULL,
  `tipo_usuario` enum('cliente','medico') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicos`
--

DROP TABLE IF EXISTS `medicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medicos` (
<<<<<<< Updated upstream
  `doutor'a` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`doutor'a`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
=======
  `doutor` int(11) NOT NULL AUTO_INCREMENT,
  `nome_completo_medic` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_nasc_medic` date NOT NULL,
  `email_medic` varchar(110) COLLATE utf8mb4_unicode_ci NOT NULL,
  `especializacao` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo_medic` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome_mae_medic` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CPF_medic` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_cel_medic` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_tel_medic` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CRM` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CEP_medic` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro_medic` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipio_medic` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_medic` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco_medic` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_medic` int(11) NOT NULL,
  `usuario_medic` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha_medic` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm_senha_medic` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`doutor`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
>>>>>>> Stashed changes
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicos`
--

LOCK TABLES `medicos` WRITE;
/*!40000 ALTER TABLE `medicos` DISABLE KEYS */;
INSERT INTO `medicos` VALUES (46,'Hugo Daniel Ferrete dos Santos','2000-07-13','test@medico.com','Cardiologista','Masculino','Rosangela Ferrete de Souza','191.761.947-28','(21) 9 7652-783','(21) 2525-4465','165555','25080030','Parque Paulicéia','Duque de Caxias','RJ','Rua Pernambuco',173,'MED-TI','Hugo9143','Hugo9143');
/*!40000 ALTER TABLE `medicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `two_fa_codes`
--

DROP TABLE IF EXISTS `two_fa_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `two_fa_codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `codigo_2fa` varchar(6) NOT NULL,
  `expira_em` datetime NOT NULL,
  `tipo_usuario` enum('cliente','medico') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `two_fa_codes`
--

LOCK TABLES `two_fa_codes` WRITE;
/*!40000 ALTER TABLE `two_fa_codes` DISABLE KEYS */;
INSERT INTO `two_fa_codes` VALUES (7,66,'434984','2024-06-08 22:23:48','cliente'),(8,66,'458382','2024-06-08 22:27:39','cliente'),(9,66,'883305','2024-06-08 22:31:21','cliente'),(10,66,'627214','2024-06-08 22:32:38','cliente'),(11,66,'553324','2024-06-08 22:33:10','cliente'),(12,49,'751663','2024-06-08 22:39:51','medico'),(13,65,'789712','2024-06-08 22:41:18','cliente'),(14,65,'568108','2024-06-08 22:41:41','cliente'),(15,66,'956747','2024-06-08 22:52:54','cliente'),(16,65,'471333','2024-06-08 22:53:24','cliente'),(17,65,'455257','2024-06-08 23:08:18','cliente'),(18,65,'752478','2024-06-08 23:09:28','cliente'),(19,64,'337580','2024-06-09 00:28:01','cliente'),(20,64,'362405','2024-06-09 00:30:23','cliente'),(21,65,'240138','2024-06-09 00:55:50','cliente'),(22,65,'183483','2024-06-09 01:00:14','cliente'),(23,65,'490371','2024-06-09 01:02:08','cliente'),(24,65,'874111','2024-06-09 01:06:34','cliente'),(25,65,'871303','2024-06-09 01:11:58','cliente'),(26,65,'634499','2024-06-09 01:13:41','cliente'),(27,65,'877474','2024-06-09 01:24:51','cliente'),(28,65,'252196','2024-06-09 01:26:04','cliente'),(29,65,'208740','2024-06-09 01:26:48','cliente'),(30,65,'496396','2024-06-09 01:28:31','cliente'),(31,65,'630058','2024-06-09 02:52:18','cliente'),(32,66,'432703','2024-06-09 02:53:15','cliente'),(33,65,'587850','2024-06-09 02:54:01','cliente'),(34,65,'420265','2024-06-09 05:27:12','cliente'),(35,68,'102694','2024-06-09 05:43:06','cliente'),(36,69,'938949','2024-06-09 06:43:41','cliente'),(37,70,'896773','2024-06-09 06:45:31','cliente');
/*!40000 ALTER TABLE `two_fa_codes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

<<<<<<< Updated upstream
-- Dump completed on 2024-06-06 23:46:37
=======
-- Dump completed on 2024-06-09  1:46:44
>>>>>>> Stashed changes

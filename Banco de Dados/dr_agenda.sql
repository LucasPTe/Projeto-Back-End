create database dr_agenda;
use dr_agenda;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: dr_agenda
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
  `numero_cel` varchar(11) NOT NULL,
  `numero_tel` varchar(10) NOT NULL,
  `CEP` varchar(10) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `municipio` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `numero` int(11) NOT NULL,
  `usuario` varchar(6) NOT NULL,
  `senha` varchar(16) NOT NULL,
  `confirm_senha` varchar(16) NOT NULL,
  `codigo_autenticacao` int(11) DEFAULT NULL,
  `data_codigo` int(11) DEFAULT NULL,
  `data_criacao_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `ultimo_login` timestamp NULL DEFAULT NULL,
  `tipo_usuario` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`pacientes`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'Hugo Daniel Ferrete dos Santos','2000-07-13','testlogin@gmail.com','Masculino','Rosangela Ferreira dos Santos','19176194228','21976527831','2125287478','25080030','Parque Paulicéia','Duque de Caxias','Rio de Janeiro','Rua Pernambuco',173,'HD-TI2','Hugo9143','Hugo9143',NULL,NULL,'2024-06-08 20:59:30',NULL,NULL),(59,'Lucas Roberto Lopes Da Silva','2004-06-25','lucas@email.com','Masculino','Patricia dos Santos','574.201.260-89','(21) 9 9961','(21) 9999-','21041180','Manguinhos','Rio de Janeiro','RJ','Rua Diogo de Vasconcelos',40,'llopes','12345678','12345678',NULL,NULL,'2024-06-08 20:59:30',NULL,NULL),(60,'Maria Oliveira ','1966-03-25','mo@gmail.com','Masculino','Maria do Céu Oliveira','148.320.020-58','(21) 9 9995','(21) 2222-','21021030','Penha','Rio de Janeiro','RJ','Rua Macapuri',40,'Mojcol','12345678','12345678',NULL,NULL,'2024-06-08 20:59:30',NULL,NULL),(61,'João Roberto Souza','1986-12-25','jrs@gmail.com','Masculino','Judite de Souza','873.043.260-00','(21) 9 6565','(21) 2230-','21021480','Olaria','Rio de Janeiro','RJ','Rua André Azevedo',87,'jrsjs1','12345678','12345678',NULL,NULL,'2024-06-08 20:59:30',NULL,NULL),(64,'Big Big Santos','1993-03-21','big@gmail.com','Masculino','Big big mae  da silva','575.085.790-54','(21) 3 2983','(21) 3213-','21021490','Olaria','Rio de Janeiro','RJ','Rua Angélica Mota',2139,'bigbig','12345678','12345678',NULL,NULL,'2024-06-08 20:59:30','2024-06-08 22:25:23',NULL),(65,'kaua ddadasdasda','2004-12-14','afsdaf@gmail.com','Masculino','fsdfdsfsefefsdfews','811.012.297-30','(21) 9 6465','(21) 4587-','22765845','Anil','Rio de Janeiro','RJ','Rua Henrique',35,'kaaaaa','12345678','12345678',NULL,NULL,'2024-06-08 20:59:30','2024-06-09 03:22:12',NULL),(71,'sdojfgnsdujofnsdjifnhsd','2000-01-01','asljdfhnsdhij@gmail.com','Masculino','sjfsduyhfgsdhfsdh','966.428.930-26','(21) 1 1111','(21) 1111-','64000919','Cabral','Teresina','PI','Praça Edgard Nogueira',23,'uiuiui','12345678','12345678',NULL,NULL,'2024-06-09 05:11:08','2024-06-10 01:38:01','Paciente'),(72,'Annibal Gulias Moreira','2000-09-16','aaa@gmail.com','','Monica da silva','736.690.220-90','(21) 1 1111','(21) 1111-','69074512','Santa Luzia','Manaus','AM','Beco Mataro',23,'Popopo','12345678','12345678',NULL,NULL,'2024-06-10 02:26:51','2024-06-10 02:28:53','Médico');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  `doutor` int(11) NOT NULL AUTO_INCREMENT,
  `nome_completo_medic` varchar(80) NOT NULL,
  `data_nasc_medic` date NOT NULL,
  `email_medic` varchar(110) NOT NULL,
  `especializacao` varchar(50) NOT NULL,
  `sexo_medic` varchar(15) NOT NULL,
  `nome_mae_medic` varchar(80) NOT NULL,
  `CPF_medic` varchar(15) NOT NULL,
  `numero_cel_medic` varchar(11) NOT NULL,
  `numero_tel_medic` varchar(10) NOT NULL,
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
  `data_criacao_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `tipo_usuario` varchar(20) DEFAULT NULL,
  `ultimo_login` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`doutor`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicos`
--

LOCK TABLES `medicos` WRITE;
/*!40000 ALTER TABLE `medicos` DISABLE KEYS */;
INSERT INTO `medicos` VALUES (1,'Hugo Daniel Ferrete dos Santos','2000-07-13','medic@gmail.com','Cardiologista','Masculino','Rosangela Ferreira dos Santos','19176194228','21976527831','2125287478','130720','25080030','Parque Paulicéia','Duque de Caxias','Rio de Janeiro','Rua Pernambuco',173,'MED-TI','Hugo9143','Hugo9143','2024-06-10 02:36:18',NULL,NULL),(46,'Mariana Thereza Costa','1970-02-07','mtc@gmail.com','Nutricionista','Masculino','Maria Thereza Costa','215.054.450-43','(21) 9 8545','(21) 2265-','567556','22640102','Barra da Tijuca','Rio de Janeiro','RJ','Avenida das Américas',4000,'mtc123','12345678','12345678','2024-06-10 02:36:18',NULL,NULL),(47,'Rogerio Vinicius Soares','1975-06-26','rlsm@gmail.com','Oftalmologista','Masculino','Laura Maria Soares','352.695.170-51','(21) 9 4751','(21) 2777-','562015','22430060','Leblon','Rio de Janeiro','RJ','Avenida Afrânio de Melo Franco',200,'rvs562','12345678','12345678','2024-06-10 02:36:18',NULL,NULL),(48,'Pedro Antônio Patrício','1969-05-10','pap@gmail.com','Psicologia','Masculino','Maria de Fátima Patrício','743.261.190-47','(21) 9 7124','(21) 3587-','441053','21021120','Penha','Rio de Janeiro','RJ','Rua São Basiliano',20,'pap123','12345678','12345678','2024-06-10 02:36:18',NULL,NULL),(49,'Jose Noberto Lopes','1995-03-10','josenoberto@gmail.com','Pediatria','Masculino','Janaina Lopes Soares','153.691.800-83','(21) 3 2091','(31) 2837-','435634','21021380','Olaria','Rio de Janeiro','RJ','Rua Filomena Nunes',102,'joseno','12345678','12345678','2024-06-10 02:36:18',NULL,NULL),(51,'aaaaaaaaaaaaaaa','1999-12-12','aaaa@gmail.com','','N_informado','aaaaaaaaaaaaaaaaaaaaaaaa','548.469.080-38','(21) 1 1111','(21) 1111-','132456','19802171','Vila Fabiano','Assis','SP','Rua João Ribeiro',23,'tututu','12345678','12345678','2024-06-10 02:44:29','Médico',NULL),(52,'aaaaaaaaaaaaaaaaaaaaaaa','2001-01-11','aaa@gmail.com','','Masculino','tttttttttttttttttt','880.099.270-66','(21) 1 1111','(21) 1111-','545353','17054225','Vila Santa Inês','Bauru','SP','Praça Clementina Fernandes',10,'bagbag','12345678','12345678','2024-06-10 03:10:36','Médico',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `two_fa_codes`
--

LOCK TABLES `two_fa_codes` WRITE;
/*!40000 ALTER TABLE `two_fa_codes` DISABLE KEYS */;
INSERT INTO `two_fa_codes` VALUES (7,66,'434984','2024-06-08 22:23:48','cliente'),(8,66,'458382','2024-06-08 22:27:39','cliente'),(9,66,'883305','2024-06-08 22:31:21','cliente'),(10,66,'627214','2024-06-08 22:32:38','cliente'),(11,66,'553324','2024-06-08 22:33:10','cliente'),(12,49,'751663','2024-06-08 22:39:51','medico'),(13,65,'789712','2024-06-08 22:41:18','cliente'),(14,65,'568108','2024-06-08 22:41:41','cliente'),(15,66,'956747','2024-06-08 22:52:54','cliente'),(16,65,'471333','2024-06-08 22:53:24','cliente'),(17,65,'455257','2024-06-08 23:08:18','cliente'),(18,65,'752478','2024-06-08 23:09:28','cliente'),(19,64,'337580','2024-06-09 00:28:01','cliente'),(20,64,'362405','2024-06-09 00:30:23','cliente'),(21,65,'240138','2024-06-09 00:55:50','cliente'),(22,65,'183483','2024-06-09 01:00:14','cliente'),(23,65,'490371','2024-06-09 01:02:08','cliente'),(24,65,'874111','2024-06-09 01:06:34','cliente'),(25,65,'871303','2024-06-09 01:11:58','cliente'),(26,65,'634499','2024-06-09 01:13:41','cliente'),(27,65,'877474','2024-06-09 01:24:51','cliente'),(28,65,'252196','2024-06-09 01:26:04','cliente'),(29,65,'208740','2024-06-09 01:26:48','cliente'),(30,65,'496396','2024-06-09 01:28:31','cliente'),(31,65,'630058','2024-06-09 02:52:18','cliente'),(32,66,'432703','2024-06-09 02:53:15','cliente'),(33,65,'587850','2024-06-09 02:54:01','cliente'),(34,65,'420265','2024-06-09 05:27:12','cliente'),(35,68,'102694','2024-06-09 05:43:06','cliente'),(36,69,'938949','2024-06-09 06:43:41','cliente'),(37,70,'896773','2024-06-09 06:45:31','cliente'),(38,71,'823973','2024-06-09 07:32:35','cliente'),(39,71,'845320','2024-06-10 03:39:39','cliente'),(40,71,'733752','2024-06-10 03:43:01','cliente'),(41,72,'679785','2024-06-10 04:33:53','cliente'),(42,49,'387472','2024-06-10 04:57:13','medico'),(43,51,'661181','2024-06-10 05:02:32','medico'),(44,51,'964530','2024-06-10 05:12:39','medico'),(45,52,'257409','2024-06-10 05:16:21','medico');
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

-- Dump completed on 2024-06-10  0:13:49

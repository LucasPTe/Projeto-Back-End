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
  PRIMARY KEY (`pacientes`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'Hugo Daniel Ferrete dos Santos','2000-07-13','testlogin@gmail.com','Masculino','Rosangela Ferreira dos Santos','19176194228','21976527831','2125287478','25080030','Parque Paulicéia','Duque de Caxias','Rio de Janeiro','Rua Pernambuco',173,'HD-TI2','Hugo9143','Hugo9143'),(58,'Lucas Roberto Lopes','2004-06-25','l7@gmail.com','Discreto','PAtricia Ferreira Lopes','124.931.000-85','(21) 9 2381','(21) 3203-','21041180','Manguinhos','Rio de Janeiro','RJ','Rua Diogo de Vasconcelos',40,'lrlope','01020304','01020304'),(59,'Lucas Roberto Lopes Da Silva','2004-06-25','lucas@email.com','Masculino','Patricia dos Santos','574.201.260-89','(21) 9 9961','(21) 9999-','21041180','Manguinhos','Rio de Janeiro','RJ','Rua Diogo de Vasconcelos',40,'llopes','12345678','12345678'),(60,'Maria Oliveira ','1966-03-25','mo@gmail.com','Masculino','Maria do Céu Oliveira','148.320.020-58','(21) 9 9995','(21) 2222-','21021030','Penha','Rio de Janeiro','RJ','Rua Macapuri',40,'Mojcol','12345678','12345678'),(61,'João Roberto Souza','1986-12-25','jrs@gmail.com','Masculino','Judite de Souza','873.043.260-00','(21) 9 6565','(21) 2230-','21021480','Olaria','Rio de Janeiro','RJ','Rua André Azevedo',87,'jrsjs1','12345678','12345678'),(62,'Ana Clara Silva','2000-10-02','acs1@gmail.com','Masculino','Ana Luiza Silva','356.903.320-11','(21) 9 8745','(21) 2560-','21041120','Bonsucesso','Rio de Janeiro','RJ','Rua Júlio Maria',100,'acs123','12345678','12345678');
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
  PRIMARY KEY (`doutor`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicos`
--

LOCK TABLES `medicos` WRITE;
/*!40000 ALTER TABLE `medicos` DISABLE KEYS */;
INSERT INTO `medicos` VALUES (1,'Hugo Daniel Ferrete dos Santos','2000-07-13','medic@gmail.com','Cardiologista','Masculino','Rosangela Ferreira dos Santos','19176194228','21976527831','2125287478','130720','25080030','Parque Paulicéia','Duque de Caxias','Rio de Janeiro','Rua Pernambuco',173,'MED-TI','Hugo9143','Hugo9143'),(46,'Mariana Thereza Costa','1970-02-07','mtc@gmail.com','Gastroenterologista','Masculino','Maria Thereza Costa','215.054.450-43','(21) 9 8545','(21) 2265-','567556','22640102','Barra da Tijuca','Rio de Janeiro','RJ','Avenida das Américas',4000,'mtc123','12345678','12345678'),(47,'Rogerio Vinicius Soares','1975-06-26','rlsm@gmail.com','Cardiologia','Masculino','Laura Maria Soares','352.695.170-51','(21) 9 4751','(21) 2777-','562015','22430060','Leblon','Rio de Janeiro','RJ','Avenida Afrânio de Melo Franco',200,'rvs562','12345678','12345678'),(48,'Pedro Antônio Patrício','1969-05-10','pap@gmail.com','Nutrologo','Masculino','Maria de Fátima Patrício','743.261.190-47','(21) 9 7124','(21) 3587-','441053','21021120','Penha','Rio de Janeiro','RJ','Rua São Basiliano',20,'pap123','12345678','12345678');
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

-- Dump completed on 2024-05-15 17:56:31

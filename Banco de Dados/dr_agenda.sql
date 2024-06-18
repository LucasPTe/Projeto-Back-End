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
  `numero_cel` varchar(16) DEFAULT NULL,
  `numero_tel` varchar(14) NOT NULL,
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
  `tipo_2fa` varchar(255) DEFAULT 'e-mail',
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  PRIMARY KEY (`pacientes`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (81,'Me come Hugo Por favor','2000-01-01','estouteimplorando@gmail.com','Masculino','serio vamos logo','18138307030','21951981231','2191235481','21864320','Bangu','Rio de Janeiro','RJ','Rua Alenício Ferreira Pinto',200,'comiai','12345678','12345678',NULL,NULL,'2024-06-15 02:25:25','2024-06-15 02:25:33','Paciente','e-mail',-22.85360440,-43.46023350),(82,'Joao Pau de Feijao','2004-02-10','joao@gmail.coom','Masculino','Joana pe de feijaona','69568281037','23131289038','2109381290','21870430','Padre Miguel','Rio de Janeiro','RJ','Rua D',10,'joaope','12345678','12345678',NULL,NULL,'2024-06-15 03:49:44','2024-06-15 03:49:53','Paciente','e-mail',-22.87452190,-43.44943770),(83,'Thiago Pereira Romano','2000-01-01','thiago@gmail.com','Masculino','Renata Pereira Romano','88412573005','21965864231','2131531681','20540156','Andaraí','Rio de Janeiro','RJ','Rua Barão de Mesquita',125,'thiago','12345678','12345678',NULL,NULL,'2024-06-18 16:09:50',NULL,'Paciente','e-mail',-22.91933320,-43.23059440);
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
  `numero_cel_medic` varchar(16) DEFAULT NULL,
  `numero_tel_medic` varchar(14) DEFAULT NULL,
  `CRM` varchar(10) DEFAULT NULL,
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
  `tipo_2fa` varchar(255) DEFAULT 'e-mail',
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  PRIMARY KEY (`doutor`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicos`
--

LOCK TABLES `medicos` WRITE;
/*!40000 ALTER TABLE `medicos` DISABLE KEYS */;
INSERT INTO `medicos` VALUES (56,'Lucas Roberto Lopes','2000-01-01','lulu@gmail.com','Pediatria','Masculino','Patricia Ferreira','84404238029','21961284231','2131518131','RJ-777.554','21041180','Manguinhos','Rio de Janeiro','RJ','Rua Diogo de Vasconcelos',40,'lululu','12345678','12345678','2024-06-15 01:48:48','Médico',NULL,'e-mail',-22.87541670,-43.25117790),(57,'Edivalda Pereira','2000-01-01','edival@gmail.com','Pediatria','Feminino','Edivania Pereira','59019610058','21961621986','2131816518','RJ-777.988','21020050','Penha','Rio de Janeiro','RJ','Rua Nicarágua',630,'dredii','12345678','12345678','2024-06-15 02:08:21','Médico',NULL,'e-mail',-22.83785560,-43.28044320),(58,'Bicho Beluga','2000-01-01','bicho@gmail.com','Cardiologista','Masculino','Bicha Beluga Batendo','45437670044','21981541812','2131812351','RJ-417.256','21042720','Bonsucesso','Rio de Janeiro','RJ','Rua São Roque',25,'bichoo','12345678','12345678','2024-06-15 02:55:44','Médico',NULL,'e-mail',-22.85872830,-43.24309140),(59,'Vitoria Martins','2003-10-25','vihmary51@gmail.com','Pediatria','Feminino','Maria Elieuda Sousa','74502830003','21983470328','2137922901','RJ-432.032','22081020','Copacabana','Rio de Janeiro','RJ','Rua Conselheiro Lafaiete',5,'VVpedi','12345678','12345678','2024-06-16 18:20:07','Médico',NULL,'e-mail',-22.98595060,-43.19234190),(60,'Catarina De Sousa','1982-09-12','catarina@gmail.com','Cardiologista','Feminino','Paula Toblerone Schutz','18721059047','21321873879','2103123821','RJ-210.012','21931040','Jardim Guanabara','Rio de Janeiro','RJ','Rua Formosa',120,'catsou','11223344','11223344','2024-06-16 18:33:25','Médico',NULL,'e-mail',-22.81776420,-43.19076590),(61,'Aristides Pimentel','1966-08-20','aristides@gmail.com','Psicologia','Masculino','Sacomara Pimentel','84347538049','21382183970','2109312309','RJ-052.123','22793907','Barra da Tijuca','Rio de Janeiro','RJ','Avenida Ayrton Senna',720,'aristi','11223344','11223344','2024-06-16 18:44:08','Médico',NULL,'e-mail',-22.98315320,-43.36602850),(62,'Luís Carlos Drumond','1992-06-16','luis@gmail.com','Psicologia','Masculino','Rosangela Drummond Andrade','25981096519','21398712897','2189378129','RJ-052.083','23510080','Santa Cruz','Rio de Janeiro','RJ','Rua Sargento Fonseca',23,'luiscr','11223344','11223344','2024-06-16 18:55:33','Médico',NULL,'e-mail',-22.89869420,-43.72323980),(63,'Rebeca Carla Elza Rodrigues','1992-05-23','rebeca@gmail.com','Psicologia','Feminino','Giovanna Evelyn Sophia','73467993052','21938021089','2141924890','RJ-328.490','21031190','Ramos','Rio de Janeiro','RJ','Rua Passos Coutinho',220,'rebeca','11223344','11223344','2024-06-16 19:03:27','Médico',NULL,'e-mail',-22.84708410,-43.25524980),(64,'Benjamin Lucca Mário Pires','1992-04-09','benja@gmail.com','Cardiologista','Masculino','Patricia Lopes da Silva','22812838876','21903821389','2138901298','RJ-217.983','20061001','Centro','Rio de Janeiro','RJ','Rua Buenos Aires',650,'benjam','11223344','11223344','2024-06-16 19:08:13','Médico',NULL,'e-mail',-22.90592940,-43.18704140),(65,'Gabriel Luís Carlos ','1965-06-09','gabriel@gmail.com','Oftalmologista','Masculino','Bárbara Mariana','98083904040','21378907128','2194871298','RJ-120.931','20530580','Tijuca','Rio de Janeiro','RJ','Rua Gurindiba',23,'gabrie','11223344','11223344','2024-06-16 19:24:37','Médico',NULL,'e-mail',-22.93360480,-43.24826040),(66,'Márcia Natalia Sousa','1964-09-10','Marcia@gmail.com','Oftalmologista','Masculino','Sonia Abraao Somari','35315313603','21390218398','2109830891','RJ-920.183','21040018','Ramos','Rio de Janeiro','RJ','Rua João Gonçalves de Lima Filho',85,'marcia','11223344','11223344','2024-06-16 19:27:45','Médico',NULL,'e-mail',-22.85544010,-43.25380200),(67,'Paulo Davi de Almeida','1976-04-05','paulo@gmail.com','Oftalmologista','Masculino','Mariana Salemi de Sona','89399971317','21390812980','2109381290','RJ-210.397','22011901','Copacabana','Rio de Janeiro','RJ','Avenida Princesa Isabel',83,'paulod','11223344','11223344','2024-06-16 19:29:39','Médico',NULL,'e-mail',-22.96417470,-43.17434090),(68,'Theo Anderson Olvieira','1971-03-06','theo@agenda.com','Nutrologia','Masculino','Tanagra Somaritch','38145629098','21321908389','0213871048','RJ-219.038','22260137','Botafogo','Rio de Janeiro','RJ','Beco da Estrela Guia',12,'theoan','11223344','11223344','2024-06-16 22:06:27','Médico',NULL,'e-mail',-22.94759170,-43.19443690),(69,'Yago Marcos De Soyuza','1964-12-02','yago@agenda.com','Nutrologia','Masculino','Rosangela Santana','95443435043','21392193081','2139802138','RJ-128.321','23076100','Campo Grande','Rio de Janeiro','RJ','Rua Jonas Passos Soares',20,'Yagoma','11223344','11223344','2024-06-16 22:07:45','Médico',NULL,'e-mail',-22.88703080,-43.57320560),(70,'Fernanda Lima Santana','1991-07-28','fernanda@agenda.com','Nutrologia','Feminino','Gisele Bruchet Santana','91724824007','21320189731','1908421812','RJ-213.908','21862970','Bangu','Rio de Janeiro','RJ','Avenida Doutora Maria Estrela',720,'nanda1','11223344','11223344','2024-06-16 22:10:05','Médico',NULL,'e-mail',-22.86533440,-43.46679190),(71,'Bento da Silva Pereira','2000-01-01','bento@gmail.com','Pediatria','Masculino','Vandeia Pereira','49463833013','21965123812','2135813152','RJ-646.968','21370450','Tomás Coelho','Rio de Janeiro','RJ','Rua J. J. Cowsert',25,'bentoo','12345678','12345678','2024-06-18 17:05:47','Médico',NULL,'e-mail',-22.86717230,-43.30885160);
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
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `two_fa_codes`
--

LOCK TABLES `two_fa_codes` WRITE;
/*!40000 ALTER TABLE `two_fa_codes` DISABLE KEYS */;
INSERT INTO `two_fa_codes` VALUES (7,66,'434984','2024-06-08 22:23:48','cliente'),(8,66,'458382','2024-06-08 22:27:39','cliente'),(9,66,'883305','2024-06-08 22:31:21','cliente'),(10,66,'627214','2024-06-08 22:32:38','cliente'),(11,66,'553324','2024-06-08 22:33:10','cliente'),(12,49,'751663','2024-06-08 22:39:51','medico'),(13,65,'789712','2024-06-08 22:41:18','cliente'),(14,65,'568108','2024-06-08 22:41:41','cliente'),(15,66,'956747','2024-06-08 22:52:54','cliente'),(16,65,'471333','2024-06-08 22:53:24','cliente'),(17,65,'455257','2024-06-08 23:08:18','cliente'),(18,65,'752478','2024-06-08 23:09:28','cliente'),(19,64,'337580','2024-06-09 00:28:01','cliente'),(20,64,'362405','2024-06-09 00:30:23','cliente'),(21,65,'240138','2024-06-09 00:55:50','cliente'),(22,65,'183483','2024-06-09 01:00:14','cliente'),(23,65,'490371','2024-06-09 01:02:08','cliente'),(24,65,'874111','2024-06-09 01:06:34','cliente'),(25,65,'871303','2024-06-09 01:11:58','cliente'),(26,65,'634499','2024-06-09 01:13:41','cliente'),(27,65,'877474','2024-06-09 01:24:51','cliente'),(28,65,'252196','2024-06-09 01:26:04','cliente'),(29,65,'208740','2024-06-09 01:26:48','cliente'),(30,65,'496396','2024-06-09 01:28:31','cliente'),(31,65,'630058','2024-06-09 02:52:18','cliente'),(32,66,'432703','2024-06-09 02:53:15','cliente'),(33,65,'587850','2024-06-09 02:54:01','cliente'),(34,65,'420265','2024-06-09 05:27:12','cliente'),(35,68,'102694','2024-06-09 05:43:06','cliente'),(36,69,'938949','2024-06-09 06:43:41','cliente'),(37,70,'896773','2024-06-09 06:45:31','cliente'),(38,71,'823973','2024-06-09 07:32:35','cliente'),(39,71,'845320','2024-06-10 03:39:39','cliente'),(40,71,'733752','2024-06-10 03:43:01','cliente'),(41,72,'679785','2024-06-10 04:33:53','cliente'),(42,49,'387472','2024-06-10 04:57:13','medico'),(43,51,'661181','2024-06-10 05:02:32','medico'),(44,51,'964530','2024-06-10 05:12:39','medico'),(45,52,'257409','2024-06-10 05:16:21','medico'),(46,1,'877801','2024-06-14 23:58:11','cliente'),(47,75,'873296','2024-06-15 02:10:01','cliente'),(48,78,'369125','2024-06-15 03:33:01','cliente'),(49,79,'146838','2024-06-15 03:54:21','cliente'),(50,80,'337924','2024-06-15 04:23:15','cliente'),(51,81,'581407','2024-06-15 04:30:33','cliente'),(52,82,'588908','2024-06-15 05:54:53','cliente'),(53,60,'988868','2024-06-16 23:53:22','medico'),(54,82,'850062','2024-06-17 00:43:31','cliente'),(55,82,'480600','2024-06-17 01:54:22','cliente'),(56,56,'982511','2024-06-17 03:32:45','medico'),(57,82,'420256','2024-06-17 03:43:15','cliente'),(58,83,'314671','2024-06-18 18:14:58','cliente'),(59,83,'721779','2024-06-18 18:45:09','cliente'),(60,83,'979533','2024-06-18 18:54:58','cliente'),(61,83,'715129','2024-06-18 18:56:13','cliente'),(62,83,'544075','2024-06-18 19:08:52','cliente'),(63,71,'734936','2024-06-18 19:10:53','medico'),(64,83,'600708','2024-06-18 19:11:21','cliente');
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

-- Dump completed on 2024-06-18 14:12:42

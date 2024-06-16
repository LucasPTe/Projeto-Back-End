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

create database dr_agenda;
use dr_agenda;
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
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'Hugo Daniel Ferrete dos Santos','2000-07-13','testlogin@gmail.com','Masculino','Rosangela Ferreira dos Santos','19176194228','2197 52783-1','2125 87478-','25080030','Parque Paulicéia','Duque de Caxias','Rio de Janeiro','Rua Pernambuco',173,'HD-TI2','Hugo9143','Hugo9143',NULL,NULL,'2024-06-08 20:59:30','2024-06-14 21:53:11',NULL,'e-mail',0.00000000,0.00000000),(59,'Lucas Roberto Lopes Da Silva','2004-06-25','lucas@email.com','Masculino','Patricia dos Santos','57420126089','(21) 9 996-1','(21) 9999--','21041180','Manguinhos','Rio de Janeiro','RJ','Rua Diogo de Vasconcelos',40,'llopes','12345678','12345678',NULL,NULL,'2024-06-08 20:59:30',NULL,NULL,'e-mail',0.00000000,0.00000000),(60,'Maria Oliveira ','1966-03-25','mo@gmail.com','Masculino','Maria do Céu Oliveira','14832002058','(21) 9 999-5','(21) 2222--','21021030','Penha','Rio de Janeiro','RJ','Rua Macapuri',40,'Mojcol','12345678','12345678',NULL,NULL,'2024-06-08 20:59:30',NULL,NULL,'e-mail',0.00000000,0.00000000),(61,'João Roberto Souza','1986-12-25','jrs@gmail.com','Masculino','Judite de Souza','87304326000','(21) 9 656-5','(21) 2230--','21021480','Olaria','Rio de Janeiro','RJ','Rua André Azevedo',87,'jrsjs1','12345678','12345678',NULL,NULL,'2024-06-08 20:59:30',NULL,NULL,'e-mail',0.00000000,0.00000000),(64,'Big Big Santos','1993-03-21','big@gmail.com','Masculino','Big big mae  da silva','57508579054','(21) 3 298-3','(21) 3213--','21021490','Olaria','Rio de Janeiro','RJ','Rua Angélica Mota',2139,'bigbig','12345678','12345678',NULL,NULL,'2024-06-08 20:59:30','2024-06-08 22:25:23',NULL,'e-mail',0.00000000,0.00000000),(65,'kaua ddadasdasda','2004-12-14','afsdaf@gmail.com','Masculino','fsdfdsfsefefsdfews','81101229730','(21) 9 646-5','(21) 4587--','22765845','Anil','Rio de Janeiro','RJ','Rua Henrique',35,'kaaaaa','12345678','12345678',NULL,NULL,'2024-06-08 20:59:30','2024-06-09 03:22:12',NULL,'e-mail',0.00000000,0.00000000),(71,'sdojfgnsdujofnsdjifnhsd','2000-01-01','asljdfhnsdhij@gmail.com','Masculino','sjfsduyhfgsdhfsdh','96642893026','(21) 1 111-1','(21) 1111--','64000919','Cabral','Teresina','PI','Praça Edgard Nogueira',23,'uiuiui','12345678','12345678',NULL,NULL,'2024-06-09 05:11:08','2024-06-10 01:38:01','Paciente','e-mail',0.00000000,0.00000000),(72,'Annibal Gulias Moreira','2000-09-16','aaa@gmail.com','','Monica da silva','73669022090','(21) 1 111-1','(21) 1111--','69074512','Santa Luzia','Manaus','AM','Beco Mataro',23,'Popopo','12345678','12345678',NULL,NULL,'2024-06-10 02:26:51','2024-06-10 02:28:53','Médico','e-mail',0.00000000,0.00000000),(73,'Yuri Barros Pereira','2000-01-01','iiiiii@gmail.com','Masculino','Irineia Geovana','18386491078','21681618161','2196851651','64030765','Bela Vista','Teresina','PI','Quadra 14',20,'yuribb','12345678','12345678',NULL,NULL,'2024-06-14 23:54:10',NULL,'Paciente','e-mail',0.00000000,0.00000000),(74,'Zelia Lindinha Pereira','2000-01-01','piru@gmail.com','Feminio','Zelona Lindona Pereira','53561347037','21891651841','2198165187','71576155','Paranoá','Brasília','DF','Quadra 43 Conjunto K',23,'zeliaa','12345678','12345678',NULL,NULL,'2024-06-14 23:59:21',NULL,'Paciente','e-mail',0.00000000,0.00000000),(75,'Vinicius Pacheco','2000-01-01','vinicius@gmail.com','Masculino','Pacheca Vilinha','36393707089','21816189156','2156165189','65040090','João Paulo','São Luís','MA','Rua São Luís',20,'vinijr','12345678','12345678',NULL,NULL,'2024-06-15 00:04:32','2024-06-15 00:05:01','Paciente','e-mail',0.00000000,0.00000000),(76,'Sonia Fatima de Lima','2000-01-01','soniafa@gmail.com','N_Informado','Soninha Fatinha','73865856080','21561651891','2165165185','76907376','São Bernardo','Ji-Paraná','RO','Rua Antônio Oliveira Meronho',20,'soniaa','12345678','12345678',NULL,NULL,'2024-06-15 00:25:47',NULL,'Paciente','e-mail',0.00000000,0.00000000),(77,'Vinicus Almeida','2000-01-01','almeida@gmail.com','Masculino','Vinicias Almeida','12611229090','21965848753','2131851812','62020510','Alto do Cristo','Sobral','CE','Rua Ildefonso Frota Carneiro',20,'viniii','12345678','12345678',NULL,NULL,'2024-06-15 00:28:21',NULL,'Paciente','e-mail',0.00000000,0.00000000),(78,'papapapapapapapap','2000-01-01','papa@gmail.com','N_Informado','papapapapapapapap','37006256003','21912618512','2131812181','49010080','Centro','Aracaju','SE','Praça Fausto Cardoso',20,'papapa','12345678','12345678',NULL,NULL,'2024-06-15 00:54:35','2024-06-15 01:28:01','Paciente','e-mail',0.00000000,0.00000000),(79,'Kaua Bezzara Lindo','2000-10-10','kaua@gmail.com','Masculino','mae do kaua lindo','30466211082','21965841381','2135689568','21021060','Penha','Rio de Janeiro','RJ','Rua Santa Camila Pia',168,'kauakk','12345678','12345678',NULL,NULL,'2024-06-15 01:47:06','2024-06-15 01:49:21','Paciente','e-mail',0.00000000,0.00000000),(80,'Jiboia mecanica','2000-01-01','jib@gmail.com','Masculino','jiboanananananaanan','45568103020','21965847537','2138218121','21072152','Penha','Rio de Janeiro','RJ','Beco do Batista',200,'anchie','12345678','12345678',NULL,NULL,'2024-06-15 02:17:23','2024-06-15 02:18:15','Paciente','e-mail',0.00000000,0.00000000),(81,'Me come Hugo Por favor','2000-01-01','estouteimplorando@gmail.com','Masculino','serio vamos logo','18138307030','21951981231','2191235481','21864320','Bangu','Rio de Janeiro','RJ','Rua Alenício Ferreira Pinto',200,'comiai','12345678','12345678',NULL,NULL,'2024-06-15 02:25:25','2024-06-15 02:25:33','Paciente','e-mail',-22.85360440,-43.46023350),(82,'Joao Pau de Feijao','2004-02-10','joao@gmail.coom','Masculino','Joana pe de feijaona','69568281037','23131289038','2109381290','21870430','Padre Miguel','Rio de Janeiro','RJ','Rua D',10,'joaope','aaaaaaaa','aaaaaaaa',NULL,NULL,'2024-06-15 03:49:44','2024-06-15 03:49:53','Paciente','e-mail',-22.87452190,-43.44943770);
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
  `tipo_2fa` varchar(255) DEFAULT 'e-mail',
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  PRIMARY KEY (`doutor`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicos`
--

LOCK TABLES `medicos` WRITE;
/*!40000 ALTER TABLE `medicos` DISABLE KEYS */;
INSERT INTO `medicos` VALUES (1,'Hugo Daniel Ferrete dos Santos','2000-07-13','medic@gmail.com','Cardiologista','Masculino','Rosangela Ferreira dos Santos','19176194228','2197 52783-1','2125 87478-','130720','25080030','Parque Paulicéia','Duque de Caxias','Rio de Janeiro','Rua Pernambuco',173,'MED-TI','Hugo9143','Hugo9143','2024-06-10 02:36:18',NULL,NULL,'e-mail',0.00000000,0.00000000),(46,'Mariana Thereza Costa','1970-02-07','mtc@gmail.com','Nutricionista','Masculino','Maria Thereza Costa','21505445043','(21) 9 854-5','(21) 2265--','567556','22640102','Barra da Tijuca','Rio de Janeiro','RJ','Avenida das Américas',4000,'mtc123','12345678','12345678','2024-06-10 02:36:18',NULL,NULL,'e-mail',0.00000000,0.00000000),(47,'Rogerio Vinicius Soares','1975-06-26','rlsm@gmail.com','Oftalmologista','Masculino','Laura Maria Soares','35269517051','(21) 9 475-1','(21) 2777--','562015','22430060','Leblon','Rio de Janeiro','RJ','Avenida Afrânio de Melo Franco',200,'rvs562','12345678','12345678','2024-06-10 02:36:18',NULL,NULL,'e-mail',0.00000000,0.00000000),(48,'Pedro Antônio Patrício','1969-05-10','pap@gmail.com','Psicologia','Masculino','Maria de Fátima Patrício','74326119047','(21) 9 712-4','(21) 3587--','441053','21021120','Penha','Rio de Janeiro','RJ','Rua São Basiliano',20,'pap123','12345678','12345678','2024-06-10 02:36:18',NULL,NULL,'e-mail',0.00000000,0.00000000),(49,'Jose Noberto Lopes','1995-03-10','josenoberto@gmail.com','Pediatria','Masculino','Janaina Lopes Soares','15369180083','(21) 3 209-1','(31) 2837--','435634','21021380','Olaria','Rio de Janeiro','RJ','Rua Filomena Nunes',102,'joseno','12345678','12345678','2024-06-10 02:36:18',NULL,NULL,'e-mail',0.00000000,0.00000000),(51,'aaaaaaaaaaaaaaa','1999-12-12','aaaa@gmail.com','','N_informado','aaaaaaaaaaaaaaaaaaaaaaaa','54846908038','(21) 1 111-1','(21) 1111--','132456','19802171','Vila Fabiano','Assis','SP','Rua João Ribeiro',23,'tututu','12345678','12345678','2024-06-10 02:44:29','Médico',NULL,'e-mail',0.00000000,0.00000000),(52,'aaaaaaaaaaaaaaaaaaaaaaa','2001-01-11','aaa@gmail.com','','Masculino','tttttttttttttttttt','88009927066','(21) 1 111-1','(21) 1111--','545353','17054225','Vila Santa Inês','Bauru','SP','Praça Clementina Fernandes',10,'bagbag','12345678','12345678','2024-06-10 03:10:36','Médico',NULL,'e-mail',0.00000000,0.00000000),(53,'','0000-00-00','','','','','',NULL,NULL,'','','','','','',0,'','','','2024-06-14 23:28:38',NULL,NULL,'e-mail',0.00000000,0.00000000),(54,'','0000-00-00','','','','','',NULL,NULL,'','','','','','',0,'','','','2024-06-14 23:28:52',NULL,NULL,'e-mail',0.00000000,0.00000000),(55,'Renato Jacinto Pinto','2000-01-01','hugoliberaopenis@gmail.com','cardiologista','Masculino','Renata Jacinta Pinta','44594739091','21954872782','2131812181','RJ-555','87720227','Conjunto Habitacional Sumaré (Sumaré)','Paranavaí','PR','Rua Sabiá',23,'renato','12345678','12345678','2024-06-15 01:27:22','Médico',NULL,'e-mail',-23.06878480,-52.41857660),(56,'Lucas Roberto Fenomeno','2000-01-01','lulu@gmail.com','pediatria','Masculino','Lucas mae fenomena','84404238029','21961284231','2131518131','RJ-777','21041180','Manguinhos','Rio de Janeiro','RJ','Rua Diogo de Vasconcelos',40,'lululu','12345678','12345678','2024-06-15 01:48:48','Médico',NULL,'e-mail',-22.87541670,-43.25117790),(57,'Edivalda Pereira','2000-01-01','edival@gmail.com','pediatria','Feminio','Edivania Pereira','59019610058','21961621986','2131816518','RJ-777','21020050','Penha','Rio de Janeiro','RJ','Rua Nicarágua',630,'dredii','12345678','12345678','2024-06-15 02:08:21','Médico',NULL,'e-mail',-22.83785560,-43.28044320),(58,'Bicho Beluga Batendo','2000-01-01','bicho@gmail.com','cardiologista','Masculino','Bicha Beluga Batendo','45437670044','21981541812','2131812351','RJ-417','21042720','Bonsucesso','Rio de Janeiro','RJ','Rua São Roque',25,'bichoo','12345678','12345678','2024-06-15 02:55:44','Médico',NULL,'e-mail',-22.85872830,-43.24309140);
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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `two_fa_codes`
--

LOCK TABLES `two_fa_codes` WRITE;
/*!40000 ALTER TABLE `two_fa_codes` DISABLE KEYS */;
INSERT INTO `two_fa_codes` VALUES (7,66,'434984','2024-06-08 22:23:48','cliente'),(8,66,'458382','2024-06-08 22:27:39','cliente'),(9,66,'883305','2024-06-08 22:31:21','cliente'),(10,66,'627214','2024-06-08 22:32:38','cliente'),(11,66,'553324','2024-06-08 22:33:10','cliente'),(12,49,'751663','2024-06-08 22:39:51','medico'),(13,65,'789712','2024-06-08 22:41:18','cliente'),(14,65,'568108','2024-06-08 22:41:41','cliente'),(15,66,'956747','2024-06-08 22:52:54','cliente'),(16,65,'471333','2024-06-08 22:53:24','cliente'),(17,65,'455257','2024-06-08 23:08:18','cliente'),(18,65,'752478','2024-06-08 23:09:28','cliente'),(19,64,'337580','2024-06-09 00:28:01','cliente'),(20,64,'362405','2024-06-09 00:30:23','cliente'),(21,65,'240138','2024-06-09 00:55:50','cliente'),(22,65,'183483','2024-06-09 01:00:14','cliente'),(23,65,'490371','2024-06-09 01:02:08','cliente'),(24,65,'874111','2024-06-09 01:06:34','cliente'),(25,65,'871303','2024-06-09 01:11:58','cliente'),(26,65,'634499','2024-06-09 01:13:41','cliente'),(27,65,'877474','2024-06-09 01:24:51','cliente'),(28,65,'252196','2024-06-09 01:26:04','cliente'),(29,65,'208740','2024-06-09 01:26:48','cliente'),(30,65,'496396','2024-06-09 01:28:31','cliente'),(31,65,'630058','2024-06-09 02:52:18','cliente'),(32,66,'432703','2024-06-09 02:53:15','cliente'),(33,65,'587850','2024-06-09 02:54:01','cliente'),(34,65,'420265','2024-06-09 05:27:12','cliente'),(35,68,'102694','2024-06-09 05:43:06','cliente'),(36,69,'938949','2024-06-09 06:43:41','cliente'),(37,70,'896773','2024-06-09 06:45:31','cliente'),(38,71,'823973','2024-06-09 07:32:35','cliente'),(39,71,'845320','2024-06-10 03:39:39','cliente'),(40,71,'733752','2024-06-10 03:43:01','cliente'),(41,72,'679785','2024-06-10 04:33:53','cliente'),(42,49,'387472','2024-06-10 04:57:13','medico'),(43,51,'661181','2024-06-10 05:02:32','medico'),(44,51,'964530','2024-06-10 05:12:39','medico'),(45,52,'257409','2024-06-10 05:16:21','medico'),(46,1,'877801','2024-06-14 23:58:11','cliente'),(47,75,'873296','2024-06-15 02:10:01','cliente'),(48,78,'369125','2024-06-15 03:33:01','cliente'),(49,79,'146838','2024-06-15 03:54:21','cliente'),(50,80,'337924','2024-06-15 04:23:15','cliente'),(51,81,'581407','2024-06-15 04:30:33','cliente'),(52,82,'588908','2024-06-15 05:54:53','cliente');
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

-- Dump completed on 2024-06-15  0:58:25

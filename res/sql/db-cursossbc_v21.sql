CREATE DATABASE  IF NOT EXISTS `dbcursos_sbc` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `dbcursos_sbc`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: dbcursos_sbc
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.16-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_atividade`
--

DROP TABLE IF EXISTS `tb_atividade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_atividade` (
  `idativ` int(11) NOT NULL AUTO_INCREMENT,
  `nomeativ` varchar(64) NOT NULL,
  `descativ` varchar(128) NOT NULL,
  `geneativ` varchar(32) NOT NULL,
  `prograativ` varchar(32) NOT NULL,
  `origativ` varchar(32) NOT NULL,
  `tipoativ` varchar(32) NOT NULL,
  `idfxetaria` int(11) NOT NULL,
  PRIMARY KEY (`idativ`),
  KEY `fk_atividade_fxetaria_idx` (`idfxetaria`),
  CONSTRAINT `fk_atividade_fxetaria` FOREIGN KEY (`idfxetaria`) REFERENCES `tb_fxetaria` (`idfxetaria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_atividade`
--

LOCK TABLES `tb_atividade` WRITE;
/*!40000 ALTER TABLE `tb_atividade` DISABLE KEYS */;
INSERT INTO `tb_atividade` VALUES (1,'Hidro 3ª idade','Hidroginástica 3ª idade','','Corpo em Ação','SESP','Aquática',18),(2,'Hidroginástica','Hidroginástica adulto','','Corpo em Ação','SESP','Aquática',20),(3,'Hidro inclusiva','Hidroginástica Inclusiva','','Corpo em Ação','SESP','Aquática',19),(4,'Dança Fitness','Aula de Dança Fitness','','Corpo em Ação','PELC','Terrestre',19),(5,'Ritmos','Aula de Ritmos','','Corpo em Ação','PELC','Terrestre',19),(6,'Ginástica idoso','Ginástica funcional para idoso','','Corpo em Ação','SESP','Terrestre',18),(7,'Vôlei adaptado simplificado','Voleibol adaptado simplificado','','Corpo em Ação','SESP','Terrestre',18),(8,'Ginástica','Ginástica funcional adulto jovem','','Corpo em Ação','SESP','Terrestre',20),(9,'Alongamento','Aula de alongamento','','Corpo em Ação','SESP','Terrestre',19),(10,'Oficina','Oficina de...','','Corpo em Ação','SESP','Terrestre',19),(11,'Vôlei feminino','Aula de Voleibol feminino','Feminino','Hora do treino','PELC','Terrestre',6),(12,'Ginástica','Ginástica funcional adulto','','Corpo em Ação','SESP','Terrestre',19),(13,'Vôlei masculino','Aula de Voleibol masculino','Masculino','Hora do treino','PELC','Terrestre',6),(14,'Zumba','Aula de zumba','','Corpo em Ação','Dança','Terrestre',20),(15,'Vôlei adulto','Aula de Voleibol adulto','','Corpo em Ação','PELC','Terrestre',20),(16,'Artesanato','Aula de artesanato','','Corpo em Ação','PELC','Terrestre',19),(17,'Dança Mix','Aula de dança e ritmos diversos','','Corpo em Ação','PELC','Terrestre',19),(18,'Ballet infantil','Aula de ballet infantil','','Hora do treino','PELC','Terrestre',22),(19,'Jazz infantil','Aula de Jazz infantil','','Hora do treino','PELC','Terrestre',23),(20,'Ballet juvenil','Aula de ballet juvenil','','Hora do treino','PELC','Terrestre',24),(21,'Jazz Juvenil','Aula de Jazz juvenil','','Hora do treino','PELC','Terrestre',24),(22,'Caminhada','Caminhada','','Hora do treino','SESP','Terrestre',21),(23,'Futsal','Aula de futsal','','Hora do treino','SESP','Terrestre',21),(24,'Futsal 1','Aula de futsal','','Hora do treino','PELC','Terrestre',21),(25,'Futsal 2','Aula de futsal','','Hora do treino','PELC','Terrestre',21),(26,'Vôlei ','Aula de Voleibol criança/adolescente','','Hora do treino','PELC','Terrestre',21),(27,'Poliesportivo','Aula de esportes e lazer diversos','','Hora do treino','SESP','Terrestre',20),(28,'Karatê','Aula de karatê','','Hora do treino','SESP','Terrestre',21),(29,'Yoga','Aula de yoga','','CRIAtividade','Voluntário','Terrestre',18),(30,'Ginástica idoso','Ginástica funcional para idoso','','CRIAtividade','SESP','Terrestre',18),(31,'Alongamento','Aula de alongamento para idoso','','CRIAtividade','SESP','Terrestre',18),(32,'Ginástica adaptada','Aula de ginástica adaptada','','CRIAtividade','SESP','Terrestre',18),(33,'Tai Chi Chuan','Aula de Tai Chi Chuan','','Corpo em Ação','SESP','Terrestre',19),(34,'Aiki Do','Aula de Aiki Do','','Corpo em Ação','SESP','Terrestre',19),(35,'Pilates','Aula de Pilates','','Corpo em Ação','SESP','Terrestre',20),(36,'Dança de Salão','Aula de dança de salão','','Corpo em Ação','Dança','Terrestre',19),(37,'Dança Country','Aula de dança country','','Corpo em Ação','Dança','Terrestre',19),(38,'Ser Feliz','Aula de atividades diversas','','Hora do treino','SESP','Terrestre',26),(39,'Ser Feliz','Aula de atividades diversas','','Hora do treino','SESP','Terrestre',27),(40,'Badminton','Aula de badminton','','Hora do treino','SESP','Terrestre',26),(41,'Badminton','Aula de badminton','','Hora do treino','SESP','Terrestre',27),(42,'Natação infantil','Aula de natação infantil','','Hora do treino','SESP','Aquática',45),(43,'Natação adulto','Aula de natação adulto','','Corpo em Ação','SESP','Aquática',46),(44,'Vôlei Misto','Aula de Voleibol criança/adolescente','Masc/Fem','Hora do treino','SESP','Terrestre',6),(45,'Natação PCD Adolescente','Natação PCD Aperfeiçoamento adolescente','','Hora do treino','SESP','Aquática',28),(46,'Natação inclusiva','Natação inclusiva pré-adolescente','','Hora do treino','SESP','Aquática',29),(47,'Natação inclusiva','Natação inclusiva adolescente','','Hora do treino','SESP','Aquática',28),(48,'Hidro PCD','Hidroginástica PCD adulto','','Corpo em Ação','SESP','Aquática',19),(49,'Natação PCD criança s/a','Natação PCD sem acompanhante','','Hora do treino','SESP','Aquática',26),(50,'Natação PCD  Adolescente c/a','Natação PCD com acompanhante','','Hora do treino','SESP','Aquática',21),(51,'Natação PCD Adulto','Natação PCD Aperfeiçoamento adulto','','Corpo em Ação','SESP','Aquática',19),(52,'Natação PCD iniciação','Natação PCD iniciação adolescente','','Hora do treino','SESP','Aquática',28),(53,'Natação inclusiva','Natação inclusiva infantil','','Hora do treino','SESP','Aquática',26),(54,'Hidro AVE','Hidroginástica AVE','','Corpo em Ação','SESP','Aquática',19),(55,'Natação PCD Adulto s/a','Natação PCD Adulto sem acompanhante','','Corpo em Ação','SESP','Aquática',19),(56,'Hidro adulto c/ laudo','Hidroginástica adulto com laudo','','Corpo em Ação','SESP','Aquática',30),(57,'Hidro idoso c/ laudo ','Hidroginástica idoso com laudo','','Corpo em Ação','SESP','Aquática',18),(58,'Hidro adulto s/ laudo','Hidroginástica adulto sem laudo','','Corpo em Ação','SESP','Aquática',19),(59,'Promotoria','','','Promotoria','SESP','Terrestre',21),(60,'Ginástica Rítmica','Aula de ginástica rítmica','','Hora do treino','SESP','Terrestre',21),(61,'Atletismo','Treino de atletismo ','','Campeões da vida','SESP','Terrestre',18),(62,'Dança','Aula de dança','','Corpo em Ação','Dança','Terrestre',19),(63,'Capoeira','Aula de Capoeira','','Corpo em Ação','Voluntário','Terrestre',19),(64,'Handebol','Aula de handebol','','Hora do treino','PELC','Terrestre',21),(65,'Futsal','Aula de futsal','','Hora do treino','PELC','Terrestre',21),(66,'Capoeira','Aula de Capoeira','','Hora do treino','PELC','Terrestre',21),(67,'Vôlei  Iniciação','Aula de Voleibol iniciação','','Hora do treino','SESP','Terrestre',35),(68,'Vôlei  adolescente','Aula de Voleibol Adolescente','','Hora do treino','SESP','Terrestre',28),(69,'Yoga','Aula de yoga','','Corpo em Ação','SESP','Terrestre',19),(70,'Ser Feliz','Aula de atividades diversas','','Hora do treino','SESP','Terrestre',34),(71,'Poliesportivo','Aula de esportes e lazer diversos','','Hora do treino','SESP','Terrestre',32),(72,'Poliesportivo','Aula de esportes e lazer diversos','','Hora do treino','SESP','Terrestre',34),(73,'Futsal','Aula de futsal','','Hora do treino','SESP','Terrestre',25),(74,'Futsal','Aula de futsal','','Hora do treino','SESP','Terrestre',32),(75,'Futsal','Aula de futsal','','Corpo em Ação','SESP','Terrestre',20),(76,'Canto coral','Aula de Canto','','Corpo em Ação','SESP','Terrestre',19),(77,'Meditação','Aula de meditação','','Corpo em Ação','SESP','Terrestre',19),(78,'Chi Kung','Aula de Chi Kung','','Corpo em Ação','SESP','Terrestre',19),(79,'Yoga','Aula de yoga','','Corpo em Ação','Voluntário','Terrestre',19),(80,'Meditação','Aula de meditação','','Corpo em Ação','Voluntário','Terrestre',19),(81,'Baby Class','Aula de ballet infantil ','','Hora do treino','PELC','Terrestre',36),(82,'Ballet infantil','Aula de ballet infantil','','Hora do treino','PELC','Terrestre',35),(83,'Jazz Juvenil','Aula de Jazz juvenil','','Hora do treino','PELC','Terrestre',37),(84,'Capoeira','Aula de Capoeira','','Corpo em Ação','PELC','Terrestre',19),(85,'Dança de Salão','Aula de dança de salão','','Corpo em Ação','PELC','Terrestre',19),(86,'Futsal 1','Aula de futsal','','Hora do treino','SESP','Terrestre',38),(87,'Futsal 2','Aula de futsal','','Hora do treino','SESP','Terrestre',39),(88,'Vôlei feminino','Aula de Voleibol feminino idoso','Feminino','Corpo em Ação','SESP','Terrestre',18),(89,'Futsal 1','Aula de futsal','','Hora do treino','SESP','Terrestre',40),(90,'Futsal 2','Aula de futsal','','Hora do treino','SESP','Terrestre',25),(91,'Futsal Feminino','Aula de futsal','Feminino','Hora do treino','SESP','Terrestre',25),(92,'Vôlei iniciante','Aula de voleibol para iniciantes','','Hora do treino','SESP','Terrestre',38),(93,'Handebol iniciante','Aula de handebol iniciante','','Hora do treino','SESP','Terrestre',39),(94,'Vôlei  Iniciação','Aula de Voleibol iniciação','','Hora do treino','SESP','Terrestre',40),(95,'Vôlei feminino','Aula de Voleibol feminino','Feminino','Hora do treino','SESP','Terrestre',25),(96,'Vôlei masculino','Aula de Voleibol masculino','Masculino','Hora do treino','SESP','Terrestre',25),(101,'Ginástica','Ginástica funcional adulto','','Corpo em Ação','PELC','Terrestre',19),(102,'Alongamento','Aula de alongamento','','Corpo em Ação','PELC','Terrestre',19),(103,'Jazz Juvenil','Aula de Jazz juvenil','','Hora do treino','PELC','Terrestre',25);
/*!40000 ALTER TABLE `tb_atividade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_carts`
--

DROP TABLE IF EXISTS `tb_carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_carts` (
  `idcart` int(11) NOT NULL AUTO_INCREMENT,
  `dessessionid` varchar(64) NOT NULL,
  `idpess` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcart`),
  KEY `FK_carts_pessoa_idx` (`idpess`),
  CONSTRAINT `fk_carts_pessoa` FOREIGN KEY (`idpess`) REFERENCES `tb_pessoa` (`idpess`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_carts`
--

LOCK TABLES `tb_carts` WRITE;
/*!40000 ALTER TABLE `tb_carts` DISABLE KEYS */;
INSERT INTO `tb_carts` VALUES (1,'qf6dq6io7b54c9rk9pu9ekmfqd',NULL),(2,'ip3i80f4a882jg9ti4c3nq3tig',NULL),(3,'8irhddec65pbovbmiu3lebi81d',1);
/*!40000 ALTER TABLE `tb_carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_cartsturmas`
--

DROP TABLE IF EXISTS `tb_cartsturmas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_cartsturmas` (
  `idcartsturmas` int(11) NOT NULL AUTO_INCREMENT,
  `idcart` int(11) NOT NULL,
  `idturma` int(11) NOT NULL,
  `dtremoved` datetime DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idcartsturmas`),
  KEY `FK_cartsturmas_carts_idx` (`idcart`),
  KEY `fk_cartsturmas_turma_idx` (`idturma`),
  CONSTRAINT `fk_cartsturmas_carts` FOREIGN KEY (`idcart`) REFERENCES `tb_carts` (`idcart`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cartsturmas_turma` FOREIGN KEY (`idturma`) REFERENCES `tb_turma` (`idturma`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_cartsturmas`
--

LOCK TABLES `tb_cartsturmas` WRITE;
/*!40000 ALTER TABLE `tb_cartsturmas` DISABLE KEYS */;
INSERT INTO `tb_cartsturmas` VALUES (1,1,1,NULL,'2021-09-12 02:57:29'),(2,2,1,NULL,'2021-09-13 01:16:00'),(3,3,1,'2021-09-12 22:36:20','2021-09-13 01:35:18');
/*!40000 ALTER TABLE `tb_cartsturmas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_endereco`
--

DROP TABLE IF EXISTS `tb_endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_endereco` (
  `idender` int(11) NOT NULL AUTO_INCREMENT,
  `idperson` int(11) DEFAULT NULL,
  `idpess` int(11) DEFAULT NULL,
  `rua` varchar(128) NOT NULL,
  `numero` varchar(16) NOT NULL,
  `complemento` varchar(32) DEFAULT NULL,
  `bairro` varchar(32) NOT NULL,
  `cidade` varchar(32) NOT NULL,
  `estado` varchar(32) NOT NULL,
  `cep` varchar(11) NOT NULL,
  `telres` bigint(20) DEFAULT NULL,
  `telemer` bigint(20) DEFAULT NULL,
  `contato` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`idender`),
  KEY `fk_endereco_persons_idx` (`idperson`),
  KEY `fk_endereco_pessoa_idx` (`idpess`),
  CONSTRAINT `fk_endereco_person` FOREIGN KEY (`idperson`) REFERENCES `tb_persons` (`idperson`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_endereco_pessoa` FOREIGN KEY (`idpess`) REFERENCES `tb_pessoa` (`idpess`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_endereco`
--

LOCK TABLES `tb_endereco` WRITE;
/*!40000 ALTER TABLE `tb_endereco` DISABLE KEYS */;
INSERT INTO `tb_endereco` VALUES (1,1,NULL,'Rua Lapa','12','','Paulicéia','São Bernardo do Campo','SP','09689040',1124443020,22323232332,'Luan');
/*!40000 ALTER TABLE `tb_endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_espaco`
--

DROP TABLE IF EXISTS `tb_espaco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_espaco` (
  `idespaco` int(11) NOT NULL AUTO_INCREMENT,
  `idlocal` int(11) NOT NULL,
  `nomeespaco` varchar(64) NOT NULL,
  `descespaco` varchar(128) NOT NULL,
  `observacao` varchar(128) NOT NULL,
  `areaespaco` decimal(10,2) NOT NULL,
  PRIMARY KEY (`idespaco`),
  KEY `fk_idespaco_local_idx` (`idlocal`),
  CONSTRAINT `fk_idespaco_local` FOREIGN KEY (`idlocal`) REFERENCES `tb_local` (`idlocal`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_espaco`
--

LOCK TABLES `tb_espaco` WRITE;
/*!40000 ALTER TABLE `tb_espaco` DISABLE KEYS */;
INSERT INTO `tb_espaco` VALUES (17,4,'Piscina','Piscina de hidroginástica','Piscina coberta, aquecida exclusiva de hidroginástica',60.00),(19,10,'Quadra','Quadra Poliesportiva','Quadra coberta',420.00),(20,11,'Quadra','Quadra Poliesportiva','Quadra coberta com arquibancada',684.00),(21,11,'Sala','Sala para atividades diversas','Sala com espelhos e tatame',36.00),(22,14,'Mezanino','Sala para atividades diversas','Sala para atividades diversas em piso superior',42.00),(23,1,'Sala','Sala para atividades diversas','Sala com barras e espelhos',120.00),(24,1,'Sala de Judô','Sala para lutas','Sala para lutas com tatame',40.00),(25,1,'Quadra','Quadra externa','Quadra 1, externa, descoberta e sem arquibancada',460.00),(27,15,'Salão','Salão para atividades diversas','Salão espelhado',92.00),(28,5,'Quadra','Quadra Poliesportiva','Quadra coberta sem arquibancada',460.00),(30,4,'Quadra','Meia quadra','Meia quadra com cesto de basquete e arquibancada',180.00),(31,1,'Piscina','Piscina externa','Piscina 25m com capacidade de 1200l, externa com 5 raias,',125.00),(33,6,'Quadra','Quadra','Quadra coberta',420.00),(34,21,'Sala','Sala para atividades diversas','Sala para atividades diversas',50.00);
/*!40000 ALTER TABLE `tb_espaco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_fxetaria`
--

DROP TABLE IF EXISTS `tb_fxetaria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_fxetaria` (
  `idfxetaria` int(11) NOT NULL AUTO_INCREMENT,
  `descrfxetaria` varchar(32) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  `initidade` int(11) NOT NULL,
  `fimidade` int(11) NOT NULL,
  PRIMARY KEY (`idfxetaria`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_fxetaria`
--

LOCK TABLES `tb_fxetaria` WRITE;
/*!40000 ALTER TABLE `tb_fxetaria` DISABLE KEYS */;
INSERT INTO `tb_fxetaria` VALUES (6,'Adolescente','2020-09-27 16:31:32',12,17),(18,'Idoso','2020-10-04 18:27:39',60,99),(19,'Adulto','2020-10-04 18:28:17',18,99),(20,'Adulto Jovem','2020-10-04 18:29:08',18,59),(21,'Criança/Adolescente','2020-10-04 18:31:47',7,17),(22,'Infantil','2020-10-04 18:34:34',5,8),(23,'Infantil/Pré-adolescente','2020-10-04 18:35:30',9,12),(24,'Adolescente','2020-10-04 18:35:57',12,16),(25,'Adolescente','2020-10-04 18:36:42',14,17),(26,'Infantil','2020-10-04 18:37:15',7,9),(27,'Criança/Adolescente','2020-10-04 18:37:53',10,17),(28,'Adolescente','2020-10-04 18:38:31',13,17),(29,'Pré-adolescente','2020-10-04 18:38:57',10,12),(30,'Adulto Jovem','2020-10-04 18:41:21',17,59),(31,'Adulto Jovem','2020-10-04 18:41:51',16,59),(32,'Pré-adolescente','2020-10-04 18:43:45',11,13),(34,'Infantil','2020-10-04 18:44:45',7,10),(35,'Criança/Adolescente','2020-10-04 18:45:46',7,12),(36,'Baby','2020-10-04 18:46:18',3,6),(37,'Adolescente','2020-10-04 18:47:00',13,18),(38,'Adolescente','2020-10-04 18:47:23',12,14),(39,'Adolescente','2020-10-04 18:47:47',15,17),(40,'Adolescente','2020-10-04 18:48:56',11,14),(42,'Infantil/Pré-adolescente','2020-10-04 18:52:13',8,12),(43,'Infantil/Pré-adolescente','2020-10-04 18:53:05',9,11),(44,'Adolescente','2020-10-04 18:53:37',12,15),(45,'Criança/Adolescente','2020-12-02 19:29:30',7,15),(46,'Adulto','2020-12-02 19:32:35',16,99),(48,'Infantil','2021-07-13 16:36:16',5,7),(49,'Infantil','2021-07-13 16:37:10',6,8);
/*!40000 ALTER TABLE `tb_fxetaria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_horario`
--

DROP TABLE IF EXISTS `tb_horario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_horario` (
  `idhorario` int(11) NOT NULL AUTO_INCREMENT,
  `horainicio` varchar(8) NOT NULL,
  `horatermino` varchar(8) NOT NULL,
  `diasemana` varchar(32) NOT NULL,
  `periodo` varchar(32) NOT NULL,
  PRIMARY KEY (`idhorario`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_horario`
--

LOCK TABLES `tb_horario` WRITE;
/*!40000 ALTER TABLE `tb_horario` DISABLE KEYS */;
INSERT INTO `tb_horario` VALUES (2,'07:30','08:40','Quarta e Sexta','Manhã'),(5,'07:30','08:20','Terça e Quinta','Manhã'),(6,'08:30','09:20','Terça e Quinta','Manhã'),(7,'09:30','10:20','Terça e Quinta','Manhã'),(8,'10:30','11:20','Terça e Quinta','Manhã'),(9,'13:00','13:50','Terça e Quinta','Tarde'),(10,'14:00','14:50','Terça e Quinta','Tarde'),(11,'15:00','15:50','Terça e Quinta','Tarde'),(12,'16:00','16:50','Terça e Quinta','Tarde'),(13,'07:30','08:20','Quarta e Sexta','Manhã'),(14,'08:30','09:20','Quarta e Sexta','Manhã'),(15,'10:30','11:20','Quarta e Sexta','Manhã'),(16,'09:30','10:20','Quarta e Sexta','Manhã'),(17,'13:00','13:50','Quarta e Sexta','Tarde'),(18,'14:00','14:50','Quarta e Sexta','Tarde'),(19,'15:00','15:50','Quarta e Sexta','Tarde'),(20,'16:00','16:50','Quarta e Sexta','Tarde'),(21,'17:00','17:50','Quarta e Sexta','Tarde'),(22,'18:00','18:40','Terça e Quinta','Noite'),(23,'18:50','19:30','Terça e Quinta','Noite'),(24,'19:40','20:20','Terça e Quinta','Noite'),(25,'20:30','21:20','Terça e Quinta','Noite'),(26,'18:00','18:40','Segunda e Quarta','Noite'),(27,'18:50','19:30','Segunda e Quarta','Noite'),(28,'19:40','20:20','Segunda e Quarta','Noite'),(29,'20:30','21:20','Segunda e Quarta','Noite'),(30,'19:00','20:10','Quinta','Noite'),(31,'20:20','21:30','Quinta','Noite'),(32,'07:30','08:50','Terça e Quinta','Manhã'),(33,'09:00','10:20','Terça e Quinta','Manhã'),(34,'10:00','11:20','Terça e Quinta','Manhã'),(35,'07:30','08:50','Quarta e Sexta','Manhã'),(36,'09:00','10:20','Quarta e Sexta','Manhã'),(37,'10:20','11:20','Quarta e Sexta','Manhã'),(38,'18:00','19:00','Segunda e Quarta','Noite'),(39,'19:00','19:50','Segunda e Quarta','Noite'),(40,'19:50','20:50','Segunda e Quarta','Noite'),(41,'13:30','14:40','Terça e Quinta','Tarde'),(42,'14:50','16:00','Terça e Quinta','Tarde'),(43,'16:10','17:20','Terça e Quinta','Tarde'),(44,'09:00','10:00','Quarta','Manhã'),(45,'19:00','20:00','Terça e Quinta','Noite'),(46,'10:20','11:20','Terça e Quinta','Manhã'),(47,'13:30','15:15','Segunda','Tarde'),(48,'15:30','17:15','Segunda','Tarde'),(49,'08:00','09:00','Quarta','Manhã'),(50,'09:10','10:10','Quarta','Manhã'),(51,'10:20','11:20','Quarta','Manhã'),(52,'13:30','14:30','Quarta','Tarde'),(53,'14:30','15:30','Quarta','Tarde'),(54,'15:30','16:30','Quarta','Tarde'),(55,'08:00','09:00','Sexta','Manhã'),(56,'09:00','10:00','Quarta e Sexta','Manhã'),(57,'10:00','11:20','Quarta e Sexta','Manhã'),(58,'13:30','14:40','Segunda e Quarta','Tarde'),(59,'14:50','16:00','Segunda e Quarta','Tarde'),(60,'16:10','17:20','Segunda e Quarta','Tarde'),(61,'07:30','08:40','Terça e Quinta','Manhã'),(62,'08:50','10:00','Terça e Quinta','Manhã'),(63,'10:10','11:20','Terça e Quinta','Manhã'),(64,'13:30','14:20','Terça e Quinta','Tarde'),(65,'14:30','15:50','Terça e Quinta','Tarde'),(66,'16:00','17:20','Terça e Quinta','Tarde'),(67,'13:30','15:15','Sexta','Tarde'),(68,'15:30','17:15','Sexta','Tarde'),(69,'09:00','10:20','Terça','Manhã'),(70,'10:30','11:30','Terça','Manhã'),(71,'14:50','15:50','Terça e Quinta','Tarde'),(72,'16:00','17:10','Terça e Quinta','Tarde'),(73,'09:00','10:00','Terça','Manhã'),(74,'06:30','07:50','Terça e Quinta','Manhã'),(75,'08:00','09:20','Terça e Quinta','Manhã'),(76,'19:00','20:00','Segunda e Quarta','Noite'),(77,'20:00','21:00','Segunda e Quarta','Noite'),(78,'07:40','08:40','Quarta','Manhã'),(79,'08:50','09:40','Quarta','Manhã'),(80,'10:00','11:00','Quarta','Manhã'),(81,'19:00','20:30','Terça','Noite'),(82,'19:00','20:30','Sexta','Noite'),(83,'10:20','11:30','Terça e Quinta','Manhã'),(87,'02:22','12:59','Quarta','Noite');
/*!40000 ALTER TABLE `tb_horario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_insc`
--

DROP TABLE IF EXISTS `tb_insc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_insc` (
  `idinsc` int(11) NOT NULL AUTO_INCREMENT,
  `idinscstatus` int(11) NOT NULL,
  `idcart` int(11) NOT NULL,
  `idturma` int(11) NOT NULL,
  `idtemporada` int(11) NOT NULL,
  `numordem` int(11) DEFAULT 0,
  `numsorte` int(11) DEFAULT 0,
  `laudo` int(11) NOT NULL DEFAULT 0,
  `dtinsc` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idinsc`),
  KEY `fk_insc_cart_idx` (`idcart`),
  KEY `fk_insc_turma_idx` (`idturma`),
  KEY `fk_insc_turmatemporada_idx` (`idtemporada`),
  KEY `fk_insc_inscstatus_idx` (`idinscstatus`),
  CONSTRAINT `fk_insc_cart` FOREIGN KEY (`idcart`) REFERENCES `tb_carts` (`idcart`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_insc_inscstatus` FOREIGN KEY (`idinscstatus`) REFERENCES `tb_inscstatus` (`idinscstatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_insc_turma` FOREIGN KEY (`idturma`) REFERENCES `tb_turma` (`idturma`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_insc_turmatemporada` FOREIGN KEY (`idtemporada`) REFERENCES `tb_turmatemporada` (`idtemporada`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_insc`
--

LOCK TABLES `tb_insc` WRITE;
/*!40000 ALTER TABLE `tb_insc` DISABLE KEYS */;
INSERT INTO `tb_insc` VALUES (1,6,3,1,4,0,1,0,'2021-09-13 01:36:20');
/*!40000 ALTER TABLE `tb_insc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_inscstatus`
--

DROP TABLE IF EXISTS `tb_inscstatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_inscstatus` (
  `idinscstatus` int(11) NOT NULL AUTO_INCREMENT,
  `descstatus` varchar(32) NOT NULL,
  PRIMARY KEY (`idinscstatus`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_inscstatus`
--

LOCK TABLES `tb_inscstatus` WRITE;
/*!40000 ALTER TABLE `tb_inscstatus` DISABLE KEYS */;
INSERT INTO `tb_inscstatus` VALUES (1,'Matriculada'),(2,'Aguardando matrícula'),(3,'Sorteada'),(4,'Não sorteada'),(5,'Suspensa'),(6,'Aguardando Sorteio'),(7,'Lista de Espera'),(8,'Desistente'),(9,'Cancelada');
/*!40000 ALTER TABLE `tb_inscstatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_local`
--

DROP TABLE IF EXISTS `tb_local`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_local` (
  `idlocal` int(11) NOT NULL AUTO_INCREMENT,
  `apelidolocal` varchar(32) NOT NULL,
  `nomelocal` varchar(64) NOT NULL,
  `rua` varchar(128) NOT NULL,
  `numero` varchar(16) NOT NULL,
  `complemento` varchar(32) DEFAULT NULL,
  `bairro` varchar(64) NOT NULL,
  `cidade` varchar(32) NOT NULL,
  `estado` varchar(32) NOT NULL,
  `telefone` varchar(32) NOT NULL,
  `cep` int(11) NOT NULL,
  PRIMARY KEY (`idlocal`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_local`
--

LOCK TABLES `tb_local` WRITE;
/*!40000 ALTER TABLE `tb_local` DISABLE KEYS */;
INSERT INTO `tb_local` VALUES (1,'Baetinha','Crec Deputado Odemir Furlan ','Rua Bauru','20','','Baeta Neves','São Bernardo do Campo','SP','(11)26309319',9751440),(3,'Baetão','Complexo Aquático do Estádio Municipal Giglio Portugal Pichinin','Rua Dona Julia Cezar Ferreira','270','','Baeta Neves','São Bernardo do Campo','SP','(11)43329816',9760300),(4,'Aquacentro','Centro de Reab. Fisiotep. Esportiva P/ Atletas e Pessoas com Def','R. Valdomiro Luis da Silva','279','','Jd. Nossa Sra. de Fátima','São Bernardo do Campo','SP','(11)41265600',9820340),(5,'Creeba','Centro Recreativo Esportivo Especial Luis Bonício','R. Benedeto Merson','35','','Bairro Assunção','São Bernardo do Campo','SP','43515940',9810340),(6,'Alves Dias','Ginásio de Esportes Atílio Pessoti','Av. Oswaldo Fregonezzi','101','','Alves Dias','São Bernardo do Campo','SP','41097469',9851015),(7,'Vila Marlene','Crec Otávio Edgar de Oliviera','Rua Continental','808','','Vila Marlene','São Bernardo do Campo','SP','(11)41292088',9750060),(8,'Vila São Pedro','Centro Esportivo Vila São Pedro','Rua Santo Antonio','300','','Vila São Pedro','São Bernardo do Campo','SP','(11)41392088',9781175),(9,'Orquídeas','Centro Esportivo Eder Simões Barbosa','Estrada do Poney Club','148','','Jardim das Orquídeas','São Bernardo do Campo','SP','(11)43362665',9853005),(10,'Areião','Centro de Convivência Dom Jorge Marcos Oliveira','Estrada da Pedra Branca','754','','Montanhão','São Bernardo do Campo','SP','(11)43399207',9792302),(11,'Centro Cultural Ferrazópolis','Centro Cultural Jácomo Guazelli','Rua Rosa Pacheco','201','','Ferrazópolis','São Bernardo do Campo','SP','41272324',9790330),(12,'Terra Nova','Ginásio Poliesportivo Rolando Marques','Rua Pastor Tito Rodrigues Linhares','03','','Terra Nova','São Bernardo do Campo','SP','41014267',9820710),(13,'Riacho Grande','Ginásio Poliesportivo João Soares Brasa','Rua Marcílio Conrado','500','','Riacho Grande','São Bernardo do Campo','SP','43975009',9830291),(14,'Centro de Conviv.  Ferrazópolis','Centro de Convivência Mariana Benvinda da Costa','Rua Aureliano de Souza','6','','Ferrazópolis','São Bernardo do Campo','SP','41270771',0),(15,'Corintinha','Centro Esportivo Salim Tabet','Rua Guilherme Lorenzi','504','','Jardim Esmeralda','São Bernardo do Campo','SP','43300859',9851020),(16,'Jardim do Lago','Ginásio Poliesportivo José Vicente Lopes','Rua Ministro Nelson Hungria','450','','Jardim do Lago','São Bernardo do Campo','SP','(11)4357-6426',5690050),(17,'Jerusalém','Centro Esportivo Jerusalém','Rua Lázaro de Oliveira Leite','200','','Bairro Jerusalém','São Bernardo do Campo','SP','(11)43559700',9811375),(18,'Jardim Lavínia','Centro Esportivo Lavínia','Avenida Capitão Casa','1500','','Bairro dos Casa','São Bernardo do Campo','SP','(11)4125-5198',9812000),(19,'Meninos - Rudge Ramos','Meninos Futebol Clube','Avenida Caminho do Mar','3222','','Rudge Ramos','São Bernardo do Campo','SP','(11)4368-5203',9612000),(21,'Paulicéia','Centro Recreativo Esportivo Cultural Gentil Antiquera','Rua Francisco Alves','460','','Paulicéia','São Bernardo do Campo','SP','(11)4178-9455',9692000),(22,'Planalto','Centro Esportivo Roberto de Almeida Nunes','Rua Eunice Weaver','60','','Planalto','São Bernardo do Campo','SP','(11)4341-8445',9890080),(23,'Poliesportivo ','Ginásio Poliesportivo Municipal de São Bernardo do Campo','Avenida Kennedy','1155','','Bairro Anchieta','São Bernardo do Campo','SP','(11)4126-5600',9726253),(24,'Taboão','Ginásio de Esportes Benedito Pieralini Benaglia','Rua Alfredo Bernardo Leite','1287','','Taboão','s','São Bernardo do Campo','(11)4361-7622',0),(25,'Goldem Park','Salão da Igreja Nossa Senhora de Guadalupe','Rua Doze','3','','Golden Park','São Bernardo do Campo','SP','',0),(27,'Atletismo','Centro de Atletismo Oswaldo Terra da Silva','Tiradentes','1845','','Santa Terezinha','São Bernardo do Campo','SP','(11)4347-8203',9780265),(28,'Silvina','Comunidade Maria de Nazaré','Rua Araújo Viana','230','','Ferrazópolis','São Bernardo do Campo','SP','',0),(30,'Assunção','Centro de Convivência Mariana Benvinda da Costa','Rua Araújo Viana','1500','Quadra 1','Jardim Esmeralda','Guarulhos','SP','41270771',9689040);
/*!40000 ALTER TABLE `tb_local` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_modalidade`
--

DROP TABLE IF EXISTS `tb_modalidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_modalidade` (
  `idmodal` int(11) NOT NULL AUTO_INCREMENT,
  `descmodal` varchar(64) NOT NULL,
  PRIMARY KEY (`idmodal`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_modalidade`
--

LOCK TABLES `tb_modalidade` WRITE;
/*!40000 ALTER TABLE `tb_modalidade` DISABLE KEYS */;
INSERT INTO `tb_modalidade` VALUES (1,'Artesanato'),(2,'Dança'),(3,'Futebol'),(4,'Futsal'),(5,'Ginástica'),(6,'Hidroginástica'),(7,'Voleibol'),(8,'Tênis'),(9,'Badminton'),(10,'Basquetebol'),(11,'Handebol'),(12,'Lutas'),(14,'Natação'),(16,'Oficina'),(17,'Skate');
/*!40000 ALTER TABLE `tb_modalidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_persons`
--

DROP TABLE IF EXISTS `tb_persons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_persons` (
  `idperson` int(11) NOT NULL AUTO_INCREMENT,
  `desperson` varchar(64) NOT NULL,
  `apelidoperson` varchar(64) DEFAULT NULL,
  `desemail` varchar(128) DEFAULT NULL,
  `nrphone` bigint(20) DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idperson`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_persons`
--

LOCK TABLES `tb_persons` WRITE;
/*!40000 ALTER TABLE `tb_persons` DISABLE KEYS */;
INSERT INTO `tb_persons` VALUES (1,'Luciano Freitas','Luciano','lulufreitas08@hotmail.com',92147483690,'2020-03-01 06:00:00'),(7,'Suporte',NULL,'lulufreitas008@gmail.com',11987800935,'2020-05-15 19:10:27'),(11,'Leco','Leco','leco@email',987654321,'2020-09-26 18:00:05'),(12,'Luma','Luma','luma@email',987987980,'2020-09-26 18:14:38'),(13,'Lima','Lima','lima@email',900987789,'2020-12-01 19:16:29'),(14,'Laura Lima Silva',NULL,'laura@email.com',9112321123,'2020-12-08 00:22:42'),(15,'Lena',NULL,'lena@email.com',11987987,'2020-12-08 00:49:33'),(19,'Lino',NULL,'lino@email',0,'2020-12-11 22:58:48'),(20,'Lino',NULL,'lino@email',909000101,'2020-12-11 22:59:17'),(21,'Lino','Lino','lino@email',90900010190,'2020-12-11 23:09:29'),(22,'Leca','Leca','leca@email',908765432,'2020-12-11 23:22:16'),(23,'Luana','Luana','luana@email',907654321,'2020-12-11 23:23:10'),(24,'Lorena',NULL,'Lorena@email',989890003,'2021-01-08 03:04:15'),(25,'Leone',NULL,'leone@email',987098876,'2021-01-10 14:44:47'),(26,'Luca','Luca','luca@email',908932144,'2021-01-10 14:48:37'),(27,'Lana Silva','Lana','lana@email',987643253,'2021-01-10 14:56:18'),(28,'Livia','Livia','livia@email',954372134,'2021-01-10 14:58:10'),(29,'Lana',NULL,'lana@email',990091222,'2021-02-02 20:18:11'),(30,'Lana',NULL,'lana@email',990091222,'2021-02-02 20:32:44'),(31,'Lana',NULL,'lana@email',990091222,'2021-02-02 20:40:30'),(32,'Lana',NULL,'lana@email',990091222,'2021-02-02 20:45:19'),(33,'Lana',NULL,'lana@email',990091222,'2021-02-02 20:45:58'),(34,'Lana',NULL,'lana@email',990091222,'2021-02-02 20:49:38'),(35,'Lana',NULL,'lana@email',990091222,'2021-02-02 20:51:00'),(36,'Lana',NULL,'lana@email',990091222,'2021-02-02 21:00:30'),(37,'Lana','','lana@email',990091222,'2021-02-02 21:09:40'),(38,'Lorena',NULL,'lorena@email',0,'2021-02-18 14:30:00'),(39,'Lucio',NULL,'lucio@email',22898989328,'2021-02-18 19:01:21'),(41,'Leandro',NULL,'leandro@email',978783452,'2021-05-23 14:10:33'),(42,'valter',NULL,'valter@gmail.com',99999999999999,'2021-06-18 13:16:53'),(43,'Lisa Silva','Lisa','lisa@email',9956499232,'2021-06-23 00:03:34'),(44,'Lana',NULL,'valtertexx@gmail.com',990091222,'2021-07-06 16:21:39'),(45,'Leno',NULL,'Leno@email',990091222,'2021-07-06 17:15:48'),(46,'Mara','Mara','mara@email',9876767632,'2021-07-13 12:15:26'),(47,'Luiz',NULL,'luiz@email',95656232787,'2021-08-07 17:49:54'),(48,'Laura Lima',NULL,'laura@email',911232112,'2021-08-26 02:54:31'),(49,'Laura Lima',NULL,'laura@email',911232112,'2021-08-26 02:56:11'),(50,'Laura Lima',NULL,'laura@email',911232112,'2021-08-26 02:58:06'),(60,'Levi Augusto Cesar',NULL,'levicesar@email',89898989898,'2021-09-08 00:43:03');
/*!40000 ALTER TABLE `tb_persons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pessoa`
--

DROP TABLE IF EXISTS `tb_pessoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pessoa` (
  `idpess` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `nomepess` varchar(64) NOT NULL,
  `dtnasc` varchar(16) NOT NULL,
  `sexo` varchar(16) NOT NULL,
  `numcpf` varchar(16) NOT NULL,
  `numrg` varchar(16) DEFAULT NULL,
  `numsus` varchar(20) NOT NULL,
  `vulnsocial` tinyint(4) NOT NULL DEFAULT 0,
  `pcd` tinyint(4) NOT NULL DEFAULT 0,
  `cadunico` varchar(16) DEFAULT NULL,
  `nomemae` varchar(64) DEFAULT NULL,
  `cpfmae` varchar(16) DEFAULT NULL,
  `nomepai` varchar(64) DEFAULT NULL,
  `cpfpai` varchar(16) DEFAULT NULL,
  `statuspessoa` tinyint(4) NOT NULL DEFAULT 1,
  `dtinclusao` timestamp NOT NULL DEFAULT current_timestamp(),
  `dtalteracao` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idpess`),
  KEY `fk_pessoa_users_idx` (`iduser`),
  CONSTRAINT `fk_pessoa_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pessoa`
--

LOCK TABLES `tb_pessoa` WRITE;
/*!40000 ALTER TABLE `tb_pessoa` DISABLE KEYS */;
INSERT INTO `tb_pessoa` VALUES (1,1,'Lenon','1956-02-13','Masculino','859.536.830-90','78.978.978-9','787.686.868.764.554',0,1,'','','','','',1,'2020-12-06 17:52:16','2021-09-13 01:27:57'),(2,14,'Leni Silva Souza','1992-03-31','Feminino','155.678.250-05','127897887','127897887',1,0,'90909090909','Louise','','Lauro','237878989832',1,'2020-12-15 03:32:31','2020-12-15 06:45:21'),(21,21,'Leni','1990-02-21','Feminino','369.885.350-71','123456789','999000999000',1,0,'787878788','Luana','9099090998787','Lucas','8989889898989',1,'2021-01-12 13:51:10','2021-01-12 13:51:10'),(22,1,'Levi','1978-07-28','Masculino','052.923.400-90','90872127812','9880088723728',1,0,'8763528193829','Leticia','989232837362','Leoncio','7897862787263',1,'2021-05-22 22:32:18','2021-05-22 22:32:18'),(23,1,'Lucia','1965-09-22','Feminino','032.299.820-45','8766432526','767862328763',0,0,'6653273627','Lucrecia','7757236298362','Leopoldo','673726347282',1,'2021-05-23 00:52:35','2021-05-23 00:52:35'),(24,14,'Levi','1978-07-28','Feminino','378.695.240-00','90872127812','9880088723728',1,0,'8763528193829','Leticia','989232837362','Leoncio','7897862787263',1,'2021-05-31 23:06:20','2021-05-31 23:06:20'),(25,32,'Leto','1986-07-12','Masculino','970.216.770-14','90872127812','00098989786',1,0,'90909090909','Lua','9878766565','Laercio','89898989898',1,'2021-06-19 00:12:44','2021-06-19 00:12:44'),(26,14,'Lisa Silva','1955-12-19','Feminino','695.782.970-76','009008765123','3452678763',0,0,'','Laura','9875478278328','Lisio','56342337827',1,'2021-07-02 23:47:18','2021-07-02 23:47:18'),(27,29,'Leandro','1998-12-23','Masculino','963.001.700-80','88983298982','89898298928',1,0,'90909090909','Leia','87979797973','Lucio','7898989898',1,'2021-07-03 02:20:51','2021-07-03 02:20:51'),(28,1,'Lenon','2000-06-03','Masculino','432.376.620-38','32380909323','3898989232',0,0,'','','','','',1,'2021-08-03 19:56:01','2021-08-03 19:56:01'),(46,14,'Lenilda Silva','2014-10-31','Feminino','879.714.050-30','127897887','127897887',1,0,'111222221','Louise Terra','98676723112','Lauro Silva','',1,'2021-08-20 03:09:33','2021-08-20 03:09:33'),(47,1,'Leon','1996-10-15','Masculino','615.454.400-69','78787787872','8989842298',1,0,'78787833782','','','','',1,'2021-08-20 22:46:44','2021-08-20 22:46:44'),(48,1,'Ligia Faria','1999-07-22','Feminino','859.810.350-05','67.677.879-0','878.787.989.830.009',1,0,'909.09090.90-9','Livia','615.454.400-69','','',1,'2021-08-21 00:59:17','2021-09-09 01:46:26'),(49,19,'Lindalva','2010-12-09','Feminino','463.507.750-07','9909090909','809809090909',0,0,'','Linda Silva','077.786.140-22','Livio Silva','776.984.250-61',1,'2021-09-07 02:45:36','2021-09-07 03:20:27'),(50,19,'Lavinia','2008-06-17','Feminino','310.562.460-06','90872127812','89084329892',0,0,'','Luana','615.454.400-69','Lucas','776.984.250-61',1,'2021-09-07 03:14:20','2021-09-07 03:14:20'),(51,27,'Luara','1995-02-19','Feminino','958.600.560-79','18.898.989-5','898.988.786.900.333',1,0,'909.00090.90-5','','','','',1,'2021-09-07 14:07:16','2021-09-07 14:27:28'),(52,49,'Levi Augusto Cesar','1964-12-23','Masculino','060.027.720-81','78.657.565-6','898.988.786.900.000',0,0,'','','','','',1,'2021-09-08 00:43:04','2021-09-08 00:43:04'),(58,1,'Luis André','1972-08-22','Masculino','414.242.660-50','','878.787.989.830.009',0,0,'','','','','',1,'2021-09-10 23:05:44','2021-09-10 23:05:44');
/*!40000 ALTER TABLE `tb_pessoa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_sorteio`
--

DROP TABLE IF EXISTS `tb_sorteio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_sorteio` (
  `idsorteio` int(11) NOT NULL AUTO_INCREMENT,
  `idtemporada` int(11) NOT NULL,
  `idstatussort` int(11) NOT NULL DEFAULT 1,
  `numerodeordem` int(11) DEFAULT NULL,
  `numerosortear` int(11) NOT NULL,
  `dtsorteio` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idsorteio`),
  KEY `fk_sorteio_sorteiostatus_idx` (`idstatussort`),
  KEY `fk_sorteio_sorteiotemporada_idx` (`idtemporada`),
  CONSTRAINT `fk_sorteio_sorteiostatus` FOREIGN KEY (`idstatussort`) REFERENCES `tb_sorteiostatus` (`idstatussort`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sorteio_sorteiotemporada` FOREIGN KEY (`idtemporada`) REFERENCES `tb_temporada` (`idtemporada`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_sorteio`
--

LOCK TABLES `tb_sorteio` WRITE;
/*!40000 ALTER TABLE `tb_sorteio` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_sorteio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_sorteiostatus`
--

DROP TABLE IF EXISTS `tb_sorteiostatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_sorteiostatus` (
  `idstatussort` int(11) NOT NULL AUTO_INCREMENT,
  `descstatus` varchar(32) NOT NULL,
  `dtalteracao` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idstatussort`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_sorteiostatus`
--

LOCK TABLES `tb_sorteiostatus` WRITE;
/*!40000 ALTER TABLE `tb_sorteiostatus` DISABLE KEYS */;
INSERT INTO `tb_sorteiostatus` VALUES (1,'Não realizado','2020-04-01 06:00:00'),(2,'Finalizado','2020-03-04 06:00:00'),(3,'Cancelado','2020-05-21 06:00:00');
/*!40000 ALTER TABLE `tb_sorteiostatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_statustemporada`
--

DROP TABLE IF EXISTS `tb_statustemporada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_statustemporada` (
  `idstatustemporada` int(11) NOT NULL AUTO_INCREMENT,
  `descstatustemporada` varchar(32) NOT NULL,
  PRIMARY KEY (`idstatustemporada`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_statustemporada`
--

LOCK TABLES `tb_statustemporada` WRITE;
/*!40000 ALTER TABLE `tb_statustemporada` DISABLE KEYS */;
INSERT INTO `tb_statustemporada` VALUES (1,'Temporada não iniciada'),(2,'Temporada iniciada'),(3,'Inscrições encerradas'),(4,'Inscrições iniciadas'),(5,'Matrículas encerradas'),(6,'Matrículas iniciadas'),(7,'Temporada suspensa'),(8,'Temporada encerrada');
/*!40000 ALTER TABLE `tb_statustemporada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_temporada`
--

DROP TABLE IF EXISTS `tb_temporada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_temporada` (
  `idtemporada` int(11) NOT NULL AUTO_INCREMENT,
  `desctemporada` varchar(32) NOT NULL,
  `idstatustemporada` int(11) NOT NULL,
  `dtinicinscricao` datetime NOT NULL,
  `dtterminscricao` datetime NOT NULL,
  `dtinicmatricula` datetime NOT NULL,
  `dttermmatricula` datetime NOT NULL,
  `dtalteracao` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idtemporada`),
  KEY `fk_temporada_statustemporada_idx` (`idstatustemporada`),
  CONSTRAINT `fk_temporada_statustemporada` FOREIGN KEY (`idstatustemporada`) REFERENCES `tb_statustemporada` (`idstatustemporada`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_temporada`
--

LOCK TABLES `tb_temporada` WRITE;
/*!40000 ALTER TABLE `tb_temporada` DISABLE KEYS */;
INSERT INTO `tb_temporada` VALUES (4,'2021',4,'2022-08-08 14:41:00','2022-08-08 14:45:00','2022-07-31 00:47:00','2022-08-08 15:57:00','2020-12-04 01:06:02'),(57,'2020',1,'2016-12-30 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','2021-06-15 00:21:01');
/*!40000 ALTER TABLE `tb_temporada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_turma`
--

DROP TABLE IF EXISTS `tb_turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_turma` (
  `idturma` int(11) NOT NULL AUTO_INCREMENT,
  `idativ` int(11) NOT NULL,
  `idmodal` int(11) NOT NULL,
  `idespaco` int(11) NOT NULL,
  `idhorario` int(11) NOT NULL,
  `descturma` varchar(16) NOT NULL,
  `vagas` int(8) NOT NULL,
  PRIMARY KEY (`idturma`),
  KEY `fk_turma_modalidade_idx` (`idmodal`),
  KEY `fk_turma_espaco_idx` (`idespaco`),
  KEY `fk_turma_horario_idx` (`idhorario`),
  KEY `fk_turma_atividade_idx` (`idativ`),
  CONSTRAINT `fk_turma_atividade` FOREIGN KEY (`idativ`) REFERENCES `tb_atividade` (`idativ`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_turma_espaco` FOREIGN KEY (`idespaco`) REFERENCES `tb_espaco` (`idespaco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_turma_horario` FOREIGN KEY (`idhorario`) REFERENCES `tb_horario` (`idhorario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_turma_modalidade` FOREIGN KEY (`idmodal`) REFERENCES `tb_modalidade` (`idmodal`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_turma`
--

LOCK TABLES `tb_turma` WRITE;
/*!40000 ALTER TABLE `tb_turma` DISABLE KEYS */;
INSERT INTO `tb_turma` VALUES (1,6,5,34,61,'Ginástica idoso',55),(2,6,5,34,62,'Ginástica idoso',55);
/*!40000 ALTER TABLE `tb_turma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_turmastatus`
--

DROP TABLE IF EXISTS `tb_turmastatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_turmastatus` (
  `idturmastatus` int(11) NOT NULL AUTO_INCREMENT,
  `desstatus` varchar(32) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idturmastatus`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_turmastatus`
--

LOCK TABLES `tb_turmastatus` WRITE;
/*!40000 ALTER TABLE `tb_turmastatus` DISABLE KEYS */;
INSERT INTO `tb_turmastatus` VALUES (1,'Completa','2020-04-01 06:00:00'),(2,'Não há vagas','2020-03-04 06:00:00'),(3,'Não iniciada','2020-05-21 06:00:00'),(4,'Excluida','2020-05-21 06:00:00');
/*!40000 ALTER TABLE `tb_turmastatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_turmatemporada`
--

DROP TABLE IF EXISTS `tb_turmatemporada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_turmatemporada` (
  `idtemporada` int(11) NOT NULL,
  `idturma` int(11) NOT NULL,
  `iduser` int(11) DEFAULT 0,
  `idturmastatus` int(11) DEFAULT 3,
  `numinscritos` int(11) DEFAULT 0,
  `nummatriculados` int(11) DEFAULT 0,
  PRIMARY KEY (`idtemporada`,`idturma`),
  KEY `fk_turmatempodara_turma_idx` (`idturma`),
  KEY `fk_turmatemporada_users` (`iduser`),
  KEY `fk_turmatemporada_turmastatus_idx` (`idturmastatus`),
  CONSTRAINT `fk_turmatempodara_temporada` FOREIGN KEY (`idtemporada`) REFERENCES `tb_temporada` (`idtemporada`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_turmatempodara_turma` FOREIGN KEY (`idturma`) REFERENCES `tb_turma` (`idturma`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_turmatemporada_turmastatus` FOREIGN KEY (`idturmastatus`) REFERENCES `tb_turmastatus` (`idturmastatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_turmatemporada_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_turmatemporada`
--

LOCK TABLES `tb_turmatemporada` WRITE;
/*!40000 ALTER TABLE `tb_turmatemporada` DISABLE KEYS */;
INSERT INTO `tb_turmatemporada` VALUES (4,1,1,3,1,0),(4,2,1,3,0,0);
/*!40000 ALTER TABLE `tb_turmatemporada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_users`
--

DROP TABLE IF EXISTS `tb_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_users` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `idperson` int(11) NOT NULL,
  `deslogin` varchar(64) NOT NULL,
  `despassword` varchar(256) NOT NULL,
  `inadmin` tinyint(4) NOT NULL DEFAULT 0,
  `isprof` tinyint(4) NOT NULL DEFAULT 0,
  `statususer` tinyint(4) NOT NULL DEFAULT 1,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`iduser`),
  KEY `FK_users_persons_idx` (`idperson`),
  CONSTRAINT `fk_users_persons` FOREIGN KEY (`idperson`) REFERENCES `tb_persons` (`idperson`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_users`
--

LOCK TABLES `tb_users` WRITE;
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
INSERT INTO `tb_users` VALUES (0,40,'leoncio@email','$2y$12$JdXnmzDh94d3g26BefuhqujI/Xs.i7IhWRvbFoJxN9xz.8xjFRFgq',0,0,1,'2021-05-23 13:59:04'),(1,1,'lulufreitas08@hotmail.com','$2y$12$HKArxp4K8nMKHg3vwzQP.u81zJusGCnG2V.t4sUix/bEnKvk0PsXC',1,1,0,'2017-03-13 06:00:00'),(7,7,'lulufreitas008@gmail.com','$2y$12$nHo9mAr0ijyaBqfMGXJCe.BwFgYqyopMEJC9ARv7tyVqX8PAX2/5y',1,0,1,'2017-03-15 19:10:27'),(11,11,'leco','$2y$12$CK4yTXJfsW0peJREE3j5VOk.dX9TQWlOFyXqRyCMd3M6Fkf1Ld5LC',1,1,1,'2020-09-26 18:00:05'),(12,12,'luma','$2y$12$kLt7L1BRnSaPOulvdwmfFuK5LAXUxop94SY7QAglEbBdJIqpkiseC',1,1,1,'2020-09-26 18:14:38'),(13,13,'lima','$2y$12$V7gprCwFq/VzTRlyjglqcOEvhOMVX69ncIXN4PTBCDgiPl40xu4Zm',1,1,1,'2020-12-01 19:16:29'),(14,14,'laura@email.com','$2y$12$PEZE54UB5opW8HSAVhrXJezAHwvl7V/hxrMtA1xxItiJ3yRRjmt7W',0,0,1,'2020-12-08 00:22:42'),(18,18,'lena@email.com','$2y$12$I0Pv0q1nQpgXY4Wd8oEKz.1CXgwzSMpRVritT.ToDy/MX6uDaNkMS',0,0,1,'2020-12-08 03:24:01'),(19,21,'lino@email','$2y$12$SPu210hn/mjNKPbVSLe54OpKRUxmaWfa/M/LV5/T.hMbol7ns3Uv6',1,1,1,'2020-12-11 23:09:29'),(20,22,'leca','$2y$12$1XMdikOCh1TGKHjcggeZYuAFXqLF78H3mhv3mnpQUo9Gwa10YEI/K',1,1,1,'2020-12-11 23:22:16'),(21,23,'luana@email','$2y$12$ee/3l3fHjplq4ZNkrSZhZ.GQWBntJGw2/0hKTzrtWX9iEZcTHSU2i',0,0,1,'2020-12-11 23:23:10'),(22,24,'lorena','$2y$12$03DrPxr8vL8XrRAUMSaOhOfc6xgapaz9PQXhz78bPrsra/yjRVaxi',0,0,1,'2021-01-08 03:04:15'),(23,25,'leone','$2y$12$8AzWyVcSZ182r75VG51AOuZC8AG.CHsdek63GmJr0PSvnG9bZCGd2',0,0,1,'2021-01-10 14:44:47'),(24,26,'luca','$2y$12$gki5UCv5F.w6rptsHEHMdOaf/tOgPyxwX9VkOE78EmMvy4FPc0lke',1,1,1,'2021-01-10 14:48:37'),(25,27,'lana','$2y$12$uRglBd5onOVWIHh/9TOYOuBk8Xb/SWoZ4Em7xYjJy/Kv1jKwp4V5K',0,1,0,'2021-01-10 14:56:18'),(26,28,'livia','$2y$12$G43gl2WCU7A4pJ1Y.fEPR.yklegd5iYKR4a3sDJzH/YW2Vfy5cypS',1,1,1,'2021-01-10 14:58:10'),(27,37,'lana@email','$2y$12$7QxiQhVcnOUfCWqiwBpDa.2N1ZMBn4A1wY/YWOiQoETKD6zkiPjjm',0,0,0,'2021-02-02 21:09:40'),(28,38,'lorena@email','$2y$12$YH1U/H9FQZSt0i3bqgklCOpCsQ/aO3hNlhAq9GEAUhO86LjhQkr1y',0,0,1,'2021-02-18 14:30:00'),(29,39,'lucio@email','$2y$12$X.oiYlOWfnE5A/WqcDMRS.pM.1F9laz8MSOLEnbPfUswp.HfNuYN6',0,0,1,'2021-02-18 19:01:21'),(31,41,'leandro@email','$2y$12$9n9AQLBovdT37Drz5Ckfu.5op4J1beUkerngmRLLXSCrPDWd96p5S',0,0,1,'2021-05-23 14:10:33'),(32,42,'valter@gmail.com','$2y$12$Af9MQTy5/7UDjMN56LWReuXoC8oZUvW69CMUGGkjHhb.HbwPtOOky',0,0,1,'2021-06-18 13:16:53'),(33,43,'lisa@email','$2y$12$im7jCEAgOYnWIL1GNrk4h.pLR7Rww0w.GB1rUayPK.WM.aKFheddq',1,1,1,'2021-06-23 00:03:34'),(35,45,'Leno@email','$2y$12$WihVzhbrEoZUhDbiz9uCt.pJy8zd/RViGN4KAe2vKpDGKYe5JTdl.',0,0,1,'2021-07-06 17:15:48'),(36,46,'mara@email','$2y$12$xrQSgSvWfD6MeK3DhlzOJuRav22MazjeX1HvsdTKqxnab3rlSDEei',0,1,0,'2021-07-13 12:15:26'),(37,47,'luiz@email','$2y$12$eRxIx6oHGDHq9Sj9lMoP7uMfgjoVJpHkFbOTXGPGM8D1jmyuUrx2m',0,0,1,'2021-08-07 17:49:54'),(38,48,'laura@email','$2y$12$k.25iRtzfnf1wpUDgSGxXOeqMEcx1YNMa3ssEmjERywhZ.slwwMtC',0,0,0,'2021-08-26 02:54:31'),(39,49,'laura@email','$2y$12$ZOHcatLyE6DOFvSH2XInh..74UhoiEHXjtCL1Th0gZnWC8LMU0Lfm',0,0,0,'2021-08-26 02:56:11'),(49,60,'levicesar@email','$2y$12$Gy4pwnGUa0ZLlGd4RPhvEeENTS1T4kJIZv53NAK4OYNW4/1m/wo6m',0,0,1,'2021-09-08 00:43:03');
/*!40000 ALTER TABLE `tb_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_userslogs`
--

DROP TABLE IF EXISTS `tb_userslogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_userslogs` (
  `idlog` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `deslog` varchar(128) NOT NULL,
  `desip` varchar(45) NOT NULL,
  `desuseragent` varchar(128) NOT NULL,
  `dessessionid` varchar(64) NOT NULL,
  `desurl` varchar(128) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idlog`),
  KEY `fk_userslogs_users_idx` (`iduser`),
  CONSTRAINT `fk_userslogs_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_userslogs`
--

LOCK TABLES `tb_userslogs` WRITE;
/*!40000 ALTER TABLE `tb_userslogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_userslogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_userspasswordsrecoveries`
--

DROP TABLE IF EXISTS `tb_userspasswordsrecoveries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_userspasswordsrecoveries` (
  `idrecovery` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `desip` varchar(45) NOT NULL,
  `dtrecovery` datetime DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idrecovery`),
  KEY `fk_userspasswordsrecoveries_users_idx` (`iduser`),
  CONSTRAINT `fk_userspasswordsrecoveries_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_userspasswordsrecoveries`
--

LOCK TABLES `tb_userspasswordsrecoveries` WRITE;
/*!40000 ALTER TABLE `tb_userspasswordsrecoveries` DISABLE KEYS */;
INSERT INTO `tb_userspasswordsrecoveries` VALUES (1,7,'127.0.0.1',NULL,'2020-09-26 17:51:34'),(2,7,'127.0.0.1',NULL,'2020-09-26 17:55:31'),(3,7,'127.0.0.1',NULL,'2020-09-26 17:56:49'),(4,11,'127.0.0.1',NULL,'2020-09-26 18:00:41'),(5,11,'127.0.0.1',NULL,'2020-09-26 18:02:27'),(6,11,'127.0.0.1',NULL,'2020-09-26 18:02:56'),(7,11,'127.0.0.1',NULL,'2020-09-26 18:15:06'),(8,11,'127.0.0.1',NULL,'2020-09-26 18:33:48'),(9,11,'127.0.0.1',NULL,'2020-09-26 18:37:19'),(10,11,'127.0.0.1',NULL,'2020-09-26 18:38:19'),(11,11,'127.0.0.1',NULL,'2020-09-26 18:41:52'),(12,11,'127.0.0.1',NULL,'2020-09-26 18:42:54'),(13,11,'127.0.0.1',NULL,'2020-09-26 18:44:06'),(14,11,'127.0.0.1',NULL,'2020-09-26 18:44:17'),(15,11,'127.0.0.1',NULL,'2020-09-26 18:44:56'),(16,11,'127.0.0.1',NULL,'2020-09-26 18:45:17'),(17,11,'127.0.0.1',NULL,'2020-09-26 18:49:06'),(18,11,'127.0.0.1',NULL,'2020-09-26 18:52:47'),(19,11,'127.0.0.1',NULL,'2020-09-26 19:07:34'),(20,11,'127.0.0.1',NULL,'2020-09-26 19:07:41'),(21,11,'127.0.0.1',NULL,'2020-09-26 19:12:15'),(22,11,'127.0.0.1',NULL,'2020-09-26 19:12:39'),(23,11,'127.0.0.1',NULL,'2020-09-26 19:13:45'),(24,11,'127.0.0.1',NULL,'2020-09-26 19:18:34'),(25,11,'127.0.0.1',NULL,'2020-09-26 19:19:53'),(26,11,'127.0.0.1',NULL,'2020-09-26 19:22:18'),(27,11,'127.0.0.1',NULL,'2020-09-26 19:25:36'),(28,11,'127.0.0.1',NULL,'2020-09-26 19:30:10'),(29,11,'127.0.0.1',NULL,'2020-09-26 19:32:34'),(30,11,'127.0.0.1',NULL,'2020-09-26 19:36:44'),(31,11,'127.0.0.1',NULL,'2020-09-26 20:36:15'),(32,11,'127.0.0.1','2020-09-26 19:39:14','2020-09-26 22:02:41'),(33,11,'127.0.0.1','2020-09-26 19:44:36','2020-09-26 22:42:55'),(34,11,'127.0.0.1','2020-12-01 16:51:36','2020-12-01 19:47:34'),(35,11,'127.0.0.1',NULL,'2021-02-02 17:04:56'),(36,11,'127.0.0.1','2021-02-02 14:12:36','2021-02-02 17:08:08'),(37,11,'127.0.0.1',NULL,'2021-02-02 17:19:18'),(38,11,'127.0.0.1',NULL,'2021-02-02 17:23:14'),(39,11,'127.0.0.1',NULL,'2021-02-17 14:21:58'),(40,11,'127.0.0.1','2021-02-17 11:28:28','2021-02-17 14:25:07'),(41,7,'127.0.0.1','2021-02-18 16:05:16','2021-02-18 19:03:02'),(42,1,'127.0.0.1',NULL,'2021-08-17 23:33:47'),(43,1,'127.0.0.1',NULL,'2021-08-17 23:50:18'),(44,1,'127.0.0.1',NULL,'2021-08-18 00:11:37'),(45,1,'127.0.0.1',NULL,'2021-09-04 02:34:31'),(46,1,'127.0.0.1',NULL,'2021-09-04 02:38:15'),(47,1,'127.0.0.1',NULL,'2021-09-04 12:42:02'),(48,1,'127.0.0.1',NULL,'2021-09-04 12:50:05'),(49,7,'127.0.0.1',NULL,'2021-09-04 13:07:58'),(50,7,'127.0.0.1','2021-09-04 10:12:59','2021-09-04 13:12:23'),(51,7,'127.0.0.1',NULL,'2021-09-06 00:01:38'),(52,7,'127.0.0.1','2021-09-05 21:04:46','2021-09-06 00:03:40'),(53,7,'127.0.0.1',NULL,'2021-09-06 00:15:25'),(54,7,'127.0.0.1',NULL,'2021-09-06 00:19:15'),(55,7,'127.0.0.1',NULL,'2021-09-06 00:21:55'),(56,7,'127.0.0.1','2021-09-05 21:26:52','2021-09-06 00:26:09'),(59,7,'127.0.0.1','2021-09-05 21:38:32','2021-09-06 00:37:51'),(62,7,'127.0.0.1',NULL,'2021-09-06 00:44:25'),(63,7,'127.0.0.1','2021-09-05 22:07:36','2021-09-06 01:06:45'),(64,7,'127.0.0.1','2021-09-05 22:14:44','2021-09-06 01:14:05'),(65,7,'127.0.0.1','2021-09-05 22:26:09','2021-09-06 01:24:51');
/*!40000 ALTER TABLE `tb_userspasswordsrecoveries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'dbcursos_sbc'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_atividade_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_atividade_save`(
pidativ INT, 
pnomeativ VARCHAR(64),
pdescativ VARCHAR(128),
pgeneativ VARCHAR(32),
pprograativ VARCHAR(32),
porigativ VARCHAR(32),
ptipoativ VARCHAR(32),
pidfxetaria INT
)
BEGIN
	
	IF pidativ > 0 THEN
		
		UPDATE tb_atividade
        SET nomeativ = pnomeativ,
            descativ = pdescativ,
			geneativ = pgeneativ,
		    prograativ = pprograativ,
            origativ = porigativ,
            tipoativ = ptipoativ,
		  idfxetaria = pidfxetaria
            
	   WHERE idativ = pidativ;
        
    ELSE
		
		INSERT INTO tb_atividade (nomeativ, descativ, geneativ, prograativ, origativ, tipoativ, idfxetaria)
        VALUES(pnomeativ, pdescativ, pgeneativ, pprograativ, porigativ, ptipoativ, pidfxetaria);
        
        SET pidativ = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_atividade WHERE idativ = pidativ;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_cart_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cart_save`(
pidcart INT,
pdessessionid VARCHAR(64),
pidpess INT
)
BEGIN

    IF pidcart > 0 THEN
        
        UPDATE tb_carts
        SET
            dessessionid = pdessessionid,
            idpess = pidpess
            
        WHERE idcart = pidcart;
        
    ELSE
        
        INSERT INTO tb_carts (dessessionid, idpess)
        VALUES(pdessessionid, pidpess);
        
        SET pidcart = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_carts WHERE idcart = pidcart;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_endereco_pessoa_update` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_endereco_pessoa_update`(
pidperson INT,
pidpess INT,
prua VARCHAR(128),
pnumero VARCHAR(16),
pcomplemento VARCHAR(32),
pbairro VARCHAR(32),
pcidade VARCHAR(32),
pestado VARCHAR(32),
pcep VARCHAR(11),
ptelres BIGINT(20),
ptelemer BIGINT(20),
pcontato VARCHAR(64)
)
BEGIN     
    UPDATE tb_endereco
        SET     idpess = pidpess,
        rua = prua,
       numero = pnumero,
    complemento = pcomplemento,
             bairro = pbairro,
         cidade = pcidade,
         estado = pestado,
            cep = pcep,
             telres = ptelres,
      telemer = ptelemer,
        contato = pcontato
            
     WHERE idperson = pidperson;    
    
    SELECT * FROM tb_endereco WHERE idperson = pidperson;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_endereco_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_endereco_save`(
pidender INT, 
pidperson INT,
pidpess INT,
prua VARCHAR(128),
pnumero VARCHAR(16),
pcomplemento VARCHAR(32),
pbairro VARCHAR(32),
pcidade VARCHAR(32),
pestado VARCHAR(32),
pcep VARCHAR(11),
ptelres BIGINT(20),
ptelemer BIGINT(20),
pcontato VARCHAR(64)
)
BEGIN

	IF pidender > 0 THEN
		
		UPDATE tb_endereco
        SET idperson = pidperson,
            idpess = pidpess,
		        rua = prua,
			 numero = pnumero,
		complemento = pcomplemento,
             bairro = pbairro,
		     cidade = pcidade,
		     estado = pestado,
		        cep = pcep,
             telres = ptelres,
			telemer = ptelemer,
		    contato = pcontato
            
	   WHERE idender = pidender;
        
    ELSE
		
		INSERT INTO tb_endereco (idperson, idpess, rua, numero, complemento, bairro, cidade, estado, cep, telres, telemer, contato)
        VALUES(pidperson, pidpess, prua, pnumero, pcomplemento, pbairro, pcidade, pestado, pcep, ptelres, ptelemer, pcontato);
        
        SET pidender = LAST_INSERT_ID();
        
    END IF;
    
		SELECT * FROM tb_endereco WHERE idender = pidender;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_endereco_update` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_endereco_update`(
pidperson INT,
pidpess INT,
prua VARCHAR(128),
pnumero VARCHAR(16),
pcomplemento VARCHAR(32),
pbairro VARCHAR(32),
pcidade VARCHAR(32),
pestado VARCHAR(32),
pcep VARCHAR(11),
ptelres BIGINT(20),
ptelemer BIGINT(20),
pcontato VARCHAR(64)
)
BEGIN			
		UPDATE tb_endereco
        SET     idpess = pidpess,
        rua = prua,
			 numero = pnumero,
		complemento = pcomplemento,
             bairro = pbairro,
		     cidade = pcidade,
		     estado = pestado,
		        cep = pcep,
             telres = ptelres,
			telemer = ptelemer,
		    contato = pcontato
            
	   WHERE idperson = pidperson;    
    
		SELECT * FROM tb_endereco WHERE idperson = pidperson;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_espaco_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_espaco_save`(
pidespaco INT, 
pidlocal INT, 
pnomeespaco VARCHAR(64), 
pdescespaco VARCHAR(128), 
pobservacao VARCHAR(128), 
pareaespaco DECIMAL(10,2)
)
BEGIN
	
	IF pidespaco > 0 THEN
		
		UPDATE tb_espaco
        SET idlocal = pidlocal,
            nomeespaco = pnomeespaco,
            descespaco = pdescespaco,
            observacao = pobservacao,
            areaespaco = pareaespaco
                    
        WHERE idespaco = pidespaco;
        
    ELSE
		
		INSERT INTO tb_espaco (idlocal, nomeespaco, descespaco, observacao, areaespaco)
        VALUES(pidlocal, pnomeespaco, pdescespaco, pobservacao, pareaespaco);
        
        SET pidespaco = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_espaco WHERE idespaco = pidespaco;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_faixaetaria_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_faixaetaria_save`(
pidfxetaria INT, 
pdescrfxetaria VARCHAR(32),
pinitidade INT,
pfimidade INT
)
BEGIN
	
	IF pidfxetaria > 0 THEN
		
		UPDATE tb_fxetaria
        SET descrfxetaria = pdescrfxetaria,
                initidade = pinitidade,
                 fimidade = pfimidade
        WHERE idfxetaria = pidfxetaria;
        
    ELSE
		
		INSERT INTO tb_fxetaria (descrfxetaria, initidade, fimidade)
        VALUES(pdescrfxetaria, pinitidade, pfimidade);
        
        SET pidfxetaria = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_fxetaria WHERE idfxetaria = pidfxetaria;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_horario_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_horario_save`(
pidhorario INT, 
phorainicio VARCHAR(8),
phoratermino VARCHAR(8),
pdiasemana VARCHAR(32),
pperiodo VARCHAR(32)
)
BEGIN
	
	IF pidhorario > 0 THEN
		
		UPDATE tb_horario
        SET horainicio = phorainicio,
		   horatermino = phoratermino,
			 diasemana = pdiasemana,
               periodo = pperiodo
	   WHERE idhorario = pidhorario;
        
    ELSE
		
		INSERT INTO tb_horario (horainicio, horatermino, diasemana, periodo)
        VALUES(phorainicio, phoratermino, pdiasemana, pperiodo);
        
        SET pidhorario = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_horario WHERE idhorario = pidhorario;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_insc_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insc_save`(
pidinsc INT,
pidinscstatus INT,
pidcart INT,
pidturma INT,
pidtemporada INT,
pnumordem INT,
pnumsorte INT,
plaudo INT
)
BEGIN

    IF pidinsc > 0 THEN
        
        UPDATE tb_insc
        SET
			idinscstatus = pidinscstatus,
                  idcart = pidcart,
                 idturma = pidturma,
             idtemporada = pidtemporada,
                numordem = pnumordem,
                numsorte = pnumsorte,
                   laudo = plaudo
            
        WHERE idinsc = pidinsc;
        
    ELSE
        
        INSERT INTO tb_insc (idinscstatus, idcart, idturma, idtemporada, numordem, numsorte, laudo)
        VALUES(pidinscstatus, pidcart, pidturma, pidtemporada, pnumordem, pnumsorte, plaudo);
        
        SET pidinsc = LAST_INSERT_ID(); 
        
        CALL sp_insc_update_numsorte(pidinsc, pidturma, pidtemporada);
        
    END IF;
    
    SELECT * FROM tb_insc WHERE idinsc = pidinsc;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_insc_update_numordem` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insc_update_numordem`(
pnumordem INT,
pnumsorte INT
)
BEGIN
		SET SQL_SAFE_UPDATES=0;
        
		UPDATE tb_insc 
        SET numordem = pnumordem 
        WHERE numsorte = pnumsorte;
        
        SET SQL_SAFE_UPDATES=1;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_insc_update_numsorte` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insc_update_numsorte`(
pidinsc INT,
pidturma INT,
pidtemporada INT
)
BEGIN
		UPDATE tb_turmatemporada 
        SET numinscritos = numinscritos + 1 
        WHERE idturma = pidturma AND idtemporada = pidtemporada;
        
		SELECT numinscritos 
        INTO @pnumisncritos 
        FROM tb_turmatemporada 
        WHERE idturma = pidturma 
        AND idtemporada = pidtemporada;
        
        UPDATE tb_insc
        SET			
                numsorte = @pnumisncritos
            
        WHERE idinsc = pidinsc;     

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_local_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_local_save`(
pidlocal INT, 
papelidolocal VARCHAR(32),
pnomelocal VARCHAR(64),
prua VARCHAR(128),
pnumero VARCHAR(16),
pcomplemento VARCHAR(32),
pbairro VARCHAR(64),
pcidade VARCHAR(32),
pestado VARCHAR(32),
ptelefone VARCHAR(32),
pcep INT
)
BEGIN
	
	IF pidlocal > 0 THEN
		
		UPDATE tb_local
        SET apelidolocal = papelidolocal,
               nomelocal = pnomelocal,
			         rua = prua,
				  numero = pnumero,
			 complemento = pcomplemento,
                  bairro = pbairro,
		          cidade = pcidade,
                  estado = pestado,
                telefone = ptelefone,
                     cep = pcep            
	       WHERE idlocal = pidlocal;
        
    ELSE
		
		INSERT INTO tb_local (apelidolocal, nomelocal, rua, numero, complemento, bairro, cidade, estado, telefone, cep)
        VALUES(papelidolocal, pnomelocal, prua, pnumero, pcomplemento, pbairro, pcidade, pestado, ptelefone, pcep);
        
        SET pidlocal = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_local WHERE idlocal = pidlocal;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_modalidade_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_modalidade_save`(
pidmodal INT, 
pdescmodal VARCHAR(64)
)
BEGIN
	
	IF pidmodal > 0 THEN
		
		UPDATE tb_modalidade
        SET descmodal = pdescmodal                    
        WHERE idmodal = pidmodal;
        
    ELSE
		
		INSERT INTO tb_modalidade (descmodal)
        VALUES(pdescmodal);
        
        SET pidmodal = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_modalidade WHERE idmodal = pidmodal;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_pessoa_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_pessoa_save`(
pidpess INT, 
piduser INT,
pnomepess VARCHAR(64),
pdtnasc VARCHAR(16),
psexo VARCHAR(16),
pnumcpf VARCHAR(16),
pnumrg VARCHAR(16),
pnumsus VARCHAR(20),
pvulnsocial INT,
ppcd TINYINT,
pcadunico VARCHAR(16),
pnomemae VARCHAR(64),
pcpfmae VARCHAR(16),
pnomepai VARCHAR(64),
pcpfpai VARCHAR(16),
pstatuspessoa TINYINT,
pdtinclusao TIMESTAMP,
pdtalteracao TIMESTAMP
)
BEGIN
	
	IF pidpess > 0 THEN
		
		UPDATE tb_pessoa
        SET iduser = piduser,
		  nomepess = pnomepess,
		    dtnasc = pdtnasc,
		      sexo = psexo,
            numcpf = pnumcpf,
             numrg = pnumrg,
		    numsus = pnumsus,
		vulnsocial = pvulnsocial,
			  pcd = ppcd,
		  cadunico = pcadunico,
           nomemae = pnomemae,
            cpfmae = pcpfmae,
		   nomepai = pnomepai,
            cpfpai = pcpfpai,
	  statuspessoa = pstatuspessoa
            
	   WHERE idpess = pidpess;
        
    ELSE
		
		INSERT INTO tb_pessoa (iduser, nomepess, dtnasc, sexo, numcpf, numrg, numsus, vulnsocial, pcd, cadunico, nomemae, cpfmae, nomepai, cpfpai, statuspessoa)
        VALUES(piduser, pnomepess, pdtnasc, psexo, pnumcpf, pnumrg, pnumsus, pvulnsocial, ppcd, pcadunico, pnomemae, pcpfmae, pnomepai, pcpfpai, pstatuspessoa);
        
        SET pidpess = LAST_INSERT_ID();
        
    END IF;
    
		SELECT * FROM tb_pessoa WHERE idpess = pidpess;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_pessoa_update` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_pessoa_update`(
pidpess INT, 
piduser INT,
pnomepess VARCHAR(64),
pdtnasc VARCHAR(16),
psexo VARCHAR(16),
pnumcpf VARCHAR(16),
pnumrg VARCHAR(16),
pnumsus VARCHAR(20),
pvulnsocial INT,
ppcd TINYINT,
pcadunico VARCHAR(16),
pnomemae VARCHAR(64),
pcpfmae VARCHAR(16),
pnomepai VARCHAR(64),
pcpfpai VARCHAR(16),
pstatuspessoa TINYINT,
pdtalteracao TIMESTAMP
)
BEGIN
	
	IF pidpess > 0 THEN
		
		UPDATE tb_pessoa
        SET iduser = piduser,
		  nomepess = pnomepess,
		    dtnasc = pdtnasc,
		      sexo = psexo,
            numcpf = pnumcpf,
             numrg = pnumrg,
		    numsus = pnumsus,
		vulnsocial = pvulnsocial,
               pcd = ppcd,
		  cadunico = pcadunico,
           nomemae = pnomemae,
            cpfmae = pcpfmae,
		   nomepai = pnomepai,
            cpfpai = pcpfpai,
	  statuspessoa = pstatuspessoa,
	   dtalteracao = pdtalteracao
            
	   WHERE idpess = pidpess;
        
    ELSE
		
		INSERT INTO tb_pessoa (iduser, nomepess, dtnasc, sexo, numcpf, numrg, numsus, vulnsocial, pcd, cadunico, nomemae, cpfmae, nomepai, cpfpai, statuspessoa, dtalteracao)
        VALUES(piduser, pnomepess, pdtnasc, psexo, pnumcpf, pnumrg, pnumsus, pvulnsocial, ppcd, pcadunico, pnomemae, pcpfmae, pnomepai, pcpfpai, pstatuspessoa, pdtalteracao);
        
        SET pidpess = LAST_INSERT_ID();
        
    END IF;
    
		SELECT * FROM tb_pessoa WHERE idpess = pidpess;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_temporada_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_temporada_save`(
pidtemporada INT,
pdesctemporada VARCHAR(32),
pidstatustemporada INT, 
pdtinicinscricao DATETIME, 
pdtterminscricao DATETIME, 
pdtinicmatricula DATETIME, 
pdttermmatricula DATETIME
)
BEGIN
	
	IF pidtemporada > 0 THEN
		
		UPDATE tb_temporada
        SET desctemporada = pdesctemporada,
		idstatustemporada = pidstatustemporada,
		  dtinicinscricao = pdtinicinscricao,
	      dtterminscricao = pdtterminscricao,
		  dtinicmatricula = pdtinicmatricula,
		  dttermmatricula = pdttermmatricula
            
	   WHERE idtemporada = pidtemporada;
        
    ELSE
		
		INSERT INTO tb_temporada (desctemporada, idstatustemporada, dtinicinscricao, dtterminscricao, dtinicmatricula, dttermmatricula)
        VALUES(pdesctemporada, pidstatustemporada, pdtinicinscricao, pdtterminscricao, pdtinicmatricula, pdttermmatricula);
        
        SET pidtemporada = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_temporada WHERE idtemporada = pidtemporada;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_turmatemporada_add` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_turmatemporada_add`(
pidtemporada INT, 
pidturma INT,
piduser INT,
pidturmastatus INT,
pnuminscritos INT,
pnummatriculados INT
)
BEGIN	
		
		INSERT INTO tb_turmatemporada (idtemporada, idturma, iduser, idturmastatus, numinscritos, nummatriculados)
        VALUES(pidtemporada, pidturma, piduser, pidturmastatus, pnuminscritos, pnummatriculados);   
    
		SELECT * FROM tb_turmatemporada WHERE idtemporada = pidtemporada AND idturma = pidturma;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_turmatemporada_update_nummatriculados_mais` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_turmatemporada_update_nummatriculados_mais`(
pidturma INT,
pidtemporada INT
)
BEGIN
		UPDATE tb_turmatemporada 
        SET nummatriculados = nummatriculados + 1 
        WHERE idturma = pidturma AND idtemporada = pidtemporada;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_turmatemporada_update_nummatriculados_menos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_turmatemporada_update_nummatriculados_menos`(
pidturma INT,
pidtemporada INT
)
BEGIN
		UPDATE tb_turmatemporada 
        SET nummatriculados = nummatriculados - 1 
        WHERE idturma = pidturma AND idtemporada = pidtemporada;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_turma_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_turma_save`(
pidturma INT, 
pidativ INT,
pidmodal INT, 
pidespaco INT, 
pidhorario INT, 
pdescturma VARCHAR(16),
pvagas INT
)
BEGIN
	
	IF pidturma > 0 THEN
		
		UPDATE tb_turma
        SET idativ = pidativ,
			idmodal = pidmodal,
		   idespaco = pidespaco,
		  idhorario = pidhorario,
          descturma = pdescturma,
			  vagas = pvagas
            
	   WHERE idturma = pidturma;
        
    ELSE
		
		INSERT INTO tb_turma (idativ, idmodal, idespaco, idhorario, descturma, vagas)
        VALUES(pidativ, pidmodal, pidespaco, pidhorario, pdescturma, pvagas);
        
        SET pidturma = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_turma WHERE idturma = pidturma;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_userspasswordsrecoveries_create` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_userspasswordsrecoveries_create`(
piduser INT,
pdesip VARCHAR(45)
)
BEGIN
	
	INSERT INTO tb_userspasswordsrecoveries (iduser, desip)
    VALUES(piduser, pdesip);
    
    SELECT * FROM tb_userspasswordsrecoveries
    WHERE idrecovery = LAST_INSERT_ID();
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_usersupdate_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usersupdate_save`(
piduser INT,
pdesperson VARCHAR(64), 
papelidoperson VARCHAR(64),
pdeslogin VARCHAR(64), 
pdespassword VARCHAR(256), 
pdesemail VARCHAR(128), 
pnrphone BIGINT, 
pinadmin TINYINT,
pisprof TINYINT,
pstatususer TINYINT
)
BEGIN
	
    DECLARE vidperson INT;
    
	SELECT idperson INTO vidperson
    FROM tb_users
    WHERE iduser = piduser;
    
    UPDATE tb_persons
    SET 
		desperson = pdesperson,
	apelidoperson = papelidoperson,
        desemail = pdesemail,
        nrphone = pnrphone
	WHERE idperson = vidperson;
    
    UPDATE tb_users
    SET
		deslogin = pdeslogin,
        despassword = pdespassword,
        inadmin = pinadmin,
        isprof = pisprof,
        statususer = pstatususer
	WHERE iduser = piduser;
    
    SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = piduser;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_users_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_save`(
pdesperson VARCHAR(64), 
papelidoperson VARCHAR(64),
pdeslogin VARCHAR(64), 
pdespassword VARCHAR(256), 
pdesemail VARCHAR(128), 
pnrphone BIGINT, 
pinadmin TINYINT,
pisprof TINYINT, 
pstatususer TINYINT
)
BEGIN
	
    DECLARE vidperson INT;
    
	INSERT INTO tb_persons (desperson, apelidoperson, desemail, nrphone)
    VALUES(pdesperson, papelidoperson, pdesemail, pnrphone);
    
    SET vidperson = LAST_INSERT_ID();
    
    INSERT INTO tb_users (idperson, deslogin, despassword, inadmin, isprof, statususer)
    VALUES(vidperson, pdeslogin, pdespassword, pinadmin, pisprof, pstatususer);
    
    SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = LAST_INSERT_ID();
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-13  7:52:07

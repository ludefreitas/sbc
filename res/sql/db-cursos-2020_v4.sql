-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_cursossbc
-- ------------------------------------------------------
-- Server version 5.5.5-10.4.16-MariaDB

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
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_atividade`
--

LOCK TABLES `tb_atividade` WRITE;
/*!40000 ALTER TABLE `tb_atividade` DISABLE KEYS */;
INSERT INTO `tb_atividade` VALUES (1,'Hidro 3ª idade','Hidroginástica 3ª idade','','Corpo em Ação','SESP','Aquática',18),(2,'Hidroginástica','Hidroginástica adulto','','Corpo em Ação','SESP','Aquática',20),(3,'Hidro inclusiva','Hidroginástica Inclusiva','','Corpo em Ação','SESP','Aquática',19),(4,'Dança Fitness','Aula de Dança Fitness','','Corpo em Ação','PELC','Terrestre',19),(5,'Ritmos','Aula de Ritmos','','Corpo em Ação','PELC','Terrestre',19),(6,'Ginástica idoso','Ginástica funcional para idoso','','Corpo em Ação','SESP','Terrestre',18),(7,'Vôlei adaptado simplificado','Voleibol adaptado simplificado','','Corpo em Ação','SESP','Terrestre',18),(8,'Ginástica adulto','Ginástica funcional adulto','','Corpo em Ação','SESP','Terrestre',20),(9,'Alongamento','Aula de alongamento','','Corpo em Ação','SESP','Terrestre',19),(10,'Oficina','Oficina de...','','Corpo em Ação','SESP','Terrestre',19),(11,'Vôlei feminino','Aula de Voleibol feminino','Feminino','Hora do treino','PELC','Terrestre',6),(12,'Ginástica adulto','Ginástica funcional adulto','','Corpo em Ação','PELC','Terrestre',19),(13,'Vôlei masculino','Aula de Voleibol masculino','Masculino','Hora do treino','PELC','Terrestre',6),(14,'Zumba','Aula de zumba','','Corpo em Ação','Dança','Terrestre',20),(15,'Vôlei adulto','Aula de Voleibol adulto','','Corpo em Ação','PELC','Terrestre',20),(16,'Artesanato','Aula de artesanato','','Corpo em Ação','PELC','Terrestre',19),(17,'Dança Mix','Aula de dança e ritmos diversos','','Corpo em Ação','PELC','Terrestre',19),(18,'Ballet infantil','Aula de ballet infantil','','Hora do treino','PELC','Terrestre',22),(19,'Jazz infantil','Aula de Jazz infantil','','Hora do treino','PELC','Terrestre',23),(20,'Ballet juvenil','Aula de ballet juvenil','','Hora do treino','PELC','Terrestre',24),(21,'Jazz Juvenil','Aula de Jazz juvenil','','Hora do treino','PELC','Terrestre',24),(22,'Caminhada','Caminhada','','Hora do treino','SESP','Terrestre',21),(23,'Futsal','Aula de futsal','','Hora do treino','SESP','Terrestre',21),(24,'Futsal 1','Aula de futsal','','Hora do treino','PELC','Terrestre',21),(25,'Futsal 2','Aula de futsal','','Hora do treino','PELC','Terrestre',21),(26,'Vôlei ','Aula de Voleibol criança/adolescente','','Hora do treino','PELC','Terrestre',21),(27,'Poliesportivo','Aula de esportes e lazer diversos','','Hora do treino','SESP','Terrestre',20),(28,'Karatê','Aula de karatê','','Hora do treino','SESP','Terrestre',21),(29,'Yoga','Aula de yoga','','CRIAtividade','Voluntário','Terrestre',18),(30,'Ginástica idoso','Ginástica funcional para idoso','','CRIAtividade','SESP','Terrestre',18),(31,'Alongamento','Aula de alongamento para idoso','','CRIAtividade','SESP','Terrestre',18),(32,'Ginástica adaptada','Aula de ginástica adaptada','','CRIAtividade','SESP','Terrestre',18),(33,'Tai Chi Chuan','Aula de Tai Chi Chuan','','Corpo em Ação','SESP','Terrestre',19),(34,'Aiki Do','Aula de Aiki Do','','Corpo em Ação','SESP','Terrestre',19),(35,'Pilates','Aula de Pilates','','Corpo em Ação','SESP','Terrestre',20),(36,'Dança de Salão','Aula de dança de salão','','Corpo em Ação','Dança','Terrestre',19),(37,'Dança Country','Aula de dança country','','Corpo em Ação','Dança','Terrestre',19),(38,'Ser Feliz','Aula de atividades diversas','','Hora do treino','SESP','Terrestre',26),(39,'Ser Feliz','Aula de atividades diversas','','Hora do treino','SESP','Terrestre',27),(40,'Badminton','Aula de badminton','','Hora do treino','SESP','Terrestre',26),(41,'Badminton','Aula de badminton','','Hora do treino','SESP','Terrestre',27),(42,'Natação infantil','Aula de natação infantil','','Hora do treino','SESP','Aquática',45),(43,'Natação adulto','Aula de natação adulto','','Corpo em Ação','SESP','Aquática',46),(44,'Vôlei Misto','Aula de Voleibol criança/adolescente','Masc/Fem','Hora do treino','SESP','Terrestre',6),(45,'Natação PCD Adolescente','Natação PCD Aperfeiçoamento adolescente','','Hora do treino','SESP','Aquática',28),(46,'Natação inclusiva','Natação inclusiva pré-adolescente','','Hora do treino','SESP','Aquática',29),(47,'Natação inclusiva','Natação inclusiva adolescente','','Hora do treino','SESP','Aquática',28),(48,'Hidro PCD','Hidroginástica PCD adulto','','Corpo em Ação','SESP','Aquática',19),(49,'Natação PCD criança s/a','Natação PCD sem acompanhante','','Hora do treino','SESP','Aquática',26),(50,'Natação PCD  Adolescente c/a','Natação PCD com acompanhante','','Hora do treino','SESP','Aquática',21),(51,'Natação PCD Adulto','Natação PCD Aperfeiçoamento adulto','','Corpo em Ação','SESP','Aquática',19),(52,'Natação PCD iniciação','Natação PCD iniciação adolescente','','Hora do treino','SESP','Aquática',28),(53,'Natação inclusiva','Natação inclusiva infantil','','Hora do treino','SESP','Aquática',26),(54,'Hidro AVE','Hidroginástica AVE','','Corpo em Ação','SESP','Aquática',19),(55,'Natação PCD Adulto s/a','Natação PCD Adulto sem acompanhante','','Corpo em Ação','SESP','Aquática',19),(56,'Hidro adulto c/ laudo','Hidroginástica adulto com laudo','','Corpo em Ação','SESP','Aquática',30),(57,'Hidro idoso c/ laudo ','Hidroginástica idoso com laudo','','Corpo em Ação','SESP','Aquática',18),(58,'Hidro adulto s/ laudo','Hidroginástica adulto sem laudo','','Corpo em Ação','SESP','Aquática',19),(59,'Promotoria','','','Promotoria','SESP','Terrestre',21),(60,'Ginástica Rítmica','Aula de ginástica rítmica','','Hora do treino','SESP','Terrestre',21),(61,'Atletismo','Treino de atletismo ','','Campeões da vida','SESP','Terrestre',18),(62,'Dança','Aula de dança','','Corpo em Ação','Dança','Terrestre',19),(63,'Capoeira','Aula de Capoeira','','Corpo em Ação','Voluntário','Terrestre',19),(64,'Handebol','Aula de handebol','','Hora do treino','PELC','Terrestre',21),(65,'Futsal','Aula de futsal','','Hora do treino','PELC','Terrestre',21),(66,'Capoeira','Aula de Capoeira','','Hora do treino','PELC','Terrestre',21),(67,'Vôlei  Iniciação','Aula de Voleibol iniciação','','Hora do treino','SESP','Terrestre',35),(68,'Vôlei  adolescente','Aula de Voleibol Adolescente','','Hora do treino','SESP','Terrestre',28),(69,'Yoga','Aula de yoga','','Corpo em Ação','SESP','Terrestre',19),(70,'Ser Feliz','Aula de atividades diversas','','Hora do treino','SESP','Terrestre',34),(71,'Poliesportivo','Aula de esportes e lazer diversos','','Hora do treino','SESP','Terrestre',32),(72,'Poliesportivo','Aula de esportes e lazer diversos','','Hora do treino','SESP','Terrestre',34),(73,'Futsal','Aula de futsal','','Hora do treino','SESP','Terrestre',25),(74,'Futsal','Aula de futsal','','Hora do treino','SESP','Terrestre',32),(75,'Futsal','Aula de futsal','','Corpo em Ação','SESP','Terrestre',20),(76,'Canto coral','Aula de Canto','','Corpo em Ação','SESP','Terrestre',19),(77,'Meditação','Aula de meditação','','Corpo em Ação','SESP','Terrestre',19),(78,'Chi Kung','Aula de Chi Kung','','Corpo em Ação','SESP','Terrestre',19),(79,'Yoga','Aula de yoga','','Corpo em Ação','Voluntário','Terrestre',19),(80,'Meditação','Aula de meditação','','Corpo em Ação','Voluntário','Terrestre',19),(81,'Baby Class','Aula de ballet infantil','','Hora do treino','PELC','Terrestre',36),(82,'Ballet infantil','Aula de ballet infantil','','Hora do treino','PELC','Terrestre',35),(83,'Jazz Juvenil','Aula de Jazz juvenil','','Hora do treino','PELC','Terrestre',37),(84,'Capoeira','Aula de Capoeira','','Corpo em Ação','PELC','Terrestre',19),(85,'Dança de Salão','Aula de dança de salão','','Corpo em Ação','PELC','Terrestre',19),(86,'Futsal 1','Aula de futsal','','Hora do treino','SESP','Terrestre',38),(87,'Futsal 2','Aula de futsal','','Hora do treino','SESP','Terrestre',39),(88,'Vôlei feminino','Aula de Voleibol feminino idoso','Feminino','Corpo em Ação','SESP','Terrestre',18),(89,'Futsal 1','Aula de futsal','','Hora do treino','SESP','Terrestre',40),(90,'Futsal 2','Aula de futsal','','Hora do treino','SESP','Terrestre',25),(91,'Futsal Feminino','Aula de futsal','Feminino','Hora do treino','SESP','Terrestre',25),(92,'Vôlei iniciante','Aula de voleibol para iniciantes','','Hora do treino','SESP','Terrestre',38),(93,'Handebol iniciante','Aula de handebol iniciante','','Hora do treino','SESP','Terrestre',39),(94,'Vôlei  Iniciação','Aula de Voleibol iniciação','','Hora do treino','SESP','Terrestre',40),(95,'Vôlei feminino','Aula de Voleibol feminino','Feminino','Hora do treino','SESP','Terrestre',25),(96,'Vôlei masculino','Aula de Voleibol masculino','Masculino','Hora do treino','SESP','Terrestre',25);
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
  `iduser` int(11) DEFAULT NULL,
  `idpess` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcart`),
  KEY `FK_carts_users_idx` (`iduser`),
  KEY `FK_carts_pessoa_idx` (`idpess`),
  CONSTRAINT `fk_carts_pessoa` FOREIGN KEY (`idpess`) REFERENCES `tb_pessoa` (`idpess`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_carts_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_carts`
--

LOCK TABLES `tb_carts` WRITE;
/*!40000 ALTER TABLE `tb_carts` DISABLE KEYS */;
INSERT INTO `tb_carts` VALUES (1,'4avd2mtd7setu6369ancuqfpfk',NULL,NULL),(2,'9bg4624sje7aqk1fuhn7ikvagh',NULL,NULL),(3,'20ofh5p7b94l6q24t85p25gjtj',1,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_cartsturmas`
--

LOCK TABLES `tb_cartsturmas` WRITE;
/*!40000 ALTER TABLE `tb_cartsturmas` DISABLE KEYS */;
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
  `rua` varchar(128) NOT NULL,
  `numero` varchar(16) NOT NULL,
  `complemento` varchar(32) DEFAULT NULL,
  `bairro` varchar(32) NOT NULL,
  `cidade` varchar(32) NOT NULL,
  `estado` varchar(32) NOT NULL,
  `cep` int(11) NOT NULL,
  `telres` bigint(20) DEFAULT NULL,
  `telemer` bigint(20) DEFAULT NULL,
  `contato` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`idender`),
  KEY `fk_endereco_persons_idx` (`idperson`),
  CONSTRAINT `fk_endereco_user` FOREIGN KEY (`idperson`) REFERENCES `tb_persons` (`idperson`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_endereco`
--

LOCK TABLES `tb_endereco` WRITE;
/*!40000 ALTER TABLE `tb_endereco` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_espaco`
--

LOCK TABLES `tb_espaco` WRITE;
/*!40000 ALTER TABLE `tb_espaco` DISABLE KEYS */;
INSERT INTO `tb_espaco` VALUES (17,4,'Piscina','Piscina de Hidroginástica','Piscina coberta, aquecida exclusiva de hidroginástica',61.00),(18,6,'Qaudra','Quadra Poliesportiva','Quadra coberta com arquibancada',684.00);
/*!40000 ALTER TABLE `tb_espaco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_espacolocal`
--

DROP TABLE IF EXISTS `tb_espacolocal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_espacolocal` (
  `idlocal` int(11) NOT NULL,
  `idespaco` int(11) NOT NULL,
  PRIMARY KEY (`idespaco`,`idlocal`),
  KEY `fk_espacolocal_horarioespaco_idx` (`idlocal`),
  CONSTRAINT `fk_espacolocal_horarioespaco` FOREIGN KEY (`idespaco`) REFERENCES `tb_horarioespaco` (`idespaco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_espacolocal_local` FOREIGN KEY (`idlocal`) REFERENCES `tb_local` (`idlocal`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_espacolocal`
--

LOCK TABLES `tb_espacolocal` WRITE;
/*!40000 ALTER TABLE `tb_espacolocal` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_espacolocal` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_fxetaria`
--

LOCK TABLES `tb_fxetaria` WRITE;
/*!40000 ALTER TABLE `tb_fxetaria` DISABLE KEYS */;
INSERT INTO `tb_fxetaria` VALUES (6,'Adolescente','2020-09-27 16:31:32',12,17),(18,'Idoso','2020-10-04 18:27:39',60,99),(19,'Adulto','2020-10-04 18:28:17',18,99),(20,'Adulto Jovem','2020-10-04 18:29:08',18,59),(21,'Criança/Adolescente','2020-10-04 18:31:47',7,17),(22,'Infantil','2020-10-04 18:34:34',5,8),(23,'Infantil/Pré-adolescente','2020-10-04 18:35:30',9,12),(24,'Adolescente','2020-10-04 18:35:57',12,16),(25,'Adolescente','2020-10-04 18:36:42',14,17),(26,'Infantil','2020-10-04 18:37:15',7,9),(27,'Criança/Adolescente','2020-10-04 18:37:53',10,17),(28,'Adolescente','2020-10-04 18:38:31',13,17),(29,'Pré-adolescente','2020-10-04 18:38:57',10,12),(30,'Adulto Jovem','2020-10-04 18:41:21',17,59),(31,'Adulto Jovem','2020-10-04 18:41:51',16,59),(32,'Pré-adolescente','2020-10-04 18:43:45',11,13),(34,'Infantil','2020-10-04 18:44:45',7,10),(35,'Criança/Adolescente','2020-10-04 18:45:46',7,12),(36,'Baby','2020-10-04 18:46:18',3,6),(37,'Adolescente','2020-10-04 18:47:00',13,18),(38,'Adolescente','2020-10-04 18:47:23',12,14),(39,'Adolescente','2020-10-04 18:47:47',15,17),(40,'Adolescente','2020-10-04 18:48:56',11,14),(41,'Infantil','2020-10-04 18:51:28',5,7),(42,'Infantil/Pré-adolescente','2020-10-04 18:52:13',8,12),(43,'Infantil/Pré-adolescente','2020-10-04 18:53:05',9,11),(44,'Adolescente','2020-10-04 18:53:37',12,15),(45,'Criança/Adolescente','2020-12-02 19:29:30',7,15),(46,'Adulto','2020-12-02 19:32:35',16,99);
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
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_horario`
--

LOCK TABLES `tb_horario` WRITE;
/*!40000 ALTER TABLE `tb_horario` DISABLE KEYS */;
INSERT INTO `tb_horario` VALUES (2,'07:30','08:40','Quarta e Sexta','Manhã'),(5,'07:30','08:20','Terça e Quinta','Manhã'),(6,'08:30','09:20','Terça e Quinta','Manhã'),(7,'09:30','10:20','Terça e Quinta','Manhã'),(8,'10:30','11:20','Terça e Quinta','Manhã'),(9,'13:00','13:50','Terça e Quinta','Tarde'),(10,'14:00','14:50','Terça e Quinta','Tarde'),(11,'15:00','15:50','Terça e Quinta','Tarde'),(12,'16:00','16:50','Terça e Quinta','Tarde'),(13,'07:30','08:20','Quarta e Sexta','Manhã'),(14,'08:30','09:20','Quarta e Sexta','Manhã'),(15,'10:30','11:20','Quarta e Sexta','Manhã'),(16,'09:30','10:20','Quarta e Sexta','Manhã'),(17,'13:00','13:50','Quarta e Sexta','Tarde'),(18,'14:00','14:50','Quarta e Sexta','Tarde'),(19,'15:00','15:50','Quarta e Sexta','Tarde'),(20,'16:00','16:50','Quarta e Sexta','Tarde'),(21,'17:00','17:50','Quarta e Sexta','Tarde'),(22,'18:00','18:40','Terça e Quinta','Noite'),(23,'18:50','19:30','Terça e Quinta','Noite'),(24,'19:40','20:20','Terça e Quinta','Noite'),(25,'20:30','21:20','Terça e Quinta','Noite'),(26,'18:00','18:40','Segunda e Quarta','Noite'),(27,'18:50','19:30','Segunda e Quarta','Noite'),(28,'19:40','20:20','Segunda e Quarta','Noite'),(29,'20:30','21:20','Segunda e Quarta','Noite'),(30,'19:00','20:10','Quinta','Noite'),(31,'20:20','21:30','Quinta','Noite'),(32,'07:30','08:50','Terça e Quinta','Manhã'),(33,'09:00','10:20','Terça e Quinta','Manhã'),(34,'10:00','11:20','Terça e Quinta','Manhã'),(35,'07:30','08:50','Quarta e Sexta','Manhã'),(36,'09:00','10:20','Quarta e Sexta','Manhã'),(37,'10:20','11:20','Quarta e Sexta','Manhã'),(38,'18:00','19:00','Segunda e Quarta','Noite'),(39,'19:00','19:50','Segunda e Quarta','Noite'),(40,'19:50','20:50','Segunda e Quarta','Noite'),(41,'13:30','14:40','Terça e Quinta','Tarde'),(42,'14:50','16:00','Terça e Quinta','Tarde'),(43,'16:10','17:20','Terça e Quinta','Tarde'),(44,'09:00','10:00','Quarta','Manhã'),(45,'19:00','20:00','Terça e Quinta','Noite'),(46,'10:20','11:20','Terça e Quinta','Manhã'),(47,'13:30','15:15','Segunda','Tarde'),(48,'15:30','17:15','Segunda','Tarde'),(49,'08:00','09:00','Quarta','Manhã'),(50,'09:10','10:10','Quarta','Manhã'),(51,'10:20','11:20','Quarta','Manhã'),(52,'13:30','14:30','Quarta','Tarde'),(53,'14:30','15:30','Quarta','Tarde'),(54,'15:30','16:30','Quarta','Tarde'),(55,'08:00','09:00','Sexta','Manhã'),(56,'09:00','10:00','Quarta e Sexta','Manhã'),(57,'10:00','11:20','Quarta e Sexta','Manhã'),(58,'13:30','14:40','Segunda e Quarta','Tarde'),(59,'14:50','16:00','Segunda e Quarta','Tarde'),(60,'16:10','17:20','Segunda e Quarta','Tarde'),(61,'07:30','08:40','Terça e Quinta','Manhã'),(62,'08:50','10:00','Terça e Quinta','Manhã'),(63,'10:10','11:20','Terça e Quinta','Manhã'),(64,'13:30','14:20','Terça e Quinta','Tarde'),(65,'14:30','15:50','Terça e Quinta','Tarde'),(66,'16:00','17:20','Terça e Quinta','Tarde'),(67,'13:30','15:15','Sexta','Tarde'),(68,'15:30','17:15','Sexta','Tarde'),(69,'09:00','10:20','Terça','Manhã'),(70,'10:30','11:30','Terça','Manhã'),(71,'14:50','15:50','Terça e Quinta','Tarde'),(72,'16:00','17:10','Terça e Quinta','Tarde'),(73,'09:00','10:00','Terça','Manhã'),(74,'06:30','07:50','Terça e Quinta','Manhã'),(75,'08:00','09:20','Terça e Quinta','Manhã'),(76,'19:00','20:00','Segunda e Quarta','Noite'),(77,'20:00','21:00','Segunda e Quarta','Noite'),(78,'07:40','08:40','Quarta','Manhã'),(79,'08:50','09:40','Quarta','Manhã'),(80,'10:00','11:00','Quarta','Manhã'),(81,'19:00','20:30','Terça','Noite'),(82,'19:00','20:30','Sexta','Noite'),(83,'10:20','11:30','Terça e Quinta','Manhã');
/*!40000 ALTER TABLE `tb_horario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_horarioespaco`
--

DROP TABLE IF EXISTS `tb_horarioespaco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_horarioespaco` (
  `idespaco` int(11) NOT NULL,
  `idhorario` int(11) NOT NULL,
  PRIMARY KEY (`idespaco`,`idhorario`),
  KEY `fk_horarioespaco_horario_idx` (`idhorario`),
  CONSTRAINT `fk_horarioespaco_espaco` FOREIGN KEY (`idespaco`) REFERENCES `tb_espaco` (`idespaco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_horarioespaco_products` FOREIGN KEY (`idhorario`) REFERENCES `tb_horario` (`idhorario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_horarioespaco`
--

LOCK TABLES `tb_horarioespaco` WRITE;
/*!40000 ALTER TABLE `tb_horarioespaco` DISABLE KEYS */;
INSERT INTO `tb_horarioespaco` VALUES (9,2),(9,7),(9,13),(11,2),(11,6),(11,9),(11,10),(11,12);
/*!40000 ALTER TABLE `tb_horarioespaco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_horarioespacox`
--

DROP TABLE IF EXISTS `tb_horarioespacox`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_horarioespacox` (
  `idhorarioespaco` int(11) NOT NULL,
  `idespaco` int(11) NOT NULL,
  `idhorario` int(11) NOT NULL,
  PRIMARY KEY (`idhorarioespaco`),
  KEY `fk_horarioespacox_espaco_idx` (`idespaco`),
  KEY `fk_horarioespacox_horario_idx` (`idhorario`),
  CONSTRAINT `fk_horarioespacox_espaco` FOREIGN KEY (`idespaco`) REFERENCES `tb_espaco` (`idespaco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_horarioespacox_products` FOREIGN KEY (`idhorario`) REFERENCES `tb_horario` (`idhorario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_horarioespacox`
--

LOCK TABLES `tb_horarioespacox` WRITE;
/*!40000 ALTER TABLE `tb_horarioespacox` DISABLE KEYS */;
INSERT INTO `tb_horarioespacox` VALUES (0,9,2);
/*!40000 ALTER TABLE `tb_horarioespacox` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_inscricao`
--

DROP TABLE IF EXISTS `tb_inscricao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_inscricao` (
  `idinscricao` int(11) NOT NULL AUTO_INCREMENT,
  `idmatricula` int(11) NOT NULL,
  `idstatusinscricao` int(11) NOT NULL,
  `idpess` int(11) NOT NULL,
  `idturma` int(11) NOT NULL,
  `idtemporada` int(11) NOT NULL,
  `dtinscricao` timestamp NOT NULL DEFAULT current_timestamp(),
  `dtmatricula` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idinscricao`),
  KEY `fk_matricula_pessoa_idx` (`idpess`),
  KEY `fk_matricula_turma_idx` (`idturma`),
  KEY `fk_matricula_turmatemporada_idx` (`idtemporada`),
  KEY `fk_matricula_inscricaostatus_idx` (`idstatusinscricao`),
  CONSTRAINT `fk_matricula_inscricaostatus` FOREIGN KEY (`idstatusinscricao`) REFERENCES `tb_inscricaostatus` (`idstatusinscricao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_matricula_pessoa` FOREIGN KEY (`idpess`) REFERENCES `tb_pessoa` (`idpess`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_matricula_temporada` FOREIGN KEY (`idtemporada`) REFERENCES `tb_turmatemporada` (`idtemporada`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_matricula_turma` FOREIGN KEY (`idturma`) REFERENCES `tb_turma` (`idturma`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_inscricao`
--

LOCK TABLES `tb_inscricao` WRITE;
/*!40000 ALTER TABLE `tb_inscricao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_inscricao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_inscricaostatus`
--

DROP TABLE IF EXISTS `tb_inscricaostatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_inscricaostatus` (
  `idstatusinscricao` int(11) NOT NULL AUTO_INCREMENT,
  `descstatus` varchar(32) NOT NULL,
  `dtalteracao` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idstatusinscricao`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_inscricaostatus`
--

LOCK TABLES `tb_inscricaostatus` WRITE;
/*!40000 ALTER TABLE `tb_inscricaostatus` DISABLE KEYS */;
INSERT INTO `tb_inscricaostatus` VALUES (1,'Iniciadas','2020-04-01 06:00:00'),(2,'Não iniciada','2020-03-04 06:00:00'),(3,'Adiadas','2020-05-21 06:00:00'),(4,'Canceladas','2020-05-21 06:00:00'),(5,'Matriculado(a)','2020-05-21 06:00:00'),(6,'Desistente','2020-05-21 06:00:00');
/*!40000 ALTER TABLE `tb_inscricaostatus` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_local`
--

LOCK TABLES `tb_local` WRITE;
/*!40000 ALTER TABLE `tb_local` DISABLE KEYS */;
INSERT INTO `tb_local` VALUES (1,'Baetinha','Crec Deputado Odemir Furlan ','Rua Bauru','20','','Baeta Neves','São Bernardo do Campo','SP','(11)26309319',9751440),(3,'Baetão','Complexo Aquático do Estádio Municipal Giglio Portugal Pichinin','Rua Dona Julia Cezar Ferreira','270','','Baeta Neves','São Bernardo do Campo','SP','(11)43329816',9760300),(4,'Aquacentro - Demarchi','Centro de Reab. Fisiotep. Esportiva P/ Atletas e Pessoas com Def','R. Valdomiro Luis da Silva','279','','Jd. Nossa Sra. de Fátima','São Bernardo do Campo','SP','(11)41265600',9820340),(5,'Creeba','Centro Recreativo Esportivo Especial Luis Bonício','R. Benedeto Merson','35','','Bairro Assunção','São Bernardo do Campo','SP','43515940',9810340),(6,'Alves Dias','Ginásio de Esportes Atílio Pessoti','Av. Oswaldo Fregonezzi','101','','Alves Dias','São Bernardo do Campo','SP','41097469',9851015),(7,'Vila Marlene','Crec Otávio Edgar de Oliviera','Rua Continental','808','','Vila Marlene','São Bernardo do Campo','SP','(11)41292088',9750060),(8,'Vila São Pedro','Centro Esportivo Vila São Pedro','Rua Santo Antonio','300','','Vila São Pedro','São Bernardo do Campo','SP','(11)41392088',9781175),(9,'Orquídeas','Centro Esportivo Eder Simões Barbosa','Estrada do Poney Club','148','','Jardim das Orquídeas','São Bernardo do Campo','SP','(11)43362665',9853005),(10,'Areião','Centro de Convivência Dom Jorge Marcos Oliveira','Estrada da Pedra Branca','754','','Montanhão','São Bernardo do Campo','SP','(11)43399207',9792302),(11,'Centro Cultural Ferrazópolis','Centro Cultural Jácomo Guazelli','Rua Rosa Pacheco','201','','Ferrazópolis','São Bernardo do Campo','SP','41272324',9790330),(12,'Terra Nova','Ginásio Poliesportivo Rolando Marques','Rua Pastor Tito Rodrigues Linhares','03','','Terra Nova','São Bernardo do Campo','SP','41014267',9820710),(13,'Riacho Grande','Ginásio Poliesportivo João Soares Brasa','Rua Marcílio Conrado','500','','Riacho Grande','São Bernardo do Campo','SP','43975009',9830291),(14,'Centro de Convivência Ferrazópol','Centro de Convivência Mariana Benvinda da Costa','Rua Aureliano de Souza','6','','Ferrazópolis','São Bernardo do Campo','SP','41270771',0),(15,'Corintinha','Centro Esportivo Salim Tabet','Rua Guilherme Lorenzi','504','','Jardim Esmeralda','São Bernardo do Campo','SP','43300859',9851020),(16,'Jardim do Lago','Ginásio Poliesportivo José Vicente Lopes','Rua Ministro Nelson Hungria','450','','Jardim do Lago','São Bernardo do Campo','SP','(11)4357-6426',5690050),(17,'Jerusalém','Centro Esportivo Jerusalém','Rua Lázaro de Oliveira Leite','200','','Bairro Jerusalém','São Bernardo do Campo','SP','(11)43559700',9811375),(18,'Jardim Lavínia','Centro Esportivo Lavínia','Avenida Capitão Casa','1500','','Bairro dos Casa','São Bernardo do Campo','SP','(11)4125-5198',9812000),(19,'Meninos - Rudge Ramos','Meninos Futebol Clube','Avenida Caminho do Mar','3222','','Rudge Ramos','São Bernardo do Campo','SP','(11)4368-5203',9612000),(21,'Paulicéia','Centro Recreativo Esportivo Cultural Gentil Antiquera','Rua Francisco Alves','460','','Paulicéia','São Bernardo do Campo','SP','(11)4178-9455',9692000),(22,'Planalto','Centro Esportivo Roberto de Almeida Nunes','Rua Eunice Weaver','60','','Planalto','São Bernardo do Campo','SP','(11)4341-8445',9890080),(23,'Poliesportivo ','Ginásio Poliesportivo Municipal de São Bernardo do Campo','Avenida Kennedy','1155','','Bairro Anchieta','São Bernardo do Campo','SP','(11)4126-5600',9726253),(24,'Taboão','Ginásio de Esportes Benedito Pieralini Benaglia','Rua Alfredo Bernardo Leite','1287','','Taboão','s','São Bernardo do Campo','(11)4361-7622',0),(25,'Goldem Park','Salão da Igreja Nossa Senhora de Guadalupe','Rua Doze','3','','Golden Park','São Bernardo do Campo','SP','',0),(26,'Silvina','Comunidade Maria de Nazaré','Rua Araújo Viana','230','','Ferrazópolis','São Bernardo do Campo','SP','',0),(27,'Atletismo','Centro de Atletismo Oswaldo Terra da Silva','Tiradentes','1845','','Santa Terezinha','São Bernardo do Campo','SP','(11)4347-8203',9780265);
/*!40000 ALTER TABLE `tb_local` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_localturma`
--

DROP TABLE IF EXISTS `tb_localturma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_localturma` (
  `idlocal` int(11) NOT NULL,
  `idturma` int(11) NOT NULL,
  PRIMARY KEY (`idlocal`,`idturma`),
  KEY `fk_localturma_turma_idx` (`idturma`),
  CONSTRAINT `fk_localturma_local` FOREIGN KEY (`idlocal`) REFERENCES `tb_local` (`idlocal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_localturma_turma` FOREIGN KEY (`idturma`) REFERENCES `tb_turma` (`idturma`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_localturma`
--

LOCK TABLES `tb_localturma` WRITE;
/*!40000 ALTER TABLE `tb_localturma` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_localturma` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_modalidade`
--

LOCK TABLES `tb_modalidade` WRITE;
/*!40000 ALTER TABLE `tb_modalidade` DISABLE KEYS */;
INSERT INTO `tb_modalidade` VALUES (1,'Artesanato'),(2,'Dança'),(3,'Futebol'),(4,'Futsal'),(5,'Ginástica'),(6,'Hidroginástica'),(7,'Voleibol'),(8,'Tênis'),(9,'Badminton'),(10,'Basquetebol'),(11,'Handebol'),(12,'Lutas'),(13,'Artes Marciais'),(14,'Natação');
/*!40000 ALTER TABLE `tb_modalidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_modalidadeturma`
--

DROP TABLE IF EXISTS `tb_modalidadeturma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_modalidadeturma` (
  `idmodal` int(11) NOT NULL,
  `idturma` int(11) NOT NULL,
  PRIMARY KEY (`idmodal`,`idturma`),
  KEY `fk_modalidadeturma_turma_idx` (`idturma`),
  CONSTRAINT `fk_modalidade_local` FOREIGN KEY (`idmodal`) REFERENCES `tb_modalidade` (`idmodal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_modalidade_turma` FOREIGN KEY (`idturma`) REFERENCES `tb_turma` (`idturma`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_modalidadeturma`
--

LOCK TABLES `tb_modalidadeturma` WRITE;
/*!40000 ALTER TABLE `tb_modalidadeturma` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_modalidadeturma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_parq`
--

DROP TABLE IF EXISTS `tb_parq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_parq` (
  `idparq` int(11) NOT NULL AUTO_INCREMENT,
  `idpess` int(11) NOT NULL,
  `questum` tinyint(4) NOT NULL DEFAULT 0,
  `questdois` tinyint(4) NOT NULL DEFAULT 0,
  `questtres` tinyint(4) NOT NULL DEFAULT 0,
  `questquatro` tinyint(4) NOT NULL DEFAULT 0,
  `questcinco` tinyint(4) NOT NULL DEFAULT 0,
  `questseis` tinyint(4) NOT NULL DEFAULT 0,
  `questsete` tinyint(4) NOT NULL DEFAULT 0,
  `observacao` varchar(256) NOT NULL,
  `dtinclusao` timestamp NOT NULL DEFAULT current_timestamp(),
  `dtalteracao` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idparq`),
  KEY `fk_parq_pessoa_idx` (`idpess`),
  CONSTRAINT `fk_parq_pessoa` FOREIGN KEY (`idpess`) REFERENCES `tb_pessoa` (`idpess`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_parq`
--

LOCK TABLES `tb_parq` WRITE;
/*!40000 ALTER TABLE `tb_parq` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_parq` ENABLE KEYS */;
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
  `desemail` varchar(128) DEFAULT NULL,
  `nrphone` bigint(20) DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idperson`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_persons`
--

LOCK TABLES `tb_persons` WRITE;
/*!40000 ALTER TABLE `tb_persons` DISABLE KEYS */;
INSERT INTO `tb_persons` VALUES (1,'Luciano Freitas','lulufreitas@gmail.com',2147483647,'2020-03-01 06:00:00'),(7,'Suporte','lulufreitas008@gmail.com',1112345678,'2020-05-15 19:10:27'),(11,'Leco','lulufreitas08@hotmail.com',98765432100000,'2020-09-26 18:00:05'),(12,'Luma','luma@email',98798798,'2020-09-26 18:14:38'),(13,'Lima','lima@email',24022222,'2020-12-01 19:16:29');
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
  `numrg` varchar(16) NOT NULL,
  `numsus` varchar(16) NOT NULL,
  `vulnsocial` tinyint(4) NOT NULL DEFAULT 0,
  `cadunico` varchar(16) DEFAULT NULL,
  `nomemae` varchar(64) DEFAULT NULL,
  `cpfmae` varchar(16) DEFAULT NULL,
  `nomepai` varchar(64) DEFAULT NULL,
  `cpfpai` varchar(16) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `dtinclusao` timestamp NOT NULL DEFAULT current_timestamp(),
  `dtalteracao` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idpess`),
  KEY `fk_pessoa_users_idx` (`iduser`),
  CONSTRAINT `fk_pessoa_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pessoa`
--

LOCK TABLES `tb_pessoa` WRITE;
/*!40000 ALTER TABLE `tb_pessoa` DISABLE KEYS */;
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
  `idstatussort` int(11) NOT NULL,
  `numsorteado` int(11) NOT NULL,
  `temporada` varchar(10) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `dtsorteio` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idsorteio`),
  KEY `fk_sorteio_sorteiostatus_idx` (`idstatussort`),
  CONSTRAINT `fk_sorteio_sorteiostatus` FOREIGN KEY (`idstatussort`) REFERENCES `tb_sorteiostatus` (`idstatussort`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
-- Table structure for table `tb_sorteioinscricao`
--

DROP TABLE IF EXISTS `tb_sorteioinscricao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_sorteioinscricao` (
  `idsorteio` int(11) NOT NULL,
  `idinscricao` int(11) NOT NULL,
  PRIMARY KEY (`idsorteio`,`idinscricao`),
  KEY `fk_productscategories_products_idx` (`idinscricao`),
  CONSTRAINT `fk_sorteioinscricao_matricula` FOREIGN KEY (`idinscricao`) REFERENCES `tb_inscricao` (`idinscricao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sorteioinscricao_sorteio` FOREIGN KEY (`idsorteio`) REFERENCES `tb_sorteio` (`idsorteio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_sorteioinscricao`
--

LOCK TABLES `tb_sorteioinscricao` WRITE;
/*!40000 ALTER TABLE `tb_sorteioinscricao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_sorteioinscricao` ENABLE KEYS */;
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
INSERT INTO `tb_sorteiostatus` VALUES (1,'Não iniciado','2020-04-01 06:00:00'),(2,'Finalizado','2020-03-04 06:00:00'),(3,'Cancelado','2020-05-21 06:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_temporada`
--

LOCK TABLES `tb_temporada` WRITE;
/*!40000 ALTER TABLE `tb_temporada` DISABLE KEYS */;
INSERT INTO `tb_temporada` VALUES (4,'2021',3,'2020-12-01 00:00:00','2021-01-21 00:00:00','2021-01-22 00:00:00','2021-01-31 00:00:00','2020-12-04 01:06:02'),(5,'2020',8,'2019-12-01 00:00:00','2020-01-21 00:00:00','2020-01-22 00:00:00','2020-01-31 00:00:00','2020-12-04 01:36:12');
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
  `iduser` int(11) NOT NULL,
  `idturmastatus` int(11) NOT NULL,
  `descturma` varchar(16) NOT NULL,
  `vagas` int(8) NOT NULL,
  `numinscritos` int(8) DEFAULT NULL,
  PRIMARY KEY (`idturma`),
  KEY `fk_turma_modalidade_idx` (`idmodal`),
  KEY `fk_turma_espaco_idx` (`idespaco`),
  KEY `fk_turma_horario_idx` (`idhorario`),
  KEY `fk_turma_users_idx` (`iduser`),
  KEY `fk_turma_turmastatus` (`idturmastatus`),
  KEY `fk_turma_atividade_idx` (`idativ`),
  CONSTRAINT `fk_turma_atividade` FOREIGN KEY (`idativ`) REFERENCES `tb_atividade` (`idativ`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_turma_espaco` FOREIGN KEY (`idespaco`) REFERENCES `tb_espaco` (`idespaco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_turma_horario` FOREIGN KEY (`idhorario`) REFERENCES `tb_horario` (`idhorario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_turma_modalidade` FOREIGN KEY (`idmodal`) REFERENCES `tb_modalidade` (`idmodal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_turma_turmastatus` FOREIGN KEY (`idturmastatus`) REFERENCES `tb_turmastatus` (`idturmastatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_turma_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_turma`
--

LOCK TABLES `tb_turma` WRITE;
/*!40000 ALTER TABLE `tb_turma` DISABLE KEYS */;
INSERT INTO `tb_turma` VALUES (2,1,6,17,5,12,3,'Hidro 3ª idade',35,0);
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
  PRIMARY KEY (`idtemporada`,`idturma`),
  KEY `fk_turmatempodara_turma_idx` (`idturma`),
  CONSTRAINT `fk_turmatempodara_temporada` FOREIGN KEY (`idtemporada`) REFERENCES `tb_temporada` (`idtemporada`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_turmatempodara_turma` FOREIGN KEY (`idturma`) REFERENCES `tb_turma` (`idturma`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_turmatemporada`
--

LOCK TABLES `tb_turmatemporada` WRITE;
/*!40000 ALTER TABLE `tb_turmatemporada` DISABLE KEYS */;
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
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`iduser`),
  KEY `FK_users_persons_idx` (`idperson`),
  CONSTRAINT `fk_users_persons` FOREIGN KEY (`idperson`) REFERENCES `tb_persons` (`idperson`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_users`
--

LOCK TABLES `tb_users` WRITE;
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
INSERT INTO `tb_users` VALUES (1,1,'admin','$2y$12$YlooCyNvyTji8bPRcrfNfOKnVMmZA9ViM2A3IpFjmrpIbp5ovNmga',1,0,1,'2017-03-13 06:00:00'),(7,7,'suporte','$2y$12$HFjgUm/mk1RzTy4ZkJaZBe0Mc/BA2hQyoUckvm.lFa6TesjtNpiMe',1,1,0,'2017-03-15 19:10:27'),(11,11,'leco','$2y$12$QX7/h08v5HK/Ut05KmMuXe5F788W5.b9Oxyz1RfYY9r5BoqPV/5s.',0,0,0,'2020-09-26 18:00:05'),(12,12,'luma','$2y$12$kLt7L1BRnSaPOulvdwmfFuK5LAXUxop94SY7QAglEbBdJIqpkiseC',1,1,1,'2020-09-26 18:14:38'),(13,13,'lima','$2y$12$V7gprCwFq/VzTRlyjglqcOEvhOMVX69ncIXN4PTBCDgiPl40xu4Zm',1,1,1,'2020-12-01 19:16:29');
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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_userspasswordsrecoveries`
--

LOCK TABLES `tb_userspasswordsrecoveries` WRITE;
/*!40000 ALTER TABLE `tb_userspasswordsrecoveries` DISABLE KEYS */;
INSERT INTO `tb_userspasswordsrecoveries` VALUES (1,7,'127.0.0.1',NULL,'2020-09-26 17:51:34'),(2,7,'127.0.0.1',NULL,'2020-09-26 17:55:31'),(3,7,'127.0.0.1',NULL,'2020-09-26 17:56:49'),(4,11,'127.0.0.1',NULL,'2020-09-26 18:00:41'),(5,11,'127.0.0.1',NULL,'2020-09-26 18:02:27'),(6,11,'127.0.0.1',NULL,'2020-09-26 18:02:56'),(7,11,'127.0.0.1',NULL,'2020-09-26 18:15:06'),(8,11,'127.0.0.1',NULL,'2020-09-26 18:33:48'),(9,11,'127.0.0.1',NULL,'2020-09-26 18:37:19'),(10,11,'127.0.0.1',NULL,'2020-09-26 18:38:19'),(11,11,'127.0.0.1',NULL,'2020-09-26 18:41:52'),(12,11,'127.0.0.1',NULL,'2020-09-26 18:42:54'),(13,11,'127.0.0.1',NULL,'2020-09-26 18:44:06'),(14,11,'127.0.0.1',NULL,'2020-09-26 18:44:17'),(15,11,'127.0.0.1',NULL,'2020-09-26 18:44:56'),(16,11,'127.0.0.1',NULL,'2020-09-26 18:45:17'),(17,11,'127.0.0.1',NULL,'2020-09-26 18:49:06'),(18,11,'127.0.0.1',NULL,'2020-09-26 18:52:47'),(19,11,'127.0.0.1',NULL,'2020-09-26 19:07:34'),(20,11,'127.0.0.1',NULL,'2020-09-26 19:07:41'),(21,11,'127.0.0.1',NULL,'2020-09-26 19:12:15'),(22,11,'127.0.0.1',NULL,'2020-09-26 19:12:39'),(23,11,'127.0.0.1',NULL,'2020-09-26 19:13:45'),(24,11,'127.0.0.1',NULL,'2020-09-26 19:18:34'),(25,11,'127.0.0.1',NULL,'2020-09-26 19:19:53'),(26,11,'127.0.0.1',NULL,'2020-09-26 19:22:18'),(27,11,'127.0.0.1',NULL,'2020-09-26 19:25:36'),(28,11,'127.0.0.1',NULL,'2020-09-26 19:30:10'),(29,11,'127.0.0.1',NULL,'2020-09-26 19:32:34'),(30,11,'127.0.0.1',NULL,'2020-09-26 19:36:44'),(31,11,'127.0.0.1',NULL,'2020-09-26 20:36:15'),(32,11,'127.0.0.1','2020-09-26 19:39:14','2020-09-26 22:02:41'),(33,11,'127.0.0.1','2020-09-26 19:44:36','2020-09-26 22:42:55'),(34,11,'127.0.0.1','2020-12-01 16:51:36','2020-12-01 19:47:34');
/*!40000 ALTER TABLE `tb_userspasswordsrecoveries` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-06  0:09:00


DELIMITER $$
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
    
END$$
DELIMITER ;

DELIMITER $$


CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_carts_save`(
pidcart INT,
pdessessionid VARCHAR(64),
piduser INT,
pidpess INT
)
BEGIN

    IF pidcart > 0 THEN
        
        UPDATE tb_carts
        SET
            dessessionid = pdessessionid,
            iduser = piduser,
            idpess = pidpess
            
        WHERE idcart = pidcart;
        
    ELSE
        
        INSERT INTO tb_carts (dessessionid, iduser, idpess)
        VALUES(pdessessionid, piduser, pidpess);
        
        SET pidcart = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_carts WHERE idcart = pidcart;

END$$
DELIMITER ;

DELIMITER $$


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
    
END$$
DELIMITER ;

DELIMITER $$
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
    
END$$
DELIMITER ;


DELIMITER $$
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
    
END$$
DELIMITER ;


DELIMITER $$
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
    
END$$
DELIMITER ;


DELIMITER $$
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
    
END$$
DELIMITER ;


DELIMITER $$
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
    
END$$
DELIMITER ;


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_turma_save`(
pidturma INT, 
pidativ INT,
pidmodal INT, 
pidespaco INT, 
pidhorario INT, 
piduser INT, 
pidturmastatus INT, 
pdescturma VARCHAR(16),
pvagas INT, 
pnuminscritos INT
)
BEGIN
  
  IF pidturma > 0 THEN
    
    UPDATE tb_turma
        SET idativ = pidativ,
      idmodal = pidmodal,
       idespaco = pidespaco,
      idhorario = pidhorario,
       iduser = piduser,
    idturmastatus = pidturmastatus,
          descturma = pdescturma,
        vagas = pvagas,
     numinscritos = pnuminscritos
            
     WHERE idturma = pidturma;
        
    ELSE
    
    INSERT INTO tb_turma (idativ, idmodal, idespaco, idhorario, iduser, idturmastatus, descturma, vagas, numinscritos)
        VALUES(pidativ, pidmodal, pidespaco, pidhorario, piduser, pidturmastatus, pdescturma, pvagas, pnuminscritos);
        
        SET pidturma = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_turma WHERE idturma = pidturma;
    
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_save`(
pdesperson VARCHAR(64), 
pdeslogin VARCHAR(64), 
pdespassword VARCHAR(256), 
pdesemail VARCHAR(128), 
pnrphone BIGINT, 
pinadmin TINYINT,
pisprof TINYINT, 
pstatus TINYINT
)
BEGIN
  
    DECLARE vidperson INT;
    
  INSERT INTO tb_persons (desperson, desemail, nrphone)
    VALUES(pdesperson, pdesemail, pnrphone);
    
    SET vidperson = LAST_INSERT_ID();
    
    INSERT INTO tb_users (idperson, deslogin, despassword, inadmin, isprof, status)
    VALUES(vidperson, pdeslogin, pdespassword, pinadmin, pisprof, pstatus);
    
    SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = LAST_INSERT_ID();
    
END$$
DELIMITER ;


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_userspasswordsrecoveries_create`(
piduser INT,
pdesip VARCHAR(45)
)
BEGIN
  
  INSERT INTO tb_userspasswordsrecoveries (iduser, desip)
    VALUES(piduser, pdesip);
    
    SELECT * FROM tb_userspasswordsrecoveries
    WHERE idrecovery = LAST_INSERT_ID();
    
END$$
DELIMITER ;


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usersupdate_save`(
piduser INT,
pdesperson VARCHAR(64), 
pdeslogin VARCHAR(64), 
pdespassword VARCHAR(256), 
pdesemail VARCHAR(128), 
pnrphone BIGINT, 
pinadmin TINYINT,
pisprof TINYINT,
pstatus TINYINT
)
BEGIN
  
    DECLARE vidperson INT;
    
  SELECT idperson INTO vidperson
    FROM tb_users
    WHERE iduser = piduser;
    
    UPDATE tb_persons
    SET 
    desperson = pdesperson,
        desemail = pdesemail,
        nrphone = pnrphone
  WHERE idperson = vidperson;
    
    UPDATE tb_users
    SET
    deslogin = pdeslogin,
        despassword = pdespassword,
        inadmin = pinadmin,
        isprof = pisprof,
        status = pstatus
  WHERE iduser = piduser;
    
    SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = piduser;
    
END$$
DELIMITER ;














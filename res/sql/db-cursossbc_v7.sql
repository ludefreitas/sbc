CREATE DATABASE  IF NOT EXISTS `db_cursossbc` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_cursossbc`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_cursossbc
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
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;
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
  `idpess` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcart`),
  KEY `FK_carts_pessoa_idx` (`idpess`),
  CONSTRAINT `fk_carts_pessoa` FOREIGN KEY (`idpess`) REFERENCES `tb_pessoa` (`idpess`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_carts`
--

LOCK TABLES `tb_carts` WRITE;
/*!40000 ALTER TABLE `tb_carts` DISABLE KEYS */;
INSERT INTO `tb_carts` VALUES (1,'4avd2mtd7setu6369ancuqfpfk',NULL),(2,'9bg4624sje7aqk1fuhn7ikvagh',NULL),(3,'20ofh5p7b94l6q24t85p25gjtj',NULL),(4,'0vkepdotbkad1cq9iov2027geq',NULL),(5,'mcilvsti8cftm64bjc9p8ipk3a',NULL),(6,'qbelpos126ridth2tdvf85pd83',1),(7,'pu1u6lkl6ilah5hh9ah4imu927',NULL),(8,'79gkbml6fcargcpmb2ss7ama22',NULL),(9,'4aoj68uqmujjm8r5boi9lg9ini',NULL),(10,'j61l9jbdcfsf4kdmbpqsg3qp7g',NULL),(11,'5hiq11nv80sn5qcdmt4os7pgsa',NULL),(12,'6lufhvu4h6hc9jbre538hiipfl',NULL),(13,'3fn34k7ln07fifddu42lqjn87i',NULL),(14,'dqo7u8tua1f0uu8vlkbgcbaqeq',NULL),(15,'5t8mvort29jol86lejaeoa1oar',NULL),(16,'6breiij6ie5e1emttf3o75358u',NULL),(17,'otb49s1r8ng12h73ju0d79gaho',2),(18,'r2h522v0loahvshav37nrbhd0q',2),(19,'q0eflc1jo1t6iipi093gsbm4iq',1),(20,'omrbd3hk9edf0nchplb3spkkku',1),(21,'e5u6gdmc01tjv1abu3g2ahlc2a',NULL),(22,'7lg6mdkjd8i222dmu750d6kh8o',1),(23,'2lubn3ia9c4eghjga3stn03b6q',NULL),(24,'o4h6q3vsll1h5grvnera1mlsgd',1),(25,'s2b9mdaaq16651febugnufl2vs',NULL),(26,'pchfn9j68m4uu8td47s2b72sbr',NULL),(27,'n7hjlsj9ipd6hdrkqhc4tfkeas',NULL),(28,'tc7a8ot78n490heklqs6kfof7m',NULL),(29,'d7qfdufi1gtqgbr1o9qqajqegi',NULL),(30,'6rohbevcv530vrj30c1t20buho',21),(31,'gmst7h9j06utuuuff71ocg318v',21),(32,'lis3un5ec6smpub1476hbkcs5b',1),(33,'vb012nif47d3h5k097laviekir',21),(34,'fk54vhvmg76suj1d9u77d4uvcf',21),(35,'ctttkbqq1ejd5fe2j4ra32tb39',21),(36,'dkdtigg4jci06mh6ginjorg07h',21),(37,'m6qgf7irmp9n79b16n3vg5h4m6',21),(38,'iv9r5linl16eou3vtjcblrt300',21),(39,'a52ftkblgn7lgqdss5dv5jefq9',21),(40,'80fki4qpcj8cbg66l0fr89h961',1),(41,'90p20lh2gqota1gicp5hp8gamn',1),(42,'9am6iks4ntpn60rp7jp4ejccpa',NULL),(43,'lgaiurnhgv32s0bko6buia5j16',NULL),(44,'dlme9qgnkfd63536oadi3iup4j',NULL),(45,'vmlbtashg57erjt385uc8ohp7b',NULL),(46,'kknecmtcufaumt44br6u27hus5',1),(47,'lp2jl2lddfnu196htiag9o1ssl',1),(48,'8486f3d4nj80ijr06849kj08e9',NULL),(49,'cbsnojid35dmngh69jl5nf15kj',NULL),(50,'uda0m698skretvibfhroggrlon',NULL),(51,'g70vjqqhfad40gofb1nujv65u1',NULL),(52,'f8fbures7bhksp4slh81jnjt8q',NULL),(53,'h7m7o4a85mi982491vgvb3vhjr',1),(54,'bcrkv5264s6fv5sr1pumaobs6k',1),(55,'he9ue6t8r473065d37jp7v41mh',NULL),(56,'r2roqt827seu0qf6p328vs4c0l',NULL),(57,'8mtqg736kd5b1uujlf0s1bnsbb',NULL),(58,'pb78ac21oa9hhrlp60gjvh8aji',NULL),(59,'jubq6ssqmbrh1j3eoc3f7pn7d7',1),(60,'7576lau3gmi2f55mtm9p3falk3',1),(61,'5c57bott29pcl8j4ai2eaav7j9',1),(62,'0c87b8usdktk00e21t6cfhfc2i',1),(63,'ld3su4drue51ij80cu21i28sno',1),(64,'sm0uij716vob4kca7t4apbk9p4',1),(65,'vkv32vp3nn67elbil82vi4d7ce',1),(66,'ia1kjk07feljfet8unl525jp02',NULL),(67,'v2d0i2getq9kjjdr58339j36d6',1),(68,'hbt804o771khs1h8lc0rpihc7c',NULL),(69,'qnluo18l8r0kjvfvbvcokmm1gn',NULL),(70,'k0ua55ac0v26js1qsau3n5i40e',NULL),(71,'73dj8as37rkgm4rrk7o2e0m1a1',21),(72,'53b4sjthjkvkjmiphobftfkcur',NULL),(73,'4n37mt0jc2784s76v7d4phq5si',21),(74,'pquif5hru31tejska256rjrc01',NULL),(75,'0to1ca6475l31l9tv49n7kq7bv',21),(76,'lrrmspkd3oho23u0ivqpn7aqvo',NULL),(77,'kqvif7d84igfmkenatrnllr52h',NULL),(78,'lorecth0v932cr019init6as7f',NULL),(79,'nvomd90js4das43iavlddu476b',NULL),(80,'d30q1utc9llas36j899ollom31',NULL),(81,'n3e02e90ogibjsdaiuv2ju52ks',NULL),(82,'lvmudc8r1nfdlmbrore0llhsuo',NULL),(83,'6tiq492foctq5ifbd8lh8tsu8m',21),(84,'fbfok38d7b0nschd23oqnlvt2j',1),(85,'10rl6mvtsdjqu4o1el8m8ma682',NULL),(86,'gfgvtt68etd8ce8oj40den46ps',NULL),(87,'tm622ekhtlmf9ielsf0gchguqp',21),(88,'smnjkv3c1ks03502lsffr86b8p',21),(89,'qprv90r6fq6t7dpr51bh3842cc',NULL),(90,'7cj9dfgbrnlajs0o8i5l91s6rh',21),(91,'k73l7lg6eqqcfatd8vfiffuq20',21),(92,'5ff6580ls6uunab74l7c8vas8i',21),(93,'igr4841gaeaf775ljpa8s0pqv0',21),(94,'dgpdji9iurekj68fj4m3kbrqo2',21),(95,'ef3rvdqafr52in0knca5eis7a7',21),(96,'o21jk61hhpr8ks6en0pa29k3n6',21),(97,'cupg86o1ihvrldtj7vm735cr9n',21),(98,'ml83o2ijek3g7v9vctd3jep32a',21),(99,'qeedjt5frtbklpm0qsbafs34k2',21),(100,'jqt5vb88uodddej51bhju2v8sp',21),(101,'4nsovhr3qa1b1lgfafhnn0uohh',NULL),(102,'dh5thbh9jre7r4n0esst039099',21),(103,'n4aq48pg2bjq7n9phprg6n2u0s',21),(104,'5cht53m9o563eko4mdm76aett3',21),(105,'tif9sbkrlq07loub2ag05v9n2d',NULL),(106,'n0qh4v9s25pb9hknmmqi12qnna',NULL),(107,'v5ss1irpj4qkna9pgml0d42b1d',21),(108,'j80heut0m4tvph58evjj5h8e1r',NULL),(109,'uvfomffd56bdprgojaoclpqcbf',1),(110,'4q9o7fs4l10hed0i72vvbosu3t',1),(111,'fgura27fg5frstfegqplijob75',NULL),(112,'hmvgdmrh3e9edkckqu229d916e',21),(113,'il3t6t3bj1bhv6bt8avlvkhelh',21),(114,'428dv4n4j6oi6iqjdp0iblu141',21),(115,'j0icnkcbtohtr2j4mld4lqmcfu',21),(116,'55t2mgah73pt1pk90d49mhgat7',NULL),(117,'hpne8sk1uvlr5s3698dltqj6jr',1),(118,'7q26ipm4uolm21l7kn5pc8nmri',1),(119,'cieou0914lbbp4fbon0u7ph015',1),(120,'986f6ska8h5nn9q2n7lvjqefig',1),(121,'gjvq4h8lqrplgjiioopdubitds',21),(122,'qs7rjgk3oh3r5al296jvvcpl9f',21),(123,'q2ro079em5o731iqklud0qiopb',1),(124,'obhp7vhghhigm4vgnlv4krilfh',1),(125,'lsdqanllb38ehrsi2a3hgjv2o1',21),(126,'s9hgg48ucidepmism3e9dk238g',2),(127,'p9hkann13g9qqvd9vvpuftld4q',2),(128,'l4v10n56itulr6gv32go44ihdq',2),(129,'1lvpon24a6gm7rrhttp37ek7ij',1),(130,'m8djb31mqgq9o10epgiqvaurhj',NULL),(131,'dfnfikj43ni2pcbtfvfu2ns41g',21),(132,'bs23mc7533qoctqv9iftigv742',21),(133,'un2ljljauis3566sa0g3m3290i',2),(134,'k3fodmb38d3146ua28sf8tn8hf',1),(135,'7tj954i9nunm71shpbj9qcqc9h',1),(136,'q0pr6tddeomo1jn06sjvtaibqf',1),(137,'uup3f6td1ufojncvop91v7jiei',21),(138,'85mg9dm4d72tb26ohs9camfuef',21),(139,'69mr40gl21ro0l9h22e9osumqm',NULL),(140,'atrtglon5d02rl2iq3hg42s3r5',2),(141,'08f283sd8vrms6s0ne1vkje5v3',1),(142,'oqnvt9d0n73kieu91tn9ipq430',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=155 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_cartsturmas`
--

LOCK TABLES `tb_cartsturmas` WRITE;
/*!40000 ALTER TABLE `tb_cartsturmas` DISABLE KEYS */;
INSERT INTO `tb_cartsturmas` VALUES (3,4,2,'2020-12-06 12:30:19','2020-12-06 15:07:11'),(4,4,2,NULL,'2020-12-06 15:40:53'),(5,5,2,'2020-12-06 12:59:38','2020-12-06 15:47:20'),(6,5,2,'2020-12-06 13:07:03','2020-12-06 16:04:42'),(7,5,2,'2020-12-06 14:02:33','2020-12-06 16:10:33'),(8,6,2,'2020-12-07 17:22:01','2020-12-07 20:17:20'),(9,6,2,'2020-12-07 18:02:56','2020-12-07 20:23:58'),(10,6,2,'2020-12-07 18:04:46','2020-12-07 21:04:35'),(11,6,2,NULL,'2020-12-07 21:05:05'),(12,9,2,NULL,'2020-12-08 03:51:31'),(13,12,5,NULL,'2020-12-12 01:11:04'),(14,17,3,NULL,'2020-12-15 03:25:18'),(15,18,7,'2020-12-15 20:24:08','2020-12-15 23:18:46'),(16,18,7,NULL,'2020-12-15 23:24:26'),(17,19,3,'2021-01-06 17:47:02','2021-01-06 17:12:07'),(18,19,5,'2021-01-06 18:03:28','2021-01-06 21:03:16'),(19,19,3,'2021-01-06 18:11:18','2021-01-06 21:03:46'),(20,19,10,NULL,'2021-01-06 21:14:12'),(21,20,4,'2021-01-07 16:55:16','2021-01-07 18:35:05'),(22,20,6,NULL,'2021-01-07 19:56:17'),(23,21,6,NULL,'2021-01-07 19:59:20'),(24,22,5,NULL,'2021-01-07 20:05:58'),(25,23,5,NULL,'2021-01-08 03:33:02'),(26,24,6,'2021-01-09 16:29:43','2021-01-09 19:28:08'),(27,24,2,'2021-01-09 16:32:42','2021-01-09 19:30:06'),(28,24,4,NULL,'2021-01-09 19:34:05'),(29,25,4,NULL,'2021-01-10 18:52:50'),(30,26,28,NULL,'2021-01-11 14:15:15'),(31,30,7,'2021-01-12 11:00:00','2021-01-12 13:53:42'),(32,30,28,NULL,'2021-01-12 14:00:18'),(33,31,28,'2021-01-12 18:26:25','2021-01-12 20:49:55'),(34,31,4,NULL,'2021-01-12 21:27:27'),(35,32,28,'2021-01-13 14:36:28','2021-01-13 16:32:51'),(36,32,2,'2021-01-13 14:36:57','2021-01-13 17:36:43'),(37,32,2,'2021-01-13 14:38:09','2021-01-13 17:37:14'),(38,32,6,'2021-01-13 14:40:09','2021-01-13 17:39:58'),(39,32,6,'2021-01-13 14:42:57','2021-01-13 17:41:39'),(40,32,6,'2021-01-13 14:51:06','2021-01-13 17:43:11'),(41,32,28,'2021-01-13 14:52:21','2021-01-13 17:51:21'),(42,32,28,'2021-01-13 15:02:15','2021-01-13 18:02:07'),(43,32,28,'2021-01-13 15:21:30','2021-01-13 18:02:26'),(44,32,28,'2021-01-13 15:36:51','2021-01-13 18:23:15'),(45,32,28,'2021-01-13 15:42:09','2021-01-13 18:37:07'),(46,32,28,'2021-01-13 15:43:32','2021-01-13 18:42:22'),(47,32,4,'2021-01-13 15:46:02','2021-01-13 18:43:52'),(48,32,4,'2021-01-13 15:54:52','2021-01-13 18:48:58'),(49,32,28,'2021-01-13 16:16:51','2021-01-13 18:55:04'),(50,32,28,'2021-01-13 16:23:56','2021-01-13 19:17:04'),(51,32,28,'2021-01-13 16:26:09','2021-01-13 19:25:51'),(52,33,28,'2021-01-15 15:32:23','2021-01-14 16:04:39'),(53,33,28,NULL,'2021-01-15 18:44:28'),(54,34,28,NULL,'2021-01-19 15:43:45'),(55,35,10,NULL,'2021-01-21 00:54:08'),(57,37,2,'2021-01-20 22:16:43','2021-01-21 01:15:58'),(58,37,3,NULL,'2021-01-21 01:17:00'),(59,38,2,'2021-01-20 22:27:43','2021-01-21 01:27:29'),(60,38,6,NULL,'2021-01-21 01:28:01'),(61,39,2,NULL,'2021-01-21 01:35:30'),(63,40,7,'2021-01-21 19:24:18','2021-01-21 22:19:21'),(64,40,2,'2021-01-21 19:27:16','2021-01-21 22:27:10'),(65,40,2,'2021-01-21 19:28:18','2021-01-21 22:27:31'),(66,40,2,'2021-01-21 19:28:46','2021-01-21 22:28:33'),(67,40,2,'2021-01-21 19:29:37','2021-01-21 22:29:32'),(68,40,6,'2021-01-21 19:33:01','2021-01-21 22:32:54'),(69,41,7,NULL,'2021-01-21 22:33:16'),(70,46,7,NULL,'2021-01-23 19:00:12'),(71,47,7,NULL,'2021-01-23 19:04:53'),(72,48,2,'2021-01-23 16:21:44','2021-01-23 19:21:12'),(73,49,2,'2021-01-23 16:22:12','2021-01-23 19:21:59'),(74,50,2,'2021-01-23 16:24:29','2021-01-23 19:22:29'),(75,51,2,'2021-01-23 16:24:48','2021-01-23 19:24:43'),(76,52,7,'2021-01-23 16:27:53','2021-01-23 19:25:08'),(77,53,7,NULL,'2021-01-23 19:28:07'),(78,54,7,NULL,'2021-01-23 19:29:40'),(79,55,2,'2021-01-23 16:30:51','2021-01-23 19:30:36'),(80,56,28,'2021-01-23 16:31:40','2021-01-23 19:31:05'),(81,57,2,'2021-01-23 19:49:24','2021-01-23 19:31:58'),(82,58,5,'2021-01-23 19:57:47','2021-01-23 22:49:52'),(84,60,2,NULL,'2021-01-23 23:02:33'),(85,61,3,NULL,'2021-01-23 23:38:32'),(89,65,2,'2021-01-23 21:55:08','2021-01-23 23:55:41'),(90,66,28,'2021-01-23 21:57:24','2021-01-24 00:55:23'),(91,67,5,NULL,'2021-01-24 00:57:40'),(93,69,28,'2021-01-31 17:15:02','2021-01-31 20:13:31'),(94,70,10,'2021-01-31 17:16:33','2021-01-31 20:15:22'),(95,71,2,NULL,'2021-01-31 20:16:52'),(96,72,6,'2021-01-31 20:49:32','2021-01-31 20:22:08'),(97,73,7,'2021-01-31 21:29:39','2021-01-31 23:49:50'),(98,74,6,'2021-01-31 21:30:07','2021-02-01 00:29:52'),(99,75,7,NULL,'2021-02-01 00:30:21'),(100,76,6,'2021-01-31 21:58:35','2021-02-01 00:31:26'),(102,83,5,NULL,'2021-02-03 18:33:26'),(103,84,4,NULL,'2021-02-04 00:35:34'),(104,86,3,'2021-02-04 22:53:37','2021-02-05 01:50:30'),(105,87,7,NULL,'2021-02-05 01:54:01'),(106,88,23,NULL,'2021-02-05 02:06:01'),(107,89,16,'2021-02-04 23:25:18','2021-02-05 02:24:37'),(108,90,23,NULL,'2021-02-05 02:25:34'),(109,91,28,NULL,'2021-02-05 02:32:28'),(110,92,7,NULL,'2021-02-05 02:35:33'),(111,93,29,NULL,'2021-02-05 02:41:23'),(112,94,3,NULL,'2021-02-05 02:46:07'),(113,95,28,NULL,'2021-02-05 03:06:57'),(114,96,3,NULL,'2021-02-05 03:15:07'),(115,97,10,NULL,'2021-02-05 03:24:02'),(116,98,10,NULL,'2021-02-05 03:25:21'),(117,99,23,NULL,'2021-02-05 03:28:50'),(118,100,7,NULL,'2021-02-05 03:30:44'),(119,101,7,'2021-02-05 00:44:10','2021-02-05 03:43:29'),(120,102,4,NULL,'2021-02-05 03:44:42'),(121,103,29,NULL,'2021-02-05 18:43:33'),(122,104,27,NULL,'2021-02-05 18:45:29'),(123,106,5,'2021-02-05 16:00:50','2021-02-05 18:59:40'),(124,107,5,NULL,'2021-02-05 19:03:34'),(125,109,5,NULL,'2021-02-05 19:05:07'),(126,110,4,NULL,'2021-02-05 19:09:03'),(127,112,4,NULL,'2021-02-05 19:10:25'),(128,113,28,NULL,'2021-02-05 19:13:04'),(129,114,29,NULL,'2021-02-05 19:14:49'),(130,115,4,NULL,'2021-02-05 19:19:44'),(131,117,4,NULL,'2021-02-05 19:23:21'),(132,118,4,NULL,'2021-02-05 19:27:31'),(133,119,4,NULL,'2021-02-05 19:43:34'),(134,120,5,NULL,'2021-02-05 19:51:09'),(135,121,5,NULL,'2021-02-05 19:53:07'),(136,122,3,NULL,'2021-02-05 20:09:00'),(137,123,3,NULL,'2021-02-05 20:10:57'),(138,124,7,NULL,'2021-02-05 20:19:21'),(139,125,7,NULL,'2021-02-05 20:20:12'),(140,126,7,NULL,'2021-02-05 20:22:59'),(141,127,27,NULL,'2021-02-05 20:54:09'),(142,128,10,NULL,'2021-02-05 21:08:45'),(143,129,10,NULL,'2021-02-05 21:09:39'),(144,131,10,NULL,'2021-02-05 21:17:27'),(145,132,29,NULL,'2021-02-05 21:45:35'),(146,133,29,NULL,'2021-02-05 21:46:43'),(147,134,29,NULL,'2021-02-05 21:48:31'),(148,135,10,NULL,'2021-02-05 21:50:10'),(149,136,23,NULL,'2021-02-05 21:51:26'),(150,137,23,NULL,'2021-02-05 21:52:28'),(151,138,10,NULL,'2021-02-05 21:57:56'),(152,139,10,NULL,'2021-02-05 21:58:48'),(153,140,10,NULL,'2021-02-05 21:59:41'),(154,141,10,NULL,'2021-02-05 22:02:52');
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_espaco`
--

LOCK TABLES `tb_espaco` WRITE;
/*!40000 ALTER TABLE `tb_espaco` DISABLE KEYS */;
INSERT INTO `tb_espaco` VALUES (17,4,'Piscina','Piscina de hidroginástica','Piscina coberta, aquecida exclusiva de hidroginástica',60.00),(18,6,'Quadra','Quadra','Quadra coberta com arquibancada',420.00),(19,10,'Quadra','Quadra Poliesportiva','Quadra coberta',420.00),(20,11,'Quadra','Quadra Poliesportiva','Quadra coberta com arquibancada',684.00),(21,11,'Sala','Sala para atividades diversas','Sala com espelhos e tatame',36.00),(22,14,'Mezanino','Sala para atividades diversas','Sala para atividades diversas em piso superior',42.00),(23,1,'Sala','Sala para atividades diversas','Sala com barras e espelhos',120.00),(24,1,'Sala de Judô','Sala para lutas','Sala para lutas com tatame',40.00),(25,1,'Quadra','Quadra externa','Quadra 1, externa, descoberta e sem arquibancada',460.00),(27,15,'Salão','Salão para atividades diversas','Salão espelhado',92.00),(28,5,'Quadra','Quadra Poliesportiva','Quadra coberta sem arquibancada',460.00),(30,4,'Quadra','Meia quadra','Meia quadra com cesto de basquete e arquibancada',180.00),(31,1,'Piscina','Piscina externa','Piscina 25m com capacidade de 1200l, externa com 5 raias,',125.00);
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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
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
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;
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
  `numsorte` int(11) DEFAULT 0,
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
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_insc`
--

LOCK TABLES `tb_insc` WRITE;
/*!40000 ALTER TABLE `tb_insc` DISABLE KEYS */;
INSERT INTO `tb_insc` VALUES (45,7,123,3,4,1,'2021-02-05 20:11:07'),(46,7,124,7,4,1,'2021-02-05 20:19:31'),(47,7,125,7,4,1,'2021-02-05 20:20:22'),(48,7,126,7,4,1,'2021-02-05 20:23:10'),(49,7,127,27,4,13,'2021-02-05 20:54:20'),(53,7,132,29,4,3,'2021-02-05 21:45:44'),(54,7,133,29,4,4,'2021-02-05 21:46:53'),(55,7,134,29,4,5,'2021-02-05 21:48:40'),(57,7,136,23,4,2,'2021-02-05 21:51:38'),(58,7,137,23,4,3,'2021-02-05 21:52:40'),(59,7,138,10,4,1,'2021-02-05 21:58:06'),(60,7,140,10,4,2,'2021-02-05 21:59:51'),(61,7,141,10,4,3,'2021-02-05 22:03:03');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_inscstatus`
--

LOCK TABLES `tb_inscstatus` WRITE;
/*!40000 ALTER TABLE `tb_inscstatus` DISABLE KEYS */;
INSERT INTO `tb_inscstatus` VALUES (1,'Cancelada'),(2,'Não sorteada'),(3,'Sorteada'),(4,'Aguardando matrícula'),(5,'Suspensa'),(6,'Removida'),(7,'Aguardando Sorteio');
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_local`
--

LOCK TABLES `tb_local` WRITE;
/*!40000 ALTER TABLE `tb_local` DISABLE KEYS */;
INSERT INTO `tb_local` VALUES (1,'Baetinha','Crec Deputado Odemir Furlan ','Rua Bauru','20','','Baeta Neves','São Bernardo do Campo','SP','(11)26309319',9751440),(3,'Baetão','Complexo Aquático do Estádio Municipal Giglio Portugal Pichinin','Rua Dona Julia Cezar Ferreira','270','','Baeta Neves','São Bernardo do Campo','SP','(11)43329816',9760300),(4,'Aquacentro - Demarchi','Centro de Reab. Fisiotep. Esportiva P/ Atletas e Pessoas com Def','R. Valdomiro Luis da Silva','279','','Jd. Nossa Sra. de Fátima','São Bernardo do Campo','SP','(11)41265600',9820340),(5,'Creeba','Centro Recreativo Esportivo Especial Luis Bonício','R. Benedeto Merson','35','','Bairro Assunção','São Bernardo do Campo','SP','43515940',9810340),(6,'Alves Dias','Ginásio de Esportes Atílio Pessoti','Av. Oswaldo Fregonezzi','101','','Alves Dias','São Bernardo do Campo','SP','41097469',9851015),(7,'Vila Marlene','Crec Otávio Edgar de Oliviera','Rua Continental','808','','Vila Marlene','São Bernardo do Campo','SP','(11)41292088',9750060),(8,'Vila São Pedro','Centro Esportivo Vila São Pedro','Rua Santo Antonio','300','','Vila São Pedro','São Bernardo do Campo','SP','(11)41392088',9781175),(9,'Orquídeas','Centro Esportivo Eder Simões Barbosa','Estrada do Poney Club','148','','Jardim das Orquídeas','São Bernardo do Campo','SP','(11)43362665',9853005),(10,'Areião','Centro de Convivência Dom Jorge Marcos Oliveira','Estrada da Pedra Branca','754','','Montanhão','São Bernardo do Campo','SP','(11)43399207',9792302),(11,'Centro Cultural Ferrazópolis','Centro Cultural Jácomo Guazelli','Rua Rosa Pacheco','201','','Ferrazópolis','São Bernardo do Campo','SP','41272324',9790330),(12,'Terra Nova','Ginásio Poliesportivo Rolando Marques','Rua Pastor Tito Rodrigues Linhares','03','','Terra Nova','São Bernardo do Campo','SP','41014267',9820710),(13,'Riacho Grande','Ginásio Poliesportivo João Soares Brasa','Rua Marcílio Conrado','500','','Riacho Grande','São Bernardo do Campo','SP','43975009',9830291),(14,'Centro de Conviv.  Ferrazópolis','Centro de Convivência Mariana Benvinda da Costa','Rua Aureliano de Souza','6','','Ferrazópolis','São Bernardo do Campo','SP','41270771',0),(15,'Corintinha','Centro Esportivo Salim Tabet','Rua Guilherme Lorenzi','504','','Jardim Esmeralda','São Bernardo do Campo','SP','43300859',9851020),(16,'Jardim do Lago','Ginásio Poliesportivo José Vicente Lopes','Rua Ministro Nelson Hungria','450','','Jardim do Lago','São Bernardo do Campo','SP','(11)4357-6426',5690050),(17,'Jerusalém','Centro Esportivo Jerusalém','Rua Lázaro de Oliveira Leite','200','','Bairro Jerusalém','São Bernardo do Campo','SP','(11)43559700',9811375),(18,'Jardim Lavínia','Centro Esportivo Lavínia','Avenida Capitão Casa','1500','','Bairro dos Casa','São Bernardo do Campo','SP','(11)4125-5198',9812000),(19,'Meninos - Rudge Ramos','Meninos Futebol Clube','Avenida Caminho do Mar','3222','','Rudge Ramos','São Bernardo do Campo','SP','(11)4368-5203',9612000),(21,'Paulicéia','Centro Recreativo Esportivo Cultural Gentil Antiquera','Rua Francisco Alves','460','','Paulicéia','São Bernardo do Campo','SP','(11)4178-9455',9692000),(22,'Planalto','Centro Esportivo Roberto de Almeida Nunes','Rua Eunice Weaver','60','','Planalto','São Bernardo do Campo','SP','(11)4341-8445',9890080),(23,'Poliesportivo ','Ginásio Poliesportivo Municipal de São Bernardo do Campo','Avenida Kennedy','1155','','Bairro Anchieta','São Bernardo do Campo','SP','(11)4126-5600',9726253),(24,'Taboão','Ginásio de Esportes Benedito Pieralini Benaglia','Rua Alfredo Bernardo Leite','1287','','Taboão','s','São Bernardo do Campo','(11)4361-7622',0),(25,'Goldem Park','Salão da Igreja Nossa Senhora de Guadalupe','Rua Doze','3','','Golden Park','São Bernardo do Campo','SP','',0),(27,'Atletismo','Centro de Atletismo Oswaldo Terra da Silva','Tiradentes','1845','','Santa Terezinha','São Bernardo do Campo','SP','(11)4347-8203',9780265),(28,'Silvina','Comunidade Maria de Nazaré','Rua Araújo Viana','230','','Ferrazópolis','São Bernardo do Campo','SP','',0);
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
-- Table structure for table `tb_matricula`
--

DROP TABLE IF EXISTS `tb_matricula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_matricula` (
  `idmatricula` int(11) NOT NULL AUTO_INCREMENT,
  `numeromatricula` int(11) DEFAULT NULL,
  `idinsc` int(11) NOT NULL,
  `idmatriculastatus` int(11) NOT NULL,
  `dtmatricula` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idmatricula`),
  KEY `fk_matricula_insc_idx` (`idinsc`),
  KEY `fk_matricula_matriculastatus_idx` (`idmatriculastatus`),
  CONSTRAINT `fk_matricula_insc` FOREIGN KEY (`idinsc`) REFERENCES `tb_insc` (`idinsc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_matricula_matriculastatus` FOREIGN KEY (`idmatriculastatus`) REFERENCES `tb_matriculastatus` (`idmatriculastatus`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_matricula`
--

LOCK TABLES `tb_matricula` WRITE;
/*!40000 ALTER TABLE `tb_matricula` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_matricula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_matriculastatus`
--

DROP TABLE IF EXISTS `tb_matriculastatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_matriculastatus` (
  `idmatriculastatus` int(11) NOT NULL AUTO_INCREMENT,
  `descmatriculastatus` varchar(32) NOT NULL,
  PRIMARY KEY (`idmatriculastatus`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_matriculastatus`
--

LOCK TABLES `tb_matriculastatus` WRITE;
/*!40000 ALTER TABLE `tb_matriculastatus` DISABLE KEYS */;
INSERT INTO `tb_matriculastatus` VALUES (1,'Matrícula ativa'),(2,'Matrícula confirmada'),(3,'Matrícula suspensa'),(4,'Matrícula trancada'),(5,'Matrícula removida'),(6,'Matrícula desativada');
/*!40000 ALTER TABLE `tb_matriculastatus` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_modalidade`
--

LOCK TABLES `tb_modalidade` WRITE;
/*!40000 ALTER TABLE `tb_modalidade` DISABLE KEYS */;
INSERT INTO `tb_modalidade` VALUES (1,'Artesanato'),(2,'Dança'),(3,'Futebol'),(4,'Futsal'),(5,'Ginástica'),(6,'Hidroginástica'),(7,'Voleibol'),(8,'Tênis'),(9,'Badminton'),(10,'Basquetebol'),(11,'Handebol'),(12,'Lutas'),(14,'Natação'),(16,'Artes Marciais');
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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_persons`
--

LOCK TABLES `tb_persons` WRITE;
/*!40000 ALTER TABLE `tb_persons` DISABLE KEYS */;
INSERT INTO `tb_persons` VALUES (1,'Luciano Freitas','lulufreitas@gmail.com',921474836,'2020-03-01 06:00:00'),(7,'Suporte','lulufreitas008@gmail.com',911123456,'2020-05-15 19:10:27'),(11,'Leco','lulufreitas08@hotmail.com',987654321,'2020-09-26 18:00:05'),(12,'Luma','luma@email',987987980,'2020-09-26 18:14:38'),(13,'Lima','lima@email',900987789,'2020-12-01 19:16:29'),(14,'Laura','laura@email',911232112,'2020-12-08 00:22:42'),(15,'Lena','lena@email.com',11987987,'2020-12-08 00:49:33'),(19,'Lino','lino@email',0,'2020-12-11 22:58:48'),(20,'Lino','lino@email',909000101,'2020-12-11 22:59:17'),(21,'Lino','lino@email',909000101,'2020-12-11 23:09:29'),(22,'Leca','leca@email',908765432,'2020-12-11 23:22:16'),(23,'Luana','luana@email',907654321,'2020-12-11 23:23:10'),(24,'Lorena','Lorena@email',989890003,'2021-01-08 03:04:15'),(25,'Leone','leone@email',987098876,'2021-01-10 14:44:47'),(26,'Luca','luca@email',908932144,'2021-01-10 14:48:37'),(27,'Lana','lana@email',987643252,'2021-01-10 14:56:18'),(28,'Livia','livia@email',954372134,'2021-01-10 14:58:10'),(29,'Lana','lana@email',990091222,'2021-02-02 20:18:11'),(30,'Lana','lana@email',990091222,'2021-02-02 20:32:44'),(31,'Lana','lana@email',990091222,'2021-02-02 20:40:30'),(32,'Lana','lana@email',990091222,'2021-02-02 20:45:19'),(33,'Lana','lana@email',990091222,'2021-02-02 20:45:58'),(34,'Lana','lana@email',990091222,'2021-02-02 20:49:38'),(35,'Lana','lana@email',990091222,'2021-02-02 20:51:00'),(36,'Lana','lana@email',990091222,'2021-02-02 21:00:30'),(37,'Lana','lana@email',990091222,'2021-02-02 21:09:40');
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
  `statuspessoa` tinyint(4) NOT NULL DEFAULT 1,
  `dtinclusao` timestamp NOT NULL DEFAULT current_timestamp(),
  `dtalteracao` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idpess`),
  KEY `fk_pessoa_users_idx` (`iduser`),
  CONSTRAINT `fk_pessoa_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pessoa`
--

LOCK TABLES `tb_pessoa` WRITE;
/*!40000 ALTER TABLE `tb_pessoa` DISABLE KEYS */;
INSERT INTO `tb_pessoa` VALUES (1,1,'Lenon','1997-02-13','Masculino','098098098','789789789','78768686876',1,NULL,NULL,NULL,NULL,NULL,1,'2020-12-06 17:52:16','2020-12-12 20:18:26'),(2,14,'Leni','1992-03-31','Feminino','127897888','127897887','127897887',1,NULL,NULL,'127897887','Louise','127897887',1,'2020-12-15 03:32:31','2020-12-15 06:45:21'),(21,21,'Leni','1990-02-21','Feminino','009876990892','123456789','999000999000',1,'787878788','Luana','9099090998787','Lucas','8989889898989',1,'2021-01-12 13:51:10','2021-01-12 13:51:10');
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
  `statussort` tinyint(4) NOT NULL DEFAULT 1,
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
-- Table structure for table `tb_sorteioinsc`
--

DROP TABLE IF EXISTS `tb_sorteioinsc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_sorteioinsc` (
  `idsorteio` int(11) NOT NULL,
  `idinsc` int(11) NOT NULL,
  PRIMARY KEY (`idsorteio`,`idinsc`),
  KEY `fk_sorteioinsc_insc_idx` (`idinsc`),
  KEY `fk_sorteioinsc_sorteio_idx` (`idsorteio`),
  CONSTRAINT `fk_sorteioinsc_insc` FOREIGN KEY (`idinsc`) REFERENCES `tb_indc` (`idinsc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sorteioinsc_sorteio` FOREIGN KEY (`idsorteio`) REFERENCES `tb_sorteio` (`idsorteio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_sorteioinsc`
--

LOCK TABLES `tb_sorteioinsc` WRITE;
/*!40000 ALTER TABLE `tb_sorteioinsc` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_sorteioinsc` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_temporada`
--

LOCK TABLES `tb_temporada` WRITE;
/*!40000 ALTER TABLE `tb_temporada` DISABLE KEYS */;
INSERT INTO `tb_temporada` VALUES (4,'2021',4,'2020-12-01 00:00:00','2021-01-20 00:00:00','2021-01-21 00:00:00','2021-01-31 00:00:00','2020-12-04 01:06:02'),(5,'2020',8,'2019-12-01 00:00:00','2020-01-21 00:00:00','2020-01-22 00:00:00','2020-01-31 00:00:00','2020-12-04 01:36:12'),(6,'2019',8,'2018-12-01 00:00:00','2019-01-20 00:00:00','2019-01-21 00:00:00','2019-01-31 00:00:00','2021-01-08 03:20:39');
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_turma`
--

LOCK TABLES `tb_turma` WRITE;
/*!40000 ALTER TABLE `tb_turma` DISABLE KEYS */;
INSERT INTO `tb_turma` VALUES (2,1,6,17,5,12,3,'Hidro 3ª idade',35),(3,2,6,17,6,12,3,'Hidroginástica',35),(4,2,6,17,7,12,3,'Hidroginástica',35),(5,2,6,17,8,12,3,'Hidroginástica',35),(6,1,6,17,13,13,3,'Hidro 3ª idade',35),(7,2,6,17,14,13,3,'Hidroginástica',35),(10,2,6,17,16,13,3,'Hidroginástica',35),(11,2,6,17,15,13,3,'Hidroginástica',35),(12,1,6,17,9,21,3,'Hidro 3ª idade',35),(13,2,6,17,10,21,3,'Hidroginástica',35),(14,2,6,17,11,21,3,'Hidroginástica',35),(15,2,6,17,12,21,3,'Hidroginástica',35),(16,1,6,17,18,19,3,'Hidro 3ª idade',35),(17,2,6,17,19,20,3,'Hidroginástica',35),(18,2,6,17,20,13,3,'Hidroginástica',35),(19,2,6,17,21,19,3,'Hidroginástica',35),(20,1,6,17,22,12,3,'Hidro 3ª idade',35),(21,2,6,17,23,11,3,'Hidroginástica',35),(22,2,6,17,24,13,3,'Hidro Inclusiva',35),(23,3,6,17,25,11,3,'Hidro Inclusiva',35),(24,1,6,17,26,21,3,'Hidro 3ª idade',35),(25,2,6,17,27,21,3,'Hidroginástica',35),(26,2,6,17,28,13,3,'Hidroginástica',35),(27,2,6,17,29,21,3,'Hidroginástica',35),(28,4,2,30,30,11,3,'Dança Fitness',25),(29,5,2,30,31,11,3,'Ritmos',25);
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
-- Table structure for table `tb_turmasuser`
--

DROP TABLE IF EXISTS `tb_turmasuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_turmasuser` (
  `iduser` int(11) NOT NULL,
  `idturma` int(11) NOT NULL,
  PRIMARY KEY (`iduser`,`idturma`),
  KEY `fk_turmasuser_users_idx` (`iduser`),
  KEY `fk_turmasuser_users` (`idturma`),
  CONSTRAINT `fk_turmasuser_temporada` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_turmasuser_users` FOREIGN KEY (`idturma`) REFERENCES `tb_turma` (`idturma`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_turmasuser`
--

LOCK TABLES `tb_turmasuser` WRITE;
/*!40000 ALTER TABLE `tb_turmasuser` DISABLE KEYS */;
INSERT INTO `tb_turmasuser` VALUES (12,2),(13,2);
/*!40000 ALTER TABLE `tb_turmasuser` ENABLE KEYS */;
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
  `numinscritos` int(11) DEFAULT 0,
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
INSERT INTO `tb_turmatemporada` VALUES (4,2,0),(4,3,2),(4,4,6),(4,5,4),(4,6,0),(4,7,3),(4,10,3),(4,16,0),(4,23,2),(4,27,12),(4,28,1),(4,29,4),(6,4,6);
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_users`
--

LOCK TABLES `tb_users` WRITE;
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
INSERT INTO `tb_users` VALUES (1,1,'admin','$2y$12$YlooCyNvyTji8bPRcrfNfOKnVMmZA9ViM2A3IpFjmrpIbp5ovNmga',1,0,1,'2017-03-13 06:00:00'),(7,7,'suporte','$2y$12$HFjgUm/mk1RzTy4ZkJaZBe0Mc/BA2hQyoUckvm.lFa6TesjtNpiMe',1,0,1,'2017-03-15 19:10:27'),(11,11,'leco','$2y$12$EZzKcaPQTILaaqm.FLtn0.5Ctq5o7gCw.fl3K7n/LcMIoBTm5ne3K',1,1,1,'2020-09-26 18:00:05'),(12,12,'luma','$2y$12$kLt7L1BRnSaPOulvdwmfFuK5LAXUxop94SY7QAglEbBdJIqpkiseC',1,1,1,'2020-09-26 18:14:38'),(13,13,'lima','$2y$12$V7gprCwFq/VzTRlyjglqcOEvhOMVX69ncIXN4PTBCDgiPl40xu4Zm',1,1,1,'2020-12-01 19:16:29'),(14,14,'laura@email','$2y$12$bQM6Epf8iFE8.9VERPc8IOzieYv2IA0tucMjJYGfddkN5N6oSs9hO',0,0,0,'2020-12-08 00:22:42'),(18,18,'lena@email.com','$2y$12$I0Pv0q1nQpgXY4Wd8oEKz.1CXgwzSMpRVritT.ToDy/MX6uDaNkMS',0,0,1,'2020-12-08 03:24:01'),(19,21,'lino','$2y$12$t4rNDVn8udjS144o78jP6OMpd/p4IhaXSHEQW0ZfdfqX4sqtai/Au',1,1,1,'2020-12-11 23:09:29'),(20,22,'leca','$2y$12$1XMdikOCh1TGKHjcggeZYuAFXqLF78H3mhv3mnpQUo9Gwa10YEI/K',1,1,1,'2020-12-11 23:22:16'),(21,23,'luana','$2y$12$ee/3l3fHjplq4ZNkrSZhZ.GQWBntJGw2/0hKTzrtWX9iEZcTHSU2i',0,0,1,'2020-12-11 23:23:10'),(22,24,'lorena','$2y$12$03DrPxr8vL8XrRAUMSaOhOfc6xgapaz9PQXhz78bPrsra/yjRVaxi',0,0,1,'2021-01-08 03:04:15'),(23,25,'leone','$2y$12$8AzWyVcSZ182r75VG51AOuZC8AG.CHsdek63GmJr0PSvnG9bZCGd2',0,0,1,'2021-01-10 14:44:47'),(24,26,'luca','$2y$12$gki5UCv5F.w6rptsHEHMdOaf/tOgPyxwX9VkOE78EmMvy4FPc0lke',1,1,1,'2021-01-10 14:48:37'),(25,27,'lana','$2y$12$uRglBd5onOVWIHh/9TOYOuBk8Xb/SWoZ4Em7xYjJy/Kv1jKwp4V5K',1,1,1,'2021-01-10 14:56:18'),(26,28,'livia','$2y$12$G43gl2WCU7A4pJ1Y.fEPR.yklegd5iYKR4a3sDJzH/YW2Vfy5cypS',1,1,1,'2021-01-10 14:58:10'),(27,37,'lana@email','$2y$12$7QxiQhVcnOUfCWqiwBpDa.2N1ZMBn4A1wY/YWOiQoETKD6zkiPjjm',0,0,1,'2021-02-02 21:09:40');
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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_userspasswordsrecoveries`
--

LOCK TABLES `tb_userspasswordsrecoveries` WRITE;
/*!40000 ALTER TABLE `tb_userspasswordsrecoveries` DISABLE KEYS */;
INSERT INTO `tb_userspasswordsrecoveries` VALUES (1,7,'127.0.0.1',NULL,'2020-09-26 17:51:34'),(2,7,'127.0.0.1',NULL,'2020-09-26 17:55:31'),(3,7,'127.0.0.1',NULL,'2020-09-26 17:56:49'),(4,11,'127.0.0.1',NULL,'2020-09-26 18:00:41'),(5,11,'127.0.0.1',NULL,'2020-09-26 18:02:27'),(6,11,'127.0.0.1',NULL,'2020-09-26 18:02:56'),(7,11,'127.0.0.1',NULL,'2020-09-26 18:15:06'),(8,11,'127.0.0.1',NULL,'2020-09-26 18:33:48'),(9,11,'127.0.0.1',NULL,'2020-09-26 18:37:19'),(10,11,'127.0.0.1',NULL,'2020-09-26 18:38:19'),(11,11,'127.0.0.1',NULL,'2020-09-26 18:41:52'),(12,11,'127.0.0.1',NULL,'2020-09-26 18:42:54'),(13,11,'127.0.0.1',NULL,'2020-09-26 18:44:06'),(14,11,'127.0.0.1',NULL,'2020-09-26 18:44:17'),(15,11,'127.0.0.1',NULL,'2020-09-26 18:44:56'),(16,11,'127.0.0.1',NULL,'2020-09-26 18:45:17'),(17,11,'127.0.0.1',NULL,'2020-09-26 18:49:06'),(18,11,'127.0.0.1',NULL,'2020-09-26 18:52:47'),(19,11,'127.0.0.1',NULL,'2020-09-26 19:07:34'),(20,11,'127.0.0.1',NULL,'2020-09-26 19:07:41'),(21,11,'127.0.0.1',NULL,'2020-09-26 19:12:15'),(22,11,'127.0.0.1',NULL,'2020-09-26 19:12:39'),(23,11,'127.0.0.1',NULL,'2020-09-26 19:13:45'),(24,11,'127.0.0.1',NULL,'2020-09-26 19:18:34'),(25,11,'127.0.0.1',NULL,'2020-09-26 19:19:53'),(26,11,'127.0.0.1',NULL,'2020-09-26 19:22:18'),(27,11,'127.0.0.1',NULL,'2020-09-26 19:25:36'),(28,11,'127.0.0.1',NULL,'2020-09-26 19:30:10'),(29,11,'127.0.0.1',NULL,'2020-09-26 19:32:34'),(30,11,'127.0.0.1',NULL,'2020-09-26 19:36:44'),(31,11,'127.0.0.1',NULL,'2020-09-26 20:36:15'),(32,11,'127.0.0.1','2020-09-26 19:39:14','2020-09-26 22:02:41'),(33,11,'127.0.0.1','2020-09-26 19:44:36','2020-09-26 22:42:55'),(34,11,'127.0.0.1','2020-12-01 16:51:36','2020-12-01 19:47:34'),(35,11,'127.0.0.1',NULL,'2021-02-02 17:04:56'),(36,11,'127.0.0.1','2021-02-02 14:12:36','2021-02-02 17:08:08'),(37,11,'127.0.0.1',NULL,'2021-02-02 17:19:18'),(38,11,'127.0.0.1',NULL,'2021-02-02 17:23:14');
/*!40000 ALTER TABLE `tb_userspasswordsrecoveries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'db_cursossbc'
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
/*!50003 DROP PROCEDURE IF EXISTS `sp_carts_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
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
pnumsorte INT
)
BEGIN

    IF pidinsc > 0 THEN
        
        UPDATE tb_insc
        SET
			idinscstatus = pidinscstatus,
                  idcart = pidcart,
                 idturma = pidturma,
             idtemporada = pidtemporada,
                numsorte = pnumsorte
            
        WHERE idinsc = pidinsc;
        
    ELSE
        
        INSERT INTO tb_insc (idinscstatus, idcart, idturma, idtemporada, numsorte)
        VALUES(pidinscstatus, pidcart, pidturma, pidtemporada, pnumsorte);
        
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
pnumsus VARCHAR(16),
pvulnsocial INT,
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
		  cadunico = pcadunico,
           nomemae = pnomemae,
            cpfmae = pcpfmae,
		   nomepai = pnomepai,
            cpfpai = pcpfpai,
	  statuspessoa = pstatuspessoa
            
	   WHERE idpess = pidpess;
        
    ELSE
		
		INSERT INTO tb_pessoa (iduser, nomepess, dtnasc, sexo, numcpf, numrg, numsus, vulnsocial, cadunico, nomemae, cpfmae, nomepai, cpfpai, statuspessoa)
        VALUES(piduser, pnomepess, pdtnasc, psexo, pnumcpf, pnumrg, pnumsus, pvulnsocial, pcadunico, pnomemae, pcpfmae, pnomepai, pcpfpai, pstatuspessoa);
        
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
piduser INT, 
pidturmastatus INT, 
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
			 iduser = piduser,
	  idturmastatus = pidturmastatus,
          descturma = pdescturma,
			  vagas = pvagas
            
	   WHERE idturma = pidturma;
        
    ELSE
		
		INSERT INTO tb_turma (idativ, idmodal, idespaco, idhorario, iduser, idturmastatus, descturma, vagas)
        VALUES(pidativ, pidmodal, pidespaco, pidhorario, piduser, pidturmastatus, pdescturma, pvagas);
        
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
    
	INSERT INTO tb_persons (desperson, desemail, nrphone)
    VALUES(pdesperson, pdesemail, pnrphone);
    
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
/*!50003 DROP PROCEDURE IF EXISTS `Verificar_Quantidade_inscritos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Verificar_Quantidade_inscritos`(OUT quantidade INT, pidturma INT)
BEGIN
SELECT COUNT(*) INTO quantidade FROM tb_turmatemporada;
UPDATE tb_turmatemporada SET numinscritos = quantidade WHERE idturma = pidturma;

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

-- Dump completed on 2021-02-05 19:15:58

-- MariaDB dump 10.17  Distrib 10.4.15-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u697494284_awujo
-- ------------------------------------------------------
-- Server version	10.4.15-MariaDB

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
-- Table structure for table `escolaridade`
--

DROP TABLE IF EXISTS `escolaridade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `escolaridade` (
  `idescolaridade` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`idescolaridade`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `escolaridade`
--

/*!40000 ALTER TABLE `escolaridade` DISABLE KEYS */;
INSERT INTO `escolaridade` VALUES (1,'Sem escolaridade'),(2,'Fundamental I'),(3,'Fundamental II'),(4,'Ensino Médio'),(5,'Ensino Superior');
/*!40000 ALTER TABLE `escolaridade` ENABLE KEYS */;

--
-- Table structure for table `nivel`
--

DROP TABLE IF EXISTS `nivel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nivel` (
  `idnivel` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`idnivel`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nivel`
--

/*!40000 ALTER TABLE `nivel` DISABLE KEYS */;
INSERT INTO `nivel` VALUES (1,'Suporte'),(2,'Dirigente'),(3,'Controle Social'),(4,'Coordenador');
/*!40000 ALTER TABLE `nivel` ENABLE KEYS */;

--
-- Table structure for table `raca`
--

DROP TABLE IF EXISTS `raca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `raca` (
  `idraca` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idraca`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `raca`
--

/*!40000 ALTER TABLE `raca` DISABLE KEYS */;
INSERT INTO `raca` VALUES (1,'Negra'),(2,'Branca'),(3,'Parda'),(4,'Indígena'),(5,'Outra não especificada');
/*!40000 ALTER TABLE `raca` ENABLE KEYS */;

--
-- Table structure for table `responsavel`
--

DROP TABLE IF EXISTS `responsavel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `responsavel` (
  `idresponsavel` int(11) NOT NULL AUTO_INCREMENT,
  `nome_responsavel` varchar(120) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nis` varchar(11) DEFAULT NULL,
  `idade` int(2) NOT NULL,
  `raca` int(1) NOT NULL,
  `escolaridade` int(1) NOT NULL,
  `telefone_fixo` varchar(45) DEFAULT '',
  `telefone_movel` varchar(45) DEFAULT '',
  `pessoa_contato` varchar(120) DEFAULT NULL,
  `rua` varchar(120) NOT NULL,
  `numero` int(11) NOT NULL DEFAULT 0,
  `bairro` varchar(45) NOT NULL,
  `criancas_ate_06_anos` int(2) NOT NULL DEFAULT 0,
  `criancas_entre_07_17_anos` int(2) NOT NULL DEFAULT 0,
  `adultos` int(2) NOT NULL DEFAULT 0,
  `idosos` int(2) NOT NULL DEFAULT 0,
  `pessoa_deficiencia` tinyint(4) NOT NULL,
  `tipo_deficiencia` varchar(45) DEFAULT NULL,
  `nome_deficiente` varchar(45) DEFAULT NULL,
  `renda_responsavel` decimal(10,2) NOT NULL DEFAULT 0.00,
  `renda_adultos` decimal(10,2) NOT NULL DEFAULT 0.00,
  `renda_total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `nenhum_programa` tinyint(4) NOT NULL,
  `bolsa_familia` tinyint(4) NOT NULL,
  `bpc` tinyint(4) NOT NULL,
  `aposentadoria` tinyint(4) NOT NULL,
  `pensao` tinyint(4) NOT NULL,
  `beneficio_eventual` tinyint(4) NOT NULL,
  `criado_em` timestamp NULL DEFAULT NULL,
  `atualizado_em` timestamp NULL DEFAULT NULL,
  `responsavel_cadastro` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idresponsavel`),
  KEY `fk_responsavel_raca_idx` (`raca`),
  KEY `fk_responsavel_escolaridade_idx` (`escolaridade`),
  KEY `fk_responsavel_responsavel_cadastro_idx` (`responsavel_cadastro`),
  CONSTRAINT `fk_responsavel_escolaridade` FOREIGN KEY (`escolaridade`) REFERENCES `escolaridade` (`idescolaridade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_responsavel_raca` FOREIGN KEY (`raca`) REFERENCES `raca` (`idraca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_responsavel_responsavel_cadastro` FOREIGN KEY (`responsavel_cadastro`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responsavel`
--

/*!40000 ALTER TABLE `responsavel` DISABLE KEYS */;
INSERT INTO `responsavel` VALUES (1,'Rosineide Leonira Pereira Neves','71075984491','12404366086',46,2,4,'','(83) 98655-4980','','Rua Sargento Pedro Nazaré Rodrigues Machado',322,'Planalto Boa Esperança',0,1,2,0,0,'','',41.00,998.00,1039.00,0,1,0,0,0,0,'2019-03-26 16:45:07',NULL,3,0),(2,'Juliana Laurentino De Medeiros','08132289480','16193758829',31,1,4,'','(83) 98781-1703','','Rua Leonor Pinheiro do Nascimento',733,'Planalto Boa Esperança',1,2,1,0,0,'','',92.00,100.00,192.00,0,1,0,0,0,0,'2019-03-26 16:52:55',NULL,3,1),(3,'Carla Cibele Pedro Da Silva','10674782488','16251481391',27,2,3,'','(83) 99165-4633','','Rua Monte Horebe',0,'Gramame',2,0,1,0,0,'','',191.00,250.00,441.00,0,1,0,0,0,0,'2019-03-26 14:02:03',NULL,3,0),(4,'Eduardo Palmeira De Oliveira','20450168468','12031840837',62,2,3,'(83) 3237-5466','','Luzinete','Rua Santa Filomena',16,'Gramame',0,0,0,1,0,'','',89.00,80.00,169.00,0,1,0,0,0,0,'2019-03-26 14:09:47',NULL,2,1),(5,'Jacinta De Fátima De Alcântara','05618133458','16181733176',60,3,3,'(83) 9845-6054','(83) 99102-0819','','Rua Santa Filomena',158,'60',0,0,4,1,0,'','',998.00,998.00,1996.00,0,0,0,0,1,0,'2019-03-26 14:56:45','2021-03-18 14:22:54',5,1),(6,'Maria José Bispo Dos Santos','91737389487','12458798367',50,1,2,'','(83) 98820-2663','','Rua Santa Filomena',116,'Gramame',0,0,5,0,0,'','',89.00,250.00,339.00,0,1,0,0,0,0,'2019-03-26 14:59:43',NULL,3,1),(7,'Luciana Patricia Marques De Aguiar','10330807480','16481271232',23,3,4,'','(83) 98873-7390','','Rua Joaquim Clementino Pereira',56,'23',0,0,0,0,0,'','',0.00,0.00,0.00,0,1,0,0,0,0,'2019-03-26 15:03:15','2019-04-16 11:09:48',3,0),(8,'Luciano De Aguiar','44317646404','12128185760',54,3,1,'','(83) 98745-1249','','Rua Joaquim Clementino Pereira',58,'Valentina de Figueiredo',1,0,2,0,0,'','',0.00,840.00,840.00,0,1,0,0,0,0,'2019-03-26 15:08:19',NULL,3,0),(9,'Luzia Maria Da Conceição','91047560453','20117153200',61,3,1,'','(83) 98827-5712','','Rua Aracajú',0,'Planalto Boa Esperança',0,1,3,1,0,'','',89.00,1500.00,1589.00,0,1,0,0,0,0,'2019-03-26 16:02:09',NULL,3,0),(10,'Maria Da Penha Dos Santos','03272594426','16485574604',64,1,1,'','(83) 98820-2935','','Rua Hermenegildo Francisco da Cruz',120,'Planalto Boa Esperança',1,0,2,0,0,'','',0.00,0.00,0.00,0,1,0,0,0,0,'2019-03-26 16:31:10',NULL,3,1),(11,'Luciene Barbosa De Sousa','07276852440','16524578520',38,2,3,'','(83) 98712-0909','','Rua Leonor Pinheiro do Nascimento',131,'Planalto Boa Esperança',1,1,2,0,0,'','',0.00,60.00,60.00,0,1,0,0,0,0,'2019-03-26 16:34:19',NULL,3,0),(12,'Josefa Alessandra Silva Dos Santos','88590372472','20983810405',48,3,3,'','(83) 99955-7270','','Avenida Fortaleza',139,'Planalto Boa Esperança',0,0,0,0,0,'','',130.00,0.00,130.00,0,1,0,0,0,0,'2019-03-27 15:08:47',NULL,3,1),(13,'Zuleide De Souza Queiroz','67550061491','20693357724',65,3,3,'','(83) 98895-8909','','Rua Santa Filomena',66,'Gramame',2,0,3,1,0,'','',998.00,0.00,998.00,0,0,0,0,1,0,'2019-04-01 14:23:47',NULL,2,0),(14,'Maria De Lourdes De Souza Da Silva','07497763407','16417260586',52,1,1,'','(83) 98709-2099','','Rua Tenente Horácio Salustiano da Costa',115,'Gramame',0,0,5,0,0,'','',998.00,400.00,1398.00,0,0,0,0,1,0,'2019-04-01 14:38:14',NULL,2,0),(15,'Maria Veronica De Oliveira','46535772349','16523900666',48,3,2,'','(83) 98894-4520','','Rua Venancio Ferreira Ramalho',31,'Planalto Boa Esperança',0,1,2,0,0,'','',998.00,500.00,1498.00,0,0,1,0,0,0,'2019-04-01 14:49:45',NULL,2,0),(16,'Marcela Vieira Do Nascimento','09789501439','16370585832',28,1,3,'','(83) 98737-7791','','Evaldo Trajano',0,'Valentina',2,1,2,0,0,'','',212.00,998.00,1210.00,0,1,0,0,0,0,'2019-04-01 15:06:56',NULL,2,1),(17,'Maria Aparecida Soares Da Cunha','07464964438','20435233755',38,1,4,'(83) 3237-4102','','','Rua São Luiz',0,'Planalto Boa Esperança',2,0,4,2,0,'','',82.00,1996.00,2078.00,0,1,0,1,0,0,'2019-04-01 15:15:42',NULL,2,1),(18,'Maria Aparecida','57646635472','16453493870',55,3,4,'(83) 3237-6166','','','Rua Venâncio Ferreira Ramalho',131,'Planalto Boa Esperança',0,1,2,1,0,'','',100.00,998.00,1098.00,0,0,0,1,0,0,'2019-04-01 15:27:28',NULL,2,1),(19,'Maria Daguia','02791263446','20159396098',56,3,2,'(83) 3237-6166','','','Rua Venâncio Ferreira Ramalho',76,'Planalto Boa Esperança',0,0,3,0,0,'','',139.00,100.00,239.00,0,1,0,0,0,0,'2019-04-01 15:40:27',NULL,2,1),(20,'Maria Francisca De Lima Monteiro','05890009427','20117609042',54,2,2,'','','','Av. Fortaleza',0,'Planalto Boa Esperança',0,0,4,0,0,'','',221.00,300.00,800.00,0,1,0,0,0,0,'2019-04-01 15:53:01',NULL,2,1),(21,'Valdiza Viana De Carvalho','03338891423','16545338405',45,1,1,'','(83) 98871-5226','','Rua Gumercindo Leite Sobrinho',490,'45',0,2,2,0,0,'','',650.00,0.00,650.00,0,1,0,0,0,0,'2019-04-02 09:25:17','2021-03-22 18:03:02',5,1),(22,'Ana Paula Santiago De Lima Ferreira','05537869462','20397222151',43,3,4,'','(83) 98810-3223','','Rua Santa Filomena',226,'Gramame',0,0,3,1,0,'','',0.00,998.00,998.00,0,0,0,1,0,0,'2019-04-04 11:54:31',NULL,2,0),(23,'Josefa Maria Alves Da Silva','04440831460','12790098443',35,1,5,'','(83) 98820-2663','','Rua Sebastião Vilar de Azevedo',122,'Planalto Boa Esperança',0,1,2,0,1,'Transtorno Bipolar','Aline da Silva Santos Farias',500.00,200.00,700.00,0,0,0,0,0,1,'2019-04-04 12:03:20','2021-03-17 13:38:08',5,1),(24,'Dayane Cibely Leopoldino','10982368402','16122871088',24,2,3,'','(83) 98604-6980','','Rua José Rosino do Nascimento',280,'Valentina de Figueiredo',1,0,2,0,0,'','',180.00,200.00,380.00,0,1,0,0,0,0,'2019-04-04 12:08:38',NULL,2,0),(25,'Maria Helena Do Nascimento Prudêncio','07321731405','20117602471',56,3,2,'','(83) 98604-8278','','Rua Professora Dulce Guedes Gondim',0,'Planalto Boa Esperança',1,0,2,0,0,'','',300.00,0.00,300.00,0,1,0,0,0,0,'2019-04-04 15:42:17',NULL,2,1),(26,'Rosineide Pinto Dos Santos','69049696449','12327112739',52,1,1,'','(83) 98776-9749','','Rua Agricultora Maria Gomes Pereira',144,'Planalto Boa Esperança',0,0,3,0,0,'','',1214.81,0.00,1214.81,0,0,0,0,0,0,'2019-04-04 15:49:58',NULL,2,1),(27,'Maria Paulino Dos Santos Ascendino','00014282410','23817241328',81,1,1,'','(83) 98604-8278','Jaqueline - vizinha','Rua Professora Dulce Guedes Gondim',0,'Planalto Boa Esperança',1,2,2,1,0,'','',998.00,0.00,998.00,0,0,0,0,1,0,'2019-04-04 16:10:50',NULL,2,0),(28,'Maria Cristina De Oliveira Silva','43796303404','12581771447',59,2,2,'(83) 9390-1506','(83) 99350-8932','','Rua Tenente Horácio Salustiano da Costa',65,'59',0,0,1,0,0,'','',0.00,300.00,300.00,0,1,0,0,0,0,'2019-04-05 12:30:04','2021-03-18 11:50:56',5,1),(29,'Maria Da Guia Cipriano Da Silva','46851526468','16391631132',53,1,4,'','(83) 98765-4955','','Rua Maria de Lourdes Silva',7,'Gramame',1,0,3,0,0,'','',0.00,890.00,890.00,0,1,0,0,1,0,'2019-04-05 12:33:43',NULL,2,1),(30,'Gilvaneide De Oliveira Limeira','01803800445','22020416920',26,3,4,'','(83) 99849-5691','','Rua Embargador Sergio Vieira de Melo',25,'Gramame',1,0,2,0,0,'','',130.00,400.00,530.00,0,1,0,0,0,0,'2019-04-08 09:17:40',NULL,2,0),(31,'','03109486490','12656194441',40,2,4,'','(83) 98773-1798','','Rua São Luiz',271,'Planalto Boa Esperança',0,1,1,0,0,'','',998.00,0.00,998.00,0,1,0,0,0,0,'2019-04-08 09:27:14','2021-03-16 10:39:32',5,1),(32,'Genival Cassimiro','15420990482','70059647651',70,1,4,'','(83) 98609-7010','','Rua Agricultora Maria Gomes Pereira',0,'70',0,0,5,2,0,'','',998.00,998.00,1996.00,1,0,0,0,0,0,'2019-04-08 09:53:21','2019-04-17 08:30:33',3,1),(33,'Marilene Felipe De Brito','03572408474','16503921331',38,2,3,'','(83) 98626-5770','','Av Belo Horizonte',0,'Planalto Boa Esperança',0,2,2,0,0,'','',998.00,0.00,998.00,0,0,1,0,0,0,'2019-04-08 10:34:40',NULL,3,0),(34,'Maria José De Araújo Da Silva','05916083408','20347351578',50,4,2,'','(83) 99616-3096','','Av Goiana',208,'Planalto Boa Esperança',1,0,1,0,0,'','',0.00,998.00,998.00,1,0,0,0,0,0,'2019-04-08 10:41:18',NULL,3,0),(35,'Fabiana De Araújo Rodrigues','11724114190','20619399877',23,3,3,'','(83) 98847-1936','','Rua Leonor Pinheiro do Nascimento',170,'23',1,0,2,0,0,'','',130.00,1000.00,1130.00,0,1,0,0,0,0,'2019-04-08 10:43:19','2021-03-17 13:52:52',5,1),(36,'Francisca Targino Garcia Da Silva','21993378472','17014071287',74,2,2,'','(83) 98837-5627','','Rua Professora Eunilde Caldas Tavares',0,'Planalto Boa Esperança',0,0,1,2,0,'','',998.00,998.00,1996.00,0,0,0,1,0,0,'2019-04-08 10:47:33',NULL,3,0),(37,'Edileuza Chagas Dos Santos','71470212404','16020889794',51,3,2,'','(83) 98613-1476','','Rua Santa Filomena',266,'51',0,1,2,0,0,'','',0.00,750.00,750.00,1,0,0,0,0,0,'2019-04-08 10:50:29','2019-05-04 09:07:05',1,1),(38,'Elineusa Da Silva','98011650491','20111715323',45,3,2,'','(83) 98629-8986','','Rua Airton Pereira de Morais',0,'45',1,0,2,0,0,'','',130.00,998.00,1128.00,0,1,1,0,0,0,'2019-04-08 10:52:39','2019-06-28 09:40:11',1,1),(39,'Maria Betânia Ramos','07015802406','20400222854',39,1,4,'','(83) 98736-6321','','Rua Airton Pereira de Morais',0,'39',0,0,1,0,0,'','',0.00,0.00,0.00,1,0,0,0,0,0,'2019-04-08 10:54:38','2019-05-21 13:58:19',2,0),(40,'Maria Das Graças Araújo Farias','04478501483','16359826233',51,2,2,'','(83) 99120-0320','','Av Goiana',208,'Planalto Boa Esperança',0,0,4,0,0,'','',85.00,0.00,85.00,0,1,0,0,0,0,'2019-04-08 10:59:45',NULL,3,0),(41,'Maria De Fatima Cassimiro De Albuquerque','73535176700','',60,1,2,'','(83) 98609-7010','','Rua Agricultora Maria Gomes Pereira',0,'Valentina de Figueiredo',2,1,3,3,0,'','',300.00,1998.00,2298.00,1,0,0,0,0,0,'2019-04-08 11:08:21',NULL,2,1),(42,'Emanuela Morais Ribeiro','01401038484','16021607490',30,1,1,'','(83) 98704-3740','','Rua Santa Filomena',225,'Gramame',1,1,2,0,0,'','',300.00,1000.00,1300.00,0,1,0,0,0,0,'2019-04-09 09:08:01',NULL,3,1),(43,'Bernadete Mendes Rodrigues','01077863462','16014948466',49,1,3,'','(83) 98853-8441','','Rua Alcina dos Santos Araujo',165,'Gramame',2,0,3,0,0,'','',998.00,100.00,1098.00,0,0,1,0,0,0,'2019-04-09 09:30:23',NULL,3,0),(44,'Edna Ferreira Dos Santos','03341061410','16020453546',48,2,4,'','(83) 98737-2008','','Rua Leonor Pinheiro do Nascimento',123,'48',0,1,2,0,0,'','',130.00,998.00,1128.00,0,1,0,0,0,0,'2019-04-09 09:45:54','2019-12-09 12:16:36',5,1),(45,'Iolanda Nunes Da Silva','02365373429','12533019013',44,1,3,'','(83) 98608-7013','','Rua Agricultora Maria Gomes Pereira',138,'44',1,0,2,0,0,'','',998.00,0.00,998.00,1,0,0,0,0,0,'2019-04-09 09:58:32','2019-09-18 10:38:06',5,0),(46,'Juliana Do Nascimento','71411022483','14375152490',24,2,2,'','(83) 98733-9348','','Rua Francinaldo Delfino da Silva',100,'Gramame',2,0,2,0,0,'','',280.00,250.00,530.00,0,1,0,0,0,0,'2019-04-09 10:03:28','2021-03-22 11:01:20',5,1),(47,'Andressa Tereza Paulina Pedro Alves','70521517400','21010403992',20,3,2,'','(83) 99650-8355','','Rua Monte Horebe',151,'20',2,0,3,0,0,'','',450.00,200.00,650.00,0,1,0,0,1,0,'2019-04-09 10:15:28','2021-03-16 11:55:55',5,1),(48,'Eligleuma Silva Bezerra','70894244485','20316292782',21,1,4,'','(83) 98770-4884','','Av Belo Horizonte',73,'Planalto Boa Esperança',6,0,4,0,0,'','',170.00,0.00,170.00,0,1,0,0,0,0,'2019-04-15 09:55:41',NULL,3,1),(49,'Marlene Alves De Sousa Batista','95110011400','16364975497',51,3,3,'','(83) 98860-7014','','Rua Sebastiana Santina de Araujo Ferreira',164,'Planalto Boa Esperança',0,1,1,0,0,'','',1116.00,0.00,1116.00,0,0,0,0,1,0,'2019-04-15 10:46:20',NULL,3,1),(50,'Maria Das Graças De Freitas Pinheiro','42386110478','12442243956',57,3,3,'','(83) 98665-1418','','Av Recife',386,'56',0,0,1,0,0,'','',600.00,0.00,600.00,0,1,0,0,0,0,'2019-04-16 09:03:32','2019-08-23 10:02:25',5,1),(51,'Maria Dilma Martins','08593829406','16488850327',33,1,1,'','(83) 98787-4765','','Rua Doutor Edmilson Cunha',0,'Planalto Boa Esperança',0,2,2,0,0,'','',218.00,1031.50,1249.50,0,1,0,0,0,0,'2019-04-16 09:05:46',NULL,3,0),(52,'Maria Das Graças Da Silva','04629156461','20397584320',40,3,2,'','(83) 98872-6909','','Rua Comerciante Álvaro Antero Nascimento',283,'Gramame',0,1,3,0,0,'','',200.00,300.00,500.00,0,1,0,0,0,0,'2019-04-16 09:07:36',NULL,3,1),(53,'Maria Gorete','34376225920','17061463374',60,4,5,'','(83) 98878-4190','','Rua Venancio Ferreira Ramalho',86,'Planalto Boa Esperança',1,0,1,1,0,'','',998.00,0.00,998.00,1,0,0,0,0,0,'2019-04-16 09:10:01',NULL,3,0),(54,'Maria De Lourdes De Oliveira','08639267464','16370001822',32,3,2,'','(83) 98655-9893','','Av Recife',101,'Planalto Boa Esperança',0,2,5,0,0,'','',132.00,998.00,1130.00,0,1,0,1,0,0,'2019-04-16 09:12:31',NULL,3,0),(55,'Maria Zuleide Faustino','05033877461','14560233138',51,2,1,'','(83) 98644-3182','','Rua Manoel Henrique dos Santos',0,'Planalto Boa Esperança',1,0,4,0,0,'','',100.00,460.00,560.00,0,0,0,0,0,1,'2019-04-16 09:15:25',NULL,3,0),(56,'Nazarete Mota Dos Santos','04518628489','20683957834',53,2,2,'','(83) 98793-7661','','Av Recife',501,'Planalto Boa Esperança',0,1,2,0,0,'','',380.00,380.00,760.00,0,1,0,0,0,0,'2019-04-16 09:17:45',NULL,3,1),(57,'Rubinete Rodrigues De Oliveira','01096781417','12736434460',38,1,4,'','(83) 98875-5467','','Rua Luiz Dias Nôvo',71,'38',1,0,1,0,0,'','',130.00,300.00,430.00,0,1,0,0,1,0,'2019-04-16 09:19:57','2019-09-18 10:40:17',5,0),(58,'Thaís Carneiro Da Silva','10591946432','20104524337',24,3,3,'','(83) 98661-5890','','Rua Wiviane de Matos Pontes de Freitas',102,'24',1,0,2,0,0,'','',400.00,500.00,900.00,0,1,0,0,0,0,'2019-04-16 09:21:57','2019-04-16 09:22:20',3,1),(59,'Vera Lúcia Da Silva','01679885499','16602693531',32,1,2,'(83) 9887-2631','','','Avenida Natal',4,'Planalto Boa Esperança',1,4,2,0,0,'','',253.00,998.00,1251.00,0,1,0,0,0,0,'2019-04-16 09:24:46',NULL,3,1),(60,'Maria José Santos De Sá','27898300459','16516944297',69,3,4,'','(83) 98714-2954','','Rua Operário Ornilo da Costa Lisboa',254,'Planalto Boa Esperança',0,1,6,0,0,'','',998.00,0.00,998.00,0,0,0,1,0,0,'2019-04-16 09:34:47',NULL,3,0),(61,'Maria Da Penha De Lima','01876350413','12517975991',56,1,3,'','(83) 99917-1004','','Rua Venâncio Ferreira Ramalho',46,'Planalto Boa Esperança',0,0,1,0,0,'','',0.00,998.00,998.00,1,0,0,0,0,0,'2019-04-16 10:41:08','2021-03-22 18:39:35',5,1),(62,'Maria José De Lima','02783724499','12003707443',40,1,3,'','(83) 99608-6108','','Rua Venâncio Ferreira Ramalho',0,'Planalto Boa Esperança',0,1,1,0,0,'','',170.00,0.00,170.00,0,1,0,0,0,0,'2019-04-16 13:46:47',NULL,3,0),(63,'Josivânia Da Silva Moreira','08854627429','',27,3,4,'','(83) 98837-2554','','Avenida Goiânia',135,'Planalto Boa Esperança',1,0,2,0,0,'','',0.00,998.00,998.00,1,0,0,0,0,0,'2019-04-18 09:43:44',NULL,3,0),(64,'José Rilberson Nunes De França','70039987426','23772949653',23,1,4,'','(83) 98708-4209','Rilberson (Rhillary) ','Rua Joana Maria da Silva',232,'Gramame',0,0,1,0,0,'','',150.00,0.00,150.00,0,1,0,0,0,0,'2019-04-18 16:15:48',NULL,2,0),(65,'Marcela Da Cruz Nascimento','11572114452','21010086970',23,3,3,'','(83) 98639-1807','Marcela ','Rua Joana Maria da Silva',232,'Gramame',2,3,2,0,0,'','',490.00,185.00,675.00,0,1,0,0,0,0,'2019-04-18 16:25:05',NULL,2,0),(66,'Joceane Andrade Silva','07536081464','16248575852',36,3,2,'','(83) 98819-7827','','Rua Gumercindo Leite Sobrinho',367,'Planalto Boa Esperança',1,3,2,1,0,'','',700.00,0.00,700.00,0,1,0,0,0,0,'2019-04-23 09:40:39',NULL,3,0),(67,'Cristhyanne Elly Da Silva Barros Ferreira','70308041470','15673931275',23,3,4,'','(83) 98858-2298','','Rua Francinaldo Delfino da Silva',162,'Gramame',1,0,8,1,0,'','',130.00,450.00,580.00,0,1,0,0,0,0,'2019-04-23 09:46:59',NULL,3,0),(68,'Luciene Gomes Freire','51849879400','12311457774',52,4,4,'','(83) 98732-9651','','Rua Luiz Gonzaga de Oliveira',89,'Valentina de Figueiredo',0,0,1,0,0,'','',120.00,0.00,120.00,0,1,0,0,0,0,'2019-04-26 08:43:30',NULL,3,0),(69,'Eunice Da Silva Brito','20359241468','10762000926',62,4,3,'','(83) 98855-5447','','Rua Edgar Alfredo da Silva',189,'62',0,0,1,0,0,'','',0.00,0.00,0.00,1,0,0,0,0,0,'2019-04-29 09:39:59','2019-04-29 09:48:54',3,0),(70,'Buena Lowry Da Silva Santos','01266827471','12689979443',36,3,4,'','(83) 98855-5447','','Rua Padre João Félix de Medeiros',128,'Valentina de Figueiredo',1,1,1,0,0,'','',209.00,998.00,1207.00,0,1,0,0,0,0,'2019-04-29 09:52:51',NULL,3,0),(71,'Adriana Augusto Da Silva','09797456404','21264855089',38,3,2,'','(83) 99934-3552','Nazareth','Av Belo Horizonte',501,'38',1,1,1,0,0,'','',117.00,180.00,297.00,0,1,0,0,0,0,'2019-05-06 10:19:03','2019-11-22 14:14:18',5,0),(72,'Lucicléa De Souza De Lima','09223513413','16489815703',35,2,1,'','(83) 98781-1703','Juliana Laurentino','Rua Antonio Paulino Pereira',0,'Valentina ',0,1,1,0,0,'','',321.00,0.00,321.00,0,1,0,0,0,0,'2019-05-09 11:16:48',NULL,5,0),(73,'Elsani Venâncio Da Silva Oliveira','02678323453','21217532597',45,3,2,'','(83) 98761-7704','','Rua Manoel Henriques dos Santos',87,'Planalto Boa Esperança',0,1,0,0,0,'','',139.00,0.00,139.00,0,1,0,0,0,0,'2019-05-13 09:13:14',NULL,3,0),(74,'Adriana Araujo De Farias','11313942405','23628306366',26,1,1,'','(83) 99638-4131','','Avenida Fortaleza',192,'Planalto Boa Esperança',1,0,1,0,0,'','',150.00,1000.00,1150.00,0,1,0,0,0,0,'2019-05-13 09:28:57',NULL,3,0),(75,'Elidiana Soares Da Silva','03486550454','21231706742',41,3,5,'','(83) 98847-9586','','Rua Doutor Valdevino Gregório de Andrade',645,'Valentina de Figueiredo',1,1,1,0,0,'','',241.00,0.00,241.00,0,1,0,0,0,0,'2019-05-21 09:25:09',NULL,3,0),(76,'Maria De Lourdes Ramos Da Silva','91473098300','16389037695',38,3,3,'','(83) 98851-8407','','Rua Doméstica Alcina dos Santos Araujo',176,'Valentina',1,1,2,0,0,'','',170.00,948.00,1118.00,0,1,0,0,0,0,'2019-05-21 10:08:23',NULL,3,0),(77,'Eliete Fernandes Da Silva Dos Santos','06657240426','11692367832',34,3,3,'','(83) 98612-9198','','Rua Belém',700,'34',0,1,0,0,0,'','',220.00,0.00,220.00,0,1,0,0,0,0,'2019-06-28 09:39:40','2019-07-03 11:35:12',5,0),(78,'Irene Bandeira Silva','02227031484','23805784437',64,3,2,'','(83) 99839-6336','','rua embaixador sergio vieira de melo',159,'64',0,0,1,1,0,'','',0.00,998.00,998.00,0,0,0,1,0,0,'2019-07-10 14:57:38','2020-08-28 15:25:52',5,1),(79,'Erlane Vilela Andrade De Lima','03159603458','12753327442',40,3,4,'','(83) 99869-2797','','Rua Adalberto Pereira de Melo',74,'Valentina de Figueiredo',0,1,0,2,1,'deficiência na perna','Milton Florencio de Lima',0.00,1996.00,1996.00,0,0,0,1,0,0,'2019-07-10 15:48:19',NULL,5,0),(80,'Iêda Galdino Da Rocha','45091986472','',60,1,1,'','(83) 98877-7196','Adriana Galdino ','Rua Evaldo Trajano',102,'Planalto Boa Esperança',0,0,4,1,0,'','',900.00,130.00,1030.00,0,0,0,0,1,0,'2019-07-11 10:51:03',NULL,3,0),(81,'Alessandra Galdino Do Nascimento','06586779421','20683957117',36,1,2,'','(83) 98628-2164','Alessandra','Rua São Luiz',0,'Planalto Boa Esperança',1,3,2,0,0,'','',495.00,447.00,942.00,0,1,0,0,0,0,'2019-07-11 11:01:25',NULL,3,0),(82,'Maria Rosinete Do Nascimento','56855605400','12715551446',51,1,1,'','(83) 98899-7653','','Avenida Fortaleza',0,'51',0,0,3,0,0,'','',998.00,998.00,1996.00,1,0,0,0,0,0,'2019-07-12 14:56:12','2019-07-12 14:57:59',2,0),(83,'Shayene Daura Assis Da Silva','11320751490','23726265577',22,3,3,'','(83) 98645-2640','','Rua João Batista Teixeira de Carvalho',0,'Valentina',2,0,2,0,0,'','',180.00,0.00,180.00,0,1,0,0,0,0,'2019-07-12 15:06:16',NULL,2,0),(84,'Luciene Ferreira De Lima','73881791434','14800037278',58,3,2,'','(83) 98773-2172','','Rua Francisco Bento',121,'Gramame',0,0,0,1,0,'','',0.00,0.00,0.00,0,0,0,0,0,0,'2019-07-25 09:57:28',NULL,5,1),(85,'Ana Paula Chagas Coutinho','05532572429','',35,2,1,'','(83) 98668-5977','','Rua Ana Leal Ramos',44,'35',1,1,1,0,0,'','',900.00,0.00,900.00,1,0,0,0,0,0,'2019-07-25 13:40:46','2019-07-25 13:44:08',5,0),(86,'Maria De Fatima','01499047460','18429159915',38,3,2,'','(83) 98704-3634','','rua cuiabá',7,'38',1,1,0,0,0,'','',338.00,0.00,338.00,0,1,0,0,0,0,'2019-07-25 14:33:02','2019-12-09 11:44:07',5,1),(87,'Priscilla  Fernandes Da Nobrega','09360201480','20201004903',29,3,3,'','(83) 98802-3761','','RUA VENANCIO FERREIRA RAMALHO',61,'29',0,1,1,0,0,'','',212.00,0.00,212.00,0,1,0,0,0,0,'2019-07-29 10:20:31','2019-07-29 10:21:23',5,1),(88,'Janaina Muniz Da Silva','01083138405','12636208447',43,3,4,'','(83) 98813-5534','','Avenida Goiânia',610,'43',0,2,1,0,0,'','',200.00,1100.00,1300.00,1,0,0,0,0,0,'2019-08-23 14:51:55','2019-10-27 11:19:27',5,0),(89,'Jose Carlos Da Silva','02815268470','16308608158',31,2,2,'','(83) 98772-5234','','av belo horizonte',0,'31',0,1,1,0,0,'','',500.00,0.00,500.00,1,0,0,0,0,0,'2019-08-23 15:29:43','2020-04-14 16:31:34',5,1),(90,'Camila Nunes Dias','11072864410','16207982003',27,3,4,'','(83) 98611-1346','','Rua Risoldo Ferreira de Lima Rizzo',79,'Planalto Boa Esperança',2,0,1,0,0,'','',170.00,0.00,170.00,0,1,0,0,0,0,'2019-09-20 10:01:13',NULL,5,0),(91,'Larissa Ellen Fernandes Santiago','06101260402','19045114227',25,1,3,'','(83) 98843-9578','','Rua Operário Ornilo da Costa Lisboa',0,'25',2,0,1,0,0,'','',400.00,0.00,400.00,1,0,0,0,0,0,'2019-09-25 09:28:40','2021-03-22 11:06:57',5,1),(92,'Cristiane Massau Bispo','08078596480','16360470323',32,3,3,'','(83) 98795-4527','','Rua Gutemberg Mendonça Albuquerque',295,'Valentina de Figueiredo',1,3,1,1,0,'','',535.00,0.00,535.00,0,1,0,0,0,0,'2019-09-25 09:52:31','2021-03-16 11:55:08',5,1),(93,'Maria Das Neves Bezerra Dos Santos','13269500459','12182508947',65,2,4,'','(83) 99966-177','Kathleen Cris','Rua Venâncio Ferreira Ramalho',108,'Planalto Boa Esperança',3,0,1,1,0,'','',1088.00,250.00,1338.00,0,1,0,1,0,0,'2019-09-25 10:44:13',NULL,5,0),(94,'José Carlos Ferreira Sobrinho','19477956864','',41,3,5,'(00) 0000-0000','(83) 99854-4689','Daniele','Rua Gumercindo Leite Sobrinho',410,'41',0,3,2,0,0,'','',1800.00,2850.00,4650.00,1,0,0,0,0,0,'2019-10-15 10:57:49','2019-10-24 10:21:21',2,1),(95,'Regivaldo Dos Santos','82219281434','',49,1,1,'','(83) 99694-6607','Mayre','Av. Natal ',39,'Planalto Boa Esperança',0,1,2,0,1,'Paraplégico','Regivaldo dos Santos',998.00,0.00,998.00,0,0,0,1,0,0,'2019-10-24 11:40:47',NULL,2,0),(96,'Gabrielly Caroline Marinho O Maci','10965309452','21291630653',21,1,4,'','(83) 98672-1264','','Rua João Alves Cordeiro',35,'Valentina de Figueiredo',1,0,1,0,0,'','',156.00,0.00,156.00,0,1,0,0,0,0,'2019-11-06 14:36:52','2021-03-18 12:42:15',5,1),(97,'Maria Auxiliadora Da Silva','33848599449','12291040717',57,1,1,'','(83) 98838-3961','','Rua Aposentado Manoel Justino de Lima',128,'Gramame',0,0,1,0,0,'','',90.00,0.00,90.00,0,1,0,0,0,0,'2020-02-07 09:24:58',NULL,5,1),(98,'Jakeline Victor Da Silva','11810563496','20330289912',25,1,1,'','(83) 98686-1622','','Rua Sebastião Vilar de Azevedo',119,'Planalto Boa Esperança',1,0,2,0,0,'','',172.00,1045.00,1217.00,0,1,0,0,0,0,'2020-02-07 10:39:39',NULL,5,0),(99,'Ana Caroline Evangelista Pereira','70136161413','23761416896',24,2,4,'','(83) 98638-0030','','Rua Rosalva Nepomuceno do Nascimento',0,'Planalto Boa Esperança',3,0,1,0,0,'','',269.00,0.00,269.00,0,1,0,0,0,0,'2020-02-07 11:06:18','2021-03-16 10:55:21',5,1),(100,'Josefa Gouveia Barbosa','38013681491','16332577836',87,1,1,'','(83) 99125-5001','','Avenida Fortaleza',201,'87',0,1,1,1,0,'','',1000.00,0.00,1000.00,0,0,0,0,1,0,'2020-02-27 14:22:41','2021-03-19 18:45:32',5,1),(101,'Ana De Fatima Mendonça Dos Santos','69049424449','12715752441',51,1,1,'','(83) 98805-4204','','Rua Leonor Pinheiro do Nascimento',0,'51',0,1,2,0,0,'','',1039.00,123.00,1162.00,0,1,0,0,0,0,'2020-03-04 15:21:01','2020-03-17 11:07:50',5,1),(102,'Berenice De Farias Freire','01110478461','21255105501',42,3,4,'','(83) 98767-3981','','Avenida Fortaleza',192,'Planalto Boa Esperança',0,1,1,0,0,'','',0.00,0.00,0.00,1,0,0,0,0,0,'2020-03-17 09:31:38',NULL,5,1),(103,'Maria Gorete Dos Santos','89307887420','20690007241',50,1,1,'','(83) 98647-6899','','rua manoel henrique dos santos',0,'valentina',1,2,1,0,0,'','',998.00,0.00,998.00,0,1,0,0,0,0,'2020-08-28 11:07:23',NULL,5,1),(104,'CINTHIA BARBOSA ARAUJO','71400163480','21032675316',20,1,1,'','','','Rua Jornalista Antonio Barreto Neto',0,'Planalto Boa Esperança',2,0,1,0,0,'','',0.00,0.00,0.00,1,0,0,0,0,0,'2021-03-22 12:09:18',NULL,5,1),(105,'Kathleen Cris Farias Araujo','11907958410','20480321552',24,1,1,'','(83) 99996-6177','','Rua Venâncio Ferreira Ramalho',108,'Planalto Boa Esperança',3,0,0,2,0,'','',0.00,200.00,200.00,0,1,0,0,0,0,'2021-03-23 10:34:09',NULL,5,1),(106,'ANA TEREZA MARCOLINO BRAGA','12681643440','12681643440',42,1,4,'','','','Avenida Santa Bárbara',42,'Jardim Cidade Universitária',0,5,3,0,0,'','',1100.00,0.00,1100.00,1,0,0,0,0,0,'2021-03-23 10:35:58',NULL,5,1),(107,'Edna Santos Da Silva','07322058402','21010276117',37,1,1,'','(83) 98889-8753','','Avenida Belo Horizonte',687,'Planalto Boa Esperança',0,1,0,0,0,'','',1100.00,0.00,1100.00,1,0,0,0,0,0,'2021-03-23 11:34:22',NULL,5,1),(108,'Katia Liz Alves Da Silva','97796808453','16482037209',44,3,1,'','(83) 99163-1827','','Rua João Alves Cordeiro',35,'Valentina de Figueiredo',0,1,1,0,0,'','',150.00,0.00,15.00,1,0,0,0,0,0,'2021-03-23 11:38:02',NULL,5,1);
/*!40000 ALTER TABLE `responsavel` ENABLE KEYS */;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome_completo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passwd` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `ultimo_login` timestamp NULL DEFAULT NULL,
  `token` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idusuario`,`email`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `nome_completo_UNIQUE` (`nome_completo`),
  KEY `fk_usuario_nivel_idx` (`nivel`),
  CONSTRAINT `fk_usuario_nivel` FOREIGN KEY (`nivel`) REFERENCES `nivel` (`idnivel`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'awujo@cciao.org','Suporte','b49228b8fa98840355de71ec58f2d714',1,'2021-03-09 10:56:15','da39a3ee5e6b4b0d3255bfef95601890afd80709'),(2,'josyalves.contato@gmail.com','Josy Alves','920f438aebb2c9c35f134cb5e81ff9c9',3,'2019-11-08 12:38:10','9bd8813025b8986506c129c05aa9e295bbb20682'),(3,'renato.bonfim.jr@cciao.org','Renato Bonfim Jr.','cb4de320c69acc50965e3720cccc2097',2,'2021-03-09 15:47:43','2ed248ab10c44d85d7fbbc9fa39f8531e9b04910'),(4,'belatuca@hotmail.com','Mãe Tuca','d707cba35a3abadc55f5e32dac6df5fa',2,'2019-04-16 09:42:12','e28f2e7cdb796eba6fa3cbabdc41f0398a82f26c'),(5,'rany_ae@hotmail.com','Ranyellen Felix de Souza','aec5d023e3db0e7572811a9077ab62eb',2,'2021-03-24 09:20:54','dd5721efda734276baa9bc6d8c506ad21b70fd40');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

--
-- Dumping routines for database 'u697494284_awujo'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-24 22:01:18

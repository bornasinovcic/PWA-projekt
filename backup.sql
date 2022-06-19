-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: projekt
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `prezime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `korisnicko_ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `lozinka` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `razina` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `korisnik`
--

LOCK TABLES `korisnik` WRITE;
/*!40000 ALTER TABLE `korisnik` DISABLE KEYS */;
INSERT INTO `korisnik` VALUES (1,'ztr','ztr','ztr','$2y$10$TUpe..ao7yfNCJOjnIb2Wu10ZeFRJXIxDGqJt93t1pUiIOlqPvWD6',1),(2,'hgf','hgf','hgf','$2y$10$zrk8qQdmR05eN5m1rGe/c.PdiOYG0Hle19Le2uN7psxs7DAvA9Dt.',0),(3,'nbv','nbv','nbv','$2y$10$CjzPALEdyWtskhsiNVphD.8XRTJWNbTxFBCNlOe3KTbnyQABCfni2',1),(4,'rew','rew','rew','$2y$10$d7c8PNYyPRjn.eFuv.pto.m44buWkCnNex0g4KwIqNgdRx76o48ki',0),(5,'fds','fds','fds','$2y$10$nM5ZWoCGm0bUyPGVUfph6uLZINjMYlBV44MjSnZGmXTMFjPxCqSyG',1),(6,'yxc','yxc','yxc','$2y$10$XGfcROqZ8V1.WtgEANetuevBAKZ.AIUpQ4MtJYvrqqyk9PPzMHzGy',0),(7,'qwe','qwe','qwe','$2y$10$IQK9LXUX/eQklxdX6Rq.5eusXlFCFWomE90qz92Z.4MHhe2zfhrcS',1),(8,'asd','asd','asd','$2y$10$.bFbxrNRToSOcrFuiRFcHeCN5UjnicXJQaT2hlX//YBYn4g3F7MXq',0);
/*!40000 ALTER TABLE `korisnik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vijesti`
--

DROP TABLE IF EXISTS `vijesti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datum` varchar(32) NOT NULL,
  `naslov` varchar(80) NOT NULL,
  `sazetak` text NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(64) NOT NULL,
  `kategorija` varchar(64) NOT NULL,
  `arhiva` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vijesti`
--

LOCK TABLES `vijesti` WRITE;
/*!40000 ALTER TABLE `vijesti` DISABLE KEYS */;
INSERT INTO `vijesti` VALUES (1,'2022-06-18','Lorem ipsum dolor sit dolor','Lorem ipsum dolor sit amet consectetur adipisici','Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus atque error ab aut aspernatur pariatur omnis dolorum assumenda vero, animi autem modi labore consectetur temporibus tenetur placeat dolorem fugit nisi blanditiis repudiandae? Quaerat ab repellendus magni suscipit quidem nisi vel assumenda eum ut et reprehenderit facere culpa, ducimus doloremque pariatur hic. Ex voluptas quasi, excepturi illo pariatur neque! Quis fuga, adipisci voluptatum fugit ab iure ratione dicta sunt corruptiaa.','0001.jpg','U.S.',1),(2,'2022-06-18','Lorem ipsum dolor sit dolor','Lorem ipsum dolor sit amet consectetur adipisici','Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus atque error ab aut aspernatur pariatur omnis dolorum assumenda vero, animi autem modi labore consectetur temporibus tenetur placeat dolorem fugit nisi blanditiis repudiandae? Quaerat ab repellendus magni suscipit quidem nisi vel assumenda eum ut et reprehenderit facere culpa, ducimus doloremque pariatur hic. Ex voluptas quasi, excepturi illo pariatur neque! Quis fuga, adipisci voluptatum fugit ab iure ratione dicta sunt corruptiaa.','0002.jpg','U.S.',1),(3,'2022-06-18','Lorem ipsum dolor sit dolor','Lorem ipsum dolor sit amet consectetur adipisici','Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus atque error ab aut aspernatur pariatur omnis dolorum assumenda vero, animi autem modi labore consectetur temporibus tenetur placeat dolorem fugit nisi blanditiis repudiandae? Quaerat ab repellendus magni suscipit quidem nisi vel assumenda eum ut et reprehenderit facere culpa, ducimus doloremque pariatur hic. Ex voluptas quasi, excepturi illo pariatur neque! Quis fuga, adipisci voluptatum fugit ab iure ratione dicta sunt corruptiaa.','0003.jpg','U.S.',1),(4,'2022-06-18','Lorem ipsum dolor sit dolor','Lorem ipsum dolor sit amet consectetur adipisici','Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus atque error ab aut aspernatur pariatur omnis dolorum assumenda vero, animi autem modi labore consectetur temporibus tenetur placeat dolorem fugit nisi blanditiis repudiandae? Quaerat ab repellendus magni suscipit quidem nisi vel assumenda eum ut et reprehenderit facere culpa, ducimus doloremque pariatur hic. Ex voluptas quasi, excepturi illo pariatur neque! Quis fuga, adipisci voluptatum fugit ab iure ratione dicta sunt corruptiaa.','0004.jpg','World',1),(5,'2022-06-18','Lorem ipsum dolor sit dolor','Lorem ipsum dolor sit amet consectetur adipisici\r\n','Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus atque error ab aut aspernatur pariatur omnis dolorum assumenda vero, animi autem modi labore consectetur temporibus tenetur placeat dolorem fugit nisi blanditiis repudiandae? Quaerat ab repellendus magni suscipit quidem nisi vel assumenda eum ut et reprehenderit facere culpa, ducimus doloremque pariatur hic. Ex voluptas quasi, excepturi illo pariatur neque! Quis fuga, adipisci voluptatum fugit ab iure ratione dicta sunt corruptiaa.','0005.jpg','World',1),(6,'2022-06-18','Lorem ipsum dolor sit dolor','Lorem ipsum dolor sit amet consectetur adipisici','Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus atque error ab aut aspernatur pariatur omnis dolorum assumenda vero, animi autem modi labore consectetur temporibus tenetur placeat dolorem fugit nisi blanditiis repudiandae? Quaerat ab repellendus magni suscipit quidem nisi vel assumenda eum ut et reprehenderit facere culpa, ducimus doloremque pariatur hic. Ex voluptas quasi, excepturi illo pariatur neque! Quis fuga, adipisci voluptatum fugit ab iure ratione dicta sunt corruptiaa.','0006.jpg','World',1),(7,'2022-06-18','Lorem ipsum dolor sit dolor','Lorem ipsum dolor sit amet consectetur adipisici\r\n','Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus atque error ab aut aspernatur pariatur omnis dolorum assumenda vero, animi autem modi labore consectetur temporibus tenetur placeat dolorem fugit nisi blanditiis repudiandae? Quaerat ab repellendus magni suscipit quidem nisi vel assumenda eum ut et reprehenderit facere culpa, ducimus doloremque pariatur hic. Ex voluptas quasi, excepturi illo pariatur neque! Quis fuga, adipisci voluptatum fugit ab iure ratione dicta sunt corruptiaa.','0007.jpg','U.S.',0),(8,'2022-06-18','Lorem ipsum dolor sit dolor','Lorem ipsum dolor sit amet consectetur adipisici\r\n','Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus atque error ab aut aspernatur pariatur omnis dolorum assumenda vero, animi autem modi labore consectetur temporibus tenetur placeat dolorem fugit nisi blanditiis repudiandae? Quaerat ab repellendus magni suscipit quidem nisi vel assumenda eum ut et reprehenderit facere culpa, ducimus doloremque pariatur hic. Ex voluptas quasi, excepturi illo pariatur neque! Quis fuga, adipisci voluptatum fugit ab iure ratione dicta sunt corruptiaa.','0008.jpg','U.S.',0),(9,'2022-06-18','Lorem ipsum dolor sit dolor','Lorem ipsum dolor sit amet consectetur adipisici\r\n','Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus atque error ab aut aspernatur pariatur omnis dolorum assumenda vero, animi autem modi labore consectetur temporibus tenetur placeat dolorem fugit nisi blanditiis repudiandae? Quaerat ab repellendus magni suscipit quidem nisi vel assumenda eum ut et reprehenderit facere culpa, ducimus doloremque pariatur hic. Ex voluptas quasi, excepturi illo pariatur neque! Quis fuga, adipisci voluptatum fugit ab iure ratione dicta sunt corruptiaa.','0009.jpg','U.S.',0),(10,'2022-06-18','Lorem ipsum dolor sit dolor','Lorem ipsum dolor sit amet consectetur adipisici\r\n','Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus atque error ab aut aspernatur pariatur omnis dolorum assumenda vero, animi autem modi labore consectetur temporibus tenetur placeat dolorem fugit nisi blanditiis repudiandae? Quaerat ab repellendus magni suscipit quidem nisi vel assumenda eum ut et reprehenderit facere culpa, ducimus doloremque pariatur hic. Ex voluptas quasi, excepturi illo pariatur neque! Quis fuga, adipisci voluptatum fugit ab iure ratione dicta sunt corruptiaa.','0010.jpg','World',0),(11,'2022-06-18','Lorem ipsum dolor sit dolor','Lorem ipsum dolor sit amet consectetur adipisici\r\n','Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus atque error ab aut aspernatur pariatur omnis dolorum assumenda vero, animi autem modi labore consectetur temporibus tenetur placeat dolorem fugit nisi blanditiis repudiandae? Quaerat ab repellendus magni suscipit quidem nisi vel assumenda eum ut et reprehenderit facere culpa, ducimus doloremque pariatur hic. Ex voluptas quasi, excepturi illo pariatur neque! Quis fuga, adipisci voluptatum fugit ab iure ratione dicta sunt corruptiaa.','0011.jpg','World',0),(12,'2022-06-18','Lorem ipsum dolor sit dolor','Lorem ipsum dolor sit amet consectetur adipisici','Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus atque error ab aut aspernatur pariatur omnis dolorum assumenda vero, animi autem modi labore consectetur temporibus tenetur placeat dolorem fugit nisi blanditiis repudiandae? Quaerat ab repellendus magni suscipit quidem nisi vel assumenda eum ut et reprehenderit facere culpa, ducimus doloremque pariatur hic. Ex voluptas quasi, excepturi illo pariatur neque! Quis fuga, adipisci voluptatum fugit ab iure ratione dicta sunt corruptiaa.','0012.jpg','World',0);
/*!40000 ALTER TABLE `vijesti` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-19 13:05:01

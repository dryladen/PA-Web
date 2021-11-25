-- MariaDB dump 10.19  Distrib 10.6.4-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: oal
-- ------------------------------------------------------
-- Server version	10.6.4-MariaDB

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
-- Table structure for table `animes`
--

DROP TABLE IF EXISTS `animes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `animes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `synopsis` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `episodes` int(11) DEFAULT NULL,
  `score` float DEFAULT NULL,
  `season` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `studio` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animes`
--

LOCK TABLES `animes` WRITE;
/*!40000 ALTER TABLE `animes` DISABLE KEYS */;
INSERT INTO `animes` VALUES (21,'Fullmetal Alchemist: Brotherhood','https://cdn.myanimelist.net/images/anime/1223/96541.jpg?s=faffcb677a5eacd17bf761edd78bfb3f','',64,9.16,'',2006,'0'),(22,'Gintama°','https://cdn.myanimelist.net/images/anime/3/72078.jpg?s=e9537ac90c08758594c787ede117f209',NULL,51,9.09,NULL,NULL,NULL),(25,'Owarimonogatari 2nd Season','https://cdn.myanimelist.net/images/anime/6/87322.jpg?s=3e60507a4b6016d83e7433aa4cb7853e','',7,8.91,'',2010,'Shaft'),(26,'Komi-san wa, Comyushou desu','https://cdn.myanimelist.net/images/anime/1899/117237.jpg','Hitohito Tadano is an ordinary boy who heads into his first day of high school with a clear plan: to avoid trouble and do his best to blend in with others. Unfortunately, he fails right away when he takes the seat beside the school\'s madonna—Shouko Komi. His peers now recognize him as someone to eliminate for a chance to sit next to the most beautiful girl in class.\r\n\r\nGorgeous and graceful with long, dark hair, Komi is universally adored and immensely popular despite her mysterious persona. However, unbeknownst to everyone, she has crippling anxiety and a communication disorder which prevents her from wholeheartedly socializing with her classmates.\r\n\r\nWhen left alone in the classroom, a chain of events forces Komi to interact with Tadano through writing on the blackboard, as if in a one-way conversation. Being the first person to realize she cannot communicate properly, Tadano picks up the chalk and begins to write as well. He eventually discovers that Komi\'s goal is to make one hundred friends during her time in high school. To this end, he decides to lend her a helping hand, thus also becoming her first-ever friend.',0,8.32,'Fall',2021,'OLM');
/*!40000 ALTER TABLE `animes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (2,'Oda, Eiichiro','https://cdn.myanimelist.net/images/voiceactors/2/10593.jpg?s=6e83dfc242f5610e419eb59c24aebdc6'),(3,'Kishimoto, Masashi','https://cdn.myanimelist.net/images/voiceactors/2/42365.jpg?s=5c0ff94bea5f885c5c3a8e156cb6c04f'),(4,'Araki, Hirohiko','https://cdn.myanimelist.net/images/voiceactors/3/42598.jpg?s=50bdb2144b44b05fd7336d93481bc4ff'),(5,'Miura, Kentarou','https://cdn.myanimelist.net/images/voiceactors/3/63827.jpg?s=e76f447e5dadbb52a83e114836dfbc47'),(6,'Ito, Junji','https://cdn.myanimelist.net/images/voiceactors/3/54679.jpg?s=7bb472fbd208e2e45047dd19d1c376b6'),(7,'Isayama, Hajime','https://cdn.myanimelist.net/images/voiceactors/1/40147.jpg?s=9d728736c63ac853b6189a92d27dbef4'),(8,'Asano, Inio','https://cdn.myanimelist.net/images/voiceactors/2/53969.jpg?s=2594bcc4e020a95cacff248da16acfee'),(9,'NISIO, ISIN','https://cdn.myanimelist.net/images/voiceactors/2/43583.jpg?s=999ac9602aeda7eaf376fcd89d315c10'),(10,'Toriyama, Akira','https://cdn.myanimelist.net/images/voiceactors/3/40043.jpg?s=28dad22208dc14be3f603c1fc466a230'),(11,'ONE','https://cdn.myanimelist.net/images/voiceactors/1/44008.jpg?s=a49b63f32a7e6c61fddaf34345fcc4ce'),(12,'Ishida, Sui','https://cdn.myanimelist.net/images/voiceactors/3/37277.jpg?s=5045f9429eb0b435bf79da4c2886ab3c'),(13,'Kubo, Tite','https://cdn.myanimelist.net/images/voiceactors/1/11083.jpg?s=eaa494fffadbbc2ee8e0ccf0263e164c'),(14,'Fujimoto, Tatsuki','https://cdn.myanimelist.net/images/voiceactors/2/61876.jpg?s=c0cf410ceb242560dad9e6e75e811a1c'),(15,'Murata, Yusuke','https://cdn.myanimelist.net/images/voiceactors/3/5939.jpg?s=d9658e6a1ec6e2d537b39999b5bcf493'),(16,'Obata, Takeshi','https://cdn.myanimelist.net/images/voiceactors/2/39958.jpg?s=e5e0e682ba08e8ee900450653e0f725a'),(17,'Obata, Takeshi','https://cdn.myanimelist.net/images/voiceactors/2/39958.jpg?s=e5e0e682ba08e8ee900450653e0f725a');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fav_animes`
--

DROP TABLE IF EXISTS `fav_animes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fav_animes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `anime_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `anime_id` (`anime_id`),
  CONSTRAINT `fav_animes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `fav_animes_ibfk_2` FOREIGN KEY (`anime_id`) REFERENCES `animes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fav_animes`
--

LOCK TABLES `fav_animes` WRITE;
/*!40000 ALTER TABLE `fav_animes` DISABLE KEYS */;
/*!40000 ALTER TABLE `fav_animes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fav_mangas`
--

DROP TABLE IF EXISTS `fav_mangas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fav_mangas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `mangas_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `mangas_id` (`mangas_id`),
  CONSTRAINT `fav_mangas_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `fav_mangas_ibfk_2` FOREIGN KEY (`mangas_id`) REFERENCES `mangas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fav_mangas`
--

LOCK TABLES `fav_mangas` WRITE;
/*!40000 ALTER TABLE `fav_mangas` DISABLE KEYS */;
/*!40000 ALTER TABLE `fav_mangas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anime_id` int(11) DEFAULT NULL,
  `manga_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `anime_id` (`anime_id`),
  KEY `manga_id` (`manga_id`),
  CONSTRAINT `genres_ibfk_1` FOREIGN KEY (`anime_id`) REFERENCES `animes` (`id`),
  CONSTRAINT `genres_ibfk_2` FOREIGN KEY (`manga_id`) REFERENCES `mangas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genres`
--

LOCK TABLES `genres` WRITE;
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;
INSERT INTO `genres` VALUES (1,'Action',21,NULL),(2,'Adventure',21,NULL),(3,'Romance',25,NULL),(4,'Harem',25,NULL),(5,'Vampire',25,NULL),(6,'Comedy',NULL,3),(7,'Action',NULL,2),(8,'Adventure',NULL,2),(9,'Mystery',NULL,2),(10,'Comedy',26,NULL),(11,'Slice of Life',26,NULL);
/*!40000 ALTER TABLE `genres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mangas`
--

DROP TABLE IF EXISTS `mangas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mangas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chapters` int(11) DEFAULT NULL,
  `volumes` int(11) DEFAULT NULL,
  `score` float DEFAULT NULL,
  `magazine` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `synopsis` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`),
  CONSTRAINT `mangas_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mangas`
--

LOCK TABLES `mangas` WRITE;
/*!40000 ALTER TABLE `mangas` DISABLE KEYS */;
INSERT INTO `mangas` VALUES (1,'Berserk','https://cdn.myanimelist.net/images/manga/1/157897.jpg?s=f03b5f8bfeb0b0962b7d5e7cb9a8d0d3',NULL,41,9.41,'','',5),(2,'JoJo no Kimyou na Bouken Part 7: Steel Ball Run','https://cdn.myanimelist.net/images/manga/3/179882.jpg?s=dac8109140406ca296cf4946296b5037',0,24,9.25,'','',4),(3,'One Piece','https://cdn.myanimelist.net/images/manga/3/55539.jpg?s=b4d9e935b7152f0c9e69b34a7797fe02',0,0,9.17,'Shounen Jump (Weekly)','',2),(4,'Sousou no Frieren','https://cdn.myanimelist.net/images/manga/3/232121.jpg?s=9c05e20374c4df437a85b281efcc5927',NULL,0,8.61,'','',NULL),(5,'ReLIFE','https://cdn.myanimelist.net/images/manga/2/171573.jpg?s=a03a56ed3f40a2b7d1f8eaed154b61e0',NULL,15,8.66,'','',NULL),(6,'Grand Blue','https://cdn.myanimelist.net/images/manga/2/166124.jpg?s=3a3e1279dd192ea90a32ff6bdfdbe4dc',NULL,0,9.05,'','',NULL),(7,'Kaguya-sama wa Kokurasetai: Tensai-tachi no Renai Zunousen','https://cdn.myanimelist.net/images/manga/3/188896.jpg?s=107a5af07f0e6992faa286f94596f231',NULL,0,8.93,'','',NULL);
/*!40000 ALTER TABLE `mangas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@mail.com','admin',NULL),(2,'user1','user1@mail.com','24c9e15e52afc47c225b757e7bee1f9d',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-25 14:36:05

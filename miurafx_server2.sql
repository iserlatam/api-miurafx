-- MariaDB dump 10.19  Distrib 10.5.23-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: miurafx_server
-- ------------------------------------------------------
-- Server version	10.5.23-MariaDB

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
-- Table structure for table `asignacions`
--

DROP TABLE IF EXISTS `asignacions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asignacions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cliente_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `asignacion` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignacions`
--

LOCK TABLES `asignacions` WRITE;
/*!40000 ALTER TABLE `asignacions` DISABLE KEYS */;
INSERT INTO `asignacions` VALUES (1,1,NULL,'algo','2024-09-10 23:16:11','2024-09-10 23:16:11'),(2,1,NULL,'algo','2024-09-10 23:18:20','2024-09-10 23:18:20'),(3,2,NULL,'algo','2024-09-10 23:20:02','2024-09-10 23:20:02'),(4,2,NULL,'algo','2024-09-10 23:26:44','2024-09-10 23:26:44'),(5,3,NULL,'algo','2024-09-11 00:21:31','2024-09-11 00:21:31'),(6,5,NULL,'algo','2024-09-11 00:44:35','2024-09-11 00:44:35'),(7,5,3,'algo','2024-09-11 00:49:59','2024-09-11 00:49:59'),(8,6,3,'algo','2024-09-12 03:49:42','2024-09-12 03:49:42');
/*!40000 ALTER TABLE `asignacions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(255) NOT NULL,
  `fase` varchar(255) NOT NULL,
  `origen` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'interesado','declinado','BTC',1,'2024-09-09 20:59:17','2024-09-09 20:59:17'),(2,'interesado','declinado','BTC',1,'2024-09-09 21:00:18','2024-09-09 21:00:18'),(3,'interesado','declinado','BTC',3,'2024-09-09 21:06:40','2024-09-09 21:06:40'),(4,'interesado','declinado','BTC',4,'2024-09-09 21:14:18','2024-09-09 21:14:18'),(5,'interesado','contactado','BTC',5,'2024-09-11 00:28:07','2024-09-11 00:28:07'),(6,'Activo','Prospecto_nuevo','BTC',6,'2024-09-12 03:30:49','2024-09-12 03:30:49');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (64,'2014_10_12_100000_create_password_reset_tokens_table',2),(65,'2019_08_19_000000_create_failed_jobs_table',2),(66,'2019_12_14_000001_create_personal_access_tokens_table',2),(67,'2024_09_05_165325_create_clientes_table',2),(68,'2024_09_05_165326_create_movimientos_table',2),(69,'2024_09_05_165327_create_seguimientos_table',2),(91,'2024_09_09_183614_create_asignacions_table',10),(93,'2014_10_12_000000_create_users_table',11),(94,'2024_08_21_145428_create_permission_tables',12);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',2),(3,'App\\Models\\User',3),(4,'App\\Models\\User',4),(4,'App\\Models\\User',5),(4,'App\\Models\\User',6);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimientos`
--

DROP TABLE IF EXISTS `movimientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movimientos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `radicado` varchar(255) NOT NULL,
  `tipo_solicitud` varchar(255) NOT NULL,
  `estado_solicitud` varchar(255) NOT NULL,
  `metodo_pago` varchar(255) NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `divisa` varchar(255) NOT NULL,
  `cantidad` varchar(255) NOT NULL,
  `razon_rechazo` varchar(255) NOT NULL,
  `documento` varchar(255) NOT NULL,
  `cliente_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimientos`
--

LOCK TABLES `movimientos` WRITE;
/*!40000 ALTER TABLE `movimientos` DISABLE KEYS */;
INSERT INTO `movimientos` VALUES (1,'000025','retiro','aprobado','tarjeta de credito','2024-09-10','USD','2000','ninguna','1552252',2,'2024-09-10 21:43:54','2024-09-12 01:53:10'),(2,'000025','retiro','aprobado','tarjeta de credito','2024-09-10','USD','2000','ninguna','1552252',2,'2024-09-10 23:13:38','2024-09-12 00:25:25'),(3,'ax58Ssa','deposito','pendiente','tarjeta de credito','2024-09-10','USD','100','ninguna','1552252',5,'2024-09-11 00:30:20','2024-09-11 00:30:20'),(4,'fg56ghsag','retiro','pendiente','tarjeta de credito','2024-09-10','USD','50','ninguna','1552252',5,'2024-09-11 00:33:35','2024-09-11 00:33:35');
/*!40000 ALTER TABLE `movimientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` VALUES (1,'App\\Models\\User',1,'my-token','7e240c55af0b439f6a5c33e6a341e6a440415a0892df51d324776a9c19862004','[\"*\"]','2024-09-12 01:19:50',NULL,'2024-09-05 22:23:46','2024-09-12 01:19:50'),(2,'App\\Models\\User',1,'my-token','9479d2f845b445d179c80f1af40160583352b2a43f72ea577bb6a5514767e7af','[\"*\"]',NULL,NULL,'2024-09-08 01:37:41','2024-09-08 01:37:41'),(3,'App\\Models\\User',1,'my-token','235ff9b0b59afc86d00e805cf9cdb3070a0fc352e371d91d4e812e515bf371b5','[\"*\"]',NULL,NULL,'2024-09-08 01:42:39','2024-09-08 01:42:39'),(4,'App\\Models\\User',1,'my-token','0a92e059b629ae67c30aa2b8a0611f3df3f99ede81ff3cb7f50f75eeac5c6bcf','[\"*\"]',NULL,NULL,'2024-09-08 01:42:40','2024-09-08 01:42:40'),(5,'App\\Models\\User',1,'my-token','fad477c40179de4cc6951df2c4fc8c8c977a1585baf2434c40fab8670ecbf95f','[\"*\"]',NULL,NULL,'2024-09-08 01:46:38','2024-09-08 01:46:38'),(6,'App\\Models\\User',1,'my-token','2fd132a21bf89257b1768e34b2ccde3e41fa42c65e260264a92497646a4644dd','[\"*\"]',NULL,NULL,'2024-09-08 01:46:49','2024-09-08 01:46:49'),(7,'App\\Models\\User',1,'my-token','e54a428538e2eee1fda365e189cb912393b8f320e11bf2fb0cbee4f96e8c867e','[\"*\"]',NULL,NULL,'2024-09-08 01:46:52','2024-09-08 01:46:52'),(8,'App\\Models\\User',1,'my-token','9ac79d2662d69ff27607093d28d9d57dbe6f4571e892c835389579f083c6b483','[\"*\"]',NULL,NULL,'2024-09-08 01:48:19','2024-09-08 01:48:19'),(9,'App\\Models\\User',1,'my-token','8aa7bf00c63ee543cf2efefced4c9c5d1650f2a0da992ecff5af3d887414a3d4','[\"*\"]',NULL,NULL,'2024-09-08 01:49:00','2024-09-08 01:49:00'),(10,'App\\Models\\User',4,'my-token','872cee0a348ed46e1b50df6b9a295e4cdc65d33ea28289624b917cc0cbb94d34','[\"*\"]',NULL,NULL,'2024-09-08 01:49:11','2024-09-08 01:49:11'),(11,'App\\Models\\User',2,'my-token','7bb163ec1a901a341ce7af1e6cd280597e448c89d21b7ce39f29a620dc554c5a','[\"*\"]',NULL,NULL,'2024-09-08 01:49:24','2024-09-08 01:49:24'),(12,'App\\Models\\User',2,'my-token','f52f1c8d9404cbd34deb373ffd982f958cd67f436da140a00ea2300afbadd225','[\"*\"]',NULL,NULL,'2024-09-08 01:50:58','2024-09-08 01:50:58'),(13,'App\\Models\\User',2,'my-token','678af6a4fbab499a0b700cb42d6888667d7f07647e3683e2a41c8a5233fc31c8','[\"*\"]',NULL,NULL,'2024-09-08 01:52:25','2024-09-08 01:52:25'),(14,'App\\Models\\User',2,'my-token','9d494a6bdba6f83c2e6203e4245f8a5f2c902961c97b2b384a0c7d40a8c71f08','[\"*\"]',NULL,NULL,'2024-09-08 01:53:02','2024-09-08 01:53:02'),(15,'App\\Models\\User',2,'my-token','f6b4da2ac42d2a2d06ae58e04c5aa1a7eec1fdf2cf20a6dddb51eef2af235ef3','[\"*\"]',NULL,NULL,'2024-09-08 01:53:59','2024-09-08 01:53:59'),(16,'App\\Models\\User',4,'my-token','70e7846fba0f2b3c5d5c078e68679602bee7f184737a98d48cb3e8be2dfa1780','[\"*\"]',NULL,NULL,'2024-09-08 01:54:12','2024-09-08 01:54:12'),(17,'App\\Models\\User',1,'my-token','9ab05b6a9e202bdfe348216f763a9c7a4a291eaa092ffd72fd7a9d00b8612c0e','[\"*\"]',NULL,NULL,'2024-09-08 01:54:26','2024-09-08 01:54:26'),(18,'App\\Models\\User',4,'my-token','718022654726d8518d9bf5ab395bfc583709a5d3bad1afa51f19a7905bea210b','[\"*\"]',NULL,NULL,'2024-09-08 02:00:11','2024-09-08 02:00:11'),(19,'App\\Models\\User',1,'my-token','42dd0ed3d24ac0661a2e5f52d2962e3f5faf56fb1a1e669c159e0f2222f39378','[\"*\"]',NULL,NULL,'2024-09-08 02:03:01','2024-09-08 02:03:01'),(20,'App\\Models\\User',2,'my-token','aee9ef7affb864e638c5430e169bfddf2f4ad711181359e10e1973a0eb47e7fe','[\"*\"]',NULL,NULL,'2024-09-08 02:05:56','2024-09-08 02:05:56'),(21,'App\\Models\\User',4,'my-token','0f8539d02d1cdf6988629e297e82b726e9dad587b56876763599afe1578b4595','[\"*\"]',NULL,NULL,'2024-09-08 02:06:12','2024-09-08 02:06:12'),(22,'App\\Models\\User',7,'my-token','b93cc3501c8692613548ca7b6a545eebb891a4cb5a7cf07281bafc58fe4a2033','[\"*\"]',NULL,NULL,'2024-09-08 02:16:43','2024-09-08 02:16:43'),(23,'App\\Models\\User',1,'my-token','1b1e34301748080ce2b6c7bc313d8ab23e446b6c381cf8c5314b1293fb1084a0','[\"*\"]',NULL,NULL,'2024-09-08 02:17:15','2024-09-08 02:17:15'),(24,'App\\Models\\User',8,'my-token','d3bbe3703f86921c30c24a7e2f7b07b17e84ad4c521230597b554cbac29aa304','[\"*\"]',NULL,NULL,'2024-09-08 02:21:13','2024-09-08 02:21:13'),(25,'App\\Models\\User',1,'my-token','b94b0a20c7ba3ae17d67baf2c09f7ea555ec15a03bd7c663fb6903c570f41040','[\"*\"]','2024-09-08 02:41:09',NULL,'2024-09-08 02:22:16','2024-09-08 02:41:09'),(26,'App\\Models\\User',1,'my-token','98242fc288f18e613670f04fd28fcca221913838407c4144ac0181b9a23c02f4','[\"*\"]','2024-09-08 12:23:30',NULL,'2024-09-08 02:37:15','2024-09-08 12:23:30'),(27,'App\\Models\\User',1,'my-token','91fa63d26e43ff34723061b5eda99b956bec51493d3bb8ec625105efa069eafb','[\"*\"]','2024-09-08 11:06:15',NULL,'2024-09-08 11:06:10','2024-09-08 11:06:15'),(28,'App\\Models\\User',3,'my-token','7090942f4205f2a9bed030fb88b06fbf538d3a37cd728976d65dbc40e53d5f2a','[\"*\"]',NULL,NULL,'2024-09-08 12:13:46','2024-09-08 12:13:46'),(29,'App\\Models\\User',3,'my-token','6dffbabe75839069fed6b5b26245171d019dcbfba6b13599d2143d3f0f85fc48','[\"*\"]',NULL,NULL,'2024-09-08 12:21:09','2024-09-08 12:21:09'),(30,'App\\Models\\User',3,'my-token','ce0a812112b5221d9d35968d0046fe08dc0da0007676fa244e2f1863d9181ddd','[\"*\"]',NULL,NULL,'2024-09-08 12:21:42','2024-09-08 12:21:42'),(31,'App\\Models\\User',2,'my-token','34f7f7b0fa1263885ad42b6db52294460cca0c795dbf4af3ce395a0900753b50','[\"*\"]',NULL,NULL,'2024-09-09 04:18:30','2024-09-09 04:18:30'),(32,'App\\Models\\User',5,'my-token','299ae0b9ef6a1f8c784e872bf50a5dc31f131237cfb9f007eefe5fb41ca564d4','[\"*\"]',NULL,NULL,'2024-09-09 04:25:23','2024-09-09 04:25:23'),(33,'App\\Models\\User',1,'my-token','eb3c9caecb07219730626239f54f062045d40293d650fa2554c1c97c47fbe201','[\"*\"]','2024-09-09 10:22:37',NULL,'2024-09-09 06:27:56','2024-09-09 10:22:37'),(34,'App\\Models\\User',1,'my-token','256b0bcba229707c1ea988fcc5adc3a4696c83c6c98e82995d9e4d3c45b3b0d8','[\"*\"]','2024-09-09 19:56:00',NULL,'2024-09-09 19:55:54','2024-09-09 19:56:00'),(35,'App\\Models\\User',1,'my-token','d3579f509ad06eec7da771afcf45d2bb394c66ca6adb9003a25f5b269456657f','[\"*\"]','2024-09-09 20:20:23',NULL,'2024-09-09 20:01:58','2024-09-09 20:20:23'),(36,'App\\Models\\User',4,'my-token','132f4d85c1856212dc474a18534ffe278f728e31615e90662d1e6bde03be6b09','[\"*\"]','2024-09-09 20:25:04',NULL,'2024-09-09 20:22:09','2024-09-09 20:25:04'),(37,'App\\Models\\User',1,'my-token','60370719c596bb17cd2e23bda8f642940b67821a2b08a89b676b486500b874ed','[\"*\"]','2024-09-12 04:18:41',NULL,'2024-09-09 20:25:31','2024-09-12 04:18:41'),(38,'App\\Models\\User',3,'my-token','618eb2518f4a5a1fc64aa93e3bf02f26f027ad06ea79a701e02f7dc30f78e2c4','[\"*\"]','2024-09-10 01:41:41',NULL,'2024-09-10 01:16:09','2024-09-10 01:41:41'),(39,'App\\Models\\User',2,'my-token','e22a605f85e4ff58b81771ef1c14e0a60b9b1fcb01c8ce30032ee32bec8ae7f4','[\"*\"]','2024-09-11 00:40:50',NULL,'2024-09-10 01:42:06','2024-09-11 00:40:50'),(40,'App\\Models\\User',1,'my-token','2dde5fdb402c17670111656f0d623f54ffb9955996ce6c4d21101e2a336772cf','[\"*\"]','2024-09-12 00:25:02',NULL,'2024-09-10 18:11:44','2024-09-12 00:25:02'),(41,'App\\Models\\User',1,'app-client-token','9f742aa44a5fc37f00a06fcb41976cf4e09cc73dfed6f5291b1d6e7550bff6fa','[\"*\"]',NULL,NULL,'2024-09-10 18:23:19','2024-09-10 18:23:19'),(42,'App\\Models\\User',1,'app-client-token','d8d4e235d5b944affa315347089a0c11057e43064699555869e6b857e9c60d8c','[\"*\"]','2024-09-12 03:49:42',NULL,'2024-09-10 23:06:21','2024-09-12 03:49:42'),(43,'App\\Models\\User',1,'app-client-token','a1dffaccb5180b101d74f362a481fe565368b433ec90134783c7df268a537a85','[\"*\"]',NULL,NULL,'2024-09-11 01:21:45','2024-09-11 01:21:45'),(44,'App\\Models\\User',6,'app-client-token','01322c7ae42bae168023ba424774630f5dccfe0af8c8f485b110b2210003433c','[\"*\"]',NULL,NULL,'2024-09-11 01:32:11','2024-09-11 01:32:11'),(45,'App\\Models\\User',6,'app-client-token','feb65eb358840bb264e4fa65f6f80398408c25ea5221e71b89bc2561f7b5191d','[\"*\"]','2024-09-11 21:35:09',NULL,'2024-09-11 01:33:20','2024-09-11 21:35:09'),(46,'App\\Models\\User',1,'app-client-token','8f6ffe01962a40a6352db74aca31e21df02b7a4ed6e89788d46f98179727020f','[\"*\"]',NULL,NULL,'2024-09-11 21:44:21','2024-09-11 21:44:21'),(47,'App\\Models\\User',1,'app-client-token','de01376c44da86e563a3cc8f228dbabba1810956065f77d614456d260649d698','[\"*\"]','2024-09-11 21:45:32',NULL,'2024-09-11 21:45:17','2024-09-11 21:45:32'),(48,'App\\Models\\User',5,'app-client-token','68752fe42df464f01339e95c679f0dd1c4cf826fbd132d4ca95d7c23b625c6ce','[\"*\"]',NULL,NULL,'2024-09-11 21:47:33','2024-09-11 21:47:33'),(49,'App\\Models\\User',1,'app-client-token','d20f0fbc7b599c310f73b0bfec15861f77fb8ca28762ccceb1be81aa2282096f','[\"*\"]','2024-09-12 01:54:35',NULL,'2024-09-11 21:49:48','2024-09-12 01:54:35'),(50,'App\\Models\\User',1,'app-client-token','b5ae3d6e9a31bf165f0cc326a2ebaeaa77d6d55739fc4f5f5c5b43adea78b007','[\"*\"]','2024-09-12 04:19:32',NULL,'2024-09-12 02:19:47','2024-09-12 04:19:32');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'master','web','2024-09-11 21:40:33','2024-09-11 21:40:33'),(2,'monitor','web','2024-09-11 21:40:33','2024-09-11 21:40:33'),(3,'accesor','web','2024-09-11 21:40:33','2024-09-11 21:40:33'),(4,'cliente','web','2024-09-11 21:40:33','2024-09-11 21:40:33');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seguimientos`
--

DROP TABLE IF EXISTS `seguimientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seguimientos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ultimo_contacto` date NOT NULL,
  `observaciones` text NOT NULL,
  `cliente_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seguimientos`
--

LOCK TABLES `seguimientos` WRITE;
/*!40000 ALTER TABLE `seguimientos` DISABLE KEYS */;
INSERT INTO `seguimientos` VALUES (1,'2024-09-09','no contesta',1,4,'2024-09-10 01:40:27','2024-09-10 01:40:27'),(2,'2024-09-09','no contesta',1,2,'2024-09-10 01:41:20','2024-09-10 01:41:20'),(3,'2024-09-09','no contesta',1,3,'2024-09-10 01:41:41','2024-09-10 01:41:41'),(4,'2024-09-09','en proceso',3,3,'2024-09-11 00:22:29','2024-09-11 00:22:29'),(5,'2024-09-10','en proceso',5,1,'2024-09-11 00:37:30','2024-09-11 00:37:30'),(6,'2024-09-10','en proceso',5,1,'2024-09-11 00:40:50','2024-09-11 00:40:50');
/*!40000 ALTER TABLE `seguimientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `nombre_completo` varchar(255) DEFAULT NULL,
  `dirección` varchar(255) DEFAULT NULL,
  `celular` varchar(255) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `etiqueta` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `tipo_documento` varchar(255) DEFAULT NULL,
  `documento` varchar(255) DEFAULT NULL,
  `método_pago` varchar(255) DEFAULT NULL,
  `pais` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'master@email.com',NULL,'$2y$12$lwHW5t5qqYzTFpEPoY6gy.78Ta.N4vPuzwxv3unURqf./oryGCFYe','Habid Sarif','123 Main St','3005254848','1980-01-01','Activo','Ciudad Ejemplo','cc','123456789','Tarjeta de Crédito','Colombia',NULL,'2024-09-11 21:40:40','2024-09-12 01:52:12'),(2,'monitor@email.com',NULL,'$2y$12$rXPzXjs05yQx/uXw2vgkl.u.AW.KBEojZ2ZjpS2PkBniqN0/VphkO','Habid Sarif','123 Main St','1234567890','1980-01-01','Contactado','Ciudad Ejemplo','CC','123456789','Tarjeta de Crédito','Colombia',NULL,'2024-09-11 21:40:41','2024-09-11 21:40:41'),(3,'accesor@email.com',NULL,'$2y$12$wB736bQYiM775J/xnYs.6edtKsr4JxvB4qvovGrXlDI.8A3kGXzUW','Habid Sarif','123 Main St','1234567890','1980-01-01','Contactado','Ciudad Ejemplo','CC','123456789','Tarjeta de Crédito','Colombia',NULL,'2024-09-11 21:40:41','2024-09-11 21:40:41'),(4,'cliente@email.com',NULL,'$2y$12$XJ/K7ib1eHhXrz3c2VaQB.ds/3UZX7KQBgFS4FlA79yHzX/QkYIw2','Alan','123 Main','1234567890','1980-01-17','Registrado','Ciudad Ejemplo','cc','4142525458','Tarjeta de Crédito','Colombia',NULL,'2024-09-11 21:40:41','2024-09-11 23:57:15'),(5,'j@email.com',NULL,'$2y$12$WgJimuBeplRAi0rOh8ZJqOwxQ96LJ1P5j/Ba5r3UIqUbE3Lr3nrVm','jeison hernandez','cra25n','3251234565','2000-11-01','Reasignar','cali','ti','12255451','criptomoneda','colombia',NULL,'2024-09-11 21:47:16','2024-09-11 23:49:32'),(6,'barnie@email.com',NULL,'$2y$12$fWOIZXMXLy4ryGIx3yKTKO1ZTTZrGW1sfrmPcZqOREJnjMXspZzdy','barnie el dinosaurio','null','1234567890','1980-01-01',NULL,'null','null','null','null','Colombia',NULL,'2024-09-12 02:59:52','2024-09-12 02:59:52');
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

-- Dump completed on 2024-09-11 18:21:26

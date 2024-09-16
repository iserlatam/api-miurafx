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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignacions`
--

LOCK TABLES `asignacions` WRITE;
/*!40000 ALTER TABLE `asignacions` DISABLE KEYS */;
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
  `saldo` int(11) NOT NULL DEFAULT 0,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'Contactado','Activo','BTC',3200,1,'2024-09-13 09:05:59','2024-09-14 08:20:01'),(2,'Contactado','Activo','Facebook',500,4,'2024-09-14 08:07:16','2024-09-14 09:01:48');
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
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (99,'2024_08_21_145428_create_permission_tables',1),(100,'2014_10_12_000000_create_users_table',2),(101,'2014_10_12_100000_create_password_reset_tokens_table',3),(102,'2019_08_19_000000_create_failed_jobs_table',3),(103,'2019_12_14_000001_create_personal_access_tokens_table',3),(104,'2024_09_05_165325_create_clientes_table',3),(105,'2024_09_05_165326_create_movimientos_table',3),(106,'2024_09_05_165327_create_seguimientos_table',3),(107,'2024_09_09_183614_create_asignacions_table',3);
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
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',2),(3,'App\\Models\\User',3),(4,'App\\Models\\User',4);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimientos`
--

LOCK TABLES `movimientos` WRITE;
/*!40000 ALTER TABLE `movimientos` DISABLE KEYS */;
INSERT INTO `movimientos` VALUES (1,'ra763540','deposito','aprobado','USDT','2024-09-13','theter','500','sin motivo','pendiente por subir',2,'2024-09-14 08:11:02','2024-09-14 08:25:39'),(2,'ra692557','deposito','pendiente','USDT','2024-09-13','theter','1300','sin motivo','pendiente por subir',2,'2024-09-14 08:57:27','2024-09-14 08:57:27'),(3,'ra768781','deposito','aprobado','USDT','2024-09-13','theter','500','sin motivo','pendiente por subir',2,'2024-09-14 09:01:05','2024-09-14 09:02:06');
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` VALUES (1,'App\\Models\\User',1,'app-client-token','431180e53f047d8725b45a65135a50068f5f9dcc94d2df2a6c934ee493071a3f','[\"*\"]','2024-09-13 09:06:27',NULL,'2024-09-13 09:04:17','2024-09-13 09:06:27'),(2,'App\\Models\\User',4,'app-client-token','431f70c4823639c902d839812cf1279085383efbf9aeb9952803c8c3788c4c0c','[\"*\"]',NULL,NULL,'2024-09-13 09:07:53','2024-09-13 09:07:53'),(3,'App\\Models\\User',4,'app-client-token','a70f52f6fcb6ebeacd0ffab9e1fdc31e189d9cdaa18007b20d9c4ad9346c7174','[\"*\"]','2024-09-14 08:20:34',NULL,'2024-09-13 09:26:56','2024-09-14 08:20:34'),(4,'App\\Models\\User',4,'app-client-token','296f260271e1fecf800db2616326a2e0aec1067ddb09ffc7e6490b13ee3ab2ad','[\"*\"]',NULL,NULL,'2024-09-13 22:11:14','2024-09-13 22:11:14'),(5,'App\\Models\\User',1,'app-client-token','8cc3ebfe42b9af6b29a0b1daa13185690c0497871a39c3f2d2b7721860cf26c9','[\"*\"]','2024-09-13 22:33:14',NULL,'2024-09-13 22:28:38','2024-09-13 22:33:14'),(6,'App\\Models\\User',1,'app-client-token','defd65a016f26cec039a8f155d2605721e0c8f95c2d7e8461ca25fbe93da8389','[\"*\"]',NULL,NULL,'2024-09-14 00:08:44','2024-09-14 00:08:44'),(7,'App\\Models\\User',4,'app-client-token','d5df1f741897af94dfcb78e58b5daf7bffaeb65d793a9e004f932568d310b423','[\"*\"]',NULL,NULL,'2024-09-14 00:09:50','2024-09-14 00:09:50'),(8,'App\\Models\\User',4,'app-client-token','4b027206ac6b7cfd13025f393dc13188b287f13fa1ea54b2a5fae40deaa643ad','[\"*\"]',NULL,NULL,'2024-09-14 00:10:57','2024-09-14 00:10:57'),(9,'App\\Models\\User',4,'app-client-token','1d0e67b4ea6cfbe98e3cf1ea801f07597c871159270f6a9c9c1db0c9ef105bf6','[\"*\"]','2024-09-14 00:17:06',NULL,'2024-09-14 00:11:09','2024-09-14 00:17:06'),(10,'App\\Models\\User',1,'app-client-token','de621df13b765fa7ac67a3b66360d2a92673c7cbdd6c933c4fc1ffe8c4488116','[\"*\"]',NULL,NULL,'2024-09-14 00:12:45','2024-09-14 00:12:45'),(11,'App\\Models\\User',4,'app-client-token','6670b55a58a77c38ba0cc07003cd68b5feffc60abb239ab340b6379977a5494c','[\"*\"]',NULL,NULL,'2024-09-14 00:12:52','2024-09-14 00:12:52'),(12,'App\\Models\\User',4,'app-client-token','a81c13cfdbf573fccca53cf284dc833792e1f8c4c6fda7f01955e93a5e32472b','[\"*\"]',NULL,NULL,'2024-09-14 00:43:42','2024-09-14 00:43:42'),(13,'App\\Models\\User',4,'app-client-token','aa8cafdc3257d96da25122eacc8a3baef6cf8ba20dec623a71b62aa8dd7f702f','[\"*\"]',NULL,NULL,'2024-09-14 00:44:18','2024-09-14 00:44:18'),(14,'App\\Models\\User',1,'app-client-token','6e2d04daa7291a9a2a15766334433ae2b435e103434a470fe1041fe20767b888','[\"*\"]',NULL,NULL,'2024-09-14 00:44:27','2024-09-14 00:44:27'),(15,'App\\Models\\User',1,'app-client-token','82a5953dc95fd7cd6f05ef42700888c770f52ee90c265837765519ba156e32b0','[\"*\"]',NULL,NULL,'2024-09-14 00:45:29','2024-09-14 00:45:29'),(16,'App\\Models\\User',4,'app-client-token','04c63c67205576391dffa3d86968f70714780985d63a8fab9da8697961f2fb44','[\"*\"]',NULL,NULL,'2024-09-14 00:45:35','2024-09-14 00:45:35'),(17,'App\\Models\\User',4,'app-client-token','8bb324277d8dbba33ca463daf1aad59377a3579749b6a261ad308a7d65be53ea','[\"*\"]',NULL,NULL,'2024-09-14 00:51:09','2024-09-14 00:51:09'),(18,'App\\Models\\User',4,'app-client-token','0e01e77f1d20aa6843e263d0798fa3500962fdeca9a9788d884436c3d51d9f44','[\"*\"]','2024-09-14 01:07:02',NULL,'2024-09-14 00:58:33','2024-09-14 01:07:02'),(19,'App\\Models\\User',4,'app-client-token','9c54091deaea4bd8df84363a6f355353dfbae923bed389cb8e2421e67732abf1','[\"*\"]','2024-09-14 07:59:32',NULL,'2024-09-14 07:43:38','2024-09-14 07:59:32'),(20,'App\\Models\\User',4,'app-client-token','cb99941aa4de07d2d2454bef29a48e8badd6af7607761397231578e5d378d0f3','[\"*\"]','2024-09-14 08:07:43',NULL,'2024-09-14 07:53:35','2024-09-14 08:07:43'),(21,'App\\Models\\User',1,'app-client-token','678297776802693e5c8fde31a1076f5aca6e9c365daa4367f7431b16f8acc98c','[\"*\"]','2024-09-14 09:03:49',NULL,'2024-09-14 08:01:56','2024-09-14 09:03:49'),(22,'App\\Models\\User',4,'app-client-token','546aed3b1d1d4e35f4c0de4db3df7cb9f0fdc89540ee3b1b93e485b3abc0257a','[\"*\"]','2024-09-14 09:01:57',NULL,'2024-09-14 08:09:05','2024-09-14 09:01:57');
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
INSERT INTO `roles` VALUES (1,'master','web','2024-09-13 08:51:37','2024-09-13 08:51:37'),(2,'monitor','web','2024-09-13 08:51:37','2024-09-13 08:51:37'),(3,'accesor','web','2024-09-13 08:51:37','2024-09-13 08:51:37'),(4,'cliente','web','2024-09-13 08:51:37','2024-09-13 08:51:37');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seguimientos`
--

LOCK TABLES `seguimientos` WRITE;
/*!40000 ALTER TABLE `seguimientos` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'master@email.com',NULL,'$2y$12$Buy5iZl3zCBbADvUQ15xq.wAres4wW8G2otfec0MmbY5OhpIRvxwC','Habid Sarif','123 Main St','1234567890','1980-01-01','Contactado','Ciudad Ejemplo','CC','123456789','Tarjeta de Crédito','Colombia',NULL,'2024-09-13 08:51:38','2024-09-13 08:51:38'),(2,'monitor@email.com',NULL,'$2y$12$SMH.gO8VyAfFQg8OrOH/qu8R6uiKoN.iNL1xKzyVewjkauDNpOswK','Habid Sarif','123 Main St','1234567890','1980-01-01','Contactado','Ciudad Ejemplo','CC','123456789','Tarjeta de Crédito','Colombia',NULL,'2024-09-13 08:51:39','2024-09-13 08:51:39'),(3,'accesor@email.com',NULL,'$2y$12$E9bkbezeLfYcX6j7oD4Bgu5CiOMbEUhS5A.DThcqnqhb5JFQsQCLm','Habid Sarif','123 Main St','1234567890','1980-01-01','Contactado','Ciudad Ejemplo','CC','123456789','Tarjeta de Crédito','Colombia',NULL,'2024-09-13 08:51:39','2024-09-13 08:51:39'),(4,'cliente@email.com',NULL,'$2y$12$SRMl/XcyaRw7NAKlaJOkyOjBx87XKwOZ87Pvx2F2I3eHo/vGHnODO','Habid Sarif','123 Main St','1234567890','1980-01-01','Contactado','Ciudad Ejemplo','CC','123456789','Tarjeta de Crédito','Colombia',NULL,'2024-09-13 08:51:39','2024-09-13 08:51:39');
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

-- Dump completed on 2024-09-16  9:26:32

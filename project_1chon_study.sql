-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: project_1chon_study
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `enroll_study`
--

DROP TABLE IF EXISTS `enroll_study`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enroll_study` (
  `study_num` int(8) unsigned zerofill NOT NULL,
  `mem_num` int(8) unsigned zerofill NOT NULL,
  `my_late_fee` int NOT NULL,
  PRIMARY KEY (`study_num`,`mem_num`),
  KEY `mem_num` (`mem_num`),
  CONSTRAINT `enroll_study_ibfk_1` FOREIGN KEY (`study_num`) REFERENCES `study` (`study_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `enroll_study_ibfk_2` FOREIGN KEY (`mem_num`) REFERENCES `member` (`mem_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enroll_study`
--

LOCK TABLES `enroll_study` WRITE;
/*!40000 ALTER TABLE `enroll_study` DISABLE KEYS */;
INSERT INTO `enroll_study` VALUES (00000001,00000003,0),(00000002,00000001,0),(00000002,00000003,0),(00000003,00000002,0),(00000003,00000003,0),(00000004,00000001,0),(00000004,00000002,0),(00000004,00000003,0),(00000005,00000003,0);
/*!40000 ALTER TABLE `enroll_study` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interests`
--

DROP TABLE IF EXISTS `interests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `interests` (
  `no` int NOT NULL AUTO_INCREMENT,
  `mem_num` int(8) unsigned zerofill NOT NULL,
  `interest` varchar(20) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `mem_num` (`mem_num`),
  CONSTRAINT `interests_ibfk_1` FOREIGN KEY (`mem_num`) REFERENCES `member` (`mem_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interests`
--

LOCK TABLES `interests` WRITE;
/*!40000 ALTER TABLE `interests` DISABLE KEYS */;
INSERT INTO `interests` VALUES (1,00000001,'영어회화'),(2,00000001,'자격증'),(3,00000001,'토익/토플'),(4,00000001,'프로젝트'),(5,00000001,'면접'),(6,00000002,'토익/토플'),(7,00000002,'제2외국어'),(8,00000002,'유학준비'),(9,00000003,'공무원'),(10,00000003,'NCS'),(11,00000003,'면접');
/*!40000 ALTER TABLE `interests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_calendar`
--

DROP TABLE IF EXISTS `main_calendar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `main_calendar` (
  `no` int NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_calendar`
--

LOCK TABLES `main_calendar` WRITE;
/*!40000 ALTER TABLE `main_calendar` DISABLE KEYS */;
INSERT INTO `main_calendar` VALUES (1,'TEPS','2020-05-01','2020-05-01'),(2,'TOEIC','2020-05-09','2020-05-09'),(3,'TOEIC','2020-06-07','2020-06-07'),(4,'TOEIC','2020-06-14','2020-06-14'),(5,'TOEIC','2020-06-21','2020-06-21'),(6,'TOEIC','2020-06-28','2020-06-28'),(7,'TEPS','2020-07-11','2020-07-11'),(8,'TEPS','2020-07-25','2020-07-25'),(9,'환경해커톤','2020-06-16','2020-06-18'),(10,'대한민국 인공지능 해커톤','2020-06-11','2020-06-13'),(11,'국가자격증','2020-06-05','2020-06-05'),(12,'기사자격증필기','2020-06-27','2020-06-27');
/*!40000 ALTER TABLE `main_calendar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manager`
--

DROP TABLE IF EXISTS `manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `manager` (
  `no` int NOT NULL AUTO_INCREMENT,
  `mem_num` int(8) unsigned zerofill NOT NULL,
  `authority` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`no`),
  KEY `mem_num` (`mem_num`),
  CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`mem_num`) REFERENCES `member` (`mem_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manager`
--

LOCK TABLES `manager` WRITE;
/*!40000 ALTER TABLE `manager` DISABLE KEYS */;
INSERT INTO `manager` VALUES (1,00000001,1);
/*!40000 ALTER TABLE `manager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member` (
  `mem_num` int(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `id` varchar(20) NOT NULL,
  `pw` varchar(20) NOT NULL,
  `name` varchar(10) NOT NULL,
  `phone_num` char(13) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `gender` char(1) NOT NULL,
  `profile_img` mediumblob,
  PRIMARY KEY (`mem_num`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (00000001,'sbsb','1234','진수빈','010-5124-8972','인천광역시 연수구','F',NULL),(00000002,'younghee','6644','나영희','010-1111-1111','서울 종로구','F',NULL),(00000003,'cul','5555','김철수','010-2222-2222','제주도','M',NULL);
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notice_board`
--

DROP TABLE IF EXISTS `notice_board`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notice_board` (
  `no` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `writer` varchar(20) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notice_board`
--

LOCK TABLES `notice_board` WRITE;
/*!40000 ALTER TABLE `notice_board` DISABLE KEYS */;
INSERT INTO `notice_board` VALUES (1,'공지사항 게시판 공지','해당 공지사항 글들은 오직 권한이 허용된 관리자들만 작성할 수 있습니다. 이에 문의가 있으신 분들은 댓글을 남겨주세요:)','2020-06-01','관리자'),(2,'안녕하세요 모두의 일촌 스터디 버전 관리자입니다','해당 서비스를 이용 중 신고할 만한 사유가 있다면 신고해주세요. 그에 따른 조치가 취해질 것입니다.','2020-06-02','관리자'),(3,'공지사항 테스트1','이곳은 공지사항 테스트하는 곳입니다. 댓글도 테스트해주세요','2020-06-07','관리자'),(4,'공지사항 테스트2','이곳은 공지사항 테스트하는 곳입니다. 댓글도 테스트해주세요','2020-06-07','관리자');
/*!40000 ALTER TABLE `notice_board` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notice_board_comment`
--

DROP TABLE IF EXISTS `notice_board_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notice_board_comment` (
  `no` int NOT NULL AUTO_INCREMENT,
  `notice_board_no` int NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `writer` varchar(20) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `notice_board_no` (`notice_board_no`),
  CONSTRAINT `notice_board_comment_ibfk_1` FOREIGN KEY (`notice_board_no`) REFERENCES `notice_board` (`no`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notice_board_comment`
--

LOCK TABLES `notice_board_comment` WRITE;
/*!40000 ALTER TABLE `notice_board_comment` DISABLE KEYS */;
INSERT INTO `notice_board_comment` VALUES (1,1,'test','2020-06-02','ssbb'),(2,1,'test2','2020-06-08','ssbb'),(3,2,'comment test','2020-06-08','ssbb'),(4,1,'test','2020-06-19','ssbb'),(5,1,'확인','2020-06-19','younghee'),(6,2,'굿','2020-06-19','younghee'),(7,2,'test','2020-06-19','sbsb'),(8,1,'하아아아','2020-06-19','sbsb'),(9,2,'확인','2020-06-19','cul'),(10,1,'확인','2020-06-19','cul'),(11,4,'test','2020-06-19','cul'),(12,4,'댓글을 남겨라','2020-06-19','cul');
/*!40000 ALTER TABLE `notice_board_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `study`
--

DROP TABLE IF EXISTS `study`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `study` (
  `study_num` int(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `study_name` varchar(20) NOT NULL,
  `field` varchar(20) NOT NULL,
  `host_id` varchar(20) NOT NULL,
  `introduction` text NOT NULL,
  `meeting_type` varchar(10) NOT NULL,
  `location` varchar(50) NOT NULL,
  `late_fee` int NOT NULL,
  `deadline` date NOT NULL,
  PRIMARY KEY (`study_num`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `study`
--

LOCK TABLES `study` WRITE;
/*!40000 ALTER TABLE `study` DISABLE KEYS */;
INSERT INTO `study` VALUES (00000001,'세종대 토익 스터디','토익/토스','cul','세종대 재학생 토익 900점대를 위한 스터디','온/오프 둘다','서울시 광진구',1000,'2020-09-21'),(00000002,'데이터베이스 스터디','프로젝트','cul','apache, php, mysql를 배우고 프로젝트를 만드는 스터디','온라인','서울시 광진구',500,'2020-07-03'),(00000003,'한국사 공부해요~','자격증','cul','한국사 배우는 스터디. 진짜 공부할 사람만 들어오기.','오프라인','인천광역시 연수구',2000,'2020-08-09'),(00000004,'면접준비 같이 할 사람','면접','cul','취업관련 면접준비 같이 할 사람 들어오세요.','온/오프 둘다','서울시 영등포',5000,'2020-12-23'),(00000005,'영어 공부 컴컴','영어 공부 스터디 (스피킹)','cul','만나서 영어공부해요. 지역은 제주도.','오프라인','제주도',1000,'2020-11-19');
/*!40000 ALTER TABLE `study` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `study_calendar`
--

DROP TABLE IF EXISTS `study_calendar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `study_calendar` (
  `no` int NOT NULL AUTO_INCREMENT,
  `study_num` int(8) unsigned zerofill NOT NULL,
  `title` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`no`),
  KEY `study_num` (`study_num`),
  CONSTRAINT `study_calendar_ibfk_1` FOREIGN KEY (`study_num`) REFERENCES `study` (`study_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `study_calendar`
--

LOCK TABLES `study_calendar` WRITE;
/*!40000 ALTER TABLE `study_calendar` DISABLE KEYS */;
INSERT INTO `study_calendar` VALUES (1,00000004,'1차스터디','2020-06-05','2020-06-05'),(2,00000004,'2차스터디','2020-06-12','2020-06-12'),(3,00000004,'3차스터디','2020-06-19','2020-06-19'),(4,00000004,'4차스터디','2020-06-26','2020-06-26'),(5,00000004,'모의면접','2020-06-28','2020-06-30'),(6,00000004,'자소서 점검','2020-06-08','2020-06-10'),(7,00000002,'프로젝트 시작','2020-06-20','2020-06-20'),(8,00000002,'프로젝트 아이디어 구상 및 구체화','2020-06-06','2020-06-10');
/*!40000 ALTER TABLE `study_calendar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `study_cboard`
--

DROP TABLE IF EXISTS `study_cboard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `study_cboard` (
  `no` int NOT NULL AUTO_INCREMENT,
  `study_num` int(8) unsigned zerofill NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` mediumblob,
  `date` date NOT NULL,
  `writer` varchar(20) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `study_num` (`study_num`),
  CONSTRAINT `study_cboard_ibfk_1` FOREIGN KEY (`study_num`) REFERENCES `study` (`study_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `study_cboard`
--

LOCK TABLES `study_cboard` WRITE;
/*!40000 ALTER TABLE `study_cboard` DISABLE KEYS */;
INSERT INTO `study_cboard` VALUES (1,00000004,'면접 스터디 약속 및 규칙','이곳은 해당 스터디의 규칙 및 약속에 대하여 자유자유롭게 상의해 볼 수 있는 곳입니다. 마음껏 댓글을 남겨주세요.',NULL,'2020-06-21','cul'),(2,00000004,'이곳은 인증게시판입니다','인증해주세요~',NULL,'2020-06-21','cul'),(3,00000004,'1차 스터디 과제 관련 인증','인증합니다!',NULL,'2020-06-21','sbsb');
/*!40000 ALTER TABLE `study_cboard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `study_cboard_comment`
--

DROP TABLE IF EXISTS `study_cboard_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `study_cboard_comment` (
  `no` int NOT NULL AUTO_INCREMENT,
  `cboard_no` int NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `writer` varchar(20) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `cboard_no` (`cboard_no`),
  CONSTRAINT `study_cboard_comment_ibfk_1` FOREIGN KEY (`cboard_no`) REFERENCES `study_cboard` (`no`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `study_cboard_comment`
--

LOCK TABLES `study_cboard_comment` WRITE;
/*!40000 ALTER TABLE `study_cboard_comment` DISABLE KEYS */;
INSERT INTO `study_cboard_comment` VALUES (1,3,'sbsb님 과제 인증 확인 했습니다!','2020-06-26','younghee'),(2,3,'인증 확인!:)','2020-06-27','cul'),(3,1,'네!:)','2020-06-22','sbsb'),(4,2,'네! 1차과제 인증하겠습니다:)','2020-06-22','sbsb');
/*!40000 ALTER TABLE `study_cboard_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `study_fboard`
--

DROP TABLE IF EXISTS `study_fboard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `study_fboard` (
  `no` int NOT NULL AUTO_INCREMENT,
  `study_num` int(8) unsigned zerofill NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `writer` varchar(20) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `study_num` (`study_num`),
  CONSTRAINT `study_fboard_ibfk_1` FOREIGN KEY (`study_num`) REFERENCES `study` (`study_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `study_fboard`
--

LOCK TABLES `study_fboard` WRITE;
/*!40000 ALTER TABLE `study_fboard` DISABLE KEYS */;
INSERT INTO `study_fboard` VALUES (1,00000004,'이곳은 자유게시판입니다. 의견을 마음껏 교환해주세요','자유롭게 작성해주세요','2020-06-20','cul'),(2,00000004,'안녕하세요 반갑습니다.','반가워요 잘해봅시다','2020-06-21','sbsb'),(3,00000002,'자유게시판에서 모든질문을 물어보기','모든 질문은 이곳에서 해주세요','2020-06-23','cul'),(4,00000005,'반가워요','제주도에서 영어공부하기 시작!!','2020-06-24','cul'),(5,00000002,'반갑습니다 팀원 관련 문의','팀원은 몇명이서 구현하나요?','2020-06-23','sbsb');
/*!40000 ALTER TABLE `study_fboard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `study_fboard_comment`
--

DROP TABLE IF EXISTS `study_fboard_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `study_fboard_comment` (
  `no` int NOT NULL AUTO_INCREMENT,
  `fboard_no` int NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `writer` varchar(20) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `fboard_no` (`fboard_no`),
  CONSTRAINT `study_fboard_comment_ibfk_1` FOREIGN KEY (`fboard_no`) REFERENCES `study_fboard` (`no`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `study_fboard_comment`
--

LOCK TABLES `study_fboard_comment` WRITE;
/*!40000 ALTER TABLE `study_fboard_comment` DISABLE KEYS */;
INSERT INTO `study_fboard_comment` VALUES (1,1,'네 반갑습니다','2020-06-20','sbsb'),(2,2,'반가워요 저희 언제부터 시작할지 정할까요?','2020-06-22','cul'),(3,5,'그것은 상의해 봐야할 문제입니다','2020-06-25','cul');
/*!40000 ALTER TABLE `study_fboard_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `study_map`
--

DROP TABLE IF EXISTS `study_map`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `study_map` (
  `no` int NOT NULL AUTO_INCREMENT,
  `study_num` int(8) unsigned zerofill NOT NULL,
  `title` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  PRIMARY KEY (`no`),
  KEY `study_num` (`study_num`),
  CONSTRAINT `study_map_ibfk_1` FOREIGN KEY (`study_num`) REFERENCES `study` (`study_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `study_map`
--

LOCK TABLES `study_map` WRITE;
/*!40000 ALTER TABLE `study_map` DISABLE KEYS */;
INSERT INTO `study_map` VALUES (1,00000004,'히어로스터 커피','2020-06-30',37.51253687731904,126.90739469399936),(2,00000001,'세종대학교','2020-06-29',37.5502596,127.073139);
/*!40000 ALTER TABLE `study_map` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-22  1:19:45

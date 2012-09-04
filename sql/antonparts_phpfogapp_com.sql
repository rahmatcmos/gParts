-- MySQL dump 10.13  Distrib 5.5.24, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: antonparts_phpfogapp_com
-- ------------------------------------------------------
-- Server version	5.5.24-0ubuntu0.12.04.1

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'gopang','aaa492'),(2,'gopang','aaa49211a0ecbe6cc83b25a4b87e1b62');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('769af11b60eab42e67570337f24ab48d','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:15.0) Gecko/20100101 Firefox/15.0 FirePHP/0.7.1',1346750508,'a:5:{s:9:\"user_data\";s:0:\"\";s:6:\"userid\";s:1:\"2\";s:8:\"username\";s:6:\"gopang\";s:8:\"password\";s:32:\"aaa49211a0ecbe6cc83b25a4b87e1b62\";s:9:\"validated\";b:1;}');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `part`
--

DROP TABLE IF EXISTS `part`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `part` (
  `kd_part` varchar(10) NOT NULL,
  `nama_part` varchar(30) NOT NULL,
  `lokasi_rak` varchar(5) NOT NULL,
  `spec_detail` varchar(50) NOT NULL,
  `jml_min` smallint(6) NOT NULL,
  `sat_jml_min` varchar(1) NOT NULL,
  `tlo` tinyint(1) NOT NULL,
  `time_order` smallint(6) NOT NULL,
  `sat_time_order` varchar(1) NOT NULL,
  `periode_penggantian` smallint(6) NOT NULL,
  `sat_periode_penggantian` varchar(1) NOT NULL,
  `jml_stok` smallint(6) NOT NULL,
  `sat_jml_stok` varchar(1) NOT NULL,
  `zone` varchar(2) NOT NULL,
  `ket` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_part`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `part`
--

LOCK TABLES `part` WRITE;
/*!40000 ALTER TABLE `part` DISABLE KEYS */;
INSERT INTO `part` VALUES ('00001','SPRING VIBRATING FETLING','5B06','-',2,'1',1,3,'8',15,'8',2,'1','5','-'),('00002','GUIDE BEARING BE SAND PREP','5C04','-',2,'1',1,1,'8',5,'8',2,'1','5','-'),('00003','BEARING TAKEUP APRON CONVEYOR','5C05','t314 asahi',2,'1',1,2,'8',3,'7',4,'1','5','-'),('00004','HOSE GREASE BC SAND PREP','5D05','-',4,'1',1,3,'8',3,'8',4,'1','5','-'),('00005','CLAMP CLUTCH BE 11','5D06','-',1,'2',1,3,'8',5,'8',1,'2','5','-'),('00006','ROLLER CHAIN RS 60','6A03','-',1,'3',1,1,'8',2,'8',2,'3','6','-'),('00007','ROLLER CHAIN RS 50','6A02','-',1,'3',1,1,'8',1,'8',1,'3','6','-'),('00008','SPROCKET SCREW','6B02','#80 T -1750-JAD',1,'3',1,1,'7',1,'8',1,'1','6','-'),('00009','HEAD CLAMP 52 CYLINDER','6B03','-',1,'1',0,1,'6',1,'',4,'1','6','-'),('00010','RETAINER PATTERN SHUTTLE','6C01','IMO 001',4,'1',1,1,'7',1,'8',4,'1','6','-'),('00011','BUSH CYLINDER PATTERN CLAMP','6C02','-',4,'1',1,1,'7',1,'8',4,'1','6','-'),('00012','BUSH CYLINDER','6C02','61/62 CC',2,'1',1,1,'7',1,'8',1,'1','6','-'),('00013','DOGU LS','6C02','61/62 CC',1,'1',1,1,'7',1,'8',1,'1','6','-'),('00014','SPROCKET 355 C','6C03','ICW MOTOR SIDE',1,'1',1,1,'8',2,'8',1,'1','6','-'),('00015','SPROCKET MOTOR 67 TCA','6C03',' IMC 001',1,'1',1,1,'7',2,'8',2,'1','6','-'),('00016','COLLAR','6C03','20708/040013',1,'1',1,1,'7',1,'8',1,'1','6','-'),('00017','BUSHING GUIDE ROD 35 PUSHER','6C05','JAP',4,'1',1,1,'8',2,'8',4,'1','6','-'),('00018','SPROE CUP UNTUK IMO 001','6C05','JSN 5 B 011',1,'1',1,1,'8',3,'8',1,'1','6','-'),('00019','PISTON CYLINDER PATTERN CLAMP','6C06','A 4037FC 200',2,'1',1,1,'7',1,'8',1,'1','6','-\r\n'),('00020','HEAD CYLINDER SERVO','6C06','SINTO KOGYO',2,'1',1,1,'7',3,'8',2,'1','6','-'),('00021','ROLLER HOPPER JOLT IM0 001','6C07','-',4,'1',1,1,'8',3,'7',3,'1','6','-'),('00022','ROLLER SEGMENT IMO 001','6C07','-',4,'1',2,1,'8',3,'8',3,'1','6','-'),('00023','BRACKET KNUCKLE HEAD','6C08','-',1,'1',1,1,'8',5,'8',1,'1','6','-'),('00024','BRAKET KNUCKLE H CYL HYDROLIC','6C08','-',1,'1',1,1,'8',5,'8',1,'1','6','-'),('00025','DOGU PX5 CYL 32,37,41 CLAMP','6D01','-',2,'1',1,1,'8',2,'8',2,'1','6','-'),('00026','BUSH CYL 32,37,41 CLAMP','6D01','-',2,'1',1,1,'8',4,'8',2,'1','6','-'),('00027','DOGU PX5 CYL PATTERN CLAMP','6D02','-',2,'2',1,1,'8',1,'8',2,'1','6','-'),('00028','HEAD CYLINDER PATTERN CLAMP','6D02','-',2,'1',1,1,'8',1,'8',3,'1','6','-'),('00029','BRAKE JOINT SEGMENT IMO 001','6D03','-',2,'3',1,1,'8',2,'8',4,'3','6','-'),('00030','BRAKE SERVO CYLINDER','6D04','SNB 10-6-CYA.007',2,'3',1,1,'8',4,'8',3,'3','6','-'),('00031','SHAFT CYLINDER CLAMP 32,37,41','6E01','-',2,'1',1,1,'8',4,'8',2,'1','6','-'),('00032','SHAFT CYLINDER 14,15 LI','6E01','-',2,'1',1,1,'8',4,'7',1,'1','6','-'),('00033','SHAFT CYLINDER PATTERN CLAMP','6E01','-',2,'1',1,1,'8',1,'8',2,'1','6','-'),('00034','GUIDE ROAD 14,15 LI ','6E01','-',4,'1',1,1,'8',4,'7',1,'1','6','-'),('00035','MOTOR CYL DRIVE PATTERN CHANGE','6E02','CNHM 05-6095-B.29',1,'2',1,1,'8',4,'8',1,'2','6','-'),('00036','MOTOR TRAVELING HOIST POURING','6E02','KBV 71 B8/2',2,'2',1,1,'8',1,'8',1,'2','6','-'),('00037','MOTOR HOISTING HOIST POURING','6E03','KBH 112 DENMAG',2,'2',1,1,'8',1,'8',1,'2','6','-'),('00038','SEGMENT FOST IMO 001','6F01','-',1,'3',1,1,'8',5,'8',1,'3','6','-'),('00039','PREASURE COVER VIBRATOR ','6F02','IMO 001',4,'1',1,1,'8',1,'8',8,'1','6','-'),('00040','PLATE LINER VIBRATOR','6F04',' IMO 001',4,'1',1,1,'8',1,'8',200,'1','6','-'),('00041','ROLLER','6C07','91 PS',4,'1',1,1,'8',5,'8',4,'1','6','-'),('00042','BUSH TABLE','6D02','-',2,'1',1,1,'8',5,'8',2,'1','6','-'),('00043','WOOD SPRING OSCILATING CONV','5A06','-',2,'1',1,1,'8',15,'8',-19,'1','6','-'),('00044','RUBBER WOOD SPRING ','5B07','-',4,'1',1,1,'8',15,'8',4,'1','6','-'),('00045','HANGER BUSHING OSCILATING','5B07','-',6,'1',1,1,'8',5,'8',6,'1','6','-'),('00046','SPRING MAIN HOLE MIX MULLER','5F03','-',1,'1',1,1,'8',1,'8',1,'1','6','-'),('00047','BOLT ADJUST BEARING ROLLERATOR','5F04','-',2,'1',1,1,'8',3,'8',2,'1','6','-'),('00048','strainer furnace','2b01','-',2,'1',1,1,'8',1,'8',2,'1','2','-'),('00049','NOZLE SPRAY GAS COLLER RCS','2B01','8 MM',2,'1',1,1,'8',1,'8',3,'1','2',''),('00050','WIRE GUIDE SPRINKLE','2B03','3 MM',20,'4',1,1,'8',1,'8',25,'4','2','-'),('00051','BOLT AND NUT COOLING WATER','2B04','M 10X 30 ',10,'1',1,1,'8',1,'8',30,'1','2','-'),('00052','SCREPPER FLAW SPEED MULLER RCS','4B01','NU 20-003',1,'3',1,1,'8',1,'8',1,'3','4','-'),('00053','FOOT CHUCK','4B02',' ICM 008/009',4,'1',1,1,'8',3,'8',12,'1','4','-'),('00054','CLAMP BORE CORE KNUCKLE','4B02','008/009',4,'1',1,1,'8',3,'8',13,'1','4','-'),('00055','nipple hydrolic hose core ','2b06','3/8\"',10,'1',1,1,'8',2,'7',30,'1','2','-'),('00056','sleeve heater furnace','2b08','-',1,'3',1,1,'8',1,'8',1,'3','2','-'),('00057','BOLT BUSH BAR FURNACE','2B05','M12 X 50',1,'3',1,1,'8',1,'8',1,'3','2','-'),('00058','SHIFT GUIDE DRILL ','2B09','ICD 001& 002',8,'1',1,1,'8',1,'8',8,'1','2','-'),('00059','ASBES','2C04','-',1,'2',0,1,'7',1,'9',1,'1','2','-'),('00060','sprocket kopling','2c03','cr5018-j',1,'3',1,1,'8',1,'8',1,'3','2','-'),('00061','rubber packing u/ pintu panel','2c02','10 X 40',5,'4',1,1,'8',1,'8',7,'4','2','-'),('00062','GLANAD PACKING ','2C02','GARLOCK 5/16',5,'4',1,1,'8',1,'8',15,'4','2','-'),('00063','PIN ARM ROBUTA','2D01','-',2,'1',1,1,'8',1,'8',2,'1','2','-'),('00064','SELECTOR VALVE STRAINER FURNAC','2D02','-',2,'1',1,1,'8',1,'8',-75,'1','2','-'),('00065','CLAMP STRAINER ','2D02','-',2,'1',1,1,'8',1,'8',2,'1','2','-'),('00066','SHAFT CNUCKLE CYLINDER RAISE','2D05',' (KOPLING)',1,'1',1,1,'9',1,'8',3,'1','2','-'),('00067','ARM CYLINDER ROTATE','2E01','dsfedfdsg',1,'1',0,1,'8',2,'8',-8,'1','2','-'),('00068','KNUCKLE FURNACE','2E01','-',1,'1',1,1,'8',2,'8',1,'1','2','-'),('00069','PINION GEAR CRANE 5 TON','2E02','-',1,'1',1,1,'8',1,'8',3,'1','2','-'),('00070','POMPA BALING MESIN','2D02','-',1,'2',1,1,'8',3,'8',1,'2','2','-'),('00071','ROLER TRAVEST MITSUBISHI','2D04','-',2,'1',1,1,'8',2,'7',2,'1','2','-'),('00072','SHAFT GUIDE BLOW HEAD','2E05','ICM 006/007 M16',4,'1',1,1,'8',1,'8',4,'1','2','-'),('00073','SHAFT GUIDE BLOW HEAD','2E05','icm 006/007\r\n',4,'1',1,1,'8',1,'8',4,'1','2','-'),('00074','hose hydrolic','2e06','0,5 \"  x 30',3,'1',1,1,'8',1,'8',5,'1','2','-'),('00075','POMPA HYDROLIC FONACE MELTING','2F01','-',1,'1',1,1,'8',1,'8',1,'1','2','-'),('00076','union outlate no 1,2,3 fornace','2e03','-',5,'3',1,1,'8',1,'8',5,'3','2','-'),('00077','TRAVEL WHEEL POLOS CRANE 2T','2D03','8301414A6665',4,'1',1,1,'8',1,'8',4,'1','2','-'),('00078','VALVE DRAIN DRUM OLI','2F04','-',1,'2',1,1,'8',1,'8',1,'1','2','-'),('00079','FLEXIBLE PIPA','2A02','-',1,'1',1,1,'8',1,'8',1,'1','2','-'),('00080','VALVE KITA 3\"','2A03','-',1,'1',1,1,'8',1,'8',1,'1','2','-'),('00081','MOTOR LONG TRAVEL CRANE 5T','2A04','-',1,'1',1,1,'8',1,'8',1,'2','2','-'),('00082','balancer endo kogyo crane 5t ','2a05','(5-22 kg)',1,'1',1,1,'8',6,'7',1,'1','2','-'),('00083','KABEL SOURCE CRANE 5T LONG ','2A06','TRAVEL 7x25',12,'4',1,1,'8',7,'7',50,'4','2','-'),('00084','MOTOR DUMPER BLOWER BURNER','4B08','-',1,'1',1,1,'8',2,'8',2,'1','4','-'),('00085','HOSE VICE CLAMP ICM 008 & 009','4B07','3/8\"',5,'1',1,1,'8',1,'8',6,'1','4','-'),('00086','SOLONOID HEXAMIRE','4B06','13N-5BP21-20E',1,'1',1,1,'8',1,'8',2,'1','4','-'),('00087','ROLLER DOLLY LIFTER CORE MAKIN','4B06','-',2,'1',1,1,'8',1,'8',4,'1','4','-'),('00088','screpper core making','4b05','-',2,'1',1,1,'8',1,'8',4,'1','4','-'),('00089','knuckle daisha 008/009','4b04','008/009',2,'1',1,1,'8',3,'8',1,'1','4','-'),('00090','stopper muller whell r15','4b04','r15',2,'1',1,1,'8',1,'8',4,'1','4','-'),('00091','knuckle dumper r15','4b04','r15',2,'1',1,1,'8',1,'8',3,'1','4','-'),('00092','linner reclaimer','4b04','-',1,'1',1,1,'8',1,'8',1,'1','4','-'),('00093','SHAFT BLOW VALVE OIL CORE','4BO3','-',3,'1',1,1,'8',1,'8',7,'1','4','-'),('00094','CLAMP BORE CORE CNUCKLE ','4B02','008/009',4,'1',1,1,'8',3,'8',13,'1','4','-'),('00095','FOOT KNUCKLE ICM 008/009','4B02','-',4,'1',1,1,'8',3,'8',90,'1','4','-'),('00096','SCREPPER FLAW SPEED MULLER RCS','4B01','NU20-003',1,'1',1,1,'8',1,'8',1,'1','4','-'),('00097','BAUT BE RCS','4C08','-',20,'1',1,1,'8',2,'8',90,'1','4','-'),('00098','LINER SAND GATE KM 008','4C07','-',3,'2',1,1,'8',1,'8',3,'2','4','-'),('00099','SHAFT EJECTOR 002/003','4C01','-',2,'1',1,1,'8',3,'8',6,'1','4','-'),('00100','GUIDE DRILL','4C01','-',2,'1',1,1,'8',2,'8',6,'1','4','-'),('00101','KNUCKLE CLAMP DRILL','4C01','-',2,'1',1,1,'8',2,'8',3,'1','4','-'),('00102','SHAFT GUIDE UNLOADER 008/009','4C02','-',4,'1',1,1,'8',2,'8',4,'1','4','-'),('00103','SHAFT BUSHING STOPPER ','4C02','(BLADE CRUSHER)',1,'3',1,1,'8',3,'8',1,'3','4','-'),('00104','ROLLER DAISA ','4C04','CMK 90',1,'3',1,1,'8',1,'7',1,'3','4','-'),('00105','BELT','2A01','-',1,'4',1,1,'6',1,'7',30,'1','2','-'),('00106','PULLEY SAND CRUSER','4C02','-',1,'3',1,1,'8',1,'8',1,'3','4','-'),('00107','base drill core making ','4c06','-',1,'3',1,1,'8',1,'8',2,'3','4','-'),('00108','TABLE DRILL CORE MAKING','4C06','-',1,'1',1,1,'9',1,'8',2,'1','4','-'),('00109','PIN CNUCKLE SAND GATE','4C07','-',2,'1',1,1,'8',1,'8',2,'1','4','-'),('00110','HOSING ROLLER DAISA','4D08','ICM 008/009',8,'1',1,1,'6',1,'7',8,'1','4','-'),('00111','HOSING BEARING SHAFT BLOWER','4D07','IDC 008 PRETREATH',2,'1',1,1,'8',2,'8',2,'1','4','-'),('00112','FLANGE BLOW PRESS ','4D06','ICM 003',1,'3',1,1,'8',1,'8',1,'3','4','-'),('00113','WATER FLOW COLLER CORE ','4D06','ICM 007',2,'1',1,1,'8',1,'8',2,'1','4','-'),('00114','PULLEY RECLAIMER RCS','4D05','-',1,'1',1,1,'8',1,'8',1,'1','4','-'),('00115','COVER RECLAIMER','4D05','-',1,'1',1,1,'8',1,'8',1,'1','4','-'),('00116','COVER PULLEY be','4D05','-',2,'1',1,1,'8',1,'8',2,'1','4','-'),('00117','FRONT COVER RECLAIMER ','4D05','-',2,'1',1,1,'8',1,'8',1,'1','4','-'),('00118','GUIDE ROOD EJECTOR 002/003','4D04','-',4,'1',1,1,'8',2,'8',4,'1','4','-'),('00119','SHAFT MULLER WHEEL RCS','4D04','-',2,'1',1,1,'8',1,'8',2,'1','4','-'),('00120','COVER MULLER WHEEL RCS','4E04','-',2,'1',1,1,'8',1,'8',4,'1','4','-'),('00121','BASE CHUCK 008/009AA','4D03','-',2,'3',1,1,'8',5,'8',4,'3','4','-'),('00122','DISTIBUTOR GLOW DRILL','4D02','-',1,'1',1,1,'8',2,'8',1,'1','4','-'),('00123','BUSHING GUIDE MANDRELL','4D01','UP/DOWN OO8/009',4,'1',1,1,'8',2,'8',4,'1','4','-'),('00124','ROLLER HEAD TRAF CORE MAKING','4E02','-',8,'1',1,1,'8',2,'8',8,'1','4','-'),('00125','BUSHING EJECTOR 005','4E01','-',4,'3',1,1,'8',1,'8',4,'3','4','-'),('00126','COVER EJECTOR','4E01','002/003',1,'3',1,1,'8',3,'8',1,'3','4','-'),('00127','STOPPER CYLINDER MANDRELL','4E04','-',2,'1',1,1,'8',1,'8',2,'1','4','-'),('00128','FLANGE CYLINDER MANDRELL ','4E04','-',1,'1',1,1,'8',1,'7',1,'1','4','-'),('00129','BASE MOTOR GYRATORY','4E05','-',1,'1',1,1,'8',4,'8',4,'1','4','-'),('00130','SHAFT GIUDE BLOW HEAD','4E06','ICM 002 & 003',4,'1',1,1,'8',2,'8',8,'1','4','-'),('00131','SHAFT RECLAIMER ','4E07','-',1,'1',1,1,'6',2,'8',12,'1','4','-'),('00132','COLLAR BE','4E07','-',1,'1',1,1,'8',4,'8',2,'1','4','-'),('00133','SHAFT CYLINDER MANDRELL','4E07','-',1,'1',1,1,'8',2,'7',2,'1','4','-'),('00134','EXAUST PIPE','4E07','-',1,'1',1,1,'8',5,'8',1,'1','4','-'),('00135','PULLEY OC','4E08','-',1,'3',1,1,'8',2,'8',1,'3','4','-'),('00136','BANDUL NEW VIBRATING PRETRET','4E08','-',2,'1',1,1,'8',2,'8',2,'1','4','-'),('00137','COVER SHAFT OC','4F08','-',4,'1',1,1,'8',1,'8',4,'1','4','-'),('00138','ADAPTER OC','4F08','-',4,'3',1,1,'8',1,'7',4,'3','4','-'),('00139','SHAFT BLOW HEAD  CORE MAKING','4F07','-',4,'3',1,1,'8',2,'8',8,'3','4','-'),('00140','ROLLER BLOW HEAD CORE MAKING','4F07','-',4,'3',1,1,'8',2,'8',8,'3','4','-'),('00141','FLANG BLOW NOZZLE CORE MAKING','4F06','-',4,'3',1,1,'8',2,'8',4,'3','4','-'),('00142','BEARING  FAN BLOWER  ','4F05','CORE MAKING',2,'3',1,1,'8',3,'8',1,'3','4','-'),('00143','ADAPTOR SHAFT FAN BLOWER','4F05','CORE MAKING',2,'3',1,1,'8',3,'7',1,'3','4','-'),('00144','MULLER WHEEL SPEED MULLER RCS','4F04','-',2,'3',1,1,'8',3,'7',14,'3','4','-'),('00145','NOZZLE BLOW PACKING','4F03','ICM 006/007',20,'1',1,1,'8',3,'8',20,'1','4','-'),('00146','CYLINDER VICE CLAMP 008/009','4F02','-',2,'1',1,1,'8',2,'8',2,'1','4','-'),('00147','GEAR DRIVE UNLOADER 008/009','4F01','-',2,'1',1,1,'8',2,'8',2,'1','4','-'),('00148','KNUCKLE CYLINDER CHUCK 008/009','4F01','OPEN AND CLOSE',2,'1',1,1,'8',3,'8',2,'1','4','-'),('00149','ENGSEL ARM CHUCK','4F01','-',4,'1',1,1,'8',3,'8',8,'1','4','-'),('00150','HOSE HYDROLIC & isolator','4a01','core making',1,'4',1,1,'8',1,'8',2,'1','4','-'),('00151','NEPLE CORE HYDROLIC','2B07','1/4\"',101,'1',1,1,'8',1,'8',40,'1','2','-'),('00152','TSP CUPLA JOIN','2B07','3/8\"',5,'3',1,1,'8',1,'8',5,'3','2','-'),('00153','BOLT AND NUT 16x 60','2B04','-',10,'1',1,1,'8',1,'8',7,'1','2','-'),('00154','LINEER BUSH ','2B09','-',4,'1',1,1,'8',1,'8',4,'1','2','-'),('00155','REDUCER ','2B10','3/4 X 1/2\"',5,'1',1,1,'8',2,'8',9,'1','2','-'),('00156','DOUBLE NIPLE L ','2B10','-',3,'1',1,1,'8',2,'8',3,'1','2','-'),('00157','POMPA BALING MESIN','2D02','-',1,'2',1,1,'8',3,'8',1,'2','2','-'),('00158','SCRAPPER CORE MAKING','4B05','20X100',2,'1',1,1,'8',1,'8',4,'1','4','-'),('00159','SCRAPPER CORE MAKING','4B05','50X500',2,'1',1,1,'8',1,'8',2,'1','4','-'),('00160','SCRAPPER CORE MAKING','4B05','50X400',2,'1',1,1,'8',1,'8',4,'1','4','-'),('00161','LINNER SAND GATE','4C07','KM 008',2,'2',1,1,'8',1,'8',3,'2','4','-'),('00162','FLOAT VALVE FILTER 2,5\"','4C03','-',1,'1',1,1,'8',1,'8',2,'1','4','-\r\n'),('00163','RUBER PACKING U/ PINTU PANEL','2C02','10X40',5,'1',1,1,'8',1,'8',7,'4','2','-'),('00164','GLAND PACKING','2C02','GARLOCK 5//6',5,'1',1,1,'8',1,'8',5,'4','2','-'),('00165','drill uryu','2c01','ud 60 s-29',1,'1',1,1,'8',1,'8',1,'2','2','-'),('00166','PIN CYL ATAS','2D01','-',2,'1',1,1,'8',1,'8',4,'1','2','-'),('00167','PIN CYL BAWAH','2D01','-',2,'1',1,1,'8',1,'8',3,'1','2','-'),('00168','ARM CYLINDER ROTATE','2E01','-',1,'1',1,1,'8',2,'8',15,'1','2','-'),('00169','KNUCKLE FINANCE','2E01','-',1,'1',1,1,'8',2,'8',1,'1','2','-'),('00170','PINION GEAR CRANE 5TON','2E02','-',4,'1',1,1,'8',1,'8',3,'1','2','-'),('00171','COVER MULLER WHEEL','2E04','-',2,'1',1,1,'8',1,'8',4,'1','2','-'),('00172','BRACKET GUIDE BLOWH END ICM ','2E05','006/007',4,'1',1,1,'8',1,'8',4,'1','2','-'),('00173','HOSE HYDROLIC 1/2\"X20','2E06','-',3,'1',1,1,'8',1,'8',3,'1','2','-'),('00174','HOSE HYDROLIC 1/2\"X40','2E06','-',3,'1',1,1,'8',1,'8',5,'1','2','-'),('00175','CONICAL TRAVEL WHEEL POLOS','2F02','SEPASANG',1,'1',1,1,'8',1,'8',1,'1','2','-'),('00176','CONICAL TRAVEL WHEEL GEAR','2F02','160-151K',1,'1',1,1,'8',1,'8',1,'1','2','-'),('00177','PULLEY RECLAIMER RCS','4D05','-',1,'1',1,1,'8',1,'8',1,'1','4','-'),('00178','COVER RECLAIMER','4D05','-',1,'1',1,1,'8',1,'8',1,'1','4','-'),('00179','COVER PULLEY BE','4D05','-',2,'1',1,1,'8',1,'8',2,'1','4','-'),('00180','SHAFT GUIDE MANDRELL UP/DOWN','4D01','-',4,'1',1,1,'8',1,'8',4,'1','4','-'),('00181','SHAFT BUSING STOPPER','4C02','-',1,'3',1,1,'8',3,'8',1,'1','4','-'),('00182','GATE BELT RCS LINE','4C09','-',1,'1',1,1,'8',1,'8',3,'1','4','-'),('00183','ADAPTOR SHAFT steering','4D05','-',3,'1',1,1,'8',1,'8',-100,'1','4','-'),('00184','level switch sand cruser','3b02','-',1,'1',1,1,'8',1,'8',1,'1','3','-'),('00185','hardenet pump','3b03','cont mix d/p ',1,'1',1,1,'8',1,'8',1,'1','3','-'),('00186','blower unit drying pp','3c10','-',2,'1',1,1,'8',1,'8',1,'1','3','-'),('00187','ceramic reclaimer set','3c10','-',1,'1',1,1,'8',1,'8',1,'1','3','-'),('00188','v belt c90','3c01','0c d/p',3,'1',1,1,'8',1,'8',3,'1','3','-'),('00189','v-belt 5v -1180','3b01','smoke colector',3,'1',1,1,'8',1,'8',3,'1','3','-'),('00190','hose resin or hardener','3c05',' contirous mixing ',5,'4',1,1,'8',1,'8',3,'4','3','-'),('00191','clamp wire ','3c03','20/40 d/p',10,'1',1,1,'8',3,'8',10,'1','3','-'),('00192','bolt hardening','3c02','ladel ngk',8,'1',1,1,'6',1,'8',50,'1','3','-'),('00193','SIDE LINER ','3C01','HSB 004',4,'2',1,1,'8',1,'8',4,'2','3','-'),('00194','PIPA PENEUMATIC CONVEYOR','3D01','D/P',2,'2',1,1,'8',1,'8',4,'2','3','-'),('00195','URETAIN STOPPER','3C05','CRANE 40 TON',4,'1',1,1,'8',1,'8',4,'1','3','-'),('00196','STOPPER LINER','3C08','HSB 008',1,'2',1,1,'8',1,'8',1,'2','3','-'),('00197','SIDE PLATE','3C07','HSB 004',1,'2',1,1,'8',10,'7',1,'2','3','-'),('00198','ED LINER TOP/BOTTOM','3C06','HSB D/P',2,'2',1,1,'8',1,'8',4,'2','3','-'),('00199','CHAIN HOIST ','3D05','10 TON D/P',1,'3',1,1,'8',2,'8',1,'3','3','-'),('00200','HAND BREKER','3E07','TO KU DIP',1,'1',1,1,'8',1,'8',2,'1','3','-'),('00201','PULLEY DRIVE TAKE UP','3E02','IDC 009',1,'3',1,1,'8',2,'8',1,'3','3','-'),('00202','PLUG RECLAIMER ','3E06','SEND RECLAIMER',1,'1',1,1,'8',3,'8',2,'1','3','-'),('00203','SHAFT BLOWER ','3E04','DRYING D/P',2,'1',1,1,'8',1,'8',1,'1','3','-'),('00204','SHAFT RODA','3E03','CRANE 5 20/40 TON',1,'2',1,1,'8',3,'8',1,'2','3','-'),('00205','SHAFT STEERING ','3E05','LADEL NGK',1,'2',1,1,'8',1,'8',1,'2','3','-'),('00206','PULLEY DRIVE TAKE UP','3E01','IDC 0010',1,'3',1,1,'8',2,'7',1,'3','3','-'),('00207','BANDUL WIRE  FOR CRANE 40','3D04','545C',1,'1',1,1,'8',1,'8',1,'1','3','-'),('00208','SPROCKET MOTOR ','3D03','FOR LADLE 10 TON 545 C',1,'3',1,1,'8',2,'8',1,'3','3','-'),('00209','WORM GEAR ','3F03','LADLE NGK',2,'3',1,1,'8',1,'8',22,'3','3','-'),('00210','SHAFT LONG TRAVER','3F01','CRANE 40 TON',1,'2',1,1,'8',2,'8',2,'2','3','-'),('00211','SHAFT SHORT TRAVER ','3F02','CRANE 40 TON',1,'2',1,1,'8',2,'8',1,'2','3','-'),('00212','COPLING MOTOR LADLE 10 TON','3D04','545C',1,'2',1,1,'8',2,'8',1,'2','3','-'),('00213','WHEEL GEAR','3F04','LADLE NGK',1,'3',1,1,'8',1,'8',2,'2','3','-'),('00214','UNION PIPE','3C04','3/4\"',5,'1',1,1,'6',1,'8',11,'1','3','-'),('00215','UNION PIPA','3c04','1/2 \"',5,'1',1,1,'6',1,'8',8,'1','3','-'),('00216','sock  derat dalam','3c04','1/2\"',2,'1',1,1,'6',1,'8',2,'1','3','-'),('00217','SOCK DERAT LUAR','3C04','1/2\"',1,'1',1,1,'6',1,'8',1,'1','3','-'),('00218','PACKING PIPA PENEUMATIC CONV','3C05','-',2,'1',1,1,'6',1,'7',3,'1','3','-'),('00219','ssdf','sdfs','sdfsd',21,'1',2,1,'6',2,'8',40,'1','1','1221323'),('00222','POSOD','sdfsd','3fdsfsdf',3,'1',1,2,'6',3,'8',32,'1','2',''),('D-323-4234','SODOP','23fef','23dfgdgf',3,'2',1,3,'6',5,'8',232,'2','1',''),('B-774-434','Contoh','775','Detail',3,'1',1,2,'6',2,'9',32,'1','3','Testing');
/*!40000 ALTER TABLE `part` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `part_pesan`
--

DROP TABLE IF EXISTS `part_pesan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `part_pesan` (
  `kode_pp` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `kd_pesan` varchar(20) DEFAULT NULL,
  `kd_part` varchar(10) DEFAULT NULL,
  `jml` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`kode_pp`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `part_pesan`
--

LOCK TABLES `part_pesan` WRITE;
/*!40000 ALTER TABLE `part_pesan` DISABLE KEYS */;
/*!40000 ALTER TABLE `part_pesan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pesan`
--

DROP TABLE IF EXISTS `pesan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pesan` (
  `kd_pesan` varchar(20) NOT NULL,
  `tgl_pesan` datetime DEFAULT NULL,
  `jenis_pesan` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`kd_pesan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pesan`
--

LOCK TABLES `pesan` WRITE;
/*!40000 ALTER TABLE `pesan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pesan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `satuan`
--

DROP TABLE IF EXISTS `satuan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `satuan` (
  `kd_sat` smallint(6) NOT NULL,
  `ket_sat` varchar(20) NOT NULL,
  PRIMARY KEY (`kd_sat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `satuan`
--

LOCK TABLES `satuan` WRITE;
/*!40000 ALTER TABLE `satuan` DISABLE KEYS */;
INSERT INTO `satuan` VALUES (1,'pcs'),(2,'unit'),(3,'set'),(4,'meter'),(5,'pack'),(6,'hari'),(8,'bulan'),(9,'tahun'),(7,'minggu'),(10,'lot');
/*!40000 ALTER TABLE `satuan` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-09-04 17:15:35

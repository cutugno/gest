-- MySQL dump 10.13  Distrib 5.5.53, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: gest
-- ------------------------------------------------------
-- Server version	5.5.53-0ubuntu0.14.04.1

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
-- Table structure for table `avvocati`
--

DROP TABLE IF EXISTS `avvocati`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avvocati` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `cognome` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(40) NOT NULL DEFAULT '310f33551bf8516f35af19723698ebcf9d659d1e',
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avvocati`
--

LOCK TABLES `avvocati` WRITE;
/*!40000 ALTER TABLE `avvocati` DISABLE KEYS */;
INSERT INTO `avvocati` VALUES (1,'Giorgio','Cutugno','cutugno','','sberz666@gmail.com'),(2,'Tom','Cap','tomcap','','tomcap@gmail.com');
/*!40000 ALTER TABLE `avvocati` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `azioni`
--

DROP TABLE IF EXISTS `azioni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `azioni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descrizione` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `date_create` datetime NOT NULL,
  `date_edit` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `azioni`
--

LOCK TABLES `azioni` WRITE;
/*!40000 ALTER TABLE `azioni` DISABLE KEYS */;
INSERT INTO `azioni` VALUES (7,'azione di prova',1,'2016-12-29 11:34:53','2016-12-30 15:40:32'),(8,'prova',0,'2016-12-29 11:34:53','2016-12-29 16:50:40');
/*!40000 ALTER TABLE `azioni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campi`
--

DROP TABLE IF EXISTS `campi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_azioni` int(11) NOT NULL,
  `descrizione` varchar(100) NOT NULL,
  `editabile` int(11) NOT NULL DEFAULT '0',
  `date_create` datetime NOT NULL,
  `date_edit` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campi`
--

LOCK TABLES `campi` WRITE;
/*!40000 ALTER TABLE `campi` DISABLE KEYS */;
INSERT INTO `campi` VALUES (5,7,'prova&',1,'2016-12-30 15:27:49','2016-12-30 15:30:09'),(6,7,'prova 2',0,'2016-12-30 15:28:07','2016-12-30 15:28:16');
/*!40000 ALTER TABLE `campi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('c026f7ea7c5955c7929e31d90c9c84f0b7b458da','127.0.0.1',1482947027,'__ci_last_regenerate|i:1482946968;'),('6a9457fc1048054217374c2f4e8eb56f7b5eef3a','127.0.0.1',1482947460,'__ci_last_regenerate|i:1482947317;'),('1e1bcab3f3a021bb7e2ab2abf5efc1ee705e6a3c','127.0.0.1',1482949398,'__ci_last_regenerate|i:1482949122;'),('ebcc90bf3e046fef253f62f77b6fc2375ae119a1','127.0.0.1',1482949704,'__ci_last_regenerate|i:1482949603;'),('f8c629102ed961de389ac8ffc3ab997f4055bd8d','127.0.0.1',1482950197,'__ci_last_regenerate|i:1482949921;'),('7aae50807ad51243f943b9c3dfe7aae60e7d411b','127.0.0.1',1482950275,'__ci_last_regenerate|i:1482950255;'),('fe552e5f476c93a91648713139a7a41717030083','127.0.0.1',1482950827,'__ci_last_regenerate|i:1482950647;'),('dde34a8337fefafb9985aff7183c48db3a8d282f','127.0.0.1',1482951370,'__ci_last_regenerate|i:1482951126;'),('b798b4050f734c91df3e6dee1d77af4b5b10d4be','127.0.0.1',1482951735,'__ci_last_regenerate|i:1482951614;'),('eolhu9oka64hqhvrgd716p1t2ulatha0','127.0.0.1',1482998523,'__ci_last_regenerate|i:1482998523;'),('6vntbv8ul9hdt2101tfpcr8mv3fh7m0k','127.0.0.1',1482999640,'__ci_last_regenerate|i:1482999347;'),('3lurtccan7d9u3374k598ickad27tpr8','127.0.0.1',1482999956,'__ci_last_regenerate|i:1482999658;'),('kgl35j99gb0pa0bfbiabpfaa2vfb3sjg','127.0.0.1',1483000309,'__ci_last_regenerate|i:1483000012;'),('2tcgdan2qb2v6ksedj1abhns06ctgcfq','127.0.0.1',1483000631,'__ci_last_regenerate|i:1483000351;'),('h53i9kj1fek0fufc1k1gsa398jj8ies3','127.0.0.1',1483000897,'__ci_last_regenerate|i:1483000686;'),('gmioq4vbolvre7f366d9rhddtqc8j557','127.0.0.1',1483001570,'__ci_last_regenerate|i:1483001302;'),('g9pb125b0lc1i7p1hpkvsik9fb9l9sde','127.0.0.1',1483001892,'__ci_last_regenerate|i:1483001612;'),('pius7apjaj8s5r75dqu7b6r69h54taid','127.0.0.1',1483002214,'__ci_last_regenerate|i:1483001934;'),('kmc5i526396hcbi9itk7rr2iruv3m4c1','127.0.0.1',1483002493,'__ci_last_regenerate|i:1483002243;'),('kj8du8fe9ikvpooeda4bu78tqca8pt2i','127.0.0.1',1483002830,'__ci_last_regenerate|i:1483002558;'),('25251a5t3kle1g36f5jdj1c69esb8lfm','127.0.0.1',1483003314,'__ci_last_regenerate|i:1483003022;'),('7ugir32p7tb1ichunee3ukt0bdifia23','127.0.0.1',1483003594,'__ci_last_regenerate|i:1483003326;'),('allpgggcu9q3q83bbu1tp43gp5c957lh','127.0.0.1',1483003971,'__ci_last_regenerate|i:1483003689;'),('gg47lanijbebm24m8o1mukmqs6ckp4rd','127.0.0.1',1483004345,'__ci_last_regenerate|i:1483004053;'),('5t3mjp7hfl7dm1ahgr9v945mln73jrtu','127.0.0.1',1483004617,'__ci_last_regenerate|i:1483004366;'),('6tdrc356ov9v9p2mi39rfit19s006hft','127.0.0.1',1483004798,'__ci_last_regenerate|i:1483004674;'),('0ma5qn1nasdhr1ulos6ufgddq1foie12','127.0.0.1',1483005280,'__ci_last_regenerate|i:1483004980;'),('mj3f8eusv2s61rin4sohh5f4nnb7ohme','127.0.0.1',1483005282,'__ci_last_regenerate|i:1483005282;'),('f7ofa98fmu7ufqnr0hol8oscn5fpft2b','127.0.0.1',1483005715,'__ci_last_regenerate|i:1483005616;'),('t37jjkfall18401iu552dkqvb4pjti3d','127.0.0.1',1483006413,'__ci_last_regenerate|i:1483006413;'),('0epq6l7g4h50tn62fsv969kgf6r5blcf','127.0.0.1',1483006806,'__ci_last_regenerate|i:1483006778;'),('jppg9t2hshl6op5a4nik614lgovhc7hh','127.0.0.1',1483007499,'__ci_last_regenerate|i:1483007210;__ci_vars|a:1:{s:9:\"insazione\";s:3:\"old\";}insazione|i:1;'),('r1vneavgfb7ugh7q2fc0allii9p9vl4t','127.0.0.1',1483007409,'__ci_last_regenerate|i:1483007242;errornuovaazione|s:48:\"Descrizione non inserita. Descrizione duplicata.\";__ci_vars|a:3:{s:16:\"errornuovaazione\";s:3:\"new\";s:7:\"nodescr\";s:3:\"old\";s:9:\"dupldescr\";s:3:\"new\";}nodescr|s:26:\"Descrizione non inserita. \";dupldescr|s:22:\"Descrizione duplicata.\";'),('c3l85g8v10a8nrrrpjf11bakjs0s3o9c','127.0.0.1',1483007745,'__ci_last_regenerate|i:1483007551;errornuovaazione|s:0:\"\";__ci_vars|a:1:{s:16:\"errornuovaazione\";s:3:\"old\";}'),('r6s62eg4fqsliqr8ekifrtae46486cse','127.0.0.1',1483008122,'__ci_last_regenerate|i:1483007990;'),('rge34ohhr0dto74pg3238m64sqqfqpq2','127.0.0.1',1483008751,'__ci_last_regenerate|i:1483008609;'),('vlh20p6hjemapooeudkrb28j4j48lg8k','127.0.0.1',1483009043,'__ci_last_regenerate|i:1483009043;'),('7r50ituf5iijdfddcm6tho3t34m63839','127.0.0.1',1483009900,'__ci_last_regenerate|i:1483009633;'),('fl2cpm0ss8b0vhib9mvevqff6fc94q1j','127.0.0.1',1483010234,'__ci_last_regenerate|i:1483009960;'),('aorp5gl7fq0nbrlslr0rd3bld3g6749u','127.0.0.1',1483010623,'__ci_last_regenerate|i:1483010336;'),('4dc4uo34a57i7kjvp019vr91qb1hloh1','127.0.0.1',1483010955,'__ci_last_regenerate|i:1483010660;'),('75cubpsopghivk3eqii34vld37q7mjm0','127.0.0.1',1483011126,'__ci_last_regenerate|i:1483010963;nodescr|s:26:\"Descrizione non inserita. \";__ci_vars|a:1:{s:7:\"nodescr\";s:3:\"new\";}'),('t6v8i82ao76t131kt6pfocl6ocjcg2hp','127.0.0.1',1483011266,'__ci_last_regenerate|i:1483011202;errornuovaazione|s:26:\"Descrizione non inserita. \";__ci_vars|a:2:{s:16:\"errornuovaazione\";s:3:\"new\";s:7:\"nodescr\";s:3:\"new\";}'),('8p4g239bnki6ojalgsf741tr449940f2','127.0.0.1',1483011795,'__ci_last_regenerate|i:1483011789;errornuovaazione|s:26:\"Descrizione non inserita. \";__ci_vars|a:2:{s:16:\"errornuovaazione\";s:3:\"new\";s:7:\"nodescr\";s:3:\"new\";}'),('n6h7uni72bo0vbiu3i3hjirva9uih9h6','127.0.0.1',1483012335,'__ci_last_regenerate|i:1483012095;'),('ohp1k6g7mttrrsc35pm750gfu97o4kma','127.0.0.1',1483012722,'__ci_last_regenerate|i:1483012521;'),('52bmgg4vhe1ke76henb2nkljc2a38ba2','127.0.0.1',1483017120,'__ci_last_regenerate|i:1483016854;'),('rl22610d6bj9tbak8f6dbckktkr922a5','127.0.0.1',1483017452,'__ci_last_regenerate|i:1483017168;errornuovaazione|s:0:\"\";__ci_vars|a:1:{s:16:\"errornuovaazione\";s:3:\"new\";}'),('2c3t1khhcgts1fcfihc2f4av8v0ioa9i','127.0.0.1',1483017738,'__ci_last_regenerate|i:1483017480;'),('t6j8mqmpa7ofbhaa4fi6e9fpd0g1dua2','127.0.0.1',1483017925,'__ci_last_regenerate|i:1483017809;'),('v28hnbt5m6rqgdm949ddslber8bqpr53','127.0.0.1',1483018512,'__ci_last_regenerate|i:1483018214;'),('1l5h2gb6b6mkq6v7c7msg3ircbpo24kc','127.0.0.1',1483018794,'__ci_last_regenerate|i:1483018535;'),('8f4bnqmke39ubnr9qkmja1qp1kj5e64u','127.0.0.1',1483019162,'__ci_last_regenerate|i:1483018887;'),('bhmmegi96q4la98tev6fsngl5cnlr5jm','127.0.0.1',1483019467,'__ci_last_regenerate|i:1483019189;'),('q4n9saff7svkvao4uknktdtnj2bufgbc','127.0.0.1',1483019742,'__ci_last_regenerate|i:1483019475;'),('ak6scgib29h1hoeglqk3kulk9hc096kn','127.0.0.1',1483019944,'__ci_last_regenerate|i:1483019646;'),('rmm3ipt7sn1ck65i9rvcudk7ql7fo9kv','127.0.0.1',1483020240,'__ci_last_regenerate|i:1483019960;'),('vq9n77pmmmijd3gucudvrtqvgqock1b3','127.0.0.1',1483020371,'__ci_last_regenerate|i:1483020327;'),('lhto0omlogj9d57m8vijvq1biem4n8qo','127.0.0.1',1483020971,'__ci_last_regenerate|i:1483020685;errornuovaazione|s:26:\"Descrizione non inserita. \";__ci_vars|a:2:{s:16:\"errornuovaazione\";s:3:\"new\";s:7:\"nodescr\";s:3:\"new\";}'),('0u0g9lilb9b7hmfpa6hs92nk2o1a2eg6','127.0.0.1',1483021372,'__ci_last_regenerate|i:1483021086;'),('i4og6o535fedp5t8sqf1nmhlv78qfsnm','127.0.0.1',1483021150,'__ci_last_regenerate|i:1483021108;errornuovaazione|s:0:\"\";__ci_vars|a:1:{s:16:\"errornuovaazione\";s:3:\"new\";}'),('6cnapgv66op989amocgltubr09os5g1r','127.0.0.1',1483021498,'__ci_last_regenerate|i:1483021454;'),('klovonoiqd0npm1krsj1g1su87uf56k8','127.0.0.1',1483022216,'__ci_last_regenerate|i:1483021923;'),('fin091g0ncvuna87hk1ij7nafk7gseci','127.0.0.1',1483022564,'__ci_last_regenerate|i:1483022295;'),('kqki1pmvpl7tnnnphho9ccqmj34qeqif','127.0.0.1',1483022906,'__ci_last_regenerate|i:1483022639;'),('cfeik67ai8vjp5o8s9sa1pq6q9jvab3e','127.0.0.1',1483023732,'__ci_last_regenerate|i:1483023534;'),('mt96h0h8psprbsad8r6rmb5r015t1jd7','127.0.0.1',1483024248,'__ci_last_regenerate|i:1483024054;'),('prn5rnfe4dfisakqg21btiepakhpbeuj','127.0.0.1',1483024873,'__ci_last_regenerate|i:1483024441;nodescr|s:26:\"Descrizione non inserita. \";__ci_vars|a:1:{s:7:\"nodescr\";s:3:\"new\";}'),('c0d8oaa2udg0livv2mjf6kaa379mli6q','127.0.0.1',1483025154,'__ci_last_regenerate|i:1483024943;'),('fpkevpcju84oblu40am1apd89tb9p737','127.0.0.1',1483025276,'__ci_last_regenerate|i:1483025161;dupldescr|s:22:\"Descrizione esistente.\";__ci_vars|a:1:{s:9:\"dupldescr\";s:3:\"new\";}'),('lnclhkh4c6324f7il8k3g3q1u87a9qv6','127.0.0.1',1483026087,'__ci_last_regenerate|i:1483025867;'),('gn85qt1qttae8nrmdspbm68ooajbhnpo','127.0.0.1',1483026050,'__ci_last_regenerate|i:1483026050;'),('bhi8pr8kf42ck9ed60101ea6rijudpaa','127.0.0.1',1483026870,'__ci_last_regenerate|i:1483026618;'),('j89kif83vpfbmafvf0rviv89vg9ovgds','127.0.0.1',1483026859,'__ci_last_regenerate|i:1483026859;'),('k7f5e0h6e2gimevlp5jgrblr64abr6sn','127.0.0.1',1483027409,'__ci_last_regenerate|i:1483027212;'),('cn6rnb870apu5oafdv1fkggckd7pt123','127.0.0.1',1483027584,'__ci_last_regenerate|i:1483027464;'),('8tbo03231ktfn37rtg2sijl2hchh85rq','127.0.0.1',1483028328,'__ci_last_regenerate|i:1483028029;'),('avligngn4kaiigq4usvajv59itg5cko7','127.0.0.1',1483028172,'__ci_last_regenerate|i:1483028033;'),('j8us8h7k27lgjv5etovn75vvh19lu0uu','127.0.0.1',1483028582,'__ci_last_regenerate|i:1483028356;'),('92av7jh0tbpmspnov5mu71fej7g3t1fq','127.0.0.1',1483028922,'__ci_last_regenerate|i:1483028677;'),('el6isv3g9oco7vorn0gr1jkn105ar1ut','127.0.0.1',1483028860,'__ci_last_regenerate|i:1483028860;'),('6pl2jg5ov7j6n4sdc5ll2sh3gv9o7d0h','127.0.0.1',1483030426,'__ci_last_regenerate|i:1483030311;'),('n0ul0vvqnkskq1mrg7701vnms75sgu8f','127.0.0.1',1483030465,'__ci_last_regenerate|i:1483030338;'),('3fvcumd5lnmi9ig1nttfra6kbcnmgg62','127.0.0.1',1483087090,'__ci_last_regenerate|i:1483086799;'),('tous18frdhrp37if8ogfbtrghuc0h45m','127.0.0.1',1483087177,'__ci_last_regenerate|i:1483087137;'),('040hd1ll2f6n2lkqpt3otkh6b60nt48p','127.0.0.1',1483087526,'__ci_last_regenerate|i:1483087299;'),('5723fmidu6bt0bcderkfum8cin6lcvph','127.0.0.1',1483087911,'__ci_last_regenerate|i:1483087686;'),('upgjk58di6beqbg6o4nk6159ps6kadno','127.0.0.1',1483088695,'__ci_last_regenerate|i:1483088656;'),('92k50qlukhk8v31vn219bo99lughedn3','127.0.0.1',1483088766,'__ci_last_regenerate|i:1483088702;'),('61gksqg41so1jirmpkr85ueuvpms4scg','127.0.0.1',1483089210,'__ci_last_regenerate|i:1483089002;'),('5ne1935g81qmvk9brbhgc5e70kam90sf','127.0.0.1',1483089561,'__ci_last_regenerate|i:1483089323;'),('nadut2tode804vd8qctchnjkdaagogo3','127.0.0.1',1483089911,'__ci_last_regenerate|i:1483089624;'),('dthf8mlhcpndl3ue5vh96d3b4a5a605c','127.0.0.1',1483090157,'__ci_last_regenerate|i:1483090044;'),('k7i8sd388ijjpvn4a0hfo7vudo0jvg6h','127.0.0.1',1483090269,'__ci_last_regenerate|i:1483090257;'),('dl9idn5g67vjn11macp8pu8293b6qnuq','127.0.0.1',1483090965,'__ci_last_regenerate|i:1483090927;'),('gargjgr0be0dq78mc9bl15is0799nis5','127.0.0.1',1483092045,'__ci_last_regenerate|i:1483091750;'),('c2nhcne4ro6povr3lfg4mshbtm8fb4mo','127.0.0.1',1483092298,'__ci_last_regenerate|i:1483092082;'),('1jfbh0ffsnbmrses9t75meohtr7ah7sk','127.0.0.1',1483092246,'__ci_last_regenerate|i:1483092220;'),('tkl1po5s3tfdmckv9vb5h5kp4v9fvd8b','127.0.0.1',1483092966,'__ci_last_regenerate|i:1483092735;'),('bb6kesbcatgkip7517dnj0v4oi7n34c6','127.0.0.1',1483093364,'__ci_last_regenerate|i:1483093080;'),('nbf7oqast7u5p3ddr4ojrssov890mqv3','127.0.0.1',1483093217,'__ci_last_regenerate|i:1483093193;'),('uitpi4vcq8867eiqvhhsg9kqq1adl4j5','127.0.0.1',1483093671,'__ci_last_regenerate|i:1483093422;'),('bfcfi8qel0qlhv33vbkbunkdo9or4sva','127.0.0.1',1483093990,'__ci_last_regenerate|i:1483093694;'),('56u105ue8fi4noq99kqndsu65evgqglm','127.0.0.1',1483094094,'__ci_last_regenerate|i:1483094030;'),('1mcr2p74eh44tb7rutkqnkks4gv4g0lf','127.0.0.1',1483094594,'__ci_last_regenerate|i:1483094353;'),('vbp79rm92o4foataha1mq739gngfjb7l','127.0.0.1',1483094733,'__ci_last_regenerate|i:1483094670;'),('sr34qeinipg584mmq8v0e97prub5t7ul','127.0.0.1',1483095087,'__ci_last_regenerate|i:1483094816;'),('8uc2pa55b7skig5hogi01ohsn4ta38n4','127.0.0.1',1483095316,'__ci_last_regenerate|i:1483095144;'),('0nrq09qv9g2uqmsghmhktr2ivt316bkj','127.0.0.1',1483095733,'__ci_last_regenerate|i:1483095597;'),('grpfolh1l5n5ag8sak2jqomv5vcagac7','127.0.0.1',1483096087,'__ci_last_regenerate|i:1483096083;'),('f08jmn99h0ukopbjpnapq2snoic8m5fr','127.0.0.1',1483097712,'__ci_last_regenerate|i:1483097429;'),('flhfnlplovc98u9137mmp9i2d8f8hesq','127.0.0.1',1483098245,'__ci_last_regenerate|i:1483097954;'),('34ljr9a0593slf850gldorl37d0sl82r','127.0.0.1',1483098269,'__ci_last_regenerate|i:1483097991;'),('b6fh2vhgch76mpapdttv0rai645su204','127.0.0.1',1483098644,'__ci_last_regenerate|i:1483098353;'),('mpilq4q08dvaqi3ns6aajql0qm96f694','127.0.0.1',1483098860,'__ci_last_regenerate|i:1483098561;'),('bhpssdl67okl638kjncm4943krcrgr1r','127.0.0.1',1483098962,'__ci_last_regenerate|i:1483098737;'),('96i57pc1hcn5revc6jmmi0v1btm9gajm','127.0.0.1',1483107095,'__ci_last_regenerate|i:1483106851;'),('pcf4sgenljf8gflt4tr7tofi91dq8345','127.0.0.1',1483107296,'__ci_last_regenerate|i:1483107177;'),('4olnchhm5rs67ih84tsi2vnvb4v3423p','127.0.0.1',1483107551,'__ci_last_regenerate|i:1483107302;'),('8lsvrc3ed9ls8a2ep35v8o51shckd457','127.0.0.1',1483108122,'__ci_last_regenerate|i:1483107838;'),('hb2q76eaq91epat05gl9jttnj7eglkfj','127.0.0.1',1483108097,'__ci_last_regenerate|i:1483107869;'),('366btd9frh8ndgktalg2i9urt4iqru33','127.0.0.1',1483108421,'__ci_last_regenerate|i:1483108203;'),('akgonsbgb25l6g6b7a3a7rsjho8df36h','127.0.0.1',1483108575,'__ci_last_regenerate|i:1483108446;'),('5duhj3snasjj1d121eriksp9ehc9csfe','127.0.0.1',1483108681,'__ci_last_regenerate|i:1483108634;'),('cmloa6lcehm01tb1ijsi996fso7pvaco','127.0.0.1',1483108901,'__ci_last_regenerate|i:1483108755;'),('jvd78j2kvk6hhcdt01klrdv2mte5uj1n','127.0.0.1',1483109238,'__ci_last_regenerate|i:1483108972;'),('v5q0rtjjerqhjd8e4kjlescdl501u7cc','127.0.0.1',1483109335,'__ci_last_regenerate|i:1483109333;'),('n6k79vijd3dnvn5j65quc9o13e43vkno','127.0.0.1',1483110309,'__ci_last_regenerate|i:1483110309;'),('2qcjmfvkh3are19r66h50pgj95m7tfp6','127.0.0.1',1483110696,'__ci_last_regenerate|i:1483110506;'),('731c685jeqr9f8t651urca0i2bqg6b9r','127.0.0.1',1483111113,'__ci_last_regenerate|i:1483110830;'),('s92gg7i2ku9hjdb881vo0matb55v76vu','127.0.0.1',1483111415,'__ci_last_regenerate|i:1483111142;'),('irts706256vo2gnc6te64u0psd1v3bcf','127.0.0.1',1483111306,'__ci_last_regenerate|i:1483111206;'),('m2h15geai66ssgrs2tbt19970cm8b28g','127.0.0.1',1483111606,'__ci_last_regenerate|i:1483111458;'),('p0gr7j62ddfpt4c2kiauel47atvg3l31','127.0.0.1',1483111791,'__ci_last_regenerate|i:1483111791;'),('9i6e1r8e9372hl2uglidaim28gah3cvh','127.0.0.1',1483112374,'__ci_last_regenerate|i:1483112160;'),('pkvm1ivs6kpo60cmtk2lmabi7ggqvdo2','127.0.0.1',1483112484,'__ci_last_regenerate|i:1483112462;'),('n5o909o3pbop18tbhjdkland9c8e4hsh','127.0.0.1',1483112484,'__ci_last_regenerate|i:1483112484;'),('vq4uh40btlvjmtf643t52s55e4feqqoj','127.0.0.1',1483112745,'__ci_last_regenerate|i:1483112487;'),('bo0j533djjqo645vo4aclde7vf13obp7','127.0.0.1',1483113080,'__ci_last_regenerate|i:1483112814;'),('uft1cnn4p32dhksltpqkjv0hkgh37uk7','127.0.0.1',1483113364,'__ci_last_regenerate|i:1483113136;'),('71g41ngbaeeemer9j29ndh3dnqlen1ij','127.0.0.1',1483113625,'__ci_last_regenerate|i:1483113625;');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `record`
--

DROP TABLE IF EXISTS `record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_campi` int(11) NOT NULL,
  `id_editor` int(11) NOT NULL DEFAULT '0',
  `valore` varchar(100) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_edit` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `record`
--

LOCK TABLES `record` WRITE;
/*!40000 ALTER TABLE `record` DISABLE KEYS */;
INSERT INTO `record` VALUES (3,5,1,'ciao','2016-12-30 15:27:49',NULL),(4,6,0,'niente','2016-12-30 15:27:49',NULL),(5,6,0,'niente ancora','2016-12-30 15:27:49',NULL),(6,5,1,'come va?','2016-12-30 15:27:49',NULL);
/*!40000 ALTER TABLE `record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `record_log`
--

DROP TABLE IF EXISTS `record_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `record_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_campi` int(11) NOT NULL,
  `id_editor` int(11) NOT NULL DEFAULT '0',
  `valore` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `record_log`
--

LOCK TABLES `record_log` WRITE;
/*!40000 ALTER TABLE `record_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `record_log` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-30 17:29:20

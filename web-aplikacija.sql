-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 24, 2020 at 10:12 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web-aplikacija`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `password`, `email`) VALUES
(1, 'rocky', '7ae30ee6b55e0b0885a74b02353ab4ef', 'mjrocky589@gmail.com'),
(2, 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'user1@gmail.com'),
(3, 'user2', '7e58d63b60197ceb55a1c487989a3720', 'user2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

DROP TABLE IF EXISTS `sport`;
CREATE TABLE IF NOT EXISTS `sport` (
  `vesti_naslov` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `vesti` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`vesti_naslov`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`vesti_naslov`, `vesti`) VALUES
('BOKS', 'BOKS! StiÅ¾e nam veoma zanimljiva vest iz sveta boksa! Naime, dve bokserske legende u penziji Ä‡e ukrstiti rukavice 28.12.2020 u 20h. ReÄ je o bivÅ¡im Å¡ampionima koji se nikada nisu susreli zbog raliÄitih teÅ¾inskih kategorija. Ljubitelji boksa su se oduvek pitali ko bi izaÅ¡ao kao pobednik u meÄ‘usobnom duelu. Naravno, reÄ je o velikom Majk Tajsonu i neprikosnovenom Roj DÅ¾ons Junioru. Obojica su sada pribliÅ¾ne teÅ¾ine i obojica su u 50-tim. Neka bolji pobedi, a mi Ä‡emo svakako uÅ¾ivati u njihovim totalno razliÄitim stilovima borbe'),
('MMA', 'MMA!\r\nJoÅ¡ jedna vest iz sveta borenja! Konor MekGregor, bivÅ¡i MMA Å¡ampion u srednjoj kategoriji sprema se za naredni meÄ u kome Ä‡e pokuÅ¡ati da povrati titulu. Zanimljivo u vezi toga je to Å¡to glavni deo svojih priprema ne spovodi u ringu, veÄ‡ sa Äuvenim NLP trenerom i multimilionerom Tonijem Robinsom. Njih dvojica Ä‡e pokuÅ¡ati da povrate Konorov majndset i oÅ¡tricu Å¡ampiona. Jer, kako se smatra, Konorov trenutni problem nije veÅ¡tina niti spremnost, veÄ‡ njegova podsvesna poravnantost sa tim bude Å¡ampion. MeÄ Ä‡e se odrÅ¾ati u Decembru i saznaÄ‡emo kakav su posao njih dvojica napravili.');

-- --------------------------------------------------------

--
-- Table structure for table `sport_comments`
--

DROP TABLE IF EXISTS `sport_comments`;
CREATE TABLE IF NOT EXISTS `sport_comments` (
  `comment_id` int(100) NOT NULL AUTO_INCREMENT,
  `comment` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `news_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username_commented` varchar(555) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sport_comments`
--

INSERT INTO `sport_comments` (`comment_id`, `comment`, `news_id`, `username_commented`) VALUES
(1, 'Komentar za boks.', 'BOKS', 'rocky'),
(2, 'Komentar za MMA.', 'MMA', 'rocky'),
(3, 'JoÅ¡ komentara.', 'BOKS', 'user1'),
(4, 'JoÅ¡ komentara.', 'MMA', 'user1');

-- --------------------------------------------------------

--
-- Table structure for table `svakodnevnica`
--

DROP TABLE IF EXISTS `svakodnevnica`;
CREATE TABLE IF NOT EXISTS `svakodnevnica` (
  `vesti_naslov` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `vesti` varchar(555) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`vesti_naslov`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `svakodnevnica`
--

INSERT INTO `svakodnevnica` (`vesti_naslov`, `vesti`) VALUES
('ZLATIBOR', 'ZLATIBOR! S obzirom na situaciju, ova planina je odlÄan izbor za sve one koji Å¾ele odmor. Trenutno je turistiÄka ponuda bogata sadrÅ¾ajem i preporuÄujemo svima da je posete, naravno, ukoliko ste u moguÄ‡nosti da pronaÄ‘ete smeÅ¡taj.'),
('Å½IVOTINJE', 'NeÅ¡to novo za ljubitelje Å¾ivotinja! KonaÄno je uveden zakon o dobrobiti Å¾ivotinja koji u sebi sadrÅ¾i mnoge Älanove po kojima one dobijaju mnogo veÄ‡u zaÅ¡titu, kao i pravo na slobodu. Detalji Ä‡e biti obelodanjeni vrlo uskoro!');

-- --------------------------------------------------------

--
-- Table structure for table `svakodnevnica_comments`
--

DROP TABLE IF EXISTS `svakodnevnica_comments`;
CREATE TABLE IF NOT EXISTS `svakodnevnica_comments` (
  `comment_id` int(100) NOT NULL AUTO_INCREMENT,
  `comment` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `news_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username_commented` varchar(555) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `svakodnevnica_comments`
--

INSERT INTO `svakodnevnica_comments` (`comment_id`, `comment`, `news_id`, `username_commented`) VALUES
(1, 'Komentar za ZLATIBOR.', 'ZLATIBOR', 'rocky'),
(2, 'Komentar za Å½IVOTINJE.', 'Å½IVOTINJE', 'rocky'),
(3, 'JoÅ¡ komentara.', 'ZLATIBOR', 'user1'),
(4, 'JoÅ¡ komentara.', 'Å½IVOTINJE', 'user1');

-- --------------------------------------------------------

--
-- Table structure for table `zabava`
--

DROP TABLE IF EXISTS `zabava`;
CREATE TABLE IF NOT EXISTS `zabava` (
  `vesti_naslov` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `vesti` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`vesti_naslov`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `zabava`
--

INSERT INTO `zabava` (`vesti_naslov`, `vesti`) VALUES
('MB', 'MAJA BEROVIÄ†! Najpoznatija Bosanska pevaÄica Maja BeroviÄ‡ dolazi za vikend u NiÅ¡ i imaÄ‡e nastup u poznatom gradskom noÄ‡nom klubu Manila. Kao i obiÄno ne dolazi sama veÄ‡ u druÅ¡tvu momaka koji drmaju domaÄ‡u estradu. Naravno, reÄ je o Jali Bratu i Bubi Koreliju. Vlasnik lokala Mitar SimoviÄ‡ oÄekuje dobru zabavu pun novÄanik po zavrÅ¡etku veÄeri.'),
('JK', 'JK! Posetili smo za vikend proslavu roÄ‘endana muziÄke dive Jelene KarleuÅ¡e. MoÅ¾da niÄeg spektakularnog ne bi bilo da se nije, na zaprepaÅ¡Ä‡enje svih prisutnih, pojavila Svetlana Ceca RaÅ¾natoviÄ‡ i sve goste ostavila bez daha! Da podsetimo one koje ne znaju, njih dve su bile u dugogodiÅ¡njoj svaÄ‘i i netrpeljivosti. Nedavno su se, kako kaÅ¾u, pomirile i tu vest Äuvale od javnosti. Kako god, Å¾elimo im lepo i dugo prijateljstvo.');

-- --------------------------------------------------------

--
-- Table structure for table `zabava_comments`
--

DROP TABLE IF EXISTS `zabava_comments`;
CREATE TABLE IF NOT EXISTS `zabava_comments` (
  `comment_id` int(100) NOT NULL AUTO_INCREMENT,
  `comment` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `news_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username_commented` varchar(555) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `zabava_comments`
--

INSERT INTO `zabava_comments` (`comment_id`, `comment`, `news_id`, `username_commented`) VALUES
(1, 'Komentar za Maju.', 'MB', 'rocky'),
(2, 'Komentar za Jelenu.', 'JK', 'rocky'),
(3, 'JoÅ¡ komentara.', 'MB', 'user1'),
(4, 'JoÅ¡ komentara.', 'JK', 'user1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

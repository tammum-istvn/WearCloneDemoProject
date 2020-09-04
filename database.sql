-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2020 at 05:09 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashion`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `P` (`n` INT) RETURNS VARCHAR(200) CHARSET utf8mb4 BEGIN 
	
	-- DECLARE n INT;
    DECLARE m INT;
    DECLARE str VARCHAR(200);
    
    -- SET n = 5;
    SET str = '';
    
    WHILE n > 0 DO
		SET m = n;
        
        WHILE m > 0 DO 
			
            SET str = CONCAT(str, '*');
            SET m = m - 1;
        END WHILE;
        
        SET str = CONCAT(str, '\n');
        SET n = n - 1;
    END WHILE;
    
    RETURN str;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `post_code`, `province`, `city`, `address`, `created_at`, `updated_at`) VALUES
(1, 1, '77865-0851', 'New York', 'Hansenburgh', '8099 Alvis Road Apt. 885\nNew Imelda, VA 33279', '2020-08-21 01:57:54', '2020-08-21 01:57:54'),
(2, 2, '86346-1263', 'Indiana', 'Erdmanmouth', '61538 Corkery Haven Apt. 838\nTessieshire, NM 40768', '2020-08-21 01:57:54', '2020-08-21 01:57:54'),
(3, 3, '23221', 'Utah', 'West Noahchester', '681 Tate Pine\nBeierport, KY 71626-0320', '2020-08-21 01:57:54', '2020-08-21 01:57:54'),
(4, 4, '17568-9098', 'Texas', 'South Shanie', '4546 Hahn Parkway\nZboncakshire, IN 64361', '2020-08-21 01:57:54', '2020-08-21 01:57:54'),
(5, 5, '03429', 'Vermont', 'Lake Eldaside', '8083 McCullough Station Suite 462\nSouth Theresastad, DE 88113', '2020-08-21 01:57:55', '2020-08-21 01:57:55'),
(6, 6, '21905-0577', 'Vermont', 'Wehnerland', '355 Katlyn Courts Suite 024\nEast Loyalton, NV 06610-5684', '2020-08-21 01:57:55', '2020-08-21 01:57:55'),
(7, 7, '48279-2669', 'Montana', 'Wymanchester', '15213 Hamill Valleys Suite 260\nWunschmouth, NH 20801', '2020-08-21 01:57:55', '2020-08-21 01:57:55'),
(8, 8, '82463', 'North Carolina', 'North Robyn', '71567 VonRueden Lights\nEast Amiya, ND 14878-5495', '2020-08-21 01:57:55', '2020-08-21 01:57:55'),
(9, 9, '49287-8143', 'New Jersey', 'Hellenmouth', '246 Treutel Parkway Apt. 759\nEast Rosalinda, IA 95931', '2020-08-21 01:57:55', '2020-08-21 01:57:55'),
(10, 10, '11583', 'New Jersey', 'Jaronland', '22026 Ettie Stream Suite 888\nLabadietown, CT 97322-5709', '2020-08-21 01:57:56', '2020-08-21 01:57:56'),
(11, 11, '17031', 'Utah', 'Lebsackport', '20086 Melyssa Meadows Apt. 272\nCathrynstad, TX 82742', '2020-08-21 01:57:56', '2020-08-21 01:57:56'),
(12, 12, '04129-6436', 'Kansas', 'West Brooks', '46521 Madisen Causeway Suite 452\nPort Lavernaborough, OR 08217-4738', '2020-08-21 01:57:56', '2020-08-21 01:57:56'),
(13, 13, '46372-7363', 'New York', 'New Denisside', '5372 Ophelia Key\nDorthyview, AK 49099-3391', '2020-08-21 01:57:56', '2020-08-21 01:57:56'),
(14, 14, '59238', 'Idaho', 'North Coby', '6201 Oral Trafficway Suite 212\nPort Wilfredhaven, MS 11154', '2020-08-21 01:57:56', '2020-08-21 01:57:56'),
(15, 15, '16605', 'Nebraska', 'New Camden', '158 Reinger Plains Suite 350\nSouth Toneyland, WI 00825-1451', '2020-08-21 01:57:57', '2020-08-21 01:57:57'),
(16, 16, '89516-9790', 'Massachusetts', 'North Declanfurt', '2498 Stamm Burgs\nNew Rashawn, WY 77461-1501', '2020-08-21 01:57:57', '2020-08-21 01:57:57'),
(17, 17, '98071-1141', 'Kentucky', 'Larsonhaven', '4357 Garfield Fords\nEast Jeramystad, NM 19141', '2020-08-21 01:57:57', '2020-08-21 01:57:57'),
(18, 18, '72658-3205', 'New York', 'New Emory', '396 Bruen Landing Apt. 093\nNew Audreannechester, MD 65641', '2020-08-21 01:57:57', '2020-08-21 01:57:57'),
(19, 19, '57555-5654', 'North Carolina', 'Kertzmannfurt', '9711 Una Roads Suite 557\nAndrewhaven, AK 02416-0309', '2020-08-21 01:57:57', '2020-08-21 01:57:57'),
(20, 20, '86273-0916', 'Montana', 'East Martinmouth', '377 Queenie Roads Apt. 712\nSophiefurt, GA 14746-4266', '2020-08-21 01:57:57', '2020-08-21 01:57:57'),
(21, 21, '81899-0497', 'Tennessee', 'West Gradyburgh', '6749 Dustin Valley\nBeahanchester, CA 60584-5899', '2020-08-21 01:57:57', '2020-08-21 01:57:57'),
(22, 22, '86816', 'Ohio', 'Port Lorenzamouth', '869 Andreanne Estates Apt. 386\nSouth Yoshiko, NE 27256-3853', '2020-08-21 01:57:58', '2020-08-21 01:57:58'),
(23, 23, '13856', 'Kansas', 'New Reilly', '5963 Huel Village\nHoegerton, VA 46410', '2020-08-21 01:57:58', '2020-08-21 01:57:58'),
(24, 24, '45004', 'Virginia', 'Kautzerberg', '8219 Izabella Plains Suite 535\nRoweville, MO 46478-1124', '2020-08-21 01:57:58', '2020-08-21 01:57:58'),
(25, 25, '02892-1039', 'Rhode Island', 'West Joy', '69608 Grimes Cliffs Suite 712\nWest Randal, CO 43179-9637', '2020-08-21 01:57:58', '2020-08-21 01:57:58'),
(26, 26, '90404-5054', 'New Hampshire', 'South Stella', '4488 Mertz Via\nDanielmouth, OR 92569', '2020-08-21 01:57:58', '2020-08-21 01:57:58'),
(27, 27, '06428', 'Arkansas', 'Fidelville', '966 Marquardt Mill Apt. 339\nHuelberg, OK 04447', '2020-08-21 01:57:59', '2020-08-21 01:57:59'),
(28, 28, '61674', 'Ohio', 'Jacintheland', '156 Von Stravenue Suite 946\nWest Jenningschester, AZ 75552', '2020-08-21 01:57:59', '2020-08-21 01:57:59'),
(29, 29, '24067', 'Hawaii', 'Eleanorabury', '883 Leffler Port Suite 058\nLake Ubaldo, NE 25676-2864', '2020-08-21 01:57:59', '2020-08-21 01:57:59'),
(30, 30, '66340', 'Idaho', 'Pascaleview', '5709 Grady Mountains Suite 240\nWest Ervin, ME 92041-2690', '2020-08-21 01:57:59', '2020-08-21 01:57:59'),
(31, 31, '63792-5520', 'New Hampshire', 'Sanfordfort', '51661 Harris Cliffs Apt. 216\nMargarettfort, PA 55465-2436', '2020-08-21 01:57:59', '2020-08-21 01:57:59'),
(32, 32, '39062-6405', 'Massachusetts', 'Laurinefort', '932 Sanford Spur\nFreemanfort, KS 12507', '2020-08-21 01:57:59', '2020-08-21 01:57:59'),
(33, 33, '64610-5638', 'Ohio', 'Pfefferberg', '6437 Kulas Loaf\nJenningsshire, WV 80825-7092', '2020-08-21 01:58:00', '2020-08-21 01:58:00'),
(34, 34, '48061', 'Washington', 'East Portertown', '733 Kutch Junctions\nWest Anahichester, IN 20415', '2020-08-21 01:58:00', '2020-08-21 01:58:00'),
(35, 35, '83888', 'New Hampshire', 'Dareside', '95524 Evan Island\nShanonberg, AR 23620', '2020-08-21 01:58:00', '2020-08-21 01:58:00'),
(36, 36, '42577-0200', 'Missouri', 'Ornside', '27101 Considine Hills Apt. 802\nLitzyton, AZ 89453', '2020-08-21 01:58:00', '2020-08-21 01:58:00'),
(37, 37, '46300', 'Vermont', 'Stehrton', '954 Cleta Shores\nSouth Arvelhaven, IA 64102', '2020-08-21 01:58:00', '2020-08-21 01:58:00'),
(38, 38, '91125', 'Virginia', 'Bartolettiview', '61554 Nya Dale Suite 349\nBahringerberg, UT 95885-8476', '2020-08-21 01:58:01', '2020-08-21 01:58:01'),
(39, 39, '64443', 'Indiana', 'East Lenore', '509 Ullrich Ranch Apt. 688\nDaishamouth, RI 13756-9576', '2020-08-21 01:58:01', '2020-08-21 01:58:01'),
(40, 40, '31225-3024', 'North Dakota', 'Adamville', '1120 Reynolds View Suite 506\nJaniebury, KS 43623-7116', '2020-08-21 01:58:01', '2020-08-21 01:58:01'),
(41, 41, '52844', 'Vermont', 'Port Devan', '64732 Sadie Row Suite 407\nSouth Doris, TX 41776', '2020-08-21 01:58:01', '2020-08-21 01:58:01'),
(42, 42, '51042-9463', 'Nevada', 'West Bennietown', '20080 Gregory Vista\nPort Prestonside, TN 42552', '2020-08-21 01:58:02', '2020-08-21 01:58:02'),
(43, 43, '74239', 'New Mexico', 'Vivianneview', '7220 Newell Meadow Suite 501\nVelvaborough, HI 62098-8625', '2020-08-21 01:58:02', '2020-08-21 01:58:02'),
(44, 44, '04648-3774', 'District of Columbia', 'Rahsaanport', '460 Sauer Fields Apt. 573\nMortonborough, KY 70504', '2020-08-21 01:58:02', '2020-08-21 01:58:02'),
(45, 45, '73323', 'Oregon', 'Demetrisfort', '700 Leannon Parkways\nNew Reuben, AZ 20373-2688', '2020-08-21 01:58:02', '2020-08-21 01:58:02'),
(46, 46, '32401-6929', 'Arizona', 'Antoninafurt', '72703 Abshire Points Apt. 376\nWest Ambroseberg, TX 72827-2649', '2020-08-21 01:58:03', '2020-08-21 01:58:03'),
(47, 47, '11259-8389', 'Indiana', 'Ladariuschester', '96053 Brenden Key Suite 544\nSouth Pablo, DC 53601-7036', '2020-08-21 01:58:03', '2020-08-21 01:58:03'),
(48, 48, '02747', 'Illinois', 'New Dessie', '71789 Demario Ridge Suite 973\nEast Janismouth, NC 26338', '2020-08-21 01:58:03', '2020-08-21 01:58:03'),
(49, 49, '70911', 'Maryland', 'Port Jarod', '513 Tessie Skyway Suite 250\nFrancescamouth, MS 01427', '2020-08-21 01:58:03', '2020-08-21 01:58:03'),
(50, 50, '67142-7872', 'Alabama', 'North Forest', '7410 Trantow Roads Suite 227\nFarrellburgh, RI 67240', '2020-08-21 01:58:03', '2020-08-21 01:58:03'),
(51, 51, '71456', 'South Dakota', 'Boydbury', '2243 Bartell Lodge\nLowemouth, OH 37907', '2020-08-21 01:58:04', '2020-08-21 01:58:04'),
(52, 52, '92563-1863', 'Mississippi', 'Hirthestad', '368 Pierce Way\nJaimehaven, TX 02977', '2020-08-21 01:58:04', '2020-08-21 01:58:04'),
(53, 53, '11702-2919', 'Ohio', 'Kentonborough', '697 McClure Bypass Suite 706\nJamelmouth, MS 07278', '2020-08-21 01:58:04', '2020-08-21 01:58:04'),
(54, 54, '24328', 'Florida', 'Josefort', '824 Kirlin Lights\nDenesikborough, OK 11383-9494', '2020-08-21 01:58:04', '2020-08-21 01:58:04'),
(55, 55, '93342-3129', 'Minnesota', 'Ankundington', '772 Hermiston Court Suite 994\nTinachester, DC 82084-8150', '2020-08-21 01:58:04', '2020-08-21 01:58:04'),
(56, 56, '96823-5209', 'Washington', 'West Mayatown', '3513 Smith Branch\nNew Nannie, WV 25965-9993', '2020-08-21 01:58:05', '2020-08-21 01:58:05'),
(57, 57, '87180-1660', 'Oregon', 'New Humberto', '5981 Gene Wells\nNadiaville, GA 47393', '2020-08-21 01:58:05', '2020-08-21 01:58:05'),
(58, 58, '72992', 'Wyoming', 'West Tiana', '75595 Gennaro Causeway\nLake Sasha, NV 98781', '2020-08-21 01:58:05', '2020-08-21 01:58:05'),
(59, 59, '35570-3840', 'New Mexico', 'East Bettiehaven', '1968 Fahey Extensions Apt. 810\nSchaeferstad, PA 93788', '2020-08-21 01:58:06', '2020-08-21 01:58:06'),
(60, 60, '03517', 'Arkansas', 'Lenorastad', '602 Yasmeen Squares\nBrownburgh, ID 12272-2592', '2020-08-21 01:58:06', '2020-08-21 01:58:06'),
(61, 61, '89111', 'Hawaii', 'East Elseberg', '13315 Christelle Hills\nLake Euniceborough, UT 12317', '2020-08-21 01:58:06', '2020-08-21 01:58:06'),
(62, 62, '90089-0298', 'Colorado', 'Salvadormouth', '16303 Barrows Hills Suite 231\nNorth Araceliport, SC 65715-9109', '2020-08-21 01:58:06', '2020-08-21 01:58:06'),
(63, 63, '34435', 'Mississippi', 'West Alec', '91016 Smitham Walk Suite 464\nAlethaberg, OH 13247-6116', '2020-08-21 01:58:07', '2020-08-21 01:58:07'),
(64, 64, '26067-3768', 'Nebraska', 'New Anastacioburgh', '50751 Ciara Squares\nSchulistmouth, MD 55388', '2020-08-21 01:58:07', '2020-08-21 01:58:07'),
(65, 65, '72951-6737', 'Vermont', 'East Lillianatown', '73773 Madelyn Mission\nNew Clementineside, PA 14414', '2020-08-21 01:58:07', '2020-08-21 01:58:07'),
(66, 66, '87311', 'Michigan', 'Baumbachland', '8627 Lakin Ridge Suite 426\nSouth Abebury, KY 91534', '2020-08-21 01:58:07', '2020-08-21 01:58:07'),
(67, 67, '33910-7707', 'Montana', 'Marksfort', '13072 Vernice View\nNorth Jerome, SD 01574-8247', '2020-08-21 01:58:07', '2020-08-21 01:58:07'),
(68, 68, '48909', 'Utah', 'Averyton', '715 Kohler Drive\nNorth Lonieshire, VA 25110-5192', '2020-08-21 01:58:07', '2020-08-21 01:58:07'),
(69, 69, '57464-4120', 'Colorado', 'McCulloughmouth', '78251 Adalberto Rest Suite 186\nLake Montyhaven, CO 13913-5668', '2020-08-21 01:58:07', '2020-08-21 01:58:07'),
(70, 70, '60151-7290', 'Oklahoma', 'Katelynborough', '72623 Magdalena Locks Suite 609\nAnnabellchester, MS 14609-9716', '2020-08-21 01:58:07', '2020-08-21 01:58:07'),
(71, 71, '78710-1263', 'Idaho', 'West Adrainport', '102 Thiel Springs\nLake Catharine, PA 29546', '2020-08-21 01:58:08', '2020-08-21 01:58:08'),
(72, 72, '97588-6223', 'Florida', 'North Joaquinberg', '216 Lavinia Springs\nRosschester, ME 75019-2654', '2020-08-21 01:58:08', '2020-08-21 01:58:08'),
(73, 73, '44688', 'Virginia', 'Ivychester', '9503 Dare Locks Suite 590\nZiemannberg, MD 69975-0623', '2020-08-21 01:58:08', '2020-08-21 01:58:08'),
(74, 74, '23818-3513', 'Virginia', 'Port Marjory', '2916 Macejkovic Curve Suite 228\nGailland, DE 13388-4597', '2020-08-21 01:58:09', '2020-08-21 01:58:09'),
(75, 75, '39217-2767', 'Minnesota', 'Runtefurt', '477 Mohr Station Suite 466\nPort Clemensberg, MD 59541', '2020-08-21 01:58:09', '2020-08-21 01:58:09'),
(76, 76, '01754', 'Illinois', 'New Rogelio', '3153 Kilback Plaza Suite 829\nIdellaburgh, VT 04776-3158', '2020-08-21 01:58:09', '2020-08-21 01:58:09'),
(77, 77, '66707-1928', 'Mississippi', 'Sanfordview', '3963 Laurel Junction Suite 356\nSouth Kirsten, FL 90893', '2020-08-21 01:58:09', '2020-08-21 01:58:09'),
(78, 78, '57805', 'Nevada', 'West Thurmanburgh', '985 Weissnat Street Apt. 968\nGutmannchester, MD 25725-3570', '2020-08-21 01:58:09', '2020-08-21 01:58:09'),
(79, 79, '43474', 'Maine', 'Rempelhaven', '2449 Bogisich Shore Suite 520\nLake Gretchen, DC 58072', '2020-08-21 01:58:09', '2020-08-21 01:58:09'),
(80, 80, '27662-8278', 'Kansas', 'South Magaliview', '28136 Mafalda Squares Apt. 108\nEast Paige, SD 69839', '2020-08-21 01:58:10', '2020-08-21 01:58:10'),
(81, 81, '53709-4694', 'Utah', 'North Onieton', '643 Brakus Mountain Suite 053\nBernitastad, OK 30613-3012', '2020-08-21 01:58:10', '2020-08-21 01:58:10'),
(82, 82, '01544-2084', 'North Carolina', 'New Jaydonbury', '41152 Monique Park Suite 952\nSunnyview, SC 33160', '2020-08-21 01:58:10', '2020-08-21 01:58:10'),
(83, 83, '05610-6631', 'District of Columbia', 'D\'Amoreberg', '269 Adrianna Trafficway\nSouth Judgeview, HI 42957-8062', '2020-08-21 01:58:10', '2020-08-21 01:58:10'),
(84, 84, '77206-8847', 'Montana', 'Laurelchester', '734 Kunze Harbors\nLake Berthaland, VT 50193', '2020-08-21 01:58:10', '2020-08-21 01:58:10'),
(85, 85, '21193-4870', 'Massachusetts', 'South Lolita', '418 Robel Place\nChristopheland, NJ 12795', '2020-08-21 01:58:10', '2020-08-21 01:58:10'),
(86, 86, '10001-9569', 'Connecticut', 'Port Dorothea', '30981 Domenico Well Apt. 947\nWest Juliochester, OK 86101-1699', '2020-08-21 01:58:11', '2020-08-21 01:58:11'),
(87, 87, '61609', 'Connecticut', 'Edenville', '62291 Destiney Extensions Suite 822\nNew Cynthiaview, UT 72636-2450', '2020-08-21 01:58:11', '2020-08-21 01:58:11'),
(88, 88, '73463', 'Michigan', 'New Gabrielberg', '99721 Bosco Cove\nEast Chadrick, ND 25843-3615', '2020-08-21 01:58:11', '2020-08-21 01:58:11'),
(89, 89, '93502-0470', 'New Jersey', 'Port Shea', '17262 Reinger Springs\nRodriguezview, MN 91103', '2020-08-21 01:58:11', '2020-08-21 01:58:11'),
(90, 90, '45762', 'Nevada', 'Alverastad', '10481 Armstrong Summit\nYostfurt, MS 20708', '2020-08-21 01:58:11', '2020-08-21 01:58:11'),
(91, 91, '66792-2513', 'Oregon', 'East Kole', '248 Keyshawn Bypass\nNew Percival, IA 94040', '2020-08-21 01:58:11', '2020-08-21 01:58:11'),
(92, 92, '50971', 'New York', 'Schmelermouth', '2221 Okey Burg\nSouth Stefanhaven, OK 80941', '2020-08-21 01:58:12', '2020-08-21 01:58:12'),
(93, 93, '60201', 'Wisconsin', 'Terrancemouth', '5219 Devan Glens Suite 308\nLake Rodrick, LA 34035', '2020-08-21 01:58:12', '2020-08-21 01:58:12'),
(94, 94, '01494', 'California', 'Port Shayna', '934 Brekke Glens\nWest Mandy, TN 62145-7870', '2020-08-21 01:58:12', '2020-08-21 01:58:12'),
(95, 95, '62906', 'Nevada', 'East Esmeraldafurt', '975 Weimann Ranch Apt. 860\nEichmannfurt, SD 72664', '2020-08-21 01:58:12', '2020-08-21 01:58:12'),
(96, 96, '29336-5274', 'Oklahoma', 'Wilkinsonshire', '662 Clara Manors Apt. 325\nFordhaven, MT 65794', '2020-08-21 01:58:12', '2020-08-21 01:58:12'),
(97, 97, '37467', 'Florida', 'East Adam', '12608 Emely Fields Suite 820\nBerniestad, CT 24447-3721', '2020-08-21 01:58:12', '2020-08-21 01:58:12'),
(98, 98, '16515-0529', 'South Carolina', 'New Rosina', '8722 Marcia Crossing\nEdenbury, OR 56891-4593', '2020-08-21 01:58:13', '2020-08-21 01:58:13'),
(99, 99, '76583-5574', 'Iowa', 'North Anthonyview', '604 Abigail Extension Apt. 890\nPort Hassieport, RI 99666', '2020-08-21 01:58:13', '2020-08-21 01:58:13'),
(100, 100, '91266', 'Maryland', 'North Mariana', '62092 Sammy Passage\nPort Adelia, AK 58645', '2020-08-21 01:58:13', '2020-08-21 01:58:13');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`) VALUES
(1, 'Valentino'),
(2, 'Prada'),
(3, 'Fendi'),
(4, 'Stone Island'),
(5, 'Gucci'),
(6, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `item_detail_information_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Tops'),
(2, 'Outerwear'),
(3, 'Dress'),
(4, 'Overall / Salopette'),
(5, 'Suit / Tie'),
(6, 'Skirts'),
(7, 'Pants'),
(8, 'Shoes'),
(9, 'Socks &amp; Tights'),
(10, 'Bags'),
(11, 'Hats'),
(12, 'Jewelry'),
(13, 'Hair Accessories'),
(14, 'Accessories'),
(15, 'Wallets'),
(16, 'Watches'),
(17, 'Swimwear / Kimono'),
(18, 'Underwear'),
(19, 'Maternity'),
(20, 'Beauty care / Contact lenses'),
(21, 'Home'),
(22, 'Kitchen'),
(23, 'General goods'),
(24, 'Music / Books and Magazines'),
(25, 'Make up / Face care'),
(26, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('open','closed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`id`, `sender_id`, `receiver_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 97, 60, 'closed', '2020-08-21 01:59:43', '2020-08-21 01:59:43'),
(2, 86, 24, 'closed', '2020-08-21 01:59:44', '2020-08-21 01:59:44'),
(3, 76, 47, 'closed', '2020-08-21 01:59:44', '2020-08-21 01:59:44'),
(4, 23, 2, 'open', '2020-08-21 01:59:44', '2020-08-21 01:59:44'),
(5, 39, 100, 'open', '2020-08-21 01:59:44', '2020-08-21 01:59:44'),
(6, 72, 6, 'closed', '2020-08-21 01:59:44', '2020-08-21 01:59:44'),
(7, 37, 29, 'closed', '2020-08-21 01:59:44', '2020-08-21 01:59:44'),
(8, 77, 70, 'open', '2020-08-21 01:59:44', '2020-08-21 01:59:44'),
(9, 35, 9, 'open', '2020-08-21 01:59:44', '2020-08-21 01:59:44'),
(10, 13, 56, 'open', '2020-08-21 01:59:44', '2020-08-21 01:59:44'),
(11, 9, 64, 'open', '2020-08-21 01:59:45', '2020-08-21 01:59:45'),
(12, 87, 62, 'closed', '2020-08-21 01:59:45', '2020-08-21 01:59:45'),
(13, 62, 7, 'open', '2020-08-21 01:59:45', '2020-08-21 01:59:45'),
(14, 70, 84, 'closed', '2020-08-21 01:59:45', '2020-08-21 01:59:45'),
(15, 20, 6, 'open', '2020-08-21 01:59:45', '2020-08-21 01:59:45'),
(16, 51, 54, 'closed', '2020-08-21 01:59:45', '2020-08-21 01:59:45'),
(17, 54, 56, 'closed', '2020-08-21 01:59:45', '2020-08-21 01:59:45'),
(18, 22, 76, 'open', '2020-08-21 01:59:45', '2020-08-21 01:59:45'),
(19, 17, 16, 'open', '2020-08-21 01:59:45', '2020-08-21 01:59:45'),
(20, 92, 2, 'closed', '2020-08-21 01:59:45', '2020-08-21 01:59:45'),
(21, 77, 42, 'closed', '2020-08-21 01:59:45', '2020-08-21 01:59:45'),
(22, 13, 54, 'open', '2020-08-21 01:59:45', '2020-08-21 01:59:45'),
(23, 81, 45, 'closed', '2020-08-21 01:59:45', '2020-08-21 01:59:45'),
(24, 79, 94, 'open', '2020-08-21 01:59:45', '2020-08-21 01:59:45'),
(25, 99, 20, 'open', '2020-08-21 01:59:45', '2020-08-21 01:59:45'),
(26, 4, 55, 'closed', '2020-08-21 01:59:46', '2020-08-21 01:59:46'),
(27, 100, 85, 'closed', '2020-08-21 01:59:46', '2020-08-21 01:59:46'),
(28, 63, 87, 'open', '2020-08-21 01:59:46', '2020-08-21 01:59:46'),
(29, 49, 33, 'closed', '2020-08-21 01:59:46', '2020-08-21 01:59:46'),
(30, 6, 97, 'closed', '2020-08-21 01:59:46', '2020-08-21 01:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `look_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favourite_items`
--

CREATE TABLE `favourite_items` (
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favourite_looks`
--

CREATE TABLE `favourite_looks` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `look_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `follower_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hashtags`
--

CREATE TABLE `hashtags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `user_id`, `category_id`, `sub_category_id`, `brand_id`, `title`, `description`, `is_delete`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 38, 25, 151, 4, 'Item 61', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:34', '2020-08-21 01:58:34'),
(2, 23, 14, 253, 2, 'Item 71', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:34', '2020-08-21 01:58:34'),
(3, 49, 2, 168, 3, 'Item 59', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:34', '2020-08-21 01:58:34'),
(4, 63, 5, 258, 2, 'Item 81', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:34', '2020-08-21 01:58:34'),
(5, 53, 17, 109, 1, 'Item 57', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:34', '2020-08-21 01:58:34'),
(6, 99, 4, 120, 1, 'Item 35', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:34', '2020-08-21 01:58:34'),
(7, 53, 8, 23, 2, 'Item 99', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:34', '2020-08-21 01:58:34'),
(8, 25, 2, 206, 2, 'Item 71', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:34', '2020-08-21 01:58:34'),
(9, 63, 11, 34, 6, 'Item 49', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:34', '2020-08-21 01:58:34'),
(10, 99, 10, 190, 6, 'Item 58', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:35', '2020-08-21 01:58:35'),
(11, 1, 2, 96, 1, 'Item 35', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:35', '2020-08-21 01:58:35'),
(12, 22, 6, 147, 4, 'Item 10', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:35', '2020-08-21 01:58:35'),
(13, 63, 2, 130, 4, 'Item 81', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:35', '2020-08-21 01:58:35'),
(14, 99, 3, 61, 1, 'Item 100', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:35', '2020-08-21 01:58:35'),
(15, 1, 17, 239, 5, 'Item 78', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:35', '2020-08-21 01:58:35'),
(16, 50, 10, 55, 3, 'Item 83', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:35', '2020-08-21 01:58:35'),
(17, 45, 4, 36, 5, 'Item 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:35', '2020-08-21 01:58:35'),
(18, 43, 8, 38, 1, 'Item 15', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:35', '2020-08-21 01:58:35'),
(19, 92, 9, 27, 6, 'Item 16', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:35', '2020-08-21 01:58:35'),
(20, 34, 5, 117, 3, 'Item 90', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:35', '2020-08-21 01:58:35'),
(21, 51, 7, 117, 4, 'Item 69', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:35', '2020-08-21 01:58:35'),
(22, 46, 25, 224, 4, 'Item 84', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:35', '2020-08-21 01:58:35'),
(23, 23, 20, 230, 6, 'Item 48', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:35', '2020-08-21 01:58:35'),
(24, 46, 13, 101, 2, 'Item 82', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:35', '2020-08-21 01:58:35'),
(25, 76, 12, 77, 2, 'Item 94', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:35', '2020-08-21 01:58:35'),
(26, 55, 13, 92, 2, 'Item 22', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:36', '2020-08-21 01:58:36'),
(27, 79, 11, 31, 1, 'Item 67', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:36', '2020-08-21 01:58:36'),
(28, 43, 5, 23, 5, 'Item 65', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:36', '2020-08-21 01:58:36'),
(29, 43, 25, 199, 2, 'Item 65', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:36', '2020-08-21 01:58:36'),
(30, 38, 21, 131, 3, 'Item 95', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:36', '2020-08-21 01:58:36'),
(31, 76, 1, 257, 2, 'Item 19', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:36', '2020-08-21 01:58:36'),
(32, 41, 4, 7, 4, 'Item 59', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:36', '2020-08-21 01:58:36'),
(33, 49, 13, 73, 6, 'Item 49', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:36', '2020-08-21 01:58:36'),
(34, 72, 12, 174, 1, 'Item 38', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:36', '2020-08-21 01:58:36'),
(35, 29, 25, 7, 4, 'Item 6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:36', '2020-08-21 01:58:36'),
(36, 43, 8, 203, 5, 'Item 100', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:36', '2020-08-21 01:58:36'),
(37, 92, 13, 59, 2, 'Item 95', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:36', '2020-08-21 01:58:36'),
(38, 41, 3, 99, 6, 'Item 50', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:36', '2020-08-21 01:58:36'),
(39, 37, 15, 40, 5, 'Item 24', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:36', '2020-08-21 01:58:36'),
(40, 53, 12, 35, 5, 'Item 100', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:36', '2020-08-21 01:58:36'),
(41, 23, 6, 111, 6, 'Item 10', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:36', '2020-08-21 01:58:36'),
(42, 47, 5, 226, 5, 'Item 46', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:37', '2020-08-21 01:58:37'),
(43, 39, 26, 156, 5, 'Item 55', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:37', '2020-08-21 01:58:37'),
(44, 37, 26, 116, 6, 'Item 41', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:37', '2020-08-21 01:58:37'),
(45, 5, 2, 241, 2, 'Item 86', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:37', '2020-08-21 01:58:37'),
(46, 23, 12, 177, 5, 'Item 46', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:37', '2020-08-21 01:58:37'),
(47, 48, 19, 239, 6, 'Item 45', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:37', '2020-08-21 01:58:37'),
(48, 38, 17, 142, 5, 'Item 40', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:37', '2020-08-21 01:58:37'),
(49, 22, 6, 3, 4, 'Item 49', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:37', '2020-08-21 01:58:37'),
(50, 30, 22, 121, 2, 'Item 22', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 1, '2020-08-21 01:58:37', '2020-08-21 01:58:37');

-- --------------------------------------------------------

--
-- Table structure for table `item_details`
--

CREATE TABLE `item_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`picture`)),
  `is_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_details`
--

INSERT INTO `item_details` (`id`, `item_id`, `color`, `picture`, `is_delete`) VALUES
(1, 1, 'beige', '[\"img\\/item\\/item-pic3.jpg\",\"img\\/item\\/item-pic8.jpg\"]', 0),
(2, 1, 'pink', '[\"img\\/item\\/item-pic5.jpg\",\"img\\/item\\/item-pic10.jpg\"]', 0),
(3, 2, 'brown', '[\"img\\/item\\/item-pic3.jpg\",\"img\\/item\\/item-pic6.jpg\"]', 0),
(4, 2, 'silver', '[\"img\\/item\\/item-pic5.jpg\",\"img\\/item\\/item-pic10.jpg\"]', 0),
(5, 3, 'purple', '[\"img\\/item\\/item-pic3.jpg\",\"img\\/item\\/item-pic6.jpg\"]', 0),
(6, 3, '', '[\"img\\/item\\/item-pic2.jpg\",\"img\\/item\\/item-pic9.jpg\"]', 0),
(7, 4, 'purple', '[\"img\\/item\\/item-pic5.jpg\",\"img\\/item\\/item-pic9.jpg\"]', 0),
(8, 4, 'green', '[\"img\\/item\\/item-pic5.jpg\",\"img\\/item\\/item-pic8.jpg\"]', 0),
(9, 5, 'gray', '[\"img\\/item\\/item-pic1.jpg\",\"img\\/item\\/item-pic10.jpg\"]', 0),
(10, 5, 'blue', '[\"img\\/item\\/item-pic1.jpg\",\"img\\/item\\/item-pic6.jpg\"]', 0),
(11, 6, 'black', '[\"img\\/item\\/item-pic5.jpg\",\"img\\/item\\/item-pic8.jpg\"]', 0),
(12, 6, 'black', '[\"img\\/item\\/item-pic1.jpg\",\"img\\/item\\/item-pic8.jpg\"]', 0),
(13, 7, 'brown', '[\"img\\/item\\/item-pic5.jpg\",\"img\\/item\\/item-pic6.jpg\"]', 0),
(14, 7, 'green', '[\"img\\/item\\/item-pic1.jpg\",\"img\\/item\\/item-pic7.jpg\"]', 0),
(15, 8, 'yellow', '[\"img\\/item\\/item-pic4.jpg\",\"img\\/item\\/item-pic7.jpg\"]', 0),
(16, 8, 'black', '[\"img\\/item\\/item-pic1.jpg\",\"img\\/item\\/item-pic9.jpg\"]', 0),
(17, 9, 'brown', '[\"img\\/item\\/item-pic3.jpg\",\"img\\/item\\/item-pic6.jpg\"]', 0),
(18, 9, 'beige', '[\"img\\/item\\/item-pic5.jpg\",\"img\\/item\\/item-pic9.jpg\"]', 0),
(19, 10, 'green', '[\"img\\/item\\/item-pic1.jpg\",\"img\\/item\\/item-pic9.jpg\"]', 0),
(20, 10, 'gray', '[\"img\\/item\\/item-pic1.jpg\",\"img\\/item\\/item-pic6.jpg\"]', 0),
(21, 11, 'pink', '[\"img\\/item\\/item-pic1.jpg\",\"img\\/item\\/item-pic8.jpg\"]', 0),
(22, 11, 'green', '[\"img\\/item\\/item-pic3.jpg\",\"img\\/item\\/item-pic9.jpg\"]', 0),
(23, 12, 'black', '[\"img\\/item\\/item-pic1.jpg\",\"img\\/item\\/item-pic10.jpg\"]', 0),
(24, 12, 'gray', '[\"img\\/item\\/item-pic3.jpg\",\"img\\/item\\/item-pic9.jpg\"]', 0),
(25, 13, 'silver', '[\"img\\/item\\/item-pic3.jpg\",\"img\\/item\\/item-pic9.jpg\"]', 0),
(26, 13, 'gray', '[\"img\\/item\\/item-pic4.jpg\",\"img\\/item\\/item-pic7.jpg\"]', 0),
(27, 14, 'red', '[\"img\\/item\\/item-pic3.jpg\",\"img\\/item\\/item-pic9.jpg\"]', 0),
(28, 14, 'orange', '[\"img\\/item\\/item-pic5.jpg\",\"img\\/item\\/item-pic7.jpg\"]', 0),
(29, 15, 'blue', '[\"img\\/item\\/item-pic3.jpg\",\"img\\/item\\/item-pic6.jpg\"]', 0),
(30, 15, 'white', '[\"img\\/item\\/item-pic2.jpg\",\"img\\/item\\/item-pic6.jpg\"]', 0),
(31, 16, 'beige', '[\"img\\/item\\/item-pic3.jpg\",\"img\\/item\\/item-pic9.jpg\"]', 0),
(32, 16, 'orange', '[\"img\\/item\\/item-pic1.jpg\",\"img\\/item\\/item-pic8.jpg\"]', 0),
(33, 17, 'brown', '[\"img\\/item\\/item-pic1.jpg\",\"img\\/item\\/item-pic9.jpg\"]', 0),
(34, 17, 'pink', '[\"img\\/item\\/item-pic5.jpg\",\"img\\/item\\/item-pic6.jpg\"]', 0),
(35, 18, 'gray', '[\"img\\/item\\/item-pic4.jpg\",\"img\\/item\\/item-pic10.jpg\"]', 0),
(36, 18, 'yellow', '[\"img\\/item\\/item-pic1.jpg\",\"img\\/item\\/item-pic8.jpg\"]', 0),
(37, 19, 'white', '[\"img\\/item\\/item-pic2.jpg\",\"img\\/item\\/item-pic7.jpg\"]', 0),
(38, 19, 'gray', '[\"img\\/item\\/item-pic5.jpg\",\"img\\/item\\/item-pic10.jpg\"]', 0),
(39, 20, 'orange', '[\"img\\/item\\/item-pic4.jpg\",\"img\\/item\\/item-pic8.jpg\"]', 0),
(40, 20, 'beige', '[\"img\\/item\\/item-pic2.jpg\",\"img\\/item\\/item-pic7.jpg\"]', 0),
(41, 21, '', '[\"img\\/item\\/item-pic5.jpg\",\"img\\/item\\/item-pic7.jpg\"]', 0),
(42, 21, 'green', '[\"img\\/item\\/item-pic1.jpg\",\"img\\/item\\/item-pic8.jpg\"]', 0),
(43, 22, 'white', '[\"img\\/item\\/item-pic4.jpg\",\"img\\/item\\/item-pic9.jpg\"]', 0),
(44, 22, 'brown', '[\"img\\/item\\/item-pic2.jpg\",\"img\\/item\\/item-pic7.jpg\"]', 0),
(45, 23, 'beige', '[\"img\\/item\\/item-pic3.jpg\",\"img\\/item\\/item-pic10.jpg\"]', 0),
(46, 23, 'gray', '[\"img\\/item\\/item-pic4.jpg\",\"img\\/item\\/item-pic8.jpg\"]', 0),
(47, 24, '', '[\"img\\/item\\/item-pic5.jpg\",\"img\\/item\\/item-pic10.jpg\"]', 0),
(48, 24, 'beige', '[\"img\\/item\\/item-pic3.jpg\",\"img\\/item\\/item-pic8.jpg\"]', 0),
(49, 25, 'green', '[\"img\\/item\\/item-pic4.jpg\",\"img\\/item\\/item-pic9.jpg\"]', 0),
(50, 25, 'beige', '[\"img\\/item\\/item-pic2.jpg\",\"img\\/item\\/item-pic10.jpg\"]', 0),
(51, 26, 'brown', '[\"img\\/item\\/item-pic1.jpg\",\"img\\/item\\/item-pic10.jpg\"]', 0),
(52, 26, 'silver', '[\"img\\/item\\/item-pic3.jpg\",\"img\\/item\\/item-pic7.jpg\"]', 0),
(53, 27, 'brown', '[\"img\\/item\\/item-pic2.jpg\",\"img\\/item\\/item-pic6.jpg\"]', 0),
(54, 27, 'gray', '[\"img\\/item\\/item-pic3.jpg\",\"img\\/item\\/item-pic10.jpg\"]', 0),
(55, 28, 'white', '[\"img\\/item\\/item-pic4.jpg\",\"img\\/item\\/item-pic9.jpg\"]', 0),
(56, 28, 'orange', '[\"img\\/item\\/item-pic1.jpg\",\"img\\/item\\/item-pic7.jpg\"]', 0),
(57, 29, 'orange', '[\"img\\/item\\/item-pic4.jpg\",\"img\\/item\\/item-pic6.jpg\"]', 0),
(58, 29, 'gray', '[\"img\\/item\\/item-pic5.jpg\",\"img\\/item\\/item-pic10.jpg\"]', 0),
(59, 30, 'yellow', '[\"img\\/item\\/item-pic3.jpg\",\"img\\/item\\/item-pic6.jpg\"]', 0),
(60, 30, 'orange', '[\"img\\/item\\/item-pic1.jpg\",\"img\\/item\\/item-pic9.jpg\"]', 0),
(61, 31, 'beige', '[\"img\\/item\\/item-pic5.jpg\",\"img\\/item\\/item-pic9.jpg\"]', 0),
(62, 31, 'red', '[\"img\\/item\\/item-pic5.jpg\",\"img\\/item\\/item-pic10.jpg\"]', 0),
(63, 32, 'red', '[\"img\\/item\\/item-pic5.jpg\",\"img\\/item\\/item-pic8.jpg\"]', 0),
(64, 32, 'gold', '[\"img\\/item\\/item-pic3.jpg\",\"img\\/item\\/item-pic6.jpg\"]', 0),
(65, 33, 'white', '[\"img\\/item\\/item-pic3.jpg\",\"img\\/item\\/item-pic7.jpg\"]', 0),
(66, 33, 'purple', '[\"img\\/item\\/item-pic4.jpg\",\"img\\/item\\/item-pic10.jpg\"]', 0),
(67, 34, 'gray', '[\"img\\/item\\/item-pic2.jpg\",\"img\\/item\\/item-pic8.jpg\"]', 0),
(68, 34, 'purple', '[\"img\\/item\\/item-pic1.jpg\",\"img\\/item\\/item-pic8.jpg\"]', 0),
(69, 35, 'orange', '[\"img\\/item\\/item-pic1.jpg\",\"img\\/item\\/item-pic8.jpg\"]', 0),
(70, 35, 'orange', '[\"img\\/item\\/item-pic2.jpg\",\"img\\/item\\/item-pic8.jpg\"]', 0),
(71, 36, 'silver', '[\"img\\/item\\/item-pic4.jpg\",\"img\\/item\\/item-pic10.jpg\"]', 0),
(72, 36, 'black', '[\"img\\/item\\/item-pic3.jpg\",\"img\\/item\\/item-pic7.jpg\"]', 0),
(73, 37, 'red', '[\"img\\/item\\/item-pic5.jpg\",\"img\\/item\\/item-pic6.jpg\"]', 0),
(74, 37, 'beige', '[\"img\\/item\\/item-pic3.jpg\",\"img\\/item\\/item-pic8.jpg\"]', 0),
(75, 38, 'gold', '[\"img\\/item\\/item-pic3.jpg\",\"img\\/item\\/item-pic10.jpg\"]', 0),
(76, 38, 'red', '[\"img\\/item\\/item-pic4.jpg\",\"img\\/item\\/item-pic9.jpg\"]', 0),
(77, 39, 'brown', '[\"img\\/item\\/item-pic4.jpg\",\"img\\/item\\/item-pic9.jpg\"]', 0),
(78, 39, '', '[\"img\\/item\\/item-pic4.jpg\",\"img\\/item\\/item-pic9.jpg\"]', 0),
(79, 40, '', '[\"img\\/item\\/item-pic4.jpg\",\"img\\/item\\/item-pic9.jpg\"]', 0),
(80, 40, 'beige', '[\"img\\/item\\/item-pic5.jpg\",\"img\\/item\\/item-pic10.jpg\"]', 0),
(81, 41, 'pink', '[\"img\\/item\\/item-pic3.jpg\",\"img\\/item\\/item-pic7.jpg\"]', 0),
(82, 41, '', '[\"img\\/item\\/item-pic5.jpg\",\"img\\/item\\/item-pic9.jpg\"]', 0),
(83, 42, 'purple', '[\"img\\/item\\/item-pic2.jpg\",\"img\\/item\\/item-pic6.jpg\"]', 0),
(84, 42, 'white', '[\"img\\/item\\/item-pic5.jpg\",\"img\\/item\\/item-pic8.jpg\"]', 0),
(85, 43, 'green', '[\"img\\/item\\/item-pic3.jpg\",\"img\\/item\\/item-pic6.jpg\"]', 0),
(86, 43, 'white', '[\"img\\/item\\/item-pic3.jpg\",\"img\\/item\\/item-pic7.jpg\"]', 0),
(87, 44, 'purple', '[\"img\\/item\\/item-pic2.jpg\",\"img\\/item\\/item-pic7.jpg\"]', 0),
(88, 44, '', '[\"img\\/item\\/item-pic3.jpg\",\"img\\/item\\/item-pic10.jpg\"]', 0),
(89, 45, 'black', '[\"img\\/item\\/item-pic2.jpg\",\"img\\/item\\/item-pic10.jpg\"]', 0),
(90, 45, 'brown', '[\"img\\/item\\/item-pic1.jpg\",\"img\\/item\\/item-pic6.jpg\"]', 0),
(91, 46, 'yellow', '[\"img\\/item\\/item-pic1.jpg\",\"img\\/item\\/item-pic6.jpg\"]', 0),
(92, 46, 'blue', '[\"img\\/item\\/item-pic1.jpg\",\"img\\/item\\/item-pic6.jpg\"]', 0),
(93, 47, 'pink', '[\"img\\/item\\/item-pic2.jpg\",\"img\\/item\\/item-pic6.jpg\"]', 0),
(94, 47, 'yellow', '[\"img\\/item\\/item-pic2.jpg\",\"img\\/item\\/item-pic9.jpg\"]', 0),
(95, 48, 'pink', '[\"img\\/item\\/item-pic3.jpg\",\"img\\/item\\/item-pic10.jpg\"]', 0),
(96, 48, '', '[\"img\\/item\\/item-pic2.jpg\",\"img\\/item\\/item-pic7.jpg\"]', 0),
(97, 49, 'orange', '[\"img\\/item\\/item-pic5.jpg\",\"img\\/item\\/item-pic8.jpg\"]', 0),
(98, 49, 'purple', '[\"img\\/item\\/item-pic1.jpg\",\"img\\/item\\/item-pic8.jpg\"]', 0),
(99, 50, 'beige', '[\"img\\/item\\/item-pic2.jpg\",\"img\\/item\\/item-pic7.jpg\"]', 0),
(100, 50, 'gray', '[\"img\\/item\\/item-pic3.jpg\",\"img\\/item\\/item-pic10.jpg\"]', 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_detail_informations`
--

CREATE TABLE `item_detail_informations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_detail_id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_detail_informations`
--

INSERT INTO `item_detail_informations` (`id`, `item_detail_id`, `size`, `price`, `is_delete`) VALUES
(1, 1, 'm', 484815, 0),
(2, 1, 'xl', 437912, 0),
(3, 2, 's', 630589, 0),
(4, 2, 'l', 245735, 0),
(5, 3, 'l', 594621, 0),
(6, 3, 'm', 394982, 0),
(7, 4, 's', 711524, 0),
(8, 4, 's', 382971, 0),
(9, 5, 'm', 462729, 0),
(10, 5, 's', 314274, 0),
(11, 6, 'm', 532703, 0),
(12, 6, 's', 469161, 0),
(13, 7, 'l', 403052, 0),
(14, 7, 'l', 562084, 0),
(15, 8, 'l', 805729, 0),
(16, 8, 'm', 905858, 0),
(17, 9, 'l', 515116, 0),
(18, 9, 'xl', 550493, 0),
(19, 10, 'm', 378251, 0),
(20, 10, 's', 509856, 0),
(21, 11, 'l', 537776, 0),
(22, 11, 's', 706437, 0),
(23, 12, 'l', 647537, 0),
(24, 12, 'xl', 545420, 0),
(25, 13, 'l', 126086, 0),
(26, 13, 'xl', 992479, 0),
(27, 14, 'l', 261639, 0),
(28, 14, 'l', 238225, 0),
(29, 15, 'm', 301592, 0),
(30, 15, 's', 524681, 0),
(31, 16, 'l', 441116, 0),
(32, 16, 'm', 595513, 0),
(33, 17, 'l', 945203, 0),
(34, 17, 'm', 986926, 0),
(35, 18, 's', 403914, 0),
(36, 18, 'l', 272463, 0),
(37, 19, 'xl', 122880, 0),
(38, 19, 's', 932563, 0),
(39, 20, 'm', 720851, 0),
(40, 20, 'xl', 833981, 0),
(41, 21, 'l', 603769, 0),
(42, 21, 'l', 222153, 0),
(43, 22, 'l', 790556, 0),
(44, 22, 's', 912306, 0),
(45, 23, 'xl', 265845, 0),
(46, 23, 's', 525803, 0),
(47, 24, 'xl', 707988, 0),
(48, 24, 'xl', 960245, 0),
(49, 25, 'xl', 167200, 0),
(50, 25, 'm', 876734, 0),
(51, 26, 'xl', 133520, 0),
(52, 26, 'xl', 497891, 0),
(53, 27, 'm', 229325, 0),
(54, 27, 'm', 221449, 0),
(55, 28, 'xl', 131570, 0),
(56, 28, 's', 264389, 0),
(57, 29, 's', 629842, 0),
(58, 29, 'l', 269245, 0),
(59, 30, 's', 196067, 0),
(60, 30, 'xl', 335324, 0),
(61, 31, 'm', 713038, 0),
(62, 31, 'm', 854763, 0),
(63, 32, 'xl', 612699, 0),
(64, 32, 'l', 693780, 0),
(65, 33, 'xl', 289076, 0),
(66, 33, 'm', 524120, 0),
(67, 34, 'xl', 663512, 0),
(68, 34, 's', 278473, 0),
(69, 35, 'l', 275593, 0),
(70, 35, 's', 790582, 0),
(71, 36, 's', 638902, 0),
(72, 36, 's', 767510, 0),
(73, 37, 'm', 937588, 0),
(74, 37, 'l', 489338, 0),
(75, 38, 'm', 281074, 0),
(76, 38, 's', 784106, 0),
(77, 39, 'm', 712160, 0),
(78, 39, 'm', 383780, 0),
(79, 40, 'm', 786957, 0),
(80, 40, 'xl', 523588, 0),
(81, 41, 'm', 868261, 0),
(82, 41, 'm', 295498, 0),
(83, 42, 's', 615418, 0),
(84, 42, 's', 155090, 0),
(85, 43, 'l', 286828, 0),
(86, 43, 's', 479184, 0),
(87, 44, 's', 691164, 0),
(88, 44, 'l', 903152, 0),
(89, 45, 'xl', 365871, 0),
(90, 45, 'm', 709107, 0),
(91, 46, 'l', 942248, 0),
(92, 46, 'xl', 875733, 0),
(93, 47, 'm', 493496, 0),
(94, 47, 'm', 782716, 0),
(95, 48, 'm', 105361, 0),
(96, 48, 'm', 488903, 0),
(97, 49, 'l', 643876, 0),
(98, 49, 'm', 404818, 0),
(99, 50, 's', 405882, 0),
(100, 50, 'xl', 173789, 0),
(101, 51, 'xl', 811159, 0),
(102, 51, 's', 719392, 0),
(103, 52, 's', 983065, 0),
(104, 52, 'm', 381023, 0),
(105, 53, 'xl', 565475, 0),
(106, 53, 'xl', 790464, 0),
(107, 54, 'm', 793460, 0),
(108, 54, 'm', 415792, 0),
(109, 55, 's', 406329, 0),
(110, 55, 'l', 394743, 0),
(111, 56, 'xl', 696521, 0),
(112, 56, 'xl', 974606, 0),
(113, 57, 's', 836358, 0),
(114, 57, 'm', 779063, 0),
(115, 58, 'l', 337683, 0),
(116, 58, 'l', 647766, 0),
(117, 59, 's', 691005, 0),
(118, 59, 'm', 253929, 0),
(119, 60, 'm', 814544, 0),
(120, 60, 'l', 608452, 0),
(121, 61, 'l', 783411, 0),
(122, 61, 's', 957948, 0),
(123, 62, 'm', 192923, 0),
(124, 62, 'l', 108578, 0),
(125, 63, 'm', 257502, 0),
(126, 63, 'xl', 591543, 0),
(127, 64, 'l', 895595, 0),
(128, 64, 'xl', 729320, 0),
(129, 65, 'xl', 904445, 0),
(130, 65, 'xl', 113375, 0),
(131, 66, 'l', 473672, 0),
(132, 66, 'l', 698355, 0),
(133, 67, 's', 855214, 0),
(134, 67, 'm', 431425, 0),
(135, 68, 'm', 778651, 0),
(136, 68, 'xl', 535506, 0),
(137, 69, 'm', 712391, 0),
(138, 69, 'l', 807883, 0),
(139, 70, 'm', 541626, 0),
(140, 70, 's', 131932, 0),
(141, 71, 'xl', 374515, 0),
(142, 71, 'm', 514869, 0),
(143, 72, 'l', 912351, 0),
(144, 72, 'l', 250733, 0),
(145, 73, 'm', 747801, 0),
(146, 73, 'l', 417151, 0),
(147, 74, 'm', 669831, 0),
(148, 74, 'l', 749543, 0),
(149, 75, 'm', 346914, 0),
(150, 75, 'l', 129471, 0),
(151, 76, 's', 203690, 0),
(152, 76, 'l', 329791, 0),
(153, 77, 'm', 478249, 0),
(154, 77, 'xl', 935677, 0),
(155, 78, 'xl', 930546, 0),
(156, 78, 's', 993428, 0),
(157, 79, 'm', 709497, 0),
(158, 79, 'l', 728112, 0),
(159, 80, 'm', 386486, 0),
(160, 80, 's', 672291, 0),
(161, 81, 's', 520078, 0),
(162, 81, 'l', 860989, 0),
(163, 82, 'm', 456634, 0),
(164, 82, 'l', 588022, 0),
(165, 83, 'xl', 470349, 0),
(166, 83, 'm', 295608, 0),
(167, 84, 'xl', 595803, 0),
(168, 84, 'l', 376399, 0),
(169, 85, 's', 542857, 0),
(170, 85, 'l', 235320, 0),
(171, 86, 'l', 867271, 0),
(172, 86, 'l', 114142, 0),
(173, 87, 'm', 332711, 0),
(174, 87, 'm', 222746, 0),
(175, 88, 'xl', 384306, 0),
(176, 88, 's', 986643, 0),
(177, 89, 'l', 902982, 0),
(178, 89, 'l', 219709, 0),
(179, 90, 's', 325376, 0),
(180, 90, 'l', 295409, 0),
(181, 91, 'l', 188474, 0),
(182, 91, 'xl', 477428, 0),
(183, 92, 'xl', 537762, 0),
(184, 92, 's', 658243, 0),
(185, 93, 'xl', 929625, 0),
(186, 93, 's', 926320, 0),
(187, 94, 'm', 438133, 0),
(188, 94, 'm', 859168, 0),
(189, 95, 'l', 841884, 0),
(190, 95, 's', 536478, 0),
(191, 96, 'l', 509513, 0),
(192, 96, 'm', 310952, 0),
(193, 97, 's', 710457, 0),
(194, 97, 'm', 293115, 0),
(195, 98, 's', 638868, 0),
(196, 98, 'l', 356720, 0),
(197, 99, 'xl', 489867, 0),
(198, 99, 'm', 784921, 0),
(199, 100, 'l', 151327, 0),
(200, 100, 'xl', 902487, 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_reviews`
--

CREATE TABLE `item_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` enum('5','4','3','2','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_reviews`
--

INSERT INTO `item_reviews` (`id`, `order_item_id`, `item_id`, `review`, `rating`, `created_at`, `updated_at`) VALUES
(1, 6, 39, 'Alice, with a.', '1', '2020-08-21 01:59:23', '2020-08-21 01:59:23'),
(2, 7, 43, 'Mock Turtle.', '4', '2020-08-21 01:59:24', '2020-08-21 01:59:24'),
(3, 8, 13, 'I could let.', '5', '2020-08-21 01:59:24', '2020-08-21 01:59:24'),
(4, 13, 44, 'First, because I\'m.', '1', '2020-08-21 01:59:25', '2020-08-21 01:59:25'),
(5, 14, 3, 'SIT down,\' the.', '2', '2020-08-21 01:59:25', '2020-08-21 01:59:25'),
(6, 15, 34, 'The cook.', '3', '2020-08-21 01:59:26', '2020-08-21 01:59:26'),
(7, 16, 45, 'I suppose.', '1', '2020-08-21 01:59:26', '2020-08-21 01:59:26'),
(8, 20, 7, 'Even the.', '5', '2020-08-21 01:59:27', '2020-08-21 01:59:27'),
(9, 21, 45, 'Dormouse.', '2', '2020-08-21 01:59:27', '2020-08-21 01:59:27'),
(10, 22, 12, 'By the.', '2', '2020-08-21 01:59:27', '2020-08-21 01:59:27'),
(11, 25, 50, 'And the executioner ran.', '2', '2020-08-21 01:59:27', '2020-08-21 01:59:27'),
(12, 26, 3, 'Alice ventured to.', '1', '2020-08-21 01:59:28', '2020-08-21 01:59:28'),
(13, 30, 31, '.', '2', '2020-08-21 01:59:28', '2020-08-21 01:59:28'),
(14, 31, 1, 'ME.\' \'You!\' said the.', '1', '2020-08-21 01:59:28', '2020-08-21 01:59:28'),
(15, 32, 10, 'Alice.', '2', '2020-08-21 01:59:28', '2020-08-21 01:59:28'),
(16, 33, 37, 'Oh, my dear.', '3', '2020-08-21 01:59:29', '2020-08-21 01:59:29'),
(17, 34, 8, 'May it won\'t be raving.', '1', '2020-08-21 01:59:29', '2020-08-21 01:59:29'),
(18, 35, 41, 'Father William.', '2', '2020-08-21 01:59:29', '2020-08-21 01:59:29'),
(19, 36, 48, 'For.', '1', '2020-08-21 01:59:29', '2020-08-21 01:59:29'),
(20, 37, 47, 'There was a bright brass.', '4', '2020-08-21 01:59:29', '2020-08-21 01:59:29'),
(21, 40, 1, 'Alice heard.', '1', '2020-08-21 01:59:30', '2020-08-21 01:59:30'),
(22, 41, 7, 'I eat or drink.', '5', '2020-08-21 01:59:30', '2020-08-21 01:59:30'),
(23, 42, 39, 'I wish you could.', '2', '2020-08-21 01:59:30', '2020-08-21 01:59:30'),
(24, 43, 20, 'I hadn\'t drunk quite.', '4', '2020-08-21 01:59:30', '2020-08-21 01:59:30'),
(25, 50, 26, 'Alice.', '5', '2020-08-21 01:59:31', '2020-08-21 01:59:31'),
(26, 56, 29, 'The Panther took.', '2', '2020-08-21 01:59:32', '2020-08-21 01:59:32'),
(27, 57, 3, 'Queen: so she set.', '4', '2020-08-21 01:59:32', '2020-08-21 01:59:32'),
(28, 58, 9, 'Arithmetic--Ambition.', '1', '2020-08-21 01:59:32', '2020-08-21 01:59:32'),
(29, 59, 27, 'Mabel! I\'ll try if I.', '1', '2020-08-21 01:59:32', '2020-08-21 01:59:32'),
(30, 60, 39, 'First, because I\'m on the.', '5', '2020-08-21 01:59:32', '2020-08-21 01:59:32'),
(31, 61, 33, 'Rabbit.', '5', '2020-08-21 01:59:33', '2020-08-21 01:59:33'),
(32, 62, 41, 'I shall.', '1', '2020-08-21 01:59:33', '2020-08-21 01:59:33'),
(33, 63, 10, 'Oh, I.', '4', '2020-08-21 01:59:33', '2020-08-21 01:59:33'),
(34, 64, 35, 'CURTSEYING as you\'re.', '4', '2020-08-21 01:59:33', '2020-08-21 01:59:33'),
(35, 74, 24, 'THAT. Then.', '4', '2020-08-21 01:59:34', '2020-08-21 01:59:34'),
(36, 75, 2, 'Gryphon hastily.', '4', '2020-08-21 01:59:34', '2020-08-21 01:59:34'),
(37, 76, 37, 'Caucus-race?\' said.', '3', '2020-08-21 01:59:34', '2020-08-21 01:59:34'),
(38, 77, 8, 'Next came an.', '1', '2020-08-21 01:59:34', '2020-08-21 01:59:34'),
(39, 107, 14, 'It sounded an excellent.', '4', '2020-08-21 01:59:37', '2020-08-21 01:59:37'),
(40, 108, 13, 'White Rabbit. She was.', '1', '2020-08-21 01:59:37', '2020-08-21 01:59:37'),
(41, 118, 47, 'King, and the jury had a.', '3', '2020-08-21 01:59:38', '2020-08-21 01:59:38'),
(42, 119, 37, 'The.', '1', '2020-08-21 01:59:39', '2020-08-21 01:59:39'),
(43, 120, 1, 'Queen in a hoarse growl.', '1', '2020-08-21 01:59:39', '2020-08-21 01:59:39'),
(44, 121, 9, 'March Hare.', '1', '2020-08-21 01:59:39', '2020-08-21 01:59:39'),
(45, 122, 34, 'Queen to play.', '2', '2020-08-21 01:59:39', '2020-08-21 01:59:39'),
(46, 138, 30, 'I think you\'d take a.', '2', '2020-08-21 01:59:40', '2020-08-21 01:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`user_id`, `email`, `email_verified_at`, `password`, `created_at`, `updated_at`) VALUES
(1, 'rau.vickie@example.com', '2020-08-21 01:57:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:53', '2020-08-21 01:57:53'),
(2, 'rogahn.justice@example.net', '2020-08-21 01:57:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:54', '2020-08-21 01:57:54'),
(3, 'hailee.parker@example.org', '2020-08-21 01:57:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:54', '2020-08-21 01:57:54'),
(4, 'dare.robert@example.com', '2020-08-21 01:57:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:54', '2020-08-21 01:57:54'),
(5, 'keebler.colt@example.com', '2020-08-21 01:57:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:55', '2020-08-21 01:57:55'),
(6, 'doyle.stanford@example.com', '2020-08-21 01:57:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:55', '2020-08-21 01:57:55'),
(7, 'benedict.lind@example.org', '2020-08-21 01:57:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:55', '2020-08-21 01:57:55'),
(8, 'lelah60@example.org', '2020-08-21 01:57:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:55', '2020-08-21 01:57:55'),
(9, 'kale46@example.org', '2020-08-21 01:57:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:55', '2020-08-21 01:57:55'),
(10, 'lorenz.thompson@example.org', '2020-08-21 01:57:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:55', '2020-08-21 01:57:55'),
(11, 'ayla.price@example.com', '2020-08-21 01:57:56', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:56', '2020-08-21 01:57:56'),
(12, 'tamara.macejkovic@example.net', '2020-08-21 01:57:56', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:56', '2020-08-21 01:57:56'),
(13, 'hilbert08@example.com', '2020-08-21 01:57:56', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:56', '2020-08-21 01:57:56'),
(14, 'weber.christophe@example.org', '2020-08-21 01:57:56', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:56', '2020-08-21 01:57:56'),
(15, 'hegmann.victor@example.org', '2020-08-21 01:57:56', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:56', '2020-08-21 01:57:56'),
(16, 'vladimir76@example.org', '2020-08-21 01:57:57', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:57', '2020-08-21 01:57:57'),
(17, 'yshanahan@example.org', '2020-08-21 01:57:57', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:57', '2020-08-21 01:57:57'),
(18, 'dmetz@example.org', '2020-08-21 01:57:57', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:57', '2020-08-21 01:57:57'),
(19, 'graham.vesta@example.net', '2020-08-21 01:57:57', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:57', '2020-08-21 01:57:57'),
(20, 'terrence42@example.com', '2020-08-21 01:57:57', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:57', '2020-08-21 01:57:57'),
(21, 'esmeralda93@example.org', '2020-08-21 01:57:57', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:57', '2020-08-21 01:57:57'),
(22, 'hammes.herman@example.org', '2020-08-21 01:57:57', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:57', '2020-08-21 01:57:57'),
(23, 'kiehn.amira@example.org', '2020-08-21 01:57:58', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:58', '2020-08-21 01:57:58'),
(24, 'kylie.larkin@example.com', '2020-08-21 01:57:58', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:58', '2020-08-21 01:57:58'),
(25, 'meagan.wisozk@example.org', '2020-08-21 01:57:58', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:58', '2020-08-21 01:57:58'),
(26, 'abednar@example.com', '2020-08-21 01:57:58', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:58', '2020-08-21 01:57:58'),
(27, 'wisozk.rogelio@example.net', '2020-08-21 01:57:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:59', '2020-08-21 01:57:59'),
(28, 'lila22@example.org', '2020-08-21 01:57:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:59', '2020-08-21 01:57:59'),
(29, 'shawn76@example.com', '2020-08-21 01:57:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:59', '2020-08-21 01:57:59'),
(30, 'amy.torp@example.com', '2020-08-21 01:57:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:59', '2020-08-21 01:57:59'),
(31, 'amely50@example.com', '2020-08-21 01:57:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:59', '2020-08-21 01:57:59'),
(32, 'seth57@example.org', '2020-08-21 01:57:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:59', '2020-08-21 01:57:59'),
(33, 'bstark@example.org', '2020-08-21 01:57:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:57:59', '2020-08-21 01:57:59'),
(34, 'ila.hackett@example.com', '2020-08-21 01:58:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:00', '2020-08-21 01:58:00'),
(35, 'nhansen@example.org', '2020-08-21 01:58:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:00', '2020-08-21 01:58:00'),
(36, 'johathan.towne@example.com', '2020-08-21 01:58:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:00', '2020-08-21 01:58:00'),
(37, 'leo.williamson@example.org', '2020-08-21 01:58:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:00', '2020-08-21 01:58:00'),
(38, 'eberge@example.com', '2020-08-21 01:58:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:00', '2020-08-21 01:58:00'),
(39, 'elfrieda.windler@example.org', '2020-08-21 01:58:01', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:01', '2020-08-21 01:58:01'),
(40, 'conroy.rosina@example.org', '2020-08-21 01:58:01', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:01', '2020-08-21 01:58:01'),
(41, 'wiza.merl@example.net', '2020-08-21 01:58:01', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:01', '2020-08-21 01:58:01'),
(42, 'darwin.stracke@example.net', '2020-08-21 01:58:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:02', '2020-08-21 01:58:02'),
(43, 'angeline15@example.net', '2020-08-21 01:58:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:02', '2020-08-21 01:58:02'),
(44, 'stella.hahn@example.org', '2020-08-21 01:58:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:02', '2020-08-21 01:58:02'),
(45, 'zachary52@example.org', '2020-08-21 01:58:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:02', '2020-08-21 01:58:02'),
(46, 'wmuller@example.com', '2020-08-21 01:58:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:02', '2020-08-21 01:58:02'),
(47, 'wferry@example.org', '2020-08-21 01:58:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:03', '2020-08-21 01:58:03'),
(48, 'feeney.emelie@example.net', '2020-08-21 01:58:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:03', '2020-08-21 01:58:03'),
(49, 'stoltenberg.lauren@example.org', '2020-08-21 01:58:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:03', '2020-08-21 01:58:03'),
(50, 'mcclure.jaquelin@example.net', '2020-08-21 01:58:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:03', '2020-08-21 01:58:03'),
(51, 'katrina03@example.org', '2020-08-21 01:58:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:03', '2020-08-21 01:58:03'),
(52, 'abelardo.daugherty@example.org', '2020-08-21 01:58:04', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:04', '2020-08-21 01:58:04'),
(53, 'goyette.afton@example.org', '2020-08-21 01:58:04', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:04', '2020-08-21 01:58:04'),
(54, 'werner.mccullough@example.com', '2020-08-21 01:58:04', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:04', '2020-08-21 01:58:04'),
(55, 'jessika05@example.com', '2020-08-21 01:58:04', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:04', '2020-08-21 01:58:04'),
(56, 'oharris@example.org', '2020-08-21 01:58:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:05', '2020-08-21 01:58:05'),
(57, 'oconnell.bridget@example.net', '2020-08-21 01:58:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:05', '2020-08-21 01:58:05'),
(58, 'kristin.king@example.com', '2020-08-21 01:58:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:05', '2020-08-21 01:58:05'),
(59, 'cgutmann@example.org', '2020-08-21 01:58:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:06', '2020-08-21 01:58:06'),
(60, 'anya56@example.com', '2020-08-21 01:58:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:06', '2020-08-21 01:58:06'),
(61, 'ssporer@example.net', '2020-08-21 01:58:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:06', '2020-08-21 01:58:06'),
(62, 'keyon16@example.net', '2020-08-21 01:58:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:06', '2020-08-21 01:58:06'),
(63, 'mariam.mcdermott@example.org', '2020-08-21 01:58:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:06', '2020-08-21 01:58:06'),
(64, 'jarmstrong@example.net', '2020-08-21 01:58:07', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:07', '2020-08-21 01:58:07'),
(65, 'mason70@example.com', '2020-08-21 01:58:07', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:07', '2020-08-21 01:58:07'),
(66, 'gbecker@example.org', '2020-08-21 01:58:07', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:07', '2020-08-21 01:58:07'),
(67, 'lmayert@example.net', '2020-08-21 01:58:07', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:07', '2020-08-21 01:58:07'),
(68, 'idooley@example.com', '2020-08-21 01:58:07', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:07', '2020-08-21 01:58:07'),
(69, 'leonor.wilderman@example.org', '2020-08-21 01:58:07', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:07', '2020-08-21 01:58:07'),
(70, 'erin.dibbert@example.net', '2020-08-21 01:58:07', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:07', '2020-08-21 01:58:07'),
(71, 'qratke@example.net', '2020-08-21 01:58:08', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:08', '2020-08-21 01:58:08'),
(72, 'alysson17@example.org', '2020-08-21 01:58:08', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:08', '2020-08-21 01:58:08'),
(73, 'jmayert@example.org', '2020-08-21 01:58:08', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:08', '2020-08-21 01:58:08'),
(74, 'rowena86@example.net', '2020-08-21 01:58:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:09', '2020-08-21 01:58:09'),
(75, 'murphy.hubert@example.com', '2020-08-21 01:58:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:09', '2020-08-21 01:58:09'),
(76, 'jadon56@example.net', '2020-08-21 01:58:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:09', '2020-08-21 01:58:09'),
(77, 'amie38@example.org', '2020-08-21 01:58:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:09', '2020-08-21 01:58:09'),
(78, 'akuhn@example.org', '2020-08-21 01:58:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:09', '2020-08-21 01:58:09'),
(79, 'gutkowski.clinton@example.net', '2020-08-21 01:58:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:09', '2020-08-21 01:58:09'),
(80, 'myron39@example.net', '2020-08-21 01:58:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:10', '2020-08-21 01:58:10'),
(81, 'hyatt.fred@example.com', '2020-08-21 01:58:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:10', '2020-08-21 01:58:10'),
(82, 'lgreen@example.com', '2020-08-21 01:58:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:10', '2020-08-21 01:58:10'),
(83, 'jlubowitz@example.com', '2020-08-21 01:58:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:10', '2020-08-21 01:58:10'),
(84, 'lindgren.mallory@example.com', '2020-08-21 01:58:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:10', '2020-08-21 01:58:10'),
(85, 'francisca11@example.org', '2020-08-21 01:58:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:10', '2020-08-21 01:58:10'),
(86, 'sincere70@example.net', '2020-08-21 01:58:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:11', '2020-08-21 01:58:11'),
(87, 'johns.danika@example.com', '2020-08-21 01:58:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:11', '2020-08-21 01:58:11'),
(88, 'svolkman@example.org', '2020-08-21 01:58:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:11', '2020-08-21 01:58:11'),
(89, 'jillian94@example.net', '2020-08-21 01:58:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:11', '2020-08-21 01:58:11'),
(90, 'torp.dayton@example.org', '2020-08-21 01:58:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:11', '2020-08-21 01:58:11'),
(91, 'dessie27@example.org', '2020-08-21 01:58:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:11', '2020-08-21 01:58:11'),
(92, 'mayra.bashirian@example.com', '2020-08-21 01:58:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:12', '2020-08-21 01:58:12'),
(93, 'oliver.cassin@example.com', '2020-08-21 01:58:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:12', '2020-08-21 01:58:12'),
(94, 'xleuschke@example.com', '2020-08-21 01:58:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:12', '2020-08-21 01:58:12'),
(95, 'tyrell69@example.org', '2020-08-21 01:58:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:12', '2020-08-21 01:58:12'),
(96, 'crist.hadley@example.org', '2020-08-21 01:58:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:12', '2020-08-21 01:58:12'),
(97, 'litzy.kshlerin@example.org', '2020-08-21 01:58:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:12', '2020-08-21 01:58:12'),
(98, 'rafaela.swift@example.net', '2020-08-21 01:58:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:13', '2020-08-21 01:58:13'),
(99, 'ava.murazik@example.net', '2020-08-21 01:58:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:13', '2020-08-21 01:58:13'),
(100, 'makenzie.waelchi@example.net', '2020-08-21 01:58:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-08-21 01:58:13', '2020-08-21 01:58:13');

-- --------------------------------------------------------

--
-- Table structure for table `looks`
--

CREATE TABLE `looks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('men','women','kids') COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(10) UNSIGNED DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `looks`
--

INSERT INTO `looks` (`id`, `user_id`, `title`, `description`, `picture`, `gender`, `height`, `age`, `is_delete`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 83, 'look 88', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product7.jpg', 'women', '171', 81, 0, 1, '2020-08-21 01:58:13', '2020-08-21 01:58:13'),
(2, 90, 'look 9', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product8.jpg', 'kids', '108', 5, 0, 1, '2020-08-21 01:59:01', '2020-08-21 01:59:01'),
(3, 27, 'look 51', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product8.jpg', 'women', '155', 70, 0, 1, '2020-08-21 01:59:01', '2020-08-21 01:59:01'),
(4, 58, 'look 87', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product4.jpg', 'men', '157', 55, 0, 1, '2020-08-21 01:59:02', '2020-08-21 01:59:02'),
(5, 100, 'look 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product6.jpg', 'kids', '56', 6, 0, 1, '2020-08-21 01:59:03', '2020-08-21 01:59:03'),
(6, 83, 'look 96', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product7.jpg', 'women', '167', 88, 0, 1, '2020-08-21 01:59:03', '2020-08-21 01:59:03'),
(7, 85, 'look 92', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product10.jpg', 'men', '164', 58, 0, 1, '2020-08-21 01:59:03', '2020-08-21 01:59:03'),
(8, 32, 'look 23', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product4.jpg', 'men', '173', 73, 0, 1, '2020-08-21 01:59:04', '2020-08-21 01:59:04'),
(9, 88, 'look 85', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product7.jpg', 'kids', '97', 8, 0, 1, '2020-08-21 01:59:04', '2020-08-21 01:59:04'),
(10, 78, 'look 35', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product4.jpg', 'women', '132', 24, 0, 1, '2020-08-21 01:59:04', '2020-08-21 01:59:04'),
(11, 88, 'look 8', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product10.jpg', 'women', '154', 73, 0, 1, '2020-08-21 01:59:05', '2020-08-21 01:59:05'),
(12, 85, 'look 21', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product9.jpg', 'women', '148', 74, 0, 1, '2020-08-21 01:59:05', '2020-08-21 01:59:05'),
(13, 91, 'look 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product4.jpg', 'women', '178', 110, 0, 1, '2020-08-21 01:59:05', '2020-08-21 01:59:05'),
(14, 13, 'look 48', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product3.jpg', 'women', '173', 51, 0, 1, '2020-08-21 01:59:05', '2020-08-21 01:59:05'),
(15, 68, 'look 34', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product10.jpg', 'kids', '121', 12, 0, 1, '2020-08-21 01:59:06', '2020-08-21 01:59:06'),
(16, 32, 'look 59', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product6.jpg', 'men', '155', 30, 0, 1, '2020-08-21 01:59:06', '2020-08-21 01:59:06'),
(17, 44, 'look 91', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product1.jpg', 'women', '162', 108, 0, 1, '2020-08-21 01:59:06', '2020-08-21 01:59:06'),
(18, 82, 'look 57', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product4.jpg', 'men', '140', 31, 0, 1, '2020-08-21 01:59:06', '2020-08-21 01:59:06'),
(19, 16, 'look 37', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product7.jpg', 'men', '168', 38, 0, 1, '2020-08-21 01:59:06', '2020-08-21 01:59:06'),
(20, 89, 'look 91', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product7.jpg', 'kids', '122', 9, 0, 1, '2020-08-21 01:59:06', '2020-08-21 01:59:06'),
(21, 27, 'look 59', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product5.jpg', 'kids', '119', 9, 0, 1, '2020-08-21 01:59:06', '2020-08-21 01:59:06'),
(22, 52, 'look 30', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product9.jpg', 'men', '153', 21, 0, 1, '2020-08-21 01:59:06', '2020-08-21 01:59:06'),
(23, 4, 'look 18', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product9.jpg', 'women', '177', 98, 0, 1, '2020-08-21 01:59:06', '2020-08-21 01:59:06'),
(24, 67, 'look 99', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product8.jpg', 'men', '177', 35, 0, 1, '2020-08-21 01:59:06', '2020-08-21 01:59:06'),
(25, 18, 'look 95', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product6.jpg', 'men', '169', 54, 0, 1, '2020-08-21 01:59:06', '2020-08-21 01:59:06'),
(26, 68, 'look 20', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product7.jpg', 'men', '164', 28, 0, 1, '2020-08-21 01:59:06', '2020-08-21 01:59:06'),
(27, 19, 'look 50', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product1.jpg', 'men', '168', 40, 0, 1, '2020-08-21 01:59:06', '2020-08-21 01:59:06'),
(28, 77, 'look 62', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product1.jpg', 'kids', '95', 6, 0, 1, '2020-08-21 01:59:07', '2020-08-21 01:59:07'),
(29, 95, 'look 68', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product1.jpg', 'women', '139', 34, 0, 1, '2020-08-21 01:59:07', '2020-08-21 01:59:07'),
(30, 2, 'look 84', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product5.jpg', 'kids', '104', 2, 0, 1, '2020-08-21 01:59:07', '2020-08-21 01:59:07'),
(31, 4, 'look 16', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product2.jpg', 'women', '131', 37, 0, 1, '2020-08-21 01:59:07', '2020-08-21 01:59:07'),
(32, 21, 'look 71', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product7.jpg', 'women', '180', 92, 0, 1, '2020-08-21 01:59:07', '2020-08-21 01:59:07'),
(33, 96, 'look 16', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product10.jpg', 'women', '161', 49, 0, 1, '2020-08-21 01:59:07', '2020-08-21 01:59:07'),
(34, 95, 'look 8', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product7.jpg', 'women', '176', 69, 0, 1, '2020-08-21 01:59:07', '2020-08-21 01:59:07'),
(35, 83, 'look 71', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product3.jpg', 'men', '161', 90, 0, 1, '2020-08-21 01:59:07', '2020-08-21 01:59:07'),
(36, 65, 'look 31', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product8.jpg', 'women', '187', 110, 0, 1, '2020-08-21 01:59:07', '2020-08-21 01:59:07'),
(37, 85, 'look 76', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product1.jpg', 'men', '140', 21, 0, 1, '2020-08-21 01:59:07', '2020-08-21 01:59:07'),
(38, 52, 'look 78', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product8.jpg', 'men', '177', 76, 0, 1, '2020-08-21 01:59:07', '2020-08-21 01:59:07'),
(39, 93, 'look 71', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product7.jpg', 'men', '178', 74, 0, 1, '2020-08-21 01:59:07', '2020-08-21 01:59:07'),
(40, 12, 'look 61', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product7.jpg', 'kids', '126', 13, 0, 1, '2020-08-21 01:59:08', '2020-08-21 01:59:08'),
(41, 33, 'look 35', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product3.jpg', 'men', '146', 80, 0, 1, '2020-08-21 01:59:08', '2020-08-21 01:59:08'),
(42, 86, 'look 54', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product10.jpg', 'women', '143', 83, 0, 1, '2020-08-21 01:59:08', '2020-08-21 01:59:08'),
(43, 3, 'look 35', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product5.jpg', 'kids', '57', 17, 0, 1, '2020-08-21 01:59:08', '2020-08-21 01:59:08'),
(44, 13, 'look 67', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product3.jpg', 'men', '168', 101, 0, 1, '2020-08-21 01:59:08', '2020-08-21 01:59:08'),
(45, 27, 'look 20', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product1.jpg', 'men', '184', 52, 0, 1, '2020-08-21 01:59:09', '2020-08-21 01:59:09'),
(46, 8, 'look 52', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product7.jpg', 'women', '136', 50, 0, 1, '2020-08-21 01:59:09', '2020-08-21 01:59:09'),
(47, 3, 'look 53', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product7.jpg', 'men', '166', 40, 0, 1, '2020-08-21 01:59:09', '2020-08-21 01:59:09'),
(48, 93, 'look 18', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product5.jpg', 'men', '155', 100, 0, 1, '2020-08-21 01:59:09', '2020-08-21 01:59:09'),
(49, 13, 'look 96', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product5.jpg', 'women', '170', 56, 0, 1, '2020-08-21 01:59:09', '2020-08-21 01:59:09'),
(50, 24, 'look 65', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product9.jpg', 'kids', '48', 3, 0, 1, '2020-08-21 01:59:09', '2020-08-21 01:59:09'),
(51, 67, 'look 91', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'images/product/product2.jpg', 'women', '158', 82, 0, 1, '2020-08-21 01:59:09', '2020-08-21 01:59:09');

-- --------------------------------------------------------

--
-- Table structure for table `look_hashtags`
--

CREATE TABLE `look_hashtags` (
  `look_id` bigint(20) UNSIGNED NOT NULL,
  `hashtag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `look_items`
--

CREATE TABLE `look_items` (
  `look_id` bigint(20) UNSIGNED NOT NULL,
  `item_detail_information_id` bigint(20) UNSIGNED NOT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `look_items`
--

INSERT INTO `look_items` (`look_id`, `item_detail_information_id`, `is_delete`) VALUES
(2, 156, 0),
(3, 98, 0),
(4, 152, 0),
(5, 38, 0),
(6, 75, 0),
(7, 123, 0),
(8, 169, 0),
(9, 133, 0),
(10, 74, 0),
(11, 71, 0),
(12, 57, 0),
(13, 167, 0),
(14, 1, 0),
(15, 189, 0),
(16, 137, 0),
(17, 178, 0),
(18, 70, 0),
(19, 196, 0),
(20, 200, 0),
(21, 37, 0),
(22, 18, 0),
(23, 189, 0),
(24, 196, 0),
(25, 198, 0),
(26, 38, 0),
(27, 153, 0),
(28, 79, 0),
(29, 181, 0),
(30, 145, 0),
(31, 11, 0),
(32, 198, 0),
(33, 118, 0),
(34, 121, 0),
(35, 44, 0),
(36, 30, 0),
(37, 6, 0),
(38, 137, 0),
(39, 17, 0),
(40, 149, 0),
(41, 93, 0),
(42, 129, 0),
(43, 1, 0),
(44, 133, 0),
(45, 200, 0),
(46, 195, 0),
(47, 34, 0),
(48, 150, 0),
(49, 24, 0),
(50, 99, 0),
(51, 197, 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `channel_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `channel_id`, `sender_id`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 20, 2, 'After a while she ran, as.', 1, '2020-08-21 01:59:46', '2020-08-21 01:59:46'),
(2, 24, 79, 'Alice noticed with some difficulty, as it can\'t.', 0, '2020-08-21 01:59:46', '2020-08-21 01:59:46'),
(3, 5, 39, 'Alice, as she stood still.', 0, '2020-08-21 01:59:46', '2020-08-21 01:59:46'),
(4, 3, 76, 'Hatter: \'let\'s all move one place on.\'.', 1, '2020-08-21 01:59:46', '2020-08-21 01:59:46'),
(5, 25, 99, 'VERY much out of the.', 1, '2020-08-21 01:59:46', '2020-08-21 01:59:46'),
(6, 20, 2, 'As there seemed to her that she.', 0, '2020-08-21 01:59:46', '2020-08-21 01:59:46'),
(7, 7, 29, 'VERY.', 1, '2020-08-21 01:59:46', '2020-08-21 01:59:46'),
(8, 2, 24, 'However, the Multiplication Table doesn\'t.', 0, '2020-08-21 01:59:47', '2020-08-21 01:59:47'),
(9, 7, 37, 'Alice, flinging the.', 0, '2020-08-21 01:59:47', '2020-08-21 01:59:47'),
(10, 28, 87, 'The baby grunted again, so violently.', 0, '2020-08-21 01:59:47', '2020-08-21 01:59:47'),
(11, 23, 45, 'Dormouse fell asleep instantly, and.', 0, '2020-08-21 01:59:47', '2020-08-21 01:59:47'),
(12, 8, 77, 'The first witness was the BEST butter, you.', 0, '2020-08-21 01:59:47', '2020-08-21 01:59:47'),
(13, 29, 49, 'HIS time of life. The King\'s argument.', 0, '2020-08-21 01:59:47', '2020-08-21 01:59:47'),
(14, 11, 64, 'But the snail replied \"Too far, too far!\".', 1, '2020-08-21 01:59:47', '2020-08-21 01:59:47'),
(15, 20, 2, 'Alice, and she set to work.', 1, '2020-08-21 01:59:47', '2020-08-21 01:59:47'),
(16, 5, 39, 'Alice. \'Reeling and.', 0, '2020-08-21 01:59:47', '2020-08-21 01:59:47'),
(17, 6, 6, 'Mock Turtle.', 1, '2020-08-21 01:59:47', '2020-08-21 01:59:47'),
(18, 21, 77, 'Alice remarked. \'Right.', 0, '2020-08-21 01:59:47', '2020-08-21 01:59:47'),
(19, 2, 86, 'I WAS when I got.', 1, '2020-08-21 01:59:47', '2020-08-21 01:59:47'),
(20, 19, 16, 'Pigeon in a tone of great relief.', 0, '2020-08-21 01:59:47', '2020-08-21 01:59:47'),
(21, 14, 70, 'CHAPTER X. The Lobster.', 0, '2020-08-21 01:59:47', '2020-08-21 01:59:47'),
(22, 18, 76, 'He moved on as he wore his.', 0, '2020-08-21 01:59:47', '2020-08-21 01:59:47'),
(23, 8, 70, 'Mock Turtle drew a long silence after.', 0, '2020-08-21 01:59:47', '2020-08-21 01:59:47'),
(24, 7, 37, 'Then came a little bird as soon as there.', 1, '2020-08-21 01:59:48', '2020-08-21 01:59:48'),
(25, 19, 16, 'Alice, and she ran off at once, and ran.', 0, '2020-08-21 01:59:48', '2020-08-21 01:59:48'),
(26, 30, 6, 'Hatter. He came in sight of the.', 0, '2020-08-21 01:59:48', '2020-08-21 01:59:48'),
(27, 18, 22, 'And she began thinking over all she.', 1, '2020-08-21 01:59:48', '2020-08-21 01:59:48'),
(28, 20, 2, 'Alice; \'you needn\'t be afraid of it. Presently.', 1, '2020-08-21 01:59:48', '2020-08-21 01:59:48'),
(29, 25, 20, 'The Mock Turtle recovered his.', 0, '2020-08-21 01:59:48', '2020-08-21 01:59:48'),
(30, 9, 35, 'The.', 1, '2020-08-21 01:59:48', '2020-08-21 01:59:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_04_28_000000_users', 1),
(4, '2020_04_28_000001_logins', 1),
(5, '2020_04_28_000002_shops', 1),
(6, '2020_04_29_022330_addresses', 1),
(7, '2020_04_29_022333_categories', 1),
(8, '2020_04_29_022334_sub_categories', 1),
(9, '2020_04_29_022335_brands', 1),
(10, '2020_04_29_022418_items', 1),
(11, '2020_04_29_022420_item_details', 1),
(12, '2020_04_29_022421_create_item_detail_informations_table', 1),
(13, '2020_05_03_044041_looks', 1),
(14, '2020_05_26_022726_look_items', 1),
(15, '2020_05_26_022825_orders', 1),
(16, '2020_05_26_022835_order_items', 1),
(17, '2020_05_26_022905_item_reviews', 1),
(18, '2020_05_26_033540_rankings', 1),
(19, '2020_05_26_033544_channels', 1),
(20, '2020_05_26_033553_messages', 1),
(21, '2020_06_10_082820_create_carts_table', 1),
(22, '2020_06_12_044847_favourite_looks', 1),
(23, '2020_06_18_015944_create_followers_table', 1),
(24, '2020_06_26_094825_s_n_s', 1),
(25, '2020_07_09_105542_create_favourite_items_table', 1),
(26, '2020_07_16_101428_hashtags', 1),
(27, '2020_07_16_101552_look_hashtags', 1),
(28, '2020_07_21_102649_comments', 1),
(29, '2020_07_21_111639_trending_hashtags', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('processing','shipping','delivered','canceled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 97, 97, 'shipping', '2020-08-21 01:59:19', '2020-08-21 01:59:19'),
(2, 39, 39, 'delivered', '2020-08-21 01:59:19', '2020-08-21 01:59:19'),
(3, 60, 60, 'delivered', '2020-08-21 01:59:19', '2020-08-21 01:59:19'),
(4, 38, 38, 'canceled', '2020-08-21 01:59:20', '2020-08-21 01:59:20'),
(5, 19, 19, 'delivered', '2020-08-21 01:59:20', '2020-08-21 01:59:20'),
(6, 44, 44, 'canceled', '2020-08-21 01:59:20', '2020-08-21 01:59:20'),
(7, 94, 94, 'delivered', '2020-08-21 01:59:20', '2020-08-21 01:59:20'),
(8, 50, 50, 'shipping', '2020-08-21 01:59:20', '2020-08-21 01:59:20'),
(9, 9, 9, 'canceled', '2020-08-21 01:59:20', '2020-08-21 01:59:20'),
(10, 88, 88, 'delivered', '2020-08-21 01:59:20', '2020-08-21 01:59:20'),
(11, 79, 79, 'canceled', '2020-08-21 01:59:20', '2020-08-21 01:59:20'),
(12, 55, 55, 'processing', '2020-08-21 01:59:20', '2020-08-21 01:59:20'),
(13, 64, 64, 'delivered', '2020-08-21 01:59:20', '2020-08-21 01:59:20'),
(14, 33, 33, 'delivered', '2020-08-21 01:59:20', '2020-08-21 01:59:20'),
(15, 50, 50, 'shipping', '2020-08-21 01:59:20', '2020-08-21 01:59:20'),
(16, 50, 50, 'delivered', '2020-08-21 01:59:20', '2020-08-21 01:59:20'),
(17, 95, 95, 'shipping', '2020-08-21 01:59:20', '2020-08-21 01:59:20'),
(18, 23, 23, 'shipping', '2020-08-21 01:59:20', '2020-08-21 01:59:20'),
(19, 29, 29, 'delivered', '2020-08-21 01:59:20', '2020-08-21 01:59:20'),
(20, 72, 72, 'shipping', '2020-08-21 01:59:21', '2020-08-21 01:59:21'),
(21, 36, 36, 'delivered', '2020-08-21 01:59:21', '2020-08-21 01:59:21'),
(22, 48, 48, 'delivered', '2020-08-21 01:59:21', '2020-08-21 01:59:21'),
(23, 24, 24, 'processing', '2020-08-21 01:59:21', '2020-08-21 01:59:21'),
(24, 28, 28, 'processing', '2020-08-21 01:59:21', '2020-08-21 01:59:21'),
(25, 3, 3, 'canceled', '2020-08-21 01:59:21', '2020-08-21 01:59:21'),
(26, 30, 30, 'processing', '2020-08-21 01:59:21', '2020-08-21 01:59:21'),
(27, 31, 31, 'delivered', '2020-08-21 01:59:21', '2020-08-21 01:59:21'),
(28, 86, 86, 'delivered', '2020-08-21 01:59:21', '2020-08-21 01:59:21'),
(29, 65, 65, 'shipping', '2020-08-21 01:59:21', '2020-08-21 01:59:21'),
(30, 88, 88, 'shipping', '2020-08-21 01:59:21', '2020-08-21 01:59:21'),
(31, 31, 31, 'shipping', '2020-08-21 01:59:21', '2020-08-21 01:59:21'),
(32, 18, 18, 'shipping', '2020-08-21 01:59:21', '2020-08-21 01:59:21'),
(33, 91, 91, 'canceled', '2020-08-21 01:59:21', '2020-08-21 01:59:21'),
(34, 38, 38, 'canceled', '2020-08-21 01:59:21', '2020-08-21 01:59:21'),
(35, 70, 70, 'canceled', '2020-08-21 01:59:22', '2020-08-21 01:59:22'),
(36, 30, 30, 'shipping', '2020-08-21 01:59:22', '2020-08-21 01:59:22'),
(37, 11, 11, 'delivered', '2020-08-21 01:59:22', '2020-08-21 01:59:22'),
(38, 4, 4, 'shipping', '2020-08-21 01:59:22', '2020-08-21 01:59:22'),
(39, 64, 64, 'canceled', '2020-08-21 01:59:22', '2020-08-21 01:59:22'),
(40, 49, 49, 'shipping', '2020-08-21 01:59:22', '2020-08-21 01:59:22'),
(41, 47, 47, 'delivered', '2020-08-21 01:59:22', '2020-08-21 01:59:22'),
(42, 92, 92, 'shipping', '2020-08-21 01:59:22', '2020-08-21 01:59:22'),
(43, 60, 60, 'processing', '2020-08-21 01:59:22', '2020-08-21 01:59:22'),
(44, 85, 85, 'processing', '2020-08-21 01:59:22', '2020-08-21 01:59:22'),
(45, 46, 46, 'shipping', '2020-08-21 01:59:22', '2020-08-21 01:59:22'),
(46, 87, 87, 'delivered', '2020-08-21 01:59:22', '2020-08-21 01:59:22'),
(47, 48, 48, 'shipping', '2020-08-21 01:59:22', '2020-08-21 01:59:22'),
(48, 72, 72, 'processing', '2020-08-21 01:59:22', '2020-08-21 01:59:22'),
(49, 60, 60, 'canceled', '2020-08-21 01:59:22', '2020-08-21 01:59:22'),
(50, 26, 26, 'processing', '2020-08-21 01:59:22', '2020-08-21 01:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `item_detail_information_id` bigint(20) UNSIGNED NOT NULL,
  `look_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `shipping_fee` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `item_detail_information_id`, `look_id`, `quantity`, `shipping_fee`, `created_at`, `updated_at`) VALUES
(1, 1, 140, 29, 3, 29, '2020-08-21 01:59:22', '2020-08-21 01:59:22'),
(2, 1, 147, 31, 2, 32, '2020-08-21 01:59:23', '2020-08-21 01:59:23'),
(3, 1, 83, 17, 3, 23, '2020-08-21 01:59:23', '2020-08-21 01:59:23'),
(4, 1, 89, 30, 2, 27, '2020-08-21 01:59:23', '2020-08-21 01:59:23'),
(5, 1, 155, 40, 3, 25, '2020-08-21 01:59:23', '2020-08-21 01:59:23'),
(6, 2, 154, 39, 3, 32, '2020-08-21 01:59:23', '2020-08-21 01:59:23'),
(7, 3, 169, 44, 3, 14, '2020-08-21 01:59:24', '2020-08-21 01:59:24'),
(8, 3, 50, 37, 4, 17, '2020-08-21 01:59:24', '2020-08-21 01:59:24'),
(9, 4, 15, 42, 5, 30, '2020-08-21 01:59:24', '2020-08-21 01:59:24'),
(10, 4, 50, 16, 4, 27, '2020-08-21 01:59:24', '2020-08-21 01:59:24'),
(11, 4, 122, 34, 3, 24, '2020-08-21 01:59:24', '2020-08-21 01:59:24'),
(12, 4, 152, 13, 4, 29, '2020-08-21 01:59:24', '2020-08-21 01:59:24'),
(13, 5, 176, 50, 3, 36, '2020-08-21 01:59:24', '2020-08-21 01:59:24'),
(14, 5, 12, 42, 2, 21, '2020-08-21 01:59:24', '2020-08-21 01:59:24'),
(15, 5, 136, 26, 4, 12, '2020-08-21 01:59:24', '2020-08-21 01:59:24'),
(16, 5, 178, 30, 2, 32, '2020-08-21 01:59:25', '2020-08-21 01:59:25'),
(17, 6, 163, 21, 4, 28, '2020-08-21 01:59:26', '2020-08-21 01:59:26'),
(18, 6, 108, 25, 4, 32, '2020-08-21 01:59:26', '2020-08-21 01:59:26'),
(19, 6, 177, 9, 5, 11, '2020-08-21 01:59:26', '2020-08-21 01:59:26'),
(20, 7, 26, 41, 2, 24, '2020-08-21 01:59:27', '2020-08-21 01:59:27'),
(21, 7, 177, 1, 5, 28, '2020-08-21 01:59:27', '2020-08-21 01:59:27'),
(22, 7, 45, 9, 4, 13, '2020-08-21 01:59:27', '2020-08-21 01:59:27'),
(23, 8, 1, 29, 4, 19, '2020-08-21 01:59:27', '2020-08-21 01:59:27'),
(24, 9, 131, 42, 2, 27, '2020-08-21 01:59:27', '2020-08-21 01:59:27'),
(25, 10, 199, 49, 2, 18, '2020-08-21 01:59:27', '2020-08-21 01:59:27'),
(26, 10, 10, 32, 2, 37, '2020-08-21 01:59:27', '2020-08-21 01:59:27'),
(27, 11, 185, 39, 3, 37, '2020-08-21 01:59:28', '2020-08-21 01:59:28'),
(28, 11, 177, 23, 4, 25, '2020-08-21 01:59:28', '2020-08-21 01:59:28'),
(29, 12, 190, 9, 2, 38, '2020-08-21 01:59:28', '2020-08-21 01:59:28'),
(30, 13, 123, 41, 2, 36, '2020-08-21 01:59:28', '2020-08-21 01:59:28'),
(31, 13, 3, 42, 3, 16, '2020-08-21 01:59:28', '2020-08-21 01:59:28'),
(32, 13, 38, 1, 3, 33, '2020-08-21 01:59:28', '2020-08-21 01:59:28'),
(33, 14, 145, 38, 4, 25, '2020-08-21 01:59:29', '2020-08-21 01:59:29'),
(34, 14, 31, 32, 4, 28, '2020-08-21 01:59:29', '2020-08-21 01:59:29'),
(35, 14, 163, 1, 2, 28, '2020-08-21 01:59:29', '2020-08-21 01:59:29'),
(36, 14, 189, 25, 2, 27, '2020-08-21 01:59:29', '2020-08-21 01:59:29'),
(37, 14, 185, 48, 4, 40, '2020-08-21 01:59:29', '2020-08-21 01:59:29'),
(38, 15, 124, 43, 5, 17, '2020-08-21 01:59:29', '2020-08-21 01:59:29'),
(39, 15, 25, 12, 3, 12, '2020-08-21 01:59:30', '2020-08-21 01:59:30'),
(40, 16, 3, 33, 5, 11, '2020-08-21 01:59:30', '2020-08-21 01:59:30'),
(41, 16, 25, 44, 5, 19, '2020-08-21 01:59:30', '2020-08-21 01:59:30'),
(42, 16, 153, 51, 4, 36, '2020-08-21 01:59:30', '2020-08-21 01:59:30'),
(43, 16, 77, 28, 3, 11, '2020-08-21 01:59:30', '2020-08-21 01:59:30'),
(44, 17, 96, 14, 3, 17, '2020-08-21 01:59:30', '2020-08-21 01:59:30'),
(45, 17, 37, 33, 3, 16, '2020-08-21 01:59:30', '2020-08-21 01:59:30'),
(46, 17, 185, 1, 2, 28, '2020-08-21 01:59:30', '2020-08-21 01:59:30'),
(47, 17, 24, 46, 2, 14, '2020-08-21 01:59:31', '2020-08-21 01:59:31'),
(48, 17, 75, 21, 4, 24, '2020-08-21 01:59:31', '2020-08-21 01:59:31'),
(49, 18, 77, 33, 4, 17, '2020-08-21 01:59:31', '2020-08-21 01:59:31'),
(50, 19, 102, 25, 4, 18, '2020-08-21 01:59:31', '2020-08-21 01:59:31'),
(51, 20, 54, 13, 3, 24, '2020-08-21 01:59:31', '2020-08-21 01:59:31'),
(52, 20, 75, 6, 5, 17, '2020-08-21 01:59:31', '2020-08-21 01:59:31'),
(53, 20, 3, 39, 2, 31, '2020-08-21 01:59:31', '2020-08-21 01:59:31'),
(54, 20, 177, 43, 4, 29, '2020-08-21 01:59:31', '2020-08-21 01:59:31'),
(55, 20, 135, 38, 2, 12, '2020-08-21 01:59:31', '2020-08-21 01:59:31'),
(56, 21, 113, 17, 4, 10, '2020-08-21 01:59:31', '2020-08-21 01:59:31'),
(57, 21, 9, 31, 3, 15, '2020-08-21 01:59:32', '2020-08-21 01:59:32'),
(58, 21, 36, 7, 2, 32, '2020-08-21 01:59:32', '2020-08-21 01:59:32'),
(59, 21, 107, 9, 5, 17, '2020-08-21 01:59:32', '2020-08-21 01:59:32'),
(60, 21, 156, 12, 5, 20, '2020-08-21 01:59:32', '2020-08-21 01:59:32'),
(61, 22, 130, 25, 2, 34, '2020-08-21 01:59:32', '2020-08-21 01:59:32'),
(62, 22, 164, 24, 3, 14, '2020-08-21 01:59:32', '2020-08-21 01:59:32'),
(63, 22, 40, 49, 3, 31, '2020-08-21 01:59:32', '2020-08-21 01:59:32'),
(64, 22, 140, 44, 5, 40, '2020-08-21 01:59:33', '2020-08-21 01:59:33'),
(65, 23, 159, 46, 4, 40, '2020-08-21 01:59:33', '2020-08-21 01:59:33'),
(66, 24, 83, 46, 3, 12, '2020-08-21 01:59:33', '2020-08-21 01:59:33'),
(67, 24, 161, 13, 4, 27, '2020-08-21 01:59:33', '2020-08-21 01:59:33'),
(68, 24, 184, 8, 5, 37, '2020-08-21 01:59:33', '2020-08-21 01:59:33'),
(69, 24, 129, 30, 3, 35, '2020-08-21 01:59:33', '2020-08-21 01:59:33'),
(70, 25, 57, 3, 5, 16, '2020-08-21 01:59:33', '2020-08-21 01:59:33'),
(71, 26, 77, 30, 5, 18, '2020-08-21 01:59:33', '2020-08-21 01:59:33'),
(72, 26, 97, 22, 3, 38, '2020-08-21 01:59:33', '2020-08-21 01:59:33'),
(73, 26, 38, 39, 2, 21, '2020-08-21 01:59:33', '2020-08-21 01:59:33'),
(74, 27, 93, 41, 4, 26, '2020-08-21 01:59:33', '2020-08-21 01:59:33'),
(75, 28, 7, 47, 3, 18, '2020-08-21 01:59:34', '2020-08-21 01:59:34'),
(76, 28, 147, 47, 5, 38, '2020-08-21 01:59:34', '2020-08-21 01:59:34'),
(77, 28, 31, 7, 3, 34, '2020-08-21 01:59:34', '2020-08-21 01:59:34'),
(78, 29, 140, 48, 2, 17, '2020-08-21 01:59:34', '2020-08-21 01:59:34'),
(79, 29, 70, 12, 2, 34, '2020-08-21 01:59:35', '2020-08-21 01:59:35'),
(80, 29, 45, 43, 2, 35, '2020-08-21 01:59:35', '2020-08-21 01:59:35'),
(81, 29, 133, 47, 3, 33, '2020-08-21 01:59:35', '2020-08-21 01:59:35'),
(82, 29, 5, 48, 3, 30, '2020-08-21 01:59:35', '2020-08-21 01:59:35'),
(83, 30, 147, 18, 4, 12, '2020-08-21 01:59:35', '2020-08-21 01:59:35'),
(84, 30, 166, 8, 5, 30, '2020-08-21 01:59:35', '2020-08-21 01:59:35'),
(85, 30, 45, 23, 2, 25, '2020-08-21 01:59:35', '2020-08-21 01:59:35'),
(86, 31, 96, 33, 2, 16, '2020-08-21 01:59:35', '2020-08-21 01:59:35'),
(87, 31, 23, 4, 4, 12, '2020-08-21 01:59:35', '2020-08-21 01:59:35'),
(88, 31, 53, 41, 5, 17, '2020-08-21 01:59:35', '2020-08-21 01:59:35'),
(89, 31, 11, 40, 5, 20, '2020-08-21 01:59:35', '2020-08-21 01:59:35'),
(90, 32, 66, 28, 3, 25, '2020-08-21 01:59:35', '2020-08-21 01:59:35'),
(91, 32, 15, 33, 3, 14, '2020-08-21 01:59:36', '2020-08-21 01:59:36'),
(92, 33, 135, 6, 4, 20, '2020-08-21 01:59:36', '2020-08-21 01:59:36'),
(93, 33, 153, 38, 2, 26, '2020-08-21 01:59:36', '2020-08-21 01:59:36'),
(94, 33, 133, 3, 3, 22, '2020-08-21 01:59:36', '2020-08-21 01:59:36'),
(95, 34, 98, 5, 3, 16, '2020-08-21 01:59:36', '2020-08-21 01:59:36'),
(96, 34, 89, 25, 5, 10, '2020-08-21 01:59:36', '2020-08-21 01:59:36'),
(97, 34, 163, 16, 4, 25, '2020-08-21 01:59:36', '2020-08-21 01:59:36'),
(98, 34, 179, 6, 5, 24, '2020-08-21 01:59:36', '2020-08-21 01:59:36'),
(99, 34, 21, 46, 3, 38, '2020-08-21 01:59:36', '2020-08-21 01:59:36'),
(100, 35, 81, 48, 2, 31, '2020-08-21 01:59:36', '2020-08-21 01:59:36'),
(101, 35, 68, 30, 4, 11, '2020-08-21 01:59:36', '2020-08-21 01:59:36'),
(102, 35, 33, 12, 3, 33, '2020-08-21 01:59:37', '2020-08-21 01:59:37'),
(103, 35, 151, 16, 5, 33, '2020-08-21 01:59:37', '2020-08-21 01:59:37'),
(104, 35, 122, 12, 2, 27, '2020-08-21 01:59:37', '2020-08-21 01:59:37'),
(105, 36, 94, 35, 2, 38, '2020-08-21 01:59:37', '2020-08-21 01:59:37'),
(106, 36, 148, 31, 4, 33, '2020-08-21 01:59:37', '2020-08-21 01:59:37'),
(107, 37, 55, 11, 3, 27, '2020-08-21 01:59:37', '2020-08-21 01:59:37'),
(108, 37, 52, 8, 4, 26, '2020-08-21 01:59:37', '2020-08-21 01:59:37'),
(109, 38, 194, 38, 2, 34, '2020-08-21 01:59:37', '2020-08-21 01:59:37'),
(110, 39, 126, 21, 4, 12, '2020-08-21 01:59:38', '2020-08-21 01:59:38'),
(111, 39, 48, 42, 5, 39, '2020-08-21 01:59:38', '2020-08-21 01:59:38'),
(112, 39, 53, 18, 3, 16, '2020-08-21 01:59:38', '2020-08-21 01:59:38'),
(113, 40, 166, 12, 5, 38, '2020-08-21 01:59:38', '2020-08-21 01:59:38'),
(114, 40, 14, 24, 3, 15, '2020-08-21 01:59:38', '2020-08-21 01:59:38'),
(115, 40, 111, 49, 4, 18, '2020-08-21 01:59:38', '2020-08-21 01:59:38'),
(116, 40, 64, 50, 4, 29, '2020-08-21 01:59:38', '2020-08-21 01:59:38'),
(117, 40, 20, 3, 2, 36, '2020-08-21 01:59:38', '2020-08-21 01:59:38'),
(118, 41, 188, 35, 5, 28, '2020-08-21 01:59:38', '2020-08-21 01:59:38'),
(119, 41, 148, 3, 5, 22, '2020-08-21 01:59:38', '2020-08-21 01:59:38'),
(120, 41, 3, 49, 4, 23, '2020-08-21 01:59:38', '2020-08-21 01:59:38'),
(121, 41, 35, 29, 2, 26, '2020-08-21 01:59:38', '2020-08-21 01:59:38'),
(122, 41, 133, 46, 5, 21, '2020-08-21 01:59:38', '2020-08-21 01:59:38'),
(123, 42, 192, 14, 5, 13, '2020-08-21 01:59:39', '2020-08-21 01:59:39'),
(124, 42, 50, 32, 5, 40, '2020-08-21 01:59:39', '2020-08-21 01:59:39'),
(125, 42, 19, 36, 2, 21, '2020-08-21 01:59:39', '2020-08-21 01:59:39'),
(126, 42, 67, 4, 4, 28, '2020-08-21 01:59:39', '2020-08-21 01:59:39'),
(127, 43, 129, 21, 2, 35, '2020-08-21 01:59:39', '2020-08-21 01:59:39'),
(128, 43, 154, 17, 3, 20, '2020-08-21 01:59:39', '2020-08-21 01:59:39'),
(129, 43, 14, 38, 5, 36, '2020-08-21 01:59:39', '2020-08-21 01:59:39'),
(130, 44, 140, 18, 2, 10, '2020-08-21 01:59:39', '2020-08-21 01:59:39'),
(131, 44, 77, 21, 2, 23, '2020-08-21 01:59:39', '2020-08-21 01:59:39'),
(132, 44, 141, 13, 2, 39, '2020-08-21 01:59:39', '2020-08-21 01:59:39'),
(133, 45, 200, 35, 5, 12, '2020-08-21 01:59:40', '2020-08-21 01:59:40'),
(134, 45, 52, 48, 4, 40, '2020-08-21 01:59:40', '2020-08-21 01:59:40'),
(135, 45, 69, 40, 5, 39, '2020-08-21 01:59:40', '2020-08-21 01:59:40'),
(136, 45, 11, 40, 5, 19, '2020-08-21 01:59:40', '2020-08-21 01:59:40'),
(137, 45, 183, 10, 2, 27, '2020-08-21 01:59:40', '2020-08-21 01:59:40'),
(138, 46, 117, 9, 4, 40, '2020-08-21 01:59:40', '2020-08-21 01:59:40'),
(139, 47, 25, 18, 2, 16, '2020-08-21 01:59:40', '2020-08-21 01:59:40'),
(140, 47, 185, 40, 2, 35, '2020-08-21 01:59:41', '2020-08-21 01:59:41'),
(141, 48, 25, 9, 4, 17, '2020-08-21 01:59:41', '2020-08-21 01:59:41'),
(142, 48, 187, 1, 2, 32, '2020-08-21 01:59:41', '2020-08-21 01:59:41'),
(143, 48, 30, 38, 2, 27, '2020-08-21 01:59:41', '2020-08-21 01:59:41'),
(144, 48, 196, 27, 4, 11, '2020-08-21 01:59:41', '2020-08-21 01:59:41'),
(145, 49, 66, 30, 2, 28, '2020-08-21 01:59:41', '2020-08-21 01:59:41'),
(146, 50, 190, 42, 4, 32, '2020-08-21 01:59:41', '2020-08-21 01:59:41'),
(147, 50, 159, 39, 3, 12, '2020-08-21 01:59:41', '2020-08-21 01:59:41'),
(148, 50, 166, 23, 5, 24, '2020-08-21 01:59:41', '2020-08-21 01:59:41'),
(149, 50, 93, 22, 5, 22, '2020-08-21 01:59:41', '2020-08-21 01:59:41');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rankings`
--

CREATE TABLE `rankings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `point` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rankings`
--

INSERT INTO `rankings` (`id`, `user_id`, `point`, `created_at`, `updated_at`) VALUES
(1, 99, 479, '2020-08-21 01:59:42', '2020-08-21 01:59:42'),
(2, 22, 255, '2020-08-21 01:59:42', '2020-08-21 01:59:42'),
(3, 96, 439, '2020-08-21 01:59:42', '2020-08-21 01:59:42'),
(4, 35, 169, '2020-08-21 01:59:42', '2020-08-21 01:59:42'),
(5, 3, 408, '2020-08-21 01:59:42', '2020-08-21 01:59:42'),
(6, 35, 110, '2020-08-21 01:59:42', '2020-08-21 01:59:42'),
(7, 44, 375, '2020-08-21 01:59:42', '2020-08-21 01:59:42'),
(8, 44, 467, '2020-08-21 01:59:42', '2020-08-21 01:59:42'),
(9, 59, 487, '2020-08-21 01:59:42', '2020-08-21 01:59:42'),
(10, 39, 181, '2020-08-21 01:59:42', '2020-08-21 01:59:42'),
(11, 5, 324, '2020-08-21 01:59:42', '2020-08-21 01:59:42'),
(12, 29, 111, '2020-08-21 01:59:42', '2020-08-21 01:59:42'),
(13, 25, 112, '2020-08-21 01:59:42', '2020-08-21 01:59:42'),
(14, 4, 184, '2020-08-21 01:59:42', '2020-08-21 01:59:42'),
(15, 55, 290, '2020-08-21 01:59:42', '2020-08-21 01:59:42'),
(16, 16, 218, '2020-08-21 01:59:42', '2020-08-21 01:59:42'),
(17, 63, 196, '2020-08-21 01:59:43', '2020-08-21 01:59:43'),
(18, 35, 491, '2020-08-21 01:59:43', '2020-08-21 01:59:43'),
(19, 79, 444, '2020-08-21 01:59:43', '2020-08-21 01:59:43'),
(20, 90, 274, '2020-08-21 01:59:43', '2020-08-21 01:59:43'),
(21, 8, 121, '2020-08-21 01:59:43', '2020-08-21 01:59:43'),
(22, 54, 425, '2020-08-21 01:59:43', '2020-08-21 01:59:43'),
(23, 72, 390, '2020-08-21 01:59:43', '2020-08-21 01:59:43'),
(24, 75, 118, '2020-08-21 01:59:43', '2020-08-21 01:59:43'),
(25, 4, 271, '2020-08-21 01:59:43', '2020-08-21 01:59:43'),
(26, 54, 487, '2020-08-21 01:59:43', '2020-08-21 01:59:43'),
(27, 58, 196, '2020-08-21 01:59:43', '2020-08-21 01:59:43'),
(28, 40, 321, '2020-08-21 01:59:43', '2020-08-21 01:59:43'),
(29, 81, 270, '2020-08-21 01:59:43', '2020-08-21 01:59:43'),
(30, 60, 372, '2020-08-21 01:59:43', '2020-08-21 01:59:43');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `website` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`user_id`, `website`) VALUES
(1, 'kreiger.info'),
(5, 'purdy.com'),
(9, 'schmeler.com'),
(10, 'okeefe.com'),
(14, 'connelly.info'),
(15, 'kuvalis.com'),
(22, 'zulauf.com'),
(23, 'swift.biz'),
(25, 'greenfelder.net'),
(26, 'torp.com'),
(29, 'schowalter.com'),
(30, 'schmitt.com'),
(31, 'price.net'),
(34, 'mclaughlin.com'),
(35, 'mclaughlin.biz'),
(37, 'gerhold.com'),
(38, 'prosacco.org'),
(39, 'oconnell.com'),
(40, 'quitzon.net'),
(41, 'collins.net'),
(42, 'cormier.biz'),
(43, 'wintheiser.com'),
(45, 'champlin.com'),
(46, 'conn.com'),
(47, 'romaguera.com'),
(48, 'ward.info'),
(49, 'mayer.org'),
(50, 'murazik.info'),
(51, 'hane.info'),
(53, 'steuber.info'),
(54, 'ruecker.com'),
(55, 'bradtke.com'),
(56, 'tromp.info'),
(62, 'pfeffer.com'),
(63, 'quigley.com'),
(70, 'barrows.com'),
(72, 'powlowski.com'),
(73, 'bednar.com'),
(76, 'powlowski.biz'),
(79, 'okeefe.org'),
(80, 'bergnaum.com'),
(84, 'effertz.info'),
(87, 'williamson.org'),
(92, 'moen.com'),
(97, 'kessler.com'),
(99, 'kautzer.com');

-- --------------------------------------------------------

--
-- Table structure for table `sns`
--

CREATE TABLE `sns` (
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `provider` enum('facebook','instagram','google','twitter') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`) VALUES
(1, 1, 'T Shirts'),
(2, 1, 'Shirts'),
(3, 1, 'Polo'),
(4, 1, 'Knitwear'),
(5, 1, 'Vest'),
(6, 1, 'Hoodies'),
(7, 1, 'Sweatshirt'),
(8, 1, 'Cardigan'),
(9, 1, 'Ensemble'),
(10, 1, 'Jersey'),
(11, 1, 'Tank tops'),
(12, 1, 'Camisole'),
(13, 1, 'Tube tops'),
(14, 1, 'Other tops'),
(15, 2, 'Tailored jacket'),
(16, 2, 'Collarless jacket'),
(17, 2, 'Denim jacket'),
(18, 2, 'Riders jacket'),
(19, 2, 'Blouson'),
(20, 2, 'Coverall'),
(21, 2, 'Military jacket'),
(22, 2, 'Bomber jacket'),
(23, 2, 'Down vest'),
(24, 2, 'Down Jacket / Coat'),
(25, 2, 'Duffle coat'),
(26, 2, 'Mod Coat'),
(27, 2, 'Peacoat'),
(28, 2, 'Bal collar coat'),
(29, 2, 'Trenchcoat'),
(30, 2, 'Overcoat'),
(31, 2, 'Sheepskin coat'),
(32, 2, 'Nylon jacket'),
(33, 2, 'Parka'),
(34, 2, 'Baseball jacket'),
(35, 2, 'Japanese embroidered jacket'),
(36, 2, 'Poncho'),
(37, 2, 'Other outerwear'),
(38, 3, 'One piece dress'),
(39, 3, 'Shirt dress'),
(40, 3, 'Pinafore dress'),
(41, 3, 'Tunic'),
(42, 3, 'Dress'),
(43, 4, 'Salopette'),
(44, 4, 'Overall'),
(45, 5, 'Jacket (Suit)'),
(46, 5, 'Vest (Suit)'),
(47, 5, 'Trousers(Suit)'),
(48, 5, 'Skirt (Suit)'),
(49, 5, 'Set up'),
(50, 5, 'Tie'),
(51, 5, 'Bow-tie'),
(52, 5, 'Tiepin'),
(53, 5, 'Cuff links'),
(54, 6, 'Skirt'),
(55, 6, 'Denim skirt'),
(56, 7, 'Denim pants'),
(57, 7, 'Cargo trousers'),
(58, 7, 'Chinos'),
(59, 7, 'Trousers'),
(60, 7, 'Pants'),
(61, 8, 'Sneakers'),
(62, 8, 'Slip-ons'),
(63, 8, 'Sandals'),
(64, 8, 'Pumps'),
(65, 8, 'Boots'),
(66, 8, 'Booty'),
(67, 8, 'Dress shoes'),
(68, 8, 'Ballet shoes'),
(69, 8, 'Loafers'),
(70, 8, 'Deck shoes'),
(71, 8, 'Rain shoes'),
(72, 8, 'Flipflops'),
(73, 8, 'Other Shoes'),
(74, 8, 'Shoes accessories'),
(75, 9, 'Socks'),
(76, 9, 'Tights'),
(77, 9, 'Leggings'),
(78, 9, 'leg warmer'),
(79, 10, 'Shoulderbag'),
(80, 10, 'Tote'),
(81, 10, 'Backpack'),
(82, 10, 'Boston bag'),
(83, 10, 'Fannypack'),
(84, 10, 'Handbag'),
(85, 10, 'Clutch'),
(86, 10, 'Messenger bag'),
(87, 10, 'Briefcase'),
(88, 10, 'Luggage'),
(89, 10, 'Drum bag'),
(90, 10, 'Eco bag'),
(91, 10, 'Straw bag'),
(92, 10, 'School backpack'),
(93, 11, 'Cap'),
(94, 11, 'Hat'),
(95, 11, 'Beanie'),
(96, 11, 'Hunting Cap / Beret'),
(97, 11, 'Casquette'),
(98, 11, 'Visor'),
(99, 12, 'Necklace'),
(100, 12, 'Ring'),
(101, 12, 'Pierces (both ears)'),
(102, 12, 'Pierce (one ear)'),
(103, 12, 'Earring(both ears)'),
(104, 12, 'Earring(one ear)'),
(105, 12, 'Bangle / Wristband'),
(106, 12, 'Anklet'),
(107, 12, 'Choker'),
(108, 12, 'Brooch / Corsage'),
(109, 12, 'Charm'),
(110, 13, 'Hair elastic'),
(111, 13, 'Hairband'),
(112, 13, 'Headband'),
(113, 13, 'Hair clips'),
(114, 13, 'Hair pin'),
(115, 13, 'Scrunchie'),
(116, 13, 'Other hair accessories'),
(117, 13, 'Wig'),
(118, 14, 'Stole / Snood'),
(119, 14, 'Scarf'),
(120, 14, 'Belt'),
(121, 14, 'Suspender'),
(122, 14, 'Sunglasses'),
(123, 14, 'Glasses'),
(124, 14, 'Gloves'),
(125, 14, 'Neck warmer'),
(126, 14, 'Ear Warmer'),
(127, 14, 'Umbrella'),
(128, 14, 'Folding umbrella'),
(129, 14, 'Rain coat / Poncho'),
(130, 14, 'Detachable collar'),
(131, 15, 'Wallet'),
(132, 15, 'Coin case'),
(133, 15, 'Business card case'),
(134, 15, 'Porch'),
(135, 15, 'Hand mirror'),
(136, 15, 'Hand towels'),
(137, 15, 'Scarves / Wraps'),
(138, 15, 'Key holder'),
(139, 15, 'Key case'),
(140, 15, 'Wallet chain'),
(141, 15, 'Pass case'),
(142, 15, 'Card case'),
(143, 15, 'Passport case'),
(144, 15, 'Paper fan'),
(145, 15, 'Other accessories'),
(146, 16, 'Watch'),
(147, 16, 'Clock'),
(148, 16, 'Wall clock'),
(149, 17, 'Swimwear'),
(150, 17, 'Rash guard'),
(151, 17, 'Kimono'),
(152, 17, 'Swim goods'),
(153, 17, 'Yukata'),
(154, 17, 'Japanese goods'),
(155, 18, 'Bra'),
(156, 18, 'Briefs & Thongs'),
(157, 18, 'Bra / Shorts'),
(158, 18, 'Trunks'),
(159, 18, 'Boxer pants'),
(160, 18, 'Room wear'),
(161, 18, 'Other underwears'),
(162, 19, 'Maternity wear'),
(163, 19, 'Maternity goods'),
(164, 19, 'Maternity health record book cover'),
(165, 19, 'Pouch'),
(166, 19, 'Bib'),
(167, 19, 'Rompers'),
(168, 19, 'Underwear'),
(169, 19, 'swaddle'),
(170, 19, 'Baby goods'),
(171, 19, 'Tableware'),
(172, 19, 'Baby buggy'),
(173, 19, 'Baby shoes'),
(174, 19, 'Baby gift'),
(175, 20, 'Fragrance'),
(176, 20, 'Contact lenses / Colored contact lenses'),
(177, 20, 'Body creams'),
(178, 20, 'Body scrubs / Body peels'),
(179, 20, 'Sunscreens'),
(180, 20, 'Hand creams'),
(181, 20, 'Shampoos'),
(182, 20, 'Conditioners / Treatments'),
(183, 20, 'Styling products / Styling waxes'),
(184, 20, 'Soap / Body Soap'),
(185, 20, 'Bath powder'),
(186, 20, 'Oral Care'),
(187, 20, 'Other beauty products / tools'),
(188, 21, 'Cushion / Cushion cover'),
(189, 21, 'Slippers '),
(190, 21, 'Face towels'),
(191, 21, 'Bath towels'),
(192, 21, 'Candle'),
(193, 21, 'Room Fragrance'),
(194, 21, 'Interior accessories'),
(195, 21, 'Photo frame'),
(196, 21, 'Flower vase'),
(197, 21, 'Bed linens'),
(198, 21, 'Rag'),
(199, 21, 'Blankets'),
(200, 21, 'Storage'),
(201, 21, 'Trash can'),
(202, 21, 'Lightings'),
(203, 21, 'Furniture'),
(204, 21, 'PC accessories'),
(205, 21, 'Audio'),
(206, 21, 'Mirror'),
(207, 21, 'Bath / Toilet goods'),
(208, 21, 'Laundry goods'),
(209, 22, 'Kitchen ware'),
(210, 22, 'Glass / cups / tumbler'),
(211, 22, 'Cutlery'),
(212, 22, 'Kitchen tool'),
(213, 22, 'Apron'),
(214, 22, 'Kitchen electronics'),
(215, 23, 'Pen'),
(216, 23, 'Notes'),
(217, 23, 'Sticker / Tape'),
(218, 23, 'Mobile phone case'),
(219, 23, 'Mobile accessories'),
(220, 23, 'Toys'),
(221, 23, 'Figures'),
(222, 23, 'Badges'),
(223, 23, 'Ashtray / lighter'),
(224, 23, 'Poster / Art'),
(225, 23, 'Sports goods'),
(226, 23, 'Golf goods'),
(227, 23, 'Camera / Camera goods'),
(228, 23, 'Pet accessories'),
(229, 23, 'Travel goods'),
(230, 23, 'costume / party goods'),
(231, 23, 'Other goods'),
(232, 24, 'CD'),
(233, 24, 'DVD'),
(234, 24, 'Record'),
(235, 24, 'Book'),
(236, 24, 'Magazines'),
(237, 25, 'Skin lotions'),
(238, 25, 'Milky lotions'),
(239, 25, 'Essences / Oils / Creams'),
(240, 25, 'Eyelashes / Eye care'),
(241, 25, 'Face packs / Face masks'),
(242, 25, 'Face washes'),
(243, 25, 'Cleansers'),
(244, 25, 'Face scrubs / Face peels'),
(245, 25, 'Makeup kits / Gift sets'),
(246, 25, 'Foundations'),
(247, 25, 'Face powders'),
(248, 25, 'Makeup primers / Concealers'),
(249, 25, 'Lipsticks / Lipbalms / Lipglosses'),
(250, 25, 'Blushes / Highlighters'),
(251, 25, 'Eyebrows'),
(252, 25, 'Eyeshadows'),
(253, 25, 'Eyeliners'),
(254, 25, 'Mascaras'),
(255, 25, 'Nail polishes / Nail care'),
(256, 25, 'Make-up goods'),
(257, 25, 'beauty equipment'),
(258, 26, 'Grab bag'),
(259, 26, 'Wrapping items'),
(260, 26, 'measurement suit'),
(261, 26, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `trending_hashtags`
--

CREATE TABLE `trending_hashtags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hashtag_id` bigint(20) UNSIGNED NOT NULL,
  `total_repeat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_type` enum('individual','shop') COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `introduction` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('men','women','kids') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `account_type`, `date_of_birth`, `picture`, `introduction`, `phone`, `gender`, `height`, `created_at`, `updated_at`) VALUES
(1, 'Andrew O\'Kon IV', 'Quitzon', 'shop', NULL, 'img/look3.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '151', '2020-08-21 01:57:45', '2020-08-21 01:57:45'),
(2, 'Cindy Hamill', 'Crooks', 'individual', NULL, 'img/look4.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '45', '2020-08-21 01:57:46', '2020-08-21 01:57:46'),
(3, 'Jeffery Terry', 'Schmeler', 'individual', NULL, 'img/look3.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'men', '132', '2020-08-21 01:57:46', '2020-08-21 01:57:46'),
(4, 'Angelina Kohler', 'Mayer', 'individual', NULL, 'img/look2.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'men', '142', '2020-08-21 01:57:46', '2020-08-21 01:57:46'),
(5, 'Sister Gaylord', 'Daniel', 'shop', NULL, 'img/look1.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '95', '2020-08-21 01:57:46', '2020-08-21 01:57:46'),
(6, 'Nils Schimmel', 'Denesik', 'individual', NULL, 'img/look4.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '146', '2020-08-21 01:57:47', '2020-08-21 01:57:47'),
(7, 'Flavie D\'Amore', 'Mills', 'individual', NULL, 'img/look3.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'men', '146', '2020-08-21 01:57:47', '2020-08-21 01:57:47'),
(8, 'Mr. Regan Simonis II', 'Jast', 'individual', NULL, 'img/look2.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'men', '165', '2020-08-21 01:57:47', '2020-08-21 01:57:47'),
(9, 'Prof. Kristian Wolf', 'Weimann', 'shop', NULL, 'img/look2.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '97', '2020-08-21 01:57:47', '2020-08-21 01:57:47'),
(10, 'Athena Marquardt', 'Bailey', 'shop', NULL, 'img/look1.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '110', '2020-08-21 01:57:47', '2020-08-21 01:57:47'),
(11, 'Roel Kub', 'Pouros', 'individual', NULL, 'img/look1.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '133', '2020-08-21 01:57:47', '2020-08-21 01:57:47'),
(12, 'Effie Gerhold', 'Wuckert', 'individual', NULL, 'img/look2.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'men', '143', '2020-08-21 01:57:47', '2020-08-21 01:57:47'),
(13, 'Ben Wiegand', 'Heaney', 'individual', NULL, 'img/look2.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '81', '2020-08-21 01:57:47', '2020-08-21 01:57:47'),
(14, 'Aron Schmitt V', 'Jakubowski', 'shop', NULL, 'img/look2.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '147', '2020-08-21 01:57:47', '2020-08-21 01:57:47'),
(15, 'Ignatius Considine', 'Jacobi', 'shop', NULL, 'img/look3.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '168', '2020-08-21 01:57:47', '2020-08-21 01:57:47'),
(16, 'Kaitlyn Yundt IV', 'Wiegand', 'individual', NULL, 'img/look3.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '99', '2020-08-21 01:57:47', '2020-08-21 01:57:47'),
(17, 'Luella Casper', 'Murphy', 'individual', NULL, 'img/look4.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '61', '2020-08-21 01:57:47', '2020-08-21 01:57:47'),
(18, 'Kendra Carroll', 'Mante', 'individual', NULL, 'img/look3.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '174', '2020-08-21 01:57:47', '2020-08-21 01:57:47'),
(19, 'Devon Bartoletti', 'Kreiger', 'individual', NULL, 'img/look1.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '42', '2020-08-21 01:57:48', '2020-08-21 01:57:48'),
(20, 'Prof. Rodger Hermann Sr.', 'Schultz', 'individual', NULL, 'img/look1.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '153', '2020-08-21 01:57:48', '2020-08-21 01:57:48'),
(21, 'Miss Tiffany Gottlieb', 'Witting', 'individual', NULL, 'img/look1.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '186', '2020-08-21 01:57:48', '2020-08-21 01:57:48'),
(22, 'Johnny Morissette', 'Wintheiser', 'shop', NULL, 'img/look2.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'men', '141', '2020-08-21 01:57:48', '2020-08-21 01:57:48'),
(23, 'Hayden Harvey', 'Hansen', 'shop', NULL, 'img/look1.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '170', '2020-08-21 01:57:48', '2020-08-21 01:57:48'),
(24, 'Marge Fahey', 'Green', 'individual', NULL, 'img/look3.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '50', '2020-08-21 01:57:48', '2020-08-21 01:57:48'),
(25, 'Chase McClure', 'Buckridge', 'shop', NULL, 'img/look4.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '165', '2020-08-21 01:57:48', '2020-08-21 01:57:48'),
(26, 'Marlene West', 'Bruen', 'shop', NULL, 'img/look4.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'men', '136', '2020-08-21 01:57:48', '2020-08-21 01:57:48'),
(27, 'Monte Kuhn', 'Murray', 'individual', NULL, 'img/look4.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '97', '2020-08-21 01:57:48', '2020-08-21 01:57:48'),
(28, 'Alysha Hudson', 'Hettinger', 'individual', NULL, 'img/look1.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '92', '2020-08-21 01:57:48', '2020-08-21 01:57:48'),
(29, 'Bridgette Pouros', 'Runolfsdottir', 'shop', NULL, 'img/look4.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '160', '2020-08-21 01:57:48', '2020-08-21 01:57:48'),
(30, 'Adelia Hills', 'Waters', 'shop', NULL, 'img/look2.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '134', '2020-08-21 01:57:48', '2020-08-21 01:57:48'),
(31, 'Sonny Heathcote', 'Sauer', 'shop', NULL, 'img/look3.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'men', '172', '2020-08-21 01:57:48', '2020-08-21 01:57:48'),
(32, 'Jess Cole', 'Lueilwitz', 'individual', NULL, 'img/look2.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '143', '2020-08-21 01:57:48', '2020-08-21 01:57:48'),
(33, 'Lulu Lind', 'Connelly', 'individual', NULL, 'img/look4.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '123', '2020-08-21 01:57:48', '2020-08-21 01:57:48'),
(34, 'Richie Ortiz MD', 'Harvey', 'shop', NULL, 'img/look2.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '91', '2020-08-21 01:57:49', '2020-08-21 01:57:49'),
(35, 'Mr. Tanner Marquardt', 'Marks', 'shop', NULL, 'img/look3.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '48', '2020-08-21 01:57:49', '2020-08-21 01:57:49'),
(36, 'Domenic Kassulke', 'Purdy', 'individual', NULL, 'img/look2.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '112', '2020-08-21 01:57:49', '2020-08-21 01:57:49'),
(37, 'Dr. Hanna Bechtelar', 'Reinger', 'shop', NULL, 'img/look2.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '64', '2020-08-21 01:57:49', '2020-08-21 01:57:49'),
(38, 'Kathryn Metz', 'Gutmann', 'shop', NULL, 'img/look4.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '162', '2020-08-21 01:57:49', '2020-08-21 01:57:49'),
(39, 'Rae Willms', 'Schumm', 'shop', NULL, 'img/look4.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'men', '134', '2020-08-21 01:57:49', '2020-08-21 01:57:49'),
(40, 'Prof. Ferne Padberg II', 'Ward', 'shop', NULL, 'img/look3.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '110', '2020-08-21 01:57:49', '2020-08-21 01:57:49'),
(41, 'Maria Jaskolski', 'Huel', 'shop', NULL, 'img/look2.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '141', '2020-08-21 01:57:49', '2020-08-21 01:57:49'),
(42, 'Carolina Skiles', 'Leuschke', 'shop', NULL, 'img/look2.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '132', '2020-08-21 01:57:49', '2020-08-21 01:57:49'),
(43, 'Herman Torphy', 'Schuppe', 'shop', NULL, 'img/look3.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '60', '2020-08-21 01:57:49', '2020-08-21 01:57:49'),
(44, 'Alaina Schaefer I', 'Dickens', 'individual', NULL, 'img/look1.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'men', '143', '2020-08-21 01:57:49', '2020-08-21 01:57:49'),
(45, 'Savannah Ruecker', 'Douglas', 'shop', NULL, 'img/look3.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '148', '2020-08-21 01:57:49', '2020-08-21 01:57:49'),
(46, 'Mrs. Colleen Stiedemann', 'Kihn', 'shop', NULL, 'img/look4.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '103', '2020-08-21 01:57:49', '2020-08-21 01:57:49'),
(47, 'Mr. Floy Prosacco', 'Dickinson', 'shop', NULL, 'img/look4.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '80', '2020-08-21 01:57:50', '2020-08-21 01:57:50'),
(48, 'Veda Murray', 'Kautzer', 'shop', NULL, 'img/look3.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '104', '2020-08-21 01:57:50', '2020-08-21 01:57:50'),
(49, 'Ms. Esta Marks', 'Cassin', 'shop', NULL, 'img/look3.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '80', '2020-08-21 01:57:50', '2020-08-21 01:57:50'),
(50, 'Lavern Durgan', 'Muller', 'shop', NULL, 'img/look4.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'men', '142', '2020-08-21 01:57:50', '2020-08-21 01:57:50'),
(51, 'Curt Tremblay', 'Kerluke', 'shop', NULL, 'img/look3.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '135', '2020-08-21 01:57:50', '2020-08-21 01:57:50'),
(52, 'Jasmin Pagac DDS', 'Anderson', 'individual', NULL, 'img/look4.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '138', '2020-08-21 01:57:50', '2020-08-21 01:57:50'),
(53, 'Winnifred Kovacek', 'Blanda', 'shop', NULL, 'img/look1.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'men', '135', '2020-08-21 01:57:50', '2020-08-21 01:57:50'),
(54, 'Javon Howell', 'Hoppe', 'shop', NULL, 'img/look3.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '109', '2020-08-21 01:57:50', '2020-08-21 01:57:50'),
(55, 'Gennaro Hoppe I', 'Rippin', 'shop', NULL, 'img/look4.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'men', '176', '2020-08-21 01:57:50', '2020-08-21 01:57:50'),
(56, 'Vince Carroll', 'Crona', 'shop', NULL, 'img/look3.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '112', '2020-08-21 01:57:50', '2020-08-21 01:57:50'),
(57, 'Katrina Herzog DDS', 'Kilback', 'individual', NULL, 'img/look4.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '70', '2020-08-21 01:57:50', '2020-08-21 01:57:50'),
(58, 'Ruthie Wintheiser III', 'Mante', 'individual', NULL, 'img/look3.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'men', '155', '2020-08-21 01:57:50', '2020-08-21 01:57:50'),
(59, 'Prof. Jaylon Huel', 'Weissnat', 'individual', NULL, 'img/look2.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'men', '134', '2020-08-21 01:57:50', '2020-08-21 01:57:50'),
(60, 'Rhiannon VonRueden', 'Bednar', 'individual', NULL, 'img/look1.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '136', '2020-08-21 01:57:50', '2020-08-21 01:57:50'),
(61, 'Jess Kuvalis', 'Zemlak', 'individual', NULL, 'img/look3.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'men', '145', '2020-08-21 01:57:50', '2020-08-21 01:57:50'),
(62, 'Ms. Rachelle Kunde PhD', 'Jacobson', 'shop', NULL, 'img/look1.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '84', '2020-08-21 01:57:50', '2020-08-21 01:57:50'),
(63, 'Fausto Medhurst', 'Lang', 'shop', NULL, 'img/look1.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'men', '174', '2020-08-21 01:57:50', '2020-08-21 01:57:50'),
(64, 'Prof. Lea Beatty', 'Hane', 'individual', NULL, 'img/look2.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'men', '172', '2020-08-21 01:57:51', '2020-08-21 01:57:51'),
(65, 'Durward Emard', 'Lindgren', 'individual', NULL, 'img/look2.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '142', '2020-08-21 01:57:51', '2020-08-21 01:57:51'),
(66, 'Melyna Gulgowski', 'Purdy', 'individual', NULL, 'img/look2.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '136', '2020-08-21 01:57:51', '2020-08-21 01:57:51'),
(67, 'Georgiana Kunde', 'D\'Amore', 'individual', NULL, 'img/look4.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'men', '171', '2020-08-21 01:57:51', '2020-08-21 01:57:51'),
(68, 'Sammy Hudson', 'Ryan', 'individual', NULL, 'img/look3.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '139', '2020-08-21 01:57:51', '2020-08-21 01:57:51'),
(69, 'Dovie Brekke III', 'Zieme', 'individual', NULL, 'img/look1.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '137', '2020-08-21 01:57:51', '2020-08-21 01:57:51'),
(70, 'Rebeka Turcotte', 'Funk', 'shop', NULL, 'img/look3.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '181', '2020-08-21 01:57:51', '2020-08-21 01:57:51'),
(71, 'Abdiel Thompson', 'Boyer', 'individual', NULL, 'img/look4.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '47', '2020-08-21 01:57:51', '2020-08-21 01:57:51'),
(72, 'Maxine Gislason', 'Bruen', 'shop', NULL, 'img/look4.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '181', '2020-08-21 01:57:51', '2020-08-21 01:57:51'),
(73, 'Mr. Ezra Hyatt', 'Carter', 'shop', NULL, 'img/look1.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '153', '2020-08-21 01:57:51', '2020-08-21 01:57:51'),
(74, 'Freddie Koss', 'Jerde', 'individual', NULL, 'img/look3.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '48', '2020-08-21 01:57:51', '2020-08-21 01:57:51'),
(75, 'Daron Bartell', 'Stroman', 'individual', NULL, 'img/look2.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'men', '166', '2020-08-21 01:57:51', '2020-08-21 01:57:51'),
(76, 'Jerrod Feeney', 'Schowalter', 'shop', NULL, 'img/look2.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '189', '2020-08-21 01:57:51', '2020-08-21 01:57:51'),
(77, 'Dr. Jake Zieme', 'Gutkowski', 'individual', NULL, 'img/look3.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '104', '2020-08-21 01:57:52', '2020-08-21 01:57:52'),
(78, 'Vesta Gulgowski', 'Moen', 'individual', NULL, 'img/look2.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '131', '2020-08-21 01:57:52', '2020-08-21 01:57:52'),
(79, 'Miss Ashlynn Ebert', 'Hagenes', 'shop', NULL, 'img/look1.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'men', '132', '2020-08-21 01:57:52', '2020-08-21 01:57:52'),
(80, 'Dr. Alisa Reynolds DDS', 'Beer', 'shop', NULL, 'img/look4.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '60', '2020-08-21 01:57:52', '2020-08-21 01:57:52'),
(81, 'Dr. Isac Hodkiewicz', 'Treutel', 'individual', NULL, 'img/look4.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '150', '2020-08-21 01:57:52', '2020-08-21 01:57:52'),
(82, 'Cordelia Spencer PhD', 'Wiza', 'individual', NULL, 'img/look1.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'men', '174', '2020-08-21 01:57:52', '2020-08-21 01:57:52'),
(83, 'Mackenzie Yost', 'Hansen', 'individual', NULL, 'img/look3.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '149', '2020-08-21 01:57:52', '2020-08-21 01:57:52'),
(84, 'Presley Runte', 'Simonis', 'shop', NULL, 'img/look2.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '98', '2020-08-21 01:57:52', '2020-08-21 01:57:52'),
(85, 'Concepcion Kihn', 'Bechtelar', 'individual', NULL, 'img/look4.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'men', '162', '2020-08-21 01:57:52', '2020-08-21 01:57:52'),
(86, 'Danial Dickens', 'Little', 'individual', NULL, 'img/look1.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '113', '2020-08-21 01:57:52', '2020-08-21 01:57:52'),
(87, 'Tessie Funk', 'Quitzon', 'shop', NULL, 'img/look4.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '154', '2020-08-21 01:57:52', '2020-08-21 01:57:52'),
(88, 'Alexzander Gusikowski II', 'Shanahan', 'individual', NULL, 'img/look4.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '86', '2020-08-21 01:57:52', '2020-08-21 01:57:52'),
(89, 'Miss Candace Gerlach DVM', 'Walter', 'individual', NULL, 'img/look4.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '160', '2020-08-21 01:57:52', '2020-08-21 01:57:52'),
(90, 'Yasmine Kuhic', 'Grimes', 'individual', NULL, 'img/look4.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '54', '2020-08-21 01:57:53', '2020-08-21 01:57:53'),
(91, 'Osvaldo Donnelly', 'Jones', 'individual', NULL, 'img/look1.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '178', '2020-08-21 01:57:53', '2020-08-21 01:57:53'),
(92, 'Miss Bettye Murphy DVM', 'Daugherty', 'shop', NULL, 'img/look4.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '165', '2020-08-21 01:57:53', '2020-08-21 01:57:53'),
(93, 'Trystan Reichert Sr.', 'Mitchell', 'individual', NULL, 'img/look4.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '46', '2020-08-21 01:57:53', '2020-08-21 01:57:53'),
(94, 'Lorena Jakubowski', 'Collins', 'individual', NULL, 'img/look2.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '152', '2020-08-21 01:57:53', '2020-08-21 01:57:53'),
(95, 'Jody Walsh', 'Williamson', 'individual', NULL, 'img/look1.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'men', '160', '2020-08-21 01:57:53', '2020-08-21 01:57:53'),
(96, 'Niko Hermann', 'Huels', 'individual', NULL, 'img/look3.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'men', '158', '2020-08-21 01:57:53', '2020-08-21 01:57:53'),
(97, 'Conrad Boyer', 'Zulauf', 'shop', NULL, 'img/look1.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'men', '150', '2020-08-21 01:57:53', '2020-08-21 01:57:53'),
(98, 'Dr. Alan Carter', 'Stoltenberg', 'individual', NULL, 'img/look3.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'women', '166', '2020-08-21 01:57:53', '2020-08-21 01:57:53'),
(99, 'Norris Larson', 'Borer', 'shop', NULL, 'img/look1.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'men', '189', '2020-08-21 01:57:53', '2020-08-21 01:57:53'),
(100, 'Delta Dooley', 'Glover', 'individual', NULL, 'img/look2.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 'kids', '60', '2020-08-21 01:57:53', '2020-08-21 01:57:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `carts_user_id_item_detail_information_id_unique` (`user_id`,`item_detail_information_id`),
  ADD KEY `carts_item_detail_information_id_foreign` (`item_detail_information_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `channels_sender_id_foreign` (`sender_id`),
  ADD KEY `channels_receiver_id_foreign` (`receiver_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_look_id_foreign` (`look_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourite_items`
--
ALTER TABLE `favourite_items`
  ADD PRIMARY KEY (`item_id`,`user_id`),
  ADD KEY `favourite_items_user_id_foreign` (`user_id`);

--
-- Indexes for table `favourite_looks`
--
ALTER TABLE `favourite_looks`
  ADD PRIMARY KEY (`user_id`,`look_id`),
  ADD KEY `favourite_looks_look_id_foreign` (`look_id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`user_id`,`follower_id`),
  ADD KEY `followers_follower_id_foreign` (`follower_id`);

--
-- Indexes for table `hashtags`
--
ALTER TABLE `hashtags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_user_id_foreign` (`user_id`),
  ADD KEY `items_category_id_foreign` (`category_id`),
  ADD KEY `items_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `items_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `item_details`
--
ALTER TABLE `item_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_details_item_id_foreign` (`item_id`);

--
-- Indexes for table `item_detail_informations`
--
ALTER TABLE `item_detail_informations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_detail_informations_item_detail_id_foreign` (`item_detail_id`);

--
-- Indexes for table `item_reviews`
--
ALTER TABLE `item_reviews`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item_reviews_order_item_id_unique` (`order_item_id`),
  ADD KEY `item_reviews_item_id_foreign` (`item_id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD UNIQUE KEY `logins_user_id_unique` (`user_id`),
  ADD UNIQUE KEY `logins_email_unique` (`email`);

--
-- Indexes for table `looks`
--
ALTER TABLE `looks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `looks_user_id_foreign` (`user_id`);

--
-- Indexes for table `look_hashtags`
--
ALTER TABLE `look_hashtags`
  ADD PRIMARY KEY (`look_id`,`hashtag_id`),
  ADD KEY `look_hashtags_hashtag_id_foreign` (`hashtag_id`);

--
-- Indexes for table `look_items`
--
ALTER TABLE `look_items`
  ADD PRIMARY KEY (`look_id`,`item_detail_information_id`),
  ADD KEY `look_items_item_detail_information_id_foreign` (`item_detail_information_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_channel_id_foreign` (`channel_id`),
  ADD KEY `messages_sender_id_foreign` (`sender_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_address_id_foreign` (`address_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_item_detail_information_id_foreign` (`item_detail_information_id`),
  ADD KEY `order_items_look_id_foreign` (`look_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `rankings`
--
ALTER TABLE `rankings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rankings_user_id_foreign` (`user_id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD UNIQUE KEY `shops_user_id_unique` (`user_id`);

--
-- Indexes for table `sns`
--
ALTER TABLE `sns`
  ADD PRIMARY KEY (`uuid`,`provider`),
  ADD KEY `sns_user_id_foreign` (`user_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `trending_hashtags`
--
ALTER TABLE `trending_hashtags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trending_hashtags_hashtag_id_foreign` (`hashtag_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hashtags`
--
ALTER TABLE `hashtags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `item_details`
--
ALTER TABLE `item_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `item_detail_informations`
--
ALTER TABLE `item_detail_informations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `item_reviews`
--
ALTER TABLE `item_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `looks`
--
ALTER TABLE `looks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `rankings`
--
ALTER TABLE `rankings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT for table `trending_hashtags`
--
ALTER TABLE `trending_hashtags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_item_detail_information_id_foreign` FOREIGN KEY (`item_detail_information_id`) REFERENCES `item_detail_informations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `channels`
--
ALTER TABLE `channels`
  ADD CONSTRAINT `channels_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `channels_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_look_id_foreign` FOREIGN KEY (`look_id`) REFERENCES `looks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favourite_items`
--
ALTER TABLE `favourite_items`
  ADD CONSTRAINT `favourite_items_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favourite_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favourite_looks`
--
ALTER TABLE `favourite_looks`
  ADD CONSTRAINT `favourite_looks_look_id_foreign` FOREIGN KEY (`look_id`) REFERENCES `looks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favourite_looks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `followers_follower_id_foreign` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `followers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `items_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`),
  ADD CONSTRAINT `items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `item_details`
--
ALTER TABLE `item_details`
  ADD CONSTRAINT `item_details_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

--
-- Constraints for table `item_detail_informations`
--
ALTER TABLE `item_detail_informations`
  ADD CONSTRAINT `item_detail_informations_item_detail_id_foreign` FOREIGN KEY (`item_detail_id`) REFERENCES `item_details` (`id`);

--
-- Constraints for table `item_reviews`
--
ALTER TABLE `item_reviews`
  ADD CONSTRAINT `item_reviews_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `item_reviews_order_item_id_foreign` FOREIGN KEY (`order_item_id`) REFERENCES `order_items` (`id`);

--
-- Constraints for table `logins`
--
ALTER TABLE `logins`
  ADD CONSTRAINT `logins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `looks`
--
ALTER TABLE `looks`
  ADD CONSTRAINT `looks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `look_hashtags`
--
ALTER TABLE `look_hashtags`
  ADD CONSTRAINT `look_hashtags_hashtag_id_foreign` FOREIGN KEY (`hashtag_id`) REFERENCES `hashtags` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `look_hashtags_look_id_foreign` FOREIGN KEY (`look_id`) REFERENCES `looks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `look_items`
--
ALTER TABLE `look_items`
  ADD CONSTRAINT `look_items_item_detail_information_id_foreign` FOREIGN KEY (`item_detail_information_id`) REFERENCES `item_detail_informations` (`id`),
  ADD CONSTRAINT `look_items_look_id_foreign` FOREIGN KEY (`look_id`) REFERENCES `looks` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_item_detail_information_id_foreign` FOREIGN KEY (`item_detail_information_id`) REFERENCES `item_detail_informations` (`id`),
  ADD CONSTRAINT `order_items_look_id_foreign` FOREIGN KEY (`look_id`) REFERENCES `looks` (`id`),
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `rankings`
--
ALTER TABLE `rankings`
  ADD CONSTRAINT `rankings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `shops`
--
ALTER TABLE `shops`
  ADD CONSTRAINT `shops_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sns`
--
ALTER TABLE `sns`
  ADD CONSTRAINT `sns_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `trending_hashtags`
--
ALTER TABLE `trending_hashtags`
  ADD CONSTRAINT `trending_hashtags_hashtag_id_foreign` FOREIGN KEY (`hashtag_id`) REFERENCES `hashtags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2016 at 04:33 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppingcart`
--
CREATE DATABASE IF NOT EXISTS `shoppingcart` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `shoppingcart`;

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

DROP TABLE IF EXISTS `accessories`;
CREATE TABLE `accessories` (
  `ProductID` bigint(13) NOT NULL,
  `PlatForm` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accessories`
--

INSERT INTO `accessories` (`ProductID`, `PlatForm`) VALUES
(126709858743, 'PS4'),
(131400096479, 'PS4'),
(160433374704, 'Xbox One'),
(295957004257, 'PC'),
(303795997123, 'PS4'),
(317799630980, 'PC'),
(375966779522, 'PC'),
(385101357324, 'PC'),
(462767755620, 'PS4'),
(474150554586, 'Xbox One'),
(531365233425, 'PC'),
(561000112341, 'Xbox One'),
(564874748048, 'PS4'),
(565448801376, 'Xbox One'),
(606279521863, 'Xbox One'),
(619902824051, 'Xbox One'),
(667380742993, 'Xbox One'),
(778186253060, 'PC'),
(818863071520, 'PS4'),
(879009479846, 'PC'),
(931092352348, 'PS4'),
(6942949009123, 'PS4');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `AddressID` int(2) NOT NULL,
  `Address1` varchar(100) DEFAULT NULL,
  `Address2` varchar(10) DEFAULT NULL,
  `City` varchar(14) DEFAULT NULL,
  `PostCode` int(5) DEFAULT NULL,
  `Country` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`AddressID`, `Address1`, `Address2`, `City`, `PostCode`, `Country`) VALUES
(1, '2525 N. 7th St', '', 'Harrisburg', 717, 'USA'),
(2, '8800 Global Way', '', 'West Chester', 1350, 'United States'),
(3, '1016 44th Dr\r\nLong Island City', '', 'New York', 1587, 'United States'),
(4, '2806 Kaihikapu St\r\nHonolulu', '', 'Hawaii', 6789, 'United States'),
(5, '190 Statesman Dr. Mississauga\r\nMississauga', '', 'Ontario', 9431, 'Canada'),
(6, '5000 Birch Street, Newport Beach', 'Suite 6500', 'California', 7591, 'United States'),
(7, 'P.O. Box 8214, STN A', '', 'St. John\'s', 1213, 'Canada'),
(9, '375 Ivyland Road Warminster', 'Building 7', 'Pennsylvania', 148, 'United States'),
(10, '210 S Front St, Dowagiac', '', 'Michigan', 49047, 'United States'),
(11, '1845 Faraway Rd, Snowmass Village', '', 'Colorado', 81611, 'United States'),
(12, '7292 Yankee Rd, Ottawa Lake', '', 'Michigan', 49267, 'United States'),
(13, '2103 Graves Mill Rd, Forest', '', 'Virginia', 24551, 'United States'),
(14, '6750 Old Whelchel Rd, Dahlonega', '', 'Georgia', 30533, 'United States'),
(15, '8715 North Newbridge Avenue San Antonio', '', 'Texas', 78213, 'United States'),
(16, '7739 Brook Ave. Pittsfield', '', 'Massachusetts', 52425, 'United States'),
(17, '9025 Sugar Lane \r\nChapel Hill', '', 'North Carolina', 45387, 'United States'),
(18, '64 Spruce St. \r\nTiffin', '', 'Ohio', 4538, 'United States'),
(19, '432 Illinois Street \r\nCockeysville', '', 'Maryland', 45386, 'United States'),
(20, '6 Victoria Court \r\nMonroe', '', 'New York', 4535, 'United States'),
(21, '8 Talbot Ave. \r\nLake Worth', '', 'Florida', 33460, 'United States'),
(22, '894 Mountainview Dr. \r\nVernon Rockville', '', 'Cape Town', 6066, 'South Africa'),
(23, '63 Sage Road \r\nFairmont', '', 'West Virginia', 26554, 'United States'),
(24, '76 Goldfield Dr. \r\nVirginia Beach', '', 'Virginia', 23451, 'United States'),
(25, '49 West Sulphur Springs St. \r\nLakewood', '', 'New Jersey', 8701, 'United States'),
(26, '30 South Vernon Rd. \r\nFarmingdale', '', 'New York', 11735, 'United States'),
(27, '8134 Lancaster Ave. \r\nSomerset', '', 'New Jersey', 8873, 'United States'),
(28, '8631 Pineknoll Street \r\nDundalk', '', 'Maryland', 21222, 'United States'),
(29, '7 Newcastle Ave. \r\nMc Lean', '', 'Virginia', 22101, 'United States'),
(30, '4 Garden Drive \r\nLakeland', '', 'Florida', 33801, 'United States'),
(31, '578 John Street \r\nRiverdale', '', 'Georgia', 30274, 'United States'),
(32, '7580 East Elizabeth Road \r\nFort Worth', '', 'Texas', 76110, 'United States'),
(33, '7381 Bowman Dr. \r\nSeverna Park', '', 'Maryland', 21146, 'United States'),
(34, '8289 Penn Drive \r\nPortland', '', 'Maine', 4103, 'United States'),
(35, '13 East Brown Rd. \r\nMillville', '', 'New Jersey', 8332, 'United States'),
(36, '288 Pierce St. \r\nEden Prairie', '', 'Minnesota', 55347, 'United States'),
(37, '370 Old Green Lake Court \r\nHopkins', '', 'Minnesota', 55343, 'United States'),
(40, '295 Glenholme Dr. \r\nGroton', '', 'Connecticut', 6340, 'United States'),
(41, '295 Glenholme Dr. \r\nGroton', '', 'Camden', 95050, 'United States'),
(42, '14 Sheffield Road \r\nTonawanda', '', 'New York', 14150, 'United States'),
(43, '667 South Locust Street \r\nFar Rockaway', '', 'New York', 11691, 'United States'),
(44, '3 Rockcrest Ave. \r\nHobart', '', 'Indiana', 15687, 'United States'),
(45, '801 Heritage Ave. \r\nWarwick', '', '', 2886, 'United States'),
(47, '15 Kransduinen Close Westridge, Mitchells plain', '', 'Cape Town', 7798, '1'),
(48, '15 Kransduinen Close Westridge, Mitchells plain', '', 'Cape Town', 7798, '1'),
(50, '15 Kransduinen Close Westridge, Mitchells plain', '', 'Cape Town', 7798, '1'),
(51, '15 Kransduinen Close Westridge, Mitchells plain', '', 'Cape Town', 7798, '1');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `CartID` int(2) NOT NULL,
  `CustomerID` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`CartID`, `CustomerID`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 23);

-- --------------------------------------------------------

--
-- Table structure for table `cartdetails`
--

DROP TABLE IF EXISTS `cartdetails`;
CREATE TABLE `cartdetails` (
  `CartID` int(10) NOT NULL,
  `ProductID` bigint(13) DEFAULT NULL,
  `Quantity` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cartdetails`
--

INSERT INTO `cartdetails` (`CartID`, `ProductID`, `Quantity`) VALUES
(7, 2133386265689, 1),
(7, 5168200668534, 1),
(7, 5219912755573, 1),
(7, 317799630980, 1),
(1, 2133386265689, 1),
(1, 3908784843571, 1),
(1, 4380750441327, 1),
(1, 474150554586, 1),
(1, 619902824051, 2),
(16, 160433374704, 1),
(16, 474150554586, 1),
(16, 561000112341, 1),
(16, 565448801376, 1),
(14, 474150554586, 2),
(14, 561000112341, 1),
(14, 619902824051, 1),
(14, 6985722557795, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `ContactID` int(2) NOT NULL,
  `TelephoneNumber` varchar(20) DEFAULT NULL,
  `CellPhoneNumber` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ContactID`, `TelephoneNumber`, `CellPhoneNumber`) VALUES
(1, '(800) 877-1200', ''),
(2, '(888) 522-5467', ''),
(3, '(718) 361-9001', ''),
(4, '(808) 837-7700', ''),
(5, '(949) 219-1100', ''),
(6, '(709) 754-2277', ''),
(7, '(215) 956-9007', ''),
(8, '(202) 555-0139', ''),
(9, '(202) 555-0111', ''),
(10, '(202) 555-0131', ''),
(11, '(202) 555-0196', ''),
(12, '(202) 555-0102', ''),
(13, '(202) 555-0152', ''),
(14, '(207) 555-0151', ''),
(15, '(207) 555-0182', ''),
(16, '(207) 555-0114', ''),
(17, '(207) 555-0132', ''),
(18, '(207) 555-0137', ''),
(19, '(207) 555-0138', ''),
(20, '(803) 555-0193', ''),
(21, '(803) 555-0173', ''),
(22, '(803) 555-0158', ''),
(23, '(803) 555-0111', ''),
(24, '(803) 555-0183', ''),
(25, '(803) 555-0157', ''),
(26, '(502) 555-0137', ''),
(27, '(502) 555-0163', ''),
(28, '(502) 555-0109', ''),
(29, '(502) 555-0131', ''),
(30, '(502) 555-0147', ''),
(31, '(502) 555-0164', ''),
(32, '(303) 555-0104', ''),
(33, '(303) 555-0197', ''),
(34, '(303) 555-0131', ''),
(35, '(303) 555-0194', ''),
(36, '(303) 555-0158', ''),
(37, '(303) 555-0109', ''),
(38, '(225) 555-0131', ''),
(39, '(225) 555-0113', ''),
(40, '(225) 555-0113', ''),
(41, '(225) 555-0126', ''),
(42, '(225) 555-0191', ''),
(43, '(225) 555-0173', ''),
(44, '(701) 555-0115', ''),
(45, '(701) 555-0166', ''),
(46, '(701) 555-0186', ''),
(47, '(701) 555-0121', ''),
(48, '(701) 555-0146', ''),
(49, '(701) 555-0144', ''),
(59, '1234567', '0761562711'),
(60, '132456789', '0765432198'),
(64, '1234567', '0761562713'),
(65, '0215483319', '0761562785');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `CustomerID` int(2) NOT NULL,
  `FirstName` varchar(8) DEFAULT NULL,
  `LastName` varchar(8) DEFAULT NULL,
  `EmailAddress` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `FirstName`, `LastName`, `EmailAddress`) VALUES
(1, 'Hana', 'Watson', 'HanaWatson@gmail.com'),
(2, 'Theodore', 'James', 'TheodoreJames@gmail.com'),
(3, 'Phoenix', 'Dawson', 'PhoenixDawson@gmail.com'),
(4, 'Sara', 'Gregory', 'SaraGregory@gmail.com'),
(5, 'Brendan', 'Hensley', 'BrendanHensley@gmail.com'),
(6, 'Melvin', 'Weiss', 'MelvinWeiss@gmail.com'),
(7, 'Aleena', 'Banks', 'AleenaBanks@gmail.com'),
(8, 'Kamila', 'Cochran', 'KamilaCochran@gmail.com'),
(9, 'Boston', 'Hancock', 'BostonHancock@gmail.com'),
(10, 'Davon', 'Mcdowell', 'DavonMcdowell@gmail.com'),
(11, 'Randy', 'Atkins', 'RandyAtkins@gmail.com'),
(12, 'Anna', 'Howard', 'AnnaHoward@gmail.com'),
(13, 'Cadence', 'Lowery', 'CadenceLowery@gmail.com'),
(14, 'Rhianna', 'Andersen', 'RhiannaAndersen@gmail.com'),
(15, 'Javier', 'Ellis', 'JavierEllis@gmail.com'),
(16, 'Monica', 'Waters', 'MonicaWaters@gmail.com'),
(17, 'Jorden', 'Bowman', 'JordenBowman@gmail.com'),
(18, 'Jasmine', 'Whitaker', 'JasmineWhitaker@gmail.com'),
(19, 'Daniel', 'Dixon', 'DanielDixon@gmail.com'),
(20, 'Salma', 'Butler', 'SalmaButler@gmail.com'),
(21, 'Vivian', 'Miles', 'VivianMiles@gmail.com'),
(23, 'Barbara', 'Hancock', 'BarbaraHancock@gmail.com'),
(29, 'Aiden', 'Page', 'aidenpage@gmail.com'),
(30, 'Liam', 'Page', 'liampage@gmail.com'),
(34, 'andrea', 'Page', 'andreapage@gmail.com'),
(35, 'Ashton', 'Page', 'ashtonpage@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `customeraddress`
--

DROP TABLE IF EXISTS `customeraddress`;
CREATE TABLE `customeraddress` (
  `CustomerID` int(2) DEFAULT NULL,
  `AddressID` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customeraddress`
--

INSERT INTO `customeraddress` (`CustomerID`, `AddressID`) VALUES
(1, 22),
(2, 23),
(3, 24),
(4, 25),
(5, 26),
(6, 27),
(7, 28),
(8, 29),
(9, 30),
(10, 31),
(11, 32),
(12, 33),
(13, 34),
(14, 35),
(15, 36),
(16, 37),
(17, 40),
(18, 41),
(19, 42),
(20, 43),
(21, 44),
(23, 45),
(29, 47),
(30, 48),
(34, 50),
(35, 51);

-- --------------------------------------------------------

--
-- Table structure for table `customercontact`
--

DROP TABLE IF EXISTS `customercontact`;
CREATE TABLE `customercontact` (
  `CustomerID` int(2) DEFAULT NULL,
  `ContactID` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customercontact`
--

INSERT INTO `customercontact` (`CustomerID`, `ContactID`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(23, 22),
(29, 59),
(30, 60),
(34, 64),
(35, 65);

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE `games` (
  `ProductID` bigint(13) NOT NULL,
  `PlatForm` varchar(20) DEFAULT NULL,
  `Genre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`ProductID`, `PlatForm`, `Genre`) VALUES
(2133386265689, 'NDS', 'Adventure'),
(2217108832660, 'PC', 'Adventure'),
(2477499942954, 'PS4', 'Racing'),
(2694332391286, 'PC', 'Sports'),
(3908784843571, 'PS4', 'Fighting'),
(4380750441327, 'PS Vita', 'Adventure'),
(5051892183062, 'Xbox One', 'Adventure'),
(5168200668534, 'PC', 'Racing'),
(5219912755573, 'Xbox One', 'Racing'),
(5570493712682, 'PS4', 'Sports'),
(5666006290658, 'PS4', 'MMORPG'),
(5911259990799, 'Wii U', 'Sports'),
(6160936170927, 'PC', 'MMORPG'),
(6985722557795, 'PS Vita', 'Fighting'),
(7317862658536, 'NDS', 'Racing'),
(7382317749068, 'Wii U', 'Adventure'),
(7624435304705, 'Xbox One', 'Fighting'),
(8128136357204, 'Xbox One', 'Sports'),
(8747021962298, 'PC', 'Role-Playing-Games'),
(8760351580593, 'PC', 'Fighting'),
(9149598163082, 'Xbox One', 'Sports'),
(9427274829730, 'Wii U', 'Fighting'),
(9498391895827, 'PS Vita', 'Sports');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE `orderdetails` (
  `OrderID` varchar(10) DEFAULT NULL,
  `ProductID` bigint(13) DEFAULT NULL,
  `Quantity` varchar(10) DEFAULT NULL,
  `Price` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`OrderID`, `ProductID`, `Quantity`, `Price`) VALUES
('1', 2217108832660, '2', '189.00'),
('1', 2477499942954, '2', '187.00'),
('1', 5219912755573, '1', '999.99'),
('1', 131400096479, '1', '245.00'),
('3', 2133386265689, '1', '419.00'),
('3', 3908784843571, '1', '999.99'),
('3', 5219912755573, '1', '999.99'),
('4', 160433374704, '1', '119.00'),
('4', 606279521863, '1', '149.00'),
('6', 2133386265689, '1', '419'),
('6', 2217108832660, '1', '189');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `OrderID` int(10) NOT NULL,
  `CustomerID` varchar(10) DEFAULT NULL,
  `TotalAmount` varchar(10) DEFAULT NULL,
  `OrderDate` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `CustomerID`, `TotalAmount`, `OrderDate`) VALUES
(1, '7', '1996.99', '2016-10-19 22:58:42.000000'),
(3, '12', '2418.98', '2016-10-21 20:25:02.000000'),
(4, '12', '268', '2016-10-29 16:08:17.000000'),
(5, '12', '0', '2016-10-29 16:09:20.000000'),
(6, '12', '608', '2016-10-30 18:31:49.000000');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `ProductID` bigint(13) NOT NULL,
  `ProductCat` varchar(11) DEFAULT NULL,
  `ProductName` varchar(100) DEFAULT NULL,
  `ProductDestription` varchar(3000) DEFAULT NULL,
  `Price` decimal(10,0) DEFAULT NULL,
  `Quantity` int(3) DEFAULT NULL,
  `PictureURL` varchar(200) DEFAULT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductCat`, `ProductName`, `ProductDestription`, `Price`, `Quantity`, `PictureURL`, `Status`) VALUES
(126709858743, 'ACCESSORIES', 'Speedlink STIX Controller Cap Set', 'Speedlink STIX Controller Cap Set for PS4 Improve your analogue-stick control, protect your controller and also give it a new, distinctive look. The STIX Controller Cap Set enhances the ergonomic comfort of your analogue-sticks, offering you greater control when dealing with tricky situations. The caps attach quickly and can be removed at any time ? so you can try out any one of the four other colours. Features:- Analog-stick caps for the original PS4 controller- Perfect analog-stick control- Easy to swap- Handy colour coding- Improved analog-stick ergonomics- Easy to attach ? removable at any time- 4 colours for controller customisation', '99', 100, 'themes/images/products/41.jpg', 0),
(131400096479, 'ACCESSORIES', 'ORB PS4 Dual Controller Charging Dock', 'Product Description\nCharging up yo 2 controllers at any time, the ORB Controller Dock offers high efficient charging via your PS4 Console or other USB device. The dock features an LED Charge Indicatior and can also charge your controller while in standby mode. Comes complete with a 1 Metre USB Charging Cable.\nProduct Description\n\nCharges Up To 2 Controllers At Any Time\nHigh Efficient Charging Via PS4 Console Or Other USB Device\nLed Indicating Charging Status\nCharges while on console standby mode\nController Not Included\n1 Meter USB Charging Cable Included', '245', 83, 'themes/images/products/43.jpg', 0),
(160433374704, 'ACCESSORIES', 'Controller Skin 1 - Camo', 'Camo Silicone skin for the Xbox One controller.', '119', 22, 'themes/images/products/33.jpg', 0),
(295957004257, 'ACCESSORIES', 'Speedlink Trax Headset Adapter', 'Enjoy the convenience of your PC headset even with the latest notebooks, tablet PCs and smart phones. This adapter lets you connect any headset with separate headphone and microphone plugs to devices with a single 4-pole headset socket.\nFeatures:\n- Headset adapter\n- Connects any stereo headset with dual plugs really easily to smart phones., tablet PCs and notebooks with a 4- pole socket\n- Compatible with the latest iPhone , Samsung Galaxy S3, iPad , MacBook and Ultrabook devices\n- Enjoy the full functionality of popular in- line remote for volume adjustment and microphone muting\n- Maximum signal quality', '68', 100, 'themes/images/products/28.jpg', 0),
(303795997123, 'ACCESSORIES', 'Original Thumb Stick Replacements x2 (Spare Parts) - Black (Assecure)', 'Restore your controller analogue thumb sticks back to a new condition with these original replacements. These thumb stick replacements will fit Sony PS4 Wireless Controllers, ideal for replacing warn or damaged thumb grips. Replacing the thumb sticks requires you to open the controller, technical level medium. You will need a screwdriver to install (not included) ', '82', 100, 'themes/images/products/42.jpg', 0),
(317799630980, 'ACCESSORIES', 'Microsoft Xbox 360 Black Wireless Controller for Windows', 'Discover greater precision, comfort, and control. The Wireless Xbox 360 Controller for Windows delivers a consistent and universal gaming experience across both of Microsoft\'s gaming systems. Experience the ultimate gaming experience on Windows XP and Xbox 360.\nWireless Integrated 2.4 GHz high-performance wireless technology lets you control the action from up to 30 feet away.\nFor PC and Xbox 360 Works across Microsoft\'s gaming platforms. Xbox 360 Controller for Windows works with most Windows XP-based PCs and Xbox 360, delivering a consistent and universal gaming experience.\nVibration Feedback Get a better feel for the game. Vibration feedback ensures riveting game play every time*.\nErgonomic Play in total comfort. Award winning compact ergonomics provide a more comfortable gaming experience.\nEnhanced PC Gaming Precise thumb sticks, two pressure-point triggers, and 8-way directional pad for enhanced PC gaming.\nXbox Live Play Integrated headset jack for PC headsets and Xbox Live play', '829', 21, 'themes/images/products/26.jpg', 0),
(375966779522, 'ACCESSORIES', 'SteelSeries QcK Mousepad', 'Composed of high quality cloth and a rubber base, the SteelSeries QcK is the ideal mouse pad for every gamer preferring cloth surfaces. 270x320x2mmNON-SLIP RUBBERThe QcK mousepad has a non-slip, rubber base that prevents the pad from moving during use. The rubber bottom also supplies additional comfort for your hand and wrist movement at all times.CLOTH SURFACEThe cloth surface of the QcK provides a smooth, steady glide surface for gamers available in multiple sizes, thicknesses and designs.TESTED BY PROSThe SteelSeries QcK series has undergone intensive testing by professional gamers ensuring that the QcK series provides users with a reliable surface for optimal functionality of your mouse.TRUE VALUEThe QcK series are some of the most used mousepads amongst professional gaming teams.', '226', 100, 'themes/images/products/30.jpg', 0),
(385101357324, 'ACCESSORIES', 'Speedlink PARTHICA Core Gaming Keyboard for PC - Black', 'Speedlink PARTHICA Core Gaming Keyboard Optimise your responsiveness, precision and comfort; take your enemies by surprise by unleashing complex macros at lightning-fast speed; and walk away victorious thanks to your customised profiles. The PARTHICA Gaming Keyboard offers hardcore gamers all the customisation options they could wish for. Its impressive configuration software lets you customise the PARTHICA Gaming Keyboard to suit the way you game. Features: - Efficient gaming keyboard for professionals - Customisable functions and look - Freely configurable key/button functions - Professional gaming keyboard with LED illumination - 93 configurable keys, 15 freely programmable buttons - 5 macro buttons plus 10 multimedia buttons and practical on-the-fly macro recording - Maximum gaming comfort thanks to extra-high raised keys for precise keystrokes, clearly-labelled WASD and arrow keys, plus an on/off switchable Windows key - Anti-ghosting and up to 6-key rollover technology', '599', 100, 'themes/images/products/24.jpg', 0),
(462767755620, 'ACCESSORIES', 'PS4 Dual Shock 4 Black', 'The DualShock?4 controller features new innovations to deliver more immersive gaming experiences, including a highly sensitive six-axis sensor as well as a touch pad located on the top of the controller which offers completely new ways to play and interact with games. New multi-touch and touch pad opens up new gameplay possibilities. LEDs create a rainbow of colours that work with the PlayStation? Camera. Built-in speaker and stereo headset jack. Dimensions: Approx. 161mm x 57mm x 100mm (w x h x d) Keys / Switches: PS button, SHARE button, OPTIONS button, Directional buttons (Up/Down/Left/Right), Action buttons (Triangle, Circle, Cross, Square), R1/L1/R2/L2 button, Left stick / L3 button, Right stick / R3 button, Pad button Motion Sensor: Six-axis motion sensing system (three-axis gyroscope, three-axis accelerometer) Ports: USB (Micro B), Extension Port, Stereo Headset Jack\n\nPlaystation Hardware - 12 Months warranty\n\nHELPDESK SUPPORT: 0861 773 783\n\nPartserve runs the Playstation helpdesk from Monday to Friday 8am to 5pm. We offer pre and post sales support. We offer technical support on the console, as well as connectivity issues.\n\nPartserve has warranty centers in all 5 major city centers, Johannesburg, Cape Town, Durban, PE and Bloemfontein', '1000', 100, 'themes/images/products/40.jpg', 0),
(474150554586, 'ACCESSORIES', 'Batman Silicone Jackets and Thumb Grips ', 'These Batman Arkham Knight Game Grips Double Pack for Xbox One give you superb comfort and protect your controller from scuffs and scratches. With 2 silicone jackets and 4 thumb grips, the silicone jackets have been designed to ensure comfort and grip during long gaming sessions, while allowing full access to all buttons and connections on your Xbox One controller. Features : - The pack also includes 4 thumb grips that have been embossed with the Bat emblem to provide greater grip and control when using the controllers analogue sticks giving you a notable advantage over your competition. - The Batman Game Grips offer protection to your controller against unwanted scuffs and scratches. - They also have an easy fit design, making it simple to get them on and off. - Useful info: Batman Arkham Knight Xbox One Game Grips - Includes 2 silicone jackets - Comes with 4 thumb grips - Dimensions: H 350, W 245, D 60 mm', '126', 15, 'themes/images/products/35.jpg', 0),
(531365233425, 'ACCESSORIES', 'Speedlink Thebe Cs Stereo Headset - Black', 'Speedlink Thebe CS Stereo Headset - SL-8727-BK-01\nTreat your ears to some comfort: \nThe large, ultra soft ear cups and the padded, adjustable headband on the Thebe CS headset make chat and multimedia a real pleasure. At the same time, you can adjust the volume at lightning fast speed using the integrated inline remote.\nFeatures:\n- Stunning multimedia sound quality\n- Maximum comfort thanks to ultra-soft ear cup and padded headband\n- Sensitive microphone with rugged, fold away arm\n- Integrated inline remote for ultra-fast volume adjustment\n- Robust design\n- 2m Cable\nSpecifications:\n- Dimensions: 8.8cm x 18.7cm x 27.9cm\n- Warranty: 1 year', '217', 100, 'themes/images/products/29.jpg', 0),
(561000112341, 'ACCESSORIES', 'Xbox One Chat Pad', 'Send messages and search easily Compose messages to friends, enter codes, and search apps in seconds with the Xbox Chatpad. Get to your apps quickly with two programmable keys. The Chatpad plugs into your Xbox One wireless controller, putting a backlit keypad and headset audio controls right at your fingertips. It also includes a Chat Headset with 3.5mm jack, so you can plug directly into the Chatpad. Use the Chatpad with both Xbox One and Windows 10.* Features Full QWERTY keyboard Backlit keys Audio control at your fingertips', '660', 100, 'themes/images/products/36.jpg', 0),
(564874748048, 'ACCESSORIES', 'Kontrolfreek FPSFreek Vortex', 'Your opponents better run and hide because against the new FPS Freek Vortex, No one is safe! With one full size, convex stick designed for accuracy, and one shorter, CQC-style stick that\'s concave for comfort and grip, Vortex represents the perfect combination for just about any gameplay situation. The taller FPS Freek (0.49 inches tall) is intended for your right thumbstick, to give you more leverage and precision while aiming. The lower profile CQC-style sticks (0.30 inches tall) are designed to add grip to your left thumbstick without adding much height. Though the two sticks differ in height and function, each one employs a soft and comfortable rubber thumb pad and features a laser-etched design that adapts to the pressure you put on it. The synergistic FPS Freek Vortex is ideal for those who desire enhanced precision for their aiming stick but only wish to add grip to their movement stick.', '313', 100, 'themes/images/products/44.jpg', 0),
(565448801376, 'ACCESSORIES', 'Stealth SX112 Silcone Jackets & Thumb Grips 2PK', 'Accuracy. Remain Controlled. Keep your hands steady during combat, a good grip of your controller will keep your aim true and could be the difference between life and death. Features: - 2x game grips and 4x thumb grips (Controllers NOT included, sold separately) - Silicone jackets designed to enhance grip and control during long gaming sessions - Protects your weapons from scuffs and scratches - Allows full access to all controls - Comfortable grip and feel', '129', 100, 'themes/images/products/32.jpg', 0),
(606279521863, 'ACCESSORIES', 'Xbox One Chat Headset', 'Keep your in-game communications crisp with the Xbox One Chat Headset. Hear friends and foes in crystal-clear digital wideband audio. The Chat Headset is designed for comfort during long gaming sessions. Plus, you can adjust the mute and volume settings without taking your hands off the controller.\n\nXbox Warranty - 12 Months\n\nThe store may not replace it, and the customer must please contact the call centre on 0800 991 550 (Toll free number) for support. It is open Monday to Friday from 10h00 to 18h00. The customer will then log the problem and receive a ref number. An email is then sent to Powercare from Microsoft within 24/48 hours. \n\nPowercare will then arrange collection of the unit and replacement -as long as the console/accessory has not been tampered with in any way.\n\nWhen returning the console to Powercare, please ensure that the customer does NOT send back the Hard Drive, Controller or any power cords or other detachable items on the console, ONLY the console must be returned or the faulty item.', '149', 99, 'themes/images/products/31.jpg', 0),
(619902824051, 'ACCESSORIES', 'Speedlink Pulse Charge Power Kit ', 'Speedlink Pulse Charge Power Kit for Xbox One - SL-2510-BK: Tap the full power of your Xbox One controller. The Pulse Play and Charge Power Kits high capacity 1200mAh battery will power your gamepad for over 10 hours so it??s always ready to use. You don??t have to interrupt the nail biting gameplay either as you can charge the battery while you game, making long waiting times a thing of the past. What??s more, the 3m micro USB charging cable offers you maximum freedom. Features: - Battery and charging cable for the original Xbox One Controller - 1200mAh for up to 10 hours gaming - Lithium polymer battery - Game and charge at the same time - Charging possible without a controller - Cable length: 3m Specifications: - Output Interface: Xbox One Gamepads - Host Interface: Xbox One - Colour: Black - Dimensions: 16.8cm x 20cm x 4cm - Warranty: 1 year', '276', 100, 'themes/images/products/37.jpg', 0),
(667380742993, 'ACCESSORIES', 'Stealth SX101 Dual Charging Dock Rechargeable ', 'Charged and Remain Fully Loaded. Be prepared, or prepare to fail! Dont let a low battery ruin your kill-streak, keep your weapons fully loaded by equipping your controllers with the Dual Charging Dock. Features: - 1 x Dual Charging Dock, 2 x Rechargeable Battery Packs & 1 x 2m Play & Charge Micro USB Cable. (Xbox One controllers NOT included - sold separately) - Twin Charging Dock charges and stores up to two Xbox One Wireless Controllers. - Charging Dock is powered by mains adaptor and includes LED charging indicators. - Simple set up.', '372', 100, 'themes/images/products/34.jpg', 0),
(778186253060, 'ACCESSORIES', 'Speedlink Calado Silent Wireless Mouse', 'Speedlink Calado Silent Wireless Mouse - SL-6343-RRBK: The wireless Calado Silent Mouse lets you work in whisper quiet comfort at your PC so you can keep calm in the hectic office environment. The advanced button technology effectively eliminates the noise you make when using the mouse: clicks are almost silent and those around you will no longer feel disturbed as it??s up to 90 per cent quieter than a standard mouse. Thanks to its nice and compact shape combined with its premium, non-slip rubber coating, the Calado Silent Mouse is designed to fit the shape of your right hand perfectly all while offering precise and fluid tracking thanks to its sensor resolution of up to 1,600dpi. What??s more, its robust wireless technology offers you up to 8m of wireless freedom. Features: - Wireless five button mouse - Maximum precision 1,600dpi optical sensor - Dpi switch for rapid toggling between the three sensor resolution settings - Ergonomic shape designed to fit your right hand perfectly - Non slip, rubberised button function scroll wheel - Fully rubberised finish Specifications: - Host Interface: 2.4GHz Wireless - Weight: 200g - Dimensions: 10.6cm x 7.3cm x 3.6cm - Colour: Black - Resolution: 1600dpi - Warranty: 1 year', '249', 100, 'themes/images/products/25.jpg', 0),
(818863071520, 'ACCESSORIES', 'PS4 Charging Station', 'Keep your wireless controllers fully charged with the DUALSHOCK 4 Charging Station.The official Charging Station can charge up to two DUALSHOCK 4 Wireless Controllers at the same time without having to connect them to the PS4 system. Charge your DUALSHOCK 4 by simply inserting the controller to the charging connector on the charging station and by plugging it into a household electrical outlet.\n\nPlaystation Hardware - 12 Months warranty\n\nHELPDESK SUPPORT: 0861 773 783\n\nPartserve runs the Playstation helpdesk from Monday to Friday 8am to 5pm. We offer pre and post sales support. We offer technical support on the console, as well as connectivity issues.\n\nPartserve has warranty centers in all 5 major city centers, Johannesburg, Cape Town, Durban, PE and Bloemfontein', '489', 100, 'themes/images/products/39.jpg', 0),
(879009479846, 'ACCESSORIES', 'Speedlink Jigg Wireless Mouse - Black', 'Speedlink Jigg Wireless Mouse Black - SL-6300-BK:\nThe Jigg is an optical 3 button mouse with a 1,200dpi sensor that ensures precise and fluid tracking. \nThe mouse is suitable for right or left handed use. The wireless technology offers up to 8m of freedom to work, surf or game on the computer.\nFeatures:\n- Hardwearing construction\n- Up to 8m range\n- Optical sensor with precise 1.200dpi resolution\n- 12 Months battery life\n- Suitable for right or left handers\n- 2 Batteries included\nSpecifications:\n- Host Interface: 2.4GHz Wireless\n- Weight: 100g\n- Dimensions: 16cm x 9.6cm x 4.5cm\n- Colour: Black\n- Resolution: 1600dpi\n- Warranty: 1 year', '139', 100, 'themes/images/products/27.jpg', 0),
(931092352348, 'ACCESSORIES', 'ORB PS4 Thumb Grips (4 DOT)', 'Give yourself a gaming edge with these handy thumb grips that offer improved control and feel & also help to stop wear and tear on your PS4 controller.\n2 X Firm Rubber Grip Caps For Comfort\n2 X 4 Dot D-Pad Rubber Grip Caps For Comfort', '78', 100, 'themes/images/products/38.jpg', 0),
(2133386265689, 'GAMES', 'New Super Mario Bros', 'THIS TITLE MAY REQUIRE ACCESS TO A BROADBAND INTERNET CONNECTION.\n\nThe first all-new 2D Mario platformer since Super Mario World has arrived! Boasting incredible 3D graphics to accompany classic 2D gameplay, this fast-paced adventure will have Mario fans cheering as they make their way over fields, under water, through castles, and into the air. \n\nThe power of the DS is used to great effect, and the result is that the Mushroom Kingdom looks more alive than ever. Backgrounds are beautifully layered and every character on screen is presented in gorgeous 3D, with Piranha Plants baring their teeth with wild abandon and Goombas looking almost too cute to stomp on. Just below the surface you will find hundreds of hard-as-nails mini-missions that will force you to reconsider your supposed Super Mario supremacy. \n\nThe real challenge of the game is tracking down its 240 Star Coins, which allow you to open up paths on the eight world maps. Each level hides three of those shiny collectibles, sometimes they\'re in plain sight but require a special skill in order to be reached. Other times they\'re cleverly hidden, and sometimes you will need one of the game\'s special new power-ups to find them. Nostalgic and new in equal doses, New Super Mario Bros. is, quite simply, a gem of a game.', '419', 98, 'themes/images/products/20.jpg', 0),
(2217108832660, 'GAMES', 'Call of Duty: Black Ops II', 'THIS TITLE MAY REQUIRE ACCESS TO A BROADBAND INTERNET CONNECTION \n\nSet in the year 2025, Call of Duty: Black Ops II propels players into global conflict featuring advanced weaponry, robotics, and drone warfare in a new Cold War scenario whose seeds are being sown in today?s headlines.  New graphics technology drives the stunning cinematic action of the single-player campaign?s branching storylines and non-linear missions.\n\n\\"Hands down, this is the most ambitious Call of Duty ever,\\" said Eric Hirshberg, CEO of Activision Publishing. \\"We are bringing disruptive innovation to the franchise and we are doing it on several fronts. We\\\'re pushing the boundaries technologically, graphically, and from a narrative and gameplay perspective. At the same time, we need to stay true to the epic realism, authenticity, heart pumping adrenaline, and cinematic action that so many people love and expect from a Call of Duty game. Treyarch\\\'s vision for Call of Duty: Black Ops II will redefine the Call of Duty franchise for the future--both literally and figuratively.\\"\n\n?With Call of Duty: Black Ops II, the team is crafting an experience that Call of Duty fans have never seen before,? said Mark Lamia, Studio Head for Treyarch. ?We are challenging assumptions on every front, with the single player campaign, Zombies and multiplayer.  In the campaign, we are creating a thought-provoking story that introduces branching storylines and meaningful choices that impact the narrative. Running in the multiplayer engine for the first time, Zombies gives players a bigger and more diverse set of gameplay experiences, as well as entirely new ways to wage war with the undead. And in multiplayer, we?re embracing all skill levels and play styles to give players more ways to engage. With Call of Duty: Black Ops II, we?re all in and we won?t rest until we?ve launched nothing less than the best Call of Duty we?ve ever made.?\n\nInternet Connection Required. \n\nPre-order now and get the Nuketown 2025 bonus map plus access to the Call of Duty?: Black Ops II Double XP Launch Weekend. Relive the close quarters chaos of this classic fan-favorite map, reimagined in a visionary depiction of the ?Model Home of the Future?. Map included on the disc.', '189', 65, 'themes/images/products/18.jpg', 0),
(2477499942954, 'GAMES', 'Motorcycle Club', 'THIS TITLE MAY REQUIRE ACCESS TO A BROADBAND INTERNET CONNECTION.\r\n\r\nBigBen Interactive brings you Motorcycle club. Arcade racing motorcycles in urban universe and set in familiar places for bikers with a wide selection of motorcycles official Honda, Kawasaki, Suzuki, Yamaha, KTM and BMW. Koch Media are happy to announce that as part of a multi-title distribution partnership they are the official UK distributor of Bigben Interactive?s upcoming arcade-style motorbike racing game, Motorcycle Club. Motorcycle Club is due to release on PlayStation®4, PlayStation®3, Xbox 360 and PC In November 2014. Pick from a selection of the world\'s most prestigious motorbikes, including BMW, Honda, Kawasaki, KTM, Suzuki and Yamaha. 22 official motorbikes spanning across 3 categories (Roadster, Superbike and Custom) are waiting in your garage, each with a role to play in your club. As you rise through the ranks you will be able to use the money you earn to buy more powerful bikes and customise your riders. Switch between bikes mid race to gain an advantage over your rivals, but be sure to select the correct bike for the terrain ahead or you?ll end up at the back of the pack! To win the Motorcycle Championship you have to compete across 20 varied daytime and night-time circuits. Put some distance between you and your rival clubs to claim the final victory! Multiplayer mode allows up to 4 players to compete against each other for the podium win! Published by Bigben Interactive and developed by Kylotonn Games, Motorcycle Club will be released in December 2014 on PlayStation®4, Xbox 360, PlayStation®3 and Windows PC.\r\n', '187', 66, 'themes/images/products/3.jpg', 0),
(2694332391286, 'GAMES', 'Pro Cycling Manager 2012', 'THIS TITLE MAY REQUIRE ACCESS TO A BROADBAND INTERNET CONNECTION \n\nManage your team (trainings, scooting, strategy?) before and during a race\n\nEven more gorgeous graphics quality (new rider design?)\n\n62 official teams, +170 events!\n\nNew GUI more intuitive\n\nImproved race editor to create your own routes\n\nUp to 20 simultaneous players Online.\n\nOfficial teams/racers:\n\nControl one of the 62 official teams, Manage the best riders, Conquer the world?s\n\nmost famous races!\n\nImproved graphics:\n\nNEW design for the riders! More beautiful and immersive, More sets and\n\nEnvironments\n\nPower Stage Editor', '116', 100, 'themes/images/products/7.jpg', 0),
(3908784843571, 'GAMES', 'DragonBall Xenoverse', 'Go Super Saiyan as Dragon Ball makes its return with Dragon Ball Xenoverse. Dragon Ball Xenoverse features improved gameplay giving you a fast paced battle with powerful attacks.  Discover a new world in Dragon Ball Xenoverse featuring a clock that stopped, that has now restarted... A new fighter joins the ongoing fight... But who is he?', '1000', 99, 'themes/images/products/15.jpg', 0),
(4380750441327, 'GAMES', 'Injustice: Gods Among Us GOT', 'THIS TITLE MAY REQUIRE ACCESS TO A BROADBAND INTERNET CONNECTION.\n\nInjustice: Gods Among Us introduces a bold new franchise to the fighting game genre from NetherRealm Studios, creators of the definitive fighting game; Mortal Kombat. Featuring DC Comics icons such Batman, Cyborg, The Flash, Harley Quinn, Nightwing, Solomon Grundy, Superman and Wonder Woman. The latest title from the award-winning studio presents a deep original story. Heroes and villains will engage in epic battles on a massive scale in a world where the line between good and evil has been blurred.', '377', 100, 'themes/images/products/21.jpg', 0),
(5051892183062, 'GAMES', 'Lego Batman 3: Beyond Gotham', 'THIS TITLE MAY REQUIRE ACCESS TO A BROADBAND INTERNET CONNECTION.\r\n\r\nThe best-selling LEGO Batman videogame franchise returns in an out-of-this-world, action-packed adventure! In LEGO Batman 3: Beyond Gotham, the Caped Crusader joins forces with the super heroes of the DC Comics universe and blasts off to outer space to stop the evil Brainiac from destroying Earth. Using the power of the Lantern Rings, Brainiac shrinks worlds to add to his twisted collection of miniature cities from across the universe. Now the greatest super heroes and the most cunning villains must unite and journey to different Lantern Worlds to collect the Lantern Rings and stop Brainiac before it?s too late.\r\n\r\nFeatures:\r\n\r\n- Exciting space combat: For the first time ever, battle with Batman and his allies in outer space and the various Lantern worlds including Zamaron and Odym.\r\n\r\n- Robust roster of DC Comics heroes and villains: Play and unlock more than 150 unique characters with amazing powers and abilities, including members of the Justice League, and BIG LEGO Figures such as Cyborg, Solomon Grundy and more.\r\n\r\n- Unique storyline with new plots and twists: Surprising disguises, Brainiac?s mind control ability, and the power of the Lantern rings bring a whole new twist to characters you thought you knew.\r\n\r\n- Hack computer terminals: Enter a virtual world to escape mazes, battle in arenas, and race to find the code.\r\n\r\n- Bat-tastic Gadget Wheel: With a simple press of a button, choose and upgrade select character?s suits and abilities.\r\n\r\n- Variety of iconic locales: Visit the Hall of Justice, the Batcave, and the Justice League Watchtower to access shops, trophy rooms, and the hero and vehicle customizers.\r\n\r\nHandheld Game Features (PS Vita & 3DS exclusive):\r\n\r\n- Mind-blowing Zero-G gameplay adds a whole new dimension to the action.\r\n\r\n- Remix combat in spectacular style by customising the action with all-new LEGO Hazard Builds!\r\n\r\n- Adventure through 45 missions spanning an original storyline focusing on dynamic, fast-paced game-play.\r\n\r\n- Play as more than 105 characters from the DC Comics universe.', '377', 50, 'themes/images/products/1.jpg', 0),
(5168200668534, 'GAMES', 'Need for Speed: Rivals', 'THIS TITLE MAY REQUIRE ACCESS TO A BROADBAND INTERNET CONNECTION.\n\nNeed for Speed Rivals captures the adrenaline and intensity of the street\'s ultimate rivalry between cops and racers in a stunning open road environment. Built on the Frostbite 3 game engine, Need for Speed Rivals allows gamers play as either a cop or racer, where each side of the law has its own set of high stakes challenges, rewards and consequences. As a racer, the goal is to become infamous for taking risks behind the wheel and capturing your most intense escapes on video for the world to see. The more cops players evade, the more Speed Points they collect, enabling them to unlock new cars and items. Keep raising the stakes race after race to become an ever-more valuable target to the cops, but risk losing it all if busted. As a cop, players work together as part of a team in pursuit of racers, earning prominence and rising in the ranks of the Police Force with every bust. Achieving higher ranks unlocks new police-only cars and more powerful pursuit tech. At the heart of Need for Speed Rivals is AllDrive, an innovative new online feature that allows gamers to seamlessly transition from playing alone to playing with friends, eliminating the line between single player and multiplayer. Players will have to keep one eye on their rearview mirror as friends will be able to enter and exit races on-the-fly, creating a world where no two events will ever be the same.', '139', 100, 'themes/images/products/23.jpg', 0),
(5219912755573, 'GAMES', 'Forza Horizon 2', 'THIS TITLE MAY REQUIRE ACCESS TO A BROADBAND INTERNET CONNECTION.\n\nRace through a massive wide-open world featuring dramatic weather and day-to-night cycles. Instantly connect with friends in the ultimate celebration of speed, style, and action-packed driving. Explore beautiful and exotic locations in more than 200 of the world\'s greatest cars, all created with precise detail in stunning 1080p.\nFeatures:\nExplore a Massive, Living Open World - A world of beauty and freedom awaits.\nThe next evolution of the best-in-class Forza graphics engine delivers full day and night cycle with spectacular weather, lighting, and visual effects.\nAn epic road trip career mode adapts to your car choices with hundreds of events across a beautiful and diverse European landscape.\nHowever you like to play, there is an endless variety of free-roam driving fun. Whether you\'re racing, hunting hidden treasures like exotic barn find cars, or showing off your customized rides at car meet locations spread across the world, the choice is yours.\nAction-Packed Driving - Take risks and earn rewards for showing off your driving skills and style.\nSmash through fences onto back country dirt trails, plow though fields of crops and dense forests, and discover new shortcuts on your thrilling, high- speed adventures.\nRace against aircraft and trains in thrilling Showcase events.\nMake your name at the Horizon Festival. Whether you\'re racing in traffic, catching huge air, or racking up skill points and combos with awesome stunts, your legacy begins here.\nInstantly Connect with Friends on Xbox One.\nJump between solo and online play instantly. No lobbies, no waiting.\nJoin friends online and free roam together, compete in races and team modes, or take part in fun co-op Bucket List challenges.\nJoin or create your own Car Club of up to 1000 members to expand your network of friends and rule the leaderboards.\nIn solo play, Drivatar technology fills your world with your friends even when they aren\'t online.\nYour Ultimate Car Fantasy - Drive more than 200 of the world\'s greatest cars.\nA diverse collection of amazing vehicles ranging from extreme off-roaders to modern supercars, classic muscle, and much more.\nEvery car and truck is recreated in obsessive detail, with full cockpit views, including functional windshield wipers, working headlights, and authentic interiors.\nThe Horizon Festival invites you to join its celebration of cars, music, freedom, and fun on the world\'s greatest roads. Get ready for the road trip of your life!', '1000', 82, 'themes/images/products/22.jpg', 0),
(5570493712682, 'GAMES', 'NBA Live 15', 'THIS TITLE MAY REQUIRE ACCESS TO A BROADBAND INTERNET CONNECTION.\n\nNBA LIVE 15 delivers a truly next-generation basketball experience, from visuals to gameplay and everything in between. Responding fan feedback, the title includes over 500 gameplay improvements, including improved responsiveness for shooting, dribbling, passing and more. Upgraded visuals and photo-realistic player models help the series look better than ever, and socially connected game modes provide rich, constantly updated content.', '620', 100, 'themes/images/products/10.jpg', 0),
(5666006290658, 'GAMES', 'Battlefield Hardline', 'THIS TITLE MAY REQUIRE ACCESS TO A BROADBAND INTERNET CONNECTION.\n\nLive out your cop and criminal fantasy in Battlefield Hardline. This action-packed blockbuster combines intense signature multiplayer moments of Battlefield with an emotionally charged story and setting reminiscent of a modern television crime drama. In a visceral single-player campaign you?ll play the role of Nick Mendoza, a young detective who embarks on a cross-country vendetta, seeking revenge against once trusted partners on the force. In multiplayer you?ll hunt criminals, raid vaults, and save hostages in new cop and criminal inspired modes like Heist and Rescue. \n\nPurchase Battlefield Hardline to receive 3 Gold Battlepacks that contain combinations of weapon accessories, patches and emblems, XP boosts, and character customization items. These Battlepacks are delivered once a week starting from your initial game activation.\n\nFeatures:\n\n- Battlefield Multiplayer: Featuring the strategic team play, variety, and immersion of Battlefield, set in a gritty and glamorous world of cops and criminals.\n\n- Visceral Singleplayer: From the award-winning studio that brought you Dead Space, Battlefield Hardline delivers an innovative and dramatic story presented in the style of a modern television crime drama.\n\n- Downtown Destruction: Shoot out the inside of a subterranean grow-lab, blow open a gleaming bank vault, or blast apart a Los Angeles car dealership. The wide array of urban environments is modern, sexy, and highly destructible.\n\n- Gadgets And Guns: Play with a full arsenal of military-grade weapons and fictionally inspired gadgets, such as sawed-off shotguns, stun guns, zip lines and grappling hooks. Gadgets can be used anywhere, on every map, making for chaotic and unpredictable combat.\n\n- Vehicular Mayhem: Fly across the map to reinforce your crew, turn enemies into fresh road kill, or blow past cops on a loot-laden motorcycle. Vehicle gameplay in Battlefield Hardline is fast, fresh and intense.', '359', 100, 'themes/images/products/13.jpg', 0),
(5911259990799, 'GAMES', 'Your Shape Fitness Evolved', 'The Whole Nine Yards - With 125 different workouts and 215 moves, Your Shape: Fitness Evolved 2013 delivers a massive array of activities.\nYour Personal Trainer - Create a personalized fitness program lasting up to four weeks, tailored to your current fitness level and preferences.\nGet Connected - With news feeds, online challenges, leaderboards, achievements, and friend competitions, Your Shape: Fitness Evolved 2013 sets a new technological standard in the Nintendo universe and leverages the unique features of the Wii U system.\nJoin the Calorie-Fighter Community - Connect with the established Your Shape Center website and broader Your Shape community.\nTechnology - Your Shape: Fitness Evolved 2013 continues in the tradition of the franchise by offering the best-in-class workout technology including progress tracking, motivating online features, HD graphics, and beautifully animated virtual coaches.', '282', 100, 'themes/images/products/9.jpg', 0),
(6160936170927, 'GAMES', 'Battlefield 4', 'THIS TITLE MAY REQUIRE ACCESS TO A BROADBAND INTERNET CONNECTION.\n\nBattlefield 4 is a seminal moment for the Battlefield series as more award-winning, multiplayer game design elements are incorporated into the single-player campaign. In single-player, gamers will experience huge environments, a playground of destruction, access to an arsenal of vehicles and the ability to direct squad mates. Taking a page from the social aspect of multiplayer gaming, the single-player mode will now track players? progress, adding an element of persistence and friendly competition to the campaign. ', '142', 100, 'themes/images/products/12.jpg', 0),
(6942949009123, 'ACCESSORIES', 'ORB PS4 Thumb Grips', 'Give yourself a gaming edge with these handy thumb grips that offer improved control and feel & also help to stop wear and tear on your PS4 controller.\r\n2 X Firm Rubber Grip Caps For Comfort\r\n2 X 4 Dot D-Pad Rubber Grip Caps For Comfort', '78', 100, 'themes/images/products/38.jpg', 0),
(6985722557795, 'GAMES', 'PlayStation AllStars Battle ', 'THIS TITLE MAY REQUIRE ACCESS TO A BROADBAND INTERNET CONNECTION.\r\n\r\nPlayStation All-Stars Battle Royale is free-for-all brawler showcasing the best and brightest of PlayStation\'s characters and worlds. From Kratos to Sly Cooper, Sweet Tooth to Parappa the Rapper, Sony characters from all over the gaming spectrum are brought together in a fighting adventure that\'s both easy to play, and hard to master. Take the battle online for competitive multiplayer action, or go head to head with a group of friends on the couch and prove once and for all who\'s really the best!', '256', 100, 'themes/images/products/17.jpg', 0),
(7317862658536, 'GAMES', 'Mario Kart', 'THIS TITLE MAY REQUIRE ACCESS TO A BROADBAND INTERNET CONNECTION.\n\nIt\'s time to race...with no wires attached! The acclaimed Mario Kart series has gone wireless, letting you race and battle locally with up to eight karts at once, regardless of whether everyone has a Game Card. Plus, play with up to three people around the world with Nintendo Wi-Fi Connection! An all-star cast that includes Mario, Luigi, Peach, Yoshi, Donkey Kong, Wario, Bowser and Toad rounds out a truly all-star lineup of more than 30 courses including new DS-exclusive creations and classics drawn from every Mario Kart game Features: Race up to seven other pals over local wireless with only a single game card via DS Download play Play over 30 courses, including classics from the original Super Mario Kart, Mario Kart 64, Mario Kart: Super Circuit, and Mario Kart: Double Dash Crazy items, frantic speed, and a new mission mode make this game a Mario Kart fan\'s dream.', '419', 100, 'themes/images/products/4.jpg', 0),
(7382317749068, 'GAMES', 'Transformers: Prime', 'THIS TITLE MAY REQUIRE ACCESS TO A BROADBAND INTERNET CONNECTION.\n\nHelp Optimus Prime and the Autobots join forces with human friends Jack, Miko and Raf to save the Earth from Megatron and his new secret weapon. Play as one of your favorite Autobot characters including Bumblebee and Bulkhead as you battle through unique vistas around the world to help defeat the Decepticons. Continue the battle against your friends in Multiplayer Mode with 11 playable characters.', '162', 100, 'themes/images/products/19.jpg', 0),
(7624435304705, 'GAMES', 'Mortal Kombat X', 'THIS TITLE MAY REQUIRE ACCESS TO A BROADBAND INTERNET CONNECTION.\n\nMortal Kombat X is NetherRealm Studios\' next highly anticipated installment in its legendary, critically acclaimed fighting game franchise that propels the iconic franchise into a new generation. The game combines cinematic presentation with all new gameplay to deliver the most brutal Kombat experience ever, offering a new fully-connected experience that launches players into a persistent online contest where every fight matters in a global battle for supremacy. For the first time, Mortal Kombat X gives players the ability to choose from multiple variations of each character impacting both strategy and fighting style. Players step into an original story showcasing some of the game\'s most prolific characters including Scorpion and Sub-Zero, while introducing new challengers that represent the forces of good and evil and tie the tale together. \nFeatures: \n- New and Classic Characters: Such as Scorpion, Sub-Zero, Raiden and Kano, as well as new characters such as Cassie Cage, Kotal Kahn, Ferra-Torr and D\'Vorah, the roster will include fan favorites where both good and evil must battle it out. \n- Character Variations: Mortal Kombat X offers three different versions for each playable character, all of which have their own fighting style, special moves, abilities and strategies. The Variation that players choose affects the style and overall strategy by which the game is played. \n- Epic Cinematic Storyline: A deep story mode continues up to 25 years after the events of 2011\'s Mortal Kombat and advances the dark tale, introducing new characters such as Cassie Cage, daughter of fan favorites Sonya Blade and Johnny Cage. \n- Visceral Kombat: Mortal Kombat X introduces the next evolution of fighting with the return of X-ray and Finishing Moves that showcase brutal battles like never before with enhanced graphics and animations.', '565', 100, 'themes/images/products/11.jpg', 0),
(8128136357204, 'GAMES', 'FIFA 15 ULTIMATE TEAM EDITIO', 'THIS TITLE MAY REQUIRE ACCESS TO A BROADBAND INTERNET CONNECTION.\n\nFIFA 15 brings soccer to life in stunning detail so fans can experience the emotion of the sport like never before. ? Witness the intensity of crowds and listen to commentators guide fans through the story of the game with Dynamic Match Presentation. New Emotional Intelligence allows players to react to opponents and teammates within context, and relative to the narrative of the match. ? Next Generation Visuals put fans on Living Pitches with grass that wears as the match progresses. Authentic Player Visuals give players true to life appearance. Player Control heightens the responsiveness of player movement and makes Man-to-Man Battles more rewarding than ever before. KEY FEATURES? Emotional Intelligence - For the first time ever, FIFA 15 models the emotions of all 22 players on the pitch, giving fans a chance to experience first-hand the attitudes and personalities of the world?s best soccer players during a match.? Dynamic Match Presentation - Match Day will feel more dynamic and alive than ever before ? immersing you in the match action and never taking you out of the moment. With region specific behaviors, crowds will now be distinguished by cheers and chants designated to their club, league, country, or continent.? Correct Contacts -   Physically Correct Contacts revolutionizes the way the soccer interacts with the players and their environment. Every dribble, touch, pass, shot, and deflection moves corresponding to the spin of the ball in relation to the position of the body part or object that it connects with ? this gives the soccer accurate spin, curl, and movement, as well as varied trajectories.? Man-to-Man Battles - Dispossessing your opponent in FIFA 15 is more rewarding and physical than ever before. Players use Full-Body Defending to win possession and keep it.', '793', 100, 'themes/images/products/6.jpg', 0),
(8747021962298, 'GAMES', 'The Sims 3: Seasons', 'THIS TITLE MAY REQUIRE ACCESS TO A BROADBAND INTERNET CONNECTION.\n\nThe Sims 3 Seasons offers players not only the opportunity to interact with weather, but also the ability to really get into the mood of each season and tell meaningful stories with their Sims. Since the launch of The Sims 3, Seasons has been one of the most highly-requested themes by our players. The seasonal changes in this game offer incredible realism, simulating nature in a way that is unprecedented for The Sims.  For the first time in The Sims PC/Mac franchise, players can take their Sims for a swim in the ocean, exploring a previously unreachable part of the world as they cool down on a hot summer day or take the polar bear plunge by venturing into wintry waters. Sims can also build skills by scoring a winning goal during a soccer shoot-out or catching some air on the half pipe during a snowboarding session.Whether taking a plunge from the diving board, setting off dazzling fireworks, carving a jack-o-lantern or building an intimate igloo, players will find an abundance of activities to keep them engaged throughout the year. Players will revel in the spirit of each season with unique seasonal celebrations and events that bring Sims together.  Sims can snuggle up with their crush and get crowned the king or queen of the spring dance, visit the face-painting booth at the summer festival, bob for apples beside a pumpkin patch at the fall festival or head to the snowball fight arena for an epic wintertime battle. The Sims 3 Seasons also introduces new food, fashions and d?cor items such as French fries, a tanning booth, mistletoe, umbrellas, snow boots and wetsuits, further enhancing the experience and fun of each season. In The Sims 3 Seasons, transformative weather effects will capture the beauty and power of nature, from blooming flowers and fresh spring rain to changing autumn leaves and snowstorms that will turn the world into a winter wonderland. Sims will react to the changes in climate and weather in surprising and hilarious ways, whether getting a zebra-striped tan, catching a cold or getting struck by lightning. Players who pre-order The Sims 3 Seasons Expansion Pack will receive the Limited Edition which includes the exclusive Ice Lounge community lot, a sleek social club that can be placed in any world from The Sims 3 and is available in all seasons. This all-new venue includes 12 brand new objects made entirely of ice that can be used to build out an elegant, icy abode.', '225', 100, 'themes/images/products/5.jpg', 0),
(8760351580593, 'GAMES', 'Exclusive: Assassin\'s Creed', 'THIS TITLE MAY REQUIRE ACCESS TO A BROADBAND INTERNET CONNECTION.\n\nThe first game in the Assassin?s Creed franchise is set in 1191 AD, when the Third Crusade was tearing the Holy Land apart. Shrouded in secrecy and feared for their ruthlessness, the Assassins intend to stop the hostilities by suppressing both sides of the conflict. Players, assuming the role of the main character Altair, will have the power to throw their immediate environment into chaos and to shape events during this pivotal moment in history.\n\nFeatures:\n\n-Be an Assassin Master the skills, tactics, and weapons of history?s deadliest and most secretive clan of warriors. Plan your attacks, strike without mercy, and fight your way to escape.\n\n- Realistic and responsive environments Experience a living, breathing world in which all your actions have consequences. Crowds react to your moves and will either help or hinder you on your quests.\n\n- Action with a new dimension, total freedom Eliminate your targets wherever, whenever, and however. Stalk your prey through richly detailed, historically accurate, open-ended environments. Scale buildings, mount horses, blend in with crowds. Do whatever it takes to achieve your objectives.\n\n- Relive the epic times of the Crusades Assassin?s Creed immerses you in the realistic and historical Holy Land of the 12th century, featuring life-like graphics, ambiance, and the subtle, yet detailed nuances of a living world.\n\n- Intense action rooted in reality Experience heavy action blended with fluid and precise animations. Use a wide range of medieval weapons, and face your enemies in realistic sword fight duels.\n\n- Next-gen gameplay The proprietary engine developed from the ground up for the next-gen console allows organic game design featuring open gameplay, intuitive control scheme, realistic interaction with environment, and a fluid, yet sharp, combat mechanic.', '99', 100, 'themes/images/products/14.jpg', 0),
(9149598163082, 'GAMES', 'Nike + Kinect Training', 'THIS TITLE MAY REQUIRE ACCESS TO A BROADBAND INTERNET CONNECTION.\n\nGet fitter, faster and stronger with Nike+ Kinect Training, a personalized training experience built from the ground up with athletic expertise and inspiration from Nike coupled with powerful and precise technology from Kinect for Xbox 360. Nike+ Kinect Training brings world-class Nike training directly into the home to help individuals meet their fitness goals and reach their personal best. Through the magic of Kinect, Nike+ Kinect Training can see how the body moves, assess physical strength and athleticism, identify areas for improvement, and create a personalized workout plan tailored to each person. With real-time feedback to make sure positions and movements are correct and a customized program that evolves over time, Nike+ Kinect Training is for everybody, whether a professional athlete, an everyday athlete or someone just getting started. With fitness assessments every four weeks and the ability to work out with friends over Xbox LIVE and tap into the Nike+ community, Nike+ Kinect Training helps athletes stay motivated every step of the way.1 Take training even further by competing in challenges, sending encouragement to friends and keeping workouts on track with a mobile companion app. ', '187', 100, 'themes/images/products/2.jpg', 0),
(9427274829730, 'GAMES', 'Tekken Tag Tournament 2', 'THIS TITLE MAY REQUIRE ACCESS TO A BROADBAND INTERNET CONNECTION.\n\nBringing the fight for the first time to a Nintendo home console, the legendary Tekken Tag Tournament delivers completely updated features and the most comprehensive Tekken experience to date.\nTekken Tag Tournament 2 delivers new and returning characters in the largest roster ever. Experience the most advanced attack mechanics, ultimate combo move sets and new battle modes. With innovative features to broaden Tekken consumer accessibility, unlimited fighter combinations and multiple ways to challenge your friends, it\'s time to get ready for the next battle.', '162', 100, 'themes/images/products/16.jpg', 0);
INSERT INTO `products` (`ProductID`, `ProductCat`, `ProductName`, `ProductDestription`, `Price`, `Quantity`, `PictureURL`, `Status`) VALUES
(9498391895827, 'GAMES', 'Rugby 15', 'THIS TITLE MAY REQUIRE ACCESS TO A BROADBAND INTERNET CONNECTION.\n\nRugby 15 will exclusively feature the official licences for the TOP 14 and PRO D2 professional rugby leagues. "With this new sport simulation we are pursuing our strategy of moving upmarket with strong licences and quality partnerships, as with HB Studios," declared Alain Falc, CEO of Bigben Interactive. "Today it gives us great pleasure to announce the very first rugby game on new generation consoles with the TOP 14 and the PRO D2, thanks to the support of the Ligue Nationale de Rugby (French Rugby Association). We are certain that fans of the sport will enjoy it!"', '288', 100, 'themes/images/products/8.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `EmailAddress` varchar(25) NOT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Role` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`EmailAddress`, `Password`, `Role`) VALUES
('ADMIN', '73acd9a5972130b75066c82595a1fae3', 'ADMIN'),
('aidenpage@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'CUSTOMER'),
('AleenaBanks@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'CUSTOMER'),
('andreapage@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'CUSTOMER'),
('andrepage@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'CUSTOMER'),
('AnnaHoward@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'CUSTOMER'),
('ashtonpage@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'CUSTOMER'),
('BarbaraHancock@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'CUSTOMER'),
('BostonHancock@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'CUSTOMER'),
('BrendanHensley@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'CUSTOMER'),
('CadenceLowery@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'CUSTOMER'),
('DanielDixon@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'CUSTOMER'),
('DavonMcdowell@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'CUSTOMER'),
('HanaWatson@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'CUSTOMER'),
('JasmineWhitaker@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'CUSTOMER'),
('JavierEllis@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'CUSTOMER'),
('JordenBowman@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'CUSTOMER'),
('KamilaCochran@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'CUSTOMER'),
('liampage@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'CUSTOMER'),
('MelvinWeiss@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'CUSTOMER'),
('MonicaWaters@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'CUSTOMER'),
('PhoenixDawson@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'CUSTOMER'),
('RandyAtkins@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'CUSTOMER'),
('RhiannaAndersen@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'CUSTOMER'),
('SalmaButler@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'CUSTOMER'),
('SaraGregory@gmail.com', '12345', 'CUSTOMER'),
('TheodoreJames@gmail.com', '12345', 'CUSTOMER'),
('VivianMiles@gmail.com', '12345', 'CUSTOMER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`AddressID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ContactID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`EmailAddress`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `AddressID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CartID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ContactID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` bigint(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE Database cluas;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');


DROP TABLE IF EXISTS `manager`;
CREATE TABLE IF NOT EXISTS `manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
);

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `username`, `password`) VALUES
(1, 'manager', 'manager');

--Staff Table
DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `staffId` varchar(11) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `LastName` varchar(25) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`staffId`)
);

--UseLog Table
DROP TABLE IF EXISTS `useLog`;
CREATE TABLE IF NOT EXISTS `useLog` (
  `clientId` varchar(20) NOT NULL,
  `clientName` varchar(25) NOT NULL,
  `time` time NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `duration` varchar(10) NOT NULL,
  PRIMARY KEY (`clientId`)
);

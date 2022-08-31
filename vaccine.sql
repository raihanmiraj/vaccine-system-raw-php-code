-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2022 at 06:23 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaccine`
--

-- --------------------------------------------------------

--
-- Table structure for table `booth`
--

CREATE TABLE `booth` (
  `id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `Floor` varchar(10) DEFAULT NULL,
  `Wing` varchar(10) DEFAULT NULL,
  `Section` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booth`
--

INSERT INTO `booth` (`id`, `hospital_id`, `city_id`, `Floor`, `Wing`, `Section`) VALUES
(15, 13, 1, '4th', '4', 's1'),
(16, 14, 2, '1st floor', 'LSB', 'S1'),
(17, 15, 4, '2nd ', 'jh', 'hh'),
(18, 16, 3, '2nd ', 'SF2', 'M2'),
(19, 17, 1, '3rd', 'kk', 'kk');

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `Certificate_no` varchar(100) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `NID` varchar(10) NOT NULL,
  `Sex` varchar(6) DEFAULT NULL,
  `Date_of_Birth` date DEFAULT NULL,
  `Address` varchar(30) DEFAULT NULL,
  `Pushed_Vaccine_Name` varchar(10) DEFAULT NULL,
  `Vaccination_Date` date DEFAULT NULL,
  `Date_of_Issuance_of_Certificate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`Certificate_no`, `Name`, `NID`, `Sex`, `Date_of_Birth`, `Address`, `Pushed_Vaccine_Name`, `Vaccination_Date`, `Date_of_Issuance_of_Certificate`) VALUES
('101', 'Anam', '6475825389', 'Male', '1999-07-13', 'Dhaka', 'OxfordAstr', '2021-09-10', '2021-09-11'),
('102', 'Fariha', '6459672652', 'Female', '1995-05-25', 'Dhaka', 'PfizerBioN', '2021-09-10', '2021-09-11'),
('103', 'Shoshi', '2545869361', 'Female', '1991-07-28', 'Dhaka', 'Moderna', '2021-09-10', '2021-09-11');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city_name` varchar(200) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `time`) VALUES
(1, 'Dhaka', '2021-09-20 18:22:03'),
(2, 'Cumilla', '2021-09-20 18:22:13'),
(3, 'Noakhali', '2021-09-21 18:00:00'),
(4, 'Chittagong', '2021-09-22 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `id` int(11) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `Hospital_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `city_id`, `Hospital_Name`) VALUES
(13, 1, 'ApoloHospital'),
(14, 2, 'Cumilla Medical College'),
(15, 4, 'Chittagong Medical College'),
(16, 3, 'Noakhali Medical College'),
(17, 1, 'Salimullah Hospital');

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `id` int(11) NOT NULL,
  `Nurse_Name` varchar(20) DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `hospital_id` int(11) DEFAULT NULL,
  `Nurse_NID` varchar(10) DEFAULT NULL,
  `nurse_pass` varchar(200) DEFAULT NULL,
  `Sex` varchar(6) DEFAULT NULL,
  `Date_of_Birth` date DEFAULT NULL,
  `Address` varchar(30) DEFAULT NULL,
  `Contact_Number` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`id`, `Nurse_Name`, `city_id`, `hospital_id`, `Nurse_NID`, `nurse_pass`, `Sex`, `Date_of_Birth`, `Address`, `Contact_Number`) VALUES
(13, 'Mahim', 1, 13, '12345', '12345', 'Female', '2021-09-03', 'mohammadpur', '12345'),
(14, 'Arian', 4, 15, '123', '123', 'Female', '2021-09-16', 'chittagong', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `provide_vaccine`
--

CREATE TABLE `provide_vaccine` (
  `id` int(11) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `hospital_id` int(11) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `ammount` int(11) DEFAULT NULL,
  `Distribution_Date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provide_vaccine`
--

INSERT INTO `provide_vaccine` (`id`, `city_id`, `hospital_id`, `vaccine_id`, `ammount`, `Distribution_Date`) VALUES
(7, 1, 13, 12, 200, '2021/09/22'),
(8, 1, 13, 18, 197, '2021/09/23'),
(9, 2, 14, 18, 800, '2021/09/23'),
(10, 2, 14, 12, 199, '2021/09/23'),
(11, 1, 13, 24, 200, '2021/09/23'),
(12, 4, 15, 18, 19, '2021/09/23'),
(13, 3, 16, 12, 100, '2021/09/24');

-- --------------------------------------------------------

--
-- Table structure for table `registered_person`
--

CREATE TABLE `registered_person` (
  `id` int(11) NOT NULL,
  `nid` varchar(10) NOT NULL,
  `Status` varchar(15) DEFAULT NULL,
  `Vaccination_Date` varchar(200) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `nurse_id` int(11) DEFAULT NULL,
  `vaccine_reg_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registered_person`
--

INSERT INTO `registered_person` (`id`, `nid`, `Status`, `Vaccination_Date`, `vaccine_id`, `nurse_id`, `vaccine_reg_id`) VALUES
(23, '123456', 'vaccinated', '2021/09/24', 18, 13, 28);

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `Vaccine_Reg_no` varchar(100) NOT NULL,
  `NID` varchar(10) DEFAULT NULL,
  `Date_and_Time` datetime DEFAULT NULL,
  `Hospital_Name` varchar(30) DEFAULT NULL,
  `Location` varchar(30) DEFAULT NULL,
  `Booth_no` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`Vaccine_Reg_no`, `NID`, `Date_and_Time`, `Hospital_Name`, `Location`, `Booth_no`) VALUES
('1', '6475825389', '2021-09-10 10:00:00', 'SquareHospital', 'Dhaka', '3'),
('2', '6459672652', '2021-09-10 10:00:00', 'ApolloHospital', 'Dhaka', '12'),
('3', '2545869361', '2021-09-10 10:00:00', 'LabaidHospital', 'Dhaka', '5'),
('4', '6597714589', '2021-09-10 10:00:00', 'KurmitolaGeneralHospital', 'Dhaka', '5'),
('5', '4684128402', '2021-09-10 10:00:00', 'KurmitolaGeneralHospital', 'Dhaka', '5');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `id` int(11) NOT NULL,
  `Vaccine_Name` varchar(10) NOT NULL,
  `Company_Name` varchar(20) NOT NULL,
  `Import_Date` date DEFAULT NULL,
  `Production_Date` date DEFAULT NULL,
  `Expiry_Date` date DEFAULT NULL,
  `Production_Country` varchar(60) DEFAULT NULL,
  `Amount_of_Vaccine_Stored` int(11) DEFAULT NULL,
  `Shipment_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`id`, `Vaccine_Name`, `Company_Name`, `Import_Date`, `Production_Date`, `Expiry_Date`, `Production_Country`, `Amount_of_Vaccine_Stored`, `Shipment_no`) VALUES
(12, 'Convidecia', 'CanSinoBiologics', '2021-06-28', '2021-06-02', '2023-06-02', 'China', 700, 1),
(13, 'CoronaVac', 'SinovacBiotech', '2021-04-23', '2021-01-31', '2023-01-31', 'China', 1599900, 1),
(14, 'Covaxin', 'BharatBiotech', '2021-05-23', '2021-04-16', '2023-04-16', 'India', 1300000, 1),
(15, 'CoviVac', 'RussianAcademyofScie', '2021-08-30', '2021-08-09', '2023-08-09', 'Russia', 1500000, 1),
(16, 'EpiVacCoro', 'VectorInstitute', '2021-07-07', '2021-05-09', '2023-05-09', 'Russia', 1200000, 1),
(17, 'Janssen', 'JanssenPharmaceutica', '2021-01-23', '2020-12-29', '2022-12-29', 'Netherlands', 100000, 1),
(18, 'Moderna', 'Moderna', '2021-01-23', '2021-01-10', '2023-01-10', 'UnitedNations', 1098980, 1),
(19, 'OxfordAstr', 'AstraZeneca', '2021-01-23', '2021-01-03', '2023-01-03', 'UnitedKingdom', 1000000, 1),
(20, 'PfizerBioN', 'PfizerBioNTech', '2021-01-23', '2020-11-16', '2022-11-16', 'Germany', 1200000, 1),
(21, 'SinopharmB', 'Sinopharm', '2021-03-24', '2021-02-05', '2023-02-05', 'China', 1500000, 1),
(22, 'SputnikV', 'Gamaleya', '2021-04-23', '2021-02-12', '2023-02-12', 'Russia', 1700000, 1),
(24, 'Lorem', 'Lorem', '2021-09-07', '2021-09-22', '2021-09-23', 'Bangladesh', 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_registration`
--

CREATE TABLE `vaccine_registration` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `NID` varchar(10) NOT NULL,
  `Contact_Number` varchar(11) DEFAULT NULL,
  `Sex` varchar(6) DEFAULT NULL,
  `Date_of_Birth` date DEFAULT NULL,
  `Occupation` varchar(15) DEFAULT NULL,
  `Info_on_Past_Deseases` varchar(30) DEFAULT NULL,
  `Present_Address` varchar(30) DEFAULT NULL,
  `hospital_id` int(11) NOT NULL,
  `booth_no` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `From_where_willing_to_get_Vaccinated` varchar(30) DEFAULT NULL,
  `Registration_Date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccine_registration`
--

INSERT INTO `vaccine_registration` (`id`, `user_id`, `Name`, `NID`, `Contact_Number`, `Sex`, `Date_of_Birth`, `Occupation`, `Info_on_Past_Deseases`, `Present_Address`, `hospital_id`, `booth_no`, `city_id`, `From_where_willing_to_get_Vaccinated`, `Registration_Date`) VALUES
(28, 0, 'Raihan', '123456', '123456', 'Male', '2021-09-15', 'student', '', 'Mohammadpur', 13, 15, 1, NULL, '2021/09/24');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_system_administrator`
--

CREATE TABLE `vaccine_system_administrator` (
  `id` int(11) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `NID` varchar(19) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccine_system_administrator`
--

INSERT INTO `vaccine_system_administrator` (`id`, `Name`, `NID`, `username`, `password`) VALUES
(1, 'Jarvis', '5375917365', 'test', '12345'),
(2, 'Karen', '2559571536', 'itskaren', '815493'),
(3, 'Edith', '8254715165', 'thisisedith', '462947'),
(8, 'Raihan Miraj', '789456', 'raihanmiraj', '789456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booth`
--
ALTER TABLE `booth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`Certificate_no`,`NID`),
  ADD UNIQUE KEY `NID` (`NID`),
  ADD UNIQUE KEY `Pushed_Vaccine_Name` (`Pushed_Vaccine_Name`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provide_vaccine`
--
ALTER TABLE `provide_vaccine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered_person`
--
ALTER TABLE `registered_person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`Vaccine_Reg_no`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccine_registration`
--
ALTER TABLE `vaccine_registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Contact_Number` (`Contact_Number`);

--
-- Indexes for table `vaccine_system_administrator`
--
ALTER TABLE `vaccine_system_administrator`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `NID` (`NID`),
  ADD UNIQUE KEY `Username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booth`
--
ALTER TABLE `booth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `provide_vaccine`
--
ALTER TABLE `provide_vaccine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `registered_person`
--
ALTER TABLE `registered_person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `vaccine_registration`
--
ALTER TABLE `vaccine_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `vaccine_system_administrator`
--
ALTER TABLE `vaccine_system_administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `certificate`
--
ALTER TABLE `certificate`
  ADD CONSTRAINT `certificate_ibfk_1` FOREIGN KEY (`NID`) REFERENCES `vaccine_registration` (`NID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

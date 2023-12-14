CREATE DATABASE employee_db;
USE employee_db;

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(30) NOT NULL,
  `full_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `full_name`) VALUES
(1, 'admin1', 'admin123', 'Michael Lariosa'),
(2, 'admin2', 'johnny', 'John Doe'),
(3, 'admin3', 'aragorn', 'Aram Muncal');

-- --------------------------------------------------------

--
-- Table structure for table `atlog`
--

CREATE TABLE `atlog` (
  `atlog_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `atlog_DATE` date DEFAULT NULL,
  `am_in` time DEFAULT NULL,
  `am_out` time DEFAULT NULL,
  `pm_in` time DEFAULT NULL,
  `pm_out` time DEFAULT NULL,
  `am_late` VARCHAR(3) DEFAULT NULL,
  `am_underTIME` VARCHAR(3) DEFAULT NULL,
  `pm_late` VARCHAR(3) DEFAULT NULL,
  `pm_underTIME` VARCHAR(3) DEFAULT NULL,
  `night_differential` decimal(3,2) DEFAULT NULL,
  `overtime` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `atlog`
--

INSERT INTO `atlog` (`atlog_id`, `emp_id`, `atlog_DATE`, `am_in`, `am_out`, `pm_in`, `pm_out`, `am_late`, `am_underTIME`, `pm_late`, `pm_underTIME`, `night_differential`, `overtime`) VALUES
(10, 8, '2023-12-14', '08:30:00', '11:30:00', '13:30:00', '04:59:00', 0, 0, 0, 0, 0.00, 0),
(11, 9, '2023-12-14', '08:30:00', '11:30:00', '13:30:00', '04:59:00', 0, 0, 0, 0, 0.00, 0),
(12, 12, '2023-12-14', '08:30:00', '11:30:00', '13:30:00', '04:59:00', 0, 0, 0, 0, 0.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `password` varchar(30) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `zip` varchar(4) DEFAULT NULL,
  `contact_number` varchar(11) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `contract` varchar(50) NOT NULL,
  `shift` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `password`, `first_name`, `middle_name`, `last_name`, `address`, `zip`, `contact_number`, `email_address`, `contract`, `shift`) VALUES
(8, '1234', 'Daniela', 'M.', 'Cantillo', 'Labnig, Malinao, Albay', '2311', '09669517555', 'danielamarzan.cantillo@bicol-u.edu.ph', 'Part Time', 'Afternoon Shift'),
(9, '1234', 'Dee', 'Monde', 'Razon', 'Sagpon, Daraga, Albay', '3434', '09468381717', 'dee@outlook.com', 'Full Time', 'Night Shift'),
(10, '1234', 'Minzy', 'Grado', 'Mendez', 'Zone 4 Bantayan, Tabaco City, Albay', '1232', '09135902471', 'minzy19@gmail.com', 'Part Time', 'Morning Shift'),
(11, '1234', 'Alex', 'MIddle', 'Mendez', 'Zone 4 Bantayan, Tabaco City, Albay', '1232', '09135902471', 'minzy19@gmail.com', 'Full Time', 'Night Shift'),
(12, '1234', 'Dawn', 'Cruz', 'Bande', '1231 Harong Pagkamoot, Magapo, Albay', '1234', '09562849189', 'dawnbc@gmail.com', 'Full Time', 'Day Shift');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `atlog`
--
ALTER TABLE `atlog`
  ADD PRIMARY KEY (`atlog_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `atlog`
--
ALTER TABLE `atlog`
  MODIFY `atlog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `atlog`
--
ALTER TABLE `atlog`
  ADD CONSTRAINT `atlog_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);


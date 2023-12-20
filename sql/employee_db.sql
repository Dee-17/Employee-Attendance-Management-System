CREATE DATABASE employee_db;
USE employee_db;

--
-- Table structure for table `admin`
--

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
(1, 'admin1', 'admin123', 'Michael Lero'),
(2, 'admin2', 'admin123', 'John Doe'),
(3, 'admin3', 'admin123', 'Aram Muncal'),
(4, 'admin4', 'adminpass1', 'James Bond'),
(5, 'admin5', 'adminpass2', 'Ken Kane'),
(6, 'admin6', 'adminpass3', 'Miranda Kerr'),
(7, 'admin7', 'adminpass4', 'Kim Mira');

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
  `am_late` varchar(3) DEFAULT NULL,
  `am_underTIME` varchar(3) DEFAULT NULL,
  `pm_late` varchar(3) DEFAULT NULL,
  `pm_underTIME` varchar(3) DEFAULT NULL,
  `overtime` time DEFAULT NULL,
  `work_hour` time NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `atlog`
--

INSERT INTO `atlog` (`atlog_id`, `emp_id`, `atlog_DATE`, `am_in`, `am_out`, `pm_in`, `pm_out`, `am_late`, `am_underTIME`, `pm_late`, `pm_underTIME`, `overtime`, `work_hour`, `status`) VALUES
(1, 14, '2023-07-11', '09:15:00', '12:45:00', '13:45:00', '17:45:00', 'YES', 'NO', 'NO', 'NO', '00:00:00', '07:30:00', 'Offline'),
(2, 15, '2023-07-14', '09:15:00', '12:45:00', '16:30:00', '20:45:00', 'NO', 'NO', 'YES', 'NO', '00:00:00', '04:15:00', 'Offline'),
(3, 4, '2023-07-19', '09:15:00', '12:30:00', NULL, NULL, 'YES', 'NO', 'NO', 'NO', '00:00:00', '07:15:00', 'Offline'),
(4, 5, '2023-07-09', NULL, NULL, '13:45:00', '17:45:00', 'YES', 'NO', 'NO', 'NO', '00:00:00', '07:15:00', 'Offline'),
(5, 10, '2023-08-11', NULL, NULL, '13:30:00', '17:30:00', 'YES', 'NO', 'NO', 'NO', '00:00:00', '08:00:00', 'Offline'),
(6, 11, '2023-08-15', '09:15:00', '12:45:00', NULL, NULL, 'YES', 'NO', 'NO', 'NO', '00:00:00', '07:30:00', 'Offline'),
(7, 12, '2023-08-12', NULL, NULL, '13:00:00', '15:00:00', 'YES', 'NO', 'NO', 'NO', '00:00:00', '03:00:00', 'Offline'),
(8, 13, '2023-08-13', '08:45:00', '12:15:00', '13:00:00', '15:00:00', 'YES', 'NO', 'NO', 'NO', '00:00:00', '03:30:00', 'Offline'),
(9, 14, '2023-08-17', '08:45:00', '12:15:00', '04:30:00', '04:45:00', 'NO', 'NO', 'NO', 'YES', '00:00:00', '00:15:00', 'Offline'),
(10, 15, '2023-08-18', '07:45:00', '12:15:00', '13:15:00', '17:15:00', 'NO', 'NO', 'NO', 'NO', '00:00:00', '08:30:00', 'Offline'),
(11, 13, '2023-08-18', '09:15:00', '12:30:00', '13:30:00', '17:30:00', 'YES', 'NO', 'NO', 'NO', '00:00:00', '07:15:00', 'Offline'),
(12, 14, '2023-08-18', '08:45:00', '12:15:00', '13:15:00', '17:15:00', 'YES', 'NO', 'NO', 'NO', '00:00:00', '07:30:00', 'Offline'),
(13, 5, '2023-08-18', NULL, NULL, '04:30:00', '04:45:00', 'NO', 'NO', 'NO', 'YES', '00:00:00', '00:15:00', 'Offline'),
(14, 13, '2023-09-14', '09:15:00', '12:30:00', '13:30:00', '17:30:00', 'YES', 'NO', 'NO', 'NO', '00:00:00', '07:15:00', 'Offline'),
(15, 14, '2023-09-13', '08:45:00', '12:15:00', '13:15:00', '17:15:00', 'YES', 'NO', 'NO', 'NO', '00:00:00', '07:30:00', 'Offline'),
(16, 10, '2023-09-15', NULL, NULL, '13:30:00', '17:30:00', 'YES', 'NO', 'NO', 'NO', '00:00:00', '08:00:00', 'Offline'),
(17, 11, '2023-09-20', '09:15:00', '12:45:00', NULL, NULL, 'YES', 'NO', 'NO', 'NO', '00:00:00', '07:30:00', 'Offline'),
(18, 12, '2023-09-25', NULL, NULL, '13:00:00', '20:00:00', 'YES', 'NO', 'NO', 'NO', '00:00:00', '03:00:00', 'Offline'),
(19, 13, '2023-09-30', '08:45:00', '12:15:00', '13:00:00', '20:00:00', 'YES', 'NO', 'NO', 'NO', '00:00:00', '03:30:00', 'Offline'),
(20, 14, '2023-10-05', '08:45:00', '12:15:00', '04:30:00', '04:45:00', 'NO', 'NO', 'NO', 'YES', '00:00:00', '00:15:00', 'Offline'),
(21, 15, '2023-10-10', '08:30:00', '12:30:00', '13:30:00', '17:30:00', 'YES', 'NO', 'NO', 'NO', '00:00:00', '08:00:00', 'Offline'),
(22, 16, '2023-10-15', '09:15:00', '12:45:00', NULL, NULL, 'YES', 'NO', 'NO', 'NO', '00:00:00', '07:30:00', 'Offline'),
(23, 17, '2023-10-20', NULL, NULL, '13:00:00', '16:00:00', 'YES', 'NO', 'NO', 'NO', '00:00:00', '03:00:00', 'Offline'),
(24, 18, '2023-10-25', '08:45:00', '12:15:00', NULL, NULL, 'YES', 'NO', 'NO', 'NO', '00:00:00', '03:30:00', 'Offline'),
(25, 1, '2023-10-30', '08:45:00', '12:15:00', NULL, NULL, 'NO', 'NO', 'NO', 'YES', '00:00:00', '00:15:00', 'Offline'),
(26, 14, '2023-12-10', '08:30:00', '12:30:00', '13:30:00', '17:30:00', 'YES', 'NO', 'NO', 'NO', '00:00:00', '08:00:00', 'Offline'),
(27, 4, '2023-12-12', '09:00:00', '12:00:00', NULL, NULL, 'YES', 'NO', 'NO', 'NO', '00:00:00', '03:00:00', 'Offline'),
(28, 5, '2023-12-13', NULL, NULL, '12:30:00', '13:30:00', 'NO', 'NO', 'NO', 'NO', '01:30:00', '07:30:00', 'Offline'),
(29, 11, '2023-12-15', '08:45:00', '16:00:00', NULL, NULL, 'YES', 'NO', 'NO', 'NO', '01:15:00', '07:15:00', 'Offline'),
(30, 12, '2023-11-01', NULL, NULL, '14:15:00', '16:30:00', 'NO', 'NO', 'NO', 'NO', '00:00:00', '05:15:00', 'Offline'),
(31, 15, '2023-11-03', '08:00:00', '12:00:00', '13:32:00', '21:45:00', 'NO', 'NO', 'NO', 'NO', '00:00:00', '05:15:00', 'Offline'),
(32, 5, '2023-11-11', NULL, NULL, '13:30:00', '18:45:00', 'NO', 'NO', 'NO', 'YES', '00:00:00', '00:15:00', 'Offline'),
(33, 16, '2023-11-12', NULL, NULL, '13:00:00', '17:00:00', 'NO', 'NO', 'NO', 'NO', '00:00:00', '08:00:00', 'Offline'),
(34, 6, '2023-11-19', '09:30:00', '12:45:00', NULL, NULL, 'YES', 'NO', 'NO', 'NO', '00:00:00', '03:15:00', 'Offline'),
(35, 19, '2023-11-21', '10:15:30', '10:17:11', NULL, NULL, 'YES', 'YES', 'NO', 'NO', '00:00:00', '00:01:41', 'Offline'),
(36, 1, '2023-11-28', '07:01:46', '12:02:08', NULL, NULL, 'YES', 'NO', 'YES', 'NO', '00:00:00', '00:00:23', 'Offline'),
(37, 12, '2023-12-17', NULL, NULL, '13:30:00', '18:45:00', 'NO', 'NO', 'NO', 'NO', '00:00:00', '05:15:00', 'Offline'),
(38, 15, '2023-12-18', '07:15:00', '12:30:00', '13:32:00', '21:45:00', 'NO', 'NO', 'NO', 'NO', '00:00:00', '05:15:00', 'Offline'),
(39, 5, '2023-12-18', NULL, NULL, '13:30:00', '18:45:00', 'NO', 'NO', 'NO', 'YES', '00:00:00', '00:15:00', 'Offline'),
(40, 16, '2023-12-19', '08:00:00', '12:00:00', NULL, NULL, 'NO', 'NO', 'NO', 'NO', '00:00:00', '08:00:00', 'Offline'),
(41, 6, '2023-12-19', '09:30:00', '12:45:00', NULL, NULL, 'YES', 'NO', 'NO', 'NO', '00:00:00', '03:15:00', 'Offline'),
(42, 19, '2023-12-19', '10:15:30', '10:17:11', NULL, NULL, 'YES', 'YES', 'NO', 'NO', '00:00:00', '00:01:41', 'Offline'),
(43, 1, '2023-12-19', '07:01:46', '12:02:08', '1:02:10', '20:02:11', 'YES', 'NO', 'YES', 'NO', '00:00:00', '00:00:23', 'Offline'),
(44, 17, '2023-12-20', NULL, NULL, '13:30:00', '18:45:00', 'NO', 'NO', 'NO', 'NO', '00:00:00', '05:15:00', 'Offline'),
(45, 18, '2023-12-20', '09:15:00', '14:30:00', NULL, NULL, 'YES', 'NO', 'NO', 'NO', '00:00:00', '07:15:00', 'Offline'),
(46, 19, '2023-12-20', '08:45:00', '12:15:00', NULL, NULL, 'YES', 'NO', 'NO', 'NO', '00:00:00', '07:30:00', 'Offline'),
(47, 13, '2023-12-20', '08:00:00', '12:00:00', '13:00:00', '17:00:00', 'NO', 'NO', 'NO', 'NO', '00:00:00', '08:00:00', 'Offline'),
(48, 14, '2023-12-20', '09:15:00', '12:30:00', '13:30:00', '20:30:00', 'YES', 'NO', 'NO', 'NO', '00:00:00', '07:15:00', 'Offline'),
(49, 20, '2023-12-20', '09:30:00', '12:45:00', NULL, NULL, 'YES', 'NO', 'NO', 'NO', '00:00:00', '03:15:00', 'Offline'),
(50, 6, '2023-12-20', '09:30:00', '12:45:00', NULL, NULL, 'YES', 'NO', 'NO', 'NO', '00:00:00', '03:15:00', 'Offline'),
(51, 23, '2023-12-20', '09:30:00', '12:45:00', '13:45:00', '21:45:00', 'YES', 'NO', 'NO', 'NO', '00:00:00', '07:15:00', 'Offline'),
(52, 10, '2023-12-20', NULL, NULL, '04:15:00', '04:30:00', 'NO', 'NO', 'NO', 'YES', '00:00:00', '00:15:00', 'Offline'),
(54, 15, '2023-12-20', '09:15:00', '12:45:00', '13:45:00', '20:45:00', 'YES', 'NO', 'NO', 'NO', '00:00:00', '07:30:00', 'Offline'),
(55, 4, '2023-12-20', '09:00:00', '12:00:00', NULL, NULL, 'YES', 'NO', 'NO', 'NO', '00:00:00', '03:00:00', 'Offline');

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
(1, 'password1', 'Daniela', 'M.', 'Cantillo', 'Labnig, Malinao, Albay', '2311', '09669517555', 'danielamarzan.cantillo@bicol-u.edu.ph', 'Part Time', 'Morning Shift'),
(2, 'password2', 'Misty Shaine', 'Sambajon', 'Niones', 'Daraga, Albay', '1234', '09562849189', 'mistyshainesambajon.niones@bicol-u.edu.ph', 'Part Time', 'Morning Shift'),
(3, 'password3', 'Joseph', 'Borlagdatan', 'Riosa', 'Bangkilingan, Tabaco City, Albay', '1234', '09562849189', 'josephborlagdatan.risoa@bicol-u.edu.ph', 'Part Time', 'Morning Shift'),
(4, 'password4', 'Guirald Malone', 'Espaldon', 'Escober', 'Gubat, Sorsogon', '1234', '09562849189', 'guiraldmaloneespaldon.escober@bicol-u.edu.ph', 'Part Time', 'Morning Shift'),
(5, 'password5', 'William', 'James', 'Brown', '202 Elm St', '7890', '09669517556', 'william.brown@example.com', 'Part Time', 'Afternoon Shift'),
(6, 'password6', 'Olivia', 'Rose', 'Anderson', '303 Cedar St', '1234', '09669517557', 'olivia.anderson@example.com', 'Part Time', 'Morning Shift'),
(7, 'password7', 'Sophia', 'Rae', 'Miller', '404 Walnut St', '5678', '09669517558', 'sophia.miller@example.com', 'Full Time', 'Day Shift'),
(8, 'password8', 'Ethan', 'Thomas', 'Davis', '505 Pine St', '9012', '09669517559', 'ethan.davis@example.com', 'Full Time', 'Day Shift'),
(9, 'password9', 'Ava', 'Marie', 'Martinez', '606 Oak St', '1234', '09669517560', 'ava.martinez@example.com', 'Full Time', 'Day Shift'),
(10, 'password10', 'Noah', 'Alexander', 'Hernandez', '707 Cedar St', '3456', '09669517561', 'noah.hernandez@example.com', 'Part Time', 'Afternoon Shift'),
(11, 'password11', 'Mia', 'Isabella', 'Lopez', '808 Elm St', '7890', '09669517562', 'mia.lopez@example.com', 'Part Time', 'Morning Shift'),
(12, 'password12', 'Lucas', 'Daniel', 'Garcia', '909 Maple St', '1234', '09669517563', 'lucas.garcia@example.com', 'Part Time', 'Afternoon Shift'),
(13, 'password13', 'Emma', 'Grace', 'Wright', '101 Pine St', '5678', '09669517564', 'emma.wright@example.com', 'Full Time', 'Day Shift'),
(14, 'password14', 'Carter', 'Joseph', 'Taylor', '202 Cedar St', '9012', '09669517565', 'carter.taylor@example.com', 'Full Time', 'Day Shift'),
(15, 'password15', 'Isabella', 'Grace', 'Clark', '303 Elm St', '1234', '09669517566', 'isabella.clark@example.com', 'Full Time', 'Day Shift'),
(16, 'password16', 'Mason', 'Michael', 'Hernandez', '404 Oak St', '3456', '09669517567', 'mason.hernandez@example.com', 'Part Time', 'Morning Shift'),
(17, 'password17', 'Aria', 'Madison', 'Johnson', '505 Maple St', '7890', '09669517568', 'aria.johnson@example.com', 'Part Time', 'Afternoon Shift'),
(18, 'password18', 'Liam', 'Daniel', 'Moore', '606 Walnut St', '1234', '09669517569', 'liam.moore@example.com', 'Part Time', 'Morning Shift'),
(19, 'password21', 'Dee', 'Razon', 'Mendez', 'Canaway, Tabaco City', '4513', '09777892344', 'dee@outlook.com', 'Part Time', 'Morning Shift'),
(20, 'password22', 'Minzy', 'Grado', 'Mendez', 'Zone 4 Bantayan, Tabaco City, Albay', '1232', '09135902471', 'minzy19@gmail.com', 'Part Time', 'Morning Shift'),
(21, 'password23', 'John', 'Doe', 'Smith', '123 Main St', '1234', '09669517552', 'john.doe@example.com', 'Part Time', 'Afternoon Shift'),
(22, 'password24', 'Jane', 'Lee', 'Johnson', '456 Oak St', '5678', '09669517553', 'jane.johnson@example.com', 'Full Time', 'Day Shift'),
(23, 'password25', 'Michael', 'A.', 'Williams', '789 Pine St', '9012', '09669517554', 'michael.williams@example.com', 'Full Time', 'Day Shift'),
(24, 'password26', 'Emma', 'Grace', 'Taylor', '101 Maple St', '3456', '09669517555', 'emma.taylor@example.com', 'Part Time', 'Morning Shift');


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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `atlog`
--
ALTER TABLE `atlog`
  MODIFY `atlog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `atlog`
--
ALTER TABLE `atlog`
  ADD CONSTRAINT `atlog_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);


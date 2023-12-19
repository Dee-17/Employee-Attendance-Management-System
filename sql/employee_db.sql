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
(3, 'admin3', 'aragorn', 'Aram Muncal'),
(4, 'admin4', 'adminpass1', 'Admin One'),
(5, 'admin5', 'adminpass2', 'Admin Two'),
(6, 'admin6', 'adminpass3', 'Admin Three'),
(7, 'admin7', 'adminpass4', 'Admin Four');

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
(1, 14, '2023-12-17', '08:30:00', '12:30:00', '13:30:00', '17:30:00', '0', '0', '0', '0', '01:30:00', '08:00:00', 'Offline'),
(2, 15, '2023-12-17', '09:15:00', '12:45:00', '13:45:00', '17:45:00', '0', '0', '0', '0', '00:15:00', '08:30:00', 'Offline'),
(3, 4, '2023-12-17', '09:00:00', '12:00:00', NULL, NULL, '0', '0', 'NO', 'NO', '01:00:00', '03:00:00', 'Offline'),
(4, 5, '2023-12-17', '07:45:00', '15:15:00', NULL, NULL, '0', '0', 'NO', 'NO', '01:30:00', '03:30:00', 'Offline'),
(5, 10, '2023-12-17', NULL, NULL, '16:30:00', '20:45:00', 'NO', 'NO', 'NO', 'NO', '00:15:00', '00:15:00', 'Offline'),
(6, 11, '2023-12-17', '08:45:00', '16:00:00', NULL, NULL, 'NO', 'NO', 'NO', 'NO', '00:15:00', '00:15:00', 'Offline'),
(7, 12, '2023-12-17', '07:15:00', '12:30:00', NULL, NULL, 'NO', 'NO', 'NO', 'NO', '00:15:00', '00:15:00', 'Offline'),
(8, 15, '2023-12-18', NULL, NULL, '13:30:00', '18:45:00', 'NO', 'NO', 'NO', 'NO', '00:15:00', '00:15:00', 'Offline'),
(9, 13, '2023-12-18', '09:15:00', '12:30:00', '13:30:00', '17:30:00', '0', '0', '0', '0', '00:30:00', '08:15:00', 'Offline'),
(10, 14, '2023-12-18', '08:45:00', '12:15:00', '13:15:00', '17:15:00', '0', '0', '0', '0', '01:30:00', '08:30:00', 'Offline'),
(11, 15, '2023-12-18', NULL, NULL, '14:30:00', '14:45:00', 'NO', 'NO', 'NO', 'NO', '00:15:00', '00:15:00', 'Offline'),
(12, 16, '2023-12-19', '08:00:00', '12:00:00', '13:00:00', '17:00:00', '0', '0', '0', '0', '01:00:00', '08:00:00', 'Offline'),
(13, 13, '2023-12-19', '09:15:00', '12:30:00', '13:30:00', '17:30:00', '0', '0', '0', '0', '00:30:00', '08:15:00', 'Offline'),
(14, 13, '2023-12-19', '09:15:00', '12:30:00', '13:30:00', '17:30:00', '0', '0', '0', '0', '00:30:00', '08:15:00', 'Offline'),
(15, 16, '2023-12-19', '09:00:00', '12:00:00', '13:00:00', '17:00:00', '0', '0', '0', '0', '01:00:00', '08:00:00', 'Offline'),
(16, 6, '2023-12-19', '09:30:00', '12:45:00', NULL, NULL, '0', '0', 'NO', 'NO', '00:15:00', '03:15:00', 'Offline'),
(17, 17, '2023-12-18', '09:30:00', '12:45:00', '13:45:00', '17:45:00', '0', '0', '0', '0', '00:15:00', '08:15:00', 'Offline'),
(18, 18, '2023-12-18', NULL, NULL, '04:15:00', '04:30:00', 'NO', 'NO', 'NO', 'NO', '00:15:00', '00:15:00', 'Offline'),
(19, 14, '2023-12-18', '07:45:00', '12:15:00', '13:15:00', '17:15:00', '0', '0', '0', '0', '01:30:00', '08:30:00', 'Offline');

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
(1, 'password1', 'John', 'Doe', 'Smith', '123 Main St', '1234', '555-1234', 'john.doe@example.com', 'Full Time', 'Day Shift'),
(2, 'password2', 'Jane', 'Lee', 'Johnson', '456 Oak St', '5678', '555-5678', 'jane.johnson@example.com', 'Full Time', 'Day Shift'),
(3, 'password3', 'Michael', 'A.', 'Williams', '789 Pine St', '9012', '555-9012', 'michael.williams@example.com', 'Full Time', 'Day Shift'),
(4, 'password4', 'Emma', 'Grace', 'Taylor', '101 Maple St', '3456', '555-3456', 'emma.taylor@example.com', 'Part Time', 'Morning Shift'),
(5, 'password5', 'William', 'James', 'Brown', '202 Elm St', '7890', '555-7890', 'william.brown@example.com', 'Part Time', 'Afternoon Shift'),
(6, 'password6', 'Olivia', 'Rose', 'Anderson', '303 Cedar St', '1234', '555-1234', 'olivia.anderson@example.com', 'Part Time', 'Morning Shift'),
(7, 'password7', 'Sophia', 'Rae', 'Miller', '404 Walnut St', '5678', '555-5678', 'sophia.miller@example.com', 'Full Time', 'Day Shift'),
(8, 'password8', 'Ethan', 'Thomas', 'Davis', '505 Pine St', '9012', '555-9012', 'ethan.davis@example.com', 'Full Time', 'Day Shift'),
(9, 'password9', 'Ava', 'Marie', 'Martinez', '606 Oak St', '1234', '555-1234', 'ava.martinez@example.com', 'Full Time', 'Day Shift'),
(10, 'password10', 'Noah', 'Alexander', 'Hernandez', '707 Cedar St', '3456', '555-3456', 'noah.hernandez@example.com', 'Part Time', 'Afternoon Shift'),
(11, 'password11', 'Mia', 'Isabella', 'Lopez', '808 Elm St', '7890', '555-7890', 'mia.lopez@example.com', 'Part Time', 'Morning Shift'),
(12, 'password12', 'Lucas', 'Daniel', 'Garcia', '909 Maple St', '1234', '555-1234', 'lucas.garcia@example.com', 'Part Time', 'Afternoon Shift'),
(13, 'password13', 'Emma', 'Grace', 'Wright', '101 Pine St', '5678', '555-5678', 'emma.wright@example.com', 'Full Time', 'Day Shift'),
(14, 'password14', 'Carter', 'Joseph', 'Taylor', '202 Cedar St', '9012', '555-9012', 'carter.taylor@example.com', 'Full Time', 'Day Shift'),
(15, 'password15', 'Isabella', 'Grace', 'Clark', '303 Elm St', '1234', '555-1234', 'isabella.clark@example.com', 'Full Time', 'Day Shift'),
(16, 'password16', 'Mason', 'Michael', 'Hernandez', '404 Oak St', '3456', '555-3456', 'mason.hernandez@example.com', 'Part Time', 'Morning Shift'),
(17, 'password17', 'Aria', 'Madison', 'Johnson', '505 Maple St', '7890', '555-7890', 'aria.johnson@example.com', 'Part Time', 'Afternoon Shift'),
(18, 'password18', 'Liam', 'Daniel', 'Moore', '606 Walnut St', '1234', '555-1234', 'liam.moore@example.com', 'Part Time', 'Morning Shift');

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
  MODIFY `atlog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `atlog`
--
ALTER TABLE `atlog`
  ADD CONSTRAINT `atlog_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);
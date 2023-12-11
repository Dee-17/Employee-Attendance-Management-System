CREATE DATABASE employee_db;

USE employee_db;

CREATE TABLE admin(
    admin_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(25) NOT NULL,
    password VARCHAR(30) NOT NULL,
    full_name VARCHAR(30) NOT NULL
);

CREATE TABLE employee(
    emp_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(25) NOT NULL,
    password VARCHAR(30) NOT NULL,
    full_name VARCHAR(30) NOT NULL,
    contract VARCHAR(50) NOT NULL,
    shift VARCHAR(25)NOT NULL
    );

CREATE TABLE atlog(
    atlog_id INTEGER NOT NULL auto_increment,
    emp_id INTEGER NOT NULL,
    atlog_DATE DATE,
    am_in TIME NULL,
    am_out TIME NULL,
    pm_in TIME NULL,
    pm_out TIME NULL,
    am_late INTEGER,
    am_underTIME INTEGER,
    pm_late INTEGER,
    pm_underTIME INTEGER,
    night_differential DECIMAL (3,2),
    /*night differential*/
    PRIMARY KEY(atlog_id),
    FOREIGN KEY (emp_id) REFERENCES employee(emp_id)
);

ALTER TABLE `atlog` ADD CONSTRAINT `fk_atlog_employee` FOREIGN KEY (`emp_id`) REFERENCES `employee`(`emp_id`);

INSERT INTO admin (username, password, full_name) 
VALUES  ('admin1', 'admin123', 'Michael Lariosa'),
        ('admin2', 'johnny', 'John Doe'),
        ('admin3', 'aragorn', 'Aram Muncal')
        ;

INSERT INTO employee (username, password, full_name) 
VALUES  ('emp1', 'emp123', 'Alex Scenariosa'),
        ('emp2', 'powwwy', 'Powwwy March'),
        ('emp3', 'agedwine', 'Charles Baclao')
        ;

INSERT INTO atlog (emp_id, atlog_DATE, am_in, am_out, pm_in, pm_out) 
VALUES ('1', CURDATE(), '08:30:00', '11:30:00', '13:30:00', '4:59:00'),
        ('2', CURDATE(), '08:30:00', '11:30:00', '13:30:00', '4:59:00'),
        ('3', CURDATE(), '08:30:00', '11:30:00', '13:30:00', '4:59:00')
        ;
        
UPDATE atlog SET am_late = IF(TIMEDIFF(am_in, '8:30:00') > '00:30:00', 1, 0);
UPDATE atlog SET am_underTIME = IF(TIMEDIFF(am_out,'11:30:00') > '00:30:00', 1, 0);
UPDATE atlog SET pm_late = IF(TIMEDIFF(pm_in, '13:30:00') > '00:30:00', 1, 0);
UPDATE atlog SET pm_underTIME = IF(TIMEDIFF(pm_out,'17:59:00') > '00:30:00', 1, 0);
UPDATE atlog SET night_differential = IF(pm_out < '22:00:00', 0, TIME_TO_SEC(TIMEDIFF(pm_out, '6:00:00')) * 0.10 / 3600);
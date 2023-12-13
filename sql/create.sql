CREATE DATABASE employee_db;

USE employee_db;

CREATE TABLE admin(
    admin_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(25) NOT NULL,
    password VARCHAR(30) NOT NULL,
    full_name VARCHAR(30) NOT NULL
);

CREATE TABLE employee (
  emp_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  password varchar(30) NOT NULL,
  full_name varchar(30) NOT NULL,
  first_name varchar(50) DEFAULT NULL,
  middle_name varchar(50) DEFAULT NULL,
  last_name varchar(50) DEFAULT NULL,
  address varchar(100) DEFAULT NULL,
  zip varchar(4) DEFAULT NULL,
  contact_number varchar(11) DEFAULT NULL,
  email_address varchar(50) DEFAULT NULL,
  contract varchar(50) NOT NULL,
  shift varchar(25) NOT NULL
);

CREATE TABLE atlog(
    atlog_id INT NOT NULL auto_increment,
    emp_id INT NOT NULL,
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


INSERT INTO admin (username, password, full_name) 
VALUES  ('admin1', 'admin123', 'Michael Lariosa'),
        ('admin2', 'johnny', 'John Doe'),
        ('admin3', 'aragorn', 'Aram Muncal')
        ;

INSERT INTO employee (password, full_name) 
VALUES  ('emp123', 'Alex Scenariosa'),
        ('powwwy', 'Powwwy March'),
        ('agedwine', 'Charles Baclao')
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
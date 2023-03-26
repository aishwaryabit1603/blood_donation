SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- DONOR TABLE STRUCTURE
CREATE TABLE donors(
    id_no int(10) PRIMARY KEY,
    user_name varchar(20) NOT NULL,
    password varchar(20) NOT NULL,
    name varchar(20) NOT NULL,
    dob date NOT NULL,
    sex varchar(20) NOT NULL,
    bloodgroup varchar(20) NOT NULL,
    mobile_no varchar(20) NOT NULL UNIQUE,
    email varchar(20) NOT NULL,
    state varchar(20) NOT NULL,
    district varchar(20) NOT NULL
)  ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;

INSERT INTO donors (id,"user_name","password","name",dob,"sex","bloodgroup",mobile_no,"email","state","district")
values
(1, 'Ramsingla', 'p@ssw0rd', 'Ram Singla', '1980-01-01', 'M', 'A pos', '123-456-7890', 'ram@gmail.com', 'Chandigarh', 'Chandigarh'),
(2, 'Shamsingla', 'p@ssw0rd', 'Sham Singla', '1982-02-14', 'F', 'O neg', '123-456-7891', 'sham@gmail.com', 'UttarPradesh', 'Aligarh'),
(3, 'Riyagarg', 'p@ssw0rd', 'Riya Garg', '1985-03-31', 'M', 'B pos', '123-456-7892', 'riya@gmail.com', 'Punjab', 'Barnala'),
(4, 'Tesshagarg', 'p@ssw0rd', 'Teesha Garg', '1988-04-30', 'F', 'AB pos', '123-456-7893', 'teesha@gmail.com', 'Kerala', 'Ernakulam'),
(5, 'Karan Singh', 'p@ssw0rd', 'Karan Singh', '1991-05-15', 'M', 'A neg', '123-456-7894', 'karan@gmail.com', 'Kerala', 'Kannur'),
(6, 'Govind Singla', 'p@ssw0rd', 'Govind Singla', '1995-06-01', 'M', 'O pos', '123-456-7895', 'govind@gmail.com', 'Delhi', 'East Delhi'),
(7, 'Anil Kumar', 'p@ssw0rd', 'Anil Kumar', '1998-07-14', 'F', 'B neg', '123-456-7896', 'anil@gmail.com', 'Delhi', 'New Delhi'),
(8, 'Pooja Singla', 'p@ssw0rd', 'Pooja Singla', '2001-08-31', 'M', 'AB neg', '123-456-7897', 'pooja@gmail.com', 'Delhi', 'New Delhi'),
(9, 'Mohan Sharma', 'p@ssw0rd', 'Mohan Sharma', '2004-09-30', 'F', 'A pos', '123-456-7898', 'mohan@gmail.com', 'Punjab', 'Patiala'),
(10, 'Maurya Sharma', 'p@ssw0rd', 'Maurya Sharma', '2007-10-15', 'M', 'O neg', '123-456-7899', 'maurya@gmail.com', 'Punjab', 'Patiala'),
(11, 'Nitika Aggarwal', 'p@ssw0rd', 'Nitika Aggarwal', '2010-11-01', 'F', 'B pos', '123-456-7900', 'nitika@gmail.com', 'JammuKashmir', 'Bandipora'),
(12, 'Jatin', 'p@ssw0rd', 'Jatin ', '2013-12-14', 'M', 'AB+', '123-456-7901', 'jatin@gmail.com', 'Bihar', 'Arwal'),
(13, 'lohitgarg', 'p@ssw0rd', 'Lohit Garg', '2016-01-31', 'F', 'A neg', '123-456-7902', 'lohit@gmail.com', 'Bihar', 'Aurangabad'),
(14, 'deepanshisharma', 'p@ssw0rd', 'Deepanshi Sharma', '0000-00-00', 'M', 'O pos', '123-456-7903', 'deepanshi@gmail.com', 'MadhyaPradesh', 'Alirajpur'),
(15, 'triptijain', 'p@ssw0rd', 'Tripti Jain', '2020-03-15', 'F', 'B neg', '123-456-7904', 'tripti@gmail.com', 'MadhyaPradesh', 'Alirajpur'),
(16, 'kashishsingla', 'p@ssw0rd', 'Kashish Singla', '2020-04-16', 'M', 'AB neg', '123-456-7890', 'kashish@gmail.com', 'Rajasthan', 'Ajmer'),
(17, 'cherry', 'p@ssw0rd', 'Cherry Garg', '2020-05-17', 'F', 'AB neg', '123-456-7891', 'cherry@gmail.com', 'Rajasthan', 'Alwar'),
(18, 'milli', 'p@ssw0rd', 'Milli Singh', '2020-06-18', 'M', 'AB pos', '123-456-7892', 'milli@gmail.com', 'Telangana', 'Bhadradri Kothagudem'),
(19, 'samyukta', 'p@ssw0rd', 'Samyukta T', '2020-07-19', 'F', 'AB pos', '123-456-7893', 'samyukta@gmail.com', 'Telangana', 'Hyderabad'),
(20, 'leevanshi', 'p@ssw0rd', 'Leevanshi Garg', '1980-01-01', 'M', 'A pos', '124-456-7890', 'leevanshi@gmail.com', 'Telangana', 'Hyderabad');

--indexes for table donors

ALTER TABLE donors
    MODIFY id int(10) NOT NULL AUTO_INCREMENT,INCREMENT, AUTO_INCR;
COMMIT;


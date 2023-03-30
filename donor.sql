SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- DONOR TABLE STRUCTURE
CREATE TABLE donors(
    id_no int(10) PRIMARY KEY,
    password varchar(20) NOT NULL,
    name varchar(20) NOT NULL,
    dob date NOT NULL,
    sex varchar(20) NOT NULL,
    bloodgroup varchar(20) NOT NULL,
    mobile_no varchar(20) NOT NULL UNIQUE,
    email varchar(20) UNIQUE,
    state varchar(20) NOT NULL,
    district varchar(20) NOT NULL
)  ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;

--indexes for table donors

ALTER TABLE donors
    MODIFY id int(10) NOT NULL AUTO_INCREMENT,INCREMENT, AUTO_INCR;
COMMIT;


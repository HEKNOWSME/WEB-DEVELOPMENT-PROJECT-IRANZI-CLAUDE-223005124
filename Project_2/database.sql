CREATE DATABASE IF NOT EXISTS student_portal CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE student_portal;

CREATE TABLE IF NOT EXISTS student_registrations (
    id INT NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    date_of_birth VARCHAR(10) NOT NULL,
    email VARCHAR(150) NOT NULL,
    mobile_number VARCHAR(20) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    address TEXT,
    city VARCHAR(100),
    pin_code VARCHAR(20),
    state VARCHAR(100),
    country VARCHAR(100) NOT NULL,
    hobbies VARCHAR(255),
    other_hobby VARCHAR(120),
    board1 VARCHAR(10),
    pct1 VARCHAR(5),
    year1 VARCHAR(4),
    board2 VARCHAR(10),
    pct2 VARCHAR(5),
    year2 VARCHAR(4),
    board3 VARCHAR(10),
    pct3 VARCHAR(5),
    year3 VARCHAR(4),
    board4 VARCHAR(10),
    pct4 VARCHAR(5),
    year4 VARCHAR(4),
    course VARCHAR(20),
    PRIMARY KEY (id)
);

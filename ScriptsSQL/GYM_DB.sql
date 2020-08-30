SET storage_engine = InnoDB;
DROP DATABASE IF EXISTS GYM_DB;
CREATE DATABASE IF NOT EXISTS GYM_DB;
USE GYM_DB;
SET FOREIGN_KEY_CHECKS = 1;
CREATE TABLE TRAINER(
	SSN CHAR(20) NOT NULL,
	Name CHAR(20) NOT NULL,
	Surname CHAR(30) NOT NULL,
	DOB CHAR(10) NOT NULL,
	Email CHAR(30) NOT NULL,
	Phone CHAR(20),
	PRIMARY KEY(SSN)
);
CREATE TABLE COURSE(
	CID CHAR(5) NOT NULL,
	Name CHAR(20) NOT NULL,
	Type CHAR(20) NOT NULL,
	Level SMALLINT NOT NULL
	CHECK(Level>=1 AND Level<=4),
	PRIMARY KEY(CID)
);
CREATE TABLE SCHEDULE(
	SSN	CHAR(20),
	Day CHAR(10) NOT NULL,
	StartTime CHAR(10) NOT NULL,
	Duration SMALLINT NOT NULL,
	CID CHAR(5),
	GymRoom CHAR(2),
	PRIMARY KEY(SSN, Day, StartTime),
	FOREIGN KEY(CID) REFERENCES COURSE(CID) ON DELETE CASCADE,
	FOREIGN KEY(SSN) REFERENCES TRAINER(SSN) ON DELETE CASCADE
);
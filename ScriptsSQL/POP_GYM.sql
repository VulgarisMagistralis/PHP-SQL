SET storage_engine = InnoDB;
SET FOREIGN_KEY_CHECKS = 1;
USE GYM_DB;
-- COURSES --
INSERT INTO COURSE (CID, Name, Type, Level)
	VALUES ('CT100','Spinning for beginners','Spinning', 1);
INSERT INTO COURSE (CID, Name, Type, Level)
	VALUES ('CT101','Fitdancing','Music activity', 2);
INSERT INTO COURSE (CID, Name, Type, Level)
	VALUES ('CT104','Advanced spinning','Spinning', 4);
-- TRAINERS --
INSERT INTO TRAINER (SSN, Name, Surname, DoB, Email, Phone)
	VALUES ('SMTPLA80N31B791Z','Paul','Smith','31/12/1980','p.smith@gym.it',NULL);
INSERT INTO TRAINER (SSN, Name, Surname, DoB, Email, Phone)
	VALUES ('KHNJHN81E30C455Y','John','Johnson','30/05/1981','j.johnson@gym.it','+2300110303444');
INSERT INTO TRAINER (SSN, Name, Surname, DoB, Email, Phone)
	VALUES ('AAAGGG83E30C445A','Peter','Johnson','30/05/1981','p.johnson@gym.it','+2300110303444');
-- SCHEDULE --
INSERT INTO SCHEDULE (SSN, Day, StartTime, Duration, CID, GymRoom)
	VALUES('SMTPLA80N31B791Z','Monday','10:00',45,'CT100','R1');
INSERT INTO SCHEDULE (SSN, Day, StartTime, Duration, CID, GymRoom)
	VALUES('SMTPLA80N31B791Z','Tuesday','11:00',45,'CT100','R1');
INSERT INTO SCHEDULE (SSN, Day, StartTime, Duration, CID, GymRoom)
	VALUES('SMTPLA80N31B791Z','Tuesday','15:00',45,'CT100','R2');
INSERT INTO SCHEDULE (SSN, Day, StartTime, Duration, CID, GymRoom)
	VALUES('KHNJHN81E30C455Y','Monday','10:00',30,'CT101','R2');
INSERT INTO SCHEDULE (SSN, Day, StartTime, Duration, CID, GymRoom)
	VALUES('KHNJHN81E30C455Y','Monday','11:30',30,'CT104','R2');
INSERT INTO SCHEDULE (SSN, Day, StartTime, Duration, CID, GymRoom)
	VALUES('KHNJHN81E30C455Y','Wednesday','09:00',60,'CT104','R1');
	
	
	
	
	
	
	
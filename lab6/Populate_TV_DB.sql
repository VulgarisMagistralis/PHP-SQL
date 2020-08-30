SET storage_engine = InnoDB;
SET FOREIGN_KEY_CHECKS = 1;
use TV;

INSERT INTO VIP (SSN, VIPName, Surname, Employment)
VALUES('SDLGNLREO4412',' Sun',' Tzu', 'Military');

INSERT INTO VIP (SSN, VIPName, Surname, Employment)
VALUES('SLKGFD1223KGK', 'Lao', 'Tzu', 'Taoist');

INSERT INTO VIP (SSN, VIPName, Surname, Employment)
VALUES('SSEFNUIC33REN', 'Adam', 'Ferguson', 'Historian');

INSERT INTO VIP (SSN, VIPName, Surname, Employment)
VALUES('SSQWEF112NVHI', 'Karl', 'Marx', 'Sociologist');

INSERT INTO VIP (SSN, VIPName, Surname, Employment)
VALUES('SKLLXC3216FFA', 'Friedrich', 'Nietzche',' Scholar');

INSERT INTO VIP (SSN, VIPName, Surname, Employment)
VALUES('SSEFNUICWE1VN', 'Albert', 'Camus', 'Author');

INSERT INTO VIP (SSN, VIPName, Surname, Employment)
VALUES('S33TGVBCH6H5B', 'Antonio', 'Neves', 'Professor');

INSERT INTO TV_CHANNEL (CodC, TVName, Frequency, Broadcaster)
VALUES('5', 'VHL_LOW', '50', 'Fox');

INSERT INTO TV_CHANNEL (CodC, TVName, Frequency, Broadcaster)
VALUES('15', 'MID_BAND', '140', 'CBS');

INSERT INTO TV_CHANNEL (CodC, TVName, Frequency, Broadcaster)
VALUES('7', 'VHF_HI', '200', 'NBC');

INSERT INTO TV_CHANNEL (CodC, TVName, Frequency, Broadcaster)
VALUES('33', 'SUPER_BAND', '240', 'Netflix');

INSERT INTO TV_CHANNEL (CodC, TVName, Frequency, Broadcaster)
VALUES('60', 'HYPER_BAND', '450', 'HULU');

INSERT INTO APPEARANCE (SSN, Date, StartTime, EndTime, CodC)
VALUES('SKLLXC3216FFA','1999-05-30','10:00','12:30','7');

INSERT INTO APPEARANCE (SSN, Date, StartTime, EndTime, CodC)
VALUES('SSEFNUIC33REN','2018-02-16','21:00','23:00','33');

INSERT INTO APPEARANCE (SSN, Date, StartTime, EndTime, CodC)
VALUES('SSEFNUIC33REN','2005-04-07','19:05','20:00','60');

INSERT INTO APPEARANCE (SSN, Date, StartTime, EndTime, CodC)
VALUES('SSQWEF112NVHI','2001-09-11','13:15','14:30','5');

INSERT INTO APPEARANCE (SSN, Date, StartTime, EndTime, CodC)
VALUES('SSQWEF112NVHI','2010-12-17','04:30','05:40','33');

INSERT INTO APPEARANCE (SSN, Date, StartTime, EndTime, CodC)
VALUES('SDLGNLREO4412','2018-05-15','21:00','23:00','60');

INSERT INTO APPEARANCE (SSN, Date, StartTime, EndTime, CodC)
VALUES('S33TGVBCH6H5B','2001-05-10','10:00','12:30','7');

INSERT INTO APPEARANCE (SSN, Date, StartTime, EndTime, CodC)
VALUES('SLKGFD1223KGK','2018-08-09','11:00','23:30','7');

INSERT INTO APPEARANCE (SSN, Date, StartTime, EndTime, CodC)
VALUES('SDLGNLREO4412','2012-01-15','21:00','23:00','15');

INSERT INTO APPEARANCE (SSN, Date, StartTime, EndTime, CodC)
VALUES('SLKGFD1223KGK','2015-08-19','11:00','23:30','15');

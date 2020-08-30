/* 1a */
SELECT D.DName, COUNT(TOTAL) AS TOTAL 
FROM RESEARCHER R,
	 RESEARCH-CONTRACT RC2,
	 DEPARTMENT D,
	 (SELECT *
	  FROM RESEARCHER R1,RESEARCH-CONTRACT RC2
	  WHERE R1.RCode = R.RCode
	  AND RC2.RCode = R.RCode
	  GROUP BY(RC2.RCode-ScientificCoordinator,
				RC2.CCode, RC2.StartDate)
	 ) TOTAL
WHERE R.DCode = D.DCode
AND R.RCode NOT IN  (SELECT RC1.RCode-ScientificCoordinator
					 FROM RESEARCH-CONTRACT RC1
					 MINUS
					 SELECT RC.RCode-ScientificCoordinator
					 FROM RESEARCH-CONTRACT RC, COMPANY C
					 WHERE RC.Amount > 100000
					 AND RC.CCode = C.CCode
					 AND C.CompanyType ='Large'
					)
GROUP BY D.DName;					

/* 1b */
SELECT C1.Industrial-Sector,
FROM COMPANY C1,RESEARCHER R,
	 RESEARCH-CONTRACT RC1
WHERE TO_DATE(R.EnrolmentDate, 'YYYY/MM/DD')
	> TO_DATE('2015/06/30', 'YYYY/MM/DD')
AND C1.CCode = RC1.CCode
AND R.RCode = RC1.RCode
GROUP BY(C1.Industrial-Sector)
HAVING COUNT(RC1.RCode-ScientificCoordinator) = 
			    (
				 SELECT MAX(COUNT(RC.RCode-ScientificCoordinator))
				 FROM COMPANY C, RESEARCH-CONTRACT RC
				 WHERE C.CCode = RC.CCode
				 AND C.Industrial-Sector = C1.Industrial-Sector
			    );

/* 2 */
SELECT A.AuthorCode, A.Surname, A.University,
       COUNT(*) AS TotalArticles
FROM AUTHOR A,
	 AUTHOR_PRESENTS_ARTICLE ARA1
WHERE A.AuthorCode = ARA1.AuthorCode
AND A.AuthorCode NOT IN (
						 SELECT A1.AuthorCode
						 FROM AUTHOR A1, ARTICLE AR,
						 AUTHOR_PRESENTS_ARTICLE ARA
						 WHERE A1.AuthorCode = ARA.AuthorCode
						 AND AR.ArticleCode = ARA.ArticleCode							
						 AND AR.Topic <> 'Data Mining'
 					    ) 
GROUP BY(ARA1.Edition, ARA1.Conference, ARA1.AuthorCode);


/* 3 */
SELECT SC.SCode
FROM SEMINAR_CALENDAR SC
WHERE SC.S_SSN IN ( SELECT E.S_SSN
					FROM EXPERTISE E
					GROUP BY (E.S_SSN)
					HAVING COUNT(*) = (
								       SELECT MAX(COUNT(*))
									   FROM EXPERTISE E1
									   GROUP BY (E1.S_SSN)
									  )
				  );

/* 4 */
SELECT DISTINCT C.TCode, C.CName
FROM COURSE C, LECTURE L, TEACHER T
WHERE T.TCode = C.TCode 
AND C.CCode = L.CCode
AND T.TCode NOT IN (
					SELECT C1.TCODE
					FROM COURSE C1
					WHERE C1.Topic <> 'Database'
				   )
GROUP BY(C.TCode)
HAVING AVG(L.AttendingStudent#) = (
									SELECT MAX(AVG(L1.AttendingStudent#))
									FROM LECTURE L1, COURSE C2
									WHERE C.CCode = L1.CCode
									AND C2.TCode = C.TCode
									GROUP BY (L1.RoomID, L1.Date, L1.StartHour)
								   );
/* 5 */
SELECT S.StudentID, S.Surname, S.DegreeProgram
FROM STUDENT S, EVALUATION_OF_DELIVERED_ASSIGNMENT EODA1
WHERE S.StudentID NOT IN (  
							SELECT EODA.StudentID
							FROM ASSIGNMENT_TO_BE_DELIVERED ATBD,
							EVALUATION_OF_DELIVERED_ASSIGNMENT EODA
							WHERE ATBD.ACode = EODA.ACode  
							AND TO_DATE(EODA.DeliveryDate, 'YYYY/MM/DD') >
							TO_DATE(ATBD.ScheduledExpirationDate,'YYYY/MM/DD')
						  )
AND S.StudentID = EODA1.StudentID
AND EODA1.Score = ( 
					SELECT MAX(EODA2.Score)
					FROM EVALUATION_OF_DELIVERED_ASSIGNMENT EODA2
					GROUP BY(EODA2.StudentID, EODA2.ACode)
				   )






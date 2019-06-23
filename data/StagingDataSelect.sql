SELECT concat("('",`recite`,"','",`start_time`,"','",`end_time`,"','",`weekday`,"'),")
FROM HTOK.STG_DailyReciteData;

SELECT concat("('",`date`,"','",`weekday`,"','",`dayofmonth`
,"','",`num_weekdayofmonth`,"','",`week_num`,"','",`datestring`,"'),") 
FROM HTOK.STG_DayData;

SELECT concat("('",`Abhishekam`,"','",`start_time`,"','",`end_time`,"','",`week_num`,"'),") 
FROM HTOK.STG_WeeklyAbhishekamData;

SELECT concat("('",`Username`,"','",`Password`,"','",`UserProfileId`,"','"
,`Firstname`,"','",`Lastname`,"','",`Email`,"','",`Phone`,"',NOW(),'INITIAL LOAD',NULL,NULL),")
FROM `HTOK`.`Users`
where username in ('nitin','Test123','nidhi','priest1','admin','factman','subkir');
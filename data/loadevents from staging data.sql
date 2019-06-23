INSERT INTO `events` (`title`,  `start_event`, `end_event`, `createdon`,`createdby`) 
select Abhishekam as title,concat(datestring,' ',start_time) as start_event,concat(datestring,' ',end_time) as start_event
,now() as createdon,'BulkLoad' as createdby
from STG_DayData dd #where date = 'date'
inner join STG_WeeklyAbhishekamData drd on dd.week_num = drd.week_num ;
#limit 10;

INSERT INTO `events` (`title`,  `start_event`, `end_event`, `createdon`,`createdby`) 
select recite as title,concat(datestring,' ',start_time) as start_event,concat(datestring,' ',end_time) as start_event
,now() as createdon,'BulkLoad' as createdby
from STG_DayData dd #where date = 'date'
inner join STG_DailyReciteData drd on dd.weekday = drd.weekday ;
#limit 10;
#select * from events
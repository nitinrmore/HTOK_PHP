SELECT u.username,u.firstname,pt.pujadescription
,pr.createdon,pr.gotra,pr.nakshatra,pr.names
,pr.completedindicator,pr.completedon,pr.completedby 
FROM users u 
inner join PujaRequest pr on pr.userid = u.id 
inner join  PujaType pt on pr.pujatypeid = pt.id 
WHERE u.username = 'nitin';
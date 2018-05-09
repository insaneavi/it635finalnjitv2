NJIT635FINAL
Avinash Shah
18 S - IT 635102-Database Administration

Live Website Link
http://ec2-18-218-36-211.us-east-2.compute.amazonaws.com/index.php

End user Login 
Username:	enduser1
Password:	password

Admin Login
Username:	admin1
Password:	Welcome1

Live Replications with M/S on a second VM 

~log into slave box and enter: mysql -u root -p 

then "SHOW SLAVE STATUS\G" it will show slave IO running and SLAVE SQL running

Scheduled Incremental Backups (With Backup Rotation)
~log into slave box and enter: mysql -u root -p 
USE IT635, then show binary logs;
then go to 
Reimplement one of your tables in Mongo (mlab or run it locally) 
Go to main box, and enter mongo, then use IT635; then show collections, then db.movies.find()
Enforce the first three normal forms on your MYSQL database 
SEE PDF already on githut 
Implement one of your common queries as a stored procedure 
Go on master box, 
mysql -u root -p 
use IT635: 
show create procedure new_movie; 
Document your database layout in UML 
SEE PDF already on githut
All midterm deliverables are still required 
DONE



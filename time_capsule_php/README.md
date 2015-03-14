#Time Capsule

##How to Setup
First download MAMP for your operating system. Links below are provided.
</br>
<a href="http://www.mamp.info/en/downloads/">Mac</a>
http://www.mamp.info/en/downloads
</br>
<a href="http://www.mamp.info/en/mamp_windows.html">Windows</a>
http://www.mamp.info/en/mamp_windows.html
</br>

Then open the Application in a the filesystem browser and navigate the the "htdocs" folder.
This is where you will drop all of the code provided in the project into. 
Start up MAMP program and hit start servers.
It will then bring you to a startup page in your browser, navigate to the tools dropdown menu
and select phpmyadmin. Create a new database called time_capsule and run all of the queries
provided in setup.sql in that database to create the necessary tables. 
Navigate to localhost:8888/index.php in your browser and the application will bring you 
to the login page. From there you can create a new user and login.
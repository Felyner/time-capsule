#Time Capsule#

## Django Implementation Usage ##
To run the Python/Django version of our application, first install the Django framework by running the following command from your terminal
```
sudo pip install Django
```
If you currently do not have pip, please go to the following link to get the correct files and instructions:

https://pip.pypa.io/en/latest/installing.html

Once Django is installed, navigate to the /time_capsule_django/ folder and run the following command
from your terminal
```
python manage.py runserver
```
At this point, go to 
```
http://localhost:8000
```
to view the application. You can either register a new account or login with the following details
```
username: test
password: 1234
```
At this point you can create time capsules by clicking on the create time capsule button. You will need to select an unlock date and choose which files you would like to upload. Locked and unlocked time capsule are viewable in their corresponding page sections.

## CodeIgniter Implementation Usage ##
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

## Rails Implementation Usage ##
Before running the Ruby on Rails implementation of our application it is important to make sure you have Rails installed. To check this, run the following command from your terminal
```
rails --version
```
Once you have verified that rails is installed on your system, navigate to the /time_capsule_rails/ directory and run the following command from your terminal
```
rails s
```
At this point you can open up a web browser and navigate to the following URL to view the application
```
http://localhost:3000
```
If you are faced with PendingMigrationError make sure you make migrations to the database by running this command from your terminal
```
rake db:migrate
```
This will load all the tables with their respective properties and is only necessary upon first use of the application (GitHub messes around with things). Upon arrival, you will be greeted with a login screen, so be sure to register. Once you are signed up you are able to create time capsules and add files to them. If you wish to delete a time capsule you are able to do so, even if the unlock date has not been reached. Otherwise, you can wait until your time capsule is ready to be opened and view all of the treasures locked inside.

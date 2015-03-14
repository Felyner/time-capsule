#Time Capsule#
============

### Rails Version
Patrick Mathieu

### Django Version
Kevin Stewart

### PHP Version
Quintin Leong

## Django Implementation Usage ##
To run the Python/Django version of our application, navigate to the /time_capsule_django/ folder and run the following command
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
You will first be prompted with a login screen, so be sure to register. Once you are signed up you are able to create time capsules and add files to them. If you wish to delete a time capsule you are able to do so, even if the unlock date has not been reached. Otherwise, you can wait until your time capsule is ready to be opened and view all of the treasures locked inside.

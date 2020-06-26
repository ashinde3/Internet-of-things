Smart waste management system based on IOT, include collection of data from different bins and showing on the ui and generating shortest path 
using google direction api

PROJECT SETUP AND EXECUTION

1.	Place the SWM_web folder under xampp/htdocs and run the localhost in the browser to access the website. Note: Xampp server used to setup database

2.	Create database named swm and import swm.sql in it to set up the database


3.	Connect Arduino according to the circuit diagram in the report

4.	Upload the Arduino code (.ino file) to Arduino microcontroller using Arduino ide


5.	Change the Wi-Fi username and password in the Arduino code (.ino file) on line 104

6.	Change mobile number in Arduino code (.ino file) on line 224. Replace ‘X’ with different number instead of the number inserted into GSM module


7.	On the serial monitor, AT commands will be executed and an ip address will be generated. Copy the ip address and paste it in the browser new window

8.	On the web app the level of trash in bin with id for eg:1010 will get updated


9.	To find the capacity of garbage execute binCap.py, from the folder Python code, on the terminal as: python2 binCap.py. Execute it simultaneously with steps 6 and 7



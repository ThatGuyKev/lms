# Library Management | PHP App

This PHP application is a Library Management System for Little Hands School


In order to use this application first you need WAMP installed and create folder lms in www folder inside the WAMP directory so that you can use localhost to run this application. Then you need to copy all of these files to lms folder and also you need to create database called lms and add sql file in phpmyadmin dashboard..

# Admin credentials :

username : admin
password : admin

# Setting up WAMP ....

1. download WAMP server from the official website http://www.wampserver.com/en/#download-wrapper
2. follow the instructions in downloading and installing WAMP server
3. after finishing installing WAMP server open it and you should see WAMP icon in the taskbar, a green icon indicates the server is fully running other wise please contact the developer
4. default directory for WAMP server is C:\wamp64 if you are using 64bit windows or C:\wamp if you are using 32bit windows
5. in the above directory you will find your "www" folder.

# Setting up database .....

1. open your internet browser
2. type inside the navigation bar "localhost" and press Enter. you should see WAMP server front pannel with server configuration on it. if it didn't work try "localhost:8080"
3. in the left button you will find "phpmyadmin" link, click on it, this should direct you to phpmyadmin welcome Page
4. in the username field type "root" and leave password field blank and press "GO"
5. first you need to create a new database called "lms"
6. you should find "New" in the left pannel with a database icon next to it, click on that
7. insert the new database name "lms" and leave allocation field blank
8. on the top of the page click on "import" tab
9. here you should choose the file "lms.sql" located in sql inside the application repository
10. once you have chosen the file press "GO"
11. now the database should be set and ready to GO!

# Running the application .....

1. open your internet browser
2. type inside the navigation bar "http://localhost/lms"
3. you are good to go !!!

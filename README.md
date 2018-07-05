# FlightBooking
It is a Web Application to book flight tickets. Project contain files and libraries of framework called CodeIgniter. In application folder we can find different folder like models,view,controllers,configuration and so on. In system folder it contain the libraries used by the framework. 

View contain the html pages from which the users intracts with the application. Models contain the database connection, helps application to intract with the database. Controller controls the View and Models so make the application secure.

# Process

Home page contain some input boxes where the user enter the source and destination with date and number of passengers. After user submit the details, Flight details is shown in another page with flight name,Arrival Time,Departure Time, Price and a button for booking.
By clicking Book button a confirmation message is shown to confirm booking.As soon as it get confirmed the user see the confirmation message that flight has booked.

# How to Run the Application

1. Download the XAMPP and install,if not present.
2. Open the Xampp Control Panel, Start the Apache and MySQL services.
3. Open Command Promt and run the commands as mentioned in the above createtable.txt file.
4. UnZip the Project and put it in the [ C:/xampp/htdocs/ ] directory.
### 5. Copy the FILENAME and Go to [ application/config/ ] and open config.php file - change $config['base_url']="http://localhost/[FILENAME]/"
5. Open Browser and go to localhost/FlightBooking/
6. Web Applicatoin runs.

# Execution flow

As soon as browser tries to open the application, default controller takes the call and execute the index() function present in it. This function contain source data from the database and an object to load the view to intract with the user.
If source city is selected then the destination cities is refreshed with the AJAX call that retrive destination cities(this is used to prevent the source city to show up again in destination cities).
Submit button is clicked then the control is back to the controller with the data entered. Controller sends the source and destination cities to get the flight details to model. Model takes the control and search the database for the flights in that perticular routes.
Model returns the result to the controller. Controller with the data of flights load the view with the filght details and booking option.
If Book button is clicked jquary shows up a lightbox for confirmation.As soon as Confrim button is clicked controller catches it and store the data in the confirmation table with the flight detalils and number of passengers.It also loads the confirmation message in the new screen.

# Screenshots
### Home Page
![screenshot 4](https://user-images.githubusercontent.com/23103758/42312970-365e09d4-805f-11e8-8d02-d768023d59d0.png)

### Flight Details
![flightdetails](https://user-images.githubusercontent.com/23103758/42313148-a3e9a184-805f-11e8-9db7-e467ae0116a6.png)

### Confirmation Message
![confirmationmessage](https://user-images.githubusercontent.com/23103758/42313182-b5d1d290-805f-11e8-8667-5716f401d916.png)

### Booking Confirmed Message
![bookingconfirmedmessage](https://user-images.githubusercontent.com/23103758/42313207-c8dd2682-805f-11e8-924f-7013140ccea9.png)

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
/*if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully"; 
*/

/*
Note: When you create a new database, you must only specify the first three arguments to the mysqli object (servername, username and password).

Tip: If you have to use a specific port, add an empty string for the database-name argument, like this: new mysqli("localhost", "username", "password", "", port)

*/


/*$sql = "INSERT INTO mydb (firstname, lastname, email, password)
VALUES ('$firstname", "$lastname", "$email", "$password")";

if ($conn->query($sql) === TRUE) {
    echo "good";
} else {
    echo "Error creating table: " . $conn->error;
}
/*if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}*/



/*
$conn->close();*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
		body {
  background: #2d343d;
}

.login {
  margin: 20px auto;
  width: 300px;
  padding: 30px 25px;
  background: white;
  border: 1px solid #c4c4c4;
}

h1.login-title {
  margin: -28px -25px 25px;
  padding: 15px 25px;
  line-height: 30px;
  font-size: 25px;
  font-weight: 300;
  color: #ADADAD;
  text-align:center;
  background: #f7f7f7;
 
}

.login-input {
  width: 285px;
  height: 50px;
  margin-bottom: 25px;
  padding-left:10px;
  font-size: 15px;
  background: #fff;
  border: 1px solid #ccc;
  border-radius: 4px;
}
.login-input:focus {
    border-color:#6e8095;
    outline: none;
  }
.login-button {
  width: 100%;
  height: 50px;
  padding: 0;
  font-size: 20px;
  color: #fff;
  text-align: center;
  background: #f0776c;
  border: 0;
  border-radius: 5px;
  cursor: pointer; 
  outline:0;
}

.login-lost
{
  text-align:center;
  margin-bottom:0px;
}

.login-lost a
{
  color:#666;
  text-decoration:none;
  font-size:13px;
}



	</style>
	<title>Sing up</title>
<?php
require  'dbconf.php';




function Get_IP_and_say_hello()
{


if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
else {
    $ip_address = $_SERVER['REMOTE_ADDR'];
}
	
	return $ip_address;
	/*var_dump($ip_address);*/


}
$ip = Get_IP_and_say_hello();


?>
</head>
<body>
<form class="login" action="#" method="post">
    <h1 class="login-title">Sing up first</h1>
    <h2 class="login-title"><?php echo "Hello:$ip";?></h2>
    <input type="text" 	   name="email" 		class="login-input" placeholder="Email Adress" autofocus>
    <input type="text" 	   name="name" 			class="login-input" placeholder="Name"  >
    <input type="text" 	   name="second_name" 	class="login-input" placeholder="Last name" >
	<input type="password" name="password" 		class="login-input" placeholder="password">
	<input type="submit"   name="submit" 		class="login-button"value="Resgister" >
  <p class="login-lost"><a href="index.php">Forgot Password?</a></p>
  </form>
  <?php

		if (!empty($_POST)) {
		$firstname = $_POST['name'];
		$lastname  = $_POST['second_name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		






$sql = "INSERT INTO mydb (firstname, lastname, email, password, ipaddress) VALUES ('$firstname', '$lastname', '$email', '$password', '$ip')";


function test($conn, $sql){
	if ($conn->query($sql) === TRUE) {
   
}
 else {
    echo "not good: " . $conn->error;
}

}

test($conn, $sql);
/*if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}*/

}
$conn->close();
?>


</body>
</html>
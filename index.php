<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css"  href="style/style.css">

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

$cla =".клас";
?>
</head>
<body>
 <h1 class="login-title">СУ "Козма Тричков"</h1>
<form class="login" action="#" method="post">
    <h2 class="login-title">Анкета за подбор на песни звучащи по време на междучасията на 14.02.2019</h2>
    <h4 class="login-title">/Данните се въвеждат само на латиница/</h4>
    <h3 class="login-title"><?php echo "Здравей:$ip";?></h3>
     <input type="text" name="name" class="login-input" placeholder="Име" autofocus> 
    <input type="text"     name="song"  class="login-input" placeholder="Постави избраната песен">
    <input type="text" name="wish" class="login-input" placeholder="Поздрав към песента(не е задължително)">
    <select name="class" class="login-input"  >
        <?php
            for ($i=5; $i <=12 ; $i++) { 
              echo '<option value='.$i.".klas".'>';
                echo "$i"."$cla";
              echo "</option>";
          }
          
       ?>
    </select>
    <input type="submit"   name="submit" class="login-button" value="Гласувай" >

  </form>
  <?php
        
		if (!empty($_POST)) {
        $wish = $_POST["wish"];        
        $name = $_POST["name"];
        $song = $_POST["song"];
        
        $class = $_POST["class"];
        $arr_user_input = [$wish, $name, $song,$class];
         $converted =  implode(" ", $arr_user_input);
        /*var_dump($converted);*/
            function regex_cheking($converted){
                $filter = '/([а-я])/';
                $result = preg_match_all($filter, $converted);
                /*var_dump($result);*/
                if ($result > 0 ) {
                    $string_for_out = '';
                    echo "$string_for_out";
                    /*clearing DATABASE FOR ECONOMY SPACE*/
                    unset($_POST, $sql);
                }

            }
            $sql = "INSERT INTO quest (name, song, wish, ip, class) VALUES ('$name', '$song', '$wish', '$ip', '$class')";



            regex_cheking($converted);

function test($conn, $sql){
    $str = 'Благодарим за участието!';
	if ($conn->query($sql) === TRUE) {
     echo '<h1 class="login-title">';
     echo "$str";
     echo "</h1>";
}
 else {
    echo "ERROR: " . $conn->error;
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
<?php
error_reporting(E_ALL & ~E_NOTICE);
include("geoiploc.php"); 
  if (empty($_POST['checkip']))
  {
        $ip = $_SERVER["REMOTE_ADDR"]; 
  }
  else
  {
        $ip = $_POST['checkip']; 
  }
?> 
Tu direcci�n IP es: <?php echo($ip); ?> <br>
Tu Pa�s es : <?php echo(getCountryFromIP($ip, " NamE"));?>
 (<?php echo(getCountryFromIP($ip, "code"));?>)



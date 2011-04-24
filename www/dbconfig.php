<?php

//Connection to the database
//$link = mysql_connect('localhost', 'root', 'certus') or die(mysql_error());
$link = mysql_connect('localhost:3306', 'walking', 'comp2010') or die(mysql_error());
$bdName = "walking";
mysql_select_db($bdName);

?>
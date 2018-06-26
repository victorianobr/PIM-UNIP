<?php

$conn = @mysql_connect('localhost','root','');
if (!$conn) {
    die('Não foi possível Conectar: ' . mysql_error());
}
mysql_select_db('victor_unipsls', $conn);

?>﻿


<html>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="utf-8">
  <title>UNIP SLS</title>
  <style>
body { 
     background-color: #00243c;
	 }
  </style>
<head>
<title>UNIP SLS</title>
<script type="text/javascript">
	function loginsuccessfully(){
		setTimeout("window.location='home.php'", 5000);
	}
	function loginfailed(){
		setTimeout("window.location='index.html'", 5000);
	}
</script>
</head>
<body>

<?php
$login = $_POST['login'];
$senha = $_POST['senha'];
$sql = mysql_query ("SELECT * FROM usuarios WHERE login = '$login' and senha = '$senha'") or die(mysql_error());
$row = mysql_num_rows($sql);
if($row > 0) {
session_start();
$_SESSION['login']=$_POST['login'];
$_SESSION['senha']=$_POST['senha'];
 echo "<font face=verdana size=5>";
 echo "<br>";
 echo "<center><b><font color=\"#FFFFFF\">Conectado!</br>Aguarde um Instante</font></b><center>";
 echo "<script>loginsuccessfully()</script>";
} else {
 echo "<font face=verdana size=5>";
 echo "<br>";
 echo "<center><b><font color=\"#FF0000\">Login Incorreto</br>Tente novamente</font></b><center>";
	echo "<script>loginfailed()</script>";
}
?>
</body>

</html>
<?php 
session_start();

if (!(isset($_POST['btnSimpan']))) 
{
	header("location: form-create.php");
}
if (!(isset($_SESSION['user']))) 
{
	header("location: ../login/form-login.php");
}

?>
<?php

include '../connect.php'
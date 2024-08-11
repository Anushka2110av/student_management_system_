<?php
/**
 * This script handles the login verification process.
 * It starts by checking if the login form has been submitted.
 * It then establishes a connection to the database.
 * The script verifies the user's credentials and starts a session if they are correct.
 * If the credentials are incorrect, it redirects back to the login page with an error message.
 */

error_reporting(0);
session_start();


$host="localhost";

$user="root";

$password="";

$db="studentmanagement";


$data=mysqli_connect($host,$user,$password,$db);


if($data===false)
{
	die("connection error");
}

		
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$name = $_POST['username'];

		$pass = $_POST['password'];


		$sql="select * from user where username='".$name."' AND password='".$pass."'  ";

		$result=mysqli_query($data,$sql);

		$row=mysqli_fetch_array($result);



		if($row["usertype"]=="student")
		{

			$_SESSION['username']=$name;

			$_SESSION['usertype']="student";

			header("location:studenthome.php");
		}

		elseif($row["usertype"]=="admin")
		{	
			$_SESSION['username']=$name;

			$_SESSION['usertype']="admin";

			header("location:../adminhome.php");
		}

		else
		{
			

			$message= "username or password do not match";

			$_SESSION['loginMessage']=$message;

			header("location:login.php?error=Invalid Credentials");
		}


	}


?>

<?php
  $fn= $_POST['fn'];
  $ln= $_POST['ln'];
  $father= $_POST['father'];
  $mother= $_POST['mother'];
  $dob= $_POST['dob'];
  $gender= $_POST['gender'];
  $course= $_POST['course'];
  $sem= $_POST['sem'];
  $reg= $_POST['reg'];
  $addr= $_POST['addr'];
  $city= $_POST['city']; 
  $pin= $_POST['pin'];
  $phno= $_POST['phno'];
  $email= $_POST['email'];
  $user= $_POST['username'];
  $pw= $_POST['pw'];
  $cpw= $_POST['cpw'];
  $regdate=date('d/m/Y');

    /* PROFILE UPLOAD   */
  $pic=$_FILES['profile']['name'];
  $target = "profile_upload/".$pic;
  move_uploaded_file($_FILES['profile']['tmp_name'], $target);

  $query= "insert into registration values('$regdate','$fn','$ln','$father','$mother','$dob','$gender','$course','$sem','$reg','$addr','$city','$pin','$phno','$email','$pic','$user','$pw','reject')";

  $host = "localhost";
  $usname = "root";
  $paword = "";
  $database = "college";
  $mysqli = new mysqli($host,$usname,$paword,$database);
  
  if ($mysqli -> connect_errno) {
      echo "<script>console.log('Failed to connect to MySQL')</script>";
      exit();
  }
  else{
      echo "<script>console.log('Connect to MySQL success')</script>";
  }

  $data = $mysqli->query($get);
 if($pw==$cpw)
  {
    $data = $mysqli->query($query);
	 echo '<script>alert("REGISTERED SUCCESSFULLY");window.location="login.php";</script>';
  }
  else
  {
     echo '<script>alert("PASSWORD DOESNOT MATCH");window.location="registration.php";</script>';
  }
  ?>
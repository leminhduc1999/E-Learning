<?php
    ob_start(); // to clear the browser cache...
    session_start();

    $username=$_POST['username'];
    $password=$_POST['password'];

    $get="select * from registration where username='$username' and password='$password' and status='accept' ";

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

    $flag = false;
    while($row = $data->fetch_row()){
       $fn = $row[1];
       $ln = $row[2];
       $name = $fn.' '.$ln;
       $father = $row[3];
       $mother = $row[4];
       $dob = $row[5];
       $gender = $row[6];
       $course = $row[7];
       $sem = $row[8];
       $reg = $row[9];
       $phno = $row[13];
       $email = $row[14];
       $profile_pic = $row[15];
       $pasword = $row[17];
       $status='accept';

       $flag = true;
    }

    if($flag){
         $_SESSION['un']=$username;
         $_SESSION['name']=$name;
         $_SESSION['dob']=$dob;
         $_SESSION['gender']=$gender;
         $_SESSION['course']=$course;
         $_SESSION['sem']=$sem;
         $_SESSION['reg']=$reg;
         $_SESSION['phno']=$phno;
         $_SESSION['email']=$email;
         $_SESSION['pic']=$profile_pic;
         $_SESSION['pswd']=$pasword;

         echo "<script>console.log('Login success')</script>";

         header("location:elearning.php");
     }
     else{
         echo '<script>alert("NOT AUTHENTICATED");window.location="login.php";</script>';
     }
    
?>
   
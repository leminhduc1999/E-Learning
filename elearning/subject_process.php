<?php
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

    $subject= $_POST['subject'];
    $logo_upload = $_FILES['logo']['name'];
    $target2 = "Logo_upload/".$logo_upload;
    move_uploaded_file($_FILES['logo']['tmp_name'],$target2);

    $query= "insert into subject_master values('','$subject','$logo_upload')";
    $data = $mysqli->query($query);

    echo '<script>alert("UPLOAD SUCCESSFULLY");window.location="subject_master.php";</script>';
?>
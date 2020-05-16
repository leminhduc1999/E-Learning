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

    $course= $_POST['course'];
    $subject= $_POST['subject'];
    $topic= $_POST['topic'];
    $date= $_POST['date'];
    $summary= $_POST['summary'];
    $notes_upload = $_FILES['notes']['name'];
    $target = "Notes_upload/".$notes_upload;
    move_uploaded_file($_FILES['notes']['tmp_name'],$target);
    $video_upload = $_FILES['video']['name'];
    $target1 = "Video_upload/".$video_upload;
    move_uploaded_file($_FILES['video']['tmp_name'],$target1);

    $query= "insert into tbl_notes_details values('','$course','$subject','$topic','$date','$notes_upload','$video_upload','$summary')";
    $data = $mysqli->query($query);
    
    echo '<script>alert("UPLOAD SUCCESSFULLY");window.location="notesupload.php";</script>';
?>
<?php
      $notes_id = $_GET['notes_id'];
      $get = "select * from tbl_notes_details where notes_id='$notes_id' ";

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
         
      $row = $data->fetch_row();
      echo "<a href='Notes_upload/$row[5]' target='main_content'><img src='web/images/notes.png' 'height='45px' width='160px'/></a>";  echo "<a href='Video_upload/$row[6]' target='main_content'><img src='web/images/video.png' height'45px' width='160px'/></a>";
 ?>
 
 
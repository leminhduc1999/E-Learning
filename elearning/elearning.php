<?php
	ob_start();
	session_start();

	if($_SESSION['un']==""){
		header('location:login.php');
	}
	else{
		ob_start();

		$get = "select * from subject_master";

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
?>

<!DOCTYPE HTML>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
	<link href="web/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="web/css/camera.css" rel="stylesheet" type="text/css" media="all" />
	<script type='text/javascript' src="web/js/jquery.min.js"></script>
	<script type='text/javascript' src="web/js/jquery.mobile.customized.min.js"></script>
	<script type='text/javascript' src="web/js/jquery.easing.1.3.js"></script>
	<script type='text/javascript' src="web/js/camera.min.js"></script>
	</script>
</head>

<body>
	<div class="wrap">
		<div class="wrapper">
			<div class="elearn">
				<h3>Tute</h3>
			</div>
			<div class="header_right">
				<div class="cssmenu">
					<ul>
						<li><a href="profile.php"><span>Profile</span></a></li>
						<li class="active"><a href="elearning.php"><span>E-Learning</span></a></li>
						<li class="last"><a href="logout.php"><span>Logout</span></a></li>
						<div class="clear"></div>
					</ul>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="profhead">
		<div class="welcome"> Welcome </div>
		<div class="welcome">
			<?PHP echo $_SESSION['name'];?>
		</div>
		<div class="profile">
			<?PHP echo '<img src="profile_upload/'.$_SESSION['pic'].'"height"40px" width="40px" alt="'.$_SESSION['pic'].'"/>'; ?>
		</div>
	</div>

	<div class="main_bg">
		<div class="wrap">
			<div class="wrapper">
				<div class="main">
					<div class="clear">

						<?php 
		while($row = $data->fetch_row()){
			?>
				<?php /*?><tr>
					<td align="center"><a
							href="elearning_details.php?subject_name=<?php echo $row->subject;?>"><img
								class="imglogo" src="Logo_upload/<?php echo $row->logo;?>" height="150px"
								width="150px"> </a></td>
				</tr>
				<tr>
					<td align="center"><?php echo $row->subject;?></td>
				</tr>
				<tr>
					<td align="center"> <?php echo "<br>"?></td>
				</tr><?php */?>
				<ul id="subject_list">
					<li><a href="elearning_details.php?subject_name=<?php echo $row[1];?>"><img class="imglogo"
								src="Logo_upload/<?php echo $row[2];?>" height="150px" width="150px"> </a></li>
				</ul>
			<?php 
				}
			?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="wrap">
		<div class="wrapper">
			<div class="footer">
				<div class="social-icons">
					<ul>
						<li class="icon_1"><a href="#" target="_blank"> </a></li>
						<li class="icon_2"><a href="#" target="_blank"> </a></li>
						<li class="icon_3"><a href="#" target="_blank"> </a></li>
						<li class="icon_4"><a href="#" target="_blank"> </a></li>
						<div class="clear"></div>
					</ul>
				</div>
				<div class="copy">
					<p class="w3-link">E-Learning | &copy; 2015</p>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</body>

</html>
<?php
   }
?>
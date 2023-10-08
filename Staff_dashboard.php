<?php
session_start();
@include 'Conn.php';

/*if (strlen($_SESSION['aid']) == 0) {
  header('Location: logout.php');
} else {

1	
if (isset($_SESSION['user_name'])) {
    // User is logged in
    // You can perform actions for logged-in users here
} else {*/
?>


<!DOCTYPE html>
<html>
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!------- added css for sidebar ------------>

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>



		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

		<link href='https://fonts.googleapis.com/css?family=Lora' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Elsie' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">
		<!-- font awesome cdn link  -->
  		 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

		<title>Staff dashboard | Drs Dulang Hantaran</title>
		<!-- font awesome cdn link  --><link rel="stylesheet" href="css/dash_style.css?v=<?php echo time();?>">

	</head>
	
	<body>

<?php include_once('sidebar_staff.php')?>

				
<!----------------- CARD CONTENT --------------------->
			<main class="main-container">
				<div class="main-title">
					<span class="material-symbols-outlined">dashboard</span><h2 id ="dashboard">Drs Dulang Hantaran</h2>
				</div>
				<div class="main-title">
					<span class="ri-user-2-line"> </span><h2>Welcome! Staff</h2>
				</div>
				
<div id="mainmain">
              
<a href="currentorder.php"><i class="ri-store-2-line"></i><br>Current Order</a>      
<a href="completedorder.php"><i class="ri-list-check"></i><br> Completed order</a>     
<a href="customerchat.php"><i class="ri-group-fill"></i></i><br> Customer Chat</a>     


</div> 

	</body>
</html>
<?php /*} */ ?>
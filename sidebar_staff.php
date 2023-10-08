
<!------- added css for sidebar ------------>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

		<!--<link href='https://fonts.googleapis.com/css?family=Lora' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>-->

        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">
		<!-- font awesome cdn link  -->
  		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

		<!-- font awesome cdn link  --><link rel="stylesheet" href="css/dash_style.css?v=<?php echo time();?>">

	</head>

	<body>

<nav class="navbar bg-body-tertiary fixed-top my-custom-navbar" >
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Staff Dashboard</a>
<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" data-bs-placement="start" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
   <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="Staff_dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="CurrentOrder.php">Current Order</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="CompletedOrder.php">Completed Order</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="CustomerChat.php">Customer Chat</a>
          </li>
		  <li class="nav-item">
		     <a class="nav-link" href="Logout.php">Logout</a>
		  </li>
        </ul>
    </div>
  </div>
</nav>

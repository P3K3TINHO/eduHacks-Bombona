<?php
session_start();
if (!isset($_SESSION["username"])) {
    header('Location: ./index.php');  
}

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['logout']))
    {
        salirLogout();
    }
    function salirLogout()
    {
        include ('./logout.php');
       
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="./eduhacks.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card" style="border: inset 2px #FFC312; height: 75%; margin-top:5%;">
			<div class="card-header">
				<img class="logoimagen" src="./logo.png" style="width=20%;"></img>
                <h2 class="textologo" style="text-align:center;">WELCOME HOME HACKER</h2>
			</div>
			<div class="card-body">
				<div class="input-group form-group">
					<h4 style="text-align:center; color: #61FF00">You're ready for the fight?<h4>
				</div>
				<div class="form-group">
                    <form action="./welcome.php" method="POST">
                        <button type="submit" class="btn btn-warning btn-block" name="logout">Logout</button>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
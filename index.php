<?php 
if (isset($_COOKIE["PHPSESSID"])!=NULL) {
    session_start();
    if(isset($_SESSION["username"])){
        header('Location: ./welcome.php');
    }else{
        include ('./logout.php');
    }
}else {
        $error=0;
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $usuario=$_POST['username'];
            $password=$_POST['password'];
             require_once('./connectadb.php');
            try{
                require_once('./validarLogin.php');
            }catch(PDOException $e){
                    echo 'Error amb la BDs: ' . $e->getMessage();
            }
        }
    }

?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

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
		<div class="card" style="border: inset 2px #FFC312; height: 75%;">
			<div class="card-header">
				<img class="logoimagen" src="./logo.png"></img>
                <h2 class="textologo">EduHacks</h2>
			</div>
			<div class="card-body">
				<form method="post" action="index.php">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="username" placeholder="Usuario" >
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" placeholder="Password">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn" name="login_user">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="./register.php">Sign Up</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
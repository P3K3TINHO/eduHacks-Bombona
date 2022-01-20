<?php
    require_once ('./register.php');
    if($password===$password2){
        $passwordHasheada = password_hash($password, PASSWORD_DEFAULT);
        require_once('./connectadb.php');
    
        $sqlUsuariMail = "SELECT * FROM users WHERE username='$usuario'  or mail='$email' ";
        $validarUsuari = $db->query($sqlUsuariMail);
        
        if($validarUsuari->rowCount()>0){
            echo '<div class="alert alert-danger" role="alert">
                    El nombre de usuario o correo electronico ya existe
                    </div>"';
        }else{
          $veureTaula = "SELECT * FROM users";
          $consulta= $db->query($veureTaula);
          $idUsuari= $consulta->rowCount();
          $idUsuari = $idUsuari++;
          // echo $rowid;
          $fecha = date('y-m-d h:i:s');
          $sqlInserts = " INSERT INTO users 
		  	(iduser,mail,username,passHash,userFistName,userLastName,creationDate,removeDate,lastSignIn,active) 
			VALUES ('$idUsuari', '$email', '$usuario','$passwordHasheada','$firstname','$lastname','$fecha','$fecha','$fecha','1')";
          $consulta = $db->query($sqlInserts);
          echo '<div class="alert alert-success" role="alert">
                    Usuario registrado correctamente
                    </div>"';
          header('Location: ./index.php');  
        }
    }else{
        echo '<div class="alert alert-danger" role="alert">
                    Las contraseñas no coinciden
                    </div>"';
    }

?>

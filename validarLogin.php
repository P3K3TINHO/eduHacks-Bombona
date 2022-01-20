<?php
    require_once('./index.php');
    $sql = "SELECT * FROM users WHERE username='$usuario'  or mail='$usuario' and active = 1";
                $consulta = $db->query($sql);
                if($consulta->rowCount()>0){
                    foreach ($consulta as $fila) {
                            $contraseña=$fila['passHash'];
                            $idusuari=$fila['iduser'];
                    }
                    if(password_verify($password,$contraseña))
                    {
                        $fecha = date('y-m-d h:i:s');
                        $sqlUpdateTable = "UPDATE users SET lastSignIn='$fecha' WHERE username='$usuario'  
                            or mail='$usuario' and active = 1 ";
                        $consulta = $db->query($sqlUpdateTable);
                        session_start();
                        $_SESSION["username"] = $usuario;
                        header('Location: ./welcome.php');  
                    } else{
                            echo '<div class="alert alert-danger" role="alert">
                                        La contraseña es incorrecta
                                </div>"';
                    }
                }else {
                        echo '<div class="alert alert-danger" role="alert">
                                        Nombre de usuario incorrecto
                                    </div>"';
                }
?>
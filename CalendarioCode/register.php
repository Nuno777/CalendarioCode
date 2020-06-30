<?php
    session_start();

    //connect database
$db=mysqli_connect("localhost","root","","calendar");
    if(isset($_POST['register_btn'])){
        $username=($_POST['username']);
        $email=($_POST['email']);
        $password=($_POST['password']);
        $password2=($_POST['password2']);
                
        if($username && $email && $password && $password2){
            if($password==$password2){
                //create user
                //$password=password_hash($password,PASSWORD_DEFAULT);//segurança hash
                $password=md5($password);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
                $sql="INSERT INTO users(username,email,password) Values('$username','$email','$password')";
                mysqli_query($db,$sql);
                $_SEESION['message']="Login com sucesso.";
                $_SEESION['username']=$username;
                header("location: login.php"); //ir para outra pagina
            }
            else{
                $_SEESION['message']="A password não corresponde, tente novamente.";
            }
        }
        else if($username && $email && $password && $password2==""){
            $_SEESION['message']="Tem de preencher todos os campos.";
        }
    }                                                                                                                                                                                                                                                                                                                                                                                                                                       
?>
                            
<!DOCTYPE html>
<html>
<link rel="icon" type="image/jpg" href="img/calender.ico" />
<link href="css/StyleRegister.css" rel="stylesheet" />
<head>
    <title>Register</title>
</head>
<header>
    <div class="header">
        <h1>Registo</h1>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="Login.php">Login</a></li>
            </ul>
        </nav>
    </div>
</header>
<body>
    <?php
        if(isset($_SEESION['message'])){
            echo "<div id='error_msg'>".$_SEESION['message']."</div>";
            unset($_SEESION['message']);
        }
    ?>
    <form method="post" action="register.php">
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="username" class="textinput" required></td>
            </tr>

            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" class="textinput" required></td>
            </tr>

            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" class="textinput" required></td>
            </tr>

            <tr>
                <td>Confirm Password:</td>
                <td><input type="password" name="password2" class="textinput" required></td>
            </tr>

            <tr>
                <td><input type="submit" name="register_btn" value="Register" class="textregister"></td>
            </tr>
        </table>
    </form>
</body>
</html>
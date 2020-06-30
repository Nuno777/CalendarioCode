<?php
    session_start();

    //connect database
    $db=mysqli_connect("localhost","root","","calendar");

    if(isset($_POST['login_btn'])){
       $username=($_POST['username']);
       $password=($_POST['password']);
        $password=md5($password);//segurança
        $sql="SELECT*FROM users WHERE username='$username' AND password='$password'";
        $result=mysqli_query($db,$sql);
        if(mysqli_num_rows($result)==1){
            $_SEESION['message']="Login com sucesso.";
            $_SEESION['username']=$username;
            header("location: calendario.php"); //vai para o calendario
        }
        else{
            $_SEESION['message']="Nome ou Password incorreta, tente novamente.";
        }
    }
?>

<!DOCTYPE html>
<html>
<link rel="icon" type="image/jpg" href="img/calender.ico" />
<link href="css/StyleRegister.css" rel="stylesheet" />
<head>
    <title>Login</title>
</head>
<header>
    <div class="header">
        <h1>Login</h1>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="register.php">Registo</a></li>
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
    <form method="post" action="login.php">
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="username" class="textinput" required></td>
            </tr>

            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" class="textinput" required></td>
            </tr>

            <tr>
                <td><input type="submit" name="login_btn" value="Login" class="textregister"></td>
            </tr>
        </table>
    </form>
</body>
</html>
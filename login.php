<?php
session_start();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
<?php include 'navbar.php';?>
  <header>
  <h1 class=" centertext"><strong> Login </strong></h1>
  </header>
  <div class= "container">
    <form id ="myform" action="login.php" method="POST" class="myform">
        <div class="form-group">
            <label for="email">Email<br>
            <i class="fas fa-file-signature"></i>
            <input type="email" id="email" name="email" placeholder="esempio@mail.com" required>
        </div>
        <div class="form-group">
            <label for="nome">Pass<br>
            <i class="fas fa-file-signature"></i>
            <input type="password" id="pass" name="pass" placeholder="password" required>
        </div>
        <div>
            <input class="btn btn-primary btn-md" type="submit" value="Accedi">
        </div>
        <div>
            <input type="checkbox" value="remember-me"> Remember me
            <p>Non hai un account?<a class="btn btn-primary" href="registration.php" type="submit"> Registrati</a></p>
            <p>Hai dimenticato la password?<a class="btn btn-primary" href="enter_mail.php" type="submit"> Recupera Password</a></p>
        </div>
    </form>
</div>

<?php
  if(isset($_POST['submit'])){
        if (isset($_POST['email']) && isset($_POST['pass']))
        {
            echo" verificazione.... " ;
            include 'database.php';
            global $db;
            $q = $db-> prepare ("SELECT * FROM users WHERE email = :email");
            $q->execute(['email'=> $email]);
            $result = $q->fetch();
                if($result == true){
                    $hashpassword = $result['password'];
                        if( password_verify($pass,$hashpassword)){
                            $usr =$db-> prepare("SELECT * FROM users WHERE  email = :email  AND password=:password ");
                            $usr->execute(['email'=> $email ,'password'=> $hashpassword]);
                                if($usr->rowCount()>0){
                                    $_SESSION['id'] = $usr->fetch()['id'];
                                    $_SESSION['email'] =$email;
                                    setcookie("username",$_SESSION['nome'] , time() + (24*3600));
                                }
                                header( 'Location:site.php');
                            } else{
                                echo "password non corretta";
                            }
                }else{
                    echo" utente " .$email ."non esiste";
                }
        }else{
            echo"compilare tutti i campi";
        }
    }
?>

</body>
</html>
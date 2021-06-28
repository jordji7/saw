<!DOCTYPE html>
<html lang="it">
<head>
    <title>Registrazione</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/registration.css">
</head>

<body>
<?php include 'navbar.php';?>
  <header>
  <h1 class=" centertext"><strong> Registrazione </strong></h1>
  </header>
  <div class= "container">
    <form id ="myform" action="registration.php" method="POST" class="myform">
        <div class="form-group">
            <label for="nome">firstname<br>
            <i class="fas fa-file-signature"></i>
            <input type="text" id="nome" name="firstname" placeholder="Nome" required>
        </div>
        <div class="form-group">
            <label for="cognome">lastname<br>
            <i class="fas fa-file-signature"></i>
            <input type="text" id="name" name="lastname" placeholder="Cognome" required>
        </div>
        <div class="form-group">
            <label for="email">Email<br>
            <i class="fas fa-file-signature"></i>
            <input type="email" id="email" name="email" placeholder="Indirizzo E-mail" required>
        </div>
        <div class="form-group">
            <label for="Password">Pass<br>
            <i class="fas fa-file-signature"></i>
            <input type="password" id="pass" name="pass" placeholder="Password" required>
        </div>
        <div class="form-group">
            <label for="confirm Password">Confirm<br>
            <i class="fas fa-file-signature"></i>
            <input type="password" id="confirm" name="confirm" placeholder="Confirm Password" required>
        </div>
        <div>
            <input class="btn btn-primary btn-md" type="submit" value="Registrati">
        </div>
        <div>
           <p>Hai già un account?<a class="btn btn-primary" href="login.php" type="submit">Accedi</a></p>
        </div>
      </form>
  </div>

<?php

include "database.php" ;
$firstname = $lastname = $email = $pass = $confirm = "";

if(isset($_POST['submit'])){
    $firstname = test_input($_POST["firstname"]);
    $lastname  = test_input($_POST["lastname"]);
    $email   = test_input($_POST["email"]);
    $pass = test_input($_POST["pass"]);
    $Confirm_Password  = test_input($_POST["confirm"]);

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
        return $data;
    }

    if( isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST["confirm"]) ){
      
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $reqemail =$bdd->prepare("SELECT * FROM users WHERE email = ?");
            $reqemail->execute(array($email));
            $emailexist = $reqemail->rowCount();
            if($emailexist == 0) {
               if($pass ==$confirm) {
                  $insertusr = $bdd->prepare("INSERT INTO users(firstname,lastname, email, pass) VALUES(?, ?, ?, ?)");
                  $insertusr->execute(array($firstname, $lastname, $email, $pass));
                  $error = "il tuo account è stato creato !";
               } else {
                  $error = "le password non corrispondono!";
               }
            } else {
              $error = "indirizzo mail già usato !";
            }
         } else {
            $error = "email non valida !";
         }
   
    } else {
        $error ="compilare tutti i campi!";
    }
}

?>
</body>
</html>

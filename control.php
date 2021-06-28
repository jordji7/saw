<?php 

session_start();
$errors = [];
$user_id = "";

// connessione al database
require ("database.php");


/*Accetta l'email dell'utente la cui password deve essere reimpostata
 Invia un messaggio di posta elettronica all'utente per reimpostare la password
*/


if (isset($_POST['resetpassword'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  // verifica che l'utente sia registrato dentro il nostro database
  $query = "SELECT email FROM users WHERE email='$email'";
  $results = mysqli_query($db, $query);

  if (empty($email)) {
    array_push($errors, "Il tuo indirizzo email è richiesto");
  }else if(mysqli_num_rows($results) <= 0) {
    array_push($errors, "Mi dispiace, non abbiamo un utente con questa mail nel nostro database");
  }
  // genera un unico token a random con lunghezza 100
  $token = bin2hex(random_bytes(50));

  if (count($errors) == 0) {
//memorizza il token nella tabella del database di reimpostazione della password rispetto all'email dell'utente
    $sql = "INSERT INTO password_reset(email, token) VALUES ('$email', '$token')";
    $results = mysqli_query($db, $sql);

   // Invia un messaggio di posta elettronica all'utente con il token in un collegamento dove potrà modificare la password
    $to = $email;
    $subject = "Reset your password on Books&Notes.com";
    $msg = "Ciao!!, clicca qui <a href=\"newpass.php?token=" . $token . "\">link</a> per modificare la tua password sul nostro sito";
    $msg = wordwrap($msg,70);
    $headers = "From: info@sosSolidarità.com";
    mail($to, $subject, $msg, $headers);
    header('location: pending.php?email=' . $email);
  }
}

// Inserire la nuova passowrd
if (isset($_POST['newpass'])){
  $pass= mysqli_real_escape_string($db, $_POST['pass']);
  $confirm = mysqli_real_escape_string($db, $_POST['confirm']);

//Prendi il token proveniente dal collegamento e-mail
  $token = $_SESSION['token'];
  if (empty($pass) || empty($confirm)) array_push($errors, "E' richiesta una Password");
  if ($pass != $confirm) array_push($errors, "Le Password non corrispondono");
  if (count($errors) == 0) {
    // seleziona l'indirizzo email dell'utente dalla tabella password_reset
    $sql = "SELECT email FROM password_reset WHERE token='$token' LIMIT 1";
    $results = mysqli_query($db, $sql);
    $email = mysqli_fetch_assoc($results)['email'];

    if ($email) {
      $pass = password_hash($pass);
      $sql = "UPDATE users SET password='$pass' WHERE email='$email'";
      $results = mysqli_query($db, $sql);
      header('location: index.php');
    }
  }
}
?>
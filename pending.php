<?php include('login.php'); ?>
<?php include('control.php'); ?>

<!DOCTYPE html>
<html lang="it">
<head>

	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel = "stylesheet" href="css/mailform.css">

	<title>Password Reset </title>

</head>
<body>

	<form class="login-form" action="login.php" method="post" style="text-align: center;">
		<p>
			Abbiamo mandato una mail all'indirizzo <b><?php echo $_GET['email'] ?></b> 
			per aiutarti a recuperare il tuo account. 
		</p>
	    <p>Accedi al tuo account e-mail e fai clic sul collegamento che ti abbiamo inviato per reimpostare la password</p>
	</form>
		
</body>
</html>
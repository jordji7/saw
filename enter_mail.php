<!DOCTYPE html>
<html lang="it">
<head>
	<title>Recupera Password </title>
	<meta charset="UTF-8">
	<!--css-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/mail.css">
</head>
<body>

	<header>
        <h1 class=" centertext"> Recupera Password </h1>
    </header>
	<div class="container">
	  <form class="mail-form" action="newpass.php" method="POST"> 
		<div class="form-group">
    		<label for="email">Email<br>
    		<i class="fas fa-file-signature"></i>
    		<input type="email" id="email" name="email" placeholder="esempio@mail.com" required>
		</div> 
		<div>
        	<input class="btn btn-primary btn-lg" type="submit" name ="resetpassword" a href = "newpass.php" value="Recupera">
		</div>
	 </form>
   </div>
</body>
</html>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min">
        <link rel = "stylesheet" href="css/mailform.css">

        <title>Recupera Password</title>
    </head>
    <body>
        <header class="container">
            <h1 class = "centertext">Inserisce la nuova Password</h1>   
        </header>
        
        <div class = container>
        <p>Inserisci la nuova password per questo account :</p><br>
            <form id ="formpass" action="newpass.php" method="POST" class="myform">
                <div class="form-group">
                    <label for="nome">Pass<br>
                    <i class="fas fa-file-signature"></i>
                    <input type="password" id="pass" name="pass" placeholder="nuova password" required>
                </div>
                <div class="form-group">
                    <label for="nome">Confirm<br>
                    <i class="fas fa-file-signature"></i>
                    <input type="password" id="confirm" name="confirm" placeholder="stessa password" required>
                </div>
                <div>
                    <input class="btn btn-primary btn-md" type="submit" name ="newpass" value="Recupera la password">
                </div>
            </form>
        </div>
    </body>

</html>

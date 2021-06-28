<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/form_mail.css">
    <title> Newsletter </title>
</head>
<body>
    <header>
        <h1 class=" centertext"><strong> Newsletter </strong></h1>
    </header>
    <div class="container">
        <form id ="myform" action="indexMail.php" method = POST>
            <div class="row">
                <div class="col-25">
                    <label for="Nome">Nome</label>
                </div>
                <div class="col-75">
                    <input type="text" id="Nome" name="firstname" placeholder="Il tuo nome..">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="Email"> Email </label>
                </div>
                <div class="col-75">
                    <input type="email" id="email" name="email" placeholder="esempio@mail.com..">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for = "Oggetto"> Oggetto </label>
                </div>
                <div class="col-75">
                    <input type="text" id="oggetto" name="oggetto" placeholder="Scrivi l'oggetto..">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="subject">Subject</label>
                </div>
                    <div class="col-75">
                        <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
                    </div>
                </div>
            </div>
            <div>
            <input class="btn btn-primary btn-md" type="submit" value="Invia">
            </div>
        </form>
    </div>
</body>
</html>
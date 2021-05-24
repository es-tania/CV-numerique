<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/formulaire.css">
    <title>formulaire de contact</title>
</head>

<body>
    <form action="envoi.php" method="get">
        <fieldset>
            <legend>Pour me contacter</legend>
            <input type="text" name="nom" id="nom" placeholder="Nom*" required pattern="[A-Za-z]+">
            <input type="text" name="prenom" id="prenom" placeholder="Prénom*" required pattern="[A-Za-z]+"><br>
            <input type="email" name="email" id="email" placeholder="Email*" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br>
            <textarea rows="5" cols="40" name="message" placeholder="Message"></textarea><br>
            <input type="submit" id="envoi" value="Envoyer">
        </fieldset>
    </form>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="assets/app.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire de contact</title>
</head>

<body>
    <form action="envoi.php" method="get">
        <fieldset>
            <legend>Pour me contacter</legend>
            <input type="text" name="nom" id="nom" placeholder="Nom*">
            <input type="text" name="prenom" id="prenom" placeholder="Prénom*"><br>
            <input type="email" name="email" id="email" placeholder="Email*"><br>
            <textarea rows="5" cols="40" name="message" placeholder="Message"></textarea><br>
            <input type="submit" id="envoi" value="Envoyer">
        </fieldset>
    </form>
</body>

</html>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Formulaire de contact</title>
</head>

<style>

@font-face {
    font-family: 'SpaceAge';
    src: url(assets/fonts/SpaceAge.woff) format('woff'),
    url(assets/fonts/SpaceAge.woff2) format('woff2');
}
@font-face {
    font-family: 'Arial Rounded MT Bold';
    src: url(assets/fonts/ArialRoundedMTBold.woff) format('woff'),
    url(assets/fonts/ArialRoundedMTBold.woff2) format('woff2');
}
body {
    overflow-y: hidden;
    cursor: url("assets/image/curseur.png"), auto;
    background-image: url("assets/image/galaxie.jpg");
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column; 
}
h1 {
    font-family: 'SpaceAge', sans-serif ;
    font-size: 2rem;
    color: white;
    text-align: center;
}
p {
    font-family:'Arial Rounded MT Bold', sans-serif;
    color: white;
    text-align: center;
    font-size: 1.125rem;
    padding: 5px;
}
a{
    text-decoration: none;
    text-align: center;
    color: white;
    background-color: #39854c;
    padding: 5px;
    border-radius: 20px;
    width: 12vw;
    font-family: 'Arial Rounded MT Bold', sans-serif;
    font-size: 1.125rem;
    transition: background-color 0.8s ease;
}


</style>

<body>
    <?php 

    include('secret.php');

    if(isset($_GET["courriel"])){
        if(isset($_GET["message"])){
        $sql = "INSERT INTO astro_formulaire(nom_utilisateur, prenom_utilisateur, courriel, `message`) VALUES (:nom, :prenom, :email, :message)";

        $req = $link -> prepare($sql);

        $req -> execute(array(":nom"=> $_GET["nom_utilisateur"],":prenom"=> $_GET["prenom_utilisateur"],":email"=> $_GET["courriel"], ":message"=> $_GET["message"]));
        $req = null;

        echo "<h1>Merci pour votre message !</h1>";
        }else{
         echo("<p>Merci de remplir le message</p>");
        }
    }else{
        echo("<p>Merci d'indiquer votre adresse mail</p>");
    };
?>
    <a href="index.php">Retour à l'accueil</a>
</body>

</html>
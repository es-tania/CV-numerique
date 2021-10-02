<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <style>
        a {
            text-decoration: none;
            background-color: pink;
            padding: 10px;
            border-radius: 3px;
            border: solid pink;
            color: black;
        }

        body {
            overflow-y: hidden;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        h1 {
            font-family: 'Hanleypro', sans-serif;
            font-size: 2rem;
            color: white;
            text-align: center;
        }

        p {
            font-family: 'Raleway', sans-serif;
            color: white;
            text-align: center;
            font-size: 1.125rem;
            padding: 5px;
        }

        a {
            text-decoration: none;
            text-align: center;
            color: white;
            background-color: #39854c;
            padding: 5px;
            border-radius: 20px;
            width: 12vw;
            font-family: 'Raleway', sans-serif;
            font-size: 1.125rem;
            transition: background-color 0.8s ease;
        }
    </style>
    <title>Formulaire de contact</title>
</head>

<body>
    <?php 

    // $link = new PDO('mysql:host=localhost;dbname=base_perso', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $link=new PDO('mysql:host=sqletud.u-pem.fr;dbname=testev01_db', 'testev01', 'taniammi', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    if(isset($_GET["email"])){
        if(isset($_GET["message"])){
        $sql = "INSERT INTO cv_formulaire_contact(nom, prenom, email, `message`) VALUES (:nom, :prenom, :email, :message)";

        $req = $link -> prepare($sql);

        $req -> execute(array(":nom"=> $_GET["nom"],":prenom"=> $_GET["prenom"],":email"=> $_GET["email"], ":message"=> $_GET["message"]));
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
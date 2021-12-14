<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <style>
        a {
            text-decoration: none;
            padding: 10px;
            border-radius: 3px;
            border: solid black 2px;
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
            font-family: 'Raleway';
            font-size: 2rem;
            color: black;
            text-align: center;
        }

        p {
            font-family: 'Raleway', sans-serif;
            color: black;
            text-align: center;
            font-size: 1.125rem;
            padding: 5px;
        }

        a {
            text-decoration: none;
            text-align: center;
            color: black;
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
    // $link=new PDO('mysql:host=sqletud.u-pem.fr;dbname=testev01_db', 'testev01', 'taniammi', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    $link = new PDO('db5006036876.hosting-data.io', 'dbu1701939', 'Labddpersodetania123@', 'dbs5056577', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

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
    <a href="index.html">Retour à l'accueil</a>
</body>

</html>
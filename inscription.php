<?php 
    
        if(isset($_POST["login"]) AND isset($_POST["prenom"]) AND isset($_POST["nom"]) AND isset($_POST["password"]) AND isset($_POST["password2"]))
        
        {  
            if(!empty($_POST["login"]) AND !empty($_POST["prenom"]) AND !empty($_POST["nom"]) AND !empty($_POST["password"]) AND !empty($_POST["password2"])) 
            
            {  
                $login=htmlspecialchars($_POST["login"]);
                $prenom=htmlspecialchars($_POST["prenom"]);
                $nom=htmlspecialchars($_POST["nom"]);
                $password=htmlspecialchars($_POST["password"]);
                $password2 =htmlspecialchars ($_POST['password2']);
                if($password==$password2){

                $mysqli=new mysqli("localhost", "root", "","moduleconnexion");
                $requete = "INSERT INTO `utilisateurs`(`login`, `prenom`, `nom`, `password`) VALUES ('$login', '$prenom', '$nom', '$password')";
                mysqli_query($mysqli,$requete);
                header('Location:http://localhost/moduleconnexion/connexion.php');

            }
            
            else {
                $message="Les mots de passes ne correspondent pas";
            }
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/style.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>
<body>
<form method="post" action="">
    <ul>
        <li>
            <label for="login">login : </label><input type="text" name="login" id="login" placeholder="login" required/>
        </li><br/><br/>

        <li>
            <label for="prenom">Prénom : </label><input type="text" name="prenom" id="prenom" placeholder="Entrez votre prenom" required/>
        </li><br/><br/>
        
        <li>
            <label for="nom"> Nom : </label><input type="text" name="nom" id="nom" placeholder="Entrez votre nom" required/>
        </li><br/><br/>

        <li>
            <label for="password">password : </label><input type="password" name="password" id="password" placeholder="Entrez votre mot de passe" required/>
        </li><br/><br/>
        <li>
        <label for="password">confirmation : </label><input type="password" name="password2" id="password" placeholder="Confirmer votre password" required/><br/><br/>
        </li>
        <li>
            <input type="submit" value="Envoyer" />
        </li>
    </ul><br/><br/>

    <?php 
        if(isset($message)){
        echo "<mes>",$message,"</mes>";    
        }
    ?>
    
</form>

</body>
</html>



    

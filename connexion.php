
<?php  

session_start();

if(isset($_POST['submit']))
{   
    {
    $login = $_POST['login'];
    $password= $_POST['password'];
        
    if($login&&$password)
    {
        $bd = mysqli_connect("localhost","root","","moduleconnexion");
        $requete = mysqli_query($bd, "SELECT*FROM users WHERE login ='$login'&&password='$password'");
        
        $resultat = mysqli_num_rows($requete);
        if($resultat==1);
        {
            $_SESSION['connexion'] =  $login ;
            header('location: profil.php');
            exit();    
        }
        /*$resultat2 = mysqli_fetch_row($requete);
        $verify = password_verify($password, $resultat2[1]);*/

    }else echo"Veuillez saisir tous les champs";
    
    }  
    /*
    if($verify==true)
    {
        if($resultat2[0]=='admin')
        {
            $_SESSION['admin'] = 'admin'; 
            header('location: admin.php');
            exit();
        }

        
    }*/
}


?>

<form method="post" action="">

    <label for="login">login : </label><input type="text" name="login" id="login" placeholder="login" required/><br/><br/>

    <label for="password">password : </label><input type="password" name="password" id="password" placeholder="Entrez votre mot de passe" required/><br/><br/>

    <input type="submit" value="Envoyer" />
</form>



session_start();

if(isset($_POST['submit']))
{   
    if(!empty($_POST))
    {
    $login = $_POST['login'];
    $password= $_POST['password'];    
    $bd = mysqli_connect("localhost","root","","moduleconnexion");
    $requete = mysqli_query($bd, "SELECT login, password FROM `utilisateurs` WHERE login='$login' ");
    
    $resultat = mysqli_num_rows($requete);
    
    $resultat2 = mysqli_fetch_row($requete);
    
    $verify = password_verify($password, $resultat2[1]);
    }  
    
    if($verify==true)
    {
        if($resultat2[0]=='admin')
        {
            $_SESSION['admin'] = 'admin'; 
            header('location: admin.php');
            exit();
        }

        if($resultat==1);
        {
            $_SESSION['connexion'] =  $login ;
            header('location: profil.php');
            exit();
        }
        
    }
}









/*$login=$_POST["login"];
$password=$_POST["password"];

if (isset ($login) AND isset ($password)){
    $mysqli=new mysqli("localhost", "root", "","moduleconnexion");
   echo "$login, $password";
    $requete = $mysqli -> query("SELECT * FROM `utilisateurs` WHERE `login` = '$login' and `password` = '$password'"); 
    var_dump($request);
        //affiche les infos
        if(($result = $request -> fetch_array()) != null){
            var_dump($result);
   }
    else {
    echo "Erreur de connexion, veuillez réesayer.";
   }
}

else {
    echo "Erreur de connexion, veuillez réesayer.";
}
}*/
?>

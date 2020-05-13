<?php
    require "validator.php";
    session_start();
    $isValid = false;
    // $_SESSION["userid"] = "manu";
    $validate = new validator();
    $validate->isEmpty("username");
    $validate->isEmpty("email");
    $validate->isEmail("email");
    $validate->isEmpty("password");
  
    
    ?>

<!DOCTYPE html>
<html>
    <!-- <head>
        <meta charset="utf-8" />
        <title>POO</title>
        <link href="style/style.css" rel="stylesheet" /> 
        <script  defer src="js/script.js"></script>
    </head> -->
    <head>
    <title>POO</title>
    <?php
        require 'htmlClass.php';
        $html = new html();
        echo $html->meta();
        echo $html->css("style/style/css");
        echo $html->js("js/script.js");
    ?>
    </head>
    <body> 
        <?php 
        require "user.php";
        require "dbConnect.php";
        require "form.php";

        $bdd = new db("user");

        $formNewAcc = new form($_POST);
        echo "<h2>Create acc</h2>";
        echo $formNewAcc->create('#','POST');
        echo $formNewAcc->input('text','username');
        echo $formNewAcc->input('email','email');
        echo $formNewAcc->input('password','password');
        echo $formNewAcc->submit ('envoyer');
        echo $formNewAcc->endform ();
        
        $user1 = new user($bdd->getDb());
        if(!empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["password"])){
            $isValid=true;
            var_dump($isValid);
            $_POST["username"] =  $validate->isString($_POST["username"]);
            $_POST["email"] = $validate->isEmail($_POST["email"]);
            $_POST["password"] =  $validate->isString($_POST["password"]);
            // $user1->addToDb();
            
        }
        echo "<hr>";
        
        $formLogin = new form($_POST) ;
        

        $logUser = new user($bdd->getDb());
        echo "<h2>Login</h2>";
        echo $formLogin->create('#','POST');
        echo $formLogin->input('text','logUsername');
        echo $formLogin->input('password','logPassword');
        echo $formLogin->submit ('login');
        echo $formLogin->submit ('logout');
        echo $formLogin->endform ();

        if (isset($_POST["logUsername"]) && isset($_POST["logPassword"])){
        if (!empty($_POST["logUsername"] && !empty($_POST["logPassword"]))){
            $user1->log($_POST["logUsername"]);
            var_dump($_SESSION['user']);
        }}

        echo "<hr>";
        $formUpdateAccount = new form ($_POST);
        echo "<h2>Update acc</h2>";
        echo $formUpdateAccount->create('#','POST');
        echo $formUpdateAccount->input("text","newUsername");
        echo $formUpdateAccount->input('email','newEmail');
        echo $formUpdateAccount->submit ('envoyer');
        echo $formUpdateAccount->endform ();

        if(!empty($_POST["newUsername"]) || !empty($_POST["newEmail"])){
            var_dump($_SESSION['user']);
            $user1->updateDb($_SESSION['user']);
        }


        $formDelete = new form ($_POST);
        echo "<h2>Delete acc</h2>";
        echo $formDelete->create('#','POST');
        echo "write :";
        echo $formUpdateAccount->input ("text","ok");
        echo $formUpdateAccount->submit ('delete');
        echo $formUpdateAccount->endform ();
        $user1->delete($_SESSION['user']);
        ?>
        
    </body>
</html>
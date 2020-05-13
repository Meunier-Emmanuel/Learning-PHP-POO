
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
        require 'validator.php';
        require 'helperClass1.php';
        $form = new form($_POST);
        $validate=new validator($_POST);

        if (isset($_POST['username'])){
        $validate->verifyInput( $_POST['username']);
        }else{
        echo "error";
        }
        $isEmail = function($var)
    {
        $var = filter_var($var,FILTER_SANITIZE_EMAIL);
        $var =  filter_var($var,FILTER_VALIDATE_EMAIL);
        return $var;
    };
        // var_dump($_POST);
        echo $form->create('#','POST');
        echo $form->input('text','username',$isEmail);
        echo $form->openSelect('pets');
        echo $form->option('dog');
        echo $form->option('cat');
        echo $form->option('fish');
        echo $form->closeSelect();
        echo $form->submit ('envoyer');
        // echo $form->input('textarea','text');




        require ("carPark.php");
        $audi = new car("BE-156419",19-12-2010,20000,"r8","audi","red",2);
        var_dump($audi);
        $bm = new car("FR-519618",19-12-2010,20000,"r8","bm","red",3.8);
        $bm->ride();
        var_dump($bm);

        ?>
        
    </body>
</html>
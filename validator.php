<?php
    
class validator{
    

    public function __construct ($data = array()){
        $this->data = $data;
    }

    public function verifyInput($var)
    {
        // var_dump($var);
        $var = trim ($var);
        $var = stripslashes($var);
        $var = strip_tags($var);
        $var = htmlspecialchars($var);
        // var_dump($var);
        return $var;
    }
    
    public function isEmail($var){
        $var = filter_var($var,FILTER_SANITIZE_EMAIL);
        $var =  filter_var($var,FILTER_VALIDATE_EMAIL);
        $var = $this->verifyInput($var);
        return $var;
    }

    public function isString($var){
        $var = filter_var($var,FILTER_SANITIZE_STRING);
        $var = $this->verifyInput($var);
        return $var;
    }


    public function isEmpty($name){
        if(empty($_POST[$name])){
            echo  'you forget your '.$name.'<br>';
        }
    }
    
    
    
    // public function isEmpty($var){
    //     if (empty($var))
    //     {
    //        echo "erreur";
    //     }
    // }
    
}



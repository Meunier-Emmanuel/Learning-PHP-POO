<?php
class user {
    private $id;
    private $username;
    private $email;
    private $password;
    private $connected;
    private $db;
    

    public function __construct($db){
        $this->db = $db;
    }
    
    // add user into DB
    public function addToDb(){
        
            $newTask = $this->db->prepare(
                'INSERT INTO users(username,email,password,connected)
                VALUES(:username,:email,:password,false);
                ');
            $newTask->execute([
                'username'=> $_POST['username'],
                'email'=> $_POST['email'],
                'password'=> $_POST['password'],
            ]);
    }
    
    // update data from user
    public function updateDb($user){
        $upDate = $this->db->prepare(
            "UPDATE users 
            SET
            username = :newUsername,
            email = :newEmail
            
            WHERE username ='$user'");
        $upDate->execute([
            'newUsername'=> $_POST['newUsername'],
            'newEmail'=> $_POST['newEmail']]);
            echo ($_SESSION['user']);

            $_SESSION['user']=$_POST['newUsername'];
            $_SESSION['email']=$_POST['newEmail'];
    }
        
    // delete account
    public function delete($user){

        $del=$this->db->prepare(
            "DELETE FROM users 
            WHERE username ='$user'");
            
        if(isset($_POST["ok"])){
            $del->execute();
            }
    }

    // log user -> select from db -> update db to change connected value
    public function log($user){
        $login = $this->db->query(
        'SELECT * FROM users 
        WHERE username="'.$user.'"'
        );

        $data=$login->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($data);
        // var_dump($user);
        if($_POST["logPassword"] == $data[0]['password']){
                $_SESSION['user']=$user;
                $email = $data[0]['email'];
                $_SESSION['email']=$email;
                // echo $_SESSION['user'].'   connected';
                $connect= $this->db->prepare("UPDATE users 
                SET connected = :connected
                WHERE username = '$user'");
            $connect->execute([
                'connected'=>"1",
                ]);
        }
        // if (isset($_POST["logout"])){
        //     $connect= $this->db->prepare("UPDATE users 
        //         SET connected = :connected
        //         WHERE username = '$user'");
        //     $connect->execute([
        //         'connected'=>"0"
        //         ]);
        //     session_destroy();
        // }
                
        // echo $_SESSION['user'].'   connected';
            
    }
    //change connected value to 0 
    public function logout(){
            $user = $_SESSION['user'];
            $connect= $this->db->prepare(
                "UPDATE users 
                SET connected = :connected
                WHERE username = '$user'"
                );

            $connect->execute([
                'connected'=>"0"
                ]);
            session_destroy();
    }



    // setter
    public function setid($id){
        $this->id = $id;
    }
    public function setUsername($username){
        $this->username = $username;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setConnected($connected){
        $this->connected = $connected;
    }
}

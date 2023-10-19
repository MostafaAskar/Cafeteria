<?php

namespace App\Classes;
use PDO;

class Users extends Database {
    private $email, $password,$name ,$room,$ext, $image ;
   
     
    public function AuthUser($email){
        $result = $this->runDML("SELECT * FROM users where email='$email'");
        return $result->fetchAll(PDO::FETCH_ASSOC);



    }

    public function getAll()
    {
        $result = $this->runDML("SELECT * FROM users WHERE is_admin = 'user' ");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // public function getAdminDetails()
    // {
    //     $result = $this->runDML("SELECT * FROM users WHERE is_admin = 'admin' ");
    //     return $result->fetchAll(PDO::FETCH_ASSOC);
    // }

    public function store()
    {
        // echo $this->validate($this->dno) ;

        // if ($this->validate($this->product)){
        $this->runDML("INSERT INTO `users`( `name`, `email`,`password`,`room`, `ext`, `image`) VALUES ('$this->name','$this->email','$this->password','$this->room','$this->ext','$this->image' )");
        header("location: index.php");
        // } else {
        //     echo "Not Valid ya sadeeeeeeqeeeee";
        //     // die();
        // }
    }

    public function edit($id)
    {
        $result = $this->runDML("SELECT * FROM users WHERE id=$id");
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id)
    {

        // if ($this->validate($this->product)) {

            // UPDATE `users` SET `name`='$this->name',`email`='$this->email',`password`='$this->password',`room`='$this->room',`ext`='$this->ext',`image`='$this->image' WHERE id =$id  
        $this->runDML("UPDATE `users` SET `name`='$this->name',`email`='$this->email',`password`='$this->password',`room`='$this->room',`ext`='$this->ext',`image`='$this->image' WHERE id =$id ");
        header("location: index.php");
        // } else {
        //     echo "Not Valid ya sadeeeeeeqeeeee";
        // }
    }
    public function destroy($id)
    {
        $this->runDML("DELETE FROM users WHERE id=$id ");
        header("location: index.php");
    }



    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {

            $value = trim(htmlspecialchars($value));
            $this->$name = $value;
        } else {
            echo "not valid...";
        }
        
    }


}

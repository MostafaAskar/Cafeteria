<?php
session_start();
require_once '../admin/vendor/autoload.php';
use App\Classes\Users;

$req = new Users();

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $result= $req->AuthUser($email);
    // var_dump();
    if($result[0]["is_admin"] == 'admin'){
        header("location: ../admin/home.php");
    }
    else if($result[0]["is_admin"] == 'user'){
        $_SESSION['name'] = $result[0]["name"];
        $_SESSION['user_id'] = $result[0]["id"];

        header("location: ../index.php");

    }else{
        header("location: ../auth/signup.php");

    }
    
}
?>
<!-- <a href="../auth/signup.php"></a> -->

<?php
require_once('../vendor/autoload.php');
use App\Classes\Users;

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
}

$user =new Users();

$user->destroy($id);

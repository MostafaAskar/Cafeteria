<?php
require_once('../vendor/autoload.php');
use App\Classes\Products;

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
}

$prod =new Products();

$prod->destroy($id);

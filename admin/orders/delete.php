<?php
require_once('../vendor/autoload.php');

use App\Classes\Orders;


if(isset($_GET['id'])){
    $id = $_GET['id'];
    
}

$order =new Orders();

$order->destroy($id);

<?php
require_once('../vendor/autoload.php');

use App\Classes\Orders;
use App\Classes\Products;
use App\Classes\Users;

// if (isset($_GET['id'])) {
//     $id = $_GET['id'];
// } else {
//     $id = 0;
// }

// $user = new Users();
// $products = $prod->getAll();
// $user = $user->edit(4);
// $idUser = $user["id"];
// $nameProduct = $product['name'];
// $priceProduct = $product['price'];


if(isset($_POST['submit'])){

  $product_id= $_POST['productId'];
  $user_id= $_POST['userId'];


  // $prod = new Products();
  // // $products = $prod->getAll();
  // $product = $prod->show($id);
  // $id = $product["id"];
  // $nameProduct = $product['name'];
  // $priceProduct = $product['price'];
  


  $amount= $_POST['amount'];
  $notes= $_POST['notes'];


  $order = new Orders ;
  $order->notes =$_POST['notes'];
  $order->room ='2000';
  $order->amount =$_POST['amount'];
  $order->product_id =$product_id ;
  $order->user_id =$user_id ;
  $order->store();



  





}

?>


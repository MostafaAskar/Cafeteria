<?php
require_once("../admin/vendor/autoload.php");
use App\Classes\Users;

 if (isset($_POST['submit'])) {
  // $name = $_POST['username'];
  // $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmpassword = $_POST['confirm_password'];
  // $RoomNo = $_POST['room'];
  // $Ext = $_POST['ext'];

  //prepare file
  $image = $_FILES['image'];
  $imageName = $image['name'];
  $imageTmpName = $image['tmp_name'];

  $imgExtension = ["jpg", "png", "jpeg", "gif", "psd"];
$imageNameExtenction = pathinfo($imageName, PATHINFO_EXTENSION);
  if (in_array(strtolower($imageNameExtenction), $imgExtension)) {
      $imageNameWithoutExtenction = pathinfo($imageName, PATHINFO_FILENAME);
      $imageNewName = "$imageNameWithoutExtenction-"  . uniqid() . ".$imageNameExtenction";
      move_uploaded_file($imageTmpName, "../admin/users/upload.user/$imageNewName");
  } else {
      echo " your image must be end extension image  " . "<br>";
  }




  if($password  == $confirmpassword){
  $user = new Users;
  $user->name = $_POST['username'];
  $user->email = $_POST['email'];
  $user->password = $_POST['password'];

  $user->confirm_password = $_POST['confirm_password'];
  $user->room =  $_POST['room'];
  $user->ext = $_POST['ext'];
  $user->image = $imageNewName;
  $user->store();
  header("location: login.php");

}else{
  echo "confirm Password Not Correct" ;
  
}

}
 ?>

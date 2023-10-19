<?php

namespace App\Classes;

use App\Interfaces\CrudInterface;
use PDO;
use App\Traits\Validate;

class Orders extends Database 
{
    use Validate;
    private $status, $amount,$notes,$room, $product_id, $user_id;

    // public function getAllordersandusers()
    // {

    //     $result = $this->runDML("SELECT products.*, users.* FROM users left join products ");

    //     return $result->fetchAll(PDO::FETCH_ASSOC);
    // }
    public function getAll()
    {

        $result = $this->runDML("SELECT * FROM orders");

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function lastorder($id)
    {

        $result = $this->runDML("SELECT products.name FROM products left join orders on orders.user_id =$id");

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function store()
    {
        // echo $this->validate($this->dno) ;

        // if ($this->validate($this->product)){
        $this->runDML("INSERT INTO `orders`( `status`, `amount`, `notes`, `room`, `product_id`, `user_id`) VALUES ('Processing','$this->amount','$this->notes','$this->room','$this->product_id','$this->user_id' )");
        header("location: ../../index.php");
        // } else {
        //     echo "Not Valid ya sadeeeeeeqeeeee";
        //     // die();
        // }
    }

    public function edit($id)
    {
        $result = $this->runDML("SELECT * FROM products WHERE id=$id");
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id)
    {

        // if ($this->validate($this->product)) {

        // UPDATE `products` SET `name`='$this->product',`category`='$this->category',`price`='$this->price',`image`='$this->image' WHERE id=$id
        // $this->runDML("UPDATE `products` SET `name`='$this->product',`category`='$this->category',`price`='$this->price',`image`='$this->image' WHERE id=$id");
        header("location: index.php");
        // } else {
        //     echo "Not Valid ya sadeeeeeeqeeeee";
        // }
    }
    public function destroy($id)
    {
        $this->runDML("DELETE FROM orders WHERE id=$id ");
        header("location: ../../admin/orders/index.php");
    }
    


    public function showMyOrder($id)
    {
        $result = $this->runDML("SELECT products.* , orders.* FROM products left join orders on user_id=$id");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function __set($key, $value)
    {

        if (property_exists($this, $key)) {

            $value = trim(htmlspecialchars($value));
            $this->$key = $value;
        } else {
            echo "not valid...";
        }
    }
}

?>

<?php

namespace App\Classes;

use App\Interfaces\CrudInterface;
use PDO;
use App\Traits\Validate;

class Products extends Database implements CrudInterface
{
    use Validate;
    private $product, $price, $category, $image;

    public function getAll()
    {
        $result = $this->runDML("SELECT * FROM products");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function store()
    {
        // echo $this->validate($this->dno) ;

        // if ($this->validate($this->product)){
        $this->runDML("INSERT INTO `products`( `name`, `category`, `price`, `image`) VALUES ('$this->product','$this->category','$this->price','$this->image' )");
        header("location: index.php");
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
        $this->runDML("UPDATE `products` SET `name`='$this->product',`category`='$this->category',`price`='$this->price',`image`='$this->image' WHERE id=$id");
        header("location: index.php");
        // } else {
        //     echo "Not Valid ya sadeeeeeeqeeeee";
        // }
    }
    public function destroy($id)
    {
        $this->runDML("DELETE FROM products WHERE id=$id ");
        header("location: index.php");
    }


    public function show($id)
    {
        $result = $this->runDML("SELECT * FROM products WHERE id=$id");
        return $result->fetch(PDO::FETCH_ASSOC);
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

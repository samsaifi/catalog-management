<?php
require_once 'config/database.php';
require_once 'models/Product.php';
class ProductController
{
    private $db;
    private $product;
    public function __construct()
    {
        global $conn;
        $this->db = $conn;
        $this->product = new Product($this->db);
    }
    public function index()
    {
        $result = $this->product->read();
        include 'views/product/list.php';
    }
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->product->name = $_POST['name'];
            $this->product->description = $_POST['description'];
            $this->product->price = $_POST['price'];
            if ($this->product->create()) {
                header("Location: index.php");
            } else {
                echo "Error creating product.";
            }
        } else {
            include 'views/product/create.php';
        }
    }
    // Edit an existing product
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->product->id = $id;
            $this->product->name = $_POST['name'];
            $this->product->description = $_POST['description'];
            $this->product->price = $_POST['price'];
            if ($this->product->update()) {
                header("Location: index.php");
                exit;
            } else {
                echo "Error updating product.";
            }
        } else {
            $product = $this->product->readOne($id);
            if ($product) {
                include 'views/product/edit.php';  // Passing the product data to the view
            } else {
                echo "Product not found.";
            }
        }
    }
    // Delete a product
    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->product->id = $id;
            if ($this->product->delete()) {
                header("Location: index.php");  // Redirect to the product list after deletion
                exit;
            } else {
                echo "Error deleting product.";
            }
        } else {
            // Display confirmation before deleting the product
            $product = $this->product->readOne($id);
            if ($product) {
                include 'views/product/delete.php';  // Show delete confirmation
            } else {
                echo "Product not found.";
            }
        }
    }
}

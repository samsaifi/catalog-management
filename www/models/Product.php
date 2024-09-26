<?php
class Product
{
    private $conn;
    private $table = 'products';
    public $id;
    public $name;
    public $description;
    public $price;
    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function create()
    {
        $query = "INSERT INTO " . $this->table . " SET name=?, description=?, price=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssd", $this->name, $this->description, $this->price);
        return $stmt->execute();
    }
    public function read()
    {
        $query = "SELECT * FROM " . $this->table;
        $result = $this->conn->query($query);
        return $result;
    }
    public function update()
    {
        $query = "UPDATE " . $this->table . " SET name=?, description=?, price=? WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssdi", $this->name, $this->description, $this->price, $this->id);
        return $stmt->execute();
    }
    public function delete()
    {
        $query = "DELETE FROM " . $this->table . " WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id);
        return $stmt->execute();
    }
    public function readOne($id)
    {
        $query = "SELECT * FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}

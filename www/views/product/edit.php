<?php
// Assuming $product is passed from the controller, containing the current product data.
$content = '
<h2>Edit Product</h2>
<form action="index.php?action=edit&id=' . $product['id'] . '" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="' . htmlspecialchars($product['name']) . '" required><br>
    <label for="description">Description:</label>
    <textarea id="description" name="description" required>' . htmlspecialchars($product['description']) . '</textarea><br>
    <label for="price">Price:</label>
    <input type="number" id="price" name="price" step="0.01" value="' . htmlspecialchars($product['price']) . '" required><br>
    <input type="submit" value="Update Product">
</form>
';
include 'views/layout.php';

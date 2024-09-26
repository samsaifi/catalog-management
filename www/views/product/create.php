<?php
$content = '
<h2>Add New Product</h2>
<form action="index.php?action=create" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>
    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea><br>
    <label for="price">Price:</label>
    <input type="number" id="price" name="price" step="0.01" required><br>
    <input type="submit" value="Add Product">
</form>
';
include 'views/layout.php';

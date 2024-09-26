<?php
// Assuming $product is passed from the controller, containing the current product data.
$content = '
<h2>Delete Product</h2>
<p>Are you sure you want to delete the product: <strong>' . htmlspecialchars($product['name']) . '</strong>?</p>
<form action="index.php?action=delete&id=' . $product['id'] . '" method="post">
    <input type="submit" value="Yes, delete this product">
</form>
<br>
<a href="index.php">Cancel</a>
';
include 'views/layout.php';

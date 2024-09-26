<?php
$content = '<h2>Product List</h2>';
$content .= '<table border="1">';
$content .= '<tr><th>ID</th><th>Name</th><th>Description</th><th>Price</th><th>Actions</th></tr>';
while ($row = $result->fetch_assoc()) {
    $content .= '<tr>';
    $content .= '<td>' . $row['id'] . '</td>';
    $content .= '<td>' . $row['name'] . '</td>';
    $content .= '<td>' . $row['description'] . '</td>';
    $content .= '<td>' . $row['price'] . '</td>';
    $content .= '<td>';
    $content .= '<a href="index.php?action=edit&id=' . $row['id'] . '">Edit</a> | ';
    $content .= '<a href="index.php?action=delete&id=' . $row['id'] . '">Delete</a>';
    $content .= '</td>';
    $content .= '</tr>';
}
$content .= '</table>';
include 'views/layout.php';

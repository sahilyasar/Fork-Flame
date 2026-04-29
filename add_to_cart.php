<?php
session_start();
include 'config.php';

// must be logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];

    $name  = mysqli_real_escape_string($conn, $_POST['item_name']);
    $price_text = $_POST['item_price'];          // like "$12"
    $qty   = (int) $_POST['quantity'];

    // "$12" -> 12
    $price_number = str_replace('$', '', $price_text);
    $price_number = (float)$price_number;

    // already in cart?
    $check_sql = "SELECT * FROM cart_items 
                  WHERE user_id = $user_id AND item_name = '$name'";
    $check_res = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_res) > 0) {
        $update_sql = "UPDATE cart_items
                       SET quantity = quantity + $qty
                       WHERE user_id = $user_id AND item_name = '$name'";
        mysqli_query($conn, $update_sql);
    } else {
        $insert_sql = "INSERT INTO cart_items (user_id, item_name, price, quantity)
                       VALUES ($user_id, '$name', $price_number, $qty)";
        mysqli_query($conn, $insert_sql);
    }

    header("Location: menu.php");
    exit;
} else {
    echo "Invalid request";
}
?>

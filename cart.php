<?php
session_start();
include 'config.php';

// only logged-in users can see cart
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// simple order placed message (no DB table for orders)
$orderSuccess = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $place   = $_POST['place'];

    // here we could insert into an orders table, but for now we just show a message
    $orderSuccess = "Order placed successfully! We will contact you at $contact.";
}

// get this user's cart items from database
$sql    = "SELECT item_name, price, quantity FROM cart_items WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
        }
        /* same navigation style as index/login/signup */
        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: rgba(0,0,0,0.85);
            padding: 16px 40px;
            display: flex;
            justify-content: flex-end;
            gap: 28px;
            z-index: 999;
            backdrop-filter: blur(4px);
        }
        header a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
        }
        header a:hover {
            color: #d8ffe0;
        }

        h1 {
            text-align: center;
            margin-top: 90px; /* space for fixed header */
        }
        .cart-container {
            width: 90%;
            max-width: 800px;
            margin: 20px auto 40px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background: #f0f0f0;
        }
        .total-row td {
            font-weight: bold;
        }
        .empty {
            text-align: center;
            font-style: italic;
            padding: 20px 0;
        }
        .back-link {
            margin-top: 15px;
            display: inline-block;
            text-decoration: none;
            color: #007bff;
        }
        .back-link:hover {
            text-decoration: underline;
        }

        /* Checkout / delivery form */
        .checkout-section {
            margin-top: 25px;
            border-top: 1px solid #ddd;
            padding-top: 15px;
        }
        .checkout-section h2 {
            margin: 0 0 10px;
            font-size: 20px;
        }
        .checkout-form label {
            display: block;
            margin-top: 8px;
            font-weight: bold;
            font-size: 14px;
        }
        .checkout-form input,
        .checkout-form textarea {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 14px;
            box-sizing: border-box;
        }
        .checkout-form textarea {
            resize: vertical;
            min-height: 60px;
        }
        .place-btn {
            margin-top: 12px;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 6px;
            background: #ff6600;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        .place-btn:hover {
            background: #e55e00;
        }
        .order-message {
            margin-bottom: 10px;
            padding: 8px 10px;
            border-radius: 6px;
            background: #e8ffe8;
            border: 1px solid #4caf50;
            color: #2e7d32;
            font-size: 14px;
        }
    </style>
</head>
<body>

<header>
    <a href="index.php">Home</a>
    <a href="menu.php">Menu</a>

    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) { ?>
        <span style="color:#ffffff; font-size:14px;">
            Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>
        </span>
        <a href="logout.php">Logout</a>
    <?php } else { ?>
        <a href="login.php">Login</a>
        <a href="signup.php">Signup</a>
    <?php } ?>

</header>

<h1>My Cart</h1>

<div class="cart-container">
    <?php if ($orderSuccess !== ""): ?>
        <div class="order-message">
            <?php echo htmlspecialchars($orderSuccess); ?>
        </div>
    <?php endif; ?>

    <?php if ($result && mysqli_num_rows($result) > 0): ?>
        <table>
            <tr>
                <th>Item</th>
                <th>Price (per unit)</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            <?php
            $total = 0;
            while ($row = mysqli_fetch_assoc($result)):
                $sub = $row['price'] * $row['quantity'];
                $total += $sub;
            ?>
            <tr>
                <td><?php echo htmlspecialchars($row['item_name']); ?></td>
                <td>$<?php echo number_format($row['price'], 2); ?></td>
                <td><?php echo (int)$row['quantity']; ?></td>
                <td>$<?php echo number_format($sub, 2); ?></td>
            </tr>
            <?php endwhile; ?>
            <tr class="total-row">
                <td colspan="3">Total</td>
                <td>$<?php echo number_format($total, 2); ?></td>
            </tr>
        </table>
    <?php else: ?>
        <div class="empty">Your cart is empty.</div>
    <?php endif; ?>

    <!-- Contact / address form -->
    <div class="checkout-section">
        <h2>Delivery Details</h2>
        <form method="post" class="checkout-form">
            <label for="contact">Contact Number</label>
            <input type="text" id="contact" name="contact" required>

            <label for="address">Address</label>
            <textarea id="address" name="address" required></textarea>
            <button type="submit" class="place-btn">Place Order Now</button>
        </form>
    </div

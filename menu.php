<?php
// Start session to read login info (set in index.php / login.php)
session_start();

// Simple menu data (you can change names, prices, images)
$menu = [

    "Main Dishes" => [
      ["name" => "Pasta", "price" => "$12", "img" => "media/pasta.png"],
      ["name" => "BBQ Chicken", "price" => "$10", "img" => "media/bb1c.jpg"],
      ["name" => "Beef Burger", "price" => "$11", "img" => "media/bburger.jpg"],
      ["name" => "Chow-Mein", "price" => "$13", "img" => "media/Chow-Mein-1.jpg"],
      ["name" => "Chicken Wings", "price" => "$9", "img" => "media/wings2.jpg"],
      ["name" => "Meat Box", "price" => "$15", "img" => "media/mbox.jpeg"],
      ["name" => "Fried Rice", "price" => "$11", "img" => "media/fried-rice.jpg"],
      ["name" => "Grilled Sandwich", "price" => "$7", "img" => "media/sand.jpg"],
   ],

   "Appetizer" => [
      ["name" => "Cashew Nut Salad", "price" => "$14", "img" => "media/Salad1.jpg"],
      ["name" => "Spring Rolls", "price" => "$6", "img" => "media/rolls.jpg"],
      ["name" => "Garlic Bread", "price" => "$5", "img" => "media/nachos.jpg"],
      ["name" => "Veggie Soup", "price" => "$7", "img" => "media/soup.jpg"],
      ["name" => "French Fries", "price" => "$5", "img" => "media/fries.jpg"],
      ["name" => "Mushroom Balls", "price" => "$9", "img" => "media/mushrooms.jpg"],
   ],

   "Drinks" => [
      ["name" => "Smoothie", "price" => "$6", "img" => "media/smoothie.jpg"],
      ["name" => "Latte", "price" => "$5", "img" => "media/latte.jpg"],
      ["name" => "Iced Coffee", "price" => "$4", "img" => "media/icoffee.jpg"],
      ["name" => "Mocha", "price" => "$6", "img" => "media/mocha.jpeg"],
      ["name" => "Milk Tea", "price" => "$4", "img" => "media/milk tea.jpeg"],
      ["name" => "Orange juice", "price" => "$5", "img" => "media/orange.jpeg"],
      ["name" => "Hot Chocolate", "price" => "$6", "img" => "media/hotchoco.jpeg"],
      ["name" => "Black Coffee", "price" => "$3", "img" => "media/black.jpeg"],
   ],

   "Desserts" => [
      ["name" => "Chocolate Cake", "price" => "$7", "img" => "media/cake.jpeg"],
      ["name" => "Donuts", "price" => "$4", "img" => "media/donut.jpeg"],
      ["name" => "Ice Cream Bowl", "price" => "$5", "img" => "media/icecream.jpeg"],
      ["name" => "Cheesecake", "price" => "$8", "img" => "media/c.jpeg"],
      ["name" => "Brownies", "price" => "$6", "img" => "media/b.jpeg"],
      ["name" => "Cupcake", "price" => "$4", "img" => "media/cup.jpeg"],
      ["name" => "Pudding", "price" => "$4", "img" => "media/pudding.jpeg"],
      ["name" => "Fruit Salad", "price" => "$5", "img" => "media/salad.jpeg"],
   ],

];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Restaurant Menu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <style>
      body {
         font-family: Arial, sans-serif;
         background: #f5f5f5;
         margin: 0;
         padding: 0;
         width: 100%;
      }

      h1 {
         margin: 12px 0 0px 0;
         text-align: center;
         font-size: 55px;
         padding: 35px 0;
         color: #ffcc66;
         text-shadow: 2px 2px 20px black;
         background: rgba(0, 0, 0, 0.45);
         backdrop-filter: blur(6px);
         letter-spacing: 3px;
      }

      h2 {
         margin: 40px auto 20px;
         text-align: center;
         font-size: 40px;
         padding: 15px 35px;
         color: white;
         background: rgba(0, 0, 0, 0.5);
         backdrop-filter: blur(4px);
         text-shadow: 2px 2px 10px black;
         border-radius: 10px;
         display: inline-block;
      }

      .menu-container {
         display: grid;
         grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
         gap: 20px;
         max-width: 1200px;
         margin: auto;
      }

      .card {
         background: #fff;
         border-radius: 10px;
         box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
         overflow: hidden;
         transition: 0.3s;
      }

      .card:hover {
         transform: translateY(-5px);
      }

      .card img {
         width: 100%;
         height: 170px;
         object-fit: cover;
      }

      .card-body {
         padding: 15px;
      }

      .card-title {
         font-size: 20px;
         margin: 0;
      }

      .price {
         color: #ff6600;
         font-size: 18px;
         margin-top: 5px;
      }

      .btn {
         display: block;
         width: 100%;
         margin-top: 10px;
         padding: 10px;
         background: #ff6600;
         color: white;
         border: none;
         font-size: 16px;
         cursor: pointer;
         border-radius: 5px;
         transition: 0.2s;
      }

      .btn:hover {
         background: #e55e00;
      }

      /* NAVIGATION */
      header {
         position: fixed;
         top: 0;
         left: 0;
         right: 0;
         background: rgba(0, 0, 0, 0.85);
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

      /* Footer */
      footer {
         background: #222;
         color: #fff;
         margin-top: 0px;
         padding: 40px 0 0;
      }

      .footer-container {
         width: 100%;
         max-width: 1200px;
         margin: auto;
         display: flex;
         justify-content: space-between;
         flex-wrap: wrap;
         padding-bottom: 30px;
      }

      .footer-section {
         width: 30%;
         min-width: 230px;
         margin-bottom: 20px;
      }

      .footer-section h3 {
         margin-bottom: 10px;
         border-bottom: 2px solid #ff9800;
         display: inline-block;
         padding-bottom: 5px;
      }

      .footer-section ul {
         list-style: none;
         padding: 0;
         margin: 0;
      }

      .footer-section ul li {
         margin: 6px 0;
      }

      .footer-section a {
         color: #fff;
         text-decoration: none;
         transition: 0.3s;
      }

      .footer-section a:hover {
         color: #ff9800;
      }

      .footer-bottom {
         text-align: center;
         padding: 15px;
         background: #111;
         margin-top: 20px;
         font-size: 14px;
      }

      section {
         background: url('media/bg3.jpg') no-repeat center center fixed;
         /* padding: 40px 0; */
         background-size: cover;
         margin: 0;
         text-align: center;
      }
   </style>
</head>
<body>

<header>
    <a href="index.php">Home</a>
    <a href="menu.php">Menu</a>
    

    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) { ?>
        <span style="color:white; font-size:14px;">
            Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>
        </span>
        <a href="logout.php">Logout</a>
        <a href="cart.php">Cart</a> 
    <?php } else { ?>
        <a href="login.php">Login</a>
    <?php } ?>

</header>


<section>
    <h1>Our Food Menu</h1>

    <?php foreach ($menu as $sectionName => $items): ?>

        <h2><?php echo htmlspecialchars($sectionName); ?></h2>

        <div class="menu-container">
            <?php foreach ($items as $food): ?>
                <div class="card">
                    <img src="<?php echo htmlspecialchars($food['img']); ?>"
                         alt="<?php echo htmlspecialchars($food['name']); ?>">
                    <div class="card-body">
                        <h3 class="card-title">
                            <?php echo htmlspecialchars($food['name']); ?>
                        </h3>
                        <p class="price">
                            <?php echo htmlspecialchars($food['price']); ?>
                        </p>

                        <!-- Add to Cart: sends data to add_to_cart.php (database cart) -->
                        <form action="add_to_cart.php" method="post">
                           <input type="hidden" name="item_name"
                           value="<?php echo htmlspecialchars($food['name']); ?>">
                           <input type="hidden" name="item_price"
                            value="<?php echo htmlspecialchars($food['price']); ?>">
                           <input type="hidden" name="item_img"
                           value="<?php echo htmlspecialchars($food['img']); ?>">
                           <input class="qty-input" type="number" name="quantity" value="1" min="1">
                           <button class="btn" type="submit">Add to Cart</button>
                        </form>


                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <?php endforeach; ?>
</section>

<footer>
    <div class="footer-container">
        <div class="footer-section">
            <h3>Fork & Flame</h3>
            <p>
                Delicious food made with love.<br>
                Fresh ingredients, unforgettable taste.
            </p>
        </div>

        <div class="footer-section">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="cart.php">Cart</a></li>
        </div>

        <div class="footer-section">
            <h3>Contact Info</h3>
            <p>Address: 123 Food Street, Dhaka</p>
            <p>Phone: +880 1234-567890</p>
            <p>Email: info@restaurant.com</p>
        </div>
    </div>

    <div class="footer-bottom">
        © 2025 Fork & Flame — All Rights Reserved.
    </div>
</footer>

</body>
</html>

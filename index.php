<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>Fork & Flame — Restaurant</title>

<!-- Call / link your external CSS file here -->
<link rel="stylesheet" href="style.css">
</head>

<body>

<!-- ================= NAVIGATION ================= -->
<header>
    <a href="index.php">Home</a>
    <a href="menu.php">Menu</a>   <!-- go to menu page -->
    
    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) { ?>
        <span style="color:white; margin-left:10px;">
            Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>
        </span>
        <a href="logout.php">Logout</a>
    <?php } else { ?>
        <a href="login.php">Sign In</a>
    <?php } ?>

</header>


<!-- ================= HERO ================= -->
<section class="hero">
    <div>
        <h1>Fork & Flame</h1>
        <p>Good food — cozy place. Open daily.</p>
    </div>
</section>

<!-- ================= INFO SECTION ================= -->
<section class="info-section">

    <!-- LEFT SIDE -->
    <div>
        <div class="eyebrow">Where Good Food Meets Warm Ambience</div>
        <div class="info-title">Enjoy dishes made to satisfy every craving</div>
        <p class="info-text">
            Fork & Flame is your cozy corner for good food and good vibes.
            At Fork & Flame, we believe great food tastes even better in a warm and welcoming atmosphere.
            Whether you’re stopping by after a long day or sharing a meal with someone special,
           our cozy space invites you to relax and enjoy. 
           From comfort classics to international flavors, every dish is crafted with care and served with love. 
           Come in, unwind, and make yourself at home.
        </p>
        <div class="image-gallery">
            <img src="food1.jpg" alt="Delicious Dish 1">
            <img src="food2.jpg" alt="Delicious Dish 2">
            <img src="food3.jpg" alt="Delicious Dish 3">
        </div>
    </div>

    <!-- RIGHT SIDE -->
    <div class="right">

        <img src="media/Scuzzy.webp" class="right-img" alt="Food Image">

        <div class="block-title">Information</div>
        <p><strong>Phone:</strong> +880 1234-567890</p>
        <p><strong>Email:</strong> info@restaurant.com</p>

        <div class="label">Additional Contact</div>
        <p>Phone: +880 1234-567890</p>
        <p>+880 1234-567890</p>

        <div class="block-title">Opening Hours</div>
        <p><strong>Lunch:</strong> Daily 11:30–18:00</p>
        <p><strong>Dinner:</strong> Daily 18:00–22:00</p>

        <div class="label">Reservation by Phone</div>
        <div class="phone-number">+880 1234-567890</div>
    </div>

</section>

</body>
</html>

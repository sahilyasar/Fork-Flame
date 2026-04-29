<?php
session_start();
include 'config.php';

$error = "";

// Handle form submit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
   $email    = $_POST["email"];
   $password = $_POST["password"];

   // Check in database
   $sql    = "SELECT * FROM users WHERE email='$email' AND password='$password'";
   $result = mysqli_query($conn, $sql);

   if ($result && mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);

      // Save user info in session
      $_SESSION['logged_in'] = true;
      $_SESSION['user_name'] = $row['name'];
      $_SESSION['user_id']   = $row['id'];

      // Redirect to home page
      header("Location: index.php");
      exit;
   } else {
      $error = "Wrong email or password.";
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>Login</title>

   <style>
      body {
         margin: 0;
         padding: 0;
         font-family: Arial, sans-serif;
         background: url('media/bg2.jpg') center/cover no-repeat fixed;
      }

      .overlay {
         width: 100%;
         height: 100vh;
         background: rgba(0, 0, 0, 0.5);
         backdrop-filter: blur(4px);
         display: flex;
         justify-content: center;
         align-items: center;
      }

      .login-box {
         width: 350px;
         padding: 25px;
         background: rgba(255, 255, 255, 0.1);
         border-radius: 12px;
         backdrop-filter: blur(10px);
         box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
         color: white;
         text-align: center;
      }

      h2 {
         margin-bottom: 20px;
         text-shadow: 2px 2px 8px black;
      }

      input {
         width: 90%;
         padding: 12px;
         margin: 10px 0;
         border-radius: 8px;
         border: none;
         outline: none;
         font-size: 16px;
         background: rgba(255, 255, 255, 0.8);
      }

      .btn {
         width: 100%;
         padding: 12px;
         margin-top: 10px;
         background: #ff6600;
         color: white;
         border: none;
         border-radius: 8px;
         font-size: 18px;
         cursor: pointer;
         transition: 0.3s;
      }

      .btn:hover {
         background: #e55c00;
      }

      .signup-link {
         margin-top: 15px;
         font-size: 15px;
      }

      a {
         color: #ffcc66;
         text-decoration: none;
      }

      a:hover {
         text-decoration: underline;
      }

      /* Header */
      header {
         position: fixed;
         top: 0;
         left: 0;
         right: 0;
         background: rgba(0, 0, 0, 0.65);
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
   </style>
</head>

<body>
   <header>
      <a href="index.php">Home</a>
      <a href="menu.php">Menu</a>
      <a href="signup.php">Sign Up</a>
   </header>

   <div class="overlay">
      <form method="POST" class="login-box">
         <h2>Login</h2>

         <input type="email" name="email" placeholder="Email Address" required>
         <input type="password" name="password" placeholder="Password" required>

         <button class="btn" type="submit">Login</button>

         <p class="signup-link">
            Don't have an account? <a href="signup.php">Create one</a>
         </p>
      </form>
   </div>

</body>

</html>
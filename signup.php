<?php
include 'config.php';  // connect to database

if ($_SERVER["REQUEST_METHOD"] === "POST") {
   $name     = $_POST["name"];
   $email    = $_POST["email"];
   $password = $_POST["password"];

   // insert into users table
   $sql = "INSERT INTO users (name, email, password)
           VALUES ('$name', '$email', '$password')";

   if (mysqli_query($conn, $sql)) {
      echo "<p style='color:green; text-align:center;'>Signup Successful!</p>";
   } else {
      echo "<p style='color:red; text-align:center;'>Error: " . mysqli_error($conn) . "</p>";
   }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>Signup</title>

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

      .signup-box {
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

      input,
      textarea {
         width: 90%;
         padding: 12px;
         margin: 10px 10px 20px 0;
         border-radius: 8px;
         border: none;
         outline: none;
         font-size: 16px;
      }

      input[type="text"],
      input[type="email"],
      input[type="password"],
      textarea {
         background: rgba(255, 255, 255, 0.8);
      }

      textarea {
         height: 80px;
         resize: none;
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

      .login-link {
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
      <a href="login.php">Sign in</a>
   </header>

   <div class="overlay">
      <form method="POST" class="signup-box">
         <h2>Create an Account</h2>

         <input type="text" name="name" placeholder="Full Name" required>
         <input type="email" name="email" placeholder="Email Address" required>
         <input type="password" name="password" placeholder="Create Password" required>

         <button class="btn" type="submit">Sign Up</button>

         <p class="login-link">
            Already have an account? <a href="login.php">Login here</a>
         </p>
      </form>
   </div>


</body>

</html>
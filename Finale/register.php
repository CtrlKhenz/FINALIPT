<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration | IT 207</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      animation: fadeIn 1.5s ease-out forwards;
      opacity: 0;
    }

    .container {
      animation: slideUp 1s ease-out forwards;
      opacity: 0;
    }

    .input-box {
      opacity: 0;
      animation: fadeSlide 1s ease-out forwards;
      visibility: hidden;
    }

    /* Stagger animation delay for inputs */
    .input-box:nth-child(1) { animation-delay: 0.3s; }
    .input-box:nth-child(2) { animation-delay: 0.6s; }
    .input-box:nth-child(3) { animation-delay: 0.9s; }
    .input-box:nth-child(4) { animation-delay: 1.2s; }
    .input-box:nth-child(5) { animation-delay: 1.5s; }
    .input-box:nth-child(6) { animation-delay: 1.8s; }

    .button {
      opacity: 100;
      animation-delay: 2.1s;
      visibility: visible;
    }

    .back-to-login {
      opacity: 0;
      animation: fadeIn 1.5s ease-out forwards;
      animation-delay: 2.4s;
      cursor: pointer;
      text-decoration: underline;
      text-align: center;
    }

    @keyframes slideUp {
      from {
        transform: translateY(60px);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    @keyframes fadeSlide {
      from {
        transform: translateX(-30px);
        opacity: 0;
      }
      to {
        transform: translateX(0);
        opacity: 1;
      }
    }

    .button {
      visibility: visible !important;
    }

    .button input {
      opacity: 1 !important;
      transition: all 0.3s ease-in-out;
      padding: 10px 20px;
      border: none;
      background: #007bff;
      color: #fff;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
    }

    .button input:hover {
      box-shadow: 0 0 20px rgba(0, 123, 255, 1), 0 0 30px rgba(0, 123, 255, 0.8), 0 0 40px rgba(0, 123, 255, 0.6);
      transform: scale(1.05);
    }

    .back-to-login a {
      color: #007bff;
    }

  </style>
</head>
<body>
  <div class="container">
    <!-- Title section -->
    <div class="title">Registration</div>
    <div class="content">
      <!-- Registration Form -->
      <form action="register.php" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="fullname" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="username" placeholder="Enter your username" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="phone" placeholder="Enter your number" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" name="confirm_password" placeholder="Confirm your password" required>
          </div>
        </div>

        <div class="button">
          <input type="submit" value="Register">
        </div>
      </form>

      <!-- Back to Login link -->
      <div class="back-to-login">
        <p>Already have an account? <a href="login.html">Login here</a></p>
      </div>
    </div>
  </div>
</body>
</html>

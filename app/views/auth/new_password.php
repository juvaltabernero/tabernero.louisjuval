<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>New Password</title>
  <link rel="icon" type="image/png" href="<?=base_url();?>public/img/favicon.ico"/>

  <!-- Gothic Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nosifer&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet">

  <style>
    body {
      margin: 0;
      font-family: 'Creepster', cursive;
      background: radial-gradient(circle at center, #0a0a0a, #000000 90%);
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      overflow: hidden;
    }

    /* Portal Glow Header */
    .portal {
      font-family: 'Nosifer', cursive;
      font-size: 2.5rem;
      text-align: center;
      color: #ff0000;
      text-shadow: 0 0 10px #ff0000, 0 0 30px #ff4d4d, 0 0 60px #ff0000;
      margin-bottom: 15px;
      animation: flicker 3s infinite alternate;
    }
    @keyframes flicker {
      0%, 19%, 21%, 23%, 25%, 54%, 56%, 100% { opacity: 1; }
      20%, 24%, 55% { opacity: 0.6; }
    }

    .form-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
    }

    .card {
      background: rgba(20, 20, 20, 0.95);
      border-radius: 20px;
      padding: 30px;
      width: 100%;
      max-width: 500px;
      box-shadow: 0 0 30px rgba(255, 0, 0, 0.7);
      position: relative;
      text-align: center;
    }

    .card-header {
      font-family: 'Nosifer', cursive;
      font-size: 1.8rem;
      text-align: center;
      color: #ff4d4d;
      margin-bottom: 10px;
      text-shadow: 0 0 10px #ff0000;
    }

    .valid-feedback strong {
      color: #00ff00;
      font-size: 0.9rem;
      display: block;
      margin-bottom: 15px;
      text-shadow: 0 0 5px #00ff00;
    }

    label {
      font-size: 1.2rem;
      display: block;
      margin: 10px 0 5px;
      color: #fff;
      text-shadow: 0 0 5px #ff0000;
    }

    .form-control {
      width: 100%;
      background: #111;
      color: #fff;
      border: none;
      border-radius: 10px;
      padding: 12px;
      margin-bottom: 15px;
      font-size: 1rem;
      box-shadow: inset 0 0 10px rgba(255, 0, 0, 0.5);
      font-family: 'Creepster', cursive;
      outline: none;
    }

    .btn-primary {
      background: #ff0000;
      color: #fff;
      border: none;
      border-radius: 10px;
      padding: 12px 20px;
      font-size: 1.2rem;
      font-family: 'Nosifer', cursive;
      cursor: pointer;
      box-shadow: 0 0 15px #ff0000;
      transition: all 0.3s ease;
      width: 100%;
    }
    .btn-primary:hover {
      background: #cc0000;
      box-shadow: 0 0 30px #ff0000, 0 0 60px #ff4d4d;
    }

    .btn-link {
      display: inline-block;
      margin-top: 10px;
      color: #ff4d4d;
      font-size: 1rem;
      text-decoration: none;
      font-family: 'Creepster', cursive;
    }
    .btn-link:hover {
      text-shadow: 0 0 10px #ff0000;
    }

    /* Floating Creatures */
    .creature {
      position: absolute;
      font-size: 2rem;
      animation: float 6s ease-in-out infinite;
      opacity: 0.8;
    }
    .creature:nth-child(1) { top: 10%; left: 5%; animation-delay: 0s; }
    .creature:nth-child(2) { bottom: 15%; right: 10%; animation-delay: 2s; }
    .creature:nth-child(3) { top: 20%; right: 15%; animation-delay: 4s; }
    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-20px); }
    }
  </style>
</head>
<body>
  <div class="form-wrapper">
    <div class="card">
      <div class="portal">NEW PASSWORD PORTAL</div>
      <div class="card-header">Set Your New Password</div>
      <span class="valid-feedback" role="alert">
        <strong>
          Password must be at least 8 characters and contain a special character (!@£$%^&*-_+=?), 
          a number, an uppercase, and a lowercase letter.
        </strong>
      </span>

      <?php flash_alert(); ?>
      <form id="myForm" action="<?=site_url('auth/set-new-password');?>" method="post">
        <?php csrf_field(); ?>
        <input type="hidden" name="token" value="<?php !empty($_GET['token']) && print $_GET['token'];?>"> 

        <label for="password">New Password</label>
        <input id="password" type="password" class="form-control" name="password" required>

        <label for="re_password">Confirm New Password</label>
        <input id="re_password" type="password" class="form-control" name="re_password" required>

        <button type="submit" class="btn-primary">Proceed</button>
        <a class="btn-link" href="<?=site_url('auth/login');?>">Back to Home</a>
      </form>

      <!-- Creatures -->
      <div class="creature">🦇</div>
      <div class="creature">👻</div>
      <div class="creature">🕷️</div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
  <script>
    $(function() {
      var myForm = $("#myForm");
      if(myForm.length) {
        myForm.validate({
          rules: {
            password: {
              required: true,
              minlength: 8
            },
            re_password: {
              required: true,
              minlength: 8,
              equalTo: "#password"
            }
          },
          messages: {
            password: {
              required: "Please input your password",
              minlength: "Password must be at least 8 characters."
            },
            re_password: {
              required: "Please input your confirm password",
              minlength: "Password must be at least 8 characters.",
              equalTo: "Passwords do not match."
            }
          }
        });
      }
    });
  </script>
</body>
</html>

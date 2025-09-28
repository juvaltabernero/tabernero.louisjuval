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

  <!-- Styles -->
  <link href="<?=base_url();?>public/css/main.css" rel="stylesheet">
  <link href="<?=base_url();?>public/css/style.css" rel="stylesheet">

  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(to right, #000000, #2c003e);
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .form-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
    }
    .card {
      background: rgba(0, 0, 0, 0.8);
      border: 2px solid #ff0000;
      border-radius: 12px;
      padding: 30px;
      width: 100%;
      max-width: 500px;
      box-shadow: 0px 0px 25px red;
    }
    .card-header {
      font-family: 'Nosifer', cursive;
      font-size: 1.8rem;
      text-align: center;
      color: #ff0000;
      margin-bottom: 15px;
    }
    .card-body label {
      font-family: 'Creepster', cursive;
      font-size: 1.2rem;
      color: #fff;
    }
    .form-control {
      background: #111;
      color: #fff;
      border: 1px solid #ff0000;
      border-radius: 8px;
      padding: 10px;
      margin-bottom: 15px;
    }
    .btn-primary {
      background: #ff0000;
      border: none;
      padding: 10px 20px;
      border-radius: 8px;
      font-weight: bold;
      transition: 0.3s;
    }
    .btn-primary:hover {
      background: #cc0000;
      box-shadow: 0px 0px 10px red;
    }
    .btn-link {
      margin-left: 10px;
      color: #ff0000;
      font-weight: bold;
      text-decoration: none;
    }
    .btn-link:hover {
      text-decoration: underline;
    }
    .valid-feedback strong {
      color: #00ff00;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>
  <div class="form-wrapper">
    <div class="card">
      <div class="card-header">New Password</div>
      <div class="card-body">
        <span class="valid-feedback" role="alert">
          <strong>
            Note: Password must be at least 8 characters and contain a special character (!@£$%^&*-_+=?), 
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

          <div style="text-align:center; margin-top:15px;">
            <button type="submit" class="btn btn-primary">Proceed</button>
            <a class="btn-link" href="<?=site_url('auth/login');?>">Back to Home</a>
          </div>
        </form>
      </div>
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
              minlength: 8
            }
          },
          messages: {
            password: {
              required: "Please input your password",
              minlength: jQuery.validator.format("Password must be at least {0} characters.")
            },
            re_password: {
              required: "Please input your confirm password",
              minlength: jQuery.validator.format("Password must be at least {0} characters.")
            }
          }
        });
      }
    });
  </script>
</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>  
    <link rel="icon" type="image/png" href="<?=base_url();?>public/img/favicon.ico"/>

    <!-- Gothic Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nosifer&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&display=swap" rel="stylesheet">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Cinzel Decorative', serif;
            background: #0d0d0d;
            color: #f1f1f1;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        main {
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            width: 100%;
            max-width: 1200px;
            gap: 40px;
        }

        .form-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: rgba(15, 15, 15, 0.9);
            border: 2px solid #6c3483;
            border-radius: 20px;
            box-shadow: 0 0 25px rgba(187, 134, 252, 0.4);
            backdrop-filter: blur(6px);
            width: 100%;
            max-width: 450px;
        }

        .card-header {
            background: linear-gradient(145deg, #6c3483, #9b59b6);
            color: #fff;
            text-align: center;
            padding: 20px;
            font-family: 'Creepster', cursive;
            font-size: 24px;
            letter-spacing: 2px;
            border-bottom: 2px solid #bb86fc;
        }

        .card-body { padding: 30px; }

        label {
            color: #bb86fc;
            font-weight: bold;
            font-size: 14px;
            font-family: 'Creepster', cursive;
        }

        .form-control {
            background: rgba(40, 40, 40, 0.9);
            border: 2px solid #bb86fc;
            border-radius: 12px;
            color: #f1f1f1;
            padding: 12px 15px;
            margin-top: 8px;
            margin-bottom: 15px;
            width: 100%;
            font-family: 'Cinzel Decorative', serif;
            transition: 0.3s;
        }

        .form-control:focus {
            border-color: #9b59b6;
            outline: none;
            box-shadow: 0 0 12px rgba(187, 134, 252, 0.5);
        }

        .btn-primary {
            background: linear-gradient(145deg, #6c3483, #9b59b6, #bb86fc);
            border: none;
            border-radius: 15px;
            color: #fff;
            font-weight: bold;
            padding: 12px 25px;
            font-family: 'Creepster', cursive;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(145deg, #bb86fc, #d6a1ff);
            color: #1a1a1a;
            box-shadow: 0 6px 20px rgba(187, 134, 252, 0.5);
        }

        a {
            color: #bb86fc;
            text-decoration: none;
            font-family: 'Creepster', cursive;
            font-size: 12px;
            margin-left: 15px;
            transition: 0.3s;
        }

        a:hover {
            color: #d6a1ff;
            text-shadow: 0 0 8px rgba(187, 134, 252, 0.6);
        }

        .image-side {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .image-side img {
            width: 100%;
            max-width: 500px;
            border-radius: 20px;
            box-shadow: 0 0 30px rgba(0,0,0,0.6);
        }

        @media (max-width: 768px) {
            main { grid-template-columns: 1fr; gap: 20px; }
            .image-side { order: -1; }
            .card { max-width: 100%; }
        }
    </style>
</head>
<body>
    <?php include APP_DIR.'views/templates/nav_auth.php'; ?>

    <main>
        <!-- LEFT: Register Form -->
        <div class="form-wrapper">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-body">
                    <span style="font-size:12px; color:#bb86fc;">
                        Note: Password must be at least 8 characters and contain one of these special characters (!@£$%^&*-_+=?), 
                        a number, an uppercase and a lowercase letter.
                    </span>
                    <?php flash_alert(); ?>
                    <form id="regForm" method="POST" action="<?=site_url('auth/register');?>">
                        <?php csrf_field(); ?>

                        <label for="username">Username</label>
                        <input id="username" type="text" class="form-control" name="username" required>

                        <label for="email">Email Address</label>
                        <input id="email" type="email" class="form-control" name="email" required>

                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required minlength="8">

                        <label for="password_confirmation">Confirm Password</label>
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required minlength="8">

                        <button type="submit" class="btn btn-primary">Register</button>
                        <a href="<?=site_url('auth/login');?>">Back to Home</a>
                    </form>
                </div>
            </div>
        </div>

        <!-- RIGHT: Image -->
        <div class="image-side">
            <img src="https://wallpaperaccess.com/full/8625581.jpg" alt="Wednesday Addams">
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script>
        $(function() {
            var regForm = $("#regForm");
            if(regForm.length) {
                regForm.validate({
                    rules: {
                        username: { required: true, minlength: 5, maxlength: 20 },
                        email: { required: true, email: true },
                        password: { required: true, minlength: 8 },
                        password_confirmation: { required: true, minlength: 8, equalTo: "#password" }
                    },
                    messages: {
                        username: { required: "Please input your username." },
                        email: { required: "Please input your email address." },
                        password: { required: "Please input your password", minlength: "Password must be at least 8 characters." },
                        password_confirmation: { required: "Please confirm your password", minlength: "Password must be at least 8 characters.", equalTo: "Passwords do not match." }
                    }
                });
            }
        });
    </script>
</body>
</html>

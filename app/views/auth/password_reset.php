<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password</title>  
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
    <div class="form-wrapper">
    <div class="card">
        <div class="card-header">Reset Password</div>
        <div class="card-body">
            <form method="POST" action="<?= site_url('auth/password-reset'); ?>">
                <?php csrf_field(); ?>
                <?php $alert = $LAVA->session->flashdata('alert'); ?>

                <label for="email">Email Address</label>
                <input id="email" type="email" 
                       class="form-control <?= $alert === 'is-invalid' ? 'is-invalid' : ($alert === 'is-valid' ? 'is-valid' : ''); ?>" 
                       name="email" required>

                <?php if ($alert === 'is-invalid'): ?>
                    <span class="invalid-feedback" role="alert" style="display:block;">
                        <strong>We can’t find a user with that email address.</strong>
                    </span>
                <?php endif; ?>

                <?php if ($alert === 'is-valid'): ?>
                    <span class="valid-feedback" role="alert" style="display:block;">
                        <strong>Reset password link was sent to your email.</strong>
                    </span>
                <?php endif; ?>

                <button type="submit" class="btn btn-primary mt-3">Send Password Reset Link</button>

                <div style="margin-top:15px; text-align:center;">
                    <a href="<?= site_url("auth/login"); ?>">Back to Home</a>
                </div>
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
</body>
</html>

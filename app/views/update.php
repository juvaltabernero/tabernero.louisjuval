<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Student</title>

<link href="https://fonts.googleapis.com/css2?family=Nosifer&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&display=swap" rel="stylesheet">

<style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Creepster', cursive;
      background: 
        radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.15) 0%, transparent 50%),
        url('https://wallpaperaccess.com/full/8625581.jpg') no-repeat center center fixed;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column; 
      gap: 30px; 
      min-height: 100vh;
      padding: 40px;
      color: #f1f1f1;
      overflow-x: hidden;
    }

    /* Floating particles animation */
    body::before {
      content: "";
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: 
        radial-gradient(2px 2px at 20px 30px, #fff, transparent),
        radial-gradient(2px 2px at 40px 70px, #bb86fc, transparent),
        radial-gradient(1px 1px at 90px 40px, #fff, transparent);
      background-size: 100px 80px;
      animation: sparkle 4s linear infinite;
      pointer-events: none;
      opacity: 0.6;
      z-index: -1;
    }

    @keyframes sparkle {
      0%, 20%, 40%, 60%, 80%, 100% { opacity: 0; }
      10%, 30%, 50%, 70%, 90% { opacity: 0.6; }
    }

    /* Form container with creatures around it */
    .form-container {
      position: relative;
      width: 100%;
      max-width: 600px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    /* Creatures around the form */
    .form-container::before {
      content: "🕷️";
      position: absolute;
      top: -30px;
      left: 80px;
      font-size: 24px;
      animation: spider-crawl-form 8s linear infinite;
      z-index: 5;
    }

    .form-container::after {
      content: "🦇";
      position: absolute;
      top: 30%;
      right: -50px;
      font-size: 20px;
      animation: bat-fly-form 4s ease-in-out infinite;
      z-index: 5;
    }

    .creature-form-left {
      position: absolute;
      top: 50%;
      left: -50px;
      font-size: 18px;
      animation: eye-watch-form 3s ease-in-out infinite;
      z-index: 5;
    }

    .creature-form-bottom-left {
      position: absolute;
      bottom: -40px;
      left: 15%;
      font-size: 22px;
      animation: web-sway-form 5s ease-in-out infinite;
      z-index: 5;
    }

    .creature-form-bottom-right {
      position: absolute;
      bottom: -45px;
      right: 20%;
      font-size: 20px;
      animation: skull-bob-form 4s ease-in-out infinite;
      z-index: 5;
    }

    .creature-form-top-right {
      position: absolute;
      top: -35px;
      right: 25%;
      font-size: 18px;
      animation: moon-glow-form 3s ease-in-out infinite alternate;
      z-index: 5;
    }

    @keyframes spider-crawl-form {
      0% { left: 80px; top: -30px; transform: rotate(0deg); }
      25% { left: 70%; top: 20%; transform: rotate(90deg); }
      50% { left: calc(100% - 80px); top: 80%; transform: rotate(180deg); }
      75% { left: 20%; top: 90%; transform: rotate(270deg); }
      100% { left: 80px; top: -30px; transform: rotate(360deg); }
    }

    @keyframes bat-fly-form {
      0%, 100% { 
        right: -50px; 
        transform: translateY(-50%) rotate(0deg) scale(1);
      }
      50% { 
        right: -70px; 
        transform: translateY(-70%) rotate(-15deg) scale(1.1);
      }
    }

    @keyframes eye-watch-form {
      0%, 100% { 
        left: -50px; 
        transform: translateY(-50%) scale(1);
        opacity: 0.8;
      }
      50% { 
        left: -30px; 
        transform: translateY(-50%) scale(1.2);
        opacity: 1;
      }
    }

    @keyframes web-sway-form {
      0%, 100% { 
        transform: rotate(-8deg);
        opacity: 0.6;
      }
      50% { 
        transform: rotate(8deg);
        opacity: 0.9;
      }
    }

    @keyframes skull-bob-form {
      0%, 100% { 
        bottom: -45px;
        transform: rotate(-5deg);
      }
      50% { 
        bottom: -35px;
        transform: rotate(5deg);
      }
    }

    @keyframes moon-glow-form {
      0% { 
        opacity: 0.6;
        text-shadow: 0 0 10px #bb86fc;
      }
      100% { 
        opacity: 1;
        text-shadow: 0 0 20px #bb86fc, 0 0 30px #9b59b6;
      }
    }

    form {
      font-family: 'Creepster', cursive;
      background: linear-gradient(145deg, rgba(15,15,15,0.95), rgba(35,10,55,0.95));
      padding: 50px 60px;
      border-radius: 25px;
      border: 3px solid #6c3483;
      box-shadow: 
        0 0 40px rgba(187, 134, 252, 0.4),
        inset 0 0 30px rgba(20, 20, 20, 0.8);
      width: 100%;
      max-width: 580px;
      position: relative;
      backdrop-filter: blur(10px);
      overflow: hidden;
    }

    form::before {
      content: "☽TTTTTT☾";
      font-family: 'Creepster', cursive;
      font-size: 35px;
      position: absolute;
      top: -40px;
      left: 50%;
      transform: translateX(-50%);
      background: linear-gradient(145deg, #6c3483, #9b59b6);
      padding: 12px 32px;
      color: #000000;
      border-radius: 20px;
      border: 3px solid #bb86fc;
      box-shadow: 
        0 0 30px rgba(187, 134, 252, 0.6),
        inset 0 0 15px rgba(255, 255, 255, 0.1);
      letter-spacing: 3px;
      animation: float-portal 3s ease-in-out infinite;
    }

    @keyframes float-portal {
      0%, 100% { transform: translateX(-50%) translateY(0px); }
      50% { transform: translateX(-50%) translateY(-5px); }
    }

    h2 {
      font-family: 'Creepster', cursive;
      text-align: center;
      color: #bb86fc;
      margin-bottom: 30px;
      font-size: 28px;
      letter-spacing: 3px;
      text-shadow: 
        0 0 10px #bb86fc,
        0 0 20px #9b59b6;
      animation: title-glow 2s ease-in-out infinite alternate;
    }

    @keyframes title-glow {
      0% { 
        text-shadow: 0 0 10px #bb86fc, 0 0 20px #9b59b6;
      }
      100% { 
        text-shadow: 0 0 20px #bb86fc, 0 0 30px #9b59b6, 0 0 40px #6c3483;
      }
    }

    .form-grid {
      display: grid;
      grid-template-columns: 140px 1fr;
      gap: 25px 25px;
      align-items: start;
    }

    .form-group {
      display: contents;
      position: relative;
    }

    .form-group::before {
      content: "🔮";
      position: absolute;
      left: -35px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 16px;
      opacity: 0;
      transition: all 0.3s ease;
      grid-column: 1;
    }

    .form-group:hover::before {
      opacity: 0.7;
      left: -25px;
      animation: orb-pulse 1.5s ease-in-out infinite;
    }

    @keyframes orb-pulse {
      0%, 100% { 
        transform: translateY(-50%) scale(1);
        opacity: 0.7;
      }
      50% { 
        transform: translateY(-50%) scale(1.2);
        opacity: 1;
      }
    }

    label {
      font-family: 'Creepster', cursive;
      color: #bb86fc;
      font-weight: bold;
      font-size: 16px;
      text-align: right;
      padding-top: 12px;
      text-shadow: 0 0 10px rgba(187, 134, 252, 0.5);
      letter-spacing: 1px;
      position: relative;
    }

    input[type="text"],
    input[type="email"] {
      font-family: 'Creepster', cursive;
      width: 100%;
      padding: 16px;
      border: 2px solid #bb86fc;
      border-radius: 18px;
      outline: none;
      background: linear-gradient(145deg, rgba(28, 28, 28, 0.9), rgba(45, 45, 45, 0.9));
      color: #f1f1f1;
      box-shadow: 
        inset 0 0 20px rgba(108, 52, 131, 0.3),
        0 0 10px rgba(187, 134, 252, 0.2);
      transition: all 0.4s ease;
      backdrop-filter: blur(5px);
    }

    input[type="text"]:focus,
    input[type="email"]:focus {
      border-color: #9b59b6;
      background: linear-gradient(145deg, rgba(42, 42, 42, 0.9), rgba(60, 60, 60, 0.9));
      box-shadow: 
        0 0 25px rgba(187, 134, 252, 0.6),
        inset 0 0 15px rgba(155, 89, 182, 0.2);
      transform: scale(1.02);
    }

    input[type="text"]:hover,
    input[type="email"]:hover {
      border-color: #d6a1ff;
      box-shadow: 
        0 0 15px rgba(187, 134, 252, 0.4),
        inset 0 0 10px rgba(108, 52, 131, 0.2);
    }

    input[type="submit"] {
      font-family: 'Creepster', cursive;
      grid-column: 1 / span 2;
      width: 100%;
      padding: 18px;
      margin-top: 35px;
      background: linear-gradient(145deg, #6c3483, #9b59b6, #bb86fc);
      border: 2px solid transparent;
      border-radius: 20px;
      color: #ffffff;
      font-weight: bold;
      cursor: pointer;
      transition: all 0.4s ease;
      box-shadow: 
        0 0 25px rgba(187, 134, 252, 0.4),
        inset 0 0 20px rgba(255, 255, 255, 0.1);
      letter-spacing: 2px;
      font-size: 16px;
      position: relative;
      overflow: hidden;
    }

    input[type="submit"]::before {
      content: "";
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
      transform: rotate(45deg);
      transition: all 0.6s;
      opacity: 0;
    }

    input[type="submit"]:hover {
      background: linear-gradient(145deg, #bb86fc, #d6a1ff, #f0c6ff);
      color: #1a1a1a;
      transform: scale(1.05) translateY(-3px);
      box-shadow: 
        0 8px 30px rgba(187, 134, 252, 0.6),
        inset 0 0 25px rgba(255, 255, 255, 0.2);
      border-color: #fff;
    }

    input[type="submit"]:hover::before {
      opacity: 1;
      left: 100%;
    }

    .actions {
      margin-top: 30px;
      text-align: center;
      grid-column: 1 / span 2;
    }

    .actions a {
      font-family: 'Creepster', cursive;
      color: #f1f1f1;
      font-weight: bold;
      text-decoration: none;
      padding: 14px 28px;
      border: 2px solid #bb86fc;
      border-radius: 18px;
      background: linear-gradient(145deg, rgba(28, 28, 28, 0.9), rgba(45, 45, 45, 0.9));
      box-shadow: 
        0 0 15px rgba(187, 134, 252, 0.3),
        inset 0 0 15px rgba(108, 52, 131, 0.2);
      transition: all 0.4s ease;
      letter-spacing: 1px;
      position: relative;
      overflow: hidden;
      display: inline-block;
    }

    .actions a::before {
      content: "";
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: linear-gradient(45deg, transparent, rgba(187, 134, 252, 0.1), transparent);
      transform: rotate(45deg);
      transition: all 0.6s;
      opacity: 0;
    }

    .actions a:hover {
      background: linear-gradient(145deg, #6c3483, #9b59b6);
      color: #ffffff;
      transform: scale(1.05) translateY(-2px);
      box-shadow: 
        0 6px 25px rgba(187, 134, 252, 0.5),
        inset 0 0 20px rgba(255, 255, 255, 0.1);
      border-color: #d6a1ff;
    }

    .actions a:hover::before {
      opacity: 1;
      left: 100%;
    }

    /* Mobile responsiveness */
    @media (max-width: 768px) {
      body {
        padding: 20px;
      }

      form {
        padding: 40px 30px;
        width: 100%;
      }

      .form-grid {
        grid-template-columns: 1fr;
        gap: 15px;
      }

      label {
        text-align: left;
        padding-top: 0;
        margin-bottom: 8px;
      }

      input[type="submit"] {
        grid-column: 1;
      }

      .actions {
        grid-column: 1;
      }

      .form-container::before,
      .form-container::after,
      .creature-form-left,
      .creature-form-bottom-left,
      .creature-form-bottom-right,
      .creature-form-top-right {
        display: none;
      }

      form::before {
        font-size: 20px;
        padding: 10px 24px;
      }
    }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
      width: 12px;
    }

    ::-webkit-scrollbar-track {
      background: rgba(28, 28, 28, 0.8);
      border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
      background: linear-gradient(145deg, #6c3483, #9b59b6);
      border-radius: 10px;
      border: 2px solid rgba(28, 28, 28, 0.8);
    }

    ::-webkit-scrollbar-thumb:hover {
      background: linear-gradient(145deg, #bb86fc, #d6a1ff);
    }
    h2 {
  text-align: center;
  color: #000; /* Black main text */
  margin-bottom: 30px;
  font-size: 35px;
  letter-spacing: 3px;
  text-shadow: 
    0 0 5px #bb86fc,
    0 0 10px #9b59b6,
    0 0 20px #9b59b6,
    0 0 40px #bb86fc;
  font-family: 'Creepster', cursive;
  animation: title-glow 2s ease-in-out infinite alternate;
}

</style>
</head>
<body>

<div class="form-container">
  <div class="creature-form-left">👁️</div>
  <div class="creature-form-bottom-left">🕸️</div>
  <div class="creature-form-bottom-right">💀</div>
  <div class="creature-form-top-right">🌙</div>

  <<form action="<?=site_url('/update/'.segment(3));?>" method="POST">
  <h2>UPDATE PORTAL</h2>
    <div class="form-grid">
      <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" value="<?=$student['first_name'];?>" placeholder="Your first name">
      </div>

      <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" name="last_name" value="<?=$student['last_name'];?>" placeholder="Your last name">
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?=$student['email'];?>" placeholder="you@example.com">
      </div>

      <input type="submit" value="Update Student">

      <div class="actions">
        <a href="<?=site_url('get_all')?>">⬅ Back to Students</a>
      </div>
    </div>
</form>
</div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create Form</title>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&family=Creepster&display=swap');

    body {
      font-family: 'Cinzel Decorative', serif;
      background: url('https://wallpaperaccess.com/full/8625581.jpg') no-repeat center center fixed;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column; 
      gap: 20px; 
      min-height: 100vh;
      padding: 40px;
      color: #f1f1f1;
    }


    form {
    background: linear-gradient(145deg, #1a1a1a, #2c0d3f);
    padding: 50px 60px;
    border-radius: 25px;
    border: 2px solid #9b59b6;
    box-shadow: 0 0 40px rgba(155, 89, 182, 0.7);
    width: 550px;
    position: relative;
    font-family: 'Creepster', cursive;
    transform: perspective(600px) rotateY(-2deg);
}

form::before {
    content: "STUDENT PORTAL";
    font-size: 28px;
    position: absolute;
    top: -30px;
    left: 50%;
    transform: translateX(-50%) rotate(-1deg);
    background: #9b59b6;
    padding: 6px 22px;
    color: #f1f1f1;
    border: 2px solid #fff;
    border-radius: 12px;
    text-shadow: 2px 2px 5px #000;
}

h2 {
    text-align: center;
    color: #d6a1ff;
    margin-bottom: 30px;
    font-size: 26px;
    letter-spacing: 3px;
    text-shadow: 1px 1px 4px #000;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 8px;
    color: #d6a1ff;
    font-weight: bold;
    font-size: 15px;
    text-shadow: 1px 1px 2px black;
}

input[type="text"],
input[type="email"] {
    width: 95%;
    padding: 14px;
    border: 2px solid #9b59b6;
    border-radius: 15px;
    outline: none;
    background-color: #2b1a3a;
    color: #f1f1f1;
    transition: 0.3s;
    display: block;
    margin: 0 auto;
    font-family: 'Cinzel Decorative', serif;
    box-shadow: inset 0 0 10px rgba(155, 89, 182, 0.3);
}

input[type="text"]:focus,
input[type="email"]:focus {
    border-color: #d6a1ff;
    background-color: #3c1f5f;
    box-shadow: 0 0 15px #d6a1ff;
}

input[type="submit"] {
    width: 95%;
    padding: 16px;
    margin: 30px auto 0;
    background-color: #9b59b6;
    border: none;
    border-radius: 15px;
    color: #ffffff;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
    display: block;
    font-family: 'Creepster', cursive;
    letter-spacing: 2px;
    box-shadow: 0 0 20px rgba(155, 89, 182, 0.5);
}

input[type="submit"]:hover {
    background-color: #d6a1ff;
    color: #000000;
    transform: scale(1.08) rotate(-1deg);
    box-shadow: 0 0 25px #d6a1ff, 0 0 40px #9b59b6;
}

.actions {
    text-align: center;
    margin-top: 25px;
}

.back-link {
    display: inline-block;
    padding: 12px 22px;
    border: 2px solid #d6a1ff;
    border-radius: 15px;
    text-decoration: none;
    color: #f1f1f1;
    background-color: #2b1a3a;
    font-weight: bold;
    transition: 0.3s;
    font-family: 'Cinzel Decorative', serif;
    box-shadow: 0 0 15px #9b59b6;
}

.back-link:hover {
    background-color: #9b59b6;
    color: #ffffff;
    transform: scale(1.05) rotate(1deg);
    box-shadow: 0 0 25px #d6a1ff, 0 0 35px #9b59b6;
}

</style>

</head>
<body>

<form action="<?=site_url('/create');?>" method="POST">
  <h2>Add Student</h2>

  <div class="form-group">
    <label for="first_name">First Name</label>
    <input type="text" id="first_name" name="first_name" placeholder="Your first name">
  </div>

  <div class="form-group">
    <label for="last_name">Last Name</label>
    <input type="text" id="last_name" name="last_name" placeholder="Your last name">
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="you@example.com">
  </div>

  <input type="submit" value="Submit">

  <div class="actions">
    <a class="back-link" href="<?=site_url('get_all')?>">⬅ Back to Students</a>
  </div>
</form>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Student</title>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Creepster&family=Cinzel+Decorative&display=swap');

 /* Import Creepster font if not already included */
@import url('https://fonts.googleapis.com/css2?family=Creepster&display=swap');

body {
    font-family: 'Creepster', cursive;
    background: url('https://wallpaperaccess.com/full/8625581.jpg') no-repeat center center fixed;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column; 
    min-height: 100vh;
    padding: 40px;
    color: #f1f1f1;
}

form {
    font-family: 'Creepster', cursive;
    background: linear-gradient(145deg, rgba(20,20,20,0.9), rgba(35,10,55,0.9));
    padding: 45px;
    border-radius: 25px;
    border: 2px solid #6c3483;
    box-shadow: 0 0 30px rgba(187,134,252,0.6), inset 0 0 10px rgba(155,89,182,0.3);
    width: 520px;
    position: relative;
    overflow: hidden;
}

form::before {
    content: "☽ Update Student ☾";
    font-family: 'Creepster', cursive;
    font-size: 22px;
    position: absolute;
    top: -38px;
    left: 50%;
    transform: translateX(-50%) rotate(-1deg);
    background: #6c3483;
    padding: 8px 22px;
    color: #f1f1f1;
    border-radius: 15px;
    border: 2px solid #fff;
    box-shadow: 0 0 20px #bb86fc, 0 0 10px #6c3483 inset;
    letter-spacing: 2px;
}

h2 {
    font-family: 'Creepster', cursive;
    text-align: center;
    color: #d6a1ff;
    margin-bottom: 30px;
    text-shadow: 1px 1px 5px #000;
}

.form-grid {
    display: grid;
    grid-template-columns: 130px 1fr;
    gap: 18px 20px;
    align-items: start;
}

label {
    font-family: 'Creepster', cursive;
    color: #bb86fc;
    font-weight: bold;
    font-size: 15px;
    text-align: right;
    padding-top: 8px;
    text-shadow: 0 0 3px #000;
}

input[type="text"],
input[type="email"] {
    font-family: 'Creepster', cursive;
    width: 100%;
    padding: 12px;
    border: 2px solid #6c3483;
    border-radius: 15px;
    outline: none;
    background-color: #1c1c1c;
    color: #f1f1f1;
    box-shadow: 0 0 15px #6c3483 inset;
    transition: 0.3s;
}

input[type="text"]:focus,
input[type="email"]:focus {
    border-color: #bb86fc;
    box-shadow: 0 0 25px #bb86fc, 0 0 10px #6c3483 inset;
    background-color: #2a2a2a;
}

input[type="submit"] {
    font-family: 'Creepster', cursive;
    grid-column: 1 / span 2;
    width: 100%;
    padding: 16px;
    margin-top: 25px;
    background: linear-gradient(145deg, #6c3483, #9b59b6);
    border: none;
    border-radius: 15px;
    color: #ffffff;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
    box-shadow: 0 0 15px #6c3483, 0 0 25px #bb86fc inset;
    letter-spacing: 1.5px;
}

input[type="submit"]:hover {
    background: linear-gradient(145deg, #bb86fc, #d6a1ff);
    color: #000;
    transform: scale(1.08) rotate(-1deg);
    box-shadow: 0 0 30px #bb86fc, 0 0 25px #9b59b6 inset;
}

.actions {
    margin-top: 25px;
    text-align: center;
    grid-column: 1 / span 2;
}

.actions a {
    font-family: 'Creepster', cursive;
    color: #bb86fc;
    font-weight: bold;
    text-decoration: none;
    padding: 12px 22px;
    border: 2px solid #bb86fc;
    border-radius: 15px;
    background-color: #1c1c1c;
    box-shadow: 0 0 15px #6c3483 inset;
    transition: 0.3s;
    letter-spacing: 1px;
}

.actions a:hover {
    background-color: #6c3483;
    color: #ffffff;
    transform: scale(1.08) rotate(1deg);
    box-shadow: 0 0 25px #bb86fc, 0 0 20px #6c3483 inset;
}


</style>
</head>
<body>

<form action="<?=site_url('/update/'.segment(3));?>" method="POST">
  <div class="form-grid">
    <label for="id">ID</label>
    <input type="text" id="id" value="<?=$student['id'];?>" name="id" placeholder="Your ID">

    <label for="first_name">First Name</label>
    <input type="text" id="first_name" name="first_name" value="<?=$student['first_name'];?>" placeholder="Your first name">

    <label for="last_name">Last Name</label>
    <input type="text" id="last_name" name="last_name" value="<?=$student['last_name'];?>" placeholder="Your last name">

    <label for="email">Email</label>
    <input type="email" id="email" name="email" value="<?=$student['email'];?>" placeholder="you@example.com">

    <input type="submit" value="Submit">

    <div class="actions">
      <a href="<?=site_url('get_all')?>">⬅ Back to Students</a>
    </div>
  </div>
</form>

</body>
</html>

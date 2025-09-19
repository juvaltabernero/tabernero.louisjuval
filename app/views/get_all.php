<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Records</title>

 
  <link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Creepster', cursive;
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



    .top-actions {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 85%;
      margin: 0 0 15px 0;
    }

    /* Add button */
    .btn-add {
      background: linear-gradient(145deg, #6c3483, #9b59b6);
      color: #ffffff;
      font-family: 'Creepster', cursive;
      font-size: 16px;
      padding: 12px 24px;
      border: 2px solid #bb86fc;
      border-radius: 15px;
      cursor: pointer;
      transition: 0.3s;
      box-shadow: 0 0 15px #6c3483, 0 0 25px #bb86fc inset;
      letter-spacing: 1px;
    }

    .btn-add:hover {
      background: linear-gradient(145deg, #bb86fc, #d6a1ff);
      color: #000;
      transform: scale(1.1);
      box-shadow: 0 0 25px #bb86fc, 0 0 35px #d6a1ff inset;
    }

    /* Search bar */
    .search-bar input {
      padding: 12px 18px;
      width: 280px;
      border: 2px solid #bb86fc;
      border-radius: 15px;
      font-family: 'Creepster', cursive;
      background-color: #1c1c1c;
      color: #f1f1f1;
      box-shadow: 0 0 15px #6c3483 inset;
      outline: none;
      transition: 0.3s;
    }

    .search-bar input:focus {
      border-color: #9b59b6;
      box-shadow: 0 0 25px #bb86fc, 0 0 10px #9b59b6 inset;
      background-color: #2a2a2a;
    }


    table {
      border-collapse: collapse;
      margin: 0 auto;
      font-family: 'Creepster', cursive;
      font-size: 16px;
      border: 2px solid #6c3483;
      border-radius: 15px;
      box-shadow: 0 0 30px rgba(187, 134, 252, 0.6);
      background: linear-gradient(to bottom, rgba(20,20,20,0.95), rgba(35,10,55,0.95));
      width: 85%;
      position: relative;
      overflow: hidden;
    }

    table::before {
      content: "☽ Student Records ☾";
      font-size: 22px;
      position: absolute;
      top: -40px;
      left: 50%;
      transform: translateX(-50%);
      background: #6c3483;
      padding: 8px 24px;
      color: #f1f1f1;
      border-radius: 15px;
      border: 2px solid #fff;
      box-shadow: 0 0 20px #bb86fc;
      font-family: 'Creepster', cursive;
      letter-spacing: 2px;
    }

    th, td {
      border: 1px solid #6c3483;
      padding: 16px 24px;
      text-align: center;
      color: #f1f1f1;
      font-family: 'Creepster', cursive;
    }

    th {
      background: linear-gradient(145deg, #6c3483, #9b59b6);
      color: #ffffff;
      letter-spacing: 2px;
    }

    tr:nth-child(even) td {
      background-color: #1e1e1e;
    }

    tr:hover td {
      background-color: #2a2a2a;
      transform: scale(1.01);
      transition: 0.3s;
    }

    td a {
      color: #bb86fc;
      text-decoration: none;
      font-weight: bold;
      font-family: 'Creepster', cursive;
      transition: 0.2s;
    }

    td a:hover {
      color: #ffffff;
      text-shadow: 0 0 10px #bb86fc, 0 0 15px #6c3483;
    }


    .pagination ul {
      list-style: none;
      display: flex;
      gap: 10px;
      padding: 0;
      margin: 25px 0 0 0;
      font-family: 'Creepster', cursive;
    }

    .pagination li {
      list-style: none;
    }

    .pagination a,
    .pagination strong,
    .pagination span {
      display: inline-block;
      padding: 12px 18px;
      border: 2px solid #bb86fc;
      border-radius: 15px;
      background-color: #1c1c1c;
      color: #f1f1f1;
      text-decoration: none;
      font-weight: bold;
      box-shadow: 0 0 15px #6c3483 inset;
      transition: 0.3s;
      font-family: 'Creepster', cursive;
    }

    .pagination a:hover {
      background-color: #6c3483;
      transform: scale(1.1);
      box-shadow: 0 0 25px #bb86fc;
    }

    .pagination strong {
      background-color: #bb86fc;
      color: #000;
      cursor: default;
    }

    .pagination span {
      background-color: #2a2a2a;
      color: #888;
      cursor: not-allowed;
    }
    h1 {
  font-family: 'Creepster', cursive;
  font-size: 110px;
  text-align: center;
  margin-bottom: 20px;

  /* Black fill with purple outline */
  color: #000000; 
  -webkit-text-stroke: 2px #bb86fc;

  /* Extra creepy shadows */
  text-shadow: 
    3px 3px 6px #000000,
    -3px -3px 6px #000000,
    0 0 10px #6c3483,
    0 0 20px #bb86fc,
    0 0 40px #6c3483,
    0 0 60px #000000;
}




  </style>
</head>
<body>
<h1>WEDNESDAY LIST</h1>

  <div class="top-actions">
    <div class="search-bar">
      <input type="text" id="searchInput" placeholder="🔮 Search student...">
    </div>
    <a href="<?= site_url('create') ?>">
      <button class="btn-add">+ Add Student</button>
    </a>
  </div>

  <table id="studentsTable">
    <tr>
      <th>Id</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Action</th>
    </tr>
    <?php foreach($students as $students): ?>
      <tr>
        <td><?= $students['id']; ?></td>
        <td><?= $students['first_name']; ?></td>
        <td><?= $students['last_name']; ?></td>
        <td><?= $students['email']; ?></td>
        <td>
          <a href="<?= site_url('/update/'.$students['id']); ?>">Update</a> | 
          <a href="<?= site_url('/delete/'.$students['id']); ?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>

  <div class="pagination">
    <?= isset($pagination_links) ? $pagination_links : '' ?>
  </div>

  <script>
    document.getElementById('searchInput').addEventListener('keyup', function () {
      let filter = this.value.toLowerCase();
      let rows = document.querySelectorAll("#studentsTable tr:not(:first-child)");

      rows.forEach(row => {
        let text = row.textContent.toLowerCase();
        row.style.display = text.includes(filter) ? "" : "none";
      });
    });
  </script>

</body>
</html>

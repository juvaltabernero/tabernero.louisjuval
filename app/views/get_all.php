<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Records</title>

  <link href="https://fonts.googleapis.com/css2?family=Nosifer&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Chiller&display=swap" rel="stylesheet">

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
      gap: 20px; 
      min-height: 100vh;
      padding: 30px;
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

    h1 {
      font-family: 'Creepster', cursive; 
      font-size: 80px;
      text-align: center;
      margin-bottom: 15px;
      letter-spacing: 2px;
      color: #000000;
      text-shadow: 
        0 0 8px #6a0dad,
        0 0 16px #8e24aa,
        0 0 32px #bb86fc,
        0 0 48px #7b1fa2,
        0 0 72px #4b0082;
      position: relative;
    }

    h1::before {
      content: "🕷️";
      position: absolute;
      left: -60px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 0.4em;
      animation: spider-swing 4s ease-in-out infinite;
    }

    h1::after {
      content: "🦇";
      position: absolute;
      right: -60px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 0.4em;
      animation: bat-fly 3s ease-in-out infinite;
    }

    @keyframes spider-swing {
      0%, 100% { transform: translateY(-50%) rotate(0deg); }
      25% { transform: translateY(-30%) rotate(10deg); }
      75% { transform: translateY(-70%) rotate(-10deg); }
    }

    .top-actions {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 70%;
      max-width: 800px;
      margin: 0 0 10px 0;
      flex-wrap: wrap;
      gap: 15px;
    }

    /* Enhanced buttons */
    .btn-add {
      background: linear-gradient(145deg, #2c1810, #6c3483, #9b59b6);
      color: #ffffff;
      font-family: 'Creepster', cursive;
      font-size: 14px;
      padding: 10px 20px;
      border: 2px solid transparent;
      border-radius: 15px;
      cursor: pointer;
      transition: all 0.4s ease;
      box-shadow: 
        0 0 15px rgba(187, 134, 252, 0.4),
        inset 0 0 15px rgba(187, 134, 252, 0.1);
      letter-spacing: 1px;
      position: relative;
      overflow: hidden;
    }

    .btn-add::before {
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

    .btn-add:hover {
      background: linear-gradient(145deg, #bb86fc, #d6a1ff, #f0c6ff);
      color: #1a1a1a;
      transform: scale(1.05) translateY(-2px);
      box-shadow: 
        0 6px 20px rgba(187, 134, 252, 0.6),
        inset 0 0 15px rgba(255, 255, 255, 0.2);
      border-color: #fff;
    }

    .btn-add:hover::before {
      opacity: 1;
      left: 100%;
    }

    /* Enhanced search bar */
    .search-bar {
      position: relative;
    }

    .search-bar form {
      display: flex;
      gap: 8px;
      align-items: center;
    }

    .search-bar input {
      padding: 10px 15px;
      width: 220px;
      border: 2px solid #bb86fc;
      border-radius: 15px;
      font-family: 'Creepster', cursive;
      font-size: 12px;
      background: linear-gradient(145deg, rgba(28, 28, 28, 0.9), rgba(45, 45, 45, 0.9));
      color: #f1f1f1;
      box-shadow: 
        inset 0 0 15px rgba(108, 52, 131, 0.3),
        0 0 10px rgba(187, 134, 252, 0.2);
      outline: none;
      transition: all 0.4s ease;
      backdrop-filter: blur(10px);
    }

    .search-bar input:focus {
      border-color: #9b59b6;
      box-shadow: 
        0 0 20px rgba(187, 134, 252, 0.6),
        inset 0 0 10px rgba(155, 89, 182, 0.2);
      background: linear-gradient(145deg, rgba(42, 42, 42, 0.9), rgba(60, 60, 60, 0.9));
      transform: scale(1.02);
    }

    /* Creatures around the table container */
    .table-container {
      width: 70%;
      max-width: 800px;
      position: relative;
      margin-top: 5px;
    }

    .table-container::before {
      content: "🕷️";
      position: absolute;
      top: -15px;
      left: 40px;
      font-size: 18px;
      animation: spider-crawl-top 6s linear infinite;
      z-index: 5;
    }

    .table-container::after {
      content: "🦇";
      position: absolute;
      top: 50%;
      right: -30px;
      font-size: 16px;
      animation: bat-fly-right 4s ease-in-out infinite;
      z-index: 5;
    }

    @keyframes spider-crawl-top {
      0% { left: 40px; transform: rotate(0deg); }
      25% { left: 70%; transform: rotate(90deg); }
      50% { left: calc(100% - 40px); transform: rotate(180deg); }
      75% { left: 30%; transform: rotate(270deg); }
      100% { left: 40px; transform: rotate(360deg); }
    }

    @keyframes bat-fly-right {
      0%, 100% { 
        right: -30px; 
        transform: translateY(-50%) rotate(0deg) scale(1);
      }
      50% { 
        right: -45px; 
        transform: translateY(-60%) rotate(-8deg) scale(1.1);
      }
    }

    table {
      border-collapse: separate;
      border-spacing: 0;
      margin: 0 auto;
      font-family: 'Creepster', cursive;
      font-size: 12px;
      border: 2px solid #6c3483;
      border-radius: 18px;
      box-shadow: 
        0 0 25px rgba(187, 134, 252, 0.4),
        inset 0 0 20px rgba(20, 20, 20, 0.8);
      background: linear-gradient(145deg, rgba(15,15,15,0.95), rgba(35,10,55,0.95));
      width: 100%;
      position: relative;
      overflow: hidden;
      backdrop-filter: blur(8px);
    }

    table::before {
      content: "☽ Student Records ☾";
      font-size: 16px;
      position: absolute;
      top: -35px;
      left: 50%;
      transform: translateX(-50%);
      background: linear-gradient(145deg, #6c3483, #9b59b6);
      padding: 8px 20px;
      color: #f1f1f1;
      border-radius: 15px;
      border: 2px solid #bb86fc;
      box-shadow: 
        0 0 20px rgba(187, 134, 252, 0.6),
        inset 0 0 10px rgba(255, 255, 255, 0.1);
      font-family: 'Nosifer', cursive;
      letter-spacing: 2px;
      animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
      0%, 100% { transform: translateX(-50%) translateY(0px); }
      50% { transform: translateX(-50%) translateY(-3px); }
    }

    th, td {
      border: none;
      border-bottom: 1px solid rgba(108, 52, 131, 0.3);
      border-right: 1px solid rgba(108, 52, 131, 0.3);
      padding: 6px 8px;
      text-align: center;
      color: #f1f1f1;
      font-family: 'Creepster', cursive;
      position: relative;
    }

    th {
      background: linear-gradient(145deg, #6c3483, #9b59b6, #bb86fc);
      color: #ffffff;
      letter-spacing: 1px;
      font-weight: bold;
      text-shadow: 0 0 8px rgba(0,0,0,0.5);
      position: sticky;
      top: 0;
      z-index: 10;
      font-size: 13px;
    }

    th:first-child {
      border-top-left-radius: 16px;
    }

    th:last-child {
      border-top-right-radius: 16px;
      border-right: none;
    }

    tbody tr {
      transition: all 0.3s ease;
      position: relative;
    }

    tbody tr:nth-child(even) td {
      background-color: rgba(30, 30, 30, 0.7);
    }

    tbody tr:hover {
      transform: scale(1.015);
      box-shadow: 0 4px 15px rgba(187, 134, 252, 0.3);
    }

    tbody tr:hover td {
      background: linear-gradient(90deg, rgba(187, 134, 252, 0.1), rgba(155, 89, 182, 0.1));
      color: #bb86fc;
      position: relative;
    }

    tbody tr:hover td::before {
      content: "🕸️";
      position: absolute;
      left: -15px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 10px;
      opacity: 0.7;
      animation: web-appear 0.3s ease-in;
    }

    tbody tr:hover td:last-child::after {
      content: "👁️";
      position: absolute;
      right: -18px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 11px;
      opacity: 0.8;
      animation: eye-blink 2s infinite;
    }

    @keyframes web-appear {
      0% { opacity: 0; transform: translateY(-50%) scale(0); }
      100% { opacity: 0.7; transform: translateY(-50%) scale(1); }
    }

    @keyframes eye-blink {
      0%, 90%, 100% { opacity: 0.8; }
      95% { opacity: 0.2; }
    }

    tbody tr:last-child td:first-child {
      border-bottom-left-radius: 16px;
    }

    tbody tr:last-child td:last-child {
      border-bottom-right-radius: 16px;
    }

    td:last-child {
      border-right: none;
    }

    td a {
      color: #bb86fc;
      text-decoration: none;
      font-weight: bold;
      font-family: 'Creepster', cursive;
      font-size: 11px;
      transition: all 0.3s ease;
      padding: 6px 10px;
      border-radius: 10px;
      display: inline-block;
      margin: 0 2px;
      position: relative;
      overflow: hidden;
    }

    td a::before {
      content: "";
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(187, 134, 252, 0.2), transparent);
      transition: left 0.5s;
    }

    td a:hover {
      color: #ffffff;
      text-shadow: 0 0 10px #bb86fc;
      background: rgba(187, 134, 252, 0.2);
      transform: translateY(-1px);
    }

    td a:hover::before {
      left: 100%;
    }

    /* Enhanced pagination */
    .pagination {
      margin-top: 15px;
    }

    .pagination ul {
      list-style: none;
      display: flex;
      gap: 8px;
      padding: 0;
      margin: 0;
      font-family: 'Creepster', cursive;
      justify-content: center;
      flex-wrap: wrap;
    }

    .pagination li {
      list-style: none;
    }

    .pagination a,
    .pagination strong,
    .pagination span {
      display: inline-block;
      padding: 10px 14px;
      border: 2px solid #bb86fc;
      border-radius: 12px;
      background: linear-gradient(145deg, rgba(28, 28, 28, 0.9), rgba(45, 45, 45, 0.9));
      color: #f1f1f1;
      text-decoration: none;
      font-weight: bold;
      font-size: 12px;
      box-shadow: 
        inset 0 0 10px rgba(108, 52, 131, 0.3),
        0 0 8px rgba(187, 134, 252, 0.2);
      transition: all 0.4s ease;
      font-family: 'Creepster', cursive;
      position: relative;
      overflow: hidden;
    }

    .pagination a:hover {
      background: linear-gradient(145deg, #6c3483, #9b59b6);
      transform: scale(1.05) translateY(-2px);
      box-shadow: 0 6px 20px rgba(187, 134, 252, 0.4);
    }

    .pagination strong {
      background: linear-gradient(145deg, #bb86fc, #d6a1ff);
      color: #1a1a1a;
      cursor: default;
      box-shadow: 
        0 0 15px rgba(187, 134, 252, 0.6),
        inset 0 0 10px rgba(255, 255, 255, 0.2);
    }

    .pagination span {
      background: linear-gradient(145deg, rgba(42, 42, 42, 0.7), rgba(60, 60, 60, 0.7));
      color: #888;
      cursor: not-allowed;
      opacity: 0.6;
    }

    /* Mobile responsiveness */
    @media (max-width: 768px) {
      .table-container {
        width: 90%;
      }
      
      .top-actions {
        width: 90%;
        flex-direction: column;
        gap: 10px;
        align-items: stretch;
      }

      .search-bar form {
        justify-content: center;
      }

      .search-bar input {
        width: 100%;
        max-width: 250px;
      }

      table {
        font-size: 10px;
      }

      th, td {
        padding: 8px 6px;
      }

      h1 {
        font-size: 60px;
      }

      h1::before,
      h1::after {
        display: none;
      }
    }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
      width: 8px;
    }

    ::-webkit-scrollbar-track {
      background: rgba(28, 28, 28, 0.8);
      border-radius: 8px;
    }

    ::-webkit-scrollbar-thumb {
      background: linear-gradient(145deg, #6c3483, #9b59b6);
      border-radius: 8px;
      border: 1px solid rgba(28, 28, 28, 0.8);
    }

    ::-webkit-scrollbar-thumb:hover {
      background: linear-gradient(145deg, #bb86fc, #d6a1ff);
    }
  </style>
</head>
<body>
<h1>WEDNESDAY LIST</h1>

<div class="top-actions">
  <div class="search-bar">
    <!-- ✅ Search form with button -->
    <form method="get" action="<?= site_url('get_all'); ?>">
      <input type="text" name="q" placeholder="🔮 Search student..." value="<?= htmlspecialchars($search ?? '') ?>">
      <button type="submit" class="btn-add">🔍 Search</button>
    </form>
  </div>
  <a href="<?= site_url('create') ?>">
    <button class="btn-add">+ Add Student</button>
  </a>
</div>

<div class="table-container">
  <table>
    <thead>
      <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($students)): ?>
        <?php foreach($students as $student): ?>
          <tr>
            <td><?= $student['id']; ?></td>
            <td><?= $student['first_name']; ?></td>
            <td><?= $student['last_name']; ?></td>
            <td><?= $student['email']; ?></td>
            <td>
              <a href="<?= site_url('/update/'.$student['id']); ?>">✏️ Update</a>
              <a href="<?= site_url('/delete/'.$student['id']); ?>" onclick="return confirm('Are you sure you want to delete this record?');">🗑️ Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr><td colspan="5">No students found in the shadows... 👻</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<div class="pagination">
  <?= isset($page) ? $page : '' ?>
</div>

</body>
</html>
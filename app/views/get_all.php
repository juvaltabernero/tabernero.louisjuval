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

    h1 {
      font-family: 'Creepster', cursive; 
      font-size: 135px;
      text-align: center;
      margin-bottom: 20px;
      letter-spacing: 3px;
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
      left: -80px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 0.4em;
      animation: spider-swing 4s ease-in-out infinite;
    }

    h1::after {
      content: "🦇";
      position: absolute;
      right: -80px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 0.4em;
      animation: bat-fly 3s ease-in-out infinite;
    }

    @keyframes glow-pulse {
      0% { 
        text-shadow: 
          0 0 10px #6a0dad,
          0 0 20px #8e24aa,
          0 0 40px #bb86fc,
          0 0 60px #7b1fa2;
      }
      100% { 
        text-shadow: 
          0 0 20px #6a0dad,
          0 0 30px #8e24aa,
          0 0 50px #bb86fc,
          0 0 70px #7b1fa2,
          0 0 90px #4b0082,
          0 0 110px #9b59b6;
      }
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
      width: 90%;
      max-width: 1200px;
      margin: 0 0 10px 0;
      flex-wrap: wrap;
      gap: 20px;
    }

    /* Enhanced buttons */
    .btn-add {
      background: linear-gradient(145deg, #2c1810, #6c3483, #9b59b6);
      color: #ffffff;
      font-family: 'Creepster', cursive;
      font-size: 16px;
      padding: 14px 28px;
      border: 2px solid transparent;
      border-radius: 20px;
      cursor: pointer;
      transition: all 0.4s ease;
      box-shadow: 
        0 0 20px rgba(187, 134, 252, 0.4),
        inset 0 0 20px rgba(187, 134, 252, 0.1);
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
      transform: scale(1.05) translateY(-3px);
      box-shadow: 
        0 8px 25px rgba(187, 134, 252, 0.6),
        inset 0 0 20px rgba(255, 255, 255, 0.2);
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
      gap: 12px;
      align-items: center;
    }

    .search-bar input {
      padding: 14px 20px;
      width: 320px;
      border: 2px solid #bb86fc;
      border-radius: 20px;
      font-family: 'Creepster', cursive;
      background: linear-gradient(145deg, rgba(28, 28, 28, 0.9), rgba(45, 45, 45, 0.9));
      color: #f1f1f1;
      box-shadow: 
        inset 0 0 20px rgba(108, 52, 131, 0.3),
        0 0 15px rgba(187, 134, 252, 0.2);
      outline: none;
      transition: all 0.4s ease;
      backdrop-filter: blur(10px);
    }

    .search-bar input:focus {
      border-color: #9b59b6;
      box-shadow: 
        0 0 30px rgba(187, 134, 252, 0.6),
        inset 0 0 15px rgba(155, 89, 182, 0.2);
      background: linear-gradient(145deg, rgba(42, 42, 42, 0.9), rgba(60, 60, 60, 0.9));
      transform: scale(1.02);
    }

    /* Creatures around the table container */
    .table-container {
      width: 90%;
      max-width: 1200px;
      position: relative;
      margin-top: 5px;
    }

    .table-container::before {
      content: "🕷️";
      position: absolute;
      top: -20px;
      left: 50px;
      font-size: 24px;
      animation: spider-crawl-top 6s linear infinite;
      z-index: 5;
    }

    .table-container::after {
      content: "🦇";
      position: absolute;
      top: 50%;
      right: -40px;
      font-size: 20px;
      animation: bat-fly-right 4s ease-in-out infinite;
      z-index: 5;
    }

    /* Additional creatures */
    .creature-left {
      content: "👁️";
      position: absolute;
      top: 50%;
      left: -40px;
      font-size: 18px;
      animation: eye-watch-left 3s ease-in-out infinite;
      z-index: 5;
    }

    .creature-bottom-left {
      content: "🕸️";
      position: absolute;
      bottom: -30px;
      left: 20%;
      font-size: 22px;
      animation: web-sway 5s ease-in-out infinite;
      z-index: 5;
    }

    .creature-bottom-right {
      content: "💀";
      position: absolute;
      bottom: -35px;
      right: 15%;
      font-size: 20px;
      animation: skull-bob 4s ease-in-out infinite;
      z-index: 5;
    }

    .creature-top-right {
      content: "🌙";
      position: absolute;
      top: -25px;
      right: 20%;
      font-size: 18px;
      animation: moon-glow 3s ease-in-out infinite alternate;
      z-index: 5;
    }

    @keyframes spider-crawl-top {
      0% { left: 50px; transform: rotate(0deg); }
      25% { left: 70%; transform: rotate(90deg); }
      50% { left: calc(100% - 50px); transform: rotate(180deg); }
      75% { left: 30%; transform: rotate(270deg); }
      100% { left: 50px; transform: rotate(360deg); }
    }

    @keyframes bat-fly-right {
      0%, 100% { 
        right: -40px; 
        transform: translateY(-50%) rotate(0deg) scale(1);
      }
      50% { 
        right: -60px; 
        transform: translateY(-70%) rotate(-10deg) scale(1.1);
      }
    }

    @keyframes eye-watch-left {
      0%, 100% { 
        left: -40px; 
        transform: translateY(-50%) scale(1);
        opacity: 0.8;
      }
      50% { 
        left: -20px; 
        transform: translateY(-50%) scale(1.2);
        opacity: 1;
      }
    }

    @keyframes web-sway {
      0%, 100% { 
        transform: rotate(-5deg);
        opacity: 0.6;
      }
      50% { 
        transform: rotate(5deg);
        opacity: 0.9;
      }
    }

    @keyframes skull-bob {
      0%, 100% { 
        bottom: -35px;
        transform: rotate(-3deg);
      }
      50% { 
        bottom: -25px;
        transform: rotate(3deg);
      }
    }

    @keyframes moon-glow {
      0% { 
        opacity: 0.6;
        text-shadow: 0 0 10px #bb86fc;
      }
      100% { 
        opacity: 1;
        text-shadow: 0 0 20px #bb86fc, 0 0 30px #9b59b6;
      }
    }

    table {
      border-collapse: separate;
      border-spacing: 0;
      margin: 0 auto;
      font-family: 'Creepster', cursive;
      font-size: 16px;
      border: 3px solid #6c3483;
      border-radius: 25px;
      box-shadow: 
        0 0 40px rgba(187, 134, 252, 0.4),
        inset 0 0 30px rgba(20, 20, 20, 0.8);
      background: linear-gradient(145deg, rgba(15,15,15,0.95), rgba(35,10,55,0.95));
      width: 100%;
      position: relative;
      overflow: hidden;
      backdrop-filter: blur(10px);
    }

    table::before {
      content: "☽ Student Records ☾";
      font-size: 24px;
      position: absolute;
      top: -50px;
      left: 50%;
      transform: translateX(-50%);
      background: linear-gradient(145deg, #6c3483, #9b59b6);
      padding: 12px 32px;
      color: #f1f1f1;
      border-radius: 20px;
      border: 3px solid #bb86fc;
      box-shadow: 
        0 0 30px rgba(187, 134, 252, 0.6),
        inset 0 0 15px rgba(255, 255, 255, 0.1);
      font-family: 'Nosifer', cursive;
      letter-spacing: 3px;
      animation: float 3s ease-in-out infinite;
    }

    table::after {
      content: "";
      position: absolute;
      top: -30px;
      right: 20px;
      width: 30px;
      height: 30px;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><text y=".9em" font-size="90">🕷️</text></svg>') no-repeat;
      background-size: contain;
      animation: table-spider-crawl 8s linear infinite;
      opacity: 0.8;
    }

    @keyframes float {
      0%, 100% { transform: translateX(-50%) translateY(0px); }
      50% { transform: translateX(-50%) translateY(-5px); }
    }

    th, td {
      border: none;
      border-bottom: 1px solid rgba(108, 52, 131, 0.3);
      border-right: 1px solid rgba(108, 52, 131, 0.3);
      padding: 20px 24px;
      text-align: center;
      color: #f1f1f1;
      font-family: 'Creepster', cursive;
      position: relative;
    }

    th {
      background: linear-gradient(145deg, #6c3483, #9b59b6, #bb86fc);
      color: #ffffff;
      letter-spacing: 2px;
      font-weight: bold;
      text-shadow: 0 0 10px rgba(0,0,0,0.5);
      position: sticky;
      top: 0;
      z-index: 10;
    }

    th:first-child {
      border-top-left-radius: 22px;
    }

    th:last-child {
      border-top-right-radius: 22px;
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
      transform: scale(1.02);
      box-shadow: 0 5px 20px rgba(187, 134, 252, 0.3);
    }

    tbody tr:hover td {
      background: linear-gradient(90deg, rgba(187, 134, 252, 0.1), rgba(155, 89, 182, 0.1));
      color: #bb86fc;
      position: relative;
    }

    tbody tr:hover td::before {
      content: "🕸️";
      position: absolute;
      left: -20px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 12px;
      opacity: 0.7;
      animation: web-appear 0.3s ease-in;
    }

    tbody tr:hover td:last-child::after {
      content: "👁️";
      position: absolute;
      right: -25px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 14px;
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
      border-bottom-left-radius: 22px;
    }

    tbody tr:last-child td:last-child {
      border-bottom-right-radius: 22px;
    }

    td:last-child {
      border-right: none;
    }

    td a {
      color: #bb86fc;
      text-decoration: none;
      font-weight: bold;
      font-family: 'Creepster', cursive;
      transition: all 0.3s ease;
      padding: 8px 12px;
      border-radius: 12px;
      display: inline-block;
      margin: 0 4px;
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
      text-shadow: 0 0 15px #bb86fc;
      background: rgba(187, 134, 252, 0.2);
      transform: translateY(-2px);
    }

    td a:hover::before {
      left: 100%;
    }

    /* Enhanced pagination */
    .pagination {
      margin-top: 1px;
    }

    .pagination ul {
      list-style: none;
      display: flex;
      gap: 12px;
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
      padding: 14px 20px;
      border: 2px solid #bb86fc;
      border-radius: 18px;
      background: linear-gradient(145deg, rgba(28, 28, 28, 0.9), rgba(45, 45, 45, 0.9));
      color: #f1f1f1;
      text-decoration: none;
      font-weight: bold;
      box-shadow: 
        inset 0 0 15px rgba(108, 52, 131, 0.3),
        0 0 10px rgba(187, 134, 252, 0.2);
      transition: all 0.4s ease;
      font-family: 'Creepster', cursive;
      position: relative;
      overflow: hidden;
    }

    .pagination a:hover {
      background: linear-gradient(145deg, #6c3483, #9b59b6);
      transform: scale(1.1) translateY(-3px);
      box-shadow: 0 8px 25px rgba(187, 134, 252, 0.4);
    }

    .pagination strong {
      background: linear-gradient(145deg, #bb86fc, #d6a1ff);
      color: #1a1a1a;
      cursor: default;
      box-shadow: 
        0 0 20px rgba(187, 134, 252, 0.6),
        inset 0 0 15px rgba(255, 255, 255, 0.2);
    }

    .pagination span {
      background: linear-gradient(145deg, rgba(42, 42, 42, 0.7), rgba(60, 60, 60, 0.7));
      color: #888;
      cursor: not-allowed;
      opacity: 0.6;
    }

    /* Mobile responsiveness */
    @media (max-width: 768px) {
      .top-actions {
        flex-direction: column;
        gap: 15px;
        align-items: stretch;
      }

      .search-bar form {
        justify-content: center;
      }

      .search-bar input {
        width: 100%;
        max-width: 300px;
      }

      table {
        font-size: 14px;
      }

      th, td {
        padding: 12px 8px;
      }

      h1::before,
      h1::after {
        display: none;
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
<?php
require_once("settings.php");

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$database;charset=utf8",
        $username,
        $password
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT * FROM member_contributions");
    $stmt->execute();

    $members = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="styles/shopnest.css">
<head>
    <meta charset="UTF-8">
    <title>About Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        .member-card {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
        }
        .member-name {
            font-size: 20px;
            font-weight: bold;
        }
        .role {
            color: #555;
            margin-bottom: 10px;
        }
        .section-title {
            font-weight: bold;
            margin-top: 10px;
        }
        
    </style>
</head>
<body>
    
<header>
  <!--header inc link-->
    <?php include 'header.inc'; ?>

    <!--Nav inc link-->
  <?php include 'nav.inc'; ?>
  </header>

  

<h1>About Our Team</h1>

<?php foreach ($members as $member): ?>
    <div class="member-card">
        <div class="member-name">
            <?= htmlspecialchars($member['member_name']) ?>
        </div>

        <div class="role">
            Role: <?= htmlspecialchars($member['role']) ?>
        </div>

        <div>
            <div class="section-title">Project 1 Contribution:</div>
            <div><?= nl2br(htmlspecialchars($member['project_1_contribution'])) ?></div>
        </div>

        <div>
            <div class="section-title">Project 2 Contribution:</div>
            <div><?= nl2br(htmlspecialchars($member['project_2_contribution'])) ?></div>
        </div>
    </div>
<?php endforeach; ?>


</body>
</html>
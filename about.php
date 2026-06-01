<?php
require_once("settings.php");

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$database;charset=utf8",
        $username,
        $password
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM member_contributions ORDER BY member_name ASC");
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

  <section class="team-section">

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

</section>
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


<h2>Member Quotes</h2>

<dl>
    <dt>Kade (Ukrainian)</dt>
    <dd>"Shablya ranytʹ tilo, a slovo — dushu"</dd>
    <dd><em>Translation: The sword wounds the body, but the word wounds the soul.</em></dd>

    <dt>Bianca (Italian)</dt>
    <dd>"La gatta frettolosa ha fatto i gattini ciechi"</dd>
    <dd><em>Translation: The hurried cat made blind kittens</em></dd>

    <dt>Tom (Vietnamese)</dt>
    <dd>"Thất bại là mẹ thành công"</dd>
    <dd><em>Translation: Failure is the mother of success</em></dd>

    <dt>Damisi (Yoruba)</dt>
    <dd>"Ojo ko da enikeni si ore, gbogbo re lo n mu dogba"</dd>
    <dd><em>Translation: The rain does not recognize anyone as a friend, it drenches all equally</em></dd>
</dl>

<h2>Fun Facts</h2>

<table>
    <tr>
        <th>Member</th>
        <th>Ethnicity</th>
        <th>Favourite Snack</th>
        <th>Number of Siblings</th>
        <th>Favourite Sport</th>
    </tr>
    <tr>
        <td>Damisi</td>
        <td>Nigerian</td>
        <td>Beef jerky</td>
        <td>3 siblings</td>
        <td>Basketball</td>
    </tr>
    <tr>
        <td>Bianca</td>
        <td>Italian/Greek</td>
        <td>Cupcakes</td>
        <td>1 sibling</td>
        <td>Soccer</td>
    </tr>
    <tr>
        <td>Kade</td>
        <td>Maltese/Ukrainian/British/Irish</td>
        <td>Chips</td>
        <td>2 siblings</td>
        <td>Footy</td>
    </tr>
    <tr>
        <td>Tom</td>
        <td>Vietnamese</td>
        <td>Tim Tams</td>
        <td>1 sibling</td>
        <td>Tennis</td>
    </tr>
</table>

</body>
</html>
<?php 
require_once 'jobsetting.php'; 

$search = '';
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

$query = "SELECT * FROM jobs";
$result = mysqli_query($conn, $query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name = "description" content = "Job Description Page">
    <meta name = "keywords" content = "Jobs, Application, HTML, ecommerce ">
    <meta name = "author" content = "Thomas Nguyen">
    <link rel="stylesheet" href="styles/shopnest.css">
    <title>Job Description</title>

  <!---Embedded CSS-->
  <style>
  body {
    font-family: Arial, sans-serif;
  }
  h1 {
    color: #1e3a8a;
  }
  .search-container { margin: 20px 0; }
  .search-container input[type="text"] { padding: 8px; font-size: 15px; width: 300px; }
</style>

</head>
<!--disclaimer: AI was used to generate type of jobs for the theme ecommerce. for 2 job positions-->
<body>

<header>
  <img src="images/company_logo.png" alt="ShopNest Logo">
</header>

<!--Nav inc link-->
<?php include 'nav.inc'; ?>

    <h1>Available positions</h1>
    <p>We are hiring individuals who have experience in assisting customers online with their orders. All roles are based in Melbourne, Victoria.</p>
  
    <!---Search Bar-->
<div class="search-container">
    <form method="GET" action="jobs.php">
        <input type="text" name="search" placeholder="Search job by keyword" value=" <?php echo $search; ?>">
        <button type="submit">Search</button>
        <a href="jobs.php">Clear</a>
    </form>
</div>
  
<?php while ($job = mysqli_fetch_assoc($result)): ?>

    <?php if ($search == '' || stristr($job['job_title'], $search)): ?>

      <article style="margin:20px; border:2px solid #1e3a8a; padding:15px;">

        <h2><?php echo $job['job_title']; ?></h2>

        <p><strong>Reference Number:</strong> <?php echo $job['reference_number']; ?></p>
        <p><strong>Reporting Line:</strong> <?php echo $job['reporting_line']; ?></p>

      <!--important info for the jobs-->
        <aside style="float: right; width: 25%; margin: 10px; padding: 15px; border: 1px solid black;">

            <h3>Important Job Information</h3>

            <p><strong>Location:</strong> <?php echo $job['location']; ?></p>
            <p><strong>Job Type:</strong> <?php echo $job['job_type']; ?></p>
            <p><strong>Salary:</strong> <?php echo $job['salary_range']; ?></p>
            <p><strong>Experience:</strong> <?php echo $job['experience']; ?></p>

            <h4>Key Skills</h4>
            <ul>
                <?php foreach (explode(',', $job['key_skills']) as $skill): ?>
                    <li><?php echo trim($skill); ?></li>
                <?php endforeach; ?>
            </ul>

        </aside>

      <!--main job content-->
        <section>
            <h3>About the Role</h3>
            <p><?php echo $job['about_role']; ?></p>
        </section>

        <section>
            <h3>About the Team</h3>
            <p><?php echo $job['about_team']; ?></p>
        </section>

        <section>
            <h3>Responsibilities</h3>
            <ol>
                <?php foreach (explode('|', $job['responsibilities']) as $item): ?>
                    <li><?php echo trim($item); ?></li>
                <?php endforeach; ?>
            </ol>
        </section>

        <section>
            <h3>Requirements</h3>

            <h4>Essential</h4>
            <ul>
                <?php foreach (explode('|', $job['essential_req']) as $item): ?>
                    <li><?php echo trim($item); ?></li>
                <?php endforeach; ?>
            </ul>

            <h4>Preferable</h4>
            <ul>
                <?php foreach (explode('|', $job['preferable_req']) as $item): ?>
                    <li><?php echo trim($item); ?></li>
                <?php endforeach; ?>
            </ul>

        </section>

    </article>
  
 <?php endif; ?>

<?php endwhile; ?>

<?php mysqli_close($conn); ?>


  <footer style="text-align: center; font-size: 14px;">
    <p>To apply, send your resume and a short cover letter to <a href="mailto:106509590@swinburne.edu.au">106509590@sswinburne.edu.au</a> quoting the reference number of the role.</p>
    <p>We are an equal opportunity employer and welcome applications from all backgrounds.</p>
    <p>We would also like to acknowledge the Wurundjeri People of the Kulin Nation, the Traditional Owners of the land on which we work. We pay our respects to Elders past, present and emerging.</p>
  </footer>

</body>
</html>

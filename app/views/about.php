<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>About</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <?php
    include("./app/views/head_links.php");
  ?>
</head>

<body>

  <?php
    include("./app/views/header.php");
  ?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>About</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

    <section id="team" class="team section-bg inner-page">
      <div class="container">

        <div class="section-title">
          <h2>About</h2>
            <?php 
            foreach($result as $key=>$value){
            ?>
            <p>
             <?php echo $value['description'];?>
            </p>
            <?php 
            }
            ?>
        </div>
      </div>
    </section><!-- End Team Section -->

  </main><!-- End #main -->

  <?php
    include("./app/views/footer.php");
  ?>
</body>

</html>
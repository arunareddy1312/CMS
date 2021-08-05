<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Services</title>
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
          <li>Services</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

     <!-- ======= Services Section ======= -->
    <section id="services" class="services inner-page">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
        </div>

        <div class="row">
           <?php 
            foreach($result as $key=>$value){
            ?>
          <div class="col-lg-4 col-md-6">
            <div class="icon-box">
              <div class="icon"><i class="<?php echo $value['classname'];?>" style="color: #ff689b;"></i></div>
              <h4 class="title"><a href=""><?php echo $value['heading'];?></a></h4>
              <p class="description"><?php echo $value['description'];?></p>
            </div>
          </div>
          <?php 
            }
            ?>

        </div>

      </div>
    </section><!-- End Services Section -->

  </main><!-- End #main -->

  <?php
    include("./app/views/footer.php");
  ?>
</body>

</html>
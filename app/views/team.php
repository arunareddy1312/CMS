<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Team</title>
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
          <li>Team</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

    <section id="team" class="team section-bg inner-page">
      <div class="container">

        <div class="section-title">
          <h2>Team</h2>         
        </div>

        <div class="row">
           <?php 
            foreach($result as $key=>$value){
            ?>
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="member">
                <div class="member-img">
                  <img src="./<?php echo $value['photo'];?>" class="img-fluid" alt="">                
                </div>
                <div class="member-info">
                  <h4><?php echo $value['name'];?></h4>
                  <span><?php echo $value['designation'];?></span>
                </div>
              </div>
            </div>
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
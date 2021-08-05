<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Portfolio</title>
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
          <li>Portfolio</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

     <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>Portfolio</h2>
        </div>

        <ul id="portfolio-flters" class="d-flex justify-content-center">
          <li data-filter="*" class="filter-active">All</li>
          <li data-filter=".filter-app">App</li>
          <li data-filter=".filter-card">Card</li>
          <li data-filter=".filter-web">Web</li>
        </ul>

        <div class="row portfolio-container">

          <?php 
          foreach($result as $key=>$value){
            ?>
          <div class="col-lg-4 col-md-6 portfolio-item <?php echo $value['filter_class'];?>">
            <div class="portfolio-img"><img src="./<?php echo $value['image'];?>" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4><?php echo $value['heading'];?></h4>
              <p><?php echo $value['text'];?></p>
              <a href="./<?php echo $value['image'];?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>              
            </div>
          </div>
          <?php 
          }
          ?>         

        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <?php
    include("./app/views/footer.php");
  ?>
</body>

</html>
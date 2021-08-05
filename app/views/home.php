<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <?php
   include("./app/views/head_links.php");
  ?>

<body>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <?php 
    foreach($header as $key=>$value){
    ?>
    <div class="hero-container">
      <h1><?php echo $value['heading'];?></h1>
      <h2><?php echo $value['text'];?></h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
    <?php  
    }
    ?>
  </section><!-- End Hero -->

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center header-inner-pages">
    <div class="container-fluid d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.html">CMS</a></h1>
     
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="Contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="header-social-links d-flex align-items-center">
        <a href="admin/Login">Login</a>
      </div>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about team section-bg">
      <div class="container">

        <div class="section-title">
          <h2>About Us</h2>
        </div>

        <div class="row content">
            <?php 
            $count = 0;
            $end = 1;
            foreach($team as $key=>$value){
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
            $count++;
            if ($count == $end) break;
            }
            ?>

          <div class="col-lg-9 col-md-6 padding">
            <?php 
            foreach($result as $key=>$value){
            ?>
            <p>
             <?php echo $value['description'];?>
            </p>
            <?php 
            }
            ?>
            <div class="text-center">
              <a href="About" class="view_more">View More</a>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
        </div>

        <div class="row">
          <?php 
            $count = 0;
            $end = 3;
            foreach($service as $key=>$value){
            ?>
          <div class="col-lg-4 col-md-6">
            <div class="icon-box">
              <div class="icon"><i class="<?php echo $value['classname'];?>" style="color: #ff689b;"></i></div>
              <h4 class="title"><a href=""><?php echo $value['heading'];?></a></h4>
              <p class="description"><?php echo $value['description'];?></p>
            </div>
          </div>
          <?php 
            $count++;
            if ($count == $end) break;
            }
            ?>

          <div class="text-center">
            <a href="Service" class="view_more">View More</a>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>Portfolio</h2>         
        </div>

        <div class="row portfolio-container">
           <?php 
            $count = 0;
            $end = 3;
            foreach($portfolio as $key=>$value){
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
            $count++;
            if ($count == $end) break;
            }
            ?>

        </div>
        <div class="text-center">
          <a href="Portfolio" class="view_more">View More</a>
        </div>
      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

<?php
  include("./app/views/footer.php");
?>

</body>

</html>
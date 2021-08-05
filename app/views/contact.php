<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Contact</title>
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
          <li>Contact</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

     <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
         <?php 
          foreach($result as $key=>$value){
          ?>
        <div class="section-title">
          <h2>Contact</h2>         
          <p><?php echo $value['heading_content'];?></p>          
        </div>

        <div>
          <iframe style="border:0; width: 100%; height: 270px;" src="<?php echo $value['map_address'];?>" frameborder="0" allowfullscreen></iframe>
        </div>
        <?php 
          }
          ?>  
        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <?php 
              foreach($result as $key=>$value){
              ?>
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p><?php echo $value['location_address'];?></p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p><?php echo $value['email'];?></p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p><?php echo $value['phone'];?></p>
              </div>
              <?php 
              }
              ?>  
            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="ContactController/send" method="post">
              <div class="row">                
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>              
              <div class="text-center mt-3"><button type="submit" class="btn btn-primary">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <?php
    include("./app/views/footer.php");
  ?>
</body>

</html>
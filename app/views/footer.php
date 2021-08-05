 <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">

      <div class="container">

        <div class="row  justify-content-center">
            <?php 
            foreach($footer as $key=>$value){
            ?>
          <div class="col-lg-6">
            <h3><?php echo $value['heading'];?></h3>
            <p><?php echo $value['text'];?></p>
          </div>
          <?php
          } 
          ?>
        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>CMS</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
          Designed by <a href="javascript:void(0)">CMS</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

   <!-- Vendor JS Files -->
  <script src="./resources/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./resources/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="./resources/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="./resources/vendor/php-email-form/validate.js"></script>
  <script src="./resources/vendor/purecounter/purecounter.js"></script>
  <script src="./resources/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="./resources/js/main.js"></script>
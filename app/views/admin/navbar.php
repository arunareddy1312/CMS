<?php 
$base_url="http://".$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
$url = parse_url($base_url);
$a = explode('/', $url['path']);
switch ($a[3]) {
  case 'Dashboard':
    $breadcrumb = "Admin/Dashboard";
  break;
  case 'AdminHome':
    $breadcrumb = "Admin/Home";
  break;
  case 'User':
    $breadcrumb = "Admin/User";
  break;
  case 'AdminAbout':
    $breadcrumb = "Admin/About";
  break;
  case 'AdminTeam':
    $breadcrumb = "Admin/Team";
  break;
  case 'AdminPortfolio':
    $breadcrumb = "Admin/Portfolio";
  break;
  case 'AdminService':
    $breadcrumb = "Admin/Service";
  break;
  case 'AdminContact':
    $breadcrumb = "Admin/Contact";
  break;  
}
?>
<!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;" style="font-weight: 700;font-style: italic;"><i class="material-icons">label </i> <?php echo $breadcrumb; ?></a>
          </div>
          <div style="text-align: center; margin-left: 30%;">
          <button class="btn btn-primary"><?php  echo $_SESSION['role'] == 1 ? "Admin" : "Moderator" ?></button>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">            
            <ul class="navbar-nav">      
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>                 
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="http://localhost/CMS/admin/EditProfile">Edit Profile</a>                  
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="http://localhost/CMS/admin/Login/logout">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
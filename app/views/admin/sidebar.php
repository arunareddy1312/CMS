<?php 
$base_url="http://".$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
$url = parse_url($base_url);
$a = explode('/', $url['path']);
?>
<div class="sidebar-wrapper">
        <ul class="nav">
          <li class="<?php echo $a[3] == 'Dashboard' ? 'nav-item active' : 'nav-item'; ?>">
            <a class="nav-link" href="http://localhost/CMS/admin/Dashboard">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="<?php echo $a[3] == 'AdminHome' ? 'nav-item active' : 'nav-item'; ?> ">
            <a class="nav-link" href="http://localhost/CMS/admin/AdminHome">
              <i class="material-icons">title</i>
              <p>Header & Footer</p>
            </a>
          </li>
          <li class="<?php echo $a[3] == 'User' ? 'nav-item active' : 'nav-item'; ?> ">
            <a class="nav-link" href="http://localhost/CMS/admin/User">
              <i class="material-icons">person</i>
              <p>Users</p>
            </a>
          </li>
          <li class="<?php echo $a[3] == 'AdminAbout' ? 'nav-item active' : 'nav-item'; ?> ">
            <a class="nav-link" href="http://localhost/CMS/admin/AdminAbout">
              <i class="material-icons">content_paste</i>
              <p>About</p>
            </a>
          </li>
          <li class="<?php echo $a[3] == 'AdminTeam' ? 'nav-item active' : 'nav-item'; ?> ">
            <a class="nav-link" href="http://localhost/CMS/admin/AdminTeam">
              <i class="material-icons">group</i>
              <p>Team</p>
            </a>
          <li class="<?php echo $a[3] == 'AdminPortfolio' ? 'nav-item active' : 'nav-item'; ?>">
            <a class="nav-link" href="http://localhost/CMS/admin/AdminPortfolio">
              <i class="material-icons">library_books</i>
              <p>Portfolio</p>
            </a>
          </li>
          <li class="<?php echo $a[3] == 'AdminService' ? 'nav-item active' : 'nav-item'; ?>">
            <a class="nav-link" href="http://localhost/CMS/admin/AdminService">
              <i class="material-icons">bubble_chart</i>
              <p>Services</p>
            </a>
          </li>
          <li class="<?php echo $a[3] == 'AdminContact' ? 'nav-item active' : 'nav-item'; ?> ">
            <a class="nav-link" href="http://localhost/CMS/admin/AdminContact">
              <i class="material-icons">location_ons</i>
              <p>Contact</p>
            </a>
          </li>
        </ul>
      </div>
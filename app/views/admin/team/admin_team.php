<?php 
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../resources/admin/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../resources/admin/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   Admin Team
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <?php
    include("./app/views/admin/css_links.php");
  ?>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../resources/admin/img/sidebar-1.jpg">     
      <div class="logo"><a href="javascript:void(0)" class="simple-text logo-normal">
          CMS
        </a>
      </div>
      <?php
        include("./app/views/admin/sidebar.php");
      ?>
    </div>
    <div class="main-panel">
      <?php
        include("./app/views/admin/navbar.php");
      ?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">            
            <div class="col-md-12">
               <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Team Table</h4>
                  <p class="card-category">Create Update delete User</p>
                  <div class="text-right ">
                    <a class="btn bg-transparent" style="margin-top: -78px;" href="AdminTeam/add">Add</a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Image
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          Designation 
                        </th>                        
                      </thead>
                      
                      <tbody>
                        <?php
                      foreach($result as $key=>$value){
                        ?>
                        <tr>
                          <td>
                            <?php echo $key+1 ;?>
                          </td>
                          <td>
                            <img class="img" width="120px" src="http://localhost/CMS/<?php echo $value['photo'];?>" />
                          </td>
                          <td>
                            <?php echo $value['name'];?>
                          </td>
                          <td>
                            <?php echo $value['designation'];?>
                          </td>               
                          <td>
                            <?php if($_SESSION['role'] == 1){?>
                            <a class="btn btn-primary" id="edit" href="AdminTeam/edit/<?php echo $value['id'];?>">Edit</a>
                            <a class="btn btn-primary" onclick="return confirm('Are you sure Want To Delete It??')" id="delete" href="AdminTeam/delete/<?php echo $value['id'];?>">Delete</a>
                            <?php 
                              }else{
                            ?>
                            <a class="btn btn-primary" id="edit" href="AdminTeam/edit/<?php echo $value['id'];?>">Edit</a>
                            <?php
                            } 
                            ?>
                          </td>
                        </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                      
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
      <?php
        include("./app/views/admin/footer.php");
      ?>
    </div>
  </div>
  <?php
    include("./app/views/admin/js_links.php");
  ?>
 
</body>

</html>
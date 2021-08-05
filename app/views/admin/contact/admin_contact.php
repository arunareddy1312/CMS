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
    Admin Contact
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
                  <h4 class="card-title ">Contact Table</h4>
                  <p class="card-category">Create Update delete User</p>
                  <div class="text-right ">
                    <a class="btn bg-transparent" style="margin-top: -78px;" href=" " data-toggle="modal" data-target="#add">Add</a>
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
                          Heading Content
                        </th>
                        <th>
                          Map Address
                        </th>
                        <th>
                          Location Address
                        </th>   
                        <th>
                          Email
                        </th> 
                        <th>
                         Phone
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
                            <?php echo $value['heading_content'];?>
                          </td> 
                          <td>
                            <?php echo $value['map_address'];?>
                          </td> 
                          <td>
                            <?php echo $value['location_address'];?>
                          </td> 
                           <td>
                            <?php echo $value['email'];?>
                          </td>  
                           <td>
                            <?php echo $value['phone'];?>
                          </td>                        
                          <td>
                            <?php if($_SESSION['role'] == 1){?>
                            <a class="btn btn-primary" id="edit" href="AdminContact/edit/<?php echo $value['id'];?>">Edit</a>
                            <a class="btn btn-primary" onclick="return confirm('Are you sure Want To Delete It??')" id="delete" href="AdminContact/delete/<?php echo $value['id'];?>">Delete</a>
                            <?php 
                              }else{
                            ?>
                            <a class="btn btn-primary" id="edit" href="AdminContact/edit/<?php echo $value['id'];?>">Edit</a>
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
      <div class="modal" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">About</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="AdminContact/create">
              <div class="modal-body mx-3">
                <div class="md-form mb-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Heading Content</label>
                    <textarea class="form-control" rows="3" name="content" required="required"></textarea>    
                  </div>
                </div>
                <div class="md-form mb-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Map Address</label>
                    <textarea class="form-control" rows="3" name="map_address" required="required"></textarea>
                  </div>
                </div>
                <div class="md-form mb-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Location</label>
                    <input type="text" class="form-control" name="location" required="required">
                  </div>
                </div>
                <div class="md-form mb-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email Id</label>
                    <input type="text" class="form-control" name="email" required="required">
                  </div>
                </div>
                <div class="md-form mb-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Phone No</label>
                    <input type="text" class="form-control" name="phone" required="required">
                  </div>
                </div>
              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-primary" type="submit">submit</button>
              </div>
            </form>

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
<?php 
session_start();
require "includes/header.php"; 
require "classes/Database.php"; 
require "classes/User.php"; 

if ( !$_SESSION['is_logged_in'] ){
    header( "Location: logout.php" );
    exit();
}

if ( $_SESSION['role'] != 'admin' ){
    header("Location: index.php");
    exit();
}

$database = new Database();
$conn = $database->connDb(); 

$error = '';
if ( key_exists( 'error' , $_GET ) ) {
  $error =  $_GET['error'];
}
$users = User::getLimitedUsers( $conn , 2 );
$roles = User::getRoles( $conn );

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset( $_POST['show-records'] )){
  $records = $_POST['records'];
  $users = User::getLimitedUsers( $conn , $records );
}

?>



<!-- Page Wrapper -->
<div id="wrapper">
  <!-- Sidebar -->
  <?php require "includes/sidebar.php" ?>
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
      <!-- Topbar -->
      <?php require "includes/topbar.php" ?>
      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Admin Dashboard</h1>
          <a
            href="#"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
            ><i class="fas fa-download fa-sm text-white-50"></i> Generate
            Report</a
          >
        </div>

        <div class="row">
          <div class="col">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <div class="row mx-1 justify-content-between">
                  <h5 class="m-0 font-weight-bold text-primary">
                    Approval Requests
                  </h5>
                  <form action="" method="POST">
                    <div class="input-group">
                      <input type="number" name="records" class="form-control bg-light border small" 
                        placeholder="Number of records" 
                        aria-label="Search" aria-describedby="basic-addon2"
                      />
                        <div class="input-group-append">
                          <button class="btn btn-warning" name="show-records" type="submit">
                              <i class="fas fa-search fa-sm"></i>
                          </button>
                        </div>
                    </div>
                  </form>
                </div>
                
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <p class="text-success text-center border-success border rounded"> <?php echo $error != '' ? $error  : '' ?> </p>
                  <table
                    class="table table-bordered"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                  >
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Select Role</th>
                        <th>Status</th>
                        <th>Approve</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if ( $users != Null ) : foreach ( $users as $user ) : if ( $user['name'] != $_SESSION['name'] ) : ?>
                      <tr>
                        <td> <?= $user['name'] ?></td>
                        <td> <?= $user['email'] ?> </td>
                          <form action="change-role.php?id=<?= $user['id'] ?> " method="POST">
                          <td>
                          <select class="border border-none bg-primary p-2 text-white rounded" name="role_id" id="role">
                          <option value="<?= '0' ?>"><?= 'Undefined!' ?></option>
                          <?php foreach ( $roles as $role ):?>
                              <?php if ( $role['id'] == $user['role_id'] ) :?>
                                <option selected value="<?= $role['id'] ?>"> <?= ucfirst($user['role']) ?> </option>
                              <?php elseif ( $role['id'] != $user['role_id'] ) : ?>
                                <option value="<?= $role['id'] ?>"><?= ucfirst($role['role']) ?></option>
                              <?php endif ;?>
                            <?php endforeach ; ?>
                          </select>
                        </td>
                        <td> <?php echo $user['status'] == '1' ? 'Active' : 'Inactive' ?> </td>
                        <td >
                          <button class=" border border-none  bg-success rounded" type="submit" name="status" value="1">
                          <i class="fa-solid fa-check text-light"></i>
                          </button>
                        </td>
                        <td >
                          <button class="border border-none  bg-danger rounded" type="submit" name="status" value="0">
                            <i class="fa fa-trash text-light"></i>
                          </button>  
                        </td>
                        </form>
                      </tr>
                      <?php endif; endforeach; else : echo "<tr> <td class='text-danger'> Record Not Available </td> </tr>"; endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Copyright &copy; Your Website 2021</span>
        </div>
      </div>
    </footer>
    <!-- End of Footer -->
  </div>
  <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div
  class="modal fade"
  id="logoutModal"
  tabindex="-1"
  role="dialog"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button
          class="close"
          type="button"
          data-dismiss="modal"
          aria-label="Close"
        >
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        Select "Logout" below if you are ready to end your current session.
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">
          Cancel
        </button>
        <a class="btn btn-primary" href="logout.php">Logout</a>
      </div>
    </div>
  </div>
</div>

<?php require "includes/footer.php" ?>

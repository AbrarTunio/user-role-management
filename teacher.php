<?php 
session_start();
require "includes/header.php"; 
require "classes/Database.php"; 
require "classes/User.php"; 

if ( !$_SESSION['is_logged_in'] ){
    header( "Location: logout.php" );
    exit();
}

if ( $_SESSION['role'] != 'teacher' ){
    header("Location: index.php");
    exit();
}

$database = new Database();
$conn = $database->connDb(); 


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
          <h1 class="h3 mb-0 text-gray-800">Teacher's Dashboard</h1>
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
                </div>
              </div>
              <div class="card-body">
                <h1 class="text-center text-warning!">Hi, This is Teacher! <?= ucfirst( $_SESSION['name'] ) ?> </h1>
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

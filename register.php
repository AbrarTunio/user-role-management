<?php require 'includes/header.php';
require 'classes/Database.php'; 
require 'classes/User.php'; 

if ( $_SERVER['REQUEST_METHOD']  == 'POST'){
    $database = new Database();
    $conn = $database->connDb();
    
    $user = new User();

    $user->name = $_POST['name'];
    $user->email = $_POST['email'];

    $password = $_POST['password'];
    $user->password = password_hash(  $password , PASSWORD_DEFAULT );

    // $user->role = $_POST['role'];

    if ( $user->createOne( $conn )){
        echo "New user inserted with id: " . mysqli_insert_id( $conn );
    };

}


?>

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create New User Account!</h1>
                            </div>
                            <form class="user" action="" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" name="name" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" name="password" placeholder="Password">
                                    </div>
                                    <!-- <div class="col-sm-6">
                                        <input type="text" name="role" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Enter Role">
                                    </div> -->
                                </div>
                                <input type="submit" value="Register Account" class="btn btn-primary btn-user btn-block">
                                    
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php require 'includes/footer.php' ?>

<?php session_start();
require 'includes/header.php' ;
require 'classes/Database.php';
require 'classes/User.php';

$error = '';
if ( $_SERVER['REQUEST_METHOD'] == "POST" ){
    $database = new Database();
    $conn = $database->connDb();

    $formEmail = $_POST['email'];
    $formPass = $_POST['password'];

    if ( User::authenticate( $conn ,  $formEmail   ) ){
        $userData = User::authenticate( $conn ,  $formEmail   );
        if ( $userData['email'] == $formEmail  && password_verify( $formPass , $userData['password']  ) && $userData['status'] == 1  ){
            $_SESSION['is_logged_in'] = true;
            $_SESSION['name'] = $userData['name'];
            $_SESSION['role'] = $userData['role'];
            
            if ( $_SESSION['role'] == 'admin' ){
                header("Location: admin.php" );
            }
            if ( $_SESSION['role'] == 'student' ){
                header("Location: student.php" );
            }
            if ( $_SESSION['role'] == 'teacher' ){
                header("Location: teacher.php" );
            }
        } else {
            $error = 'Wrong Email or Passwrod';
        }
    }else {
        $error = 'Wrong Email or Passwrod';
    }   ;
   
    // var_dump( $usersData );

    
}


?>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <?php if ( $error != "" ) :?>
                                        <div class="text-center border border-danger text-danger rounded">
                                            <?= $error ?> 
                                        </div>
                                    <?php endif ?>
                                    <form action="" method="POST" class="user">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <input type="submit" value="Login" class="btn btn-primary btn-user btn-block">
                                            
                                        <hr>
                                        <a href="" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

<?php require 'includes/footer.php' ?>

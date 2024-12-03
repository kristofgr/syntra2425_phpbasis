<?php
require('functions.inc.php');

requiredLoggedOut();

$pageTitle = "Login";
$errors = [];

// Werd form ge-submit?
if (isset($_POST['inputmail'])) {

    // eerst validatie op mail (low level)
    if (!strlen($_POST['inputmail'])) {
        $errors[] = "Please fill in e-mail.";
    }

    // validatie op password (low level)
    if (!strlen($_POST['inputpass'])) {
        $errors[] = "Please fill in password.";
    }

    $uid = isValidLogin($_POST['inputmail'], $_POST['inputpass']);

    if ($uid) {
        // login success
        setLogin($uid);
        header("Location: admin.php");
        exit;
    } else {
        $errors[] = "E-mail and/or password is not correct.";
    }
}

require('head.inc.php');
?>
<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="dashboard_header mb_50">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="dashboard_header_title">
                                <h3> Login</h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="dashboard_breadcam text-end">
                                <p><a href="index.html">Dashboard</a> <i class="fas fa-caret-right"></i> login</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="white_box mb_30">
                    <div class="row justify-content-center">

                        <div class="col-lg-6">
                            <!-- sign_in  -->
                            <div class="modal-content cs_modal">
                                <div class="modal-header justify-content-center theme_bg_1">
                                    <h5 class="modal-title text_white">Log in</h5>
                                </div>

                                <?php if (count($errors) > 0): ?>
                                    <ul>
                                        <?php foreach ($errors as $error): ?>
                                            <li><?= $error; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>


                                <div class="modal-body">
                                    <form method="post" action="login.php">
                                        <div class="">
                                            <input name="inputmail" id="inputmail" type="text" class="form-control" placeholder="Enter your email">
                                        </div>
                                        <div class="">
                                            <input name="inputpass" id="inputpass" type="password" class="form-control" placeholder="Password">
                                        </div>

                                        <button class="btn_1 full_width text-center">Login</button>
                                    </form>

                                    <p>Need an account? <a data-bs-toggle="modal" data-bs-target="#sing_up" data-bs-dismiss="modal" href="#"> Sign Up</a></p>
                                    <div class="text-center">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#forgot_password" data-bs-dismiss="modal" class="pass_forget_btn">Forget Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php require('footer.inc.php'); ?>
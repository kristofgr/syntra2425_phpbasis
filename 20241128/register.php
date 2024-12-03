<?php
require('functions.inc.php');

requiredLoggedOut();

$pageTitle = "Register";
$errors = [];

$firstname = "";
$lastname = "";
$email = "";
$password = "";
$optin = 0;

if (isset($_POST['button'])) { // werd formulier verzonden?

    // Validatie voor first name
    if (!isset($_POST['inputfirstname'])) {
        $errors[] = "Firstname is required.";
    } else {
        $firstname = $_POST['inputfirstname'];

        if (strlen($firstname) < 1) {
            $errors[] = "Firstname is required.";
        }

        if (preg_match("/[\^<,\"@\/\{\}\(\)\*\$%\?=>:\|;#]+/i", $firstname)) {
            $errors[] = "Firstname can not contain special characters";
        }
    }

    // Validatie voor last name
    if (!isset($_POST['inputlastname'])) {
        $errors[] = "Lastname is required.";
    } else {
        $lastname = $_POST['inputlastname'];

        if (strlen($lastname) < 1) {
            $errors[] = "Lastname is required.";
        }

        if (preg_match("/[\^<,\"@\/\{\}\(\)\*\$%\?=>:\|;#]+/i", $lastname)) {
            $errors[] = "Lastname can not contain special characters";
        }
    }

    // Validatie voor e-mail
    if (!isset($_POST['inputmail'])) {
        $errors[] = "E-mail address is invalid.";
    } else {
        $email = $_POST['inputmail'];

        // Is het e-mailadres syntax-gewijs valid?
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "E-mail address is invalid.";
        } else {
            // syntax is valid, maar is deze e-mail uniek?
            if (mailExists($email)) {
                $errors[] = 'This E-mail address is already register. Are you trying to <a href="login.php">Log in instead</a>?';
            }
        }
    }

    // Validatie voor password
    if (!isset($_POST['inputpass'])) {
        $errors[] = "Password is required.";
    } else {
        $password = $_POST['inputpass'];

        if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $password)) {
            $errors[] = "Password needs to contain at least 1 uppercase letter, 1 lowercase, 1 symbol, 1 number and needs to be at least 8 characters long.";
        }
    }

    // Validatie optin
    if (!isset($_POST['inputoptin'])) {
        $optin = 1;
    }

    // indien geen errors => wegschrijven in DB
    if (!count($errors)) {
        $newId = insertUser($firstname, $lastname, $email, $password, $optin);
        if (!$newId) {
            $errors[] = "An unknown error has occured, pleace contact us...";
        } else {
            setLogin($newId);
            $_SESSION['message'] = "Welcome $firstname!";
            header("Location: admin.php");
            exit;
        }
    }
}


require('head.inc.php');

// print '<pre>';
// print_r($_POST);
// print_r($errors);
// print '</pre>';

?>
<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="dashboard_header mb_50">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="dashboard_header_title">
                                <h3><?= $pageTitle; ?></h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="dashboard_breadcam text-end">
                                <p><a href="index.html">Dashboard</a> <i class="fas fa-caret-right"></i> <?= $pageTitle; ?></p>
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
                                    <h5 class="modal-title text_white"><?= $pageTitle; ?></h5>
                                </div>

                                <div class="modal-body">

                                    <?php if (count($errors)): ?>
                                        <ul>
                                            <?php foreach ($errors as $error): ?>
                                                <li><?= $error; ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>

                                    <form method="post" action="register.php">
                                        <div class="">
                                            <input name="inputfirstname" id="inputfirstname" type="text" class="form-control" placeholder="Firstname" value="<?= $firstname ? $firstname : "" ?>">
                                        </div>
                                        <div class="">
                                            <input name="inputlastname" id="inputlastname" type="text" class="form-control" placeholder="Lastname" value="<?= $lastname ? $lastname : "" ?>">
                                        </div>

                                        <div class="">
                                            <input name="inputmail" id="inputmail" type="text" class="form-control" placeholder="Enter your email" value="<?= $email ? $email : "" ?>">
                                        </div>
                                        <div class="">
                                            <input name="inputpass" id="inputpass" type="password" class="form-control" placeholder="Password">
                                        </div>

                                        <div class="cs_check_box">
                                            <input type="checkbox" id="inputoptin" name="inputoptin" class="common_checkbox" value="1">
                                            <label class="form-label" for="inputoptin">
                                                Keep me up to date
                                            </label>
                                        </div>

                                        <button class="btn_1 full_width text-center" value="test" name="button">Sign up</button>
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
<?php

// Cấu hình SendMail
use PHPMailer\PHPMailer\PHPMailer;

function login() {
    $js       = BASE_URL.'assets/js/form.js';
    $css      = BASE_URL.'assets/css/form.css';
    $titleBar = 'Login';
    $view     = 'authentication/login';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if the submit button is pressed
        if (isset($_POST['btnLogin'])) {
            $data = [
                'email'    => $_POST["fieldEmail"]?? null,
                'password' => $_POST["fieldPassword"]?? null,
            ];

            // Validate
            $errors = validateLogin($data);
            if (!empty($errors)) {
                // Nếu có lỗi, lưu lỗi và dữ liệu vào session
                $_SESSION["errors"] = $errors;
                $_SESSION["data"]   = $data;
                header('Location: ?act=login');
                exit();
            } else {
                // Nếu không có lỗi, tiến hành kiểm tra đăng nhập
                $loginResult = checkLogin($data['email'], $data['password']);
                if ($loginResult === 'blocked') {
                    // Nếu tài khoản bị khóa
                    $_SESSION["login-blocked"] = 'Oh-no! 🚫 Your account is blocked!';
                    header('Location: ?act=login');
                    exit();
                } elseif ($loginResult === 'unverified') {
                    // Nếu tài khoản chưa được xác minh
                    $_SESSION["login-unverified"] = 'Whoops! 🙊 Please verify your email. 📧';
                    header('Location: ?act=login');
                    exit();
                } elseif (!$loginResult) {
                    // Nếu thông tin đăng nhập không chính xác
                    $_SESSION["errors"]['fieldEmail'] = 'Incorrect email or password. 🤔';
                    header('Location: ?act=login');
                    exit();
                } else {
                    // Đăng nhập thành công
                    $_SESSION["user"] = $loginResult;
                    $_SESSION["login-success"] = "Congratulations! 🎉 You're in, Let's get started! 🚀💥";
                    header('Location: ' . BASE_URL);
                    exit();
                }
            }
        }
    }
    require_once PATH_VIEW . 'layouts/master.php';
}

function logout() {
    if (!empty($_SESSION["user"])) {
        session_destroy();
    }
    header('Location: ' . BASE_URL);
    exit();
}

function register() {
    $js       = BASE_URL.'assets/js/form.js';
    $css      = BASE_URL.'assets/css/form.css';
    $titleBar = 'Register';
    $view     = 'authentication/register';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if the submit button is pressed
        if (isset($_POST['btnRegister'])) {
            $data = [
                'registration_date' => date('Y-m-d'),
                'name'              => $_POST["fieldName"] ?? null,
                'email'             => $_POST["fieldEmail"]?? null,
                'password'          => $_POST["fieldPassword"]?? null,
                'token'             => bin2hex(random_bytes(30)),
            ];

            // Validate
            $errors = validateRegister($data);
            if (!empty($errors)) {
                $_SESSION["errors"] = $errors;
                $_SESSION["data"]   = $data ;
                header('Location: ?act=register');
                exit();
            }

            insert('tbl_accounts', $data);
            
            if (sendEmail('Please check Sign-up verification link', 'verify-email', $data['token'], $data['email'])) {
                header('Location: ?act=waiting-page');
                exit();
            } else {
                $_SESSION["send-failed"] = 'Please try again later.';
            }
    
        }
    }
    require_once PATH_VIEW . 'layouts/master.php';
}

function sendEmail($subject, $act, $token, $email) {
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = EMAIL;
    $mail->Password = PASSWORD;
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom(EMAIL);
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = '
                <h2>Please click on the link below to verify your email address.</h2>
                <h3>
                    <a href="'.BASE_URL.'?act=' . $act . '&token=' . $token . '">👉 Click me!</a>
                </h3>
                ';
    return $mail->send() ? true : false;
}

function waitingPage() {
    require_once PATH_VIEW . 'authentication/waiting-page.php';
}

function verifyEmail($token) {
    getLastByToken('tbl_accounts', $token);
    if (updateOptions('tbl_accounts', $token, 'status', 1)) {
        header('Location: ?act=verified');
        exit();
    } else {
        
    }
}

function verified() {
    require_once PATH_VIEW . 'authentication/verified-page.php';
}

function forgotPassword() {
    $js       = BASE_URL.'assets/js/form.js';
    $css      = BASE_URL.'assets/css/form.css';
    $titleBar = 'Forgot Password';
    $view     = 'authentication/forgot-password';

    require_once PATH_VIEW . 'layouts/master.php';
}

function resetPassword() {
    $js       = BASE_URL.'assets/js/form.js';
    $css      = BASE_URL.'assets/css/form.css';
    $titleBar = 'Reset Password';
    $view     = 'authentication/reset-password';

    require_once PATH_VIEW . 'layouts/master.php';
}

function validateLogin($data) {
    $errors = [];
    // Kiểm tra trường email
    if (empty($data['email'])) {
        $errors['fieldEmail'] = 'Email is required.';
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['fieldEmail'] = 'Invalid email format.';
    }

    // Kiểm tra trường mật khẩu
    if (empty($data['password'])) {
        $errors['fieldPassword'] = 'Password is required.';
    }

    return $errors;
}

function validateRegister($data) {
    $errors = [];
    // Kiểm tra trường tên
    if (empty($data['name'])) {
        $errors['fieldName'] = 'This field is required.';
    } elseif (strlen($data['name']) < 2 || strlen($data['name']) > 40) {
        $errors['fieldName'] = 'Name must be between 2 and 40 characters.';
    }

    // Kiểm tra trường email
    if (empty($data['email'])) {
        $errors['fieldEmail'] = 'Email is required.';
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['fieldEmail'] = 'Invalid email format.';
    } elseif (!checkUniqueEmail($data['email'])) {
        $errors['fieldEmail'] = 'Email is already registered.';
    }

    // Kiểm tra trường mật khẩu
    if (empty($data['password'])) {
        $errors['fieldPassword'] = 'Password is required.';
    }
    
    // Kiểm tra trường xác nhận mật khẩu
    if (empty($_POST["fieldConfirm"])) {
        $errors['fieldConfirm'] = 'Please confirm your password.';
    } elseif ($data['password'] !== $_POST["fieldConfirm"]) {
        $errors['fieldConfirm'] = 'Passwords do not match.';
    }
    
    return $errors;
}
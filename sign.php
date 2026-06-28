<?php
session_start();

// --- DATABASE CONNECTION ---
$host = "localhost";
$user = "root";
$pass = ""; 
$dbname = "hospital_db";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// --- SIGN UP LOGIC (Registration) ---
if (isset($_POST['signup'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    // Adding +91 prefix to the phone number before saving
    $phone_raw = mysqli_real_escape_string($conn, $_POST['phone']);
    $phone = "+91 " . $phone_raw; 

    $password = mysqli_real_escape_string($conn, $_POST['password']); 

    // --- STRONG PASSWORD VALIDATION ---
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        echo "<script>alert('Password is too weak! Must be at least 8 characters and include an uppercase letter, a number, and a special character.'); window.location.href='sign.php';</script>";
    } else {
        $checkEmail = "SELECT email FROM sign WHERE email='$email'";
        $res = mysqli_query($conn, $checkEmail);

        if (mysqli_num_rows($res) > 0) {
            echo "<script>alert('This email is already registered! Please use a different one.');</script>";
        } else {
            $sql = "INSERT INTO sign (username, email, phone, password) VALUES ('$username', '$email', '$phone', '$password')";
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Account created successfully! You can now sign in.'); window.location.href='sign.php';</script>";
            } else {
                echo "<script>alert('Database Error: Could not complete registration.');</script>";
            }
        }
    }
}

// --- SIGN IN LOGIC (Login) ---
if (isset($_POST['signin'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM sign WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $row['username'];
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Invalid Email or Password! Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LifeCare - Access Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { background: #f4f7f6; font-family: 'Poppins', sans-serif; display: flex; align-items: center; justify-content: center; min-height: 100vh; margin: 0; }
        .auth-container { width: 100%; max-width: 400px; background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        .btn-custom { background: #00badb; color: white; border-radius: 50px; border: none; padding: 12px; width: 100%; font-weight: 600; transition: 0.3s; }
        .btn-custom:hover { background: #0099b5; color: white; }
        .nav-tabs .nav-link { color: #888; border: none; font-weight: 600; }
        .nav-tabs .nav-link.active { color: #00badb; background: none; border-bottom: 3px solid #00badb; }
        .password-hint { font-size: 0.75rem; color: #6c757d; margin-top: 5px; }
        .input-group-text { background-color: #f8f9fa; border-right: none; color: #495057; font-weight: 600; }
        .phone-input { border-left: none; }
    </style>
</head>
<body>

<div class="auth-container">
    <div class="text-center mb-4">
        <h2 style="font-weight: 700; color: #333;">Life<span style="color: #00badb;">Care</span></h2>
        <p class="text-muted">Medical Excellence Every Day</p>
    </div>
    
    <ul class="nav nav-tabs nav-justified mb-4" id="authTab" role="tablist">
        <li class="nav-item">
            <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button">Sign In</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button">Sign Up</button>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="login">
            <form action="sign.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="example@mail.com" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>
                <button type="submit" name="signin" class="btn btn-custom mt-2">Login to Account</button>
            </form>
        </div>

        <div class="tab-pane fade" id="register">
            <form action="sign.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter your name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="example@mail.com" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <div class="input-group">
                        <span class="input-group-text">+91</span>
                        <input type="tel" name="phone" class="form-control phone-input" placeholder="00000 00000" pattern="[0-9]{10}" title="Please enter 10 digit phone number" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Create Password</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                    <div class="password-hint">
                        Must have 8+ chars, 1 uppercase, 1 number & 1 special symbol.
                    </div>
                </div>
                <button type="submit" name="signup" class="btn btn-custom mt-2">Create New Account</button>
            </form>
        </div>
    </div>
    
    <div class="text-center mt-4">
        <a href="index.php" class="text-muted small text-decoration-none">← Back to Homepage</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
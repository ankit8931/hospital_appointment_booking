<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ../sign.php");
    exit();
}

$host = "localhost";
$db_name = "hospital_db"; 
$username = "root"; 
$password = ""; 

$conn = new mysqli($host, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    // Phone variable yahan se hata diya gaya hai
    
    $department = htmlspecialchars(trim($_POST['department']));
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $message = htmlspecialchars(trim($_POST['message']));
    $amount = 500; 
    $status = "Pending";

    // Query se 'phone' aur ek '?' hata diya gaya hai (Ab sirf 8 columns hain)
    $stmt = $conn->prepare("INSERT INTO appointments (name, email, department, appointment_date, appointment_time, message, amount, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    
    // bind_param mein se ek "s" aur $phone variable hata diya gaya hai (Total 8 parameters)
    $stmt->bind_param("ssssssis", $name, $email, $department, $appointment_date, $appointment_time, $message, $amount, $status);

    if ($stmt->execute()) {
        $appointment_id = $conn->insert_id;
        $_SESSION['payment_data'] = [
            'apt_id' => $appointment_id,
            'name' => $name,
            'email' => $email,
            // Phone yahan se bhi hata diya gaya hai
            'amount' => $amount
        ];
        header("Location: ../payment.php");
        exit();
    } else {
        echo "<script>alert('Error processing appointment: " . $conn->error . "'); window.location.href='../index.php';</script>";
    }
    $stmt->close();
}
$conn->close();
?>
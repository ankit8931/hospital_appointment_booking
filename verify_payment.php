<?php
session_start();

// Database Connection
$host = "localhost";
$db_name = "hospital_db"; 
$username = "root"; 
$password = ""; 

$conn = new mysqli($host, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['razorpay_payment_id'])) {
    $p_id = $_POST['razorpay_payment_id'];
    $apt_id = $_POST['apt_id']; 

    $stmt = $conn->prepare("UPDATE appointments SET status='Paid', razorpay_payment_id=? WHERE id=?");
    $stmt->bind_param("si", $p_id, $apt_id);

    if($stmt->execute()) {
        echo "<div style='text-align:center; padding:100px; font-family:sans-serif; background:#f4f7f6; min-height:100vh;'>";
        echo "<div style='background:white; display:inline-block; padding:40px; border-radius:15px; shadow:0 10px 20px rgba(0,0,0,0.1);'>";
        echo "<h1 style='color:#28a745; margin-bottom:10px;'>✔️ Payment Successful!</h1>";
        echo "<p style='color:#555;'>Your Appointment (ID: <b>$apt_id</b>) has been confirmed.</p>";
        echo "<p style='color:#777; font-size:0.9rem;'>Payment Transaction ID: <span style='color:#000;'>$p_id</span></p>";
        echo "<br><a href='../index.php' style='text-decoration:none; background:#0d6efd; color:#fff; padding:12px 25px; border-radius:30px; font-weight:bold; display:inline-block;'>Back to Home</a>";
        echo "</div>";
        echo "</div>";
        
        unset($_SESSION['payment_data']);
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $stmt->close();
} else {
    echo "<div style='text-align:center; padding:50px;'>";
    echo "<h2 style='color:red;'>Payment verification failed or ID missing!</h2>";
    echo "<a href='../index.php'>Go Back</a>";
    echo "</div>";
}
$conn->close();
?>
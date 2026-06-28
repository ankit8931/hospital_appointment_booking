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

    // Update status to 'Paid' and save payment ID
    $stmt = $conn->prepare("UPDATE appointments SET status='Paid', razorpay_payment_id=? WHERE id=?");
    $stmt->bind_param("si", $p_id, $apt_id);

    if($stmt->execute()) {
        echo "<div style='text-align:center; padding:100px; font-family:sans-serif; background:#f4f7f6; min-height:100vh;'>";
        echo "<div style='background:white; display:inline-block; padding:40px; border-radius:15px; box-shadow:0 10px 20px rgba(0,0,0,0.1);'>";
        echo "<h1 style='color:#28a745;'>✔️ Payment Successful!</h1>";
        echo "<p>Your Appointment (ID: <b>$apt_id</b>) has been confirmed.</p>";
        echo "<p style='font-size:0.9rem; color:#666;'>Transaction ID: $p_id</p>";
        // Link updated with ../ to go back to root index
        echo "<br><a href='../index.php' style='text-decoration:none; background:#0d6efd; color:#fff; padding:12px 25px; border-radius:30px; display:inline-block;'>Back to Home</a>";
        echo "</div>";
        echo "</div>";
        
        unset($_SESSION['payment_data']);
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $stmt->close();
} else {
    echo "Payment verification failed! <a href='../index.php'>Go Back</a>";
}
$conn->close();
?>
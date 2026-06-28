<?php
session_start();

// Check if appointment exists in session
if (!isset($_SESSION['appointment'])) {
    header("Location: index.php");
    exit();
}

$appointment = $_SESSION['appointment'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation - LifeCare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card p-4 shadow-lg text-center">
        <h2>Appointment Confirmed!</h2>
        <p>Thank you, <strong><?php echo htmlspecialchars($appointment['name']); ?></strong>!</p>
        <p>Your appointment has been successfully booked.</p>
        <ul class="list-group mt-3">
            <li class="list-group-item"><strong>Email:</strong> <?php echo htmlspecialchars($appointment['email']); ?></li>
            <li class="list-group-item"><strong>Department:</strong> <?php echo htmlspecialchars($appointment['department']); ?></li>
            <li class="list-group-item"><strong>Date & Time:</strong> <?php echo htmlspecialchars($appointment['date']); ?> at <?php echo htmlspecialchars($appointment['time']); ?></li>
        </ul>
        <a href="index.php" class="btn btn-primary mt-4">Back to Home</a>
    </div>
</div>
</body>
</html>

<?php
// Clear the appointment session after displaying
unset($_SESSION['appointment']);
?>

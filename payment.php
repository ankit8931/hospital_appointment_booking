<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['payment_data'])) {
    die("<div style='text-align:center; padding:50px; font-family:sans-serif;'>
            <h2>Session Missing!</h2>
            <p>Please book appointment again.</p>
            <a href='index.php'>Back to Home</a>
         </div>");
}

$data = $_SESSION['payment_data'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Payment - LifeCare Hospital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); font-family: 'Inter', sans-serif; min-height: 100vh; display: flex; align-items: center; }
        .payment-card { border: none; border-radius: 24px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); overflow: hidden; background: #ffffff; }
        .card-header-custom { background: #0d6efd; color: white; padding: 30px; text-align: center; }
        .total-section { background: #f8f9fa; border-radius: 15px; padding: 20px; margin-top: 20px; }
        .btn-pay { padding: 14px; font-weight: 700; border-radius: 12px; text-transform: uppercase; transition: all 0.3s; }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card payment-card">
                <div class="card-header-custom">
                    <h3 class="mb-0">Secure Checkout</h3>
                    <p class="mb-0 opacity-75">LifeCare Hospital Management</p>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-secondary">Patient Name</span>
                        <span class="fw-bold"><?php echo ucwords(htmlspecialchars($data['name'])); ?></span>
                    </div>
                    <div class="total-section d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-0 small text-muted">Total Payable</p>
                            <h3 class="mb-0 fw-bold text-primary">₹<?php echo $data['amount']; ?></h3>
                        </div>
                        <i class="fas fa-check-circle text-success fa-2x"></i>
                    </div>
                    <div class="mt-4">
                        <button id="rzp-button" class="btn btn-primary btn-pay w-100 mb-3">Pay Now</button>
                    </div>

                    <form id="payment-form" action="backend/verify_payment.php" method="POST">
                        <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                        <input type="hidden" name="apt_id" value="<?php echo $data['apt_id']; ?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "rzp_test_SDbXaQMZYpHq65", 
    "amount": "<?php echo $data['amount'] * 100; ?>", 
    "currency": "INR",
    "name": "LifeCare Hospital",
    "description": "Consultation Fees",
    "handler": function (response){
        document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
        document.getElementById('payment-form').submit();
    },
    "prefill": {
        "name": "<?php echo addslashes($data['name']); ?>",
        "email": "<?php echo $data['email']; ?>",
        "contact": "" 
    },
    "theme": { "color": "#0d6efd" }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>
</body>
</html>
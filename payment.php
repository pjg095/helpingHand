<?php
session_start();

// Check if donation details are available in session
if(!isset($_SESSION['amt']) || !isset($_SESSION['d_name']) || !isset($_SESSION['desc'])){
    header("location: home.php"); // Redirect if no data
    exit();
}

$amt = $_SESSION['amt'];
$d_name = $_SESSION['d_name'];
$desc = $_SESSION['desc'];

if (isset($_POST['pay'])) {
    // Simulate payment processing
    $credit_card = $_POST['credit_card'];
    $cvv = $_POST['cvv'];
    $expire_date = $_POST['expire_date'];

 // Validate credit card number (16 digits)
 if (!preg_match('/^\d{16}$/', $credit_card)) {
  echo "<script>alert('Invalid Credit Card Number. Must be 16 digits.');</script>";
} 
// Validate CVV (3 or 4 digits)
elseif (!preg_match('/^\d{3,4}$/', $cvv)) {
  echo "<script>alert('Invalid CVV. Must be 3 or 4 digits.');</script>";
} 
// Validate expiration date (MM/YY)
elseif (!preg_match('/^(0[1-9]|1[0-2])\/\d{2}$/', $expire_date)) {
  echo "<script>alert('Invalid Expiration Date. Use format MM/YY.');</script>";
} else {
  // Payment Success Simulation
  echo "<script>alert('Payment Successful! Thank you for your donation.'); window.location.href='home.php';</script>";
}
}
?>

<!doctype html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Payment Details</title>
    <link rel="stylesheet" href="assets/css/style-starter.css">
</head>

<body>
    <?php include 'common/header.php'; ?>
    
    <section class="w3l-contact-11">
        <div class="form-41-mian py-5">
            <div class="container py-lg-4">
                <div class="row align-form-map">
                    <div class="col-lg-12 form-inner-cont">
                        <div class="title-content text-left">
                            <h3 class="hny-title mb-lg-5 mb-4">Payment Details</h3>
                            <p><strong>Donor Name:</strong> <?php echo $d_name; ?></p>
                            <p><strong>Donation Amount:</strong> <?php echo $amt; ?> Rs</p>
                            <p><strong>Description:</strong> <?php echo $desc; ?></p>
                        </div>
                        <form method="post" class="signin-form">
                            <div class="container">
                                <div class="col-lg-10 form-input">
                                    <input type="text" name="credit_card" id="credit_card" placeholder="Credit Card Number" required="" />
                                </div><br>
                                <div class="col-lg-10 form-input">
                                    <input type="text" name="cvv" id="cvv" placeholder="CVV" required="" />
                                </div><br>
                                <div class="col-lg-10 form-input">
                                    <input type="text" name="expire_date" id="expire_date" placeholder="Expiration Date (MM/YY)" required="" />
                                </div><br>
                                <div class="submit-button text-lg-center">
                                    <button type="submit" class="btn btn-style" name="pay" id="pay">Pay Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'common/footer.php'; ?>

</body>
</html>

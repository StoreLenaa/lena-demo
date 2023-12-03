<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="tailwindcss-colors.css">
    <link rel="stylesheet" href="./CSS/thanhtoan.css">
    <title>LANA - Trang Thanh Toán</title>
</head>
<body>
    
    <!-- start: Payment -->
    <section class="payment-section">
        <div class="container">
            <div class="payment-wrapper">
                <div class="payment-left">
                    <div class="payment-header">
                        <div class="payment-header-icon"><i class="ri-flashlight-fill"></i></div>
                        <div class="payment-header-title">TRANG THANH TOÁN</div>
                        <a href="#" class="payment-plan-change">Quay Lại</a>
                    </div>
                    <div class="payment-content">
                        <div class="payment-body">
                            <div class="payment-plan">
                                <div class="payment-plan-info">
                                </div>
                            </div>
                            <div class="payment-summary">
                                <div class="payment-summary-divider"></div>
                                <div class="payment-summary-item payment-summary-total">
                                    <div class="payment-summary-name">Tổng số tiền cần thanh toán: </div>
                                    <div class="payment-summary-price"></div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="payment-right">
                    <form action="process_payment.php" class="payment-form" method="POST">
                        <h1 class="payment-title">Phương thức thanh toán</h1>
                        <div class="payment-method">
                            <input type="radio" name="payment-method" id="method-1" checked>
                            <label for="method-1" class="payment-method-item">
                                <img src="./Images/visa.png" alt="">
                            </label>
                            <input type="radio" name="payment-method" id="method-2">
                            <label for="method-2" class="payment-method-item">
                                <img src="./Images/mastercard.png" alt="">
                            </label>
                            <input type="radio" name="payment-method" id="method-3">
                            <label for="method-3" class="payment-method-item">
                                <img src="./Images/paypal.png" alt="">
                            </label>
                            <input type="radio" name="payment-method" id="method-4">
                            <label for="method-4" class="payment-method-item">
                                <img src="./Images/payment.jpg" alt="">
                            </label>
                        </div>
                        <div class="payment-form-group" id="imgContainer">
                        <div class="payment-form-group">
                            <input type="email" placeholder=" " class="payment-form-control" id="email">
                            <label for="email" class="payment-form-label payment-form-label-required">Email</label>
                        </div>
                        <div class="payment-form-group">
                            <input type="text" placeholder=" " class="payment-form-control" id="card-number">
                            <label for="card-number" class="payment-form-label payment-form-label-required">Số Thẻ</label>
                        </div>
                        <div class="payment-form-group-flex">
                            <div class="payment-form-group">
                                <input type="date" placeholder=" " class="payment-form-control" id="expiry-date">
                                <label for="expiry-date" class="payment-form-label payment-form-label-required">Ngày</label>
                            </div>
                            <div class="payment-form-group">
                                <input type="text" placeholder=" " class="payment-form-control" id="cvv">   
                                <label for="cvv" class="payment-form-label payment-form-label-required">CVV</label>
                            </div>
                        </div>
                        <section>
                            <button type="submit" class="payment-form-submit-button"><i class="ri-wallet-line"></i> Thanh Toán</button>                        
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="./JS/thanhtoan.js"></script>
</body>
</html>
document.addEventListener("DOMContentLoaded", function () {
    var quayLaiLink = document.querySelector('.payment-plan-change');
    
    quayLaiLink.addEventListener('click', function (event) {
        event.preventDefault();
        window.location.href = 'index.php';
    });

    let storedItems = JSON.parse(localStorage.getItem('cartItems')) || [];
    itemsAdded = storedItems;

    let totalElement = document.querySelector(".payment-summary-price");
    let total = 0;

    itemsAdded.forEach((item) => {
        let price = parseFloat(item.price.replace(/[^\d]/g, ""));
        total += price;
    });

    total = total.toFixed(0);
    totalElement.innerHTML = formatNumberWithCommas(total) + " VNĐ";

    // Get the form and radio buttons
    const paymentForm = document.querySelector('.payment-form');
    const paypalRadio = document.getElementById('method-3');
    const mastercardRadio = document.getElementById('method-2');
    const visaRadio = document.getElementById('method-1');
    const momoRadio = document.getElementById('method-4');

    // Add an event listener to the form
    paymentForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission behavior

        // Check if any payment method is selected and all required fields are filled
        const emailInput = document.getElementById('email');
        const cardNumberInput = document.getElementById('card-number');
        const expiryDateInput = document.getElementById('expiry-date');
        const cvvInput = document.getElementById('cvv');

        if (!isValidInput(emailInput) || !isValidInput(cardNumberInput) || !isValidInput(expiryDateInput) || !isValidInput(cvvInput)) {
            alert('VUI LÒNG NHẬP ĐẦY ĐỦ THÔNG TIN!');
            return;
        }

        if (momoRadio.checked) {
            // If MoMo is selected, redirect to momo.html
            window.location.href = 'momo.html';
        } else {
            // If other methods (PayPal, Visa, Mastercard) are selected, show a success message
            alert('Thanh toán thành công!');
            // Redirect to lichsugiaodich.php with the total amount as a query parameter
            window.location.href = './lichsugiaodich/lichsugiaodich.php?total_amount=' + total;
        }
    });
});

function isValidInput(input) {
    return input.value.trim() !== '';
}

function formatNumberWithCommas(number) {
    return number.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

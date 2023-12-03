document.addEventListener('DOMContentLoaded', function() {
  // Kiểm tra xem có sản phẩm trong giỏ hàng trong localStorage không
  let storedItems = JSON.parse(localStorage.getItem('cartItems')) || [];
  itemsAdded = storedItems;

  // Kiểm tra xem có tổng tiền đã được lưu trong localStorage không
  let storedTotal = localStorage.getItem('cartTotal') || "0.00";
  total = parseFloat(storedTotal);

  // Cập nhật hiển thị giỏ hàng và tổng tiền
  updateCartDisplay();
  updateTotal();

  // Bắt đầu phần còn lại của mã của bạn
  start();
});

// OPEN & CLOSE CART
const cartIcon = document.querySelector("#cart-icon");
const cart = document.querySelector(".cart");
const closeCart = document.querySelector("#cart-close");

cartIcon.addEventListener("click", () => {
  cart.classList.add("active");
});

closeCart.addEventListener("click", () => {
  cart.classList.remove("active");
});

// Start when the document is ready
if (document.readyState == "loading") {
  document.addEventListener("DOMContentLoaded", start);
} else {
  start();
}

// =============== START ====================
function start() {
  addEvents();
}

// ============= UPDATE & RERENDER ===========
function update() {
  addEvents();
  updateTotal();
}

// =============== ADD EVENTS ===============
function addEvents() {
  // Remove items from cart
  let cartRemove_btns = document.querySelectorAll(".cart-remove");
  console.log(cartRemove_btns);
  cartRemove_btns.forEach((btn) => {
    btn.addEventListener("click", handle_removeCartItem);
  });

  // Change item quantity
  let cartQuantity_inputs = document.querySelectorAll(".cart-quantity");
  cartQuantity_inputs.forEach((input) => {
    input.addEventListener("change", handle_changeItemQuantity);
  });

  // Add item to cart
  let addCart_btns = document.querySelectorAll(".add-cart");
  addCart_btns.forEach((btn) => {
    btn.addEventListener("click", handle_addCartItem);
  });

  // Buy Order
  const buy_btn = document.querySelector(".btn-buy");
  buy_btn.addEventListener("click", handle_buyOrder);
}

// ============= HANDLE EVENTS FUNCTIONS =============
let itemsAdded = [];

function handle_addCartItem() {
  let product = this.parentElement;
  let title = product.querySelector(".product-title").innerHTML;
  let price = product.querySelector(".product-price").innerHTML;
  let imgSrc = product.querySelector(".product-img").src;
  console.log(title, price, imgSrc);

  let newToAdd = {
    title,
    price,
    imgSrc,
  };

  // handle item is already exist
  if (itemsAdded.find((el) => el.title == newToAdd.title)) {
    alert("Mặt hàng này đã tồn tại!");
    return;
  } else {
    itemsAdded.push(newToAdd);
  }

  // Add product to cart
  let cartBoxElement = CartBoxComponent(title, price, imgSrc);
  let newNode = document.createElement("div");
  newNode.innerHTML = cartBoxElement;
  const cartContent = cart.querySelector(".cart-content");
  cartContent.appendChild(newNode);

  update();
}

function handle_removeCartItem() {
  this.parentElement.remove();
  itemsAdded = itemsAdded.filter(
    (el) =>
      el.title !=
      this.parentElement.querySelector(".cart-product-title").innerHTML
  );

  update();
}

function handle_changeItemQuantity() {
  if (isNaN(this.value) || this.value < 1) {
    this.value = 1;
  }
  this.value = Math.floor(this.value); // to keep it integer

  update();
}

function handle_buyOrder() {
  if (itemsAdded.length <= 0) {
    alert("Chưa có sản phẩm nào trong giỏ hàng! \nXin vui lòng thêm vào giỏ hàng.");
    return;
  }
  // Redirect to a new HTML file
  window.location.href = 'thanhtoan.php';
  
}

// =========== UPDATE & RERENDER FUNCTIONS =========
function updateTotal() {
  let cartBoxes = document.querySelectorAll(".cart-box");
  const totalElement = document.querySelector(".total-price");
  let total = 0;

  cartBoxes.forEach((cartBox) => {
    let priceElement = cartBox.querySelector(".cart-price");
    let price = parseFloat(priceElement.innerHTML.replace(/[^\d]/g, ""));
    let quantity = cartBox.querySelector(".cart-quantity").value;
    total += price * quantity;
  });

  total = total.toFixed(0); // Keep two decimal places
  totalElement.innerHTML = formatNumberWithCommas(total) + " VNĐ"; // Display the total in VNĐ
  localStorage.setItem('cartItems', JSON.stringify(itemsAdded));
}
function updateCartDisplay() {
  let cartContent = document.querySelector(".cart-content");

  // Xóa nội dung hiện tại
  cartContent.innerHTML = "";

  // Thêm các sản phẩm từ localStorage
  itemsAdded.forEach((item) => {
    let cartBoxElement = CartBoxComponent(item.title, item.price, item.imgSrc);
    let newNode = document.createElement("div");
    newNode.innerHTML = cartBoxElement;
    cartContent.appendChild(newNode);
  });
}
function formatNumberWithCommas(number) {
  return number.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

// ============= HTML COMPONENTS =============
function CartBoxComponent(title, price, imgSrc) {
  return `
    <div class="cart-box">
        <img src=${imgSrc} alt="" class="cart-img">
        <div class="detail-box">
            <div class="cart-product-title">${title}</div>
            <div class="cart-price">${price}</div>
            <input type="number" value="1" class="cart-quantity">
        </div>
        <!-- REMOVE CART  -->
        <i class='bx bxs-trash-alt cart-remove'></i>
    </div>`;
}


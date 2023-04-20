<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Catalog</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            margin: 100px auto;
            width: 670px;
        }

        .box {
            position: relative;
            padding: 30px 30px 70px 30px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        .cart-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #ffd369;
            color: #fff;
            font-size: 24px;
        }

        .product {
            display: flex;
            align-items: center;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
        }

        .product-image {
            width: 25%;
            height: 100%;
            margin-right: 20px;
        }

        .product-image img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .product-info {
            width: 75%;
        }

        .product-name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-price {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-top: 10px;
        }

        .product-quantity {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border: 1px solid #e0e0e0;
            border-radius: 50%;
            margin: 0 10px;
            font-size: 24px;
        }

        .plus,
        .minus {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #ffd369;
            color: #fff;
            font-size: 20px;
            cursor: pointer;
        }

        .plus:hover,
        .minus:hover {
            background-color: #ffce00;
        }

        .cart-total {
            margin-top: 20px;
            text-align: right;
        }

        .cart-total span {
            font-size: 18px;
            font-weight: bold;
        }

        .checkout {
            display: block;
            margin-top: 20px;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #ffd369;
            color: #fff;
            font-size: 20px;
            text-align: center;
            cursor:
        }

        .checkout:hover {
            background-color: #ffce00;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="box">
            <div class="cart-icon">
                <span>&#x1F6D2;</span>
                <span>$0.00</span>
            </div>
            <div class="product">
                <div class="product-image">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
                        <circle cx="25" cy="25" r="20" fill="#ddd" />
                        <circle cx="25" cy="25" r="18" fill="#fff" />
                    </svg>
                </div>
                <div class="product-info">
                    <div class="product-name">Product 1</div>
                    <div class="product-price">$19.99</div>
                    <div class="product-actions">
                        <div class="minus">-</div>
                        <div class="product-quantity">0</div>
                        <div class="plus">+</div>
                    </div>
                </div>
            </div>
            <div class="product">
                <div class="product-image">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
                        <circle cx="25" cy="25" r="20" fill="#ddd" />
                        <circle cx="25" cy="25" r="18" fill="#fff" />
                    </svg>
                </div>
                <div class="product-info">
                    <div class="product-name">Product 2</div>
                    <div class="product-price">$29.99</div>
                    <div class="product-actions">
                        <div class="minus">-</div>
                        <div class="product-quantity">0</div>
                        <div class="plus">+</div>
                    </div>
                </div>
            </div>
            <div class="product">
                <div class="product-image">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
                        <circle cx="25" cy="25" r="20" fill="#ddd" />
                        <circle cx="25" cy="25" r="18" fill="#fff" />
                    </svg>
                </div>
                <div class="product-info">
                    <div class="product-name">Product 3</div>
                    <div class="product-price">$39.99</div>
                    <div class="product-actions">
                        <div class="minus">-</div>
                        <div class="product-quantity">0</div>
                        <div class="plus">+</div>
                    </div>
                </div>
            </div>
            <div class="cart-total">
                Total: <span>$0.00</span>
            </div>
            <a href="#" class="checkout">Checkout</a>
        </div>
    </div>
    <script>
        var cartIcon = document.querySelector('.cart-icon');
        var cartTotal = document.querySelector('.cart-total span');
        // Находим все кнопки + и -
        var plusButtons = document.querySelectorAll('.plus');
        var minusButtons = document.querySelectorAll('.minus');

        // Обрабатываем клик на кнопке +
        for (var i = 0; i < plusButtons.length; i++) {
            plusButtons[i].addEventListener('click', function () {
                var quantityElem = this.parentElement.querySelector('.product-quantity');
                var quantity
                quantityElem.textContent = parseInt(quantityElem.textContent) + 1;
                updateCart();
            });
        }

        // Обрабатываем клик на кнопке -
        for (var i = 0; i < minusButtons.length; i++) {
            minusButtons[i].addEventListener('click', function () {
                var quantityElem = this.parentElement.querySelector('.product-quantity');
                if (parseInt(quantityElem.textContent) > 0) {
                    quantityElem.textContent = parseInt(quantityElem.textContent) - 1;
                    updateCart();
                }
            });
        }

        // Обновляем корзину
        function updateCart() {
            var cartTotalValue = 0;
            var cartQuantity = 0;

            // Находим все элементы с количеством товара и суммируем их
            var quantityElems = document.querySelectorAll('.product-quantity');
            for (var i = 0; i < quantityElems.length; i++) {
                cartQuantity += parseInt(quantityElems[i].textContent);
                cartTotalValue += parseInt(quantityElems[i].textContent) * parseFloat(quantityElems[i].parentElement.parentElement.querySelector('.product-price').textContent.substr(1));
            }

            // Обновляем значение корзины
            cartTotal.textContent = '$' + cartTotalValue.toFixed(2);

            // Обновляем значение в иконке корзины
            cartIcon.childNodes[1].textContent = '$' + cartTotalValue.toFixed(2);
        }
    </script>
</body>

</html>